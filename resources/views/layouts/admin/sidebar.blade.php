<!-- DropX Admin Sidebar -->
<!-- Mobile Backdrop -->
<div id="sidebar-backdrop" onclick="toggleMobileSidebar()" class="fixed inset-0 z-40 bg-gray-900/50 backdrop-blur-sm lg:hidden hidden transition-opacity"></div>

<aside id="dropx-sidebar" class="fixed inset-y-0 left-0 z-50 flex w-64 flex-col border-r border-border bg-sidebar transition-transform duration-200 lg:static lg:translate-x-0 -translate-x-full">
  <!-- Brand Header -->
  <div class="flex h-[68px] items-center justify-between border-b border-border px-5">
    <a href="{{ route('dashboard') }}" class="flex items-center gap-2.5">
      <img src="{{ asset('assets-admin/brand/datadropx-icon-color.png') }}" alt="DropX" class="h-8 w-auto">
      <div class="flex flex-col">
        <span class="text-base font-bold tracking-tight text-gray-900">DropX <span class="text-primary font-extrabold">Admin</span></span>
        <span class="text-[10px] uppercase font-semibold text-muted-foreground tracking-wider">Sistem Printing</span>
      </div>
    </a>
    <button onclick="toggleMobileSidebar()" class="p-1 rounded-md text-gray-400 hover:text-gray-600 hover:bg-gray-100 lg:hidden">
      <i data-lucide="x" class="h-5 w-5"></i>
    </button>
  </div>

  <!-- Navigation Menu -->
  <div class="flex-1 overflow-y-auto px-3 py-4 space-y-6">
    <!-- Group: Main -->
    <div>
      <p class="px-3 text-2xs font-bold uppercase tracking-wider text-muted-foreground mb-2">Main Menu</p>
      <nav class="space-y-1">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 rounded-lg px-3 py-2 text-[13px] font-semibold transition-colors bg-primary/10 text-primary">
          <i data-lucide="layout-dashboard" class="h-4 w-4"></i>
          <span class="flex-1">Dashboard</span>
          <span class="rounded bg-primary/20 px-1.5 py-0.5 text-2xs font-bold text-primary">v1.0</span>
        </a>

        <a href="{{ route('pelanggan.index') }}" class="flex items-center gap-3 rounded-lg px-3 py-2 text-[13px] font-medium text-sidebar-foreground hover:bg-sidebar-accent hover:text-gray-900 transition-colors">
          <i data-lucide="users" class="h-4 w-4 text-muted-foreground"></i>
          <span class="flex-1">Data Pelanggan</span>
        </a>

        <a href="{{ route('user.index') }}" class="flex items-center gap-3 rounded-lg px-3 py-2 text-[13px] font-medium text-sidebar-foreground hover:bg-sidebar-accent hover:text-gray-900 transition-colors">
          <i data-lucide="shield-check" class="h-4 w-4 text-muted-foreground"></i>
          <span class="flex-1">Data User</span>
        </a>
      </nav>
    </div>

    <!-- Group: Management -->
    <div>
      <p class="px-3 text-2xs font-bold uppercase tracking-wider text-muted-foreground mb-2">Printing Management</p>
      <nav class="space-y-1">
        <a href="{{ url('lembar/admin/orders') }}" class="flex items-center gap-3 rounded-lg px-3 py-2 text-[13px] font-medium text-sidebar-foreground hover:bg-sidebar-accent hover:text-gray-900 transition-colors">
          <i data-lucide="printer" class="h-4 w-4 text-muted-foreground"></i>
          <span class="flex-1">Pesanan Cetak</span>
          <span class="rounded-full bg-emerald-500/10 px-2 py-0.5 text-2xs font-medium text-emerald-600">8 Baru</span>
        </a>

        <a href="{{ url('lembar/admin/payments') }}" class="flex items-center gap-3 rounded-lg px-3 py-2 text-[13px] font-medium text-sidebar-foreground hover:bg-sidebar-accent hover:text-gray-900 transition-colors">
          <i data-lucide="credit-card" class="h-4 w-4 text-muted-foreground"></i>
          <span class="flex-1">Transaksi & Bayar</span>
        </a>

        <a href="{{ url('lembar/admin/complaints') }}" class="flex items-center gap-3 rounded-lg px-3 py-2 text-[13px] font-medium text-sidebar-foreground hover:bg-sidebar-accent hover:text-gray-900 transition-colors">
          <i data-lucide="help-circle" class="h-4 w-4 text-muted-foreground"></i>
          <span class="flex-1">Pusat Bantuan / Tiket</span>
        </a>
      </nav>
    </div>

    <!-- Group: Pages & System -->
    <div>
      <p class="px-3 text-2xs font-bold uppercase tracking-wider text-muted-foreground mb-2">System & Setting</p>
      <nav class="space-y-1">
        <a href="{{ route('home') }}" class="flex items-center gap-3 rounded-lg px-3 py-2 text-[13px] font-medium text-sidebar-foreground hover:bg-sidebar-accent hover:text-gray-900 transition-colors">
          <i data-lucide="external-link" class="h-4 w-4 text-muted-foreground"></i>
          <span class="flex-1">Lihat Website Home</span>
        </a>

        <a href="#" class="flex items-center gap-3 rounded-lg px-3 py-2 text-[13px] font-medium text-sidebar-foreground hover:bg-sidebar-accent hover:text-gray-900 transition-colors">
          <i data-lucide="settings" class="h-4 w-4 text-muted-foreground"></i>
          <span class="flex-1">Pengaturan Sistem</span>
        </a>
      </nav>
    </div>
  </div>

  <!-- User Card Bottom -->
  <div class="border-t border-border p-3">
    <div class="flex items-center gap-3 rounded-lg bg-gray-50 p-2.5">
      <img src="{{ asset('assets-admin/images/avatars/avatar-1.svg') }}" alt="Avatar" class="h-9 w-9 rounded-full bg-primary/10 border border-primary/20">
      <div class="flex-1 min-w-0">
        <p class="text-xs font-semibold text-gray-900 truncate">Harun Al Rasyid</p>
        <p class="text-2xs text-muted-foreground truncate">harun25ti@pcr.ac.id</p>
      </div>
      <span class="h-2 w-2 rounded-full bg-emerald-500" title="Online"></span>
    </div>
  </div>
</aside>
