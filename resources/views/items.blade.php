@extends('layouts.app')

@section('menu-items', true)

@section('title', 'Items')

@section('breadcrumb')
    <ol class="breadcrumb text-right">
        <li><a href="/dashboard">Dashboard</a></li>
        <li class="active">Items</li>
    </ol>
@endsection

@section('content')
    <div class="items">
        <div class="row">
            <div class="col-md-6 col-lg-5">
                <div class="form-group">
                    <input id="search" name="search" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Search...">
                </div>
            </div>
            <div class="col-md-6 col-lg-7 text-right">
                <div class="form-group">
                    <a href="/items/add">
                        <button type="button" class="btn btn-outline-primary"><i class="fa fa-plus"></i>&nbsp; Add a new item</button>
                    </a>
                </div>
            </div>
        </div>
        @if (count($items) === 0)
            <div class="alert alert-info" role="alert">
                No items!
            </div>
        @else
            <table id="itemsTable" class="table table-striped">
                <thead class="thead-dark">
                <tr>
                    <th class="checkbox" scope="col">
                        <input type="checkbox" class="checkboxAll">
                    </th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Category</th>
                    <th scope="col">Date Added</th>
                    <th class="active text-center" scope="col">Active</th>
                    <th class="actions text-right" scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($items as $item)
                    <tr data-id="{{$item->id}}" data-name="{{$item->name}}">
                        <td class="checkbox align-middle">
                            <input type="checkbox" id="itemCheckbox_{{$item->id}}" name="itemCheckbox{{$item->id}}" class="itemCheckbox">
                        </td>
                        <td class="align-middle searchable">{{$item->name}}</td>
                        <td class="align-middle searchable">
                            @if (!empty($item->price_special))
                                {{$item->price_special}} <s>{{$item->price}}</s>
                            @else
                                {{$item->price}}
                            @endif
                        </td>
                        <td class="align-middle searchable">
                            {{$item->category->name}}
                        </td>
                        <td class="align-middle searchable">{{$item->created_at}}</td>
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
    <script src="/js/items.js"></script>
@endsection