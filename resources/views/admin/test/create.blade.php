@extends('admin.layouts.main',['title' => 'Test'])

@section('breadcrumb')
<li class="breadcrumb-item pe-3"><a href="{{ route('admin.admin') }}" class="pe-3"><i class="fa fa-home text-hover-primary"></i></a></li>
<li class="breadcrumb-item px-3"><a class="text-hover-primary text-muted" href="{{ route('admin.test') }}">Test</a></li>
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
                                <h2 class="fw-bolder required">Select Batch</h2>
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
                                    <div class="fs-6 fw-bold mt-2 mb-3">Select Course</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row fv-plugins-icon-container">
                                    <select class="form-select form-select-lg form-select-solid" id="course"  name="course" data-control="select2" data-placeholder="Select Course" data-allow-clear="true">
                                        <option></option>
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                                        @endforeach
                                    </select>
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            </div>
                            <!--end::Row-->

                            <!--begin::Row-->
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-bold mt-2 mb-3">Select Batch</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row fv-plugins-icon-container">
                                    <select class="form-select form-select-lg form-select-solid" id="batch" name="batch" data-control="select2" data-placeholder="Select Batch" data-allow-clear="true">
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
                                <h2 class="fw-bolder required">Select Lesson</h2>
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
                                    <div class="fs-6 fw-bold mt-2 mb-3">Select Subject</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row fv-plugins-icon-container">
                                    <select class="form-select form-select-lg form-select-solid" id="subject"  name="subject" data-control="select2" data-placeholder="Select Subject" data-allow-clear="true">
                                        <option></option>
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endforeach
                                    </select>
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            </div>
                            <!--end::Row-->

                            <!--begin::Row-->
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-bold mt-2 mb-3">Select Lesson</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row fv-plugins-icon-container">
                                    <select class="form-select form-select-lg form-select-solid" id="lesson" name="lesson" data-control="select2" data-placeholder="Select Subject" data-allow-clear="true">
                                    </select>
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
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
    var button = document.querySelector("#create_button");

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

        $('#batch').on("select2:select", function (e) {
            var batch = this.value;
            $("#subject").html('');
            $.ajax({
                url: "{{ route('admin.lesson.fetch') }}",
                type: "GET",
                data: {
                    batch: batch,
                },
                dataType: 'json',
                success: function (result) {
                    console.log(result);
                    $('#lesson').html('<option value="">Select Lesson</option>');
                    $.each(result, function (key, value) {
                        $("#lesson").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    $('#lesson').select2('open');
                }
            });
        }); //state select listener --------------------------------------------------------------------------------------


        $('#subject').on("select2:select", function (e) {
            var subject = this.value;
            $("#lesson").html('');
            $.ajax({
                url: "{{ route('admin.lesson.fetch') }}",
                type: "GET",
                data: {
                    subject: subject,
                },
                dataType: 'json',
                success: function (result) {
                    
                    $('#lesson').html('<option value="">Select Lesson</option>');
                    $.each(result, function (key, value) {
                        $("#lesson").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    $('#lesson').select2('open');
                }
            });
        }); //state select listener --------------------------------------------------------------------------------------
        

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