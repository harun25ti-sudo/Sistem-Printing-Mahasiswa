@extends('layouts.admin.app')

@section('content')
<div class="py-4">
    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="flex items-center gap-2 text-sm text-muted-foreground">
            <li><a href="{{ route('dashboard') }}" class="hover:text-gray-900 transition-colors"><i data-lucide="home" class="h-4 w-4 inline -mt-0.5"></i></a></li>
            <li class="text-gray-400">/</li>
            <li class="font-medium text-gray-900">Verifikasi Akun</li>
        </ol>
    </nav>

    {{-- Page Header --}}
    <div class="flex items-end justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-gray-900">Verifikasi Akun (Mitra & Kurir)</h1>
            <p class="mt-1 text-sm text-muted-foreground">Pastikan informasi mitra dan kurir telah diperiksa sebelum akun diaktifkan.</p>
        </div>
        <div>
            @if($counts['pending'] > 0)
                <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 px-3 py-1 text-xs font-semibold text-amber-700 border border-amber-200">
                    <span class="h-2 w-2 rounded-full bg-amber-500 animate-pulse"></span>
                    {{ $counts['pending'] }} Akun Menunggu Verifikasi
                </span>
            @else
                <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700 border border-emerald-200">
                    <i data-lucide="check" class="h-3.5 w-3.5"></i>
                    Semua Akun Sudah Diverifikasi
                </span>
            @endif
        </div>
    </div>

    {{-- Alert --}}
    @if(session('success'))
    <div class="mb-4 flex items-center gap-3 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
        <i data-lucide="check-circle" class="h-4 w-4 flex-shrink-0 text-green-600"></i>
        <span>{{ session('success') }}</span>
    </div>
    @endif

    {{-- Stats Row --}}
    <div class="grid grid-cols-2 gap-4 sm:grid-cols-4 mb-6">
        <div class="rounded-xl border border-border bg-white p-4 shadow-sm">
            <div class="flex items-center justify-between mb-2">
                <span class="rounded-lg bg-gray-50 p-2 text-gray-600"><i data-lucide="users" class="h-4 w-4"></i></span>
                <span class="text-xs font-semibold text-gray-600">Total</span>
            </div>
            <strong class="block text-2xl font-bold tracking-tight text-gray-900">{{ $counts['total'] }}</strong>
            <small class="text-xs text-muted-foreground">Akun kemitraan</small>
        </div>

        <div class="rounded-xl border border-border bg-white p-4 shadow-sm">
            <div class="flex items-center justify-between mb-2">
                <span class="rounded-lg bg-amber-50 p-2 text-amber-600"><i data-lucide="clock" class="h-4 w-4"></i></span>
                <span class="text-xs font-semibold text-amber-600">Menunggu</span>
            </div>
            <strong class="block text-2xl font-bold tracking-tight text-gray-900">{{ $counts['pending'] }}</strong>
            <small class="text-xs text-muted-foreground">Perlu konfirmasi</small>
        </div>

        <div class="rounded-xl border border-border bg-white p-4 shadow-sm">
            <div class="flex items-center justify-between mb-2">
                <span class="rounded-lg bg-emerald-50 p-2 text-emerald-600"><i data-lucide="check-circle" class="h-4 w-4"></i></span>
                <span class="text-xs font-semibold text-emerald-600">Aktif</span>
            </div>
            <strong class="block text-2xl font-bold tracking-tight text-gray-900">{{ $counts['approved'] }}</strong>
            <small class="text-xs text-muted-foreground">Telah disetujui</small>
        </div>

        <div class="rounded-xl border border-border bg-white p-4 shadow-sm">
            <div class="flex items-center justify-between mb-2">
                <span class="rounded-lg bg-red-50 p-2 text-red-600"><i data-lucide="x-circle" class="h-4 w-4"></i></span>
                <span class="text-xs font-semibold text-red-600">Ditolak</span>
            </div>
            <strong class="block text-2xl font-bold tracking-tight text-gray-900">{{ $counts['rejected'] }}</strong>
            <small class="text-xs text-muted-foreground">Pengajuan ditolak</small>
        </div>
    </div>

    {{-- Filter Toolbar --}}
    <div class="flex items-center justify-between gap-4 mb-4 flex-wrap">
        <div class="flex items-center gap-1.5 bg-[#edf0eb] p-1 rounded-lg">
            <a href="{{ route('admin.verification.index', ['role' => 'all']) }}" class="px-3 py-1.5 text-xs font-semibold rounded-md transition-all {{ $filter === 'all' ? 'bg-white text-gray-900 shadow-sm' : 'text-[#5d6b62] hover:text-gray-900' }}">Semua Peran</a>
            <a href="{{ route('admin.verification.index', ['role' => 'mitra']) }}" class="px-3 py-1.5 text-xs font-semibold rounded-md transition-all {{ $filter === 'mitra' ? 'bg-white text-gray-900 shadow-sm' : 'text-[#5d6b62] hover:text-gray-900' }}">Mitra Printing</a>
            <a href="{{ route('admin.verification.index', ['role' => 'kurir']) }}" class="px-3 py-1.5 text-xs font-semibold rounded-md transition-all {{ $filter === 'kurir' ? 'bg-white text-gray-900 shadow-sm' : 'text-[#5d6b62] hover:text-gray-900' }}">Kurir</a>
            <a href="{{ route('admin.verification.index', ['role' => 'admin']) }}" class="px-3 py-1.5 text-xs font-semibold rounded-md transition-all {{ $filter === 'admin' ? 'bg-white text-gray-900 shadow-sm' : 'text-[#5d6b62] hover:text-gray-900' }}">Admin</a>
        </div>
        <div class="text-xs text-muted-foreground">
            Menampilkan <strong>{{ $users->count() }} pengajuan akun</strong>
        </div>
    </div>

    {{-- Verification Table / Cards --}}
    <div class="rounded-xl border border-border bg-white shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[700px] text-left border-collapse">
                <thead>
                    <tr class="border-b border-border bg-gray-50/80">
                        <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider text-muted-foreground">Akun / Nama</th>
                        <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider text-muted-foreground">Kontak</th>
                        <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider text-muted-foreground">Peran</th>
                        <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider text-muted-foreground">Tanggal Daftar</th>
                        <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider text-muted-foreground">Status Verifikasi</th>
                        <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider text-muted-foreground text-right">Tindakan Admin</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @forelse($users as $user)
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-4 py-3.5">
                            <div class="flex items-center gap-3">
                                <div class="h-9 w-9 rounded-full bg-[#dfe9dc] text-[#194333] flex items-center justify-center font-bold text-xs flex-shrink-0">
                                    {{ strtoupper(substr($user->name, 0, 2)) }}
                                </div>
                                <div>
                                    <strong class="block text-xs font-semibold text-gray-900">{{ $user->name }}</strong>
                                    <small class="text-2xs text-muted-foreground">{{ $user->alamat ?? 'Alamat belum diatur' }}</small>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3.5">
                            <span class="block text-xs text-gray-900">{{ $user->email }}</span>
                            <small class="text-2xs text-muted-foreground">{{ $user->phone ?? '-' }}</small>
                        </td>
                        <td class="px-4 py-3.5">
                            @if($user->role === 'mitra')
                                <span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-0.5 text-xs font-medium text-green-700">
                                    <i data-lucide="store" class="h-3 w-3"></i> Mitra Printing
                                </span>
                            @elseif($user->role === 'kurir')
                                <span class="inline-flex items-center gap-1 rounded-full bg-orange-50 px-2 py-0.5 text-xs font-medium text-orange-700">
                                    <i data-lucide="truck" class="h-3 w-3"></i> Kurir
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 rounded-full bg-purple-50 px-2 py-0.5 text-xs font-medium text-purple-700">
                                    <i data-lucide="shield" class="h-3 w-3"></i> Administrator
                                </span>
                            @endif
                        </td>
                        <td class="px-4 py-3.5 text-xs text-muted-foreground">
                            {{ $user->created_at ? $user->created_at->format('d M Y, H:i') : '-' }}
                        </td>
                        <td class="px-4 py-3.5">
                            @if($user->status === 'approved')
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-2.5 py-0.5 text-xs font-medium text-emerald-700">
                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>Disetujui
                                </span>
                            @elseif($user->status === 'pending')
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 px-2.5 py-0.5 text-xs font-medium text-amber-700">
                                    <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>Menunggu Konfirmasi
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-red-50 px-2.5 py-0.5 text-xs font-medium text-red-700">
                                    <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>Ditolak
                                </span>
                            @endif
                        </td>
                        <td class="px-4 py-3.5 text-right">
                            <div class="inline-flex items-center gap-1.5 justify-end">
                                @if($user->status !== 'approved')
                                    <form action="{{ route('admin.verification.approve', $user->id) }}" method="POST" class="inline" onsubmit="return confirm('Konfirmasi dan setujui akun ini?')">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="inline-flex items-center gap-1 rounded-lg bg-[#235b48] px-2.5 py-1 text-xs font-medium text-white hover:bg-[#194333] transition-colors shadow-sm">
                                            <i data-lucide="check" class="h-3.5 w-3.5"></i> Setujui
                                        </button>
                                    </form>
                                @endif

                                @if($user->status !== 'rejected')
                                    <form action="{{ route('admin.verification.reject', $user->id) }}" method="POST" class="inline" onsubmit="return confirm('Tolak akun ini?')">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="inline-flex items-center gap-1 rounded-lg border border-red-200 bg-red-50 px-2.5 py-1 text-xs font-medium text-red-600 hover:bg-red-100 transition-colors">
                                            <i data-lucide="x" class="h-3.5 w-3.5"></i> Tolak
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-4 py-12 text-center text-xs text-muted-foreground">
                            Tidak ada akun kemitraan pada kategori ini.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
