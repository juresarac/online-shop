<footer class="bg-dark text-white py-3" style="margin-top: 200px">
    <div class="container text-center">
        <p>&copy; 2023 Online shop</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const toggleBtn = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');

    toggleBtn.addEventListener('click', () => {
    sidebar.classList.toggle('open');
});
</script>
</body>
</html>