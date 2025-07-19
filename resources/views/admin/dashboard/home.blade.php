@extends ('layout.backed')

@section('content')

{{-- Dashboard summary cards --}}
<div class="w-full">
    <div class="main-grid-carts">
        <div class="box-items">
            <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 bg-red-100">
                <i class='ri-store-fill text-3xl text-red-500'></i>
            </div>
            <p class="text-2xl font-extrabold text-slate-800">{{ $depotCount }}</p>
            <p class="text-sm text-slate-500 mt-1">Depo</p>
        </div>

        <div class="box-items">
            <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 bg-sky-100">
                <i class='ri-archive-fill text-3xl text-sky-500'></i>
            </div>
            <p class="text-2xl font-extrabold text-slate-800">----</p>
            <p class="text-sm text-slate-500 mt-1">Total Product Type</p>
        </div>

        <div class="box-items">
            <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 bg-purple-100">
                <i class='ri-palette-fill text-3xl text-purple-500'></i>
            </div>
            <p class="text-2xl font-extrabold text-slate-800">----</p>
            <p class="text-sm text-slate-500 mt-1">Total Colors</p>
        </div>

        <div class="box-items">
            <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 bg-green-100">
                <i class='ri-color-filter-fill text-3xl text-green-500'></i>
            </div>
            <p class="text-2xl font-extrabold text-slate-800">----</p>
            <p class="text-sm text-slate-500 mt-1">Total Color Family</p>
        </div>
    </div>
</div>

{{-- Depo Table --}}
<div class="mt-5 shadow-lg rounded-md bg-white">
    <div class="header-main-tb">
        <div>
            <h1 class="text-xl font-semibold text-gray-900">Depo</h1>
        </div>
        <div class="sm:mt-0 sm:flex-none">
            <button type="button" class="btn-showall">Show all</button>
        </div>
    </div>

    <hr class="text-gray-300">

    <div class="mt-3 flow-root pb-2 px-3" id="depot-table-wrapper">
        @include('admin.dashboard.partials.depot_table')
    </div>
</div>

{{-- Vanilla DataTable CDN (Optional if you need it elsewhere) --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanilla-datatables@latest/dist/vanilla-dataTables.min.css">
<script src="https://cdn.jsdelivr.net/npm/vanilla-datatables@latest/dist/vanilla-dataTables.min.js"></script>

{{-- AJAX Pagination --}}
<script>
    $(document).ready(function () {
        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            let url = $(this).attr('href');
            fetchDepots(url);
        });

        function fetchDepots(url) {
            $.ajax({
                url: url,
                type: "GET",
                beforeSend: function () {
                    $('#depot-table-wrapper').html('<p class="text-center text-blue-500 py-4">Loading...</p>');
                },
                success: function (data) {
                    $('#depot-table-wrapper').html(data);
                },
                error: function () {
                    alert("Failed to load depots.");
                }
            });
        }
    });
</script>

@endsection
