@extends('layouts.buyer')

@section('title', 'Lembar � Layanan Cetak Kampus')
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

<section class="page" id="page-marketplace" data-title="Cari mitra">

        <div class="page-head"><div><h1>Cari mitra printing.</h1><p>Pilih tempat cetak yang sesuai kebutuhan dan lokasimu.</p></div></div>
        <div class="toolbar"><div class="filter-tabs" id="partner-filters"><button class="filter-tab active" data-filter="all">Semua</button><button class="filter-tab" data-filter="near">Sekitar kampus</button><button class="filter-tab" data-filter="color">Cetak warna</button><button class="filter-tab" data-filter="delivery">Bisa antar</button></div><select class="select-control" style="width:155px" id="partner-sort"><option value="recommended">Direkomendasikan</option><option value="price">Harga terendah</option><option value="name">Nama A–Z</option></select></div>
        <div class="partner-grid" id="marketplace-partners"></div>
      
</section>

<section class="page" id="page-orders" data-title="Pesanan saya">

        <div class="page-head"><div><h1>Pesanan saya.</h1><p>Pantau pesanan dan temukan riwayat transaksi.</p></div><button class="btn" data-action="new-order"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>Pesan cetak</button></div>
        <div class="toolbar"><div class="filter-tabs" id="order-filters"><button class="filter-tab active" data-filter="all">Semua</button><button class="filter-tab" data-filter="active">Berjalan</button><button class="filter-tab" data-filter="done">Selesai</button><button class="filter-tab" data-filter="issue">Perlu perhatian</button></div><span class="small-text muted" id="order-count">3 pesanan</span></div>
        <div class="table-wrap"><table><thead><tr><th>Pesanan</th><th>Mitra</th><th>Tanggal</th><th>Total</th><th>Status</th><th></th></tr></thead><tbody id="buyer-orders-table"></tbody></table></div>
      
</section>

<section class="page" id="page-addresses" data-title="Alamat saya">

        <div class="page-head"><div><h1>Alamat pengiriman.</h1><p>Kelola lokasi untuk pengantaran hasil cetakan.</p></div><button class="btn" data-action="add-address"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>Tambah alamat</button></div>
        <div class="grid-3" id="address-list"></div>
      
</section>

<section class="page" id="page-partner-home" data-title="Dashboard mitra">

        <div class="page-head"><div><h1>Ruang kerja mitra.</h1><p>Kelola pesanan masuk dan kapasitas layananmu.</p></div><span class="status-pill green">Mitra aktif</span></div>
        <div class="role-banner"><div><strong>Mode preview mitra</strong><p>Di sini kamu dapat mencoba alur menerima dan memproses pesanan pelanggan.</p></div><button class="btn secondary small" data-page-link="partner-services">Atur layanan</button></div>
        <div class="grid-3" style="margin-bottom:19px"><div class="stat-card"><div class="stat-top"><span class="stat-icon"><svg viewBox="0 0 24 24"><path d="M4 5h16v14H4zM8 9h8"/></svg></span></div><strong id="partner-incoming-count">2</strong><small>Pesanan masuk</small></div><div class="stat-card"><div class="stat-top"><span class="stat-icon" style="background:var(--amber-soft);color:var(--amber)"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg></span></div><strong id="partner-active-count">3</strong><small>Dalam pengerjaan</small></div><div class="stat-card"><div class="stat-top"><span class="stat-icon" style="background:var(--blue-soft);color:var(--tone-24)"><svg viewBox="0 0 24 24"><path d="M4 18 9 12l4 3 7-9"/></svg></span></div><strong>Rp425.000</strong><small>Ilustrasi pendapatan bulan ini</small></div></div>
        <div class="grid-2"><div class="panel"><div class="panel-head"><div><h3>Pesanan baru</h3><p>Periksa sebelum menerima pekerjaan</p></div><button class="text-link" data-page-link="partner-incoming">Lihat semua</button></div><div class="action-list" id="partner-incoming-preview"></div></div><div class="panel"><div class="panel-head"><div><h3>Kapasitas hari ini</h3><p>Pengaturan contoh untuk Mitra Print Sudut</p></div><button class="text-link" data-page-link="partner-schedule">Atur jadwal</button></div><div style="display:flex;align-items:end;justify-content:space-between;margin:8px 0"><div><strong style="font-size:30px;letter-spacing:-1px">3 / 6</strong><div class="small-text muted">Pesanan aktif</div></div><span class="status-pill green">Masih tersedia</span></div><div style="height:7px;border-radius:10px;background:var(--tone-77);overflow:clip"><div style="width:50%;height:100%;background:var(--brand);border-radius:10px"></div></div><p class="inline-note">Kapasitas contoh dapat diubah pada halaman jadwal. Sistem produksi perlu mengunci slot saat pesanan diterima.</p></div></div>
      
</section>

<section class="page" id="page-partner-incoming" data-title="Pesanan masuk">

        <div class="page-head"><div><h1>Pesanan masuk.</h1><p>Tinjau detail sebelum kamu menyanggupi pesanan.</p></div></div>
        <div class="role-banner"><div><strong>Periksa file, spesifikasi, dan tenggat.</strong><p>Terima hanya pesanan yang sesuai layanan dan kapasitasmu.</p></div><span class="status-pill amber">Menunggu respons</span></div>
        <div class="action-list" id="partner-incoming-list"></div>
      
</section>

<section class="page" id="page-partner-queue" data-title="Antrean cetak">

        <div class="page-head"><div><h1>Antrean cetak.</h1><p>Perbarui proses pengerjaan agar pembeli mendapat informasi.</p></div></div>
        <div class="toolbar"><div class="filter-tabs" id="queue-filters"><button class="filter-tab active" data-filter="active">Sedang berjalan</button><button class="filter-tab" data-filter="ready">Siap diserahkan</button></div></div>
        <div class="action-list" id="partner-queue-list"></div>
      
</section>

<section class="page" id="page-partner-services" data-title="Layanan dan harga">

        <div class="page-head"><div><h1>Layanan dan harga.</h1><p>Tentukan kemampuan cetak yang bisa dipesan pelanggan.</p></div><button class="btn" data-action="add-service"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>Tambah layanan</button></div>
        <div class="panel"><div class="panel-head"><div><h3>Daftar layanan</h3><p>Harga contoh untuk tampilan prototipe</p></div><span class="status-pill green">Tampil ke pembeli</span></div><div id="service-list"></div></div>
        <div class="panel" style="margin-top:15px"><div class="panel-head"><div><h3>Format file yang diterima</h3><p>Pembeli hanya dapat mengunggah format yang didukung.</p></div></div><div class="settings-grid" id="format-list"></div></div>
      
</section>

<section class="page" id="page-partner-schedule" data-title="Jadwal dan kapasitas">

        <div class="page-head"><div><h1>Jadwal dan kapasitas.</h1><p>Atur kapan layanan tersedia dan berapa pesanan yang bisa diterima.</p></div><button class="btn" data-action="save-schedule">Simpan perubahan</button></div>
        <div class="panel"><div class="panel-head"><div><h3>Jam operasional mingguan</h3><p>Contoh jadwal Mitra Print Sudut</p></div></div><div id="schedule-list"></div></div>
        <div class="panel" style="margin-top:15px"><div class="panel-head"><div><h3>Batas pesanan aktif</h3><p>Atur jumlah pekerjaan yang dapat ditangani bersamaan.</p></div></div><div class="field" style="max-width:260px"><label for="capacity-input">Maksimal pesanan aktif</label><input class="input-control" id="capacity-input" type="number" min="1" max="50" value="6"></div><p class="inline-note">Untuk versi produksi, kapasitas sebaiknya dihitung per tanggal dan rentang waktu, bukan hanya satu angka global.</p></div>
      
</section>

<section class="page" id="page-partner-revenue" data-title="Pendapatan">

        <div class="page-head"><div><h1>Pendapatan mitra.</h1><p>Ringkasan transaksi dan pembagian hasil pesanan.</p></div></div>
        <div class="grid-3"><div class="stat-card"><div class="stat-top"><span class="stat-icon">Rp</span></div><strong>Rp425.000</strong><small>Pendapatan ilustrasi bulan ini</small></div><div class="stat-card"><div class="stat-top"><span class="stat-icon">↗</span></div><strong>Rp380.000</strong><small>Sudah dicairkan (contoh)</small></div><div class="stat-card"><div class="stat-top"><span class="stat-icon">◷</span></div><strong>Rp45.000</strong><small>Menunggu penyelesaian</small></div></div>
        <div class="panel" style="margin-top:17px"><div class="panel-head"><div><h3>Rincian transaksi</h3><p>Nilai di bawah adalah data simulasi.</p></div></div><div class="table-wrap"><table><thead><tr><th>Pesanan</th><th>Nilai cetak</th><th>Biaya platform</th><th>Bagian mitra</th><th>Status</th></tr></thead><tbody><tr><td><strong>ORD-2026-018</strong></td><td>Rp45.000</td><td>Rp2.250</td><td><strong>Rp42.750</strong></td><td><span class="status-pill green">Selesai</span></td></tr><tr><td><strong>ORD-2026-016</strong></td><td>Rp32.000</td><td>Rp1.600</td><td><strong>Rp30.400</strong></td><td><span class="status-pill amber">Diproses</span></td></tr></tbody></table></div></div>
      
</section>

<section class="page" id="page-courier-home" data-title="Dashboard kurir">

        <div class="page-head"><div><h1>Halo, Raka.</h1><p>Ini ringkasan tugas pengantaranmu hari ini.</p></div><span class="status-pill green">Siap bertugas</span></div>
        <div class="role-banner"><div><strong>Mode preview kurir</strong><p>Kurir hanya melihat informasi pengiriman, bukan file dokumen pelanggan.</p></div></div>
        <div class="grid-3" style="margin-bottom:17px"><div class="stat-card"><div class="stat-top"><span class="stat-icon">↗</span></div><strong id="courier-open-count">2</strong><small>Tugas tersedia</small></div><div class="stat-card"><div class="stat-top"><span class="stat-icon">◷</span></div><strong>1</strong><small>Dalam perjalanan</small></div><div class="stat-card"><div class="stat-top"><span class="stat-icon">✓</span></div><strong>6</strong><small>Tugas selesai (contoh)</small></div></div>
        <div class="panel"><div class="panel-head"><div><h3>Tugas pengantaran</h3><p>Ambil hasil cetak dari mitra dan serahkan kepada pembeli.</p></div><button class="text-link" data-page-link="courier-tasks">Semua tugas</button></div><div class="action-list" id="courier-preview"></div></div>
      
</section>

<section class="page" id="page-courier-tasks" data-title="Tugas pengantaran">

        <div class="page-head"><div><h1>Tugas pengantaran.</h1><p>Detail titik pengambilan, tujuan, dan bukti serah terima.</p></div></div>
        <div class="action-list" id="courier-task-list"></div>
      
</section>

<section class="page" id="page-courier-history" data-title="Riwayat kurir">

        <div class="page-head"><div><h1>Riwayat pengantaran.</h1><p>Daftar tugas yang sudah diselesaikan.</p></div></div>
        <div class="panel"><div class="empty-state"><svg viewBox="0 0 24 24"><path d="M4 7h16v13H4zM8 7V4h8v3M8 12h8M8 16h5"/></svg><strong>Belum ada riwayat pada demo</strong><p>Tugas yang selesai akan muncul di sini.</p></div></div>
      
</section>

<section class="page" id="page-admin-home" data-title="Dashboard admin">

        <div class="page-head"><div><h1>Pusat kendali Lembar.</h1><p>Pantau operasional marketplace dari satu tempat.</p></div><span class="status-pill blue">Administrator</span></div>
        <div class="role-banner"><div><strong>Mode preview administrator</strong><p>Data pengguna dan transaksi di halaman ini sepenuhnya simulasi.</p></div></div>
        <div class="grid-3" style="margin-bottom:18px"><div class="stat-card"><div class="stat-top"><span class="stat-icon">◉</span></div><strong>128</strong><small>Pengguna terdaftar (contoh)</small></div><div class="stat-card"><div class="stat-top"><span class="stat-icon">▤</span></div><strong>12</strong><small>Mitra aktif (contoh)</small></div><div class="stat-card"><div class="stat-top"><span class="stat-icon">Rp</span></div><strong>Rp2,4 jt</strong><small>Nilai transaksi simulasi</small></div></div>
        <div class="grid-2"><div class="panel"><div class="panel-head"><div><h3>Pengajuan mitra</h3><p>Periksa data sebelum mitra diaktifkan.</p></div><button class="text-link" data-page-link="admin-partners">Lihat semua</button></div><div class="action-list" id="admin-partner-preview"></div></div><div class="panel"><div class="panel-head"><div><h3>Perlu ditinjau</h3><p>Pekerjaan admin yang menunggu.</p></div></div><div class="action-list"><div class="action-row"><div class="action-main"><div class="file-icon"><svg viewBox="0 0 24 24"><path d="M4 5h16v14H4zM8 9h8M8 13h5"/></svg></div><div><strong>Verifikasi pembayaran</strong><small>ORD-2026-019 · Bukti transfer baru</small></div></div><button class="btn secondary small" data-page-link="admin-payments">Periksa</button></div><div class="action-row"><div class="action-main"><div class="file-icon"><svg viewBox="0 0 24 24"><path d="M12 3 2.8 20h18.4zM12 9v5m0 3h.01"/></svg></div><div><strong>Pengaduan pelanggan</strong><small>1 laporan menunggu tindak lanjut</small></div></div><button class="btn secondary small" data-page-link="admin-complaints">Buka</button></div></div></div></div>
      
</section>

<section class="page" id="page-admin-partners" data-title="Verifikasi mitra">

        <div class="page-head"><div><h1>Verifikasi mitra.</h1><p>Pastikan informasi dan kemampuan mitra telah diperiksa.</p></div></div>
        <div class="action-list" id="admin-partner-list"></div>
      
</section>

<section class="page" id="page-admin-orders" data-title="Semua pesanan">

        <div class="page-head"><div><h1>Semua pesanan.</h1><p>Pemantauan transaksi lintas pembeli dan mitra.</p></div></div>
        <div class="table-wrap"><table><thead><tr><th>Nomor pesanan</th><th>Pembeli</th><th>Mitra</th><th>Total</th><th>Status</th><th></th></tr></thead><tbody id="admin-orders-table"></tbody></table></div>
      
</section>

<section class="page" id="page-admin-payments" data-title="Verifikasi pembayaran">

        <div class="page-head"><div><h1>Verifikasi pembayaran.</h1><p>Periksa bukti transfer sebelum pesanan diteruskan ke mitra.</p></div></div>
        <div class="action-list" id="admin-payment-list"></div>
      
</section>

<section class="page" id="page-admin-complaints" data-title="Pengaduan">

        <div class="page-head"><div><h1>Pengaduan.</h1><p>Catat dan tindak lanjuti masalah transaksi.</p></div></div>
        <div class="panel"><div class="empty-state"><svg viewBox="0 0 24 24"><path d="M4 5h16v13H8l-4 3zM8 10h8M8 14h5"/></svg><strong>Contoh pengaduan tersedia di demo</strong><p>Gunakan detail pesanan untuk melihat alur penanganan masalah.</p><button class="btn secondary small" data-action="open-order" data-order="ORD-2026-019">Lihat pesanan contoh</button></div></div>
      
</section>

<section class="page" id="page-profile" data-title="Profil">

        <div class="page-head"><div><h1>Profil akun.</h1><p>Informasi akun untuk preview antarmuka.</p></div><button class="btn" data-action="save-profile">Simpan profil</button></div>
        <div class="panel" style="max-width:680px"><div class="form-grid"><div class="field"><label>Nama lengkap</label><input class="input-control" value="Harun Al Rasyid"></div><div class="field"><label>Email</label><input class="input-control" type="email" value="harun@example.test"></div><div class="field"><label>Nomor telepon</label><input class="input-control" value="0812 0000 0000"></div><div class="field"><label>Peran akun</label><input class="input-control" value="Pembeli" disabled></div></div></div>
      
</section>

@endsection
