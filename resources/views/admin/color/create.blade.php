@extends ('layout.backed')
@section('content')
@include('components.sweetalerttwo.alerttwo')

{{-- Content for create product --}}
<div class="shadow-lg rounded-md bg-white">
    <div class="header-main-tb">
        <div class="">
            <h1 class="text-xl font-semibold text-green-800">Add Color</h1>
        </div>
        <div class="sm:mt-0 sm:flex-none bg">
            <a href="{{route('admin.color.index')}}">
                <button type="button" class="btn-add">
                    <i class="ri-arrow-left-line"></i>
                </button>
            </a>
        </div> 
    </div>

    <hr class="text-gray-200">

    <div class="mt-5 flow-root pb-2 px-3">
        @include('components.txt-error.txt-error')
        
        <form id="form-color" name="from-color" calss="max-w-md mx-auto" action="{{ route('save_color') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 sm:gap-2 md:gap-4">
                <div class="box-form">
                    <label for="color_code" class="title-form">Color Code</label>
                    <div class="form-outline">
                        <input type="text" name="color_code" id="color_code" value="{{ old('color_code') }}" class="form-input" placeholder="Enter your product name en" required>
                    </div>
                </div>
                <div class="box-form">
                    <label for="color_name" class="title-form">Color Name</label>
                    <div class="form-outline">
                        <input type="text" name="color_name" id="color_name"  value="{{ old('color_name') }}" class="form-input" placeholder="Enter your product name en" required>
                    </div>
                </div>
            </div>

            <fieldset class="border border-gray-300 px-4 py-2 rounded mt-3">
                <legend class="text-sm rounded-xs font-bold text-white px-2 bg-green-700 pb-0.5">RGB:</legend>
                    {{-- section RGB value --}}
                    <div class="grid grid-cols-3 gap-2 sm:gap-2 md:gap-4 lg:gap-4">
                        <div class="box-form">
                            <div class="form-outline">
                                <div class="shrink-0 text-base text-gray-500 select-none sm:text-sm/6">R:</div>
                                <input type="number" name="r" id="r" class="form-input" value="{{ old('r') }}" placeholder="0-255" required pattern="\d{1,3}" maxlength="3" max="255" oninput="this.value = Math.min(255, this.value.replace(/[^0-9]/g, ''))">
                            </div>
                        </div>
                        <div class="box-form">
                            <div class="form-outline">
                                <div class="shrink-0 text-base text-gray-500 select-none sm:text-sm/6">G:</div>
                                <input type="number" name="g" id="g" class="form-input" value="{{ old('g') }}" placeholder="0-255" required required pattern="\d{1,3}" maxlength="3" max="255" oninput="this.value = Math.min(255, this.value.replace(/[^0-9]/g, ''))">
                            </div>
                        </div>
                        <div class="box-form">
                            <div class="form-outline">
                                <div class="shrink-0 text-base text-gray-500 select-none sm:text-sm/6">B:</div>
                                <input type="number" name="b" id="b" class="form-input" value="{{ old('b') }}" placeholder="0-255" required required pattern="\d{1,3}" maxlength="3" max="255" oninput="this.value = Math.min(255, this.value.replace(/[^0-9]/g, ''))">
                            </div>
                        </div>
                    </div>
            </fieldset>

            <div class="grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 sm:gap-2 md:gap-4 mt-3">
                <div class="box-form pt-1">
                    <label for="product_type" class="title-form">Product Type <span class="text-gray-500">(Optional)</span></label>
                    <div class="form-outline">
                        <input type="text" name="product_type" id="product_type" class="form-input" value="{{ old('product_type') }}" placeholder="Enter your product type">
                    </div>
                </div>
                <div class="box-form">
                    <label for="color_family" class="title-form">Color Family</label>
                    <div class="grid grid-cols-1 focus-within:relative">
                        <select id="color_family" name="color_family" autocomplete="color_family" value="{{ old('color_family') }}" aria-label="color_family" class="form-select" required>
                            <option value="" hidden selected>Select color family</option>
                            @foreach ($colorfamilys as $colorfamily)
                                <option value="{{ $colorfamily->name }}">{{ $colorfamily->name }}</option>
                            @endforeach
                        </select>

                        <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="mt-4 flex justify-end">
                <button type="submit" class="btn-form" id="save_color" name="save_color">Save</button>
                <button type="reset" class="btn-form-cancel">Cancel</button>
            </div>
        </form>
    </div>
</div>
@endsection