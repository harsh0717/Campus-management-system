<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>
<?php include 'navbar.php'; ?>

<!-- Custom CSS (Matching Dashboard Theme) -->
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

    /* Table Styling */
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

<!-- Main Content with Gradient Background -->
<div class="container-fluid px-4 pb-5" style="background: linear-gradient(135deg, #eff3f9 0%, #dce4f1 100%); min-height: 100vh;">
    
    <!-- 1. Page Header -->
    <div class="d-flex justify-content-between align-items-center pt-4 mb-5">
        <div>
            <h1 class="h2 fw-bold text-dark mb-1">Manage Students</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted small">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted small">Students</a></li>
                    <li class="breadcrumb-item active small" aria-current="page">Directory</li>
                </ol>
            </nav>
        </div>
        <div>
            <button class="btn btn-gradient px-4 py-2 fw-bold">
                <i class="fas fa-plus me-2"></i> Add Student
            </button>
        </div>
    </div>

    <!-- 2. Search & Filter (Styled as a Card) -->
    <div class="card dashboard-card mb-4">
        <div class="card-body p-4">
            <div class="row g-3 align-items-end">
                <!-- Filter (Left) -->
                <div class="col-md-7 d-flex flex-wrap gap-3">
                    <div class="flex-grow-1 flex-md-grow-0">
                        <label class="form-label small text-uppercase text-muted fw-bold mb-1">Department</label>
                        <select class="form-select fw-bold text-dark">
                            <option selected>All Departments</option>
                            <option value="CS">Computer Science</option>
                            <option value="MAT">Mathematics</option>
                            <option value="PHY">Physics</option>
                            <option value="HIS">History</option>
                        </select>
                    </div>
                    <div class="flex-grow-1 flex-md-grow-0">
                        <label class="form-label small text-uppercase text-muted fw-bold mb-1">Semester</label>
                        <select class="form-select fw-bold text-dark">
                            <option selected>All Semesters</option>
                            <option value="1">1st Sem</option>
                            <option value="2">2nd Sem</option>
                            <option value="3">3rd Sem</option>
                            <option value="4">4th Sem</option>
                        </select>
                    </div>
                </div>

                <!-- Search (Right) -->
                <div class="col-md-5 ms-auto">
                    <label class="form-label small text-uppercase text-muted fw-bold mb-1">Search Students</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0 rounded-start-3 ps-3 text-primary">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text" class="form-control border-start-0 ps-2" placeholder="Search by name, ID or email...">
                        <button class="btn btn-primary fw-bold px-4" type="button" style="border-radius: 0 12px 12px 0;">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 3. Student Table Wrapper -->
    <div class="card dashboard-card mb-5">
        <!-- Header -->
        <div class="card-header card-header-gradient border-0 py-4 px-4 d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center text-white">
                <div class="bg-white bg-opacity-25 rounded-3 p-2 me-3">
                    <i class="fas fa-user-graduate fs-4 text-white"></i>
                </div>
                <div>
                    <h5 class="mb-0 fw-bold">Student Directory</h5>
                    <small class="opacity-75">View and manage enrolled students</small>
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-custom table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4">Student ID</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Semester</th>
                            <th>Status</th>
                            <th class="text-center pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Row 1 -->
                        <tr>
                            <td class="ps-4"><span class="fw-bold text-secondary">#STU1001</span></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle text-center fw-bold me-3" style="width:40px; height:40px; line-height:40px; font-size:0.9rem;">MW</div>
                                    <div>
                                        <span class="d-block fw-bold text-dark">Mark Williams</span>
                                        <small class="text-muted"><i class="far fa-envelope me-1"></i> mark.w@example.com</small>
                                    </div>
                                </div>
                            </td>
                            <td class="text-muted fw-bold">Computer Science</td>
                            <td><span class="badge bg-light text-dark border">3rd Sem</span></td>
                            <td><span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-1">Active</span></td>
                            <td class="text-center pe-4">
                                <button class="btn-action me-1" title="Edit"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn-action btn-action-danger" title="Delete"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <!-- Row 2 -->
                        <tr>
                            <td class="ps-4"><span class="fw-bold text-secondary">#STU1002</span></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-info bg-opacity-10 text-info rounded-circle text-center fw-bold me-3" style="width:40px; height:40px; line-height:40px; font-size:0.9rem;">ED</div>
                                    <div>
                                        <span class="d-block fw-bold text-dark">Emily Davis</span>
                                        <small class="text-muted"><i class="far fa-envelope me-1"></i> emily.d@example.com</small>
                                    </div>
                                </div>
                            </td>
                            <td class="text-muted fw-bold">Physics</td>
                            <td><span class="badge bg-light text-dark border">1st Sem</span></td>
                            <td><span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-1">Active</span></td>
                            <td class="text-center pe-4">
                                <button class="btn-action me-1" title="Edit"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn-action btn-action-danger" title="Delete"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <!-- Row 3 -->
                        <tr>
                            <td class="ps-4"><span class="fw-bold text-secondary">#STU1003</span></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-warning bg-opacity-10 text-warning rounded-circle text-center fw-bold me-3" style="width:40px; height:40px; line-height:40px; font-size:0.9rem;">MB</div>
                                    <div>
                                        <span class="d-block fw-bold text-dark">Michael Brown</span>
                                        <small class="text-muted"><i class="far fa-envelope me-1"></i> m.brown@example.com</small>
                                    </div>
                                </div>
                            </td>
                            <td class="text-muted fw-bold">History</td>
                            <td><span class="badge bg-light text-dark border">5th Sem</span></td>
                            <td><span class="badge bg-warning bg-opacity-10 text-warning rounded-pill px-3 py-1">Probation</span></td>
                            <td class="text-center pe-4">
                                <button class="btn-action me-1" title="Edit"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn-action btn-action-danger" title="Delete"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <!-- Row 4 -->
                        <tr>
                            <td class="ps-4"><span class="fw-bold text-secondary">#STU1004</span></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-success bg-opacity-10 text-success rounded-circle text-center fw-bold me-3" style="width:40px; height:40px; line-height:40px; font-size:0.9rem;">SW</div>
                                    <div>
                                        <span class="d-block fw-bold text-dark">Sophia Wilson</span>
                                        <small class="text-muted"><i class="far fa-envelope me-1"></i> sophia.w@example.com</small>
                                    </div>
                                </div>
                            </td>
                            <td class="text-muted fw-bold">Mathematics</td>
                            <td><span class="badge bg-light text-dark border">2nd Sem</span></td>
                            <td><span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-1">Active</span></td>
                            <td class="text-center pe-4">
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