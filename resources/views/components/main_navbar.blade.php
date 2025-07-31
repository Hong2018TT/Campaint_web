<div class="home-content">
    {{-- Mobile Sidebar Menu button --}}
    <div class="navbar-menu text-white flex items-center">
        <button type="button" class="sidebar-menu-button">
            <i class="ri-menu-line"></i>
        </button>

        {{-- <i class='bx bx-align-left text-3xl mr-4 cursor-pointer'></i> --}}
        <div class="relative w-full max-w-sm hidden lg:block md:block">
            <!-- Search Icon -->
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="ri-search-2-line text-md text-gray-500"></i>
            </div>

            <!-- Search Input -->
            <input type="search" placeholder="Search..." class="search-navbar"/>
        </div>
    </div>

    {{-- Dropdown Admin navabr top--}}
    <div class="relative" x-data="{ open: false }">
        <button type="button"class="flex items-center p-1.5 cursor-pointer text-white" id="user-menu-button" @click="open = !open" 
                aria-expanded="true"
                aria-haspopup="true">

            <span class="sr-only">Open user menu</span>
            <img class="profile-admin" src="{{ asset('assets/img/users/user.png') }}" alt="Logo image" loading="lazy">
            <span class="hidden lg:flex lg:items-center">
                @if(Auth::check() == 'Administrator')
                    <span class="ml-2 text-sm/6 font-semibold">Admin</span>
                @elseif(Auth::check() == 'User')
                    <span class="ml-2 text-sm/6 font-semibold">User</span>
                @elseif(Auth::check() == 'Manager')
                    <span class="ml-2 text-sm/6 font-semibold">Manager</span>
                @else
                    <span class="ml-2 text-sm/6 font-semibold">Guest</span>
                @endif
            <span class="ml-2 text-sm/6 font-semibold"></span>
                <i class="ri-arrow-down-s-line text-lg transition-transform duration-300 caret-icon ml-1" :class="{'rotate-180': open}"></i>
            </span>
        </button>
            <div
                x-show="open"
                x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                class="absolute right-0 z-10 mt-1 w-fit origin-top-right rounded-sm bg-white shadow-md"
                role="menu"
                aria-orientation="vertical"
                aria-labelledby="menu-button"
                tabindex="-1"
                style="display: none;"
            >
                <div class="py-1 text-nowrap" role="none">
                    <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                    <a href="{{route('admin.users.profile')}}" class="text-gray-700 block px-3 py-1 text-sm hover:bg-gray-100 font-bold" role="menuitem" tabindex="-1" id="menu-item-0">Your Profile</a>
                    <a href="{{route('logout')}}" type="button" class="text-red-600 block w-full px-3 py-1 text-left text-sm hover:bg-gray-100 font-bold" role="menuitem" tabindex="-1" id="menu-item-3"><i class="ri-logout-box-line mr-1"></i>Sign out</a>
                </div>
            </div>
    </div>

    </div>

</div>