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
        /* Increased Z-Index to ensure it sits ON TOP of everything */
        --z-sidebar: 1100;
        --z-overlay: 1090;
        --z-sidebar: 1100;
    }

    /* 1. Base Layout */
    #sidebar-wrapper {
        width: var(--sidebar-width);
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        background: linear-gradient(180deg, #2c3e50 0%, #4ca1af 100%); 
        color: #fff;
        z-index: var(--z-sidebar);
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        box-shadow: 4px 0 15px rgba(0,0,0,0.05);
        overflow-x: hidden;
        display: flex;
        flex-direction: column;
    }

    /* 2. Main Content Wrapper Push Logic */
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

    /* 3. Brand Area (FIXED) */
    .sidebar-brand {
        height: var(--header-height);
        min-height: var(--header-height);
        display: flex;
        align-items: center;
        /* This pushes the text to left and button to right, but keeps them safe */
        justify-content: space-between; 
        /* Added right padding so the button isn't stuck to the edge */
        padding: 0 15px 0 20px; 
        font-size: 1.1rem;
        font-weight: 700;
        color: white;
        border-bottom: 1px solid rgba(255,255,255,0.1);
        background-color: rgba(0,0,0,0.1);
        overflow: visible; /* Changed to visible so button isn't clipped */
    }

    /* 4. Navigation Links */
    .sidebar-nav {
        flex-grow: 1;
        padding-top: 1.5rem;
        overflow-y: auto;
        scrollbar-width: thin;
        scrollbar-color: rgba(255,255,255,0.2) transparent;
    }
    
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

    /* 5. Toggles (FIXED) */
    #sidebarToggle {
        background: transparent;
        border: none;
        color: #fff;
        cursor: pointer;
        transition: all 0.2s;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        
        /* FIX: Prevents button from squashing */
        flex-shrink: 0; 
        /* FIX: Removed margin-left: auto so it respects flex alignment */
        margin-left: 0; 
    }
    #sidebarToggle:hover { 
        background-color: rgba(255,255,255,0.1); 
    }

    /* Mobile Close Button (Hidden on Desktop) */
    #sidebarCloseMobile {
        display: none; 
        background: transparent;
        border: none;
        color: white;
        font-size: 1.2rem;
        padding: 10px;
        margin-left: auto; /* Push to right on mobile */
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
    .sidebar-overlay.active {
        display: block;
        opacity: 1;
    }


    /* --- RESPONSIVE LOGIC --- */

    /* A. DESKTOP MODE (min-width: 992px) */
    /* A. DESKTOP MODE (min-width: 992px) */
    @media (min-width: 992px) {
        /* Collapsed State Logic */
        body.sidebar-collapsed #sidebar-wrapper {
            width: var(--sidebar-collapsed-width);
        }
        
        body.sidebar-collapsed .main-content {
            margin-left: var(--sidebar-collapsed-width) !important;
        }
        
        /* FIX: Added !important to override Bootstrap 'd-flex' */
        body.sidebar-collapsed .brand-text,
        body.sidebar-collapsed .sidebar-link span,
        body.sidebar-collapsed .sidebar-heading {
            opacity: 0;
            pointer-events: none;
            display: none !important; /* Forces text to hide immediately */
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
            justify-content: center !important; /* Centers the icon */
            padding: 0;
            overflow: hidden; /* FIX: Cuts off anything that tries to stick out */
        }
        
        body.sidebar-collapsed #sidebarToggle {
            margin-left: 0; 
            margin-right: 0;
        }
        
        /* Ensure overlay is never shown on desktop */
        .sidebar-overlay { display: none !important; }
    }

    /* B. TABLET & MOBILE MODE (max-width: 991.98px) */
    @media (max-width: 991.98px) {
        #sidebar-wrapper { 
            margin-left: calc(var(--sidebar-width) * -1); 
        }
        
        .main-content { 
            margin-left: 0 !important; 
        }
        
        #sidebarToggle { display: none; }
        #sidebarCloseMobile { display: block; }

        body.sidebar-collapsed #sidebar-wrapper {
            margin-left: 0;
            box-shadow: 5px 0 25px rgba(0,0,0,0.3);
        }
        
        body.sidebar-collapsed .brand-text,
        body.sidebar-collapsed .sidebar-link span {
            display: block !important;
            opacity: 1 !important;
        }
        
        body.sidebar-collapsed .sidebar-link {
            justify-content: flex-start;
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
            <span style="letter-spacing: 1px;">FACULTY</span>
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
        
        <!-- Group 1: Teaching -->
        <div class="sidebar-heading">Teaching</div>
        
        <a href="mark_attendance.php" class="sidebar-link <?php echo $current_page == 'mark_attendance.php' ? 'active' : ''; ?>">
            <i class="fas fa-user-check"></i> <span>Mark Attendance</span>
        </a>
        
        <a href="upload_results.php" class="sidebar-link <?php echo $current_page == 'upload_results.php' ? 'active' : ''; ?>">
            <i class="fas fa-file-upload"></i> <span>Upload Results</span>
        </a>

         <a href="view_attendance.php" class="sidebar-link <?php echo $current_page == 'view_attendance' ? 'active' : ''; ?>">
            <i class="fas fa-user-check"></i> <span>View Attendance</span>
        </a>
        
        <!-- Group 2: Communication -->
        <div class="sidebar-heading">Communication</div>
        
        <a href="notifications.php" class="sidebar-link <?php echo $current_page == 'notifications.php' ? 'active' : ''; ?>">
            <i class="fas fa-bell"></i> <span>Notifications</span>
        </a>

        <div class="sidebar-heading">Logout</div>
        
        <a href="../auth/logout.php" class="sidebar-link <?php echo $current_page == '../auth/logout.php'  ? 'active' : ''; ?>">
            <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
        </a>
    </nav>
</div>

<!-- Script to Handle the Sidebar Toggle Logic -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const body = document.body;
        // Internal toggle (desktop)
        const desktopToggle = document.getElementById('sidebarToggle');
        // Internal close (mobile)
        const mobileClose = document.getElementById('sidebarCloseMobile');
        const overlay = document.getElementById('sidebarOverlay');
        
        // External triggers (Header buttons) - LISTENS TO MULTIPLE COMMON IDs
        const externalTriggers = [
            document.getElementById('sidebarToggleTop'), // Standard Bootstrap
            document.getElementById('headerToggle'),     // Common custom ID
            document.querySelector('.btn-toggle-sidebar') // Class based fallback
        ];

        function toggleSidebar(e) {
            if (e) {
                e.preventDefault();
                e.stopPropagation(); // Stop event bubbling
            }
            
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
            } else {
                // Save state preference only for Desktop
                const isCollapsed = body.classList.contains('sidebar-collapsed');
                localStorage.setItem('faculty-sidebar-state', isCollapsed ? 'collapsed' : 'expanded');
            }
        }
        
        function closeSidebarMobile() {
            body.classList.remove('sidebar-collapsed');
            overlay.classList.remove('active');
        }

        // Bind events
        if(desktopToggle) desktopToggle.addEventListener('click', toggleSidebar);
        if(mobileClose) mobileClose.addEventListener('click', closeSidebarMobile);
        if(overlay) overlay.addEventListener('click', closeSidebarMobile);
        
        // Bind external triggers safely
        externalTriggers.forEach(btn => {
            if(btn) btn.addEventListener('click', toggleSidebar);
        });

        // Restore State on Load (Desktop Only)
        if (window.innerWidth >= 992) {
            const state = localStorage.getItem('faculty-sidebar-state');
            if (state === 'collapsed') body.classList.add('sidebar-collapsed');
        }
        
        // Handle Resize Events (Reset overlay if resizing from mobile to desktop)
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 992) {
                overlay.classList.remove('active');
            } else {
                // On mobile resize, if sidebar is NOT open (no class), ensure overlay is hidden
                if (!body.classList.contains('sidebar-collapsed')) {
                    overlay.classList.remove('active');
                }
            }
        });
    });
</script>

<!-- START MAIN CONTENT WRAPPER -->
<div class="main-content">