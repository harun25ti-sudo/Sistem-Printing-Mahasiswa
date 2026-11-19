@extends('layouts.admin.app')

@section('content')
<div class="py-4">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="flex items-center gap-2 text-sm text-muted-foreground">
            <li><a href="{{ route('dashboard') }}" class="hover:text-gray-900 transition-colors"><i data-lucide="home" class="h-4 w-4 inline -mt-0.5"></i></a></li>
            <li class="text-gray-400">/</li>
            <li><a href="{{ route('user.index') }}" class="hover:text-gray-900 transition-colors">Data User</a></li>
            <li class="text-gray-400">/</li>
            <li class="font-medium text-gray-900">Edit User</li>
        </ol>
    </nav>

    <div class="flex items-end justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-gray-900">Edit User: {{ $user->name }}</h1>
            <p class="mt-1 text-sm text-muted-foreground">Perbarui informasi akun dan peran/role pengguna.</p>
        </div>
        <a href="{{ route('user.index') }}" class="inline-flex items-center gap-2 rounded-lg border border-border px-3 py-1.5 text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
            <i data-lucide="arrow-left" class="h-4 w-4"></i> Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="mb-4 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
            <strong class="block font-semibold mb-1">Terdapat kesalahan input:</strong>
            <ul class="list-disc list-inside space-y-0.5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="max-w-2xl">
        <div class="rounded-xl border border-border bg-white p-6 shadow-sm">
            <form action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <div>
                        <label for="name" class="block text-xs font-semibold text-gray-600 mb-1.5">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required
                            class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm text-gray-900 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                    </div>

                    <div>
                        <label for="email" class="block text-xs font-semibold text-gray-600 mb-1.5">Email <span class="text-red-500">*</span></label>
                        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required
                            class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm text-gray-900 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                    </div>

                    <div>
                        <label for="role" class="block text-xs font-semibold text-gray-600 mb-1.5">Peran / Role Akun <span class="text-red-500">*</span></label>
                        <select id="role" name="role" required
                            class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm text-gray-900 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                            <option value="pelanggan" {{ old('role', $user->role) === 'pelanggan' ? 'selected' : '' }}>Pelanggan (Pembeli)</option>
                            <option value="mitra" {{ old('role', $user->role) === 'mitra' ? 'selected' : '' }}>Mitra Printing</option>
                            <option value="kurir" {{ old('role', $user->role) === 'kurir' ? 'selected' : '' }}>Kurir</option>
                            <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Administrator</option>
                        </select>
                    </div>

                    <div class="border-t border-border pt-4">
                        <p class="text-xs text-muted-foreground mb-3">Kosongkan password jika tidak ingin mengubahnya.</p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="password" class="block text-xs font-semibold text-gray-600 mb-1.5">Password Baru</label>
                                <input type="password" id="password" name="password" minlength="8"
                                    class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm text-gray-900 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                            </div>
                            <div>
                                <label for="password_confirmation" class="block text-xs font-semibold text-gray-600 mb-1.5">Konfirmasi Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" minlength="8"
                                    class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm text-gray-900 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                            </div>
                        </div>
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="inline-flex items-center gap-2 rounded-lg px-4 py-2 text-sm font-semibold bg-primary text-white hover:bg-primary/90 transition-colors shadow-sm">
                            <i data-lucide="save" class="h-4 w-4"></i> Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
