@extends ('layout.backed')
@section('content')
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
        <form id="#" name="#" calss="max-w-md mx-auto" action="#" method="post" enctype="multipart/form-data">
            {{-- section for address depo --}}
                <fieldset class="border border-gray-300 p-4 rounded">
                    <legend class="text-sm rounded-xs font-bold text-white px-2 bg-green-700">Address:</legend>
                        <div class="grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 sm:gap-2 md:gap-4">
                            <div class="box-form">
                                <label for="depo-en" class="title-form">Name (English)</label>
                                <div class="form-outline">
                                    <input type="text" name="depo_en" id="depo_en" class="form-input" placeholder="Enter your product name en" required>
                                </div>
                            </div>
                            <div class="box-form">
                                <label for="depo-add-en" class="title-form">Address (English)</label>
                                <div class="form-outline">
                                    <input type="text" name="depo_add_en" id="depo_add_en" class="form-input" placeholder="Enter your product name en" required>
                                </div>
                            </div>
                            <div class="box-form">
                                <label for="depo-add-kh" class="title-form">Address (Khmer)</label>
                                <div class="form-outline">
                                    <input type="text" name="depo_add_kh" id="depo_add_kh" class="form-input" placeholder="Enter your product name en" required>
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
                                <label for="depo-kh" class="title-form">Name (Khmer)</label>
                                <div class="form-outline">
                                    <input type="text" name="depo_kh" id="depo_kh" class="form-input" placeholder="Enter your product name en" required>
                                </div>
                            </div>
                            <div class="box-form">
                                <label for="depo-pro-en" class="title-form">Province (english)</label>
                                <div class="form-outline">
                                    <input type="text" name="depo_pro_kh" id="depo_pro_kh" class="form-input" placeholder="Enter your product name en" required>
                                </div>
                            </div>
                            <div class="box-form">
                                <label for="depo-pro-kh" class="title-form">Province (Khmer)</label>
                                <div class="form-outline">
                                    <input type="text" name="depo_pro_kh" id="depo_pro_kh" class="form-input" placeholder="Enter your product name en" required>
                                </div>
                            </div>
                        </div>
                </fieldset>

                <div class="grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 sm:gap-2 md:gap-4 mt-3">
                    <div class="box-form">
                        <label for="phone" class="title-form">Phone</label>
                        <div class="form-outline">
                            <div class="shrink-0 text-base text-gray-500 select-none sm:text-sm/6">(+855):</div>
                            <input type="tel" name="phone" id="phone" class="form-input" placeholder="Enter your phone number" maxlength="14" required>
                        </div>
                    </div>
                    <div class="box-form">
                        <label for="GPS" class="title-form">GPS</label>
                        <div class="form-outline">
                            <input type="text" name="GPS" id="GPS" class="form-input" placeholder="Enter your product name en" required>
                        </div>
                    </div>
                </div>

                <div class="mt-4 flex justify-end">
                    <button type="submit" class="btn-form">Save</button>
                    <button type="reset" class="btn-form-cancel">Cancel</button>
                </div>
                
        </form>
    </div>

</div>
@endsection 