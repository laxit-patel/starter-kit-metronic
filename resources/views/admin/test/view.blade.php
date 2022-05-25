@extends('admin.layouts.main',['title' => 'Test'])

@section('breadcrumb')
<li class="breadcrumb-item pe-3"><a href="{{ route('admin.test') }}" class="pe-3"><i class="fa fa-home text-hover-primary"></i></a></li>
<li class="breadcrumb-item px-3"><a class="text-hover-primary text-muted" href="{{ route('admin.test') }}">Test</a></li>
<li class="breadcrumb-item px-3 text-primary">View</li>
@endsection

@section('content')

<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Navbar-->
        <div class="card shadow-lg mb-6 mb-xl-9">
            <div class="card-body pt-9 pb-0">
                <!--begin::Details-->
                <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
                    <!--begin::Wrapper-->
                    <div class="flex-grow-1">
                        <!--begin::Head-->
                        <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                            <!--begin::Details-->
                            <div class="d-flex flex-column">
                                <!--begin::Status-->
                                <div class="d-flex align-items-center mb-1">
                                    <a class="text-gray-800 text-hover-primary fs-2 fw-bolder me-3">
                                        {{ $test->name }}
                                    </a>
                                    <span class="badge badge-light-success me-auto">{{ $test->status }}</span>
                                </div>
                                <!--end::Status-->
                                <!--begin::Description-->
                                <div class="d-flex flex-wrap fw-bold mb-4 fs-5 text-gray-400">
                                    {{ $test->description }}

                                </div>
                                <!--end::Description-->
                            </div>
                            <!--end::Details-->
                            <!--begin::Actions-->
                            <div class="d-flex mb-4">
                                <a href="#" class="btn btn-sm btn-primary btn-hover-scale">Schedule Exam</a>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Head-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Details-->
                <!--begin::Navs-->
                <ul class="nav nav-fill nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder">
                    <!--begin::Nav item-->
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5 active" data-bs-toggle="tab" href="#tab_overview">Question</a>
                    </li>
                    <!--end::Nav item-->
                    <!--begin::Nav item-->
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab" href="#tab_sap">Lesson</a>
                    </li>
                    <!--end::Nav item-->
                    <!--begin::Nav item-->
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab" href="#tab_tax">Subject</a>
                    </li>
                    <!--end::Nav item-->
                    <!--begin::Nav item-->
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab" href="#tab_shipment"><i class="fa fa-trash text-danger"></i></a>
                    </li>
                    <!--end::Nav item-->                 
                </ul>
                <!--begin::Navs-->
            </div>
        </div>
        <!--end::Navbar-->
        <!--begin::Row-->
        <div class="row  g-6 g-xl-9">

            <div class="tab-content" id="myTabContent">

                <div class="shadow-lg tab-pane fade active show card mb-5 mb-xl-10" id="tab_overview" role="tabpanel">
                    <!--begin::Card header-->
                    <div class="card-header cursor-pointer">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">Questions</h3>
                        </div>
                        <!--end::Card title-->
                        <div class="card-toolbar">
                            <a href="#" class="btn btn-sm btn-success btn-hover-scale me-4" onclick="fetchQuestion('{{ $test->id }}')" > <i class="fa fa-plus-circle"></i> Add</a>
                            <a href="{{ route('admin.question.assign') }}" class="btn btn-sm btn-primary btn-hover-scale" > <i class="fa fa-plus-circle"></i> Add</a>
                        </div>
                    </div>
                    <!--begin::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body p-9">
                        
                        @forelse ($test->getQuestions as $key => $question)
                        <div class="separator separator-dashed"></div>
                        <div class="py-0 mt-5" data-kt-customer-payment-method="row">
                            <!--begin::Header-->
                            <div class="py-3 d-flex flex-stack flex-wrap">
                                <!--begin::Toggle-->
                                <div class="d-flex align-items-center collapsible rotate" data-bs-toggle="collapse" href="#{{ "dc".$key }}" role="button" aria-expanded="false" aria-controls="{{ "dc".$key }}">
                                    <!--begin::Arrow-->
                                    <div class="me-3 rotate-90">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="black"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <!--end::Arrow-->
                                    <!--begin::Summary-->
                                    <div class="me-3">
                                        <div class="d-flex align-items-center">
                                            <div class=" badge badge-lg badge-primary fw-bolder me-5">{{ $DC->distribution_channel }}</div>
                                            <td class="text-muted ">{{ $DC->distribution_channel_desc }}</td>
                                        </div>
                                    </div>
                                    <!--end::Summary-->
                                </div>
                                <!--end::Toggle-->

                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div id="{{ "dc".$key }}" class="collapse @if($key == 0 )show @endif fs-6 ps-10" data-bs-parent="#kt_customer_view_payment_method">

                            </div>
                            <!--end::Body-->
                        </div>

                        <!--end::Option-->
                        @empty
                        <div class="text-center ">
                            <h5 class="text-muted">
                                Nothing Here but a cat 
                                <i class="fa fa-cat fs-2x text-dark"></i>
                            </h5>
                        </div>
                        @endforelse
                
                    </div>
                    <!--end::Card body-->
                </div>
    
                <div class="shadow-lg tab-pane fade show card mb-5 mb-xl-10" id="tab_sap" role="tabpanel">
                    <!--begin::Card header-->
                    <div class="card-header cursor-pointer">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">Lessons</h3>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--begin::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body p-9">
                        
                        @foreach ($test->getLessons as $lesson)
                            <span class="badge badge-lg badge-primary">{{ $lesson->name }}</span>
                        @endforeach
    
                    </div>
                    <!--end::Card body-->
                </div>
    
                <div class="shadow-lg tab-pane fade show card mb-5 mb-xl-10" id="tab_tax" role="tabpanel">
                    <!--begin::Card header-->
                    <div class="card-header cursor-pointer">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">Tax Details</h3>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--begin::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body p-9">
                        
                        <div class="table-responsive">
                            <table class="table table-rounded table-striped border " id='table'>
                                <thead>
                                    <tr class="fw-bolder w-100 fs-6 text-gray-800 border-bottom border-gray-200">
                                     <th class="text-end">Attribute</th>
                                     <th>Value</th>
                                    </tr>
                                   </thead>
                             <tbody>
                                <tr>
                                    <th class="text-end fw-bold">GST No.</th>
                                    <td>Some Data</td>
                                </tr>
                             </tbody>
                            </table>
                        </div> 
                        
                    </div>
                    <!--end::Card body-->
                </div>
    
                <div class="shadow-lg tab-pane fade show card mb-5 mb-xl-10" id="tab_shipment" role="tabpanel">
                    <!--begin::Card header-->
                    <div class="card-header cursor-pointer">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">Shipment Details</h3>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--begin::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body p-9">
                        
                        <div class="table-responsive">
                            <table class="table table-rounded table-striped border " id='table'>
                                <thead>
                                    <tr class="fw-bolder w-100 fs-6 text-gray-800 border-bottom border-gray-200">
                                     <th class="text-end">Attribute</th>
                                     <th>Value</th>
                                    </tr>
                                   </thead>
                             <tbody>
                                <tr>
                                    <th class="text-end fw-bold">demo</th>
                                    <td>Demo</td>
                                </tr>
                             </tbody>
                            </table>
                        </div> 
                        
                    </div>
                    <!--end::Card body-->
                </div>
    
            </div>
            <!--end::details View-->

        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!--end::Post-->

@include('admin.test.modal.question')
@endsection

@push('scripts')
<script src="{{ asset('js/swal.js') }}"></script>
<script>
    var target = document.querySelector("#kt_content");

    var blockUI = new KTBlockUI(target, {
        message: '<div class="blockui-message"><span class="spinner-border text-primary"></span> Fetching Line Items ...</div>',
    });

    function fetchQuestion(test){
        blockUI.block();

        $.ajax({
            url: "{{ route('admin.question.fetch') }}",
            type: "GET",
            data: {
                'test':test
            },
            success: function(data){
                blockUI.release();

                let questions = JSON.parse(data);

                questions.forEach(function(index,value){
                    console.log(index);
                    //TODO add ajax question addingfacility, it wasnt added before because too much work
                });

            },
            error : function(request,err)
            {
                blockUI.release();
                Toast.fire({
                icon: 'error',
                title: 'Line Item Error',
                text: "Couldnt Fetch the Line item 😓"
                }); //display error toast
            }
        });
    }
</script>
@endpush