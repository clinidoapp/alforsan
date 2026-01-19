@extends('layouts.dashboard')
@section('title', 'Dashboard - Bookings')
@section('page-title', 'Bookings Management')
@section('content')
<section class="listing">
   <div class="container-fluid">
   <div class="row ">
      <h3 class="mb-2">Bookings</h3>
      <div class="card p-0 mb-3">
         <div class="card-header">
            <h4>Search</h4>
         </div>
         <div class="card-body">
            <form action="" class="inline-form">
               <div class="row">
                  <div class="col-md-9 d-flex gap-3">
                     <input type="text" id="booking_id" name="booking_id" class="form-control" placeholder="Booking Id" value="">
                     <input type="text" id="patient_name"name="patient_name"class="form-control"placeholder="Patient Name"value="">
                     <input type="text" id="patient_phone"name="patient_phone"class="form-control"placeholder="Patient Phone"value="">
                  </div>
                  <div class="col-md-3 d-flex gap-3 justify-content-end">
                     <button class="w-50 btn btn-primary-custom">Search</button>
                     <a href="{{ route('bookings-list') }}" class="w-50 btn btn-outline-primary">Reset</a>
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
                     <th class="py-2 text-center">Name</th>
                     <th class="py-2 text-center">Phone Number</th>
                     <th class="py-2 text-center">Email</th>
                     <th class="py-2 text-center">Service</th>
                     <th class="py-2 text-center">Date</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>1</td>
                     <td>Ahmed ali</td>
                     <td>01003332121</td>
                     <td>info@user.com</td>
                     <td>catract </td>
                     <td>15/1/2026</td>
                  </tr>
                  <tr>
                     <td>1</td>
                     <td>Ahmed ali</td>
                     <td>01003332121</td>
                     <td>info@user.com</td>
                     <td>catract </td>
                     <td>15/1/2026</td>
                  </tr>
               </tbody>
            </table>
            <div class="d-flex justify-content-end align-items-center px-3 py-3 text-align-right">
            </div>
         </div>
   </div>
</section>
<div class="modal fade" id="editSettingModal" tabindex="-1">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <form id="edit_setting_form" method="POST">
            @csrf
            <div class="modal-header bg-light-gray">
               <h5 class="modal-title">Edit setting</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
               <div class="mb-3">
                  <label class="form-label">setting Name</label>
                  <input type="text" class="form-control" name="name" id="edit_setting_name">
                  <input type="hidden" class="form-control" name="id" id="setting_id">
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



   });

</script>
@endsection
