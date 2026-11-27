<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Masuk — Lembar Sistem Printing')</title>
  <link rel="icon" type="image/png" href="{{ asset('assets-admin/brand/datadropx-icon-color.png') }}">

  <!-- Google Fonts: Inter -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Lucide Icons -->
  <script src="https://unpkg.com/lucide@latest"></script>

  <style>
    :root {
      --canvas: #f4f5f1;
      --brand: #235b48;
      --brand-dark: #194333;
      --brand-soft: #e6f0e9;
      --ink: #17231f;
      --line: #e4e9e3;
    }
    body {
      font-family: 'Inter', sans-serif;
      background: var(--canvas);
      color: var(--ink);
    }
  </style>
  @stack('styles')
</head>
<body class="min-h-screen flex items-center justify-center p-4 antialiased">

  @yield('content')

  <script>
    lucide.createIcons();
  </script>
  @stack('scripts')
</body>
</html>
