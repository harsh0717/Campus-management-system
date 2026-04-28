<?php
include '../auth/auth_check.php';
include '../config/db.php';

if ($_SESSION['role'] !== 'faculty') {
    header("Location: ../auth/login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

$fq = mysqli_query($conn, "SELECT id FROM faculty WHERE user_id = " . (int)$user_id);
$faculty = mysqli_fetch_assoc($fq);

if (!$faculty) {
    die("Faculty profile not found.");
}

$faculty_id = (int)$faculty['id'];

// ── Handle bulk attendance submission ──────────────────────────────────────────
$success_msg = '';
$error_msg   = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_attendance'])) {
    $course     = mysqli_real_escape_string($conn, $_POST['course'] ?? '');
    $date       = mysqli_real_escape_string($conn, $_POST['date']   ?? '');
    $attendance = isset($_POST['attendance']) && is_array($_POST['attendance']) ? $_POST['attendance'] : [];

    if (empty($course) || empty($date)) {
        $error_msg = "Course or date is missing. Please try again.";
    } elseif (empty($attendance)) {
        $error_msg = "No attendance data received. Please try again.";
    } else {
        $inserted = 0;
        $updated  = 0;

        foreach ($attendance as $student_id => $status) {
            $student_id = (int)$student_id;
            $status     = ($status === 'absent') ? 'absent' : 'present';

            $check = mysqli_query($conn,
                "SELECT id FROM attendance
                 WHERE student_id = $student_id
                   AND faculty_id = $faculty_id
                   AND course     = '$course'
                   AND date       = '$date'
                 LIMIT 1"
            );

            if ($check && mysqli_num_rows($check) > 0) {
                $row    = mysqli_fetch_assoc($check);
                $att_id = (int)$row['id'];
                mysqli_query($conn, "UPDATE attendance SET status='$status' WHERE id=$att_id");
                $updated++;
            } else {
                mysqli_query($conn,
                    "INSERT INTO attendance (student_id, faculty_id, course, date, status)
                     VALUES ($student_id, $faculty_id, '$course', '$date', '$status')"
                );
                $inserted++;
            }
        }

        $success_msg = "Attendance submitted! $inserted new record(s) added, $updated updated.";
    }
}

// ── Fetch departments for filter dropdown ──────────────────────────────────────
$dept_rows   = [];
$dept_result = mysqli_query($conn, "SELECT DISTINCT department FROM students ORDER BY department");
while ($d = mysqli_fetch_assoc($dept_result)) {
    $dept_rows[] = $d['department'];
}

// ── Read filter values ─────────────────────────────────────────────────────────
$selected_department = isset($_GET['department']) ? trim($_GET['department']) : '';
$selected_semester   = isset($_GET['semester'])   ? trim($_GET['semester'])   : 'all';
$selected_date       = (isset($_GET['date']) && $_GET['date'] !== '') ? $_GET['date'] : date('Y-m-d');
$students_loaded     = isset($_GET['load']) && $_GET['load'] == '1';

// ── Load students based on filters ────────────────────────────────────────────
$students     = [];
$existing_att = [];

if ($students_loaded && $selected_department !== '') {
    $dept_safe = mysqli_real_escape_string($conn, $selected_department);

    $sem_condition = '';
    if ($selected_semester !== 'all' && $selected_semester !== '') {
        $sem_condition = " AND s.semester = " . (int)$selected_semester;
    }

    $sq = mysqli_query($conn,
        "SELECT s.id, s.roll_no, s.semester, u.name, u.status
         FROM students s
         JOIN users u ON s.user_id = u.id
         WHERE s.department = '$dept_safe'
           AND u.status = 'active'
           $sem_condition
         ORDER BY s.semester, s.roll_no"
    );

    if ($sq) {
        while ($row = mysqli_fetch_assoc($sq)) {
            $students[] = $row;
        }
    }

    // Fetch existing attendance for this date/course
    if (!empty($students) && $selected_date !== '') {
        $date_safe  = mysqli_real_escape_string($conn, $selected_date);
        $att_result = mysqli_query($conn,
            "SELECT student_id, status FROM attendance
             WHERE faculty_id = $faculty_id
               AND course = '$dept_safe'
               AND date   = '$date_safe'"
        );
        if ($att_result) {
            while ($att = mysqli_fetch_assoc($att_result)) {
                $existing_att[(int)$att['student_id']] = $att['status'];
            }
        }
    }
}

// ── Helper ────────────────────────────────────────────────────────────────────
function getInitials($name) {
    $words    = explode(' ', trim($name));
    $initials = '';
    foreach (array_slice($words, 0, 2) as $w) {
        if ($w !== '') $initials .= strtoupper($w[0]);
    }
    return $initials ?: '?';
}

$gradients = ['bg-gradient-1', 'bg-gradient-2', 'bg-gradient-3', 'bg-gradient-4', 'bg-gradient-5'];
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
        --light-bg: #f8f9fa;
        --card-shadow: 0 4px 20px rgba(0,0,0,0.05);
    }
    body { background-color: var(--light-bg); font-family: 'Segoe UI', system-ui, -apple-system, sans-serif; }
    .card-modern { background: white; border-radius: 16px; border: 1px solid rgba(0,0,0,0.03); box-shadow: var(--card-shadow); overflow: hidden; margin-bottom: 1.5rem; }
    .card-modern-header { padding: 1.5rem; border-bottom: 1px solid rgba(0,0,0,0.03); display: flex; justify-content: space-between; align-items: center; background: white; flex-wrap: wrap; gap: 10px; }
    .card-modern-title { font-size: 1.1rem; font-weight: 700; color: var(--secondary-color); margin: 0; display: flex; align-items: center; gap: 10px; }
    .filter-label { font-size: 0.8rem; font-weight: 600; color: #95a5a6; margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.5px; display: block; }
    .form-select-modern, .form-control-modern {
        border: 1px solid #eef2f7; border-radius: 10px; padding: 0.7rem 1rem;
        font-size: 0.95rem; color: var(--primary-color); background-color: #fdfdfe;
        transition: border-color 0.2s; width: 100%; box-sizing: border-box;
    }
    select.form-select-modern { appearance: auto; }
    .form-select-modern:focus, .form-control-modern:focus { border-color: var(--accent-color); background-color: #fff; outline: none; }
    .table-modern { width: 100%; margin-bottom: 0; white-space: nowrap; }
    .table-modern thead th { background: #f8f9fa; color: #7f8c8d; font-weight: 600; font-size: 0.8rem; text-transform: uppercase; padding: 1rem 1.5rem; border-bottom: 1px solid #eef2f7; }
    .table-modern tbody td { padding: 1rem 1.5rem; vertical-align: middle; border-bottom: 1px solid #f8f9fa; }
    .table-modern tbody tr:last-child td { border-bottom: none; }
    .table-modern tbody tr:hover { background-color: #fafbfc; }
    .student-avatar { width: 40px; height: 40px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 0.9rem; color: white; margin-right: 1rem; flex-shrink: 0; }
    .bg-gradient-1 { background: linear-gradient(135deg, #667eea, #764ba2); }
    .bg-gradient-2 { background: linear-gradient(135deg, #2af598, #009efd); }
    .bg-gradient-3 { background: linear-gradient(135deg, #ff9a9e, #fecfef); }
    .bg-gradient-4 { background: linear-gradient(135deg, #f093fb, #f5576c); }
    .bg-gradient-5 { background: linear-gradient(135deg, #4facfe, #00f2fe); }
    .attendance-toggle { display: inline-flex; background: #f1f3f5; border-radius: 50px; padding: 4px; }
    .btn-check:checked + .btn-custom-present { background-color: var(--success-color); color: white; box-shadow: 0 2px 5px rgba(46,204,113,0.3); }
    .btn-check:checked + .btn-custom-absent  { background-color: var(--danger-color);  color: white; box-shadow: 0 2px 5px rgba(231,76,60,0.3); }
    .btn-custom { padding: 0.4rem 1.2rem; border-radius: 50px; font-size: 0.85rem; font-weight: 600; color: #7f8c8d; cursor: pointer; transition: all 0.2s ease; border: none; display: inline-flex; align-items: center; gap: 6px; background: transparent; }
    .btn-custom:hover { color: var(--primary-color); }
    .page-header-title { font-size: 1.75rem; font-weight: 700; color: var(--primary-color); letter-spacing: -0.5px; }
    .breadcrumb-item a { color: var(--accent-color); text-decoration: none; }
    .breadcrumb-item.active { color: #95a5a6; }
    .sem-badge { font-size: 0.78rem; background: #e8f4fd; color: #2980b9; padding: 3px 10px; border-radius: 20px; font-weight: 600; }
</style>

<main class="container-fluid px-4 py-4">

    <!-- Page Header -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-4">
        <div>
            <h1 class="page-header-title mb-1">Mark Attendance</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Attendance</li>
                </ol>
            </nav>
        </div>
        <div class="d-none d-md-flex align-items-center text-muted small mt-3 mt-md-0">
            <i class="far fa-clock me-2"></i><?php echo date('l, F j, Y'); ?>
        </div>
    </div>

    <!-- Alerts -->
    <?php if ($success_msg): ?>
        <div class="alert alert-success d-flex align-items-center gap-2 rounded-3 mb-4">
            <i class="fas fa-check-circle"></i><strong><?php echo htmlspecialchars($success_msg); ?></strong>
        </div>
    <?php endif; ?>
    <?php if ($error_msg): ?>
        <div class="alert alert-danger d-flex align-items-center gap-2 rounded-3 mb-4">
            <i class="fas fa-exclamation-triangle"></i><strong><?php echo htmlspecialchars($error_msg); ?></strong>
        </div>
    <?php endif; ?>

    <!-- Filters -->
    <div class="card-modern">
        <div class="card-modern-header">
            <h5 class="card-modern-title"><i class="fas fa-filter text-primary"></i> Class Selection</h5>
        </div>
        <div class="card-body p-4">
            <form method="GET" action="">
                <input type="hidden" name="load" value="1">
                <div class="row g-3 align-items-end">

                    <div class="col-md-4 col-sm-6 col-12">
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

                    <div class="col-md-2 col-sm-6 col-6">
                        <label class="filter-label">Semester</label>
                        <select name="semester" class="form-select-modern">
                            <option value="all" <?php echo ($selected_semester === 'all') ? 'selected' : ''; ?>>
                                All Semesters
                            </option>
                            <?php for ($s = 1; $s <= 8; $s++): ?>
                                <option value="<?php echo $s; ?>"
                                    <?php echo ((string)$selected_semester === (string)$s) ? 'selected' : ''; ?>>
                                    Semester <?php echo $s; ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>

                    <div class="col-md-2 col-sm-6 col-12">
                        <label class="filter-label">Date</label>
                        <input type="date" name="date" class="form-control-modern"
                               value="<?php echo htmlspecialchars($selected_date); ?>">
                    </div>

                    <div class="col-md-4 col-sm-12 col-12">
                        <button type="submit" class="btn btn-primary w-100 rounded-pill py-2 fw-bold shadow-sm"
                                style="background-color: var(--accent-color); border-color: var(--accent-color);">
                            <i class="fas fa-sync-alt me-2"></i>Load Students
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <!-- Student List & Submission Form -->
    <?php if ($students_loaded): ?>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <input type="hidden" name="submit_attendance" value="1">
        <input type="hidden" name="course" value="<?php echo htmlspecialchars($selected_department); ?>">
        <input type="hidden" name="date"   value="<?php echo htmlspecialchars($selected_date); ?>">

        <div class="card-modern">
            <div class="card-modern-header">
                <div>
                    <h6 class="card-modern-title mb-1">Student List</h6>
                    <small class="text-muted">
                        <?php echo htmlspecialchars($selected_department); ?> —
                        <?php echo ($selected_semester === 'all') ? 'All Semesters' : 'Semester ' . $selected_semester; ?> |
                        <?php echo htmlspecialchars($selected_date); ?>
                    </small>
                </div>

                <?php if (!empty($students)): ?>
                <div class="dropdown">
                    <button class="btn btn-light btn-sm border rounded-pill dropdown-toggle fw-bold text-muted px-3"
                            type="button" data-bs-toggle="dropdown">
                        <i class="fas fa-check-double me-2"></i>Quick Actions
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                        <li><button class="dropdown-item small fw-bold py-2" id="btnMarkAllPresent" type="button">
                            <i class="fas fa-check text-success me-2"></i>Mark All Present</button></li>
                        <li><button class="dropdown-item small fw-bold py-2" id="btnMarkAllAbsent" type="button">
                            <i class="fas fa-times text-danger me-2"></i>Mark All Absent</button></li>
                    </ul>
                </div>
                <?php endif; ?>
            </div>

            <?php if (empty($students)): ?>
                <div class="text-center py-5 text-muted">
                    <i class="fas fa-user-slash fa-3x mb-3 opacity-25"></i>
                    <p class="fw-bold mb-0">No active students found for the selected filters.</p>
                </div>
            <?php else: ?>
            <div class="table-responsive">
                <table class="table table-modern align-middle">
                    <thead>
                        <tr>
                            <th class="ps-4" style="width:15%;">Roll No</th>
                            <th style="width:35%;">Student Name</th>
                            <th style="width:15%;">Semester</th>
                            <th class="text-center" style="width:35%;">Attendance</th>
                        </tr>
                    </thead>
                    <tbody id="attendance-list">
                        <?php foreach ($students as $i => $student):
                            $sid      = (int)$student['id'];
                            $gradient = $gradients[$i % count($gradients)];
                            $current  = $existing_att[$sid] ?? 'present';
                        ?>
                        <tr>
                            <td class="ps-4 fw-bold text-secondary"><?php echo htmlspecialchars($student['roll_no']); ?></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="student-avatar <?php echo $gradient; ?>">
                                        <?php echo getInitials($student['name']); ?>
                                    </div>
                                    <div class="fw-bold text-dark"><?php echo htmlspecialchars($student['name']); ?></div>
                                </div>
                            </td>
                            <td><span class="sem-badge">Sem <?php echo (int)$student['semester']; ?></span></td>
                            <td class="text-center">
                                <div class="attendance-toggle">
                                    <input type="radio" class="btn-check"
                                           name="attendance[<?php echo $sid; ?>]"
                                           id="p_<?php echo $sid; ?>"
                                           value="present"
                                           <?php echo ($current === 'present') ? 'checked' : ''; ?>
                                           autocomplete="off">
                                    <label class="btn-custom btn-custom-present" for="p_<?php echo $sid; ?>">
                                        <i class="fas fa-check"></i> Present
                                    </label>

                                    <input type="radio" class="btn-check"
                                           name="attendance[<?php echo $sid; ?>]"
                                           id="a_<?php echo $sid; ?>"
                                           value="absent"
                                           <?php echo ($current === 'absent') ? 'checked' : ''; ?>
                                           autocomplete="off">
                                    <label class="btn-custom btn-custom-absent" for="a_<?php echo $sid; ?>">
                                        <i class="fas fa-times"></i> Absent
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="card-footer bg-white py-4 d-flex justify-content-between align-items-center border-top-0">
                <div class="text-muted small">
                    <i class="fas fa-info-circle me-1"></i>
                    Showing <strong><?php echo count($students); ?></strong> student(s)
                </div>
                <button type="submit" class="btn btn-success rounded-pill px-5 py-2 fw-bold shadow-sm"
                        style="background-color: var(--success-color); border: none;">
                    <i class="fas fa-check-double me-2"></i>Submit Attendance
                </button>
            </div>
            <?php endif; ?>
        </div>
    </form>
    <?php endif; ?>

</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const btnPresent = document.getElementById('btnMarkAllPresent');
    const btnAbsent  = document.getElementById('btnMarkAllAbsent');

    if (btnPresent) {
        btnPresent.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelectorAll('input[id^="p_"]').forEach(r => r.checked = true);
        });
    }
    if (btnAbsent) {
        btnAbsent.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelectorAll('input[id^="a_"]').forEach(r => r.checked = true);
        });
    }
});
</script>

<?php include '../includes/footer.php'; ?>