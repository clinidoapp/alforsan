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
                     <input type="text" id="request_id" name="request_id" class="form-control" placeholder="Booking Id" value="{{ $search['request_id'] ?? '' }}">
                     <input type="text" id="patient_name"name="patient_name"class="form-control"placeholder="Patient Name"value="{{ $search['patient_name'] ?? '' }}">
                     <input type="text" id="patient_phone"name="patient_phone"class="form-control"placeholder="Patient Phone"value="{{ $search['patient_phone'] ?? '' }}">
                     <select class="form-select" name="service_id">
                           <option selected disabled>{{__('words.service label')}}</option>
                        @foreach ($bookingServices as $service )
                        <option value="{{$service->id}}" {{$service->id == $search['service_id']?'selected':''}}>{{ $service->service_name }}</option>

                        @endforeach
                        </select>
                    </div>
                  <div class="col-md-3 d-flex gap-3 justify-content-end">
                     <button class="w-50 btn btn-primary-custom">Search</button>
                     <a href="{{ route('booking-requests') }}" class="w-50 btn btn-outline-primary">Reset</a>
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
               <tbody class="text-center">
                @foreach ($BookRequests as $request)
                    <tr>
                     <td>{{$request->id}}</td>
                     <td>{{$request->name}}</td>
                     <td>{{$request->phone}}</td>
                     <td>{{$request->email}}</td>
                     <td>{{$request->service_name}}</td>
                     <td>{{date('d/m/Y', strtotime($request->created_at))}}</td>
                  </tr>
                @endforeach

               </tbody>
            </table>
             <div class="d-flex justify-content-end align-items-center px-3 py-3 text-align-right">
                {{ $BookRequests->links('pagination::bootstrap-5') }}
            </div>

         </div>
   </div>
</section>

@endsection
