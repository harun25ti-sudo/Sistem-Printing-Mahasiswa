@extends('layouts.buyer')

@section('title', 'Alamat Saya — Lembar')
@section('page-title', 'Alamat saya')

@section('content')
<section class="page active" id="page-addresses" data-title="Alamat saya">
<div class="page-head"><div><h1>Alamat pengiriman.</h1><p>Kelola lokasi untuk pengantaran hasil cetakan.</p></div><button class="btn" data-action="add-address"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>Tambah alamat</button></div>
        <div class="grid-3" id="address-list"></div>
</section>
@endsection
