<?php
include '../auth/auth_check.php';
include '../config/db.php';

if ($_SESSION['role'] !== 'student') {
    header("Location: ../auth/login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

$sq = mysqli_query($conn, "SELECT id FROM students WHERE user_id = $user_id");
$student = mysqli_fetch_assoc($sq);
$student_id = $student['id'];

$sql = "
    SELECT course, date, status
    FROM attendance
    WHERE student_id = $student_id
    ORDER BY date DESC
";

$result = mysqli_query($conn, $sql);
?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar-student.php'; ?>

<!-- Page Specific CSS -->
<style>
    :root {
        --primary-color: #2c3e50;
        --secondary-color: #34495e;
        --accent-color: #3498db;
        --success-color: #2ecc71;
        --danger-color: #e74c3c;
        --warning-color: #f1c40f;
        --light-bg: #f8f9fa;
        --card-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        --hover-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    body {
        background-color: var(--light-bg);
        font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
    }

    /* Common Card Style */
    .card-modern {
        background: white;
        border-radius: 16px;
        border: 1px solid rgba(0, 0, 0, 0.03);
        box-shadow: var(--card-shadow);
        overflow: hidden;
        margin-bottom: 1.5rem;
    }

    .card-modern-header {
        padding: 1.5rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.03);
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: white;
        flex-wrap: wrap;
        /* Responsive wrap */
        gap: 10px;
    }

    .card-modern-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--secondary-color);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    /* Page Header */
    .page-header-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--primary-color);
        letter-spacing: -0.5px;
    }

    .breadcrumb-item a {
        color: var(--accent-color);
        text-decoration: none;
    }

    .breadcrumb-item.active {
        color: #95a5a6;
    }

    /* Stats Cards */
    .stat-card {
        background: white;
        border-radius: 16px;
        padding: 1.5rem;
        box-shadow: var(--card-shadow);
        transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        border: none;
        height: 100%;
        position: relative;
        overflow: hidden;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--hover-shadow);
    }

    .stat-card::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: var(--accent-color);
        opacity: 0.5;
    }

    .stat-card.green::after {
        background: #2ecc71;
    }

    .stat-card.orange::after {
        background: #e67e22;
    }

    .stat-icon-wrapper {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }

    .bg-soft-primary {
        background: rgba(52, 152, 219, 0.1);
        color: var(--accent-color);
    }

    .bg-soft-green {
        background: rgba(46, 204, 113, 0.1);
        color: #2ecc71;
    }

    .bg-soft-orange {
        background: rgba(230, 126, 34, 0.1);
        color: #e67e22;
    }

    .stat-number {
        font-size: 2rem;
        font-weight: 800;
        color: var(--primary-color);
        line-height: 1;
    }

    .stat-label {
        font-size: 0.85rem;
        color: #7f8c8d;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-top: 5px;
    }

    .stat-trend {
        font-size: 0.75rem;
        font-weight: 600;
        margin-top: 0.5rem;
        display: flex;
        align-items: center;
    }

    /* Table Styling */
    .table-modern {
        width: 100%;
        margin-bottom: 0;
        white-space: nowrap;
    }

    .table-modern thead th {
        background: #f8f9fa;
        color: #7f8c8d;
        font-weight: 600;
        font-size: 0.8rem;
        text-transform: uppercase;
        padding: 1rem 1.5rem;
        border-bottom: 1px solid #eef2f7;
    }

    .table-modern tbody td {
        padding: 1.25rem 1.5rem;
        vertical-align: middle;
        border-bottom: 1px solid #f8f9fa;
        color: #555;
    }

    .table-modern tbody tr:last-child td {
        border-bottom: none;
    }

    .table-modern tbody tr:hover {
        background: #fafbfc;
    }

    /* Progress Bars */
    .progress-slim {
        height: 8px;
        border-radius: 10px;
        background-color: #f1f3f5;
        overflow: hidden;
    }

    /* Form Select Modern */
    .form-select-modern {
        border: 1px solid #eef2f7;
        border-radius: 10px;
        padding: 0.5rem 2.5rem 0.5rem 1rem;
        font-size: 0.9rem;
        color: var(--primary-color);
        background-color: #fff;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.02);
        cursor: pointer;
    }

    .form-select-modern:focus {
        border-color: var(--accent-color);
        box-shadow: 0 0 0 4px rgba(52, 152, 219, 0.1);
    }

    /* RESPONSIVE MEDIA QUERIES */
    @media (max-width: 768px) {
        .page-header-title {
            font-size: 1.5rem;
        }

        /* Header adjustments */
        .header-container {
            flex-direction: column;
            align-items: flex-start !important;
            gap: 1rem;
        }

        .header-container>div:last-child {
            width: 100%;
        }

        .form-select-modern {
            width: 100%;
        }

        /* Card Modern Header */
        .card-modern-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .card-modern-header button {
            width: 100%;
            margin-top: 0.5rem;
        }

        /* Table adjustments */
        .table-modern tbody td {
            padding: 1rem 1rem;
        }
    }
</style>

<main class="container-fluid px-4 py-4">

    <!-- 1. Header Section -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-4 header-container">
        <div>
            <h1 class="page-header-title mb-1">My Attendance</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Attendance</li>
                </ol>
            </nav>
        </div>
        <div>
            <select class="form-select form-select-modern">
                <option selected>Current Semester (1st)</option>
                <option>Previous Semester</option>
            </select>
        </div>
    </div>

    <!-- 2. Stats Summary Cards -->
    <div class="row g-4 mb-4">
        <!-- Card 1: Overall -->
        <div class="col-lg-4 col-md-6 col-12">
            <div class="stat-card">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="stat-number">85.4%</div>
                        <div class="stat-label">Overall Attendance</div>
                        <div class="stat-trend text-success">
                            <i class="fas fa-check-circle me-1"></i> Above 75% Criteria
                        </div>
                    </div>
                    <div class="stat-icon-wrapper bg-soft-primary">
                        <i class="fas fa-user-check"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card 2: Subjects -->
        <div class="col-lg-4 col-md-6 col-12">
            <div class="stat-card green">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="stat-number">6</div>
                        <div class="stat-label">Active Subjects</div>
                        <div class="stat-trend text-muted">
                            <i class="fas fa-book-open me-1"></i> All Enrolled
                        </div>
                    </div>
                    <div class="stat-icon-wrapper bg-soft-green">
                        <i class="fas fa-layer-group"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card 3: Alerts -->
        <div class="col-lg-4 col-md-12 col-12">
            <div class="stat-card orange">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="stat-number text-danger">1</div>
                        <div class="stat-label">Low Attendance</div>
                        <div class="stat-trend text-danger">
                            <i class="fas fa-exclamation-triangle me-1"></i> Action Required
                        </div>
                    </div>
                    <div class="stat-icon-wrapper bg-soft-orange">
                        <i class="fas fa-bell"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 3. Detailed Attendance Table -->
    <div class="card-modern">
        <div class="card-modern-header">
            <h5 class="card-modern-title"><i class="fas fa-list-alt text-primary"></i> Subject-wise Breakdown</h5>
            <button class="btn btn-sm btn-light border rounded-pill px-3 text-muted fw-bold">
                <i class="fas fa-download me-1"></i> Report
            </button>
        </div>
        <div class="table-responsive">
            <table class="table table-modern align-middle">
                <thead>
                    <tr>
                        <th class="ps-4">Subject</th>
                        <th class="text-center">Total Classes</th>
                        <th class="text-center">Attended</th>
                        <th style="min-width: 150px; width: 30%;">Attendance Trend</th>
                        <th class="text-end pe-4">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['course']); ?></td>
                            <td><?php echo htmlspecialchars($row['date']); ?></td>
                            <td>
                                <?php if ($row['status'] === 'present'): ?>
                                    <span class="badge bg-success">Present</span>
                                <?php else: ?>
                                    <span class="badge bg-danger">Absent</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>

                </tbody>
            </table>
        </div>
    </div>
</main>

<?php include '../includes/footer.php'; ?>