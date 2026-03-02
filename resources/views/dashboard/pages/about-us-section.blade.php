@extends('layouts.dashboard')
@section('title', 'About us')
@section('page-title', 'About us sections')
@section('content')
<section class="listing">
   <div class="container-fluid">
      <div class="row ">
         <div class="card p-3">
            <h3 class="mb-2">Our Mission and Vision</h3>
            <div class="row">
               <form action="{{ route('set-about-us') }}" method="POST">
                  @csrf
                  <div class="card bg-light-gray p-3">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group mb-4">
                              <label for="vision_en" class="font-weight-bold"> Our Vision</label>
                              <textarea name="vision_en" id="vision_en" rows="6" class="form-control @error('vision_en') is-invalid @enderror" placeholder="Enter company vision_en here..." required>{{ $about->vision_en }}</textarea>
                              @error('vision_en')
                              <span class="invalid-feedback d-block">
                              {{ $message }}
                              </span>
                              @enderror
                           </div>
                           <div class="form-group mb-4">
                              <label for="mission_en" class="font-weight-bold"> Our Mission </label>
                              <textarea name="mission_en" id="mission_en" rows="6" required class="form-control @error('mission_en') is-invalid @enderror" placeholder="Enter company mission_en here..." >{{ $about->mission_en }}</textarea>
                              @error('mission_en')
                              <span class="invalid-feedback d-block">
                              {{ $message }}
                              </span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group mb-4 text-end">
                              <label for="vision_ar" class="font-weight-bold"> رؤيتنا </label>
                              <textarea name="vision_ar" id="vision_ar" rows="6" required class="form-control text-end @error('vision_ar') is-invalid @enderror" placeholder="Enter company vision_ar here..." >{{ $about->vision_ar }}</textarea>
                              @error('vision_ar')
                              <span class="invalid-feedback d-block">
                              {{ $message }}
                              </span>
                              @enderror
                           </div>
                           <div class="form-group mb-4 text-end">
                              <label for="mission_ar" class="font-weight-bold"> رسالتنا </label>
                              <textarea name="mission_ar" id="mission_ar" rows="6" required class="form-control text-end @error('mission_ar') is-invalid @enderror" placeholder="Enter company mission_ar here..." >{{ $about->mission_ar }}</textarea>
                              @error('mission_ar')
                              <span class="invalid-feedback d-block">
                              {{ $message }}
                              </span>
                              @enderror
                           </div>
                        </div>
                     </div>
                  </div>
                  <h3 class="my-3">Our Story</h3>
                  <div class="card bg-light-gray p-3">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group mb-4">
                              <label for="our_story_en" class="font-weight-bold"> Our story (EN) </label>
                              <textarea name="our_story_en" id="our_story_en" rows="6" required class="form-control @error('our_story_en') is-invalid @enderror" placeholder="Enter company our_story_en here..." >{{ $about->our_story_en }}</textarea>
                              @error('our_story_en')
                              <span class="invalid-feedback d-block">
                              {{ $message }}
                              </span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group mb-4 text-end">
                              <label for="our_story_ar" class="font-weight-bold"> قصتنا </label>
                              <textarea name="our_story_ar" id="our_story_ar" rows="6" required class="form-control text-end @error('our_story_ar') is-invalid @enderror" placeholder="Enter company our_story_ar here..." >{{ $about->our_story_ar }}</textarea>
                              @error('our_story_ar')
                              <span class="invalid-feedback d-block">
                              {{ $message }}
                              </span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group mb-4">
                              <label for="doctors_count" class="font-weight-bold"> Doctors Count </label>
                              <input type="text" name="doctors_count" id="doctors_count" required class="form-control @error('doctors_count') is-invalid @enderror" value="{{ $about->doctors_count }}" placeholder="Enter company doctors_count here..." >
                              @error('doctors_count')
                              <span class="invalid-feedback d-block">
                              {{ $message }}
                              </span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group mb-4">
                              <label for="recovery_count" class="font-weight-bold"> Recoveries Count</label>
                              <input type="text" name="recovery_count" id="recovery_count" required class="form-control @error('recovery_count') is-invalid @enderror" value="{{ $about->recovery_count }}" placeholder="Enter company recovery_count here..." >
                              @error('recovery_count')
                              <span class="invalid-feedback d-block">
                              {{ $message }}
                              </span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group mb-4">
                              <label for="experience_years" class="font-weight-bold"> Years of experience</label>
                              <input type="text" name="experience_years" id="experience_years" required class="form-control @error('experience_years') is-invalid @enderror" value="{{ $about->experience_years }}" placeholder="Enter company experience_years here..." >
                              @error('experience_years')
                              <span class="invalid-feedback d-block">
                              {{ $message }}
                              </span>
                              @enderror
                           </div>
                        </div>
                     </div>
                  </div>
                     <h3>Our values</h3>
                     <div class="card mb-2 p-3 bg-light-gray">
                     <div class="row">
                        <div class="col col-sm-6">
                           <div class="form-group mb-4">
                              <label for="value1_title_en" class="font-weight-bold"> Value1 Title (En) </label>
                              <input type="text" name="value1_title_en" id="value1_title_en" required value="{{ $about->value1_title_en }}" class="form-control @error('value1_title_en') is-invalid @enderror" placeholder="Enter company value1_title_en here..." >
                              @error('value1_title_en')
                              <span class="invalid-feedback d-block">
                              {{ $message }}
                              </span>
                              @enderror
                           </div>
                           <div class="form-group mb-4">
                              <label for="value1_desc_en" class="font-weight-bold"> Description(En) </label>
                              <textarea rows="2" name="value1_desc_en" id="value1_desc_en" required  class="form-control @error('value1_desc_en') is-invalid @enderror" placeholder="Enter company value1_desc_en here..." >{{$about->value1_desc_en}}</textarea>
                              @error('value1_desc_en')
                              <span class="invalid-feedback d-block">
                              {{ $message }}
                              </span>
                              @enderror
                           </div>
                        </div>
                        <div class="col col-sm-6">
                           <div class="form-group mb-4 text-end">
                              <label for="value1_title_ar" class="font-weight-bold"> العنوان </label>
                              <input type="text" name="value1_title_ar" id="value1_title_ar" required value="{{ $about->value1_title_ar }}" class="text-end form-control @error('value1_title_ar') is-invalid @enderror" placeholder="Enter company value1_title_ar here..." >
                              @error('value1_title_ar')
                              <span class="invalid-feedback d-block">
                              {{ $message }}
                              </span>
                              @enderror
                           </div>
                           <div class="form-group mb-4 text-end">
                              <label for="value1_desc_ar" class="font-weight-bold"> الشرح </label>
                              <textarea rows="2" name="value1_desc_ar" id="value1_desc_ar" required  class="form-control text-end @error('value1_desc_ar') is-invalid @enderror" placeholder="Enter company value1_desc_ar here..." >{{$about->value1_desc_ar}}</textarea>
                              @error('value1_desc_ar')
                              <span class="invalid-feedback d-block">
                              {{ $message }}
                              </span>
                              @enderror
                           </div>
                        </div>
                     </div>
                      </div>
                     <div class="card mb-2 p-3 bg-light-gray">
                     <div class="row">
                        <div class="col col-sm-6">
                           <div class="form-group mb-4">
                              <label for="value2_title_en" class="font-weight-bold"> Value2 Title (En) </label>
                              <input type="text" name="value2_title_en" id="value2_title_en" required value="{{$about->value2_title_en}}" class="form-control @error('value2_title_en') is-invalid @enderror" placeholder="Enter company value2_title_en here..." >
                              @error('value2_title_en')
                              <span class="invalid-feedback d-block">
                              {{ $message }}
                              </span>
                              @enderror
                           </div>
                           <div class="form-group mb-4">
                              <label for="value2_desc_en" class="font-weight-bold"> Description(En) </label>
                              <textarea rows="2" name="value2_desc_en" id="value2_desc_en" required  class="form-control @error('value2_desc_en') is-invalid @enderror" placeholder="Enter company value2_desc_en here..." >{{ $about->value2_desc_en }}</textarea>
                              @error('value2_desc_en')
                              <span class="invalid-feedback d-block">
                              {{ $message }}
                              </span>
                              @enderror
                           </div>
                        </div>
                        <div class="col col-sm-6">
                           <div class="form-group mb-4 text-end">
                              <label for="value2_title_ar" class="font-weight-bold"> العنوان </label>
                              <input type="text" name="value2_title_ar" id="value2_title_ar" required value="{{ $about->value2_title_ar }}" class="form-control text-end @error('value2_title_ar') is-invalid @enderror" placeholder="Enter company value2_title_ar here..." >
                              @error('value2_title_ar')
                              <span class="invalid-feedback d-block">
                              {{ $message }}
                              </span>
                              @enderror
                           </div>
                           <div class="form-group mb-4 text-end">
                              <label for="value2_desc_ar" class="font-weight-bold"> الشرح </label>
                              <textarea rows="2" name="value2_desc_ar" id="value2_desc_ar" required   class="text-end form-control @error('value2_desc_ar') is-invalid @enderror" placeholder="Enter company value2_desc_ar here..." >{{ $about->value2_desc_ar }}</textarea>
                              @error('value2_desc_ar')
                              <span class="invalid-feedback d-block">
                              {{ $message }}
                              </span>
                              @enderror
                           </div>
                        </div>
                        </div>
                     </div>
                     <div class="card mb-2 p-3 bg-light-gray">

                     <div class="row">
                        <div class="col col-sm-6">
                           <div class="form-group mb-4">
                              <label for="value3_title_en" class="font-weight-bold"> Value3 Title (En)</label>
                              <input type="text" name="value3_title_en" id="value3_title_en" required value="{{ $about->value3_title_en }}" class="form-control @error('value3_title_en') is-invalid @enderror" placeholder="Enter company value3_title_en here..." >
                              @error('value3_title_en')
                              <span class="invalid-feedback d-block">
                              {{ $message }}
                              </span>
                              @enderror
                           </div>
                           <div class="form-group mb-4 text-end">
                              <label for="value3_desc_en" class="font-weight-bold"> Description(En)</label>
                              <textarea rows="2" name="value3_desc_en" id="value3_desc_en" required  class="form-control text-end @error('value3_desc_en') is-invalid @enderror" placeholder="Enter company value3_desc_en here..." >{{ $about->value3_desc_en }}</textarea>
                              @error('value3_desc_en')
                              <span class="invalid-feedback d-block">
                              {{ $message }}
                              </span>
                              @enderror
                           </div>
                        </div>
                        <div class="col col-sm-6">
                           <div class="form-group mb-4 text-end">
                              <label for="value3_title_ar" class="font-weight-bold"> العنوان </label>
                              <input type="text" name="value3_title_ar" id="value3_title_ar" required value="{{ $about->value3_title_ar }}" class="text-end form-control @error('value3_title_ar') is-invalid @enderror" placeholder="Enter company value3_title_ar here..." >
                              @error('value3_title_ar')
                              <span class="invalid-feedback d-block">
                              {{ $message }}
                              </span>
                              @enderror
                           </div>
                           <div class="form-group mb-4 text-end">
                              <label for="value3_desc_ar" class="font-weight-bold"> الشرح </label>
                              <textarea rows="2" name="value3_desc_ar" id="value3_desc_ar" required class="text-end form-control @error('value3_desc_ar') is-invalid @enderror" placeholder="Enter company value3_desc_ar here..." >{{ $about->value3_desc_ar }}</textarea>
                              @error('value3_desc_ar')
                              <span class="invalid-feedback d-block">
                              {{ $message }}
                              </span>
                              @enderror
                           </div>
                        </div>
                     </div>
                     </div>
                     <div class="card mb-2 p-3 bg-light-gray">
                     <div class="row">
                        <div class="col col-sm-6">
                           <div class="form-group mb-4">
                              <label for="value4_title_en" class="font-weight-bold"> Value4 Title (En)</label>
                              <input type="text" name="value4_title_en" id="value4_title_en" required value="{{ $about->value4_title_en }}" class="form-control @error('value4_title_en') is-invalid @enderror" placeholder="Enter company value4_title_en here..." >
                              @error('value4_title_en')
                              <span class="invalid-feedback d-block">
                              {{ $message }}
                              </span>
                              @enderror
                           </div>
                           <div class="form-group mb-4">
                              <label for="value4_desc_en" class="font-weight-bold"> Description(En) </label>
                              <textarea rows="2" name="value4_desc_en" id="value4_desc_en" required class="form-control @error('value4_desc_en') is-invalid @enderror" placeholder="Enter company value4_desc_en here..." >{{ $about->value4_desc_en }}</textarea>
                              @error('value4_desc_en')
                              <span class="invalid-feedback d-block">
                              {{ $message }}
                              </span>
                              @enderror
                           </div>
                        </div>
                        <div class="col col-sm-6">
                           <div class="form-group mb-4 text-end">
                              <label for="value4_title_ar" class="font-weight-bold">العنوان</label>
                              <input type="text" name="value4_title_ar" id="value4_title_ar" required value="{{ $about->value4_title_ar }}" class="text-end form-control @error('value4_title_ar') is-invalid @enderror" placeholder="Enter company value4_title_ar here..." >
                              @error('value4_title_ar')
                              <span class="invalid-feedback d-block">
                              {{ $message }}
                              </span>
                              @enderror
                           </div>
                           <div class="form-group mb-4 text-end">
                              <label for="value4_desc_ar" class="font-weight-bold"> الشرح </label>
                              <textarea rows="2" name="value4_desc_ar" id="value4_desc_ar" required   class="text-end form-control @error('value4_desc_ar') is-invalid @enderror" placeholder="Enter company value4_desc_ar here..." >{{ $about->value4_desc_ar }}</textarea>
                                @error('value4_desc_ar')
                              <span class="invalid-feedback d-block">
                              {{ $message }}
                              </span>
                              @enderror
                           </div>
                        </div>
                     </div>
                     </div>
                     <div class="card mb-2 p-3 bg-light-gray">
                     <div class="row">
                        <div class="col col-sm-6">
                           <div class="form-group mb-4">
                              <label for="value5_title_en" class="font-weight-bold"> Value5 Title (En) </label>
                              <input type="text" name="value5_title_en" id="value5_title_en required" value="{{ $about->value5_title_en }}" class="form-control @error('value5_title_en') is-invalid @enderror" placeholder="Enter company value5_title_en here..." >
                              @error('value5_title_en')
                              <span class="invalid-feedback d-block">
                              {{ $message }}
                              </span>
                              @enderror
                           </div>
                           <div class="form-group mb-4">
                              <label for="value5_desc_en" class="font-weight-bold"> Description(En)</label>
                              <textarea rows="2" name="value5_desc_en" id="value5_desc_en" required  class="form-control @error('value5_desc_en') is-invalid @enderror" placeholder="Enter company value5_desc_en here..." >{{ $about->value5_desc_en }}</textarea>
                              @error('value5_desc_en')
                              <span class="invalid-feedback d-block">
                              {{ $message }}
                              </span>
                              @enderror
                           </div>
                        </div>
                        <div class="col col-sm-6">
                           <div class="form-group mb-4 text-end">
                              <label for="value5_title_ar" class="font-weight-bold"> العنوان </label>
                              <input type="text" name="value5_title_ar" id="value5_title_ar" required value="{{ $about->value5_title_ar }}" class="text-end form-control @error('value5_title_ar') is-invalid @enderror" placeholder="Enter company value5_title_ar here..." >
                              @error('value5_title_ar')
                              <span class="invalid-feedback d-block">
                              {{ $message }}
                              </span>
                              @enderror
                           </div>
                           <div class="form-group mb-4 text-end">
                              <label for="value5_desc_ar" class="font-weight-bold"> العنوان </label>
                              <itextarea rows="2" name="value5_desc_ar" id="value5_desc_ar" required class="text-end form-control @error('value5_desc_ar') is-invalid @enderror" placeholder="Enter company value5_desc_ar here..." >{{ $about->value5_desc_ar }}</itextarea>
                              @error('value5_desc_ar')
                              <span class="invalid-feedback d-block">
                              {{ $message }}
                              </span>
                              @enderror
                           </div>
                        </div>
                     </div>
                     </div>

                  @if(\App\Helpers\Permissions::hasPermission('update_about_us'))
                  <div class="text-center mt-4">
                     <button type="submit" class="btn btn-primary-custom">
                     Save Changes
                     </button>
                  </div>
                  @endif
               </form>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
