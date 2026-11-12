@extends('layouts.workspace')

@section('title', 'Verifikasi Pembayaran — Lembar')
@section('page-title', 'Verifikasi pembayaran')

@section('content')
<section class="page active" id="page-admin-payments" data-title="Verifikasi pembayaran">
<div class="page-head"><div><h1>Verifikasi pembayaran.</h1><p>Periksa bukti transfer sebelum pesanan diteruskan ke mitra.</p></div></div>
        <div class="action-list" id="admin-payment-list"></div>
</section>
@endsection
