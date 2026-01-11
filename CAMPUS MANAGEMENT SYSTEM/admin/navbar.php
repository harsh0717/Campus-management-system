<style>
    /* Navbar Styles matching the University Theme */
    .navbar-custom {
        /* University Blue Gradient */
        background: linear-gradient(to right, #4e73df, #224abe);
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        height: 70px;
        z-index: 1030;
        
        /* Positioning to sit to the right of the Sidebar */
        position: fixed;
        top: 0;
        right: 0;
        left: 0;
        margin-left: 260px; /* Sidebar Width */
        width: calc(100% - 260px);
        transition: margin-left 0.3s cubic-bezier(0.25, 0.8, 0.25, 1), width 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    }

    /* Adjust Navbar when Sidebar is collapsed */
    body.sidebar-collapsed .navbar-custom {
        margin-left: 70px;
        width: calc(100% - 70px);
    }

    /* Mobile Responsiveness */
    @media (max-width: 768px) {
        .navbar-custom {
            margin-left: 0;
            width: 100%;
        }
    }

    .navbar-brand {
        font-weight: 700;
        letter-spacing: 0.5px;
        font-size: 1.1rem;
    }
    
    .nav-link {
        font-weight: 500;
        font-size: 0.9rem;
        transition: opacity 0.3s ease;
        padding: 0.5rem 1rem !important;
    }
    
    .nav-link:hover {
        opacity: 0.8;
        background: rgba(255,255,255,0.1);
        border-radius: 5px;
    }
    
    .nav-link.active {
        background: rgba(255,255,255,0.2);
        border-radius: 5px;
        color: #fff !important;
    }
</style>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container-fluid px-4">
        <a class="navbar-brand" href="dashboard.php">
            <i class="fas fa-university me-2"></i>Campus Management System
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar" aria-controls="adminNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="adminNavbar">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                <li class="nav-item">
                    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : ''; ?>" href="dashboard.php">
                        <i class="fas fa-th-large me-1"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'manage_students.php' ? 'active' : ''; ?>" href="manage_students.php">
                        <i class="fas fa-user-graduate me-1"></i> Students
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'manage_faculty.php' ? 'active' : ''; ?>" href="manage_faculty.php">
                        <i class="fas fa-chalkboard-teacher me-1"></i> Faculty
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'manage_courses.php' ? 'active' : ''; ?>" href="manage_courses.php">
                        <i class="fas fa-book-open me-1"></i> Courses
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'analytics.php' ? 'active' : ''; ?>" href="analytics.php">
                        <i class="fas fa-chart-pie me-1"></i> Analytics
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'create_notification.php' ? 'active' : ''; ?>" href="create_notification.php">
                        <i class="fas fa-bell me-1"></i> Notifications
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br><br><br>