<?php
    // Get current file name to set active class
    $current_page = basename($_SERVER['PHP_SELF']);
?>

<style>
    /* --- Sidebar Variables & Base --- */
    :root {
        --sidebar-width: 260px;
        --sidebar-collapsed-width: 70px;
        --header-height: 70px;
        --z-sidebar: 1040;
        --z-overlay: 1030;
    }

    /* 1. Base Layout */
    #sidebar-wrapper {
        width: var(--sidebar-width);
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        /* Student Gradient */
        background: linear-gradient(180deg, #2c3e50 0%, #3498db 100%); 
        color: #fff;
        z-index: var(--z-sidebar);
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        box-shadow: 4px 0 15px rgba(0,0,0,0.05);
        overflow-x: hidden;
        display: flex;
        flex-direction: column;
    }

    /* 2. Main Content Wrapper Push Logic */
    /* This class should be used on the div wrapping your page content */
    .main-content {
        transition: margin-left 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        margin-left: var(--sidebar-width); 
        padding-top: 20px; 
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        width: auto;
        overflow-x: hidden;
    }

    /* 3. Brand Area */
    .sidebar-brand {
        height: var(--header-height);
        min-height: var(--header-height);
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
    
    /* Scrollbar styling for Webkit */
    .sidebar-nav::-webkit-scrollbar { width: 6px; }
    .sidebar-nav::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.2); border-radius: 3px; }
    .sidebar-nav::-webkit-scrollbar-track { background: transparent; }

    .sidebar-heading {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 700;
        color: rgba(255,255,255,0.5);
        padding: 1.5rem 1.5rem 0.5rem;
        white-space: nowrap;
        overflow: hidden;
        transition: opacity 0.3s;
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

    /* 5. Toggles */
    #sidebarToggle {
        background: transparent;
        border: none;
        color: rgba(255,255,255,0.7);
        cursor: pointer;
        transition: color 0.2s;
    }
    #sidebarToggle:hover { color: #fff; }

    /* Mobile Close Button (Hidden on Desktop) */
    #sidebarCloseMobile {
        display: none; 
        background: transparent;
        border: none;
        color: white;
        font-size: 1.2rem;
    }

    /* 6. Mobile Overlay Backdrop */
    .sidebar-overlay {
        display: none;
        position: fixed;
        top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0,0,0,0.5);
        z-index: var(--z-overlay);
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
    }
    /* When active class is added via JS */
    .sidebar-overlay.active {
        display: block;
        opacity: 1;
    }


    /* --- RESPONSIVE LOGIC --- */

    /* A. DESKTOP MODE (min-width: 992px) */
    @media (min-width: 992px) {
        /* Collapsed State Logic */
        body.sidebar-collapsed #sidebar-wrapper {
            width: var(--sidebar-collapsed-width);
        }
        
        body.sidebar-collapsed .main-content {
            margin-left: var(--sidebar-collapsed-width) !important;
        }
        
        body.sidebar-collapsed .brand-text,
        body.sidebar-collapsed .sidebar-link span,
        body.sidebar-collapsed .sidebar-heading {
            opacity: 0;
            pointer-events: none;
            display: none; /* Helps remove layout space */
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
        
        /* Ensure overlay is never shown on desktop */
        .sidebar-overlay { display: none !important; }
    }

    /* B. TABLET & MOBILE MODE (max-width: 991.98px) */
    @media (max-width: 991.98px) {
        /* Default: Hidden off-screen */
        #sidebar-wrapper { 
            margin-left: calc(var(--sidebar-width) * -1); 
        }
        
        /* Main Content: Always full width on mobile, no margin push */
        .main-content { 
            margin-left: 0 !important; 
        }
        
        /* Hide the desktop toggle inside sidebar, show mobile close */
        #sidebarToggle { display: none; }
        #sidebarCloseMobile { display: block; }

        /* Active State (When 'sidebar-collapsed' class is present on body) */
        /* Note: We reuse the class 'sidebar-collapsed' to mean "Active/Open" on mobile to keep JS simple */
        body.sidebar-collapsed #sidebar-wrapper {
            margin-left: 0;
            box-shadow: 5px 0 25px rgba(0,0,0,0.3);
        }
        
        /* Ensure content inside sidebar looks normal (not collapsed icons) on mobile */
        body.sidebar-collapsed .brand-text,
        body.sidebar-collapsed .sidebar-link span {
            display: block !important;
            opacity: 1 !important;
        }
        
        body.sidebar-collapsed .sidebar-link {
            justify-content: flex-start; /* Reset alignment */
            padding-left: 1.5rem;
        }
        
        body.sidebar-collapsed .sidebar-link i {
            margin-right: 12px;
        }
    }
</style>

<!-- Overlay for Mobile -->
<div id="sidebarOverlay" class="sidebar-overlay"></div>

<div id="sidebar-wrapper">
    <div class="sidebar-brand">
        <div class="brand-text d-flex flex-column" style="line-height: 1.1;">
            <span style="letter-spacing: 1px;">STUDENT</span>
            <small style="font-size: 0.6rem; opacity: 0.6; letter-spacing: 2px;">PORTAL</small>
        </div>
        <!-- Desktop Toggle (Shrink) -->
        <button id="sidebarToggle" class="d-none d-lg-block"><i class="fas fa-bars"></i></button>
        <!-- Mobile Close (Hide) -->
        <button id="sidebarCloseMobile"><i class="fas fa-times"></i></button>
    </div>

    <nav class="sidebar-nav">
        <!-- Dashboard Link -->
        <a href="dashboard.php" class="sidebar-link <?php echo $current_page == 'dashboard.php' ? 'active' : ''; ?>">
            <i class="fas fa-th-large"></i> <span>Dashboard</span>
        </a>
        
        <!-- Group 1: Academics -->
        <div class="sidebar-heading">Academics</div>
        
        <a href="attendance.php" class="sidebar-link <?php echo $current_page == 'attendance.php' ? 'active' : ''; ?>">
            <i class="fas fa-calendar-alt"></i> <span>My Attendance</span>
        </a>
        
        <a href="results.php" class="sidebar-link <?php echo $current_page == 'results.php' ? 'active' : ''; ?>">
            <i class="fas fa-poll-h"></i> <span>Exam Results</span>
        </a>
        
        <!-- Group 2: Account -->
        <div class="sidebar-heading">Account</div>
        
        <a href="notifications.php" class="sidebar-link <?php echo $current_page == 'notifications.php' ? 'active' : ''; ?>">
            <i class="fas fa-bell"></i> <span>Notifications</span>
        </a>

        <a href="profile.php" class="sidebar-link <?php echo $current_page == 'profile.php' ? 'active' : ''; ?>">
            <i class="fas fa-user-circle"></i> <span>My Profile</span>
        </a>
    </nav>
</div>

<!-- Script to Handle the Sidebar Toggle Logic -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const body = document.body;
        const desktopToggle = document.getElementById('sidebarToggle');
        const mobileClose = document.getElementById('sidebarCloseMobile');
        const overlay = document.getElementById('sidebarOverlay');
        
        // This button usually lives in the Header.php, but we check if it exists there
        const headerToggle = document.getElementById('headerToggle'); 

        // Main Toggle Function
        function toggleSidebar(e) {
            if(e) e.preventDefault();
            
            // Toggle the class that controls state
            body.classList.toggle('sidebar-collapsed');
            
            // Handle Overlay Visibility for Mobile
            if (window.innerWidth < 992) {
                if (body.classList.contains('sidebar-collapsed')) {
                    // Mobile: Sidebar is OPEN
                    overlay.classList.add('active');
                } else {
                    // Mobile: Sidebar is CLOSED
                    overlay.classList.remove('active');
                }
            }

            // Save state preference only for Desktop
            if (window.innerWidth >= 992) {
                const isCollapsed = body.classList.contains('sidebar-collapsed');
                localStorage.setItem('student-sidebar-state', isCollapsed ? 'collapsed' : 'expanded');
            }
        }
        
        // Close Sidebar Function (Mobile)
        function closeSidebarMobile() {
            body.classList.remove('sidebar-collapsed');
            overlay.classList.remove('active');
        }

        // Event Listeners
        if(desktopToggle) desktopToggle.addEventListener('click', toggleSidebar);
        if(mobileClose) mobileClose.addEventListener('click', closeSidebarMobile);
        if(overlay) overlay.addEventListener('click', closeSidebarMobile);
        
        // If you have a toggle button in your header.php
        const externalToggle = document.getElementById('sidebarToggleTop');
        if(externalToggle) externalToggle.addEventListener('click', toggleSidebar);

        // Restore State on Load (Desktop Only)
        if (window.innerWidth >= 992) {
            const state = localStorage.getItem('student-sidebar-state');
            if (state === 'collapsed') body.classList.add('sidebar-collapsed');
        }
        
        // Handle Resize Events
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 992) {
                overlay.classList.remove('active');
            }
        });
    });
</script>

<!-- START MAIN CONTENT WRAPPER -->
<div class="main-content">