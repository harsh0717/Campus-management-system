<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar-faculty.php'; ?>

<style>
    .app-content {
        background-color: #f8f9fa;
    }
    .tile {
        background: #ffffff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        border: none;
    }
    .btn-outline-warning {
        color: #856404;
        border-color: #ffeeba;
    }
    .btn-outline-warning:hover {
        background-color: #ffc107;
        color: #212529;
    }
    .card {
        border: none;
        border-radius: 10px;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.1) !important;
    }
    .border-start-4 {
        border-left-width: 5px !important;
    }
    .card-title {
        font-weight: 700;
        letter-spacing: -0.3px;
    }
    .badge {
        font-weight: 600;
        padding: 5px 10px;
        text-transform: uppercase;
        font-size: 0.7rem;
    }
    .bg-light-unread {
        background-color: #f0f7ff !important;
    }
    .text-muted {
        font-size: 0.85rem;
    }
    /* Simple utility for filtering */
    .d-none-filter {
        display: none !important;
    }
</style>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="bi bi-bell"></i> Notifications</h1>
            <p>Important updates from administration</p>
        </div>
        <div>
            <button class="btn btn-primary btn-sm" onclick="markAllRead()"><i class="bi bi-check2-all"></i> Mark all as read</button>
        </div>
    </div>

    <!-- Filter Section (Pills) -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="tile py-3 px-4">
                <div class="d-flex gap-2 filter-group">
                    <button class="btn btn-primary btn-sm filter-btn active px-3" data-filter="all">All</button>
                    <button class="btn btn-outline-secondary btn-sm filter-btn px-3" data-filter="unread">Unread</button>
                    <button class="btn btn-outline-warning btn-sm filter-btn px-3" data-filter="important">Important</button>
                    <button class="btn btn-outline-danger btn-sm filter-btn px-3" data-filter="urgent">Urgent</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Notification List -->
    <div class="row" id="notification-list">
        
        <!-- Item 1: Urgent (Result Submission) - Highlighted as Unread -->
        <div class="col-md-12 mb-3 notify-item" data-category="urgent unread">
            <div class="card border-start border-start-4 border-danger shadow-sm bg-light-unread">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <span class="badge bg-danger mb-1">URGENT</span>
                            <span class="badge bg-primary mb-1 ms-1 unread-badge">NEW</span>
                            <h5 class="card-title text-danger mb-1 mt-1"><i class="bi bi-exclamation-octagon-fill me-2"></i>Result Submission Reminder</h5>
                        </div>
                        <small class="text-dark fw-bold">Today, 10:30 AM</small>
                    </div>
                    <p class="card-text text-dark mb-0">
                        Please submit the final assessment results for the Computer Science batch (CS-202) by end of day. The portal will close strictly at midnight.
                    </p>
                </div>
            </div>
        </div>

        <!-- Item 2: Important (Exam Schedule) -->
        <div class="col-md-12 mb-3 notify-item" data-category="important">
            <div class="card border-start border-start-4 border-warning shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <span class="badge bg-warning text-dark mb-1">IMPORTANT</span>
                            <h5 class="card-title mb-1 mt-1"><i class="bi bi-calendar-week-fill me-2"></i>Mid-Term Exam Schedule</h5>
                        </div>
                        <small class="text-muted">Yesterday, 02:15 PM</small>
                    </div>
                    <p class="card-text text-secondary mb-0">
                        The schedule for upcoming mid-term examinations has been finalized. Please review the attached PDF document and inform your students accordingly during the next lecture.
                    </p>
                </div>
            </div>
        </div>

        <!-- Item 3: Normal (Department Meeting) -->
        <div class="col-md-12 mb-3 notify-item" data-category="normal">
            <div class="card border-start border-start-4 border-success shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <span class="badge bg-success mb-1">NORMAL</span>
                            <h5 class="card-title mb-1 mt-1"><i class="bi bi-people-fill me-2"></i>Department Staff Meeting</h5>
                        </div>
                        <small class="text-muted">Oct 24, 2023</small>
                    </div>
                    <p class="card-text text-secondary mb-0">
                        The monthly department staff meeting will be held in Conference Room A on Friday at 3:00 PM. Agenda items have been emailed to your university account.
                    </p>
                </div>
            </div>
        </div>

        <!-- Item 4: Info (System Maintenance) -->
        <div class="col-md-12 mb-3 notify-item" data-category="maintenance">
            <div class="card border-start border-start-4 border-secondary shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <span class="badge bg-secondary mb-1">MAINTENANCE</span>
                            <h5 class="card-title mb-1 mt-1"><i class="bi bi-server me-2"></i>LMS Scheduled Maintenance</h5>
                        </div>
                        <small class="text-muted">Oct 20, 2023</small>
                    </div>
                    <p class="card-text text-secondary mb-0">
                        The Learning Management System (LMS) will be offline for scheduled upgrades this Sunday from 1:00 AM to 5:00 AM. Please save all work before this time.
                    </p>
                </div>
            </div>
        </div>

    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const notificationItems = document.querySelectorAll('.notify-item');

    filterButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            // Update button active state
            filterButtons.forEach(b => {
                b.classList.remove('btn-primary', 'active');
                b.classList.add('btn-outline-secondary');
            });
            this.classList.remove('btn-outline-secondary');
            this.classList.add('btn-primary', 'active');

            const filterValue = this.getAttribute('data-filter');

            notificationItems.forEach(item => {
                const categories = item.getAttribute('data-category');
                if (filterValue === 'all' || categories.includes(filterValue)) {
                    item.classList.remove('d-none-filter');
                } else {
                    item.classList.add('d-none-filter');
                }
            });
        });
    });
});

function markAllRead() {
    const unreadItems = document.querySelectorAll('.notify-item[data-category*="unread"]');
    unreadItems.forEach(item => {
        const card = item.querySelector('.card');
        const badge = item.querySelector('.unread-badge');
        card.classList.remove('bg-light-unread');
        if (badge) badge.remove();
        // Update data attribute so it's no longer filtered as unread
        item.setAttribute('data-category', item.getAttribute('data-category').replace('unread', '').trim());
    });
}
</script>

<?php include '../includes/footer.php'; ?>