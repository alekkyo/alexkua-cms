@extends('layouts.app')

@section('menu-users', true)

@section('title', 'Add a new user')

@section('breadcrumb')
    <ol class="breadcrumb text-right">
        <li><a href="/dashboard">Dashboard</a></li>
        <li><a href="/users">Users</a></li>
        <li class="active">Add user</li>
    </ol>
@endsection

@section('content')
    <div class="card">
        <form id="formAddUser" action="/api/users" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="card-header">
                <strong>Add User</strong><br/>Fill up the form to add a new user
            </div>
            <div class="card-body card-block">
                <!-- Username -->
                <div class="row form-group">
                    <div class="col col-md-3"><label for="username" class=" form-control-label">Username*</label></div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="username" name="username" class="form-control" required>
                    </div>
                </div>
                <!-- Email -->
                <div class="row form-group">
                    <div class="col col-md-3"><label for="email" class=" form-control-label">Email*</label></div>
                    <div class="col-12 col-md-9">
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                </div>
                <!-- First Name -->
                <div class="row form-group">
                    <div class="col col-md-3"><label for="firstName" class=" form-control-label">First Name*</label></div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="firstName" name="firstName" class="form-control" required>
                    </div>
                </div>
                <!-- Last Name -->
                <div class="row form-group">
                    <div class="col col-md-3"><label for="lastName" class=" form-control-label">Last Name*</label></div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="lastName" name="lastName" class="form-control" required>
                    </div>
                </div>
                <!-- Password -->
                <div class="row form-group">
                    <div class="col col-md-3"><label for="password" class=" form-control-label">Password*</label></div>
                    <div class="col-12 col-md-9">
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                </div>
                <!-- Confirm Password -->
                <div class="row form-group">
                    <div class="col col-md-3"><label for="confirmPassword" class=" form-control-label">Confirm Password*</label></div>
                    <div class="col-12 col-md-9">
                        <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="reset" id="resetUserBtn" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
                <button type="submit" id="submitUserBtn" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="/js/users.js"></script>
@endsection