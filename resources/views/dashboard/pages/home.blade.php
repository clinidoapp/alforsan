@extends('layouts.dashboard')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard Overview')

@section('content')
<div class="row g-4 dashboard-counters">
 @if(\App\Helpers\Permissions::hasPermission('read_doctor'))
    <div class="col-md-4">
        <a class="text-decoration-none" href="{{ route('doctors-list') }}">
        <div class="card shadow-sm">

                <div class="card-header">
                    <h3>Total Doctors</h3>
                </div>
                <div class="card-body d-flex justify-content-between">
                    <h4 class="fw-bold">
                        {{$doctor_count}} Doctor</h4>
                        <img class="icon" src="{{ asset('images/dashboard-icons/doctor.webp') }}" alt="Total Doctors Icon">
                    </div>
                </div>
            </a>
    </div>
@endif
@if(\App\Helpers\Permissions::hasPermission('read_service'))
    <div class="col-md-4">
            <a class="text-decoration-none" href="{{ route('service-list') }}">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3>Total Services</h3>
            </div>
            <div class="card-body d-flex justify-content-between">
                <h4 class="fw-bold">
                    {{$services_count}} services</h4>
                <img class="icon" src="{{ asset('images/dashboard-icons/services.webp') }}" alt="Total services Icon">

            </div>
        </div>
        </a>
    </div>
@endif
@if(\App\Helpers\Permissions::hasPermission('read_booking_request'))

    <div class="col-md-4">
        <a class="text-decoration-none" href="{{ route('booking-requests') }}">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3>Total booking</h3>
            </div>
            <div class="card-body d-flex justify-content-between">
                <h4 class="fw-bold">
                    {{$bookings_count}} Booking</h4>
                <img class="icon" src="{{ asset('images/dashboard-icons/booking.webp') }}" alt="Total Booking Icon">
            </div>
        </div>
        </a>

    </div>
    @endif
</div>
@endsection
