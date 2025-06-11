<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{asset('assets/img/logo/Logo Campaint Original.png')}}">
    {{-- Link style Css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    <!-- Remixicon CSS -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
    {{-- Link script sweetalert2  --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- Google Icon  --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=chevron_left" />
    {{-- Link javacript Sweetalert two --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- DataTables -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.tailwindcss.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    {{-- Link node editor Quill styles --}}
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
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