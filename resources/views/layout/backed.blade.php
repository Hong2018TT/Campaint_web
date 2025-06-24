<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Link set Logo tabs website --}}
   <link rel="icon" href="{{asset('assets/img/logo/favicon.ico')}}" type="image/x-icon">

    {{-- Link style Css --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- Link styel my Css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">

    <!-- Remixicon CSS -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
    <!-- Font Awesome CDN link -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    {{-- Link node editor Quill styles --}}
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css" />

    <title>Campaint</title>
</head>
<body class="relative bg-mint-gradient">

  <aside class="sidebar">
    {{-- Header slide bar --}}
    @include('components.slide_header')

    {{-- Header slide nav --}}
    @include('components.slide_nav')
  </aside>

  {{-- This Main Content --}}
  <main class="home-section">
    {{-- This Main Content Navbar top --}}
    @include('components.main_navbar')

    {{-- Overflow Height--}}
    <div class="home-body overflow-auto p-1">
        {{-- Main Content Dashboard --}}
        @yield('content')
    </div>

  </main>
  
  <style>
    [x-cloak] {
      display: none !important;
    }
  </style>
  
    {{-- Link javacript Sweetalert two --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Link jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    {{-- Link apline.js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- DataTables -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.tailwindcss.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- Buttons extension -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    
    {{-- Link node editor Quill javascript--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js"></script>

    {{-- Link my javascript --}}
    <script src="{{asset('assets/js/script.js')}}"></script>

    <script>
      $(document).ready(function () {
        initializeTailwindDataTable('.table-filter');
      });
      document.addEventListener('DOMContentLoaded', function () {
        highlightActiveNavLink();
      });
    </script>
</body>
</html>