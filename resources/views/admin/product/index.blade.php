@extends ('layout.backed')
@section('content')

{{-- Content for display product --}}
<div class="shadow-lg rounded-md bg-white">
    <div class="header-main-tb">
        <div class="">
            <h1 class="text-xl font-semibold text-green-800">Product</h1>
        </div>
        <div class="sm:mt-0 sm:flex-none">
            <a href="{{route('admin.product.create')}}">
                <button type="button" class="btn-add">
                  <i class="ri-add-line text-md"></i>
                  Product</button>
            </a>
        </div>
    </div>

    <hr class="text-gray-300">
    
    <div class="mt-3 flow-root pb-2 px-3">
      <div class="tb-overflow">
        <div class="inline-block min-w-full pb-2 align-middle pt-2">
          <table id="#" class="table-filter min-w-full divide-y divide-green-300">
          {{-- th table --}}
            <thead class="bg-[#008442]">
              <tr>
                <th scope="col" class="table-header rounded-tl-md">ID</th>
                <th scope="col" class="table-header">Name (English)</th>
                <th scope="col" class="table-header">Name (khmer)</th>
                <th scope="col" class="table-header">Image</th>
                <th scope="col" class=".table-header-action rounded-tr-md">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>
            {{-- tb table --}}
            <tbody class="divide-y divide-gray-200 bg-white">
              <tr class="td-bg-dash">
                <td class="table-cell-primary">1</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>

                <td class="table-cell-actions">
                  <a href="{{route('admin.product.edit')}}" class="table-action-edit"><i class="ri-edit-circle-fill"></i></a>
                  <div x-data="{ open: false }">
                    <button @click="open = true" class="table-action-delete">
                      <i class="ri-delete-bin-6-fill"></i>
                    </button>
                    <!-- Backdrop -->
                    <div x-show="open" x-cloak @include('components.modal.model-transition')>
                      <div x-show="open" @include('components.modal.model-fade')
                          class="modal-box-md" @click.outside="open = true">

                        <div class="modal-header-del">Delete</div>
                        <hr class="border-1 border-gray-400">

                        <div class="modal-body text-left px-4 py-2 whitespace-normal">
                          <p class="text-lg text-red-500">Are you sure you want to delete this item?</p>
                        </div>

                        <form action="" id="" name="" method="POST">
                          <div class="model-footer flex justify-end space-x-2 px-4 pt-4">
                            <a @click="open = false" class="btn-close-model">Close</a>
                            <button type="submit" class="btn-del-model">Delete</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>

            <!-- More people... -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>

@endsection