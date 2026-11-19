@extends('layouts.admin.app')

@section('content')
<div class="py-4">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="flex items-center gap-2 text-sm text-muted-foreground">
            <li><a href="{{ route('dashboard') }}" class="hover:text-gray-900"><i data-lucide="home" class="h-4 w-4 inline -mt-0.5"></i></a></li>
            <li class="text-gray-400">/</li>
            <li><a href="{{ route('kurir.index') }}" class="hover:text-gray-900">Data Kurir</a></li>
            <li class="text-gray-400">/</li>
            <li class="font-medium text-gray-900">Tambah Kurir</li>
        </ol>
    </nav>

    <div class="flex items-end justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-gray-900">Tambah Kurir Baru</h1>
            <p class="mt-1 text-sm text-muted-foreground">Daftarkan kurir pengantaran baru ke dalam sistem.</p>
        </div>
        <a href="{{ route('kurir.index') }}" class="inline-flex items-center gap-2 rounded-lg border border-border px-3 py-1.5 text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
            <i data-lucide="arrow-left" class="h-4 w-4"></i> Kembali
        </a>
    </div>

    @if($errors->any())
    <div class="mb-4 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
        <strong class="block font-semibold mb-1">Terdapat kesalahan:</strong>
        <ul class="list-disc list-inside space-y-0.5">
            @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('kurir.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            <div class="lg:col-span-2">
                <div class="rounded-xl border border-border bg-white p-6 shadow-sm">
                    <h2 class="text-sm font-bold text-gray-900 mb-4">Informasi Kurir</h2>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div class="sm:col-span-2">
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Nama Lengkap *</label>
                            <input name="nama" type="text" value="{{ old('nama') }}" required placeholder="Nama lengkap kurir"
                                class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Email *</label>
                            <input name="email" type="email" value="{{ old('email') }}" required placeholder="email@kurir.com"
                                class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Nomor Telepon</label>
                            <input name="phone" type="text" value="{{ old('phone') }}" placeholder="08xxxxxxxxxx"
                                class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Jenis Kendaraan</label>
                            <select name="jenis_kendaraan" class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                                <option value="">-- Pilih kendaraan --</option>
                                <option value="Motor" {{ old('jenis_kendaraan')==='Motor'?'selected':'' }}>Motor</option>
                                <option value="Sepeda" {{ old('jenis_kendaraan')==='Sepeda'?'selected':'' }}>Sepeda</option>
                                <option value="Mobil" {{ old('jenis_kendaraan')==='Mobil'?'selected':'' }}>Mobil</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Nomor Kendaraan</label>
                            <input name="no_kendaraan" type="text" value="{{ old('no_kendaraan') }}" placeholder="BM 1234 XX"
                                class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-y-5">
                <div class="rounded-xl border border-border bg-white p-6 shadow-sm">
                    <h2 class="text-sm font-bold text-gray-900 mb-4">Status</h2>
                    <select name="status" class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                        <option value="aktif" {{ old('status','aktif')==='aktif'?'selected':'' }}>Aktif</option>
                        <option value="nonaktif" {{ old('status')==='nonaktif'?'selected':'' }}>Nonaktif</option>
                        <option value="bertugas" {{ old('status')==='bertugas'?'selected':'' }}>Bertugas</option>
                    </select>
                </div>
                <div class="rounded-xl border border-border bg-white p-6 shadow-sm">
                    <h2 class="text-sm font-bold text-gray-900 mb-4">Foto Kurir</h2>
                    <label for="foto" class="flex flex-col items-center gap-3 cursor-pointer rounded-xl border-2 border-dashed border-border p-5 hover:border-primary hover:bg-primary/5 transition-colors text-center">
                        <i data-lucide="user-circle" class="h-8 w-8 text-gray-300"></i>
                        <span class="text-xs font-medium text-gray-600">Upload foto kurir</span>
                        <span class="text-xs text-muted-foreground">JPG, PNG · maks. 2MB</span>
                        <input type="file" id="foto" name="foto" accept="image/*" class="sr-only" onchange="previewFoto(this)">
                    </label>
                    <img id="foto-preview" src="" alt="Preview" class="hidden mt-3 rounded-full w-24 h-24 object-cover mx-auto border-2 border-border">
                </div>
                <button type="submit" class="w-full inline-flex items-center justify-center gap-2 rounded-lg px-4 py-2.5 text-sm font-semibold bg-primary text-white hover:bg-primary/90 transition-colors shadow-sm">
                    <i data-lucide="save" class="h-4 w-4"></i> Simpan Kurir
                </button>
            </div>
        </div>
    </form>
</div>
<script>
function previewFoto(input) {
    const preview = document.getElementById('foto-preview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => { preview.src = e.target.result; preview.classList.remove('hidden'); };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
