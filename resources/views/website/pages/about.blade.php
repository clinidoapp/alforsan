@extends('layouts.website')

@section('title', 'About Us - Alforsan Hospital')

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
                <p class="text-center">{{ __('words.our vision text') }}</p>
            </div>
        </div>
        <div class="col-lg-6 col-md-12  mb-3">
            <div class="h-100 card px-4 py-3">
                <img src="{{ asset('images/mission@2x.webp') }}">
                <h2>{{ __('words.our mission') }}</h2>
                <p class="text-center">{{ __('words.our mission text') }}</p>
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
                <p>{{ __('words.our story text') }}</p>
                <div class="row">
                    <div class="col-4 mb-3">
                        <div class="card h-100 p-3 bg-light-blue">
                            <h2>+13</h2>
                            <p>{{ __('words.experience') }}</p>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="card h-100 p-3 bg-light-blue">
                            <h2>+50K</h2>
                            <p>{{ __('words.Happy patient') }}</p>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="card h-100 p-3 bg-light-blue">
                            <h2>+100</h2>
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
                    <h4>{{ __('words.value 1') }}</h4>
                    <p>{{ __('words.value 1 desc') }}</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                <div class="card h-100 p-3 text-center">
                    <img src="{{ asset('images/values_icons/safety.webp') }}" >
                    <h4>{{ __('words.value 2') }}</h4>
                    <p>{{ __('words.value 2 desc') }}</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                <div class="card h-100 p-3 text-center">
                    <img src="{{ asset('images/values_icons/professionalism.webp') }}" >
                    <h4>{{ __('words.value 3') }}</h4>
                    <p>{{ __('words.value 3 desc') }}</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                <div class="card h-100 p-3 text-center">
                    <img src="{{ asset('images/values_icons/humanity.webp') }}" >
                    <h4>{{ __('words.value 4') }}</h4>
                    <p>{{ __('words.value 4 desc') }}</p>
                </div>
            </div>
             <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                <div class="card h-100 p-3 text-center">
                    <img src="{{ asset('images/values_icons/improvement.webp') }}" >
                    <h4>{{ __('words.value 5') }}</h4>
                    <p>{{ __('words.value 5 desc') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
