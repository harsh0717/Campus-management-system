<!-- Sidebar Component Structure Only -->
<nav class="sidebar" id="sidebar">
    <div class="nav-menu">
        <a href="dashboard.php" class="nav-item active">
            <i data-lucide="layout-dashboard"></i>
            <span class="nav-label">Dashboard</span>
        </a>
        <a href="attendance.php" class="nav-item">
            <i data-lucide="calendar-check"></i>
            <span class="nav-label">Attendance</span>
        </a>
        <a href="results.php" class="nav-item">
            <i data-lucide="graduation-cap"></i>
            <span class="nav-label">Results</span>
        </a>
        
        <div class="logout-item" onclick="handleLogout()">
            <i data-lucide="log-out"></i>
            <span class="nav-label">Logout</span>
        </div>
    </div>
</nav>