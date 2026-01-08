<nav class="navbar navbar-expand bg-white shadow-sm px-3">
    <button class="btn btn-outline-primary d-md-none" onclick="toggleSidebar()">
        ☰
    </button>

    <span class="navbar-brand ms-2 fw-semibold">
        @yield('page-title', 'Dashboard')
    </span>

    <div class="ms-auto d-flex align-items-center">
        <span class="me-3 text-muted small">
            {{ auth()->user()->name ?? 'Admin' }}
        </span>
        <img src="https://ui-avatars.com/api/?name=Admin"
             class="rounded-circle"
             width="35"
             height="35">
    </div>
</nav>
