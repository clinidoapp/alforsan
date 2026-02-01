@extends('layouts.dashboard')
@section('title', 'Dashboard - Doctors')
@section('page-title', 'Doctors Management')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
<section class="listing">
   <div class="container-fluid">
      <h2>Add New Doctor</h2>
      <div class="card p-3">
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul class="mb-0">
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
         <form id="add_doctor" enctype="multipart/form-data" action="{{ route('store-doctor') }}" method="POST">
            @csrf
            <div class="row">
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="name_en" class="form-label">Name(EN)</label>
                     <input type="text" class="form-control" id="name_en" name="name_en" placeholder="Enter doctor name" required>
                     @error('name_en')
                     <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="name_ar" class="form-label float-end">اسم الطبيب</label>
                     <input type="text" class="form-control text-end" id="name_ar" name="name_ar"  placeholder="اكتب اسم الطبيب باللغة العربية"required>
                     @error('name_ar')
                     <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="email" class="form-label">Email</label>
                     <input type="text" class="form-control" id="email" name="email"  placeholder="Enter doctor Email" required>
                     @error('email')
                     <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="phone" class="form-label">Phone Number</label>
                     <input type="text" class="form-control" id="phone"  name="phone" placeholder="Enter doctor phone" required>
                     @error('phone')
                     <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="academic_title" class="form-label">Academic title</label>
                     <select id="academic_title" name="academic_title" class="form-control" required>
                        <option> Choose academic title</option>
                        @foreach ($academicTitles as $academicTitle )
                        <option value="{{$academicTitle['value']}}">{{ $academicTitle['key'] }}</option>

                        @endforeach
                     </select>
                     @error('academic_title')
                     <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="services_ids" class="form-label d-block">services</label>
                     <select id="services_ids" name="services_ids[]" multiple class="w-100 selectpicker" data-selected-text-format="count"  data-live-search="true"  required>
                        <option value="" disabled >Select Services</option>
                        @foreach ($services as $service )
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @endforeach
                     </select>
                     @error('services_ids')
                     <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="speciality_en" class="form-label"> Speciality (EN)</label>
                     <input type="text" class="form-control" id="speciality_en" name="speciality_en" placeholder="Enter doctor  speciality (EN)" required>
                     @error('speciality_en')
                     <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="speciality_ar" class="form-label float-end"> التخصص </label>
                     <input type="text" class="form-control text-end" id="speciality_ar" name="speciality_ar" placeholder="اكتب تخصص الطبيب باللغة العربية" required>
                     @error('speciality_ar')
                     <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="main_speciality_en" class="form-label">Main Speciality (EN)</label>
                     <input type="text" class="form-control" id="main_speciality_en" name="main_speciality_en" placeholder="Enter doctor main speciality (EN)" required>
                     @error('main_speciality_en')
                     <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="main_speciality_ar" class="form-label float-end">التخصص الرئيسى</label>
                     <input type="text" class="form-control text-end" id="main_speciality_ar" name="main_speciality_ar" placeholder="اكتب التخصص الرئيسى للطبيب باللغة العربية" required>
                     @error('main_speciality_ar')
                     <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="bio_en" class="form-label">Bio (EN)</label>
                     <textarea type="text" class="form-control" id="bio_en" name="bio_en" placeholder="Enter bio about doctor " required></textarea>
                     @error('bio_en')
                     <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="bio_ar" class="form-label float-end">نبده عن الطبيب</label>
                     <textarea type="text" class="form-control text-end" id="bio_ar" name="bio_ar" placeholder="اكتب نبذه مختصره عن الطبيب" required></textarea>
                     @error('bio_ar')
                     <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-12">
                     <label for="image" class="form-label">Doctor photo</label>
                  <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" required>
                  @error('image')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
               </div>
            </div>
            <div class="row mt-3">
               <b>Academic Qualification (EN)</b>
               <div class="col-12" id="doctor_qualification_en">
                  <input type="hidden" name="qualifications_en[]">
                  @error('qualifications_en')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                  <div class="card bg-light-gray p-4 mb-3 border-0 rounded-1">
                     <div class="d-flex justify-content-between">
                        <input type="text" class="form-control w-75 value-input" id="qual_val" name="" placeholder="Enter doctor Qualification (EN)">
                        <button type="button" id="add_qualification_en" class="btn btn-outline-primary bg-white px-3 m-auto"><i class="fa fa-plus"></i>Add</button>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <b>المؤهلات العلميه للطبيب باللغة العربية</b>
               <div class="col-12" id="doctor_qualification_ar">
                  <input type="hidden" name="qualifications_ar[]">
                  @error('qualifications_ar')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                  <div class="card bg-light-gray p-4 mb-3 border-0 rounded-1">
                     <div class="d-flex justify-content-between">
                        <input type="text" class="form-control w-75 value-input" id="" name="" placeholder="ادخل المؤهل باللغة العربية">
                        <button type="button" id="add_qualification_ar" class="btn btn-outline-primary bg-white px-3 m-auto"><i class="fa fa-plus"></i>Add</button>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row mt-2">
               <b>Practical Experience (EN)</b>
               <div class="col-12" id="doctor_experiences_en">
                  <input type="hidden" name="experiences_en[]">
                  @error('experiences_en')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                  <div class="card bg-light-gray p-4 mb-3 border-0 rounded-1">
                     <div class="d-flex justify-content-between">
                        <input type="text" class="form-control w-75 value-input" id="" name="" placeholder="Enter doctor Qualification (AR)">
                        <button type="button" id="add_experiences_en" class="btn btn-outline-primary bg-white px-3 m-auto"><i class="fa fa-plus"></i>Add</button>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <b>الخبرة العملية</b>
               <div class="col-12" id="doctor_experiences_ar">
                  <input type="hidden" name="experiences_ar[]">
                  @error('experiences_ar')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                  <div class="card bg-light-gray p-4 mb-3 border-0 rounded-1">
                     <div class="d-flex justify-content-between">
                        <input type="text" class="form-control w-75 value-input" id="" name="" placeholder="ادخل الخبرة باللغة العربية">
                        <button type="button" id="add_experiences_ar" class="btn btn-outline-primary bg-white px-3 m-auto"><i class="fa fa-plus"></i>Add</button>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row justify-centent-center">
               <div class="col-5">
                  <button type="submit" class="w-100 btn btn-primary-custom text-white"> <i class="fa fa-plus text-white"></i> Add a new doctor</button>
               </div>
            </div>
         </form>
      </div>
   </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
<script src="{{ asset('js/dashboard/add-doctor.js?v='.env('App_Version').'') }}"></script>
<script>
    const edit=false;

</script>
@endsection
