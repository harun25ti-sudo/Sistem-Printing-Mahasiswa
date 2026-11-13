<!-- Lucide Icons -->
<script src="https://unpkg.com/lucide@latest"></script>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  // Initialize Lucide Icons
  document.addEventListener('DOMContentLoaded', function () {
    if (window.lucide) {
      lucide.createIcons();
    }
  });

  // Mobile sidebar toggle handler
  function toggleMobileSidebar() {
    const sidebar = document.getElementById('dropx-sidebar');
    const backdrop = document.getElementById('sidebar-backdrop');
    if (sidebar) {
      sidebar.classList.toggle('-translate-x-full');
    }
    if (backdrop) {
      backdrop.classList.toggle('hidden');
    }
  }
</script>
