<?php
include '../auth/auth_check.php';

if ($_SESSION['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit;
}
?>
<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar-admin.php'; ?>

<!-- Page Specific CSS -->
<style>
    .dashboard-card { border: none; border-radius: 20px; background-color: #fff; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08); overflow: hidden; }
    .card-header-gradient { background: linear-gradient(135deg, #36b9cc 0%, #258391 100%); position: relative; } /* Info/Blue theme for Courses */
    .header-icon-circle { background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px); width: 56px; height: 56px; border-radius: 16px; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
    .form-control, .form-select { border-radius: 12px; border: 2px solid #f1f3f9; padding: 0.8rem 1rem; font-size: 0.95rem; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
    .form-control:focus, .form-select:focus { border-color: #36b9cc; box-shadow: 0 0 0 4px rgba(54, 185, 204, 0.15); transform: translateY(-2px); }
    .form-label { font-size: 0.85rem; font-weight: 700; color: #2d3748; margin-bottom: 0.5rem; }
    .form-section-title { font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.1em; font-weight: 800; color: #36b9cc; margin-bottom: 1.5rem; margin-top: 1rem; display: flex; align-items: center; }
    .form-section-title i { background: #e0f7fa; color: #36b9cc; padding: 6px; border-radius: 6px; margin-right: 10px; }
    .form-section-title::after { content: ''; flex: 1; height: 2px; background: linear-gradient(to right, #e0f7fa, transparent); margin-left: 1rem; }
</style>

<!-- Main Content -->
<div class="container-fluid px-4 pb-5 flex-grow-1" style="background: linear-gradient(135deg, #eff3f9 0%, #dce4f1 100%);">
    
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center pt-4 mb-5">
        <div>
            <h1 class="h2 fw-bold text-dark mb-1">Add New Course</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted small">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted small">Courses</a></li>
                    <li class="breadcrumb-item active small" aria-current="page">Create</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="manage_courses.php" class="btn btn-white text-muted border-0 fw-bold shadow-sm rounded-pill px-4 bg-white">
                <i class="fas fa-arrow-left me-2"></i>Back to Catalog
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
                            <i class="fas fa-book-medical fs-3 text-white"></i>
                        </div>
                        <div>
                            <h4 class="mb-1 fw-bold">Create New Course</h4>
                            <p class="mb-0 text-white-50 opacity-75">Define curriculum details and assignments</p>
                        </div>
                    </div>
                </div>

                <div class="card-body p-5">
                    <form>
                        <!-- Section 1: Course Basics -->
                        <div class="form-section-title">
                            <i class="fas fa-bookmark"></i> Course Details
                        </div>
                        
                        <div class="row g-4 mb-4">
                            <div class="col-md-8">
                                <label class="form-label">Course Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="e.g. Introduction to Artificial Intelligence">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Course Code <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="e.g. CS-401">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" rows="3" placeholder="Brief overview of what students will learn..."></textarea>
                            </div>
                        </div>

                        <!-- Section 2: Logistics -->
                        <div class="form-section-title">
                            <i class="fas fa-sliders-h"></i> Logistics & Assignment
                        </div>

                        <div class="row g-4 mb-4">
                            <div class="col-md-4">
                                <label class="form-label">Department <span class="text-danger">*</span></label>
                                <select class="form-select">
                                    <option selected disabled>Select Dept</option>
                                    <option value="CS">Computer Science</option>
                                    <option value="MAT">Mathematics</option>
                                    <option value="PHY">Physics</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Target Semester</label>
                                <select class="form-select">
                                    <option value="1">1st Sem</option>
                                    <option value="2">2nd Sem</option>
                                    <option value="3">3rd Sem</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Credits</label>
                                <input type="number" class="form-control" value="3" min="1" max="6">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Assign Faculty Lead</label>
                                <select class="form-select">
                                    <option selected>Unassigned</option>
                                    <option value="1">Dr. Sarah Jenkins</option>
                                    <option value="2">Prof. Robert Smith</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Status</label>
                                <div class="d-flex gap-3 mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="statusActive" checked>
                                        <label class="form-check-label fw-bold text-success" for="statusActive">Active</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="statusDraft">
                                        <label class="form-check-label fw-bold text-secondary" for="statusDraft">Draft</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="d-flex justify-content-end gap-3 pt-4 border-top border-light mt-4">
                            <button class="btn btn-light border fw-bold text-secondary px-4 py-2" type="button" onclick="window.history.back()">
                                Cancel
                            </button>
                            <button class="btn btn-info fw-bold shadow-lg px-5 py-3" type="submit" 
                                style="background: linear-gradient(135deg, #36b9cc 0%, #258391 100%); border: none; border-radius: 12px; color: white;">
                                <i class="fas fa-plus-circle me-2"></i> Create Course
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>