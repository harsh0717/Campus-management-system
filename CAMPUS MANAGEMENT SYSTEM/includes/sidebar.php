<?php
    // Get current file name to set active class
    $current_page = basename($_SERVER['PHP_SELF']);
?>

<style>
    /* Internal Sidebar Styles */
    .sidebar-brand {
        height: 70px; min-height: 70px; display: flex; align-items: center;
        justify-content: space-between; padding: 0 1.2rem;
        font-size: 1.15rem; font-weight: 700; color: white;
        border-bottom: 1px solid rgba(255,255,255,0.1);
    }
    #sidebarToggle {
        background: none; border: none; color: rgba(255,255,255,0.8);
        cursor: pointer; width: 35px; height: 35px;
        display: flex; align-items: center; justify-content: center;
        border-radius: 50%; transition: all 0.2s;
    }
    #sidebarToggle:hover { background-color: rgba(255,255,255,0.1); color: #fff; }
    
    .sidebar-nav {
        flex-grow: 1; padding-top: 1rem; overflow-y: auto;
        scrollbar-width: thin; scrollbar-color: rgba(255,255,255,0.2) transparent;
    }
    .sidebar-link {
        display: flex; align-items: center; padding: 0.85rem 1.5rem;
        color: rgba(255,255,255,0.8); text-decoration: none;
        transition: all 0.2s; font-weight: 500; white-space: nowrap;
    }
    .sidebar-link:hover { color: #fff; background: rgba(255,255,255,0.08); padding-left: 1.7rem; }
    .sidebar-link.active { color: #fff; background: rgba(255,255,255,0.15); border-left: 4px solid #fff; font-weight: 600; padding-left: calc(1.5rem - 4px); }
    .sidebar-link i { min-width: 24px; margin-right: 12px; text-align: center; font-size: 1rem; }
    .sidebar-heading { font-size: 0.7rem; text-transform: uppercase; letter-spacing: 1.2px; font-weight: 700; color: rgba(255,255,255,0.5); padding: 1.5rem 1.5rem 0.5rem; }

    /* Desktop Collapsed view adjustments */
    @media (min-width: 992px) {
        body.sidebar-collapsed .brand-text, 
        body.sidebar-collapsed .sidebar-link span,
        body.sidebar-collapsed .sidebar-heading { display: none !important; }
        body.sidebar-collapsed .sidebar-link { padding: 0.85rem 0; justify-content: center; }
        body.sidebar-collapsed .sidebar-link:hover { padding-left: 0; background: rgba(255,255,255,0.1); }
        body.sidebar-collapsed .sidebar-link i { margin-right: 0; }
        body.sidebar-collapsed .sidebar-brand { justify-content: center; padding: 0; }
        body.sidebar-collapsed #sidebarToggle { width: 100%; border-radius: 0; }
        body.sidebar-collapsed #sidebar-wrapper { width: var(--sidebar-collapsed-width); }
        body.sidebar-collapsed .main-content { margin-left: var(--sidebar-collapsed-width); }
    }
    /* Mobile adjustments */
    @media (max-width: 991.98px) {
        #sidebarToggle { display: none; } 
        body.sidebar-collapsed .brand-text, 
        body.sidebar-collapsed .sidebar-link span,
        body.sidebar-collapsed .sidebar-heading { display: block !important; }
        body.sidebar-collapsed .sidebar-link { justify-content: flex-start; padding-left: 1.5rem; }
        body.sidebar-collapsed .sidebar-link i { margin-right: 12px; }
    }
</style>

<div id="sidebar-wrapper">
    <div class="sidebar-brand">
        <div class="brand-text d-flex align-items-center">
            <i class="fas fa-graduation-cap me-2 fs-4"></i>
            <div class="d-flex flex-column" style="line-height: 1;">
                <span style="letter-spacing: 1px;">NTC</span>
                <small style="font-size:0.55rem; opacity:0.6; letter-spacing: 2px;">ADMIN PANEL</small>
            </div>
        </div>
        <!-- Toggle Button for Desktop -->
        <button id="sidebarToggle" title="Toggle Sidebar"><i class="fas fa-bars"></i></button>
    </div>

    <nav class="sidebar-nav">
        <!-- Dashboard -->
        <a href="dashboard.php" class="sidebar-link <?php echo $current_page == 'dashboard.php' ? 'active' : ''; ?>">
            <i class="fas fa-th-large"></i> <span>Dashboard</span>
        </a>
        
        <div class="sidebar-heading">Academic</div>
        
        <!-- Students -->
        <a href="manage_students.php" class="sidebar-link <?php echo $current_page == 'manage_students.php' ? 'active' : ''; ?>">
            <i class="fas fa-user-graduate"></i> <span>Manage Students</span>
        </a>
        
        <!-- Faculty -->
        <a href="manage_faculty.php" class="sidebar-link <?php echo $current_page == 'manage_faculty.php' ? 'active' : ''; ?>">
            <i class="fas fa-chalkboard-teacher"></i> <span>Manage Faculty</span>
        </a>
        
        <!-- Courses -->
        <a href="manage_courses.php" class="sidebar-link <?php echo $current_page == 'manage_courses.php' ? 'active' : ''; ?>">
            <i class="fas fa-book-open"></i> <span>Course Catalog</span>
        </a>
        
        <div class="sidebar-heading">Reports</div>
        
        <!-- Analytics -->
        <a href="analytics.php" class="sidebar-link <?php echo $current_page == 'analytics.php' ? 'active' : ''; ?>">
            <i class="fas fa-chart-pie"></i> <span>Analytics</span>
        </a>
        
        <!-- Notifications -->
        <a href="create_notification.php" class="sidebar-link <?php echo $current_page == 'create_notification.php' ? 'active' : ''; ?>">
            <i class="fas fa-bell"></i> <span>Notifications</span>
        </a>
    </nav>
</div>

<!-- Script to Handle the Sidebar Toggle Logic -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const body = document.body;
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebarToggleTop = document.getElementById('sidebarToggleTop');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        function toggleSidebar(e) {
            if(e) e.preventDefault();
            body.classList.toggle('sidebar-collapsed');
            if (window.innerWidth >= 992) {
                const isCollapsed = body.classList.contains('sidebar-collapsed');
                localStorage.setItem('sidebar-state', isCollapsed ? 'collapsed' : 'expanded');
            }
        }

        if(sidebarToggle) sidebarToggle.addEventListener('click', toggleSidebar);
        if(sidebarToggleTop) sidebarToggleTop.addEventListener('click', toggleSidebar);
        if(sidebarOverlay) sidebarOverlay.addEventListener('click', function() {
            body.classList.remove('sidebar-collapsed');
        });

        // Restore State on Load (Desktop Only)
        if (window.innerWidth >= 992) {
            const savedState = localStorage.getItem('sidebar-state');
            if (savedState === 'collapsed') body.classList.add('sidebar-collapsed');
        }
    });
</script>

<!-- START MAIN CONTENT WRAPPER -->
<div class="main-content">