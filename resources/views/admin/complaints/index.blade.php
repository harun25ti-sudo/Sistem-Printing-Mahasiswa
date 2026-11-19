@extends('layouts.admin.app')

@section('content')
<div class="py-4">
    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="flex items-center gap-2 text-sm text-muted-foreground">
            <li><a href="{{ route('dashboard') }}" class="hover:text-gray-900 transition-colors"><i data-lucide="home" class="h-4 w-4 inline -mt-0.5"></i></a></li>
            <li class="text-gray-400">/</li>
            <li class="font-medium text-gray-900">Pusat Pengaduan</li>
        </ol>
    </nav>

    {{-- Page Header --}}
    <div class="flex items-end justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-gray-900">Pengaduan & Resolusi Masalah</h1>
            <p class="mt-1 text-sm text-muted-foreground">Catat dan tindak lanjuti komplain pesanan dari pembeli maupun mitra.</p>
        </div>
        <div class="flex items-center gap-2">
            <span class="inline-flex items-center gap-1.5 rounded-full bg-red-50 px-3 py-1 text-xs font-semibold text-red-700 border border-red-200">
                <span class="h-2 w-2 rounded-full bg-red-500 animate-pulse"></span>
                1 Tiket Aktif
            </span>
        </div>
    </div>

    {{-- Complaints List --}}
    <div class="space-y-4">
        <div class="rounded-xl border border-red-200 bg-white p-5 shadow-sm">
            <div class="flex items-start justify-between gap-4 flex-wrap pb-4 border-b border-border">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 rounded-xl bg-red-50 text-red-600 flex items-center justify-center font-bold text-sm flex-shrink-0">
                        <i data-lucide="alert-triangle" class="h-5 w-5"></i>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <strong class="text-sm font-bold text-gray-900">TIK-2026-004 · Hasil cetak tidak sesuai pesanan</strong>
                            <span class="inline-flex items-center gap-1 rounded-full bg-red-50 px-2.5 py-0.5 text-2xs font-semibold text-red-700">
                                Butuh Tindak Lanjut
                            </span>
                        </div>
                        <p class="text-xs text-muted-foreground mt-0.5">Nomor Pesanan: <strong>ORD-2026-019</strong> · Pelapor: <strong>Nadia Putri (Pembeli)</strong></p>
                    </div>
                </div>
                <span class="text-xs text-muted-foreground">Dilaporkan 1 jam lalu</span>
            </div>

            <div class="my-4 text-xs space-y-2 bg-[#fbfcf9] p-4 rounded-xl border border-border">
                <p class="text-gray-800 leading-relaxed">
                    <strong>Pesan Pengaduan:</strong> "Hasil cetak halaman 12 s/d 18 buram dan terdapat garis tinta hitam melintang pada cover jilid. Mohon dilakukan cetak ulang atau refund."
                </p>
                <div class="flex items-center gap-4 text-muted-foreground pt-1">
                    <span>Mitra terlapor: <strong>Mitra Print Sudut</strong></span>
                    <span>·</span>
                    <span>Status pesanan: <strong>Dalam Investigasi</strong></span>
                </div>
            </div>

            <div class="flex items-center justify-between gap-3 pt-2 flex-wrap">
                <div class="flex items-center gap-2 text-xs text-muted-foreground">
                    <i data-lucide="paperclip" class="h-4 w-4 text-gray-400"></i>
                    Foto bukti lampiran komplain (bukti_buram_1.jpg, bukti_buram_2.jpg)
                </div>
                <div class="flex items-center gap-2">
                    <button type="button" onclick="alert('Notifikasi konfirmasi cetak ulang dikirimkan ke Mitra Print Sudut.')" class="inline-flex items-center gap-1.5 rounded-lg border border-border bg-white px-3 py-1.5 text-xs font-semibold text-gray-700 hover:bg-gray-50 transition-colors">
                        <i data-lucide="rotate-ccw" class="h-3.5 w-3.5"></i> Perintahkan Cetak Ulang
                    </button>
                    <button type="button" onclick="alert('Pengaduan TIK-2026-004 ditandai selesai dan solusi telah dikirimkan ke pelanggan.')" class="inline-flex items-center gap-1.5 rounded-lg bg-[#235b48] px-3.5 py-1.5 text-xs font-semibold text-white hover:bg-[#194333] transition-colors shadow-sm">
                        <i data-lucide="check" class="h-3.5 w-3.5"></i> Selesaikan Kasus
                    </button>
                </div>
            </div>
        </div>

        {{-- Resolved State --}}
        <div class="rounded-xl border border-border bg-white p-5 shadow-sm opacity-75">
            <div class="flex items-center justify-between gap-4 flex-wrap">
                <div class="flex items-center gap-3">
                    <div class="h-9 w-9 rounded-xl bg-gray-100 text-gray-500 flex items-center justify-center flex-shrink-0">
                        <i data-lucide="check-circle" class="h-4 w-4 text-emerald-600"></i>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <strong class="text-xs font-bold text-gray-900">TIK-2026-003 · Keterlambatan pengantaran kurir</strong>
                            <span class="inline-flex items-center gap-1 rounded-full bg-emerald-50 px-2 py-0.5 text-2xs font-medium text-emerald-700">
                                Selesai
                            </span>
                        </div>
                        <p class="text-2xs text-muted-foreground mt-0.5">ORD-2026-014 · Paket telah diserahterimakan kurir dan pembeli telah konfirmasi.</p>
                    </div>
                </div>
                <span class="text-2xs text-muted-foreground">01 Nov 2026</span>
            </div>
        </div>
    </div>
</div>
@endsection
