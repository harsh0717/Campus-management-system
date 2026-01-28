<?php
include '../auth/auth_check.php';

if ($_SESSION['role'] !== 'faculty') {
    header("Location: ../auth/login.php");
    exit;
}
?>
<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar-faculty.php'; ?>

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

    /* Card Styling */
    .card-modern {
        background: white;
        border-radius: 16px;
        border: 1px solid rgba(0,0,0,0.03);
        box-shadow: var(--card-shadow);
        overflow: hidden;
        margin-bottom: 1.5rem;
        transition: transform 0.2s, box-shadow 0.2s;
    }
    
    .card-modern-header {
        padding: 1.5rem;
        border-bottom: 1px solid rgba(0,0,0,0.03);
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: white;
        flex-wrap: wrap; /* Allow wrapping on small screens */
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

    /* Filters */
    .filter-label {
        font-size: 0.8rem;
        font-weight: 600;
        color: #95a5a6;
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .form-select-modern, .form-control-modern {
        border: 1px solid #eef2f7;
        border-radius: 10px;
        padding: 0.7rem 1rem;
        font-size: 0.95rem;
        color: var(--primary-color);
        background-color: #fdfdfe;
        box-shadow: none;
        transition: border-color 0.2s;
    }
    /* Specific fix for select elements to prevent text overlapping the arrow */
    select.form-select-modern {
        padding-right: 2.5rem;
        background-position: right 1rem center;
    }
    .form-select-modern:focus, .form-control-modern:focus {
        border-color: var(--accent-color);
        background-color: #fff;
    }

    /* Table Styling */
    .table-modern {
        width: 100%;
        margin-bottom: 0;
        white-space: nowrap; /* Prevent text wrapping inside table cells on mobile */
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
        padding: 1rem 1.5rem;
        vertical-align: middle;
        border-bottom: 1px solid #f8f9fa;
    }
    .table-modern tbody tr:last-child td { border-bottom: none; }
    .table-modern tbody tr:hover { background-color: #fafbfc; }

    /* Avatar */
    .student-avatar {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.9rem;
        color: white;
        margin-right: 1rem;
        flex-shrink: 0; /* Prevent avatar from shrinking */
    }
    .bg-gradient-1 { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
    .bg-gradient-2 { background: linear-gradient(135deg, #2af598 0%, #009efd 100%); }
    .bg-gradient-3 { background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 99%, #fecfef 100%); }

    /* Attendance Toggles */
    .attendance-toggle {
        display: inline-flex;
        background: #f1f3f5;
        border-radius: 50px;
        padding: 4px;
        position: relative;
    }
    .btn-check:checked + .btn-custom-present {
        background-color: var(--success-color);
        color: white;
        box-shadow: 0 2px 5px rgba(46, 204, 113, 0.3);
    }
    .btn-check:checked + .btn-custom-absent {
        background-color: var(--danger-color);
        color: white;
        box-shadow: 0 2px 5px rgba(231, 76, 60, 0.3);
    }
    .btn-custom {
        padding: 0.4rem 1.2rem;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 600;
        color: #7f8c8d;
        cursor: pointer;
        transition: all 0.2s ease;
        border: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .btn-custom:hover { color: var(--primary-color); }

    /* Page Header */
    .page-header-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--primary-color);
        letter-spacing: -0.5px;
    }
    .breadcrumb-item a { color: var(--accent-color); text-decoration: none; }
    .breadcrumb-item.active { color: #95a5a6; }
    
    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .page-header-title { font-size: 1.5rem; }
        .attendance-toggle { width: 100%; justify-content: space-between; }
        .btn-custom { flex-grow: 1; justify-content: center; }
        
        .card-footer {
            flex-direction: column;
            gap: 1rem;
            align-items: stretch !important;
        }
        .card-footer button { width: 100%; }
        
        /* Adjust filter columns on mobile */
        .col-md-3, .col-md-2 { width: 100%; margin-bottom: 1rem; }
    }

</style>

<!-- MAIN CONTENT -->
<main class="container-fluid px-4 py-4">
    
    <!-- 1. Header Section -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-4">
        <div>
            <h1 class="page-header-title mb-1">Mark Attendance</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Attendance</li>
                </ol>
            </nav>
        </div>
        <div class="d-flex align-items-center gap-3 mt-3 mt-md-0">
             <div class="d-none d-md-flex align-items-center text-muted small me-2">
                <i class="far fa-clock me-2"></i> <?php echo date('l, F j, Y'); ?>
            </div>
            <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25 px-3 py-2 rounded-pill">
                <i class="fas fa-exclamation-circle me-2"></i>Submission Pending
            </span>
        </div>
    </div>

    <!-- 2. Filters Section -->
    <div class="card-modern">
        <div class="card-modern-header">
            <h5 class="card-modern-title"><i class="fas fa-filter text-primary"></i> Class Selection</h5>
        </div>
        <div class="card-body p-4">
            <div class="row g-3 align-items-end">
                <div class="col-md-3 col-sm-6 col-12">
                    <label class="filter-label">Select Course</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0 text-muted ps-3" style="border-radius: 10px 0 0 10px; border-color: #eef2f7;"><i class="fas fa-book"></i></span>
                        <select class="form-select form-select-modern border-start-0" style="border-radius: 0 10px 10px 0;">
                            <option selected>Intro to Programming (CS101)</option>
                            <option>Data Structures (CS202)</option>
                            <option>Web Development (CS305)</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 col-6">
                    <label class="filter-label">Semester</label>
                    <select class="form-select form-select-modern">
                        <option selected>1st Semester</option>
                        <option>2nd Semester</option>
                    </select>
                </div>
                <div class="col-md-2 col-sm-6 col-6">
                    <label class="filter-label">Section</label>
                    <select class="form-select form-select-modern">
                        <option selected>Section A</option>
                        <option>Section B</option>
                    </select>
                </div>
                <div class="col-md-2 col-sm-6 col-12">
                    <label class="filter-label">Date</label>
                    <input type="date" class="form-control form-control-modern" value="<?php echo date('Y-m-d'); ?>">
                </div>
                <div class="col-md-3 col-sm-12 col-12">
                    <button class="btn btn-primary w-100 rounded-pill py-2 fw-bold shadow-sm" style="background-color: var(--accent-color); border-color: var(--accent-color);">
                        <i class="fas fa-sync-alt me-2"></i>Load Students
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- 3. Student List Table -->
    <div class="card-modern">
        <div class="card-modern-header">
            <div class="d-flex flex-column">
                <h6 class="card-modern-title mb-1">Student List</h6>
                <small class="text-muted">CS101 - Intro to Programming (Section A)</small>
            </div>
            
            <!-- Quick Actions Dropdown -->
            <div class="dropdown mt-2 mt-md-0">
                <button class="btn btn-light btn-sm border rounded-pill dropdown-toggle fw-bold text-muted px-3" type="button" id="bulkActionsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-check-double me-2"></i>Quick Actions
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0" aria-labelledby="bulkActionsDropdown">
                    <li><button class="dropdown-item small fw-bold py-2" id="btnMarkAllPresent"><i class="fas fa-check text-success me-2"></i>Mark All Present</button></li>
                    <li><button class="dropdown-item small fw-bold py-2" id="btnMarkAllAbsent"><i class="fas fa-times text-danger me-2"></i>Mark All Absent</button></li>
                </ul>
            </div>
        </div>
        
        <div class="table-responsive">
            <table class="table table-modern align-middle">
                <thead>
                    <tr>
                        <th class="ps-4" style="width: 15%;">Roll No</th>
                        <th style="width: 35%;">Student Name</th>
                        <th style="width: 20%;">Status</th>
                        <th class="text-center" style="width: 30%;">Attendance Action</th>
                    </tr>
                </thead>
                <tbody id="attendance-list">
                    <!-- Student 1 -->
                    <tr>
                        <td class="ps-4 fw-bold text-secondary">2023CS01</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="student-avatar bg-gradient-1">MJ</div>
                                <div>
                                    <div class="fw-bold text-dark">Mark Johnson</div>
                                    <small class="text-muted">Regular Student</small>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge bg-success bg-opacity-10 text-success px-2 py-1 rounded">Active</span></td>
                        <td class="text-center">
                            <div class="attendance-toggle">
                                <input type="radio" class="btn-check" name="att1" id="p1" checked autocomplete="off">
                                <label class="btn-custom btn-custom-present" for="p1"><i class="fas fa-check"></i> Present</label>
                                
                                <input type="radio" class="btn-check" name="att1" id="a1" autocomplete="off">
                                <label class="btn-custom btn-custom-absent" for="a1"><i class="fas fa-times"></i> Absent</label>
                            </div>
                        </td>
                    </tr>
                    <!-- Student 2 -->
                    <tr>
                        <td class="ps-4 fw-bold text-secondary">2023CS02</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="student-avatar bg-gradient-2">SW</div>
                                <div>
                                    <div class="fw-bold text-dark">Sarah Williams</div>
                                    <small class="text-muted">Regular Student</small>
                                </div>
                            </div>
                        </td>
                         <td><span class="badge bg-success bg-opacity-10 text-success px-2 py-1 rounded">Active</span></td>
                        <td class="text-center">
                            <div class="attendance-toggle">
                                <input type="radio" class="btn-check" name="att2" id="p2" checked autocomplete="off">
                                <label class="btn-custom btn-custom-present" for="p2"><i class="fas fa-check"></i> Present</label>
                                
                                <input type="radio" class="btn-check" name="att2" id="a2" autocomplete="off">
                                <label class="btn-custom btn-custom-absent" for="a2"><i class="fas fa-times"></i> Absent</label>
                            </div>
                        </td>
                    </tr>
                    <!-- Student 3 -->
                    <tr>
                        <td class="ps-4 fw-bold text-secondary">2023CS03</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="student-avatar bg-gradient-3">DC</div>
                                <div>
                                    <div class="fw-bold text-dark">David Chen</div>
                                    <small class="text-muted">Scholarship Holder</small>
                                </div>
                            </div>
                        </td>
                         <td><span class="badge bg-success bg-opacity-10 text-success px-2 py-1 rounded">Active</span></td>
                        <td class="text-center">
                            <div class="attendance-toggle">
                                <input type="radio" class="btn-check" name="att3" id="p3" checked autocomplete="off">
                                <label class="btn-custom btn-custom-present" for="p3"><i class="fas fa-check"></i> Present</label>
                                
                                <input type="radio" class="btn-check" name="att3" id="a3" autocomplete="off">
                                <label class="btn-custom btn-custom-absent" for="a3"><i class="fas fa-times"></i> Absent</label>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="card-footer bg-white py-4 d-flex justify-content-between align-items-center border-top-0">
            <div class="text-muted small">
                <i class="fas fa-info-circle me-1"></i> Showing <strong>3</strong> students from database
            </div>
            <button class="btn btn-success rounded-pill px-5 py-2 fw-bold shadow-sm hover-elevate" style="background-color: var(--success-color); border: none;">
                <i class="fas fa-check-double me-2"></i>Submit Attendance
            </button>
        </div>
    </div>
</main>

<script>
    // Logic for Bulk Actions
    document.addEventListener('DOMContentLoaded', function() {
        // Mark All Present
        document.getElementById('btnMarkAllPresent').addEventListener('click', function(e) {
            e.preventDefault();
            const presentRadios = document.querySelectorAll('input[id^="p"]');
            presentRadios.forEach(radio => radio.checked = true);
        });

        // Mark All Absent
        document.getElementById('btnMarkAllAbsent').addEventListener('click', function(e) {
            e.preventDefault();
            const absentRadios = document.querySelectorAll('input[id^="a"]');
            absentRadios.forEach(radio => radio.checked = true);
        });
    });
</script>

<?php include '../includes/footer.php'; ?>