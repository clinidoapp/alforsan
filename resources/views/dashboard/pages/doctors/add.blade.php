@extends('layouts.dashboard')
@section('title', 'Dashboard - Doctors')
@section('page-title', 'Doctors Management')
@section('content')
<section class="listing">
   <div class="container-fluid">
      <h2>Add New Doctor</h2>
      <div class="card p-3">
         <form id="add_doctor" action="{{ route('store-doctor') }}" method="POST">
            @csrf
            <div class="row">
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="name_en" class="form-label">Name(EN)</label>
                     <input type="text" class="form-control" id="name_en" name="name_en" placeholder="Enter doctor name">
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="name_ar" class="form-label">Name(AR)</label>
                     <input type="text" class="form-control" id="name_ar" name="name_ar" placeholder="Enter doctor name">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="email" class="form-label">Email</label>
                     <input type="text" class="form-control" id="email" name="email" placeholder="Enter doctor Email">
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="phone" class="form-label">Phone Number</label>
                     <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter doctor phone">
                  </div>
               </div>
            </div>
                        <div class="row">
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="academic_title" class="form-label">academic_title</label>
                     <input type="text" class="form-control" id="academic_title" name="academic_title" placeholder="Enter doctor Email">
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="services_ids" class="form-label">services</label>
                        <select id="" name="services_ids[]" multiple class="form-control">
                            <option value="" disabled selected>Select Services</option>
                        @foreach ($services as $service )
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @endforeach

                     </select>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="speciality_en" class="form-label"> Speciality (EN)</label>
                     <input type="text" class="form-control" id="speciality_en" name="speciality_en" placeholder="Enter doctor main speciality (EN)">
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="speciality_ar" class="form-label"> Speciality (AR)</label>
                     <input type="text" class="form-control" id="speciality_ar" name="speciality_ar" placeholder="Enter doctor main speciality (AR)">
                  </div>
               </div>
            </div>
             <div class="row">
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="main_speciality_en" class="form-label">Main Speciality (EN)</label>
                     <input type="text" class="form-control" id="main_speciality_en" name="main_speciality_en" placeholder="Enter doctor main speciality (EN)">
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="main_speciality_ar" class="form-label">Main Speciality (AR)</label>
                     <input type="text" class="form-control" id="main_speciality_ar" name="main_speciality_ar" placeholder="Enter doctor main speciality (AR)">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="bio_en" class="form-label">Bio (EN)</label>
                     <textarea type="text" class="form-control" id="bio_en" name="bio_en" placeholder="Enter doctor "></textarea>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="bio_ar" class="form-label">Bio (AR)</label>
                     <textarea type="text" class="form-control" id="bio_ar" name="bio_ar" placeholder="Enter doctor name"></textarea>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-12"> <input type="file" name="image" class="form-control"></div>
            </div>
            <div class="row mt-3">
               <b>Academic Qualification (EN)</b>
               <div class="col-12" id="doctor_qualification_en">
                  <input type="hidden" name="qualifications_en[]">
                  <div class="card bg-light-gray p-4 mb-3 border-0 rounded-1">
                     <div class="d-flex justify-content-between">
                        <input type="text" class="form-control w-75 value-input" id="qual_val" name="" placeholder="Enter doctor Qualification (AR)">
                        <button type="button" id="add_qualification_en" class="btn btn-outline-primary bg-white px-3 m-auto"><i class="fa fa-plus"></i>Add</button>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <b>Academic Qualification (AR)</b>
               <div class="col-12" id="doctor_qualification_ar">
                  <input type="hidden" name="qualifications_ar[]">
                  <div class="card bg-light-gray p-4 mb-3 border-0 rounded-1">
                     <div class="d-flex justify-content-between">
                        <input type="text" class="form-control w-75 value-input" id="" name="" placeholder="Enter doctor Qualification (AR)">
                        <button type="button" id="add_qualification_ar" class="btn btn-outline-primary bg-white px-3 m-auto"><i class="fa fa-plus"></i>Add</button>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row mt-2">
               <b>Practical Experience (EN)</b>
               <div class="col-12" id="doctor_experiences_en">
                <input type="hidden" name="experiences_en[]">
                  <div class="card bg-light-gray p-4 mb-3 border-0 rounded-1">
                     <div class="d-flex justify-content-between">
                        <input type="text" class="form-control w-75 value-input" id="" name="" placeholder="Enter doctor Qualification (AR)">
                        <button type="button" id="add_experiences_en" class="btn btn-outline-primary bg-white px-3 m-auto"><i class="fa fa-plus"></i>Add</button>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <b>Practical Experience (AR)</b>
               <div class="col-12" id="doctor_experiences_ar">
                <input type="hidden" name="experiences_ar[]">
                  <div class="card bg-light-gray p-4 mb-3 border-0 rounded-1">
                     <div class="d-flex justify-content-between">
                        <input type="text" class="form-control w-75 value-input" id="" name="" placeholder="Enter doctor Qualification (AR)">
                        <button type="button" id="add_experiences_ar" class="btn btn-outline-primary bg-white px-3 m-auto"><i class="fa fa-plus"></i>Add</button>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row justify-centent-center">
                <div class="col-5">
                    <button type="submit" class="w-100 btn btn-primary-custom text-white"> <i class="fa fa-plus text-white"></i> Add</button>
                </div>
            </div>
         </form>
      </div>
   </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/dashboard/add-doctor.js') }}"></script>

@endsection
