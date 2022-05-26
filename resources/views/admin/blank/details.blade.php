@extends('admin.layouts.main',['title' => 'Test'])

@section('breadcrumb')
<li class="breadcrumb-item pe-3"><a href="{{ route('admin.test') }}" class="pe-3"><i class="fa fa-home text-hover-primary"></i></a></li>
<li class="breadcrumb-item px-3"><a class="text-hover-primary text-muted" href="">Test</a></li>
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
                                    <a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bolder me-3">CRM
                                        Dashboard</a>
                                    <span class="badge badge-light-success me-auto">In Progress</span>
                                </div>
                                <!--end::Status-->
                                <!--begin::Description-->
                                <div class="d-flex flex-wrap fw-bold mb-4 fs-5 text-gray-400">#1 Tool to get started
                                    with Web Apps any Kind &amp; size</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Details-->
                            <!--begin::Actions-->
                            <div class="d-flex mb-4">
                                <a href="#" class="btn btn-sm btn-bg-light btn-active-color-primary me-3"
                                    data-bs-toggle="modal" data-bs-target="#kt_modal_users_search">Add User</a>
                                <a href="#" class="btn btn-sm btn-primary " data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_new_target">Add Target</a>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Head-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Details-->
                <div class="separator"></div>
                <!--begin::Nav wrapper-->
                <div class="d-flex overflow-auto h-55px">
                    <!--begin::Nav links-->
                    <ul
                        class="nav nav-stretch  nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder flex-nowrap">
                        <!--begin::Nav item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary me-6 active">Questions</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary me-6 ">Details</a>
                        </li>
                        <!--end::Nav item-->
                    </ul>
                    <!--end::Nav links-->
                </div>
                <!--end::Nav wrapper-->
            </div>
        </div>
        <!--end::Navbar-->
        <!--begin::Row-->
        <div class="row g-6 g-xl-9">
            <!--begin::Col-->
            <div class="col-lg-12">
                <!--begin::Summary-->
                <div class="card shadow-lg card-flush h-lg-100">
                    <!--begin::Card header-->
                    <div class="card-header mt-6">
                        <!--begin::Card title-->
                        <div class="card-title flex-column">
                            <h3 class="fw-bolder mb-1">Tasks Summary</h3>
                            <div class="fs-6 fw-bold text-gray-400">24 Overdue Tasks</div>
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <a href="#" class="btn btn-light btn-sm">View Tasks</a>
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body p-9 pt-5">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-wrap">
                            <!--begin::Chart-->
                            <div class="position-relative d-flex flex-center h-175px w-175px me-15 mb-7">
                                <div
                                    class="position-absolute translate-middle start-50 top-50 d-flex flex-column flex-center">
                                    <span class="fs-2qx fw-bolder">237</span>
                                    <span class="fs-6 fw-bold text-gray-400">Total Tasks</span>
                                </div>
                                <canvas id="project_overview_chart"></canvas>
                            </div>
                            <!--end::Chart-->
                            <!--begin::Labels-->
                            <div class="d-flex flex-column justify-content-center flex-row-fluid pe-11 mb-5">
                                <!--begin::Label-->
                                <div class="d-flex fs-6 fw-bold align-items-center mb-3">
                                    <div class="bullet bg-primary me-3"></div>
                                    <div class="text-gray-400">Active</div>
                                    <div class="ms-auto fw-bolder text-gray-700">30</div>
                                </div>
                                <!--end::Label-->
                                <!--begin::Label-->
                                <div class="d-flex fs-6 fw-bold align-items-center mb-3">
                                    <div class="bullet bg-success me-3"></div>
                                    <div class="text-gray-400">Completed</div>
                                    <div class="ms-auto fw-bolder text-gray-700">45</div>
                                </div>
                                <!--end::Label-->
                                <!--begin::Label-->
                                <div class="d-flex fs-6 fw-bold align-items-center mb-3">
                                    <div class="bullet bg-danger me-3"></div>
                                    <div class="text-gray-400">Overdue</div>
                                    <div class="ms-auto fw-bolder text-gray-700">0</div>
                                </div>
                                <!--end::Label-->
                                <!--begin::Label-->
                                <div class="d-flex fs-6 fw-bold align-items-center">
                                    <div class="bullet bg-gray-300 me-3"></div>
                                    <div class="text-gray-400">Yet to start</div>
                                    <div class="ms-auto fw-bolder text-gray-700">25</div>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Labels-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Notice-->
                        <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed p-6">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack flex-grow-1">
                                <!--begin::Content-->
                                <div class="fw-bold">
                                    <div class="fs-6 text-gray-700">
                                        <a href="#" class="fw-bolder me-1">Invite New .NET Collaborators</a>to create
                                        great outstanding business to business .jsp modutr class scripts</div>
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Notice-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Summary-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!--end::Post-->

@endsection
