@extends('user.layouts.main',['title' => 'Profile'])

@section('breadcrumb')
<li class="breadcrumb-item pe-3"><a href="{{ route('user.user') }}" class="pe-3"><i class="fa fa-home text-hover-primary"></i></a></li>
<li class="breadcrumb-item px-3 text-primary">Profile</li>
@endsection

@section('content')

<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
   
    <div id="kt_content_container" class="container-fluid">
        @include('layouts.alerts.error')
        @include('layouts.alerts.alert')
        
        <!--begin::Navbar-->
        <div class="card mb-5 mb-xl-10 shadow-lg">
            <div class="ribbon ribbon-top">
                        
                <div class="ribbon-label bg-primary">
                    <a data-bs-toggle="modal" 
                    data-bs-target="#image_modal"
                    class="badge badge-lg badge-primary bg-hover-light-primary ">Edit Image</a>
                </div>
            </div>
            <!-- end of image-->
            <div class="card-body pt-9 pb-0">
                 <!--profile image-->
    
                <!--begin::Details-->
                <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                    <!--begin: Pic-->
                    <div class="me-7 mb-4">
                        <div class="symbol symbol-125px symbol-lg-125px symbol-fixed position-relative">
                            <img class="img img-fluid" src="{{ asset('media/logos/madara.svg') }}" alt="image">                            
                        </div>
                    </div>
                    <!--end::Pic-->
                    <!--begin::Info-->
                    <div class="flex-grow-1">
                        <!--begin::Title-->
                        <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                            <!--begin::User-->
                            <div class="d-flex flex-column">
                                <!--begin::Name-->
                                <div class="d-flex align-items-center mb-2">
                                    <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{ auth()->user()->name }}</a>
                                    <a href="#">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
                                        <span class="svg-icon svg-icon-1 svg-icon-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                                <path d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z" fill="#00A3FF"></path>
                                                <path class="permanent" d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z" fill="white"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </a>
                                </div>
                                <!--end::Name-->
                                <!--begin::Info-->
                                <div class="d-flex flex-wrap fw-bold fs-1 pe-2">
                                    
                                    <a  class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                    <span class="svg-icon svg-icon-primary svg-icon-1 me-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="black"></path>
                                            <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="black"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->{{ auth()->user()->email }}  </a>

                                </div>
                                <!--end::Info-->
                                <div class="d-flex flex-wrap fw-bold fs-4  pe-2">
                             
                                    <a class="d-flex align-items-center text-gray-400 mb-2">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                    <span class="svg-icon svg-icon-4 me-3">
                                        <i class="fa fa-phone"></i>
                                    </span>
                                    <!--end::Svg Icon-->?Phone 
                                </a> 
                                    
                                </div>
                            </div>
                            <!--end::User-->
                        </div>
                        <!--end::Title-->
                        
                    </div>
                    <!--end::Info-->
                </div>
                <!--end::Details-->
                <!--begin::Navs-->
                <ul class="nav nav-fill nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder">
                    <!--begin::Nav item-->
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5 active" data-bs-toggle="tab" href="#tab_overview">Overview</a>
                    </li>
                    <!--end::Nav item-->
                    <!--begin::Nav item-->
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab" href="#tab_sap">Exams</a>
                    </li>
                    <!--end::Nav item-->
                    <!--begin::Nav item-->
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab" href="#tab_tax">Assesment</a>
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
        <!--begin::details View-->

        <div class="tab-content" id="myTabContent">

            <div class="shadow-lg tab-pane fade active show card mb-5 mb-xl-10" id="tab_overview" role="tabpanel">
                <!--begin::Card header-->
                <div class="card-header cursor-pointer">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Overview</h3>
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
                                <th class="text-end fw-bold">Some</th>
                                <td>Data</td>
                            </tr>
                         </tbody>
                        </table>
                    </div> 

                </div>
                <!--end::Card body-->
            </div>

            <div class="shadow-lg tab-pane fade show card mb-5 mb-xl-10" id="tab_sap" role="tabpanel">
                <!--begin::Card header-->
                <div class="card-header cursor-pointer">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">SAP Details</h3>
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
                                <th class="text-end fw-bold">Some</th>
                                <td>Date</td>
                            </tr>
                         </tbody>
                        </table>
                    </div> 

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
    <!--end::Container-->
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/custom/apps/user-management/users/view/update-details.js') }}" ></script>
<script src="{{ asset('js/custom/apps/user-management/users/view/update-email.js') }}" ></script>
<script src="{{ asset('js/custom/apps/user-management/users/view/update-password.js') }}" ></script>
<script>
    $("#kt_datepicker_2").flatpickr();

    $('#country').on('change', function () {
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
                            $("#state-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
</script>
@endsection