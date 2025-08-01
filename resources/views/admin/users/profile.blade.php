@extends ('layout.backed')
@section('content')
@include('components.sweetalerttwo.alerttwo')

{{-- content for display task --}}
<div class="mb-6 rounded-md max-w-7xl mx-auto mt-2">
    <!-- Profile Header -->
        <div class="container-bg-profile">
            <div class="h-32 sm:h-88 md:h-88 bg-cover bg-center object-cover" style="background-image: url({{asset('assets/img/profile/bg-campaint.jpg')}})" loading="lazy"></div>
            <div class="p-6 md:p-6 relative">
                @if(Auth::check())
                    <form action="{{ route('update_userprofile') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="absolute -top-16 left-8">
                            <picture>
                                <label for="profileImageInput">
                                    <div class="box-img-profile relative overflow-hidden">
                                        <img class="object-cover w-full h-full" id="profileImagePreview" src="{{ asset($users->image_url) }}"
                                            alt="Admin Avatar" loading="lazy" 
                                            onerror="this.onerror=null;this.src='{{asset('assets/img/users/user.png')}}';"/>
                                            <div class="upload-profile">
                                                <i class="ri-upload-2-fill text-lg"></i>
                                                <input type="file" name="profile_image" id="profileImageInput" class="hidden" accept="image/*">
                                            </div>
                                    </div>
                                </label>
                            </picture>
                        </div>
                        <div class="flex-grow flex-col md:flex-row items-center w-full lg:mt-12 md:mt-10 sm:mt-8">
                            <div class="text-center lg:text-left md:text-left sm:text-left">
                                <h2 id="user-name" class="text-2xl font-bold text-gray-800 lg:pl-12 sm:pl-11 pl-">{{ $users->name }}</h2>
                                <button type="submit" class="rounded-md bg-green-700 px-3 py-2 lg:ml-6 sm:ml-5 ml-0 text-sm font-semibold text-white shadow-sm hover:bg-green-600 focus-visible:outline-offset-2 focus-visible:outline-green-700 cursor-pointer">
                                    Edit Profile
                                </button>
                            </div>
                        </div>
                    </form>
                @endif
                {{-- <div class="mt-4 md:mt-0">
                </div> --}}
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6 mx-2">
            <!-- Left Column: About & Skills -->
            <div class="lg:col-span-1 space-y-6">
                <!-- About Me -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex justify-between items-center border-b border-gray-700 pb-3">
                        <h3 class="text-xl font-semibold">About Me</h3>
                    </div>
                    <p id="about-me-text" class="mt-4 text-gray-600">
                        Dedicated and results-oriented Dashboard Administrator with over 8 years of experience in system management, data analysis, and user support. Passionate about optimizing workflows and ensuring system integrity.
                    </p>
                </div>
            </div>

            <!-- Right Column: Details & Activity -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Recent Activity Card -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="font-bold text-lg text-gray-800 border-b pb-2 mb-4">Recent Activity</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <div class="bg-green-500 text-white rounded-full h-8 w-8 text-center flex items-center justify-center mr-4 mt-1">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">Updated user permissions for the marketing team.</p>
                                    <p class="text-sm text-gray-500">Today at 10:42 AM</p>
                                </div>
                            </li>
                            <li class="flex items-start">
                                <div class="bg-blue-500 text-white rounded-full h-8 w-8 text-center flex items-center justify-center mr-4 mt-1">
                                    <i class="fas fa-chart-bar"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">Generated a new quarterly sales report.</p>
                                    <p class="text-sm text-gray-500">Yesterday at 3:15 PM</p>
                                </div>
                            </li>
                            <li class="flex items-start">
                                <div class="bg-red-500 text-white rounded-full h-8 w-8 text-center flex items-center justify-center mr-4 mt-1">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">Resolved a critical security alert.</p>
                                    <p class="text-sm text-gray-500">July 29, 2025 at 9:00 AM</p>
                                </div>
                            </li>
                        </ul>
                    </div>
            </div>

        </div>
</div>
@endsection