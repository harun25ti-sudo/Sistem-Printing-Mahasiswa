@extends('layouts.workspace')

@section('title', 'Antrean Cetak — Lembar')
@section('page-title', 'Antrean cetak')

@section('content')
<section class="page active" id="page-partner-queue" data-title="Antrean cetak">
<div class="page-head"><div><h1>Antrean cetak.</h1><p>Perbarui proses pengerjaan agar pembeli mendapat informasi.</p></div></div>
        <div class="toolbar"><div class="filter-tabs" id="queue-filters"><button class="filter-tab active" data-filter="active">Sedang berjalan</button><button class="filter-tab" data-filter="ready">Siap diserahkan</button></div></div>
        <div class="action-list" id="partner-queue-list"></div>
</section>
@endsection
