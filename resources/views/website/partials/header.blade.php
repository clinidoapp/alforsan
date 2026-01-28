@php
    $currentLocale = app()->getLocale();
@endphp
<!-- Top Navbar: Contacts & Social -->
<nav class="navbar navbar-expand-lg navbar-dark py-1 small-navbar fixed-top">
   <div class="container">
      <div class="d-flex justify-content-between w-100">
          <div class="social-links">
             <a href="{{env('facebook_url')}}" class="mx-2"><i class="fa-brands fa-facebook-f"></i></a>
             <a href="{{env('twitter_url')}}" class="mx-2"><i class="fa-brands fa-twitter"></i></a>
             <a href="{{env('instagram_url')}}" class="mx-2"><i class="fa-brands fa-instagram"></i></a>
          </div>
         <div class="contact-info">
            <span class="m-0 m-md-3"><i class="px-2 fa-solid fa-phone-volume"></i> {{ env('site_phone_1') }}</span>
            <span class="m-0 m-md-3"><i class="px-2 fa-solid fa-envelope"></i>{{env('site_email')}}</span>
         </div>
      </div>
   </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-light main-navbar fixed-top">
   <div class="d-block d-lg-flex nav_custome w-100">
      <!-- Logo -->
      <div class="dm-flex">
         <a class="navbar-brand" href="{{ url('/') }}">
         <img src="{{ asset('images/logo@3x.webp') }}" alt="Logo" height="50">
         </a>
         <!-- Toggle button for mobile -->
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
      </div>
      <!-- Navbar links -->
      <div class="collapse navbar-collapse" id="mainNavbar">
         <ul class="navbar-nav mx-auto mb-2 mb-lg-0 py-2">
            <li class="nav-item">
               <a href="{{ url('/') }}" class="nav-link  {{ request()->is('/') ? 'active' : '' }}">
               {{ __('words.home') }}
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link  {{ request()->is('services*') ? 'active' : '' }}"
                  href="{{ url('/services') }}">
               {{ __('words.services') }}
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link  {{ request()->is('doctors*') ? 'active' : '' }}"
                  href="{{ url('/doctors') }}">
               {{ __('words.doctors') }}
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link  {{ request()->is('about*') ? 'active' : '' }}"
                  href="{{ url('/about') }}">
               {{ __('words.about_us') }}
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link  {{ request()->is('contact*') ? 'active' : '' }}"
                  href="{{ url('/contact') }}">
               {{ __('words.Call us') }}
               </a>
            </li>
         </ul>
         <ul class="navbar-nav ms-auto d-none d-md-block">
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle " href="#" id="langDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               <i class="fa-solid fa-globe text-white"></i>
               {{ strtoupper(session('locale', app()->getLocale())) }}
               </a>
               <ul class="dropdown-menu" aria-labelledby="langDropdown">
                  <li>
                     <form id="lang-en-form" action="{{ route('change.language') }}" method="POST">
                        @csrf
                        <input type="hidden" name="lang" value="en">
                        <button type="submit" class="dropdown-item">English</button>
                     </form>
                  </li>
                  <li>
                     <form id="lang-ar-form" action="{{ route('change.language') }}" method="POST">
                        @csrf
                        <input type="hidden" name="lang" value="ar">
                        <button type="submit" class="dropdown-item">العربية</button>
                     </form>
                  </li>
               </ul>
            </li>
         </ul>
         <div class="d-md-none">
            <div class="row px-5 text-dark">
                <div class="col-12 p-0">
                <i class="fa-solid fa-globe text-dark px-2"></i>{{ __('words.language') }}
            </div>
            </div>
        <div class="row text-center p-2">

            <div class="col-6">
                <a href="#" class="px-4 btn btn-outline-primary w-100 {{ $currentLocale === 'en' ? 'selected' : '' }}"
                onclick="event.preventDefault(); document.getElementById('lang-en-form').submit();">
                    English
                </a>
            </div>
            <div class="col-6">
                <a href="#" class="px-4 btn btn-outline-primary w-100 {{ $currentLocale === 'ar' ? 'selected' : '' }}"
                onclick="event.preventDefault(); document.getElementById('lang-ar-form').submit();">
                    العربية
                </a>
            </div>
         </div>
        </div>

      </div>
   </div>
</nav>
