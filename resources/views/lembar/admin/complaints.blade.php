@extends('layouts.workspace')

@section('title', 'Pengaduan & Resolusi — Lembar')
@section('page-title', 'Pengaduan')

@section('content')
<section class="page active" id="page-admin-complaints" data-title="Pengaduan">
<div class="page-head"><div><h1>Pengaduan.</h1><p>Catat dan tindak lanjuti masalah transaksi.</p></div></div>
        <div class="panel"><div class="empty-state"><svg viewBox="0 0 24 24"><path d="M4 5h16v13H8l-4 3zM8 10h8M8 14h5"/></svg><strong>Contoh pengaduan tersedia di demo</strong><p>Gunakan detail pesanan untuk melihat alur penanganan masalah.</p><button class="btn secondary small" data-action="open-order" data-order="ORD-2026-019">Lihat pesanan contoh</button></div></div>
</section>
@endsection
