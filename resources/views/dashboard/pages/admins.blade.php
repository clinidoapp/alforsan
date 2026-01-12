@extends('layouts.dashboard')
@section('title', 'Dashboard - Admins')
@section('page-title', 'Admins')
@section('content')
<section class="listing">
   <div class="container-fluid">
      <div class="row">
        <div class="d-flex mb-2 justify-content-between">
            <h3>Admins</h3>
            <a href="{{ route('addAdmins') }}" class="btn btn-primary-custom">Add New Admin</a>
        </div>
        <div class="card p-0">
            <div class="card-header">
               <h4>Search</h4>
            </div>
            <div class="card-body">
               <form action="" class="inline-form">
                  <div class="row">
                     <div class="col-md-8 d-flex gap-3">
                        <input type="text" id="admin_id" name="admin_id" class="form-control" placeholder="Admin Id">
                        <input type="text" id="admin_name" name="admin_name" class="form-control" placeholder="Admin Name">
                     </div>
                     <div class="col-md-4 d-flex gap-3 justify-content-end">
                        <button class="w-50 btn btn-primary-custom">Search</button>
                        <button class="w-50 btn btn-outline-primary">Reset</button>
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
                        <th class="py-2 text-center">Admin ID</th>
                        <th class="py-2 text-center">Name</th>
                        <th class="py-2 text-center">Email</th>
                        <th class="py-2 text-center">Role</th>
                        <th class="py-2 text-center">Status</th>
                        <th class="py-2 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admins as $admin)
                    <tr>
                        <td class="py-1 text-center">{{$admin->id}}</td>
                        <td class="py-1 text-center">{{$admin->name}}</td>
                        <td class="py-1 text-center">{{$admin->email}}</td>
                        <td class="py-1 text-center">{{$admin->role_name }}</td>
                        <td class="py-1 text-center"><badge class="badge-success">{{$admin->status==1?'Active':'InActive'}}</badge></td>
                        <td class="py-1 text-center">
                            <button class="btn btn-primary-custom">Edit</button>
                            <button class="btn btn-outline-primary">Deactivate</button>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
      </div>
   </div>
</section>
@endsection
