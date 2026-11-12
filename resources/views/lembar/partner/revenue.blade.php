@extends('layouts.workspace')

@section('title', 'Pendapatan Mitra � Lembar')
@section('page-title', 'Pendapatan')

@section('content')
<section class="page active" id="page-partner-revenue" data-title="Pendapatan">
<div class="page-head"><div><h1>Pendapatan mitra.</h1><p>Ringkasan transaksi dan pembagian hasil pesanan.</p></div></div>
        <div class="grid-3"><div class="stat-card"><div class="stat-top"><span class="stat-icon">Rp</span></div><strong>Rp425.000</strong><small>Pendapatan ilustrasi bulan ini</small></div><div class="stat-card"><div class="stat-top"><span class="stat-icon">↗</span></div><strong>Rp380.000</strong><small>Sudah dicairkan (contoh)</small></div><div class="stat-card"><div class="stat-top"><span class="stat-icon">◷</span></div><strong>Rp45.000</strong><small>Menunggu penyelesaian</small></div></div>
        <div class="panel" style="margin-top:17px"><div class="panel-head"><div><h3>Rincian transaksi</h3><p>Nilai di bawah adalah data simulasi.</p></div></div><div class="table-wrap"><table><thead><tr><th>Pesanan</th><th>Nilai cetak</th><th>Biaya platform</th><th>Bagian mitra</th><th>Status</th></tr></thead><tbody><tr><td><strong>ORD-2026-018</strong></td><td>Rp45.000</td><td>Rp2.250</td><td><strong>Rp42.750</strong></td><td><span class="status-pill green">Selesai</span></td></tr><tr><td><strong>ORD-2026-016</strong></td><td>Rp32.000</td><td>Rp1.600</td><td><strong>Rp30.400</strong></td><td><span class="status-pill amber">Diproses</span></td></tr></tbody></table></div></div>
</section>
@endsection
