<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="content-wrapper p-4">
    <!-- Page Header & Filter -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-primary"><i class="fas fa-poll me-2"></i>My Results</h2>
            <p class="text-muted mb-0">View your academic performance and grades.</p>
        </div>
        <div class="d-flex align-items-center">
            <label for="semesterSelect" class="me-2 fw-semibold text-secondary">Semester:</label>
            <select class="form-select w-auto" id="semesterSelect">
                <option value="1">Semester 1</option>
                <option value="2">Semester 2</option>
                <option value="3" selected>Semester 3</option>
                <option value="4">Semester 4</option>
                <option value="5">Semester 5</option>
                <option value="6">Semester 6</option>
            </select>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="row g-3 mb-4">
        <!-- GPA Card -->
        <div class="col-md-6 col-xl-3">
            <div class="card shadow-sm border-0 border-start border-4 border-primary h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted mb-1 text-uppercase fw-bold" style="font-size: 0.8rem;">Overall GPA</p>
                            <h3 class="mb-0 fw-bold text-dark">8.5</h3>
                        </div>
                        <div class="bg-primary bg-opacity-10 p-3 rounded-circle text-primary">
                            <i class="fas fa-chart-line fa-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Subjects Passed -->
        <div class="col-md-6 col-xl-3">
            <div class="card shadow-sm border-0 border-start border-4 border-success h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted mb-1 text-uppercase fw-bold" style="font-size: 0.8rem;">Subjects Passed</p>
                            <h3 class="mb-0 fw-bold text-dark">5</h3>
                        </div>
                        <div class="bg-success bg-opacity-10 p-3 rounded-circle text-success">
                            <i class="fas fa-check-circle fa-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Subjects Failed -->
        <div class="col-md-6 col-xl-3">
            <div class="card shadow-sm border-0 border-start border-4 border-danger h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted mb-1 text-uppercase fw-bold" style="font-size: 0.8rem;">Subjects Failed</p>
                            <h3 class="mb-0 fw-bold text-dark">0</h3>
                        </div>
                        <div class="bg-danger bg-opacity-10 p-3 rounded-circle text-danger">
                            <i class="fas fa-exclamation-triangle fa-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Result Status -->
        <div class="col-md-6 col-xl-3">
            <div class="card shadow-sm border-0 border-start border-4 border-info h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted mb-1 text-uppercase fw-bold" style="font-size: 0.8rem;">Result Status</p>
                            <h4 class="mb-0 fw-bold text-success">PASSED</h4>
                        </div>
                        <div class="bg-info bg-opacity-10 p-3 rounded-circle text-info">
                            <i class="fas fa-graduation-cap fa-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Results Table -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 border-bottom">
            <h5 class="mb-0 text-secondary fw-bold">Detailed Performance</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light text-secondary">
                        <tr>
                            <th class="ps-4" width="30%">Subject</th>
                            <th width="15%">Exam Type</th>
                            <th width="15%" class="text-center">Marks</th>
                            <th width="15%" class="text-center">Grade</th>
                            <th width="25%" class="text-end pe-4">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Subject 1 -->
                        <tr>
                            <td class="ps-4">
                                <div class="fw-bold text-dark">Data Structures</div>
                                <small class="text-muted">CS-301</small>
                            </td>
                            <td><span class="badge bg-secondary">Final</span></td>
                            <td class="text-center fw-bold">85/100</td>
                            <td class="text-center"><span class="badge bg-light text-dark border">A+</span></td>
                            <td class="text-end pe-4">
                                <span class="badge rounded-pill bg-success px-3">PASS</span>
                            </td>
                        </tr>

                        <!-- Subject 2 -->
                        <tr>
                            <td class="ps-4">
                                <div class="fw-bold text-dark">Database Management</div>
                                <small class="text-muted">CS-302</small>
                            </td>
                            <td><span class="badge bg-secondary">Final</span></td>
                            <td class="text-center fw-bold">78/100</td>
                            <td class="text-center"><span class="badge bg-light text-dark border">A</span></td>
                            <td class="text-end pe-4">
                                <span class="badge rounded-pill bg-success px-3">PASS</span>
                            </td>
                        </tr>

                        <!-- Subject 3 -->
                        <tr>
                            <td class="ps-4">
                                <div class="fw-bold text-dark">Operating Systems</div>
                                <small class="text-muted">CS-303</small>
                            </td>
                            <td><span class="badge bg-secondary">Final</span></td>
                            <td class="text-center fw-bold">92/100</td>
                            <td class="text-center"><span class="badge bg-light text-dark border">O</span></td>
                            <td class="text-end pe-4">
                                <span class="badge rounded-pill bg-success px-3">PASS</span>
                            </td>
                        </tr>

                        <!-- Subject 4 -->
                        <tr>
                            <td class="ps-4">
                                <div class="fw-bold text-dark">Mathematics III</div>
                                <small class="text-muted">MA-301</small>
                            </td>
                            <td><span class="badge bg-secondary">Final</span></td>
                            <td class="text-center fw-bold">65/100</td>
                            <td class="text-center"><span class="badge bg-light text-dark border">B</span></td>
                            <td class="text-end pe-4">
                                <span class="badge rounded-pill bg-success px-3">PASS</span>
                            </td>
                        </tr>

                        <!-- Subject 5 (Mock Fail/Low Mark example if needed, currently passing per requirement) -->
                        <tr>
                            <td class="ps-4">
                                <div class="fw-bold text-dark">Digital Electronics</div>
                                <small class="text-muted">EC-301</small>
                            </td>
                            <td><span class="badge bg-secondary">Final</span></td>
                            <td class="text-center fw-bold">70/100</td>
                            <td class="text-center"><span class="badge bg-light text-dark border">B+</span></td>
                            <td class="text-end pe-4">
                                <span class="badge rounded-pill bg-success px-3">PASS</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>