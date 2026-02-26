@extends('layouts.dashboard')
@section('title', 'About us')
@section('page-title', 'About us sections')
@section('content')
<section class="listing">
    <div class="container-fluid">
        <div class="row ">
            <h3 class="mb-2">Our Mission and Vision</h3>
            <div class="row">
                <form action="{{ route('set-about-us') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            {{-- Vision --}}
                            <div class="form-group mb-4">
                                <label for="vision_en" class="font-weight-bold"> Company vision_en </label>
                                <textarea name="vision_en" id="vision_en" rows="6" class="form-control @error('vision_en') is-invalid @enderror" placeholder="Enter company vision_en here..." >{{ $about->vision_en }}</textarea>
                                @error('vision_en')
                                <span class="invalid-feedback d-block">
                                {{ $message }}
                                </span>
                                @enderror
                            </div>
                             <div class="form-group mb-4">
                                <label for="vision_ar" class="font-weight-bold"> Company Vision_ar </label>
                                <textarea name="vision_ar" id="vision_ar" rows="6" class="form-control @error('vision_ar') is-invalid @enderror" placeholder="Enter company vision_ar here..." >{{ $about->vision_ar }}</textarea>
                                @error('vision_ar')
                                <span class="invalid-feedback d-block">
                                {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            {{-- Mission --}}
                            <div class="form-group mb-4">
                                <label for="mission_en" class="font-weight-bold"> Company Mission_en </label>
                                <textarea name="mission_en" id="mission_en" rows="6" class="form-control @error('mission_en') is-invalid @enderror" placeholder="Enter company mission_en here..." >{{ $about->mission_en }}</textarea>
                                @error('mission_en')
                                <span class="invalid-feedback d-block">
                                {{ $message }}
                                </span>
                                @enderror
                            </div>
                             <div class="form-group mb-4">
                                <label for="mission_ar" class="font-weight-bold"> Company Mission_ar </label>
                                <textarea name="mission_ar" id="mission_ar" rows="6" class="form-control @error('mission_ar') is-invalid @enderror" placeholder="Enter company mission_ar here..." >{{ $about->mission_ar }}</textarea>
                                @error('mission_ar')
                                <span class="invalid-feedback d-block">
                                {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="our_story_en" class="font-weight-bold"> Company our_story_en </label>
                                <textarea name="our_story_en" id="our_story_en" rows="6" class="form-control @error('our_story_en') is-invalid @enderror" placeholder="Enter company our_story_en here..." >{{ $about->our_story_en }}</textarea>
                                @error('our_story_en')
                                <span class="invalid-feedback d-block">
                                {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="our_story_ar" class="font-weight-bold"> Company story </label>
                                <textarea name="our_story_ar" id="our_story_ar" rows="6" class="form-control @error('our_story_ar') is-invalid @enderror" placeholder="Enter company our_story_ar here..." >{{ $about->our_story_ar }}</textarea>
                                @error('our_story_ar')
                                <span class="invalid-feedback d-block">
                                {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="doctors_count" class="font-weight-bold"> Company doctors_count </label>
                                <input type="text" name="doctors_count" id="doctors_count" rows="6" class="form-control @error('doctors_count') is-invalid @enderror" value="{{ $about->doctors_count }}" placeholder="Enter company doctors_count here..." >
                                @error('doctors_count')
                                <span class="invalid-feedback d-block">
                                {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="recovery_count" class="font-weight-bold"> Company recovery_count </label>
                                <input type="text" name="recovery_count" id="recovery_count" rows="6" class="form-control @error('recovery_count') is-invalid @enderror" value="{{ $about->recovery_count }}" placeholder="Enter company recovery_count here..." >
                                @error('recovery_count')
                                <span class="invalid-feedback d-block">
                                {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="experience_years" class="font-weight-bold"> Company experience_years </label>
                                <input type="text" name="experience_years" id="experience_years" rows="6" class="form-control @error('experience_years') is-invalid @enderror" value="{{ $about->experience_years }}" placeholder="Enter company experience_years here..." >
                                @error('experience_years')
                                <span class="invalid-feedback d-block">
                                {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h3>Our values</h3>
                        <div class="border-bottom row">
                            <div class="col col-sm-6">
                                <div class="form-group mb-4">
                                    <label for="value1_title_en" class="font-weight-bold"> Company value1_title_en </label>
                                    <input type="text" name="value1_title_en" id="value1_title_en" value="{{ $about->value1_title_en }}" class="form-control @error('value1_title_en') is-invalid @enderror" placeholder="Enter company value1_title_en here..." >
                                    @error('value1_title_en')
                                    <span class="invalid-feedback d-block">
                                    {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="value1_title_ar" class="font-weight-bold"> Company value1_title_ar </label>
                                    <input type="text" name="value1_title_ar" id="value1_title_ar" value="{{ $about->value1_title_ar }}" class="form-control @error('value1_title_ar') is-invalid @enderror" placeholder="Enter company value1_title_ar here..." >
                                    @error('value1_title_ar')
                                    <span class="invalid-feedback d-block">
                                    {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-sm-6">
                                <div class="form-group mb-4">
                                    <label for="value1_desc_en" class="font-weight-bold"> Company value1_desc_en </label>
                                    <input type="text" name="value1_desc_en" id="value1_desc_en" value="{{$about->value1_desc_en}}" class="form-control @error('value1_desc_en') is-invalid @enderror" placeholder="Enter company value1_desc_en here..." >
                                    @error('value1_desc_en')
                                    <span class="invalid-feedback d-block">
                                    {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="value1_desc_ar" class="font-weight-bold"> Company value1_desc_ar </label>
                                    <input type="text" name="value1_desc_ar" id="value1_desc_ar" value="{{$about->value1_desc_ar}}" class="form-control @error('value1_desc_ar') is-invalid @enderror" placeholder="Enter company value1_desc_ar here..." >
                                    @error('value1_desc_ar')
                                    <span class="invalid-feedback d-block">
                                    {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom row">
                            <div class="col col-sm-6">
                                <div class="form-group mb-4">
                                    <label for="value2_title_en" class="font-weight-bold"> Company value2_title_en </label>
                                    <input type="text" name="value2_title_en" id="value2_title_en" value="{{$about->value2_title_en}}" class="form-control @error('value2_title_en') is-invalid @enderror" placeholder="Enter company value2_title_en here..." >
                                    @error('value2_title_en')
                                    <span class="invalid-feedback d-block">
                                    {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="value2_title_ar" class="font-weight-bold"> Company value2_title_ar </label>
                                    <input type="text" name="value2_title_ar" id="value2_title_ar" value="{{ $about->value2_title_ar }}" class="form-control @error('value2_title_ar') is-invalid @enderror" placeholder="Enter company value2_title_ar here..." >
                                    @error('value2_title_ar')
                                    <span class="invalid-feedback d-block">
                                    {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-sm-6">
                                <div class="form-group mb-4">
                                    <label for="value2_desc_en" class="font-weight-bold"> Company value2_desc_en </label>
                                    <input type="text" name="value2_desc_en" id="value2_desc_en" value="{{ $about->value2_desc_en }}" class="form-control @error('value2_desc_en') is-invalid @enderror" placeholder="Enter company value2_desc_en here..." >
                                    @error('value2_desc_en')
                                    <span class="invalid-feedback d-block">
                                    {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="value2_desc_ar" class="font-weight-bold"> Company value2_desc_ar </label>
                                    <input type="text" name="value2_desc_ar" id="value2_desc_ar" value="{{ $about->value2_desc_ar }}"  class="form-control @error('value2_desc_ar') is-invalid @enderror" placeholder="Enter company value2_desc_ar here..." >
                                    @error('value2_desc_ar')
                                    <span class="invalid-feedback d-block">
                                    {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom row">
                            <div class="col col-sm-6">
                                <div class="form-group mb-4">
                                    <label for="value3_title_en" class="font-weight-bold"> Company value3_title_en </label>
                                    <input type="text" name="value3_title_en" id="value3_title_en" value="{{ $about->value3_title_en }}" class="form-control @error('value3_title_en') is-invalid @enderror" placeholder="Enter company value3_title_en here..." >
                                    @error('value3_title_en')
                                    <span class="invalid-feedback d-block">
                                    {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="value3_title_ar" class="font-weight-bold"> Company value3_title_ar </label>
                                    <input type="text" name="value3_title_ar" id="value3_title_ar" value="{{ $about->value3_title_ar }}" class="form-control @error('value3_title_ar') is-invalid @enderror" placeholder="Enter company value3_title_ar here..." >
                                    @error('value3_title_ar')
                                    <span class="invalid-feedback d-block">
                                    {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-sm-6">
                                <div class="form-group mb-4">
                                    <label for="value3_desc_en" class="font-weight-bold"> Company value3_desc_en </label>
                                    <input type="text" name="value3_desc_en" id="value3_desc_en" value="{{ $about->value3_desc_en }}" class="form-control @error('value3_desc_en') is-invalid @enderror" placeholder="Enter company value3_desc_en here..." >
                                    @error('value3_desc_en')
                                    <span class="invalid-feedback d-block">
                                    {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="value3_desc_ar" class="font-weight-bold"> Company value3_desc_ar </label>
                                    <input type="text" name="value3_desc_ar" id="value3_desc_ar" value="{{ $about->value3_desc_ar }}" class="form-control @error('value3_desc_ar') is-invalid @enderror" placeholder="Enter company value3_desc_ar here..." >
                                    @error('value3_desc_ar')
                                    <span class="invalid-feedback d-block">
                                    {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom row">
                            <div class="col col-sm-6">
                                <div class="form-group mb-4">
                                    <label for="value4_title_en" class="font-weight-bold"> Company value4_title_en </label>
                                    <input type="text" name="value4_title_en" id="value4_title_en" value="{{ $about->value4_title_en }}" class="form-control @error('value4_title_en') is-invalid @enderror" placeholder="Enter company value4_title_en here..." >
                                    @error('value4_title_en')
                                    <span class="invalid-feedback d-block">
                                    {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="value4_title_ar" class="font-weight-bold"> Company value4_title_ar </label>
                                    <input type="text" name="value4_title_ar" id="value4_title_ar" value="{{ $about->value4_title_ar }}" class="form-control @error('value4_title_ar') is-invalid @enderror" placeholder="Enter company value4_title_ar here..." >
                                    @error('value4_title_ar')
                                    <span class="invalid-feedback d-block">
                                    {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-sm-6">
                                <div class="form-group mb-4">
                                    <label for="value4_desc_en" class="font-weight-bold"> Company value4_desc_en </label>
                                    <input type="text" name="value4_desc_en" id="value4_desc_en" value="{{ $about->value4_desc_en }}" class="form-control @error('value4_desc_en') is-invalid @enderror" placeholder="Enter company value4_desc_en here..." >
                                    @error('value4_desc_en')
                                    <span class="invalid-feedback d-block">
                                    {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="value4_desc_ar" class="font-weight-bold"> Company value4_desc_ar </label>
                                    <input type="text" name="value4_desc_ar" id="value4_desc_ar" value="{{ $about->value4_desc_ar }}" class="form-control @error('value4_desc_ar') is-invalid @enderror" placeholder="Enter company value4_desc_ar here..." >
                                    @error('value4_desc_ar')
                                    <span class="invalid-feedback d-block">
                                    {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom row">
                            <div class="col col-sm-6">
                                <div class="form-group mb-4">
                                    <label for="value5_title_en" class="font-weight-bold"> Company value5_title_en </label>
                                    <input type="text" name="value5_title_en" id="value5_title_en" value="{{ $about->value5_title_en }}" class="form-control @error('value5_title_en') is-invalid @enderror" placeholder="Enter company value5_title_en here..." >
                                    @error('value5_title_en')
                                    <span class="invalid-feedback d-block">
                                    {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="value5_title_ar" class="font-weight-bold"> Company value5_title_ar </label>
                                    <input type="text" name="value5_title_ar" id="value5_title_ar" value="{{ $about->value5_title_ar }}" class="form-control @error('value5_title_ar') is-invalid @enderror" placeholder="Enter company value5_title_ar here..." >
                                    @error('value5_title_ar')
                                    <span class="invalid-feedback d-block">
                                    {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-sm-6">
                                <div class="form-group mb-4">
                                    <label for="value5_desc_en" class="font-weight-bold"> Company value5_desc_en </label>
                                    <input type="text" name="value5_desc_en" id="value5_desc_en" value="{{ $about->value5_desc_en }}" class="form-control @error('value5_desc_en') is-invalid @enderror" placeholder="Enter company value5_desc_en here..." >
                                    @error('value5_desc_en')
                                    <span class="invalid-feedback d-block">
                                    {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="value5_desc_ar" class="font-weight-bold"> Company value5_desc_ar </label>
                                    <input type="text" name="value5_desc_ar" id="value5_desc_ar" value="{{ $about->value5_desc_ar }}" class="form-control @error('value5_desc_ar') is-invalid @enderror" placeholder="Enter company value5_desc_ar here..." >
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
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">
                        Save Changes
                        </button>
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
