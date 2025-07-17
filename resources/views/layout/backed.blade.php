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

    {{-- Link Datatable.net --}}
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.tailwindcss.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

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
      <div class="m-4">
        {{-- Main Content Dashboard --}}
        @yield('content')
      </div>
    </script>
    </div>

  </main>
  
  <style>
    [x-cloak] {
      display: none !important;
    }
  </style>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

<script src="{{asset('assets/js/script.js')}}"></script>

<script>
    // SweetAlert notifications for session messages
    @if (session('success'))
        Swal.fire({
            position: "center",
            icon: "success",
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 1500
        });
    @elseif (session('error'))
        Swal.fire({
            position: "center",
            icon: "error",
            title: "{{ session('error') }}",
            showConfirmButton: false,
            timer: 1500
        });
    @endif

    // Initialize plugins and event listeners after the DOM is fully loaded
    $(document).ready(function () {
        initializeTailwindDataTable('.table-filter');
    });

    document.addEventListener('DOMContentLoaded', function () {
        highlightActiveNavLink();
    });

</script>
</body>
</html>