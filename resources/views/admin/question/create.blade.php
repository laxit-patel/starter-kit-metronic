@extends('admin.layouts.main',['title' => 'Question'])

@section('breadcrumb')
<li class="breadcrumb-item pe-3"><a href="{{ route('admin.admin') }}" class="pe-3"><i class="fa fa-home text-hover-primary"></i></a></li>
<li class="breadcrumb-item px-3"><a class="text-hover-primary text-muted" href="{{ route('admin.question') }}">Question</a></li>
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

                <form class="form" method="POST" action="{{ route('admin.question.store') }}" id="question_form">
                   @csrf

                    <!--begin::Card-->
                    <div class="card shadow-lg card-flush pt-3 mb-5 mb-lg-10">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2 class="fw-bolder">Select Course</h2>
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
                                    <select class="form-select form-select-lg form-select-solid" id="course" data-control="select2" data-placeholder="Select Course" data-allow-clear="true" required>
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
                                <h2 class="fw-bolder">Select Lesson</h2>
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
                                    <select class="form-select form-select-lg form-select-solid" id="subject" data-control="select2" data-placeholder="Select Subject" data-allow-clear="true" required>
                                        <option></option>
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
                                    <select class="form-select form-select-lg form-select-solid" id="lesson" name="lesson" data-control="select2" data-placeholder="Select Subject" data-allow-clear="true" required>
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
                                <h2 class="fw-bolder">Question</h2>
                            </div>
                            <!--begin::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">

                            <!--begin::Row-->
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-12 fv-row fv-plugins-icon-container">
                                    <textarea class="form-control form-control-solid" id="question" name="question" rows="3"></textarea>
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            </div>
                            <!--end::Row-->

                            <div class="row">
                                <div class="col-xl-8">
                                    <label class="mb-2 fw-bolder" for="">Question Type</label>
                                    <select class="form-select form-select-lg form-select-solid" name="type" id="type" data-control="select2" data-placeholder="Select Course" data-allow-clear="true" required>
                                        <option></option>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}">
                                                {{ $type->type }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-4">
                                                  
                                <label class="mb-2 fw-bolder" for="">Marks</label>
                                <!--begin::Dialer-->
                                <div class="position-relative"
                                data-kt-dialer="true"
                                data-kt-dialer-min="0"
                                data-kt-dialer-step="1">

                                <!--begin::Decrease control-->
                                <button type="button" class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 start-0" data-kt-dialer-control="decrease">
                                    <i class="fa fa-minus-square text-danger fs-2"></i>
                                </button>
                                <!--end::Decrease control-->

                                <!--begin::Input control-->
                                <input type="text" class="form-control form-control-lg form-control-solid border-0 ps-12" data-kt-dialer-control="input" placeholder="Marks" name="marks" readonly  />
                                <!--end::Input control-->

                                <!--begin::Increase control-->
                                <button type="button" class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 end-0" data-kt-dialer-control="increase">
                                    <i class="fa fa-plus-square text-success fs-2"></i>
                                </button>
                                <!--end::Increase control-->
                                </div>
                                <!--end::Dialer-->

                                </div>
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
                                <h2 class="fw-bolder">Options</h2>
                            </div>
                            <!--begin::Card title-->
                            <div class="card-toolbar">
                                <a href="javascript:;" class="btn btn-sm btn-primary btn-hover-scale" > <i class="fa fa-plus-circle"></i> Add</a>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">

                            <!--begin::Repeater-->
                            <div id="options">
                                <!--begin::Form group-->
                                <div class="form-group">
                                    <div data-repeater-list="options">
                                        <div data-repeater-item>
                                            <div class="form-group row mb-5">
                                                <div class="col-md-4">
                                                    <label class="form-label">Option</label>
                                                    <input type="text" name="option" class="form-control mb-2 mb-md-0" placeholder="Option" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Explaination</label>
                                                    <input type="text" name="explaination" class="form-control mb-2 mb-md-0" placeholder="Explaination" />
                                                </div>
                                                <div class="col-md-1 text-center">
                                                    <label class="form-label">True</label>
                                                    <label class="btn">
                                                        <input class="form-check-input" type="checkbox" name="correct" id="form_checkbox" />
                                                    </label>
                                                </div>
                                                <div class="col-md-1">
                                                    <label class="form-label text-transparent">Delete</label>
                                                    <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-hover-scale btn-light-danger ">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Form group-->

                                <!--begin::Form group-->
                                <div class="form-group mt-5">
                                    <a href="javascript:;" data-repeater-create class="btn btn-light-primary">
                                        <i class="la la-plus"></i>Add
                                    </a>
                                </div>
                                <!--end::Form group-->
                            </div>
                            <!--end::Repeater-->

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
                        
                    </div>
                    <div class="card-footer">
                        <!--begin::Seperator-->
                        <div class="separator separator-dashed mb-7"></div>
                        <!--end::Seperator-->
                         <!--begin::Actions-->
                         <div class="mb-0">
                            <button type="submit" data-form="question_form" class="btn btn-primary" id="create_button">
                                <!--begin::Indicator-->
                                <span class="indicator-label">Create Question</span>
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
    <script src="{{ asset('plugins/custom/formrepeater/formrepeater.bundle.js') }}" ></script>

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

        $('#options').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function () {
                $(this).slideDown();
            },

            hide: function (deleteElement) {
                $(this).slideUp(deleteElement);
            }
        }); // Handles Dynamic Options__________________________________________________________________________________________________________________________________________________



        // Handle button click event
        button.addEventListener("click", function() {

            form = document.getElementById(this.getAttribute('data-form'));

            if(!form.checkValidity())
            {
                form.reportValidity();

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

            
            form.submit();
        });
    </script>
@endpush