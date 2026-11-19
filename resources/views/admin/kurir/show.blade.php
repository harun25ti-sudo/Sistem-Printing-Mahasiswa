@extends('layouts.admin.app')

@section('content')
<div class="py-4">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="flex items-center gap-2 text-sm text-muted-foreground">
            <li><a href="{{ route('dashboard') }}" class="hover:text-gray-900"><i data-lucide="home" class="h-4 w-4 inline -mt-0.5"></i></a></li>
            <li class="text-gray-400">/</li>
            <li><a href="{{ route('kurir.index') }}" class="hover:text-gray-900">Data Kurir</a></li>
            <li class="text-gray-400">/</li>
            <li class="font-medium text-gray-900">{{ $kurir->nama }}</li>
        </ol>
    </nav>

    <div class="flex items-start justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-gray-900">{{ $kurir->nama }}</h1>
            <p class="mt-1 text-sm text-muted-foreground">Detail informasi kurir.</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('kurir.edit', $kurir->kurir_id) }}" class="inline-flex items-center gap-2 rounded-lg px-3 py-1.5 text-sm font-semibold bg-primary text-white hover:bg-primary/90 transition-colors">
                <i data-lucide="pencil" class="h-4 w-4"></i> Edit
            </a>
            <a href="{{ route('kurir.index') }}" class="inline-flex items-center gap-2 rounded-lg border border-border px-3 py-1.5 text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                <i data-lucide="arrow-left" class="h-4 w-4"></i> Kembali
            </a>
        </div>
    </div>

    <div class="max-w-lg">
        <div class="rounded-xl border border-border bg-white p-6 shadow-sm">
            <div class="flex items-center gap-4 mb-5 pb-5 border-b border-border">
                @if($kurir->foto)
                    <img src="{{ asset('storage/' . $kurir->foto) }}" alt="{{ $kurir->nama }}" class="h-16 w-16 rounded-full object-cover border-2 border-border flex-shrink-0">
                @else
                    <span class="h-16 w-16 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center font-bold text-xl flex-shrink-0">
                        {{ strtoupper(substr($kurir->nama, 0, 2)) }}
                    </span>
                @endif
                <div>
                    <h2 class="text-lg font-bold text-gray-900">{{ $kurir->nama }}</h2>
                    <p class="text-sm text-muted-foreground">{{ $kurir->email }}</p>
                    @if($kurir->status === 'aktif')
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-green-50 px-2.5 py-0.5 text-xs font-medium text-green-700 mt-1"><span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>Aktif</span>
                    @elseif($kurir->status === 'bertugas')
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-50 px-2.5 py-0.5 text-xs font-medium text-blue-700 mt-1"><span class="h-1.5 w-1.5 rounded-full bg-blue-500"></span>Bertugas</span>
                    @else
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-gray-100 px-2.5 py-0.5 text-xs font-medium text-gray-600 mt-1"><span class="h-1.5 w-1.5 rounded-full bg-gray-400"></span>Nonaktif</span>
                    @endif
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 text-sm">
                <div><span class="text-xs text-muted-foreground">Telepon</span><p class="font-semibold text-gray-900 mt-0.5">{{ $kurir->phone ?? '-' }}</p></div>
                <div><span class="text-xs text-muted-foreground">Kendaraan</span><p class="font-semibold text-gray-900 mt-0.5">{{ $kurir->jenis_kendaraan ?? '-' }}</p></div>
                <div><span class="text-xs text-muted-foreground">Nomor Kendaraan</span><p class="font-semibold text-gray-900 mt-0.5">{{ $kurir->no_kendaraan ?? '-' }}</p></div>
                <div><span class="text-xs text-muted-foreground">Total Tugas</span><p class="font-semibold text-gray-900 mt-0.5">{{ $kurir->total_tugas }} tugas</p></div>
                <div><span class="text-xs text-muted-foreground">Rating</span><p class="font-semibold text-gray-900 mt-0.5">{{ $kurir->rating ?? '0.0' }} ⭐</p></div>
            </div>
        </div>
    </div>
</div>
@endsection
