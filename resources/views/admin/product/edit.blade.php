@extends ('layout.backed')
@section('content')
@include('components.sweetalerttwo.alerttwo')

{{-- Content for create product --}}
<div class="hadow-lg rounded-md bg-white">
    <div class="header-main-tb">
        <div class="">
            <h1 class="text-xl font-semibold text-green-800">Edit Product</h1>
        </div>
        <div class="sm:mt-0 sm:flex-none bg">
            <a href="{{route('admin.product.index')}}">
                <button type="button" class="btn-add">
                <i class="ri-arrow-left-line"></i>
            </a>
        </div> 
    </div>

    <hr class="text-gray-200">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="flow-root pb-1 mx-3 pt-3">
        <form id="form-product" name="#" calss="max-w-md mx-auto" action="{{route('update_product', $product->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 sm:gap-2 md:gap-x-4">
                <div class="box-form">
                    <label for="product-en" class="title-form">Product Name (English)</label>
                    <div class="form-outline">
                        <input type="text" name="Name_EN" id="Name_EN" class="form-input" value="{{ $product->Name_EN }}" placeholder="Enter your product name en">
                    </div>
                </div>

                <div class="box-form">
                    <label for="product-en" class="title-form">Product Name (Khmer)</label>
                    <div class="form-outline">
                        <input type="text" name="Name_KH" id="Name_KH" class="form-input" value="{{ $product->Name_KH }}" placeholder="Enter your product name kh">
                    </div>
                </div>

                <div class="box-form">
                    <label for="brand" class="title-form">Brand</label>
                    <div class="form-outline">
                        <input type="text" name="brand" id="brand" class="form-input" value="{{ $product->brand }}" placeholder="Enter your brand name">
                    </div>
                </div>

                <div class="box-form">
                    <label for="original-price" class="title-form">Original Price</label>
                    <div class="form-outline">
                        <input type="number" step="0.01" name="original_price" id="original_price" class="form-input" value="{{ $product->original_price }}" placeholder="Enter your price">
                    </div>
                </div>

                <div class="box-form">
                    <label for="discount_percent" class="title-form">Discount (%)</label>
                    <div class="form-outline">
                        <input type="number" name="discount_percent" id="discount_percent" value="{{ $product->discount_percent }}" class="form-input" placeholder="Price after discount" min="0" max="100">
                    </div>
                </div>

                <div class="box-form">
                    <label for="price-after-discount" class="title-form">Price After Discount</label>
                    <div class="form-outline read-only:bg-gray-200">
                        <input type="number" step="0.01" name="price_after_discount" id="price_after_discount" class="form-input" value="{{ $product->price_after_discount }}" placeholder="Price after discount" readonly>
                    </div>
                </div>

                <div class="box-form">
                    <label for="stock-quantity" class="title-form">Stock Quantity</label>
                    <div class="form-outline">
                        <input type="number" name="stock_quantity" id="stock_quantity" class="form-input" value="{{ $product->stock_quantity }}" placeholder="Enter your quantity">
                    </div>
                </div>

                <div class="box-form">
                    <label for="color" class="title-form">Color</label>
                    <div class="form-outline">
                        <input type="text" name="color_type" id="color_type" class="form-input" value="{{ $product->color_type }}" placeholder="Enter your color">
                    </div>
                </div>

                <div class="box-form">
                    <label for="size" class="title-form">Size</label>
                    <div class="form-outline">
                        <input type="text" name="size" id="size" class="form-input" value="{{ $product->size }}" placeholder="Enter your size">
                    </div>
                </div>

                {{-- This place for unknown category id--}}
                <div class="box-form">
                    <label for="category" class="title-form">Category</label>
                    <div class="grid grid-cols-1 focus-within:relative pt-2">
                        <select id="category" name="category" autocomplete="category-name" aria-label="category" class="form-select">
                            <option value="" hidden selected>Select category</option>
                            <option value="0">Cateogry one</option>
                            <option value="1">Cateogry two</option>
                        </select>

                        <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>

                {{-- This place for unknown subcategory id--}}
                <div class="box-form">
                    <label for="sub-category" class="title-form">Subcategory</label>
                    <div class="grid grid-cols-1 focus-within:relative pt-2">
                        <select id="subcategory" name="subcategory" autocomplete="category-name" aria-label="category" class="form-select bg-gray-200" disabled>
                            <option value="" hidden selected>Select Subcategory</option>
                            <option value="0">Cateogry one</option>
                            <option value="1">Cateogry two</option>
                        </select>

                        <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Section for grid description form product --}}
            <div class="grid grid-cols-1 mt-5">
                <div class="box-form">
                    <label for="description" class="title-form">Description</label>
                    <textarea id="description" name="description" rows="6" class="description sr-only" placeholder="Write your description here..."></textarea>
                    <!-- Create the editor container -->
                    <div class="editor-container">
                        <!-- Create the first editor container -->
                        <div id="editor" class="editor-wrapper" name="product-edit">
                            {!! $product->description ?? '' !!}
                        </div>
                    </div>
                </div>
            </div>

            <fieldset class="border border-gray-300 px-4 pb-2 rounded mt-3">
                <legend class="text-sm rounded-xs font-bold text-white px-2 bg-green-700 pb-0.5">Image:</legend>
                    <div class="grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 sm:gap-2 md:gap-4 mt-3">
                        {{-- Section main image product --}}
                        <div class="box-form-img">
                            <label for="img_url_main" class="main-image-title text-sm/6 font-medium">Main Image</label>
                            <div class="box-upload-image">
                                <div class="text-center">
                                    <div class="min-h-48 flex justify-center items-center">
                                        {{-- Display existing image or upload icon --}}
                                        <i class="ri-image-add-line mx-auto text-9xl text-black/25 {{ $product->image_url ? 'hidden' : '' }}" id="upload-icon-main"></i>
                                        <img id="preview-image-main"
                                            src="{{ $product->image_url ? asset('assets/img/products/' . $product->image_url) : '#' }}"
                                            alt="Image Preview"
                                            class="preview-image-product {{ $product->image_url ? '' : 'hidden' }} max-w-full mx-auto rounded-sm"/>
                                    </div>
                                    <div class="flex justify-center text-sm/6 text-gray-400 mt-2">
                                        <label for="img_url_main" class="text-upload-img">
                                            <span>Upload a file</span>
                                            <input id="img_url_main" name="img_url" type="file" class="sr-only" accept="image/*">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs/5 text-gray-400">PNG, JPG, GIF up to 10MB</p>
                                    <p id="file-size-error-main" class="text-red-500 text-sm mt-1 hidden"></p>
                                </div>
                            </div>
                        </div>

                        {{-- Section for Additional Images (Generated with a loop) --}}
                        @for ($i = 1; $i <= 4; $i++)
                            @php
                                $dbColumnName = 'img_url' . $i; // Matches actual DB column img_url1, img_url2, etc.
                                $currentImageUrl = $product->$dbColumnName; // Get the image filename from the product object
                            @endphp
                            <div class="box-form-img">
                                <label for="img_url_{{ $i }}" class="text-sm/6 font-medium">Additional Image {{ $i }}</label>
                                <div class="box-upload-image">
                                    <div class="text-center">
                                        <div class="min-h-48 flex justify-center items-center">
                                            <i class="ri-image-add-line mx-auto text-9xl text-black/25 {{ $currentImageUrl ? 'hidden' : '' }}" id="upload-icon-{{ $i }}"></i>
                                            <img id="preview-image-{{ $i }}"
                                                src="{{ $currentImageUrl ? asset('assets/img/products/' . $currentImageUrl) : '#' }}"
                                                alt="Image Preview"
                                                class="preview-image-product {{ $currentImageUrl ? '' : 'hidden' }} max-w-full mx-auto rounded-sm"/>
                                        </div>
                                        <div class="flex justify-center text-sm/6 text-gray-400 mt-2">
                                            <label for="img_url_{{ $i }}" class="text-upload-img">
                                                <span>Upload a file</span>
                                                <input id="img_url_{{ $i }}" name="img_url{{ $i }}" type="file" class="sr-only" accept="image/*">
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs/5 text-gray-400">PNG, JPG, GIF up to 10MB</p>
                                        <p id="file-size-error-{{ $i }}" class="text-red-500 text-sm mt-1 hidden"></p>
                                    </div>
                                </div>
                            </div>
                        @endfor

                    </div>
            </fieldset>

            <div class="mt-4 flex justify-end">
                <button type="submit" class="btn-form" name="save_product" id="save_product">Update</button>
                <button type="reset" class="btn-form-cancel">Cancel</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Example for handling the editor content
    document.addEventListener('DOMContentLoaded', function() {
        var editorElement = document.getElementById('editor');
        var hiddenTextarea = document.getElementById('description');
        // 3. Before form submission, update the hidden textarea with the editor's content
        var form = editorElement.closest('form');
        if (form) {
            form.addEventListener('submit', function() {
                hiddenTextarea.value = editorElement.innerHTML; // Assuming you use innerHTML to get the content
            });
        }
    });
</script>
@endsection