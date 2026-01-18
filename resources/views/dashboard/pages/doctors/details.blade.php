@extends('layouts.dashboard')
@section('title', 'Dashboard - Admins')
@section('page-title', 'Doctors Management')
@section('content')
<section class="View-doctor">
   <div class="container-fluid">
   <div class="card p-3">
      <div class="row">
        <div class="col-md-4">
        <img src="{{ asset('images/doctor_photos/' . ($doctor->image ?? 'alternative.jpg')) }}" class="rounded-circle">
        </div>
        <div class="col-md-4">
            <label class="form-label">
                <strong>Name:</strong>
                 {{ $doctor->name_en }}
                </label> <br>
            <label class="form-label">
                <strong>Doctor ID:</strong>
                 {{ $doctor->id }}
                </label><br>
        </div>
        <div class="col-md-4">
            <label class="form-label">
                <strong>Name(AR):</strong>
                 {{ $doctor->name_ar }}
                </label><br>
            <label class="form-label">
                <strong>Doctor status:</strong>
                 {{ $doctor->status==1?'Active': 'Not Active'}}
                </label><br>
        </div>

   </div>
   <div class="row mb-3">
        <div class="col-3"> <strong>Academic title:</strong></div>
        <div class="col-9">{{ $doctor->academic_title_en }} - {{ $doctor->academic_title_ar }}</div>
   </div>
   <div class="row mb-3">
        <div class="col-3"><strong>Mobile:</strong></div>
        <div class="col-9">{{ $doctor->phone }}</div>
   </div>
   <div class="row mb-3">
        <div class="col-3"><strong>Email:</strong></div>
        <div class="col-9">{{ $doctor->email }}</div>
   </div>
   <div class="row mb-3">
        <div class="col-3"><strong>Main specialty (En):</strong></div>
        <div class="col-9">{{ $doctor->main_speciality_en }}</div>
   </div>
   <div class="row mb-3">
        <div class="col-3"><strong>Main specialty (AR):</strong></div>
        <div class="col-9">{{ $doctor->main_speciality_ar }}</div>
   </div>
   <div class="row mb-3">
        <div class="col-3"> <strong>About doctor ( En):</strong></div>
        <div class="col-9">{{ $doctor->bio_en }}</div>
   </div>
   <div class="row mb-3">
        <div class="col-3"><strong>About doctor ( AR):</strong></div>
        <div class="col-9">{{ $doctor->bio_ar }}</div>
   </div>
   <hr>
   <div class="row mb-3">
        <div class="col-3"><strong>Services:</strong></div>
        <div class="col-9">
            @foreach ($doctor->services as $doctor_service )
            <p>{{ $doctor_service->name }} ,</p>
            @endforeach
        </div>
   </div>
    <div class="row mb-3">
        <div class="col-3"><strong>Qualifications (En):</strong></div>
        <div class="col-9">
            @foreach ($doctor->qualifications_en as $doctor_qualification_en )
            <p>{{ $doctor_qualification_en }}</p>
            @endforeach
        </div>
   </div>
       <div class="row mb-3">
        <div class="col-3"><strong>Qualifications (AR):</strong></div>
        <div class="col-9">
            @foreach ($doctor->qualifications_ar as $doctor_qualification_ar )
            <p>{{ $doctor_qualification_ar }},</p>
            @endforeach
        </div>
   </div>
   <hr>
          <div class="row mb-3">
        <div class="col-3"><strong>Practical experience (EN):</strong></div>
        <div class="col-9">
            @foreach ($doctor->experiences_en as $doctor_experiences_en )
            <p>{{ $doctor_experiences_en }},</p>
            @endforeach
        </div>
   </div>
          <div class="row">
        <div class="col-3"><strong>Practical experience (AR):</strong></div>
        <div class="col-9">
            @foreach ($doctor->experiences_ar as $experiences_ar )
            <p>{{ $experiences_ar }},</p>
            @endforeach
        </div>
   </div>

      <div class="row">
        <div class="col-3"><strong>Actions:</strong></div>
        <div class="col-9">
            <div class="d-flex">
                <a class="btn btn-lg mx-2 btn-primary-custom">Edit</a>
                <a class="btn btn-lg mx-2 btn-danger">Delete</a>
            </div>
        </div>
   </div>

   </div>
   </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/dashboard/add-admin.js') }}"></script>


@endsection
