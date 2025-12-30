@extends('layouts.website')

@section('title', 'About Us - Alforsan Hospital')

@section('content')
<section class="services py-5 mt-5 bg-light-blue">
   <div class="container mt-4">
      <div class="text-center">
         <h1>{{ __('words.about_us title') }}</h1>
      </div>
      <div class="row py-3">
        <div class="col-lg-6 col-md-12">
            <div class="card px-4 py-2 mb-3">
                <img src="{{ asset('images/services_icons/icon.svg') }}">
                <h2>{{ __('words.our vision') }}</h2>
                <p>{{ __('words.our vision text') }}</p>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="card px-4 py-2 mb-3">
                <img src="{{ asset('images/services_icons/icon.svg') }}">
                <h2>{{ __('words.our mission') }}</h2>
                <p>{{ __('words.our mission text') }}</p>
            </div>
        </div>
      </div>
</div>
</section>
@endsection
