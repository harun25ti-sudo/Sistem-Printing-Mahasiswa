@extends('layouts.admin.app')

@section('content')
<div class="py-4">
    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="flex items-center gap-2 text-sm text-muted-foreground">
            <li><a href="{{ route('dashboard') }}" class="hover:text-gray-900 transition-colors"><i data-lucide="home" class="h-4 w-4 inline -mt-0.5"></i></a></li>
            <li class="text-gray-400">/</li>
            <li class="font-medium text-gray-900">Data Mitra</li>
        </ol>
    </nav>

    {{-- Header --}}
    <div class="flex items-end justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-gray-900">Data Mitra Printing</h1>
            <p class="mt-1 text-sm text-muted-foreground">Kelola semua mitra printing yang terdaftar di sistem.</p>
        </div>
        <a href="{{ route('mitra.create') }}" class="inline-flex items-center gap-2 rounded-lg px-4 py-2 text-sm font-semibold bg-primary text-white hover:bg-primary/90 transition-colors shadow-sm">
            <i data-lucide="plus" class="h-4 w-4"></i>
            Tambah Mitra
        </a>
    </div>

    {{-- Alert --}}
    @if(session('success'))
    <div class="mb-4 flex items-center gap-3 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
        <i data-lucide="check-circle" class="h-4 w-4 flex-shrink-0 text-green-600"></i>
        {{ session('success') }}
    </div>
    @endif

    {{-- Stats Row --}}
    <div class="grid grid-cols-2 gap-4 sm:grid-cols-4 mb-6">
        <div class="rounded-xl border border-border bg-white p-4 shadow-sm">
            <div class="flex items-center justify-between mb-2">
                <span class="rounded-lg bg-green-50 p-2 text-green-600"><i data-lucide="store" class="h-4 w-4"></i></span>
                <span class="text-xs font-medium text-green-600">Total</span>
            </div>
            <strong class="block text-2xl font-bold tracking-tight text-gray-900">{{ $dataMitra->count() }}</strong>
            <small class="text-xs text-muted-foreground">Semua mitra</small>
        </div>
        <div class="rounded-xl border border-border bg-white p-4 shadow-sm">
            <div class="flex items-center justify-between mb-2">
                <span class="rounded-lg bg-emerald-50 p-2 text-emerald-600"><i data-lucide="check-circle" class="h-4 w-4"></i></span>
                <span class="text-xs font-medium text-emerald-600">Aktif</span>
            </div>
            <strong class="block text-2xl font-bold tracking-tight text-gray-900">{{ $dataMitra->where('status','aktif')->count() }}</strong>
            <small class="text-xs text-muted-foreground">Mitra aktif</small>
        </div>
        <div class="rounded-xl border border-border bg-white p-4 shadow-sm">
            <div class="flex items-center justify-between mb-2">
                <span class="rounded-lg bg-amber-50 p-2 text-amber-600"><i data-lucide="clock" class="h-4 w-4"></i></span>
                <span class="text-xs font-medium text-amber-600">Pending</span>
            </div>
            <strong class="block text-2xl font-bold tracking-tight text-gray-900">{{ $dataMitra->where('status','pending')->count() }}</strong>
            <small class="text-xs text-muted-foreground">Menunggu verifikasi</small>
        </div>
        <div class="rounded-xl border border-border bg-white p-4 shadow-sm">
            <div class="flex items-center justify-between mb-2">
                <span class="rounded-lg bg-red-50 p-2 text-red-500"><i data-lucide="x-circle" class="h-4 w-4"></i></span>
                <span class="text-xs font-medium text-red-500">Nonaktif</span>
            </div>
            <strong class="block text-2xl font-bold tracking-tight text-gray-900">{{ $dataMitra->where('status','nonaktif')->count() }}</strong>
            <small class="text-xs text-muted-foreground">Mitra nonaktif</small>
        </div>
    </div>

    {{-- Table --}}
    <div class="rounded-xl border border-border bg-white shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[700px] text-left border-collapse">
                <thead>
                    <tr class="border-b border-border bg-gray-50/80">
                        <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider text-muted-foreground">#</th>
                        <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider text-muted-foreground">Nama Toko</th>
                        <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider text-muted-foreground">Pemilik</th>
                        <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider text-muted-foreground">Kontak</th>
                        <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider text-muted-foreground">Layanan</th>
                        <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider text-muted-foreground">Status</th>
                        <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider text-muted-foreground">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @forelse($dataMitra as $i => $item)
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-4 py-3 text-xs text-muted-foreground">{{ $i + 1 }}</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-3">
                                @if($item->foto)
                                    <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_toko }}" class="h-9 w-9 rounded-lg object-cover border border-border flex-shrink-0">
                                @else
                                    <span class="h-9 w-9 rounded-lg bg-primary/10 text-primary flex items-center justify-center font-bold text-sm flex-shrink-0">
                                        {{ strtoupper(substr($item->nama_toko, 0, 2)) }}
                                    </span>
                                @endif
                                <div>
                                    <strong class="block text-sm font-semibold text-gray-900">{{ $item->nama_toko }}</strong>
                                    <small class="text-xs text-muted-foreground">{{ $item->lokasi ?? '-' }}</small>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-700">{{ $item->nama_pemilik }}</td>
                        <td class="px-4 py-3">
                            <div class="text-sm text-gray-700">{{ $item->email }}</div>
                            <div class="text-xs text-muted-foreground">{{ $item->phone ?? '-' }}</div>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex flex-wrap gap-1">
                                @if($item->cetak_warna)
                                    <span class="inline-flex items-center rounded-full bg-blue-50 px-2 py-0.5 text-xs font-medium text-blue-700">Warna</span>
                                @endif
                                @if($item->layanan_antar)
                                    <span class="inline-flex items-center rounded-full bg-green-50 px-2 py-0.5 text-xs font-medium text-green-700">Antar</span>
                                @endif
                                @if($item->near_campus)
                                    <span class="inline-flex items-center rounded-full bg-purple-50 px-2 py-0.5 text-xs font-medium text-purple-700">Dekat Kampus</span>
                                @endif
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            @if($item->status === 'aktif')
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-green-50 px-2.5 py-0.5 text-xs font-medium text-green-700"><span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>Aktif</span>
                            @elseif($item->status === 'pending')
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 px-2.5 py-0.5 text-xs font-medium text-amber-700"><span class="h-1.5 w-1.5 rounded-full bg-amber-400"></span>Pending</span>
                            @else
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-gray-100 px-2.5 py-0.5 text-xs font-medium text-gray-600"><span class="h-1.5 w-1.5 rounded-full bg-gray-400"></span>Nonaktif</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-1.5">
                                <a href="{{ route('mitra.show', $item->mitra_id) }}" class="inline-flex items-center gap-1 rounded-lg border border-border px-2.5 py-1.5 text-xs font-medium text-gray-700 hover:bg-gray-50 transition-colors" title="Detail">
                                    <i data-lucide="eye" class="h-3.5 w-3.5"></i>
                                </a>
                                <a href="{{ route('mitra.edit', $item->mitra_id) }}" class="inline-flex items-center gap-1 rounded-lg border border-border px-2.5 py-1.5 text-xs font-medium text-blue-700 bg-blue-50 hover:bg-blue-100 transition-colors" title="Edit">
                                    <i data-lucide="pencil" class="h-3.5 w-3.5"></i>
                                </a>
                                <form action="{{ route('mitra.destroy', $item->mitra_id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus data mitra ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="inline-flex items-center gap-1 rounded-lg border border-red-200 px-2.5 py-1.5 text-xs font-medium text-red-600 bg-red-50 hover:bg-red-100 transition-colors" title="Hapus">
                                        <i data-lucide="trash-2" class="h-3.5 w-3.5"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-4 py-12 text-center">
                            <div class="flex flex-col items-center gap-3">
                                <i data-lucide="store" class="h-10 w-10 text-gray-300"></i>
                                <strong class="block text-sm font-semibold text-gray-700">Belum ada data mitra</strong>
                                <p class="text-xs text-muted-foreground">Tambahkan mitra printing pertama untuk memulai.</p>
                                <a href="{{ route('mitra.create') }}" class="mt-1 inline-flex items-center gap-2 rounded-lg px-3 py-1.5 text-sm font-semibold bg-primary text-white hover:bg-primary/90 transition-colors">
                                    <i data-lucide="plus" class="h-4 w-4"></i> Tambah Mitra
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
