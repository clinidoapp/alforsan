@extends('layouts.website')

@section('title', 'Doctors - Alforsan Hospital')
@php
    $local=app()->getLocale();
    $isArabic = session('locale', app()->getLocale()) === 'ar';
    @endphp

@section('content')
<section class="services py-5 mt-5 bg-light-blue">
   <div class="container mt-4">
       @if($doctors->count() > 0)

      <div class="text-center">
         <h1>{{ __('words.doctors title') }}</h1>
         <p>{{ __('words.doctors sub_title') }}</p>
      </div>

        <form action="{{ url('/doctors') }}" method="GET" class="d-flex justify-content-center pb-3">
        <div class="input-group search-box {{ $isArabic ? 'rtl' : 'ltr' }}">
            <span class="input-group-text">
                <i class="bi bi-search"></i>
            </span>

            <input type="text"
                   name="doctor_name"
                   class="form-control"
                   placeholder="{{ $isArabic ? ' اكتب اسم الطبيب...' : 'Write the doctor\'s name...' }}"
                   aria-label="Search">

            <button class="btn btn-primary-custom px-5" type="submit">
                {{ $isArabic ? 'بحث' : 'Search' }}
            </button>
        </div>
    </form>
      <div class="row">
         @foreach($doctors as $doctor)
         <div class="col-md-3 col-12">
            <a href="{{ route('doctorDetails', $doctor->id) }}" class="text-decoration-none">
            <div class="card mb-3 text-center doctor-card">
               <img class="w-100 rounded-top doctorimg" src="{{ asset('images/doctor_photos/' . ($doctor->image ? $doctor->image : 'alternative.jpg')) }}">
                <div class="p-3 doctor-data fs-6">
                    <h3 class="doctor_name">{{ $doctor->{'name_'.$local} }}</h3>
                    <p class="about-doctor">{{ $doctor->{'academic_title_'.$local} .' '. $doctor->{'main_speciality_'.$local} }}</p>
                </div>
            </div>
            </a>
         </div>
         @endforeach
      </div>
  <!-- Pagination -->
    <div class="mt-4 d-flex justify-content-center pagination">
       {{ $doctors->links('pagination::bootstrap-5') }}
    </div>
    @else
    <div class="text-center py-5">
        <i class="fs-1 lh-lg fa-solid fa-house-medical-circle-xmark"></i>
        <h2>{{ __('words.no doctors found') }}</h2>
    </div>
    @endif
   </div>
</section>
@endsection
