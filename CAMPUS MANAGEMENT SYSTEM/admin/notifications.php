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
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        overflow: hidden;
    }

    /* Gradient Backgrounds */
    .card-header-gradient {
        background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
        position: relative;
    }
    
    .btn-gradient {
        background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
        border: none;
        color: white;
        box-shadow: 0 4px 15px rgba(78, 115, 223, 0.4);
        transition: all 0.2s;
        border-radius: 12px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
    }
    .btn-gradient:hover {
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(78, 115, 223, 0.6);
    }

    /* Form Elements */
    .form-control, .form-select {
        border-radius: 12px;
        border: 1px solid #e3e6f0;
        padding: 0.75rem 1rem;
        font-size: 0.9rem;
        box-shadow: 0 2px 4px rgba(0,0,0,0.02);
    }
    .form-control:focus, .form-select:focus {
        border-color: #4e73df;
        box-shadow: 0 0 0 4px rgba(78, 115, 223, 0.1);
    }
    
    /* Fix for overlapping text and arrow in select boxes */
    .form-select {
        padding-right: 2.5rem; /* Ensure space for the arrow */
        background-position: right 1rem center; /* Position arrow comfortably */
    }

    /* Table Styling */
    .table-custom { min-width: 800px; }
    .table-custom thead th {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        font-weight: 700;
        color: #8898aa;
        background-color: #f8f9fe;
        border-bottom: 1px solid #e9ecef;
        padding: 1rem;
    }
    .table-custom tbody td {
        vertical-align: middle;
        padding: 1rem;
        border-bottom: 1px solid #f0f0f0;
    }
    .table-custom tbody tr:last-child td {
        border-bottom: none;
    }

    /* Action Buttons */
    .btn-action {
        width: 34px;
        height: 34px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        transition: all 0.2s;
        background-color: #f8f9fc;
        color: #858796;
        border: none;
    }
    .btn-action:hover {
        background-color: #eaecf4;
        color: #4e73df;
    }
    .btn-action-danger:hover {
        background-color: #ffe5e5;
        color: #e74a3b;
    }
    
    /* Pagination */
    .page-link {
        border-radius: 8px;
        margin: 0 3px;
        border: none;
        color: #858796;
        font-weight: 600;
    }
    .page-item.active .page-link {
        background-color: #4e73df;
        color: white;
    }
</style>

<!-- Main Content (Wrapper is opened in sidebar.php) -->
<div class="container-fluid px-4 pb-5 flex-grow-1" style="background: linear-gradient(135deg, #eff3f9 0%, #dce4f1 100%);">
    
    <!-- 1. Page Header -->
    <div class="d-flex justify-content-between align-items-center pt-4 mb-5">
        <div>
            <h1 class="h2 fw-bold text-dark mb-1">Notifications</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted small">Home</a></li>
                    <li class="breadcrumb-item active small" aria-current="page">All Notifications</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="create_notification.php" class="btn btn-gradient px-4 py-2 fw-bold">
                <i class="fas fa-plus me-2"></i> Create Notification
            </a>
        </div>
    </div>

    <!-- 2. Filters & Search -->
    <div class="card dashboard-card mb-4">
        <div class="card-body p-4">
            <div class="row g-3 align-items-end">
                <!-- Filter (Left) -->
                <div class="col-md-7 d-flex flex-wrap gap-3">
                    <div class="flex-grow-1 flex-md-grow-0">
                        <label class="form-label small text-uppercase text-muted fw-bold mb-1">Audience</label>
                        <select class="form-select fw-bold text-dark">
                            <option selected>All Groups</option>
                            <option value="students">Students</option>
                            <option value="faculty">Faculty</option>
                            <option value="staff">Staff</option>
                        </select>
                    </div>
                    <div class="flex-grow-1 flex-md-grow-0">
                        <label class="form-label small text-uppercase text-muted fw-bold mb-1">Status</label>
                        <select class="form-select fw-bold text-dark">
                            <option selected>All Statuses</option>
                            <option value="published">Published</option>
                            <option value="draft">Draft</option>
                            <option value="scheduled">Scheduled</option>
                        </select>
                    </div>
                </div>

                <!-- Search (Right) -->
                <div class="col-md-5 ms-auto">
                    <label class="form-label small text-uppercase text-muted fw-bold mb-1">Search Notifications</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0 rounded-start-3 ps-3 text-primary">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text" class="form-control border-start-0 ps-2" placeholder="Search by title...">
                        <button class="btn btn-primary fw-bold px-4" type="button" style="border-radius: 0 12px 12px 0;">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 3. Notifications Table Wrapper -->
    <div class="card dashboard-card mb-5">
        <!-- Header -->
        <div class="card-header card-header-gradient border-0 py-4 px-4 d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center text-white">
                <div class="bg-white bg-opacity-25 rounded-3 p-2 me-3">
                    <i class="fas fa-bell fs-4 text-white"></i>
                </div>
                <div>
                    <h5 class="mb-0 fw-bold">Recent Announcements</h5>
                    <small class="opacity-75">Manage system-wide alerts and messages</small>
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-custom table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4">Title</th>
                            <th>Target Audience</th>
                            <th>Date Published</th>
                            <th>Priority</th>
                            <th>Status</th>
                            <th class="text-center pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Row 1 -->
                        <tr>
                            <td class="ps-4">
                                <div class="fw-bold text-dark">Final Exam Schedule Released</div>
                                <div class="small text-muted text-truncate" style="max-width: 250px;">Please check the student portal for the upcoming...</div>
                            </td>
                            <td><span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3">Students</span></td>
                            <td class="text-muted small">Oct 24, 2023</td>
                            <td><span class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-3">High</span></td>
                            <td><span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-1">Published</span></td>
                            <td class="text-center pe-4">
                                <button class="btn-action me-1" title="View"><i class="fas fa-eye"></i></button>
                                <button class="btn-action me-1" title="Edit"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn-action btn-action-danger" title="Delete"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <!-- Row 2 -->
                        <tr>
                            <td class="ps-4">
                                <div class="fw-bold text-dark">Faculty Meeting Postponed</div>
                                <div class="small text-muted text-truncate" style="max-width: 250px;">The monthly department meeting scheduled for...</div>
                            </td>
                            <td><span class="badge bg-info bg-opacity-10 text-info rounded-pill px-3">Faculty</span></td>
                            <td class="text-muted small">Oct 22, 2023</td>
                            <td><span class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill px-3">Normal</span></td>
                            <td><span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-1">Published</span></td>
                            <td class="text-center pe-4">
                                <button class="btn-action me-1" title="View"><i class="fas fa-eye"></i></button>
                                <button class="btn-action me-1" title="Edit"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn-action btn-action-danger" title="Delete"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <!-- Row 3 -->
                        <tr>
                            <td class="ps-4">
                                <div class="fw-bold text-dark">System Maintenance Alert</div>
                                <div class="small text-muted text-truncate" style="max-width: 250px;">Server downtime expected on Sunday from 2 AM...</div>
                            </td>
                            <td><span class="badge bg-dark bg-opacity-10 text-dark rounded-pill px-3">All</span></td>
                            <td class="text-muted small">Oct 20, 2023</td>
                            <td><span class="badge bg-warning bg-opacity-10 text-warning rounded-pill px-3">Medium</span></td>
                            <td><span class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill px-3 py-1">Archived</span></td>
                            <td class="text-center pe-4">
                                <button class="btn-action me-1" title="View"><i class="fas fa-eye"></i></button>
                                <button class="btn-action me-1" title="Edit"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn-action btn-action-danger" title="Delete"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <!-- Row 4 -->
                        <tr>
                            <td class="ps-4">
                                <div class="fw-bold text-dark">Library Holiday Hours</div>
                                <div class="small text-muted text-truncate" style="max-width: 250px;">During the break, library hours will be adjusted...</div>
                            </td>
                            <td><span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3">Students</span></td>
                            <td class="text-muted small">-</td>
                            <td><span class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill px-3">Low</span></td>
                            <td><span class="badge bg-warning bg-opacity-10 text-warning rounded-pill px-3 py-1">Draft</span></td>
                            <td class="text-center pe-4">
                                <button class="btn-action me-1" title="View"><i class="fas fa-eye"></i></button>
                                <button class="btn-action me-1" title="Edit"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn-action btn-action-danger" title="Delete"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="card-footer bg-white border-0 py-3">
            <nav>
                <ul class="pagination pagination-sm justify-content-end mb-0">
                    <li class="page-item disabled"><a class="page-link" href="#"><i class="fas fa-chevron-left"></i></a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a></li>
                </ul>
            </nav>
        </div>
    </div>

</div>

<?php include '../includes/footer.php'; ?>