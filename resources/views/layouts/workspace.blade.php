<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#f5f6f2">
  <title>@yield('title', 'Ruang Kerja Lembar — Layanan Cetak Kampus')</title>

  <!-- Tabler Core CSS (Bootstrap 5 included) -->
  <link rel="stylesheet" href="{{ asset('assets/tabler/css/tabler.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/tabler/css/tabler-vendors.min.css') }}">

  <!-- Lembar Signature CSS (Overrides & Design identity) -->
  <link rel="stylesheet" href="{{ asset('assets/lembar/css/lembar.css') }}">
  @stack('styles')
</head>
<body data-default-role="{{ $defaultRole ?? 'partner' }}">
  <div class="app-layout">
    @include('components.lembar.sidebar')

    <main class="main-content">
      @include('components.lembar.topbar', ['pageTitle' => $__env->yieldContent('page-title', 'Ruang Kerja')])

      <div class="content-scroll">
        @yield('content')
      </div>
    </main>
  </div>

  @include('components.lembar.modals')

  <!-- Tabler Core JS -->
  <script src="{{ asset('assets/tabler/js/tabler.min.js') }}"></script>

  <!-- Lembar Core UI Logic -->
  <script src="{{ asset('assets/lembar/js/lembar.js') }}"></script>
  @stack('scripts')
</body>
</html>
