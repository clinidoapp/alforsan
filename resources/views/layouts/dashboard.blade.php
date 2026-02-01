<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    <link rel="icon" href="{{ asset('images/logo-icon.svg') }}" type="image/x-icon"/>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link href="{{ asset('css/admin.css?v='.env('App_Version').'') }}" rel="stylesheet">
<link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-multiselect@1.1.2/dist/css/bootstrap-multiselect.css">


      @stack('styles')
    </head>
<body>

    <div class="d-flex">
    <!-- Sidebar -->
    @include('dashboard.partials.sidebar')


    <!-- Main Content -->
    <div class="flex-grow-1">
        @include('dashboard.partials.header')

       <main class="p-4 content-scroll">
            <div class="content-inner">
                @yield('content')
            </div>
        </main>


        @include('dashboard.partials.footer')
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-multiselect@1.1.2/dist/js/bootstrap-multiselect.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    window.DashboardAlert = {
        error(message) {
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: message,
                confirmButtonColor: '#3085d6'
            });
        },

        success(message) {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: message,
                confirmButtonColor: '#3085d6'
            });
        },

        warning(message) {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: message,
                confirmButtonColor: '#3085d6'
            });
        },

        confirm(message, callback) {
            Swal.fire({
                title: 'Are you sure?',
                text: message,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) callback();
            });
        }
    };
</script>

<script>
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('show');
    }
</script>

@stack('scripts')
</body>
</html>
