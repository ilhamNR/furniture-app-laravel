@extends('admin.components.layout')

@section('content')
    <!--begin::Inbox App - Compose -->
    <div class="d-flex flex-column flex-lg-row">
        <!--begin::Content-->
        <div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">
            <!--begin::Card-->
            <div class="card">
                <div class="card-header align-items-center">
                    <div class="card-title">
                        <h2>Edit About Us</h2>
                    </div>
                </div>
                <div class="card-body p-0">
                    <!--begin::Form-->
                    <form id="kt_inbox_compose_form" action="{{ route('admin.aboutUs.update') }}" method="POST">
                        @csrf
                        <textarea id="about-us-form" class="tox-target">
                            {!! $about_us !!}
                        </textarea>
                        <!--begin::Footer-->
                        <div class="d-flex flex-stack flex-wrap gap-2 py-5 ps-8 pe-5 border-top">
                            <!--begin::Actions-->
                            <div class="d-flex align-items-center me-3">
                                <!--begin::Send-->
                                <div class="btn-group me-4">
                                    <!--begin::Submit-->
                                    <button type="button" class="btn btn-primary fs-bold px-6"
                                        id="save-about-us-button">Save</button>
                                    <!--end::Submit-->
                                </div>
                                <!--end::Send-->
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Footer-->
                    </form>
                    <!--end::Form-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Inbox App - Compose -->

@stop

@section('script')
    <script src="assets/plugins/custom/tinymce/tinymce.bundle.js"></script>
    <script>
        var options = {
            selector: "#about-us-form",
            height: "480"
        };

        if (KTThemeMode.getMode() === "dark") {
            options["skin"] = "oxide-dark";
            options["content_css"] = "dark";
        }

        tinymce.init(options);
    </script>
    <script>
        const saveButton = document.getElementById('save-about-us-button');

        saveButton.addEventListener('click', function() {
            const aboutUsValue = tinymce.get("about-us-form").getContent();
            const data = {
                value: aboutUsValue
            };

            fetch('{{ route('admin.aboutUs.update') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify(data),
                })
                .then(response => {
                    return response.json();
                })
                .then(data => {
                    Swal.fire({
                        text: data.data,
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                })
                .catch(error => {
                    // Handle errors (e.g., network error, server error)
                    Swal.fire({
                        text: error,
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                });
        });
    </script>
@stop
