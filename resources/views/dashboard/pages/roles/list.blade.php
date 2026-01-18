@extends('layouts.dashboard')
@section('title', 'Dashboard - Roles')
@section('page-title', 'Roles Management')
@section('content')
<section class="listing">
   <div class="container-fluid">
      <div class="row">
        <div class="d-flex mb-2 justify-content-between">
            <h3>Roles</h3>
            <a href="{{ route('roles-add') }}" class="btn btn-primary-custom text-white px-5"> <i class="fa-solid fa-plus text-white"></i> Add </a>
        </div>
        <div class="card p-0">
            <div class="card-header">
               <h4>Search</h4>
            </div>
            <div class="card-body">
               <form action="" class="inline-form">
                  <div class="row">
                     <div class="col-md-9 d-flex gap-3">
                      <input type="text" id="role_id" name="role_id" class="form-control" placeholder="Role Id" value="{{ $search['role_id'] ?? '' }}">
                        <input type="text"id="role_name"name="role_name"class="form-control"placeholder="Role Name"value="{{ $search['role_name'] ?? '' }}">

                     </div>
                     <div class="col-md-3 d-flex gap-3 justify-content-end">
                        <button class="w-50 btn btn-primary-custom">Search</button>
                        <a href="{{ route('roles-list') }}" class="w-50 btn btn-outline-primary">Reset</a>
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
                        <th class="py-2 text-center">Role Name</th>
                        <th class="py-2 text-center">Number of users</th>
                        <th class="py-2 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td class="py-2 text-center">{{$role->id}}</td>
                        <td class="py-2 text-center">{{$role->name}}</td>
                        <td class="py-2 text-center">{{ $role->users_count }}</td>
                        <td class="py-2 text-center admin-actions">
                            <a href="{{ route('roles-details', $role->id) }}" class="btn btn-primary-custom">View</a>
                            <a href="{{ route('Edit-admin', parameters: $role->id) }}" class="btn btn-outline-primary">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end align-items-center px-3 py-3 text-align-right">
                {{ $roles->links('pagination::bootstrap-5') }}
            </div>

        </div>
      </div>
   </div>
</section>
@endsection
