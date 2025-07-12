@extends ('layout.backed')
@section('content')

{{-- content for display about --}}
<div class="m-3 mb-6 shadow-lg rounded-md bg-white">
    <div class="header-main-tb">
        <div class="">
            <h1 class="text-xl font-semibold text-gray-900">About Cam-Pint</h1>
        </div>
    </div>

    <hr class="text-gray-200">
    
    <div class="mt-3 flow-root">
        <div class="tb-overflow p-3">
            <div class="w-full bg-gray-200 px-2 pt-2 pb-1 rounded-t-sm border-b-2 border-gray-300">
                <label for="edit-aboutuse" class="">Edit About Us</label>
            </div>
            <div class="container-edit-aboutus">
                <form action="#" method="post">
                    <div class="py-2">
                        <label for="description_khmer" name="description_khmer" class="text-base mb-2">Description (Khmer)</label>
                        <textarea id="des_about" rows="6" class="description-about sr-only" placeholder="Write your description here..."></textarea>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection