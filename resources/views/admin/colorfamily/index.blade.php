@extends ('layout.backed')
@section('content')

{{-- content for display colorfamily --}}
<div class="shadow-lg rounded-md bg-white">
    <div class="header-main-tb">
        <div class="">
        <h1 class="text-xl font-semibold text-gray-900">Color Family</h1>
        </div>
        <div x-data="{ open: false }" class="sm:mt-0 sm:flex-none bg">
            <button @click="open = true" type="button" class="cursor-pointer block rounded-sm bg-blue-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-xs hover:bg-blue-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                <i class='ri-add-line text-md'></i>
                Color Family
            </button>

            <!-- Backdrop -->
            <div x-show="open" x-cloak
                @include('components.modal.model-transition')>

                <div x-show="open" @include('components.modal.model-fade')
                    class="modal-box-lg"
                    {{-- For set mourseout --}}
                    @click.outside="open = true">

                <div class="modal-header-add">
                    Add Color Family
                </div>
                <hr class="border-1 border-gray-400">
                <div class="modal-body p-4">
                    <form id="" name="" action="#" method="POST">
                        <div class="grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 sm:gap-2 md:gap-4 text-left">
                            <div class="box-form">
                                <label for="product-en" class="title-form">Name (English)</label>
                                <div class="form-outline">
                                    <input type="text" name="Name_EN" id="Name_EN" class="form-input" placeholder="Enter your color name en">
                                </div>
                            </div>
                            <div class="box-form">
                                <label for="product-en" class="title-form">Name (Khmer)</label>
                                <div class="form-outline">
                                    <input type="text" name="Name_KH" id="Name_KH" class="form-input" placeholder="Enter your color name kh">
                                </div>
                            </div>

                            <div class="box-form">
                                <label for="product-en" class="title-form">Color</label>
                                <div class="form-outline">
                                    <input type="color" name="color" id="color" class="form-input" placeholder="Enter your color">
                                </div>
                            </div>
                            <div class="box-form">
                                <label for="parent_color" class="title-form">Parent Color</label>
                                <div class="grid grid-cols-1 focus-within:relative pt-2">
                                    <select id="parent_color" name="parent_color" autocomplete="parent_color" aria-label="parent_color" class="form-select">
                                        <option value="" hidden selected>Select color families</option>
                                        <option value="0">Cateogry one</option>
                                        <option value="1">Cateogry two</option>
                                    </select>

                                    <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                        <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="model-footer flex justify-end space-x-2 px-4 pt-4">
                    <button  @click="open = false" class="btn-close-model">Close</button>
                    <button class="btn-save-model">Save</button>
                </div>
                </div>
            </div>
        </div>
    </div>

    <hr class="text-gray-200">
    
    <div class="mt-3 flow-root pb-2 px-3">
        <div class="tb-overflow">
            <div class="inline-block min-w-full pb-2 align-middle pt-2">
                <table id="#" class="table-filter min-w-full divide-y divide-blue-300">
                {{-- th table --}}
                <thead class="bg-[#002398]">
                    <tr>
                    <th scope="col" class="table-header rounded-tl-md">ID</th>
                    <th scope="col" class="table-header">Name (english)</th>
                    <th scope="col" class="table-header">Name (khmer)</th>
                    <th scope="col" class="table-header">Color</th>
                    <th scope="col" class="table-header">Paret</th>
                    <th scope="col" class="table-header-action rounded-tr-md">
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
                        <td class="table-cell">----</td>
                        <td class="table-cell-actions">
                        {{-- For model edit --}}
                        <div x-data="{ open: false }">
                            <button @click="open = true" class="table-action-edit">
                                <i class="ri-edit-circle-fill"></i>
                            </button>

                            <!-- Backdrop -->
                            <div x-show="open" x-cloak
                                @include('components.modal.model-transition')>

                                <div x-show="open" @include('components.modal.model-fade')
                                    class="modal-box-lg"
                                    {{-- For set mourseout --}}
                                    @click.outside="open = true">

                                <div class="modal-header-add">
                                    Edit Color Family
                                </div>
                                <hr class="border-1 border-gray-400">
                                <div class="modal-body p-4">
                                    <form id="" name="" action="#" method="POST">
                                        <div class="grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 sm:gap-2 md:gap-4 text-left">
                                            <div class="box-form">
                                                <label for="product-en" class="title-form">Name (English)</label>
                                                <div class="form-outline">
                                                    <input type="text" name="Name_EN" id="Name_EN" class="form-input" placeholder="Enter your color name en">
                                                </div>
                                            </div>
                                            <div class="box-form">
                                                <label for="product-en" class="title-form">Name (Khmer)</label>
                                                <div class="form-outline">
                                                    <input type="text" name="Name_KH" id="Name_KH" class="form-input" placeholder="Enter your color name kh">
                                                </div>
                                            </div>

                                            <div class="box-form">
                                                <label for="product-en" class="title-form">Color</label>
                                                <div class="form-outline">
                                                    <input type="color" name="color" id="color" class="form-input" placeholder="Enter your color">
                                                </div>
                                            </div>
                                            <div class="box-form">
                                                <label for="parent_color" class="title-form">Parent Color</label>
                                                <div class="grid grid-cols-1 focus-within:relative pt-2">
                                                    <select id="parent_color" name="parent_color" autocomplete="parent_color" aria-label="parent_color" class="form-select">
                                                        <option value="" hidden selected>Select color families</option>
                                                        <option value="0">Cateogry one</option>
                                                        <option value="1">Cateogry two</option>
                                                    </select>

                                                    <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                                        <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="model-footer flex justify-end space-x-2 px-4 pt-4">
                                    <button  @click="open = false" class="btn-close-model">Close</button>
                                    <button class="btn-save-model">Save</button>
                                </div>
                                </div>
                            </div>
                        </div>

                        {{-- For model delete --}}
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
                                    {{-- For set mourseout --}}
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