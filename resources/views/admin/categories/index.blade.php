@extends ('layout.backed')
@section('content')
@include('components.sweetalerttwo.alerttwo')

{{-- Content for display product --}}
<div class="shadow-lg rounded-md bg-white">
    <div class="header-main-tb">
        <div class="">
            <h1 class="text-xl font-semibold text-green-800">Category</h1>
        </div>
        <div class="sm:mt-0 sm:flex-none">
            <a href="{{route('admin.product.create')}}">
                <button type="button" class="btn-add">
                    <i class="ri-add-line text-md"></i>
                    Category</button>
            </a>
        </div>
    </div>

    <hr class="text-gray-300">
    
    <div class="mt-3 flow-root pb-2 px-3">
        @include('components.txt-error.txt-error')
        
        <div class="tb-overflow">
            <div class="inline-block min-w-full pb-2 align-middle pt-2">
                <table id="#" class="table-filter min-w-full divide-y divide-green-300">
                {{-- th table --}}
                    <thead class="bg-[#008442]">
                    <tr>
                        <th scope="col" class="table-header rounded-tl-md">ID</th>
                        <th scope="col" class="table-header">Name (English)</th>
                        <th scope="col" class="table-header">Name (khmer)</th>
                        <th scope="col" class="table-header">Image</th>
                        <th scope="col" class=".table-header-action rounded-tr-md">
                        <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                    </thead>
                    {{-- tb table --}}
                    <tbody class="divide-y divide-gray-200 bg-white">

                    <!-- More people... -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection