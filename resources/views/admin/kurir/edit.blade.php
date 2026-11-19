@extends('layouts.admin.app')

@section('content')
<div class="py-4">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="flex items-center gap-2 text-sm text-muted-foreground">
            <li><a href="{{ route('dashboard') }}" class="hover:text-gray-900"><i data-lucide="home" class="h-4 w-4 inline -mt-0.5"></i></a></li>
            <li class="text-gray-400">/</li>
            <li><a href="{{ route('kurir.index') }}" class="hover:text-gray-900">Data Kurir</a></li>
            <li class="text-gray-400">/</li>
            <li class="font-medium text-gray-900">Edit Kurir</li>
        </ol>
    </nav>

    <div class="flex items-end justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-gray-900">Edit Kurir: {{ $kurir->nama }}</h1>
            <p class="mt-1 text-sm text-muted-foreground">Perbarui informasi kurir pengantaran.</p>
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

    <form action="{{ route('kurir.update', $kurir->kurir_id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            <div class="lg:col-span-2">
                <div class="rounded-xl border border-border bg-white p-6 shadow-sm">
                    <h2 class="text-sm font-bold text-gray-900 mb-4">Informasi Kurir</h2>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div class="sm:col-span-2">
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Nama Lengkap *</label>
                            <input name="nama" type="text" value="{{ old('nama', $kurir->nama) }}" required class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Email *</label>
                            <input name="email" type="email" value="{{ old('email', $kurir->email) }}" required class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Nomor Telepon</label>
                            <input name="phone" type="text" value="{{ old('phone', $kurir->phone) }}" class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Jenis Kendaraan</label>
                            <select name="jenis_kendaraan" class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                                <option value="">-- Pilih kendaraan --</option>
                                <option value="Motor" {{ old('jenis_kendaraan',$kurir->jenis_kendaraan)==='Motor'?'selected':'' }}>Motor</option>
                                <option value="Sepeda" {{ old('jenis_kendaraan',$kurir->jenis_kendaraan)==='Sepeda'?'selected':'' }}>Sepeda</option>
                                <option value="Mobil" {{ old('jenis_kendaraan',$kurir->jenis_kendaraan)==='Mobil'?'selected':'' }}>Mobil</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Nomor Kendaraan</label>
                            <input name="no_kendaraan" type="text" value="{{ old('no_kendaraan', $kurir->no_kendaraan) }}" class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-y-5">
                <div class="rounded-xl border border-border bg-white p-6 shadow-sm">
                    <h2 class="text-sm font-bold text-gray-900 mb-4">Status</h2>
                    <select name="status" class="w-full rounded-lg border border-border bg-white px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                        <option value="aktif" {{ old('status',$kurir->status)==='aktif'?'selected':'' }}>Aktif</option>
                        <option value="nonaktif" {{ old('status',$kurir->status)==='nonaktif'?'selected':'' }}>Nonaktif</option>
                        <option value="bertugas" {{ old('status',$kurir->status)==='bertugas'?'selected':'' }}>Bertugas</option>
                    </select>
                </div>
                <div class="rounded-xl border border-border bg-white p-6 shadow-sm">
                    <h2 class="text-sm font-bold text-gray-900 mb-4">Foto Kurir</h2>
                    @if($kurir->foto)
                        <img src="{{ asset('storage/' . $kurir->foto) }}" alt="{{ $kurir->nama }}" class="rounded-full w-20 h-20 object-cover mx-auto border-2 border-border mb-3">
                    @endif
                    <label for="foto" class="flex flex-col items-center gap-2 cursor-pointer rounded-xl border-2 border-dashed border-border p-4 hover:border-primary hover:bg-primary/5 transition-colors text-center">
                        <i data-lucide="user-circle" class="h-7 w-7 text-gray-300"></i>
                        <span class="text-xs font-medium text-gray-600">Upload foto baru</span>
                        <input type="file" id="foto" name="foto" accept="image/*" class="sr-only" onchange="previewFoto(this)">
                    </label>
                    <img id="foto-preview" src="" alt="Preview" class="hidden mt-3 rounded-full w-20 h-20 object-cover mx-auto border-2 border-border">
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
