<style>
    /* --- Sidebar Specific Styles --- */
    
    /* 1. Base Layout */
    #sidebar-wrapper {
        width: 260px;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        background: linear-gradient(180deg, #4e73df 0%, #224abe 100%);
        background: linear-gradient(180deg, var(--uni-primary, #4e73df) 0%, var(--uni-secondary, #224abe) 100%);
        color: #fff;
        z-index: 1040;
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1); /* Smooth sizing */
        box-shadow: 4px 0 15px rgba(0,0,0,0.05);
        overflow-x: hidden; /* Hide text when shrinking */
    }

    /* 2. Content Margin Sync (Prevents Overlap) 
       This ensures the main content moves with the sidebar */
    .main-content {
        transition: margin-left 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        margin-left: 260px; /* Default Desktop */
    }

    /* 3. Header/Brand Area */
    .sidebar-brand {
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: space-between; /* Space between logo and toggle */
        padding: 0 1.2rem;
        font-size: 1.15rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        color: white;
        border-bottom: 1px solid rgba(255,255,255,0.1);
    }

    .brand-text {
        transition: opacity 0.2s;
        white-space: nowrap;
        overflow: hidden;
    }

    /* Toggle Button Style */
    #sidebarToggle {
        background: none;
        border: none;
        color: rgba(255,255,255,0.8);
        cursor: pointer;
        padding: 5px;
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        transition: all 0.2s;
    }
    #sidebarToggle:hover { 
        color: #fff; 
        background-color: rgba(255,255,255,0.1);
    }

    /* 4. Navigation Links */
    .sidebar-nav {
        padding-top: 1.5rem;
        overflow-y: auto;
        height: calc(100vh - 70px);
        scrollbar-width: thin;
        scrollbar-color: rgba(255,255,255,0.2) transparent;
    }
    
    .sidebar-nav::-webkit-scrollbar { width: 5px; }
    .sidebar-nav::-webkit-scrollbar-thumb { background-color: rgba(255,255,255,0.2); border-radius: 3px; }

    .sidebar-link {
        display: flex;
        align-items: center;
        padding: 0.85rem 1.5rem;
        color: rgba(255,255,255,0.8);
        text-decoration: none;
        transition: all 0.2s;
        font-weight: 500;
        font-size: 0.9rem;
        border-left: 4px solid transparent;
        white-space: nowrap; /* Prevent text wrapping when shrinking */
    }

    .sidebar-link:hover {
        color: #fff;
        background: rgba(255,255,255,0.08);
        padding-left: 1.7rem;
    }

    .sidebar-link.active {
        color: #fff;
        background: rgba(255,255,255,0.15);
        border-left-color: #fff;
        font-weight: 600;
    }

    .sidebar-link i {
        min-width: 24px; /* Fixed width for icons ensures alignment */
        margin-right: 12px;
        text-align: center;
        font-size: 1rem;
    }
    
    .sidebar-heading {
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 1.2px;
        font-weight: 700;
        color: rgba(255,255,255,0.5);
        padding: 1.5rem 1.5rem 0.5rem;
        white-space: nowrap;
    }

    /* --- COLLAPSED STATE (The "Icon Only" Mode) --- */
    body.sidebar-collapsed #sidebar-wrapper {
        width: 70px;
    }
    
    body.sidebar-collapsed .main-content {
        margin-left: 70px; /* Shrink content margin */
    }

    /* Hide Text elements when collapsed */
    body.sidebar-collapsed .brand-text,
    body.sidebar-collapsed .sidebar-link span,
    body.sidebar-collapsed .sidebar-heading {
        display: none !important; /* Force hide */
        opacity: 0;
    }

    /* Center Icons when collapsed */
    body.sidebar-collapsed .sidebar-link {
        padding-left: 0;
        padding-right: 0;
        justify-content: center;
    }
    body.sidebar-collapsed .sidebar-link:hover {
        padding-left: 0; /* Remove slide effect in mini mode */
        background: rgba(255,255,255,0.1);
    }
    body.sidebar-collapsed .sidebar-link i {
        margin-right: 0;
    }
    
    /* Adjust Header in collapsed mode */
    body.sidebar-collapsed .sidebar-brand {
        padding: 0;
        justify-content: center;
    }
    
    /* Force Toggle Button to be visible and centered */
    body.sidebar-collapsed #sidebarToggle {
        margin: 0;
        width: 100%; /* Fill the entire width of collapsed sidebar */
        height: 70px; /* Fill the entire height of header */
        border-radius: 0;
        justify-content: center;
        background-color: transparent;
    }
    body.sidebar-collapsed #sidebarToggle:hover {
        background-color: rgba(255,255,255,0.1);
    }
    
    /* Increase icon size when collapsed for better visibility */
    body.sidebar-collapsed #sidebarToggle i {
        font-size: 1.5rem;
    }

    /* --- MOBILE RESPONSIVE --- */
    @media (max-width: 768px) {
        #sidebar-wrapper { margin-left: -260px; } /* Hidden by default on mobile */
        .main-content { margin-left: 0; }
        
        /* When toggled on mobile, show full width */
        body.sidebar-collapsed #sidebar-wrapper {
            margin-left: 0;
            width: 260px; /* Full width on mobile when open */
        }
        
        /* Re-show text on mobile even if "collapsed" class is active (since it acts as 'open' on mobile) */
        body.sidebar-collapsed .brand-text,
        body.sidebar-collapsed .sidebar-link span,
        body.sidebar-collapsed .sidebar-heading {
            display: block !important; 
            opacity: 1;
        }
        body.sidebar-collapsed .sidebar-link {
            justify-content: flex-start;
            padding-left: 1.5rem;
        }
        body.sidebar-collapsed .sidebar-link i {
            margin-right: 12px;
        }
        body.sidebar-collapsed .sidebar-brand {
            padding: 0 1.2rem;
            justify-content: space-between;
        }
        /* Reset toggle button on mobile */
        body.sidebar-collapsed #sidebarToggle {
            width: 35px;
            height: 35px;
            border-radius: 50%;
        }
    }
</style>

<!-- Sidebar Wrapper -->
<div id="sidebar-wrapper">
    <!-- Brand Logo & Toggle -->
    <div class="sidebar-brand">
        <!-- Logo Text -->
        <div class="brand-text d-flex align-items-center">
            <i class="fas fa-graduation-cap me-2 fs-4"></i>
            <div class="d-flex flex-column" style="line-height: 1;">
                <span style="letter-spacing: 1px;">NTC  </span>
                <small style="font-size:0.55rem; opacity:0.6; letter-spacing: 2px;">WORST COLLEGE IN GTU</small>
            </div>
        </div>
        
        <!-- The Three-Line Toggle Icon -->
        <button id="sidebarToggle" title="Toggle Sidebar">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <!-- Navigation Menu -->
    <nav class="sidebar-nav">
        <!-- Dashboard Link -->
        <a href="#" class="sidebar-link">
            <i class="fas fa-th-large"></i> <span>Dashboard</span>
        </a>

        <div class="sidebar-heading">Academic</div>

        <!-- Students Link -->
        <a href="#" class="sidebar-link">
            <i class="fas fa-user-graduate"></i> <span>Manage Students</span>
        </a>

        <!-- Faculty Link -->
        <a href="#" class="sidebar-link">
            <i class="fas fa-chalkboard-teacher"></i> <span>Manage Faculty</span>
        </a>

        <!-- Courses Link -->
        <a href="#" class="sidebar-link">
            <i class="fas fa-book-open"></i> <span>Course Catalog</span>
        </a>

        <div class="sidebar-heading">Reports & Tools</div>

        <!-- Analytics Link -->
        <a href="#" class="sidebar-link">
            <i class="fas fa-chart-pie"></i> <span>Analytics</span>
        </a>
        
        <!-- Notifications Link -->
        <a href="#" class="sidebar-link">
            <i class="fas fa-bell"></i> <span>Notifications</span>
        </a>
    </nav>
</div>

<!-- Script to Handle the Toggle Logic -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleBtn = document.getElementById('sidebarToggle');
        
        if(toggleBtn) {
            toggleBtn.addEventListener('click', function(e) {
                e.preventDefault();
                document.body.classList.toggle('sidebar-collapsed');
                
                // Optional: Store preference in localStorage
                const isCollapsed = document.body.classList.contains('sidebar-collapsed');
                localStorage.setItem('sidebar-state', isCollapsed ? 'collapsed' : 'expanded');
            });
        }

        // Check localStorage on load (Optional - removes flicker if preference saved)
        if (localStorage.getItem('sidebar-state') === 'collapsed') {
            document.body.classList.add('sidebar-collapsed');
        }
    });
</script>

<!-- Open Main Content Wrapper (Included here so it wraps every page automatically) -->
<div class="main-content">