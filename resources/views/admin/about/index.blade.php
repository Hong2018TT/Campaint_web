@extends ('layout.backed')
@section('content')

{{-- content for display about --}}
<div class="shadow-lg rounded-md bg-white">
    <div class="header-main-tb">
        <div class="w-full bg-green-100 px-2 pt-2 pb-1 rounded-sm border-b-2 border-green-600">
            <label for="edit-aboutuse" class="text-2xl font-bold pl-2 text-green-800">Edit About Us</label>
        </div>
    </div>

    <hr class="text-gray-200">
    
    <div class="mt-3 flow-root pb-2">
        <div class="tb-overflow p-3">
            <div class="container-edit-aboutus">
                <form action="#" method="post">
                    <fieldset class="border border-gray-300 px-4 pb-4 rounded mt-3">
                        <legend class="description_khmer text-sm rounded-xs font-bold text-white px-2 bg-green-800 pb-0.5">Description (Khmer)</legend>
                        <div class="form-group">
                            <textarea id="description_khmer" rows="6" class="description_khmer sr-only" placeholder="Write your description here..."></textarea>
                            <div class="editor-container pt-2">
                                <!-- Create the first editor container -->
                                <div id="editor" class="editor-wrapper" name="about-create-khmer" style="max-height: 25rem;">
                                    <p>{!! $about_us->description_khmer ?? '' !!}</p
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="border border-gray-300 px-4 pb-4 rounded mt-3">
                        <legend class="description_english text-sm rounded-xs font-bold text-white px-2 bg-green-800 pb-0.5">Description (English)</legend>
                        
                        <textarea id="description_english" rows="6" class="description_english sr-only" placeholder="Write your description here..."></textarea>
                        <div class="editor-container pt-2">
                            <!-- Create the first editor container -->
                            <div id="editor1" class="editor-wrapper" name="about-english" style="max-height: 25rem;">
                                <p>{!! $about_us->description_khmer ?? '' !!}</p
                            </div>
                        </div>
                    </div>
                    <div class="form-group pt-4 flex justify-end">
                        <button type="submit" class="btn-form">Save Changes</button>
                        <button type="reset" class="btn-form-cancel">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection