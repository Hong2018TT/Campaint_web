<div class="home-content">
    {{-- Mobile Sidebar Menu button --}}
    <div class="navbar-menu text-white flex items-center">
    <button type="button" class="sidebar-menu-button">
        <i class="ri-menu-unfold-4-line"></i>
    </button>

    {{-- <i class='bx bx-align-left text-3xl mr-4 cursor-pointer'></i> --}}
    <div class="relative w-full max-w-sm">
        <!-- Search Icon -->
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="ri-search-2-line text-lg text-gray-500"></i>
        </div>

        <!-- Search Input -->
        <input type="search" placeholder="Search..." class="search-navbar"/>
    </div>

    </div>

    {{-- Dropdown Admin navabr top--}}
    <div class="relative">
    <button type="button" class="flex items-center p-1.5 cursor-pointer text-white" id="user-menu-button">

        <span class="sr-only">Open user menu</span>
        <img class="profile-admin" src="{{ asset('assets/img/logo/Logo Campaint Original.png') }}" alt="">
        <span class="hidden lg:flex lg:items-center">
        <span class="ml-2 text-sm/6 font-semibold">Admin</span>
                <i class="ri-arrow-down-s-fill text-lg transition-transform duration-300 caret-icon ml-1"></i>
        </span>
    </button>

    <div id="user-dropdown"
        class="dropdown-navbar">
        <a href="#" class="dropdown-navbar-items">Your Profile</a>
        <a href="#" class="dropdown-navbar-items text-red-500">Sign Out</a>
    </div>
    </div>

    </div>

</div>