@extends ('layout.backed')
@section('content')
@include('components.sweetalerttwo.alerttwo')

{{-- Content for display product --}}
<div class="shadow-lg rounded-md bg-white">
    <div class="header-main-tb">
        <div class="">
            <h1 class="text-xl font-semibold text-green-800">Product</h1>
        </div>
        <div class="sm:mt-0 sm:flex-none">
            <a href="{{route('admin.product.create')}}">
                <button type="button" class="btn-add">
                  <i class="ri-add-line text-md"></i>
                  Product</button>
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
              @foreach ($products as $product)
                <tr class="td-bg-dash">
                  <td class="table-cell-primary">{{ $loop->iteration }}</td>
                  <td class="table-cell">{{ $product->Name_EN }}</td>
                  <td class="table-cell">{{ $product->Name_KH }}</td>
                  <td class="table-cell"><img src="{{ asset('assets/img/products/' . $product->image_url) }}" class="w-14" alt="Image product" loading="lazy"></td>

                  <td>
                    <div class="table-cell-actions">
                      <a href="{{route('admin.product.edit', $product->id)}}" class="table-action-edit"><i class="ri-pencil-line"></i></a>
                      
                      <div x-data="{ open: false, productIdToDelete: null }">
                        <a @click="open = true; productIdToDelete = {{ $product->id }}" class="table-action-delete">
                            <i class="ri-delete-bin-6-fill"></i>
                        </a>
                        <div x-show="open" x-cloak @include('components.modal.model-transition')>
                            <div x-show="open" @include('components.modal.model-fade')
                                class="modal-box-md" @click.outside="open = true"> {{-- Changed @click.outside="open = true" to @click.outside="open = false" to allow closing --}}

                                <div class="modal-header-del">Delete</div>

                                <div class="modal-body">
                                    <p class="text-lg text-red-500">Are you sure you want to delete this item?</p>
                                </div>

                                <form :action="`/products-delete/${productIdToDelete}`" method="POST">
                                    @csrf
                                    @method('DELETE') {{-- Important for Laravel DELETE routes --}}
                                    <div class="model-footer">
                                        <a @click="open = false" class="btn-close-model">Close</a>
                                        <button type="submit" class="btn-del-model">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
                  </td>
                </tr>
              @endforeach

            <!-- More people... -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>

@endsection

