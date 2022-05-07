@extends('admin.layouts.main',['title' => 'Student'])

@section('breadcrumb')
<li class="breadcrumb-item pe-3"><a href="{{ route('admin.admin') }}" class="pe-3"><i class="fa fa-home text-hover-primary"></i></a></li>
<li class="breadcrumb-item px-3"><a class="text-hover-primary text-muted" href="{{ route('admin.student') }}">Student</a></li>
<li class="breadcrumb-item px-3 text-primary">Create</li>
@endsection

@section('content')
<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">


        <!--begin::Layout-->
        <div class="d-flex flex-column flex-lg-row">

            <!--begin::Content-->
            <div class="flex-lg-row-fluid me-lg-15 order-2 order-lg-1 mb-10 mb-lg-0">
                <!--begin::Form-->
                
                @include('layouts.alerts.error')

                <form class="form" method="POST" action="{{ route('admin.student.store') }}" id="user_form">
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

                            <!--begin::Row-->
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-bold mt-2 mb-3 required">User Name</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row fv-plugins-icon-container">
                                    <input type="text" class="form-control form-control-solid" name="name" value="{{ old('name') }}" >
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            </div>
                            <!--end::Row-->

                            <!--begin::Row-->
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-bold mt-2 mb-3 required">Email</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row fv-plugins-icon-container">
                                    <input type="email" class="form-control form-control-solid" name="email" id="email" value="{{ old('email') }}" >
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            </div>
                            <!--end::Row-->

                            <!--begin::Row-->
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-bold mt-2 mb-3 required">Password</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row fv-plugins-icon-container">
                                    <input type="password" class="form-control form-control-solid" name="password" >
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            </div>
                            <!--end::Row-->

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
                                <h2 class="fw-bolder">Course & Batch</h2>
                            </div>
                            <!--begin::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">

                            <!--begin::Row-->
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-bold mt-2 mb-3 required">Course</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row fv-plugins-icon-container">
                                    <select class="form-select form-select-solid form-select-lg" name="course" id="course" data-placeholder="Select Course" data-control="select2" data-hide-search="true" data-allow-clear="true">
                                    <option ></option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            </div>
                            <!--end::Row-->

                            <!--begin::Row-->
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-bold mt-2 mb-3 required">Batch</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row fv-plugins-icon-container">
                                    <select class="form-select form-select-lg form-select-solid" name="batch" id="batch" data-control="select2" data-placeholder="Select Batch" data-hide-search="true">
                                        <option ></option>
                                    </select>
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            </div>
                            <!--end::Row-->

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
                                <h2 class="fw-bolder">Profile</h2>
                            </div>
                            <!--begin::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body p-9 pt-0">
                            <!--begin::Row-->
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-bold mt-2 mb-3">Phone</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row fv-plugins-icon-container">
                                    <input type="text" class="form-control form-control-solid" name="phone" value="" placeholder="Enter Phone">
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-bold mt-2 mb-3">Date of Birth</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row fv-plugins-icon-container">
                                    <div class="position-relative d-flex align-items-center">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                        <span class="svg-icon position-absolute ms-4 mb-1 svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor"></path>
                                                <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor"></path>
                                                <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <input class="form-control form-control-solid ps-12" name="dob" placeholder="Enter Date of Birth" id="dob" type="date">
                                    </div>
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                <!--begin::Col-->
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-bold mt-2 mb-3">Gender</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row fv-plugins-icon-container">
                                    <select class="form-select form-select-lg form-select-solid" name="gender" data-control="select2" data-placeholder="Select Gender" data-hide-search="true">
                                        <option ></option>
                                        <option value="1">Male</option>
                                        <option value="0">Female</option>
                                    </select>
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-bold mt-2 mb-3">Location</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row fv-plugins-icon-container">
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <select class="form-select form-select-solid form-select-lg" name="country" id="country" data-control="select2" data-placeholder="Choose Country" >
                                                @foreach ($countries as $country)
                                                <option ></option>
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <select class="form-select form-select-solid form-select-lg" name="state" id="state" data-placeholder="Select State" data-control="select2" >
                                                <option ></option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <select class="form-select form-select-solid form-select-lg" name="city" id="city" data-control="select2"  data-placeholder="Select City">
                                                <option ></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--begin::Col-->
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-bold mt-2 mb-3">Address</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row fv-plugins-icon-container">
                                    <textarea name="address" class="form-control form-control-solid h-100px"></textarea>
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                <!--begin::Col-->
                            </div>
                            <!--end::Row-->
    
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
                                <span class="indicator-label">Create Student</span>
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
        var button = document.querySelector("#create_button");
        var inputEmail = document.querySelector("#email");
        var target = document.querySelector("#blockUI_target");
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        // Defination -------------------------------------------------------------------------------------------------------------

        var blockUI = new KTBlockUI(target, {
            message: '<div class="blockui-message"><span class="spinner-border text-primary"></span> Checking...</div>',
        }); // Element to block white fetching AJAX data ----------------------------------------------------------------------

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

        }); // Dynamic Email validation --------------------------------------------------------------------------------

        button.addEventListener("click", function () {
            if (!$("#user_form")[0].checkValidity()) {
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
        }); // Handle Button Click Event ----------------------------------------------------------------------------


        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
        }); // focus on search input in select 2 -------------------------------------------------------------------

        $('#country').on("select2:select", function (e) {
            var country = this.value;
            $("#state").html('');
            $.ajax({
                url: "{{ route('state.fetch') }}",
                type: "GET",
                data: {
                    country_id: country,
                },
                dataType: 'json',
                success: function (result) {
                    $('#state').html('<option value="">Select State</option>');
                    $.each(result.states, function (key, value) {
                        $("#state").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    $('#state').select2('open');
                }
            });
        }); // country select listener ----------------------------------------------------------------------------

        $('#state').on("select2:select", function (e) {
            var state = this.value;
            $("#city").html('');
            $.ajax({
                url: "{{ route('city.fetch') }}",
                type: "GET",
                data: {
                    state_id: state,
                },
                dataType: 'json',
                success: function (result) {
                    $('#city').html('<option value="">Select State</option>');
                    $.each(result.cities, function (key, value) {
                        $("#city").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    $('#city').select2('open');
                }
            });
        }); //state select listener --------------------------------------------------------------------------------------

        $('#course').on("select2:select", function (e) {
            var course = this.value;
            $("#batch").html('');
            $.ajax({
                url: "{{ route('admin.course.fetch.batch') }}",
                type: "GET",
                data: {
                    course: course,
                },
                dataType: 'json',
                success: function (result) {
                    $('#batch').html('<option value="">Select Batch</option>');
                    $.each(result, function (key, value) {
                        $("#batch").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    $('#batch').select2('open');
                }
            });
        }); //state select listener --------------------------------------------------------------------------------------

    </script>

@endpush