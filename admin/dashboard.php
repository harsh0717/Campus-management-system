<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<!-- MAIN DASHBOARD CONTENT -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
    
    <!-- Page Header -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
        <h1 class="h2">Admin Dashboard</h1>
        <!-- Buttons removed as requested -->
    </div>

    <!-- Dashboard Cards -->
    <div class="row g-4 mb-4">
        <!-- Card 1: Students -->
        <div class="col-xl-3 col-md-6">
            <div class="card text-white bg-primary h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col me-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1 opacity-75">
                                Total Students</div>
                            <div class="h3 mb-0 fw-bold">1,250</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-graduate fa-2x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2: Faculty -->
        <div class="col-xl-3 col-md-6">
            <div class="card text-white bg-success h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col me-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1 opacity-75">
                                Total Faculty</div>
                            <div class="h3 mb-0 fw-bold">120</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chalkboard-teacher fa-2x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3: Courses -->
        <div class="col-xl-3 col-md-6">
            <div class="card text-white bg-info h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col me-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1 opacity-75">
                                Active Courses</div>
                            <div class="h3 mb-0 fw-bold">45</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book-open fa-2x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 4: Departments -->
        <div class="col-xl-3 col-md-6">
            <div class="card text-white bg-warning h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col me-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1 opacity-75">
                                Departments</div>
                            <div class="h3 mb-0 fw-bold text-dark">8</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-building fa-2x opacity-50 text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity Table -->
    <div class="card shadow-sm mb-4">
        <div class="card-header py-3 bg-white">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-table me-1"></i> Recent Activity
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Department</th>
                            <th>Date Added</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#STU001</td>
                            <td><strong>Mark Williams</strong></td>
                            <td><span class="badge bg-primary">Student</span></td>
                            <td>Computer Science</td>
                            <td>2023-10-24</td>
                            <td><span class="text-success"><i class="fas fa-check-circle"></i> Active</span></td>
                        </tr>
                        <tr>
                            <td>#FAC023</td>
                            <td><strong>Dr. Sarah Jenkins</strong></td>
                            <td><span class="badge bg-success">Faculty</span></td>
                            <td>Mathematics</td>
                            <td>2023-10-23</td>
                            <td><span class="text-success"><i class="fas fa-check-circle"></i> Active</span></td>
                        </tr>
                        <tr>
                            <td>#STU002</td>
                            <td><strong>Emily Davis</strong></td>
                            <td><span class="badge bg-primary">Student</span></td>
                            <td>Physics</td>
                            <td>2023-10-22</td>
                            <td><span class="text-warning"><i class="fas fa-clock"></i> Pending</span></td>
                        </tr>
                        <tr>
                            <td>#STU003</td>
                            <td><strong>Michael Brown</strong></td>
                            <td><span class="badge bg-primary">Student</span></td>
                            <td>History</td>
                            <td>2023-10-21</td>
                            <td><span class="text-danger"><i class="fas fa-times-circle"></i> Inactive</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php include '../includes/footer.php'; ?>