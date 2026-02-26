@extends('layouts.website')

@section('title', 'About Us - Alforsan Hospital')
@php
$local=app()->getLocale();
@endphp
@section('content')
<section class="services py-5 mt-5 bg-light-blue">
   <div class="container mt-4">
      <div class="text-center">
         <h1>{{ __('words.about_us title') }}</h1>
      </div>
      <div class="row py-3 vm-container">
        <div class="col-lg-6 col-md-12  mb-3">
            <div class="h-100 card px-4 py-3">
                <img src="{{ asset('images/vision@2x.webp') }}">
                <h2>{{ __('words.our vision') }}</h2>
                <p class="text-center">{{ $about->{'vision_'.$local} }}</p>
            </div>
        </div>
        <div class="col-lg-6 col-md-12  mb-3">
            <div class="h-100 card px-4 py-3">
                <img src="{{ asset('images/mission@2x.webp') }}">
                <h2>{{ __('words.our mission') }}</h2>
                <p class="text-center">{{ $about->{'mission_'.$local} }}</p>
            </div>
        </div>
      </div>
</div>
</section>
<section class="our-story bg-white mb-5 py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h2>{{{__('words.our story')}}}</h2>
                <p>{{ $about->{'our_story_'.$local} }}</p>
                <div class="row">
                    <div class="col-4 mb-3">
                        <div class="card h-100 p-3 bg-light-blue">
                            <h2>{{ $about->experience_years }}</h2>
                            <p>{{ __('words.experience') }}</p>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="card h-100 p-3 bg-light-blue">
                            <h2>{{ $about->recovery_count }}</h2>
                            <p>{{ __('words.Happy patient') }}</p>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="card h-100 p-3 bg-light-blue">
                            <h2>{{ $about->doctors_count }}</h2>
                            <p>{{ __('words.Expert doctors') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="rounded">
                    <img class="w-100" src="{{ asset('images/about us.webp') }}">
                </div>
            </div>
        </div>
    </div>

</section>
<section class="bg-light-blue our-values py-5">
    <div class="container">
        <div class="text-center mb-4">
            <h2>{{ __('words.our values') }}</h2>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                <div class="card h-100 p-3 text-center">
                    <img src="{{ asset('images/values_icons/excellence.webp') }}" >
                    <h4>{{ $about->{'value1_title_'.$local} }}</h4>
                    <p>{{ $about->{'value1_desc_'.$local} }}</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                <div class="card h-100 p-3 text-center">
                    <img src="{{ asset('images/values_icons/safety.webp') }}" >
                    <h4>{{ $about->{'value2_title_'.$local} }}</h4>
                    <p>{{ $about->{'value2_desc_'.$local} }}</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                <div class="card h-100 p-3 text-center">
                    <img src="{{ asset('images/values_icons/professionalism.webp') }}" >
                    <h4>{{ $about->{'value3_title_'.$local} }}</h4>
                    <p>{{ $about->{'value3_desc_'.$local} }}</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                <div class="card h-100 p-3 text-center">
                    <img src="{{ asset('images/values_icons/humanity.webp') }}" >
                    <h4>{{ $about->{'value4_title_'.$local} }}</h4>
                    <p>{{ $about->{'value4_desc_'.$local} }}</p>
                </div>
            </div>
             <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                <div class="card h-100 p-3 text-center">
                    <img src="{{ asset('images/values_icons/improvement.webp') }}" >
                   <h4>{{ $about->{'value5_title_'.$local} }}</h4>
                    <p>{{ $about->{'value5_desc_'.$local} }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
