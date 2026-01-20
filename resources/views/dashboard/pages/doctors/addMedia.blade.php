@extends('layouts.dashboard')
@section('title', 'Media')
@section('page-title', 'Media Overview')
@section('content')
<section class="listing">
   <div class="container-fluid">
      <div class="row">
         <div class="d-flex mb-2 justify-content-between">
            <h3>Doctors Media</h3>
         </div>
      </div>
      <div class="row">
         <div class="card p-3">
            @if($selectedId)
            <h4>Doctor Name: <span class="text-dark">{{ $selectedDoctor->name_en }}</span></h4>
            @endif
            <form method="POST" action="{{ route('createOrEditDoctorMedia') }}">
               @csrf
               @if($selectedId)
               <input type="hidden" name="doctor_id" value="{{ $selectedId }}">
               @else
               <div class="form-group mb-3 col-md-6">
                   <label for="doctor_id" class="form-label">Doctor name</label>
                   <select class="form-select" id="doctor_id" name="doctor_id">
                       <option value="" disabled selected>Choose doctor</option>
                       @foreach($doctors as $doctor)
                       <option value="{{$doctor->id}}">{{$doctor->identifier}}</option>
                       @endforeach
                    </select>
                </div>
            @endif

               <div id="videos-wrapper">
                  <div class="card bg-light-gray p-4 mb-3 video-card" data-index="0">
                     <div class="row mb-3">
                        <div class="col-md-6">
                           <label for="title_en" class="form-label">Video title(En)</label>
                           <input type="text" class="form-control-lg w-100 d-block border-0" id="title_en" name="videos[0][title_en]" placeholder="Enter Video title(En)">
                        </div>
                        <div class="col-md-6">
                           <label for="title_ar" class="form-label">Video title(Ar)</label>
                           <input type="text" class="form-control-lg w-100 d-block border-0" id="title_ar" name="videos[0][title_ar]" placeholder="Enter Video title(Ar)">
                        </div>
                     </div>
                     <div class="row mb-3">
                        <div class="col-md-6">
                           <label for="video_url" class="form-label">Video Link</label>
                           <input type="text" class="form-control-lg w-100 d-block border-0" id="video_url" name="videos[0][video_url]" placeholder="Enter Video link">
                        </div>
                        <div class="col-md-6">
                           <label for="status" class="form-label">Video status</label>
                           <select class="form-select form-control-lg w-100 d-block border-0" id="status" name="videos[0][status]">
                              <option value="" disabled selected>Select status</option>
                              <option value="1">Active</option>
                              <option value="0">in active</option>
                           </select>
                        </div>
                        <div class="text-center mt-4 add-btn-wrapper">
                           <button type="button"
                              class="btn btn-outline-primary p-3 w-50 add-video-btn">
                           <i class="fa fa-plus"></i> Add another video
                           </button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row justify-content-center mt-4">
                  <div class="col-5">
                     <button type="submit"
                        class="p-3 w-100 btn btn-primary-custom text-white">
                        Save All Videos
                     </button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/dashboard/add-video.js') }}"></script>
@endsection
