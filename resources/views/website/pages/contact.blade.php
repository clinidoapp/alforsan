@extends('layouts.website')
@section('title', 'Contact Us - Alforsan Hospital')
@section('content')
<section class="contact-us py-5 mt-5 bg-light-blue">
   <div class="container mt-4">
      <div class="text-center">
         <h1>{{ __('words.Call us') }}</h1>
         <p>{{ __('words.Contact-p') }}</p>
      </div>
      <div class="row py-3 contact-methods">
         <div class="col-lg-6 col-md-12">
            <div class="d-block">
               <div class="d-flex mb-2 align-items-center">
                  <img src="{{ asset('images/contacts/address@2x.webp') }}">
                  <h2>{{ __('words.address') }}</h2>
               </div>
               <p>أسيوط شارع النميس امام كنيسة الملاك</p>
            </div>
            <div class="d-block">
               <div class="d-flex mb-2 align-items-center">
                  <img src="{{ asset('images/contacts/call@2x.webp') }}">
                  <h2>{{ __('words.contact') }}</h2>
               </div>
               <p>+201006067878</p>
            </div>
            <div class="d-block">
               <div class="d-flex mb-2 align-items-center">
                  <img src="{{ asset('images/contacts/email@2x.webp') }}">
                  <h2>{{__('words.email')}}</h2>
               </div>
               <p>info@alforsan.com</p>
            </div>
            <div class="d-block">
               <div class="d-flex mb-2 align-items-center">
                  <img src="{{ asset('images/contacts/hours@2x.webp') }}">
                  <h2>{{ __('words.Working hours') }}</h2>
               </div>
               <p>السبت - الخميس 10:00 صباحاً - 10:00 مساءً</p>
            </div>
         </div>
         <div class="col-lg-6 col-md-12">
            <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3248.7242808058854!2d31.184219274956853!3d27.184461848360385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14450bf198106335%3A0xe412f653c9c163bd!2z2YXYsdmD2LIg2KfZhNmB2LHYs9in2YYg2YTZhNi52YrZiNmG!5e1!3m2!1sen!2seg!4v1767190340794!5m2!1sen!2seg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
         </div>
      </div>
   </div>
</section>
<section class="booking bg-light-blue mb-5">
   <div class="container pb-5">
      <div class="row justify-content-center">
         <div class="text-center">
            <h2>{{ __('words.Book Your Appointment') }}</h2>
         </div>
         <div class="col-md-8 col-lg-9 mt-3">
            <div class="card shadow-sm border-0">
               <div class="card-body">
                  <form>
                     @csrf
                     <!-- Name -->
                     <div class="mb-3">
                        <label class="form-label">{{__('words.name label')}}</label>
                        <input type="text" class="form-control" placeholder="{{__('words.name placeholder')}}">
                     </div>
                     <!-- Mobile -->
                     <div class="mb-3">
                        <label class="form-label">{{__('words.mobile label')}}</label>
                        <input type="tel" class="form-control" placeholder="{{__('words.mobile placeholder')}}">
                     </div>
                     <!-- Email -->
                     <div class="mb-3">
                        <label class="form-label">{{__('words.email label')}}</label>
                        <input type="email" class="form-control" placeholder="{{__('words.email placeholder')}}">
                     </div>
                     <!-- Service Dropdown -->
                     <div class="mb-3">
                        <label class="form-label">{{__('words.service label')}}</label>
                        <select class="form-select">
                           <option selected disabled>Select service</option>
                           <option>LASIK</option>
                           <option>Cataract Surgery</option>
                           <option>Eye Checkup</option>
                        </select>
                     </div>
                     <!-- Message -->
                     <div class="mb-3">
                        <label class="form-label">{{__('words.message label')}}</label>
                        <textarea class="form-control" rows="4" placeholder="{{__('words.message placeholder')}}"></textarea>
                     </div>
                     <!-- Submit Button -->
                     <div class="text-center">
                        <button type="submit" class="btn btn-primary-custom px-5">
                        {{__('words.send')}}
                        </button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
