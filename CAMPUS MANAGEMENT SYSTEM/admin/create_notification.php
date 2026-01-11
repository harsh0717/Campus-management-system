<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<style>
    .tile {
        background: #ffffff;
        border-radius: 8px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.05);
        padding: 30px;
        border-top: 3px solid #009688; /* Teal accent color */
    }
    .section-header {
        color: #2c3e50;
        font-weight: 600;
        font-size: 1.1rem;
        border-bottom: 2px solid #eee;
        padding-bottom: 10px;
        margin-bottom: 20px;
        margin-top: 10px;
    }
    .form-label {
        color: #555;
        font-weight: 600;
        font-size: 0.95rem;
        margin-bottom: 0.5rem;
    }
    .form-control, .form-select {
        border-radius: 4px;
        border: 1px solid #ddd;
        padding: 0.6rem 0.8rem;
    }
    .form-control:focus, .form-select:focus {
        border-color: #009688;
        box-shadow: 0 0 0 0.2rem rgba(0, 150, 136, 0.25);
    }
    .btn-primary {
        background-color: #009688;
        border-color: #009688;
    }
    .btn-primary:hover {
        background-color: #00796b;
        border-color: #00796b;
    }
    /* Styling for the checkbox group */
    .audience-group {
        display: flex;
        gap: 20px;
        padding: 10px 0;
    }
    .form-check-input:checked {
        background-color: #009688;
        border-color: #009688;
    }
</style>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="bi bi-megaphone"></i> Create Notification</h1>
            <p>Publish announcements for students and faculty</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
            <li class="breadcrumb-item"><a href="#">Notifications</a></li>
            <li class="breadcrumb-item">Create</li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form>
                        <!-- Basic Info Section -->
                        <h5 class="section-header">📝 Basic Info</h5>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label">Notification Title</label>
                                <input class="form-control" type="text" placeholder="Enter notification title (e.g. Exam Schedule Released)">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class="form-label">Message</label>
                                <textarea class="form-control" rows="5" placeholder="Type your full announcement here..."></textarea>
                            </div>
                        </div>

                        <!-- Targeting Section -->
                        <h5 class="section-header">🎯 Targeting</h5>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label d-block">Target Audience</label>
                                <div class="audience-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="audienceStudents" value="student">
                                        <label class="form-check-label" for="audienceStudents">Students</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="audienceFaculty" value="faculty">
                                        <label class="form-check-label" for="audienceFaculty">Faculty</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="audienceStaff" value="staff">
                                        <label class="form-check-label" for="audienceStaff">Admin Staff</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Priority</label>
                                <select class="form-select">
                                    <option value="normal">Normal</option>
                                    <option value="important" class="text-warning">Important</option>
                                    <option value="urgent" class="text-danger">Urgent</option>
                                </select>
                            </div>
                        </div>

                        <!-- Timing Section -->
                        <h5 class="section-header">📅 Timing</h5>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Publish Date</label>
                                <input class="form-control" type="date">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Expiry Date <small class="text-muted">(Optional)</small></label>
                                <input class="form-control" type="date">
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="tile-footer d-flex justify-content-end gap-2 pt-3 border-top">
                            <button class="btn btn-secondary" type="reset"><i class="bi bi-x-circle me-1"></i>Cancel / Reset</button>
                            <button class="btn btn-primary" type="button"><i class="bi bi-check-circle-fill me-1"></i>Publish Notification</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include '../includes/footer.php'; ?>