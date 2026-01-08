<aside id="sidebar"
       class="sidebar d-flex flex-column">
    <div
        class="text-white text-center py-3 border-bottom">
        <h5 class="mb-0">
            Admin
            Panel</h5>
    </div>

    <ul class="nav nav-pills flex-column mt-3">
        <li class="nav-item rounded-2 m-2">
            <a href="{{ route('dashboard') }}"
               class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                Dashboard
            </a>
        </li>

        @if(\App\Helpers\Permissions::hasPermission('read_doctor'))
            <li class="nav-item rounded-2 m-2">
                <a href="#"
                   class="nav-link">
                    Doctors
                </a>
            </li>
        @endif




        <li class="nav-item rounded-2 m-2">
            <a href="#"
               class="nav-link">
                Settings
            </a>
        </li>
    </ul>

    <div
        class="mt-auto px-3 pb-3">
        <form
            method="POST"
            action="{{ route('logout') }}">
            @csrf
            <button
                class="btn btn-outline-danger w-100">
                Logout
            </button>
        </form>
    </div>
</aside>
