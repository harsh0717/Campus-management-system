<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar-faculty.php'; ?>

<!-- Page Specific CSS -->
<style>
    :root {
        --primary-color: #2c3e50;
        --secondary-color: #34495e;
        --accent-color: #3498db;
        --success-color: #2ecc71;
        --danger-color: #e74c3c;
        --warning-color: #f1c40f;
        --light-bg: #f8f9fa;
        --card-shadow: 0 4px 20px rgba(0,0,0,0.05);
        --hover-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    body {
        background-color: var(--light-bg);
        font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
    }

    /* Card Styling */
    .card-modern {
        background: white;
        border-radius: 16px;
        border: 1px solid rgba(0,0,0,0.03);
        box-shadow: var(--card-shadow);
        overflow: hidden;
        margin-bottom: 1.5rem;
    }

    .card-modern-header {
        padding: 1.5rem;
        border-bottom: 1px solid rgba(0,0,0,0.03);
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: white;
    }

    .card-modern-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--secondary-color);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    /* Page Header */
    .page-header-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--primary-color);
        letter-spacing: -0.5px;
    }
    .breadcrumb-item a { color: var(--accent-color); text-decoration: none; }
    .breadcrumb-item.active { color: #95a5a6; }

    /* Form Elements */
    .filter-label {
        font-size: 0.8rem;
        font-weight: 600;
        color: #95a5a6;
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .form-control-modern, .form-select-modern {
        border: 1px solid #eef2f7;
        border-radius: 10px;
        padding: 0.7rem 1rem;
        font-size: 0.95rem;
        color: var(--primary-color);
        background-color: #fdfdfe;
        transition: all 0.2s;
    }
    /* Fix for select chevron overlap */
    select.form-select-modern {
        padding-right: 2.5rem;
        background-position: right 1rem center;
    }
    .form-control-modern:focus, .form-select-modern:focus {
        border-color: var(--accent-color);
        background-color: #fff;
        box-shadow: 0 0 0 4px rgba(52, 152, 219, 0.1);
    }

    /* Table Styling */
    .table-modern {
        width: 100%;
        margin-bottom: 0;
    }
    .table-modern thead th {
        background: #f8f9fa;
        color: #7f8c8d;
        font-weight: 600;
        font-size: 0.8rem;
        text-transform: uppercase;
        padding: 1rem 1.5rem;
        border-bottom: 1px solid #eef2f7;
    }
    .table-modern tbody td {
        padding: 1rem 1.5rem;
        vertical-align: middle;
        border-bottom: 1px solid #f8f9fa;
    }
    .table-modern tbody tr:last-child td { border-bottom: none; }
    .table-modern tbody tr:hover { background-color: #fafbfc; }

    /* Student Icon */
    .student-icon-box {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        background: #eef2f7;
        color: #7f8c8d;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        margin-right: 1rem;
    }

    /* Custom Marks Input */
    .marks-input {
        width: 100px;
        text-align: center;
        font-weight: 700;
        color: var(--primary-color);
        border: 2px solid #eef2f7;
        border-radius: 8px;
        padding: 0.5rem;
        transition: all 0.2s;
    }
    .marks-input:focus {
        border-color: var(--accent-color);
        box-shadow: 0 0 0 4px rgba(52, 152, 219, 0.1);
        outline: none;
    }

    /* Status Selects Styling */
    .status-select, .grade-select {
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.9rem;
        border: 1px solid #eef2f7;
        padding: 0.4rem 2rem 0.4rem 0.8rem;
        cursor: pointer;
    }
    /* Dynamic Colors for Selects */
    .status-pass { background-color: #d1fae5; color: #047857; border-color: #a7f3d0; }
    .status-fail { background-color: #fee2e2; color: #b91c1c; border-color: #fecaca; }
    .status-absent { background-color: #fef3c7; color: #b45309; border-color: #fde68a; }
    .status-default { background-color: #f3f4f6; color: #4b5563; }

</style>

<main class="container-fluid px-4 py-4">
    
    <!-- 1. Header Section -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-4">
        <div>
            <h1 class="page-header-title mb-1">Upload Results</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Upload Results</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- 2. Filters Section -->
    <div class="card-modern">
        <div class="card-modern-header">
            <h5 class="card-modern-title"><i class="fas fa-sliders-h text-primary"></i> Assessment Criteria</h5>
        </div>
        <div class="card-body p-4">
            <form action="" method="GET" class="row g-3 align-items-end">
                <div class="col-md-3">
                    <label class="filter-label">Course</label>
                    <select class="form-select form-select-modern" id="courseSelect">
                        <option selected disabled>Select Course...</option>
                        <option value="CSE">Computer Science (CSE)</option>
                        <option value="ECE">Electronics (ECE)</option>
                        <option value="ME">Mechanical (ME)</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="filter-label">Semester</label>
                    <select class="form-select form-select-modern" id="semesterSelect">
                        <option selected disabled>Select Semester...</option>
                        <option value="1">Semester 1</option>
                        <option value="2">Semester 2</option>
                        <option value="3">Semester 3</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="filter-label">Exam Type</label>
                    <select class="form-select form-select-modern" id="examTypeSelect">
                        <option selected disabled>Select Exam...</option>
                        <option value="mid">Mid-Term</option>
                        <option value="final">Final End-Term</option>
                        <option value="practical">Practical/Lab</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <button type="button" class="btn btn-primary w-100 rounded-pill py-2 fw-bold shadow-sm" style="background-color: var(--accent-color); border-color: var(--accent-color);">
                        <i class="fas fa-search me-2"></i> Load Students
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- 3. Results Entry Table -->
    <div class="card-modern">
        <div class="card-modern-header">
            <div class="d-flex flex-column">
                <h6 class="card-modern-title mb-1">Student Marks Entry</h6>
                <div class="d-flex align-items-center gap-2 small">
                    <span class="badge bg-light text-dark border">CSE - Sem 3</span>
                    <span class="badge bg-light text-dark border">Final Exam</span>
                </div>
            </div>
            <div class="d-flex align-items-center">
                 <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25 px-3 py-2 rounded-pill">
                    <i class="fas fa-exclamation-circle me-2"></i>Not Submitted
                </span>
            </div>
        </div>
        
        <div class="table-responsive">
            <table class="table table-modern align-middle" id="resultsTable">
                <thead>
                    <tr>
                        <th class="ps-4" width="10%">Roll No</th>
                        <th width="25%">Student Name</th>
                        <th width="15%" class="text-center">Obtained Marks</th>
                        <th width="10%" class="text-center">Total</th>
                        <th width="15%">Grade</th>
                        <th width="15%">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Student 1 -->
                    <tr>
                        <td class="ps-4 fw-bold text-secondary">101</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="student-icon-box">
                                    <i class="fas fa-user-graduate"></i>
                                </div>
                                <div>
                                    <div class="fw-bold text-dark">John Doe</div>
                                    <small class="text-muted">Regular</small>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            <input type="number" class="marks-input" placeholder="-" min="0" max="100">
                        </td>
                        <td class="text-center text-muted fw-bold max-marks">100</td>
                        <td>
                            <select class="form-select form-select-sm grade-select status-default">
                                <option value="">-</option>
                                <option value="O">O</option>
                                <option value="A+">A+</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="F">F</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-select form-select-sm status-select status-default">
                                <option value="Pass">Pass</option>
                                <option value="Fail">Fail</option>
                                <option value="Absent">Absent</option>
                            </select>
                        </td>
                    </tr>

                    <!-- Student 2 -->
                    <tr>
                        <td class="ps-4 fw-bold text-secondary">102</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="student-icon-box">
                                    <i class="fas fa-user-graduate"></i>
                                </div>
                                <div>
                                    <div class="fw-bold text-dark">Jane Smith</div>
                                    <small class="text-muted">Scholarship</small>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            <input type="number" class="marks-input" placeholder="-" min="0" max="100">
                        </td>
                        <td class="text-center text-muted fw-bold max-marks">100</td>
                        <td>
                            <select class="form-select form-select-sm grade-select status-default">
                                <option value="">-</option>
                                <option value="O">O</option>
                                <option value="A+">A+</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="F">F</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-select form-select-sm status-select status-default">
                                <option value="Pass">Pass</option>
                                <option value="Fail">Fail</option>
                                <option value="Absent">Absent</option>
                            </select>
                        </td>
                    </tr>

                     <!-- Student 3 -->
                     <tr>
                        <td class="ps-4 fw-bold text-secondary">103</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="student-icon-box">
                                    <i class="fas fa-user-graduate"></i>
                                </div>
                                <div>
                                    <div class="fw-bold text-dark">Robert Brown</div>
                                    <small class="text-muted">Regular</small>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            <input type="number" class="marks-input" placeholder="-" min="0" max="100">
                        </td>
                        <td class="text-center text-muted fw-bold max-marks">100</td>
                        <td>
                            <select class="form-select form-select-sm grade-select status-default">
                                <option value="">-</option>
                                <option value="O">O</option>
                                <option value="A+">A+</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="F">F</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-select form-select-sm status-select status-default">
                                <option value="Pass">Pass</option>
                                <option value="Fail">Fail</option>
                                <option value="Absent">Absent</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="card-footer bg-white py-4 d-flex justify-content-between align-items-center border-top-0">
            <div class="text-muted small">
                <i class="fas fa-info-circle me-1"></i> Grades are auto-calculated. Review before submitting.
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-light border rounded-pill px-4 fw-bold text-muted hover-elevate">Save Draft</button>
                <button class="btn btn-success rounded-pill px-4 fw-bold shadow-sm hover-elevate" style="background-color: var(--success-color); border: none;">
                    <i class="fas fa-check-circle me-2"></i>Submit Results
                </button>
            </div>
        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const marksInputs = document.querySelectorAll('.marks-input');

    // Helper to set color class based on value
    function updateSelectColor(selectElement, type) {
        selectElement.classList.remove('status-pass', 'status-fail', 'status-absent', 'status-default');
        
        const val = selectElement.value;
        if(val === "") {
            selectElement.classList.add('status-default');
            return;
        }

        if (type === 'grade') {
            if (['F', 'Absent'].includes(val)) selectElement.classList.add('status-fail');
            else selectElement.classList.add('status-pass'); // All passing grades
        } else if (type === 'status') {
            if (val === 'Pass') selectElement.classList.add('status-pass');
            else if (val === 'Fail') selectElement.classList.add('status-fail');
            else if (val === 'Absent') selectElement.classList.add('status-absent');
        }
    }

    marksInputs.forEach(input => {
        input.addEventListener('input', function() {
            const row = this.closest('tr');
            const marks = parseFloat(this.value);
            const maxMarks = parseFloat(row.querySelector('.max-marks').textContent);
            const gradeSelect = row.querySelector('.grade-select');
            const statusSelect = row.querySelector('.status-select');

            // Reset if empty
            if (this.value === "" || isNaN(marks)) {
                gradeSelect.value = "";
                statusSelect.value = "Pass"; // Reset default
                updateSelectColor(gradeSelect, 'grade');
                updateSelectColor(statusSelect, 'status');
                return;
            }

            const percentage = (marks / maxMarks) * 100;
            let grade = "F";
            let status = "Fail";

            // Calculation Logic
            if (percentage >= 90) grade = "O";
            else if (percentage >= 80) grade = "A+";
            else if (percentage >= 70) grade = "A";
            else if (percentage >= 60) grade = "B";
            else if (percentage >= 50) grade = "C";
            else if (percentage >= 35) grade = "D";
            else grade = "F";

            // Pass/Fail Logic (Pass >= 35%)
            if (percentage >= 35) {
                status = "Pass";
            } else {
                status = "Fail";
            }

            // Update Values
            gradeSelect.value = grade;
            statusSelect.value = status;

            // Update Visuals
            updateSelectColor(gradeSelect, 'grade');
            updateSelectColor(statusSelect, 'status');
        });
    });
    
    // Initialize colors for any pre-filled data (optional)
    document.querySelectorAll('.grade-select').forEach(el => updateSelectColor(el, 'grade'));
    document.querySelectorAll('.status-select').forEach(el => updateSelectColor(el, 'status'));
});
</script>

<?php include '../includes/footer.php'; ?>