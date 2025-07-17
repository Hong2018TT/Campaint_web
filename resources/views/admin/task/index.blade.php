@extends ('layout.backed')
@section('content')

{{-- content for display task --}}
<div class="shadow-lg rounded-md bg-white">
    <div class="header-main-tb">
        <div class="w-full bg-green-100 px-2 pt-2 pb-1 rounded-sm border-b-2 border-green-600">
            <label for="edit-aboutuse" class="text-2xl font-bold pl-2 text-green-800">Task</label>
        </div>
    </div>

    <hr class="text-gray-200">
    
    <div class="mt-3 flow-root pb-2">
        <div class="tb-overflow">
        </div>
    </div>
</div>

@endsection