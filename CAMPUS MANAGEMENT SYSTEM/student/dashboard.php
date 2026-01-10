<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<!-- MAIN CONTENT -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
    
    <!-- Page Header -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
        <div>
            <h1 class="h2">Student Dashboard</h1>
            <p class="text-muted mb-0">Welcome back, Mark! Here's your academic overview.</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button type="button" class="btn btn-sm btn-outline-secondary">
                <i class="fas fa-calendar-alt me-1"></i> Oct 2023
            </button>
        </div>
    </div>

    <!-- Section 1: Overview Cards -->
    <div class="row g-4 mb-4">
        <!-- Card 1: Attendance -->
        <div class="col-xl-3 col-md-6">
            <div class="card shadow-sm border-0 border-start border-4 border-primary h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="text-muted small text-uppercase fw-bold">Attendance</div>
                        <i class="fas fa-user-clock text-primary fa-lg opacity-50"></i>
                    </div>
                    <div class="h3 fw-bold mb-1">85%</div>
                    <div class="progress" style="height: 6px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 85%"></div>
                    </div>
                    <small class="text-muted mt-2 d-block">Overall average</small>
                </div>
            </div>
        </div>

        <!-- Card 2: Subjects -->
        <div class="col-xl-3 col-md-6">
            <div class="card shadow-sm border-0 border-start border-4 border-info h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="text-muted small text-uppercase fw-bold">Subjects</div>
                        <i class="fas fa-book text-info fa-lg opacity-50"></i>
                    </div>
                    <div class="h3 fw-bold mb-1">6</div>
                    <div class="text-success small fw-bold">
                        <i class="fas fa-check me-1"></i> All Enrolled
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3: Upcoming Exams -->
        <div class="col-xl-3 col-md-6">
            <div class="card shadow-sm border-0 border-start border-4 border-warning h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="text-muted small text-uppercase fw-bold">Next Exam</div>
                        <i class="fas fa-pen-alt text-warning fa-lg opacity-50"></i>
                    </div>
                    <div class="h4 fw-bold mb-0">Physics 101</div>
                    <small class="text-danger fw-bold">
                        <i class="fas fa-clock me-1"></i> In 3 Days
                    </small>
                </div>
            </div>
        </div>

        <!-- Card 4: Result Status -->
        <div class="col-xl-3 col-md-6">
            <div class="card shadow-sm border-0 border-start border-4 border-success h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="text-muted small text-uppercase fw-bold">Last GPA</div>
                        <i class="fas fa-award text-success fa-lg opacity-50"></i>
                    </div>
                    <div class="h3 fw-bold mb-1">3.8</div>
                    <div class="text-success small fw-bold">
                        <i class="fas fa-arrow-up me-1"></i> Excellent
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <!-- Left Column: Results & Attendance List -->
        <div class="col-lg-8">
            
            <!-- Section 2: Recent Results -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 fw-bold text-dark"><i class="fas fa-poll me-2 text-primary"></i>Recent Results</h6>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">Subject</th>
                                    <th>Exam Type</th>
                                    <th>Marks</th>
                                    <th>Grade</th>
                                    <th class="text-end pe-4">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="ps-4 fw-bold">Mathematics</td>
                                    <td>Mid-Term</td>
                                    <td>88/100</td>
                                    <td>A</td>
                                    <td class="text-end pe-4"><span class="badge bg-success">Passed</span></td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">Computer Science</td>
                                    <td>Practical</td>
                                    <td>45/50</td>
                                    <td>A+</td>
                                    <td class="text-end pe-4"><span class="badge bg-success">Passed</span></td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">History</td>
                                    <td>Quiz 1</td>
                                    <td>18/20</td>
                                    <td>A-</td>
                                    <td class="text-end pe-4"><span class="badge bg-success">Passed</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Section 3: Attendance Summary -->
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 fw-bold text-dark"><i class="fas fa-clipboard-list me-2 text-info"></i>Subject Attendance</h6>
                </div>
                <div class="card-body">
                    <!-- Subject 1 -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="fw-bold text-dark">Computer Science</span>
                            <span class="text-success fw-bold">92%</span>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 92%"></div>
                        </div>
                    </div>
                    <!-- Subject 2 -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="fw-bold text-dark">Mathematics</span>
                            <span class="text-success fw-bold">85%</span>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 85%"></div>
                        </div>
                    </div>
                    <!-- Subject 3 -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="fw-bold text-dark">Physics</span>
                            <span class="text-warning fw-bold">74%</span>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 74%"></div>
                        </div>
                    </div>
                     <!-- Subject 4 -->
                     <div>
                        <div class="d-flex justify-content-between mb-1">
                            <span class="fw-bold text-dark">English</span>
                            <span class="text-danger fw-bold">60%</span>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 60%"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Right Column: Notifications -->
        <div class="col-lg-4">
            <!-- Section 4: Notifications -->
            <div class="card shadow-sm h-100">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 fw-bold text-dark"><i class="fas fa-bell me-2 text-warning"></i>Notifications</h6>
                </div>
                <div class="list-group list-group-flush">
                    <!-- Notice 1 -->
                    <a href="#" class="list-group-item list-group-item-action py-3">
                        <div class="d-flex w-100 justify-content-between align-items-center mb-1">
                            <strong class="text-dark">Mid-Sem Exams</strong>
                            <small class="text-muted">2 hrs ago</small>
                        </div>
                        <p class="mb-1 text-secondary small">The schedule for mid-semester exams has been released. Check the exam section.</p>
                    </a>
                    <!-- Notice 2 -->
                    <a href="#" class="list-group-item list-group-item-action py-3">
                        <div class="d-flex w-100 justify-content-between align-items-center mb-1">
                            <strong class="text-dark">Holiday Notice</strong>
                            <small class="text-muted">Yesterday</small>
                        </div>
                        <p class="mb-1 text-secondary small">College will remain closed on Friday due to a public holiday.</p>
                    </a>
                    <!-- Notice 3 -->
                    <a href="#" class="list-group-item list-group-item-action py-3">
                        <div class="d-flex w-100 justify-content-between align-items-center mb-1">
                            <strong class="text-dark">Assignment Due</strong>
                            <small class="text-muted">2 days ago</small>
                        </div>
                        <p class="mb-1 text-secondary small">Physics assignment submission deadline is extended by one day.</p>
                    </a>
                    <div class="p-3 text-center">
                        <button class="btn btn-sm btn-outline-primary w-100">View All Notifications</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include '../includes/footer.php'; ?>