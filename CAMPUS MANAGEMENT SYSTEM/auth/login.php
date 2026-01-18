<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Campus Management System</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        /* Synced with Footer/Header Theme Colors */
        :root {
            --primary-color: #2c3e50; /* Deep University Blue */
            --accent-color: #4ca1af;  /* Golden Accent */
            --bg-soft: #f4f7f9;       /* Light grey-blue background */
        }

        body {
            background-color: var(--bg-soft);
            /* This ensures the background color fills the screen if content is short */
            margin: 0;
            padding: 0;
        }

        .login-wrapper {
            min-height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
            background: #fff;
        }

        .login-header {
            background-color: var(--primary-color);
            color: white;
            padding: 30px 20px;
            border-radius: 15px 15px 0 0;
            text-align: center;
            /* Added a subtle bottom border in accent color to match footer styles */
            border-bottom: 4px solid var(--accent-color);
        }

        .login-icon {
            font-size: 3rem;
            margin-bottom: 10px;
            color: var(--accent-color);
        }

        .form-section {
            padding: 40px;
        }

        .form-label {
            color: #495057;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(13, 71, 161, 0.25);
        }

        .input-group-text i {
            color: var(--primary-color);
        }

        #togglePassword {
            cursor: pointer;
            border-left: none;
            background-color: #fff;
            display: flex;
            align-items: center;
            padding: 0 15px;
            transition: all 0.2s;
        }

        #togglePassword:hover {
            background-color: #f8f9fa;
            color: var(--primary-color);
        }

        .btn-login {
            background-color: var(--primary-color);
            border: none;
            padding: 12px;
            font-weight: 600;
            color: white;
            transition: transform 0.2s, background-color 0.2s;
        }

        .btn-login:hover {
            background-color: #0a3b8c;
            transform: translateY(-2px);
            color: var(--accent-color); /* Hover effect using accent color */
        }

        .text-muted-link {
            color: #6c757d;
            transition: color 0.2s;
        }

        .text-muted-link:hover {
            color: var(--primary-color);
        }
    </style>
</head>
<body>

<div class="login-wrapper">
    <div class="card login-card">
        <div class="login-header">
            <div class="login-icon">
                <i class="fas fa-user-graduate"></i>
            </div>
            <h4 class="mb-0 fw-bold">System Login</h4>
            <p class="mb-0 small opacity-75">Please verify your identity</p>
        </div>

        <div class="form-section">
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="role" class="form-label fw-bold small">Select Role</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fas fa-users-cog"></i></span>
                        <select class="form-select" id="role" name="role" required>
                            <option value="" selected disabled>Choose your role...</option>
                            <option value="student">Student</option>
                            <option value="faculty">Faculty</option>
                            <option value="admin">Administrator</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-bold small">Email Address</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fas fa-envelope"></i></span>
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@university.edu" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label fw-bold small">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required style="border-right: none;">
                        <span class="input-group-text bg-white" id="togglePassword" style="border-left: none;">
                            <i class="fas fa-eye text-muted" id="eyeIcon"></i>
                        </span>
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-login shadow-sm">
                        <i class="fas fa-sign-in-alt me-2"></i> Secure Login
                    </button>
                    <button type="reset" class="btn btn-outline-secondary btn-sm mt-1 border-0">
                        Reset Fields
                    </button>
                </div>

                <div class="text-center mt-4">
                    <a href="../index.php" class="text-decoration-none small text-muted-link">
                        <i class="fas fa-arrow-left me-1"></i> Back to Home
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const togglePassword = document.querySelector('#togglePassword');
        const passwordInput = document.querySelector('#password');
        const eyeIcon = document.querySelector('#eyeIcon');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            eyeIcon.classList.toggle('fa-eye');
            eyeIcon.classList.toggle('fa-eye-slash');
        });
    });
</script>

</body>
</html>
<?php include '../includes/footer.php'; ?>