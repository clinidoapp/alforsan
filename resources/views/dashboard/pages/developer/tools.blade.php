@extends('layouts.dashboard')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard Overview')

@section('content')
<div class="row g-4 dashboard-counters">
    <h3>Developer Tools</h3>
    <div class="col-md-4">
        <a href="{{ route('clearOptimize')  }}" class="btn btn-primary-custom w-100">Clear Optimize</a>
    </div>
    <div class="col-md-4">
        <a href="{{ route('clearView')}}" class="btn btn-primary-custom w-100">Clear View</a>
    </div>
    <div class="col-md-4">
        <a href="{{ route('clearConfig')}}" class="btn btn-primary-custom w-100">Clear Config</a>
    </div>
    <div class="col-md-4">
        <a href="{{ route('clearRoute')}}" class="btn btn-primary-custom w-100">Clear Route</a>
    </div>
    <div class="col-md-4">
        <a href="{{ route('clearCache')}}" class="btn btn-primary-custom w-100">Clear Cash</a>
    </div>
    <div class="col-md-4">
        <a href="{{ route('runSeeder')}}" class="btn btn-primary-custom w-100">Run Seeder</a>
    </div>

</div>
@endsection
