<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<!-- MAIN CONTENT -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
    
    <!-- Page Header -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
        <h1 class="h2">Manage Faculty</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button type="button" class="btn btn-sm btn-primary">
                <i class="fas fa-plus me-1"></i> Add Faculty
            </button>
        </div>
    </div>

    <!-- Search Bar (UI Only) -->
    <div class="row mb-4">
        <div class="col-md-6 col-lg-4 ms-auto">
            <div class="input-group shadow-sm">
                <span class="input-group-text bg-white border-end-0">
                    <i class="fas fa-search text-muted"></i>
                </span>
                <input type="text" class="form-control border-start-0 ps-0" placeholder="Search by name, ID or department...">
                <button class="btn btn-primary px-3" type="button">Search</button>
            </div>
        </div>
    </div>

    <!-- Faculty Table Wrapper -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">Faculty ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Designation</th>
                            <th>Status</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dummy Row 1 -->
                        <tr>
                            <td class="ps-4">#FAC001</td>
                            <td>
                                <div class="fw-bold">Dr. Sarah Jenkins</div>
                            </td>
                            <td>s.jenkins@example.com</td>
                            <td>Mathematics</td>
                            <td>Professor</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td class="text-end pe-4">
                                <button class="btn btn-sm btn-outline-primary me-1" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- Dummy Row 2 -->
                        <tr>
                            <td class="ps-4">#FAC002</td>
                            <td>
                                <div class="fw-bold">Prof. Robert Smith</div>
                            </td>
                            <td>r.smith@example.com</td>
                            <td>Computer Science</td>
                            <td>Assoc. Professor</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td class="text-end pe-4">
                                <button class="btn btn-sm btn-outline-primary me-1" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- Dummy Row 3 -->
                        <tr>
                            <td class="ps-4">#FAC003</td>
                            <td>
                                <div class="fw-bold">Emily White</div>
                            </td>
                            <td>e.white@example.com</td>
                            <td>Physics</td>
                            <td>Lecturer</td>
                            <td><span class="badge bg-warning text-dark">On Leave</span></td>
                            <td class="text-end pe-4">
                                <button class="btn btn-sm btn-outline-primary me-1" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- Dummy Row 4 -->
                        <tr>
                            <td class="ps-4">#FAC004</td>
                            <td>
                                <div class="fw-bold">Dr. James Wilson</div>
                            </td>
                            <td>j.wilson@example.com</td>
                            <td>History</td>
                            <td>Asst. Professor</td>
                            <td><span class="badge bg-danger">Inactive</span></td>
                            <td class="text-end pe-4">
                                <button class="btn btn-sm btn-outline-primary me-1" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <nav class="mt-4">
        <ul class="pagination pagination-sm justify-content-end">
            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>
</main>

<?php include '../includes/footer.php'; ?>