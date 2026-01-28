@extends('layouts.website')

@section('title', 'Services - Alforsan Hospital')
@php
    $local=app()->getLocale();
@endphp
@section('content')
<section class="services py-5 mt-5 bg-light-blue">
   <div class="container mt-4">
      <div class="text-center">
         <h1>{{ __('words.Services-page-title') }}</h1>
         <p>{{ __('words.Services-page-subtitle') }}</p>
      </div>
      <div class="row">
         @foreach($services as $service)
         <div class="col-md-2 col-6">
            <a href="{{ route('serviceDetails', $service->slug) }}" class="text-decoration-none">
            <div class="card mb-3 p-3 text-center">
               <img src="{{ asset('images/services_icons/'.$service->icon) }}">
               <h3>{{ $service->{'name_'.$local} }} </h3>
            </div>
            </a>
         </div>
         @endforeach
      </div>

   </div>
</section>
@endsection
