<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>
<?php include 'navbar.php'; ?>

<!-- Custom CSS (Matching Analytics Page) -->
<style>
    /* Card & Layout Styles */
    .dashboard-card {
        border: none;
        border-radius: 20px;
        background-color: #fff;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        overflow: hidden;
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
    
    /* Header Gradient Style */
    .card-header-gradient {
        background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
        position: relative;
    }

    /* Icon styling */
    .icon-box {
        width: 56px;
        height: 56px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 16px;
        font-size: 1.5rem;
        color: white;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    
    /* Table Styling */
    .table-custom thead th {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        font-weight: 700;
        color: #8898aa;
        background-color: #f8f9fe;
        border-bottom: 1px solid #e9ecef;
        padding: 1rem;
    }
    .table-custom tbody td {
        vertical-align: middle;
        padding: 1rem;
        border-bottom: 1px solid #f0f0f0;
    }
    .table-custom tbody tr:last-child td {
        border-bottom: none;
    }
</style>

<!-- Main Content with Gradient Background -->
<div class="container-fluid px-4 pb-5" style="background: linear-gradient(135deg, #eff3f9 0%, #dce4f1 100%); min-height: 100vh;">
    
    <!-- 1. Page Header -->
    <div class="d-flex justify-content-between align-items-center pt-4 mb-5">
        <div>
            <h1 class="h2 fw-bold text-dark mb-1">Admin Dashboard</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted small">Home</a></li>
                    <li class="breadcrumb-item active small" aria-current="page">Overview</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- 2. Dashboard Cards (Refactored to New Style) -->
    <div class="row g-4 mb-5">
        <!-- Card 1: Students -->
        <div class="col-xl-3 col-md-6">
            <div class="card dashboard-card h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-uppercase fw-bold text-muted small mb-1 tracking-wide">Total Students</div>
                            <div class="h2 mb-0 fw-bold text-dark">1,250</div>
                        </div>
                        <div class="icon-box bg-gradient-primary">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2: Faculty -->
        <div class="col-xl-3 col-md-6">
            <div class="card dashboard-card h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-uppercase fw-bold text-muted small mb-1 tracking-wide">Total Faculty</div>
                            <div class="h2 mb-0 fw-bold text-dark">120</div>
                        </div>
                        <div class="icon-box bg-gradient-success">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3: Courses -->
        <div class="col-xl-3 col-md-6">
            <div class="card dashboard-card h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-uppercase fw-bold text-muted small mb-1 tracking-wide">Active Courses</div>
                            <div class="h2 mb-0 fw-bold text-dark">45</div>
                        </div>
                        <div class="icon-box bg-gradient-info">
                            <i class="fas fa-book-open"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 4: Departments -->
        <div class="col-xl-3 col-md-6">
            <div class="card dashboard-card h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-uppercase fw-bold text-muted small mb-1 tracking-wide">Departments</div>
                            <div class="h2 mb-0 fw-bold text-dark">8</div>
                        </div>
                        <div class="icon-box bg-gradient-warning">
                            <i class="fas fa-building"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 3. Recent Activity Table -->
    <div class="card dashboard-card mb-5">
        <!-- Vibrant Gradient Header -->
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
                        <tr>
                            <td class="ps-4"><span class="fw-bold text-secondary">#STU002</span></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle text-center fw-bold me-2" style="width:32px; height:32px; line-height:32px; font-size:0.8rem;">ED</div>
                                    <span class="fw-bold text-dark">Emily Davis</span>
                                </div>
                            </td>
                            <td><span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3">Student</span></td>
                            <td class="text-muted">Physics</td>
                            <td class="text-muted small">2023-10-22</td>
                            <td class="text-center pe-4"><span class="badge bg-warning bg-opacity-10 text-warning rounded-pill px-3"><i class="fas fa-clock me-1"></i> Pending</span></td>
                        </tr>
                        <tr>
                            <td class="ps-4"><span class="fw-bold text-secondary">#STU003</span></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle text-center fw-bold me-2" style="width:32px; height:32px; line-height:32px; font-size:0.8rem;">MB</div>
                                    <span class="fw-bold text-dark">Michael Brown</span>
                                </div>
                            </td>
                            <td><span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3">Student</span></td>
                            <td class="text-muted">History</td>
                            <td class="text-muted small">2023-10-21</td>
                            <td class="text-center pe-4"><span class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-3"><i class="fas fa-times-circle me-1"></i> Inactive</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<?php include '../includes/footer.php'; ?>