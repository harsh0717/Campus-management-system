<?php
include '../auth/auth_check.php';

if ($_SESSION['role'] !== 'faculty') {
    header("Location: ../auth/login.php");
    exit;
}
?>
<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar-faculty.php'; ?>

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

    /* Common Card Style from Theme */
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
        white-space: nowrap; /* Prevent text wrap in pills */
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
        border-left: 4px solid transparent; /* Invisible border to prevent layout shift */
    }
    .notification-item:last-child { border-bottom: none; }
    
    .notification-item:hover {
        background-color: #fafbfd;
    }
    
    /* --- UNREAD STATE (High Contrast) --- */
    .notification-item.unread {
        background-color: #eef5ff; /* Distinct Light Blue Background */
        border-left-color: #0d6efd; /* distinct Solid Blue Border */
    }
    
    .notification-item.unread .notify-title {
        font-weight: 800; /* Bolder text for unread items */
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
        background-color: white; /* Ensure icon pops against blue bg */
        border: 1px solid rgba(0,0,0,0.05);
    }
    
    /* Notification Content */
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
    
    /* Badges & Icon Colors */
    .text-danger { color: var(--danger-color) !important; }
    .text-warning { color: #f39c12 !important; }
    .text-success { color: var(--success-color) !important; }
    .text-info { color: var(--accent-color) !important; }
    .text-secondary { color: #7f8c8d !important; }

    .tag-pill {
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        white-space: nowrap;
    }
    .bg-soft-danger { background: rgba(231, 76, 60, 0.1); color: var(--danger-color); }
    .bg-soft-warning { background: rgba(241, 196, 15, 0.1); color: #f39c12; }
    .bg-soft-success { background: rgba(46, 204, 113, 0.1); color: var(--success-color); }
    .bg-soft-secondary { background: rgba(149, 165, 166, 0.1); color: #7f8c8d; }

    /* Actions */
    .action-btn {
        color: #95a5a6;
        transition: color 0.2s;
        background: none;
        border: none;
        cursor: pointer;
        padding: 0.25rem;
    }
    .action-btn:hover { color: var(--primary-color); }

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
            flex-wrap: wrap; /* Allow wrapping for very small screens if needed, mostly for meta */
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
    
    <!-- Header Section -->
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
            <button class="btn btn-light text-muted border bg-white shadow-sm w-100" onclick="markAllRead()">
                <i class="bi bi-check2-all me-2"></i>Mark all as read
            </button>
        </div>
    </div>

    <!-- Filter & List Section -->
    <div class="row">
        <div class="col-lg-12">
            
            <!-- Filters & Search (Responsive Flex Container) -->
            <div class="d-flex justify-content-between align-items-center mb-4 filter-section">
                <div class="nav nav-pills nav-pills-custom" id="notification-tabs" role="tablist">
                    <button class="nav-link active" data-filter="all">All</button>
                    <button class="nav-link" data-filter="unread">Unread <span class="badge bg-danger rounded-pill ms-1" id="unread-count">2</span></button>
                    <button class="nav-link" data-filter="urgent">Urgent</button>
                    <button class="nav-link" data-filter="important">Important</button>
                </div>
                <!-- Search -->
                <div class="search-container d-none d-md-block">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0 border rounded-start-pill ps-3 text-muted"><i class="fas fa-search"></i></span>
                        <input type="text" class="form-control border-start-0 border rounded-end-pill" placeholder="Search..." style="max-width: 200px;">
                    </div>
                </div>
            </div>

            <!-- Notifications Card -->
            <div class="card-modern">
                <div id="notification-list">
                    
                    <!-- Item 1: Urgent (Unread) -->
                    <div class="notification-item unread" data-category="urgent unread">
                        <div class="notify-icon-box text-danger">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="notify-content">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h5 class="notify-title">Result Submission Reminder</h5>
                                    <span class="tag-pill bg-soft-danger mb-2 d-inline-block">Urgent</span>
                                </div>
                                <div class="dropdown">
                                    <button class="action-btn" type="button"><i class="fas fa-ellipsis-v"></i></button>
                                </div>
                            </div>
                            <p class="notify-desc">
                                Please submit the final assessment results for the Computer Science batch (CS-202) by end of day. The portal will close strictly at midnight.
                            </p>
                            <div class="notify-meta">
                                <span class="notify-time"><i class="far fa-clock me-1"></i> Today, 10:30 AM</span>
                                <span><i class="fas fa-user-shield me-1"></i> Admin Office</span>
                            </div>
                        </div>
                    </div>

                     <!-- Item 2: Important (Unread) -->
                     <div class="notification-item unread" data-category="important unread">
                        <div class="notify-icon-box text-warning">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div class="notify-content">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h5 class="notify-title">Mid-Term Exam Schedule</h5>
                                    <span class="tag-pill bg-soft-warning mb-2 d-inline-block">Important</span>
                                </div>
                                <div class="dropdown">
                                    <button class="action-btn" type="button"><i class="fas fa-ellipsis-v"></i></button>
                                </div>
                            </div>
                            <p class="notify-desc">
                                The schedule for upcoming mid-term examinations has been finalized. Please review the attached PDF document and inform your students accordingly.
                            </p>
                            <div class="notify-meta">
                                <span class="notify-time"><i class="far fa-clock me-1"></i> Yesterday, 02:15 PM</span>
                                <span><i class="fas fa-university me-1"></i> Exam Dept</span>
                            </div>
                        </div>
                    </div>

                    <!-- Item 3: Normal (Read) -->
                    <div class="notification-item" data-category="normal">
                        <div class="notify-icon-box text-success">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="notify-content">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h5 class="notify-title">Department Staff Meeting</h5>
                                    <span class="tag-pill bg-soft-success mb-2 d-inline-block">General</span>
                                </div>
                                <div class="dropdown">
                                    <button class="action-btn" type="button"><i class="fas fa-ellipsis-v"></i></button>
                                </div>
                            </div>
                            <p class="notify-desc">
                                The monthly department staff meeting will be held in Conference Room A on Friday at 3:00 PM. Agenda items have been emailed.
                            </p>
                            <div class="notify-meta">
                                <span class="notify-time"><i class="far fa-clock me-1"></i> Oct 24, 2023</span>
                                <span><i class="fas fa-building me-1"></i> CS Dept</span>
                            </div>
                        </div>
                    </div>

                    <!-- Item 4: Maintenance (Read) -->
                    <div class="notification-item" data-category="maintenance">
                        <div class="notify-icon-box text-secondary">
                            <i class="fas fa-tools"></i>
                        </div>
                        <div class="notify-content">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h5 class="notify-title">LMS Scheduled Maintenance</h5>
                                    <span class="tag-pill bg-soft-secondary mb-2 d-inline-block">System</span>
                                </div>
                                <div class="dropdown">
                                    <button class="action-btn" type="button"><i class="fas fa-ellipsis-v"></i></button>
                                </div>
                            </div>
                            <p class="notify-desc">
                                The Learning Management System (LMS) will be offline for scheduled upgrades this Sunday from 1:00 AM to 5:00 AM.
                            </p>
                            <div class="notify-meta">
                                <span class="notify-time"><i class="far fa-clock me-1"></i> Oct 20, 2023</span>
                                <span><i class="fas fa-server me-1"></i> IT Support</span>
                            </div>
                        </div>
                    </div>

                </div>
                
                <!-- Empty State (Hidden by default) -->
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
                // Simple string check
                if (filterValue === 'all' || categories.includes(filterValue)) {
                    item.style.display = 'flex';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });

            // Show/Hide empty state
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
        // Update data attribute logic
        let categories = item.getAttribute('data-category');
        item.setAttribute('data-category', categories.replace('unread', '').trim());
        
        // Remove badge from filter visually
        const unreadBadge = document.getElementById('unread-count');
        if(unreadBadge) unreadBadge.style.display = 'none';
    });
}
</script>

<?php include '../includes/footer.php'; ?>