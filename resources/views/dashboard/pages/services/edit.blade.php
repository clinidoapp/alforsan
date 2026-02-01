@extends('layouts.dashboard')
@section('title', 'Dashboard - Doctors')
@section('page-title', 'Doctors Management')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
<section class="listing">
   <div class="container-fluid">
      <h2>Add New Service</h2>
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
         <form id="add_doctor" enctype="multipart/form-data" action="{{ route('add-service',$result->id) }}" method="POST">
            @csrf
            <div class="row">
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="name_en" class="form-label">Name(EN)</label>
                     <input type="text" class="form-control" id="name_en" name="name_en" placeholder="Enter service name" value="{{ $result->name_en }}"required>
                     @error('name_en')
                     <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="name_ar" class="form-label float-end">اسم الخدمة</label>
                     <input type="text" class="form-control text-end" id="name_ar" name="name_ar" placeholder="ادخل اسم الخدمة باللغة العربية"value="{{ $result->name_ar }}" required>
                     @error('name_ar')
                     <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="description_en" class="form-label">Description (EN)</label>
                     <textarea type="text" class="form-control" id="description_en" name="description_en" placeholder="Enter doctor " required>{{ $result->description_en }}</textarea>
                     @error('description_en')
                     <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="description_ar" class="form-label float-end">وصف الخدمة باللغة العربية</label>
                     <textarea type="text" class="form-control text-end" id="description_ar" name="description_ar" placeholder="ادخل وصف للخدمة باللغة العربية" required>{{ $result->description_ar }}</textarea>
                     @error('description_ar')
                     <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                  </div>
               </div>
            </div>
            <div class="row mb-3">
               <div class="col-6">
                     <label for="image" class="form-label">Service Image</label>
                  <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" >
                  @error('image')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
               </div>
               <div class="col-6">
                     <label for="icon" class="form-label">Service Icon</label>
                  <input type="file" name="icon" class="form-control @error('image') is-invalid @enderror" >
                  @error('image')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
               </div>
            </div>
            <div id="symptoms-wrapper">
               <h5>Service Symptoms</h5>
               @foreach($result->symptoms as $i => $symptom)
               <div class="card bg-light-gray p-4 mb-3 symptoms-card" data-index="{{ $i }}">
                  <div class="row mb-3">
                     <div class="col-md-6">
                        <label for="title_en" class="form-label">symptoms title(En)</label>
                        <input type="text" class="form-control-lg w-100 d-block border-0" id="title_en" name="symptoms[0][title_en]" value="{{ $symptom->title_en }}"  placeholder="Enter symptoms title(En)">
                     </div>
                     <div class="col-md-6">
                        <label for="title_ar" class="form-label float-end">اسم العرض</label>
                        <input type="text" class="form-control-lg text-end w-100 d-block border-0" id="title_ar" name="symptoms[0][title_ar]" value="{{ $symptom->title_ar }}"  placeholder="ادخل اسم العرض باللغة العربية">
                     </div>
                  </div>
                  <div class="row mb-3">
                     <div class="col-md-6">
                        <label for="description_en" class="form-label">Description(En)</label>
                        <textarea type="text" class="form-control-lg w-100 d-block border-0" id="description_en" name="symptoms[0][description_en]"  placeholder="Enter symptoms description en">{{ $symptom->description_en }}</textarea>
                     </div>
                     <div class="col-md-6">
                        <label for="description_ar" class="form-label float-end">وصف العرض</label>
                        <textarea type="text" class="form-control-lg w-100 text-end d-block border-0" id="description_ar" name="symptoms[0][description_ar]"   placeholder="ادخل وصف العرض باللغة العربية">{{ $symptom->description_ar }}</textarea>
                     </div>
                      @if($loop->last)
        <div class="text-center mt-4 add-btn-wrapper">
            <button type="button" class="btn btn-outline-primary p-3 w-50 add-symptoms-btn">
                <i class="fa fa-plus"></i> Add another service symptom
            </button>
        </div>
        @endif
                  </div>
               </div>
               @endforeach
            </div>
            <div id="techniques-wrapper">
               <h5>Service techniques</h5>
               @foreach($result->techniques as $t => $technique)

               <div class="card bg-light-gray p-4 mb-3 techniques-card" data-index="{{$t}}">
                  <div class="row mb-3">
                     <div class="col-md-6">
                        <label for="title_en" class="form-label">techniques title(En)</label>
                        <input type="text" class="form-control-lg w-100 d-block border-0" id="title_en" name="techniques[0][title_en]" placeholder="Enter techniques title(En)" value="{{ $technique->title_en }}">
                     </div>
                     <div class="col-md-6">
                        <label for="title_ar" class="form-label float-end">اسم التقنية</label>
                        <input type="text" class="form-control-lg w-100 d-block border-0 text-end" id="title_ar" name="techniques[0][title_ar]" placeholder="ادخل اسم التقنية باللغة العربية" value="{{ $technique->title_ar }}">
                     </div>
                  </div>
                  <div class="row mb-3">
                     <div class="col-md-6">
                        <label for="description_en" class="form-label">Description(En)</label>
                        <textarea type="text" class="form-control-lg w-100 d-block border-0" id="description_en" name="techniques[0][description_en]" placeholder="Enter techniques description en">{{ $technique->description_en }}</textarea>
                     </div>
                     <div class="col-md-6">
                        <label for="description_ar" class="form-label float-end">وصف التقنية</label>
                        <textarea type="text" class="form-control-lg text-end w-100 d-block border-0" id="description_ar" name="techniques[0][description_ar]" placeholder="ادخل وصف التقنية باللغة العربية">{{ $technique->description_ar }}</textarea>
                     </div>
                     <div class="col-md-6">
                        <label for="suitable_for_en" class="form-label">Who is it suitable for?(En)</label>
                        <textarea type="text" class="form-control-lg w-100 d-block border-0" id="suitable_for_en" name="techniques[0][suitable_for_en]" placeholder="Enter who is suitable for en">{{ $technique->suitable_for_en }}</textarea>
                     </div>
                     <div class="col-md-6">
                        <label for="suitable_for_ar" class="form-label float-end">لمن تناسب هذه التقنية</label>
                        <textarea type="text" class="form-control-lg w-100 d-block border-0" id="suitable_for_ar" name="techniques[0][suitable_for_ar]"  placeholder="ادخل وصف الاشخاص الذين تناسبهم هذه التقنية">{{ $technique->suitable_for_ar }}</textarea>
                     </div>
                  </div>
                   @if($loop->last)
        <div class="text-center mt-4 add-btn-wrapper">
            <button type="button"
                        class="btn btn-outline-primary p-3 w-50 add-techniques-btn">
                     <i class="fa fa-plus"></i> Add another service techniques
                     </button>
        </div>
        @endif

               </div>
               @endforeach
            </div>

            <div class="row mb-3">
               <div class="col-md-6">
                  <label for="brief_en" class="form-label">why Alforsan(En)</label>
                  <textarea type="text" class="form-control-lg w-100 d-block" id="brief_en" name="brief_en" placeholder="Enter why Alforsan center en" required>{{ $result->brief_en }}</textarea>
               </div>
               <div class="col-md-6">
                  <label for="brief_ar" class="form-label float-end">لماذا تختار مركز الفرسان</label>
                  <textarea type="text" class="form-control-lg w-100 d-block text-end" id="brief_ar" name="brief_ar" placeholder="اكتب اسباب لماذا يختار المريض مركز الفرسان لهذه الخدمة؟" required>{{ $result->brief_ar }}</textarea>
               </div>
            </div>
            <div id="faq-wrapper">
               <h5>Service FAQ</h5>
               @foreach($result->faqs as $q => $question)

               <div class="card bg-light-gray p-4 mb-3 faq-card" data-index="{{ $q }}">
                  <div class="row mb-3">
                     <div class="col-md-6">
                        <label for="question_en" class="form-label">FAQ question (En)</label>
                        <input type="text" class="form-control-lg w-100 d-block border-0" id="question_en" name="faqs[0][question_en]" placeholder="Enter question (En)" value="{{ $question->question_en }}">
                     </div>
                     <div class="col-md-6">
                        <label for="question_ar" class="form-label float-end">السؤال باللغة العربية</label>
                        <input type="text" class="text-end form-control-lg w-100 d-block border-0" id="question_ar" name="faqs[0][question_ar]" placeholder="ادخل السؤال باللغة العربية" value="{{ $question->question_ar }}">
                     </div>
                  </div>
                  <div class="row mb-3">
                     <div class="col-md-6">
                        <label for="answer_en" class="form-label">Answer(En)</label>
                        <textarea type="text" class="form-control-lg w-100 d-block border-0" id="answer_en" name="faqs[0][answer_en]" placeholder="Enter question answer en">{{ $question->answer_en }}</textarea>
                     </div>
                     <div class="col-md-6">
                        <label for="answer_ar" class="form-label float-end">الاجابة باللغة العربية</label>
                        <textarea type="text" class="form-control-lg w-100 d-block border-0 text-end" id="answer_ar" name="faqs[0][answer_ar]" placeholder="ادخل الاجابة باللغة العربية">{{ $question->answer_ar }}</textarea>
                     </div>
                      @if($loop->last)
                    <div class="text-center mt-4 add-btn-wrapper">
                        <button type="button" class="btn btn-outline-primary p-3 w-50  add-faq-btn">
                            <i class="fa fa-plus"></i> Add another service faq
                        </button>
                    </div>
                    @endif
                  </div>
               </div>
               @endforeach
            </div>
            <div class="row justify-centent-center">
               <div class="col-5">
                  <button type="submit" class="w-100 btn btn-primary-custom text-white"><i class="fa fa-save text-white"></i>  Save</button>
               </div>
            </div>
         </form>
      </div>
   </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
<script src="{{ asset('js/dashboard/add-service.js?v='.env('App_Version').'') }}"></script>
@endsection
