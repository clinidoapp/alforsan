<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Alforsan Hospital')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ asset('images/logo-icon.svg') }}" type="image/x-icon"/>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"  />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">



    @php
    $isArabic = session('locale', app()->getLocale()) === 'ar';
    @endphp

   @if($isArabic)
   <link href="{{ asset('css/web-ar.css?v='.env('App_Version').'') }}" rel="stylesheet">
   @else
   <link href="{{ asset('css/web-en.css?v='.env('App_Version').'') }}" rel="stylesheet">

   @endif
</head>
<body>

@include('website.partials.header')

<main class="">
    @yield('content')
</main>

@include('website.partials.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
