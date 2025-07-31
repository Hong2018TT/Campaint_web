@extends ('layout.backed')
@section('content')
@include('components.sweetalerttwo.alerttwo')

    <style>
    .ql-font-battambang {font-family: 'Battambang', sans-serif;}
    .ql-picker.ql-font .ql-picker-label[data-value=battambang]::before,
    .ql-picker.ql-font .ql-picker-item[data-value=battambang]::before {content: 'Battambang';font-family: 'Battambang', sans-serif;}
    </style>
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

                <form id="aboutUsForm" name="aboutUsForm" class="" action="{{ route('update_aboutus') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <fieldset class="border border-gray-300 px-4 pb-4 rounded mt-1">
                        <legend class="description_khmer text-sm rounded-xs font-bold text-white px-2 bg-green-800 pb-0.5">Description (Khmer)</legend>
                        <div class="form-group">
                            <div class="editor-container pt-2">
                                <textarea id="description_khmer" name="description_khmer" value="{{old('description_khmer')}}" rows="6" class="sr-only" placeholder="Write your description here..."></textarea>
                                <!-- Create the first editor container -->
                                <div id="editor" class="editor-wrapper" name="description_khmer" style="max-height: 26rem;">
                                    {!! $about_us->description_khmer ?? '' !!}
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="border border-gray-300 px-4 pb-4 rounded mt-3">
                        <legend class="description_english text-sm rounded-xs font-bold text-white px-2 bg-green-800 pb-0.5">Description (English)</legend>
                        
                        <textarea id="description_english" name="description_english" rows="6" class="description_english sr-only" placeholder="Write your description here..."></textarea>
                        <div class="editor-container pt-2">
                            <!-- Create the first editor container -->
                            <div id="editor1" class="editor-wrapper" name="description_english" style="max-height: 26rem;">
                                {!! $about_us->description_english ?? '' !!}
                            </div>
                        </div>
                    </div>
                    </fieldset>
                    <div class="form-group pt-4 flex justify-end">
                        <button type="submit" class="btn-form">Save Changes</button>
                        <button type="reset" class="btn-form-cancel">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.getElementById('aboutUsForm');
        
        // Add a single event listener to the form.
        form.addEventListener('submit', function(e) {
            // Find the hidden textareas
            var khmerTextarea = document.getElementById('description_khmer');
            var englishTextarea = document.getElementById('description_english');

            // Update the hidden textareas with the HTML content from their respective editors.
            khmerTextarea.value = quill.root.innerHTML;
            englishTextarea.value = quill1.root.innerHTML;
        });
    });
</script>
@endsection