<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar-faculty.php'; ?>

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

    /* Standardizes the background and font for the dashboard */
    body {
        background-color: var(--light-bg);
        font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
    }

    /* --- Stats Cards --- */
    .stats-container {
        padding: 1.5rem 2rem 0;
    }
    
    @media (max-width: 768px) {
        .stats-container { padding: 1rem 1rem 0; }
    }

    .stat-card {
        background: white;
        border-radius: 16px;
        padding: 1.5rem;
        box-shadow: var(--card-shadow);
        transition: all 0.3s ease;
        border: none;
        height: 100%;
        position: relative;
        overflow: hidden;
    }

    .stat-card:hover { transform: translateY(-5px); box-shadow: var(--hover-shadow); }

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
        width: 50px; height: 50px; border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.5rem;
    }

    .bg-soft-primary { background: rgba(52, 152, 219, 0.1); color: var(--accent-color); }
    .bg-soft-purple { background: rgba(155, 89, 182, 0.1); color: #9b59b6; }
    .bg-soft-green { background: rgba(46, 204, 113, 0.1); color: #2ecc71; }
    .bg-soft-orange { background: rgba(230, 126, 34, 0.1); color: #e67e22; }

    .stat-number { font-size: 2rem; font-weight: 800; color: var(--primary-color); line-height: 1; }
    .stat-label { font-size: 0.85rem; color: #7f8c8d; font-weight: 600; text-transform: uppercase; margin-top: 5px; }
    
    /* --- Content Sections --- */
    .content-section { padding: 2rem; }
    @media (max-width: 768px) { .content-section { padding: 1rem; } }
    
    .card-modern {
        background: white;
        border-radius: 16px;
        border: 1px solid rgba(0,0,0,0.03);
        box-shadow: var(--card-shadow);
        overflow: hidden;
        margin-bottom: 1.5rem;
    }

    .card-modern-header {
        padding: 1.25rem 1.5rem;
        border-bottom: 1px solid rgba(0,0,0,0.03);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-modern-title { font-size: 1.1rem; font-weight: 700; color: var(--secondary-color); margin: 0; }

    /* Timeline Items */
    .timeline-item {
        display: flex; padding: 1.25rem 1.5rem;
        border-bottom: 1px solid #f8f9fa; align-items: center;
    }
    .timeline-item:last-child { border-bottom: none; }
    .time-col { min-width: 110px; }
    .time-display { font-weight: 700; color: var(--primary-color); }
    .info-col { flex-grow: 1; padding: 0 1rem; }
    .course-title { font-weight: 600; color: var(--secondary-color); display: block; }
    .course-details { font-size: 0.85rem; color: #7f8c8d; }

    /* Notification Feed */
    .notify-feed-item {
        padding: 1rem 1.5rem;
        border-bottom: 1px solid #f8f9fa;
        transition: background 0.2s;
    }
    .notify-feed-item:hover { background: #fcfcfc; }
    .notify-tag { font-size: 0.7rem; font-weight: 700; text-transform: uppercase; padding: 2px 6px; border-radius: 4px; }
    .tag-admin { background: #e8f4fc; color: #3498db; }
    .tag-system { background: #fef9e7; color: #f1c40f; }

    /* Action Grid */
    .action-grid {
        display: grid; grid-template-columns: repeat(2, 1fr);
        gap: 1rem; padding: 1.5rem;
    }
    .action-btn {
        display: flex; flex-direction: column; align-items: center;
        padding: 1.25rem; background: white; border: 1px solid #eee;
        border-radius: 12px; text-decoration: none; color: var(--secondary-color);
        transition: all 0.2s; text-align: center;
    }
    .action-btn:hover { background: var(--primary-color); color: white; }
    .action-btn i { font-size: 1.4rem; margin-bottom: 0.5rem; color: var(--accent-color); }
    .action-btn:hover i { color: white; }
</style>

<div class="container-fluid">
    <div class="stats-container">
        <div class="row g-4">
            <div class="col-xl-3 col-md-6">
                <div class="stat-card">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="stat-number">4</div>
                            <div class="stat-label">Active Courses</div>
                        </div>
                        <div class="stat-icon-wrapper bg-soft-primary"><i class="fas fa-book-open"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="stat-card green">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="stat-number">145</div>
                            <div class="stat-label">Total Students</div>
                        </div>
                        <div class="stat-icon-wrapper bg-soft-green"><i class="fas fa-users"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="stat-card orange">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="stat-number">2</div>
                            <div class="stat-label">Classes Today</div>
                        </div>
                        <div class="stat-icon-wrapper bg-soft-orange"><i class="fas fa-chalkboard-teacher"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="stat-card purple">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="stat-number">98%</div>
                            <div class="stat-label">Avg. Attendance</div>
                        </div>
                        <div class="stat-icon-wrapper bg-soft-purple"><i class="fas fa-chart-line"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-section">
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card-modern">
                    <div class="card-modern-header">
                        <h5 class="card-modern-title"><i class="far fa-calendar-alt me-2"></i>Today's Schedule</h5>
                    </div>
                    <div class="timeline-container">
                        <div class="timeline-item">
                            <div class="time-col">
                                <div class="time-display">09:00 AM</div>
                                <small class="text-muted">90 mins</small>
                            </div>
                            <div class="info-col">
                                <span class="course-title">CS101 - Intro to Programming</span>
                                <div class="course-details">Lab 304 • Section A</div>
                            </div>
                            <div><span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill">Done</span></div>
                        </div>
                        <div class="timeline-item bg-light">
                            <div class="time-col">
                                <div class="time-display text-primary">11:00 AM</div>
                                <small class="text-muted">90 mins</small>
                            </div>
                            <div class="info-col">
                                <span class="course-title text-primary">CS202 - Data Structures</span>
                                <div class="course-details">Room 102 • Section B</div>
                            </div>
                            <div><a href="mark_attendance.php" class="btn btn-primary btn-sm rounded-pill px-3">Mark Attendance</a></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card-modern mb-4">
                    <div class="card-modern-header"><h5 class="card-modern-title">Quick Actions</h5></div>
                    <div class="action-grid">
                        <a href="upload_results.php" class="action-btn"><i class="fas fa-file-upload"></i><span>Results</span></a>
                        <a href="#" class="action-btn"><i class="fas fa-envelope"></i><span>Email</span></a>
                        <a href="#" class="action-btn"><i class="fas fa-file-alt"></i><span>Reports</span></a>
                        <a href="#" class="action-btn"><i class="fas fa-plus"></i><span>Extra</span></a>
                    </div>
                </div>

                <div class="card-modern">
                    <div class="card-modern-header">
                        <h5 class="card-modern-title"><i class="far fa-bell me-2"></i>Updates</h5>
                    </div>
                    <div class="notify-feed">
                        <div class="notify-feed-item">
                            <div class="d-flex justify-content-between mb-1">
                                <span class="notify-tag tag-admin">Admin</span>
                                <small class="text-muted">2h ago</small>
                            </div>
                            <div class="small text-secondary">Faculty meeting rescheduled to Friday, 3:00 PM.</div>
                        </div>
                        <div class="notify-feed-item">
                            <div class="d-flex justify-content-between mb-1">
                                <span class="notify-tag tag-system">System</span>
                                <small class="text-muted">Yesterday</small>
                            </div>
                            <div class="small text-secondary">Mid-term grading portal is now open.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div> 

<?php include '../includes/footer.php'; ?>