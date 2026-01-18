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

    /* Common Card Style */
    .card-modern {
        background: white;
        border-radius: 16px;
        border: 1px solid rgba(0,0,0,0.03);
        box-shadow: var(--card-shadow);
        overflow: hidden;
        margin-bottom: 1.5rem;
    }

    /* Page Header */
    .page-header-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--primary-color);
        letter-spacing: -0.5px;
    }
    .breadcrumb-item a { color: var(--accent-color); text-decoration: none; }
    .breadcrumb-item.active { color: #95a5a6; }

    /* Filter Tabs */
    .nav-pills-custom .nav-link {
        color: #7f8c8d;
        background: white;
        border: 1px solid #eef2f7;
        border-radius: 50px;
        padding: 0.5rem 1.2rem;
        font-size: 0.9rem;
        font-weight: 600;
        margin-right: 0.5rem;
        transition: all 0.2s;
        cursor: pointer;
        white-space: nowrap; /* Prevent text wrap */
    }
    .nav-pills-custom .nav-link:hover {
        background: #f8f9fa;
        color: var(--primary-color);
    }
    .nav-pills-custom .nav-link.active {
        background-color: var(--primary-color);
        color: white;
        border-color: var(--primary-color);
        box-shadow: 0 4px 10px rgba(44, 62, 80, 0.2);
    }

    /* Notification List Item */
    .notification-item {
        display: flex;
        padding: 1.5rem;
        border-bottom: 1px solid #f1f3f6;
        transition: background-color 0.2s ease;
        position: relative;
        border-left: 4px solid transparent; /* Invisible border for alignment */
    }
    .notification-item:last-child { border-bottom: none; }
    .notification-item:hover {
        background-color: #fafbfd;
    }

    /* --- UNREAD STATE (High Contrast) --- */
    .notification-item.unread {
        background-color: #eef5ff; /* Distinct Light Blue Background */
        border-left-color: #0d6efd; /* Solid Blue Border */
    }
    .notification-item.unread .notify-title {
        font-weight: 800; /* Bolder text for unread */
        color: #0d6efd;
    }

    /* Icon Box */
    .notify-icon-box {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        margin-right: 1.2rem;
        flex-shrink: 0;
        background-color: white;
        border: 1px solid rgba(0,0,0,0.05);
    }

    /* Content Styling */
    .notify-content { flex-grow: 1; min-width: 0; /* Fix flex child overflow */ }
    .notify-title {
        font-size: 1.05rem;
        font-weight: 700;
        color: var(--secondary-color);
        margin-bottom: 0.3rem;
        word-wrap: break-word;
    }
    .notify-desc {
        color: #6c757d;
        font-size: 0.95rem;
        line-height: 1.5;
        margin-bottom: 0.5rem;
    }
    .notify-meta {
        display: flex;
        align-items: center;
        gap: 15px;
        font-size: 0.8rem;
        color: #adb5bd;
        flex-wrap: wrap;
    }
    .notify-time { font-weight: 600; }

    /* Tag Pills */
    .tag-pill {
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        white-space: nowrap;
    }

    /* Colors */
    .bg-soft-danger { background: rgba(231, 76, 60, 0.1); color: var(--danger-color); }
    .bg-soft-warning { background: rgba(241, 196, 15, 0.1); color: #f39c12; }
    .bg-soft-success { background: rgba(46, 204, 113, 0.1); color: var(--success-color); }
    .bg-soft-info { background: rgba(52, 152, 219, 0.1); color: var(--accent-color); }
    .bg-soft-purple { background: rgba(155, 89, 182, 0.1); color: #9b59b6; }

    .text-danger { color: var(--danger-color) !important; }
    .text-warning { color: #f39c12 !important; }
    .text-success { color: var(--success-color) !important; }
    .text-info { color: var(--accent-color) !important; }
    .text-purple { color: #9b59b6 !important; }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 3rem;
        color: #95a5a6;
    }

    /* RESPONSIVE MEDIA QUERIES */
    @media (max-width: 768px) {
        .page-header-title { font-size: 1.5rem; }
        
        /* Stack Filters and Search */
        .filter-section {
            flex-direction: column;
            align-items: stretch !important;
            gap: 1rem;
        }
        
        .nav-pills-custom {
            flex-wrap: nowrap;
            overflow-x: auto;
            padding-bottom: 5px; /* Space for scrollbar */
            -webkit-overflow-scrolling: touch;
        }
        
        .search-container {
            display: block !important; /* Show search on mobile */
            width: 100%;
        }
        
        .search-container input {
            max-width: 100% !important;
        }

        /* Adjust Notification Item padding */
        .notification-item {
            padding: 1rem;
            flex-wrap: wrap; /* Allow wrapping for very small screens */
        }
        
        .notify-icon-box {
            width: 40px;
            height: 40px;
            font-size: 1.1rem;
            margin-right: 0.8rem;
        }
        
        .notify-title { font-size: 1rem; }
        .notify-desc { font-size: 0.9rem; }
        
        /* Adjust header actions alignment */
        .header-actions {
            margin-top: 1rem;
            width: 100%;
        }
        .header-actions button {
            width: 100%;
        }
    }
</style>

<main class="container-fluid px-4 py-4">
    
    <!-- 1. Header Section -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-4">
        <div>
            <h1 class="page-header-title mb-1">Notifications</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Notifications</li>
                </ol>
            </nav>
        </div>
        <div class="header-actions">
            <button class="btn btn-light text-muted border bg-white shadow-sm fw-bold" onclick="markAllRead()">
                <i class="fas fa-check-double me-2"></i>Mark all as read
            </button>
        </div>
    </div>

    <!-- 2. Filter & List Section -->
    <div class="row">
        <div class="col-lg-12">
            
            <!-- Filters & Search (Responsive Flex Container) -->
            <div class="d-flex justify-content-between align-items-center mb-4 filter-section">
                <div class="nav nav-pills nav-pills-custom" id="notification-tabs">
                    <button class="nav-link active" data-filter="all">All</button>
                    <button class="nav-link" data-filter="unread">Unread <span class="badge bg-danger rounded-pill ms-1" id="unread-count">2</span></button>
                    <button class="nav-link" data-filter="urgent">Urgent</button>
                    <button class="nav-link" data-filter="important">Important</button>
                </div>
                
                <!-- Search -->
                <div class="search-container d-none d-md-block">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0 border rounded-start-pill ps-3 text-muted"><i class="fas fa-search"></i></span>
                        <input type="text" class="form-control border-start-0 border rounded-end-pill" placeholder="Search notifications..." style="max-width: 250px;">
                    </div>
                </div>
            </div>

            <!-- Notifications Feed -->
            <div class="card-modern">
                <div id="notification-list">
                    
                    <!-- Item 1: Urgent (Unread) -->
                    <div class="notification-item unread" data-category="urgent unread">
                        <div class="notify-icon-box bg-soft-info">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div class="notify-content">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h5 class="notify-title">Final Exam Timetable Released</h5>
                                    <span class="tag-pill bg-soft-danger mb-2 d-inline-block text-danger">Urgent</span>
                                </div>
                                <small class="text-primary fw-bold">NEW</small>
                            </div>
                            <p class="notify-desc">
                                The final examination schedule for Semester 4 is now available. Exams start from Jan 25th. Please download your hall tickets from the portal.
                            </p>
                            <div class="notify-meta">
                                <span class="notify-time"><i class="far fa-clock me-1"></i> 2 hours ago</span>
                                <span><i class="fas fa-file-pdf me-1"></i> Timetable_Final.pdf</span>
                            </div>
                        </div>
                    </div>

                    <!-- Item 2: Important (Read) -->
                    <div class="notification-item" data-category="important">
                        <div class="notify-icon-box bg-soft-purple">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <div class="notify-content">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h5 class="notify-title">Mid-Term Results Declared</h5>
                                    <span class="tag-pill bg-soft-warning mb-2 d-inline-block text-warning">Important</span>
                                </div>
                            </div>
                            <p class="notify-desc">
                                Results for the November Mid-Term assessments have been published. Check the "Exam Results" tab to view your GPA.
                            </p>
                            <div class="notify-meta">
                                <span class="notify-time"><i class="far fa-clock me-1"></i> Yesterday</span>
                                <span><i class="fas fa-university me-1"></i> Examination Dept</span>
                            </div>
                        </div>
                    </div>

                    <!-- Item 3: Urgent (Unread) -->
                    <div class="notification-item unread" data-category="urgent unread">
                        <div class="notify-icon-box bg-soft-warning">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="notify-content">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h5 class="notify-title">Assignment Submission Deadline</h5>
                                    <span class="tag-pill bg-soft-danger mb-2 d-inline-block text-danger">Urgent</span>
                                </div>
                                <small class="text-primary fw-bold">NEW</small>
                            </div>
                            <p class="notify-desc">
                                Final call for Software Engineering lab reports. The submission portal closes tonight at 11:59 PM. Late submissions will not be graded.
                            </p>
                            <div class="notify-meta">
                                <span class="notify-time"><i class="far fa-clock me-1"></i> 5 hours ago</span>
                                <span><i class="fas fa-chalkboard-teacher me-1"></i> Prof. Allen</span>
                            </div>
                        </div>
                    </div>

                    <!-- Item 4: Normal (Read) -->
                    <div class="notification-item" data-category="normal">
                        <div class="notify-icon-box bg-soft-success">
                            <i class="fas fa-tree"></i>
                        </div>
                        <div class="notify-content">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h5 class="notify-title">Winter Break Announcement</h5>
                                    <span class="tag-pill bg-soft-success mb-2 d-inline-block text-success">General</span>
                                </div>
                            </div>
                            <p class="notify-desc">
                                The University will remain closed from Dec 24th to Jan 2nd for the winter holidays. Classes will resume on Jan 3rd.
                            </p>
                            <div class="notify-meta">
                                <span class="notify-time"><i class="far fa-clock me-1"></i> 3 days ago</span>
                                <span><i class="fas fa-bullhorn me-1"></i> Admin</span>
                            </div>
                        </div>
                    </div>

                     <!-- Item 5: Important (Read) -->
                     <div class="notification-item" data-category="important">
                        <div class="notify-icon-box bg-soft-danger">
                            <i class="fas fa-user-clock"></i>
                        </div>
                        <div class="notify-content">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h5 class="notify-title">Shortage of Attendance Warning</h5>
                                    <span class="tag-pill bg-soft-warning mb-2 d-inline-block text-warning">Important</span>
                                </div>
                            </div>
                            <p class="notify-desc">
                                Students with less than 75% attendance are advised to meet their respective HODs immediately to avoid debarment from exams.
                            </p>
                            <div class="notify-meta">
                                <span class="notify-time"><i class="far fa-clock me-1"></i> Oct 15, 2023</span>
                                <span><i class="fas fa-building me-1"></i> Dept Office</span>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Empty State -->
                <div id="no-notifications" class="empty-state d-none">
                    <i class="fas fa-bell-slash fa-3x mb-3 text-muted opacity-25"></i>
                    <h5>No notifications found</h5>
                    <p class="small">You're all caught up!</p>
                </div>
            </div>

        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.nav-link[data-filter]');
    const notificationItems = document.querySelectorAll('.notification-item');
    const emptyState = document.getElementById('no-notifications');

    filterButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            // Update active state
            filterButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            const filterValue = this.getAttribute('data-filter');
            let visibleCount = 0;

            notificationItems.forEach(item => {
                const categories = item.getAttribute('data-category');
                
                if (filterValue === 'all' || categories.includes(filterValue)) {
                    item.style.display = 'flex';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });

            // Toggle empty state
            if(visibleCount === 0) {
                emptyState.classList.remove('d-none');
            } else {
                emptyState.classList.add('d-none');
            }
        });
    });
});

function markAllRead() {
    const unreadItems = document.querySelectorAll('.notification-item.unread');
    unreadItems.forEach(item => {
        item.classList.remove('unread');
        // Update data attribute so filters work correctly
        let categories = item.getAttribute('data-category');
        item.setAttribute('data-category', categories.replace('unread', '').trim());
        
        // Hide "NEW" badges inside
        const newBadge = item.querySelector('.text-primary.fw-bold');
        if(newBadge) newBadge.style.display = 'none';
    });
    
    // Hide the unread count on the filter tab
    const unreadCountBadge = document.getElementById('unread-count');
    if(unreadCountBadge) unreadCountBadge.style.display = 'none';
}
</script>

<?php include '../includes/footer.php'; ?>