@extends('layouts.dashboard')
@section('title', 'Dashboard - Services')
@section('page-title', 'Services Management')
@section('content')
<section class="View-service">
   <div class="container-fluid">
      <div class="card p-3">
         <div class="row">
            <div class="col-md-4">
               <img src="{{ asset( \App\Enums\ImagePaths::SERVICES_ICONS->value . ($result->icon ?? 'alternative.jpg')) }}" class="rounded-circle">
            </div>
            <div class="col-md-4">
               <label class="form-label">
               <strong>Name:</strong>
               {{ $result->name_en}}
               </label> <br>
               <label class="form-label">
               <strong>Service ID:</strong>
               {{ $result->id }}
               </label><br>
            </div>
            <div class="col-md-4">
               <label class="form-label">
               <strong>Name(AR):</strong>
               {{ $result->name_ar }}
               </label><br>
               <label class="form-label">
               <strong>Service status:</strong>
               {{ $result->status==1?'Active': 'Not Active'}}
               </label><br>
            </div>
         </div>
         <div class="row mb-3">
            <div class="col-3"> <strong>About service (EN):</strong></div>
            <div class="col-9">{{ $result->description_en }} </div>
         </div>
         <div class="row mb-3">
            <div class="col-3"> <strong>About service (AR):</strong></div>
            <div class="col-9">{{ $result->description_ar }} </div>
         </div>
         <hr>
         <div class="row mb-3">
            <div class="col-3"><strong>Service Symptoms(En):</strong></div>
            <div class="col-9">
               <ul>
                  @foreach ($result->symptoms as $symptoms )
                  <li><b>{{ $symptoms->title_en }}:</b>{{ $symptoms->description_en }} </li>
                  @endforeach
               </ul>
            </div>
         </div>
         <div class="row mb-3">
            <div class="col-3"><strong>Service Symptoms(Ar):</strong></div>
            <div class="col-9">
               <ul>
                  @foreach ($result->symptoms as $symptoms )
                  <li><b>{{ $symptoms->title_ar }}:</b>{{ $symptoms->description_ar }} </li>
                  @endforeach
               </ul>
            </div>
         </div>
         <hr>
         <div class="row mb-3">
            <div class="col-3"> <strong>Image</strong></div>
            <div class="col-9">  <img src="{{ asset(\App\Enums\ImagePaths::SERVICES_IMAGES->value . ($result->image ? $result->image : 'image.png')) }}" class="img-fluid"> </div>
         </div>
         <hr>
        <div class="row mb-3">
            <div class="col-3"><strong>Technologies used atAl Fursan Center (En):</strong></div>
            <div class="col-9">
                  @foreach ($result->techniques as $technique )
                  <div class="card p-2 border-0 mb-2 bg-light-gray">
                    <p class="m-0"><b>{{ $technique->title_en }}:</b></p>
                    <p>{{ $technique->description_en }}</p>
                    <p class="m-0"><b>Suitable for</b></p>
                    <p>{{ $technique->suitable_for_en }}</p>
                 </div>
                  @endforeach
            </div>
         </div>
                 <div class="row mb-3">
            <div class="col-3"><strong>Technologies used atAl Fursan Center (Ar):</strong></div>
            <div class="col-9">
                  @foreach ($result->techniques as $technique )
                  <div class="card p-2 border-0 mb-2 bg-light-gray">
                    <p class="m-0"><b>{{ $technique->title_ar }}:</b></p>
                    <p>{{ $technique->description_ar }}</p>
                    <p class="m-0"><b>لمن تناسب</b></p>
                    <p>{{ $technique->suitable_for_ar }}</p>
                 </div>
                  @endforeach
            </div>
         </div>
         <hr>
          <div class="row mb-3">
            <div class="col-3"> <strong>Why choose Al FursanHospital? (En)</strong></div>
            <div class="col-9">{{ $result->brief_en }} </div>
         </div>
          <div class="row mb-3">
            <div class="col-3"> <strong>Why choose Al FursanHospital? (AR):</strong></div>
            <div class="col-9">{{ $result->brief_ar }} </div>
         </div>
         <hr>
                 <div class="row mb-3">
            <strong>FAQ:</strong>
                  @foreach ($result->faqs as $faq )
                  <div class="row mb-3">
                    <div class="col-3"> <strong>Question (En): </strong></div>
                    <div class="col-9">{{ $faq->question_en }} </div>
                    <div class="col-3"> <strong>Answer (En): </strong></div>
                    <div class="col-9">{{ $faq->answer_en }} </div>
                 </div>
                  <div class="row mb-3">
                    <div class="col-3"> <strong>Question (Ar): </strong></div>
                    <div class="col-9">{{ $faq->question_ar }} </div>
                    <div class="col-3"> <strong>Answer (Ar): </strong></div>
                    <div class="col-9">{{ $faq->answer_ar }} </div>
                 </div>

                  @endforeach
         </div>
         <hr>
         <div class="row">
            <div class="col-3"><strong>Actions:</strong></div>
            <div class="col-9">
               <div class="d-flex">
                  <a class="btn btn-lg mx-2 btn-primary-custom">Edit</a>
                        <a href="{{ route('toggleServiceStatus', $result->id) }}" class="toggle btn btn-{{$result->status==1?'danger':'success'}}"onclick="return confirm('Are you sure you want to change this service staus ?');">{{$result->status==1?'Deactivate':'Activate'}}</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/dashboard/add-admin.js') }}"></script>
@endsection
