@extends('layouts.dashboard')
@section('title', 'Dashboard - Settings')
@section('page-title', 'Settings Management')
@section('content')
<section class="listing">
   <div class="container-fluid">
   <div class="row ">
      <h3 class="mb-2">Settings</h3>
      <div class="row">
         <div class="w-100 card p-0">
            <table class="rounded-2 table table-striped ">
               <thead class="table-primary py-2 text-white rounded-2" style="background-color: #32519b;">
                  <tr>
                     <th class="py-2 text-center">ID</th>
                     <th class="py-2 text-center">Key Name</th>
                     <th class="py-2 text-center">Value</th>
                     <th class="py-2 text-center">Actions</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>1</td>
                     <td>Email</td>
                     <td>info@example.com</td>
                     <td><a class="btn btn-primary-custom edit-setting"
                        data-bs-toggle="modal"
                        data-bs-target="#editSettingModal"
                        data-id=""
                        data-name="">Edit</a></td>
                  </tr>
               </tbody>
            </table>
            <div class="d-flex justify-content-end align-items-center px-3 py-3 text-align-right">
            </div>
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
