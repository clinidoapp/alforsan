<nav class="navbar navbar-expand bg-white shadow-sm px-3">
    <button class="btn btn-outline-primary d-md-none" onclick="toggleSidebar()">
        ☰
    </button>

    <span class="navbar-brand ms-2 fw-semibold">
        @yield('page-title', 'Dashboard')
    </span>

    <div class="ms-auto dropdown">
        <a href="#"
           class="d-flex align-items-center text-decoration-none dropdown-toggle"
           id="userDropdown"
           data-bs-toggle="dropdown"
           aria-expanded="false">

            <span class="me-2 text-muted small">
                {{ auth()->user()->name ?? 'Admin' }}
            </span>

            <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'Admin') }}"
                 class="rounded-circle"
                 width="35"
                 height="35">
        </a>

        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown">
            <li class="dropdown-header text-muted small">
                Signed in as <br>
                <strong>{{ auth()->user()->name ?? 'Admin' }}</strong>
            </li>

            <li><hr class="dropdown-divider"></li>

            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger">
                        <i class="fa fa-sign-out-alt me-2"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
</nav>
