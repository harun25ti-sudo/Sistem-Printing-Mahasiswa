<header class="topbar">
  <div style="display:flex;align-items:center;gap:12px;min-width:0">
    <button class="icon-button mobile-menu" id="menu-toggle" aria-label="Buka menu">
      <svg viewBox="0 0 24 24"><path d="M4 7h16M4 12h16M4 17h16"/></svg>
    </button>
    <div class="breadcrumb">
      <span>Lembar</span>
      <span>/</span>
      <strong id="breadcrumb-current">{{ $pageTitle ?? 'Beranda' }}</strong>
    </div>
  </div>
  <div class="top-actions">
    <label class="search-box" aria-label="Cari">
      <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m16 16 4 4"/></svg>
      <input id="global-search" type="search" placeholder="Cari mitra atau pesanan">
    </label>
    <div class="popover">
      <button class="icon-button" id="notification-toggle" aria-label="Notifikasi">
        <svg viewBox="0 0 24 24"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9M10 21h4"/></svg>
        <span class="notice-dot"></span>
      </button>
      <div class="notification-panel" id="notification-panel">
        <h3>Notifikasi terbaru</h3>
        <div id="notifications-list"></div>
      </div>
    </div>
    <select class="role-switch" id="role-switch" aria-label="Preview sebagai role">
      <option value="buyer">Preview: Pembeli</option>
      <option value="partner">Preview: Mitra</option>
      <option value="courier">Preview: Kurir</option>
      <option value="admin">Preview: Admin</option>
    </select>
  </div>
</header>
