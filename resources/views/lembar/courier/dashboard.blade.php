@extends('layouts.workspace')

@section('title', 'Ruang Kerja Kurir � Lembar')
@section('page-title', 'Dashboard kurir')

@section('content')
<section class="page active" id="page-courier-home" data-title="Dashboard kurir">
<div class="page-head"><div><h1>Halo, Raka.</h1><p>Ini ringkasan tugas pengantaranmu hari ini.</p></div><span class="status-pill green">Siap bertugas</span></div>
        <div class="role-banner"><div><strong>Mode preview kurir</strong><p>Kurir hanya melihat informasi pengiriman, bukan file dokumen pelanggan.</p></div></div>
        <div class="grid-3" style="margin-bottom:17px"><div class="stat-card"><div class="stat-top"><span class="stat-icon">↗</span></div><strong id="courier-open-count">2</strong><small>Tugas tersedia</small></div><div class="stat-card"><div class="stat-top"><span class="stat-icon">◷</span></div><strong>1</strong><small>Dalam perjalanan</small></div><div class="stat-card"><div class="stat-top"><span class="stat-icon">✓</span></div><strong>6</strong><small>Tugas selesai (contoh)</small></div></div>
        <div class="panel"><div class="panel-head"><div><h3>Tugas pengantaran</h3><p>Ambil hasil cetak dari mitra dan serahkan kepada pembeli.</p></div><button class="text-link" data-page-link="courier-tasks">Semua tugas</button></div><div class="action-list" id="courier-preview"></div></div>
</section>
@endsection
