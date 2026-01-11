<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>
<?php include 'navbar.php'; ?>

<!-- Custom CSS for the Dashboard -->
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
    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.12);
    }

    /* Vibrant Gradients for Icons */
    .bg-gradient-primary { background: linear-gradient(135deg, #4e73df 0%, #224abe 100%); }
    .bg-gradient-success { background: linear-gradient(135deg, #1cc88a 0%, #13855c 100%); }
    .bg-gradient-info    { background: linear-gradient(135deg, #36b9cc 0%, #258391 100%); }
    .bg-gradient-warning { background: linear-gradient(135deg, #f6c23e 0%, #dda20a 100%); }
    .bg-gradient-danger  { background: linear-gradient(135deg, #e74a3b 0%, #be2617 100%); }

    /* Header Gradient Style */
    .card-header-gradient {
        background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
        position: relative;
    }

    /* Icon styling - Glassmorphism feel */
    .icon-box {
        width: 56px;
        height: 56px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 16px;
        font-size: 1.5rem;
        color: white;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    
    /* Section Titles */
    .section-title {
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        font-weight: 800;
        color: #4e73df;
        display: flex;
        align-items: center;
    }
    .section-title i {
        background: #ebf3ff;
        color: #4e73df;
        padding: 6px;
        border-radius: 6px;
        margin-right: 10px;
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

    /* Buttons */
    .btn-gradient {
        background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
        border: none;
        color: white;
        box-shadow: 0 4px 15px rgba(78, 115, 223, 0.4);
        transition: all 0.2s;
    }
    .btn-gradient:hover {
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(78, 115, 223, 0.6);
    }
    
    /* Action Button Styles */
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
        text-decoration: none;
    }
    .btn-action:hover {
        background-color: #eaecf4;
        color: #4e73df;
    }
    .btn-action:disabled {
        opacity: 0.6;
        cursor: not-allowed;
    }
</style>

<!-- Main Content with Gradient Background -->
<div class="container-fluid px-4 pb-5" style="background: linear-gradient(135deg, #eff3f9 0%, #dce4f1 100%); min-height: 100vh;">
    
    <!-- 1. Page Header -->
    <div class="d-flex justify-content-between align-items-center pt-4 mb-5">
        <div>
            <h1 class="h2 fw-bold text-dark mb-1">Analytics & Reports</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted small">Home</a></li>
                    <li class="breadcrumb-item active small" aria-current="page">Dashboard Overview</li>
                </ol>
            </nav>
        </div>
        
        <!-- Actions -->
        <div class="d-none d-md-flex gap-3">
            <select class="form-select border-0 shadow-sm fw-bold text-secondary" style="width: 160px; border-radius: 12px;">
                <option value="7">Last 7 Days</option>
                <option value="30" selected>Last 30 Days</option>
                <option value="semester">This Semester</option>
                <option value="year">Last Year</option>
            </select>
            <button class="btn btn-gradient fw-bold rounded-pill px-4">
                <i class="fas fa-download me-2"></i> Export Report
            </button>
        </div>
    </div>

    <!-- 2. Summary Cards -->
    <div class="row g-4 mb-5">
        <!-- Total Students -->
        <div class="col-xl-3 col-md-6">
            <div class="card dashboard-card h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-uppercase fw-bold text-muted small mb-1 tracking-wide">Total Students</div>
                            <div class="h2 mb-0 fw-bold text-dark">2,450</div>
                            <div class="mt-2 small">
                                <span class="text-success fw-bold"><i class="fas fa-arrow-up"></i> 12%</span>
                                <span class="text-muted ms-1">vs last year</span>
                            </div>
                        </div>
                        <div class="icon-box bg-gradient-primary">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Faculty -->
        <div class="col-xl-3 col-md-6">
            <div class="card dashboard-card h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-uppercase fw-bold text-muted small mb-1 tracking-wide">Total Faculty</div>
                            <div class="h2 mb-0 fw-bold text-dark">128</div>
                            <div class="mt-2 small text-muted">Across 8 Departments</div>
                        </div>
                        <div class="icon-box bg-gradient-success">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Active Courses -->
        <div class="col-xl-3 col-md-6">
            <div class="card dashboard-card h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-uppercase fw-bold text-muted small mb-1 tracking-wide">Active Courses</div>
                            <div class="h2 mb-0 fw-bold text-dark">42</div>
                            <div class="mt-2 small text-muted">Running this Semester</div>
                        </div>
                        <div class="icon-box bg-gradient-info">
                            <i class="fas fa-book-open"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Attendance Average -->
        <div class="col-xl-3 col-md-6">
            <div class="card dashboard-card h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-uppercase fw-bold text-muted small mb-1 tracking-wide">Avg. Attendance</div>
                            <div class="h2 mb-0 fw-bold text-dark">87%</div>
                            <div class="mt-2 small">
                                <span class="text-warning fw-bold"><i class="fas fa-minus"></i> Stable</span>
                            </div>
                        </div>
                        <div class="icon-box bg-gradient-warning">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 3. Charts Section -->
    <div class="row mb-5">
        <!-- Chart 1: Student Enrollment -->
        <div class="col-lg-6 mb-4 mb-lg-0">
            <div class="card dashboard-card h-100">
                <div class="card-body p-4">
                    <div class="section-title mb-4">
                        <i class="fas fa-chart-bar"></i> Enrollment by Dept
                    </div>
                    <div class="chart-container" style="position: relative; height:320px;">
                        <canvas id="enrollmentChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart 2: Attendance Trend -->
        <div class="col-lg-6">
            <div class="card dashboard-card h-100">
                <div class="card-body p-4">
                    <div class="section-title mb-4">
                        <i class="fas fa-chart-line"></i> Attendance Trends
                    </div>
                    <div class="chart-container" style="position: relative; height:320px;">
                        <canvas id="attendanceChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 4. Reports / Activity Table -->
    <div class="card dashboard-card mb-5">
        <!-- Vibrant Gradient Header -->
        <div class="card-header card-header-gradient border-0 py-4 px-4 d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center text-white">
                <div class="bg-white bg-opacity-25 rounded-3 p-2 me-3">
                    <i class="fas fa-file-alt fs-4 text-white"></i>
                </div>
                <div>
                    <h5 class="mb-0 fw-bold">System Reports</h5>
                    <small class="opacity-75">Recent generated files and logs</small>
                </div>
            </div>
            <a href="#" class="btn btn-sm btn-light text-primary fw-bold shadow-sm rounded-pill px-3">View All Reports</a>
        </div>
        
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-custom table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4">Report Details</th>
                            <th>Generated By</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th class="text-center pe-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                    <div class="p-2 rounded bg-danger bg-opacity-10 text-danger me-3">
                                        <i class="fas fa-file-pdf fs-5"></i>
                                    </div>
                                    <div>
                                        <span class="d-block fw-bold text-dark">Attendance_Report_Oct.pdf</span>
                                        <small class="text-muted">3.4 MB</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-light rounded-circle text-center me-2" style="width:24px; height:24px; line-height:24px;"><i class="fas fa-robot text-muted" style="font-size:0.7rem;"></i></div>
                                    <span class="text-dark small fw-bold">System</span>
                                </div>
                            </td>
                            <td class="text-muted small">12 Oct 2023</td>
                            <td><span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-1">Completed</span></td>
                            <td class="text-center pe-4">
                                <a href="#" class="btn-action" title="Download Report" data-bs-toggle="tooltip" data-bs-placement="top"><i class="fas fa-download"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                    <div class="p-2 rounded bg-success bg-opacity-10 text-success me-3">
                                        <i class="fas fa-file-excel fs-5"></i>
                                    </div>
                                    <div>
                                        <span class="d-block fw-bold text-dark">Semester_Result_Summary.xlsx</span>
                                        <small class="text-muted">1.2 MB</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary rounded-circle text-white text-center me-2" style="width:24px; height:24px; line-height:24px; font-size:0.6rem;">AD</div>
                                    <span class="text-dark small fw-bold">Admin</span>
                                </div>
                            </td>
                            <td class="text-muted small">10 Oct 2023</td>
                            <td><span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-1">Completed</span></td>
                            <td class="text-center pe-4">
                                <a href="#" class="btn-action" title="Download Report" data-bs-toggle="tooltip" data-bs-placement="top"><i class="fas fa-download"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                    <div class="p-2 rounded bg-warning bg-opacity-10 text-warning me-3">
                                        <i class="fas fa-file-alt fs-5"></i>
                                    </div>
                                    <div>
                                        <span class="d-block fw-bold text-dark">Faculty_Load_Analysis.pdf</span>
                                        <small class="text-muted">Processing...</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-light rounded-circle text-center me-2" style="width:24px; height:24px; line-height:24px;"><i class="fas fa-robot text-muted" style="font-size:0.7rem;"></i></div>
                                    <span class="text-dark small fw-bold">System</span>
                                </div>
                            </td>
                            <td class="text-muted small">08 Oct 2023</td>
                            <td><span class="badge bg-warning bg-opacity-10 text-warning rounded-pill px-3 py-1">Pending</span></td>
                            <td class="text-center pe-4">
                                <button class="btn-action" disabled title="Pending Generation"><i class="fas fa-clock"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                    <div class="p-2 rounded bg-primary bg-opacity-10 text-primary me-3">
                                        <i class="fas fa-file-csv fs-5"></i>
                                    </div>
                                    <div>
                                        <span class="d-block fw-bold text-dark">New_Student_Reg.csv</span>
                                        <small class="text-muted">856 KB</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-info rounded-circle text-white text-center me-2" style="width:24px; height:24px; line-height:24px; font-size:0.6rem;">RG</div>
                                    <span class="text-dark small fw-bold">Registrar</span>
                                </div>
                            </td>
                            <td class="text-muted small">05 Oct 2023</td>
                            <td><span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-1">Completed</span></td>
                            <td class="text-center pe-4">
                                <a href="#" class="btn-action" title="Download Report" data-bs-toggle="tooltip" data-bs-placement="top"><i class="fas fa-download"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- Chart.js Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Global defaults for charts
    Chart.defaults.font.family = "'Segoe UI', 'Roboto', 'Helvetica Neue', sans-serif";
    Chart.defaults.color = '#8898aa';

    // 1. Enrollment Bar Chart
    const ctxEnrollment = document.getElementById('enrollmentChart');
    if (ctxEnrollment) {
        new Chart(ctxEnrollment, {
            type: 'bar',
            data: {
                labels: ['CS', 'Engineering', 'Business', 'Arts', 'Science'],
                datasets: [{
                    label: 'Students',
                    data: [850, 620, 450, 300, 230],
                    backgroundColor: [
                        '#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b'
                    ],
                    borderRadius: 8,
                    barThickness: 30
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: { 
                        beginAtZero: true,
                        grid: { borderDash: [2, 4], color: '#f0f0f0', drawBorder: false }
                    },
                    x: {
                        grid: { display: false, drawBorder: false }
                    }
                }
            }
        });
    }

    // 2. Attendance Line Chart
    const ctxAttendance = document.getElementById('attendanceChart');
    if (ctxAttendance) {
        var gradient = ctxAttendance.getContext("2d").createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(28, 200, 138, 0.4)');
        gradient.addColorStop(1, 'rgba(28, 200, 138, 0)');

        new Chart(ctxAttendance, {
            type: 'line',
            data: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', 'Week 6'],
                datasets: [{
                    label: 'Avg Attendance (%)',
                    data: [82, 85, 84, 88, 87, 89],
                    borderColor: '#1cc88a',
                    backgroundColor: gradient,
                    tension: 0.4,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: { 
                        min: 60,
                        max: 100,
                        grid: { borderDash: [2, 4], color: '#f0f0f0', drawBorder: false }
                    },
                    x: {
                        grid: { display: false, drawBorder: false }
                    }
                }
            }
        });
    }
</script>

<?php include '../includes/footer.php'; ?>