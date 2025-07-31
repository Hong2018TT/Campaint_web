@extends ('layout.backed')
@section('content')
@include('components.sweetalerttwo.alerttwo')

{{-- Content for create product --}}
<div class="shadow-lg rounded-md bg-white">
    <div class="header-main-tb">
        <div class="">
            <h1 class="text-xl font-semibold text-green-800">Add Product</h1>
        </div>
        <div class="sm:mt-0 sm:flex-none bg">
            <a href="{{route('admin.product.index')}}">
                <button type="button" class="btn-add">
                    <i class="ri-arrow-left-line"></i>
                </button>
            </a>
        </div> 
    </div>

    <hr class="text-gray-200">
    @include('components.txt-error.txt-error')
    
    <div class="mt-3 flow-root pb-1 px-3">

        <form id="form-product" name="#" calss="max-w-md mx-auto" action="{{route('save_product')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 sm:gap-2 md:gap-x-4">
                <div class="box-form">
                    <label for="product-en" class="title-form">Product Name (English)</label>
                    <div class="form-outline">
                        <input type="text" name="Name_EN" id="Name_EN" value="{{ old('Name_EN') }}" class="form-input" placeholder="Enter your product name en" required>
                    </div>
                </div>

                <div class="box-form">
                    <label for="product-en" class="title-form">Product Name (Khmer)</label>
                    <div class="form-outline">
                        <input type="text" name="Name_KH" id="Name_KH" value="{{ old('Name_KH') }}" class="form-input" placeholder="Enter your product name kh" required>
                    </div>
                </div>

                <div class="box-form">
                    <label for="brand" class="title-form">Brand</label>
                    <div class="form-outline">
                        <input type="text" name="brand" id="brand" value='{{old('brand')}}' class="form-input" placeholder="Enter your brand name" required>
                    </div>
                </div>

                <div class="box-form">
                    <label for="original-price" class="title-form">Original Price</label>
                    <div class="form-outline">
                        <input type="number" step="0.01" name="original_price" id="original_price" value="{{ old('original_price')}}" class="form-input" placeholder="Enter your price" value>
                    </div>
                </div>

                <div class="box-form">
                    <label for="discount_percent" class="title-form">Discount (%)</label>
                    <div class="form-outline">
                        <input type="number" name="discount_percent" id="discount_percent" value="{{ old('discount_percent')}}" class="form-input" placeholder="Price after discount" value min="0" max="100">
                    </div>
                </div>

                <div class="box-form">
                    <label for="price-after-discount" class="title-form">Price After Discount</label>
                    <div class="form-outline read-only:bg-gray-200">
                        <input type="number" step="0.01" name="price_after_discount" id="price_after_discount" value="{{ old('price_after_discount') }}" class="form-input" placeholder="Price after discount" readonly>
                    </div>
                </div>

                <div class="box-form">
                    <label for="stock-quantity" class="title-form">Stock Quantity</label>
                    <div class="form-outline">
                        <input type="number" name="stock_quantity" id="stock_quantity" class="form-input" placeholder="Enter your quantity" value="{{ old('stock_quantity') }}">
                    </div>
                </div>

                <div class="box-form">
                    <label for="color_type" class="title-form">Color</label>
                    <div class="form-outline">
                        <input type="text" name="color_type" id="color_type" class="form-input" placeholder="Enter your color" value="{{ old('color_type') }}">
                    </div>
                </div>

                <div class="box-form">
                    <label for="size" class="title-form">Size</label>
                    <div class="form-outline">
                        <input type="text" name="size" id="size" class="form-input" placeholder="Enter your size" value="{{ old('size') }}">
                    </div>
                </div>

                <div class="box-form">
                    <label for="category_id" class="title-form">Category</label>
                    <div class="grid grid-cols-1 focus-within:relative">
                        <select id="category_id" name="category_id" autocomplete="category-name" value="{{ old('category_id') }}" aria-label="category" class="form-select">
                            <option value="" hidden selected>Select category</option>
                            <option value="1">Category One</option>
                            @foreach($categorys as $category)
                                <option value="{{ $category->id }}" value="{{ $category->id }}"
                                        {{ isset($product) && $product->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>

                        <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                        </svg>

                    </div>
                </div>

                <div class="box-form">
                    <label for="sub_category_id" class="title-form">Subcategory</label>
                    <div class="grid grid-cols-1 focus-within:relative">
                        <select id="sub_category_id" name="sub_category_id" autocomplete="subcategory-name" value="{{ old('sub_category_id') }}" aria-label="subcategory" class="form-select bg-gray-200" disabled>
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
                    <textarea id="description" name="description" rows="6" class="description sr-only" value="{{ old('description') }}" placeholder="Write your description here..."></textarea>
                    <!-- Create the editor container -->
                    <div class="editor-container mt-2">
                        <!-- Create the first editor container -->
                        <div id="editor" class="editor-wrapper" name="product-create"></div>
                    </div>
                </div>
            </div>

            <fieldset class="border border-gray-300 px-4 pb-2 rounded mt-3">
                <legend class="text-sm rounded-xs font-bold text-white px-2 bg-green-700 pb-0.5">Image:</legend>
                    <div class="grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 sm:gap-2 md:gap-4 mt-3">
                        {{-- Section main image product --}}
                        {{-- Section main image product (This remains separate as it has a unique name/label) --}}
                        <div class="box-form-img">
                            <label for="img_url_main" class="main-image-title text-sm/6 font-medium">Main Image</label>
                            <div class="box-upload-image">
                                <div class="text-center">
                                    <div class="min-h-48 flex justify-center items-center">
                                        <i class="ri-image-add-line mx-auto text-9xl text-black/25" id="upload-icon-main"></i>
                                        <img id="preview-image-main" src="{{ old('img_url') }}" alt="Image Preview" class="preview-image-product hidden max-w-full mx-auto rounded-sm"/>
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
                        {{-- Make sure your PHP backend expects names like 'img_url1', 'img_url2', etc. --}}
                        @for ($i = 1; $i <= 4; $i++)
                            <div class="box-form-img">
                                {{-- Label for the current additional image --}}
                                <label for="img_url_{{ $i }}" class="text-sm/6 font-medium">Additional Image {{ $i }}</label>
                                <div class="box-upload-image">
                                    <div class="text-center">
                                        <div class="min-h-48 flex justify-center items-center">
                                            {{-- Dynamic ID for the icon --}}
                                            <i class="ri-image-add-line mx-auto text-9xl text-black/25" id="upload-icon-{{ $i }}"></i>
                                            {{-- Dynamic ID for the image preview --}}
                                            <img id="preview-image-{{ $i }}" src="#" alt="Image Preview" class="preview-image-product hidden max-w-full mx-auto rounded-sm"/>
                                        </div>
                                        <div class="flex justify-center text-sm/6 text-gray-400 mt-2">
                                            {{-- Dynamic 'for' attribute for the label --}}
                                            <label for="img_url_{{ $i }}" class="text-upload-img">
                                                <span>Upload a file</span>
                                                {{-- Dynamic 'id' and 'name' attributes for the input field --}}
                                                <input id="img_url_{{ $i }}" name="img_url{{ $i }}" type="file" class="sr-only" accept="image/*">
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs/5 text-gray-400">PNG, JPG, GIF up to 10MB</p>
                                        {{-- Dynamic ID for file size error message --}}
                                        <p id="file-size-error-{{ $i }}" class="text-red-500 text-sm mt-1 hidden"></p>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
            </fieldset>
            
            <div class="mt-4 flex justify-end">
                <button type="submit" class="btn-form" name="save_product" id="save_product">Save</button>
                <button type="reset" class="btn-form-cancel">Cancel</button>
            </div>
        </form>
    </div>
</div>
<!-- Quill Editor Container -->
<script>
    // 2. Select the form and the hidden textarea for the description
    const form = document.querySelector('#form-product'); // Use your form's ID
    const descriptionInput = document.querySelector('#description');

    // 3. Add an event listener to the form for the 'submit' event
    form.addEventListener('submit', function(e) {
        // Before the form submits, update the hidden textarea's value
        // with the HTML content from the Quill editor.
        descriptionInput.value = quill.root.innerHTML;
    });
</script>
@endsection