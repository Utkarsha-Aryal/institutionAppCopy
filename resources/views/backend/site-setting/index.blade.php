@extends('backend.layout.main')
@section('title','Site Setting')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">


@section('main-content')
 <!-- Page Header -->
 <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <div>
            <h4 class="mb-0">Site Setting</h4>
            <p class="mb-0 text-muted">Site Setting.</p>
        </div>
    </div>
    <!-- End Page Header -->
 
    <!-- row -->
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.sitesetting.update') }}" id="site-setting-form"
                enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-4">
                        <label for="inputEmail4">Organization Name <span class="required-field">*</span></label>
                        <input type="text" class="form-control mt-1" id="name" name="name"
                            value="{{ isset($siteSettings) ? $siteSettings['name'] : old('name') }}"
                            placeholder="Enter school name">
                    </div>
                    <div class="form-group col-4">
                        <label for="email">Email </label>
                        <input type="email" class="form-control mt-1" id="email" name="email"
                            value="{{ $siteSettings['email'] }}" placeholder="Enter email">
                    </div>
                    <div class="form-group col-4">
                        <label for="phone_number">Phone Number</label>
                        <input type="number" class="form-control mt-1" id="phone_number" name="phone_number"
                            value="{{ $siteSettings['phone_number'] }}" placeholder="Enter phone number">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-4">
                        <label for="inputEmail4">Address <span class="required-field">*</span></label>
                        <input type="text" class="form-control mt-1" id="address" name="address"
                            value="{{ $siteSettings['address'] }}" placeholder="Enter address">
                    </div>
                    <div class="form-group col-4">
                        <label for="link_facebook">Facebook Link</label>
                        <input type="text" class="form-control mt-1" id="facebook" name="link_facebook"
                            value="{{ $siteSettings['link_facebook'] }}" placeholder="Enter facebook link">
                    </div>
                    <div class="form-group col-4">
                        <label for="link_instagram">Instagram Link</label>
                        <input type="text" class="form-control mt-1" id="instagram" name="link_instagram"
                            value="{{ $siteSettings['link_instagram'] }}" placeholder="Enter instagram link">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-4">
                        <label for="link_twitter">Twitter(X) Link</label>
                        <input type="text" class="form-control mt-1" id="twitter" name="link_twitter"
                            value="{{ $siteSettings['link_twitter'] }}" placeholder="Enter twitter link">
                    </div>
                    <div class="form-group col-4">
                        <label for="link_linkedin">Linkedin Link</label>
                        <input type="text" class="form-control mt-1" id="linkedin" name="link_linkedin"
                            value="{{ $siteSettings['link_linkedin'] }}" placeholder="Enter linkedin link">
                    </div>
                    <div class="form-group col-4">
                        <label for="link_youtube">Youtube Link</label>
                        <input type="text" class="form-control mt-1" id="youtube" name="link_youtube"
                            value="{{ $siteSettings['link_youtube'] }}" placeholder="Enter youtube link">
                    </div>
                </div>
                <div class="row">

                    <div class="form-group col-4">
                        <label for="link_map">Map Link</label>
                        <textarea class="form-control mt-1" id="link_map"name="link_map" rows="3"placeholder="Enter google map link">{{ $siteSettings['link_map'] }}</textarea>
                    </div>
                    <div class="form-group col-4">
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="img_logo">Logo </label>
                            </div>
                            <div class="form-group col-6">
                                <div class="main-profile-overview">
                                    <div class="main-img-user profile-user user-profile">
                                        <label for="input_logo" class="fe fe-camera profile-edit text-primary"></label>
                                        <input type="file" id="input_logo" class="input_logo"
                                            style="position: absolute; clip: rect(0, 0, 0, 0); pointer-events: none;"
                                            accept="image/*" name="img_logo">
                                        <input type="hidden" class="form-control croppedImg" id="croppedImg"
                                            name="croppedImg">
                                        <input type="hidden" class="form-control croppedImgFavicon"
                                            id="croppedImgFavicon" name="croppedImgFavicon">
                                        @if (!empty($siteSettings['img_logo']))
                                            <img aorganizationlt=""
                                                src="{{ asset('/storage/setting') . '/' . $siteSettings['img_logo'] }}"
                                                alt="img" id="img_logo">
                                        @else
                                            <img src="{{ asset('/no-image.jpg') }}" alt="Default Image" id='img_logo'>
                                        @endif
                                    </div>
                                </div>
                                <div class="row ms-1">
                                    <p class="p-0 m-0">Accepted Format :<span class="text-muted"> jpg/jpeg/png</span></p>
                                    <p class="p-0 m-0">File size :<span class="text-muted"> (300x475) in pixels</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-4">
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="img_favicon">Favicon</label>

                            </div>
                            <div class="form-group col-6">
                                <div class="main-profile-overview">
                                    <div class="main-img-user profile-user user-profile">
                                        <a>
                                            <label for="input_favicon"
                                                class="fe fe-camera profile-edit text-primary"></label>
                                            <input type="file" id="input_favicon"class="input_favicon"
                                                style="position: absolute; clip: rect(0, 0, 0, 0); pointer-events: none;"
                                                accept="image/*"name="img_favicon">
                                            @if (!empty($siteSettings['img_favicon']))
                                                <img alt=""
                                                    src="{{ asset('/storage/setting') . '/' . $siteSettings['img_favicon'] }}"
                                                    alt="img" id="img_favicon">
                                            @else
                                                <img src="{{ asset('/no-image.jpg') }}" alt="Default Image"
                                                    id='img_favicon'>
                                            @endif
                                        </a>
                                    </div>
                                </div>
                                <div class="row ms-1">
                                    <p class="p-0 m-0">Accepted Format :<span class="text-muted"> jpg/jpeg/png</span></p>
                                    <p class="p-0 m-0">File size :<span class="text-muted"> (300x475) in pixels</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Row for Logo and Favicon -->
              

                <div class="card-footer d-flex justify-content-end">
                    <button type="button" class="btn btn-primary" id="save_site_setting"><i class="fa fa-save"></i> Update</button>
                </div>
            </form>
        </div>
    </div>




    <script>
        function showLoader() {
            $('#loadingOverlay').show();
        }
        function hideLoader() {
            $('#loadingOverlay').hide();
        }

        
    $(document).ready(function() {
    // Frontend validation
    $('#site-setting-form').validate({
        rules: {
            name: "required",
            address: "required",
        },
        messages: {
            name: {
                required: "Please enter organization name.",
            },
            address: {
                required: "Please enter address.",
            },
        },
        highlight: function(element) {
            $(element).addClass('border-danger');
        },
        unhighlight: function(element) {
            $(element).removeClass('border-danger');
        },
    });

    // Upload logo preview
    $('#input_logo').on('change', function(event) {
        var selectedFile = event.target.files[0];
        if (selectedFile) {
            $('#img_logo').attr('src', URL.createObjectURL(selectedFile));
        }
    });

    // Upload favicon preview
    $('#input_favicon').on('change', function(event) {
        var selectedFile = event.target.files[0];
        if (selectedFile) {
            $('#img_favicon').attr('src', URL.createObjectURL(selectedFile));
        }
    });

    // Save site setting on button click
    $('#save_site_setting').on('click', function(e) {
        console.log('clicked')
        e.preventDefault();
        if ($('#site-setting-form').valid()) {
            // Show loader (optional)
            showLoader();

            var formData = new FormData($('#site-setting-form')[0]);

            // Perform AJAX request
            $.ajax({
                url: "{{ route('admin.sitesetting.update') }}",  // Form submission URL
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  // CSRF token
                },
                success: function(response) {
                    // Hide loader (optional)
                    hideLoader();

                    // Show success message or handle response
                    showNotification(response.message, 'success');
                },
                error: function(xhr) {
                    hideLoader();
                    showNotification('Something went wrong!', 'error');
                }
            });
        }
    });
});

   
</script>


@endsection
