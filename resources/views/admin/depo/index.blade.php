@extends ('layout.backed')
@section('content')

{{-- Content for display depo --}}
<div class="m-3 mb-6 shadow-lg rounded-md bg-white">
    <div class="header-main-tb">
        <div class="">
            <h1 class="text-xl font-semibold text-gray-900">Depo</h1>
        </div>
        <div class="sm:mt-0 sm:flex-none bg">
            <a href="{{route('admin.depo.create')}}">
                <button type="button" class="cursor-pointer block rounded-sm bg-blue-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-xs hover:bg-blue-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    <i class='ri-add-line text-md'></i>
                Depo</button>
            </a>
        </div>
    </div>

    <hr class="text-gray-200">

    <div class="mt-3 flow-root pb-2 px-3">
        <div class="tb-overflow">
            <div class="max-w-xs">
                <label for="provinceFilter" class="block text-md font-bold leading-6 text-blue-900">Filter by Province (EN)</label>
                <div class="relative mt-1">
                    <!-- The select input with an underline style -->
                    <select id="provinceFilter" name="provinceFilter" 
                            class="w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent py-1 pl-2 pr-10 text-gray-900 focus:border-indigo-600 focus:outline-none focus:ring-0 sm:text-sm sm:leading-6 transition-colors duration-200 ease-in-out">
                        <option selected value="">Show All Province</option>
                        <option value="">Battanbang</option>
                        <option value="">Banteay Meanchey</option>
                        <option value="">Battambang</option>
                        <option value="">Kampong</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                        <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 3a.75.75 0 01.53.22l3.5 3.5a.75.75 0 01-1.06 1.06L10 4.81 6.53 8.28a.75.75 0 01-1.06-1.06l3.5-3.5A.75.75 0 0110 3zm-3.72 9.28a.75.75 0 011.06 0L10 15.19l3.47-3.47a.75.75 0 111.06 1.06l-4 4a.75.75 0 01-1.06 0l-4-4a.75.75 0 010-1.06z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>
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
                                        @click.outside="open = true">

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

@endsection