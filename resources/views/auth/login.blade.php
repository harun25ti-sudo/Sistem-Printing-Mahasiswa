@extends('layouts.auth.app')

@section('title', 'Masuk — Lembar Sistem Printing')

@section('content')
  <div class="w-full max-w-md">
    <!-- Brand Logo & Header -->
    <div class="text-center mb-8">
      <a href="{{ route('home') }}" class="inline-flex items-center gap-2.5 mb-3">
        <div class="h-11 w-11 rounded-xl bg-[#235b48] flex items-center justify-center text-white shadow-sm">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <path d="M7 8V3h10v5M7 17H5a2 2 0 0 1-2-2v-4a3 3 0 0 1 3-3h12a3 3 0 0 1 3 3v4a2 2 0 0 1-2 2h-2"/>
            <path d="M7 14h10v7H7zM17 11h.01"/>
          </svg>
        </div>
        <span class="text-2xl font-black tracking-tight text-[#17231f]">lembar<span class="text-[#235b48]">.</span></span>
      </a>
      <h1 class="text-xl font-bold tracking-tight text-[#17231f]">Selamat datang kembali</h1>
      <p class="text-xs text-[#7f8a83] mt-1">Masuk ke akun Anda (Pelanggan, Mitra, Kurir, atau Admin)</p>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
    <div class="mb-4 flex items-center gap-3 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-xs text-green-800">
      <i data-lucide="check-circle" class="h-4 w-4 flex-shrink-0 text-green-600"></i>
      <span>{{ session('success') }}</span>
    </div>
    @endif

    @if(session('warning'))
    <div class="mb-4 flex items-start gap-3 rounded-xl border border-amber-200 bg-amber-50 px-4 py-3 text-xs text-amber-800">
      <i data-lucide="clock" class="h-4 w-4 flex-shrink-0 text-amber-600 mt-0.5"></i>
      <span>{{ session('warning') }}</span>
    </div>
    @endif

    @if(session('error'))
    <div class="mb-4 flex items-start gap-3 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-xs text-red-800">
      <i data-lucide="alert-circle" class="h-4 w-4 flex-shrink-0 text-red-600 mt-0.5"></i>
      <span>{{ session('error') }}</span>
    </div>
    @endif

    @if($errors->any())
    <div class="mb-4 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-xs text-red-700">
      <strong class="font-semibold block mb-1">Gagal masuk:</strong>
      <ul class="list-disc list-inside space-y-0.5">
        @foreach($errors->all() as $err)
          <li>{{ $err }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <!-- Card Box -->
    <div class="rounded-2xl border border-[#e4e9e3] bg-white p-7 shadow-sm">
      <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
        @csrf

        <div>
          <label for="email" class="block text-xs font-semibold text-[#52605a] mb-1.5">Alamat Email</label>
          <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
              <i data-lucide="mail" class="h-4 w-4"></i>
            </span>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                   placeholder="nama@email.com"
                   class="w-full rounded-xl border border-[#e4e9e3] bg-white py-2.5 pl-9 pr-3 text-xs text-gray-900 placeholder:text-gray-400 focus:border-[#235b48] focus:outline-none focus:ring-1 focus:ring-[#235b48] transition-all">
          </div>
        </div>

        <div>
          <div class="flex items-center justify-between mb-1.5">
            <label for="password" class="block text-xs font-semibold text-[#52605a]">Password</label>
            <a href="#" class="text-[11px] font-medium text-[#235b48] hover:underline">Lupa password?</a>
          </div>
          <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
              <i data-lucide="lock" class="h-4 w-4"></i>
            </span>
            <input type="password" id="password" name="password" required
                   placeholder="••••••••"
                   class="w-full rounded-xl border border-[#e4e9e3] bg-white py-2.5 pl-9 pr-3 text-xs text-gray-900 placeholder:text-gray-400 focus:border-[#235b48] focus:outline-none focus:ring-1 focus:ring-[#235b48] transition-all">
          </div>
        </div>

        <div class="flex items-center justify-between pt-1">
          <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" name="remember" class="h-3.5 w-3.5 rounded border-[#e4e9e3] text-[#235b48] focus:ring-[#235b48]">
            <span class="text-xs text-[#7f8a83]">Ingat saya</span>
          </label>
        </div>

        <button type="submit"
                class="w-full rounded-xl bg-[#235b48] py-2.5 px-4 text-xs font-bold text-white shadow-sm hover:bg-[#194333] transition-all flex items-center justify-center gap-2">
          <span>Masuk ke Akun</span>
          <i data-lucide="arrow-right" class="h-4 w-4"></i>
        </button>
      </form>

      <!-- Quick Role Info -->
      <div class="mt-6 pt-5 border-t border-[#e4e9e3]">
        <p class="text-[11px] text-[#7f8a83] text-center mb-3">Akun demo default yang tersedia:</p>
        <div class="grid grid-cols-2 gap-2 text-2xs">
          <div class="p-2 rounded-lg bg-[#f8f9f6] border border-[#e4e9e3]">
            <strong class="text-gray-900 block font-semibold">Admin / Pengguna:</strong>
            <span class="text-muted-foreground block truncate">harun25ti@pcr.ac.id</span>
          </div>
          <div class="p-2 rounded-lg bg-[#f8f9f6] border border-[#e4e9e3]">
            <strong class="text-gray-900 block font-semibold">Password:</strong>
            <span class="text-muted-foreground block">password123</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Register Link -->
    <div class="text-center mt-6">
      <p class="text-xs text-[#7f8a83]">
        Belum memiliki akun?
        <a href="{{ route('register') }}" class="font-bold text-[#235b48] hover:underline">Daftar akun baru di sini</a>
      </p>
    </div>
  </div>
@endsection
