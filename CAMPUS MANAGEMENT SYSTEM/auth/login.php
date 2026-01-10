<?php include '../includes/header.php'; ?>

<style>
    /* Page specific styles to ensure the card looks good */
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
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        width: 100%;
        max-width: 450px;
        background: #fff;
    }

    .login-header {
        background-color: var(--primary-color, #0d47a1);
        color: white;
        padding: 30px 20px;
        border-radius: 15px 15px 0 0;
        text-align: center;
    }

    .login-icon {
        font-size: 3rem;
        margin-bottom: 10px;
        color: var(--accent-color, #ffc107);
    }

    .form-section {
        padding: 40px;
    }

    .form-control:focus {
        border-color: var(--primary-color, #0d47a1);
        box-shadow: 0 0 0 0.25rem rgba(13, 71, 161, 0.25);
    }

    /* Styles for the Password Toggle Eye */
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
        color: var(--primary-color, #0d47a1);
    }

    .btn-login {
        background-color: var(--primary-color, #0d47a1);
        border: none;
        padding: 12px;
        font-weight: 600;
        transition: transform 0.2s;
    }

    .btn-login:hover {
        background-color: #0a3b8c;
        transform: translateY(-2px);
    }
</style>

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
                    <label for="role" class="form-label fw-bold small text-secondary">Select Role</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fas fa-users-cog text-muted"></i></span>
                        <select class="form-select" id="role" name="role" required>
                            <option value="" selected disabled>Choose your role...</option>
                            <option value="student">Student</option>
                            <option value="faculty">Faculty</option>
                            <option value="admin">Administrator</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-bold small text-secondary">Email Address</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fas fa-envelope text-muted"></i></span>
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@university.edu" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label fw-bold small text-secondary">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fas fa-lock text-muted"></i></span>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required style="border-right: none;">
                        <span class="input-group-text bg-white" id="togglePassword" style="border-left: none;">
                            <i class="fas fa-eye text-muted" id="eyeIcon"></i>
                        </span>
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-login text-white shadow-sm">
                        <i class="fas fa-sign-in-alt me-2"></i> Secure Login
                    </button>
                    <button type="reset" class="btn btn-outline-secondary btn-sm mt-1 border-0">
                        Reset Fields
                    </button>
                </div>

                <div class="text-center mt-4">
                    <a href="../index.php" class="text-decoration-none small text-muted">
                        <i class="fas fa-arrow-left me-1"></i> Back to Home
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const togglePassword = document.querySelector('#togglePassword');
        const passwordInput = document.querySelector('#password');
        const eyeIcon = document.querySelector('#eyeIcon');

        togglePassword.addEventListener('click', function () {
            // Toggle the type attribute
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // Toggle the eye icon classes
            eyeIcon.classList.toggle('fa-eye');
            eyeIcon.classList.toggle('fa-eye-slash');
        });
    });
</script>

<?php include '../includes/footer.php'; ?>