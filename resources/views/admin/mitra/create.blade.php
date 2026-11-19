@extends('layouts.admin.app')

@section('content')
<div class="py-4">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="flex items-center gap-2 text-sm text-muted-foreground">
            <li><a href="{{ route('dashboard') }}" class="hover:text-gray-900 transition-colors"><i data-lucide="home" class="h-4 w-4 inline -mt-0.5"></i></a></li>
            <li class="text-gray-400">/</li>
            <li><a href="{{ route('mitra.index') }}" class="hover:text-gray-900 transition-colors">Data Mitra</a></li>
            <li class="text-gray-400">/</li>
            <li class="font-medium text-gray-900">Tambah Mitra</li>
        </ol>
    </nav>

    <div class="flex items-end justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-gray-900">Tambah Mitra Baru</h1>
            <p class="mt-1 text-sm text-muted-foreground">Daftarkan mitra printing baru ke dalam sistem.</p>
        </div>
        <a href="{{ route('mitra.index') }}" class="inline-flex items-center gap-2 rounded-lg border border-border px-3 py-1.5 text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
            <i data-lucide="arrow-left" class="h-4 w-4"></i> Kembali
        </a>
    </div>

    @if($errors->any())
    <div class="mb-4 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
        <strong class="block font-semibold mb-1">Terdapat kesalahan:</strong>
        <ul class="list-disc list-inside space-y-0.5">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('mitra.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            {{-- Main Form --}}
            <div class="lg:col-span-2 space-y-5">
                <div class="rounded-xl border border-border bg-white p-6 shadow-sm">
                    <h2 class="text-sm font-bold text-gray-900 mb-4">Informasi Toko</h2>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div class="sm:col-span-2">
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5" for="nama_toko">Nama Toko <span class="text-red-500">*</span></label>
                            <input id="nama_toko" name="nama_toko" type="text" value="{{ old('nama_toko') }}" required placeholder="Contoh: Mitra Print Sudut"
                                class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm text-gray-900 placeholder:text-gray-400 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5" for="nama_pemilik">Nama Pemilik <span class="text-red-500">*</span></label>
                            <input id="nama_pemilik" name="nama_pemilik" type="text" value="{{ old('nama_pemilik') }}" required placeholder="Nama lengkap pemilik"
                                class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm text-gray-900 placeholder:text-gray-400 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5" for="email">Email <span class="text-red-500">*</span></label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" required placeholder="email@toko.com"
                                class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm text-gray-900 placeholder:text-gray-400 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5" for="phone">Nomor Telepon</label>
                            <input id="phone" name="phone" type="text" value="{{ old('phone') }}" placeholder="08xxxxxxxxxx"
                                class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm text-gray-900 placeholder:text-gray-400 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5" for="lokasi">Lokasi / Area</label>
                            <input id="lokasi" name="lokasi" type="text" value="{{ old('lokasi') }}" placeholder="Contoh: Umban Sari, dekat kampus"
                                class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm text-gray-900 placeholder:text-gray-400 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                        </div>
                        <div class="sm:col-span-2">
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5" for="alamat">Alamat Lengkap</label>
                            <textarea id="alamat" name="alamat" rows="2" placeholder="Jl. nama jalan, RT/RW, kelurahan..."
                                class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm text-gray-900 placeholder:text-gray-400 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary resize-y">{{ old('alamat') }}</textarea>
                        </div>
                        <div class="sm:col-span-2">
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5" for="deskripsi">Deskripsi Layanan</label>
                            <textarea id="deskripsi" name="deskripsi" rows="3" placeholder="Cetak dokumen, jilid, laminasi..."
                                class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm text-gray-900 placeholder:text-gray-400 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary resize-y">{{ old('deskripsi') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="rounded-xl border border-border bg-white p-6 shadow-sm">
                    <h2 class="text-sm font-bold text-gray-900 mb-4">Harga & Kapasitas</h2>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5" for="harga_bw">Harga B&W / lbr (Rp) <span class="text-red-500">*</span></label>
                            <input id="harga_bw" name="harga_bw" type="number" value="{{ old('harga_bw', 300) }}" min="0" required
                                class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm text-gray-900 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5" for="harga_warna">Harga Warna / lbr (Rp) <span class="text-red-500">*</span></label>
                            <input id="harga_warna" name="harga_warna" type="number" value="{{ old('harga_warna', 1000) }}" min="0" required
                                class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm text-gray-900 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5" for="kapasitas_maks">Kapasitas Maks <span class="text-red-500">*</span></label>
                            <input id="kapasitas_maks" name="kapasitas_maks" type="number" value="{{ old('kapasitas_maks', 6) }}" min="1" required
                                class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm text-gray-900 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Sidebar Form --}}
            <div class="space-y-5">
                <div class="rounded-xl border border-border bg-white p-6 shadow-sm">
                    <h2 class="text-sm font-bold text-gray-900 mb-4">Status & Layanan</h2>
                    <div class="space-y-3">
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5" for="status">Status Mitra <span class="text-red-500">*</span></label>
                            <select id="status" name="status" class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm text-gray-900 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                                <option value="pending" {{ old('status','pending')==='pending'?'selected':'' }}>Pending (Menunggu Verifikasi)</option>
                                <option value="aktif" {{ old('status')==='aktif'?'selected':'' }}>Aktif</option>
                                <option value="nonaktif" {{ old('status')==='nonaktif'?'selected':'' }}>Nonaktif</option>
                            </select>
                        </div>
                        <div class="space-y-2 pt-2">
                            <label class="block text-xs font-semibold text-gray-600 mb-2">Fasilitas</label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" name="cetak_warna" value="1" {{ old('cetak_warna','1')?'checked':'' }} class="h-4 w-4 rounded border-border text-primary focus:ring-primary">
                                <span class="text-sm text-gray-700">Cetak Warna</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" name="layanan_antar" value="1" {{ old('layanan_antar')?'checked':'' }} class="h-4 w-4 rounded border-border text-primary focus:ring-primary">
                                <span class="text-sm text-gray-700">Layanan Antar</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" name="near_campus" value="1" {{ old('near_campus')?'checked':'' }} class="h-4 w-4 rounded border-border text-primary focus:ring-primary">
                                <span class="text-sm text-gray-700">Dekat Kampus</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="rounded-xl border border-border bg-white p-6 shadow-sm">
                    <h2 class="text-sm font-bold text-gray-900 mb-4">Foto Toko</h2>
                    <label for="foto" class="flex flex-col items-center gap-3 cursor-pointer rounded-xl border-2 border-dashed border-border p-5 hover:border-primary hover:bg-primary/5 transition-colors text-center">
                        <i data-lucide="image-plus" class="h-8 w-8 text-gray-300"></i>
                        <span class="text-xs font-medium text-gray-600">Klik untuk upload foto</span>
                        <span class="text-xs text-muted-foreground">JPG, PNG, WEBP · maks. 2MB</span>
                        <input type="file" id="foto" name="foto" accept="image/*" class="sr-only" onchange="previewFoto(this)">
                    </label>
                    <img id="foto-preview" src="" alt="Preview" class="hidden mt-3 rounded-lg w-full object-cover max-h-40">
                </div>

                <button type="submit" class="w-full inline-flex items-center justify-center gap-2 rounded-lg px-4 py-2.5 text-sm font-semibold bg-primary text-white hover:bg-primary/90 transition-colors shadow-sm">
                    <i data-lucide="save" class="h-4 w-4"></i>
                    Simpan Mitra
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
