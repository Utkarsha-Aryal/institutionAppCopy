@extends('backend.layout.main')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>


@section('title')
    About Us
@endsection
<style>
    .relative {
        position: relative;
        width: 150px !important;
        padding-right: 0 !important;
    }

    .absolute {
        position: absolute;
        right: 0 !important;
    }
</style>
@section('main-content')
    <style>
        .ql-container {
            height: 200px;
        }

        .ql-editor {
            min-height: 100% !important;
        }

        input#admission_open {
            border: 1px solid rgb(176, 176, 176) !important
        }
    </style>
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <div>
            <h4 class="mb-0">About Us</h4>
            <p class="mb-0 text-muted">About us.</p>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- row -->
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.aboutus.update') }}" id="about-us-form" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-10">
                        <label for="introduction">Introduction of organization <span class="required-field">*</span></label>
                        <textarea class="form-control mt-2" id="introduction"name="introduction" rows="8"
                            placeholder="Enter introduction...">{{ $aboutusData['introduction'] }}</textarea>
                    </div>

                    <div class="form-group col-2">
                        <div class="row">
                            <div class="mt-2">
                                <label for="img_introduction">Introduction image</label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="relative" id="edit-image">
                                <div class="profile-user">
                                    <label for="edit_img_introduction"
                                        class="fe fe-camera profile-edit text-primary absolute"></label>
                                </div>
                                <input type="file" class="edit_img_introduction" id="edit_img_introduction"
                                    style="position: absolute; clip: rect(0, 0, 0, 0); pointer-events: none;"
                                    accept="image/*"name="img_introduction">
                                <input type="hidden" class="form-control croppedImgIntroduction"
                                    id="croppedImgIntroduction" name="croppedImgIntroduction">
                                <div class="img-rectangle">
                                    @if (!empty($aboutusData['img_introduction']))
                                        <img alt=""
                                            src={{ asset('/storage/aboutus') . '/' . @$aboutusData['img_introduction'] }}
                                            alt="img" id="img_introduction">
                                    @else
                                        <img src="{{ asset('/no-image.jpg') }}" alt="Default Image"id="img_introduction">
                                    @endif

                                </div>
                            </div>
                            <div class="row mt-2 ms-1">
                                <p class="p-0 m-0">Accepted Format :<span class="text-muted"> jpg/jpeg/png</span></p>
                                <p class="p-0 m-0">File size :<span class="text-muted"> (300x475) in pixels</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-10">
                        <label for="vision">Vision <span class="required-field">*</span></label>
                        <textarea class="form-control mt-2" id="vision"name="vision" rows="8" placeholder="Enter Vision...">{{ @$aboutusData['vision'] }}</textarea>
                    </div>
                    <div class="form-group col-2">
                        <div class="row">
                            <div class="mt-2">
                                <label for="img_vision">Vision image</label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="relative" id="edit-image">
                                <div class="profile-user">
                                    <label for="edit_img_vision"
                                        class="fe fe-camera profile-edit text-primary absolute"></label>
                                </div>
                                <input type="file" class="edit_img_vision" id="edit_img_vision"
                                    style="position: absolute; clip: rect(0, 0, 0, 0); pointer-events: none;"
                                    accept="image/*"name="img_vision">

                                <div class="img-rectangle">
                                    @if (!empty($aboutusData['img_vision']))
                                        <img alt=""
                                            src={{ asset('/storage/aboutus') . '/' . @$aboutusData['img_vision'] }}
                                            alt="img" id="img_vision">
                                    @else
                                        <img src="{{ asset('/no-image.jpg') }}" alt="Default Image"id="img_vision">
                                    @endif

                                </div>
                            </div>
                            <div class="row mt-2 ms-1">
                                <p class="p-0 m-0">Accepted Format :<span class="text-muted"> jpg/jpeg/png</span></p>
                                <p class="p-0 m-0">File size :<span class="text-muted"> (300x475) in pixels</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-10">
                        <label for="mission">Mission <span class="required-field">*</span></label>
                        <textarea class="form-control mt-2" id="mission"name="mission" rows="8"placeholder="Enter mission...">{{ @$aboutusData['mission'] }}</textarea>
                    </div>

                    <div class="form-group col-2">
                        <div class="row">
                            <div class="mt-2">
                                <label for="img_mission">Mission image</label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="relative" id="edit-image">
                                <div class="profile-user">
                                    <label for="edit_img_mission"
                                        class="fe fe-camera profile-edit text-primary absolute"></label>
                                </div>
                                <input type="file" class="edit_img_mission" id="edit_img_mission"
                                    style="position: absolute; clip: rect(0, 0, 0, 0); pointer-events: none;"
                                    accept="image/*"name="img_mission">

                                <div class="img-rectangle">
                                    @if (!empty($aboutusData['img_mission']))
                                        <img alt=""
                                            src={{ asset('/storage/aboutus') . '/' . @$aboutusData['img_mission'] }}
                                            alt="img" id="img_mission">
                                    @else
                                        <img src="{{ asset('/no-image.jpg') }}" alt="Default Image"id="img_mission">
                                    @endif

                                </div>
                            </div>
                            <div class="row mt-2 ms-1">
                                <p class="p-0 m-0">Accepted Format :<span class="text-muted"> jpg/jpeg/png</span></p>
                                <p class="p-0 m-0">File size :<span class="text-muted"> (300x475) in pixels</span></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-3">
                        <label for="student_each_year">Student Each Year</label>
                        <input type="text" class="form-control mt-1" id="student_each_year" name="student_each_year"
                            value="{{ $aboutusData['student_each_year'] }}"placeholder="Enter number of student each year eg 1K / 500">
                    </div>
                    <div class="form-group col-3">
                        <label for="professional_teacher">Professional Teacher</label>
                        <input type="number" class="form-control mt-1" id="professional_teacher"
                            name="professional_teacher" value="{{ $aboutusData['professional_teacher'] }}"
                            placeholder="Enter number of professional teacher eg 200">
                    </div>
                    <div class="form-group col-3">
                        <label for="awards">Awards/Wining</label>
                        <input type="number" class="form-control mt-1" id="awards" name="awards"
                            value="{{ $aboutusData['awards'] }}"placeholder="Enter Awards/Wining eg 15">
                    </div>
                    <div class="form-group col-3">
                        <label for="inputEmail3">Year of experiences </label>
                        <input type="number" class="form-control mt-1" id="year_of_experiences"
                            name="year_of_experiences"
                            value="{{ $aboutusData['year_of_experiences'] }}"placeholder="Enter year of experiences eg 10">
                    </div>

                </div>
                <div class="row ms-0">
                    <div class="form-check col-xl-6 col-lg-6 col-md-6 col-sm-6">
                        <input class="form-check-input" type="checkbox" value="Y" id="admission_open"
                            name="admission_open" {{ @$aboutusData['admission_open'] === 'Y' ? 'checked' : '' }}>
                        <label class="form-check-label" for="admission_open">
                            Admission Open
                        </label>
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-end mt-3">
                    <button type="button" class="btn btn-primary"id="save_about"><i class="fa fa-save"></i>
                        Update</button>
                </div>
            </form>
        </div>
    </div>
    <!-- row close -->
    {{-- crop modal-start --}}

    <div class="modal cropModel fade" id="cropModel" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Crop Image</h5>
                    <button type="button" class="closeCrop" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <div class="row">
                            <div class="col-md-12">
                                <img id="image" src="#" style="height: 200px; width: 250px;">
                            </div>
                            <div class="col-md-12">
                                <div class="preview"></div>
                            </div>
                        </div>
                    </div>
                    <div id="controls">
                        <button id="rotateLeft">Rotate Left</button>
                        <button id="rotateRight">Rotate Right</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn_btn cancel_btn cancelCrop" id="cancelCrop">Cancel</button>
                    <button type="button" class="btn_btn submit_btn" id="cropImage">Crop</button>
                </div>
            </div>
        </div>
    </div>
    {{-- crop modal-end --}}
@endsection

@section('script')
    {{-- crop image-start --}}
    <script>
        var cropper;
        $(document).ready(function() {

            //cancel Crop Model --Start
            $('.cancelCrop').off('click', '');
            $('.cancelCrop').on('click', function(e) {

                var imageIntroduction = $('.edit_img_introduction')[0].files[0];
                $('#img_introduction').attr('src', URL.createObjectURL(imageIntroduction));
                $('#cropModel').modal('hide');
            });
            //close Model --End

            //to pass image url to crop model ---Start
            $('.edit_img_introduction').off('change');
            $('.edit_img_introduction').on("change", function(e) {
                var files = e.target.files;
                var done = function(url) {
                    $('#image').attr('src', url);
                    $('#cropModel').modal('show');
                };
                var reader;
                var file;
                var url;

                if (files && files.length > 0) {
                    file = files[0];
                    if (URL) {
                        done(URL.createObjectURL(file));
                    }
                }
            });
            //to pass image url to crop model ---End

            //to crop images---Start
            $('#cropModel').off('shown.bs.modal');
            $('#cropModel').on('shown.bs.modal', function() {
                var image = document.getElementById('image');

                cropper = new Cropper(image, {
                    // initailAspectRatio: 1,
                    aspectRatio: NaN,
                    viewMode: 1,
                    moveable: false,
                    zoomOnWheel: false,

                    preview: '.preview',
                });


                $("#rotateRight").on("click", e => {
                    cropper.rotate(90);
                });

                $("#rotateLeft").on("click", e => {
                    cropper.rotate(-90);
                });
            }).on('hidden.bs.modal', function() {
                cropper.destroy();
                cropper = null;
            });
            //to crop images---End

            //save crop image ---Start
            var base64data;
            $('#cropImage').off('click');
            $('#cropImage').on('click', function() {

                canvas = cropper.getCroppedCanvas({
                    width: 160,
                    height: 160,
                });
                canvas.toBlob(function(blob) {
                    url = URL.createObjectURL(blob);
                    $('#img_introduction').attr('src', url);
                    var reader = new FileReader();
                    reader.readAsDataURL(blob);
                    reader.onloadend = function() {
                        base64data = reader.result;
                        $('#cropModel').modal('hide');
                        $('#croppedImgIntroduction').val(base64data);
                    }
                })
            });
            //save crop image ---End
        });
    </script>
    {{-- crop image-end --}}


    <script>

function showLoader() {
            $('#loadingOverlay').show();
        }
        function hideLoader() {
            $('#loadingOverlay').hide();
        }



        $(document).ready(function() {
            $('#edit_img_introduction').on('change', function(event) {
                var selectedFile = event.target.files[0];

                if (selectedFile) {
                    $('#img_introduction').attr('src', URL.createObjectURL(selectedFile));
                }
            });

            $('#edit_img_vision').on('change', function(event) {
                var selectedFile = event.target.files[0];

                if (selectedFile) {
                    $('#img_vision').attr('src', URL.createObjectURL(selectedFile));
                }
            });

            $('#edit_img_mission').on('change', function(event) {
                var selectedFile = event.target.files[0];

                if (selectedFile) {
                    $('#img_mission').attr('src', URL.createObjectURL(selectedFile));
                }
            });

            $('#about-us-form').validate({
                rules: {
                    introduction: "required",
                    vision: "required",
                    mission: "required",
                },
                message: {
                    introduction: {
                        required: "Please enter introduction"
                    },
                    vision: {
                        required: "Please enter vision"
                    },
                    mission: {
                        required: "Please enter mission"
                    },
                },
                highlight: function(element) {
                    $(element).addClass('border-danger')
                },
                unhighlight: function(element) {
                    $(element).removeClass('border-danger')
                },
            });

            $('#save_about').off('click');
            $('#save_about').on('click', function(e) {
                if ($('#about-us-form').valid()) {
                    showLoader();
                    $('#about-us-form').ajaxSubmit(function(response) {
                        var parseResponse = JSON.parse(response);
                        if (parseResponse) {
                            hideLoader();
                            showNotification(parseResponse.message, parseResponse.type);

                        } else {
                            hideLoader();
                        }

                    });
                }
            });

        });
    </script>
@endsection
