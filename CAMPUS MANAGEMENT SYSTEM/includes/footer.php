<footer class="main-footer">
<div class="footer-content text-center py-3">
<p class="mb-0">&copy; <?php echo date("Y"); ?> Campus Management System
. All Rights Reserved.</p>
</div>
</footer>

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