@extends('layouts.workspace')

@section('title', 'Panel Administrator � Lembar')
@section('page-title', 'Dashboard admin')

@section('content')
<section class="page active" id="page-admin-home" data-title="Dashboard admin">
<div class="page-head"><div><h1>Pusat kendali Lembar.</h1><p>Pantau operasional marketplace dari satu tempat.</p></div><span class="status-pill blue">Administrator</span></div>
        <div class="role-banner"><div><strong>Mode preview administrator</strong><p>Data pengguna dan transaksi di halaman ini sepenuhnya simulasi.</p></div></div>
        <div class="grid-3" style="margin-bottom:18px"><div class="stat-card"><div class="stat-top"><span class="stat-icon">◉</span></div><strong>128</strong><small>Pengguna terdaftar (contoh)</small></div><div class="stat-card"><div class="stat-top"><span class="stat-icon">▤</span></div><strong>12</strong><small>Mitra aktif (contoh)</small></div><div class="stat-card"><div class="stat-top"><span class="stat-icon">Rp</span></div><strong>Rp2,4 jt</strong><small>Nilai transaksi simulasi</small></div></div>
        <div class="grid-2"><div class="panel"><div class="panel-head"><div><h3>Pengajuan mitra</h3><p>Periksa data sebelum mitra diaktifkan.</p></div><button class="text-link" data-page-link="admin-partners">Lihat semua</button></div><div class="action-list" id="admin-partner-preview"></div></div><div class="panel"><div class="panel-head"><div><h3>Perlu ditinjau</h3><p>Pekerjaan admin yang menunggu.</p></div></div><div class="action-list"><div class="action-row"><div class="action-main"><div class="file-icon"><svg viewBox="0 0 24 24"><path d="M4 5h16v14H4zM8 9h8M8 13h5"/></svg></div><div><strong>Verifikasi pembayaran</strong><small>ORD-2026-019 · Bukti transfer baru</small></div></div><button class="btn secondary small" data-page-link="admin-payments">Periksa</button></div><div class="action-row"><div class="action-main"><div class="file-icon"><svg viewBox="0 0 24 24"><path d="M12 3 2.8 20h18.4zM12 9v5m0 3h.01"/></svg></div><div><strong>Pengaduan pelanggan</strong><small>1 laporan menunggu tindak lanjut</small></div></div><button class="btn secondary small" data-page-link="admin-complaints">Buka</button></div></div></div></div>
</section>
@endsection
