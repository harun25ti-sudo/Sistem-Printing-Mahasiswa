@extends('layouts.admin.app')

@section('content')
<div class="py-4">
    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="flex items-center gap-2 text-sm text-muted-foreground">
            <li><a href="{{ route('dashboard') }}" class="hover:text-gray-900 transition-colors"><i data-lucide="home" class="h-4 w-4 inline -mt-0.5"></i></a></li>
            <li class="text-gray-400">/</li>
            <li class="font-medium text-gray-900">Semua Pesanan</li>
        </ol>
    </nav>

    {{-- Page Header --}}
    <div class="flex items-end justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-gray-900">Semua Pesanan Cetak</h1>
            <p class="mt-1 text-sm text-muted-foreground">Pemantauan transaksi dan status pencetakan lintas pembeli dan mitra.</p>
        </div>
        <div class="flex items-center gap-2">
            <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700 border border-emerald-200">
                <span class="h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                Monitoring Aktif
            </span>
        </div>
    </div>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-2 gap-4 sm:grid-cols-4 mb-6">
        <div class="rounded-xl border border-border bg-white p-4 shadow-sm">
            <div class="flex items-center justify-between mb-2">
                <span class="rounded-lg bg-emerald-50 p-2 text-emerald-600"><i data-lucide="file-text" class="h-4 w-4"></i></span>
                <span class="text-xs font-semibold text-emerald-600">Total</span>
            </div>
            <strong class="block text-2xl font-bold tracking-tight text-gray-900">5</strong>
            <small class="text-xs text-muted-foreground">Pesanan terdaftar</small>
        </div>

        <div class="rounded-xl border border-border bg-white p-4 shadow-sm">
            <div class="flex items-center justify-between mb-2">
                <span class="rounded-lg bg-blue-50 p-2 text-blue-600"><i data-lucide="printer" class="h-4 w-4"></i></span>
                <span class="text-xs font-semibold text-blue-600">Proses</span>
            </div>
            <strong class="block text-2xl font-bold tracking-tight text-gray-900">2</strong>
            <small class="text-xs text-muted-foreground">Sedang dicetak/diantar</small>
        </div>

        <div class="rounded-xl border border-border bg-white p-4 shadow-sm">
            <div class="flex items-center justify-between mb-2">
                <span class="rounded-lg bg-amber-50 p-2 text-amber-600"><i data-lucide="clock" class="h-4 w-4"></i></span>
                <span class="text-xs font-semibold text-amber-600">Menunggu</span>
            </div>
            <strong class="block text-2xl font-bold tracking-tight text-gray-900">2</strong>
            <small class="text-xs text-muted-foreground">Menunggu bayar/mitra</small>
        </div>

        <div class="rounded-xl border border-border bg-white p-4 shadow-sm">
            <div class="flex items-center justify-between mb-2">
                <span class="rounded-lg bg-green-50 p-2 text-green-600"><i data-lucide="check-circle" class="h-4 w-4"></i></span>
                <span class="text-xs font-semibold text-green-600">Selesai</span>
            </div>
            <strong class="block text-2xl font-bold tracking-tight text-gray-900">1</strong>
            <small class="text-xs text-muted-foreground">Pesanan tuntas</small>
        </div>
    </div>

    {{-- Filter Toolbar --}}
    <div class="flex items-center justify-between gap-4 mb-4 flex-wrap">
        <div class="flex items-center gap-1.5 bg-[#edf0eb] p-1 rounded-lg">
            <button class="px-3 py-1.5 text-xs font-semibold rounded-md bg-white text-gray-900 shadow-sm">Semua</button>
            <button class="px-3 py-1.5 text-xs font-medium rounded-md text-[#5d6b62] hover:text-gray-900">Berjalan</button>
            <button class="px-3 py-1.5 text-xs font-medium rounded-md text-[#5d6b62] hover:text-gray-900">Selesai</button>
        </div>
        <div class="text-xs text-muted-foreground">
            Menampilkan <strong>5 pesanan</strong>
        </div>
    </div>

    {{-- Orders Table --}}
    <div class="rounded-xl border border-border bg-white shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[760px] text-left border-collapse">
                <thead>
                    <tr class="border-b border-border bg-gray-50/80">
                        <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider text-muted-foreground">Nomor Pesanan</th>
                        <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider text-muted-foreground">File Dokumen</th>
                        <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider text-muted-foreground">Pembeli</th>
                        <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider text-muted-foreground">Mitra</th>
                        <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider text-muted-foreground">Tanggal</th>
                        <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider text-muted-foreground">Total</th>
                        <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider text-muted-foreground">Status</th>
                        <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider text-muted-foreground">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-4 py-3 text-xs font-mono font-bold text-gray-900">ORD-2026-018</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-2">
                                <span class="p-1.5 rounded bg-emerald-50 text-emerald-600"><i data-lucide="file-text" class="h-4 w-4"></i></span>
                                <div>
                                    <strong class="block text-xs font-semibold text-gray-900">Laporan Praktikum Jarkom.pdf</strong>
                                    <small class="text-[10px] text-muted-foreground">A4 · Hitam putih · 2 salinan</small>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-xs text-gray-700">Harun Al Rasyid</td>
                        <td class="px-4 py-3 text-xs font-medium text-gray-800">Mitra Print Sudut</td>
                        <td class="px-4 py-3 text-xs text-muted-foreground">06 Nov 2026</td>
                        <td class="px-4 py-3 text-xs font-bold text-gray-900">Rp45.000</td>
                        <td class="px-4 py-3">
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-50 px-2.5 py-0.5 text-xs font-medium text-blue-700">
                                <span class="h-1.5 w-1.5 rounded-full bg-blue-500"></span>Sedang dicetak
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <button onclick="alert('Pesanan ORD-2026-018: Laporan Praktikum Jarkom.pdf\nMitra: Mitra Print Sudut\nStatus: Sedang dicetak')" class="inline-flex items-center gap-1 rounded-lg border border-border px-2.5 py-1 text-xs font-medium text-gray-700 hover:bg-gray-50">
                                <i data-lucide="eye" class="h-3.5 w-3.5"></i> Detail
                            </button>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-4 py-3 text-xs font-mono font-bold text-gray-900">ORD-2026-019</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-2">
                                <span class="p-1.5 rounded bg-emerald-50 text-emerald-600"><i data-lucide="file-text" class="h-4 w-4"></i></span>
                                <div>
                                    <strong class="block text-xs font-semibold text-gray-900">Proposal Kegiatan.pdf</strong>
                                    <small class="text-[10px] text-muted-foreground">A4 · Berwarna · 1 salinan</small>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-xs text-gray-700">Nadia Putri</td>
                        <td class="px-4 py-3 text-xs font-medium text-gray-800">Mitra Print Sudut</td>
                        <td class="px-4 py-3 text-xs text-muted-foreground">06 Nov 2026</td>
                        <td class="px-4 py-3 text-xs font-bold text-gray-900">Rp32.000</td>
                        <td class="px-4 py-3">
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 px-2.5 py-0.5 text-xs font-medium text-amber-700">
                                <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>Menunggu bayar
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <button onclick="alert('Pesanan ORD-2026-019: Proposal Kegiatan.pdf\nMitra: Mitra Print Sudut\nStatus: Menunggu verifikasi pembayaran')" class="inline-flex items-center gap-1 rounded-lg border border-border px-2.5 py-1 text-xs font-medium text-gray-700 hover:bg-gray-50">
                                <i data-lucide="eye" class="h-3.5 w-3.5"></i> Detail
                            </button>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-4 py-3 text-xs font-mono font-bold text-gray-900">ORD-2026-020</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-2">
                                <span class="p-1.5 rounded bg-emerald-50 text-emerald-600"><i data-lucide="file-text" class="h-4 w-4"></i></span>
                                <div>
                                    <strong class="block text-xs font-semibold text-gray-900">Makalah Etika Profesi.pdf</strong>
                                    <small class="text-[10px] text-muted-foreground">A4 · Hitam putih · 1 salinan</small>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-xs text-gray-700">Dinda Safitri</td>
                        <td class="px-4 py-3 text-xs font-medium text-gray-800">Mitra Print Sudut</td>
                        <td class="px-4 py-3 text-xs text-muted-foreground">06 Nov 2026</td>
                        <td class="px-4 py-3 text-xs font-bold text-gray-900">Rp21.000</td>
                        <td class="px-4 py-3">
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 px-2.5 py-0.5 text-xs font-medium text-amber-700">
                                <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>Menunggu respons mitra
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <button onclick="alert('Pesanan ORD-2026-020: Makalah Etika Profesi.pdf\nStatus: Menunggu respons mitra')" class="inline-flex items-center gap-1 rounded-lg border border-border px-2.5 py-1 text-xs font-medium text-gray-700 hover:bg-gray-50">
                                <i data-lucide="eye" class="h-3.5 w-3.5"></i> Detail
                            </button>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-4 py-3 text-xs font-mono font-bold text-gray-900">ORD-2026-016</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-2">
                                <span class="p-1.5 rounded bg-emerald-50 text-emerald-600"><i data-lucide="file-text" class="h-4 w-4"></i></span>
                                <div>
                                    <strong class="block text-xs font-semibold text-gray-900">Modul Basis Data.pdf</strong>
                                    <small class="text-[10px] text-muted-foreground">A4 · Hitam putih · 1 salinan</small>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-xs text-gray-700">Fajar Ramadhan</td>
                        <td class="px-4 py-3 text-xs font-medium text-gray-800">Mitra Print Sudut</td>
                        <td class="px-4 py-3 text-xs text-muted-foreground">05 Nov 2026</td>
                        <td class="px-4 py-3 text-xs font-bold text-gray-900">Rp28.000</td>
                        <td class="px-4 py-3">
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-50 px-2.5 py-0.5 text-xs font-medium text-blue-700">
                                <span class="h-1.5 w-1.5 rounded-full bg-blue-500"></span>Siap diantar kurir
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <button onclick="alert('Pesanan ORD-2026-016: Modul Basis Data.pdf\nStatus: Siap diantar')" class="inline-flex items-center gap-1 rounded-lg border border-border px-2.5 py-1 text-xs font-medium text-gray-700 hover:bg-gray-50">
                                <i data-lucide="eye" class="h-3.5 w-3.5"></i> Detail
                            </button>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-4 py-3 text-xs font-mono font-bold text-gray-900">ORD-2026-014</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-2">
                                <span class="p-1.5 rounded bg-emerald-50 text-emerald-600"><i data-lucide="file-text" class="h-4 w-4"></i></span>
                                <div>
                                    <strong class="block text-xs font-semibold text-gray-900">Tugas Pancasila.pdf</strong>
                                    <small class="text-[10px] text-muted-foreground">A4 · Hitam putih · 1 salinan</small>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-xs text-gray-700">Harun Al Rasyid</td>
                        <td class="px-4 py-3 text-xs font-medium text-gray-800">KertasKita Printing</td>
                        <td class="px-4 py-3 text-xs text-muted-foreground">01 Nov 2026</td>
                        <td class="px-4 py-3 text-xs font-bold text-gray-900">Rp18.000</td>
                        <td class="px-4 py-3">
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-green-50 px-2.5 py-0.5 text-xs font-medium text-green-700">
                                <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>Selesai
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <button onclick="alert('Pesanan ORD-2026-014: Selesai diambil')" class="inline-flex items-center gap-1 rounded-lg border border-border px-2.5 py-1 text-xs font-medium text-gray-700 hover:bg-gray-50">
                                <i data-lucide="eye" class="h-3.5 w-3.5"></i> Detail
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
