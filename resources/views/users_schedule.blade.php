@extends('layouts.app')

@section('menu-users', true)

@section('title', 'Manage User Schedule')

@section('breadcrumb')
    <ol class="breadcrumb text-right">
        <li><a href="/dashboard">Dashboard</a></li>
        <li><a href="/users">Users</a></li>
        <li>{{ $user->full_name }}</li>
        <li class="active">Schedule</li>
    </ol>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Edit {{ $user->full_name }}'s Schedule</strong><br/>
        </div>
        <div class="card-body card-block">

        </div>
    </div>
@endsection

@section('scripts')
    <script src="/js/users.js"></script>

    <!-- Full calendar -->
    <script src='/plugins/fullcalendar-3.10.0/lib/moment.min.js'></script>
    <script src='/plugins/fullcalendar-3.10.0/fullcalendar.js'></script>
@endsection

@section('stylesheets')
    <link rel='stylesheet' href='/plugins/fullcalendar-3.10.0/fullcalendar.css' />
@endsection