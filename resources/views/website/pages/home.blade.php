@extends('layouts.website')
@section('title', 'Home')
@section('content')
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
            <a href="{{ url('/services') }}" class="btn btn-primary-custom btn-lg">
            {{ __('words.Book Your Appointment') }}
            </a>
         </div>
      </div>
   </div>
</section>
<section class="counters py-5">
   <div class="container">
      <div class="row">
         <div class="col-md-3">
            <div class="text-center card p-2 rounded-2">
               <img src="{{ asset('images/counters/doctor@2x.webp') }}"/>
               <h2>+1000</h2>
               <span>{{ __('words.Expert doctors') }}</span>
            </div>
         </div>
         <div class="col-md-3">
            <div class="text-center card p-2 rounded-2">
               <img src="{{ asset('images/counters/eye@2x.webp') }}"/>
               <h2>+1000</h2>
               <span>{{ __('words.Successful surgery') }}</span>
            </div>
         </div>
         <div class="col-md-3">
            <div class="text-center card p-2 rounded-2">
               <img src="{{ asset('images/counters/user@2x.webp') }}"/>
               <h2>+1000</h2>
               <span>{{ __('words.Happy patient') }}</span>
            </div>
         </div>
         <div class="col-md-3">
            <div class="text-center card p-2 rounded-2">
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
      <div class="row">
         @foreach($services as $service)
         <div class="col-md-2">
            <div class="card p-3 text-center">
               <img src="{{ asset('images/services_icons/'.$service->icon) }}">
               <h3>{{$service->name_ar}} </h3>
            </div>
         </div>
         @endforeach
      </div>
      <div class="text-center py-3">
         <a class="btn btn-primary-custom btn-lg text-white">{{ __('words.View All Services') }}</a>
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
            <div class="card bg-light-blue">
               <img src="{{ asset('images/why_choose_us/doctor@2x.webp') }}">
               <h3 class="why_us_feature">{{ __('words.why_us_feature1') }}</h3>
               <p class="why_us_feature_description">{{ __('words.why_us_feature1 desc') }}</p>
            </div>
         </div>
         <div class="col-md-3">
            <div class="card bg-light-blue">
               <img src="{{ asset('images/why_choose_us/technology@2x.webp') }}">
               <h3 class="why_us_feature">{{ __('words.why_us_feature2') }}</h3>
               <p class="why_us_feature_description">{{ __('words.why_us_feature2 desc') }}</p>
            </div>
         </div>
         <div class="col-md-3">
            <div class="card bg-light-blue">
               <img src="{{ asset('images/why_choose_us/icon@2x.webp') }}">
               <h3 class="why_us_feature">{{ __('words.why_us_feature3') }}</h3>
               <p class="why_us_feature_description">{{ __('words.why_us_feature3 desc') }}</p>
            </div>
         </div>
         <div class="col-md-3">
            <div class="card bg-light-blue">
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
      <div class="row">
         @foreach($doctors as $doctor)
         <div class="col-md-3">
            <div class="card text-center">
               <img src="{{ asset('images/doctor_photos/' . ($doctor->image ? $doctor->image : 'alternative.jpg')) }}">
               <div class="p-3 doctor-data">
                  <h3 class="doctor_name">{{ $doctor->name_ar }}</h3>
                  <p class="about-doctor">{{ $doctor->academic_title_ar .' '. $doctor->main_speciality_ar }}</p>
               </div>
            </div>
         </div>
         @endforeach
      </div>
      <div class="text-center py-3">
         <a class="btn btn-primary-custom btn-lg text-white">{{ __('words.Meet All Doctors') }}</a>
      </div>
   </div>
</section>
<section class="Testimonials py-5">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <h1>{{ __('words.Testimonials title') }}</h1>
                <p>{{ __('words.Testimonials subtitle') }}</p>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-center p-2">
                        <div class="d-flex stars">
                            @for($i=50; $i<55; $i++)
                            <i class="fa fa-star"></i>
                            @endfor
                        </div>
                        <div class="patient_review py-3">
                            <p>تجربتي في مركز الفرسان كانت أكثر من رائعة. منتهى الاحترافية والاهتمام بالتفاصيل من الجميع. استعدت نظري بالكامل بفضل الله ثم خبرة الأطباء المتميزين</p>
                            <span class="d-block">محمد عبدالله</span>
                            <span>عملية تصحيح إبصار</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center p-2">
                        <div class="d-flex stars">
                            @for($i=50; $i<55; $i++)
                            <i class="fa fa-star"></i>
                            @endfor
                        </div>
                        <div class="patient_review py-3">
                            <p>تجربتي في مركز الفرسان كانت أكثر من رائعة. منتهى الاحترافية والاهتمام بالتفاصيل من الجميع. استعدت نظري بالكامل بفضل الله ثم خبرة الأطباء المتميزين</p>
                            <span class="d-block">محمد عبدالله</span>
                            <span>عملية تصحيح إبصار</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center p-2">
                        <div class="d-flex stars">
                            @for($i=50; $i<55; $i++)
                            <i class="fa fa-star"></i>
                            @endfor
                        </div>
                        <div class="patient_review py-3">
                            <p>تجربتي في مركز الفرسان كانت أكثر من رائعة. منتهى الاحترافية والاهتمام بالتفاصيل من الجميع. استعدت نظري بالكامل بفضل الله ثم خبرة الأطباء المتميزين</p>
                            <span class="d-block">محمد عبدالله</span>
                            <span>عملية تصحيح إبصار</span>
                        </div>
                    </div>
                </div>
            </div>
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
            <div class="card p-3">
                <img src="{{ asset('images/contacts/call@2x.webp') }}">
                <h2>{{ __('words.Call us') }}</h2>
                <p>01003333333</p>
                <p>01110000000</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3">
                <img src="{{ asset('images/contacts/hours@2x.webp') }}">
                <h2>{{ __('words.Working hours') }}</h2>
                <p>السبت - الخميس</p>
                <p>10:00 صباحاً - 10:00 مساءً</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3">
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
