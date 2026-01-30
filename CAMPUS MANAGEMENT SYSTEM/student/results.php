<?php
include '../auth/auth_check.php';

if ($_SESSION['role'] !== 'student') {
    header("Location: ../auth/login.php");
    exit;
}
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
        --card-shadow: 0 4px 20px rgba(0,0,0,0.05);
        --hover-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    body {
        background-color: var(--light-bg);
        font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
    }

    /* Common Card Style */
    .card-modern {
        background: white;
        border-radius: 16px;
        border: 1px solid rgba(0,0,0,0.03);
        box-shadow: var(--card-shadow);
        overflow: hidden;
        margin-bottom: 1.5rem;
    }

    .card-modern-header {
        padding: 1.5rem;
        border-bottom: 1px solid rgba(0,0,0,0.03);
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: white;
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
    .breadcrumb-item a { color: var(--accent-color); text-decoration: none; }
    .breadcrumb-item.active { color: #95a5a6; }

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
        top: 0; left: 0; width: 4px; height: 100%;
        background: var(--accent-color);
        opacity: 0.5;
    }
    
    .stat-card.purple::after { background: #9b59b6; }
    .stat-card.green::after { background: #2ecc71; }
    .stat-card.orange::after { background: #e67e22; }
    .stat-card.red::after { background: #e74c3c; }

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

    .bg-soft-primary { background: rgba(52, 152, 219, 0.1); color: var(--accent-color); }
    .bg-soft-purple { background: rgba(155, 89, 182, 0.1); color: #9b59b6; }
    .bg-soft-green { background: rgba(46, 204, 113, 0.1); color: #2ecc71; }
    .bg-soft-orange { background: rgba(230, 126, 34, 0.1); color: #e67e22; }
    .bg-soft-red { background: rgba(231, 76, 60, 0.1); color: #e74c3c; }

    .stat-number { font-size: 2rem; font-weight: 800; color: var(--primary-color); line-height: 1; }
    .stat-label { font-size: 0.85rem; color: #7f8c8d; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; margin-top: 5px; }
    .stat-trend { font-size: 0.75rem; font-weight: 600; margin-top: 0.5rem; display: flex; align-items: center; }
    
    /* Table Styling */
    .table-modern { width: 100%; margin-bottom: 0; }
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
    .table-modern tbody tr:last-child td { border-bottom: none; }
    .table-modern tbody tr:hover { background: #fafbfc; }

    /* Form Select Modern */
    .form-select-modern {
        border: 1px solid #eef2f7;
        border-radius: 10px;
        padding: 0.5rem 2.5rem 0.5rem 1rem;
        font-size: 0.9rem;
        color: var(--primary-color);
        background-color: #fff;
        box-shadow: 0 2px 6px rgba(0,0,0,0.02);
        cursor: pointer;
    }
    .form-select-modern:focus {
        border-color: var(--accent-color);
        box-shadow: 0 0 0 4px rgba(52, 152, 219, 0.1);
    }
</style>

<main class="container-fluid px-4 py-4">
    
    <!-- 1. Header Section -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-4">
        <div>
            <h1 class="page-header-title mb-1">Exam Results</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Results</li>
                </ol>
            </nav>
        </div>
        <div>
            <select class="form-select form-select-modern">
                <option value="1">Semester 1</option>
                <option value="2">Semester 2</option>
                <option value="3" selected>Semester 3</option>
                <option value="4">Semester 4</option>
            </select>
        </div>
    </div>

    <!-- 2. Stats Summary Cards -->
    <div class="row g-4 mb-4">
        <!-- GPA -->
        <div class="col-xl-3 col-md-6">
            <div class="stat-card purple">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="stat-number">8.5</div>
                        <div class="stat-label">SGPA</div>
                        <div class="stat-trend text-muted">
                            <i class="fas fa-chart-line me-1"></i> Excellent
                        </div>
                    </div>
                    <div class="stat-icon-wrapper bg-soft-purple">
                        <i class="fas fa-award"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- Passed -->
        <div class="col-xl-3 col-md-6">
            <div class="stat-card green">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="stat-number">5</div>
                        <div class="stat-label">Subjects Passed</div>
                        <div class="stat-trend text-success">
                            <i class="fas fa-check me-1"></i> All Cleared
                        </div>
                    </div>
                    <div class="stat-icon-wrapper bg-soft-green">
                        <i class="fas fa-book-reader"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- Failed -->
        <div class="col-xl-3 col-md-6">
            <div class="stat-card red">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="stat-number text-danger">0</div>
                        <div class="stat-label">Backlogs</div>
                        <div class="stat-trend text-success">
                            <i class="fas fa-shield-alt me-1"></i> Clean Record
                        </div>
                    </div>
                    <div class="stat-icon-wrapper bg-soft-red">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- Status -->
        <div class="col-xl-3 col-md-6">
             <div class="stat-card">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="stat-number text-success" style="font-size: 1.5rem;">PASSED</div>
                        <div class="stat-label">Final Status</div>
                        <div class="stat-trend text-muted">
                            <i class="fas fa-calendar-check me-1"></i> Dec 2023
                        </div>
                    </div>
                    <div class="stat-icon-wrapper bg-soft-primary">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 3. Detailed Results Table -->
    <div class="card-modern">
        <div class="card-modern-header">
            <h5 class="card-modern-title"><i class="fas fa-poll-h text-primary"></i> Detailed Performance</h5>
             <button class="btn btn-sm btn-light border rounded-pill px-3 text-muted fw-bold">
                <i class="fas fa-download me-1"></i> Transcript
            </button>
        </div>
        <div class="table-responsive">
            <table class="table table-modern align-middle">
                 <thead>
                    <tr>
                        <th class="ps-4" width="35%">Subject</th>
                        <th width="15%">Type</th>
                        <th class="text-center" width="15%">Marks</th>
                        <th class="text-center" width="15%">Grade</th>
                        <th class="text-end pe-4" width="20%">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Row 1 -->
                    <tr>
                        <td class="ps-4">
                            <div class="fw-bold text-dark">Data Structures</div>
                            <small class="text-muted">CS-301</small>
                        </td>
                        <td><span class="badge bg-light text-secondary border">Theory</span></td>
                        <td class="text-center fw-bold">85/100</td>
                        <td class="text-center"><span class="badge bg-success bg-opacity-10 text-success px-2 border border-success border-opacity-25">A+</span></td>
                         <td class="text-end pe-4">
                            <span class="badge rounded-pill bg-success">PASS</span>
                        </td>
                    </tr>
                    <!-- Row 2 -->
                    <tr>
                         <td class="ps-4">
                            <div class="fw-bold text-dark">Database Management</div>
                            <small class="text-muted">CS-302</small>
                        </td>
                        <td><span class="badge bg-light text-secondary border">Theory</span></td>
                        <td class="text-center fw-bold">78/100</td>
                        <td class="text-center"><span class="badge bg-success bg-opacity-10 text-success px-2 border border-success border-opacity-25">A</span></td>
                         <td class="text-end pe-4">
                            <span class="badge rounded-pill bg-success">PASS</span>
                        </td>
                    </tr>
                    <!-- Row 3 -->
                    <tr>
                         <td class="ps-4">
                            <div class="fw-bold text-dark">Operating Systems</div>
                            <small class="text-muted">CS-303</small>
                        </td>
                        <td><span class="badge bg-light text-secondary border">Theory</span></td>
                        <td class="text-center fw-bold">92/100</td>
                        <td class="text-center"><span class="badge bg-success bg-opacity-10 text-success px-2 border border-success border-opacity-25">O</span></td>
                         <td class="text-end pe-4">
                            <span class="badge rounded-pill bg-success">PASS</span>
                        </td>
                    </tr>
                     <!-- Row 4 -->
                    <tr>
                         <td class="ps-4">
                            <div class="fw-bold text-dark">Mathematics III</div>
                            <small class="text-muted">MA-301</small>
                        </td>
                        <td><span class="badge bg-light text-secondary border">Theory</span></td>
                        <td class="text-center fw-bold">65/100</td>
                        <td class="text-center"><span class="badge bg-warning bg-opacity-10 text-warning px-2 border border-warning border-opacity-25">B</span></td>
                         <td class="text-end pe-4">
                            <span class="badge rounded-pill bg-success">PASS</span>
                        </td>
                    </tr>
                     <!-- Row 5 -->
                    <tr>
                         <td class="ps-4">
                            <div class="fw-bold text-dark">Digital Electronics Lab</div>
                            <small class="text-muted">EC-301L</small>
                        </td>
                        <td><span class="badge bg-light text-secondary border">Practical</span></td>
                        <td class="text-center fw-bold">48/50</td>
                        <td class="text-center"><span class="badge bg-success bg-opacity-10 text-success px-2 border border-success border-opacity-25">O</span></td>
                         <td class="text-end pe-4">
                            <span class="badge rounded-pill bg-success">PASS</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>
<?php include '../includes/footer.php'; ?>