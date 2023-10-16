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
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Product Thumbnail</label>
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
                                    <option selected value="">Select a category</option>
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
                                    <input class="form-check-input w-45px h-30px" type="checkbox" name="is_available" id="is_available"
                                        checked="checked" />
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
        var options = {
            selector: "#description",
            height: "480"
        };

        if (KTThemeMode.getMode() === "dark") {
            options["skin"] = "oxide-dark";
            options["content_css"] = "dark";
        }

        tinymce.init(options);
    </script>
    <script>
        var thumbnailInput = document.getElementById("thumbnail_data");

        // Parse the existing array from the input value
        var thumbnailArray = thumbnailInput.value ? JSON.parse(thumbnailInput.value) : [];

        var thumbnailDropzone = new Dropzone("#thumbnail_upload_zone", {
            url: '{!! route('admin.uploadImage') !!}', // Set the url for your upload script location
            paramName: "file", // The name that will be used to transfer the file
            headers: {
                'X-CSRF-TOKEN': '{!! csrf_token() !!}'
            },
            maxFiles: 1,
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            success: function(file, response) {
                file.serverFilename = response.filename;

                // Add values to the array
                thumbnailArray.push(file.serverFilename);

                // Update the input value with the modified array
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

                // Remove a specific value from the array (e.g., 'photo1.jpg')
                removeValueFromArray(file.serverFilename);

                // Update the input value with the modified array
                thumbnailInput.value = JSON.stringify(photosArray);
                // remove picture from dropzone
                var _ref;
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) :
                    void 0;
            }
        });
    </script>
    <script>
        // Get the input element
        var photosInput = document.getElementById("photos_data");

        // Parse the existing array from the input value
        var photosArray = photosInput.value ? JSON.parse(photosInput.value) : [];

        var productDropzone = new Dropzone("#photo_upload_zone", {
            url: '{!! route('admin.uploadImage') !!}', // Set the url for your upload script location
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 10,
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': '{!! csrf_token() !!}'
            },
            success: function(file, response) {
                file.serverFilename = response.filename;

                // Add values to the array
                photosArray.push(file.serverFilename);

                // Update the input value with the modified array
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

                // Remove a specific value from the array (e.g., 'photo1.jpg')
                removeValueFromArray(file.serverFilename);

                // Update the input value with the modified array
                photosInput.value = JSON.stringify(photosArray);
                // remove picture from dropzone
                var _ref;
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) :
                    void 0;
            }
        });
    </script>
    {{-- <script>
        //save the product
        // Wait for the document to load before adding the event listener
        document.addEventListener("DOMContentLoaded", function() {
            // Find the "Save Product" button by its ID
            var saveButton = document.getElementById("kt_account_profile_details_submit");

            // Find the form by its ID
            var form = document.getElementById("add_product_form");

            // Add a click event listener to the button
            saveButton.addEventListener("click", function() {
                // Trigger the form submission when the button is clicked
                form.submit();
            });
        });
    </script> --}}
    <script>
        // Define form element
        const form = document.getElementById('add_product_form');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        var validator = FormValidation.formValidation(
            form, {
                fields: {
                    // 'thumbnail_data': {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'Thumbnail is required'
                    //         }
                    //     }
                    // },
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
                                message: 'price is required'
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
            // Prevent default button action
            e.preventDefault();

            // Validate form before submit
            if (validator) {
                validator.validate().then(function(status) {
                    console.log('validated!');

                    if (status == 'Valid') {
                        // Show loading indication
                        submitButton.setAttribute('data-kt-indicator', 'on');

                        // Disable button to avoid multiple click
                        submitButton.disabled = true;

                        // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                        setTimeout(function() {
                            // Remove loading indication
                            submitButton.removeAttribute('data-kt-indicator');

                            // Enable button
                            submitButton.disabled = false;

                            // Show popup confirmation
                            Swal.fire({
                                text: "Form has been successfully submitted!",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });

                            form.submit(); // Submit form
                        }, 2000);
                    }
                });
            }
        });
    </script>
@stop
