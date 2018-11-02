@extends('layouts.app')

@section('menu-categories', true)

@section('title', 'Add a new category')

@section('breadcrumb')
    <ol class="breadcrumb text-right">
        <li><a href="/dashboard">Dashboard</a></li>
        <li><a href="/categories">Categories</a></li>
        <li class="active">Add Category</li>
    </ol>
@endsection

@section('content')
    <div class="card">
        <form id="formAddCategory" action="/api/categories" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="card-header">
                <strong>Add Category</strong><br/>Fill up the form to add a new category
            </div>
            <div class="card-body card-block">
                <!-- Category name -->
                <div class="row form-group">
                    <div class="col col-md-3"><label for="name" class=" form-control-label">Name*</label></div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="name" name="name" class="form-control" required>
                        <small class="form-text text-muted">This is the name of your category</small>
                    </div>
                </div>
                <!-- Parent category -->
                <div class="row form-group">
                    <div class="col col-md-3"><label for="parentCategory" class="form-control-label">Category</label></div>
                    <div class="col-12 col-md-9">
                        <select name="parentCategory" id="parentCategory" class="form-control">
                            <option value="">No parent</option>
                            @foreach ($parentCategories as $parentCategory)
                                <option value="{{$parentCategory->id}}">{{$parentCategory->name}}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Choose a category parent if category is a sub-category.</small>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="reset" id="resetCategoryBtn" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
                <button type="submit" id="submitCategoryBtn" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
            </div>
            {!! csrf_field() !!}
        </form>
    </div>
@endsection

@section('scripts')
    <script src="/js/categories.js"></script>
@endsection