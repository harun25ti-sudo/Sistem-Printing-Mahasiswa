<!-- Google Fonts: Inter -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<!-- Tailwind CSS v3/v4 via CDN -->
<script src="https://cdn.tailwindcss.com"></script>
<script>
  tailwind.config = {
    darkMode: 'class',
    theme: {
      extend: {
        fontFamily: {
          sans: ['Inter', 'sans-serif'],
        },
        colors: {
          primary: {
            DEFAULT: '#6366f1',
            50: '#eef2ff',
            100: '#e0e7ff',
            200: '#c7d2fe',
            500: '#6366f1',
            600: '#4f46e5',
            700: '#4338ca',
            900: '#312e81',
          },
          border: '#e5e7eb',
          card: '#ffffff',
          sidebar: '#ffffff',
          'sidebar-accent': '#f3f4f6',
          'sidebar-foreground': '#374151',
          'muted': '#f3f4f6',
          'muted-foreground': '#6b7280',
          success: '#10b981',
          warning: '#f59e0b',
          destructive: '#ef4444',
          info: '#3b82f6',
          brand: '#c2410c'
        },
        fontSize: {
          '2xs': ['0.6875rem', { lineHeight: '1rem' }],
        },
        boxShadow: {
          'card': '0 1px 3px 0 rgb(0 0 0 / 0.05), 0 1px 2px -1px rgb(0 0 0 / 0.05)',
          'dropdown': '0 8px 24px -6px rgb(0 0 0 / 0.14), 0 2px 6px -2px rgb(0 0 0 / 0.06)',
        }
      }
    }
  }
</script>

<style>
  body {
    font-family: 'Inter', sans-serif;
  }
  /* Custom scrollbar for sidebar and table */
  ::-webkit-scrollbar {
    width: 6px;
    height: 6px;
  }
  ::-webkit-scrollbar-track {
    background: transparent;
  }
  ::-webkit-scrollbar-thumb {
    background: #e2e8f0;
    border-radius: 9999px;
  }
  ::-webkit-scrollbar-thumb:hover {
    background: #cbd5e1;
  }
</style>
