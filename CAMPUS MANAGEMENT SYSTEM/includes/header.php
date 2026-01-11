<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Management System</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome (Optional, for icons) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #4e73df; /* Updated to match sidebar primary */
            --secondary-color: #224abe; /* Updated to match sidebar secondary */
            
            /* Sidebar Variables for Calculation */
            --sidebar-width: 260px;
            --sidebar-collapsed-width: 70px;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar-custom {
            /* Updated to match Sidebar Gradient */
            background: linear-gradient(to right, #4e73df, #224abe);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            
            /* --- FIX: Push Header to right of Sidebar --- */
            margin-left: var(--sidebar-width);
            width: calc(100% - var(--sidebar-width));
            transition: margin-left 0.3s cubic-bezier(0.25, 0.8, 0.25, 1), width 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        /* --- FIX: Adjust Header when Sidebar is collapsed --- */
        body.sidebar-collapsed .navbar-custom {
            margin-left: var(--sidebar-collapsed-width);
            width: calc(100% - var(--sidebar-collapsed-width));
        }

        /* --- FIX: Mobile Responsiveness --- */
        @media (max-width: 768px) {
            .navbar-custom {
                margin-left: 0;
                width: 100%;
            }
            body.sidebar-collapsed .navbar-custom {
                margin-left: 0;
                width: 100%;
            }
        }

        .navbar-brand {
            font-weight: 700;
            letter-spacing: 0.5px;
        }
        
        .nav-link {
            font-weight: 500;
            transition: opacity 0.3s ease;
        }
        
        .nav-link:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container-fluid px-4"> <!-- Changed container to container-fluid for better alignment with sidebar -->
            <a class="navbar-brand" href="">
                <i class="fas fa-university me-2"></i>Campus Management System
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Added dummy menu items to maintain your structure if needed, or keep empty as per your snippet -->
             <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Your nav items can go here -->
                </ul>
            </div>
        </div>
    </nav>