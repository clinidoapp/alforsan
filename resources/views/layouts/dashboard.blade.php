<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    <link rel="icon" href="{{ asset('images/logo-icon.svg') }}" type="image/x-icon"/>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    @stack('styles')
</head>
<body>

<div class="d-flex">
    <!-- Sidebar -->
        @include('dashboard.partials.sidebar')


    <!-- Main Content -->
    <div class="flex-grow-1">
        @include('dashboard.partials.header')

        <main class="p-4">
            @yield('content')
        </main>

        @include('dashboard.partials.footer')
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('show');
    }
</script>

@stack('scripts')
</body>
</html>
