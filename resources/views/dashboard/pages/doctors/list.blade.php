@extends('layouts.dashboard')
@section('title', 'Dashboard - Admins')
@section('page-title', 'Admins')
@section('content')
<section class="listing">
   <div class="container-fluid">
      <div class="row">
        <div class="d-flex mb-2 justify-content-between">
            <h3>Doctors</h3>
            <a href="{{ route('doctors-add') }}" class="btn btn-primary-custom text-white"> <i class="fa-solid fa-plus"></i> Add </a>
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
                        <input type="text"id="doctor_phone"name="doctor_phone"class="form-control"placeholder="Doctor Phone"value="{{ $search['doctor_phone'] ?? '' }}">

                     </div>
                     <div class="col-md-3 d-flex gap-3 justify-content-end">
                        <button class="w-50 btn btn-primary-custom">Search</button>
                        <a href="{{ route('doctors-list') }}" class="w-50 btn btn-outline-primary">Reset</a>
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
                        <th class="py-2 text-center">ID</th>
                        <th class="py-2 text-center">Name(En)</th>
                        <th class="py-2 text-center">NAme(AR)</th>
                        <th class="py-2 text-center">Email</th>
                        <th class="py-2 text-center">Phone</th>
                        <th class="py-2 text-center">Status</th>
                        <th class="py-2 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($doctors as $doctor)
                    <tr>
                        <td class="py-2 text-center">{{$doctor->id}}</td>
                        <td class="py-2 text-center">{{$doctor->name_en}}</td>
                        <td class="py-2 text-center">{{$doctor->name_ar}}</td>
                        <td class="py-2 text-center">{{$doctor->email}}</td>
                        <td class="py-2 text-center">{{$doctor->phone}}</td>
                        <td class="py-2 text-center"><span class="w-100 rounded-pill badge bg-{{$doctor->status==1?'success':'danger'}}">{{$doctor->status==1?'Active':'InActive'}}</span></td>
                        <td class="py-2 text-center admin-actions">
                            <a href="{{ route('doctors-view', $doctor->id) }}" class="btn btn-primary-custom">View</a>
                            <a href="{{ route('Edit-admin', $doctor->id) }}" class="btn btn-outline-primary">Edit</a>
                            <a href="{{ route('doctor.toggle', $doctor->id) }}" class="toggle btn btn-{{$doctor->status==1?'danger':'success'}}"onclick="return confirm('Are you sure you want to change this doctor staus ?');">{{$doctor->status==1?'Deactivate':'Activate'}}</a>
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
