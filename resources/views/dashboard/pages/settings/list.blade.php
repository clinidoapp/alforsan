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
                @foreach ($setting as $set )
                <tr>
                     <td>{{$set->id}}</td>
                     <td>{{$set->key}}</td>
                     <td>{{$set->value}}</td>
                     <td><a class="btn btn-primary-custom edit-setting"
                        data-bs-toggle="modal"
                        data-bs-target="#editSettingModal"
                        data-id="{{$set->id}}"
                        data-set_value="{{$set->value}}"
                        data-name="{{$set->key}}">Edit</a></td>
                  </tr>
                @endforeach

               </tbody>
            </table>
           <div class="d-flex justify-content-end align-items-center px-3 py-3 text-align-right">
                {{ $setting->links('pagination::bootstrap-5') }}
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
