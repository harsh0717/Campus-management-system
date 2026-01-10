<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<!-- MAIN CONTENT -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
    
    <!-- Page Header -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
        <h1 class="h2">Manage Courses</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button type="button" class="btn btn-sm btn-primary">
                <i class="fas fa-plus me-1"></i> Add Course
            </button>
        </div>
    </div>

    <!-- Filters & Search Bar (UI Only) -->
    <div class="row mb-4 g-3 align-items-end">
        <!-- Filters (Left) -->
        <div class="col-md-8 d-flex flex-wrap gap-3">
            <div>
                <label class="form-label small text-muted mb-1 fw-bold">Filter by Department</label>
                <select class="form-select w-auto shadow-sm">
                    <option selected>All Departments</option>
                    <option value="CS">Computer Science</option>
                    <option value="MAT">Mathematics</option>
                    <option value="PHY">Physics</option>
                    <option value="HIS">History</option>
                </select>
            </div>
            <div>
                <label class="form-label small text-muted mb-1 fw-bold">Filter by Semester</label>
                <select class="form-select w-auto shadow-sm">
                    <option selected>All Semesters</option>
                    <option value="1">Sem 1</option>
                    <option value="2">Sem 2</option>
                    <option value="3">Sem 3</option>
                    <option value="4">Sem 4</option>
                </select>
            </div>
        </div>

        <!-- Search (Right) -->
        <div class="col-md-4">
            <label class="form-label small text-muted mb-1 fw-bold">Search Catalog</label>
            <div class="input-group shadow-sm">
                <span class="input-group-text bg-white border-end-0">
                    <i class="fas fa-search text-muted"></i>
                </span>
                <input type="text" class="form-control border-start-0 ps-0" placeholder="Search course name or ID...">
                <button class="btn btn-primary px-3" type="button">Search</button>
            </div>
        </div>
    </div>

    <!-- Courses Table Wrapper -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">Course ID</th>
                            <th>Course Name</th>
                            <th>Department</th>
                            <th>Semester</th>
                            <th>Assigned Faculty</th>
                            <th>Status</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dummy Row 1 -->
                        <tr>
                            <td class="ps-4">#CS101</td>
                            <td>
                                <div class="fw-bold">Intro to Programming</div>
                            </td>
                            <td>Computer Science</td>
                            <td>1st</td>
                            <td>Prof. Robert Smith</td>
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
                            <td class="ps-4">#MAT201</td>
                            <td>
                                <div class="fw-bold">Linear Algebra</div>
                            </td>
                            <td>Mathematics</td>
                            <td>3rd</td>
                            <td>Dr. Sarah Jenkins</td>
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
                            <td class="ps-4">#PHY102</td>
                            <td>
                                <div class="fw-bold">Thermodynamics</div>
                            </td>
                            <td>Physics</td>
                            <td>2nd</td>
                            <td>Emily White</td>
                            <td><span class="badge bg-warning text-dark">Upcoming</span></td>
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
                            <td class="ps-4">#HIS301</td>
                            <td>
                                <div class="fw-bold">World History</div>
                            </td>
                            <td>History</td>
                            <td>4th</td>
                            <td>Dr. James Wilson</td>
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
                        <!-- Dummy Row 5 -->
                        <tr>
                            <td class="ps-4">#CS202</td>
                            <td>
                                <div class="fw-bold">Data Structures</div>
                            </td>
                            <td>Computer Science</td>
                            <td>2nd</td>
                            <td>Unassigned</td>
                            <td><span class="badge bg-secondary">Draft</span></td>
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