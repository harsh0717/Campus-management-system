<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<!-- MAIN CONTENT -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
    
    <!-- Page Header -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
        <div>
            <h1 class="h2">Faculty Dashboard</h1>
            <p class="text-muted mb-0">Hello, Prof. Smith! Manage your classes and students.</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <span class="badge bg-primary d-flex align-items-center me-3 px-3">
                <i class="fas fa-calendar-day me-2"></i> 2 Classes Scheduled Today
            </span>
            <button type="button" class="btn btn-sm btn-outline-primary">
                <i class="fas fa-calendar-week me-1"></i> View Timetable
            </button>
        </div>
    </div>

    <!-- Section 1: Overview Cards -->
    <div class="row g-4 mb-4">
        <!-- Card 1: Assigned Courses -->
        <div class="col-xl-3 col-md-6">
            <div class="card shadow-sm border-0 border-start border-4 border-primary h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="text-muted small text-uppercase fw-bold">Assigned Courses</div>
                        <i class="fas fa-book-reader text-primary fa-lg opacity-50"></i>
                    </div>
                    <div class="h3 fw-bold mb-1">4</div>
                    <small class="text-muted">Active this semester</small>
                </div>
            </div>
        </div>

        <!-- Card 2: Total Students -->
        <div class="col-xl-3 col-md-6">
            <div class="card shadow-sm border-0 border-start border-4 border-success h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="text-muted small text-uppercase fw-bold">Total Students</div>
                        <i class="fas fa-users text-success fa-lg opacity-50"></i>
                    </div>
                    <div class="h3 fw-bold mb-1">145</div>
                    <small class="text-muted">Across all courses</small>
                </div>
            </div>
        </div>

        <!-- Card 3: Today's Classes -->
        <div class="col-xl-3 col-md-6">
            <div class="card shadow-sm border-0 border-start border-4 border-warning h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="text-muted small text-uppercase fw-bold">Today's Classes</div>
                        <i class="fas fa-chalkboard-teacher text-warning fa-lg opacity-50"></i>
                    </div>
                    <div class="h3 fw-bold mb-1">2</div>
                    <small class="text-danger fw-bold">
                        <i class="fas fa-clock me-1"></i> Next in 30 mins
                    </small>
                </div>
            </div>
        </div>

        <!-- Card 4: Pending Results -->
        <div class="col-xl-3 col-md-6">
            <div class="card shadow-sm border-0 border-start border-4 border-danger h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="text-muted small text-uppercase fw-bold">Pending Results</div>
                        <i class="fas fa-file-signature text-danger fa-lg opacity-50"></i>
                    </div>
                    <div class="h3 fw-bold mb-1">1</div>
                    <small class="text-muted">Mid-term evaluation</small>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <!-- Left Column: Assigned Courses List -->
        <div class="col-lg-8">
            
            <!-- Section 2: Assigned Courses List -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 fw-bold text-dark"><i class="fas fa-list me-2 text-primary"></i>Assigned Courses</h6>
                    <a href="#" class="text-decoration-none small fw-bold">View All</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">Course Name</th>
                                    <th>Sem</th>
                                    <th>Dept</th>
                                    <th>Status</th>
                                    <th class="text-end pe-4">Quick Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Course 1 -->
                                <tr>
                                    <td class="ps-4">
                                        <div class="fw-bold text-dark">Intro to Programming</div>
                                        <div class="small text-muted">CS101</div>
                                    </td>
                                    <td>1st</td>
                                    <td>CS</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td class="text-end pe-4">
                                        <button class="btn btn-sm btn-outline-info me-1" title="Mark Attendance">
                                            <i class="fas fa-check-circle"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-success" title="Upload Results">
                                            <i class="fas fa-upload"></i>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Course 2 -->
                                <tr>
                                    <td class="ps-4">
                                        <div class="fw-bold text-dark">Data Structures</div>
                                        <div class="small text-muted">CS202</div>
                                    </td>
                                    <td>2nd</td>
                                    <td>CS</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td class="text-end pe-4">
                                        <button class="btn btn-sm btn-outline-info me-1" title="Mark Attendance">
                                            <i class="fas fa-check-circle"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-success" title="Upload Results">
                                            <i class="fas fa-upload"></i>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Course 3 -->
                                <tr>
                                    <td class="ps-4">
                                        <div class="fw-bold text-dark">Web Development</div>
                                        <div class="small text-muted">CS305</div>
                                    </td>
                                    <td>3rd</td>
                                    <td>CS</td>
                                    <td><span class="badge bg-warning text-dark">Upcoming</span></td>
                                    <td class="text-end pe-4">
                                        <button class="btn btn-sm btn-outline-secondary disabled me-1">
                                            <i class="fas fa-check-circle"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary disabled">
                                            <i class="fas fa-upload"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Quick Actions & Notifications -->
        <div class="col-lg-4">
            
            <!-- Section 3: Quick Actions -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 fw-bold text-dark"><i class="fas fa-bolt me-2 text-warning"></i>Quick Actions</h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-info text-start">
                            <i class="fas fa-calendar-check me-2"></i> Mark Attendance
                        </button>
                        <button class="btn btn-outline-success text-start">
                            <i class="fas fa-poll-h me-2"></i> Upload Results
                        </button>
                        <button class="btn btn-outline-primary text-start">
                            <i class="fas fa-file-alt me-2"></i> Generate Reports
                        </button>
                    </div>
                </div>
            </div>

            <!-- Section 4: Notifications -->
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 fw-bold text-dark"><i class="fas fa-bell me-2 text-info"></i>Notifications</h6>
                </div>
                <div class="list-group list-group-flush">
                    <a href="#" class="list-group-item list-group-item-action py-3">
                        <div class="d-flex w-100 justify-content-between align-items-center mb-1">
                            <strong class="text-dark">Exam Schedule</strong>
                            <small class="text-muted">Today</small>
                        </div>
                        <p class="mb-1 text-secondary small">Final exam dates for Semester 1 have been announced.</p>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action py-3">
                        <div class="d-flex w-100 justify-content-between align-items-center mb-1">
                            <strong class="text-dark">Dept. Meeting</strong>
                            <small class="text-muted">Yesterday</small>
                        </div>
                        <p class="mb-1 text-secondary small">Monthly faculty meeting is scheduled for Friday at 3 PM.</p>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action py-3">
                        <div class="d-flex w-100 justify-content-between align-items-center mb-1">
                            <strong class="text-dark">System Update</strong>
                            <small class="text-muted">2 days ago</small>
                        </div>
                        <p class="mb-1 text-secondary small">The grading portal will be down for maintenance on Sunday.</p>
                    </a>
                </div>
                <div class="card-footer bg-white text-center py-2">
                    <a href="#" class="text-decoration-none small">View All Notifications</a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include '../includes/footer.php'; ?>