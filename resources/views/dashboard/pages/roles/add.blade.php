@extends('layouts.dashboard')
@section('title', 'Dashboard - Roles')
@section('page-title', 'Roles')
@section('content')
<section class="adding">
   <div class="container-fluid">
      <h2>Add New Role</h2>
      <div class="card p-3">
         <form id="add_role" action="{{ route('roles-add') }}" method="POST">
            @csrf
            <div class="row">
               <div class="col-md-7">
                  <div class="mb-3">
                     <label for="Role_name" class="form-label">Role Name</label>
                     <input type="text" class="form-control" id="Role_name" name="name" placeholder="Enter Role name">
                  </div>
               </div>
            </div>
            <h3 class="text-dark">Select Permission</h3>
            <div class="row p-3">
               @foreach($permissions as $category)
               <div class="card p-0 mb-3">
                  <div class="card-header fw-bold">
                     {{ $category['category_name'] }}
                  </div>
                  <div class="card-body d-flex justify-content-between">
                     @foreach($category['permissions'] as $permission)
                     <div class="form-check">
                        <input
                           class="form-check-input"
                           type="checkbox"
                           name="permissions[]"
                           value="{{ $permission['id'] }}"
                           id="perm_{{ $permission['id'] }}"
                           >
                        <label class="form-check-label" for="perm_{{ $permission['id'] }}">
                        {{ $permission['name'] }}
                        </label>
                     </div>
                     @endforeach
                  </div>
               </div>
               @endforeach
            </div>
         </form>
      </div>
   </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
