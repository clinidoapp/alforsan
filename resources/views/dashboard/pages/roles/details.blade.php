@extends('layouts.dashboard')
@section('title', 'Dashboard - Roles')
@section('page-title', 'Roles')
@section('content')
<section class="adding">
   <div class="container-fluid">
      <h2>Role Name: {{$role['role_name']}}</h2>
      <div class="card p-3">

            <div class="row p-3">
               @foreach($role['permission_categories'] as $category)
               <div class="card p-0 mb-3">
                  <div class="card-header fw-bold d-flex justify-content-between text-white bg-primary-custome">
                     <p class="m-0">{{ $category['category_name'] }}</p>
                  </div>
                  <div class="card-body d-flex justify-content-between bg-light-gray">
                     @foreach($category['permissions'] as $permission)
                     <div class="form-check px-0">
                         <label class="fa-checkbox" for="perm_{{ $permission['id'] }}">
                            <i class="fa fa-check"></i>
                        {{ $permission['name'] }}
                        </label>
                     </div>
                     @endforeach
                  </div>
               </div>
               @endforeach
            </div>
      </div>
   </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/dashboard/add-role.js') }}"></script>
@endsection
