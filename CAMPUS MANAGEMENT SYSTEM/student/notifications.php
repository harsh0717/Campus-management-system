<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<style>
    .app-content {
        background-color: #f4f7f6;
    }
    .notification-card {
        background: #fff;
        border-radius: 10px;
        border: none;
        margin-bottom: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    .notification-card.d-none {
        display: none !important;
    }
    .notification-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    .priority-urgent {
        border-left: 5px solid #dc3545;
    }
    .priority-important {
        border-left: 5px solid #ffc107;
    }
    .priority-normal {
        border-left: 5px solid #28a745;
    }
    .notif-icon {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        margin-right: 15px;
    }
    .icon-exam { background-color: #e3f2fd; color: #0d6efd; }
    .icon-result { background-color: #f3e5f5; color: #9c27b0; }
    .icon-holiday { background-color: #e8f5e9; color: #2e7d32; }
    .icon-warning { background-color: #fff3e0; color: #ef6c00; }
    
    .badge-new {
        position: absolute;
        top: 15px;
        right: 15px;
        font-size: 0.65rem;
        padding: 4px 8px;
        border-radius: 50px;
    }
    .filter-pill {
        border-radius: 50px;
        padding: 5px 20px;
        font-weight: 500;
        margin-right: 8px;
        transition: all 0.2s ease;
    }
</style>

<main class="app-content">
    <!-- 1️⃣ Page Header -->
    <div class="app-title">
        <div>
            <h1><i class="bi bi-bell"></i> Notifications</h1>
            <p>Latest academic updates and announcements</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
            <li class="breadcrumb-item"><a href="#">Student</a></li>
            <li class="breadcrumb-item">Notifications</li>
        </ul>
    </div>

    <!-- 2️⃣ Filter Section (Now Functional) -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="d-flex align-items-center bg-white p-3 rounded shadow-sm">
                <span class="me-3 fw-bold text-muted small text-uppercase">Filter:</span>
                <button class="btn btn-primary btn-sm filter-pill active" data-filter="all">All</button>
                <button class="btn btn-outline-warning btn-sm filter-pill" data-filter="important">Important</button>
                <button class="btn btn-outline-danger btn-sm filter-pill" data-filter="urgent">Urgent</button>
            </div>
        </div>
    </div>

    <!-- 3️⃣ Notifications List -->
    <div class="row justify-content-center">
        <div class="col-lg-10" id="notification-container">
            
            <!-- Exam Timetable - Urgent -->
            <div class="notification-card priority-urgent p-4 shadow-sm" data-priority="urgent">
                <span class="badge bg-primary badge-new">NEW</span>
                <div class="d-flex align-items-start">
                    <div class="notif-icon icon-exam">
                        <i class="bi bi-calendar-check"></i>
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-1 fw-bold">Final Exam Timetable Released</h5>
                            <span class="badge bg-danger">🔴 Urgent</span>
                        </div>
                        <p class="text-secondary mb-2">The final examination schedule for Semester 4 is now available. Exams start from Jan 25th. Please download your hall tickets from the portal.</p>
                        <div class="d-flex align-items-center text-muted small">
                            <i class="bi bi-clock me-1"></i> Posted 2 hours ago | <i class="bi bi-paperclip ms-2 me-1"></i> Timetable_Final.pdf
                        </div>
                    </div>
                </div>
            </div>

            <!-- Result Declaration - Important -->
            <div class="notification-card priority-important p-4 shadow-sm" data-priority="important">
                <div class="d-flex align-items-start">
                    <div class="notif-icon icon-result">
                        <i class="bi bi-trophy"></i>
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-1 fw-bold">Mid-Term Results Declared</h5>
                            <span class="badge bg-warning text-dark">🟡 Important</span>
                        </div>
                        <p class="text-secondary mb-2">Results for the November Mid-Term assessments have been published. Check the "Academic History" tab to view your GPA.</p>
                        <div class="d-flex align-items-center text-muted small">
                            <i class="bi bi-clock me-1"></i> Posted Yesterday
                        </div>
                    </div>
                </div>
            </div>

            <!-- Holiday Announcement - Normal -->
            <div class="notification-card priority-normal p-4 shadow-sm" data-priority="normal">
                <div class="d-flex align-items-start">
                    <div class="notif-icon icon-holiday">
                        <i class="bi bi-tree"></i>
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-1 fw-bold">Winter Break Announcement</h5>
                            <span class="badge bg-success">🟢 Normal</span>
                        </div>
                        <p class="text-secondary mb-2">The University will remain closed from Dec 24th to Jan 2nd for the winter holidays. Classes will resume on Jan 3rd.</p>
                        <div class="d-flex align-items-center text-muted small">
                            <i class="bi bi-clock me-1"></i> Posted 3 days ago
                        </div>
                    </div>
                </div>
            </div>

            <!-- Assignment Deadline - Urgent -->
            <div class="notification-card priority-urgent p-4 shadow-sm" data-priority="urgent">
                <div class="d-flex align-items-start">
                    <div class="notif-icon icon-warning">
                        <i class="bi bi-journal-code"></i>
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-1 fw-bold">Assignment Submission Deadline</h5>
                            <span class="badge bg-danger">🔴 Urgent</span>
                        </div>
                        <p class="text-secondary mb-2">Final call for Software Engineering lab reports. The submission portal closes tonight at 11:59 PM. Late submissions will not be graded.</p>
                        <div class="d-flex align-items-center text-muted small">
                            <i class="bi bi-clock me-1"></i> Posted 5 hours ago
                        </div>
                    </div>
                </div>
            </div>

            <!-- Low Attendance - Important -->
            <div class="notification-card priority-important p-4 shadow-sm" data-priority="important">
                <div class="d-flex align-items-start">
                    <div class="notif-icon icon-warning">
                        <i class="bi bi-person-exclamation"></i>
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-1 fw-bold">Shortage of Attendance Warning</h5>
                            <span class="badge bg-warning text-dark">🟡 Important</span>
                        </div>
                        <p class="text-secondary mb-2">Students with less than 75% attendance are advised to meet their respective HODs immediately to avoid debarment from exams.</p>
                        <div class="d-flex align-items-center text-muted small">
                            <i class="bi bi-clock me-1"></i> Posted Oct 15, 2023
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-pill');
    const cards = document.querySelectorAll('.notification-card');

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Get filter value
            const filter = this.getAttribute('data-filter');

            // Reset all buttons to outline style
            filterButtons.forEach(btn => {
                btn.classList.remove('btn-primary', 'btn-warning', 'btn-danger', 'active');
                btn.classList.add('btn-outline-warning'); // Default fallback
                
                // Re-apply correct outline colors based on data-filter
                if(btn.getAttribute('data-filter') === 'all') {
                    btn.className = 'btn btn-outline-primary btn-sm filter-pill';
                } else if(btn.getAttribute('data-filter') === 'important') {
                    btn.className = 'btn btn-outline-warning btn-sm filter-pill';
                } else if(btn.getAttribute('data-filter') === 'urgent') {
                    btn.className = 'btn btn-outline-danger btn-sm filter-pill';
                }
            });

            // Set clicked button to solid active state
            if(filter === 'all') {
                this.className = 'btn btn-primary btn-sm filter-pill active';
            } else if(filter === 'important') {
                this.className = 'btn btn-warning btn-sm filter-pill active text-dark';
            } else if(filter === 'urgent') {
                this.className = 'btn btn-danger btn-sm filter-pill active';
            }

            // Filter cards
            cards.forEach(card => {
                const priority = card.getAttribute('data-priority');
                if (filter === 'all' || priority === filter) {
                    card.classList.remove('d-none');
                } else {
                    card.classList.add('d-none');
                }
            });
        });
    });
});
</script>

<?php include '../includes/footer.php'; ?>