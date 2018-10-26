@extends('layouts.app')

@section('title', 'Categories')

@section('subtitle', 'You can manage the categories in your website here')

@section('breadcrumb')
    <ol class="breadcrumb text-right">
        <li><a href="/dashboard">Dashboard</a></li>
        <li class="active">Categories</li>
    </ol>
@endsection

@section('content')
    <div class="items">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <input id="search" name="search" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Search...">
                </div>
            </div>
            <div class="col-6 text-right">
                <div class="form-group">
                    <a href="/categories/add">
                        <button type="button" class="btn btn-outline-primary"><i class="fa fa-plus"></i>&nbsp; Add a new category</button>
                    </a>
                </div>
            </div>
        </div>
        @if (count($categories) === 0)
            <div class="alert alert-info" role="alert">
                No categories!
            </div>
        @else
            <table class="table table-striped">
                <thead class="thead-dark">
                <tr>
                    <th class="checkbox" scope="col">
                        <input type="checkbox" class="checkboxAll">
                    </th>
                    <th scope="col">Name</th>
                    <th class="text-right" scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td class="checkbox align-middle">
                                <input type="checkbox" id="categoryCheckbox_{{$category->id}}" name="categoryCheckbox{{$category->id}}">
                            </td>
                            <td class="align-middle">{{$category->name}}</td>
                            <td class="text-right align-middle">
                                <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Moveup">
                                    <i class="fa fa-arrow-up"></i>
                                </button>
                                <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Movedown">
                                    <i class="fa fa-arrow-down"></i>
                                </button>
                                <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Delete">
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