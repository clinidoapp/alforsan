@extends('layouts.dashboard')
@section('title', 'Dashboard - Roles')
@section('page-title', 'Roles')
@section('content')
<section class="adding">
   <div class="container-fluid">
      <h2>Edit role </h2>
      <div class="card p-3">
         <form id="add_role" action="{{ route('update-role', $roleData->id) }}" method="POST">
            @csrf
            <div class="row">
               <div class="col-md-7">
                  <div class="mb-3">
                     <label for="Role_name" class="form-label">Role Name</label>
                     <input type="text" class="form-control" id="Role_name" name="name" value="{{ $roleData->name }}" placeholder="Enter Role name">
                  </div>
               </div>
            </div>
            <h3 class="text-dark">Select Permission</h3>
            <div class="row p-3">
               @foreach($permissions as $category)
               <div class="card p-0 mb-3">
                  <div class="card-header fw-bold d-flex justify-content-between text-white bg-primary-custome">
                     <p class="m-0">{{ $category['category_name'] }}</p>
                     <label class="fa-checkbox"><input class="select-all" type="checkbox" @checked($category['category_is_checked'])>
                           <span class="checkmark"></span>
                         Select all
                        </label>
                  </div>
                  <div class="card-body d-flex justify-content-between bg-light-gray">
                     @foreach($category['permissions'] as $permission)
                     <div class="form-check px-0">
                         <label class="fa-checkbox" for="perm_{{ $permission['id'] }}">
                        <input
                           class="form-check-input"
                           type="checkbox"
                           name="permissions_ids[]"
                           value="{{ $permission['id'] }}"
                           id="perm_{{ $permission['id'] }}"
                           @checked($permission['is_checked'])
                           >
                           <span class="checkmark"></span>
                        {{ $permission['name'] }}
                        </label>
                     </div>
                     @endforeach
                  </div>
               </div>
               @endforeach
            </div>
            <div class="row justify-centent-center">
               <div class="col-5">
                  <button type="submit" class="w-100 btn btn-primary-custom text-white">  Save</button>
               </div>
            </div>
         </form>
      </div>
   </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/dashboard/add-role.js?v='.env('App_Version').'') }}"></script>
@endsection
