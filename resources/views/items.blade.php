@extends('layouts.app')

@section('title', 'Manage items')

@section('breadcrumb')
    <ol class="breadcrumb text-right">
        <li><a href="/dashboard">Dashboard</a></li>
        <li class="active">Items</li>
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
            <table class="table table-striped">
                <thead class="thead-dark">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
                </thead>
                <tbody>

                    @foreach ($items as $item)
                        <tr>
                            <th scope="row">
                                <input type="checkbox" id="inline-checkbox3" name="inline-checkbox3" value="option3" class="form-check-input">
                            </th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection