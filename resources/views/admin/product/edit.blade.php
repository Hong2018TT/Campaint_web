@extends ('layout.backed')
@section('content')

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

    <div class="flow-root pb-1 mx-3 pt-3">
        <form id="#" name="#" calss="max-w-md mx-auto" action="#" method="post" enctype="multipart/form-data">
            <div class="grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 sm:gap-2 md:gap-x-4">
                <div class="box-form">
                    <label for="product-en" class="title-form">Product Name (English)</label>
                    <div class="form-outline">
                        <input type="text" name="Name_EN" id="Name_EN" class="form-input" placeholder="Enter your product name en">
                    </div>
                </div>

                <div class="box-form">
                    <label for="product-en" class="title-form">Product Name (Khmer)</label>
                    <div class="form-outline">
                        <input type="text" name="Name_KH" id="Name_KH" class="form-input" placeholder="Enter your product name kh">
                    </div>
                </div>

                <div class="box-form">
                    <label for="brand" class="title-form">Brand</label>
                    <div class="form-outline">
                        <input type="text" name="brand" id="brand" class="form-input" placeholder="Enter your brand name">
                    </div>
                </div>

                <div class="box-form">
                    <label for="original-price" class="title-form">Original Price</label>
                    <div class="form-outline">
                        <input type="number" step="0.01" name="original_price" id="original_price" class="form-input" placeholder="Enter your price" value>
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
                        <input type="number" name="stock_quantity" id="stock_quantity" class="form-input" placeholder="Enter your quantity" value>
                    </div>
                </div>

                <div class="box-form">
                    <label for="color" class="title-form">Color</label>
                    <div class="form-outline">
                        <input type="text" name="color" id="color" class="form-input" placeholder="Enter your color" value>
                    </div>
                </div>

                <div class="box-form">
                    <label for="size" class="title-form">Size</label>
                    <div class="form-outline">
                        <input type="text" name="size" id="size" class="form-input" placeholder="Enter your size" value>
                    </div>
                </div>

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
                    <div class="editor-container">
                        <!-- Create the first editor container -->
                        <div id="editor" class="editor-wrapper" name="product-edit">
                        </div>
                    </div>
                </div>
            </div>

            <fieldset class="border border-gray-300 px-4 pb-2 rounded mt-3">
                <legend class="text-sm rounded-xs font-bold text-white px-2 bg-green-700 pb-0.5">Image:</legend>
                    <div class="grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 sm:gap-2 md:gap-4 mt-3">

                        {{-- Section main image product --}}
                        <div class="box-form-img">
                            <label for="edit_img_url_main" class="main-image-title text-sm/6 font-medium">Main Image</label>
                            <div class="box-upload-image">
                                <div class="text-center">
                                    <div class="min-h-48 flex justify-center items-center">
                                        {{-- This icon can be hidden or replaced once an image is loaded --}}
                                        <i class="ri-image-add-line mx-auto text-9xl text-black/25" id="edit-upload-icon"></i>
                                        {{-- This for upload display image product --}}
                                        <img id="edit-preview-image-product" src="#" alt="Image Preview" class="edit-preview-image-product hidden max-w-full mx-auto rounded-sm"/> 
                                    </div>
                                    <div class="flex justify-center text-sm/6 text-gray-400 mt-2">
                                        <label for="edit_img_url_main" class="text-upload-img">
                                            <span>Upload a file</span>
                                            <input id="edit_img_url_main" name="img_url" type="file" class="sr-only" accept="image/*">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs/5 text-gray-400">PNG, JPG, GIF up to 10MB</p>
                                    {{-- Error message display for file size --}}
                                    <p id="file-size-error" class="text-red-500 text-sm mt-1 hidden"></p>
                                </div>
                            </div>
                        </div>

                        {{-- Section addtional one --}}
                        <div class="box-form-img">
                            <label class="edit_img_url_1" for="main-image-title text-sm/6 font-medium">Additional Image 1</label>
                            <div class="box-upload-image">
                                <div class="text-center">
                                    <div class="min-h-48 flex justify-center items-center">
                                        {{-- This icon can be hidden or replaced once an image is loaded --}}
                                        <i class="ri-image-add-line mx-auto text-9xl text-black/25" id="edit-upload-icon-1"></i>
                                        {{-- This for upload display image product --}}
                                        <img id="edit-preview-image-1" src="#" alt="Image Preview" class="edit-preview-image-1 hidden max-w-full mx-auto rounded-sm"/> 
                                    </div>

                                    <div class="flex justify-center text-sm/6 text-gray-400 mt-2">
                                        <label for="edit_img_url_1" class="text-upload-img">
                                            <span>Upload a file</span>
                                            <input id="edit_img_url_1" name="image_url1" type="file" class="sr-only" accept="image/*">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs/5 text-gray-400">PNG, JPG, GIF up to 10MB</p>
                                    {{-- Error message display for file size --}}
                                    <p id="edit-file-size-error-1" class="text-red-500 text-sm mt-1 hidden"></p>
                                </div>
                            </div>
                        </div>

                        {{-- Section addtional two--}}
                        <div class="box-form-img">
                            <label class="edit_img_url_2" for="main-image-title text-sm/6 font-medium">Additional Image 1</label>
                            <div class="box-upload-image">
                                <div class="text-center">
                                    <div class="min-h-48 flex justify-center items-center">
                                        {{-- This icon can be hidden or replaced once an image is loaded --}}
                                        <i class="ri-image-add-line mx-auto text-9xl text-black/25" id="edit-upload-icon-2"></i>
                                        {{-- This for upload display image product --}}
                                        <img id="edit-preview-image-2" src="#" alt="Image Preview" class="edit-preview-image-2 hidden max-w-full mx-auto rounded-sm"/> 
                                    </div>

                                    <div class="flex justify-center text-sm/6 text-gray-400 mt-2">
                                        <label for="edit_img_url_2" class="text-upload-img">
                                            <span>Upload a file</span>
                                            <input id="edit_img_url_2" name="image_url2" type="file" class="sr-only" accept="image/*">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs/5 text-gray-400">PNG, JPG, GIF up to 10MB</p>
                                    {{-- Error message display for file size --}}
                                    <p id="edit-file-size-error-2" class="text-red-500 text-sm mt-1 hidden"></p>
                                </div>
                            </div>
                        </div>

                        {{-- Section addtional three--}}
                        <div class="box-form-img">
                            <label class="edit_img_url_3" for="main-image-title text-sm/6 font-medium">Additional Image 1</label>
                            <div class="box-upload-image">
                                <div class="text-center">
                                    <div class="min-h-48 flex justify-center items-center">
                                        {{-- This icon can be hidden or replaced once an image is loaded --}}
                                        <i class="ri-image-add-line mx-auto text-9xl text-black/25" id="edit-upload-icon-3"></i>
                                        {{-- This for upload display image product --}}
                                        <img id="edit-preview-image-3" src="#" alt="Image Preview" class="edit-preview-image-3 hidden max-w-full mx-auto rounded-sm"/> 
                                    </div>

                                    <div class="flex justify-center text-sm/6 text-gray-400 mt-2">
                                        <label for="edit_img_url_3" class="text-upload-img">
                                            <span>Upload a file</span>
                                            <input id="edit_img_url_3" name="image_url3" type="file" class="sr-only" accept="image/*">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs/5 text-gray-400">PNG, JPG, GIF up to 10MB</p>
                                    {{-- Error message display for file size --}}
                                    <p id="edit-file-size-error-3" class="text-red-500 text-sm mt-1 hidden"></p>
                                </div>
                            </div>
                        </div>

                        {{-- Section addtional three--}}
                        <div class="box-form-img">
                            <label class="edit_img_url_4" for="main-image-title text-sm/6 font-medium">Additional Image 1</label>
                            <div class="box-upload-image">
                                <div class="text-center">
                                    <div class="min-h-48 flex justify-center items-center">
                                        {{-- This icon can be hidden or replaced once an image is loaded --}}
                                        <i class="ri-image-add-line mx-auto text-9xl text-black/25" id="edit-upload-icon-4"></i>
                                        {{-- This for upload display image product --}}
                                        <img id="edit-preview-image-4" src="#" alt="Image Preview" class="edit-preview-image-4 hidden max-w-full mx-auto rounded-sm"/> 
                                    </div>

                                    <div class="flex justify-center text-sm/6 text-gray-400 mt-2">
                                        <label for="edit_img_url_4" class="text-upload-img">
                                            <span>Upload a file</span>
                                            <input id="edit_img_url_4" name="image_url4" type="file" class="sr-only" accept="image/*">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs/5 text-gray-400">PNG, JPG, GIF up to 10MB</p>
                                    {{-- Error message display for file size --}}
                                    <p id="edit-file-size-error-4" class="text-red-500 text-sm mt-1 hidden"></p>
                                </div>
                            </div>
                        </div>

                    </div>
            </fieldset>

            <div class="mt-4 flex justify-end">
                <button type="submit" class="btn-form" name="save_product" id="save_product">Update</button>
                <button type="reset" class="btn-form-cancel">Cancel</button>
            </div>
        </form>
    </div>
</div>

<!-- Quill Editor Container -->
@endsection