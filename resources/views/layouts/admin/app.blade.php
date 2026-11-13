<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DropX Admin - Sistem Printing Mahasiswa</title>

  <!-- Favicons -->
  <link rel="icon" type="image/png" href="{{ asset('assets-admin/brand/datadropx-icon-color.png') }}">

  {{-- start css --}}
  @include('layouts.admin.css')
  {{-- end css --}}
</head>
<body class="bg-gray-50 text-gray-900 antialiased">

  <div class="flex h-screen overflow-hidden">
    {{-- start sidebar --}}
    @include('layouts.admin.sidebar')
    {{-- end sidebar --}}

    <div class="flex flex-1 flex-col overflow-hidden">
      {{-- start header --}}
      @include('layouts.admin.header')
      {{-- end header --}}

      <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">
        {{-- start main content --}}
        @yield('content')
        {{-- end main content --}}

        {{-- start footer --}}
        @include('layouts.admin.footer')
        {{-- end footer --}}
      </main>
    </div>
  </div>

  {{-- start js --}}
  @include('layouts.admin.js')
  {{-- end js --}}

</body>
</html>
