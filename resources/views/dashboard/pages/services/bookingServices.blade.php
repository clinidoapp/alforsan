@extends('layouts.dashboard')
@section('title', 'Dashboard - Services')
@section('page-title', 'Services Management')
@section('content')
<section class="listing">
   <div class="container-fluid">
   <div class="row ">
      <h3 class="mb-2">Booking Services</h3>
      <div class="card p-0 mb-3">
         <div class="card-header">
            <h4>Search</h4>
            <a href="{{ route('doctors-add') }}" class="btn btn-primary-custom text-white px-5"> <i class="fa-solid fa-plus text-white"></i> Add </a>
         </div>
         <div class="card-body">
            <form action="" class="inline-form">
               <div class="row">
                  <div class="col-md-9 d-flex gap-3">
                     <input type="text" id="service_id" name="service_id" class="form-control" placeholder="Service Id" value="{{ $search['service_id'] ?? '' }}">
                     <input type="text" id="service_name"name="service_name"class="form-control"placeholder="Service Name"value="{{ $search['service_name'] ?? '' }}">

                    </div>
                  <div class="col-md-3 d-flex gap-3 justify-content-end">
                     <button class="w-50 btn btn-primary-custom">Search</button>
                     <a href="{{ route('booking-services') }}" class="w-50 btn btn-outline-primary">Reset</a>
                  </div>
               </div>
            </form>
         </div>
      </div>
      </div>
      <div class="row">
         <div class="w-100 card p-0">
            <table class="rounded-2 table table-striped ">
               <thead class="table-primary py-2 text-white rounded-2" style="background-color: #32519b;">
                  <tr>
                     <th class="py-2 text-center">ID</th>
                     <th class="py-2 text-center">Name (EN)</th>
                     <th class="py-2 text-center">Name (AR)</th>
                     <th class="py-2 text-center">Status</th>
                     <th class="py-2 text-center">Actions</th>
                  </tr>
               </thead>
               <tbody class="text-center">
                @foreach ($services as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->name_en }}</td>
                    <td>{{ $service->name_ar }}</td>
                    <td class="py-2 text-center"><span class="w-100 rounded-pill badge bg-{{$service->status==1?'success':'danger'}}">{{$service->status==1?'Active':'InActive'}}</span></td>
                    <td class="py-2 text-center admin-actions">
                            <a class="btn btn-primary-custom edit-service"
                                data-bs-toggle="modal"
                                data-bs-target="#editServiceModal"
                                data-id="{{$service->id}}"
                                data-name_en="{{$service->name_en}}"
                                data-name_ar="{{$service->name_ar}}">Edit</a>
                            <a href="{{ route('toggleBookingServicesStatus', $service->id) }}" class="toggle btn btn-{{$service->status==1?'danger':'success'}}"onclick="return confirm('Are you sure you want to change this service staus ?');">{{$service->status==1?'Deactivate':'Activate'}}</a>
                        </td>
                </tr>

                @endforeach

               </tbody>
            </table>
             <div class="d-flex justify-content-end align-items-center px-3 py-3 text-align-right">
            </div>

         </div>
   </div>
</section>
<div class="modal fade" id="editServiceModal" tabindex="-1">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <form id="edit_service_form" method="POST" action="">
            @csrf
            <div class="modal-header bg-light-gray">
               <h5 class="modal-title" id="modal_title">Edit Service</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                    <input type="hidden" id="modal_service_id" name="id">
               <div class="mb-3">
                    <input type="text" class="form-control" name="name_en" id="service_name_en">
               </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="name_ar" id="service_name_ar">
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
   $(document).on('click', '.edit-service', function () {
       const serviceId   = $(this).data('id');
       const serviceName = $(this).data('name_en');
       const serviceNameAr = $(this).data('name_ar');

    var actionUrl = "{{ url('admin/createOrUpdateService') }}/" + $(this).data('id');
    $('#edit_service_form').attr('action', actionUrl);

   $('#modal_title').text('Edit '+ serviceName + ' service')
    $('#service_name_en').val(serviceName);
    $('#service_name_ar').val(serviceNameAr);
    $('#modal_service_id').val(serviceId);


   });

</script>
@endsection
