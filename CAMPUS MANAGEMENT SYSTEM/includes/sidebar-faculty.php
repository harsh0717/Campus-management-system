<?php
    // Get current file name to set active class
    $current_page = basename($_SERVER['PHP_SELF']);
?>

<style>
    /* --- Sidebar Specific Styles --- */
    
    /* 1. Base Layout */
    #sidebar-wrapper {
        width: 260px;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        background: linear-gradient(180deg, #2c3e50 0%, #4ca1af 100%); 
        color: #fff;
        z-index: 1040;
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        box-shadow: 4px 0 15px rgba(0,0,0,0.05);
        overflow-x: hidden;
        display: flex;
        flex-direction: column;
    }

    /* 2. Main Content Wrapper Transition Logic */
    .main-content {
        transition: margin-left 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        margin-left: 260px; /* Default Open State */
        padding-top: 20px; 
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        width: auto; /* Allow it to fill remaining space */
        overflow-x: hidden; /* Prevent horizontal scroll during transition */
    }

    /* 3. Brand Area */
    .sidebar-brand {
        height: 70px;
        min-height: 70px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 1.5rem;
        font-size: 1.1rem;
        font-weight: 700;
        color: white;
        border-bottom: 1px solid rgba(255,255,255,0.1);
        background-color: rgba(0,0,0,0.1);
    }

    /* 4. Navigation Links */
    .sidebar-nav {
        flex-grow: 1;
        padding-top: 1.5rem;
        overflow-y: auto;
        scrollbar-width: thin;
        scrollbar-color: rgba(255,255,255,0.2) transparent;
    }

    .sidebar-heading {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 700;
        color: rgba(255,255,255,0.5);
        padding: 1.5rem 1.5rem 0.5rem;
    }

    .sidebar-link {
        display: flex;
        align-items: center;
        padding: 0.85rem 1.5rem;
        color: rgba(255,255,255,0.75);
        text-decoration: none;
        transition: all 0.2s ease-in-out;
        font-weight: 500;
        font-size: 0.95rem;
        border-left: 4px solid transparent;
        white-space: nowrap;
    }

    .sidebar-link:hover {
        color: #fff;
        background: rgba(255,255,255,0.05);
        padding-left: 1.8rem;
    }

    .sidebar-link.active {
        color: #fff;
        background: rgba(255,255,255,0.15);
        border-left-color: #fff;
        font-weight: 600;
    }

    .sidebar-link i {
        min-width: 24px;
        margin-right: 12px;
        text-align: center;
        font-size: 1.1rem;
    }

    /* 5. Toggle Button */
    #sidebarToggle {
        background: transparent;
        border: none;
        color: rgba(255,255,255,0.7);
        cursor: pointer;
        transition: color 0.2s;
    }
    #sidebarToggle:hover { color: #fff; }

    /* --- Desktop Collapsed State --- */
    @media (min-width: 992px) {
        body.sidebar-collapsed #sidebar-wrapper {
            width: 70px;
        }
        
        /* Adjust Main Content Margin */
        body.sidebar-collapsed .main-content {
            margin-left: 70px !important;
        }
        
        body.sidebar-collapsed .brand-text,
        body.sidebar-collapsed .sidebar-link span,
        body.sidebar-collapsed .sidebar-heading {
            display: none !important;
        }

        body.sidebar-collapsed .sidebar-link {
            justify-content: center;
            padding-left: 0;
            padding-right: 0;
        }
        body.sidebar-collapsed .sidebar-link:hover {
            padding-left: 0;
            background: rgba(255,255,255,0.1);
        }
        body.sidebar-collapsed .sidebar-link i {
            margin-right: 0;
        }
        
        body.sidebar-collapsed .sidebar-brand {
            justify-content: center;
            padding: 0;
        }
    }

    /* --- Mobile Responsive State (<992px) --- */
    @media (max-width: 991.98px) {
        #sidebar-wrapper { margin-left: -260px; }
        .main-content { margin-left: 0; }
        #sidebarToggle { display: none; }

        body.sidebar-collapsed #sidebar-wrapper {
            margin-left: 0;
            box-shadow: 5px 0 25px rgba(0,0,0,0.3);
        }
        
        /* On mobile, content does NOT shift when sidebar opens (overlay mode) */
        body.sidebar-collapsed .main-content {
            margin-left: 0 !important;
        }
        
        body.sidebar-collapsed .brand-text,
        body.sidebar-collapsed .sidebar-link span {
            display: block !important;
        }
    }
</style>

<div id="sidebar-wrapper">
    <div class="sidebar-brand">
        <div class="brand-text d-flex flex-column" style="line-height: 1.1;">
            <span style="letter-spacing: 1px;">FACULTY</span>
            <small style="font-size: 0.6rem; opacity: 0.6; letter-spacing: 2px;">PORTAL</small>
        </div>
        <button id="sidebarToggle" class="d-none d-lg-block"><i class="fas fa-bars"></i></button>
    </div>

    <nav class="sidebar-nav">
        <!-- Dashboard Link -->
        <a href="dashboard.php" class="sidebar-link <?php echo $current_page == 'dashboard.php' ? 'active' : ''; ?>">
            <i class="fas fa-th-large"></i> <span>Dashboard</span>
        </a>
        
        <!-- Group 1: Teaching -->
        <div class="sidebar-heading">Teaching</div>
        
        <a href="mark_attendance.php" class="sidebar-link <?php echo $current_page == 'mark_attendance.php' ? 'active' : ''; ?>">
            <i class="fas fa-user-check"></i> <span>Mark Attendance</span>
        </a>
        
        <a href="upload_results.php" class="sidebar-link <?php echo $current_page == 'upload_results.php' ? 'active' : ''; ?>">
            <i class="fas fa-file-upload"></i> <span>Upload Results</span>
        </a>
        
        <!-- Group 2: Communication -->
        <div class="sidebar-heading">Communication</div>
        
        <a href="notifications.php" class="sidebar-link <?php echo $current_page == 'notifications.php' ? 'active' : ''; ?>">
            <i class="fas fa-bell"></i> <span>Notifications</span>
        </a>
    </nav>
</div>

<!-- Script to Handle the Sidebar Toggle Logic -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const body = document.body;
        const toggle = document.getElementById('sidebarToggle');
        const overlay = document.getElementById('sidebarOverlay');

        function toggleSidebar(e) {
            if(e) e.preventDefault();
            body.classList.toggle('sidebar-collapsed');
            
            if (window.innerWidth >= 992) {
                const isCollapsed = body.classList.contains('sidebar-collapsed');
                localStorage.setItem('faculty-sidebar-state', isCollapsed ? 'collapsed' : 'expanded');
            }
        }

        if(toggle) toggle.addEventListener('click', toggleSidebar);

        if (window.innerWidth >= 992) {
            const state = localStorage.getItem('faculty-sidebar-state');
            if (state === 'collapsed') body.classList.add('sidebar-collapsed');
        }
    });
</script>

<!-- START MAIN CONTENT WRAPPER -->
<div class="main-content">