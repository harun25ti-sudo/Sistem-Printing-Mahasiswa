

@extends('layouts.admin.app')

@section('content')
<style>
/* ===== Kartu ===== */
.components-section{
    background:#fff; border:1px solid #e5e7eb; border-radius:14px;
    box-shadow:0 4px 18px rgba(0,0,0,.06); color:#374151; font-size:14px;
}
.components-section .card-body{ padding:28px 32px; }

/* ===== Grid 12 kolom (menggantikan row/col Bootstrap) ===== */
.components-section .row{
    display:grid; grid-template-columns:repeat(12,minmax(0,1fr));
    column-gap:20px; margin:0;
}
.components-section .row > [class*="col-"]{
    grid-column:span 12; width:auto; max-width:none; padding:0; margin:0;
}
@media (min-width:576px){
    .components-section .row > .col-sm-6{ grid-column:span 6; }
}
@media (min-width:768px){
    .components-section .row > .col-md-6{ grid-column:span 6; }
    .components-section .row > .col-md-3{ grid-column:span 3; }
}
@media (min-width:992px){
    .components-section .row > .col-lg-4{ grid-column:span 4; }
}

/* ===== Utilitas yang dipakai di form ===== */
.components-section .mb-3{ margin-bottom:16px; }
.components-section .mb-4{ margin-bottom:24px; }
.components-section .mt-3{ margin-top:16px; }
.components-section .pb-2{ padding-bottom:8px; }
.components-section .ms-2{ margin-left:8px; }
.components-section .text-danger{ color:#dc2626; }
.components-section .border-bottom{ border-bottom:2px solid #e5e7eb; }

/* ===== Judul bagian ===== */
.components-section h5{
    margin:0 0 16px; font-size:16px; font-weight:700; color:#111827;
}

/* ===== Label ===== */
.components-section label{
    display:block; margin-bottom:6px;
    font-size:13px; font-weight:600; color:#374151;
}

/* ===== Input, select, textarea ===== */
.components-section .form-control,
.components-section .form-select{
    display:block; width:100%; box-sizing:border-box;
    padding:10px 12px; background:#fff; color:#111827;
    border:1px solid #d1d5db; border-radius:8px;
    font-size:14px; outline:none;
    transition:border-color .15s, box-shadow .15s;
}
.components-section textarea.form-control{ min-height:110px; resize:vertical; }
.components-section .form-control::placeholder{ color:#9ca3af; }
.components-section .form-control:focus,
.components-section .form-select:focus{
    border-color:#2563eb; box-shadow:0 0 0 3px rgba(37,99,235,.15);
}

/* ===== Input group (ikon kalender Birthday) ===== */
.components-section .input-group{ display:flex; align-items:stretch; flex-wrap:wrap; }
.components-section .input-group-text{
    display:flex; align-items:center; padding:0 12px;
    background:#f3f4f6; border:1px solid #d1d5db; border-right:0;
    border-radius:8px 0 0 8px; color:#6b7280;
}
.components-section .input-group .form-control{
    flex:1 1 auto; width:1%; border-radius:0 8px 8px 0;
}
.components-section .icon-xs{ width:16px; height:16px; }

/* ===== Upload file ===== */
.components-section input[type=file].form-control{
    padding:8px; background:#f8fafc; border:1px dashed #cbd5e1;
}
.components-section input[type=file]::file-selector-button{
    margin-right:12px; padding:7px 14px; border:0; border-radius:6px;
    background:#2563eb; color:#fff; font-weight:600; cursor:pointer;
}
.components-section .form-text{ margin-top:4px; font-size:12px; color:#6b7280; }

/* ===== Error validasi ===== */
.components-section .is-invalid{ border-color:#dc2626; }
.components-section .invalid-feedback{ display:block; margin-top:4px; font-size:12px; color:#dc2626; }

/* ===== Tombol ===== */
.components-section .btn{
    display:inline-block; padding:10px 22px; border-radius:8px;
    font-size:14px; font-weight:600; text-decoration:none; cursor:pointer;
    transition:background .15s;
}
.components-section .btn-primary{ background:#2563eb; color:#fff; border:1px solid #2563eb; }
.components-section .btn-primary:hover{ background:#1d4ed8; }
.components-section .btn-outline-secondary{ background:#fff; color:#4b5563; border:1px solid #d1d5db; }
.components-section .btn-outline-secondary:hover{ background:#f3f4f6; }
</style>
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
<div class="d-flex justify-content-between w-100 flex-wrap">
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

<div class="row">
<div class="col-12 mb-4">
<div class="card border-0 shadow components-section">
<div class="card-body">
<form action="{{ route('pelanggan.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row mb-4">
<div class="col-12"><h5 class="mb-3 border-bottom pb-2">Informasi Dasar Pelanggan</h5></div>
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
@error('birthday')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
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

<div class="col-12"><h5 class="mb-3 mt-3 border-bottom pb-2">Data Portofolio & Pekerjaan</h5></div>
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

<div class="col-12"><h5 class="mb-3 mt-3 border-bottom pb-2">Foto & Dokumen CV</h5></div>
<div class="col-md-6 mb-3">
    <label for="profile_image" class="form-label">Foto Profil Utama</label>
    <input type="file" id="profile_image" name="profile_image" class="form-control @error('profile_image') is-invalid @enderror" accept="image/*">
    <div class="form-text">Format: JPG, PNG, WEBP (Max 4MB). Disarankan foto portrait seperti referensi.</div>
    @error('profile_image')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-6 mb-3">
    <label for="banner_image" class="form-label">Banner Image / Foto Sekunder</label>
    <input type="file" id="banner_image" name="banner_image" class="form-control @error('banner_image') is-invalid @enderror" accept="image/*">
    <div class="form-text">Foto pose tambahan untuk bagian "Hi There!" atau banner profil.</div>
    @error('banner_image')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="col-12"><h5 class="mb-3 mt-3 border-bottom pb-2">Deskripsi & Tautan Sosial Media</h5></div>
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

<div class="row">
<div class="col-12">
<button type="submit" class="btn btn-primary">Simpan Pelanggan & Portofolio</button>
<a href="{{ route('pelanggan.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
@endsection
