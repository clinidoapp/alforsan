@extends('layouts.website')
@php
$local=app()->getLocale();
@endphp
@section('title', $result->{'name_'.$local} . ' - Alforsan Hospital')
@section('content')
<section class="service-details py-5 mt-5 bg-light-blue">
   <div class="container-fluid mt-4 p-0 w-100 overflow-clip">
      <div class="row service-details position-relative overflow-clip m-0 p-0">
         <div class="col-md-4 service-name-card p-0">
            <div class="card px-2 py-3">
               <h1 class="py-2">{{ $result->{'name_'.$local} }}</h1>
            </div>
         </div>
         <div class="col-md-10 service-image-container">
            <img src="{{ asset('images/service_image/' . ($result->image ? $result->image : 'image.png')) }}" class="img-fluid w-100 rounded">
         </div>
      </div>
   </div>
   </div>
</section>
<section class="about-service pb-5 bg-light-blue">
   <div class="container">
      <div class="row">
         <div class="col-12 mt-4">
            <h2 class="">{{ __('words.about service title') }}</h2>
            <div class="card p-3">
               <p>{{ $result->{'description_'.$local} }}</p>
            </div>
         </div>
         <div class="col-12 mt-4">
            <h2 class="lh-lg">{{ __('words.service symptoms') }}</h2>
            <div class="row g-4">
               @foreach ($result->symptoms as $symptom)
               <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card h-100 symptom-card p-3 mb-2">
                  <h3>{{ $symptom->{'title_'.$local} }}</h3>
                  <p>{{ $symptom->{'description_'.$local} }}</p>
               </div>
            </div>

               @endforeach
            </div>
         </div>
         <div class="col-12 mt-4">
            <h2 class="lh-lg">{{ __('words.service techniques') }}</h2>
            <div class="row g-4">
               @foreach ($result->techniques as $technique)
               <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card h-100 rounded-3 technique-card">
                  <div class="card-tit bg-primary p-3 text-white rounded-top-3">
                     <p class="m-0">{{ $technique->{'title_'.$local} }}</p>
                  </div>
                  <div class="card-body p-3">
                     <p>{{ $technique->{'description_'.$local} }}</p>
                     <h4 class="fs-6">{{ __('words.suitable for') }}</h4>
                     <p>{{ $technique->{'suitable_for_'. $local} }}</p>
                  </div>
               </div>               </div>

               @endforeach
            </div>
         </div>
         <div class="col-12 mt-4">
            <h2 class="lh-lg">{{ __('words.why Alforsan for') }} {{ $result->{'name_'.$local} }}</h2>
            <div class="card p-3">
               <p>{{ $result->{'brief_'.$local} }}</p>
            </div>
         </div>
         <div class="col-12 mt-4">
            <h2 class="lh-lg">{{ __('words.service doctors') }}</h2>
            <div class="row g-4">
               @foreach($result->doctors as $doctor)
               <div class="col-lg-3 col-md-6 col-sm-12">
                  <a href="{{ route('doctorDetails', $doctor->id) }}" class="text-decoration-none">
                     <div class="card h-100 doctor-card mb-3 text-center">
                        <img class="w-100 rounded-top" src="{{ asset('images/doctor_photos/' . ($doctor->image ? $doctor->image : 'alternative.jpg')) }}">
                        <div class="p-3 doctor-data fs-6">
                           <h3 class="doctor_name">{{ $doctor->{'name_'.$local} }}</h3>
                           <p class="about-doctor">{{  $doctor->{'main_speciality_'.$local} }}</p>
                        </div>
                     </div>
                  </a>
               </div>
               @endforeach
               <div class="text-center py-3">
                  <a href="{{ url('/doctors') }}" class="btn btn-primary-custom btn-lg text-white">{{ __('words.Meet All Doctors') }}</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="service-faq pb-5 bg-light-blue">
   <div class="container pb-5">
      <div class="row card p-3 justify-content-center m-auto border-0">
         <div class="text-center">
            <h2 class="text-center mb-4">
               {{ __('words.faq') }}
            </h2>
            <div class="accordion">
               @foreach($result->faqs as $faq)
               <div class="accordion-item my-2">
                  <button class="accordion-header">
                  {{$faq->{'question_'.$local} }}
                  <span class="icon">+</span>
                  </button>
                  <div class="accordion-content">
                     <p>{{$faq->{'answer_'.$local} }}      </p>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </div>
   </div>
</section>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
   $(document).ready(function () {

     $('.accordion-header').on('click', function () {
       const item = $(this).parent();

       $('.accordion-item').not(item)
         .removeClass('active')
         .find('.accordion-content')
         .slideUp();

       item.toggleClass('active');
       item.find('.accordion-content').slideToggle();
     });

   });
</script>
@endsection
