@extends ('layout.backed')
@section('content')

{{-- content for display calculate product --}}
<div class="m-3 mb-6 shadow-lg rounded-md bg-white">
    <div class="header-main-tb">
        <div class="">
            <h1 class="text-xl font-semibold text-gray-900">Calculate product</h1>
        </div>
        <div x-data="{ open: false }" class="sm:mt-0 sm:flex-none bg">
            <button @click="open = true" type="button" class="cursor-pointer block rounded-sm bg-blue-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-xs hover:bg-blue-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                <i class='ri-add-line text-md'></i>
                cal-product
            </button>

            <!-- Backdrop -->
                <div x-show="open" x-cloak
                    @include('components.modal.model-transition')>

                    <div x-show="open" @include('components.modal.model-fade')
                        class="modal-box-md"
                        {{-- For set mourseout --}}
                        @click.outside="open = true">

                    <div class="modal-header-add">
                        Add Calculate product
                    </div>
                    <hr class="border-1 border-gray-400">
                    <div class="modal-body p-4">
                        <form id="" name="" action="#" method="POST">
                            <div class="grid grid-cols-1 text-left">
                                <div class="box-form">
                                    <label for="brand" class="title-form">Brand Name:</label>
                                    <div class="form-outline">
                                        <input type="text" name="brand" id="brand" class="form-input" placeholder="Enter your brand">
                                    </div>
                                </div>
                                <div class="box-form">
                                    <label for="net_weight" class="title-form">Net/Weight</label>
                                    <div class="form-outline">
                                        <input type="text" name="net_weight" id="net_weight" class="form-input" placeholder="Enter your net/weight">
                                    </div>
                                </div>

                                <div class="box-form">
                                    <label for="coverage_area" class="title-form">Coverage Area:</label>
                                    <div class="form-outline">
                                        <input type="text" name="coverage_area" id="coverage_area" class="form-input" placeholder="Enter your coverage area">
                                    </div>
                                </div>

                                <div class="box-form">
                                    <label for="coverage_area" class="title-form">Result:</label>
                                    <span class="">111</span>
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
                    <th scope="col" class="table-header">Brand name</th>
                    <th scope="col" class="table-header">Net / weight</th>
                    <th scope="col" class="table-header">Coverage area</th>
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
                                        class="modal-box-md"
                                        {{-- For set mourseout --}}
                                        @click.outside="open = true">

                                    <div class="modal-header-add">
                                        Edit Calculate product
                                    </div>
                                    <hr class="border-1 border-gray-400">
                                    <div class="modal-body p-4">
                                        <form id="" name="" action="#" method="POST">
                                            <div class="grid grid-cols-1 text-left">
                                                <div class="box-form">
                                                    <label for="brand" class="title-form">Brand Name:</label>
                                                    <div class="form-outline">
                                                        <input type="text" name="brand" id="brand" class="form-input" placeholder="Enter your brand">
                                                    </div>
                                                </div>
                                                <div class="box-form">
                                                    <label for="net_weight" class="title-form">Net/Weight</label>
                                                    <div class="form-outline">
                                                        <input type="text" name="net_weight" id="net_weight" class="form-input" placeholder="Enter your net/weight">
                                                    </div>
                                                </div>

                                                <div class="box-form">
                                                    <label for="coverage_area" class="title-form">Coverage Area:</label>
                                                    <div class="form-outline">
                                                        <input type="text" name="coverage_area" id="coverage_area" class="form-input" placeholder="Enter your coverage area">
                                                    </div>
                                                </div>

                                                <div class="box-form">
                                                    <label for="coverage_area" class="title-form">Result:</label>
                                                    <span class="">111</span>
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