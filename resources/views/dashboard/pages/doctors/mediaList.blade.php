@extends('layouts.dashboard')
@section('title', 'Dashboard - Doctors')
@section('page-title', 'Media Management')
@section('content')
<section class="listing">
   <div class="container-fluid">
      <div class="row">
        <div class="d-flex mb-2 justify-content-between">
            <h3>Doctors Media</h3>
            <a href="{{ route('doctors-addMedia') }}" class="btn btn-primary-custom text-white px-5"> <i class="fa-solid fa-plus text-white"></i> Add </a>
        </div>
        <div class="card p-0">
            <div class="card-header">
               <h4>Search</h4>
            </div>
            <div class="card-body">
               <form action="" class="inline-form">
                  <div class="row">
                     <div class="col-md-9 d-flex gap-3">
                      <input type="text" id="doctor_id" name="doctor_id" class="form-control" placeholder="Doctor Id" value="{{ $search['doctor_id'] ?? '' }}">
                        <input type="text"id="doctor_name"name="doctor_name"class="form-control"placeholder="Doctor Name"value="{{ $search['doctor_name'] ?? '' }}">

                     </div>
                     <div class="col-md-3 d-flex gap-3 justify-content-end">
                        <button class="w-50 btn btn-primary-custom">Search</button>
                        <a href="{{ route('doctors-list-media') }}" class="w-50 btn btn-outline-primary">Reset</a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <div class="row py-5">
        <div class="w-100 card p-0">
            <table class="rounded-2 table table-striped ">
                <thead class="table-primary py-2 text-white rounded-2" style="background-color: #32519b;">
                    <tr>
                        <th class="py-2 text-center">Doctor ID</th>
                        <th class="py-2 text-center">Doctor Name</th>
                        <th class="py-2 text-center">Videos count</th>
                        <th class="py-2 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($doctors as $doctor)
                        <tr class="text-center">
                            <td>{{ $doctor->id }}</td>
                            <td>{{ $doctor->doctor_name }}</td>
                            <td>{{ $doctor->videos_count }}</td>
                            <td>
                                <a href="{{ route('doctors-addMedia', $doctor->id) }}"class="btn btn-primary-custom">Add</a>
                                <a href="{{ route('doctors-mediaList', $doctor->id) }}" class="btn btn-outline-primary">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end align-items-center px-3 py-3 text-align-right">
                {{ $doctors->links('pagination::bootstrap-5') }}
            </div>

        </div>
      </div>
   </div>
</section>
@endsection
