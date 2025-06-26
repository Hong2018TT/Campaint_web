@extends ('layout.backed')
@section('content')

{{-- content for display dashboard --}}
<div class="w-full p-3">
    <div class="main-grid-carts">
      <div class="box-items">
          <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 bg-red-100">
              <i class='ri-store-fill text-3xl w-8 h-8 text-red-500'></i>
            </div>
            <p class="text-2xl font-extrabold text-slate-800">----</p>
            <p class="text-sm text-slate-500 mt-1">Depo</p>
        </div>

        <div class="box-items">
            <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 bg-sky-100">
              <i class='ri-archive-fill w-8 h-8 text-sky-500 text-3xl'></i>
            </div>
            <p class="text-2xl font-extrabold text-slate-800">----</p>
            <p class="text-sm text-slate-500 mt-1">Total Product Type</p>
        </div>

        <div class="box-items">
            <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 bg-purple-100">
              <i class='ri-palette-fill text-3xl w-8 h-8 text-purple-500'></i>
            </div>
            <p class="text-2xl font-extrabold text-slate-800">----</p>
            <p class="text-sm text-slate-500 mt-1">Total Colors</p>
        </div>

        <div class="box-items">
            <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 bg-green-100">
              <i class='ri-color-filter-fill text-3xl w-8 h-8 text-green-500'></i>
            </div>
            <p class="text-2xl font-extrabold text-slate-800">----</p>
            <p class="text-sm text-slate-500 mt-1">Total Color family</p>
        </div>
    </div>
</div>

<div class="m-3 mb-6 shadow-lg rounded-md bg-white">
  <div class="header-main-tb">
    <div class="">
      <h1 class="text-xl font-semibold text-gray-900">Depo</h1>
    </div>
    <div class="sm:mt-0 sm:flex-none">
      <button type="button" class="btn-showall">Show all</button>
    </div>
  </div>

  <hr class="text-gray-300">

  <div class="mt-3 flow-root pb-2 px-3">
    <div class="tb-overflow">
      <div class="inline-block min-w-full pb-2 align-middle pt-2">
        <table id="#" class="table-filter min-w-full divide-y divide-blue-300">
        {{-- th table --}}
          <thead class="bg-[#002398]">
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
          {{-- tb table --}}
          <tbody class="divide-y divide-gray-200 bg-white">
            <tr class="td-bg-dash">
                <td class="table-cell-primary">ID</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell-actions">

                    <a href="{{route('admin.depo.edit')}}" class="table-action-edit"><i class="ri-edit-circle-fill"></i></a>
                </div>
                    <div x-data="{ open: false }">
                        <button @click="open = true" class="table-action-delete">
                            <i class="ri-delete-bin-6-fill"></i>
                        </button>
                        <!-- Backdrop -->
                        <div x-show="open" x-cloak
                            @include('components.modal.model-transition')>

                            <div x-show="open" @include('components.modal.model-fade')
                                class="modal-box-md"
                                @click.outside="open = false">

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

            <tr class="td-bg-dash">
                <td class="table-cell-primary">ID</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell-actions">

                    <a href="{{route('admin.depo.edit')}}" class="table-action-edit"><i class="ri-edit-circle-fill"></i></a>
                </div>
                    <div x-data="{ open: false }">
                        <button @click="open = true" class="table-action-delete">
                            <i class="ri-delete-bin-6-fill"></i>
                        </button>
                        <!-- Backdrop -->
                        <div x-show="open" x-cloak
                            @include('components.modal.model-transition')>

                            <div x-show="open" @include('components.modal.model-fade')
                                class="modal-box-md"
                                @click.outside="open = false">

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

            <tr class="td-bg-dash">
                <td class="table-cell-primary">ID</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell-actions">

                    <a href="{{route('admin.depo.edit')}}" class="table-action-edit"><i class="ri-edit-circle-fill"></i></a>
                </div>
                    <div x-data="{ open: false }">
                        <button @click="open = true" class="table-action-delete">
                            <i class="ri-delete-bin-6-fill"></i>
                        </button>
                        <!-- Backdrop -->
                        <div x-show="open" x-cloak
                            @include('components.modal.model-transition')>

                            <div x-show="open" @include('components.modal.model-fade')
                                class="modal-box-md"
                                @click.outside="open = false">

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

            <tr class="td-bg-dash">
                <td class="table-cell-primary">ID</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell-actions">

                    <a href="{{route('admin.depo.edit')}}" class="table-action-edit"><i class="ri-edit-circle-fill"></i></a>
                </div>
                    <div x-data="{ open: false }">
                        <button @click="open = true" class="table-action-delete">
                            <i class="ri-delete-bin-6-fill"></i>
                        </button>
                        <!-- Backdrop -->
                        <div x-show="open" x-cloak
                            @include('components.modal.model-transition')>

                            <div x-show="open" @include('components.modal.model-fade')
                                class="modal-box-md"
                                @click.outside="open = false">

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

            <tr class="td-bg-dash">
                <td class="table-cell-primary">ID</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell-actions">

                    <a href="{{route('admin.depo.edit')}}" class="table-action-edit"><i class="ri-edit-circle-fill"></i></a>
                </div>
                    <div x-data="{ open: false }">
                        <button @click="open = true" class="table-action-delete">
                            <i class="ri-delete-bin-6-fill"></i>
                        </button>
                        <!-- Backdrop -->
                        <div x-show="open" x-cloak
                            @include('components.modal.model-transition')>

                            <div x-show="open" @include('components.modal.model-fade')
                                class="modal-box-md"
                                @click.outside="open = false">

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

            <tr class="td-bg-dash">
                <td class="table-cell-primary">ID</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell">----</td>
                <td class="table-cell-actions">

                    <a href="{{route('admin.depo.edit')}}" class="table-action-edit"><i class="ri-edit-circle-fill"></i></a>
                </div>
                    <div x-data="{ open: false }">
                        <button @click="open = true" class="table-action-delete">
                            <i class="ri-delete-bin-6-fill"></i>
                        </button>
                        <!-- Backdrop -->
                        <div x-show="open" x-cloak
                            @include('components.modal.model-transition')>

                            <div x-show="open" @include('components.modal.model-fade')
                                class="modal-box-md"
                                @click.outside="open = false">

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
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanilla-datatables@latest/dist/vanilla-dataTables.min.css">
<script src="https://cdn.jsdelivr.net/npm/vanilla-datatables@latest/dist/vanilla-dataTables.min.js"></script>

@endsection