@extends('backend.layout.main')
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/jquery.validate.min.js"></script>
<!-- Quill CSS -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<!-- Quill JS -->
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

<meta name="csrf-token" content="{{ csrf_token() }}">

@section('title')
    Our Team
@endsection
@section('main-content')
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <div class="my-auto">
            <h5 class="page-title fs-21 mb-1">Our Team</h5>
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Our Team</li>
                </ol>
            </nav>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <div class="pe-1 mb-xl-0">
                <button type="button" class="btn btn-primary edit-our-team" data-bs-toggle="modal"
                    data-bs-target="#modal"><i class="fa fa-add"></i> Add</button>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                {{-- Content goes here --}}
            </div>
        </div>
    </div>
    <!-- Page Header Close -->
    <!-- Start::row-1 -->

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

    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        Member List
                    </div>
                    <div class="row ms-0">
                        <div class="form-check col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <input class="form-check-input" type="checkbox" value="Y" id="trashed_file"
                                name="trashed_file">
                            <label class="form-check-label" for="trashed_file">
                                View Trashed
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="datatable-basic_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 mb-3">
                                    <div class="dataTables_length" id="datatable-basic_length">
                                        <table id="table"
                                            class="table table-bordered text-nowrap w-100 dataTable no-footer mt-3"
                                            aria-describedby="datatable-basic_info">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Name</th>
                                                    <th>Phone Number</th>
                                                    <th>Member Order</th>
                                                    <th>Member Type</th>
                                                    <th>Designation</th>
                                                    <th>Facebook</th>
                                                    <th>Instagram</th>
                                                    <th>linkedin</th>
                                                    <th>Twitter</th>
                                                    <th>Short Bio</th>
                                                    <th>Photo</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End::row-1 -->
@endsection

@section('script')
    {{-- crop image-start --}}
    <script>
        var cropper;
        $(document).ready(function() {

            function showLoader() {
                $('#loadingOverlay').show();
            }

            function hideLoader() {
                $('#loadingOverlay').hide();
            }

            //cancel Crop Model --Start
            $('.cancelCrop').off('click', '');
            $('.cancelCrop').on('click', function(e) {

                var photo = $('.photo')[0].files[0];
                $('._image').attr('src', URL.createObjectURL(photo));
                $('#cropModel').modal('hide');
            });
            //close Model --End

            //to pass image url to crop model ---Start
            $('.photo').off('change');
            $('.photo').on("change", function(e) {
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
                    initailAspectRatio: 1,
                    aspectRatio: 1,
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
                    $('._image').attr('src', url);
                    var reader = new FileReader();
                    reader.readAsDataURL(blob);
                    reader.onloadend = function() {
                        base64data = reader.result;
                        $('#cropModel').modal('hide');
                        $('#croppedImg').val(base64data);
                    }
                })
            });
            //save crop image ---End
        });
    </script>
    {{-- crop image-end --}}

    <script>
        var table;
        $(document).ready(function() {
            table = $('#table').DataTable({
                "sPaginationType": "full_numbers",
                "bSearchable": false,
                "lengthMenu": [
                    [5, 10, 15, 20, 25, -1],
                    [5, 10, 15, 20, 25, "All"]
                ],
                'iDisplayLength': 15,
                "sDom": 'ltipr',
                "bAutoWidth": false,
                "aaSorting": [
                    [0, 'desc']
                ],
                "bSort": false,
                "bProcessing": true,
                "bServerSide": true,
                "oLanguage": {
                    "sEmptyTable": "<p class='no_data_message text-center'>No data available.</p>"
                },
                "aoColumnDefs": [{
                    "bSortable": false,
                    "aTargets": [1]
                }],
                "aoColumns": [{
                        "data": "sno"
                    },
                    {
                        "data": "name"
                    },
                    {
                        "data": "phone_number"
                    },
                    {
                        "data": "order"
                    },
                    {
                        "data": "category"
                    },
                    {
                        "data": "designation"
                    },

                    {
                        "data": "facebook_url",
                        "render": function(data, type, row) {
                            if (data) {
                                return '<a href="' + data +
                                    '" target="_blank"><i class="bi bi-facebook"></i></a>';
                            } else {
                                return '<i class="bi bi-x-lg"></i>';
                            }

                        }
                    },
                    {
                        "data": "instagram_url",
                        "render": function(data, type, row) {
                            if (data) {

                                return '<a href="' + data +
                                    '" target="_blank"><i class="bi bi-instagram"></i></a>';
                            } else {
                                return '<i class="bi bi-x-lg"></i>';
                            }
                        }
                    },
                    {
                        "data": "linkedin_url",
                        "render": function(data, type, row) {
                            if (data) {


                                return '<a href="' + data +
                                    '" target="_blank"><i class="bi bi-linkedin"></i></a>';
                            } else {
                                return '<i class="bi bi-x-lg"></i>';
                            }
                        }
                    },
                    {
                        "data": "twitter_url",
                        "render": function(data, type, row) {
                            if (data) {

                                return '<a href="' + data +
                                    '" target="_blank"><i class="bi bi-twitter"></i></a>';

                            } else {
                                return '<i class="bi bi-x-lg"></i>';
                            }
                        }
                    },

                    {
                        "data": "short_bio"
                    },
                    {
                        "data": "photo"
                    },
                    {
                        "data": "action"
                    },
                ],
                "ajax": {
                    "url": '{{ route('admin.member.list') }}',
                    "type": "POST",
                    "headers": {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    "data": function(d) {
                        var type = $('#trashed_file').is(':checked') == true ? 'trashed' :
                            'nottrashed';
                        d.type = type;
                    }
                },
                "initComplete": function() {
                    // Ensure text input fields in the header for specific columns with placeholders
                    this.api().columns([1, 2, 3, 4]).every(function() {
                        var column = this;
                        var input = document.createElement("input");
                        var columnName = column.header().innerText.trim();
                        // Append input field to the header, set placeholder, and apply CSS styling
                        $(input).appendTo($(column.header()).empty())
                            .attr('placeholder', columnName).css('width',
                                '100%') // Set width to 100%
                            .addClass(
                                'search-input-highlight') // Add a CSS class for highlighting
                            .on('keyup change', function() {
                                column.search(this.value).draw();
                            });
                    });
                }
            });


            // Edit Our Team
            $(document).off('click', '.edit-our-team');
            $(document).on('click', '.edit-our-team', function() {
                var id = $(this).data('id');
                var url = '{{ route('admin.member.form') }}';
                var data = {
                    id: id,
                    _token: '{{ csrf_token() }}' // Add the CSRF token
                };
                $.post(url, data, function(response) {
                    $('#modal .modal-content').html(response);
                    $('#modal').modal('show');
                });
            });


            // view trashed items-start
            $('#trashed_file').off('change');
            $('#trashed_file').on('change', function(e) {
                table.draw();
            });
            // view trashed items-ends


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            // Delete team
            $(document).off('click', '.delete-our-team');
            $(document).on('click', '.delete-our-team', function() {

                var type = $('#trashed_file').is(':checked') == true ? 'trashed' :
                    'nottrashed';

                Swal.fire({
                    title: type === "nottrashed" ? "Are you sure you want to delete this item" :
                        "Are you sure you want to delete permanently  this item",
                    text: "This action cannot be undone.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DB1F48",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Delete"
                }).then((result) => {
                    if (result.isConfirmed) {
                        var id = $(this).data('id');

                        var data = {
                            id: id,
                            type: type,
                        };
                        var url = '{{ route('admin.member.delete') }}';
                        $.post(url, data, function(response) {
                            var result = JSON.parse(response);
                            if (result) {
                                if (result.type === 'success') {
                                    //showNotification(result.message, 'success');
                                    table.draw();
                                    hideLoader();
                                } else {
                                    showNotification(result.message, 'error');
                                    hideLoader();
                                }
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
