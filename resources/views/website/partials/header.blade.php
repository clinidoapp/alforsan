
<!-- Top Navbar: Contacts & Social -->
<nav class="navbar navbar-expand-lg navbar-dark py-1 small-navbar fixed-top">
    <div class="container">
        <div class="d-flex justify-content-between w-100">
            <div class="contact-info">
                <span class="me-3"><i class="bi bi-telephone"></i> +20 123 456 789</span>
                <span><i class="bi bi-envelope"></i> info@example.com</span>
            </div>
            <div class="social-links">
                <a href="#" class="me-2"><i class="bi bi-facebook"></i></a>
                <a href="#" class=" -2"><i class="bi bi-twitter"></i></a>
                <a href="#" class=""><i class="bi bi-instagram"></i></a>
            </div>
        </div>
    </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-light main-navbar fixed-top">
    <div class="d-flex justify-content-between">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/logo@3x.webp') }}" alt="Logo" height="50">
        </a>

        <!-- Toggle button for mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="mainNavbar">
           <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link text-white" href="{{ url('/') }}">{{ __('words.home') }}</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ url('/services') }}">{{ __('words.services') }}</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ url('/about') }}">{{ __('words.about_us') }}</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ url('/contact') }}">{{ __('words.contact') }}</a></li>
            </ul>

            <ul class="navbar-nav ms-auto text-white">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="langDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-globe"></i>
                        {{ strtoupper(session('locale', app()->getLocale())) }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="langDropdown">
                        <li>
                            <form action="{{ route('change.language') }}" method="POST">
                                @csrf
                                <input type="hidden" name="lang" value="en">
                                <button type="submit" class="dropdown-item">English</button>
                            </form>
                        </li>
                        <li>
                            <form action="{{ route('change.language') }}" method="POST">
                                @csrf
                                <input type="hidden" name="lang" value="ar">
                                <button type="submit" class="dropdown-item">العربية</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
