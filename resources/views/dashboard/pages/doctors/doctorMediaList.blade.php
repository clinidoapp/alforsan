@extends('layouts.dashboard')
@section('title', 'Dashboard - Doctors')
@section('page-title', 'Media Management')
@section('content')
<section class="listing">
   <div class="container-fluid">
      <div class="row">
        <div class="d-flex mb-2 justify-content-between">
            <h3>Doctors Name: <span class="text-dark">{{ $doctor->name_en }}</span></h3>
            <a href="{{ route('doctors-add') }}" class="btn btn-primary-custom text-white px-5"> <i class="fa-solid fa-plus text-white"></i> Add </a>
        </div>

      </div>
      <div class="row">
        <div class="w-100 card p-3">
            <h4>Media</h4>
            <table class="rounded-2 table table-striped ">
                <thead class="table-primary py-2 text-white rounded-2" style="background-color: #32519b;">
                    <tr>
                        <th class="py-2 text-center">Video title(EN)</th>
                        <th class="py-2 text-center">Video title(AR)</th>
                        <th class="py-2 text-center">Video link</th>
                        <th class="py-2 text-center">Status</th>
                        <th class="py-2 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($videos as $video)
                        <tr class="text-center">
                            <td>{{ $video->video_title_en }}</td>
                            <td>{{ $video->video_title_ar }}</td>
                            <td>{{ $video->video_url }}</td>
                            <td><span class="w-100 rounded-pill badge bg-{{$video->status==1?'success':'danger'}}">{{$video->status==1?'Active':'InActive'}}</span></td>
                            <td>
                                <a class="btn btn-primary-custom">Edit</a>
                                <a class="btn btn-danger">Delete</a>
                                <a href="{{ route('doctor.toggle', $doctor->id) }}" class="toggle btn btn-outline-{{$video->status==1?'danger':'success'}}"onclick="return confirm('Are you sure you want to change this doctor staus ?');">{{$video->status==1?'Deactivate':'Activate'}}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end align-items-center px-3 py-3 text-align-right">
                {{ $videos->links('pagination::bootstrap-5') }}
            </div>

        </div>
      </div>
   </div>
</section>
@endsection
