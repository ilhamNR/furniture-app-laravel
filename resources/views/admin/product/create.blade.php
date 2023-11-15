@extends('admin.components.layout')

@section('content')

    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">

        <!--begin::Basic info-->
        <div class="card mb-5 mb-xl-10">
            <!--begin::Card header-->
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <h3 class="fw-bold m-0">Add a Product</h3>
                </div>
                <!--end::Card title-->
            </div>
            <!--begin::Card header-->
            <!--begin::Content-->
            <div id="kt_account_settings_profile_details" class="collapse show">
                <!--begin::Form-->
                <form id="add_product_form" class="form" action="{{ route('admin.saveProduct') }}" method="POST">
                    @csrf
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Product Thumbnail</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <!--begin::Form-->
                                <input type="text" hidden id="thumbnail_data" name="thumbnail_data">
                                <form class="form" action="#" method="post">
                                    <!--begin::Input group-->
                                    <div class="fv-row">
                                        <!--begin::Dropzone-->
                                        <div class="dropzone" id="thumbnail_upload_zone">
                                            <!--begin::Message-->
                                            <div class="dz-message needsclick">
                                                <!--begin::Icon-->
                                                <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                <!--end::Icon-->

                                                <!--begin::Info-->
                                                <div class="ms-4">
                                                    <h3 class="fs-5 fw-bold text-gray-900 mb-1">Drop picture here or click
                                                        to upload.</h3>
                                                    <span class="fs-7 fw-semibold text-gray-400">Upload 1 picture</span>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                        </div>
                                        <!--end::Dropzone-->
                                    </div>
                                    <!--end::Input group-->
                                </form>
                                <!--end::Form-->
                                <!--begin::Hint-->
                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                <!--end::Hint-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Product Photos</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <input type="text" hidden id="photos_data" name="photos_data" value="">
                                <!--begin::Form-->
                                <form class="form" action="#" method="post">
                                    <!--begin::Input group-->
                                    <div class="fv-row">
                                        <!--begin::Dropzone-->
                                        <div class="dropzone" id="photo_upload_zone">
                                            <!--begin::Message-->
                                            <div class="dz-message needsclick">
                                                <!--begin::Icon-->
                                                <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                <!--end::Icon-->

                                                <!--begin::Info-->
                                                <div class="ms-4">
                                                    <h3 class="fs-5 fw-bold text-gray-900 mb-1">Drop picture here or click
                                                        to upload.</h3>
                                                    <span class="fs-7 fw-semibold text-gray-400">Upload 10 pictures
                                                        maximum</span>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                        </div>
                                        <!--end::Dropzone-->
                                    </div>
                                    <!--end::Input group-->
                                </form>
                                <!--end::Form-->
                                <!--begin::Hint-->
                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                <!--end::Hint-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Product Name</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="name" id="name"
                                    class="form-control form-control-lg form-control-solid" placeholder="Product name"
                                    value="" />
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="required">Price</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="number" name="price" id="price"
                                    class="form-control form-control-lg form-control-solid" placeholder="Price"
                                    value="" />
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="required">Category</span>

                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <select name="category" aria-label="Select a Category" data-control="select2"
                                    data-placeholder="Select a category..."
                                    class="form-select form-select-solid form-select-lg fw-semibold">
                                    <option value="">Select a category</option>
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Description</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <textarea id="description" name="description" class="tox-target">
                                </textarea>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-0">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Is Available</label>
                            <!--begin::Label-->
                            <!--begin::Label-->
                            <div class="col-lg-8 d-flex align-items-center">
                                <div class="form-check form-check-solid form-switch fv-row">
                                    <input class="form-check-input w-45px h-30px" type="checkbox" name="is_available"
                                        id="is_available" checked="checked" />
                                    <label class="form-check-label" for="allowmarketing"></label>
                                </div>
                            </div>
                            <!--begin::Label-->
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Card body-->
                    <!--begin::Actions-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                        <button type="button" class="btn btn-primary" id="kt_account_profile_details_submit">Save
                            Product</button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Basic info-->
    </div>
    <!--end::Content container-->
@stop

@section('script')
    <script src="{{ url('admin/assets/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>
    <script>
        // Configuration options for TinyMCE
        var options = {
            selector: "#description", // The CSS selector of the textarea to convert into an editor.
            height: "480" // The height of the editor in pixels.
        };

        // Check if the website's theme mode is dark
        if (KTThemeMode.getMode() === "dark") {
            // If the theme is dark, set some additional options for a dark theme.
            options["skin"] = "oxide-dark"; // Specify the dark skin for TinyMCE.
            options["content_css"] = "dark"; // Use dark-themed content CSS.
        }

        // Initialize the TinyMCE editor with the specified options.
        tinymce.init(options);
    </script>

    <script>
        // Get the HTML input element with the id "thumbnail_data"
        var thumbnailInput = document.getElementById("thumbnail_data");

        // Parse the existing array from the input value (if available)
        var thumbnailArray = thumbnailInput.value ? JSON.parse(thumbnailInput.value) : [];

        // Initialize a Dropzone instance for image uploads
        var thumbnailDropzone = new Dropzone("#thumbnail_upload_zone", {
            url: '{!! route('admin.uploadImage') !!}', // Specify the URL for your image upload script
            paramName: "file", // The name used to transfer the file
            headers: {
                'X-CSRF-TOKEN': '{!! csrf_token() !!}' // Include the CSRF token in the headers
            },
            maxFiles: 1, // Maximum number of files to upload
            maxFilesize: 10, // Maximum file size in megabytes
            addRemoveLinks: true, // Add links to remove uploaded files
            success: function(file, response) {
                file.serverFilename = response.filename;

                // Add the server-generated filename to the array
                thumbnailArray.push(file.serverFilename);

                // Update the input value with the modified array as JSON
                thumbnailInput.value = JSON.stringify(thumbnailArray);
                console.log(file);
            },
            removedfile: function(file) {
                // Function to remove a specific value from the array
                function removeValueFromArray(value) {
                    var index = thumbnailArray.indexOf(value);
                    if (index > -1) {
                        thumbnailArray.splice(index, 1); // Remove the value at the specified index
                    }
                }

                // Remove the file's server-generated filename from the array
                removeValueFromArray(file.serverFilename);

                // Update the input value with the modified array as JSON
                thumbnailInput.value = JSON.stringify(thumbnailArray);

                // Remove the file from the Dropzone display
                var _ref;
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) :
                    void 0;
            }
        });
    </script>

    <script>
        // Get the input element
        var photosInput = document.getElementById("photos_data");

        // Parse the existing array from the input value (if available)
        var photosArray = photosInput.value ? JSON.parse(photosInput.value) : [];

        // Initialize a Dropzone instance for image uploads
        var productDropzone = new Dropzone("#photo_upload_zone", {
            url: '{!! route('admin.uploadImage') !!}', // Specify the URL for your image upload script
            paramName: "file", // The name used to transfer the file
            maxFiles: 10, // Maximum number of files to upload
            maxFilesize: 10, // Maximum file size in megabytes
            addRemoveLinks: true, // Add links to remove uploaded files
            headers: {
                'X-CSRF-TOKEN': '{!! csrf_token() !!}' // Include the CSRF token in the headers
            },
            success: function(file, response) {
                file.serverFilename = response.filename;

                // Add the server-generated filename to the array
                photosArray.push(file.serverFilename);

                // Update the input value with the modified array as JSON
                photosInput.value = JSON.stringify(photosArray);
                console.log(file);
            },
            removedfile: function(file) {
                // Function to remove a specific value from the array
                function removeValueFromArray(value) {
                    var index = photosArray.indexOf(value);
                    if (index > -1) {
                        photosArray.splice(index, 1); // Remove the value at the specified index
                    }
                }

                // Remove the file's server-generated filename from the array
                removeValueFromArray(file.serverFilename);

                // Update the input value with the modified array as JSON
                photosInput.value = JSON.stringify(photosArray);

                // Remove the file from the Dropzone display
                var _ref;
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) :
                    void 0;
            }
        });
    </script>

    <script>
        // Define the form element
        const form = document.getElementById('add_product_form');

        // Initialize form validation rules using the FormValidation plugin
        var validator = FormValidation.formValidation(
            form, {
                fields: {
                    'name': {
                        validators: {
                            notEmpty: {
                                message: 'Name is required'
                            }
                        }
                    },
                    'price': {
                        validators: {
                            notEmpty: {
                                message: 'Price is required'
                            }
                        }
                    },
                    'category': {
                        validators: {
                            notEmpty: {
                                message: 'Category is required'
                            }
                        }
                    },
                    'description': {
                        validators: {
                            notEmpty: {
                                message: 'Description is required'
                            }
                        }
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );

        // Submit button handler
        const submitButton = document.getElementById('kt_account_profile_details_submit');
        submitButton.addEventListener('click', function(e) {
            // Prevent the default button action
            e.preventDefault();

            // Validate the form before submission
            if (validator) {
                validator.validate().then(function(status) {
                    console.log('validated!');

                    if (status == 'Valid') {
                        // Show loading indication
                        submitButton.setAttribute('data-kt-indicator', 'on');

                        // Disable the button to prevent multiple clicks
                        submitButton.disabled = true;
                        // Submit the form
                        form.submit();

                        // Simulate form submission with a delay
                        setTimeout(function() {
                            // Remove loading indication
                            submitButton.removeAttribute('data-kt-indicator');

                            // Enable the button
                            submitButton.disabled = false;
                            // Show a success popup confirmation
                            Swal.fire({
                                text: "Form has been successfully submitted!",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });


                        }, 2000);
                    }
                });
            }
        });
    </script>

@stop
