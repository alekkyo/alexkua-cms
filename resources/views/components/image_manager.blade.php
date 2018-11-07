<div class="modal-dialog modal-lg" role="document" id="imageManager">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="largeModalLabel">Image Manager</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="imagesList" style="border: 1px black solid; width:100%; height:250px; float:left;"></div>
            <div class="uploadImage" style="text-align:center; padding-top: 20px; width:100%; height:75px; float:left;">
                <form name="formImageManager" action="/api/image-manager/images" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" name="image"/>
                    <input type="submit" value="Save"/>
                </form>
            </div>
            {{--<div class="selectedPicture" style="background-color:green; width:300px; height:375px; float:left;"></div>--}}
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" id="chooseBtn">Choose</button>
        </div>
    </div>
</div>