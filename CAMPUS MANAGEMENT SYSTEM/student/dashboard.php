<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar-student.php'; ?>

<!-- Page Specific CSS -->
<style>
    :root {
        --primary-color: #2c3e50;
        --secondary-color: #34495e;
        --accent-color: #3498db;
        --success-color: #2ecc71;
        --danger-color: #e74c3c;
        --warning-color: #f1c40f;
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
        padding: 0 2rem;
        margin-top: 2rem;
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
        margin-bottom: 1.5rem;
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

    /* Table Style */
    .table-modern { width: 100%; margin-bottom: 0; white-space: nowrap; }
    .table-modern thead th {
        background: #f8f9fa;
        color: #7f8c8d;
        font-weight: 600;
        font-size: 0.8rem;
        text-transform: uppercase;
        padding: 1rem 1.5rem;
        border-bottom: 1px solid #eef2f7;
    }
    .table-modern tbody td {
        padding: 1rem 1.5rem;
        vertical-align: middle;
        border-bottom: 1px solid #f8f9fa;
        color: #555;
    }
    .table-modern tbody tr:last-child td { border-bottom: none; }
    .table-modern tbody tr:hover { background: #fafbfc; }

    /* Progress Bars */
    .progress-slim {
        height: 8px;
        border-radius: 10px;
        background-color: #f1f3f5;
        overflow: hidden;
    }
    .progress-bar { border-radius: 10px; }

    /* Notification Feed */
    .notify-feed-item {
        padding: 1rem 1.5rem;
        border-left: 3px solid transparent;
        transition: all 0.2s;
        cursor: pointer;
        border-bottom: 1px solid #f8f9fa;
    }
    .notify-feed-item:last-child { border-bottom: none; }
    .notify-feed-item:hover { background: #fcfcfc; border-left-color: var(--accent-color); }
    
    .notify-header { display: flex; justify-content: space-between; margin-bottom: 0.25rem; }
    .notify-tag { font-size: 0.7rem; font-weight: 700; text-transform: uppercase; padding: 2px 6px; border-radius: 4px; }
    .tag-exam { background: #fef9e7; color: #f1c40f; }
    .tag-holiday { background: #e8f4fc; color: #3498db; }
    .tag-assignment { background: #ffebeb; color: #e74c3c; }
    
    .notify-body { font-size: 0.9rem; color: #555; line-height: 1.4; font-weight: 500; }
    .notify-desc { font-size: 0.85rem; color: #888; margin-top: 4px; }
    .notify-time { font-size: 0.75rem; color: #aaa; margin-top: 0.5rem; }

    /* --- RESPONSIVE MEDIA QUERIES --- */
    @media (max-width: 768px) {
        .px-4 { padding-left: 1rem !important; padding-right: 1rem !important; }
        .pt-4 { padding-top: 1.5rem !important; }
        
        .stats-container {
            padding: 0 1rem;
            margin-top: 1rem;
        }
        .content-section {
            padding: 1.5rem 1rem;
        }
        
        .card-modern-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }
        .card-modern-header a {
            width: 100%;
            text-align: center;
        }
        
        /* Font sizing for small screens */
        .stat-number { font-size: 1.75rem; }
    }
</style>

<!-- Main Dashboard Container -->
<div class="container-fluid p-0">
    
    <!-- 1. Header -->
    <div class="px-4 pt-4 pb-2">
        <!-- Flex-wrap added for mobile stacking -->
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <h1 class="h3 fw-bold text-dark mb-1">Student Dashboard</h1>
                <p class="text-muted mb-0">Welcome back, Mark! Here's your academic overview.</p>
            </div>
            <!-- Date button: Hidden on very small screens xs, shown on sm+ -->
            <div class="d-none d-sm-block">
                <button class="btn btn-light bg-white border shadow-sm fw-bold text-secondary">
                    <i class="far fa-calendar-alt me-2"></i> <?php echo date('F Y'); ?>
                </button>
            </div>
        </div>
    </div>

    <!-- 2. Floating Stats Cards -->
    <div class="stats-container">
        <!-- Responsive Grid: XL=4cols, MD=2cols, SM/XS=1col (Stacked) -->
        <div class="row g-4">
            <!-- Card 1: Attendance -->
            <div class="col-xl-3 col-md-6 col-12">
                <div class="stat-card">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="stat-number">85%</div>
                            <div class="stat-label">Overall Attendance</div>
                            <div class="stat-trend text-trend-up">
                                <i class="fas fa-check-circle me-1"></i> Good Standing
                            </div>
                        </div>
                        <div class="stat-icon-wrapper bg-soft-primary">
                            <i class="fas fa-user-clock"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 2: Subjects -->
            <div class="col-xl-3 col-md-6 col-12">
                <div class="stat-card green">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="stat-number">6</div>
                            <div class="stat-label">Enrolled Subjects</div>
                            <div class="stat-trend text-muted">
                                <i class="fas fa-book-open me-1"></i> All Active
                            </div>
                        </div>
                        <div class="stat-icon-wrapper bg-soft-green">
                            <i class="fas fa-book"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 3: Next Exam -->
            <div class="col-xl-3 col-md-6 col-12">
                <div class="stat-card orange">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="stat-number" style="font-size: 1.5rem;">Physics</div>
                            <div class="stat-label">Next Exam</div>
                            <div class="stat-trend text-danger fw-bold">
                                <i class="fas fa-clock me-1"></i> In 3 Days
                            </div>
                        </div>
                        <div class="stat-icon-wrapper bg-soft-orange">
                            <i class="fas fa-pen-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 4: GPA -->
            <div class="col-xl-3 col-md-6 col-12">
                <div class="stat-card purple">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="stat-number">3.8</div>
                            <div class="stat-label">Current GPA</div>
                            <div class="stat-trend text-trend-up">
                                <i class="fas fa-arrow-up me-1"></i> Excellent
                            </div>
                        </div>
                        <div class="stat-icon-wrapper bg-soft-purple">
                            <i class="fas fa-award"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 3. Main Content Grid -->
    <div class="content-section">
        <div class="row g-4">
            
            <!-- Left Column: Results & Attendance -->
            <!-- LG-8 means take up 2/3rds on desktop, full width on tablet/mobile -->
            <div class="col-lg-8 col-12">
                
                <!-- Recent Results -->
                <div class="card-modern">
                    <div class="card-modern-header">
                        <h5 class="card-modern-title"><i class="fas fa-poll text-primary"></i> Recent Results</h5>
                        <a href="results.php" class="btn btn-sm btn-light border rounded-pill px-3">View All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-modern align-middle">
                            <thead>
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
                                    <td class="ps-4 fw-bold text-dark">Mathematics</td>
                                    <td>Mid-Term</td>
                                    <td>88/100</td>
                                    <td><span class="badge bg-success bg-opacity-10 text-success px-2">A</span></td>
                                    <td class="text-end pe-4"><span class="badge rounded-pill bg-success">Passed</span></td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold text-dark">Computer Science</td>
                                    <td>Practical</td>
                                    <td>45/50</td>
                                    <td><span class="badge bg-success bg-opacity-10 text-success px-2">A+</span></td>
                                    <td class="text-end pe-4"><span class="badge rounded-pill bg-success">Passed</span></td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold text-dark">History</td>
                                    <td>Quiz 1</td>
                                    <td>18/20</td>
                                    <td><span class="badge bg-warning bg-opacity-10 text-warning px-2">A-</span></td>
                                    <td class="text-end pe-4"><span class="badge rounded-pill bg-success">Passed</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Subject Attendance -->
                <div class="card-modern">
                    <div class="card-modern-header">
                        <h5 class="card-modern-title"><i class="fas fa-clipboard-check text-success"></i> Subject Attendance</h5>
                        <a href="attendance.php" class="btn btn-sm btn-light border rounded-pill px-3">View Details</a>
                    </div>
                    <div class="card-body p-4">
                        <!-- Subject 1 -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between mb-1">
                                <span class="fw-bold text-dark">Computer Science</span>
                                <span class="fw-bold text-success">92%</span>
                            </div>
                            <div class="progress progress-slim">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 92%"></div>
                            </div>
                        </div>
                        <!-- Subject 2 -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between mb-1">
                                <span class="fw-bold text-dark">Mathematics</span>
                                <span class="fw-bold text-success">85%</span>
                            </div>
                            <div class="progress progress-slim">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 85%"></div>
                            </div>
                        </div>
                        <!-- Subject 3 -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between mb-1">
                                <span class="fw-bold text-dark">Physics</span>
                                <span class="fw-bold text-warning">74%</span>
                            </div>
                            <div class="progress progress-slim">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 74%"></div>
                            </div>
                        </div>
                         <!-- Subject 4 -->
                         <div class="mb-0">
                            <div class="d-flex justify-content-between mb-1">
                                <span class="fw-bold text-dark">English</span>
                                <span class="fw-bold text-danger">60%</span>
                            </div>
                            <div class="progress progress-slim">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 60%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Notifications -->
            <!-- LG-4 means take up 1/3rd on desktop, full width on tablet/mobile -->
            <div class="col-lg-4 col-12">
                <div class="card-modern h-100">
                    <div class="card-modern-header">
                        <h5 class="card-modern-title"><i class="fas fa-bell text-warning"></i> Notifications</h5>
                        <a href="notifications.php" class="small text-decoration-none fw-bold">View All</a>
                    </div>
                    <div class="notify-feed">
                        <!-- Item 1 -->
                        <div class="notify-feed-item">
                            <div class="notify-header">
                                <span class="notify-tag tag-exam">Exams</span>
                                <span class="text-muted small">2 hrs ago</span>
                            </div>
                            <div class="notify-body">Mid-Sem Exams Schedule Released</div>
                            <div class="notify-desc">Check the exam section for detailed timetable.</div>
                        </div>
                        <!-- Item 2 -->
                        <div class="notify-feed-item">
                            <div class="notify-header">
                                <span class="notify-tag tag-holiday">Holiday</span>
                                <span class="text-muted small">Yesterday</span>
                            </div>
                            <div class="notify-body">College Closed on Friday</div>
                            <div class="notify-desc">Due to public holiday observance.</div>
                        </div>
                        <!-- Item 3 -->
                        <div class="notify-feed-item">
                            <div class="notify-header">
                                <span class="notify-tag tag-assignment">Assignment</span>
                                <span class="text-muted small">2 days ago</span>
                            </div>
                            <div class="notify-body">Physics Assignment Extended</div>
                            <div class="notify-desc">Submission deadline moved to next Monday.</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>