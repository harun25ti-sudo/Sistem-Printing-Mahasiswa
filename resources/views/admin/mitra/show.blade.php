@extends('layouts.admin.app')

@section('content')
<div class="py-4">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="flex items-center gap-2 text-sm text-muted-foreground">
            <li><a href="{{ route('dashboard') }}" class="hover:text-gray-900"><i data-lucide="home" class="h-4 w-4 inline -mt-0.5"></i></a></li>
            <li class="text-gray-400">/</li>
            <li><a href="{{ route('mitra.index') }}" class="hover:text-gray-900">Data Mitra</a></li>
            <li class="text-gray-400">/</li>
            <li class="font-medium text-gray-900">{{ $mitra->nama_toko }}</li>
        </ol>
    </nav>

    <div class="flex items-start justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-gray-900">{{ $mitra->nama_toko }}</h1>
            <p class="mt-1 text-sm text-muted-foreground">Detail informasi mitra printing.</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('mitra.edit', $mitra->mitra_id) }}" class="inline-flex items-center gap-2 rounded-lg px-3 py-1.5 text-sm font-semibold bg-primary text-white hover:bg-primary/90 transition-colors">
                <i data-lucide="pencil" class="h-4 w-4"></i> Edit
            </a>
            <a href="{{ route('mitra.index') }}" class="inline-flex items-center gap-2 rounded-lg border border-border px-3 py-1.5 text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                <i data-lucide="arrow-left" class="h-4 w-4"></i> Kembali
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <div class="lg:col-span-2 space-y-5">
            <div class="rounded-xl border border-border bg-white p-6 shadow-sm">
                <div class="flex items-center gap-4 mb-5 pb-5 border-b border-border">
                    @if($mitra->foto)
                        <img src="{{ asset('storage/' . $mitra->foto) }}" alt="{{ $mitra->nama_toko }}" class="h-16 w-16 rounded-xl object-cover border border-border flex-shrink-0">
                    @else
                        <span class="h-16 w-16 rounded-xl bg-primary/10 text-primary flex items-center justify-center font-bold text-xl flex-shrink-0">
                            {{ strtoupper(substr($mitra->nama_toko, 0, 2)) }}
                        </span>
                    @endif
                    <div>
                        <h2 class="text-lg font-bold text-gray-900">{{ $mitra->nama_toko }}</h2>
                        <p class="text-sm text-muted-foreground">{{ $mitra->lokasi ?? '-' }}</p>
                        @if($mitra->status === 'aktif')
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-green-50 px-2.5 py-0.5 text-xs font-medium text-green-700 mt-1"><span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>Aktif</span>
                        @elseif($mitra->status === 'pending')
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 px-2.5 py-0.5 text-xs font-medium text-amber-700 mt-1"><span class="h-1.5 w-1.5 rounded-full bg-amber-400"></span>Pending</span>
                        @else
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-gray-100 px-2.5 py-0.5 text-xs font-medium text-gray-600 mt-1"><span class="h-1.5 w-1.5 rounded-full bg-gray-400"></span>Nonaktif</span>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div><span class="text-xs text-muted-foreground">Pemilik</span><p class="font-semibold text-gray-900 mt-0.5">{{ $mitra->nama_pemilik }}</p></div>
                    <div><span class="text-xs text-muted-foreground">Email</span><p class="font-semibold text-gray-900 mt-0.5">{{ $mitra->email }}</p></div>
                    <div><span class="text-xs text-muted-foreground">Telepon</span><p class="font-semibold text-gray-900 mt-0.5">{{ $mitra->phone ?? '-' }}</p></div>
                    <div><span class="text-xs text-muted-foreground">Rating</span><p class="font-semibold text-gray-900 mt-0.5">{{ $mitra->rating ?? '0.0' }} ⭐</p></div>
                    @if($mitra->alamat)
                    <div class="col-span-2"><span class="text-xs text-muted-foreground">Alamat</span><p class="font-semibold text-gray-900 mt-0.5">{{ $mitra->alamat }}</p></div>
                    @endif
                    @if($mitra->deskripsi)
                    <div class="col-span-2"><span class="text-xs text-muted-foreground">Deskripsi</span><p class="text-gray-700 mt-0.5">{{ $mitra->deskripsi }}</p></div>
                    @endif
                </div>
            </div>
        </div>
        <div class="space-y-5">
            <div class="rounded-xl border border-border bg-white p-6 shadow-sm">
                <h3 class="text-sm font-bold text-gray-900 mb-4">Harga Layanan</h3>
                <div class="space-y-3">
                    <div class="flex justify-between items-center py-2 border-b border-border">
                        <span class="text-sm text-gray-600">Cetak B&W / lembar</span>
                        <strong class="text-sm font-bold text-gray-900">Rp {{ number_format($mitra->harga_bw, 0, ',', '.') }}</strong>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b border-border">
                        <span class="text-sm text-gray-600">Cetak Warna / lembar</span>
                        <strong class="text-sm font-bold text-gray-900">Rp {{ number_format($mitra->harga_warna, 0, ',', '.') }}</strong>
                    </div>
                    <div class="flex justify-between items-center py-2">
                        <span class="text-sm text-gray-600">Kapasitas Maks</span>
                        <strong class="text-sm font-bold text-gray-900">{{ $mitra->kapasitas_maks }} pesanan</strong>
                    </div>
                </div>
            </div>
            <div class="rounded-xl border border-border bg-white p-6 shadow-sm">
                <h3 class="text-sm font-bold text-gray-900 mb-4">Fasilitas</h3>
                <div class="space-y-2">
                    <div class="flex items-center gap-2">
                        @if($mitra->cetak_warna)
                            <i data-lucide="check-circle" class="h-4 w-4 text-green-500"></i>
                            <span class="text-sm text-gray-700">Cetak Warna</span>
                        @else
                            <i data-lucide="x-circle" class="h-4 w-4 text-gray-300"></i>
                            <span class="text-sm text-gray-400">Cetak Warna</span>
                        @endif
                    </div>
                    <div class="flex items-center gap-2">
                        @if($mitra->layanan_antar)
                            <i data-lucide="check-circle" class="h-4 w-4 text-green-500"></i>
                            <span class="text-sm text-gray-700">Layanan Antar</span>
                        @else
                            <i data-lucide="x-circle" class="h-4 w-4 text-gray-300"></i>
                            <span class="text-sm text-gray-400">Layanan Antar</span>
                        @endif
                    </div>
                    <div class="flex items-center gap-2">
                        @if($mitra->near_campus)
                            <i data-lucide="check-circle" class="h-4 w-4 text-green-500"></i>
                            <span class="text-sm text-gray-700">Dekat Kampus</span>
                        @else
                            <i data-lucide="x-circle" class="h-4 w-4 text-gray-300"></i>
                            <span class="text-sm text-gray-400">Dekat Kampus</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
