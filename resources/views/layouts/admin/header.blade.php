<!-- DropX Admin Header -->
<header class="sticky top-0 z-30 flex h-[68px] items-center justify-between border-b border-[#e4e9e3] bg-[#fbfcf9]/95 px-4 lg:px-6 backdrop-blur supports-[backdrop-filter]:bg-[#fbfcf9]/80">
  <div class="flex items-center gap-3">
    <!-- Hamburger button for mobile -->
    <button onclick="toggleMobileSidebar()" class="flex h-9 w-9 items-center justify-center rounded-lg border border-[#e4e9e3] bg-white text-gray-500 shadow-sm transition hover:border-[#235b48] hover:text-[#235b48] lg:hidden" aria-label="Toggle sidebar">
      <i data-lucide="menu" class="h-5 w-5"></i>
    </button>

    <!-- Search Bar -->
    <div class="relative hidden sm:block w-64 md:w-80">
      <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-[#7f8a83]">
        <i data-lucide="search" class="h-4 w-4"></i>
      </div>
      <input type="text" placeholder="Cari mitra atau pesanan... (Ctrl+K)" class="w-full rounded-lg border border-[#e4e9e3] bg-white py-1.5 pl-9 pr-3 text-xs placeholder-[#9ba49d] focus:border-[#235b48] focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#235b48] transition-all">
    </div>
  </div>

  <!-- Header Right Actions -->
  <div class="flex items-center gap-2 sm:gap-3">
    <!-- Notifications Button -->
    <button class="relative flex h-9 w-9 items-center justify-center rounded-lg border border-[#e4e9e3] bg-white text-gray-500 shadow-sm transition hover:border-[#235b48] hover:text-[#235b48]" title="Notifikasi">
      <i data-lucide="bell" class="h-4 w-4"></i>
      <span class="absolute top-1.5 right-1.5 h-2 w-2 rounded-full bg-[#e8a36c]"></span>
    </button>

    <!-- View Site Link -->
    <a href="{{ route('home') }}" class="hidden sm:flex h-9 items-center gap-1.5 rounded-lg border border-[#e4e9e3] bg-white px-3 text-xs font-medium text-gray-600 shadow-sm transition hover:border-[#235b48] hover:text-[#235b48]">
      <i data-lucide="globe" class="h-3.5 w-3.5"></i>
      <span>Web Home</span>
    </a>

    <!-- Divider -->
    <div class="h-6 w-px bg-[#e4e9e3] mx-1"></div>

    <!-- User Profile Dropdown / Card -->
    @auth
      <div class="flex items-center gap-2.5 pl-1">
        <div class="h-8 w-8 rounded-full bg-[#dfe9dc] text-[#194333] font-bold text-xs flex items-center justify-center flex-shrink-0">
          {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
        </div>
        <div class="hidden sm:block text-left">
          <p class="text-xs font-semibold text-gray-900 leading-none">{{ Auth::user()->name }}</p>
          <span class="text-[10px] text-muted-foreground font-medium">{{ Auth::user()->role_label }}</span>
          @if(session('last_login'))
            <span class="block text-[10px] text-[#7f8a83]">Login: {{ \Carbon\Carbon::parse(session('last_login'))->format('d M Y H:i') }}</span>
          @endif
        </div>
      </div>
    @else
      <div class="flex items-center gap-2">
        <a href="{{ route('login') }}" class="h-8 px-3 rounded-lg bg-[#235b48] text-white text-xs font-semibold flex items-center gap-1.5 hover:bg-[#194333] transition-colors shadow-sm">
          <i data-lucide="log-in" class="h-3.5 w-3.5"></i> Masuk
        </a>
      </div>
    @endauth
  </div>
</header>
