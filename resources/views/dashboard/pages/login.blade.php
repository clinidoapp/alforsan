<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    @media (max-width: 768px) {
        img{
            width: 70%;
        }
    }
</style>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body class="min-vh-100 bg-white" style="align-content: center; justify-items: anchor-center;">
    <img src="{{ asset('images/logo@3x.webp') }}" alt="Logo" class="d-block py-2">
    <div class="col-md-6 col-sm-8 p-3">
    <h1 class="mb-4 fw-bold">Login</h1>

<div class="card shadow border-0 mt-4 p-4 rounded-4">
    <div class="card-body p-4">

        {{-- <form method="POST" action="{{ route('login') }}"> --}}
        <form method="POST" action="{{ route('login') }}" id="Loging-form">
            @csrf

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input
                    type="email"
                    name="email"
                    placeholder="Enter your email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}"
                    required
                >
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input
                    type="password"
                    name="password"
                    placeholder="Enter password"
                    class="form-control @error('password') is-invalid @enderror"
                    required
                >
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="text-center"><button class="btn btn-primary-custom w-50">Login</button></div>
        </form>
    </div>
    </div>
</div>
</body>
</html>
