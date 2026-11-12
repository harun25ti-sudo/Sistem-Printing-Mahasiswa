@extends('layouts.buyer')

@section('title', 'Cari Mitra Printing — Lembar')
@section('page-title', 'Cari mitra')

@section('content')
<section class="page active" id="page-marketplace" data-title="Cari mitra">
<div class="page-head"><div><h1>Cari mitra printing.</h1><p>Pilih tempat cetak yang sesuai kebutuhan dan lokasimu.</p></div></div>
        <div class="toolbar"><div class="filter-tabs" id="partner-filters"><button class="filter-tab active" data-filter="all">Semua</button><button class="filter-tab" data-filter="near">Sekitar kampus</button><button class="filter-tab" data-filter="color">Cetak warna</button><button class="filter-tab" data-filter="delivery">Bisa antar</button></div><select class="select-control" style="width:155px" id="partner-sort"><option value="recommended">Direkomendasikan</option><option value="price">Harga terendah</option><option value="name">Nama Aâ€“Z</option></select></div>
        <div class="partner-grid" id="marketplace-partners"></div>
</section>
@endsection
