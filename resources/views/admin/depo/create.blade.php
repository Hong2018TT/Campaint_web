@extends ('layout.backed')
@section('content')
@include('components.sweetalerttwo.alerttwo')

{{-- Content for create product --}}
<div class="mb-3 shadow-lg rounded-md bg-white">
    <div class="header-main-tb">
        <div class="">
            <h1 class="text-xl font-semibold text-green-800">Create Depo</h1>
        </div>
        <div class="sm:mt-0 sm:flex-none bg">
            <a href="{{route('admin.depo.index')}}">
                <button type="button" class="btn-add">
                    <i class="ri-arrow-left-line"></i>
                </button>
            </a>
        </div> 
    </div>

    <hr class="text-gray-200">

    <div class="mt-5 flow-root pb-2 px-3">
        @include('components.txt-error.txt-error')

        <form id="form-depo" name="from-depo" calss="max-w-md mx-auto" action="{{route('save_depo')}}" method="post" enctype="multipart/form-data">
            @csrf

            {{-- section for address depo --}}
                <fieldset class="border border-gray-300 p-4 rounded">
                    <legend class="text-sm rounded-xs font-bold text-white px-2 bg-green-700">Address:</legend>
                        <div class="grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 sm:gap-2 md:gap-4">
                            <div class="box-form">
                                <label for="Name_EN" class="title-form">Name (English)</label>
                                <div class="form-outline">
                                    <input type="text" name="Name_EN" id="Name_EN" value="{{ old('Name_EN') }}" class="form-input" placeholder="Enter your depo name english" required>
                                </div>
                            </div>
                            <div class="box-form">
                                <label for="Address_EN" class="title-form">Address (English)</label>
                                <div class="form-outline">
                                    <input type="text" name="Address_EN" id="Address_EN" value="{{ old('Address_EN') }}" class="form-input" placeholder="Enter your province english" required>
                                </div>
                            </div>
                            <div class="box-form">
                                <label for="Address_KH" class="title-form">Address (Khmer)</label>
                                <div class="form-outline">
                                    <input type="text" name="Address_KH" id="Address_KH value="{{ old('Address_KH') }}" class="form-input" placeholder="Enter your address english" required>
                                </div>
                            </div>
                        </div>
                </fieldset>
            
            {{-- section for province depo --}}
                <fieldset class="border border-gray-300 px-4 p-2 rounded mt-3">
                    <legend class="text-sm rounded-xs font-bold text-white px-2 bg-green-700">Province:</legend>
                        <div class="grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 sm:gap-2 md:gap-4">
                            {{-- Section fot name khmer --}}
                            <div class="box-form">
                                <label for="Name_KH" class="title-form">Name (Khmer)</label>
                                <div class="form-outline">
                                    <input type="text" name="Name_KH" id="Name_KH" value="{{ old('Name_KH') }}" class="form-input" placeholder="Enter your depo name khmer" required>
                                </div>
                                @error('Name_KH')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="box-form">
                                <label for="province_EN" class="title-form">Province (english)</label>
                                <div class="grid grid-cols-1 focus-within:relative">
                                    <select name="province_EN" id="province_EN" autocomplete="province_EN" aria-label="province_EN" class="form-select" required>
                                        <option value="" hidden selected>Select province (english)</option>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->PROVINCE }}" {{ old('province_EN') == $province->PROVINCE? 'selected' : '' }}>
                                                {{ $province->PROVINCE }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                        <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                @error('province_EN')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="box-form">
                                <label for="province_KH" class="title-form">Province (khmer)</label>
                                <div class="grid grid-cols-1 focus-within:relative">
                                    <select name="province_KH" id="province_KH" autocomplete="province_KH" aria-label="province_KH" class="form-select" required>
                                        <option value="" hidden selected>សូមជ្រើសរើសយកខេត្ត</option>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->PROVINCE_KH }}" {{ old('province_KH') == $province->PROVINCE_KH ? 'selected' : '' }}>
                                                {{ $province->PROVINCE_KH }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                        <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                @error('province_KH')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                </fieldset>

                <div class="grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 sm:gap-2 md:gap-4 mt-3">
                    <div class="box-form">
                        <label for="Phone" class="title-form">Phone</label>
                        <div class="form-outline">
                            <div class="shrink-0 text-base text-gray-500 select-none sm:text-sm/6">(+855):</div>
                            <input type="tel" name="Phone" id="Phone" value="{{ old('Phone') }}" class="form-input" placeholder="Enter your phone number" maxlength="14" required>
                        </div>
                        @error('Phone')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="box-form">
                        <label for="GPS" class="title-form">GPS</label>
                        <div class="form-outline">
                            <input type="text" name="GPS" id="GPS" value="{{ old('GPS') }}" class="form-input" placeholder="Enter your product GPS" required>
                        </div>
                        @error('GPS')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mt-4 flex justify-end">
                    <button type="submit" class="btn-form" name="save_depo" id="save_depo">Save</button>
                    <button type="reset" class="btn-form-cancel">Cancel</button>
                </div>
                
        </form>
    </div>

</div>
@endsection 