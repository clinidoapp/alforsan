<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


    @stack('styles')
</head>
<body>

<div class="d-flex">
    <!-- Sidebar -->
    <aside id="sidebar" class="sidebar">
        <h5 class="text-white text-center py-3 border-bottom">Admin Panel</h5>

        <a href="{{ route('dashboard') }}" class="active">Dashboard</a>
        <a href="#">Users</a>
        <a href="#">Reports</a>
        <a href="#">Settings</a>

        {{-- <form method="POST" action="{{ route('logout') }}" class="mt-auto px-3">
            @csrf
            <button class="btn btn-outline-danger w-100 mt-3">Logout</button>
        </form> --}}
    </aside>

    <!-- Main Content -->
    <div class="flex-grow-1">
        @include('dashboard.partials.header')

        <main class="p-4">
            @yield('content')
        </main>

        @include('dashboard.partials.footer')
    </div>
</div>

<script>
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('show');
    }
</script>

@stack('scripts')
</body>
</html>
