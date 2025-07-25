@extends ('layout.backed')
@section('content')

@if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // SweetAlert notification for success message
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "success",
            title: "{{ session('success') }}"
        });
    });
</script>

@endif
{{-- content for display dashboard --}}
<div class="w-full">
    <div class="main-grid-carts">
        <div class="box-items">
            <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 bg-red-100">
                <i class='ri-store-fill text-3xl w-8 h-8 text-red-500'></i>
            </div>
                <p class="text-2xl font-extrabold text-red-500">{{ $depocount }}</p>
                <p class="text-sm text-slate-500 mt-1">Depo</p>
        </div>

        <div class="box-items">
            <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 bg-sky-100">
            <i class='ri-archive-fill w-8 h-8 text-sky-500 text-3xl'></i>
            </div>
            <p class="text-2xl font-extrabold text-sky-500">{{ $product_typecount }}</p>
            <p class="text-sm text-slate-500 mt-1">Total Product Type</p>
        </div>

        <div class="box-items">
            <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 bg-purple-100">
            <i class='ri-palette-fill text-3xl w-8 h-8 text-purple-500'></i>
            </div>
            <p class="text-2xl font-extrabold text-purple-500">{{ $colorcount }}</p>
            <p class="text-sm text-slate-500 mt-1">Total Colors</p>
        </div>

        <div class="box-items">
            <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 bg-green-100">
            <i class='ri-color-filter-fill text-3xl w-8 h-8 text-green-500'></i>
            </div>
            <p class="text-2xl font-extrabold text-green-500">{{ $color_familycount }}</p>
            <p class="text-sm text-slate-500 mt-1">Total Color family</p>
        </div>
    </div>
</div>

<div class="mt-5 shadow-lg rounded-md bg-white">
    <div class="header-main-tb">
        <div class="">
            <h1 class="text-xl font-semibold text-green-800">Color Family</h1>
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
                <thead class="bg-[#008442]">
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
                    @foreach ($colorfamilys as $colorfamily)
                        <tr class="td-bg-dash">
                            <td class="table-cell-primary">{{ $loop->iteration}}</td>
                            <td class="table-cell">{{ $colorfamily->name }}</td>
                            <td class="table-cell">{{ $colorfamily->name_kh }}</td>
                            <td class="table-cell">
                                <div class="h-7 w-7 rounded border-1 border-gray-400" style="background-color: {{ $colorfamily->color_code }}"></div>
                            </td>
                            <td class="table-cell">{{ $colorfamily->parent }}</td>
                            <td class="table-cell-actions">
                            {{-- For model edit --}}
                            <div x-data="{ open: false }">
                                <button @click="open = true" class="table-action-edit">
                                    <i class="ri-pencil-line"></i>
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
                                            <div class="grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 sm:gap-2 md:gap-x-4 text-left">
                                                <div class="box-form">
                                                    <label for="product-en" class="title-form">Name (English)</label>
                                                    <div class="form-outline">
                                                        <input type="text" name="Name_EN" id="Name_EN" class="form-input" placeholder="Enter your color name en" required>
                                                    </div>
                                                </div>
                                                <div class="box-form">
                                                    <label for="product-en" class="title-form">Name (Khmer)</label>
                                                    <div class="form-outline">
                                                        <input type="text" name="Name_KH" id="Name_KH" class="form-input" placeholder="Enter your color name kh" required>
                                                    </div>
                                                </div>

                                                <div class="box-form">
                                                    <label for="product-en" class="title-form">Color</label>
                                                    <div class="flex items-center rounded-sm bg-white outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-green-600 mb-1 mt-1">
                                                        <input type="color" name="color" id="color" class="form-input" placeholder="Enter your color">
                                                    </div>
                                                </div>
                                                <div class="box-form">
                                                    <label for="parent" class="title-form">Parent Color</label>
                                                    <div class="grid grid-cols-1 focus-within:relative pt-2">
                                                        <select id="parent" name="parent" autocomplete="parent" aria-label="parent" class="form-select" required>
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
                                        </div>
                                            
                                            <div class="model-footer flex justify-end space-x-2 px-4 pt-4">
                                                <button  @click="open = false" class="btn-close-model">Close</button>
                                                <button type="submit" class="btn-save-model">update</button>
                                            </div>
                                        </form>
                                    
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

                                    <form id="" name="" action="" method="POST">
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
                    @endforeach

                    <!-- More people... -->
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection