@extends('layouts.app')

@section('menu-items', true)

@section('title', 'Add a new item')

@section('breadcrumb')
    <ol class="breadcrumb text-right">
        <li><a href="/dashboard">Dashboard</a></li>
        <li><a href="/items">Items</a></li>
        <li class="active">Add item</li>
    </ol>
@endsection

@section('content')
    <div class="card">
        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="card-header">
                <strong>Add Item</strong><br/>Fill up the form to add a new item
            </div>
            <div class="card-body card-block">
                <!-- Name -->
                <div class="row form-group">
                    <div class="col col-md-3"><label for="name" class=" form-control-label">Name*</label></div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="name" name="name" class="form-control" required>
                        <small class="form-text text-muted">This is the name of your item</small>
                    </div>
                </div>
                <!-- Description -->
                <div class="row form-group">
                    <div class="col col-md-3"><label for="description" class=" form-control-label">Description</label></div>
                    <div class="col-12 col-md-9">
                        <textarea name="description" id="description" rows="9" class="form-control"></textarea>
                        <small class="form-text text-muted">This is the description accompanying your item</small>
                    </div>
                </div>

                <!-- Price -->
                <div class="row form-group">
                    <div class="col col-md-3"><label for="price" class="form-control-label">Price*</label></div>
                    <div class="col-12 col-md-9">
                        <input type="number" id="price" name="price" class="form-control" step="0.01" required>
                        <small class="form-text text-muted">This is the original price of the item</small>
                    </div>
                </div>

                <!-- Price special -->
                <div class="row form-group">
                    <div class="col col-md-3"><label for="price_special" class=" form-control-label">Special price (optional):</label></div>
                    <div class="col-12 col-md-9">
                        <input type="number" id="price_special" name="price_special" class="form-control" step="0.01">
                        <small class="form-text text-muted">This is the special price of the item. Leave it empty if not applicable.</small>
                    </div>
                </div>

                <!-- Image -->
                <div class="row form-group" id="imageInput">
                    <div class="col col-md-3"><label for="name" class=" form-control-label">Picture</label></div>
                    <div class="col-12 col-md-9">
                        <div class="input-group">
                            <p class="form-control-static imageName">No image</p>&nbsp;
                            <a href="javascript:null" class="imageManagerBtn"><i class="fa fa-picture-o"></i></a>
                            <input type="hidden" name="image" id="image" value=""/>
                            <a href="javascript:null" onClick="removeImage()" class="imageRemove" style="display:none;"><i class="fa fa-remove"></i></a>
                        </div>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="category" class="form-control-label">Category</label></div>
                    <div class="col-12 col-md-9">
                        <select name="category" id="category" class="form-control" required>
                            <option value="">Please select</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                @foreach ($category['children'] as $child)
                                    <option value="{{ $child['id'] }}">- {{ $child['name'] }}</option>
                                @endforeach
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="reset" id="resetItemForm" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
                <button type="submit" id="submitItemForm" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="/js/items.js"></script>
    <script src="/js/image-manager.js"></script>
    <script>
        imageManager.init(function(image) {
            jQuery('#imageInput .imageName').html('<a target="_blank" href="' + image + '">' + image.replace('/images/uploads/', '') + '</a>');
            jQuery('#imageInput #image').html(image);
            jQuery('#imageInput .imageRemove').show();
            jQuery('#imageInput .imageManagerBtn').hide();
        });
        function removeImage() {
            jQuery('#imageInput .imageName').html('No image');
            jQuery('#imageInput #image').html('');
            jQuery('#imageInput .imageRemove').hide();
            jQuery('#imageInput .imageManagerBtn').show();
        }
    </script>
@endsection