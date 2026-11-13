@extends('layouts.admin.app')

@section('content')
<div class="space-y-6">

  <!-- Page Header -->
  <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
    <div>
      <h1 class="text-2xl font-bold tracking-tight text-gray-900">Dashboard Sistem Printing</h1>
      <p class="text-xs sm:text-sm text-muted-foreground mt-1">
        Selamat datang kembali, <strong>Harun Al Rasyid</strong>. Berikut rangkuman performa operasional hari ini.
      </p>
    </div>
    <div class="flex items-center gap-2.5">
      <button class="inline-flex items-center gap-1.5 rounded-lg border border-border bg-white px-3.5 py-2 text-xs font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50 hover:border-gray-300">
        <i data-lucide="download" class="h-3.5 w-3.5"></i>
        Export Laporan
      </button>
      <a href="{{ route('pelanggan.create') }}" class="inline-flex items-center gap-1.5 rounded-lg bg-primary px-3.5 py-2 text-xs font-semibold text-white shadow-sm transition hover:bg-primary-600">
        <i data-lucide="plus" class="h-3.5 w-3.5"></i>
        Tambah Pelanggan
      </a>
    </div>
  </div>

  <!-- 4 Stat Cards (DropX Style) -->
  <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
    <!-- Stat 1: Revenue -->
    <div class="rounded-xl border border-border bg-white p-5 shadow-sm transition hover:shadow-md">
      <div class="flex items-center justify-between">
        <span class="text-xs font-medium text-muted-foreground">Total Pendapatan</span>
        <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-indigo-50 text-indigo-600">
          <i data-lucide="dollar-sign" class="h-4 w-4"></i>
        </div>
      </div>
      <div class="mt-3">
        <div class="text-2xl font-bold text-gray-900">Rp 14.850.000</div>
        <div class="mt-1 flex items-center gap-1.5 text-2xs text-emerald-600 font-semibold">
          <i data-lucide="trending-up" class="h-3.5 w-3.5"></i>
          <span>+18.2%</span>
          <span class="text-muted-foreground font-normal">dari bulan lalu</span>
        </div>
      </div>
    </div>

    <!-- Stat 2: Active Users -->
    <div class="rounded-xl border border-border bg-white p-5 shadow-sm transition hover:shadow-md">
      <div class="flex items-center justify-between">
        <span class="text-xs font-medium text-muted-foreground">Pelanggan Terdaftar</span>
        <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-emerald-50 text-emerald-600">
          <i data-lucide="users" class="h-4 w-4"></i>
        </div>
      </div>
      <div class="mt-3">
        <div class="text-2xl font-bold text-gray-900">1.284</div>
        <div class="mt-1 flex items-center gap-1.5 text-2xs text-emerald-600 font-semibold">
          <i data-lucide="trending-up" class="h-3.5 w-3.5"></i>
          <span>+12.5%</span>
          <span class="text-muted-foreground font-normal">mahasiswa baru</span>
        </div>
      </div>
    </div>

    <!-- Stat 3: Total Orders -->
    <div class="rounded-xl border border-border bg-white p-5 shadow-sm transition hover:shadow-md">
      <div class="flex items-center justify-between">
        <span class="text-xs font-medium text-muted-foreground">Pesanan Cetak</span>
        <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-blue-50 text-blue-600">
          <i data-lucide="printer" class="h-4 w-4"></i>
        </div>
      </div>
      <div class="mt-3">
        <div class="text-2xl font-bold text-gray-900">3.456</div>
        <div class="mt-1 flex items-center gap-1.5 text-2xs text-emerald-600 font-semibold">
          <i data-lucide="trending-up" class="h-3.5 w-3.5"></i>
          <span>+8.7%</span>
          <span class="text-muted-foreground font-normal">antrean selesai</span>
        </div>
      </div>
    </div>

    <!-- Stat 4: Conversion / Success Rate -->
    <div class="rounded-xl border border-border bg-white p-5 shadow-sm transition hover:shadow-md">
      <div class="flex items-center justify-between">
        <span class="text-xs font-medium text-muted-foreground">Tingkat Ketepatan Waktu</span>
        <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
          <i data-lucide="target" class="h-4 w-4"></i>
        </div>
      </div>
      <div class="mt-3">
        <div class="text-2xl font-bold text-gray-900">98.4%</div>
        <div class="mt-1 flex items-center gap-1.5 text-2xs text-emerald-600 font-semibold">
          <i data-lucide="trending-up" class="h-3.5 w-3.5"></i>
          <span>+2.1%</span>
          <span class="text-muted-foreground font-normal">standar operasional</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Analytics & Service Progress -->
  <div class="grid gap-6 lg:grid-cols-3">
    <!-- Chart: Weekly Activity -->
    <div class="rounded-xl border border-border bg-white p-5 shadow-sm lg:col-span-2">
      <div class="flex items-center justify-between mb-4">
        <div>
          <h2 class="text-sm font-bold text-gray-900">Aktivitas Cetak Mingguan</h2>
          <p class="text-2xs text-muted-foreground">Statistik jumlah berkas dicetak dan total pengunjung</p>
        </div>
        <span class="rounded-md bg-gray-100 px-2 py-1 text-2xs font-semibold text-gray-600">7 Hari Terakhir</span>
      </div>
      <div class="h-64 w-full">
        <canvas id="weeklyChart"></canvas>
      </div>
    </div>

    <!-- Progress: Service Categories -->
    <div class="rounded-xl border border-border bg-white p-5 shadow-sm">
      <div class="flex items-center justify-between mb-4">
        <h2 class="text-sm font-bold text-gray-900">Kategori Layanan</h2>
        <span class="text-2xs text-primary font-semibold">Kapasitas</span>
      </div>
      <div class="space-y-4">
        <div>
          <div class="flex justify-between text-xs font-medium text-gray-700 mb-1">
            <span>Cetak Tugas Akhir &amp; Skripsi</span>
            <span class="font-semibold text-gray-900">82%</span>
          </div>
          <div class="h-2 w-full overflow-hidden rounded-full bg-gray-100">
            <div class="h-full rounded-full bg-primary" style="width: 82%"></div>
          </div>
        </div>

        <div>
          <div class="flex justify-between text-xs font-medium text-gray-700 mb-1">
            <span>Print Warna &amp; Poster</span>
            <span class="font-semibold text-gray-900">65%</span>
          </div>
          <div class="h-2 w-full overflow-hidden rounded-full bg-gray-100">
            <div class="h-full rounded-full bg-emerald-500" style="width: 65%"></div>
          </div>
        </div>

        <div>
          <div class="flex justify-between text-xs font-medium text-gray-700 mb-1">
            <span>Penjilidan Hard/Soft Cover</span>
            <span class="font-semibold text-gray-900">91%</span>
          </div>
          <div class="h-2 w-full overflow-hidden rounded-full bg-gray-100">
            <div class="h-full rounded-full bg-amber-500" style="width: 91%"></div>
          </div>
        </div>

        <div>
          <div class="flex justify-between text-xs font-medium text-gray-700 mb-1">
            <span>Fotocopy &amp; Scan Dokumen</span>
            <span class="font-semibold text-gray-900">48%</span>
          </div>
          <div class="h-2 w-full overflow-hidden rounded-full bg-gray-100">
            <div class="h-full rounded-full bg-blue-500" style="width: 48%"></div>
          </div>
        </div>
      </div>

      <div class="mt-6 rounded-lg bg-indigo-50/60 p-3.5 border border-indigo-100">
        <div class="flex items-start gap-2.5">
          <i data-lucide="info" class="h-4 w-4 text-primary shrink-0 mt-0.5"></i>
          <p class="text-2xs leading-relaxed text-indigo-900">
            Mesin Cetak Printer 01 dan 03 beroperasi optimal tanpa kendala tinta.
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- Recent Orders & Live Activity -->
  <div class="grid gap-6 lg:grid-cols-2">
    <!-- Recent Orders Table -->
    <div class="rounded-xl border border-border bg-white p-5 shadow-sm">
      <div class="flex items-center justify-between mb-4">
        <div>
          <h2 class="text-sm font-bold text-gray-900">Pesanan Cetak Terbaru</h2>
          <p class="text-2xs text-muted-foreground">Daftar transaksi masuk hari ini</p>
        </div>
        <a href="{{ route('pelanggan.index') }}" class="inline-flex items-center gap-1 text-2xs font-semibold text-primary hover:underline">
          Lihat Semua <i data-lucide="arrow-up-right" class="h-3 w-3"></i>
        </a>
      </div>
      <div class="overflow-x-auto">
        <table class="w-full text-left text-xs">
          <thead>
            <tr class="border-b border-border text-muted-foreground font-semibold">
              <th class="pb-2">Order ID</th>
              <th class="pb-2">Mahasiswa / Pemesan</th>
              <th class="pb-2">Biaya</th>
              <th class="pb-2 text-right">Status</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100">
            <tr>
              <td class="py-2.5 font-semibold text-gray-900">#ORD-9012</td>
              <td class="py-2.5">
                <div class="font-medium text-gray-900">M. Harun Al Rasyid</div>
                <div class="text-2xs text-muted-foreground">Laporan Praktikum (50 Lembar)</div>
              </td>
              <td class="py-2.5 font-semibold text-gray-900">Rp 25.000</td>
              <td class="py-2.5 text-right">
                <span class="inline-flex items-center rounded-full bg-emerald-50 px-2 py-0.5 text-2xs font-medium text-emerald-700">Selesai</span>
              </td>
            </tr>
            <tr>
              <td class="py-2.5 font-semibold text-gray-900">#ORD-9011</td>
              <td class="py-2.5">
                <div class="font-medium text-gray-900">Keyla Syahrani</div>
                <div class="text-2xs text-muted-foreground">Modul Praktikum (30 Lembar)</div>
              </td>
              <td class="py-2.5 font-semibold text-gray-900">Rp 15.000</td>
              <td class="py-2.5 text-right">
                <span class="inline-flex items-center rounded-full bg-blue-50 px-2 py-0.5 text-2xs font-medium text-blue-700">Diproses</span>
              </td>
            </tr>
            <tr>
              <td class="py-2.5 font-semibold text-gray-900">#ORD-9010</td>
              <td class="py-2.5">
                <div class="font-medium text-gray-900">Alfiano Yudistira</div>
                <div class="text-2xs text-muted-foreground">Skripsi Bab 1-5 (Hardcover)</div>
              </td>
              <td class="py-2.5 font-semibold text-gray-900">Rp 75.000</td>
              <td class="py-2.5 text-right">
                <span class="inline-flex items-center rounded-full bg-amber-50 px-2 py-0.5 text-2xs font-medium text-amber-700">Antrean</span>
              </td>
            </tr>
            <tr>
              <td class="py-2.5 font-semibold text-gray-900">#ORD-9009</td>
              <td class="py-2.5">
                <div class="font-medium text-gray-900">Rafi PCR</div>
                <div class="text-2xs text-muted-foreground">Poster Seminar Full Color</div>
              </td>
              <td class="py-2.5 font-semibold text-gray-900">Rp 30.000</td>
              <td class="py-2.5 text-right">
                <span class="inline-flex items-center rounded-full bg-emerald-50 px-2 py-0.5 text-2xs font-medium text-emerald-700">Selesai</span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Live Activity Feed -->
    <div class="rounded-xl border border-border bg-white p-5 shadow-sm">
      <div class="flex items-center justify-between mb-4">
        <div>
          <h2 class="text-sm font-bold text-gray-900">Aktivitas Terkini</h2>
          <p class="text-2xs text-muted-foreground">Pembaruan sistem real-time</p>
        </div>
        <span class="inline-flex items-center gap-1 text-2xs font-semibold text-emerald-600">
          <span class="h-1.5 w-1.5 rounded-full bg-emerald-500 animate-pulse"></span> Live
        </span>
      </div>

      <div class="space-y-4">
        <div class="flex items-start gap-3">
          <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-emerald-50 text-emerald-600">
            <i data-lucide="check-circle" class="h-4 w-4"></i>
          </div>
          <div class="flex-1 min-w-0">
            <p class="text-xs font-semibold text-gray-900">Pesanan #ORD-9012 telah diambil</p>
            <p class="text-2xs text-muted-foreground">M. Harun Al Rasyid mengambil berkas di loket 1</p>
            <span class="text-[10px] text-gray-400">2 menit yang lalu</span>
          </div>
        </div>

        <div class="flex items-start gap-3">
          <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-indigo-50 text-indigo-600">
            <i data-lucide="file-text" class="h-4 w-4"></i>
          </div>
          <div class="flex-1 min-w-0">
            <p class="text-xs font-semibold text-gray-900">File dokumen baru diunggah</p>
            <p class="text-2xs text-muted-foreground">Keyla Syahrani mengunggah file `modul_9.pdf`</p>
            <span class="text-[10px] text-gray-400">14 menit yang lalu</span>
          </div>
        </div>

        <div class="flex items-start gap-3">
          <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
            <i data-lucide="printer" class="h-4 w-4"></i>
          </div>
          <div class="flex-1 min-w-0">
            <p class="text-xs font-semibold text-gray-900">Tinta Printer 02 hampir habis</p>
            <p class="text-2xs text-muted-foreground">Peringatan otomatis: Sisa persentase tinta kuning 12%</p>
            <span class="text-[10px] text-gray-400">1 jam yang lalu</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bottom Metric Summary Cards -->
  <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
    <div class="rounded-xl border border-border bg-white p-4 shadow-sm flex items-center gap-3">
      <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-primary/10 text-primary">
        <i data-lucide="user-check" class="h-5 w-5"></i>
      </div>
      <div>
        <p class="text-2xs text-muted-foreground font-medium">Kepuasan Pelanggan</p>
        <p class="text-base font-bold text-gray-900">96.8% (Rating 4.9)</p>
      </div>
    </div>

    <div class="rounded-xl border border-border bg-white p-4 shadow-sm flex items-center gap-3">
      <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-emerald-50 text-emerald-600">
        <i data-lucide="dollar-sign" class="h-5 w-5"></i>
      </div>
      <div>
        <p class="text-2xs text-muted-foreground font-medium">Rata-rata Transaksi</p>
        <p class="text-base font-bold text-gray-900">Rp 32.500</p>
      </div>
    </div>

    <div class="rounded-xl border border-border bg-white p-4 shadow-sm flex items-center gap-3">
      <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
        <i data-lucide="clock" class="h-5 w-5"></i>
      </div>
      <div>
        <p class="text-2xs text-muted-foreground font-medium">Rata-rata Waktu Cetak</p>
        <p class="text-base font-bold text-gray-900">5.4 Menit</p>
      </div>
    </div>

    <div class="rounded-xl border border-border bg-white p-4 shadow-sm flex items-center gap-3">
      <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-blue-50 text-blue-600">
        <i data-lucide="layers" class="h-5 w-5"></i>
      </div>
      <div>
        <p class="text-2xs text-muted-foreground font-medium">Total Kertas Hari Ini</p>
        <p class="text-base font-bold text-gray-900">2.180 Lembar</p>
      </div>
    </div>
  </div>

</div>

<!-- Chart Script -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('weeklyChart');
    if (ctx) {
      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
          datasets: [
            {
              label: 'Pesanan Cetak',
              data: [142, 186, 204, 268, 312, 120, 85],
              backgroundColor: '#6366f1',
              borderRadius: 6,
            },
            {
              label: 'Pengunjung Loket',
              data: [210, 240, 280, 350, 420, 160, 110],
              backgroundColor: '#e0e7ff',
              borderRadius: 6,
            }
          ]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              position: 'top',
              labels: {
                boxWidth: 12,
                font: { size: 11, family: 'Inter' }
              }
            }
          },
          scales: {
            x: {
              grid: { display: false }
            },
            y: {
              border: { dash: [4, 4] },
              grid: { color: '#f1f5f9' }
            }
          }
        }
      });
    }
  });
</script>
@endsection
