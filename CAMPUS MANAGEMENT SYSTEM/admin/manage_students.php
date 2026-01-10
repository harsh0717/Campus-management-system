<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<!-- MAIN CONTENT -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
    
    <!-- Page Header -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
        <h1 class="h2">Manage Students</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button type="button" class="btn btn-sm btn-primary">
                <i class="fas fa-plus me-1"></i> Add Student
            </button>
        </div>
    </div>

    <!-- Enhanced Search Bar (UI Only) -->
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

    <!-- Students Table Wrapper for Responsiveness -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">Student ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Semester</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dummy Data Row 1 -->
                        <tr>
                            <td class="ps-4">#STU1001</td>
                            <td>
                                <div class="fw-bold">Mark Williams</div>
                            </td>
                            <td>mark.w@example.com</td>
                            <td>Computer Science</td>
                            <td>3rd</td>
                            <td class="text-end pe-4">
                                <button class="btn btn-sm btn-outline-primary me-1" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- Dummy Data Row 2 -->
                        <tr>
                            <td class="ps-4">#STU1002</td>
                            <td>
                                <div class="fw-bold">Emily Davis</div>
                            </td>
                            <td>emily.d@example.com</td>
                            <td>Physics</td>
                            <td>1st</td>
                            <td class="text-end pe-4">
                                <button class="btn btn-sm btn-outline-primary me-1" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- Dummy Data Row 3 -->
                        <tr>
                            <td class="ps-4">#STU1003</td>
                            <td>
                                <div class="fw-bold">Michael Brown</div>
                            </td>
                            <td>m.brown@example.com</td>
                            <td>History</td>
                            <td>5th</td>
                            <td class="text-end pe-4">
                                <button class="btn btn-sm btn-outline-primary me-1" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- Dummy Data Row 4 -->
                        <tr>
                            <td class="ps-4">#STU1004</td>
                            <td>
                                <div class="fw-bold">Sophia Wilson</div>
                            </td>
                            <td>sophia.w@example.com</td>
                            <td>Mathematics</td>
                            <td>2nd</td>
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

    <!-- Simple Pagination (UI Only) -->
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