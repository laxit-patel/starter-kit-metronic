@extends('admin.layouts.main',['title' => 'Question'])

@section('breadcrumb')
<li class="breadcrumb-item pe-3"><a href="{{ route('admin.test') }}" class="pe-3"><i class="fa fa-home text-hover-primary"></i></a></li>
<li class="breadcrumb-item px-3"><a class="text-hover-primary text-muted" href="{{ route('admin.question') }}">Question</a></li>
<li class="breadcrumb-item px-3 text-primary">Assign</li>
@endsection

@section('content')

<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            @include('layouts.alerts.error')

            <!--begin::Card-->
            <form action="#" id="filter_panel">
                <!--begin::Compact form-->
                <div class=" row d-flex align-items-center">
                 
                    <div class="col-md-4">
                     <div class="mb-0">
                     <select class="form-select shadow-lg form-select-lg" data-control="select2" data-placeholder="Select Region" id="filter_region">
                         <option ></option>
                         {{-- @foreach ($regions as $region)
                             <option value="{{ $region->id }}">{{ $region->description }}</option>
                         @endforeach --}}
                     </select>
                     </div>
                    </div>

                    <div class="col-md-4">
                     <div class="mb-0">
                     <input type="text" class="form-control" placeholder="Select Range or Single Date" id="filter_date">
                     </div>
                    </div>

                    <div class="col-md-4">
                     <div class="mb-0">
                         <div class="btn-group w-100">
                             <button type="button" class="btn btn-light-danger btn-hover-scale"
                                 onclick="resetFilter()">
                                 <i class="fa fa-redo"></i>
                             </button>
                             <!--begin::Trigger-->
                             <button type="button" class="btn btn-light-primary btn-hover-scale" data-kt-menu-trigger="click"
                                 data-kt-menu-placement="bottom-start">
                                 Export
                             </button>
                             <!--end::Trigger-->

                             <!--begin::Menu-->
                             <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-auto py-4"
                                 data-kt-menu="true">
                                 <!--begin::Menu item-->
                                 <div class="menu-item px-3">
                                     <a class="menu-link px-3" id="export-excel">
                                         <i class="fa fa-file-excel me-3 text-primary"></i>
                                         Excel
                                     </a>
                                 </div>
                                 <!--end::Menu item-->

                                 <!--begin::Menu item-->
                                 <div class="menu-item px-3">
                                     <a class="menu-link px-3 " id="export-csv">
                                         <i class="fa fa-file-csv me-3 text-primary"></i>
                                         CSV
                                     </a>
                                 </div>
                                 <!--end::Menu item-->

                                 <!--begin::Menu item-->
                                 <div class="menu-item px-3">
                                     <a class="menu-link px-3" id="export-pdf">
                                         <i class="fa fa-file-pdf me-3 text-primary"></i>
                                         PDF
                                     </a>
                                 </div>
                                 <!--end::Menu item-->

                                 <!--begin::Menu item-->
                                 <div class="menu-item px-3">
                                     <a class="menu-link px-3" id="export-print">
                                         <i class="fa fa-print me-3 text-primary"></i>
                                         Print
                                     </a>
                                 </div>
                                 <!--end::Menu item-->
                             </div>
                             <!--end::Menu-->
                             <button type="button" class="btn btn-light-primary btn-hover-scale me-2"
                                 onclick="filter()">Filter</button>

                         </div>
                     </div>
                    </div>

                 </div>
                 <!--end::Compact form-->
            </form>
            <!--end::Card-->

            <!--begin::Accordion-->
            <div class="accordion mt-5 shadow-lg rounded" id='question_accordian'>

                @forelse ($questions as $index => $question)
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

        <!--end::Container-->
    </div>
    <!--end::Post-->
    <!--end::Container-->
</div>
<!--end::Post-->

@endsection
