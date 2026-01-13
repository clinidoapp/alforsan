@extends('layouts.dashboard')
@section('title', 'Dashboard - Admins')
@section('page-title', 'Admins')
@section('content')
<section class="listing">
   <div class="container-fluid">
   <h2>Add New Admin</h2>
   <div class="card p-3">
      <form id="add_admin" action="{{ route('store-admin') }}" method="POST">
        @csrf
         <div class="row">
            <div class="col-md-6">
               <div class="mb-3">
                  <label for="admin_name" class="form-label">Admin Name</label>
                  <input type="text" class="form-control" id="admin_name" name="name" placeholder="Enter admin name">
               </div>
            </div>
            <div class="col-md-6">
               <div class="mb-3">
                  <label for="admin_email" class="form-label">Admin Email</label>
                  <input type="email" class="form-control" id="admin_email" name="email" placeholder="Enter admin email">
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6">
               <div class="mb-3">
                  <label for="admin_role" class="form-label">Admin Role</label>
                  <select class="form-select" id="admin_role" name="role_id">
                     <option value="" disabled selected>Select role</option>
                     @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                     @endforeach
                  </select>
               </div>
            </div>
            <div class="col-md-6">
               <div class="mb-3">
                  <label for="admin_password" class="form-label">Admin password</label>
                  <input type="text" class="form-control" id="admin_password" name="password" placeholder="Enter admin password">
               </div>
            </div>
            <div class="row justify-content-center">
               <div class="col-md-3 text-center mt-4">
                  <button type="submit" class="btn btn-primary-custom">Add Admin</button>
               </div>
            </div>
      </form>
      </div>
   </div>
</section>
@endsection
