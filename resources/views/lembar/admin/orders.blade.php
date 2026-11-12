@extends('layouts.workspace')

@section('title', 'Semua Pesanan — Lembar')
@section('page-title', 'Semua pesanan')

@section('content')
<section class="page active" id="page-admin-orders" data-title="Semua pesanan">
<div class="page-head"><div><h1>Semua pesanan.</h1><p>Pemantauan transaksi lintas pembeli dan mitra.</p></div></div>
        <div class="table-wrap"><table><thead><tr><th>Nomor pesanan</th><th>Pembeli</th><th>Mitra</th><th>Total</th><th>Status</th><th></th></tr></thead><tbody id="admin-orders-table"></tbody></table></div>
</section>
@endsection
