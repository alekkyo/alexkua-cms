@extends('layouts.app')

@section('menu-users', true)

@section('title', 'Users')

@section('breadcrumb')
    <ol class="breadcrumb text-right">
        <li><a href="/dashboard">Dashboard</a></li>
        <li class="active">Users</li>
    </ol>
@endsection

@section('content')
    <div class="users">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <input id="search" name="search" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Search...">
                </div>
            </div>
            <div class="col-6 text-right">
                <div class="form-group">
                    <a href="/users/add">
                        <button type="button" class="btn btn-outline-primary"><i class="fa fa-plus"></i>&nbsp; Add a new user</button>
                    </a>
                </div>
            </div>
        </div>
        @if (count($users) === 0)
            <div class="alert alert-info" role="alert">
                No users!
            </div>
        @else
            <table id="usersTable" class="table table-striped">
                <thead class="thead-dark">
                <tr>
                    <th class="checkbox" scope="col">
                        <input type="checkbox" class="checkboxAll">
                    </th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th class="active text-center" scope="col">Active</th>
                    <th class="actions text-right" scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr data-id="{{$user->id}}" data-name="{{$user->name}}">
                        <td class="checkbox align-middle">
                            <input type="checkbox" id="userCheckbox_{{$user->id}}" name="userCheckbox{{$user->id}}" class="itemCheckbox">
                        </td>
                        <td class="align-middle searchable">{{$user->full_name}}</td>
                        <td class="align-middle searchable">{{$user->username}}</td>
                        <td class="align-middle searchable">{{$user->email}}</td>
                        <td class="active text-center align-middle">
                            <label class="switch switch-3d switch-success">
                                <input type="checkbox" class="switch-input" checked="true">
                                <span class="switch-label"></span>
                                <span class="switch-handle"></span>
                            </label>
                        </td>
                        <td class="actions text-right align-middle">
                            <button type="button" class="editBtn btn btn-default" data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="fa fa-pencil"></i>
                            </button>
                            <button type="button" class="deleteBtn btn btn-default" data-toggle="tooltip" data-placement="top" title="Delete">
                                <i class="fa fa-remove"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection

@section('scripts')
    <script src="/js/users.js"></script>
@endsection