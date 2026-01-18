<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar-admin.php'; ?>

<!-- Page Specific CSS (Identical to Add Student for consistency) -->
<style>
    .dashboard-card { border: none; border-radius: 20px; background-color: #fff; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08); overflow: hidden; }
    .card-header-gradient { background: linear-gradient(135deg, #1cc88a 0%, #13855c 100%); position: relative; } /* Green theme for Faculty */
    .header-icon-circle { background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px); width: 56px; height: 56px; border-radius: 16px; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
    .form-control, .form-select { border-radius: 12px; border: 2px solid #f1f3f9; padding: 0.8rem 1rem; font-size: 0.95rem; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
    .form-control:focus, .form-select:focus { border-color: #1cc88a; box-shadow: 0 0 0 4px rgba(28, 200, 138, 0.15); transform: translateY(-2px); }
    .form-label { font-size: 0.85rem; font-weight: 700; color: #2d3748; margin-bottom: 0.5rem; }
    .form-section-title { font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.1em; font-weight: 800; color: #1cc88a; margin-bottom: 1.5rem; margin-top: 1rem; display: flex; align-items: center; }
    .form-section-title i { background: #e3fcf7; color: #1cc88a; padding: 6px; border-radius: 6px; margin-right: 10px; }
    .form-section-title::after { content: ''; flex: 1; height: 2px; background: linear-gradient(to right, #e3fcf7, transparent); margin-left: 1rem; }
</style>

<!-- Main Content -->
<div class="container-fluid px-4 pb-5 flex-grow-1" style="background: linear-gradient(135deg, #eff3f9 0%, #dce4f1 100%);">
    
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center pt-4 mb-5">
        <div>
            <h1 class="h2 fw-bold text-dark mb-1">Add New Faculty</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted small">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted small">Faculty</a></li>
                    <li class="breadcrumb-item active small" aria-current="page">Add New</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="manage_faculty.php" class="btn btn-white text-muted border-0 fw-bold shadow-sm rounded-pill px-4 bg-white">
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
                            <i class="fas fa-chalkboard-teacher fs-3 text-white"></i>
                        </div>
                        <div>
                            <h4 class="mb-1 fw-bold">Faculty Registration</h4>
                            <p class="mb-0 text-white-50 opacity-75">Onboard a new teaching staff member</p>
                        </div>
                    </div>
                </div>

                <div class="card-body p-5">
                    <form>
                        <!-- Section 1: Profile -->
                        <div class="form-section-title">
                            <i class="fas fa-id-card"></i> Profile Details
                        </div>
                        
                        <div class="row g-4 mb-4">
                            <div class="col-md-2">
                                <label class="form-label">Title</label>
                                <select class="form-select">
                                    <option value="Dr.">Dr.</option>
                                    <option value="Prof.">Prof.</option>
                                    <option value="Mr.">Mr.</option>
                                    <option value="Ms.">Ms.</option>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <label class="form-label">First Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Sarah">
                            </div>
                            <div class="col-md-5">
                                <label class="form-label">Last Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Jenkins">
                            </div>
                        </div>

                        <!-- Section 2: Professional Info -->
                        <div class="form-section-title">
                            <i class="fas fa-briefcase"></i> Employment Details
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
                                <label class="form-label">Designation <span class="text-danger">*</span></label>
                                <select class="form-select">
                                    <option selected disabled>Select Role</option>
                                    <option value="Professor">Professor</option>
                                    <option value="Assoc. Prof">Associate Professor</option>
                                    <option value="Asst. Prof">Assistant Professor</option>
                                    <option value="Lecturer">Lecturer</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Join Date</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Employee ID</label>
                                <input type="text" class="form-control bg-light" placeholder="e.g. FAC202305">
                            </div>
                        </div>

                        <!-- Section 3: Contact -->
                        <div class="form-section-title">
                            <i class="fas fa-envelope-open-text"></i> Contact Information
                        </div>

                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Official Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" placeholder="faculty@university.edu">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone Extension</label>
                                <input type="text" class="form-control" placeholder="e.g. x4050">
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="d-flex justify-content-end gap-3 pt-4 border-top border-light mt-4">
                            <button class="btn btn-light border fw-bold text-secondary px-4 py-2" type="button" onclick="window.history.back()">
                                Cancel
                            </button>
                            <button class="btn btn-success fw-bold shadow-lg px-5 py-3" type="submit" 
                                style="background: linear-gradient(135deg, #1cc88a 0%, #13855c 100%); border: none; border-radius: 12px; color: white;">
                                <i class="fas fa-save me-2"></i> Add Faculty Member
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>