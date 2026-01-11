<style>
    /* Footer Styling to match Sidebar/Header Theme */
    .main-footer {
        background: linear-gradient(to right, #4e73df, #224abe); /* Matches Header/Sidebar */
        color: white;
        box-shadow: 0 -4px 15px rgba(0,0,0,0.1);
        margin-top: auto; /* Pushes footer to bottom in flex container */
    }
</style>

<!-- Using your provided Footer Code -->
<footer class="main-footer mt-auto">
    <div class="footer-content text-center py-3">
        <p class="mb-0">&copy; <?php echo date("Y"); ?> Campus Management System. All Rights Reserved.</p>
    </div>
</footer>

</div> <!-- Closing .main-content (Opened in sidebar.php) -->

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Lucide Icons Initialization -->
<script src="https://unpkg.com/lucide@latest"></script>

<script>
    // Initialize icons for any page including this footer
    lucide.createIcons();

    // Placeholder for global handleLogout function
    function handleLogout() {
        if(confirm("Are you sure you want to logout?")) {
            window.location.href = "logout.php";
        }
    }
</script>

</body>
</html>