@extends('layouts.workspace')

@section('title', 'Riwayat Pengantaran — Lembar')
@section('page-title', 'Riwayat kurir')

@section('content')
<section class="page active" id="page-courier-history" data-title="Riwayat kurir">
<div class="page-head"><div><h1>Riwayat pengantaran.</h1><p>Daftar tugas yang sudah diselesaikan.</p></div></div>
        <div class="panel"><div class="empty-state"><svg viewBox="0 0 24 24"><path d="M4 7h16v13H4zM8 7V4h8v3M8 12h8M8 16h5"/></svg><strong>Belum ada riwayat pada demo</strong><p>Tugas yang selesai akan muncul di sini.</p></div></div>
</section>
@endsection
