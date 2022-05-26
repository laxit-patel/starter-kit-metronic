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
    <div id="kt_content_container" class="container-fluid">
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

                        <!--begin::Accordion-->
                        <div class="accordion  shadow-lg rounded" id='question_accordian'>

                            @forelse ($test->getQuestions as $index => $question)
                                <div class="accordion-item rounded">
                                    <h2 class="accordion-header" id="qhead_{{$index}}">
                                        <button class="accordion-button fs-4 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#qbody_{{$index}}" aria-expanded="{{$index == 0 ? true : false }}" aria-controls="qbody_{{$index}}">
                                            <div class=" badge badge-lg badge-primary fw-bolder me-5">{{ $index }}</div>
                                            {{ $question->question }}
                                        </button>
                                    </h2>
                                    <div id="qbody_{{$index}}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" aria-labelledby="qhead_{{$index}}" data-bs-parent="#question_accordian">
                                        <div class="accordion-body pb-0">
                                        
                                            @foreach ($question->options as $initial => $option)
                                            <!--begin:Option-->
                                            <label class="d-flex flex-stack mb-5 cursor-pointer">
                                                <!--begin:Label-->
                                                <span class="d-flex align-items-center me-2">
                                                    <!--begin:Icon-->
                                                    <div class="symbol symbol-50px me-5">
                                                        <div class="symbol-label fs-2 fw-bold {{ $option->correct ? 'bg-success text-white' : '' }} ">{{ $option->letter }}</div>
                                                    </div>
                                                    <!--end:Icon-->
                        
                                                    <!--begin:Info-->
                                                    <span class="d-flex flex-column">
                                                        <span class="fw-bolder fs-6">{{ $option->option }}</span>
                                                        <span class="fs-7 text-muted">{{ $option->explaination }}</span>
                                                    </span>
                                                    <!--end:Info-->
                                                </span>
                                                <!--end:Label-->
                        
                                                <!--begin:Input-->
                                                <span class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="radio" {{ $option->correct ? 'checked' : '' }}  disabled   />
                                                </span>
                                                <!--end:Input-->
                                            </label>
                                            <!--end::Option-->
                                            @endforeach

                                        </div>

                                        
                                        <div class="row bg-light-dark m-0 p-3">

                                            <div class="col-md-12">
                                                <span class="badge badge-primary badge-lg me-3">Created : {{ $question->created_at->diffForHumans() }}</span>
                                                <span class="badge badge-primary badge-lg me-3">Type : {{ $question->getType->type }}</span>
                                                <span class="badge badge-primary badge-lg me-3">Lesson : {{ $question->getLesson->name }}</span>
                                                <a 
                                                class="badge cursor-pointer float-end badge-danger badge-lg" 
                                                data-question="{{ $question->id }}"
                                                data-lesson="{{ $question->getLesson->id }}"
                                                onclick="assign(this)"
                                                >Remove</a>
                                            </div>

                                        </div>
                                        
                                    </div>
                                </div>
                            @empty
                            <div class="text-center p-lg-10">
                                <h5 class="text-muted">
                                    Nothing Here but a cat 
                                    <i class="fa fa-cat fs-2x text-dark"></i>
                                </h5>
                            </div>
                            @endforelse

                        </div>
                        <!--end::Accordion-->
                
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