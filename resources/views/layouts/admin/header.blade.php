<!-- DropX Admin Header -->
<header class="sticky top-0 z-30 flex h-[68px] items-center justify-between border-b border-border bg-white/95 px-4 lg:px-6 backdrop-blur supports-[backdrop-filter]:bg-white/80">
  <div class="flex items-center gap-3">
    <!-- Hamburger button for mobile -->
    <button onclick="toggleMobileSidebar()" class="flex h-9 w-9 items-center justify-center rounded-lg border border-border bg-white text-gray-500 shadow-sm transition hover:border-primary hover:text-primary lg:hidden" aria-label="Toggle sidebar">
      <i data-lucide="menu" class="h-5 w-5"></i>
    </button>

    <!-- Search Bar -->
    <div class="relative hidden sm:block w-64 md:w-80">
      <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
        <i data-lucide="search" class="h-4 w-4"></i>
      </div>
      <input type="text" placeholder="Search orders, customers, logs... (Ctrl+K)" class="w-full rounded-lg border border-border bg-gray-50/50 py-1.5 pl-9 pr-3 text-xs placeholder-gray-400 focus:border-primary focus:bg-white focus:outline-none focus:ring-1 focus:ring-primary transition-all">
    </div>
  </div>

  <!-- Header Right Actions -->
  <div class="flex items-center gap-2 sm:gap-3">
    <!-- System Status Pill -->
    <div class="hidden md:flex items-center gap-2 rounded-full border border-emerald-200 bg-emerald-50 px-3 py-1 text-2xs font-medium text-emerald-700">
      <span class="h-1.5 w-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
      System Active (PHP 8.3)
    </div>

    <!-- Notifications Button -->
    <button class="relative flex h-9 w-9 items-center justify-center rounded-lg border border-border bg-white text-gray-500 shadow-sm transition hover:border-primary hover:text-primary" title="Notifikasi">
      <i data-lucide="bell" class="h-4 w-4"></i>
      <span class="absolute top-1.5 right-1.5 h-2 w-2 rounded-full bg-rose-500"></span>
    </button>

    <!-- View Site Link -->
    <a href="{{ route('home') }}" class="hidden sm:flex h-9 items-center gap-1.5 rounded-lg border border-border bg-white px-3 text-xs font-medium text-gray-600 shadow-sm transition hover:border-primary hover:text-primary">
      <i data-lucide="globe" class="h-3.5 w-3.5"></i>
      <span>Front Page</span>
    </a>

    <!-- Divider -->
    <div class="h-6 w-px bg-border mx-1"></div>

    <!-- User Profile Dropdown / Card -->
    <div class="flex items-center gap-2.5 pl-1">
      <img src="{{ asset('assets-admin/images/avatars/avatar-1.svg') }}" alt="Profile" class="h-9 w-9 rounded-full border border-border bg-primary/10">
      <div class="hidden sm:block text-left">
        <p class="text-xs font-semibold text-gray-900 leading-none">Harun Al Rasyid</p>
        <span class="text-2xs text-muted-foreground font-medium">Administrator</span>
      </div>
    </div>
  </div>
</header>
