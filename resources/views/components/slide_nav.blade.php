<nav class="slide-nav">
    <ul class="nav-list primary-nav">
        <li class="nav-item">
            <a href="{{route('admin.dashboard.home')}}" class="nav-link">
                <i class="ri-dashboard-fill text-xl transition-transform duration-300"></i>
                <span class="nav-label">Dashboard</span>
            </a>

            <ul class="dropdown-menu pl-4">
                <li class="nav-item px-3">
                    <a href="{{route('admin.dashboard.home')}}" class="nav-link dropdown-link">Dashboard</a>
                </li>
            </ul>
        </li>

        {{-- Dropdown --}}
        <li class="nav-item dropdown-container">
            <a href="{{route('admin.product.index')}}" class="nav-link dropdown-toggle">
                <i class="ri-archive-fill text-xl transition-transform duration-300"></i>
                <span class="nav-label">Product</span>
                <i class="dropdown-icon ri-arrow-down-s-line"></i>
            </a>

            {{-- Dropdown Menu --}}
            <ul class="dropdown-menu pl-10">
                <li class="nav-item px-3">
                    <a href="{{route('admin.product.index')}}" class="nav-link dropdown-title">Product Type</a>
                </li>
                <li class="nav-item px-3">
                    <a href="{{route('admin.product.index')}}" class="nav-link dropdown-link">Product Type</a>
                </li>
                <li class="nav-item px-3">
                    <a href="#" class="nav-link dropdown-link">Sub Product</a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="{{route("admin.colorfamily.index")}}" class="nav-link">
                <i class="ri-color-filter-fill text-xl transition-transform duration-300"></i>
                <span class="nav-label">Color Family</span>
            </a>
            <ul class="dropdown-menu pl-4">
                <li class="nav-item px-3">
                    <a href="{{route("admin.colorfamily.index")}}" class="nav-link dropdown-link">Color Family</a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="{{route('admin.color.index')}}" class="nav-link">
                <i class="ri-palette-fill text-xl transition-transform duration-300"></i>
                <span class="nav-label">Color</span>
            </a>
            <ul class="dropdown-menu pl-4">
                <li class="nav-item px-3">
                    <a href="{{route('admin.color.index')}}" class="nav-link dropdown-link">Color</a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="{{route('admin.depo.index')}}" class="nav-link">
                <i class="ri-store-fill text-xl transition-transform duration-300"></i>
                <span class="nav-label">Depo</span>
            </a>
            <ul class="dropdown-menu pl-4">
                <li class="nav-item px-3">
                    <a href="{{route('admin.depo.index')}}" class="nav-link dropdown-link">Depo</a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="{{route('admin.cal_product.index')}}" class="nav-link">
                <i class="ri-calculator-fill text-xl transition-transform duration-300"></i>
                <span class="nav-label">Calculate Product</span>
            </a>
            <ul class="dropdown-menu pl-4">
                <li class="nav-item px-3">
                    <a href="{{route('admin.cal_product.index')}}" class="nav-link dropdown-link">Calculate Product</a>
                </li>
            </ul>
        </li>

        {{-- <li class="nav-item">
            <a href="{{route('admin.users.index')}}" class="nav-link">
                <i class="ri-user-3-fill text-xl transition-transform duration-300"></i>
                <span class="nav-label">User</span>
            </a>
            <ul class="dropdown-menu pl-4">
                <li class="nav-item px-3">
                    <a href="{{route('admin.users.index')}}" class="nav-link dropdown-link">User</a>
                </li>
            </ul>
        </li> --}}

        <li class="nav-item">
            <a href="{{route('admin.about.index')}}" class="nav-link">
                <i class="ri-question-fill text-xl transition-transform duration-300"></i>
                <span class="nav-label">About</span>
            </a>
            <ul class="dropdown-menu pl-4">
                <li class="nav-item px-3">
                    <a href="{{route('admin.about.index')}}" class="nav-link dropdown-link">About</a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="{{route('admin.task.index')}}" class="nav-link">
                <i class="ri-list-view text-xl transition-transform duration-300"></i>
                <span class="nav-label">FAQ-Categories</span>
            </a>
            <ul class="dropdown-menu pl-4">
                <li class="nav-item px-3">
                    <a href="{{route('admin.task.index')}}" class="nav-link dropdown-link">Task</a>
                </li>
            </ul>
        </li>

    </ul>
</nav>