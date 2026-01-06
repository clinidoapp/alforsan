@extends('layouts.website')
@section('title', 'Home - Alforsan Hospital')
@section('content')
@php
    $local=app()->getLocale();
@endphp
<section class="home-header">
   <div class="overlay"></div>
   <div class="container h-100">
      <div class="row h-100 align-items-center text-center">
         <div class=" text-white">
            <h1 class="mb-3">
               {{ __('words.home_title') }}
            </h1>
            <p class="mb-4">
               {{ __('words.home_subtitle') }}
            </p>
            <a href="{{ url('/contact') }}" class="btn btn-primary-custom btn-lg">
            {{ __('words.Book Your Appointment') }}
            </a>
         </div>
      </div>
   </div>
</section>
<section class="counters py-5">
   <div class="container">
      <div class="row">
         <div class="col-lg-3 col-6">
            <div class="text-center card mb-2 p-2 rounded-2">
               <img src="{{ asset('images/counters/doctor@2x.webp') }}"/>
               <h2>+1000</h2>
               <span>{{ __('words.Expert doctors') }}</span>
            </div>
         </div>
         <div class="col-lg-3 col-6">
            <div class="text-center card mb-2 p-2 rounded-2">
               <img src="{{ asset('images/counters/eye@2x.webp') }}"/>
               <h2>+1000</h2>
               <span>{{ __('words.Successful surgery') }}</span>
            </div>
         </div>
         <div class="col-lg-3 col-6">
            <div class="text-center card mb-2 p-2 rounded-2">
               <img src="{{ asset('images/counters/user@2x.webp') }}"/>
               <h2>+1000</h2>
               <span>{{ __('words.Happy patient') }}</span>
            </div>
         </div>
         <div class="col-lg-3 col-6">
            <div class="text-center card mb-2 p-2 rounded-2">
               <img src="{{ asset('images/counters/call@2x.webp') }}"/>
               <h2>24/7</h2>
               <span>{{ __('words.Continuous support') }}</span>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="services pt-5 bg-light-blue">
   <div class="container">
      <div class="text-center">
         <h1>{{ __('words.services_title') }}</h1>
         <p>{{ __('words.services_subtitle') }}</p>
      </div>
      <div class="row services-row">
         @foreach($services as $service)
         <div class="col-md-2 col-6">
            <a href="{{ route('serviceDetails', $service->slug) }}" class="text-decoration-none">
            <div class="card mb-2 p-3 text-center">
               <img src="{{ asset('images/services_icons/'.$service->icon) }}">
               <h3>{{ $service->{'name_'.$local} }} </h3>
            </div>
            </a>
         </div>
         @endforeach
      </div>
      <div class="text-center py-3">
         <a href="{{ url('/services') }}" class="btn btn-primary-custom btn-lg text-white">{{ __('words.View All Services') }}</a>
      </div>
   </div>
</section>
<section class="why_choose_us py-5">
   <div class="container">
      <div class="row text-center">
         <div class="col-md-12">
            <h1>{{ __('words.why_choose_us title') }}</h1>
            <p>{{ __('words.why_choose_us subtitle') }}</p>
         </div>
      </div>
      <div class="row">
         <div class="col-md-3">
            <div class="card mb-2 bg-light-blue">
               <img src="{{ asset('images/why_choose_us/doctor@2x.webp') }}">
               <h3 class="why_us_feature">{{ __('words.why_us_feature1') }}</h3>
               <p class="why_us_feature_description">{{ __('words.why_us_feature1 desc') }}</p>
            </div>
         </div>
         <div class="col-md-3">
            <div class="card mb-2 bg-light-blue">
               <img src="{{ asset('images/why_choose_us/technology@2x.webp') }}">
               <h3 class="why_us_feature">{{ __('words.why_us_feature2') }}</h3>
               <p class="why_us_feature_description">{{ __('words.why_us_feature2 desc') }}</p>
            </div>
         </div>
         <div class="col-md-3">
            <div class="card mb-2 bg-light-blue">
               <img src="{{ asset('images/why_choose_us/icon@2x.webp') }}">
               <h3 class="why_us_feature">{{ __('words.why_us_feature3') }}</h3>
               <p class="why_us_feature_description">{{ __('words.why_us_feature3 desc') }}</p>
            </div>
         </div>
         <div class="col-md-3">
            <div class="card mb-2 bg-light-blue">
               <img src="{{ asset('images/why_choose_us/services@2x.webp') }}">
               <h3 class="why_us_feature">{{ __('words.why_us_feature4') }}</h3>
               <p class="why_us_feature_description">{{ __('words.why_us_feature4 desc') }}</p>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="ourTeam bg-light-blue pt-5">
   <div class="container">
   <div class="container">
      <div class="row text-center">
         <div class="col-md-12">
            <h1>{{ __('words.ourteam title') }}</h1>
            <p>{{ __('words.ourteam subtitle') }}</p>
         </div>
      </div>
      <div class="row doctors_row">
         @foreach($doctors as $doctor)
         <div class="col-md-3">
            <a href="{{ route('doctorDetails', $doctor->id) }}" class="text-decoration-none">
            <div class="card mb-2 text-center">
               <img src="{{ asset('images/doctor_photos/' . ($doctor->image ? $doctor->image : 'alternative.jpg')) }}">
               <div class="p-3 doctor-data">
                  <h3 class="doctor_name">{{ $doctor->{'name_'.$local} }}</h3>
                  <p class="about-doctor">{{ $doctor->{'academic_title_'.$local} .' '. $doctor->{'main_speciality_'.$local} }}</p>
               </div>
            </div>
            </a>
         </div>
         @endforeach
      </div>
      <div class="text-center py-3">
         <a href="{{ url('/doctors') }}" class="btn btn-primary-custom btn-lg text-white">{{ __('words.Meet All Doctors') }}</a>
      </div>
   </div>
</section>

<section class="Testimonials py-5">
   <div class="container text-center">
      <h1>{{ __('words.Testimonials title') }}</h1>
      <p>{{ __('words.Testimonials subtitle') }}</p>
      <div id="testimonialsCarouselDesktop" class="carousel slide d-none d-md-block" data-bs-ride="carousel" data-bs-interval="4000">
         <div class="carousel-inner">
            @foreach($reviews->chunk(3) as $chunkIndex => $reviewChunk)
            <div class="carousel-item p-3 {{ $chunkIndex === 0 ? 'active' : '' }}">
               <div class="row justify-content-center">
                  @foreach($reviewChunk as $review)
                  <div class="col-md-4">
                     <div class="card text-center p-3 h-100 mx-2">
                        <div class="d-flex justify-content-center stars mb-2">
                           @for($i = 0; $i < 5; $i++)
                           <i class="fa fa-star px-1"></i>
                           @endfor
                        </div>
                        <div class="patient_review">
                           <p>{{ $review->comment }}</p>
                           <span class="d-block fw-bold">{{ $review->name }}</span>
                           <span class="text-muted">{{ $review->{'service_name_'.$local} }}</span>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
            @endforeach
         </div>
         <button class="carousel-control-prev" type="button" data-bs-target="#testimonialsCarouselDesktop" data-bs-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Previous</span>
         </button>
         <button class="carousel-control-next" type="button" data-bs-target="#testimonialsCarouselDesktop" data-bs-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Next</span>
         </button>
      </div>
      <div id="testimonialsCarouselMobile" class="carousel slide d-md-none" data-bs-ride="carousel" data-bs-interval="4000">
         <div class="carousel-inner">
            @foreach($reviews as $index => $review)
            <div class="carousel-item p-3 {{ $index === 0 ? 'active' : '' }}">
               <div class="card text-center p-3 px-1">
                  <div class="d-flex justify-content-center stars mb-2">
                     @for($i = 0; $i < 5; $i++)
                     <i class="fa fa-star px-2"></i>
                     @endfor
                  </div>
                  <div class="patient_review">
                     <p>{{ $review->comment }}</p>
                     <span class="d-block fw-bold">{{ $review->name }}</span>
                     <span class="text-muted">{{ $review->{'service_name_'.$local} }}</span>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
         <button class="carousel-control-prev" type="button" data-bs-target="#testimonialsCarouselMobile" data-bs-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Previous</span>
         </button>
         <button class="carousel-control-next" type="button" data-bs-target="#testimonialsCarouselMobile" data-bs-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Next</span>
         </button>
      </div>
   </div>
</section>
<section class="contactUs py-5 bg-light-blue">
   <div class="container">
      <div class="row text-center">
         <div class="col-md-12">
            <h1>{{ __('words.contactUs title') }}</h1>
            <p>{{ __('words.contactUs subtitle') }}</p>
         </div>
      </div>
      <div class="row">
         <div class="col-md-4">
            <div class="card mb-2 p-3">
               <img src="{{ asset('images/contacts/call@2x.webp') }}">
               <h2>{{ __('words.contact') }}</h2>
               <p>01003333333</p>
               <p>01110000000</p>
            </div>
         </div>
         <div class="col-md-4">
            <div class="card mb-2 p-3">
               <img src="{{ asset('images/contacts/hours@2x.webp') }}">
               <h2>{{ __('words.Working hours') }}</h2>
               <p>السبت - الخميس</p>
               <p>10:00 صباحاً - 10:00 مساءً</p>
            </div>
         </div>
         <div class="col-md-4">
            <div class="card mb-2 p-3">
               <img src="{{ asset('images/contacts/address@2x.webp') }}">
               <h2>{{ __('words.address') }}</h2>
               <p>أسيوط شارع النميس</p>
               <p>امام كنيسة الملاك</p>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
