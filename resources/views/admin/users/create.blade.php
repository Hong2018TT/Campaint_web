@extends ('layout.backed')
@section('content')
{{-- Content for create product --}}
<div class="shadow-lg rounded-md bg-white">
    <div class="header-main-tb">
        <div class="">
            <h1 class="text-xl font-semibold text-green-800">Add User</h1>
        </div>
        <div class="sm:mt-0 sm:flex-none bg">
            <a href="{{route('admin.users.index')}}">
                <button type="button" class="btn-add">
                    <i class="ri-arrow-left-line"></i>
                </button>
            </a>
        </div> 
    </div>

    <hr class="text-gray-200">

    <div class="mt-3 flow-root pb-2 px-3">
        @include('components.txt-error.txt-error')

        <form id="#" name="#" class="mx-auto" action="{{route('save_user')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 sm:gap-2 md:gap-x-4">
                <div class="box-form">
                    <label for="product-en" class="title-form">Name</label>
                    <div class="form-outline">
                        <input type="text" name="name" id="name" class="form-input" value="{{ old('name') }}" placeholder="Enter your product name" required>
                    </div>
                </div>

                <div class="box-form">
                    <label for="product-en" class="title-form">Email</label>
                    <div class="form-outline">
                        <input type="email" name="email" id="email" class="form-input" value="{{ old('email') }}" placeholder="Enter your @gamil.com" required>
                    </div>
                    @error('email')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="box-form">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <div class="relative">
                        <div class="form-outline">
                            <input type="password" id="password" name="password" class="form-input" placeholder="Enter user password (8 characters min)" required>
                            <div class="absolute inset-y-0 end-0 flex items-center pe-3 cursor-pointer">
                                <i id="togglePassword" class="ri-eye-off-fill"></i>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="box-form">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Comfirm Password</label>
                    <div class="relative">
                        <div class="form-outline">
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-input" placeholder="Enter your comfirm password" required>
                            <div class="absolute inset-y-0 end-0 flex items-center pe-3 cursor-pointer">
                                <i id="toggleComfirmPassword" class="ri-eye-off-fill"></i>
                            </div>
                        </div>
                    </div>
                    @error('password_confirmation')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                

                <div class="box-form">
                    <label for="role" class="title-form">Role</label>
                    <div class="grid grid-cols-1 focus-within:relative">
                        <select id="role" name="role" autocomplete="role" aria-label="role" class="form-select" required>
                            <option value="" hidden >Select your role</option>
                            <option value="User" {{ old('role') == 'User' ? 'selected' : '' }}>User</option>
                            <option value="Administrator" {{ old('role') == 'Administrator' ? 'selected' : '' }}>Administrator</option>
                            <option value="Manager" {{ old('role') == 'Manager' ? 'selected' : '' }}>Manager</option>
                        </select>

                        <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>

                {{-- This just set layout --}}
                <div class="box-form"></div>

                {{-- Section main image product --}}
                <div class="box-form-img pb-1">
                    <label for="img_url" class="main-image-title text-sm/6 font-medium">Profile Image</label>
                    <div class="box-upload-image">
                        <div class="text-center">
                            <div class="min-h-48 flex justify-center items-center">
                                <i class="ri-image-add-line mx-auto text-9xl text-black/25" id="upload-icon-profile"></i>
                                <img id="preview-image-profile" src="{{ (old('image_url')) }}" alt="Image Preview" class="preview-image-product hidden max-w-full mx-auto rounded-sm"/> 
                            </div>
                            <div class="flex justify-center text-sm/6 text-gray-400 mt-2">
                                <label for="img_url" class="text-upload-img">
                                    <span>Upload a file</span>
                                    <input id="img_url" name="img_url" type="file" class="sr-only" accept="image/*">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs/5 text-gray-400">PNG, JPG, GIF up to 10MB</p>
                            <p id="file-size-error-profile" class="text-red-500 text-sm mt-1 hidden"></p>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="mt-4 flex justify-end">
                <button type="submit" class="btn-form" name="save_profile" id="save_profile">Save</button>
                <button type="reset" class="btn-form-cancel">Cancel</button>
            </div>
        </form>
    </div>
</div>
@endsection