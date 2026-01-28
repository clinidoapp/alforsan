<aside id="sidebar" class="sidebar d-flex flex-column">
   <div class="text-white text-center pt-3 pb-4">
      <img src="{{ asset('images/dashboard-logo.webp') }}" class="logo">
   </div>
   <ul class="nav nav-pills flex-column mt-3" id="sidebarMenu">
      {{-- Dashboard --}}
      <li class="nav-item rounded-2 m-2">
         <a href="{{ route('dashboard') }}" class="nav-link {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
         <img src="{{ asset('images/dashboard-icons/dashboard.webp') }}">
         Dashboard
         </a>
      </li>
      {{-- Bookings --}}
      <li class="nav-item rounded-2 m-2">
         <a href="{{route('booking-requests')}}" class="nav-link {{ Request::is(patterns: 'admin/booking-requests') ? 'active' : '' }}">
         <img src="{{ asset('images/dashboard-icons/booking.webp') }}">
         Bookings
         </a>
      </li>
      {{-- Doctors (with submenu) --}}
      @php
      // Check if current route matches any of the doctor's submenu routes
      $doctorRoutes = ['doctors-list', 'doctors-add','doctors-view','doctors-edit','doctors-list-media','doctors-mediaList','doctors-addMedia'];
      $doctorMenuOpen = in_array(Route::currentRouteName(), $doctorRoutes);
      @endphp
      @if(\App\Helpers\Permissions::hasPermission('read_doctor'))
      <li class="nav-item rounded-0 m-2">
         <a class="nav-link d-flex justify-content-between align-items-center rounded-0 {{ Request::is('admin/doctors/list*','admin/doctors/media*')  ? 'active' : '' }}"
            data-bs-toggle="collapse"
            href="#doctorsMenu"
            role="button"
            aria-expanded="{{ $doctorMenuOpen ? 'true' : 'false' }}"
            aria-controls="doctorsMenu">
         <span>
         <img src="{{ asset('images/dashboard-icons/doctor.webp') }}">
         Doctors
         </span>
         <i class="fa fa-rr-angle-small-down"></i>
         </a>
         <ul class="nav w-100 d-flex-inline collapse ps-4 rounded-top-0 rounded-bottom-2 bg-white {{ $doctorMenuOpen ? 'show' : '' }}" id="doctorsMenu">
            <li class="nav-item">
               <a href="{{ route('doctors-list') }}" class="nav-link {{Request::is('admin/doctors/list*') ? 'active' : ''}}">
               Doctors List
               </a>
            </li>
            @if(\App\Helpers\Permissions::hasPermission('create_doctor'))
            <li class="nav-item">
               <a href="{{ route('doctors-list-media') }}" class="nav-link {{Request::is('admin/doctors/media*') ? 'active' : ''}}">
               Doctors Media
               </a>
            </li>
            @endif
         </ul>
      </li>
      @endif
      {{-- Services --}}
       @php
      // Check if current route matches any of the doctor's submenu routes
      $serviceRoutes = ['booking-services', 'createOrUpdateService','service-list','view-service','edit-service','service-add'];
      $serviceMenuOpen = in_array(Route::currentRouteName(), $serviceRoutes);
      @endphp
      @if(\App\Helpers\Permissions::hasPermission('read_service') || \App\Helpers\Permissions::hasPermission('read_booking_service'))
      <li class="nav-item rounded-0 m-2">
         <a class="nav-link d-flex justify-content-between align-items-center rounded-0 {{ Request::is('admin/services/list*','admin/services/booking-services') ? 'active' : '' }}"
            data-bs-toggle="collapse"
            href="#servicesMenu"
            role="button"
            aria-expanded="{{ $serviceMenuOpen ? 'true' : 'false' }}"
            aria-controls="servicesMenu">
         <span>
         <img src="{{ asset('images/dashboard-icons/services.webp') }}">
         Service
         </span>
         <i class="fa fa-rr-angle-small-down"></i>
         </a>
         <ul class="nav w-100 d-flex-inline collapse ps-4 rounded-top-0 rounded-bottom-2 bg-white {{ $serviceMenuOpen ? 'show' : '' }}" id="servicesMenu">
            @if(\App\Helpers\Permissions::hasPermission('read_service'))
            <li class="nav-item">
               <a href="{{ route('service-list') }}" class="nav-link {{Request::is('admin/services/list*') ? 'active' : ''}}">
                    service List
               </a>
            </li>
            @endif
            @if(\App\Helpers\Permissions::hasPermission('read_booking_service'))
            <li class="nav-item">
               <a href="{{ route('booking-services') }}" class="nav-link {{Request::is('admin/services/booking-services*') ? 'active' : ''}}">
               Booking services
               </a>
            </li>
            @endif

         </ul>
      </li>
      @endif
      {{-- <li class="nav-item rounded-2 m-2">
         <a href="#" class="nav-link {{ Request::is(patterns: 'admin/services*') ? 'active' : '' }}">
         <img src="{{ asset('images/dashboard-icons/services.webp') }}">
         Services
         </a>
      </li> --}}
      {{-- Roles --}}
      @if(\App\Helpers\Permissions::hasPermission('read_permission') || \App\Helpers\Permissions::hasPermission('read_role'))

      <li class="nav-item rounded-2 m-2">
         <a href="{{ route('roles-list') }}" class="nav-link {{ Request::is(patterns: 'admin/role*') ? 'active' : '' }}">
         <img src="{{ asset('images/dashboard-icons/user-management.webp') }}">
         Roles
         </a>
      </li>
      @endif
      @if(\App\Helpers\Permissions::hasPermission('read_admin') )

      {{-- Admins --}}
      <li class="nav-item rounded-2 m-2">
         <a href="{{route('admin-list')}}" class="nav-link  {{ Request::is('admin/admin-*') ? 'active' : '' }}">
         <img src="{{ asset('images/dashboard-icons/admin.webp') }}">
         Admins
         </a>
      </li>
      @endif
      @if(\App\Helpers\Permissions::hasPermission('read_settings') )


      {{-- Settings --}}
      <li class="nav-item rounded-2 m-2">
         <a href="{{route('setting')}}" class="nav-link {{ Request::is(patterns: 'admin/setting*') ? 'active' : '' }}">
         <img src="{{ asset('images/dashboard-icons/setting.webp') }}">
         Settings
         </a>
      </li>
      @endif
    @if(\App\Helpers\Permissions::hasPermission('view_page') )


      {{-- developer tools --}}
      <li class="nav-item rounded-2 m-2">
         <a href="{{route('developer')}}" class="nav-link {{ Request::is(patterns: 'admin/developer*') ? 'active' : '' }}">
         <img src="{{ asset('images/dashboard-icons/admin.webp') }}">
         Developer tools
         </a>
      </li>
      @endif
   </ul>
</aside>
<script>
document.addEventListener('click', function(event) {
    // List of all collapse menus in sidebar
    const collapses = document.querySelectorAll('#sidebar .collapse.show');

    collapses.forEach(function(collapseEl) {
        // Check if the clicked element is NOT inside this collapse or its toggle button
        const toggleBtn = document.querySelector(`[data-bs-target="#${collapseEl.id}"]`);
        if (!collapseEl.contains(event.target) && !toggleBtn.contains(event.target)) {
            // Hide collapse using Bootstrap API
            const bsCollapse = bootstrap.Collapse.getInstance(collapseEl);
            if(bsCollapse) bsCollapse.hide();
        }
    });
});
</script>
