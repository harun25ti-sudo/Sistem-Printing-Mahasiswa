@extends('layouts.admin.app')

@section('content')
<div class="py-4">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="flex items-center gap-2 text-sm text-muted-foreground">
            <li><a href="{{ route('dashboard') }}" class="hover:text-gray-900 transition-colors"><i data-lucide="home" class="h-4 w-4 inline -mt-0.5"></i></a></li>
            <li class="text-gray-400">/</li>
            <li class="font-medium text-gray-900">Data User</li>
        </ol>
    </nav>

    <div class="flex items-end justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-gray-900">Data User & Kelola Role</h1>
            <p class="mt-1 text-sm text-muted-foreground">Kelola akun dan ganti role (Pelanggan, Mitra, Kurir, Admin) secara instan seperti di preview.</p>
        </div>
        <a href="{{ route('user.create') }}" class="inline-flex items-center gap-2 rounded-lg px-4 py-2 text-sm font-semibold bg-primary text-white hover:bg-primary/90 transition-colors shadow-sm">
            <i data-lucide="plus" class="h-4 w-4"></i> Tambah User
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 flex items-center gap-3 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
            <i data-lucide="check-circle" class="h-4 w-4 flex-shrink-0 text-green-600"></i>
            {{ session('success') }}
        </div>
    @endif

    {{-- Stats Row Per Role --}}
    <div class="grid grid-cols-2 gap-4 sm:grid-cols-4 mb-6">
        <div class="rounded-xl border border-border bg-white p-4 shadow-sm">
            <div class="flex items-center justify-between mb-2">
                <span class="rounded-lg bg-blue-50 p-2 text-blue-600"><i data-lucide="users" class="h-4 w-4"></i></span>
                <span class="text-xs font-semibold text-blue-600">Pelanggan</span>
            </div>
            <strong class="block text-2xl font-bold text-gray-900">{{ $dataUser->where('role', 'pelanggan')->count() }}</strong>
            <small class="text-xs text-muted-foreground">Akun Pembeli</small>
        </div>

        <div class="rounded-xl border border-border bg-white p-4 shadow-sm">
            <div class="flex items-center justify-between mb-2">
                <span class="rounded-lg bg-green-50 p-2 text-green-600"><i data-lucide="store" class="h-4 w-4"></i></span>
                <span class="text-xs font-semibold text-green-600">Mitra</span>
            </div>
            <strong class="block text-2xl font-bold text-gray-900">{{ $dataUser->where('role', 'mitra')->count() }}</strong>
            <small class="text-xs text-muted-foreground">Mitra Printing</small>
        </div>

        <div class="rounded-xl border border-border bg-white p-4 shadow-sm">
            <div class="flex items-center justify-between mb-2">
                <span class="rounded-lg bg-orange-50 p-2 text-orange-500"><i data-lucide="truck" class="h-4 w-4"></i></span>
                <span class="text-xs font-semibold text-orange-500">Kurir</span>
            </div>
            <strong class="block text-2xl font-bold text-gray-900">{{ $dataUser->where('role', 'kurir')->count() }}</strong>
            <small class="text-xs text-muted-foreground">Kurir Pengantar</small>
        </div>

        <div class="rounded-xl border border-border bg-white p-4 shadow-sm">
            <div class="flex items-center justify-between mb-2">
                <span class="rounded-lg bg-purple-50 p-2 text-purple-600"><i data-lucide="shield" class="h-4 w-4"></i></span>
                <span class="text-xs font-semibold text-purple-600">Admin</span>
            </div>
            <strong class="block text-2xl font-bold text-gray-900">{{ $dataUser->where('role', 'admin')->count() }}</strong>
            <small class="text-xs text-muted-foreground">Administrator</small>
        </div>
    </div>

    {{-- Table --}}
    <div class="rounded-xl border border-border bg-white shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[700px] text-left border-collapse">
                <thead>
                    <tr class="border-b border-border bg-gray-50/80">
                        <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider text-muted-foreground">#</th>
                        <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider text-muted-foreground">Nama & Info</th>
                        <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider text-muted-foreground">Email</th>
                        <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider text-muted-foreground">Role Saat Ini</th>
                        <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider text-muted-foreground">Ganti Role Cepat</th>
                        <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider text-muted-foreground">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @forelse($dataUser as $i => $item)
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-4 py-3 text-xs text-muted-foreground">{{ $i + 1 }}</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-3">
                                <span class="h-9 w-9 rounded-full bg-primary/10 text-primary flex items-center justify-center font-bold text-sm flex-shrink-0">
                                    {{ strtoupper(substr($item->name, 0, 2)) }}
                                </span>
                                <div>
                                    <strong class="block text-sm font-semibold text-gray-900">{{ $item->name }}</strong>
                                    <small class="text-xs text-muted-foreground">Terdaftar {{ $item->created_at ? $item->created_at->format('d M Y') : '-' }}</small>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-700">{{ $item->email }}</td>
                        <td class="px-4 py-3">
                            @if($item->role === 'admin')
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-purple-50 px-2.5 py-0.5 text-xs font-medium text-purple-700"><span class="h-1.5 w-1.5 rounded-full bg-purple-500"></span>Administrator</span>
                            @elseif($item->role === 'mitra')
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-green-50 px-2.5 py-0.5 text-xs font-medium text-green-700"><span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>Mitra Printing</span>
                            @elseif($item->role === 'kurir')
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-orange-50 px-2.5 py-0.5 text-xs font-medium text-orange-700"><span class="h-1.5 w-1.5 rounded-full bg-orange-500"></span>Kurir</span>
                            @else
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-50 px-2.5 py-0.5 text-xs font-medium text-blue-700"><span class="h-1.5 w-1.5 rounded-full bg-blue-500"></span>Pelanggan</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            {{-- Role Switcher form --}}
                            <form action="{{ route('user.update-role', $item->id) }}" method="POST" class="inline-flex items-center gap-2">
                                @csrf
                                @method('PATCH')
                                <select name="role" onchange="this.form.submit()"
                                    class="rounded-lg border border-border bg-white px-2.5 py-1 text-xs font-medium text-gray-700 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                                    <option value="pelanggan" {{ ($item->role ?? 'pelanggan') === 'pelanggan' ? 'selected' : '' }}>Pelanggan</option>
                                    <option value="mitra" {{ ($item->role ?? '') === 'mitra' ? 'selected' : '' }}>Mitra</option>
                                    <option value="kurir" {{ ($item->role ?? '') === 'kurir' ? 'selected' : '' }}>Kurir</option>
                                    <option value="admin" {{ ($item->role ?? '') === 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                            </form>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-1.5">
                                <a href="{{ route('user.edit', $item->id) }}" class="inline-flex items-center gap-1 rounded-lg border border-border px-2.5 py-1.5 text-xs font-medium text-blue-700 bg-blue-50 hover:bg-blue-100 transition-colors" title="Edit">
                                    <i data-lucide="pencil" class="h-3.5 w-3.5"></i>
                                </a>
                                <form action="{{ route('user.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center gap-1 rounded-lg border border-red-200 px-2.5 py-1.5 text-xs font-medium text-red-600 bg-red-50 hover:bg-red-100 transition-colors" title="Hapus">
                                        <i data-lucide="trash-2" class="h-3.5 w-3.5"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-4 py-12 text-center text-muted-foreground">
                            Belum ada data user.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
