@extends('layouts.workspace')

@section('title', 'Pesanan Masuk Mitra — Lembar')
@section('page-title', 'Pesanan masuk')

@section('content')
<section class="page active" id="page-partner-incoming" data-title="Pesanan masuk">
<div class="page-head"><div><h1>Pesanan masuk.</h1><p>Tinjau detail sebelum kamu menyanggupi pesanan.</p></div></div>
        <div class="role-banner"><div><strong>Periksa file, spesifikasi, dan tenggat.</strong><p>Terima hanya pesanan yang sesuai layanan dan kapasitasmu.</p></div><span class="status-pill amber">Menunggu respons</span></div>
        <div class="action-list" id="partner-incoming-list"></div>
</section>
@endsection
