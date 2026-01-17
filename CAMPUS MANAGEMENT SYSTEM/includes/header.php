<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Management System</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <!-- CORE LAYOUT STYLES -->
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
            overflow-x: hidden;
        }

        /* --- Navbar Styles --- */
        .navbar-custom {
            background: linear-gradient(to right, #4e73df, #224abe);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            position: fixed;
            top: 0;
            right: 0;
            z-index: 1030;
            height: 70px;
            margin-left: var(--sidebar-width);
            width: calc(100% - var(--sidebar-width));
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        .navbar-brand { font-weight: 700; letter-spacing: 0.5px; font-size: 1.1rem; }
        
        #sidebarToggleTop {
            background: transparent; border: none; color: rgba(255,255,255,0.8);
            font-size: 1.25rem; padding: 0 15px; transition: color 0.2s;
        }
        #sidebarToggleTop:hover { color: #fff; }

        /* Sidebar Collapsed State (PC) */
        body.sidebar-collapsed .navbar-custom {
            margin-left: var(--sidebar-collapsed-width);
            width: calc(100% - var(--sidebar-collapsed-width));
        }

        /* --- Sidebar CSS (Base) --- */
        #sidebar-wrapper {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0; left: 0;
            background: linear-gradient(180deg, #4e73df 0%, #224abe 100%);
            color: #fff;
            z-index: 1040;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            box-shadow: 4px 0 15px rgba(0,0,0,0.05);
            overflow-x: hidden;
            display: flex; flex-direction: column;
        }

        .main-content {
            transition: margin-left 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            margin-left: var(--sidebar-width);
            margin-top: 70px;
            display: flex; flex-direction: column;
            min-height: calc(100vh - 70px);
        }

        /* Mobile Responsiveness */
        @media (max-width: 991.98px) {
            .navbar-custom { margin-left: 0; width: 100%; }
            body.sidebar-collapsed .navbar-custom { margin-left: 0; width: 100%; }
            .navbar-brand { font-size: 1rem; }
            
            #sidebar-wrapper { margin-left: -260px; }
            .main-content { margin-left: 0; }
            
            body.sidebar-collapsed #sidebar-wrapper { margin-left: 0; box-shadow: 5px 0 20px rgba(0,0,0,0.2); }
        }

        #sidebarOverlay {
            display: none; position: fixed; top: 0; left: 0;
            width: 100vw; height: 100vh; background: rgba(0,0,0,0.5);
            z-index: 1035; backdrop-filter: blur(2px);
        }
        body.sidebar-collapsed #sidebarOverlay { display: block; }
        @media (min-width: 992px) { body.sidebar-collapsed #sidebarOverlay { display: none; } }
        
        /* Footer */
        .main-footer {
            background: linear-gradient(to right, #4e73df, #224abe);
            color: white; box-shadow: 0 -4px 15px rgba(0,0,0,0.1);
            margin-top: auto;
        }
    </style>
</head>
<body>

    <!-- Overlay for Mobile (Click to close sidebar) -->
    <div id="sidebarOverlay"></div>

    <!-- 1. NAVIGATION BAR -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container-fluid px-2 px-lg-4"> 
            
            <div class="d-flex align-items-center">
                <!-- Mobile Sidebar Toggle -->
                <button id="sidebarToggleTop" class="d-lg-none me-2">
                    <i class="fas fa-bars"></i>
                </button>

                <a class="navbar-brand" href="#">
                    <i class="fas fa-university me-2"></i>
                    <span class="d-none d-sm-inline">Campus Management System</span>
                    <span class="d-inline d-sm-none">CMS</span>
                </a>
            </div>
            
            
            
             <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-bell"></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-user-circle"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>