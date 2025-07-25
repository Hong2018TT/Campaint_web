@extends ('layout.backed')
@section('content')
@include('components.sweetalerttwo.alerttwo')

{{-- This section for display user --}}
{{-- content for display task --}}
<div class="shadow-lg rounded-md bg-white">
    <div class="header-main-tb">
        <div class="">
            <h1 class="text-xl font-semibold text-green-800">User</h1>
        </div>
        <div class="sm:mt-0 sm:flex-none">
            <a href="{{route('admin.users.create')}}">
                <button type="button" class="btn-add">
                    <i class="ri-add-line text-md"></i>
                    User</button>
            </a>
        </div>
    </div>

    <hr class="text-gray-300">

    <div class="mt-3 flow-root pb-2 px-3">
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
                        <th scope="col" class="table-header">Role</th>
                        <th scope="col" class=".table-header-action rounded-tr-md">
                        <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                {{-- tb table --}}
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach ($users as $user)
                        <tr class="td-bg-dash">
                            <td class="table-cell-primary">{{ $loop->iteration }}</td>
                            <td class="table-cell">
                                <div class="relative w-14 h-14 p-[3px] rounded-sm overflow-hidden" style="background: linear-gradient(to bottom, red, blue, green , yellow);">
                                    <img src="{{ asset('assets/img/admin/user-profile.png') }}" class="tb-img-user" alt="admin & user" loading="lazy">
                                </div>
                            <td class="table-cell">{{ $user->name }}</td>
                            <td class="table-cell">{{ $user->email }}</td>
                            <td class="table-cell">
                                <span class="badge-role
                                    @if($user->role === 'Administrator') text-red-700 bg-red-100
                                    @elseif($user->role === 'Manager') text-yellow-800 bg-yellow-100
                                    @else text-green-700 bg-green-100
                                    @endif ">
                                    {{ $user->role }}
                                </span>

                            </td>
                            <td class="table-cell-actions">

                            <a href="{{route('admin.users.edit', $user->id)}}" class="table-action-edit"><i class="ri-pencil-line"></i></a>
                            
                            <div x-data="{ open: false, userIdToDelete: null, deleteFormAction: '' }">
                                <button
                                    @click=" open = true;
                                        userIdToDelete = {{ $user->id }};
                                        // Dynamically build the action URL for the form inside the modal
                                        deleteFormAction = '{{ route('delete_user', ['id' => 'PLACEHOLDER_ID']) }}'.replace('PLACEHOLDER_ID', userIdToDelete);
                                    "
                                    class="table-action-delete" title="Delete User">
                                    <i class="ri-delete-bin-6-fill"></i>
                                </button>

                                <div x-show="open" x-cloak @include('components.modal.model-transition')>
                                    <div x-show="open" @include('components.modal.model-fade')
                                        class="modal-box-md" @click.outside="open = true">

                                        <div class="modal-header-del">Delete</div>
                                        <hr class="border-1 border-gray-400">

                                        <div class="modal-body text-left px-4 py-2 whitespace-normal">
                                            <p class="text-lg text-red-500">Are you sure you want to delete this User?</p>
                                        </div>

                                        {{-- The actual form that sends the DELETE request --}}
                                        <form :action="deleteFormAction" method="POST">
                                            @csrf {{-- CSRF token for security --}}
                                            @method('DELETE') {{-- Method spoofing for DELETE request --}}
                                            <div class="model-footer flex justify-end space-x-2 px-4 pt-4">
                                                <button type="button" @click="open = false" class="btn-close-model">Cancel</button>
                                                <button type="submit" class="btn-del-model">Delete</button>
                                            </div>
                                        </form>
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