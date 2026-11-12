@extends('layouts.workspace')

@section('title', 'Layanan & Harga — Lembar')
@section('page-title', 'Layanan dan harga')

@section('content')
<section class="page active" id="page-partner-services" data-title="Layanan dan harga">
<div class="page-head"><div><h1>Layanan dan harga.</h1><p>Tentukan kemampuan cetak yang bisa dipesan pelanggan.</p></div><button class="btn" data-action="add-service"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>Tambah layanan</button></div>
        <div class="panel"><div class="panel-head"><div><h3>Daftar layanan</h3><p>Harga contoh untuk tampilan prototipe</p></div><span class="status-pill green">Tampil ke pembeli</span></div><div id="service-list"></div></div>
        <div class="panel" style="margin-top:15px"><div class="panel-head"><div><h3>Format file yang diterima</h3><p>Pembeli hanya dapat mengunggah format yang didukung.</p></div></div><div class="settings-grid" id="format-list"></div></div>
</section>
@endsection
