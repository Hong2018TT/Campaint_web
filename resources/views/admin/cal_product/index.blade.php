@extends ('layout.backed')
@section('content')
@include('components.sweetalerttwo.alerttwo')

{{-- content for display calculate product --}}
<div class="shadow-lg rounded-md bg-white">
    <div class="header-main-tb">
        <div class="">
            <h1 class="text-xl font-semibold text-green-800">Calculate product</h1>
        </div>
        <div x-data="{ open: false }" class="sm:mt-0 sm:flex-none bg">
            <button @click="open = true" type="button" class="btn-add">
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

                <div class="modal-body">
                    <form id="form_calculate_product" name="form_calculate_product"action="{{ route('save_calculateproduct') }}" method="POST">
                        @csrf

                        <div class="grid grid-cols-1 text-left">
                            <div class="box-form">
                                <label for="product_id" class="title-form">Product Name:</label>
                                <div class="grid grid-cols-1 focus-within:relative pt-1">
                                    <select name="product_id" id="product_id" autocomplete="product_id" aria-label="product_id" class="form-select" required>
                                        <option value="0" hidden selected>Select product</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->Name_EN }}</option>
                                        @endforeach
                                    </select>

                                    <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                        <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                @error('product_id')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="box-form mt-1">
                                <label for="net_weight" class="title-form">Net/Weight</label>
                                <div class="form-outline">
                                    <input type="text" name="net_weight" id="net_weight" value="{{ old('net_weight') }}" class="form-input" placeholder="Enter your net/weight" required>
                                </div>
                                @error('net_weight')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="box-form">
                                <label for="coverage_area" class="title-form">Coverage Area:</label>
                                <div class="form-outline">
                                    <input type="text" name="coverage_area" id="coverage_area" value="{{ old('coverage_area') }}" class="form-input" placeholder="Enter your coverage area">
                                </div>
                                @error('coverage_area')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        </div>

                        <div class="model-footer">
                            <a @click="open = false" class="btn-close-model">Close</a>
                            <button type="submit" id="save_calculateproduct" name="save_calculateproduct" class="btn-save-model">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <hr class="text-gray-200">

    <div class="mt-3 flow-root pb-2 px-3">
        @include('components.txt-error.txt-error')
        
        <div class="tb-overflow">
            <div class="inline-block min-w-full pb-2 align-middle pt-2">
                <table id="#" class="table-filter min-w-full divide-y divide-blue-300">
                {{-- th table --}}
                <thead class="bg-[#008442]">
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
                    @foreach ($calculate_products as $calculate_product)
                        <tr class="td-bg-dash">
                            <td class="table-cell-primary">{{ $loop->iteration }}</td>
                            <td class="table-cell">{{ $calculate_product->product_name }}</td>
                            <td class="table-cell">{{ $calculate_product->net_weight }}</td>
                            <td class="table-cell">{{ $calculate_product->coverage_area	 }}</td>
                            <td>
                                <div class="table-cell-actions">
                                    {{-- For model edit --}}
                                    <div x-data="{ open: false, calculate_product: {{ json_encode($calculate_product) }} }">
                                        <button @click="open = true" class="table-action-edit">
                                            <i class="ri-pencil-line"></i>
                                        </button>
        
                                        <!-- Modal Edit -->
                                        <div x-show="open" x-cloak
                                            @include('components.modal.model-transition')>
        
                                            <div x-show="open" @include('components.modal.model-fade')
                                                class="modal-box-md"
                                                {{-- For set mourseout --}}
                                                @click.outside="open = true">
        
                                            <div class="modal-header-add">
                                                Edit Calculate product
                                            </div>
                                            
                                            <div class="modal-body p-4">
                                                <form id="" name="" :action="'{{ route('update_calculateproduct', ['id' => '__ID__']) }}'.replace('__ID__', calculate_product.id)" method="POST">

                                                        @csrf
                                                        @method('PUT') {{-- Or PUT depending on your route --}}

                                                    <div class="grid grid-cols-1 text-left">
                                                        <div class="box-form">
                                                            <label for="edit_product_id" class="title-form">Product Name:</label>
                                                            <div class="grid grid-cols-1 focus-within:relative pt-1">
                                                                <select name="edit_product_id" id="edit_product_id" 
                                                                        autocomplete="edit_product_id" aria-label="edit_product_id" 
                                                                        class="form-select" x-model="calculate_product.product_id"
                                                                        required>
                                                                        
                                                                    <option value="0" hidden selected>Select product</option>
                                                                    
                                                                    @foreach ($products as $producte)
                                                                        <option value="{{ $producte->id }}">{{ $producte->Name_EN }}</option>  // <-- Corrected here
                                                                    @endforeach

                                                                </select>
        
                                                                <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                                                    <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                                                </svg>
                                                            </div>
                                                        </div>
        
                                                        <div class="box-form mt-1">
                                                            <label for="edit_net_weight" class="title-form">Net/Weight</label>
                                                            <div class="form-outline">
                                                                <input type="text" name="edit_net_weight" id="edit_net_weight" value="{{ old('net_weight') }}" x-model="calculate_product.net_weight" class="form-input" placeholder="Enter your net/weight" required>
                                                            </div>
                                                        </div>
        
                                                        <div class="box-form">
                                                            <label for="edit_coverage_area" class="title-form">Coverage Area:</label>
                                                            <div class="form-outline">
                                                                <input type="text" name="edit_coverage_area" id="edit_coverage_area" value="{{ old('coverage_area') }}" x-model="calculate_product.coverage_area" class="form-input" placeholder="Enter your coverage area" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
        
                                                <div class="model-footer">
                                                    <a @click="open = false" class="btn-close-model">Close</a>
                                                    <button type='submit' class="btn-save-model">Save</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Modal Delete --}}
                                    <div x-data="{ open: false, dashcolorIdToDelete: null }">
                                        <a @click="open = true; dashcolorIdToDelete = {{ $calculate_product->id }}" class="table-action-delete">
                                            <i class="ri-delete-bin-6-fill"></i>
                                        </a>
                                        <!-- Backdrop -->
                                        <div x-show="open" x-cloak
                                            @include('components.modal.model-transition')>
        
                                            <div x-show="open" @include('components.modal.model-fade')
                                                class="modal-box-md"
                                                {{-- For set mourseout --}}
                                                @click.outside="open = true">
        
                                            <div class="modal-header-del">Delete</div>
        
                                            <div class="modal-body">
                                                <p class="text-lg text-red-500">Are you sure you want to delete this item?</p>
                                            </div>
        
                                                <form :action="`/calculates-product-delete/${dashcolorIdToDelete}`" method="POST">

                                                    @csrf
                                                    @method('DELETE') {{-- Important for Laravel DELETE routes --}}

                                                    <div class="model-footer">
                                                        <a @click="open = false" class="btn-close-model">Close</a>
                                                        <button type="submit" class="btn-del-model">Delete</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div></div>

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