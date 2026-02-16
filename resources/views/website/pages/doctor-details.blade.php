@extends('layouts.website')
@php
$local=app()->getLocale();
// dd($doctor);
@endphp
@section('title', $doctor->{'name_'.$local} . ' - Alforsan Hospital')

@section('content')
<section class="doctor-personal-data  py-5 mt-5 bg-white">
    <div class="container mt-4">
        <div class="row">
            <div class="text-center col-md-3">
                <img src="{{ asset('images/doctor_photos/' . ($doctor->image ? $doctor->image : 'alternative.jpg')) }}" class="rounded mb-3 w-100">
            </div>
            <div class="col-md-9 align-content-center">
                <h1 class="lh-lg">{{ $local=='ar'?'د. ':'Dr. ' }}{{ $doctor->{'name_'.$local} }}</h1>
                <h2 class="lh-lg">{{ $doctor->{'academic_title_'.$local} }} {{ $doctor->{'speciality_'.$local} }} </h2>
                <p class="lh-lg">{{ __('words.specialized in') }} {{ $doctor->{'main_speciality_'.$local} }}</p>
            </div>
        </div>
    </div>
</section>
<section class="doctor-professional-data bg-light-blue pb-5">
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
        @if($doctor->videos)
        <h2 class="lh-lg">{{ __('words.doctor videos') }}</h2>
        <div class="row">
            @foreach($doctor->videos as $video)
            <?php
                $url = $video->video_url;
                parse_str(parse_url($url)['query'], $params);
                $yt_id=$params['v'];
            ?>
            <div class="col-md-4 px-2 mb-3">
                <div class="card h-100 rounded-2">
                    {{-- <iframe width="100%" height="130%" src="https://youtube.com/embed/{{$yt_id}}" title=" {{$video->{'title_'.$local} }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
                    <iframe width="100%" height="130%" src="https://youtube.com/embed/{{$yt_id}}" title=" {{$video->{'title_'.$local} }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;" allowfullscreen></iframe>
                    <div class="py-3 text-primary px-2 text-center bg-white rounded-2 text-dark"> {{$video->{'title_'.$local} }}</div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>
@endsection
