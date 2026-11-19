<!-- DropX / Lembar Admin Sidebar -->
<!-- Mobile Backdrop -->
<div id="sidebar-backdrop" onclick="toggleMobileSidebar()" class="fixed inset-0 z-40 bg-gray-900/50 backdrop-blur-sm lg:hidden hidden transition-opacity"></div>

<aside id="dropx-sidebar" class="fixed inset-y-0 left-0 z-50 flex w-[252px] flex-col border-r border-[#e4e9e3] bg-[#fbfcf9] transition-transform duration-200 lg:static lg:translate-x-0 -translate-x-full">
  <!-- Brand Header -->
  <div class="flex h-[72px] items-center justify-between border-b border-[#e4e9e3] px-5">
    <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
      <div class="h-9 w-9 rounded-[11px] bg-[#235b48] flex items-center justify-center text-white flex-shrink-0 shadow-sm">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
          <path d="M7 8V3h10v5M7 17H5a2 2 0 0 1-2-2v-4a3 3 0 0 1 3-3h12a3 3 0 0 1 3 3v4a2 2 0 0 1-2 2h-2"/>
          <path d="M7 14h10v7H7zM17 11h.01"/>
        </svg>
      </div>
      <div class="flex flex-col">
        <span class="text-[19px] font-extrabold tracking-tight text-[#17231f] leading-none">lembar<span class="text-[#235b48]">.</span></span>
        <span class="text-[11px] font-medium text-[#7f8a83] mt-0.5">layanan cetak kampus</span>
      </div>
    </a>
    <button onclick="toggleMobileSidebar()" class="p-1 rounded-md text-[#7f8a83] hover:text-[#17231f] hover:bg-[#f0f3ef] lg:hidden">
      <i data-lucide="x" class="h-5 w-5"></i>
    </button>
  </div>

  <!-- Navigation Menu -->
  <div class="flex-1 overflow-y-auto px-4 py-5 flex flex-col justify-between">
    <div>
      <!-- Section Label -->
      <div class="text-[11px] font-medium text-[#909a93] px-3 pb-2.5">
        Menu admin
      </div>

      <!-- Menu Items -->
      <nav class="space-y-1">
        <!-- 1. Dashboard -->
        <a href="{{ route('dashboard') }}"
           class="flex items-center gap-3 rounded-[11px] px-3 py-2.5 text-[13px] font-semibold transition-all duration-150
                  {{ request()->routeIs('dashboard') ? 'bg-[#e6f0e9] text-[#194333]' : 'text-[#65716a] hover:bg-[#f0f3ef] hover:text-[#17231f]' }}">
          <svg class="h-[18px] w-[18px] flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <rect x="3" y="3" width="7" height="7" rx="1.5"/>
            <rect x="14" y="3" width="7" height="7" rx="1.5"/>
            <rect x="14" y="14" width="7" height="7" rx="1.5"/>
            <rect x="3" y="14" width="7" height="7" rx="1.5"/>
          </svg>
          <span class="flex-1">Dashboard</span>
        </a>

        <!-- 2. Verifikasi Akun (Mitra & Kurir) -->
        @php
          $pendingCount = \App\Models\User::whereIn('role', ['mitra', 'kurir', 'admin'])->where('status', 'pending')->count();
        @endphp
        <a href="{{ route('admin.verification.index') }}"
           class="flex items-center gap-3 rounded-[11px] px-3 py-2.5 text-[13px] font-semibold transition-all duration-150
                  {{ request()->routeIs('admin.verification.*') ? 'bg-[#e6f0e9] text-[#194333]' : 'text-[#65716a] hover:bg-[#f0f3ef] hover:text-[#17231f]' }}">
          <svg class="h-[18px] w-[18px] flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
            <circle cx="9" cy="7" r="4"/>
            <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
          </svg>
          <span class="flex-1">Verifikasi akun</span>
          @if($pendingCount > 0)
            <span class="min-w-[22px] px-1.5 py-0.5 rounded-full bg-[#edf0eb] text-[#5d6b62] text-[10px] font-bold text-center">
              {{ $pendingCount }}
            </span>
          @endif
        </a>

        <!-- 3. Semua pesanan -->
        <a href="{{ url('lembar/admin/orders') }}"
           class="flex items-center gap-3 rounded-[11px] px-3 py-2.5 text-[13px] font-semibold transition-all duration-150
                  {{ request()->is('lembar/admin/orders*') ? 'bg-[#e6f0e9] text-[#194333]' : 'text-[#65716a] hover:bg-[#f0f3ef] hover:text-[#17231f]' }}">
          <svg class="h-[18px] w-[18px] flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
            <polyline points="14 2 14 8 20 8"/>
            <line x1="16" y1="13" x2="8" y2="13"/>
            <line x1="16" y1="17" x2="8" y2="17"/>
            <polyline points="10 9 9 9 8 9"/>
          </svg>
          <span class="flex-1">Semua pesanan</span>
        </a>

        <!-- 4. Pembayaran -->
        <a href="{{ url('lembar/admin/payments') }}"
           class="flex items-center gap-3 rounded-[11px] px-3 py-2.5 text-[13px] font-semibold transition-all duration-150
                  {{ request()->is('lembar/admin/payments*') ? 'bg-[#e6f0e9] text-[#194333]' : 'text-[#65716a] hover:bg-[#f0f3ef] hover:text-[#17231f]' }}">
          <svg class="h-[18px] w-[18px] flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <rect x="2" y="5" width="20" height="14" rx="2"/>
            <line x1="2" y1="10" x2="22" y2="10"/>
          </svg>
          <span class="flex-1">Pembayaran</span>
          <span class="min-w-[22px] px-1.5 py-0.5 rounded-full bg-[#edf0eb] text-[#5d6b62] text-[10px] font-bold text-center">
            1
          </span>
        </a>

        <!-- 5. Pengaduan -->
        <a href="{{ url('lembar/admin/complaints') }}"
           class="flex items-center gap-3 rounded-[11px] px-3 py-2.5 text-[13px] font-semibold transition-all duration-150
                  {{ request()->is('lembar/admin/complaints*') ? 'bg-[#e6f0e9] text-[#194333]' : 'text-[#65716a] hover:bg-[#f0f3ef] hover:text-[#17231f]' }}">
          <svg class="h-[18px] w-[18px] flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/>
            <line x1="12" y1="9" x2="12" y2="13"/>
            <line x1="12" y1="17" x2="12.01" y2="17"/>
          </svg>
          <span class="flex-1">Pengaduan</span>
        </a>
      </nav>

      <!-- Sub Group: Master Data Pengguna -->
      <div class="mt-6 pt-4 border-t border-[#e4e9e3]">
        <div class="text-[11px] font-medium text-[#909a93] px-3 pb-2">
          Master Data
        </div>
        <nav class="space-y-1">
          <!-- Pelanggan -->
          <a href="{{ route('pelanggan.index') }}"
             class="flex items-center gap-3 rounded-[11px] px-3 py-2 text-[12.5px] font-medium transition-all duration-150
                    {{ request()->routeIs('pelanggan.*') ? 'bg-[#e6f0e9] text-[#194333] font-semibold' : 'text-[#65716a] hover:bg-[#f0f3ef] hover:text-[#17231f]' }}">
            <i data-lucide="user" class="h-4 w-4"></i>
            <span class="flex-1">Data Pelanggan</span>
          </a>

          <!-- Mitra -->
          <a href="{{ route('mitra.index') }}"
             class="flex items-center gap-3 rounded-[11px] px-3 py-2 text-[12.5px] font-medium transition-all duration-150
                    {{ request()->routeIs('mitra.*') ? 'bg-[#e6f0e9] text-[#194333] font-semibold' : 'text-[#65716a] hover:bg-[#f0f3ef] hover:text-[#17231f]' }}">
            <i data-lucide="store" class="h-4 w-4"></i>
            <span class="flex-1">Data Mitra</span>
          </a>

          <!-- Kurir -->
          <a href="{{ route('kurir.index') }}"
             class="flex items-center gap-3 rounded-[11px] px-3 py-2 text-[12.5px] font-medium transition-all duration-150
                    {{ request()->routeIs('kurir.*') ? 'bg-[#e6f0e9] text-[#194333] font-semibold' : 'text-[#65716a] hover:bg-[#f0f3ef] hover:text-[#17231f]' }}">
            <i data-lucide="truck" class="h-4 w-4"></i>
            <span class="flex-1">Data Kurir</span>
          </a>

          <!-- User / Ganti Role -->
          <a href="{{ route('user.index') }}"
             class="flex items-center gap-3 rounded-[11px] px-3 py-2 text-[12.5px] font-medium transition-all duration-150
                    {{ request()->routeIs('user.*') ? 'bg-[#e6f0e9] text-[#194333] font-semibold' : 'text-[#65716a] hover:bg-[#f0f3ef] hover:text-[#17231f]' }}">
            <i data-lucide="shield-check" class="h-4 w-4"></i>
            <span class="flex-1">Data User</span>
          </a>
        </nav>
      </div>
    </div>

    <!-- User Mini di Bagian Bawah + Fitur LOGOUT -->
    <div class="pt-4 border-t border-[#e4e9e3]">
      @auth
        <div class="flex items-center justify-between gap-2 px-1">
          <div class="flex items-center gap-2.5 min-w-0">
            <div class="h-[34px] w-[34px] rounded-full bg-[#dfe9dc] text-[#194333] font-bold text-xs flex items-center justify-center flex-shrink-0">
              {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
            </div>
            <div class="min-w-0">
              <strong class="block text-xs font-bold text-[#17231f] truncate leading-tight">{{ Auth::user()->name }}</strong>
              <small class="block text-[10px] text-[#7f8a83] truncate mt-0.5">{{ Auth::user()->role_label }}</small>
            </div>
          </div>

          <!-- Tombol Logout -->
          <form action="{{ route('logout') }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin keluar (Log out)?')">
            @csrf
            <button type="submit" class="p-1.5 rounded-lg border border-[#e4e9e3] text-gray-400 hover:text-red-600 hover:bg-red-50 hover:border-red-200 transition-colors" title="Log Out">
              <i data-lucide="log-out" class="h-4 w-4"></i>
            </button>
          </form>
        </div>
      @else
        <div class="flex items-center justify-between gap-2 px-1">
          <div class="flex items-center gap-2.5 min-w-0">
            <div class="h-[34px] w-[34px] rounded-full bg-[#dfe9dc] text-[#194333] font-bold text-xs flex items-center justify-center flex-shrink-0">
              AD
            </div>
            <div class="min-w-0">
              <strong class="block text-xs font-bold text-[#17231f] truncate leading-tight">Admin Lembar</strong>
              <small class="block text-[10px] text-[#7f8a83] truncate mt-0.5">Mode Tamu / Demo</small>
            </div>
          </div>

          <!-- Link Login -->
          <a href="{{ route('login') }}" class="p-1.5 rounded-lg border border-[#e4e9e3] text-gray-500 hover:text-[#235b48] hover:bg-[#e6f0e9] transition-colors" title="Masuk Akun">
            <i data-lucide="log-in" class="h-4 w-4"></i>
          </a>
        </div>
      @endauth
    </div>
  </div>
</aside>
