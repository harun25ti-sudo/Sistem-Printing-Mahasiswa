@extends('layouts.admin.app')

@section('content')
<div class="py-4">
    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="flex items-center gap-2 text-sm text-muted-foreground">
            <li>
                <a href="{{ route('dashboard') }}" class="hover:text-gray-900 transition-colors">
                    <i data-lucide="home" class="h-4 w-4 inline -mt-0.5"></i>
                </a>
            </li>
            <li class="text-gray-400">/</li>
            <li class="font-medium text-gray-900">Data Pelanggan</li>
        </ol>
    </nav>

    {{-- Header --}}
    <div class="flex flex-wrap items-end justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-gray-900">Data Pelanggan</h1>
            <p class="mt-1 text-sm text-muted-foreground">List data seluruh pelanggan yang terdaftar di sistem.</p>
        </div>
        <a href="{{ route('pelanggan.create') }}" class="inline-flex items-center gap-2 rounded-lg px-4 py-2 text-sm font-semibold bg-primary text-white hover:bg-primary/90 transition-colors shadow-sm">
            <i data-lucide="plus" class="h-4 w-4"></i>
            Tambah Pelanggan
        </a>
    </div>

    {{-- Alert --}}
    @if (session('success'))
        <div class="mb-4 flex items-center justify-between gap-3 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
            <div class="flex items-center gap-3">
                <i data-lucide="check-circle" class="h-4 w-4 flex-shrink-0 text-green-600"></i>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    {{-- Filter & Search --}}
    <div class="rounded-xl border border-border bg-white p-4 shadow-sm mb-4">
        <form method="GET" action="{{ route('pelanggan.index') }}" class="flex flex-wrap items-center gap-3">
            {{-- Dropdown Filter Gender --}}
            <div class="w-full sm:w-44">
                <select name="gender" onchange="this.form.submit()" class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm text-gray-700 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20">
                    <option value="">All Gender</option>
                    <option value="Male" {{ request('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ request('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>

            {{-- Input Search --}}
            <div class="flex flex-1 min-w-[240px] items-center gap-2">
                <div class="relative flex-1 max-w-md">
                    <i data-lucide="search" class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-muted-foreground"></i>
                    <input type="text" name="search"
                           class="w-full rounded-lg border border-border bg-white pl-9 pr-3 py-2 text-sm text-gray-900 placeholder:text-muted-foreground focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20"
                           placeholder="Cari nama, email, atau no. HP..."
                           value="{{ request('search') }}">
                </div>
                <button type="submit" class="inline-flex items-center gap-1.5 rounded-lg bg-primary px-4 py-2 text-sm font-semibold text-white hover:bg-primary/90 transition-colors shadow-sm">
                    Search
                </button>
                @if(request('search'))
                    <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}"
                       class="inline-flex items-center gap-1.5 rounded-lg border border-border bg-white px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors"
                       id="clear-search">
                        Clear
                    </a>
                @endif
            </div>
        </form>
    </div>

    {{-- Table --}}
    <div class="rounded-xl border border-border bg-white shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table id="table-pelanggan" class="w-full min-w-[780px] text-left border-collapse">
                <thead>
                    <tr class="border-b border-border bg-gray-50/80">
                        <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider text-muted-foreground">#</th>
                        <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider text-muted-foreground">Nama Pelanggan</th>
                        <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider text-muted-foreground">Birthday</th>
                        <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider text-muted-foreground">Gender</th>
                        <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider text-muted-foreground">Email</th>
                        <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider text-muted-foreground">Phone</th>
                        <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider text-muted-foreground">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @forelse ($dataPelanggan as $i => $item)
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-4 py-3 text-xs text-muted-foreground">
                                {{ $dataPelanggan->firstItem() + $i }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-3">
                                    <span class="h-9 w-9 rounded-full bg-primary/10 text-primary flex items-center justify-center font-bold text-xs flex-shrink-0">
                                        {{ strtoupper(substr($item->first_name, 0, 1) . substr($item->last_name, 0, 1)) }}
                                    </span>
                                    <div>
                                        <strong class="block text-sm font-semibold text-gray-900">{{ $item->first_name }} {{ $item->last_name }}</strong>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-700">{{ $item->birthday ?? '-' }}</td>
                            <td class="px-4 py-3">
                                @if($item->gender === 'Male')
                                    <span class="inline-flex items-center rounded-full bg-blue-50 px-2.5 py-0.5 text-xs font-medium text-blue-700">Male</span>
                                @elseif($item->gender === 'Female')
                                    <span class="inline-flex items-center rounded-full bg-pink-50 px-2.5 py-0.5 text-xs font-medium text-pink-700">Female</span>
                                @else
                                    <span class="inline-flex items-center rounded-full bg-gray-100 px-2.5 py-0.5 text-xs font-medium text-gray-600">{{ $item->gender ?? '-' }}</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-700">{{ $item->email }}</td>
                            <td class="px-4 py-3 text-sm text-gray-700">{{ $item->phone ?? '-' }}</td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-1.5">
                                    <a href="{{ route('pelanggan.show', $item->pelanggan_id) }}"
                                       class="inline-flex items-center gap-1.5 rounded-lg border border-amber-200 bg-amber-50 px-2.5 py-1.5 text-xs font-medium text-amber-800 hover:bg-amber-100 transition-colors"
                                       title="Lihat Portofolio">
                                        <i data-lucide="eye" class="h-3.5 w-3.5"></i>
                                        Portofolio
                                    </a>
                                    <a href="{{ route('pelanggan.edit', $item->pelanggan_id) }}"
                                       class="inline-flex items-center gap-1 rounded-lg border border-border bg-blue-50 px-2.5 py-1.5 text-xs font-medium text-blue-700 hover:bg-blue-100 transition-colors"
                                       title="Edit">
                                        <i data-lucide="pencil" class="h-3.5 w-3.5"></i>
                                        Edit
                                    </a>
                                    <form action="{{ route('pelanggan.destroy', $item->pelanggan_id) }}"
                                          method="POST" class="inline"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="inline-flex items-center gap-1 rounded-lg border border-red-200 bg-red-50 px-2.5 py-1.5 text-xs font-medium text-red-600 hover:bg-red-100 transition-colors"
                                                title="Hapus">
                                            <i data-lucide="trash-2" class="h-3.5 w-3.5"></i>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-12 text-center">
                                <div class="flex flex-col items-center gap-2">
                                    <i data-lucide="users" class="h-10 w-10 text-gray-300"></i>
                                    <strong class="block text-sm font-semibold text-gray-700">Belum ada data pelanggan</strong>
                                    <p class="text-xs text-muted-foreground">Data pelanggan tidak ditemukan atau belum ditambahkan.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($dataPelanggan->hasPages())
            <div class="border-t border-border bg-gray-50/50 px-4 py-3">
                {{ $dataPelanggan->withQueryString()->onEachSide(2)->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>
</div>
@endsection
