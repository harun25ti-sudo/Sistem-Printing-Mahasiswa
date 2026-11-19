@extends('layouts.admin.app')

@section('content')
<div class="py-4">
    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="flex items-center gap-2 text-sm text-muted-foreground">
            <li><a href="{{ route('dashboard') }}" class="hover:text-gray-900 transition-colors"><i data-lucide="home" class="h-4 w-4 inline -mt-0.5"></i></a></li>
            <li class="text-gray-400">/</li>
            <li class="font-medium text-gray-900">Verifikasi Pembayaran</li>
        </ol>
    </nav>

    {{-- Page Header --}}
    <div class="flex items-end justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-gray-900">Verifikasi Pembayaran</h1>
            <p class="mt-1 text-sm text-muted-foreground">Periksa bukti transfer dan konfirmasi pembayaran sebelum pesanan diteruskan ke mitra.</p>
        </div>
        <div class="flex items-center gap-2">
            <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 px-3 py-1 text-xs font-semibold text-amber-700 border border-amber-200">
                <span class="h-2 w-2 rounded-full bg-amber-500 animate-pulse"></span>
                1 Pembayaran Menunggu
            </span>
        </div>
    </div>

    {{-- Alert notice --}}
    <div class="mb-6 flex items-start gap-3 rounded-xl border border-blue-200 bg-blue-50/70 p-4 text-sm text-blue-900">
        <i data-lucide="info" class="h-5 w-5 text-blue-600 flex-shrink-0 mt-0.5"></i>
        <div>
            <strong class="font-semibold block">Verifikasi Cepat Sistem Kasir:</strong>
            <p class="text-xs text-blue-800 mt-0.5">Setiap pesanan yang disetujui akan langsung mengubah status pesanan menjadi antrean cetak pada ruang kerja Mitra.</p>
        </div>
    </div>

    {{-- Pending Payments List --}}
    <div class="space-y-4">
        <div class="rounded-xl border border-border bg-white p-5 shadow-sm">
            <div class="flex items-start justify-between gap-4 flex-wrap pb-4 border-b border-border">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center font-bold text-sm flex-shrink-0">
                        <i data-lucide="wallet" class="h-5 w-5"></i>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <strong class="text-sm font-bold text-gray-900">ORD-2026-019</strong>
                            <span class="inline-flex items-center gap-1 rounded-full bg-amber-50 px-2.5 py-0.5 text-2xs font-semibold text-amber-700">
                                <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>Menunggu Verifikasi
                            </span>
                        </div>
                        <p class="text-xs text-muted-foreground mt-0.5">Pembeli: <strong>Nadia Putri</strong> · Mitra: <strong>Mitra Print Sudut</strong></p>
                    </div>
                </div>
                <div class="text-right">
                    <span class="text-xs text-muted-foreground block">Nominal Transfer</span>
                    <strong class="text-lg font-bold text-[#194333]">Rp32.000</strong>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 my-4 text-xs">
                <div class="rounded-lg bg-gray-50 p-3 border border-border">
                    <span class="text-muted-foreground block">Metode Pembayaran</span>
                    <strong class="text-gray-900 block mt-0.5 font-semibold">QRIS / Transfer Bank Mandiri</strong>
                </div>
                <div class="rounded-lg bg-gray-50 p-3 border border-border">
                    <span class="text-muted-foreground block">Waktu Unggah Bukti</span>
                    <strong class="text-gray-900 block mt-0.5 font-semibold">06 Nov 2026 · 15:42 WIB</strong>
                </div>
                <div class="rounded-lg bg-gray-50 p-3 border border-border">
                    <span class="text-muted-foreground block">Nama Rekening Pengirim</span>
                    <strong class="text-gray-900 block mt-0.5 font-semibold">Nadia Putri (Bank Mandiri)</strong>
                </div>
            </div>

            <div class="flex items-center justify-between gap-3 pt-2 flex-wrap">
                <div class="flex items-center gap-2 text-xs text-muted-foreground">
                    <i data-lucide="file-check" class="h-4 w-4 text-emerald-600"></i>
                    Bukti transfer terlampir (Screenshot QRIS Mandiri_06112026.png)
                </div>
                <div class="flex items-center gap-2">
                    <button type="button" onclick="alert('Pembayaran ORD-2026-019 ditolak. Notifikasi dikirimkan ke pembeli.')" class="inline-flex items-center gap-1.5 rounded-lg border border-red-200 bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-600 hover:bg-red-100 transition-colors">
                        <i data-lucide="x" class="h-3.5 w-3.5"></i> Tolak
                    </button>
                    <button type="button" onclick="alert('Pembayaran ORD-2026-019 sebesar Rp32.000 berhasil diverifikasi! Pesanan diteruskan ke Mitra.')" class="inline-flex items-center gap-1.5 rounded-lg bg-[#235b48] px-3.5 py-1.5 text-xs font-semibold text-white hover:bg-[#194333] transition-colors shadow-sm">
                        <i data-lucide="check" class="h-3.5 w-3.5"></i> Verifikasi Sekarang
                    </button>
                </div>
            </div>
        </div>

        {{-- Sample Verified History --}}
        <div class="rounded-xl border border-border bg-white p-5 shadow-sm opacity-75">
            <div class="flex items-center justify-between gap-4 flex-wrap">
                <div class="flex items-center gap-3">
                    <div class="h-9 w-9 rounded-xl bg-gray-100 text-gray-500 flex items-center justify-center flex-shrink-0">
                        <i data-lucide="check-circle-2" class="h-4 w-4 text-emerald-600"></i>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <strong class="text-xs font-bold text-gray-900">ORD-2026-018</strong>
                            <span class="inline-flex items-center gap-1 rounded-full bg-emerald-50 px-2 py-0.5 text-2xs font-medium text-emerald-700">
                                Terverifikasi
                            </span>
                        </div>
                        <p class="text-2xs text-muted-foreground mt-0.5">Harun Al Rasyid · QRIS ShopeePay · Rp45.000</p>
                    </div>
                </div>
                <span class="text-2xs text-muted-foreground">06 Nov 2026 · 14:10 WIB</span>
            </div>
        </div>
    </div>
</div>
@endsection
