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
                    <form id="kt_inbox_compose_form">
                        <textarea id="kt_docs_tinymce_basic" name="kt_docs_tinymce_basic" class="tox-target">
                            <h1>Quick and Simple TinyMCE 5 Integration</h1>
                            <p>Here goes the&nbsp;<a href="#">Minitial content of the editor</a>. Lorem Ipsum is simply dummy text of the&nbsp;<em>printing and typesetting</em>&nbsp;industry.</p>
                            <blockquote>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</blockquote>
                            <h3 style="text-align: right;">Flexible &amp; Powerful</h3>
                            <p style="text-align: right;"><strong>Lorem Ipsum has been the industry's</strong>&nbsp;standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.</p>
                            <ul>
                                <li>List item 1</li>
                                <li>List item 2</li>
                                <li>List item 3</li>
                                <li>List item 4</li>
                            </ul>
                        </textarea>
                        <!--begin::Footer-->
                        <div class="d-flex flex-stack flex-wrap gap-2 py-5 ps-8 pe-5 border-top">
                            <!--begin::Actions-->
                            <div class="d-flex align-items-center me-3">
                                <!--begin::Send-->
                                <div class="btn-group me-4">
                                    <!--begin::Submit-->
                                    <span class="btn btn-primary fs-bold px-6" data-kt-inbox-form="send">
                                        <span class="indicator-label">Send</span>
                                        <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </span>
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
            selector: "#kt_docs_tinymce_basic",
            height: "480"
        };

        if (KTThemeMode.getMode() === "dark") {
            options["skin"] = "oxide-dark";
            options["content_css"] = "dark";
        }

        tinymce.init(options);
    </script>
@stop
