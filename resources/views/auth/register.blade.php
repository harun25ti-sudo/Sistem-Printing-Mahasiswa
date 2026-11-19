<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Akun — Lembar Sistem Printing</title>
  <link rel="icon" type="image/png" href="{{ asset('assets-admin/brand/datadropx-icon-color.png') }}">

  <!-- Google Fonts: Inter -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Lucide Icons -->
  <script src="https://unpkg.com/lucide@latest"></script>

  <style>
    :root {
      --canvas: #f4f5f1;
      --brand: #235b48;
      --brand-dark: #194333;
      --brand-soft: #e6f0e9;
      --ink: #17231f;
      --line: #e4e9e3;
    }
    body {
      font-family: 'Inter', sans-serif;
      background: var(--canvas);
      color: var(--ink);
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 py-8 antialiased">

  <div class="w-full max-w-lg">
    <!-- Brand Logo & Header -->
    <div class="text-center mb-6">
      <a href="{{ route('home') }}" class="inline-flex items-center gap-2.5 mb-2">
        <div class="h-10 w-10 rounded-xl bg-[#235b48] flex items-center justify-center text-white shadow-sm">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <path d="M7 8V3h10v5M7 17H5a2 2 0 0 1-2-2v-4a3 3 0 0 1 3-3h12a3 3 0 0 1 3 3v4a2 2 0 0 1-2 2h-2"/>
            <path d="M7 14h10v7H7zM17 11h.01"/>
          </svg>
        </div>
        <span class="text-2xl font-black tracking-tight text-[#17231f]">lembar<span class="text-[#235b48]">.</span></span>
      </a>
      <h1 class="text-xl font-bold tracking-tight text-[#17231f]">Buat Akun Baru</h1>
      <p class="text-xs text-[#7f8a83] mt-0.5">Pilih peran akun Anda untuk bergabung ke dalam platform</p>
    </div>

    <!-- Alert Messages -->
    @if($errors->any())
    <div class="mb-4 rounded-xl border border-red-200 bg-red-50 p-4 text-xs text-red-700">
      <strong class="font-semibold block mb-1">Gagal mendaftar:</strong>
      <ul class="list-disc list-inside space-y-0.5">
        @foreach($errors->all() as $err)
          <li>{{ $err }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <!-- Card Box -->
    <div class="rounded-2xl border border-[#e4e9e3] bg-white p-7 shadow-sm">
      <form action="{{ route('register.post') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Pilihan Role (Card Selector) -->
        <div>
          <label class="block text-xs font-semibold text-[#52605a] mb-2">Pilih Peran Akun <span class="text-red-500">*</span></label>
          <div class="grid grid-cols-2 gap-2.5">
            <!-- Pelanggan (Tanpa Verifikasi) -->
            <label class="relative flex flex-col p-3 rounded-xl border-2 cursor-pointer transition-all border-[#235b48] bg-[#e6f0e9]/40" id="label-pelanggan">
              <input type="radio" name="role" value="pelanggan" checked class="sr-only" onchange="updateRoleDesc('pelanggan')">
              <div class="flex items-center gap-2 mb-1">
                <i data-lucide="user" class="h-4 w-4 text-[#235b48]"></i>
                <strong class="text-xs font-bold text-[#17231f]">Pelanggan</strong>
              </div>
              <span class="text-[10px] text-[#235b48] font-medium">Langsung aktif (Tanpa verifikasi)</span>
            </label>

            <!-- Mitra Printing -->
            <label class="relative flex flex-col p-3 rounded-xl border-2 cursor-pointer transition-all border-[#e4e9e3] bg-white hover:border-gray-300" id="label-mitra">
              <input type="radio" name="role" value="mitra" class="sr-only" onchange="updateRoleDesc('mitra')">
              <div class="flex items-center gap-2 mb-1">
                <i data-lucide="store" class="h-4 w-4 text-green-600"></i>
                <strong class="text-xs font-bold text-[#17231f]">Mitra Printing</strong>
              </div>
              <span class="text-[10px] text-amber-600 font-medium">Perlu verifikasi Admin</span>
            </label>

            <!-- Kurir -->
            <label class="relative flex flex-col p-3 rounded-xl border-2 cursor-pointer transition-all border-[#e4e9e3] bg-white hover:border-gray-300" id="label-kurir">
              <input type="radio" name="role" value="kurir" class="sr-only" onchange="updateRoleDesc('kurir')">
              <div class="flex items-center gap-2 mb-1">
                <i data-lucide="truck" class="h-4 w-4 text-orange-500"></i>
                <strong class="text-xs font-bold text-[#17231f]">Kurir Pengantar</strong>
              </div>
              <span class="text-[10px] text-amber-600 font-medium">Perlu verifikasi Admin</span>
            </label>

            <!-- Admin -->
            <label class="relative flex flex-col p-3 rounded-xl border-2 cursor-pointer transition-all border-[#e4e9e3] bg-white hover:border-gray-300" id="label-admin">
              <input type="radio" name="role" value="admin" class="sr-only" onchange="updateRoleDesc('admin')">
              <div class="flex items-center gap-2 mb-1">
                <i data-lucide="shield" class="h-4 w-4 text-purple-600"></i>
                <strong class="text-xs font-bold text-[#17231f]">Admin Tambahan</strong>
              </div>
              <span class="text-[10px] text-amber-600 font-medium">Perlu verifikasi Admin</span>
            </label>
          </div>
        </div>

        <!-- Info Card Dynamic -->
        <div id="role-info-card" class="p-3 rounded-xl bg-blue-50 border border-blue-200 text-xs text-blue-900 flex items-start gap-2">
          <i data-lucide="info" class="h-4 w-4 text-blue-600 flex-shrink-0 mt-0.5"></i>
          <span id="role-info-text">Akun <strong>Pelanggan</strong> dapat langsung digunakan untuk memesan cetakan setelah pendaftaran tanpa perlu menunggu persetujuan admin.</span>
        </div>

        <!-- Form Fields -->
        <div>
          <label for="name" class="block text-xs font-semibold text-[#52605a] mb-1.5">Nama Lengkap / Nama Toko <span class="text-red-500">*</span></label>
          <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
              <i data-lucide="user" class="h-4 w-4"></i>
            </span>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                   placeholder="Masukkan nama lengkap"
                   class="w-full rounded-xl border border-[#e4e9e3] bg-white py-2.5 pl-9 pr-3 text-xs text-gray-900 focus:border-[#235b48] focus:outline-none focus:ring-1 focus:ring-[#235b48] transition-all">
          </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
          <div>
            <label for="email" class="block text-xs font-semibold text-[#52605a] mb-1.5">Email <span class="text-red-500">*</span></label>
            <div class="relative">
              <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                <i data-lucide="mail" class="h-4 w-4"></i>
              </span>
              <input type="email" id="email" name="email" value="{{ old('email') }}" required
                     placeholder="nama@email.com"
                     class="w-full rounded-xl border border-[#e4e9e3] bg-white py-2.5 pl-9 pr-3 text-xs text-gray-900 focus:border-[#235b48] focus:outline-none focus:ring-1 focus:ring-[#235b48] transition-all">
            </div>
          </div>

          <div>
            <label for="phone" class="block text-xs font-semibold text-[#52605a] mb-1.5">No. Telepon / WhatsApp</label>
            <div class="relative">
              <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                <i data-lucide="phone" class="h-4 w-4"></i>
              </span>
              <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                     placeholder="08xxxxxxxxxx"
                     class="w-full rounded-xl border border-[#e4e9e3] bg-white py-2.5 pl-9 pr-3 text-xs text-gray-900 focus:border-[#235b48] focus:outline-none focus:ring-1 focus:ring-[#235b48] transition-all">
            </div>
          </div>
        </div>

        <div>
          <label for="alamat" class="block text-xs font-semibold text-[#52605a] mb-1.5">Alamat Lengkap</label>
          <textarea id="alamat" name="alamat" rows="2"
                    placeholder="Nama jalan, gedung, nomor, kecamatan..."
                    class="w-full rounded-xl border border-[#e4e9e3] bg-white p-3 text-xs text-gray-900 focus:border-[#235b48] focus:outline-none focus:ring-1 focus:ring-[#235b48] transition-all resize-none">{{ old('alamat') }}</textarea>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
          <div>
            <label for="password" class="block text-xs font-semibold text-[#52605a] mb-1.5">Password <span class="text-red-500">*</span></label>
            <div class="relative">
              <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                <i data-lucide="lock" class="h-4 w-4"></i>
              </span>
              <input type="password" id="password" name="password" required minlength="8"
                     placeholder="Min. 8 karakter"
                     class="w-full rounded-xl border border-[#e4e9e3] bg-white py-2.5 pl-9 pr-3 text-xs text-gray-900 focus:border-[#235b48] focus:outline-none focus:ring-1 focus:ring-[#235b48] transition-all">
            </div>
          </div>

          <div>
            <label for="password_confirmation" class="block text-xs font-semibold text-[#52605a] mb-1.5">Konfirmasi Password <span class="text-red-500">*</span></label>
            <div class="relative">
              <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                <i data-lucide="shield-check" class="h-4 w-4"></i>
              </span>
              <input type="password" id="password_confirmation" name="password_confirmation" required minlength="8"
                     placeholder="Ulangi password"
                     class="w-full rounded-xl border border-[#e4e9e3] bg-white py-2.5 pl-9 pr-3 text-xs text-gray-900 focus:border-[#235b48] focus:outline-none focus:ring-1 focus:ring-[#235b48] transition-all">
            </div>
          </div>
        </div>

        <button type="submit"
                class="w-full mt-2 rounded-xl bg-[#235b48] py-2.5 px-4 text-xs font-bold text-white shadow-sm hover:bg-[#194333] transition-all flex items-center justify-center gap-2">
          <span>Daftar Sekarang</span>
          <i data-lucide="arrow-right" class="h-4 w-4"></i>
        </button>
      </form>
    </div>

    <!-- Login Link -->
    <div class="text-center mt-5">
      <p class="text-xs text-[#7f8a83]">
        Sudah memiliki akun?
        <a href="{{ route('login') }}" class="font-bold text-[#235b48] hover:underline">Masuk di sini</a>
      </p>
    </div>
  </div>

  <script>
    lucide.createIcons();

    function updateRoleDesc(role) {
      const labels = ['pelanggan', 'mitra', 'kurir', 'admin'];
      labels.forEach(l => {
        const el = document.getElementById('label-' + l);
        if (l === role) {
          el.classList.add('border-[#235b48]', 'bg-[#e6f0e9]/40');
          el.classList.remove('border-[#e4e9e3]', 'bg-white');
        } else {
          el.classList.remove('border-[#235b48]', 'bg-[#e6f0e9]/40');
          el.classList.add('border-[#e4e9e3]', 'bg-white');
        }
      });

      const card = document.getElementById('role-info-card');
      const text = document.getElementById('role-info-text');

      if (role === 'pelanggan') {
        card.className = "p-3 rounded-xl bg-blue-50 border border-blue-200 text-xs text-blue-900 flex items-start gap-2";
        text.innerHTML = "Akun <strong>Pelanggan</strong> langsung aktif otomatis tanpa perlu verifikasi dari Administrator.";
      } else if (role === 'mitra') {
        card.className = "p-3 rounded-xl bg-amber-50 border border-amber-200 text-xs text-amber-900 flex items-start gap-2";
        text.innerHTML = "Akun <strong>Mitra Printing</strong> akan berstatus pending dan memerlukan konfirmasi Administrator pada tab <strong>Verifikasi Akun</strong> sebelum dapat membuka layanan toko.";
      } else if (role === 'kurir') {
        card.className = "p-3 rounded-xl bg-amber-50 border border-amber-200 text-xs text-amber-900 flex items-start gap-2";
        text.innerHTML = "Akun <strong>Kurir</strong> akan berstatus pending dan memerlukan konfirmasi Administrator pada tab <strong>Verifikasi Akun</strong> sebelum dapat menerima tugas pengantaran.";
      } else {
        card.className = "p-3 rounded-xl bg-purple-50 border border-purple-200 text-xs text-purple-900 flex items-start gap-2";
        text.innerHTML = "Akun <strong>Administrator</strong> baru memerlukan konfirmasi dari Admin utama pada tab <strong>Verifikasi Akun</strong>.";
      }
    }
  </script>
</body>
</html>
