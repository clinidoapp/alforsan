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
      {{-- Bookings --}}
      <li class="nav-item rounded-2 m-2">
         <a href="#" class="nav-link {{ Request::is(patterns: 'admin/booking*') ? 'active' : '' }}">
         <img src="{{ asset('images/dashboard-icons/booking.webp') }}">
         Bookings
         </a>
      </li>
      {{-- Doctors (with submenu) --}}
      @php
      // Check if current route matches any of the doctor's submenu routes
      $doctorRoutes = ['doctors-list', 'doctors-add','doctors-view','doctors-edit'];
      $doctorMenuOpen = in_array(Route::currentRouteName(), $doctorRoutes);
      @endphp
      @if(\App\Helpers\Permissions::hasPermission('read_doctor'))
      <li class="nav-item rounded-0 m-2">
         <a class="nav-link d-flex justify-content-between align-items-center rounded-0 {{ Request::is('admin/doctors-*') ? 'active' : '' }}"
            data-bs-toggle="collapse"
            href="#doctorsMenu"
            role="button"
            aria-expanded="{{ $doctorMenuOpen ? 'true' : 'false' }}"
            aria-controls="doctorsMenu">
         <span>
         <img src="{{ asset('images/dashboard-icons/doctor.webp') }}">
         Doctors
         </span>
         <i class="fi fi-rr-angle-small-down"></i>
         </a>
         <ul class="nav w-100 d-flex-inline collapse ps-4 rounded-top-0 rounded-bottom-2 bg-white {{ $doctorMenuOpen ? 'show' : '' }}" id="doctorsMenu">
            <li class="nav-item">
               <a href="{{ route('doctors-list') }}" class="nav-link {{Request::is('admin/doctors-list*') ? 'active' : ''}}">
               Doctors List
               </a>
            </li>
            @if(\App\Helpers\Permissions::hasPermission('create_doctor'))
            <li class="nav-item">
               <a href="" class="nav-link ">
               Doctors Media
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
      {{-- Roles --}}
      <li class="nav-item rounded-2 m-2">
         <a href="{{ route('roles-list') }}" class="nav-link {{ Request::is(patterns: 'admin/role*') ? 'active' : '' }}">
         <img src="{{ asset('images/dashboard-icons/user-management.webp') }}">
         Roles
         </a>
      </li>
      {{-- Admins --}}
      <li class="nav-item rounded-2 m-2">
         <a href="{{route('admin-list')}}" class="nav-link  {{ Request::is('admin/admin-*') ? 'active' : '' }}">
         <img src="{{ asset('images/dashboard-icons/admin.webp') }}">
         Admins
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
