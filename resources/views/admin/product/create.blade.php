@extends ('layout.backed')
@section('content')

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

    <div class="mt-3 flow-root pb-1 px-3">
        <form id="#" name="#" calss="max-w-md mx-auto" action="#" method="post" enctype="multipart/form-data">
            <div class="grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 sm:gap-2 md:gap-x-4">
                <div class="box-form">
                    <label for="product-en" class="title-form">Product Name (English)</label>
                    <div class="form-outline">
                        <input type="text" name="Name_EN" id="Name_EN" class="form-input" placeholder="Enter your product name en" required>
                    </div>
                </div>

                <div class="box-form">
                    <label for="product-en" class="title-form">Product Name (Khmer)</label>
                    <div class="form-outline">
                        <input type="text" name="Name_KH" id="Name_KH" class="form-input" placeholder="Enter your product name kh" required>
                    </div>
                </div>

                <div class="box-form">
                    <label for="brand" class="title-form">Brand</label>
                    <div class="form-outline">
                        <input type="text" name="brand" id="brand" class="form-input" placeholder="Enter your brand name" required>
                    </div>
                </div>

                <div class="box-form">
                    <label for="original-price" class="title-form">Original Price</label>
                    <div class="form-outline">
                        <input type="number" step="0.01" name="original_price" id="original_price" class="form-input" placeholder="Enter your price" value required>
                    </div>
                </div>

                <div class="box-form">
                    <label for="discount_percent" class="title-form">Discount (%)</label>
                    <div class="form-outline">
                        <input type="number" name="discount_percent" id="discount_percent" class="form-input" placeholder="Price after discount" value min="0" max="100">
                    </div>
                </div>

                <div class="box-form">
                    <label for="price-after-discount" class="title-form">Price After Discount</label>
                    <div class="form-outline read-only:bg-gray-200">
                        <input type="number" step="0.01" name="price_after_discount" id="price_after_discount" class="form-input" placeholder="Price after discount" readonly>
                    </div>
                </div>

                <div class="box-form">
                    <label for="stock-quantity" class="title-form">Stock Quantity</label>
                    <div class="form-outline">
                        <input type="number" name="stock_quantity" id="stock_quantity" class="form-input" placeholder="Enter your quantity" value required>
                    </div>
                </div>

                <div class="box-form">
                    <label for="color" class="title-form">Color</label>
                    <div class="form-outline">
                        <input type="text" name="color" id="color" class="form-input" placeholder="Enter your color" value required>
                    </div>
                </div>

                <div class="box-form">
                    <label for="size" class="title-form">Size</label>
                    <div class="form-outline">
                        <input type="text" name="size" id="size" class="form-input" placeholder="Enter your size" value required>
                    </div>
                </div>

                <div class="box-form">
                    <label for="category" class="title-form">Category</label>
                    <div class="grid grid-cols-1 focus-within:relative pt-2">
                        <select id="category" name="category" autocomplete="category-name" aria-label="category" class="form-select" required>
                            <option value="" hidden selected>Select category</option>
                            <option value="0">Cateogry one</option>
                            <option value="1">Cateogry two</option>
                        </select>

                        <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>

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
                    <textarea id="message" rows="6" class="description-write sr-only" placeholder="Write your description here..."></textarea>
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
                        <div class="box-form-img">
                            <label for="img_url_main" class="main-image-title text-sm/6 font-medium">Main Image</label>
                            <div class="box-upload-image">
                                <div class="text-center">
                                    <div class="min-h-48 flex justify-center items-center">
                                        <i class="ri-image-add-line mx-auto text-9xl text-black/25" id="upload-icon-main"></i>
                                        <img id="preview-image-main" src="#" alt="Image Preview" class="preview-image-product hidden max-w-full mx-auto rounded-sm"/> 
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

                        {{-- Section additional one --}}
                        <div class="box-form-img">
                            <label for="img_url_1" class="text-sm/6 font-medium">Additional Image 1</label>
                            <div class="box-upload-image">
                                <div class="text-center">
                                    <div class="min-h-48 flex justify-center items-center">
                                        <i class="ri-image-add-line mx-auto text-9xl text-black/25" id="upload-icon-1"></i>
                                        <img id="preview-image-1" src="#" alt="Image Preview" class="preview-image-product hidden max-w-full mx-auto rounded-sm"/> 
                                    </div>
                                    <div class="flex justify-center text-sm/6 text-gray-400 mt-2">
                                        <label for="img_url_1" class="text-upload-img">
                                            <span>Upload a file</span>
                                            <input id="img_url_1" name="image_url1" type="file" class="sr-only" accept="image/*">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs/5 text-gray-400">PNG, JPG, GIF up to 10MB</p>
                                    <p id="file-size-error-1" class="text-red-500 text-sm mt-1 hidden"></p>
                                </div>
                            </div>
                        </div>

                        {{-- Section additional two --}}
                        <div class="box-form-img">
                            <label for="img_url_2" class="text-sm/6 font-medium">Additional Image 2</label>
                            <div class="box-upload-image">
                                <div class="text-center">
                                    <div class="min-h-48 flex justify-center items-center">
                                        <i class="ri-image-add-line mx-auto text-9xl text-black/25" id="upload-icon-2"></i>
                                        <img id="preview-image-2" src="#" alt="Image Preview" class="preview-image-product hidden max-w-full mx-auto rounded-sm"/> 
                                    </div>
                                    <div class="flex justify-center text-sm/6 text-gray-400 mt-2">
                                        <label for="img_url_2" class="text-upload-img">
                                            <span>Upload a file</span>
                                            <input id="img_url_2" name="image_url2" type="file" class="sr-only" accept="image/*">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs/5 text-gray-400">PNG, JPG, GIF up to 10MB</p>
                                    <p id="file-size-error-2" class="text-red-500 text-sm mt-1 hidden"></p>
                                </div>
                            </div>
                        </div>

                        {{-- Section additional three --}}
                        <div class="box-form-img">
                            <label for="img_url_3" class="text-sm/6 font-medium">Additional Image 3</label>
                            <div class="box-upload-image">
                                <div class="text-center">
                                    <div class="min-h-48 flex justify-center items-center">
                                        <i class="ri-image-add-line mx-auto text-9xl text-black/25" id="upload-icon-3"></i>
                                        <img id="preview-image-3" src="#" alt="Image Preview" class="preview-image-product hidden max-w-full mx-auto rounded-sm"/> 
                                    </div>
                                    <div class="flex justify-center text-sm/6 text-gray-400 mt-2">
                                        <label for="img_url_3" class="text-upload-img">
                                            <span>Upload a file</span>
                                            <input id="img_url_3" name="image_url3" type="file" class="sr-only" accept="image/*">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs/5 text-gray-400">PNG, JPG, GIF up to 10MB</p>
                                    <p id="file-size-error-3" class="text-red-500 text-sm mt-1 hidden"></p>
                                </div>
                            </div>
                        </div>

                        {{-- Section additional three --}}
                        <div class="box-form-img">
                            <label for="img_url_4" class="text-sm/6 font-medium">Additional Image 4</label>
                            <div class="box-upload-image">
                                <div class="text-center">
                                    <div class="min-h-48 flex justify-center items-center">
                                        <i class="ri-image-add-line mx-auto text-9xl text-black/25" id="upload-icon-4"></i>
                                        <img id="preview-image-4" src="#" alt="Image Preview" class="preview-image-product hidden max-w-full mx-auto rounded-sm"/> 
                                    </div>
                                    <div class="flex justify-center text-sm/6 text-gray-400 mt-2">
                                        <label for="img_url_4" class="text-upload-img">
                                            <span>Upload a file</span>
                                            <input id="img_url_4" name="image_url4" type="file" class="sr-only" accept="image/*">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs/5 text-gray-400">PNG, JPG, GIF up to 10MB</p>
                                    <p id="file-size-error-4" class="text-red-500 text-sm mt-1 hidden"></p>
                                </div>
                            </div>
                        </div>
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
@endsection