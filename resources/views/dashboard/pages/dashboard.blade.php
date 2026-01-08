@extends('layouts.dashboard')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard Overview')

@section('content')
<div class="row g-4">
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6 class="text-muted">Total Users</h6>
                <h3 class="fw-bold">1,250</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6 class="text-muted">Revenue</h6>
                <h3 class="fw-bold">$18,400</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6 class="text-muted">Orders</h6>
                <h3 class="fw-bold">320</h3>
            </div>
        </div>
    </div>
</div>
@endsection
