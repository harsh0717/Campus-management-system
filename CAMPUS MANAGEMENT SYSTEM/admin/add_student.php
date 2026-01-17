<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<!-- Page Specific CSS -->
<style>
    /* Card & Layout Styles */
    .dashboard-card {
        border: none;
        border-radius: 20px;
        background-color: #fff;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }

    /* Header Gradient Style */
    .card-header-gradient {
        background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
        position: relative;
    }
    
    /* Header Icon Circle */
    .header-icon-circle {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        width: 56px;
        height: 56px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    /* Form Elements */
    .form-control, .form-select {
        border-radius: 12px;
        border: 2px solid #f1f3f9;
        padding: 0.8rem 1rem;
        font-size: 0.95rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .form-control:focus, .form-select:focus {
        border-color: #4e73df;
        box-shadow: 0 0 0 4px rgba(78, 115, 223, 0.15);
        transform: translateY(-2px);
    }
    .form-label {
        font-size: 0.85rem;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 0.5rem;
    }

    /* Section Title */
    .form-section-title {
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        font-weight: 800;
        color: #4e73df;
        margin-bottom: 1.5rem;
        margin-top: 1rem;
        display: flex;
        align-items: center;
    }
    .form-section-title i {
        background: #ebf3ff;
        color: #4e73df;
        padding: 6px;
        border-radius: 6px;
        margin-right: 10px;
    }
    .form-section-title::after {
        content: '';
        flex: 1;
        height: 2px;
        background: linear-gradient(to right, #ebf3ff, transparent);
        margin-left: 1rem;
    }
</style>

<!-- Main Content -->
<div class="container-fluid px-4 pb-5 flex-grow-1" style="background: linear-gradient(135deg, #eff3f9 0%, #dce4f1 100%);">
    
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center pt-4 mb-5">
        <div>
            <h1 class="h2 fw-bold text-dark mb-1">Add New Student</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted small">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted small">Students</a></li>
                    <li class="breadcrumb-item active small" aria-current="page">Register</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="manage_students.php" class="btn btn-white text-muted border-0 fw-bold shadow-sm rounded-pill px-4 bg-white">
                <i class="fas fa-arrow-left me-2"></i>Back to List
            </a>
        </div>
    </div>

    <!-- Form Card -->
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-9">
            <div class="card dashboard-card">
                
                <!-- Card Header -->
                <div class="card-header card-header-gradient border-0 pt-4 pb-4 px-5">
                    <div class="d-flex align-items-center text-white">
                        <div class="header-icon-circle me-4">
                            <i class="fas fa-user-plus fs-3 text-white"></i>
                        </div>
                        <div>
                            <h4 class="mb-1 fw-bold">Student Registration</h4>
                            <p class="mb-0 text-white-50 opacity-75">Enter student details to create a new profile</p>
                        </div>
                    </div>
                </div>

                <div class="card-body p-5">
                    <form>
                        <!-- Section 1: Personal Details -->
                        <div class="form-section-title">
                            <i class="fas fa-user"></i> Personal Information
                        </div>
                        
                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <label class="form-label">First Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="John">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Last Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Doe">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Date of Birth</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Gender</label>
                                <select class="form-select">
                                    <option selected disabled>Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>

                        <!-- Section 2: Contact Info -->
                        <div class="form-section-title">
                            <i class="fas fa-address-card"></i> Contact Details
                        </div>

                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Email Address <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" placeholder="student@example.com">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" placeholder="+1 (555) 000-0000">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Address</label>
                                <textarea class="form-control" rows="2" placeholder="123 Campus St, Apt 4B"></textarea>
                            </div>
                        </div>

                        <!-- Section 3: Academic Info -->
                        <div class="form-section-title">
                            <i class="fas fa-graduation-cap"></i> Academic Information
                        </div>

                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Department <span class="text-danger">*</span></label>
                                <select class="form-select">
                                    <option selected disabled>Select Department</option>
                                    <option value="CS">Computer Science</option>
                                    <option value="MAT">Mathematics</option>
                                    <option value="PHY">Physics</option>
                                    <option value="HIS">History</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Enrollment Semester</label>
                                <select class="form-select">
                                    <option selected>1st Semester</option>
                                    <option value="2">2nd Semester</option>
                                    <option value="3">3rd Semester</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Student ID (Auto-generated if empty)</label>
                                <input type="text" class="form-control bg-light" placeholder="e.g. STU2023001">
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="d-flex justify-content-end gap-3 pt-4 border-top border-light mt-4">
                            <button class="btn btn-light border fw-bold text-secondary px-4 py-2" type="button" onclick="window.history.back()">
                                Cancel
                            </button>
                            <button class="btn btn-primary fw-bold shadow-lg px-5 py-3" type="submit" 
                                style="background: linear-gradient(135deg, #4e73df 0%, #224abe 100%); border: none; border-radius: 12px;">
                                <i class="fas fa-save me-2"></i> Register Student
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>