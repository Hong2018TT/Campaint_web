@extends('layout.backed')
@section('content')

<div class="shadow-lg rounded-md bg-white">
    <div class="header-main-tb">
        <div>
            <h1 class="text-xl font-semibold text-gray-900">Depo</h1>
        </div>
        <div class="sm:mt-0 sm:flex-none">
            <a href="{{ route('admin.depo.create') }}">
                <button type="button" class="cursor-pointer block rounded-sm bg-blue-600 px-3 py-2 text-sm font-semibold text-white hover:bg-blue-500">
                    <i class="ri-add-line text-md"></i> Add Depo
                </button>
            </a>
        </div>
    </div>

    <hr class="text-gray-200">

    <div class="mt-3 flow-root pb-2 px-3">
        <div class="max-w-xs mb-3">
            <label for="provinceFilter" class="block text-sm font-medium text-gray-700">Filter by Province</label>
            <select id="provinceFilter" class="mt-1 block w-full border-gray-300 rounded-sm shadow-sm text-sm">
                <option value="">All</option>
                <option value="Phnom Penh">Phnom Penh</option>
                <option value="Kandal">Kandal</option>
                <option value="Siem Reap">Siem Reap</option>
                <!-- Add more provinces as needed -->
            </select>
        </div>

        <div class="tb-overflow">
            <table id="depotTable" class="table-filter min-w-full divide-y divide-blue-300">
                <thead class="bg-[#002398] text-white">
                    <tr>
                        <th>ID</th>
                        <th>Name (EN)</th>
                        <th>Name (KH)</th>
                        <th>Address (EN)</th>
                        <th>Province (EN)</th>
                        <th>Address (KH)</th>
                        <th>Province (KH)</th>
                        <th>Phone</th>
                        <th>GPS</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    {{-- DataTables will populate rows --}}
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- DataTables and export dependencies --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.tailwindcss.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<script>
let dataTable;

function initDataTable(filter = '') {
    if ($.fn.DataTable.isDataTable('#depotTable')) {
        $('#depotTable').DataTable().clear().destroy();
    }

    dataTable = $('#depotTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('admin.depo.ajax') }}",
            data: function (d) {
                d.province = filter;
            }
        },
        columns: [
            { data: 'id' },
            { data: 'Name_EN' },
            { data: 'Name_KH' },
            { data: 'Address_EN' },
            { data: 'province_EN' },
            { data: 'Address_KH' },
            { data: 'province_KH' },
            { data: 'Phone' },
            { data: 'GPS' },
            { data: 'action', orderable: false, searchable: false }
        ],
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        destroy: true
    });
}

$(document).ready(function () {
    initDataTable();

    $('#provinceFilter').on('change', function () {
        const province = $(this).val();
        initDataTable(province);
    });
});
</script>

@endsection
