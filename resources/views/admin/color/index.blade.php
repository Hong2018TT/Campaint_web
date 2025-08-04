@extends ('layout.backed')
@section('content')
@include('components.sweetalerttwo.alerttwo')

{{-- content for display color --}}
<div class="shadow-lg rounded-md bg-white">
  @include('components.txt-error.txt-error')
  
    <div class="header-main-tb">
        <div class="">
        <h1 class="text-xl font-semibold text-green-800">Color</h1>
        </div>
        <div class="sm:mt-0 sm:flex-none bg">
          <a href="{{route('admin.color.create')}}">
            <button type="button" class="btn-add">
              <i class="ri-add-line text-md"></i>
              Color</button>
          </a>
        </div>
    </div>

    <hr class="text-gray-200">

    <div class="mt-3 flow-root pb-2 px-3">
      <div class="tb-overflow">
        <div class="inline-block min-w-full pb-2 align-middle pt-2">
          <table id="color-table" class="table-auto min-w-full divide-y divide-blue-300">
          {{-- th table --}}
            <thead class="bg-[#008442]">
              <tr>
                <th scope="col" class="table-header rounded-tl-md">ID</th>
                <th scope="col" class="table-header">Color code</th>
                <th scope="col" class="table-header">Color name</th>
                <th scope="col" class="table-header">R</th>
                <th scope="col" class="table-header">G</th>
                <th scope="col" class="table-header">B</th>
                <th scope="col" class="table-header">color preview</th>
                <th scope="col" class="table-header">product type</th>
                <th scope="col" class="table-header">color family</th>
                <th scope="col" class="table-header-action rounded-tr-md">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>
            {{-- tb table --}}
            <tbody class="divide-y divide-gray-200 bg-white">
              
            </tbody>
            
          </table>
        </div>
      </div>
  </div>
</div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize the DataTable and get the instance
        const table = $('#color-table').DataTable({

            serverSide: true,
            ajax: '{{ route('admin.color.data') }}',
            columns: [
                // The index column added by addIndexColumn() on the server
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, },
                { data: 'color_code', name: 'color_code',},
                { data: 'color_name', name: 'color_name',},
                { data: 'r', name: 'r',},
                { data: 'g', name: 'g',},
                { data: 'b', name: 'b',},
                { data: 'color_preview', name: 'color_preview', orderable: false, searchable: false,},
                { data: 'product_type', name: 'product_type',},
                { data: 'color_family', name: 'color_family',},
                // The custom 'action' column is handled by the controller
                { data: 'action', name: 'action', orderable: false, searchable: false,}
            ],

            createdRow: function (row, data, dataIndex) {
                $(row).addClass('td-bg-dash');
                $(row).find('td').addClass('table-cell');
            },
            
            dom: '<"top flex flex-wrap items-center justify-between mb-2 lg:ml-1"Bfl>rt<"bottom flex flex-wrap items-center justify-between mt-2 "ip>',
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
    });
</script>
@endsection