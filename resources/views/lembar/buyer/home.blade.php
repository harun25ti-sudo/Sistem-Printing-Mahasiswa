@extends('layouts.buyer')

@section('title', 'Beranda Pembeli � Lembar')
@section('page-title', 'Beranda')

@section('content')
<section class="page active" id="page-home" data-title="Beranda">
<div class="page-head"><div><h1>Selamat pagi, Harun.</h1><p>Butuh cetak sesuatu hari ini? Mulai dari sini.</p></div><div class="head-actions"><button class="btn" data-action="new-order"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>Buat pesanan</button></div></div>
        <div class="hero-panel"><div class="hero-copy"><h2>File siap.<br>Hasil cetak menyusul.</h2><p>Temukan mitra printing di sekitar kampus, atur kebutuhan, lalu pantau pesanan sampai diterima.</p><button class="btn btn-lime" data-page-link="marketplace">Jelajahi mitra <svg viewBox="0 0 24 24"><path d="M5 12h14m-6-6 6 6-6 6"/></svg></button></div><div class="hero-visual" aria-hidden="true"><div class="paper-stack"><div class="paper back"><div class="paper-hole"></div><div class="paper-line dark"></div><div class="paper-line"></div><div class="paper-line short"></div><div class="paper-line"></div></div><div class="paper front"><div class="paper-hole"></div><div class="paper-line dark"></div><div class="paper-line"></div><div class="paper-line short"></div><div class="paper-line"></div><div class="paper-stamp">PDF<br>READY</div></div></div></div></div>
        <div class="grid-2">
          <div class="panel"><div class="panel-head"><div><h3>Pesanan yang sedang berjalan</h3><p>Perkembangan pesanan terbarumu</p></div><button class="text-link" data-page-link="orders">Lihat semua</button></div>
            <div class="order-feature"><div class="file-icon"><svg viewBox="0 0 24 24"><path d="M6 2h8l5 5v15H6zM14 2v6h5M9 13h7M9 17h7"/></svg></div><div class="file-meta"><strong id="home-order-file">Laporan Praktikum Jarkom.pdf</strong><small id="home-order-meta">ORD-2026-018 · Mitra Print Sudut</small></div><span class="status-pill blue" id="home-order-status">Sedang dicetak</span></div>
            <div class="order-progress"><div class="progress-step done"><span class="progress-dot">✓</span><span>Pesanan</span></div><div class="progress-line done"></div><div class="progress-step done"><span class="progress-dot">✓</span><span>Diterima</span></div><div class="progress-line done"></div><div class="progress-step current"><span class="progress-dot"></span><span>Dicetak</span></div><div class="progress-line"></div><div class="progress-step"><span class="progress-dot">4</span><span>Diterima</span></div></div>
            <div class="order-bottom"><span class="small-text muted">Estimasi siap hari ini, 15.30</span><button class="btn secondary small" data-action="open-order" data-order="ORD-2026-018">Detail pesanan</button></div>
          </div>
          <div class="grid-2" style="grid-template-columns:1fr 1fr;gap:10px">
            <div class="stat-card"><div class="stat-top"><span class="stat-icon"><svg viewBox="0 0 24 24"><path d="M4 5h16v14H4zM8 9h8M8 13h5"/></svg></span><span class="stat-note">Riwayat</span></div><strong id="buyer-total-orders">8</strong><small>Total pesanan</small></div>
            <div class="stat-card"><div class="stat-top"><span class="stat-icon" style="background:var(--orange-soft);color:var(--amber)"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg></span><span class="stat-note" style="color:var(--amber)">Aktif</span></div><strong id="buyer-active-orders">1</strong><small>Pesanan berjalan</small></div>
            <div class="stat-card" style="grid-column:1/-1"><div class="stat-top"><span class="stat-icon" style="background:var(--blue-soft);color:var(--tone-24)"><svg viewBox="0 0 24 24"><path d="M4 7h16M6 7V4h12v3M6 7v13h12V7M9 11h6M9 15h6"/></svg></span></div><strong style="font-size:16px">Alamat utama</strong><small>Jl. Umban Sari, Rumbai · Pekanbaru</small></div>
          </div>
        </div>
        <div class="section-title"><div><h3>Mitra yang bisa kamu coba</h3><p>Pilihan layanan printing untuk kebutuhanmu.</p></div><button class="text-link" data-page-link="marketplace">Lihat semua mitra</button></div>
        <div class="partner-grid" id="home-partners"></div>
        <div class="footer-note">Lembar · Preview antarmuka dengan data simulasi</div>
</section>
@endsection
