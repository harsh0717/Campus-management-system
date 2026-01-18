<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar-faculty.php'; ?>

<!-- Page Specific CSS -->
<style>
    :root {
        --primary-color: #2c3e50;
        --secondary-color: #34495e;
        --accent-color: #3498db;
        --success-color: #2ecc71;
        --warning-color: #f1c40f;
        --danger-color: #e74c3c;
        --light-bg: #f8f9fa;
        --card-shadow: 0 4px 20px rgba(0,0,0,0.05);
        --hover-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    body {
        background-color: var(--light-bg);
        font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
    }

    /* --- Stats Cards --- */
    .stats-container {
        margin-top: 2rem; /* Adjusted spacing since Hero is removed */
        padding: 0 2rem;
    }

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

    .stat-number { font-size: 2rem; font-weight: 800; color: var(--primary-color); line-height: 1; }
    .stat-label { font-size: 0.85rem; color: #7f8c8d; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; margin-top: 5px; }
    .stat-trend { font-size: 0.75rem; font-weight: 600; margin-top: 0.5rem; display: flex; align-items: center; }
    .text-trend-up { color: var(--success-color); }
    
    /* --- Content Sections --- */
    .content-section { padding: 2rem; }
    
    .card-modern {
        background: white;
        border-radius: 16px;
        border: 1px solid rgba(0,0,0,0.03);
        box-shadow: var(--card-shadow);
        overflow: hidden;
        height: 100%;
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

    /* Timeline Table Style */
    .timeline-item {
        display: flex;
        padding: 1.25rem 1.5rem;
        border-bottom: 1px solid #f8f9fa;
        align-items: center;
        transition: background 0.2s;
    }
    .timeline-item:last-child { border-bottom: none; }
    .timeline-item:hover { background: #fafbfc; }

    .time-col { min-width: 130px; }
    .time-display { font-weight: 700; color: var(--primary-color); font-size: 0.95rem; }
    .duration-display { font-size: 0.75rem; color: #95a5a6; }

    .info-col { flex-grow: 1; padding: 0 1rem; }
    .course-title { font-weight: 600; color: var(--secondary-color); display: block; }
    .course-details { font-size: 0.85rem; color: #7f8c8d; display: flex; gap: 10px; align-items: center; margin-top: 4px; }
    .badge-room { background: #f0f2f5; color: #555; padding: 2px 8px; border-radius: 4px; font-size: 0.75rem; font-weight: 600; }

    .status-col { min-width: 100px; text-align: right; }

    /* Notification Feed */
    .notify-feed-item {
        padding: 1rem 1.5rem;
        border-left: 3px solid transparent;
        transition: all 0.2s;
        cursor: pointer;
    }
    .notify-feed-item:hover { background: #fcfcfc; border-left-color: var(--accent-color); }
    
    .notify-header { display: flex; justify-content: space-between; margin-bottom: 0.25rem; }
    .notify-tag { font-size: 0.7rem; font-weight: 700; text-transform: uppercase; padding: 2px 6px; border-radius: 4px; }
    .tag-admin { background: #e8f4fc; color: #3498db; }
    .tag-system { background: #fef9e7; color: #f1c40f; }
    
    .notify-body { font-size: 0.9rem; color: #555; line-height: 1.4; }
    .notify-time { font-size: 0.75rem; color: #aaa; margin-top: 0.5rem; }

    /* Action Grid */
    .action-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
        padding: 1.5rem;
    }
    .action-btn {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 1.5rem 1rem;
        background: white;
        border: 1px solid #eee;
        border-radius: 12px;
        text-decoration: none;
        color: var(--secondary-color);
        transition: all 0.3s;
        text-align: center;
    }
    .action-btn:hover {
        background: var(--primary-color);
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(44, 62, 80, 0.2);
    }
    .action-btn i { font-size: 1.5rem; margin-bottom: 0.5rem; color: var(--accent-color); transition: color 0.3s; }
    .action-btn:hover i { color: white; }
    .action-btn span { font-size: 0.85rem; font-weight: 600; }

</style>

<!-- Main Dashboard Container -->
<div class="container-fluid p-0">
    
    <!-- Hero Header Removed -->

    <!-- 2. Floating Stats Cards -->
    <div class="stats-container">
        <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-xl-3 col-md-6">
                <div class="stat-card">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="stat-number">4</div>
                            <div class="stat-label">Active Courses</div>
                            <div class="stat-trend text-trend-up">
                                <i class="fas fa-arrow-up me-1"></i> Current Semester
                            </div>
                        </div>
                        <div class="stat-icon-wrapper bg-soft-primary">
                            <i class="fas fa-book-open"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="col-xl-3 col-md-6">
                <div class="stat-card green">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="stat-number">145</div>
                            <div class="stat-label">Total Students</div>
                            <div class="stat-trend text-muted">
                                <small>Across all sections</small>
                            </div>
                        </div>
                        <div class="stat-icon-wrapper bg-soft-green">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="col-xl-3 col-md-6">
                <div class="stat-card orange">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="stat-number">2</div>
                            <div class="stat-label">Classes Today</div>
                            <div class="stat-trend text-muted">
                                <i class="far fa-clock me-1"></i> Next at 11:00 AM
                            </div>
                        </div>
                        <div class="stat-icon-wrapper bg-soft-orange">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 4 -->
            <div class="col-xl-3 col-md-6">
                <div class="stat-card purple">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="stat-number">98%</div>
                            <div class="stat-label">Avg. Attendance</div>
                            <div class="stat-trend text-trend-up">
                                <i class="fas fa-arrow-up me-1"></i> +2% vs Last Week
                            </div>
                        </div>
                        <div class="stat-icon-wrapper bg-soft-purple">
                            <i class="fas fa-chart-line"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 3. Main Content Grid -->
    <div class="content-section">
        <div class="row g-4">
            
            <!-- Left Column: Schedule -->
            <div class="col-lg-8">
                <div class="card-modern">
                    <div class="card-modern-header">
                        <h5 class="card-modern-title"><i class="far fa-calendar-alt text-primary"></i> Today's Schedule</h5>
                        <button class="btn btn-sm btn-light text-muted fw-bold rounded-pill px-3 border">View Calendar</button>
                    </div>
                    
                    <div class="timeline-container">
                        <!-- Item 1 (Done) -->
                        <div class="timeline-item">
                            <div class="time-col">
                                <div class="time-display">09:00 AM</div>
                                <div class="duration-display">90 mins</div>
                            </div>
                            <div class="info-col">
                                <span class="course-title">CS101 - Intro to Programming</span>
                                <div class="course-details">
                                    <span class="badge-room"><i class="fas fa-map-marker-alt me-1"></i> Lab 304</span>
                                    <span>• Section A</span>
                                </div>
                            </div>
                            <div class="status-col">
                                <span class="badge bg-light text-success border border-success px-3 py-2 rounded-pill">
                                    <i class="fas fa-check me-1"></i> Done
                                </span>
                            </div>
                            <div class="ms-3">
                                <a href="#" class="btn btn-sm btn-light border"><i class="fas fa-eye"></i></a>
                            </div>
                        </div>

                        <!-- Item 2 (Active/Next) -->
                        <div class="timeline-item bg-soft-primary bg-opacity-10">
                            <div class="time-col">
                                <div class="time-display text-primary">11:00 AM</div>
                                <div class="duration-display">90 mins</div>
                            </div>
                            <div class="info-col">
                                <span class="course-title text-primary">CS202 - Data Structures</span>
                                <div class="course-details">
                                    <span class="badge-room bg-white border"><i class="fas fa-map-marker-alt me-1"></i> Room 102</span>
                                    <span>• Section B</span>
                                </div>
                            </div>
                            <div class="status-col">
                                <a href="mark_attendance.php" class="btn btn-primary btn-sm rounded-pill px-3 shadow-sm">
                                    Mark Attendance <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Item 3 (Future) -->
                        <div class="timeline-item">
                            <div class="time-col">
                                <div class="time-display">02:00 PM</div>
                                <div class="duration-display">90 mins</div>
                            </div>
                            <div class="info-col">
                                <span class="course-title">CS305 - Web Development</span>
                                <div class="course-details">
                                    <span class="badge-room"><i class="fas fa-map-marker-alt me-1"></i> Lab 201</span>
                                    <span>• Section A</span>
                                </div>
                            </div>
                            <div class="status-col">
                                <span class="badge bg-light text-muted border px-3 py-2 rounded-pill">
                                    Upcoming
                                </span>
                            </div>
                            <div class="ms-3">
                                <button class="btn btn-sm btn-light border disabled"><i class="fas fa-clock"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Quick Actions & Notifications -->
            <div class="col-lg-4">
                
                <!-- Quick Tools -->
                <div class="card-modern mb-4">
                    <div class="card-modern-header">
                        <h5 class="card-modern-title">Quick Actions</h5>
                    </div>
                    <div class="action-grid">
                        <a href="upload_results.php" class="action-btn">
                            <i class="fas fa-file-upload"></i>
                            <span>Upload Result</span>
                        </a>
                        <a href="#" class="action-btn">
                            <i class="fas fa-envelope-open-text"></i>
                            <span>Email Class</span>
                        </a>
                        <a href="#" class="action-btn">
                            <i class="fas fa-clipboard-list"></i>
                            <span>View Reports</span>
                        </a>
                        <a href="#" class="action-btn">
                            <i class="fas fa-calendar-plus"></i>
                            <span>Extra Class</span>
                        </a>
                    </div>
                </div>

                <!-- Notifications -->
                <div class="card-modern">
                    <div class="card-modern-header">
                        <h5 class="card-modern-title"><i class="far fa-bell text-warning"></i> Updates</h5>
                        <a href="notifications.php" class="small text-decoration-none fw-bold">View All</a>
                    </div>
                    <div class="notify-feed">
                        <div class="notify-feed-item">
                            <div class="notify-header">
                                <span class="notify-tag tag-admin">Admin</span>
                                <span class="text-muted small">2h ago</span>
                            </div>
                            <div class="notify-body">
                                Faculty meeting rescheduled to Friday, 3:00 PM in Conf Room A.
                            </div>
                        </div>
                        <div class="notify-feed-item border-left-warning">
                            <div class="notify-header">
                                <span class="notify-tag tag-system">System</span>
                                <span class="text-muted small">Yesterday</span>
                            </div>
                            <div class="notify-body">
                                Mid-term grading portal is now open. Submission deadline: Oct 25th.
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>