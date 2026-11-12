@extends('layouts.buyer')

@section('title', 'Profil Akun — Lembar')
@section('page-title', 'Profil')

@section('content')
<section class="page active" id="page-profile" data-title="Profil">
<div class="page-head"><div><h1>Profil akun.</h1><p>Informasi akun untuk preview antarmuka.</p></div><button class="btn" data-action="save-profile">Simpan profil</button></div>
        <div class="panel" style="max-width:680px"><div class="form-grid"><div class="field"><label>Nama lengkap</label><input class="input-control" value="Harun Al Rasyid"></div><div class="field"><label>Email</label><input class="input-control" type="email" value="harun@example.test"></div><div class="field"><label>Nomor telepon</label><input class="input-control" value="0812 0000 0000"></div><div class="field"><label>Peran akun</label><input class="input-control" value="Pembeli" disabled></div></div></div>
</section>
@endsection
