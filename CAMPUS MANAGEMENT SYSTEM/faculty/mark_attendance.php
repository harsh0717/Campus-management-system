<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar-faculty.php'; ?>

<!-- MAIN CONTENT -->
<!-- FIX: Removed 'col-md-9 ms-sm-auto' to allow sidebar CSS to control margins -->
<main class="container-fluid px-4 py-4">
    
    <!-- Page Header -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
        <div>
            <h1 class="h2 mb-0">Mark Attendance</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Attendance</li>
                </ol>
            </nav>
        </div>
        <!-- Status Badge -->
        <div id="status-container">
            <span class="badge rounded-pill bg-warning-subtle text-warning border border-warning-subtle px-3 py-2">
                <i class="fas fa-exclamation-circle me-2"></i>Attendance not submitted yet
            </span>
        </div>
    </div>

    <!-- Filters Section -->
    <div class="card shadow-sm mb-4 border-0">
        <div class="card-body">
            <div class="row g-3 align-items-end">
                <div class="col-md-3">
                    <label class="form-label small fw-bold text-muted">Select Course</label>
                    <select class="form-select shadow-sm border-light">
                        <option selected>Intro to Programming (CS101)</option>
                        <option>Data Structures (CS202)</option>
                        <option>Web Development (CS305)</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label small fw-bold text-muted">Semester</label>
                    <select class="form-select shadow-sm border-light">
                        <option selected>1st Semester</option>
                        <option>2nd Semester</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label small fw-bold text-muted">Section</label>
                    <select class="form-select shadow-sm border-light">
                        <option selected>Section A</option>
                        <option>Section B</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label small fw-bold text-muted">Date</label>
                    <input type="date" class="form-control shadow-sm border-light" value="<?php echo date('Y-m-d'); ?>">
                </div>
                <div class="col-md-3">
                    <button class="btn btn-primary w-100 shadow-sm fw-bold">
                        <i class="fas fa-sync-alt me-2"></i>Load Students
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Student List Table -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 fw-bold text-dark">Student List - CS101 (Section A)</h6>
            <!-- Select All Utility -->
            <div class="form-check form-switch mb-0">
                <input class="form-check-input" type="checkbox" id="selectAllPresent" checked>
                <label class="form-check-label small fw-bold text-muted" for="selectAllPresent">Mark All Present</label>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4" style="width: 150px;">Roll No</th>
                            <th>Student Name</th>
                            <th class="text-center">Attendance</th>
                        </tr>
                    </thead>
                    <tbody id="attendance-list">
                        <!-- Student 1 -->
                        <tr>
                            <td class="ps-4">2023CS01</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm me-3 bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px; font-size: 0.8rem;">MJ</div>
                                    <span class="fw-bold">Mark Johnson</span>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <input type="radio" class="btn-check" name="att1" id="p1" checked autocomplete="off">
                                    <label class="btn btn-outline-success btn-sm px-3" for="p1">Present</label>
                                    
                                    <input type="radio" class="btn-check" name="att1" id="a1" autocomplete="off">
                                    <label class="btn btn-outline-danger btn-sm px-3" for="a1">Absent</label>
                                </div>
                            </td>
                        </tr>
                        <!-- Student 2 -->
                        <tr>
                            <td class="ps-4">2023CS02</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm me-3 bg-info text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px; font-size: 0.8rem;">SW</div>
                                    <span class="fw-bold">Sarah Williams</span>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <input type="radio" class="btn-check" name="att2" id="p2" checked autocomplete="off">
                                    <label class="btn btn-outline-success btn-sm px-3" for="p2">Present</label>
                                    
                                    <input type="radio" class="btn-check" name="att2" id="a2" autocomplete="off">
                                    <label class="btn btn-outline-danger btn-sm px-3" for="a2">Absent</label>
                                </div>
                            </td>
                        </tr>
                        <!-- Student 3 -->
                        <tr>
                            <td class="ps-4">2023CS03</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm me-3 bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px; font-size: 0.8rem;">DC</div>
                                    <span class="fw-bold">David Chen</span>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <input type="radio" class="btn-check" name="att3" id="p3" checked autocomplete="off">
                                    <label class="btn btn-outline-success btn-sm px-3" for="p3">Present</label>
                                    
                                    <input type="radio" class="btn-check" name="att3" id="a3" autocomplete="off">
                                    <label class="btn btn-outline-danger btn-sm px-3" for="a3">Absent</label>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white py-3 d-flex justify-content-between align-items-center">
            <span class="text-muted small">Showing 3 students</span>
            <button class="btn btn-success px-5 shadow-sm fw-bold">
                <i class="fas fa-check-double me-2"></i>Submit Attendance
            </button>
        </div>
    </div>
</main>

<script>
    // Simple UI interaction logic
    document.getElementById('selectAllPresent').addEventListener('change', function(e) {
        const radios = document.querySelectorAll('input[id^="p"]');
        if(e.target.checked) {
            radios.forEach(radio => radio.checked = true);
        }
    });
</script>

<?php 
// NOTE: We do not need to manually close the .main-content div here if your footer includes standard closing tags, 
// but if your footer is simple, you might need a </div> here.
include '../includes/footer.php'; 
?>