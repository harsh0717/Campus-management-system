<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar-faculty.php'; ?>

<!-- Page Specific CSS -->
<style>
    
    .dashboard-header {
        background: #fff;
        padding: 1.5rem 2rem;
        border-bottom: 1px solid #eef2f7;
        margin-bottom: 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .welcome-text h1 {
        font-size: 1.5rem;
        font-weight: 700;
        color: #34495e;
        margin-bottom: 0.25rem;
    }
    .welcome-text p {
        color: #7f8c8d;
        font-size: 0.9rem;
        margin: 0;
    }

    /* 3. Stats Cards - "International CMS Style" */
    .stat-card {
        background: #fff;
        border-radius: 12px;
        padding: 1.5rem;
        border: 1px solid #eef2f7;
        box-shadow: 0 2px 6px rgba(0,0,0,0.02);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
        position: relative;
        overflow: hidden;
    }
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    }
    /* Colored top accent lines */
    .stat-card.blue { border-top: 4px solid #3498db; }
    .stat-card.green { border-top: 4px solid #2ecc71; }
    .stat-card.orange { border-top: 4px solid #f39c12; }
    .stat-card.purple { border-top: 4px solid #9b59b6; }

    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        margin-bottom: 1rem;
    }
    .bg-light-blue { background: #eaf6fd; color: #3498db; }
    .bg-light-green { background: #eafaf1; color: #2ecc71; }
    .bg-light-orange { background: #fef5e7; color: #f39c12; }
    .bg-light-purple { background: #f5eef8; color: #9b59b6; }

    .stat-value {
        font-size: 1.75rem;
        font-weight: 800;
        color: #2c3e50;
        margin-bottom: 0.25rem;
    }
    .stat-label {
        color: #95a5a6;
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* 4. Content Sections */
    .content-card {
        background: #fff;
        border-radius: 12px;
        border: 1px solid #eef2f7;
        box-shadow: 0 4px 12px rgba(0,0,0,0.03);
        margin-bottom: 2rem;
        overflow: hidden;
    }
    .card-head {
        padding: 1.25rem 1.5rem;
        border-bottom: 1px solid #f1f3f6;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #fdfdfe;
    }
    .card-title {
        font-size: 1rem;
        font-weight: 700;
        color: #34495e;
        margin: 0;
        display: flex;
        align-items: center;
    }
    .card-title i { margin-right: 10px; color: #3498db; }

    /* Table Styling */
    .table-modern {
        width: 100%;
        margin-bottom: 0;
    }
    .table-modern thead th {
        background: #f8f9fa;
        color: #7f8c8d;
        font-weight: 600;
        font-size: 0.8rem;
        text-transform: uppercase;
        padding: 1rem 1.5rem;
        border-bottom: 2px solid #eef2f7;
    }
    .table-modern tbody td {
        padding: 1.25rem 1.5rem;
        vertical-align: middle;
        color: #555;
        border-bottom: 1px solid #f1f3f6;
        font-size: 0.95rem;
    }
    .table-modern tbody tr:last-child td { border-bottom: none; }
    .table-modern tbody tr:hover { background-color: #fafbfd; }

    /* Action Buttons */
    .btn-action-sm {
        padding: 0.4rem 0.8rem;
        font-size: 0.85rem;
        border-radius: 6px;
        transition: all 0.2s;
    }
    .btn-soft-primary { background: #eaf6fd; color: #3498db; border: none; font-weight: 600; }
    .btn-soft-primary:hover { background: #3498db; color: #fff; }

    /* Notification List Item */
    .notify-item {
        padding: 1rem 1.5rem;
        border-bottom: 1px solid #f1f3f6;
        transition: background 0.2s;
        text-decoration: none;
        display: block;
    }
    .notify-item:last-child { border-bottom: none; }
    .notify-item:hover { background-color: #fafbfd; }
    .notify-title { font-weight: 600; color: #2c3e50; font-size: 0.95rem; margin-bottom: 0.2rem; }
    .notify-meta { font-size: 0.8rem; color: #95a5a6; display: flex; align-items: center; }
    .notify-meta i { margin-right: 5px; font-size: 0.7rem; }

</style>

<!-- Main Content Wrapper (Opened in sidebar.php) -->
<!-- The .main-content class in faculty_sidebar.php handles the margin transition -->
<div class="container-fluid p-0" style="background-color: #f4f6f9; min-height: 100vh;">
    
    <!-- 1. Page Header Section -->
    <div class="dashboard-header">
        <div class="welcome-text">
            <h1>Faculty Dashboard</h1>
            <p>Welcome back, Prof. Smith! Here is your daily academic overview.</p>
        </div>
        <div class="d-flex gap-3">
            <button class="btn btn-outline-secondary d-flex align-items-center bg-white shadow-sm border-0">
                <i class="fas fa-calendar-alt me-2 text-primary"></i>
                <span class="fw-bold text-dark"><?php echo date('F j, Y'); ?></span>
            </button>
            <a href="mark_attendance.php" class="btn btn-primary d-flex align-items-center shadow-sm px-4 fw-bold">
                <i class="fas fa-plus-circle me-2"></i> Mark Today's Attendance
            </a>
        </div>
    </div>

    <div class="px-4 pb-5">
        <!-- 2. Stats Grid -->
        <div class="row g-4 mb-5">
            <!-- Card 1 -->
            <div class="col-xl-3 col-md-6">
                <div class="stat-card blue">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="stat-value">4</div>
                            <div class="stat-label">Assigned Courses</div>
                        </div>
                        <div class="stat-icon bg-light-blue">
                            <i class="fas fa-book"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="col-xl-3 col-md-6">
                <div class="stat-card green">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="stat-value">145</div>
                            <div class="stat-label">Total Students</div>
                        </div>
                        <div class="stat-icon bg-light-green">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="col-xl-3 col-md-6">
                <div class="stat-card orange">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="stat-value">2</div>
                            <div class="stat-label">Classes Today</div>
                        </div>
                        <div class="stat-icon bg-light-orange">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 4 -->
            <div class="col-xl-3 col-md-6">
                <div class="stat-card purple">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="stat-value">12</div>
                            <div class="stat-label">Pending Reviews</div>
                        </div>
                        <div class="stat-icon bg-light-purple">
                            <i class="fas fa-tasks"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <!-- 3. Upcoming Schedule Table (Left Large Column) -->
            <div class="col-lg-8">
                <div class="content-card h-100">
                    <div class="card-head">
                        <h3 class="card-title"><i class="fas fa-clock"></i> Today's Schedule</h3>
                        <a href="#" class="btn btn-sm btn-light text-muted fw-bold">View Full Timetable</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table-modern">
                            <thead>
                                <tr>
                                    <th>Time</th>
                                    <th>Course</th>
                                    <th>Room</th>
                                    <th>Status</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="fw-bold text-dark">09:00 AM - 10:30 AM</td>
                                    <td>
                                        <div class="fw-bold">CS101 - Intro to Programming</div>
                                        <div class="small text-muted">Section A</div>
                                    </td>
                                    <td><span class="badge bg-light text-dark border">Lab 304</span></td>
                                    <td><span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3">Completed</span></td>
                                    <td class="text-end">
                                        <a href="mark_attendance.php" class="btn btn-action-sm btn-soft-primary">View</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-dark">11:00 AM - 12:30 PM</td>
                                    <td>
                                        <div class="fw-bold">CS202 - Data Structures</div>
                                        <div class="small text-muted">Section B</div>
                                    </td>
                                    <td><span class="badge bg-light text-dark border">Room 102</span></td>
                                    <td><span class="badge bg-warning bg-opacity-10 text-warning rounded-pill px-3">Upcoming</span></td>
                                    <td class="text-end">
                                        <a href="mark_attendance.php" class="btn btn-action-sm btn-soft-primary">Mark Attendance</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-dark">02:00 PM - 03:30 PM</td>
                                    <td>
                                        <div class="fw-bold">CS305 - Web Development</div>
                                        <div class="small text-muted">Section A</div>
                                    </td>
                                    <td><span class="badge bg-light text-dark border">Lab 201</span></td>
                                    <td><span class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill px-3">Scheduled</span></td>
                                    <td class="text-end">
                                        <button class="btn btn-action-sm btn-soft-primary disabled">Wait</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- 4. Notifications & Quick Links (Right Small Column) -->
            <div class="col-lg-4">
                <!-- Notifications -->
                <div class="content-card mb-4">
                    <div class="card-head">
                        <h3 class="card-title"><i class="fas fa-bell"></i> Latest Updates</h3>
                    </div>
                    <div class="notification-list">
                        <a href="#" class="notify-item">
                            <div class="notify-title">Faculty Meeting Rescheduled</div>
                            <div class="notify-meta"><i class="far fa-clock"></i> 2 hours ago</div>
                        </a>
                        <a href="#" class="notify-item">
                            <div class="notify-title">Submit Mid-term Grades</div>
                            <div class="notify-meta"><i class="far fa-clock"></i> Yesterday</div>
                        </a>
                        <a href="#" class="notify-item">
                            <div class="notify-title">System Maintenance Alert</div>
                            <div class="notify-meta"><i class="far fa-clock"></i> 2 days ago</div>
                        </a>
                    </div>
                    <div class="p-3 text-center border-top">
                        <a href="notifications.php" class="text-decoration-none fw-bold small text-primary">View All Notifications</a>
                    </div>
                </div>

                <!-- Quick Tools -->
                <div class="content-card">
                    <div class="card-head">
                        <h3 class="card-title"><i class="fas fa-tools"></i> Quick Tools</h3>
                    </div>
                    <div class="p-4">
                        <div class="d-grid gap-3">
                            <a href="upload_results.php" class="btn btn-outline-dark text-start p-3 border-2" style="border-radius: 10px;">
                                <i class="fas fa-file-upload me-2 text-success"></i> Upload Exam Results
                            </a>
                            <a href="#" class="btn btn-outline-dark text-start p-3 border-2" style="border-radius: 10px;">
                                <i class="fas fa-envelope me-2 text-warning"></i> Email Students
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>