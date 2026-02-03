<?php
include '../auth/auth_check.php';

if ($_SESSION['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit;
}
?>
<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar-admin.php'; ?>


<!-- Page Specific CSS -->
<style>
    /* Card & Layout Styles */
    .dashboard-card {
        border: none;
        border-radius: 20px;
        background-color: #fff;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.12);
    }

    /* Vibrant Gradients for Icons */
    .bg-gradient-primary { background: linear-gradient(135deg, #4e73df 0%, #224abe 100%); }
    .bg-gradient-success { background: linear-gradient(135deg, #1cc88a 0%, #13855c 100%); }
    .bg-gradient-info    { background: linear-gradient(135deg, #36b9cc 0%, #258391 100%); }
    .bg-gradient-warning { background: linear-gradient(135deg, #f6c23e 0%, #dda20a 100%); }
    
    /* Icon Box Styling */
    .icon-box {
        width: 56px; height: 56px;
        display: flex; align-items: center; justify-content: center;
        border-radius: 16px; font-size: 1.5rem; color: white;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    /* Header Gradient Style */
    .card-header-gradient {
        background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
        position: relative;
    }
    
    /* Table Styling */
    .table-custom { min-width: 600px; }
    .table-custom thead th {
        font-size: 0.75rem; text-transform: uppercase;
        letter-spacing: 0.08em; font-weight: 700; color: #8898aa;
        background-color: #f8f9fe; border-bottom: 1px solid #e9ecef;
        padding: 1rem;
    }
    .table-custom tbody td {
        vertical-align: middle; padding: 1rem;
        border-bottom: 1px solid #f0f0f0;
    }
    .table-custom tbody tr:last-child td { border-bottom: none; }
</style>

<!-- Main Content (Wrapper is opened in sidebar.php) -->
<div class="container-fluid px-4 pb-5 flex-grow-1" style="background: linear-gradient(135deg, #eff3f9 0%, #dce4f1 100%);">
    
    <!-- Page Header (Modern Gradient Card) -->
    <div class="mb-5 pt-4">
        <div class="card border-0" style="background: linear-gradient(135deg, #131d3d 0%, #2a4ebb 100%); color: white; border-radius: 20px; box-shadow: 0 10px 40px rgba(78, 115, 223, 0.2);">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 style="margin: 0; font-size: 1.8rem; font-weight: 700;">
                            Hello, <?php echo htmlspecialchars($_SESSION['name']); ?>!
                        </h2>
                        <p style="margin: 0.5rem 0 0 0; font-size: 1rem; opacity: 0.9;">
                            <span class="d-inline-flex align-items-center justify-content-center rounded-circle bg-white bg-opacity-25 text-white me-2" style="width:26px;height:26px;">
                                <i class="fas fa-user-shield"></i>
                            </span>ADMIN – System Overview
                        </p>
                    </div>
                    
                    <!-- Breadcrumb integrated into header -->
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row g-4 mb-5">
        <div class="col-xl-3 col-md-6">
            <div class="card dashboard-card h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-uppercase fw-bold text-muted small mb-1">Total Students</div>
                            <div class="h2 mb-0 fw-bold text-dark">1,250</div>
                        </div>
                        <div class="icon-box bg-gradient-primary"><i class="fas fa-user-graduate"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card dashboard-card h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-uppercase fw-bold text-muted small mb-1">Total Faculty</div>
                            <div class="h2 mb-0 fw-bold text-dark">120</div>
                        </div>
                        <div class="icon-box bg-gradient-success"><i class="fas fa-chalkboard-teacher"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card dashboard-card h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-uppercase fw-bold text-muted small mb-1">Active Courses</div>
                            <div class="h2 mb-0 fw-bold text-dark">45</div>
                        </div>
                        <div class="icon-box bg-gradient-info"><i class="fas fa-book-open"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card dashboard-card h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-uppercase fw-bold text-muted small mb-1">Departments</div>
                            <div class="h2 mb-0 fw-bold text-dark">8</div>
                        </div>
                        <div class="icon-box bg-gradient-warning"><i class="fas fa-building"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity Table -->
    <div class="card dashboard-card mb-5">
        <div class="card-header card-header-gradient border-0 py-4 px-4 d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center text-white">
                <div class="bg-white bg-opacity-25 rounded-3 p-2 me-3">
                    <i class="fas fa-table fs-4 text-white"></i>
                </div>
                <div>
                    <h5 class="mb-0 fw-bold">Recent Activity</h5>
                    <small class="opacity-75">Latest registrations and updates</small>
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-custom table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4">ID</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Department</th>
                            <th>Date Added</th>
                            <th class="text-center pe-4">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="ps-4"><span class="fw-bold text-secondary">#STU001</span></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle text-center fw-bold me-2" style="width:32px; height:32px; line-height:32px; font-size:0.8rem;">MW</div>
                                    <span class="fw-bold text-dark">Mark Williams</span>
                                </div>
                            </td>
                            <td><span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3">Student</span></td>
                            <td class="text-muted">Computer Science</td>
                            <td class="text-muted small">2023-10-24</td>
                            <td class="text-center pe-4"><span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3"><i class="fas fa-check-circle me-1"></i> Active</span></td>
                        </tr>
                        <tr>
                            <td class="ps-4"><span class="fw-bold text-secondary">#FAC023</span></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-success bg-opacity-10 text-success rounded-circle text-center fw-bold me-2" style="width:32px; height:32px; line-height:32px; font-size:0.8rem;">SJ</div>
                                    <span class="fw-bold text-dark">Dr. Sarah Jenkins</span>
                                </div>
                            </td>
                            <td><span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3">Faculty</span></td>
                            <td class="text-muted">Mathematics</td>
                            <td class="text-muted small">2023-10-23</td>
                            <td class="text-center pe-4"><span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3"><i class="fas fa-check-circle me-1"></i> Active</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<?php include '../includes/footer.php'; ?>
