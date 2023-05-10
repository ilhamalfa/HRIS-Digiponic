@extends('layouts.template')

@section('title', 'Change Photo Profile')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header mt-3">{{ __('Change Profile Picture') }}<i class="fa-solid fa-image ms-2"></i></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h6>Image Preview</h6>
                                <img class="img-preview d-block" src="{{ asset('storage/' . Auth::user()->foto) }}"
                                    alt="">
                            </div>
                            <div class="col">
                                <h6 class="card-title">Update Your Photo</h6>
                                <input type="file" name="image" class="image">
                                <div class="note mt-3">
                                    <p><i class="fa-solid fa-circle-info me-2 text-info"></i>Note :</p>
                                    <p class="d-flex">
                                        <span>1.</span>
                                        <span class="ms-1">Don't upload photos that contain adult, discriminatory content, or content
                                            that harms others.</span>
                                    </p>
                                    <p class="d-flex">
                                        <span>2.</span>
                                        <span class="ms-1">Make sure you upload photos that are the right size so they don't take up a
                                            lot of storage space and slow down the upload process. Max 200kb!</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel">Crop Your Image</h5>
                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" aria-label="Close">
                                        <i class="fa-solid fa-xmark m-auto"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="img-container">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                                            </div>
                                            <div class="col-md-4">
                                                <h6 class="ms-2">Image Preview</h6>
                                                <div class="preview"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary" id="crop">Crop</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script>
        var $modal = $('#modal');
        var image = document.getElementById('image');
        var cropper;

        $("body").on("change", ".image", function(e) {
            var files = e.target.files;
            var done = function(url) {
                image.src = url;
                $modal.modal('show');
            };
            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function(e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
        $modal.on('shown.bs.modal', function() {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 3,
                preview: '.preview'
            });
        }).on('hidden.bs.modal', function() {
            cropper.destroy();
            cropper = null;
        });
        $("#crop").click(function() {
            canvas = cropper.getCroppedCanvas({
                width: 160,
                height: 160,
            });
            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result;

                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "/profile/photo-profile/update",
                        data: {
                            '_token': $('meta[name="_token"]').attr('content'),
                            'image': base64data
                        },
                        success: function(data) {
                            console.log(data);
                            $modal.modal('hide');
                            alert("Crop image successfully uploaded");
                            location.reload();
                        }
                    });
                }
            });
        })
    </script>
@endsection
