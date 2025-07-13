@extends ('layout.backed')
@section('content')
{{-- Content for create product --}}
<div class="shadow-lg rounded-md bg-white">
    <div class="header-main-tb">
        <div class="">
            <h1 class="text-2xl font-semibold text-gray-900">Edit Depo</h1>
        </div>
        <div class="sm:mt-0 sm:flex-none bg">
            <a href="{{route('admin.depo.index')}}">
                <button type="button" class="cursor-pointer block rounded-sm bg-blue-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-xs hover:bg-blue-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                    <i class="ri-arrow-left-line"></i>
                </button>
            </a>
        </div> 
    </div>

    <hr class="text-gray-200">

    <div class="mt-5 flow-root pb-2 px-3">
        <form id="#" name="#" calss="max-w-md mx-auto" action="#" method="post" enctype="multipart/form-data">
            {{-- section for address depo --}}
                <fieldset class="border border-gray-300 px-4 py-2 rounded">
                    <legend class="text-md rounded-xs font-bold text-white px-2 bg-blue-800">Address:</legend>
                        <div class="grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 sm:gap-2 md:gap-4">
                            <div class="box-form">
                                <label for="depo-en" class="title-form">Name (English)</label>
                                <div class="form-outline">
                                    <input type="text" name="depo_en" id="depo_en" class="form-input" placeholder="Enter your product name en">
                                </div>
                            </div>
                            <div class="box-form">
                                <label for="depo-add-en" class="title-form">Address (English)</label>
                                <div class="form-outline">
                                    <input type="text" name="depo_add_en" id="depo_add_en" class="form-input" placeholder="Enter your product name en">
                                </div>
                            </div>
                            <div class="box-form">
                                <label for="depo-add-kh" class="title-form">Address (Khmer)</label>
                                <div class="form-outline">
                                    <input type="text" name="depo_add_kh" id="depo_add_kh" class="form-input" placeholder="Enter your product name en">
                                </div>
                            </div>
                        </div>
                </fieldset>
            
            {{-- section for province depo --}}
                <fieldset class="border border-gray-300 p-4 rounded mt-3">
                    <legend class="text-md rounded-xs font-bold text-white px-2 bg-blue-800">Province:</legend>
                        <div class="grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 sm:gap-2 md:gap-4">
                            {{-- Section fot name khmer --}}
                            <div class="box-form">
                                <label for="depo-kh" class="title-form">Name (Khmer)</label>
                                <div class="form-outline">
                                    <input type="text" name="depo_kh" id="depo_kh" class="form-input" placeholder="Enter your product name en">
                                </div>
                            </div>
                            <div class="box-form">
                                <label for="depo-pro-en" class="title-form">Province (english)</label>
                                <div class="form-outline">
                                    <input type="text" name="depo_pro_kh" id="depo_pro_kh" class="form-input" placeholder="Enter your product name en">
                                </div>
                            </div>
                            <div class="box-form">
                                <label for="depo-pro-kh" class="title-form">Province (Khmer)</label>
                                <div class="form-outline">
                                    <input type="text" name="depo_pro_kh" id="depo_pro_kh" class="form-input" placeholder="Enter your product name en">
                                </div>
                            </div>
                        </div>
                </fieldset>

                <div class="grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 sm:gap-2 md:gap-4 mt-3">
                    <div class="box-form">
                        <label for="phone" class="title-form">Phone</label>
                        <div class="form-outline">
                            <div class="shrink-0 text-base text-gray-500 select-none sm:text-sm/6">(+855):</div>
                            <input type="tel" name="phone" id="phone" class="form-input" placeholder="Enter your phone number" maxlength="11">
                        </div>
                    </div>
                    <div class="box-form">
                        <label for="GPS" class="title-form">GPS</label>
                        <div class="form-outline">
                            <input type="text" name="GPS" id="GPS" class="form-input" placeholder="Enter your product name en">
                        </div>
                    </div>
                </div>

            <div class="mt-4 flex justify-end">
                <button type="button" class="btn-form">Create</button>
                <button type="reset" class="btn-form-cancel">Cancel</button>
            </div>
            
        </form>
    </div>
</div>

@endsection