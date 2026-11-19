@extends('layouts.admin.app')

@section('content')
<div class="py-4">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="flex items-center gap-2 text-sm text-muted-foreground">
            <li><a href="{{ route('dashboard') }}" class="hover:text-gray-900"><i data-lucide="home" class="h-4 w-4 inline -mt-0.5"></i></a></li>
            <li class="text-gray-400">/</li>
            <li><a href="{{ route('mitra.index') }}" class="hover:text-gray-900">Data Mitra</a></li>
            <li class="text-gray-400">/</li>
            <li class="font-medium text-gray-900">Edit Mitra</li>
        </ol>
    </nav>

    <div class="flex items-end justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-gray-900">Edit Mitra: {{ $mitra->nama_toko }}</h1>
            <p class="mt-1 text-sm text-muted-foreground">Perbarui informasi mitra printing.</p>
        </div>
        <a href="{{ route('mitra.index') }}" class="inline-flex items-center gap-2 rounded-lg border border-border px-3 py-1.5 text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
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

    <form action="{{ route('mitra.update', $mitra->mitra_id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            <div class="lg:col-span-2 space-y-5">
                <div class="rounded-xl border border-border bg-white p-6 shadow-sm">
                    <h2 class="text-sm font-bold text-gray-900 mb-4">Informasi Toko</h2>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div class="sm:col-span-2">
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Nama Toko *</label>
                            <input name="nama_toko" type="text" value="{{ old('nama_toko', $mitra->nama_toko) }}" required class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Nama Pemilik *</label>
                            <input name="nama_pemilik" type="text" value="{{ old('nama_pemilik', $mitra->nama_pemilik) }}" required class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Email *</label>
                            <input name="email" type="email" value="{{ old('email', $mitra->email) }}" required class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Nomor Telepon</label>
                            <input name="phone" type="text" value="{{ old('phone', $mitra->phone) }}" class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Lokasi / Area</label>
                            <input name="lokasi" type="text" value="{{ old('lokasi', $mitra->lokasi) }}" class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                        </div>
                        <div class="sm:col-span-2">
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Alamat Lengkap</label>
                            <textarea name="alamat" rows="2" class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary resize-y">{{ old('alamat', $mitra->alamat) }}</textarea>
                        </div>
                        <div class="sm:col-span-2">
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Deskripsi Layanan</label>
                            <textarea name="deskripsi" rows="3" class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary resize-y">{{ old('deskripsi', $mitra->deskripsi) }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="rounded-xl border border-border bg-white p-6 shadow-sm">
                    <h2 class="text-sm font-bold text-gray-900 mb-4">Harga & Kapasitas</h2>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Harga B&W / lbr (Rp) *</label>
                            <input name="harga_bw" type="number" value="{{ old('harga_bw', $mitra->harga_bw) }}" min="0" required class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Harga Warna / lbr (Rp) *</label>
                            <input name="harga_warna" type="number" value="{{ old('harga_warna', $mitra->harga_warna) }}" min="0" required class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Kapasitas Maks *</label>
                            <input name="kapasitas_maks" type="number" value="{{ old('kapasitas_maks', $mitra->kapasitas_maks) }}" min="1" required class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-y-5">
                <div class="rounded-xl border border-border bg-white p-6 shadow-sm">
                    <h2 class="text-sm font-bold text-gray-900 mb-4">Status & Layanan</h2>
                    <div class="space-y-3">
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Status Mitra *</label>
                            <select name="status" class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                                <option value="pending" {{ old('status',$mitra->status)==='pending'?'selected':'' }}>Pending</option>
                                <option value="aktif" {{ old('status',$mitra->status)==='aktif'?'selected':'' }}>Aktif</option>
                                <option value="nonaktif" {{ old('status',$mitra->status)==='nonaktif'?'selected':'' }}>Nonaktif</option>
                            </select>
                        </div>
                        <div class="space-y-2 pt-2">
                            <label class="block text-xs font-semibold text-gray-600 mb-2">Fasilitas</label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" name="cetak_warna" value="1" {{ $mitra->cetak_warna?'checked':'' }} class="h-4 w-4 rounded border-border text-primary">
                                <span class="text-sm text-gray-700">Cetak Warna</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" name="layanan_antar" value="1" {{ $mitra->layanan_antar?'checked':'' }} class="h-4 w-4 rounded border-border text-primary">
                                <span class="text-sm text-gray-700">Layanan Antar</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" name="near_campus" value="1" {{ $mitra->near_campus?'checked':'' }} class="h-4 w-4 rounded border-border text-primary">
                                <span class="text-sm text-gray-700">Dekat Kampus</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="rounded-xl border border-border bg-white p-6 shadow-sm">
                    <h2 class="text-sm font-bold text-gray-900 mb-4">Foto Toko</h2>
                    @if($mitra->foto)
                        <img src="{{ asset('storage/' . $mitra->foto) }}" alt="Foto saat ini" class="rounded-lg w-full object-cover max-h-40 mb-3 border border-border">
                        <p class="text-xs text-muted-foreground mb-3">Upload foto baru untuk mengganti foto saat ini.</p>
                    @endif
                    <label for="foto" class="flex flex-col items-center gap-2 cursor-pointer rounded-xl border-2 border-dashed border-border p-4 hover:border-primary hover:bg-primary/5 transition-colors text-center">
                        <i data-lucide="image-plus" class="h-7 w-7 text-gray-300"></i>
                        <span class="text-xs font-medium text-gray-600">Klik untuk upload</span>
                        <input type="file" id="foto" name="foto" accept="image/*" class="sr-only" onchange="previewFoto(this)">
                    </label>
                    <img id="foto-preview" src="" alt="Preview" class="hidden mt-3 rounded-lg w-full object-cover max-h-40">
                </div>
                <button type="submit" class="w-full inline-flex items-center justify-center gap-2 rounded-lg px-4 py-2.5 text-sm font-semibold bg-primary text-white hover:bg-primary/90 transition-colors shadow-sm">
                    <i data-lucide="save" class="h-4 w-4"></i> Simpan Perubahan
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
