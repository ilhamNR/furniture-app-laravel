@extends('admin.components.layout')

@section('header')
    <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
@stop

@section('content')
    <!--begin::Wrapper-->
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Card-->
        <div class="card p-8">
            <div class="d-flex flex-stack mb-5">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                            <path
                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                fill="currentColor"></path>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <input type="text" data-kt-docs-table-filter="search"
                        class="form-control form-control-solid w-250px ps-15" placeholder="Search categories" />
                </div>
                <!--end::Search-->

                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
                    <!--begin::Add category-->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_1"
                        title="Coming Soon">
                        <span class="svg-icon svg-icon-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2"
                                    rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor"></rect>
                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1"
                                    fill="currentColor"></rect>
                            </svg>
                        </span>
                        Add category
                    </button>
                    <!--end::Add category-->
                </div>
                <!--end::Toolbar-->

                <!--begin::Group actions-->
                <div class="d-flex justify-content-end align-items-center d-none" data-kt-docs-table-toolbar="selected">
                    <div class="fw-bold me-5">
                        <span class="me-2" data-kt-docs-table-select="selected_count"></span> Selected
                    </div>

                    <button type="button" class="btn btn-danger" data-bs-toggle="tooltip"
                        data-kt-docs-table-select="delete_selected" title="Coming Soon">
                        Selection Action
                    </button>
                </div>
                <!--end::Group actions-->
            </div>
            <!--end::Wrapper-->

            <!--begin::Datatable-->
            <table id="category_table" class="table align-middle table-row-dashed fs-6 gy-5">
                <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">
                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                <input class="form-check-input" type="checkbox" data-kt-check="true"
                                    data-kt-check-target="#category_table .form-check-input" value="1" />
                            </div>
                        </th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th class="text-end min-w-100px">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 fw-semibold">
                </tbody>
            </table>
            <!--end::Datatable-->
        </div>
        <!--end::Card-->
    </div>
    {{-- add category modal  --}}
    <div class="modal fade" tabindex="-1" id="kt_modal_1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Add Categories</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                    rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                            </svg>
                        </span>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <!--begin::basic autosize textarea-->
                    <div class="rounded d-flex flex-column">
                        <label for="category-name" class="form-label">Category Name</label>
                        <textarea id="category-name" class="form-control" data-kt-autosize="true"></textarea>
                    </div>
                    <!--end::basic autosize textarea-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="add-category-button">Add Category</button>
                </div>
            </div>
        </div>
    </div>
    <!--end::Content container-->
@stop

@section('script')
    <script>
        var dt;
        "use strict";

        // Class definition
        var KTDatatablesServerSide = function() {
            // Shared variables
            var table;
            // var dt;
            var filterPayment;

            // Private functions
            var initDatatable = function() {
                dt = $("#category_table").DataTable({
                    searchDelay: 500,
                    processing: true,
                    serverSide: true,
                    order: [
                        [1, 'desc']
                    ],
                    stateSave: true,
                    select: {
                        style: 'multi',
                        selector: 'td:first-child input[type="checkbox"]',
                        className: 'row-selected'
                    },
                    ajax: {
                        url: '{!! route('admin.productCategories') !!}',
                    },
                    columns: [{
                            data: 'id'
                        },
                        {
                            data: 'name'
                        },
                        {
                            data: 'slug'
                        },
                    ],
                    columnDefs: [{
                            targets: 0,
                            orderable: false,
                            render: function(data) {
                                return `
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="${data}" />
                            </div>`;
                            }
                        },
                        // {
                        //     targets: 4,
                        //     render: function(data, type, row) {
                        //         return `<img src="${hostUrl}media/svg/card-logos/${row.CreditCardType}.svg" class="w-35px me-3" alt="${row.CreditCardType}">` +
                        //             data;
                        //     }
                        // },
                        {
                            targets: 3,
                            data: null,
                            orderable: false,
                            className: 'text-end',
                            render: function(data, type, row) {
                                return `
                        <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                            Actions
                            <span class="svg-icon svg-icon-5 m-0">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                        <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="currentColor" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
                                    </g>
                                </svg>
                            </span>
                        </a>
                        <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" data-kt-docs-table-filter="delete_row">
                                    Delete
                                </a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu-->
                    `;
                            },
                        },
                    ],
                    // Add data-filter attribute
                    createdRow: function(row, data, dataIndex) {
                        $(row).find('td:eq(4)').attr('data-filter', data.CreditCardType);
                    }
                });

                table = dt.$;

                // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
                dt.on('draw', function() {
                    initToggleToolbar();
                    toggleToolbars();
                    handleDeleteRows();
                    KTMenu.createInstances();
                });
            }

            // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
            var handleSearchDatatable = function() {
                const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
                filterSearch.addEventListener('keyup', function(e) {
                    dt.search(e.target.value).draw();
                });
            }



            // Delete category
            var handleDeleteRows = () => {
                // Select all delete buttons
                const deleteButtons = document.querySelectorAll('[data-kt-docs-table-filter="delete_row"]');

                deleteButtons.forEach(d => {
                    // Delete button on click
                    d.addEventListener('click', function(e) {
                        e.preventDefault();

                        // Select parent row
                        const parent = e.target.closest('tr');

                        // Get category name
                        const categoryName = parent.querySelectorAll('td')[1].innerText;

                        // Get category id
                        const categoryId = parent.querySelectorAll('td')[0];
                        // Find the <input> element within the <td>
                        const inputElement = categoryId.querySelector('input.form-check-input')
                            .value

                        // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                        Swal.fire({
                            text: "Are you sure you want to delete " + categoryName + "?",
                            icon: "warning",
                            showCancelButton: true,
                            buttonsStyling: false,
                            confirmButtonText: "Yes, delete!",
                            cancelButtonText: "No, cancel",
                            customClass: {
                                confirmButton: "btn fw-bold btn-danger",
                                cancelButton: "btn fw-bold btn-active-light-primary"
                            }
                        }).then(function(result) {
                            if (result.value) {
                                fetch('{!! route('admin.deleteProductCategories') !!}', {
                                        method: 'DELETE',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'Accept': "application/json",
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}', // Replace with the actual CSRF token

                                        },
                                        body: JSON.stringify({
                                            ids: [inputElement], // Send the selected IDs as a JSON object
                                        }),
                                    })
                                    .then((response) => {
                                        if (response.ok) {
                                            response.json().then(data => {
                                                // Simulate delete request -- for demo purpose only
                                                Swal.fire({
                                                    text: "Deleting " +
                                                        categoryName,
                                                    icon: "info",
                                                    buttonsStyling: false,
                                                    showConfirmButton: false,
                                                    timer: 1
                                                }).then(function() {
                                                    Swal.fire({
                                                        text: "You have deleted " +
                                                            categoryName +
                                                            "!.",
                                                        icon: "success",
                                                        buttonsStyling: false,
                                                        confirmButtonText: "Ok, got it!",
                                                        customClass: {
                                                            confirmButton: "btn fw-bold btn-primary",
                                                        }
                                                    }).then(
                                                        function() {
                                                            // delete row data from server and re-draw datatable
                                                            dt
                                                        .draw();
                                                        });
                                                });
                                            });

                                        } else {
                                            response.json().then(data => {
                                                Swal.fire({
                                                    text: data.message,
                                                    icon: "error",
                                                    buttonsStyling: false,
                                                    confirmButtonText: "Ok",
                                                    customClass: {
                                                        confirmButton: "btn btn-primary"
                                                    }
                                                });
                                                // You can add code here to close the modal or perform other actions
                                            });
                                            // You can add code here to close the modal or perform other actions
                                        }
                                    })
                            } else if (result.dismiss === 'cancel') {
                                Swal.fire({
                                    text: categoryName + " was not deleted.",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-primary",
                                    }
                                });
                            }
                        });
                    })
                });
            }


            // Init toggle toolbar
            var initToggleToolbar = function() {
                // Toggle selected action toolbar
                // Select all checkboxes
                const container = document.querySelector('#category_table');
                const checkboxes = container.querySelectorAll('[type="checkbox"]');

                // Select elements
                const deleteSelected = document.querySelector('[data-kt-docs-table-select="delete_selected"]');

                // Toggle delete selected toolbar
                checkboxes.forEach(c => {
                    // Checkbox on click event
                    c.addEventListener('click', function() {
                        setTimeout(function() {
                            toggleToolbars();
                        }, 50);
                    });
                });

                // Deleted selected rows
                deleteSelected.addEventListener('click', function() {
                    // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                    Swal.fire({
                        text: "Are you sure you want to delete selected categories?",
                        icon: "warning",
                        showCancelButton: true,
                        buttonsStyling: false,
                        showLoaderOnConfirm: true,
                        confirmButtonText: "Yes, delete!",
                        cancelButtonText: "No, cancel",
                        customClass: {
                            confirmButton: "btn fw-bold btn-danger",
                            cancelButton: "btn fw-bold btn-active-light-primary"
                        },
                    }).then(function(result) {
                        if (result.value) {
                            // Get all the checkboxes with the "row-selected" class within the table body
                            const checkboxes = document.querySelectorAll(
                                'input[type="checkbox"]');

                            // Initialize an empty array to store the values
                            const selectedValues = [];

                            // Loop through the checkboxes and push their values to the array
                            checkboxes.forEach((checkbox) => {
                                if (checkbox.checked === true) {
                                    selectedValues.push(checkbox.value);
                                }
                            });

                            // // Log the selected values to the console
                            // console.log(selectedValues);


                            fetch('{!! route('admin.deleteProductCategories') !!}', {
                                    method: 'DELETE',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'Accept': "application/json",
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}', // Replace with the actual CSRF token

                                    },
                                    body: JSON.stringify({
                                        ids: selectedValues, // Send the selected IDs as a JSON object
                                    }),
                                })
                                .then((response) => {
                                    if (response.ok) {
                                        response.json().then(data => {
                                            Swal.fire({
                                                text: "Deleting selected categories",
                                                icon: "info",
                                                buttonsStyling: false,
                                                showConfirmButton: false,
                                                timer: 1
                                            }).then(function() {
                                                Swal.fire({
                                                    text: data.data,
                                                    icon: "success",
                                                    buttonsStyling: false,
                                                    confirmButtonText: "Ok, got it!",
                                                    customClass: {
                                                        confirmButton: "btn fw-bold btn-primary",
                                                    }
                                                }).then(function() {
                                                    // delete row data from server and re-draw datatable
                                                    dt.draw();
                                                });

                                                // Remove header checked box
                                                const headerCheckbox = container
                                                    .querySelectorAll(
                                                        '[type="checkbox"]')[0];
                                                headerCheckbox.checked = false;
                                            });
                                            // You can add code here to close the modal or perform other actions
                                        });

                                    } else {
                                        response.json().then(data => {
                                            Swal.fire({
                                                text: data.message,
                                                icon: "error",
                                                buttonsStyling: false,
                                                confirmButtonText: "Ok",
                                                customClass: {
                                                    confirmButton: "btn btn-primary"
                                                }
                                            });
                                            // You can add code here to close the modal or perform other actions
                                        });
                                        // You can add code here to close the modal or perform other actions
                                    }
                                })


                            // Simulate delete request -- for demo purpose only
                        } else if (result.dismiss === 'cancel') {
                            Swal.fire({
                                text: "Selected categories was not deleted.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary",
                                }
                            });
                        }
                    });
                });
            }

            // Toggle toolbars
            var toggleToolbars = function() {
                // Define variables
                const container = document.querySelector('#category_table');
                const toolbarBase = document.querySelector('[data-kt-docs-table-toolbar="base"]');
                const toolbarSelected = document.querySelector('[data-kt-docs-table-toolbar="selected"]');
                const selectedCount = document.querySelector('[data-kt-docs-table-select="selected_count"]');

                // Select refreshed checkbox DOM elements
                const allCheckboxes = container.querySelectorAll('tbody [type="checkbox"]');

                // Detect checkboxes state & count
                let checkedState = false;
                let count = 0;

                // Count checked boxes
                allCheckboxes.forEach(c => {
                    if (c.checked) {
                        checkedState = true;
                        count++;
                    }
                });

                // Toggle toolbars
                if (checkedState) {
                    selectedCount.innerHTML = count;
                    toolbarBase.classList.add('d-none');
                    toolbarSelected.classList.remove('d-none');
                } else {
                    toolbarBase.classList.remove('d-none');
                    toolbarSelected.classList.add('d-none');
                }
            }

            // Public methods
            return {
                init: function() {
                    initDatatable();
                    handleSearchDatatable();
                    initToggleToolbar();
                    handleDeleteRows();
                }
            }
        }();

        // Function to reload the DataTable
        var reloadDatatable = function() {
            dt.ajax.reload(null, false); // Use 'false' to keep the current paging position
        };
        // On document ready
        KTUtil.onDOMContentLoaded(function() {
            KTDatatablesServerSide.init();
        });
    </script>

    <script>
        // Add an event listener to the "Add Category" button
        document.addEventListener('DOMContentLoaded', function() {
            const addCategoryButton = document.getElementById('add-category-button');
            const categoryNameInput = document.getElementById('category-name');

            addCategoryButton.addEventListener('click', function() {
                const categoryName = categoryNameInput.value;

                // Perform the AJAX POST request
                fetch('{!! route('admin.createProductcategory') !!}', {
                        method: 'POST',
                        headers: {
                            'Accept': "application/json",
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}', // Replace with the actual CSRF token
                        },
                        body: JSON.stringify({
                            name: categoryName
                        }),
                    })
                    .then(response => {
                        if (response.ok) {
                            //reload datatable
                            reloadDatatable();
                            // close modal
                            // Get a reference to the modal element by its ID
                            var modalElement = document.getElementById('kt_modal_1');

                            // Trigger the 'hide' event to close the modal
                            var modal = bootstrap.Modal.getInstance(modalElement);
                            modal.hide();
                            // Handle a successful response, e.g., close the modal or show a success message
                            response.json().then(data => {
                                Swal.fire({
                                    text: data.data,
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                });
                                // You can add code here to close the modal or perform other actions
                            });
                            // You can add code here to close the modal or perform other actions
                        } else {
                            response.json().then(data => {
                                Swal.fire({
                                    text: data.message,
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                });
                                // You can add code here to close the modal or perform other actions
                            });
                            // You can add code here to close the modal or perform other actions
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        });
    </script>
@stop
