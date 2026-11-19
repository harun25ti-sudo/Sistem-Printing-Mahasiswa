<!-- Google Fonts: Inter -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<!-- Tailwind CSS v3 via CDN configured with Lembar / Paper & Signal theme -->
<script src="https://cdn.tailwindcss.com"></script>
<script>
  tailwind.config = {
    darkMode: 'class',
    theme: {
      extend: {
        fontFamily: {
          sans: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
        },
        colors: {
          brand: {
            DEFAULT: '#235b48',
            dark: '#194333',
            soft: '#e6f0e9',
          },
          primary: {
            DEFAULT: '#235b48',
            50: '#f2f7f4',
            100: '#e6f0e9',
            200: '#cce2d5',
            500: '#235b48',
            600: '#1d4d3d',
            700: '#194333',
            900: '#0f291f',
          },
          border: '#e4e9e3',
          card: '#ffffff',
          sidebar: '#fbfcf9',
          'sidebar-accent': '#f0f3ef',
          'sidebar-foreground': '#65716a',
          muted: '#f0f3ef',
          'muted-foreground': '#7f8a83',
          success: '#235b48',
          warning: '#a9752e',
          destructive: '#b85a4c',
          info: '#7193b4'
        },
        fontSize: {
          '2xs': ['0.6875rem', { lineHeight: '1rem' }],
        },
        boxShadow: {
          'card': '0 5px 18px rgba(27,46,36,.055)',
          'dropdown': '0 18px 50px rgba(27,46,36,.08)',
        }
      }
    }
  }
</script>

<style>
  :root {
    --brand: #235b48;
    --brand-dark: #194333;
    --brand-soft: #e6f0e9;
    --ink: #17231f;
    --ink-soft: #52605a;
    --line: #e4e9e3;
    --tone-sidebar: #fbfcf9;
  }
  body {
    font-family: 'Inter', sans-serif;
    background-color: #f4f5f1;
    color: #17231f;
  }
  /* Custom scrollbar for sidebar and tables */
  ::-webkit-scrollbar {
    width: 6px;
    height: 6px;
  }
  ::-webkit-scrollbar-track {
    background: transparent;
  }
  ::-webkit-scrollbar-thumb {
    background: #d5ddd5;
    border-radius: 9999px;
  }
  ::-webkit-scrollbar-thumb:hover {
    background: #9ba49d;
  }
</style>
