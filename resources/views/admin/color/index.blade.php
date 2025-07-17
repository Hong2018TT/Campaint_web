@extends ('layout.backed')
@section('content')

{{-- content for display color --}}
<div class="shadow-lg rounded-md bg-white">
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
          <table id="#" class="table-filter table-auto min-w-full divide-y divide-blue-300">
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
                <th scope="col" class=".table-header-action rounded-tr-md">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>
            {{-- tb table --}}
            <tbody class="divide-y divide-gray-200 bg-white">
              <tr class="td-bg-dash">
                <td class="table-cell-primary">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell-actions">

                  <a href="{{route('admin.color.edit')}}" class="table-action-edit"><i class="ri-edit-circle-fill"></i></a>
                  
                  <div x-data="{ open: false }">
                    <button @click="open = true" class="table-action-delete">
                      <i class="ri-delete-bin-6-fill"></i>
                    </button>
                    <!-- Backdrop -->
                    <div x-show="open" x-cloak @include('components.modal.model-transition')>
                      <div x-show="open" @include('components.modal.model-fade')
                          {{-- For set mourseout --}}
                          class="modal-box-md" @click.outside="open = true">

                        <div class="modal-header-del">Delete</div>
                        <hr class="border-1 border-gray-400">

                        <div class="modal-body text-left px-4 py-2 whitespace-normal">
                          <p class="text-lg text-red-500">Are you sure you want to delete this item?</p>
                        </div>

                        <div class="model-footer flex justify-end space-x-2 px-4 pt-4">
                          <a @click="open = false" class="btn-close-model">Close</a>
                          <a href="#" class="btn-del-model">Delete</a>
                        </div>
                      </div>
                    </div>
                  </div>

                </td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>
  </div>
</div>
</div>

@endsection