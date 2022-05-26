@extends('admin.layouts.main',['title' => 'User Management'])

@section('breadcrumb')
<li class="breadcrumb-item pe-3"><a href="{{ route('admin.admin') }}" class="pe-3"><i class="fa fa-home text-hover-primary"></i></a></li>
<li class="breadcrumb-item px-3"><a class="text-hover-primary text-muted" href="{{ route('admin.user') }}">User</a></li>
<li class="breadcrumb-item px-3 text-primary">Create</li>
@endsection

@section('content')
<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-fluid">


        <!--begin::Layout-->
        <div class="d-flex flex-column flex-lg-row">

            <!--begin::Content-->
            <div class="flex-lg-row-fluid me-lg-15 order-2 order-lg-1 mb-10 mb-lg-0">
                <!--begin::Form-->
                
                @include('layouts.alerts.error')

                <form class="form" method="POST" action="{{ route('admin.user.store') }}" id="user_form">
                   @csrf

                    <!--begin::Card-->
                    <div class="card shadow-lg card-flush pt-3 mb-5 mb-lg-10">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2 class="fw-bolder">Login Credentials</h2>
                            </div>
                            <!--begin::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">

                            <div class="mt-3">
                                <label for="exampleFormControlInput1" class="required form-label fs-5 fw-bolder">User Name</label>
                                <input type="text" class="form-control form-control-solid" name="name" placeholder="User Name" required/>
                            </div>

                            <div class="mt-3">
                                <label for="exampleFormControlInput1" class="required form-label fs-5 fw-bolder">Email</label>
                                <input type="email" class="form-control form-control-solid" name="email" id="user_email" placeholder="Email" required/>
                            </div>

                            <div class="mt-3">
                                <label for="exampleFormControlInput1" class="required form-label fs-5 fw-bolder">Password</label>
                                <input type="password" class="form-control form-control-solid" name="password" placeholder="Password"/ required>
                            </div>

                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->

                    <!--begin::Card-->
                    <div class="card shadow-lg card-flush pt-3 mb-5 mb-lg-10">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2 class="fw-bolder required">Select Role</h2>
                            </div>
                            <!--begin::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">

                            <div class="row">

                                <div class="col-md-12">
                                    <select class="form-select" aria-label="Select Role" required name="role">
                                        <option selected disabled>Select Role</option>
                                        @foreach ($roles as $role)
                                        <option value={{ $role->id }}>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                            </div>

                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->

                </form>
                <!--end::Form-->
            </div>
            <!--end::Content-->
            <!--begin::Sidebar-->
            <div class="flex-column flex-lg-row-auto w-100 w-lg-250px w-xl-300px mb-10 order-2 order-lg-2">
                <!--begin::Card-->
                <div class="card shadow-lg card-flush pt-3 mb-0" data-kt-sticky="true" data-kt-sticky-name="subscription-summary" data-kt-sticky-offset="{default: false, lg: '200px'}" data-kt-sticky-width="{lg: '250px', xl: '300px'}" data-kt-sticky-left="auto" data-kt-sticky-top="150px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2>Summary</h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body scroll-x  pt-0 fs-6" style="height: 50vh" id="blockUI_target">
                        
                        <!--begin::Seperator-->
                        <div class="separator separator-dashed mb-7"></div>
                        <!--end::Seperator-->

                        <div class="d-flex align-items-center mb-8" id="summary_email_enter">
                            <span class="bullet bullet-vertical h-40px bg-primary me-2"></span>
                            <div class="flex-grow-1">
                                <a href="#" class="text-gray-800 text-hover-primary fw-bolder fs-6">Email</a>
                                <span class="text-muted fw-bold d-block">Enter</span>
                            </div>
                            <span class="badge badge-light-success fs-8 fw-bolder"><i class="fa fa-exclamation"></i></span>
                        </div>

                        <div class="d-flex align-items-center mb-8" id="summary_email_valid" style="display: none!important">
                            <span class="bullet bullet-vertical h-40px bg-success me-2"></span>
                            <div class="flex-grow-1">
                                <a href="#" class="text-gray-800 text-hover-success fw-bolder fs-6">Email</a>
                                <span class="text-muted fw-bold d-block">Avalilable</span>
                            </div>
                            <span class="badge badge-light-success fs-8 fw-bolder"><i class="fa fa-check"></i></span>
                        </div>

                        <div class="d-flex align-items-center mb-8" id="summary_email_invalid" style="display: none!important">
                            <span class="bullet bullet-vertical h-40px bg-danger me-2"  ></span>
                            <div class="flex-grow-1">
                                <a href="#" class="text-gray-800 text-hover-danger fw-bolder fs-6">Email</a>
                                <span class="text-muted fw-bold d-block">Not Available</span>
                            </div>
                            <span class="badge badge-light-danger fs-8 fw-bolder"><i class="fa fa-times"></i></span>
                        </div>

                        
                    </div>
                    <div class="card-footer">
                        <!--begin::Seperator-->
                        <div class="separator separator-dashed mb-7"></div>
                        <!--end::Seperator-->
                         <!--begin::Actions-->
                         <div class="mb-0">
                            <button type="submit" data-form="user_form" class="btn btn-primary" id="create_button">
                                <!--begin::Indicator-->
                                <span class="indicator-label">Create User</span>
                                <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                <!--end::Indicator-->
                            </button>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Sidebar-->
        </div>
        <!--end::Layout-->
    </div>
    <!--end::Container-->
</div>
<!--end::Post-->
@endsection

@push('scripts')
    <script src="{{ asset('js/swal.js') }}" ></script>

    <script type="text/javascript">
        // Element to indecate
        var button = document.querySelector("#create_button");
        var inputEmail = document.querySelector("#user_email");
        var target = document.querySelector("#blockUI_target");
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        var blockUI = new KTBlockUI(target, {
            message: '<div class="blockui-message"><span class="spinner-border text-primary"></span> Checking...</div>',
        });

        inputEmail.addEventListener("change", function (e) {
            blockUI.block();
            let email = e.target.value;

            if (email) {

                $('#summary_email_enter').attr('style', 'display: none !important'); //fetch error hide
                $('#summary_email_valid').attr('style', 'display: none !important'); //fetch error hide
                $('#summary_email_invalid').attr('style', 'display: none !important'); //fetch error hide

                if (!filter.test(email)) {
                    Toast.fire({
                        icon: 'error',
                        title: 'Invalid Email',
                    }); //display error toast
                    email.focus;
                    blockUI.release();
                    return false;
                } else {
                    $.ajax({
                        url: "{{ route('admin.user.check.email') }}",
                        type: "GET",
                        data: {
                            'email': email,
                        },
                        success: function (data) {
                            $('#summary_email_valid').attr('style', 'display: flex !important'); //fetch error hide
                            blockUI.release();
                        },
                        error: function (request, err) {
                            $('#summary_email_invalid').attr('style', 'display: flex !important'); //fetch error hide

                            Toast.fire({
                                icon: 'error',
                                title: 'Email Already Taken',
                                text: "Please provide unique email address"
                            }); //display error toast

                            blockUI.release();
                        }
                    });
                }

            } else {
                $('#summary_email_enter').attr('style', 'display: flex !important'); //fetch error hide
                $('#summary_email_valid').attr('style', 'display: none !important'); //fetch error hide
                $('#summary_email_invalid').attr('style', 'display: none !important'); //fetch error hide
                blockUI.release();
            }

        });

        // Handle button click event
        button.addEventListener("click", function() {
            if(!$("#user_form")[0].checkValidity())
            {
                $("#user_form")[0].reportValidity();

                Toast.fire({
                icon: 'error',
                title: 'Please Fill Required Fields',
                text: "Make sure required fields are filled properly before moving on"
                }); //display error toast

                return 0;
            }
            // Activate indicator
            button.setAttribute("data-kt-indicator", "on");
            button.setAttribute("disabled", "true");

            form = document.getElementById(this.getAttribute('data-form'));
            form.submit();
        });
    </script>
@endpush