@extends('admin.layouts.main',['title' => 'Role'])

@section('breadcrumb')
<li class="breadcrumb-item pe-3"><a href="{{ route('admin.admin') }}" class="pe-3"><i class="fa fa-home text-hover-primary"></i></a></li>
<li class="breadcrumb-item px-3"><a class="text-hover-primary text-muted" href="{{ route('admin.role') }}">Role</a></li>
<li class="breadcrumb-item px-3 text-primary">Edit</li>
@endsection

@push('stylesheet')
<link href="{{ asset('plugins/custom/listbox/dual-listbox.css') }}" rel="stylesheet" type="text/css" />
@endpush

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

                <form class="form" method="POST" action="{{ route('admin.role.update') }}" id="role_form">
                   @csrf
                   <input type="hidden" name="id" value="{{ $role->id }}">

                    <!--begin::Card-->
                    <div class="card shadow-lg card-flush pt-3 mb-5 mb-lg-10">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2 class="fw-bolder">Role Details</h2>
                            </div>
                            <!--begin::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">

                            <div class="row">

                                <div class="col-md-12">
                                    <div>
                                        <label for="exampleFormControlInput1" class="required form-label fs-5 fw-bolder">Role Name</label>
                                        <input type="text" class="form-control form-control-solid" value="{{ $role->name }}" name="role" placeholder="First Name"/>
                                    </div>
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
                                <h2 class="fw-bolder">Select Permissions</h2>
                            </div>
                            <!--begin::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <select class="permissions" multiple name="permissions[]">
                                        @foreach ($permissions as $permission)
                                            <option 
                                            value="{{ $permission->id }}" 
                                            @if(in_array( $permission->id, $rolePermissions))? selected : '' @endif>
                                            {{ $permission->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>      
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->

                    <!--begin::Card-->
                    <div class="card card-flush pt-3 mb-5 mb-lg-10">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2 class="fw-bolder">Delete Role</h2>
                            </div>
                            <!--begin::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">

                            <div class="notice d-flex bg-light-danger rounded border-primary border border-dashed rounded-3 p-6">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-stack flex-grow-1">
                                    <!--begin::Content-->
                                    <div class="fw-bold">
                                        <h4 class="text-gray-900 fw-bolder">This is a very important notice!</h4>
                                        <div class="fs-6 text-gray-700">Deleting Role can cause System Malfunction, So Think Twice Before You do anything.</div>
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Wrapper-->
                            </div>

                            <div class="row mt-10 ">

                                <div class="col-md-9">
                                    <div class="form-floating mb-7">
                                        <input type="text" class="form-control" onkeyup="confirmDelete(this)" />
                                        <label for="floatingInput">Please Type "Delete Role"</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <a href="{{ route('admin.role.delete',['id' => $role->id]) }}" class="btn btn-lg btn-danger btn-block w-100 disabled" id="delete_role_button" >Delete Role</a>
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
            <div class="flex-column flex-lg-row-auto w-100 w-lg-250px w-xl-300px mb-10 order-1 order-lg-2">
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
                    <div class="card-body pt-0 fs-6">
                        <!--begin::Seperator-->
                        <div class="separator separator-dashed mb-7"></div>
                        <!--end::Seperator-->
                        <!--begin::Actions-->
                        <div class="mb-0">
                            <button type="submit" data-form="role_form" class="btn btn-primary" id="create_button">
                                <!--begin::Indicator-->
                                <span class="indicator-label">Update Role</span>
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
<script src="{{ asset('plugins/custom/listbox/dual-listbox.js') }}"></script>
    <script type="text/javascript">
        // Element to indecate
        var button = document.querySelector("#create_button");

        // Handle button click event
        button.addEventListener("click", function() {
            // Activate indicator
            button.setAttribute("data-kt-indicator", "on");
            button.setAttribute("disabled", "true");

            form = document.getElementById(this.getAttribute('data-form'));
            form.submit();
        });


        let permission = new DualListbox('.permissions', {
            showAddButton: false,
            showAddAllButton: false,
            showRemoveButton: false,
            showRemoveAllButton: false
        });

        function confirmDelete(e)
        {
            let confirmation = e.value;
            if(confirmation == 'Delete Role')
            {
                document.getElementById('delete_role_button').classList.remove('disabled');
            }else
            {
                document.getElementById('delete_role_button').classList.add('disabled');
            }
        }

    </script>
@endpush
