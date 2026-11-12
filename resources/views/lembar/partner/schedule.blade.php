@extends('layouts.workspace')

@section('title', 'Jadwal & Kapasitas — Lembar')
@section('page-title', 'Jadwal dan kapasitas')

@section('content')
<section class="page active" id="page-partner-schedule" data-title="Jadwal dan kapasitas">
<div class="page-head"><div><h1>Jadwal dan kapasitas.</h1><p>Atur kapan layanan tersedia dan berapa pesanan yang bisa diterima.</p></div><button class="btn" data-action="save-schedule">Simpan perubahan</button></div>
        <div class="panel"><div class="panel-head"><div><h3>Jam operasional mingguan</h3><p>Contoh jadwal Mitra Print Sudut</p></div></div><div id="schedule-list"></div></div>
        <div class="panel" style="margin-top:15px"><div class="panel-head"><div><h3>Batas pesanan aktif</h3><p>Atur jumlah pekerjaan yang dapat ditangani bersamaan.</p></div></div><div class="field" style="max-width:260px"><label for="capacity-input">Maksimal pesanan aktif</label><input class="input-control" id="capacity-input" type="number" min="1" max="50" value="6"></div><p class="inline-note">Untuk versi produksi, kapasitas sebaiknya dihitung per tanggal dan rentang waktu, bukan hanya satu angka global.</p></div>
</section>
@endsection
