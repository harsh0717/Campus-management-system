<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Management System - Admin Dashboard</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- HEADER STYLES -->
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #224abe;
            --sidebar-width: 260px;
            --sidebar-collapsed-width: 70px;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden; /* Prevent horizontal scroll on mobile transitions */
        }

        /* --- Navbar Styles --- */
        .navbar-custom {
            background: linear-gradient(to right, #4e73df, #224abe);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            position: fixed; /* Fix header to top */
            top: 0;
            right: 0;
            z-index: 1030;
            height: 70px;
            
            /* Responsive Width & Margin logic */
            margin-left: var(--sidebar-width);
            width: calc(100% - var(--sidebar-width));
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        .navbar-brand {
            font-weight: 700;
            letter-spacing: 0.5px;
            font-size: 1.1rem;
        }
        
        /* Sidebar Toggle Button in Navbar (Visible on Mobile) */
        #sidebarToggleTop {
            background: transparent;
            border: none;
            color: rgba(255,255,255,0.8);
            font-size: 1.25rem;
            padding: 0 15px;
            transition: color 0.2s;
        }
        #sidebarToggleTop:hover { color: #fff; }

        /* --- Sidebar Collapsed State (PC) --- */
        body.sidebar-collapsed .navbar-custom {
            margin-left: var(--sidebar-collapsed-width);
            width: calc(100% - var(--sidebar-collapsed-width));
        }

        /* --- Mobile/Tablet Responsiveness (<992px) --- */
        @media (max-width: 991.98px) {
            .navbar-custom {
                margin-left: 0;
                width: 100%;
            }
            body.sidebar-collapsed .navbar-custom {
                margin-left: 0;
                width: 100%;
            }
            .navbar-brand {
                font-size: 1rem; /* Slightly smaller text on mobile */
            }
        }
    </style>

    <!-- SIDEBAR STYLES -->
    <style>
        /* 1. Base Sidebar */
        #sidebar-wrapper {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: linear-gradient(180deg, #4e73df 0%, #224abe 100%);
            color: #fff;
            z-index: 1040;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            box-shadow: 4px 0 15px rgba(0,0,0,0.05);
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
        }

        /* 2. Main Content Wrapper */
        .main-content {
            transition: margin-left 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            margin-left: var(--sidebar-width);
            margin-top: 70px; /* Offset for fixed header */
            display: flex;
            flex-direction: column;
            min-height: calc(100vh - 70px);
        }

        /* 3. Header Area inside Sidebar */
        .sidebar-brand {
            height: 70px;
            min-height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1.2rem;
            font-size: 1.15rem;
            font-weight: 700;
            color: white;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        /* Internal Sidebar Toggle (PC Only) */
        #sidebarToggle {
            background: none;
            border: none;
            color: rgba(255,255,255,0.8);
            cursor: pointer;
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.2s;
        }
        #sidebarToggle:hover { background-color: rgba(255,255,255,0.1); color: #fff; }

        /* 4. Navigation Links */
        .sidebar-nav {
            flex-grow: 1;
            padding-top: 1rem;
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: rgba(255,255,255,0.2) transparent;
        }
        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 0.85rem 1.5rem;
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: all 0.2s;
            font-weight: 500;
            white-space: nowrap;
        }
        .sidebar-link:hover { color: #fff; background: rgba(255,255,255,0.08); padding-left: 1.7rem; }
        .sidebar-link.active { color: #fff; background: rgba(255,255,255,0.15); border-left: 4px solid #fff; font-weight: 600; padding-left: calc(1.5rem - 4px); }
        .sidebar-link i { min-width: 24px; margin-right: 12px; text-align: center; font-size: 1rem; }
        .sidebar-heading { font-size: 0.7rem; text-transform: uppercase; letter-spacing: 1.2px; font-weight: 700; color: rgba(255,255,255,0.5); padding: 1.5rem 1.5rem 0.5rem; }

        /* --- PC COLLAPSED STATE (Desktop Mini Mode) --- */
        @media (min-width: 992px) {
            body.sidebar-collapsed #sidebar-wrapper { width: var(--sidebar-collapsed-width); }
            body.sidebar-collapsed .main-content { margin-left: var(--sidebar-collapsed-width); }
            
            /* Hide Text */
            body.sidebar-collapsed .brand-text,
            body.sidebar-collapsed .sidebar-link span,
            body.sidebar-collapsed .sidebar-heading { display: none !important; }
            
            /* Center Icons */
            body.sidebar-collapsed .sidebar-link { padding: 0.85rem 0; justify-content: center; }
            body.sidebar-collapsed .sidebar-link:hover { padding-left: 0; background: rgba(255,255,255,0.1); }
            body.sidebar-collapsed .sidebar-link i { margin-right: 0; }
            body.sidebar-collapsed .sidebar-brand { justify-content: center; padding: 0; }
            body.sidebar-collapsed #sidebarToggle { width: 100%; border-radius: 0; }
        }

        /* --- MOBILE/TABLET RESPONSIVE STATE (<992px) --- */
        @media (max-width: 991.98px) {
            /* Default: Hidden off-screen */
            #sidebar-wrapper { margin-left: -260px; }
            .main-content { margin-left: 0; }
            
            /* Hide the internal PC toggle since we have the top Navbar toggle now */
            #sidebarToggle { display: none; } 

            /* "Collapsed" class on Mobile actually means "OPEN" (Overlay Mode) */
            body.sidebar-collapsed #sidebar-wrapper { margin-left: 0; box-shadow: 5px 0 20px rgba(0,0,0,0.2); }
            
            /* Keep text visible on mobile when open */
            body.sidebar-collapsed .brand-text, 
            body.sidebar-collapsed .sidebar-link span,
            body.sidebar-collapsed .sidebar-heading { display: block !important; }
            
            body.sidebar-collapsed .sidebar-link { justify-content: flex-start; padding-left: 1.5rem; }
            body.sidebar-collapsed .sidebar-link i { margin-right: 12px; }
        }

        /* Overlay for Mobile */
        #sidebarOverlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0,0,0,0.5);
            z-index: 1035; /* Behind sidebar (1040) but above navbar (1030) content */
            backdrop-filter: blur(2px);
        }
        body.sidebar-collapsed #sidebarOverlay {
            display: block; /* Only show on mobile when sidebar is open */
        }
        @media (min-width: 992px) {
            body.sidebar-collapsed #sidebarOverlay { display: none; } /* Never show overlay on Desktop */
        }
    </style>

    <!-- DASHBOARD & FOOTER STYLES -->
    <style>
        .dashboard-card {
            border: none;
            border-radius: 20px;
            background-color: #fff;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .dashboard-card:hover { transform: translateY(-5px); box-shadow: 0 15px 30px rgba(0,0,0,0.12); }
        .bg-gradient-primary { background: linear-gradient(135deg, #4e73df 0%, #224abe 100%); }
        .bg-gradient-success { background: linear-gradient(135deg, #1cc88a 0%, #13855c 100%); }
        .bg-gradient-info    { background: linear-gradient(135deg, #36b9cc 0%, #258391 100%); }
        .bg-gradient-warning { background: linear-gradient(135deg, #f6c23e 0%, #dda20a 100%); }
        
        .icon-box { width: 56px; height: 56px; display: flex; align-items: center; justify-content: center; border-radius: 16px; font-size: 1.5rem; color: white; }
        
        .card-header-gradient { background: linear-gradient(135deg, #4e73df 0%, #224abe 100%); }
        
        .main-footer {
            background: linear-gradient(to right, #4e73df, #224abe);
            color: white;
            box-shadow: 0 -4px 15px rgba(0,0,0,0.1);
            margin-top: auto;
        }
        
        /* Table Scroll Fix */
        .table-custom { min-width: 600px; } /* Ensures table doesn't squish too much */
    </style>
</head>
<body>

    <!-- Overlay for Mobile (Click to close sidebar) -->
    <div id="sidebarOverlay"></div>

    <!-- ============================================ -->
    <!-- 1. NAVIGATION BAR                            -->
    <!-- ============================================ -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container-fluid px-2 px-lg-4"> 
            
            <div class="d-flex align-items-center">
                <!-- Mobile Sidebar Toggle (Hidden on Desktop) -->
                <button id="sidebarToggleTop" class="d-lg-none me-2">
                    <i class="fas fa-bars"></i>
                </button>

                <a class="navbar-brand" href="#">
                    <i class="fas fa-university me-2"></i>
                    <span class="d-none d-sm-inline">Campus Management System</span>
                    <span class="d-inline d-sm-none">CMS</span> <!-- Short name for tiny screens -->
                </a>
            </div>
            
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-ellipsis-v text-white"></i> <!-- Changed to dots for menu items -->
            </button>
            
             <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Example Right Side Items -->
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-bell"></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-user-circle"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ============================================ -->
    <!-- 2. SIDEBAR                                   -->
    <!-- ============================================ -->
    <div id="sidebar-wrapper">
        <div class="sidebar-brand">
            <div class="brand-text d-flex align-items-center">
                <i class="fas fa-graduation-cap me-2 fs-4"></i>
                <div class="d-flex flex-column" style="line-height: 1;">
                    <span style="letter-spacing: 1px;">NTC</span>
                    <small style="font-size:0.55rem; opacity:0.6; letter-spacing: 2px;">ADMIN PANEL</small>
                </div>
            </div>
            
            <!-- Desktop Toggle (Inside Sidebar) -->
            <button id="sidebarToggle" title="Toggle Sidebar">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <nav class="sidebar-nav">
            <a href="#" class="sidebar-link active"><i class="fas fa-th-large"></i> <span>Dashboard</span></a>
            <div class="sidebar-heading">Academic</div>
            <a href="#" class="sidebar-link"><i class="fas fa-user-graduate"></i> <span>Manage Students</span></a>
            <a href="#" class="sidebar-link"><i class="fas fa-chalkboard-teacher"></i> <span>Manage Faculty</span></a>
            <a href="#" class="sidebar-link"><i class="fas fa-book-open"></i> <span>Course Catalog</span></a>
            <div class="sidebar-heading">Reports</div>
            <a href="#" class="sidebar-link"><i class="fas fa-chart-pie"></i> <span>Analytics</span></a>
            <a href="#" class="sidebar-link"><i class="fas fa-bell"></i> <span>Notifications</span></a>
        </nav>
    </div>

    <!-- Script to Handle the Toggle Logic -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const body = document.body;
            const sidebarToggle = document.getElementById('sidebarToggle');       // Desktop Toggle
            const sidebarToggleTop = document.getElementById('sidebarToggleTop'); // Mobile Toggle
            const sidebarOverlay = document.getElementById('sidebarOverlay');     // Mobile Overlay

            // Function to toggle sidebar
            function toggleSidebar(e) {
                if(e) e.preventDefault();
                body.classList.toggle('sidebar-collapsed');
                
                // Save state only for Desktop (PC)
                if (window.innerWidth >= 992) {
                    const isCollapsed = body.classList.contains('sidebar-collapsed');
                    localStorage.setItem('sidebar-state', isCollapsed ? 'collapsed' : 'expanded');
                }
            }

            // Event Listeners
            if(sidebarToggle) sidebarToggle.addEventListener('click', toggleSidebar);
            if(sidebarToggleTop) sidebarToggleTop.addEventListener('click', toggleSidebar);
            if(sidebarOverlay) sidebarOverlay.addEventListener('click', function() {
                // Clicking overlay always closes sidebar on mobile
                body.classList.remove('sidebar-collapsed');
            });

            // Restore State on Load (Desktop Only)
            if (window.innerWidth >= 992) {
                const savedState = localStorage.getItem('sidebar-state');
                if (savedState === 'collapsed') {
                    body.classList.add('sidebar-collapsed');
                }
            }
        });
    </script>

    <!-- ============================================ -->
    <!-- 3. MAIN CONTENT                              -->
    <!-- ============================================ -->
    <div class="main-content">

        <!-- Dashboard Content -->
        <div class="container-fluid px-4 pb-5 flex-grow-1" style="background: linear-gradient(135deg, #eff3f9 0%, #dce4f1 100%);">
            
            <!-- Page Header -->
            <div class="d-flex justify-content-between align-items-center pt-4 mb-5">
                <div>
                    <h1 class="h2 fw-bold text-dark mb-1">Admin Dashboard</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted small">Home</a></li>
                            <li class="breadcrumb-item active small" aria-current="page">Overview</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row g-4 mb-5">
                <div class="col-xl-3 col-md-6">
                    <div class="card dashboard-card h-100">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="text-uppercase fw-bold text-muted small mb-1">Total Students</div>
                                    <div class="h2 mb-0 fw-bold text-dark">1,250</div>
                                </div>
                                <div class="icon-box bg-gradient-primary"><i class="fas fa-user-graduate"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card dashboard-card h-100">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="text-uppercase fw-bold text-muted small mb-1">Total Faculty</div>
                                    <div class="h2 mb-0 fw-bold text-dark">120</div>
                                </div>
                                <div class="icon-box bg-gradient-success"><i class="fas fa-chalkboard-teacher"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card dashboard-card h-100">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="text-uppercase fw-bold text-muted small mb-1">Active Courses</div>
                                    <div class="h2 mb-0 fw-bold text-dark">45</div>
                                </div>
                                <div class="icon-box bg-gradient-info"><i class="fas fa-book-open"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card dashboard-card h-100">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="text-uppercase fw-bold text-muted small mb-1">Departments</div>
                                    <div class="h2 mb-0 fw-bold text-dark">8</div>
                                </div>
                                <div class="icon-box bg-gradient-warning"><i class="fas fa-building"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity Table -->
            <div class="card dashboard-card mb-5">
                <div class="card-header card-header-gradient border-0 py-4 px-4 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center text-white">
                        <div class="bg-white bg-opacity-25 rounded-3 p-2 me-3">
                            <i class="fas fa-table fs-4 text-white"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 fw-bold">Recent Activity</h5>
                            <small class="opacity-75">Latest registrations and updates</small>
                        </div>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-custom table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th class="ps-4">ID</th>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Department</th>
                                    <th>Date Added</th>
                                    <th class="text-center pe-4">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="ps-4"><span class="fw-bold text-secondary">#STU001</span></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="bg-primary bg-opacity-10 text-primary rounded-circle text-center fw-bold me-2" style="width:32px; height:32px; line-height:32px; font-size:0.8rem;">MW</div>
                                            <span class="fw-bold text-dark">Mark Williams</span>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3">Student</span></td>
                                    <td class="text-muted">Computer Science</td>
                                    <td class="text-muted small">2023-10-24</td>
                                    <td class="text-center pe-4"><span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3"><i class="fas fa-check-circle me-1"></i> Active</span></td>
                                </tr>
                                <tr>
                                    <td class="ps-4"><span class="fw-bold text-secondary">#FAC023</span></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="bg-success bg-opacity-10 text-success rounded-circle text-center fw-bold me-2" style="width:32px; height:32px; line-height:32px; font-size:0.8rem;">SJ</div>
                                            <span class="fw-bold text-dark">Dr. Sarah Jenkins</span>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3">Faculty</span></td>
                                    <td class="text-muted">Mathematics</td>
                                    <td class="text-muted small">2023-10-23</td>
                                    <td class="text-center pe-4"><span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3"><i class="fas fa-check-circle me-1"></i> Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <!-- Footer -->
        <footer class="main-footer mt-auto">
            <div class="footer-content text-center py-3">
                <p class="mb-0 small">&copy; <?php echo date("Y"); ?> Campus Management System. All Rights Reserved.</p>
            </div>
        </footer>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>