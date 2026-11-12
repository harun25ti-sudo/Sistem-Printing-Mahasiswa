@extends('layouts.workspace')

@section('title', 'Tugas Pengantaran — Lembar')
@section('page-title', 'Tugas pengantaran')

@section('content')
<section class="page active" id="page-courier-tasks" data-title="Tugas pengantaran">
<div class="page-head"><div><h1>Tugas pengantaran.</h1><p>Detail titik pengambilan, tujuan, dan bukti serah terima.</p></div></div>
        <div class="action-list" id="courier-task-list"></div>
</section>
@endsection
