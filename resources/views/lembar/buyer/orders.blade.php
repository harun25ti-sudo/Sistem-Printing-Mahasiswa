@extends('layouts.buyer')

@section('title', 'Pesanan Saya — Lembar')
@section('page-title', 'Pesanan saya')

@section('content')
<section class="page active" id="page-orders" data-title="Pesanan saya">
<div class="page-head"><div><h1>Pesanan saya.</h1><p>Pantau pesanan dan temukan riwayat transaksi.</p></div><button class="btn" data-action="new-order"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>Pesan cetak</button></div>
        <div class="toolbar"><div class="filter-tabs" id="order-filters"><button class="filter-tab active" data-filter="all">Semua</button><button class="filter-tab" data-filter="active">Berjalan</button><button class="filter-tab" data-filter="done">Selesai</button><button class="filter-tab" data-filter="issue">Perlu perhatian</button></div><span class="small-text muted" id="order-count">3 pesanan</span></div>
        <div class="table-wrap"><table><thead><tr><th>Pesanan</th><th>Mitra</th><th>Tanggal</th><th>Total</th><th>Status</th><th></th></tr></thead><tbody id="buyer-orders-table"></tbody></table></div>
</section>
@endsection
