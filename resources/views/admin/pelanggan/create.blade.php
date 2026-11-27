@extends('layouts.admin.app')

@section('content')

<style>
/* =========================================================
   Tampilan form Tambah Pelanggan (hanya styling, tanpa ubah logika)
   Semua aturan dibatasi ke .pf-page agar halaman lain aman.
   Ganti warna utama lewat variabel --pf-primary.
   ========================================================= */
.pf-page{
    --pf-primary:#4f46e5; --pf-primary-dark:#4338ca; --pf-primary-soft:#eef2ff;
    --pf-text:#1f2937; --pf-muted:#6b7280; --pf-border:#e5e7eb; --pf-danger:#dc2626;
    color:var(--pf-text); font-size:14px;
}

/* ---------- Header halam an ---------- */
.pf-page .breadcrumb{ display:flex; flex-wrap:wrap; align-items:center; gap:6px; list-style:none; margin:0 0 12px; padding:0; font-size:13px; }
.pf-page .breadcrumb-item{ display:flex; align-items:center; gap:6px; color:var(--pf-muted); }
.pf-page .breadcrumb-item + .breadcrumb-item::before{ content:"/"; color:#cbd5e1; }
.pf-page .breadcrumb-item a{ color:var(--pf-muted); text-decoration:none; }
.pf-page .breadcrumb-item a:hover{ color:var(--pf-primary); }
.pf-page .breadcrumb-item.active{ color:var(--pf-text); font-weight:600; }
.pf-page .icon-xxs{ width:14px; height:14px; }
.pf-page .pf-header{ display:flex; justify-content:space-between; align-items:flex-end; flex-wrap:wrap; gap:12px; }
.pf-page .pf-header .h4{ margin:0 0 4px; font-size:24px; font-weight:800; color:#111827; }
.pf-page .pf-header p{ margin:0; color:var(--pf-muted); }

/* ---------- Kartu ---------- */
.pf-page .components-section{
    background:#fff; border:1px solid var(--pf-border); border-radius:18px;
    box-shadow:0 10px 30px rgba(17,24,39,.06); overflow:hidden;
}
.pf-page .components-section .card-body{ padding:0; }

/* ---------- Grid 12 kolom ---------- */
.pf-page .row{ display:grid; grid-template-columns:repeat(12,minmax(0,1fr)); column-gap:20px; margin:0; }
.pf-page .row > [class*="col-"]{ grid-column:span 12; width:auto; max-width:none; padding:0; margin:0; }
@media (min-width:576px){ .pf-page .row > .col-sm-6{ grid-column:span 6; } }
@media (min-width:768px){
    .pf-page .row > .col-md-6{ grid-column:span 6; }
    .pf-page .row > .col-md-3{ grid-column:span 3; }
}
@media (min-width:992px){ .pf-page .row > .col-lg-4{ grid-column:span 4; } }

/* ---------- Bagian (section) ---------- */
.pf-page .pf-section{ padding:28px 32px; border-bottom:1px solid var(--pf-border); }
.pf-page .pf-section:nth-of-type(even){ background:#fafbff; }
.pf-page .pf-section-head{ display:flex; align-items:center; gap:14px; margin-bottom:22px; }
.pf-page .pf-badge{
    flex:0 0 auto; width:38px; height:38px; border-radius:12px;
    display:flex; align-items:center; justify-content:center;
    background:var(--pf-primary-soft); color:var(--pf-primary);
}
.pf-page .pf-badge svg{ width:20px; height:20px; }
.pf-page .pf-section-head h5{ margin:0; font-size:16px; font-weight:700; color:#111827; }
.pf-page .pf-section-head small{ display:block; margin-top:2px; color:var(--pf-muted); font-size:12px; }

/* ---------- Utilitas yang dipakai ---------- */
.pf-page .mb-3{ margin-bottom:18px; }
.pf-page .text-danger{ color:var(--pf-danger); }

/* ---------- Label & input ---------- */
.pf-page label{ display:block; margin-bottom:6px; font-size:13px; font-weight:600; color:#374151; }
.pf-page .form-control, .pf-page .form-select{
    display:block; width:100%; box-sizing:border-box; padding:11px 14px;
    background:#fff; color:#111827; font-size:14px;
    border:1px solid #d1d5db; border-radius:10px; outline:none;
    transition:border-color .15s, box-shadow .15s, background .15s;
}
.pf-page .form-control:hover, .pf-page .form-select:hover{ border-color:#a5b4fc; }
.pf-page .form-control::placeholder{ color:#9ca3af; }
.pf-page .form-control:focus, .pf-page .form-select:focus{
    border-color:var(--pf-primary); box-shadow:0 0 0 4px rgba(79,70,229,.14);
}
.pf-page textarea.form-control{ min-height:120px; resize:vertical; line-height:1.5; }
.pf-page .form-text{ margin-top:6px; font-size:12px; color:var(--pf-muted); }

/* ---------- Input group (Birthday) ---------- */
.pf-page .input-group{ display:flex; align-items:stretch; flex-wrap:nowrap; }
.pf-page .input-group-text{
    display:flex; align-items:center; padding:0 14px; background:var(--pf-primary-soft);
    border:1px solid #d1d5db; border-right:0; border-radius:10px 0 0 10px; color:var(--pf-primary);
}
.pf-page .input-group .form-control{ flex:1 1 auto; width:1%; border-radius:0 10px 10px 0; }
.pf-page .icon-xs{ width:16px; height:16px; }

/* ---------- Upload file ---------- */
.pf-page input[type=file].form-control{ padding:10px; background:#f8fafc; border:2px dashed #c7d2fe; cursor:pointer; }
.pf-page input[type=file].form-control:hover{ background:var(--pf-primary-soft); border-color:var(--pf-primary); }
.pf-page input[type=file]::file-selector-button{
    margin-right:12px; padding:8px 16px; border:0; border-radius:8px;
    background:var(--pf-primary); color:#fff; font-weight:600; cursor:pointer; transition:background .15s;
}
.pf-page input[type=file]::file-selector-button:hover{ background:var(--pf-primary-dark); }
.pf-page .pf-preview{
    display:none; margin-top:12px; width:100%; max-height:170px; object-fit:cover;
    border-radius:12px; border:1px solid var(--pf-border); box-shadow:0 4px 12px rgba(17,24,39,.08);
}
.pf-page .pf-preview.show{ display:block; }
.pf-page #profile_preview{ width:130px; height:130px; border-radius:50%; }

/* ---------- Error validasi ---------- */
.pf-page .is-invalid{ border-color:var(--pf-danger); background:#fef2f2; }
.pf-page .invalid-feedback{ display:block; margin-top:5px; font-size:12px; color:var(--pf-danger); }

/* ---------- Tombol ---------- */
.pf-page .btn{
    display:inline-flex; align-items:center; justify-content:center; padding:11px 24px;
    border-radius:10px; font-size:14px; font-weight:600; text-decoration:none; cursor:pointer;
    transition:background .15s, transform .1s, box-shadow .15s;
}
.pf-page .btn:active{ transform:translateY(1px); }
.pf-page .btn-primary{ background:var(--pf-primary); color:#fff; border:1px solid var(--pf-primary); box-shadow:0 6px 16px rgba(79,70,229,.3); }
.pf-page .btn-primary:hover{ background:var(--pf-primary-dark); }
.pf-page .btn-outline-secondary, .pf-page .btn-outline-gray-600{ background:#fff; color:#4b5563; border:1px solid #d1d5db; }
.pf-page .btn-outline-secondary:hover, .pf-page .btn-outline-gray-600:hover{ background:#f3f4f6; }
.pf-page .pf-actions{
    position:sticky; bottom:0; z-index:5; display:flex; align-items:center; gap:10px;
    padding:16px 32px; background:rgba(255,255,255,.92); backdrop-filter:blur(6px);
    border-top:1px solid var(--pf-border);
}
.pf-page .pf-actions .col-12{ display:flex; align-items:center; gap:10px; }

@media (max-width:575px){
    .pf-page .pf-section{ padding:22px 18px; }
    .pf-page .pf-actions{ padding:14px 18px; }
}
</style>

<div class="pf-page">

<div class="py-4">
<nav aria-label="breadcrumb" class="d-none d-md-inline-block">
<ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
<li class="breadcrumb-item">
<a href="#">
<svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
</path>
</svg>
</a>
</li>
<li class="breadcrumb-item"><a href="{{ route('pelanggan.index') }}">Pelanggan</a></li>
<li class="breadcrumb-item active" aria-current="page">Tambah Pelanggan</li>
</ol>
</nav>
<div class="pf-header d-flex justify-content-between w-100 flex-wrap">
<div class="mb-3 mb-lg-0">
<h1 class="h4">Tambah Pelanggan</h1>
<p class="mb-0">Form untuk menambahkan data pelanggan dan profil portofolio.</p>
</div>
<div>
<a href="{{ route('pelanggan.index') }}" class="btn btn-outline-gray-600 d-inline-flex align-items-center">
Kembali
</a>
</div>
</div>
</div>

<div class="row" style="display:block;">
<div class="col-12 mb-4">
<div class="card border-0 shadow components-section">
<div class="card-body">
<form action="{{ route('pelanggan.store') }}" method="POST" enctype="multipart/form-data">
@csrf

{{-- ================= 1. Informasi Dasar ================= --}}
<div class="pf-section">
<div class="row">
<div class="col-12">
<div class="pf-section-head">
<span class="pf-badge"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg></span>
<div><h5>Informasi Dasar Pelanggan</h5><small>Identitas dan kontak utama pelanggan</small></div>
</div>
</div>
<div class="col-lg-4 col-sm-6">
<div class="mb-3">
<label for="first_name">First Name <span class="text-danger">*</span></label>
<input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name') }}">
@error('first_name')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<div class="mb-3">
<label for="last_name">Last Name <span class="text-danger">*</span></label>
<input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name') }}">
@error('last_name')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-lg-4 col-sm-6">
<div class="mb-3">
<label for="birthday">Birthday</label>
<div class="input-group">
<span class="input-group-text">
<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
</span>
<input type="date" class="form-control @error('birthday') is-invalid @enderror" id="birthday" name="birthday" value="{{ old('birthday') }}">
</div>
@error('birthday')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<div class="mb-3">
<label for="gender">Gender</label>
<select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender">
<option value="">Pilih Gender</option>
<option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
<option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
<option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
</select>
@error('gender')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-lg-4 col-sm-12">
<div class="mb-3">
<label for="email">Email <span class="text-danger">*</span></label>
<input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
@error('email')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<div class="mb-3">
<label for="phone">Phone</label>
<input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
@error('phone')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
</div>
</div>
</div>

{{-- ================= 2. Portofolio & Pekerjaan ================= --}}
<div class="pf-section">
<div class="row">
<div class="col-12">
<div class="pf-section-head">
<span class="pf-badge"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.9 23.9 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg></span>
<div><h5>Data Portofolio & Pekerjaan</h5><small>Profesi, lokasi, keahlian, dan layanan</small></div>
</div>
</div>
<div class="col-md-6 mb-3">
    <label for="title" class="form-label">Profesi / Title</label>
    <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Contoh: Product Designer, UI/UX Expert" value="{{ old('title') }}">
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-6 mb-3">
    <label for="address" class="form-label">Lokasi / Alamat</label>
    <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Contoh: Riau, Indonesia" value="{{ old('address') }}">
    @error('address')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="col-md-6 mb-3">
    <label for="skills" class="form-label">Skills (Pisahkan dengan koma)</label>
    <input type="text" id="skills" name="skills" class="form-control @error('skills') is-invalid @enderror" placeholder="Figma, UI/UX, Web Design, Branding" value="{{ old('skills') }}">
    @error('skills')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-6 mb-3">
    <label for="services" class="form-label">Services / Layanan (Pisahkan dengan koma)</label>
    <input type="text" id="services" name="services" class="form-control @error('services') is-invalid @enderror" placeholder="Website Design, Mobile App Design, Brand Identity" value="{{ old('services') }}">
    @error('services')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
</div>
</div>

{{-- ================= 3. Foto & Dokumen CV ================= --}}
<div class="pf-section">
<div class="row">
<div class="col-12">
<div class="pf-section-head">
<span class="pf-badge"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg></span>
<div><h5>Foto & Dokumen CV</h5><small>Unggah foto profil dan banner</small></div>
</div>
</div>
<div class="col-md-6 mb-3">
    <label for="profile_image" class="form-label">Foto Profil Utama</label>
    <input type="file" id="profile_image" name="profile_image" class="form-control @error('profile_image') is-invalid @enderror" accept="image/*" data-preview="profile_preview">
    <div class="form-text">Format: JPG, PNG, WEBP (Max 4MB). Disarankan foto portrait seperti referensi.</div>
    <img id="profile_preview" class="pf-preview" alt="Pratinjau foto profil">
    @error('profile_image')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-6 mb-3">
    <label for="banner_image" class="form-label">Banner Image / Foto Sekunder</label>
    <input type="file" id="banner_image" name="banner_image" class="form-control @error('banner_image') is-invalid @enderror" accept="image/*" data-preview="banner_preview">
    <div class="form-text">Foto pose tambahan untuk bagian "Hi There!" atau banner profil.</div>
    <img id="banner_preview" class="pf-preview" alt="Pratinjau banner">
    @error('banner_image')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
</div>
</div>

{{-- ================= 4. Deskripsi & Sosial Media ================= --}}
<div class="pf-section">
<div class="row">
<div class="col-12">
<div class="pf-section-head">
<span class="pf-badge"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg></span>
<div><h5>Deskripsi & Tautan Sosial Media</h5><small>Bio singkat, tentang saya, dan link profil</small></div>
</div>
</div>
<div class="col-md-6 mb-3">
    <label for="bio" class="form-label">Bio Singkat (Hero Section)</label>
    <textarea id="bio" name="bio" rows="3" class="form-control @error('bio') is-invalid @enderror" placeholder="Deskripsi singkat yang tampil di header atas...">{{ old('bio') }}</textarea>
    @error('bio')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-6 mb-3">
    <label for="about" class="form-label">Tentang Saya (Need Creative Design?)</label>
    <textarea id="about" name="about" rows="3" class="form-control @error('about') is-invalid @enderror" placeholder="Deskripsi lengkap layanan, pengalaman, dll...">{{ old('about') }}</textarea>
    @error('about')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="col-md-3 col-sm-6 mb-3">
    <label for="behance_url" class="form-label">Behance URL / Username</label>
    <input type="text" id="behance_url" name="behance_url" class="form-control @error('behance_url') is-invalid @enderror" placeholder="behance.net/username" value="{{ old('behance_url') }}">
    @error('behance_url')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-3 col-sm-6 mb-3">
    <label for="dribbble_url" class="form-label">Dribbble URL</label>
    <input type="text" id="dribbble_url" name="dribbble_url" class="form-control @error('dribbble_url') is-invalid @enderror" placeholder="dribbble.com/username" value="{{ old('dribbble_url') }}">
    @error('dribbble_url')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-3 col-sm-6 mb-3">
    <label for="instagram_url" class="form-label">Instagram URL</label>
    <input type="text" id="instagram_url" name="instagram_url" class="form-control @error('instagram_url') is-invalid @enderror" placeholder="instagram.com/username" value="{{ old('instagram_url') }}">
    @error('instagram_url')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-3 col-sm-6 mb-3">
    <label for="linkedin_url" class="form-label">LinkedIn URL</label>
    <input type="text" id="linkedin_url" name="linkedin_url" class="form-control @error('linkedin_url') is-invalid @enderror" placeholder="linkedin.com/in/username" value="{{ old('linkedin_url') }}">
    @error('linkedin_url')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
</div>
</div>

{{-- ================= Tombol aksi ================= --}}
<div class="pf-actions">
<div class="row" style="display:block;">
<div class="col-12">
<button type="submit" class="btn btn-primary">Simpan Pelanggan & Portofolio</button>
<a href="{{ route('pelanggan.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
</div>
</div>
</div>

</form>
</div>
</div>
</div>
</div>

</div>{{-- /.pf-page --}}

<script>
/* Pratinjau gambar sebelum diunggah (tidak mempengaruhi pengiriman form) */
document.querySelectorAll('input[type=file][data-preview]').forEach(function (input) {
    input.addEventListener('change', function () {
        var img = document.getElementById(input.dataset.preview);
        if (!img) return;
        var file = input.files && input.files[0];
        if (file && file.type.indexOf('image/') === 0) {
            img.src = URL.createObjectURL(file);
            img.classList.add('show');
        } else {
            img.removeAttribute('src');
            img.classList.remove('show');
        }
    });
});
</script>
@endsection
