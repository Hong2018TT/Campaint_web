@extends ('layout.backed')
@section('content')

{{-- content for display task --}}
<div class="mb-6 rounded-md max-w-6xl mx-auto mt-2">
    <!-- Profile Header -->
        <div class="container-bg-profile">
            <div class="h-32 sm:h-88 md:h-88 bg-cover bg-center object-cover" style="background-image: url({{asset('assets/img/admin/bg-campaint.jpg')}})" loading="lazy"></div>
            <div class="p-6 md:p-8 relative">
                <div class="absolute -top-16 left-8">
                    <picture>
                        <source type="image/avif" srcset="image-sm.avif, image-lg.avif 2x">
                        <source type="image/webp" srcset="image-sm.webp, image-lg.webp 2x">

                        <img class="box-img-profile" 
                                src="{{asset('assets/img/admin/icon-user.jpg')}}"
                                alt="Admin Avatar" loading="lazy"
                                onerror="this.onerror=null;this.src='https://placehold.co/128x128/E2E8F0/4A5568?text=Admin';"/>
                    </picture>
                </div>
                <div class="mt-10 md:mt-0 md:ml-40">
                    <h2 id="user-name" class="text-2xl md:text-3xl font-bold">----</h2>
                    {{-- <p class="text-sm text-gray-600 dark:text-gray-400">@catherinew</p> --}}
                    <div class=" mt-4 flex flex-col md:flex-row md:items-center space-y-2 md:space-y-0 md:space-x-4">
                        <button class="btn-edit-profile">Edit Profile</button>
                    </div>
                </div>
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
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci odit quidem rerum, aperiam error neque placeat iure autem dignissimos facere voluptatibus eum, 
                        quia quam quae magni impedit inventore voluptatum hic minima est, ex veritatis. Deserunt omnis, molestias a officiis cum sapiente.
                    </p>
                </div>
            </div>

            <!-- Right Column: Details & Activity -->
            <div class="lg:col-span-1 space-y-6">
                <!-- User Details -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold border-b border-gray-700 pb-3">Details</h3>
                    <ul class="mt-4 space-y-2 text-gray-700">
                        <li class="flex items-center">
                            <i class="ri-user-line text-lg text-gray-400 mr-3"></i>
                            {{-- <svg class=" h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>  --}}
                                <strong>Full Name:</strong> <span class="ml-2">---</span>
                        </li>
                        <li class="flex items-center">
                            <i class="ri-mail-ai-line text-lg text-gray-400 mr-3"></i>
                            {{-- <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>  --}}
                                <strong>Email:</strong> <span class="ml-2 text-indigo-500">---</span>
                        </li>
                        <li class="flex items-center">
                            <i class="ri-phone-line text-lg text-gray-400 mr-3"></i>
                            {{-- <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg> --}}
                                <strong>Phone:</strong> <span class="ml-2">---</span>
                        </li>
                        <li class="flex items-center">
                            <i class="ri-map-pin-line text-lg text-gray-400 mr-3"></i>
                            {{-- <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg> --}}
                                <strong>Location:</strong> <span class="ml-2">---</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
</div>
@endsection