<!-- ORDER WIZARD MODAL -->
<div class="modal-backdrop" id="order-modal" role="dialog" aria-modal="true" aria-labelledby="wizard-title">
  <div class="modal">
    <div class="modal-head">
      <div>
        <h2 id="wizard-title">Buat pesanan cetak</h2>
        <p>Isi kebutuhan cetakmu dalam beberapa langkah.</p>
      </div>
      <button class="close-btn" data-action="close-modal" aria-label="Tutup">
        <svg viewBox="0 0 24 24"><path d="m6 6 12 12M18 6 6 18"/></svg>
      </button>
    </div>
    <div class="modal-body">
      <div class="wizard-steps" id="wizard-steps">
        <div class="wizard-step active"><span>1</span>Mitra</div>
        <div class="wizard-line"></div>
        <div class="wizard-step"><span>2</span>File</div>
        <div class="wizard-line"></div>
        <div class="wizard-step"><span>3</span>Jadwal</div>
        <div class="wizard-line"></div>
        <div class="wizard-step"><span>4</span>Terima</div>
        <div class="wizard-line"></div>
        <div class="wizard-step"><span>5</span>Konfirmasi</div>
      </div>
      <div class="step-panel active" data-step="1">
        <h3>Pilih mitra printing</h3>
        <p>Pilih mitra berdasarkan lokasi, layanan, dan ketersediaan.</p>
        <div class="choice-list" id="wizard-partners"></div>
      </div>
      <div class="step-panel" data-step="2">
        <h3>Unggah file dan atur spesifikasi</h3>
        <p>File hanya ditampilkan sebagai simulasi preview. Belum dikirim ke server.</p>
        <label class="upload-zone" for="order-file">
          <svg viewBox="0 0 24 24"><path d="M12 16V4m-5 5 5-5 5 5M4 17v3h16v-3"/></svg>
          <strong>Pilih file dokumen</strong>
          <small>PDF atau DOCX · maksimal 20 MB untuk konsep ini</small>
          <input type="file" id="order-file" accept=".pdf,.doc,.docx,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
        </label>
        <div class="file-chosen" id="file-chosen" hidden>
          <span id="file-name">Dokumen.pdf</span>
          <button class="text-link" data-action="remove-file">Hapus</button>
        </div>
        <div class="form-grid">
          <div class="field">
            <label for="copies">Jumlah salinan</label>
            <input class="input-control" type="number" min="1" max="500" id="copies" value="2">
          </div>
          <div class="field">
            <label for="pages">Jumlah halaman per file</label>
            <input class="input-control" type="number" min="1" max="1000" id="pages" value="10">
          </div>
          <div class="field">
            <label for="paper-size">Ukuran kertas</label>
            <select class="select-control" id="paper-size">
              <option>A4</option>
              <option>F4</option>
              <option>A3</option>
            </select>
          </div>
          <div class="field">
            <label for="color-mode">Jenis cetak</label>
            <select class="select-control" id="color-mode">
              <option value="bw">Hitam putih</option>
              <option value="color">Berwarna</option>
            </select>
          </div>
          <div class="field">
            <label for="print-sides">Sisi cetak</label>
            <select class="select-control" id="print-sides">
              <option value="single">Satu sisi</option>
              <option value="double">Bolak-balik</option>
            </select>
          </div>
          <div class="field">
            <label for="finishing">Finishing</label>
            <select class="select-control" id="finishing">
              <option value="none">Tanpa finishing</option>
              <option value="staple">Staples</option>
              <option value="binding">Jilid</option>
              <option value="laminate">Laminasi</option>
            </select>
          </div>
        </div>
        <div class="price-preview">
          <div>
            <span>Estimasi biaya cetak</span>
            <div class="inline-note" style="margin:2px 0 0">Harga akhir dikonfirmasi mitra.</div>
          </div>
          <strong id="live-price">Rp6.000</strong>
        </div>
      </div>
      <div class="step-panel" data-step="3">
        <h3>Kapan pesanan dibutuhkan?</h3>
        <p>Pilih jadwal yang masih tersedia dari mitra.</p>
        <div class="form-grid">
          <div class="field">
            <label for="order-date">Tanggal pengerjaan</label>
            <input class="input-control" type="date" id="order-date">
          </div>
          <div class="field">
            <label for="order-time">Perkiraan waktu</label>
            <select class="select-control" id="order-time">
              <option>08.00–10.00</option>
              <option>10.00–12.00</option>
              <option>13.00–15.00</option>
              <option>15.00–17.00</option>
            </select>
          </div>
        </div>
        <p class="inline-note">Waktu yang dipilih merupakan permintaan pembeli dan tetap menunggu persetujuan mitra.</p>
      </div>
      <div class="step-panel" data-step="4">
        <h3>Bagaimana kamu menerima hasil?</h3>
        <p>Pilih mengambil sendiri atau meminta kurir mengantarkan.</p>
        <div class="choice-list">
          <label class="choice-card selected">
            <input type="radio" name="fulfillment" value="pickup" checked>
            <span class="choice-icon"><svg viewBox="0 0 24 24"><path d="M3 10h18M5 10V5h14v5M5 10v9h14v-9M9 14h6"/></svg></span>
            <span class="choice-copy"><strong>Ambil sendiri</strong><small>Datang ke lokasi mitra setelah pesanan siap.</small></span>
            <span class="choice-price">Gratis</span>
          </label>
          <label class="choice-card">
            <input type="radio" name="fulfillment" value="delivery">
            <span class="choice-icon"><svg viewBox="0 0 24 24"><path d="M3 7h12v11H3zM15 11h4l3 3v4h-7zM7 18a2 2 0 1 0 4 0m6 0a2 2 0 1 0 4 0"/></svg></span>
            <span class="choice-copy"><strong>Antar ke alamat</strong><small>Kurir mengambil hasil dari mitra dan mengantarkan kepadamu.</small></span>
            <span class="choice-price">+ Rp8.000</span>
          </label>
        </div>
        <div class="form-grid" id="delivery-fields" hidden>
          <div class="field" style="grid-column:1/-1">
            <label for="delivery-address">Alamat lengkap</label>
            <textarea class="textarea-control" id="delivery-address" placeholder="Nama jalan, gedung, nomor, kecamatan..."></textarea>
          </div>
          <div class="field">
            <label for="packaging">Pengemasan</label>
            <select class="select-control" id="packaging">
              <option value="none">Standar</option>
              <option value="extra">Tambahan pelindung (+Rp2.000)</option>
            </select>
          </div>
          <div class="field">
            <label for="recipient-phone">Nomor penerima</label>
            <input class="input-control" id="recipient-phone" placeholder="08xxxxxxxxxx">
          </div>
        </div>
      </div>
      <div class="step-panel" data-step="5">
        <h3>Periksa pesananmu</h3>
        <p>Pastikan file, spesifikasi, jadwal, dan cara penerimaan sudah benar.</p>
        <div class="summary-preview" id="order-summary"></div>
        <p class="inline-note">Dengan mengirim pesanan, kamu meminta mitra memeriksa dan menyetujui permintaan ini. Pembayaran dilakukan setelah mitra menerima pesanan.</p>
      </div>
    </div>
    <div class="modal-foot">
      <button class="btn secondary" id="wizard-back" data-action="wizard-back" disabled>Kembali</button>
      <div style="display:flex;align-items:center;gap:10px">
        <span class="small-text muted" id="wizard-count">Langkah 1 dari 5</span>
        <button class="btn" id="wizard-next" data-action="wizard-next">
          Lanjutkan <svg viewBox="0 0 24 24"><path d="M5 12h14m-6-6 6 6-6 6"/></svg>
        </button>
      </div>
    </div>
  </div>
</div>

<!-- DETAIL MODAL -->
<div class="modal-backdrop" id="detail-modal" role="dialog" aria-modal="true" aria-labelledby="detail-modal-title">
  <div class="modal">
    <div class="modal-head">
      <div>
        <h2 id="detail-modal-title">Detail pesanan</h2>
        <p id="detail-modal-sub">Nomor pesanan</p>
      </div>
      <button class="close-btn" data-action="close-detail" aria-label="Tutup">
        <svg viewBox="0 0 24 24"><path d="m6 6 12 12M18 6 6 18"/></svg>
      </button>
    </div>
    <div class="modal-body" id="detail-modal-body"></div>
    <div class="modal-foot">
      <span class="small-text muted">Semua perubahan tersimpan pada preview lokal.</span>
      <button class="btn secondary" data-action="close-detail">Tutup</button>
    </div>
  </div>
</div>

<!-- TOAST CONTAINER -->
<div class="toast-stack" id="toast-stack" aria-live="polite" aria-atomic="true"></div>
