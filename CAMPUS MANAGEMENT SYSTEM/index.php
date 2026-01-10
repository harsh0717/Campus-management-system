<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Management System - Overview</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #0d47a1; /* Academic Navy Blue */
            --secondary-color: #f5f5f5;
            --accent-color: #ffc107; /* Gold/Yellow for academic accent */
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: url('https://images.unsplash.com/photo-1541339907198-e08756dedf3f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        /* Dark overlay for better text readability */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(13, 71, 161, 0.6); /* Blue tint overlay */
            z-index: 0;
        }

        .login-container {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 1100px; /* Slightly wider for text content */
            padding: 20px;
            margin: auto;
        }

        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            background: rgba(255, 255, 255, 0.98);
            display: flex;
            flex-direction: row;
            min-height: 600px; /* Taller to accommodate text */
        }

        .university-logo {
            width: 80px;
            height: 80px;
            background: var(--primary-color);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 35px;
            margin: 0 auto 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .info-left-side {
            background: var(--primary-color);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            padding: 60px;
            text-align: left;
            flex: 1;
        }

        .content-right-side {
            padding: 60px;
            flex: 1.3;
            background: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: #333;
        }

        .system-title {
            font-weight: 800;
            color: var(--primary-color);
            margin-bottom: 15px;
            font-size: 2rem;
        }

        .section-header {
            font-weight: 700;
            color: #2c3e50;
            margin-top: 25px;
            margin-bottom: 10px;
            font-size: 1.25rem;
            border-bottom: 2px solid var(--accent-color);
            display: inline-block;
            padding-bottom: 5px;
        }

        .text-content p {
            line-height: 1.8;
            color: #555;
            margin-bottom: 15px;
            font-size: 1.05rem;
        }

        .highlight-box {
            background-color: #e3f2fd;
            border-left: 5px solid var(--primary-color);
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
        }

        .feature-list-large {
            list-style: none;
            padding: 0;
            margin-top: 20px;
        }

        .feature-list-large li {
            margin-bottom: 15px;
            display: flex;
            align-items: flex-start;
            font-size: 1.1rem;
        }

        .feature-list-large i {
            margin-right: 15px;
            margin-top: 5px;
            color: var(--accent-color);
            font-size: 1.2rem;
        }

        /* --- RESPONSIVE DESIGN TWEAKS --- */

        @media (max-width: 991.98px) {
            .card {
                flex-direction: column;
                max-width: 600px;
                margin: 0 auto;
                min-height: auto;
            }
            .info-left-side {
                padding: 40px;
                align-items: center;
                text-align: center;
            }
            .content-right-side {
                padding: 40px 30px;
            }
            .feature-list-large li {
                justify-content: flex-start;
            }
        }

        @media (max-width: 576px) {
            .system-title {
                font-size: 1.5rem;
            }
            .university-logo {
                width: 60px;
                height: 60px;
                font-size: 25px;
            }
        }
    </style>
</head>
<body>

    <div class="login-container">
        <div class="card">
            <!-- Left Side: Core Identity -->
            <div class="info-left-side">
                <div class="university-logo mb-4">
                    <i class="fas fa-university"></i>
                </div>
                <h1 class="fw-bold display-6 mb-3">CMS Portal</h1>
                <p class="lead mb-4">The Next-Generation Academic Ecosystem</p>
                <div class="d-none d-lg-block">
                    <hr class="border-white opacity-50 my-4" style="width: 50px; border-width: 3px;">
                    <p class="opacity-75">
                        Empowering students and faculty with seamless digital tools. Join thousands of users who have switched to a smarter way of learning.
                    </p>
                </div>
            </div>

            <div class="content-right-side">
                <h2 class="system-title">Welcome to the Future</h2>
                
                <div class="text-content">
                    <p>
                        The Campus Management System (CMS) represents a paradigm shift in educational administration. Designed with a student-first philosophy, our platform eliminates the bureaucratic hurdles often associated with university portals.
                    </p>

                    <div class="highlight-box">
                        <i class="fas fa-star text-warning me-2"></i>
                        <strong>Superior Performance:</strong> 
                        THIS WEBSITE OR ERP IS BETTER THAN NEOTECH WEBSITE AND GTU STUDENT PORTAL.
                    </div>

                    <h3 class="section-header">Why We Are Different</h3>
                    <p>
                        Unlike legacy systems that suffer from downtime during critical exam periods, our cloud-native architecture ensures 99.99% uptime. We have streamlined the user experience to ensure that you spend less time navigating menus and more time focusing on your education.
                    </p>

                    <h3 class="section-header">Key Modules</h3>
                    <ul class="feature-list-large">
                        <li>
                            <i class="fas fa-bolt"></i>
                            <div>
                                <strong>Instant Results:</strong> View your grades immediately upon release without server lag.
                            </div>
                        </li>
                        <li>
                            <i class="fas fa-mobile-alt"></i>
                            <div>
                                <strong>Mobile Optimized:</strong> Access your attendance, library books, and schedule from any device, anywhere.
                            </div>
                        </li>
                        <li>
                            <i class="fas fa-shield-alt"></i>
                            <div>
                                <strong>Secure Data:</strong> Enterprise-grade encryption keeps your personal academic records safe.
                            </div>
                        </li>
                    </ul>

                    <!-- Added Login Button -->
                    <div class="d-grid mt-4">
                        <a href="auth/login.php" class="btn btn-lg text-white shadow-sm" style="background-color: var(--primary-color); border: none;">
                            <i class="fas fa-sign-in-alt me-2"></i> Login to Portal
                        </a>
                    </div>

                    <div class="mt-4 pt-3 border-top">
                        <p class="small text-muted mb-0">
                            <i class="fas fa-info-circle me-1"></i> 
                            Access is currently restricted to enrolled students. For account credentials, please visit the Administrative Block.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="text-center text-white mt-4 opacity-75">
            <small>&copy; 2023 Campus Management System. All rights reserved.</small>
        </div>
    </div>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>