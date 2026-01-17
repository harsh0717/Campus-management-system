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
        overflow: hidden; /* Important for the header gradient */
    }

    /* Vibrant Header Gradient */
    .card-header-gradient {
        background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
        position: relative;
    }
    
    /* Decoration Circle in Header */
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

    /* Form Inputs - Colorful Focus */
    .form-control, .form-select {
        border-radius: 12px;
        border: 2px solid #f1f3f9;
        padding: 0.8rem 1rem;
        font-size: 0.95rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        background-color: #fff;
        color: #495057;
    }
    .form-control:focus, .form-select:focus {
        background-color: #fff;
        border-color: #4e73df;
        box-shadow: 0 0 0 4px rgba(78, 115, 223, 0.15);
        transform: translateY(-2px);
    }
    .form-label {
        font-size: 0.85rem;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 0.5rem;
        letter-spacing: 0.02em;
    }

    /* Section Dividers with Color Accents */
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

    /* COLORFUL Checkbox Groups */
    .audience-option {
        position: relative;
    }
    .audience-option input[type="checkbox"] {
        display: none;
    }
    .audience-option label {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 14px 20px;
        border: 2px solid #f1f3f9;
        border-radius: 12px;
        cursor: pointer;
        background: #fff;
        color: #64748b;
        font-weight: 700;
        font-size: 0.95rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 6px rgba(0,0,0,0.02);
    }
    .audience-option label:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 15px rgba(0,0,0,0.05);
    }

    /* Student - Blue Theme */
    .audience-option input[value="students"]:checked + label {
        background: linear-gradient(145deg, #e3f2fd, #bbdefb);
        border-color: #2196f3;
        color: #0d47a1;
        box-shadow: 0 8px 20px rgba(33, 150, 243, 0.2);
    }
    /* Faculty - Teal Theme */
    .audience-option input[value="faculty"]:checked + label {
        background: linear-gradient(145deg, #e0f2f1, #b2dfdb);
        border-color: #009688;
        color: #004d40;
        box-shadow: 0 8px 20px rgba(0, 150, 136, 0.2);
    }
    /* Staff - Purple Theme */
    .audience-option input[value="staff"]:checked + label {
        background: linear-gradient(145deg, #f3e5f5, #e1bee7);
        border-color: #9c27b0;
        color: #4a148c;
        box-shadow: 0 8px 20px rgba(156, 39, 176, 0.2);
    }
    
    /* Input Group Icons */
    .input-group-text {
        border: 2px solid #f1f3f9;
        border-right: none;
        background-color: #f8f9fc;
        color: #4e73df;
        font-weight: bold;
    }
    .input-group:focus-within .input-group-text {
        border-color: #4e73df;
        background-color: #fff;
    }
</style>

<!-- Main Content (Wrapper is opened in sidebar.php) -->
<div class="container-fluid px-4 pb-5 flex-grow-1" style="background: linear-gradient(135deg, #eff3f9 0%, #dce4f1 100%);">
    
    <!-- 1. Page Header -->
    <div class="d-flex justify-content-between align-items-center pt-4 mb-5">
        <div>
            <h1 class="h2 fw-bold text-dark mb-1">Create Notification</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted small">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted small">Notifications</a></li>
                    <li class="breadcrumb-item active small" aria-current="page">Compose</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="#" class="btn btn-white text-muted border-0 fw-bold shadow-sm rounded-pill px-4 bg-white hover-shadow">
                <i class="bi bi-arrow-left me-2"></i>Back to List
            </a>
        </div>
    </div>

    <!-- 2. Main Content Card -->
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-9">
            <div class="card dashboard-card h-100">
                
                <!-- Vibrant Gradient Header -->
                <div class="card-header card-header-gradient border-0 pt-4 pb-4 px-5">
                    <div class="d-flex align-items-center text-white">
                        <div class="header-icon-circle me-4">
                            <i class="bi bi-megaphone-fill fs-3 text-white"></i>
                        </div>
                        <div>
                            <h4 class="mb-1 fw-bold">New Announcement</h4>
                            <p class="mb-0 text-white-50 opacity-75">Broadcast a message to your campus groups</p>
                        </div>
                    </div>
                </div>

                <div class="card-body p-5">
                    <form>
                        <!-- Section: Basic Info -->
                        <div class="form-section-title">
                            <i class="bi bi-pencil-square"></i> Content Details
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Notification Title <span class="text-danger">*</span></label>
                            <input class="form-control form-control-lg" type="text" placeholder="e.g. Final Exam Schedule Released">
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Message Body <span class="text-danger">*</span></label>
                            <textarea class="form-control" rows="6" placeholder="Type your full announcement here... Support basic formatting."></textarea>
                            <div class="d-flex justify-content-between mt-2">
                                <small class="text-muted"><i class="bi bi-markdown"></i> Markdown supported</small>
                                <small class="text-muted fw-bold">0 / 500</small>
                            </div>
                        </div>

                        <div class="row gx-5">
                            <!-- Section: Targeting -->
                            <div class="col-md-7 mb-4 mb-md-0">
                                <div class="form-section-title">
                                    <i class="bi bi-people-fill"></i> Target Audience
                                </div>
                                
                                <label class="form-label d-block mb-3 text-muted">Who needs to see this?</label>
                                <div class="d-flex gap-3 flex-wrap">
                                    <div class="audience-option flex-grow-1">
                                        <input type="checkbox" id="aud-students" value="students" checked>
                                        <label for="aud-students"><i class="bi bi-mortarboard-fill me-2"></i> Students</label>
                                    </div>
                                    <div class="audience-option flex-grow-1">
                                        <input type="checkbox" id="aud-faculty" value="faculty">
                                        <label for="aud-faculty"><i class="bi bi-person-video3 me-2"></i> Faculty</label>
                                    </div>
                                    <div class="audience-option flex-grow-1">
                                        <input type="checkbox" id="aud-staff" value="staff">
                                        <label for="aud-staff"><i class="bi bi-building me-2"></i> Staff</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Section: Priority -->
                            <div class="col-md-5">
                                <div class="form-section-title">
                                    <i class="bi bi-flag-fill"></i> Priority Level
                                </div>
                                <label class="form-label">Set Urgency</label>
                                <div class="p-1 bg-white rounded-3">
                                    <select class="form-select fw-bold border-2">
                                        <option value="normal" class="text-secondary" selected>🔵 Normal (Default)</option>
                                        <option value="important" class="text-warning">🟠 Important</option>
                                        <option value="urgent" class="text-danger">🔴 Urgent / Critical</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Section: Timing -->
                        <div class="mt-5">
                            <div class="form-section-title">
                                <i class="bi bi-calendar-event-fill"></i> Schedule
                            </div>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label">Publish Date</label>
                                    <div class="input-group">
                                        <span class="input-group-text rounded-start-3"><i class="bi bi-calendar-check"></i></span>
                                        <input class="form-control border-start-0 ps-0" type="date">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Expiry Date <small class="text-muted fw-normal">(Optional)</small></label>
                                    <div class="input-group">
                                        <span class="input-group-text rounded-start-3"><i class="bi bi-calendar-x"></i></span>
                                        <input class="form-control border-start-0 ps-0" type="date">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="d-flex justify-content-end gap-3 pt-5 mt-3 border-top border-light">
                            <button class="btn btn-light border fw-bold text-secondary px-4 py-2" type="reset">
                                Cancel
                            </button>
                            <button class="btn btn-primary fw-bold shadow-lg px-5 py-3 text-uppercase" type="button" 
                                style="background: linear-gradient(135deg, #4e73df 0%, #224abe 100%); border: none; letter-spacing: 0.05em; border-radius: 12px;">
                                <i class="bi bi-send-fill me-2"></i> Publish Notification
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include '../includes/footer.php'; ?>