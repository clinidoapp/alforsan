@extends('layouts.website')
@section('title', 'Doctors - Alforsan Hospital')
@php
$local=app()->getLocale();
// dd($doctor);
@endphp
@section('content')
<section class="doctor-personal-data  py-5 mt-5 bg-white">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">
                <img src="{{ asset('images/doctor_photos/' . ($doctor->image ? $doctor->image : 'alternative.jpg')) }}" class="w-100 rounded mb-3">
            </div>
            <div class="col-md-9">
                <h1>{{ $local=='ar'?'د. ':'Dr. ' }}{{ $doctor->{'name_'.$local} }}</h1>
                <h2 class="lh-lg">{{ $doctor->{'academic_title_'.$local} }} </h2>
                <p>{{ $doctor->{'main_speciality_'.$local} }}</p>
            </div>
        </div>
    </div>
</section>
<section class="doctor-professional-data bg-light-blue py-5">
    <div class="container">
        <h2 class="lh-lg">{{ __('words.about doctor') }}</h2>
        <div class="card p-3">
            <p>{{ $doctor->{'bio_'.$local} }}</p>
        </div>
        <h2 class="lh-lg">{{ __('words.doctor qualification') }}</h2>
        <div class="card p-3">
            <div class="row mx-3">
                @foreach($doctor->{'experiences_'.$local} as $experience)
                @continue(empty(trim($experience)))
                <div class="col-md-6">
                    <li class="col-md-6 mb-2 w-100">
                        {{ trim($experience) }}
                    </li>
                </div>
                @endforeach
            </div>
        </div>
        <h2 class="lh-lg">{{ __('words.doctor experience') }}</h2>
        <div class="card p-3">
            <div class="row mx-3">
                @foreach($doctor->{'qualifications_'.$local} as $qualification)
                @continue(empty(trim($qualification)))
                <div class="col-md-6">
                    <li class="col-md-6 mb-2 w-100">
                        {{ trim($qualification) }}
                    </li>
                </div>
                @endforeach
            </div>
        </div>
        <h2 class="lh-lg">{{ __('words.doctor videos') }}</h2>
        <div class="row">
            @foreach($doctor->videos as $video)
            <div class="col-md-4 px-2 mb-3">
                <div class="card rounded-2">
                    <video  controls class="w-100 rounded-top-2">
                        <source src="{{  $video->video_url }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <div class="py-3 text-primary px-2 text-center bg-white rounded-2"> {{$video->{'title_'.$local} }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
