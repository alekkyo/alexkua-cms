var imageManager = (function ($) {
    var callbackFunction;
    function init(callback) {
        // Image manager on click
        $('.imageManagerBtn').click(function() {
            $.get('/api/image-manager', function(data) {
                $("#modal").html(data);
                $("#modal").modal('show');
                getImages();
                initModalEvents();
                callbackFunction = callback;
            });
        });
    }
    function getImages() {
        $.get('/api/image-manager/images', function(data) {
            data.map(function(image) {
                $("#imageManager .imagesList").append(
                    '<div class="image" style="cursor:pointer; width:50px; height:50px; float:left;"><img style="width:50px; height:50px;" src="/images/uploads/' + image + '"></div>');
                $("#imageManager .imagesList .image").click(function() {
                    $("#imageManager .imagesList .image").removeClass('active');
                    $(this).addClass('active');
                });
            });
        });
    }
    function initModalEvents() {
        // Choose button
        $('#imageManager #chooseBtn').click(function() {
            var image = $("#imageManager .imagesList .image.active img");
            if (image.length === 0) {
                toastr.error('Please choose an image!');
                return;
            }
            $("#modal").modal('hide');
            callbackFunction(image.attr('src'));
        });
        // Image upload
        var form = document.forms.namedItem("formImageManager");
        form.addEventListener('submit', function(ev) {
            var oOutput = document.querySelector("div"),
                oData = new FormData(form);

            var oReq = new XMLHttpRequest();
            oReq.open("POST", "/api/image-manager/upload", true);
            oReq.onload = function(oEvent) {
                if (oReq.status === 200) {
                    oOutput.innerHTML = "Uploaded!";
                } else {
                    oOutput.innerHTML = "Error " + oReq.status + " occurred when trying to upload your file.<br \/>";
                }
            };

            oReq.send(oData);
            ev.preventDefault();
        }, false);
    }
    return {
        init: init,
    };
}(jQuery));