<?php
include '../auth/auth_check.php';
include '../config/db.php';

if ($_SESSION['role'] !== 'faculty') {
    header("Location: ../auth/login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$fq      = mysqli_query($conn, "SELECT id FROM faculty WHERE user_id = " . (int)$user_id);
$faculty = mysqli_fetch_assoc($fq);

if (!$faculty) die("Faculty profile not found.");

$faculty_id = (int)$faculty['id'];

// ── Fetch departments ──────────────────────────────────────────────────────────
$dept_rows   = [];
$dept_result = mysqli_query($conn, "SELECT DISTINCT department FROM students ORDER BY department");
while ($d = mysqli_fetch_assoc($dept_result)) {
    $dept_rows[] = $d['department'];
}

// ── Filter values ──────────────────────────────────────────────────────────────
$selected_department = isset($_GET['department']) ? trim($_GET['department']) : '';
$selected_semester   = isset($_GET['semester'])   ? trim($_GET['semester'])   : 'all';
$selected_date_from  = (isset($_GET['date_from']) && $_GET['date_from'] !== '') ? $_GET['date_from'] : '';
$selected_date_to    = (isset($_GET['date_to'])   && $_GET['date_to']   !== '') ? $_GET['date_to']   : '';
$records_loaded      = isset($_GET['load']) && $_GET['load'] == '1';

// ── Load attendance records ────────────────────────────────────────────────────
$records      = [];
$summary      = [];   // student_id => ['present'=>n, 'absent'=>n, 'name'=>..., 'roll'=>...]
$all_dates    = [];   // list of unique dates in results
$students_map = [];   // student_id => ['name', 'roll_no', 'semester']

if ($records_loaded && $selected_department !== '') {
    $dept_safe = mysqli_real_escape_string($conn, $selected_department);

    // Build semester & date conditions
    $sem_condition  = '';
    $date_condition = '';

    if ($selected_semester !== 'all' && $selected_semester !== '') {
        $sem_condition = " AND s.semester = " . (int)$selected_semester;
    }
    if ($selected_date_from !== '') {
        $date_condition .= " AND a.date >= '" . mysqli_real_escape_string($conn, $selected_date_from) . "'";
    }
    if ($selected_date_to !== '') {
        $date_condition .= " AND a.date <= '" . mysqli_real_escape_string($conn, $selected_date_to) . "'";
    }

    $sql = "
        SELECT a.id, a.date, a.status,
               s.id AS student_id, s.roll_no, s.semester,
               u.name
        FROM attendance a
        JOIN students s ON a.student_id = s.id
        JOIN users    u ON s.user_id    = u.id
        WHERE a.faculty_id = $faculty_id
          AND a.course     = '$dept_safe'
          $sem_condition
          $date_condition
        ORDER BY a.date DESC, s.semester, s.roll_no
    ";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $records[] = $row;
            $sid = (int)$row['student_id'];

            if (!isset($students_map[$sid])) {
                $students_map[$sid] = [
                    'name'     => $row['name'],
                    'roll_no'  => $row['roll_no'],
                    'semester' => $row['semester'],
                ];
            }
            if (!isset($summary[$sid])) {
                $summary[$sid] = ['present' => 0, 'absent' => 0];
            }
            $summary[$sid][$row['status']]++;

            $date = $row['date'];
            if (!in_array($date, $all_dates)) {
                $all_dates[] = $date;
            }
        }
    }

    // Sort dates ascending for the pivot table
    sort($all_dates);

    // Build pivot: student_id => date => status
    $pivot = [];
    foreach ($records as $r) {
        $pivot[(int)$r['student_id']][$r['date']] = $r['status'];
    }
}

// ── Helper: initials ───────────────────────────────────────────────────────────
function getInitials($name) {
    $words    = explode(' ', trim($name));
    $initials = '';
    foreach (array_slice($words, 0, 2) as $w) {
        if ($w !== '') $initials .= strtoupper($w[0]);
    }
    return $initials ?: '?';
}

$gradients = ['bg-gradient-1','bg-gradient-2','bg-gradient-3','bg-gradient-4','bg-gradient-5'];
$gi = 0; // gradient index counter
?>
<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar-faculty.php'; ?>

<style>
    :root {
        --primary-color: #2c3e50;
        --secondary-color: #34495e;
        --accent-color: #3498db;
        --success-color: #2ecc71;
        --danger-color: #e74c3c;
        --warning-color: #f39c12;
        --light-bg: #f8f9fa;
        --card-shadow: 0 4px 20px rgba(0,0,0,0.05);
    }
    body { background-color: var(--light-bg); font-family: 'Segoe UI', system-ui, -apple-system, sans-serif; }

    /* ── Cards ── */
    .card-modern { background: white; border-radius: 16px; border: 1px solid rgba(0,0,0,0.03); box-shadow: var(--card-shadow); overflow: hidden; margin-bottom: 1.5rem; }
    .card-modern-header { padding: 1.5rem; border-bottom: 1px solid rgba(0,0,0,0.03); display: flex; justify-content: space-between; align-items: center; background: white; flex-wrap: wrap; gap: 10px; }
    .card-modern-title { font-size: 1.1rem; font-weight: 700; color: var(--secondary-color); margin: 0; display: flex; align-items: center; gap: 10px; }

    /* ── Filters ── */
    .filter-label { font-size: 0.8rem; font-weight: 600; color: #95a5a6; margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.5px; display: block; }
    .form-select-modern, .form-control-modern {
        border: 1px solid #eef2f7; border-radius: 10px; padding: 0.7rem 1rem;
        font-size: 0.95rem; color: var(--primary-color); background-color: #fdfdfe;
        transition: border-color 0.2s; width: 100%; box-sizing: border-box;
    }
    select.form-select-modern { appearance: auto; }
    .form-select-modern:focus, .form-control-modern:focus { border-color: var(--accent-color); background-color: #fff; outline: none; }

    /* ── Summary stat cards ── */
    .stat-card { border-radius: 14px; padding: 1.2rem 1.5rem; display: flex; align-items: center; gap: 1rem; }
    .stat-card .stat-icon { width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; flex-shrink: 0; }
    .stat-card .stat-value { font-size: 1.6rem; font-weight: 800; line-height: 1; }
    .stat-card .stat-label { font-size: 0.8rem; color: #7f8c8d; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; margin-top: 3px; }
    .stat-blue  { background: #eaf4fd; } .stat-blue  .stat-icon { background: #d0eaf9; color: var(--accent-color); }
    .stat-green { background: #eafaf1; } .stat-green .stat-icon { background: #d5f5e3; color: var(--success-color); }
    .stat-red   { background: #fdf0ef; } .stat-red   .stat-icon { background: #fadbd8; color: var(--danger-color); }
    .stat-orange{ background: #fef9e7; } .stat-orange .stat-icon { background: #fdebd0; color: var(--warning-color); }

    /* ── Table ── */
    .table-modern { width: 100%; margin-bottom: 0; }
    .table-modern thead th { background: #f8f9fa; color: #7f8c8d; font-weight: 600; font-size: 0.78rem; text-transform: uppercase; padding: 0.9rem 1.2rem; border-bottom: 1px solid #eef2f7; white-space: nowrap; }
    .table-modern tbody td { padding: 0.9rem 1.2rem; vertical-align: middle; border-bottom: 1px solid #f8f9fa; white-space: nowrap; }
    .table-modern tbody tr:last-child td { border-bottom: none; }
    .table-modern tbody tr:hover { background-color: #fafbfc; }

    /* ── Avatar ── */
    .student-avatar { width: 36px; height: 36px; border-radius: 9px; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 0.85rem; color: white; margin-right: 0.8rem; flex-shrink: 0; }
    .bg-gradient-1 { background: linear-gradient(135deg, #667eea, #764ba2); }
    .bg-gradient-2 { background: linear-gradient(135deg, #2af598, #009efd); }
    .bg-gradient-3 { background: linear-gradient(135deg, #ff9a9e, #fecfef); }
    .bg-gradient-4 { background: linear-gradient(135deg, #f093fb, #f5576c); }
    .bg-gradient-5 { background: linear-gradient(135deg, #4facfe, #00f2fe); }

    /* ── Attendance status dots (pivot table) ── */
    .att-dot { display: inline-flex; align-items: center; justify-content: center; width: 28px; height: 28px; border-radius: 50%; font-size: 0.7rem; font-weight: 700; }
    .att-present { background: #d5f5e3; color: #1e8449; }
    .att-absent  { background: #fadbd8; color: #c0392b; }
    .att-none    { background: #f0f0f0; color: #bdc3c7; }

    /* ── Progress bar ── */
    .att-progress { height: 6px; border-radius: 10px; background: #eef2f7; overflow: hidden; margin-top: 4px; min-width: 80px; }
    .att-progress-fill { height: 100%; border-radius: 10px; transition: width 0.4s ease; }

    /* ── Badges ── */
    .sem-badge  { font-size: 0.75rem; background: #e8f4fd; color: #2980b9; padding: 3px 9px; border-radius: 20px; font-weight: 600; }
    .pct-badge-high { font-size: 0.8rem; font-weight: 700; color: #1e8449; }
    .pct-badge-mid  { font-size: 0.8rem; font-weight: 700; color: #d35400; }
    .pct-badge-low  { font-size: 0.8rem; font-weight: 700; color: #c0392b; }

    /* ── Tabs ── */
    .view-tabs { display: flex; gap: 8px; }
    .view-tab { border: none; background: #f1f3f5; border-radius: 50px; padding: 0.4rem 1.2rem; font-size: 0.85rem; font-weight: 600; color: #7f8c8d; cursor: pointer; transition: all 0.2s; }
    .view-tab.active { background: var(--accent-color); color: white; box-shadow: 0 2px 8px rgba(52,152,219,0.3); }

    /* ── Page header ── */
    .page-header-title { font-size: 1.75rem; font-weight: 700; color: var(--primary-color); letter-spacing: -0.5px; }
    .breadcrumb-item a { color: var(--accent-color); text-decoration: none; }
    .breadcrumb-item.active { color: #95a5a6; }
</style>

<main class="container-fluid px-4 py-4">

    <!-- Page Header -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-4">
        <div>
            <h1 class="page-header-title mb-1">View Attendance</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Attendance Report</li>
                </ol>
            </nav>
        </div>
        <div class="d-none d-md-flex align-items-center text-muted small mt-3 mt-md-0">
            <i class="far fa-clock me-2"></i><?php echo date('l, F j, Y'); ?>
        </div>
    </div>

    <!-- Filters -->
    <div class="card-modern">
        <div class="card-modern-header">
            <h5 class="card-modern-title"><i class="fas fa-filter text-primary"></i> Report Filters</h5>
        </div>
        <div class="card-body p-4">
            <form method="GET" action="">
                <input type="hidden" name="load" value="1">
                <div class="row g-3 align-items-end">

                    <!-- Department -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <label class="filter-label">Department / Course</label>
                        <select name="department" class="form-select-modern" required>
                            <option value="">-- Select Department --</option>
                            <?php foreach ($dept_rows as $dept): ?>
                                <option value="<?php echo htmlspecialchars($dept); ?>"
                                    <?php echo ($selected_department === $dept) ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($dept); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Semester -->
                    <div class="col-md-2 col-sm-6 col-6">
                        <label class="filter-label">Semester</label>
                        <select name="semester" class="form-select-modern">
                            <option value="all" <?php echo ($selected_semester === 'all') ? 'selected' : ''; ?>>All Semesters</option>
                            <?php for ($s = 1; $s <= 8; $s++): ?>
                                <option value="<?php echo $s; ?>" <?php echo ((string)$selected_semester === (string)$s) ? 'selected' : ''; ?>>
                                    Semester <?php echo $s; ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>

                    <!-- Date From -->
                    <div class="col-md-2 col-sm-6 col-6">
                        <label class="filter-label">Date From</label>
                        <input type="date" name="date_from" class="form-control-modern"
                               value="<?php echo htmlspecialchars($selected_date_from); ?>">
                    </div>

                    <!-- Date To -->
                    <div class="col-md-2 col-sm-6 col-6">
                        <label class="filter-label">Date To</label>
                        <input type="date" name="date_to" class="form-control-modern"
                               value="<?php echo htmlspecialchars($selected_date_to); ?>">
                    </div>

                    <!-- Submit -->
                    <div class="col-md-3 col-sm-12 col-12">
                        <button type="submit" class="btn btn-primary w-100 rounded-pill py-2 fw-bold shadow-sm"
                                style="background-color: var(--accent-color); border-color: var(--accent-color);">
                            <i class="fas fa-search me-2"></i>Load Report
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <?php if ($records_loaded): ?>

        <?php
        // ── Compute overall stats ────────────────────────────────────────────────
        $total_present = array_sum(array_column($summary, 'present'));
        $total_absent  = array_sum(array_column($summary, 'absent'));
        $total_records = $total_present + $total_absent;
        $total_students = count($students_map);
        $overall_pct   = $total_records > 0 ? round(($total_present / $total_records) * 100) : 0;
        ?>

        <!-- Stats Row -->
        <div class="row g-3 mb-3">
            <div class="col-6 col-md-3">
                <div class="stat-card stat-blue">
                    <div class="stat-icon"><i class="fas fa-users"></i></div>
                    <div>
                        <div class="stat-value text-primary"><?php echo $total_students; ?></div>
                        <div class="stat-label">Students</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card stat-green">
                    <div class="stat-icon"><i class="fas fa-check"></i></div>
                    <div>
                        <div class="stat-value" style="color:var(--success-color);"><?php echo $total_present; ?></div>
                        <div class="stat-label">Present</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card stat-red">
                    <div class="stat-icon"><i class="fas fa-times"></i></div>
                    <div>
                        <div class="stat-value" style="color:var(--danger-color);"><?php echo $total_absent; ?></div>
                        <div class="stat-label">Absent</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card stat-orange">
                    <div class="stat-icon"><i class="fas fa-percent"></i></div>
                    <div>
                        <div class="stat-value" style="color:var(--warning-color);"><?php echo $overall_pct; ?>%</div>
                        <div class="stat-label">Overall</div>
                    </div>
                </div>
            </div>
        </div>

        <?php if (empty($records)): ?>
            <div class="card-modern">
                <div class="text-center py-5 text-muted">
                    <i class="fas fa-calendar-times fa-3x mb-3 opacity-25"></i>
                    <p class="fw-bold mb-0">No attendance records found for the selected filters.</p>
                </div>
            </div>
        <?php else: ?>

        <!-- View Toggle + Table Card -->
        <div class="card-modern">
            <div class="card-modern-header">
                <div>
                    <h6 class="card-modern-title mb-1">Attendance Report</h6>
                    <small class="text-muted">
                        <?php echo htmlspecialchars($selected_department); ?> —
                        <?php echo ($selected_semester === 'all') ? 'All Semesters' : 'Semester ' . $selected_semester; ?>
                        <?php if ($selected_date_from || $selected_date_to): ?>
                            | <?php echo $selected_date_from ?: '...'; ?> → <?php echo $selected_date_to ?: 'today'; ?>
                        <?php endif; ?>
                    </small>
                </div>
                <div class="view-tabs">
                    <button class="view-tab active" onclick="switchView('summary', this)">
                        <i class="fas fa-chart-bar me-1"></i>Summary
                    </button>
                    <button class="view-tab" onclick="switchView('pivot', this)">
                        <i class="fas fa-calendar-alt me-1"></i>Date-wise
                    </button>
                </div>
            </div>

            <!-- ── SUMMARY VIEW ── -->
            <div id="view-summary" class="table-responsive">
                <table class="table table-modern align-middle">
                    <thead>
                        <tr>
                            <th class="ps-4">Roll No</th>
                            <th>Student Name</th>
                            <th class="text-center">Sem</th>
                            <th class="text-center">Present</th>
                            <th class="text-center">Absent</th>
                            <th class="text-center">Total</th>
                            <th>Attendance %</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($students_map as $sid => $stu):
                            $present  = $summary[$sid]['present'] ?? 0;
                            $absent   = $summary[$sid]['absent']  ?? 0;
                            $total    = $present + $absent;
                            $pct      = $total > 0 ? round(($present / $total) * 100) : 0;
                            $pctClass = $pct >= 75 ? 'pct-badge-high' : ($pct >= 50 ? 'pct-badge-mid' : 'pct-badge-low');
                            $barColor = $pct >= 75 ? '#2ecc71' : ($pct >= 50 ? '#e67e22' : '#e74c3c');
                            $gradient = $gradients[$gi++ % count($gradients)];
                        ?>
                        <tr>
                            <td class="ps-4 fw-bold text-secondary"><?php echo htmlspecialchars($stu['roll_no']); ?></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="student-avatar <?php echo $gradient; ?>">
                                        <?php echo getInitials($stu['name']); ?>
                                    </div>
                                    <div class="fw-bold text-dark"><?php echo htmlspecialchars($stu['name']); ?></div>
                                </div>
                            </td>
                            <td class="text-center"><span class="sem-badge">Sem <?php echo (int)$stu['semester']; ?></span></td>
                            <td class="text-center fw-bold" style="color:var(--success-color);"><?php echo $present; ?></td>
                            <td class="text-center fw-bold" style="color:var(--danger-color);"><?php echo $absent; ?></td>
                            <td class="text-center text-muted fw-bold"><?php echo $total; ?></td>
                            <td style="min-width:130px;">
                                <span class="<?php echo $pctClass; ?>"><?php echo $pct; ?>%</span>
                                <div class="att-progress">
                                    <div class="att-progress-fill" style="width:<?php echo $pct; ?>%; background:<?php echo $barColor; ?>;"></div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- ── DATE-WISE PIVOT VIEW ── -->
            <div id="view-pivot" class="table-responsive" style="display:none;">
                <table class="table table-modern align-middle">
                    <thead>
                        <tr>
                            <th class="ps-4" style="position:sticky;left:0;background:#f8f9fa;z-index:2;">Student</th>
                            <?php foreach ($all_dates as $d): ?>
                                <th class="text-center">
                                    <div><?php echo date('d M', strtotime($d)); ?></div>
                                    <div style="font-size:0.7rem;color:#bdc3c7;"><?php echo date('D', strtotime($d)); ?></div>
                                </th>
                            <?php endforeach; ?>
                            <th class="text-center">%</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $gi2 = 0; foreach ($students_map as $sid => $stu):
                            $present = $summary[$sid]['present'] ?? 0;
                            $absent  = $summary[$sid]['absent']  ?? 0;
                            $total   = $present + $absent;
                            $pct     = $total > 0 ? round(($present / $total) * 100) : 0;
                            $pctClass = $pct >= 75 ? 'pct-badge-high' : ($pct >= 50 ? 'pct-badge-mid' : 'pct-badge-low');
                            $gradient = $gradients[$gi2++ % count($gradients)];
                        ?>
                        <tr>
                            <td class="ps-4 fw-bold" style="position:sticky;left:0;background:white;z-index:1;">
                                <div class="d-flex align-items-center">
                                    <div class="student-avatar <?php echo $gradient; ?>" style="width:30px;height:30px;font-size:0.75rem;margin-right:0.6rem;">
                                        <?php echo getInitials($stu['name']); ?>
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark" style="font-size:0.88rem;"><?php echo htmlspecialchars($stu['name']); ?></div>
                                        <div class="text-muted" style="font-size:0.75rem;"><?php echo htmlspecialchars($stu['roll_no']); ?></div>
                                    </div>
                                </div>
                            </td>
                            <?php foreach ($all_dates as $d):
                                $status = $pivot[$sid][$d] ?? null;
                                if ($status === 'present') {
                                    echo '<td class="text-center"><span class="att-dot att-present" title="Present"><i class="fas fa-check" style="font-size:0.6rem;"></i></span></td>';
                                } elseif ($status === 'absent') {
                                    echo '<td class="text-center"><span class="att-dot att-absent" title="Absent"><i class="fas fa-times" style="font-size:0.6rem;"></i></span></td>';
                                } else {
                                    echo '<td class="text-center"><span class="att-dot att-none" title="No record">—</span></td>';
                                }
                            endforeach; ?>
                            <td class="text-center"><span class="<?php echo $pctClass; ?>"><?php echo $pct; ?>%</span></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="card-footer bg-white py-3 px-4 d-flex justify-content-between align-items-center border-top">
                <div class="text-muted small">
                    <i class="fas fa-info-circle me-1"></i>
                    <strong><?php echo count($students_map); ?></strong> student(s) ·
                    <strong><?php echo count($all_dates); ?></strong> class day(s) recorded
                </div>
                <div class="d-flex gap-2 flex-wrap justify-content-end">
                    <span class="badge rounded-pill px-3 py-2" style="background:#d5f5e3;color:#1e8449;">
                        <i class="fas fa-check me-1"></i>Present
                    </span>
                    <span class="badge rounded-pill px-3 py-2" style="background:#fadbd8;color:#c0392b;">
                        <i class="fas fa-times me-1"></i>Absent
                    </span>
                    <span class="badge rounded-pill px-3 py-2" style="background:#f0f0f0;color:#7f8c8d;">
                        — No Record
                    </span>
                </div>
            </div>
        </div>

        <?php endif; ?>
    <?php endif; ?>

</main>

<script>
function switchView(view, btn) {
    document.getElementById('view-summary').style.display = (view === 'summary') ? 'block' : 'none';
    document.getElementById('view-pivot').style.display   = (view === 'pivot')   ? 'block' : 'none';
    document.querySelectorAll('.view-tab').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
}
</script>

<?php include '../includes/footer.php'; ?>