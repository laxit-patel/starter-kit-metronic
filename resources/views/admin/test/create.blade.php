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

                <form class="form" method="POST" action="{{ route('admin.test.store') }}" id="test_form">
                   @csrf

                    <!--begin::Card-->
                    <div class="card shadow-lg card-flush pt-3 mb-5 mb-lg-10">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2 class="fw-bolder">Test Details</h2>
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
                                    <div class="fs-6 fw-bold mt-2 mb-3 required">Name</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row fv-plugins-icon-container">
                                    <input type="text" class="form-control form-control-solid" id="name" name="name" placeholder="Choose Test Name" required>
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            </div>
                            <!--end::Row-->

                            <!--begin::Row-->
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-bold mt-2 mb-3 required">Duration( in Minutes )</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row fv-plugins-icon-container">
                                    <input type="number" class="form-control form-control-solid" id="duration" name="duration" placeholder="Test Duration in Minutes" required>
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            </div>
                            <!--end::Row-->

                            <!--begin::Row-->
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-bold mt-2 mb-3">Description</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row fv-plugins-icon-container">
                                    <textarea name="description" class="form-control form-control-solid" id="description" name="description" rows="3"></textarea>
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
                                <h2 class="fw-bolder required">Select Course</h2>
                            </div>
                            <!--begin::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">

                            <!--begin::Row-->
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-bold mt-2 mb-3">Select Course</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row fv-plugins-icon-container">
                                    <select class="form-select form-select-lg form-select-solid" id="course"  name="course" data-control="select2" data-placeholder="Select Course" data-allow-clear="true" required>
                                        <option></option>
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                                        @endforeach
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
                                <h2 class="fw-bolder required">Select Lesson</h2><span class="text-muted">( Multiple is allowed )</span>
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
                                    <select class="form-select form-select-lg form-select-solid" id="subject"  name="subject" data-control="select2" data-placeholder="Select Subject" data-allow-clear="true" required>
                                        <option></option>
                                    </select>
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            </div>
                            <!--end::Row-->

                            <!--begin::Row-->
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-bold mt-2 mb-3">Select Lessons</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row fv-plugins-icon-container">
                                    <select class="form-select form-select-lg form-select-solid" id="lesson" name="lesson[]" data-control="select2" multiple="multiple" data-placeholder="Select Subject" data-allow-clear="true" required>
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
                            <button type="submit" data-form="test_form" class="btn btn-primary" id="create_button">
                                <!--begin::Indicator-->
                                <span class="indicator-label">Create Test</span>
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

            $("#subject").html('');

            $.ajax({
                url: "{{ route('admin.subject.fetch') }}",
                type: "GET",
                data: {
                    course: course,
                },
                dataType: 'json',
                success: function (result) {
                    $('#subject').html('<option selected disabled>Select Subject</option>');
                    $.each(result, function (key, value) {
                        $("#subject").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    $('#subject').select2('open');
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
                    
                    $('#lesson').html('<option disabled>Select Lesson</option>');
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

            form = document.getElementById(this.getAttribute('data-form'));

            // if(!form.checkValidity())
            // {
            //     form.reportValidity();

            //     Toast.fire({
            //     icon: 'error',
            //     title: 'Please Fill Required Fields',
            //     text: "Make sure required fields are filled properly before moving on"
            //     }); //display error toast

            //     return 0;
            // }

            // Activate indicator
            button.setAttribute("data-kt-indicator", "on");
            button.setAttribute("disabled", "true");

            
            form.submit();
        });
    </script>
@endpush