@extends('layouts.website')

@section('title', 'Services - Alforsan Hospital')
@php
    $local=app()->getLocale();
@endphp
@section('content')
<section class="service-details py-5 mt-5 bg-light-blue">
   <div class="container-fluid mt-4 p-0 w-100 overflow-clip">
      <div class="row service-details position-relative overflow-clip m-0 p-0">
        <div class="col-md-4 service-name-card p-0">
            <div class="card px-2 py-3">
               <h1 class="fs-2 lh-lg py-2">{{ $result->{'name_'.$local} }}</h1>
            </div>
        </div>
            <div class="col-md-10 service-image-container">
               <img src="{{ asset('images/service_image/' . ($result->image ? $result->image : 'image.png')) }}" class="img-fluid rounded">
            </div>
        </div>
      </div>
   </div>
</section>
<section class="about-service py-5 bg-light-blue">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-4">
                <h2 class="lh-lg">{{ __('words.about service title') }}</h2>
                <div class="card p-3">
                    <p>{{ $result->{'description_'.$local} }}</p>
                </div>
            </div>
            <div class="col-12 mt-4">
                <h2 class="lh-lg">{{ __('words.service symptoms') }}</h2>
                <div class="d-flex gap-4 justify-space-evenly">
                @foreach ($result->symptoms as $symptom)
                    <div class="card p-3 mb-2">
                        <p>{{ $symptom->{'title_'.$local} }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12 mt-4">
                <h2 class="lh-lg">{{ __('words.service techniques') }}</h2>
                <div class="d-flex gap-4 justify-space-evenly">
                @foreach ($result->techniques as $technique)
                    <div class="card rounded-3">
                        <div class="card-tit bg-primary p-3 text-white rounded-top-3">
                            <p>{{ $technique->{'title_'.$local} }}</p>
                        </div>
                        <div class="card-body p-3">
                            <p>{{ $technique->{'description_'.$local} }}</p>
                            <h4>{{ __('words.suitable for') }}</h4>
                            <p>{{ $technique->{'suitable_for_'. $local} }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12 mt-4">
                <h2 class="lh-lg">{{ __('words.why Alforsan for') }}</h2>
                <div class="card p-3">
                    <p>{{ $result->{'brief_'.$local} }}</p>
                </div>
            </div>
            <div class="col-12 mt-4">
                <h2 class="lh-lg">{{ __('words.service doctors') }}</h2>
                <div class="d-flex gap-4 justify-space-evenly">

                 @foreach($result->doctors as $doctor)
                        <a href="{{ route('doctorDetails', $doctor->id) }}" class="text-decoration-none">
                        <div class="card mb-3 text-center">
                        <img class="w-100 rounded-top" src="{{ asset('images/doctor_photos/' . ($doctor->image ? $doctor->image : 'alternative.jpg')) }}">
                            <div class="p-3 doctor-data fs-6">
                                <h3 class="doctor_name">{{ $doctor->{'name_'.$local} }}</h3>
                                <p class="about-doctor">{{  $doctor->{'main_speciality_'.$local} }}</p>
                            </div>
                        </div>
                        </a>
                    @endforeach
            </div>
            </div>
        </div>
    </div>
</section>
@endsection
