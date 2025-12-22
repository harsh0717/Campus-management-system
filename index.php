<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Management System - Login</title>
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
            max-width: 1000px;
            padding: 20px;
            margin: auto;
        }

        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            background: rgba(255, 255, 255, 0.95);
            display: flex;
            flex-direction: row;
            min-height: 550px;
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

        .login-left-side {
            background: var(--primary-color);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 50px;
            text-align: center;
            flex: 1;
        }

        .login-right-side {
            padding: 50px;
            flex: 1.2;
            background: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-control {
            border-radius: 8px;
            padding: 12px;
            border: 1px solid #ced4da;
            background-color: #f8f9fa;
        }

        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(13, 71, 161, 0.15);
            border-color: var(--primary-color);
            background-color: #fff;
        }

        .input-group-text {
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
            border-left: none;
            border-top-right-radius: 8px;
            border-bottom-right-radius: 8px;
        }
        
        .form-control + .input-group-text {
            border-left: none;
        }

        .btn-login {
            background-color: var(--primary-color);
            color: white;
            padding: 12px;
            border-radius: 8px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-login:hover {
            background-color: #08347a;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(13, 71, 161, 0.3);
        }

        .system-title {
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 5px;
        }

        .system-subtitle {
            color: #6c757d;
            font-size: 0.9rem;
            margin-bottom: 30px;
        }

        .left-side-text h2 {
            font-weight: 700;
            margin-bottom: 15px;
        }

        .left-side-text p {
            opacity: 0.9;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .feature-list {
            list-style: none;
            padding: 0;
            text-align: left;
            margin-top: 20px;
        }

        .feature-list li {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .feature-list i {
            margin-right: 10px;
            color: var(--accent-color);
        }

        /* --- RESPONSIVE DESIGN TWEAKS --- */

        @media (max-width: 991.98px) {
            .card {
                flex-direction: column;
                max-width: 500px;
                margin: 0 auto;
                min-height: auto;
            }
            .login-left-side {
                display: none;
            }
            .login-right-side {
                padding: 40px 30px;
            }
        }

        @media (max-width: 576px) {
            .university-logo {
                width: 70px;
                height: 70px;
                font-size: 30px;
            }
            .system-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>

    <div class="login-container">
        <div class="card">
            <!-- Left Side: Description & Info -->
            <div class="login-left-side">
                <div class="left-side-text">
                    <h2>CMS Portal</h2>
                    <p>Welcome to the unified digital campus experience. Manage your academic journey with ease and efficiency.</p>
                    <p>THIS WEBSITE OR ERP IS BETTER THAN NEOTECH WEBSITE AND GTU STUDENT PORTAL</p>
                    <ul class="feature-list">
                        <li><i class="fas fa-graduation-cap"></i> Course Management</li>
                        <li><i class="fas fa-calendar-check"></i> Attendance Tracking</li>
                        <li><i class="fas fa-book-reader"></i> Digital Library Access</li>
                        <li><i class="fas fa-bullhorn"></i> Campus Announcements</li>
                    </ul>

                    <div class="mt-4">
                        <small>Need Help?</small><br>
                        <strong>support@university.edu</strong>
                    </div>
                </div>
            </div>

            <!-- Right Side: Login Form -->
            <div class="login-right-side">
                <div class="text-center">
                    <div class="university-logo">
                        <i class="fas fa-university"></i>
                    </div>
                    <h3 class="system-title">Welcome Back</h3>
                    <p class="system-subtitle">Please enter your credentials to access the Campus Management System.</p>
                </div>

                <!-- Form redirects to auth/login.php using standard HTML action -->
                <form action="auth/login.php" method="POST">
                    <!-- Role Selection -->
                    <div class="mb-3 text-center">
                        <div class="btn-group w-100" role="group">
                            <input type="radio" class="btn-check" name="role" id="role-student" value="student" autocomplete="off" checked>
                            <label class="btn btn-outline-primary" for="role-student">Student</label>
                          
                            <input type="radio" class="btn-check" name="role" id="role-faculty" value="faculty" autocomplete="off">
                            <label class="btn btn-outline-primary" for="role-faculty">Faculty</label>
                          
                            <input type="radio" class="btn-check" name="role" id="role-admin" value="admin" autocomplete="off">
                            <label class="btn btn-outline-primary" for="role-admin">Admin</label>
                        </div>
                    </div>

                    <!-- Username Field -->
                    <div class="mb-3">
                        <label for="username" class="form-label fw-bold small text-muted">Student ID / Username</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0"><i class="fas fa-user text-secondary"></i></span>
                            <input type="text" class="form-control border-start-0 ps-0" id="username" name="username" placeholder="e.g. STU123456" required>
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div class="mb-4">
                        <label for="password" class="form-label fw-bold small text-muted">Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0"><i class="fas fa-lock text-secondary"></i></span>
                            <input type="password" class="form-control border-start-0 ps-0" id="password" name="password" placeholder="Enter your password" required>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-login btn-lg">
                            Login to Dashboard
                        </button>
                    </div>
                </form>

                <div class="text-center mt-4">
                    <p class="small text-muted mb-0">Don't have an account? Contact Admission Office</p>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="text-center text-white mt-4 opacity-75">
            <small>&copy; 2023 Campus Management System. All rights reserved.</small>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper (Optional for components like dropdowns, but no custom JS used) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>