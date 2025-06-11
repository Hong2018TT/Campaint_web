@extends ('layout.backed')
@section('content')

{{-- Content for display product --}}
<div class="m-3 mb-6 sm:px-6 shadow-lg rounded-md bg-white">
    <div class="header-main-tb">
        <div class="">
            <h1 class="text-2xl font-semibold text-gray-900">Product</h1>
        </div>
        <div class="sm:mt-0 sm:flex-none bg">
            <a href="{{route('admin.product.create')}}">
                <button type="button" class="cursor-pointer block rounded-sm bg-blue-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-xs hover:bg-blue-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">
                  <i class="ri-add-line text-md"></i>
                  Product</button>
            </a>
        </div>
    </div>

    <hr class="text-gray-200">

    <div class="mt-3 flow-root pb-2">
    <div class="tb-overflow">
      <div class="inline-block min-w-full pb-2 align-middle sm:px-2 pt-2">
        <table id="#" class="table-filter table-auto min-w-full divide-y divide-blue-300">
        {{-- th table --}}
          <thead class="bg-[#002398]">
            <tr>
              <th scope="col" class="table-header">Name</th>
              <th scope="col" class="table-header">Title</th>
              <th scope="col" class="table-header">Email</th>
              <th scope="col" class="table-header">Role</th>
              <th scope="col" class=".table-header-action">
                <span class="sr-only">Edit</span>
              </th>
            </tr>
          </thead>
          {{-- tb table --}}
          <tbody class="divide-y divide-gray-200 bg-white">
            <tr class="td-bg-dash">
              <td class="table-cell-primary">Lindsay Walton</td>
              <td class="table-cell">Front-end Developer</td>
              <td class="table-cell">lindsay.walton@example.com</td>
              <td class="table-cell">Member</td>
              <td class="table-cell-actions">

                <a href="{{route('admin.product.edit')}}" class="table-action-edit"><i class="ri-edit-circle-fill"></i></a>
                <div x-data="{ open: false }">
                  <button @click="open = true" class="table-action-delete">
                    <i class="ri-delete-bin-6-fill"></i>
                  </button>
                  <!-- Backdrop -->
                  <div x-show="open" x-cloak @include('components.modal.model-transition')>
                    <div x-show="open" @include('components.modal.model-fade')
                        class="modal-box-md" @click.outside="open = false">

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

              <!-- More people... -->
                <a href="{{route('admin.product.edit')}}" class="table-action-edit"><i class='bx bxs-edit'></i></a>
                <a href="#" class="table-action-delete"><i class='bx bx-trash-alt'></i></a>
              </td>
            </tr>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection