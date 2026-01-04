<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<!-- MAIN CONTENT -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
    
    <!-- Page Header -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
        <div>
            <h1 class="h2">My Attendance</h1>
            <p class="text-muted">Track your presence across all enrolled subjects.</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <select class="form-select form-select-sm shadow-sm">
                <option selected>Current Semester (1st)</option>
                <option>Previous Semester</option>
            </select>
        </div>
    </div>

    <!-- Section: Attendance Summary Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 border-start border-4 border-primary">
                <div class="card-body">
                    <div class="text-muted small fw-bold text-uppercase">Overall Attendance</div>
                    <div class="h3 fw-bold mb-0">85.4%</div>
                    <div class="text-success small"><i class="fas fa-check-circle me-1"></i> Above 75% Criteria</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0 border-start border-4 border-info">
                <div class="card-body">
                    <div class="text-muted small fw-bold text-uppercase">Total Subjects</div>
                    <div class="h3 fw-bold mb-0">6</div>
                    <div class="text-muted small">Active in dashboard</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0 border-start border-4 border-warning">
                <div class="card-body">
                    <div class="text-muted small fw-bold text-uppercase">Alerts</div>
                    <div class="h3 fw-bold mb-0 text-warning">1</div>
                    <div class="text-muted small">Subject below 75%</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Detailed Attendance Table -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <h6 class="m-0 fw-bold text-dark"><i class="fas fa-table me-2 text-primary"></i>Subject-wise Breakdown</h6>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">Subject</th>
                            <th>Total Classes</th>
                            <th>Attended</th>
                            <th>Attendance %</th>
                            <th class="text-end pe-4">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="ps-4">
                                <div class="fw-bold">Computer Science</div>
                                <div class="small text-muted">CS101</div>
                            </td>
                            <td>40</td>
                            <td>37</td>
                            <td style="width: 200px;">
                                <div class="d-flex align-items-center">
                                    <div class="progress flex-grow-1 me-2" style="height: 6px;">
                                        <div class="progress-bar bg-success" style="width: 92%"></div>
                                    </div>
                                    <span class="small fw-bold">92%</span>
                                </div>
                            </td>
                            <td class="text-end pe-4"><span class="badge bg-success">Good</span></td>
                        </tr>
                        <tr>
                            <td class="ps-4">
                                <div class="fw-bold">Mathematics</div>
                                <div class="small text-muted">MAT201</div>
                            </td>
                            <td>30</td>
                            <td>26</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="progress flex-grow-1 me-2" style="height: 6px;">
                                        <div class="progress-bar bg-success" style="width: 86%"></div>
                                    </div>
                                    <span class="small fw-bold">86%</span>
                                </div>
                            </td>
                            <td class="text-end pe-4"><span class="badge bg-success">Good</span></td>
                        </tr>
                        <tr>
                            <td class="ps-4">
                                <div class="fw-bold">Physics</div>
                                <div class="small text-muted">PHY102</div>
                            </td>
                            <td>25</td>
                            <td>16</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="progress flex-grow-1 me-2" style="height: 6px;">
                                        <div class="progress-bar bg-danger" style="width: 64%"></div>
                                    </div>
                                    <span class="small fw-bold">64%</span>
                                </div>
                            </td>
                            <td class="text-end pe-4"><span class="badge bg-danger">Short</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php include '../includes/footer.php'; ?>