@extends('layouts.website')
@section('title', __('words.thank you title') . ' - Alforsan Hospital')
@section('content')
<section class="thank-you py-5 mt-5 bg-light-blue">
   <div class="container mt-4">
      <div class="row py-3 thanks-container">
         <div class="text-center">
            <i class="fa-solid fa-circle-check"></i>
            <h1 class="lh-lg">{{ __('words.thank you title') }}</h1>
            <h2 class="lh-lg">{{ __('words.thank you subtitle') }}</h2>
            <h3 class="lh-lg">{{ __('words.booking data') }}</h3>
            <div class="d-grid place-items-center">

            <div class="col-md-6">
               <div class="card p-3">
                  <p class="text-dark lh-lg"><strong>{{ __('words.name label') }}: </strong> {{ $response['patient_name'] }}</p>
                  <p class="text-dark lh-lg"><strong>{{ __('words.mobile label') }}: </strong> {{ $response['patient_phone'] }}</p>
                  @if($response['patient_email'])
                  <p class="text-dark lh-lg"><strong>{{ __('words.email label') }}: </strong> {{ $response['patient_email'] }}</p>
                  @endif
                  <p class="text-dark lh-lg"><strong>{{ __('words.service label') }}: </strong> {{ $response['service_name_' . app()->getLocale()] }}</p>
                  @if($response['patient_notes'])
                  <p class="text-dark lh-lg"><strong>{{ __('words.message label') }}: </strong> {{ $response['patient_notes'] }}</p>
                  @endif
               </div>
            </div>
            </div>

         </div>
      </div>
   </div>
</section>
@endsection
