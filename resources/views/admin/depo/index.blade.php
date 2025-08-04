@extends ('layout.backed')
@section('content')
@include('components.sweetalerttwo.alerttwo')

{{-- Content for display depo --}}
<div class="shadow-lg rounded-md bg-white">
    <div class="header-main-tb">
        <div class="">
            <h1 class="text-xl font-semibold text-green-800">Depo</h1>
        </div>
        <div class="sm:mt-0 sm:flex-none bg">
            <a href="{{ route('admin.depo.create') }}">
                <button type="button" class="btn-add">
                    <i class='ri-add-line text-md'></i>
                Depo</button>
            </a>
        </div>
    </div>

    <hr class="text-gray-200">

    <div class="mt-3 flow-root pb-2 px-3">
        <div class="tb-overflow">
            <div class="max-w-xs">
                <label for="provinceFilter" class="block text-md font-bold leading-6 text-green-800">Filter by Province (English)</label>
                <div class="relative mt-1">
                    <select id="provinceFilter" name="provinceFilter" class="filter-product">
                        <option selected value="">Show All Province</option>
                        {{-- Populate the filter from the provinces passed by the controller --}}
                        @foreach ($province_selete as $province_seletes)
                            <option value="{{ $province_seletes }}">{{ $province_seletes}}</option>
                        @endforeach
                    </select>

                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                        <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 3a.75.75 0 01.53.22l3.5 3.5a.75.75 0 01-1.06 1.06L10 4.81 6.53 8.28a.75.75 0 01-1.06-1.06l3.5-3.5A.75.75 0 0110 3zm-3.72 9.28a.75.75 0 011.06 0L10 15.19l3.47-3.47a.75.75 0 111.06 1.06l-4 4a.75.75 0 01-1.06 0l-4-4a.75.75 0 010-1.06z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="inline-block min-w-full pb-2 align-middle pt-2">
                <table id="depo-table" class="min-w-full divide-y divide-green-300">
                    <thead class="bg-[#008442]">
                        <tr>
                            <th scope="col" class="table-header rounded-tl-md">ID</th>
                            <th scope="col" class="table-header">Name (en)</th>
                            <th scope="col" class="table-header">Name (kh)</th>
                            <th scope="col" class="table-header">Address (en)</th>
                            <th scope="col" class="table-header">Province (en)</th>
                            <th scope="col" class="table-header">Address (kh)</th>
                            <th scope="col" class="table-header">Province (kh)</th>
                            <th scope="col" class="table-header">Phone</th>
                            <th scope="col" class="table-header">Gps</th>
                            <th scope="col" class="table-header-action rounded-tr-md">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        {{-- The tbody will now be populated by DataTables via AJAX, so this loop is removed. --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize the DataTable and get the instance
        const table = $('#depo-table').DataTable({
            // ✅ Enable server-side processing
            serverSide: true,
            // ✅ Specify the URL for the data source
            ajax: '{{ route('admin.depo.data') }}',

            // Define the columns that will be displayed
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                { data: 'Name_EN', name: 'Name_EN'},
                { data: 'Name_KH', name: 'Name_KH' },
                { data: 'Address_EN', name: 'Address_EN' },
                { data: 'province_EN', name: 'province_EN' },
                { data: 'Address_KH', name: 'Address_KH' },
                { data: 'province_KH', name: 'province_KH' },
                { data: 'Phone', name: 'Phone' },
                { data: 'GPS', name: 'GPS' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ],

            createdRow: function (row, data, dataIndex) {
                $(row).addClass('td-bg-dash');
                $(row).find('td').addClass('table-cell');
            },

            // ✅ Add buttons extension
            dom: '<"top flex flex-wrap items-center justify-between mb-2 gap-2 lg:ml-1"Bfl>rt<"bottom flex flex-wrap items-center justify-between mt-2 gap-2"ip>',
            buttons: {
                dom: {
                    button: {
                        className: ''
                    }
                },
                buttons: [
                    { extend: 'copy', text: '<i class="ri-file-copy-2-fill"></i>', className: 'btn-database bg-green-500 hover:bg-green-600', titleAttr: 'Copy to clipboard' },
                    { extend: 'excel', text: '<i class="ri-file-excel-2-fill"></i>', className: 'btn-database bg-blue-500 rounded hover:bg-blue-600' },
                    { extend: 'csv', text: '<i class="ri-file-text-fill"></i>', className: 'btn-database bg-yellow-500 hover:bg-yellow-600' },
                    { extend: 'pdf', text: '<i class="ri-file-pdf-2-fill"></i>', className: 'btn-database bg-orange-500 hover:bg-red-600' },
                    { extend: 'print', text: '<i class="ri-printer-fill"></i>', className: 'btn-database bg-purple-500 hover:bg-purple-600' }
                ]
            },
            language: {
                search: "",
                searchPlaceholder: "Search",
                lengthMenu: "Show _MENU_ entries",
                paginate: {
                    previous: '<button class="px-2 py-1 bg-green-700 text-white rounded hover:bg-green-800 transition cursor-pointer">&laquo;</button>',
                    next: '<button class="px-2 py-1 bg-green-700 text-white rounded hover:bg-green-800 transition cursor-pointer">&raquo;</button>'
                }
            },
            initComplete: function () {
                const wrapper = $(this).closest('.dataTables_wrapper');
                const filter = wrapper.find('.dataTables_filter');
                const length = wrapper.find('.dataTables_length');
                const info = wrapper.find('.dataTables_info');
                const paginate = wrapper.find('.dataTables_paginate');

                const customTopBar = $('<div class="flex flex-wrap items-center justify-between mb-2 gap-2"></div>');
                customTopBar.append(length);
                customTopBar.append(filter);

                const customBottomBar = $('<div class="flex flex-wrap items-center justify-between gap-2"></div>');
                customBottomBar.append(info);
                customBottomBar.append(paginate);

                wrapper.find('> .row').first().remove();
                wrapper.prepend(customTopBar);
                wrapper.append(customBottomBar);

                info.addClass('text-[13px] text-green-800');
            }
        });

        // ✅ Filtering by Province (EN)
        $('#provinceFilter').on('change', function () {
            var val = $.fn.dataTable.util.escapeRegex($(this).val());
            // Use the `table` instance to perform the search on the specific column
            // The search() method now sends a request to the server with the filter value
            table.column(4).search(val ? '^' + val + '$' : '', true, false).draw();
        });
    });
</script>
@endsection
