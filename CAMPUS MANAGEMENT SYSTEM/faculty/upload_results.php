<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar-faculty.php'; ?>

<div class="content-wrapper p-4">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-md-12">
            <h2 class="fw-bold text-primary"><i class="fas fa-file-upload me-2"></i>Upload Results</h2>
            <p class="text-muted">Select criteria to load the student list and enter marks.</p>
        </div>
    </div>

    <!-- Filter/Selection Section -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 text-secondary">Selection Criteria</h5>
        </div>
        <div class="card-body">
            <form action="" method="GET" class="row g-3 align-items-end">
                <!-- Course Dropdown -->
                <div class="col-md-3">
                    <label for="courseSelect" class="form-label fw-semibold">Course</label>
                    <select class="form-select" id="courseSelect">
                        <option selected disabled>Select Course...</option>
                        <option value="CSE">Computer Science (CSE)</option>
                        <option value="ECE">Electronics (ECE)</option>
                        <option value="ME">Mechanical (ME)</option>
                        <option value="BBA">Business Admin (BBA)</option>
                    </select>
                </div>

                <!-- Semester Dropdown -->
                <div class="col-md-3">
                    <label for="semesterSelect" class="form-label fw-semibold">Semester</label>
                    <select class="form-select" id="semesterSelect">
                        <option selected disabled>Select Semester...</option>
                        <option value="1">Semester 1</option>
                        <option value="2">Semester 2</option>
                        <option value="3">Semester 3</option>
                        <option value="4">Semester 4</option>
                        <option value="5">Semester 5</option>
                        <option value="6">Semester 6</option>
                    </select>
                </div>

                <!-- Exam Type Dropdown -->
                <div class="col-md-3">
                    <label for="examTypeSelect" class="form-label fw-semibold">Exam Type</label>
                    <select class="form-select" id="examTypeSelect">
                        <option selected disabled>Select Exam...</option>
                        <option value="mid">Mid-Term</option>
                        <option value="final">Final End-Term</option>
                        <option value="practical">Practical/Lab</option>
                    </select>
                </div>

                <!-- Load Button -->
                <div class="col-md-3">
                    <button type="button" class="btn btn-primary w-100">
                        <i class="fas fa-users me-1"></i> Load Students
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Results Entry Table Section -->
    <div class="card shadow-sm">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 text-secondary">Student Marks Entry</h5>
            <div class="d-flex align-items-center">
                <span class="badge bg-info text-dark me-2">Course: CSE | Sem: 3 | Exam: Final</span>
                <span class="badge bg-warning text-dark"><i class="fas fa-clock me-1"></i>Results not submitted yet</span>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-bordered mb-0 align-middle" id="resultsTable">
                    <thead class="table-light text-center">
                        <tr>
                            <th width="10%">Roll No</th>
                            <th width="25%">Student Name</th>
                            <th width="15%">Marks Obtained</th>
                            <th width="10%">Max Marks</th>
                            <th width="15%">Grade</th>
                            <th width="15%">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Mock Row 1 -->
                        <tr>
                            <td class="text-center fw-bold">101</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-light rounded-circle text-secondary d-flex justify-content-center align-items-center me-2" style="width: 35px; height: 35px;">
                                        <i class="fas fa-user-graduate"></i>
                                    </div>
                                    <span>John Doe</span>
                                </div>
                            </td>
                            <td>
                                <input type="number" class="form-control text-center marks-input" placeholder="0" min="0" max="100">
                            </td>
                            <td class="text-center max-marks">100</td>
                            <td>
                                <select class="form-select form-select-sm grade-select">
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
                                <select class="form-select form-select-sm status-select">
                                    <option value="Pass" class="text-success fw-bold">Pass</option>
                                    <option value="Fail" class="text-danger fw-bold">Fail</option>
                                    <option value="Absent" class="text-warning fw-bold">Absent</option>
                                </select>
                            </td>
                        </tr>

                        <!-- Mock Row 2 -->
                        <tr>
                            <td class="text-center fw-bold">102</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-light rounded-circle text-secondary d-flex justify-content-center align-items-center me-2" style="width: 35px; height: 35px;">
                                        <i class="fas fa-user-graduate"></i>
                                    </div>
                                    <span>Jane Smith</span>
                                </div>
                            </td>
                            <td>
                                <input type="number" class="form-control text-center marks-input" placeholder="0" min="0" max="100">
                            </td>
                            <td class="text-center max-marks">100</td>
                            <td>
                                <select class="form-select form-select-sm grade-select">
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
                                <select class="form-select form-select-sm status-select">
                                    <option value="Pass" class="text-success fw-bold">Pass</option>
                                    <option value="Fail" class="text-danger fw-bold">Fail</option>
                                    <option value="Absent" class="text-warning fw-bold">Absent</option>
                                </select>
                            </td>
                        </tr>

                         <!-- Mock Row 3 -->
                         <tr>
                            <td class="text-center fw-bold">103</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-light rounded-circle text-secondary d-flex justify-content-center align-items-center me-2" style="width: 35px; height: 35px;">
                                        <i class="fas fa-user-graduate"></i>
                                    </div>
                                    <span>Robert Brown</span>
                                </div>
                            </td>
                            <td>
                                <input type="number" class="form-control text-center marks-input" placeholder="0" min="0" max="100">
                            </td>
                            <td class="text-center max-marks">100</td>
                            <td>
                                <select class="form-select form-select-sm grade-select">
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
                                <select class="form-select form-select-sm status-select">
                                    <option value="Pass" class="text-success fw-bold">Pass</option>
                                    <option value="Fail" class="text-danger fw-bold">Fail</option>
                                    <option value="Absent" class="text-warning fw-bold">Absent</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-light p-3 d-flex justify-content-between align-items-center">
            <div class="text-muted small">
                <i class="fas fa-info-circle me-1"></i> Grades and status are auto-calculated based on marks but can be adjusted manually.
            </div>
            <div>
                <button class="btn btn-secondary me-2">Cancel</button>
                <button class="btn btn-success px-4"><i class="fas fa-save me-2"></i>Submit Results</button>
            </div>
        </div>
    </div>
</div>

<style>
    .marks-input {
        max-width: 100px;
        margin: 0 auto;
    }
    .table th {
        vertical-align: middle;
        font-weight: 600;
        background-color: #f8f9fa;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const marksInputs = document.querySelectorAll('.marks-input');

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
                statusSelect.value = "Pass"; // Default or reset
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

            // Auto-select values in dropdowns
            gradeSelect.value = grade;
            statusSelect.value = status;
        });
    });
});
</script>

<?php include '../includes/footer.php'; ?>