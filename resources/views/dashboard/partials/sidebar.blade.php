<aside id="sidebar" class="sidebar d-flex flex-column">
    <div class="text-white text-center pt-3 pb-4">
        <img src="{{ asset('images/dashboard-logo.webp') }}" class="logo">
    </div>

    <ul class="nav nav-pills flex-column mt-3">

        {{-- Dashboard --}}
        <li class="nav-item rounded-2 m-2">
            <a href="{{ route('dashboard') }}" class="nav-link {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
                <img src="{{ asset('images/dashboard-icons/dashboard.webp') }}">
                Dashboard
            </a>
        </li>

        {{-- Admins --}}
        <li class="nav-item rounded-2 m-2">
            <a href="{{route('admin-list')}}" class="nav-link  {{ Request::is('admin/*') ? 'active' : '' }}">
                <img src="{{ asset('images/dashboard-icons/admin.webp') }}">
                Admins
            </a>
        </li>

        {{-- Doctors (with submenu) --}}
        @if(\App\Helpers\Permissions::hasPermission('read_doctor'))
        <li class="nav-item rounded-2 m-2">

            <a class="nav-link d-flex justify-content-between align-items-center  {{ Request::is(patterns: 'admin/doctors-*') ? 'active' : '' }}"
               data-bs-toggle="collapse"
               href="#doctorsMenu"
               role="button"
               aria-expanded="false"
               aria-controls="doctorsMenu">

                <span>
                    <img src="{{ asset('images/dashboard-icons/doctor.webp') }}">
                    Doctors
                </span>

                <i class="fi fi-rr-angle-small-down"></i>
            </a>

            <ul class="nav flex-column collapse ps-4 mt-1" id="doctorsMenu">
                <li class="nav-item">
                    <a href="" class="nav-link {{ request()->routeIs('doctor') ? 'active' : '' }}">
                        All Doctors
                    </a>
                </li>

                @if(\App\Helpers\Permissions::hasPermission('create_doctor'))
                <li class="nav-item">
                    <a href="" class="nav-link {{ request()->routeIs('doctor') ? 'active' : '' }}">
                        Add Doctor
                    </a>
                </li>
                @endif


            </ul>

        </li>
        @endif

        {{-- Services --}}
        <li class="nav-item rounded-2 m-2">
            <a href="#" class="nav-link {{ Request::is(patterns: 'admin/services*') ? 'active' : '' }}">
                <img src="{{ asset('images/dashboard-icons/services.webp') }}">
                Services
            </a>
        </li>

        {{-- Bookings --}}
        <li class="nav-item rounded-2 m-2">
            <a href="#" class="nav-link {{ Request::is(patterns: 'admin/booking*') ? 'active' : '' }}">
                <img src="{{ asset('images/dashboard-icons/booking.webp') }}">
                Bookings
            </a>
        </li>

        {{-- Settings --}}
        <li class="nav-item rounded-2 m-2">
            <a href="#" class="nav-link {{ Request::is(patterns: 'admin/setting*') ? 'active' : '' }}">
                <img src="{{ asset('images/dashboard-icons/setting.webp') }}">
                Settings
            </a>
        </li>

    </ul>
</aside>
