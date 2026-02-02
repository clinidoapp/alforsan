@extends('layouts.dashboard')
@section('title', 'Dashboard - Doctors')
@section('page-title', 'Media Management')
@section('content')
<section class="listing">
   <div class="container-fluid">
      <div class="row">
        <div class="d-flex mb-2 justify-content-between">
            <h3>Doctors Name: <span class="text-dark">{{ $doctor->name_en }}</span></h3>
            <a href="{{ route('doctors-addMedia', $doctor->id) }}" class="btn btn-primary-custom text-white px-5"> <i class="fa-solid fa-plus text-white"></i> Add </a>
        </div>

      </div>
      <div class="row">
        <div class="w-100 card p-3 table-responsive">
            <h4>Media</h4>
            <table class="rounded-2 table table-striped ">
                <thead class="table-primary py-2 text-white rounded-2" style="background-color: #32519b;">
                    <tr>
                        <th class="py-2 text-center">Video title(EN)</th>
                        <th class="py-2 text-center">Video title(AR)</th>
                        <th class="py-2 text-center">Video link</th>
                        <th class="py-2 text-center">Status</th>
                        <th class="py-2 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($videos as $video)
                        <tr class="text-center">
                            <td>{{ $video->video_title_en }}</td>
                            <td>{{ $video->video_title_ar }}</td>
                            <td>{{ $video->video_url }}</td>
                            <td><span class="w-100 rounded-pill badge bg-{{$video->status==1?'success':'danger'}}">{{$video->status==1?'Active':'InActive'}}</span></td>
                            <td>
                                <a class="btn btn-primary-custom edit-video"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editVideoModal"
                                    data-id="{{$video->video_id}}"
                                    data-video_title_en="{{$video->video_title_en}}"
                                    data-video_title_ar="{{$video->video_title_ar}}"
                                    data-video_url="{{$video->video_url}}"
                                    data-status="{{$video->status}}"
                                    >Edit</a>
                                <a href="{{ route('deleteDoctorMedia', $video->video_id) }}" class="btn btn-danger"onclick="return confirm('Are you sure you want to delete this video  ?');">Delete</a>
                                <a href="{{ route('toggleMediaStatus', $video->video_id) }}" class="toggle btn btn-outline-{{$video->status==1?'danger':'success'}}"onclick="return confirm('Are you sure you want to change this video staus ?');">{{$video->status==1?'Deactivate':'Activate'}}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end align-items-center px-3 py-3 text-align-right">
                {{ $videos->links('pagination::bootstrap-5') }}
            </div>

        </div>
      </div>
   </div>
</section>
<div class="modal fade" id="editVideoModal" tabindex="-1">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <form id="edit_Video_form"  method="POST" action="{{ route('UpdateDoctorMedia') }}">
            @csrf
            <div class="modal-header bg-light-gray">
               <h5 class="modal-title" id="modal_title"></h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body bg-light-gray">
                <div class="row p-3">
                    <input type="hidden" id="modal_video_id"name="video_id">
                        <div class="col-md-6">
                           <label for="title_en" class="form-label">Video title(En)</label>
                           <input type="text" class="form-control w-100 d-block border-0" id="edit_video_title_en" name="title_en" placeholder="Enter Video title(En)">
                        </div>
                        <div class="col-md-6">
                           <label for="title_ar" class="form-label">عنوان الفيديو باللغة العربية</label>
                           <input type="text" class="form-control w-100 d-block border-0" id="edit_video_title_ar" name="title_ar" placeholder="ادخل عنوان الفيديو باللغة العربية">
                        </div>
                     </div>
                     <div class="row p-3">
                        <div class="col-md-6">
                           <label for="video_url" class="form-label">Video Link</label>
                           <input type="text" class="form-control w-100 d-block border-0" id="edit_video_url" name="video_url" placeholder="Enter Video link">
                        </div>
                        <div class="col-md-6">
                           <label for="status" class="form-label">Video status</label>
                           <select class="form-select form-control w-100 d-block border-0" id="edit_video_status" name="status">
                              <option value="" disabled selected>Select status</option>
                              <option value="1">Active</option>
                              <option value="0">in active</option>
                           </select>
                        </div>
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
   $(document).on('click', '.edit-video', function () {

   const VideoID   = $(this).data('id');
   const Video_title_en = $(this).data('video_title_en');
   const Video_title_ar = $(this).data('video_title_ar');
   const Video_url = $(this).data('video_url');
   const Video_status = $(this).data('status');

   $('#modal_title').text('Edit video: '+ Video_title_ar)
   $('#modal_video_id').val(VideoID)
    $('#edit_video_title_en').val(Video_title_en);
    $('#edit_video_title_ar').val(Video_title_ar);
    $('#edit_video_url').val(Video_url);
    $('#edit_video_status').val(Video_status);


   });

</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    @if ($errors->any())
        DashboardAlert.error("{{ $errors->first() }}");
    @endif

    @if (session('success'))
        DashboardAlert.success("{{ session('success') }}");
    @endif
});
</script>
@endsection
