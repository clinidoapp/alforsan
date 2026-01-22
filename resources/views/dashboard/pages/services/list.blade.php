@extends('layouts.dashboard')
@section('title', 'Dashboard - Services')
@section('page-title', 'Services Management')
@section('content')
<section class="listing">
<section class="listing">
   <div class="container-fluid">
      <div class="row">
        <div class="d-flex mb-2 justify-content-between">
            <h3>Doctor services</h3>
            <a href="{{ route('service-add') }}" class="btn btn-primary-custom text-white px-5"> <i class="fa-solid fa-plus text-white"></i> Add </a>
        </div>
        <div class="card p-0">
            <div class="card-header">
               <h4>Search</h4>
            </div>
            <div class="card-body">
               <form action="" class="inline-form">
                  <div class="row">
                     <div class="col-md-9 d-flex gap-3">
                      <input type="text" id="service_id" name="service_id" class="form-control" placeholder="Service Id" value="{{ $search['service_id'] ?? '' }}">
                        <input type="text"id="service_name"name="service_name"class="form-control"placeholder="Service Name"value="{{ $search['service_name'] ?? '' }}">

                     </div>
                     <div class="col-md-3 d-flex gap-3 justify-content-end">
                        <button class="w-50 btn btn-primary-custom">Search</button>
                        <a href="{{ route('service-list') }}" class="w-50 btn btn-outline-primary">Reset</a>
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
                     <th class="py-2 text-center">Name (EN)</th>
                     <th class="py-2 text-center">Name (AR)</th>
                     <th class="py-2 text-center">Icon</th>
                     <th class="py-2 text-center">Status</th>
                     <th class="py-2 text-center">Actions</th>
                  </tr>
               </thead>
               <tbody>
                @foreach ($services as $service )
                <tr class="text-center">
                     <td>{{$service->id}}</td>
                     <td>{{$service->name_en}}</td>
                     <td>{{$service->name_ar}}</td>
                     <td><img src="{{ asset('images/services_icons'.$service->icon) }}"></td>
                     <td class="py-2 text-center"><span class="w-100 rounded-pill badge bg-{{$service->status==1?'success':'danger'}}">{{$service->status==1?'Active':'InActive'}}</span></td>
                     <td>
                        <a href="{{ route('view-service', $service->id) }}" class="btn btn-primary-custom">View</a>
                        <a class="btn btn-outline-primary">Edit</a>
                        <a href="{{ route('toggleServiceStatus', $service->id) }}" class="toggle btn btn-{{$service->status==1?'danger':'success'}}"onclick="return confirm('Are you sure you want to change this service staus ?');">{{$service->status==1?'Deactivate':'Activate'}}</a>

                    </td>
                  </tr>
                @endforeach

               </tbody>
            </table>
           <div class="d-flex justify-content-end align-items-center px-3 py-3 text-align-right">
                {{ $services->links('pagination::bootstrap-5') }}
            </div>
         </div>
      </div>
   </div>
</section>
<div class="modal fade" id="editSettingModal" tabindex="-1">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <form id="edit_setting_form" method="POST" action="{{ route('set-setting') }}">
            @csrf
            <div class="modal-header bg-light-gray">
               <h5 class="modal-title" id="modal_title">Edit setting</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
               <div class="mb-3">
                  <input type="hidden" class="form-control" name="key" id="edit_setting_name">
                  <input type="text" class="form-control" name="value" id="setting_val">
               </div>
               <div id="permissions_container">
                  <!-- permissions will be loaded here -->
               </div>
            </div>
            <div class="modal-footer justify-content-center">
               <button type="submit" class="btn btn-primary-custom px-3">Save</button>
            </div>
         </form>
      </div>
   </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).on('click', '.edit-setting', function () {

   const settingId   = $(this).data('id');
   const settingName = $(this).data('name');
   const settingValue= $(this).data('set_value')
   $('#modal_title').text('Alforsan '+ settingName)
    $('#edit_setting_name').val(settingName);
    $('#setting_val').val(settingValue);


   });

</script>
@endsection
