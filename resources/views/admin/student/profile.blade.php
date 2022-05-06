@extends('admin.layouts.main',['title' => 'Profile'])

@section('breadcrumb')
<li class="breadcrumb-item pe-3"><a href="{{ route('admin.admin') }}" class="pe-3"><i class="fa fa-home text-hover-primary"></i></a></li>
<li class="breadcrumb-item pe-3"><a class="text-hover-primary text-muted" href="{{ route('admin.student') }}" class="pe-3"> Student</a></li>
<li class="breadcrumb-item px-3 text-primary">Profile</li>
@endsection

@section('content')

<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
   
    <div id="kt_content_container" class="container-xxl">
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
                                    <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{ $student->name }}</a>
                                    <span class="badge ms-3 badge-secondary cursor-pointer" data-bs-toggle="modal" data-bs-target="#kt_modal_update_username" ><i class="fa fa-pen text-active-white"></i></span>      
                                </div>
                                <!--end::Name-->
                                <!--begin::Info-->
                                <div class="d-flex flex-wrap fw-bold fs-2 pe-2">
                                    
                                    <a class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                    <span class="svg-icon svg-icon-primary svg-icon-1 me-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="black"></path>
                                            <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="black"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->{{ $student->email }}  
                                    <span class="badge ms-3 badge-secondary cursor-pointer" data-bs-toggle="modal" data-bs-target="#kt_modal_update_email" ><i class="fa fa-pen text-active-white"></i></span>      
                                    </a>

                                </div>
                                <!--end::Info-->
                                <div class="d-flex flex-wrap fw-bold fs-4  pe-2">
                             
                                    <a class="d-flex align-items-center text-gray-400 mb-2">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                    <span class="svg-icon svg-icon-4 me-3">
                                        <i class="fa fa-phone"></i>
                                    </span>
                                    <!--end::Svg Icon-->
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
                        <a class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab" href="#tab_sap">Credentials</a>
                    </li>
                    <!--end::Nav item-->  
                    <!--begin::Nav item-->
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab" href="#tab_delete"><i class="fa text-danger fa-trash"></i></a>
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
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title fs-3 fw-bolder">Student Profile</div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                            <button type="submit" form="update_profile" class="btn btn-primary btn-hover-scale" >Update</button>
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Form-->
                <form method="POST" id="update_profile" action="{{ route('admin.student.update') }}" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                    @csrf
                    <input type="hidden" value="{{$student->id}}" name="student">
                    <!--begin::Card body-->
                    <div class="card-body p-9">
                        <!--begin::Row-->
                        <div class="row mb-8">
                            <!--begin::Col-->
                            <div class="col-xl-3">
                                <div class="fs-6 fw-bold mt-2 mb-3">Phone</div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-9 fv-row fv-plugins-icon-container">
                                <input type="text" class="form-control form-control-solid" name="phone" value="{{ $student->profile->phone }}" placeholder="Enter Phone">
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
                                    <input class="form-control form-control-solid ps-12" name="dob" placeholder="Enter Date of Birth" id="dob" value="{{ $student->profile->dob }}" type="date">
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
                                <select class="form-select form-select-lg form-select-solid form-select-sm" data-control="select2" name="gender" data-hide-search="true">
                                    <option {{ $student->profile->gender == 1 ? 'selected' : '' }} value="1">Male</option>
                                    <option {{ $student->profile->gender == 0 ? 'selected' : '' }} value="0">Female</option>
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
                                    <div class="col-md-4">
                                        <select class="form-select form-select-solid form-select-lg" name="country" id="country" data-control="select2" data-placeholder="Choose Country" >
                                            @foreach ($countries as $country)
                                            <option ></option>
                                                <option {{ $student->profile->country == $country->id ? 'selected' : '' }} value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-select form-select-solid form-select-lg" name="state" id="state" data-placeholder="Select State" data-control="select2" >
                                            <option ></option>
                                            <option selected value="{{ $student->profile->getState->id }}">{{ $student->profile->getState->name }}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-select form-select-solid form-select-lg" name="city" id="city" data-control="select2"  data-placeholder="Select City">
                                            <option ></option>
                                            <option selected value="{{ $student->profile->getCity->id }}">{{ $student->profile->getCity->name }}</option>
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
                                <textarea name="address" class="form-control form-control-solid h-100px">{{ $student->profile->address }}</textarea>
                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--begin::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Card body-->
                <div></div></form>
                <!--end:Form-->
            </div>

            <div class="shadow-lg tab-pane fade show card mb-5 mb-xl-10" id="tab_sap" role="tabpanel">
                <!--begin::Card header-->
                <div class="card-header cursor-pointer">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Credentials</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Card body-->
                <div class="card-body p-9">
                    
                    <!--begin::Table wrapper-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed gy-5" id="kt_table_users_login_session">
                            <!--begin::Table body-->
                            <tbody class="fs-6 fw-bold text-gray-600">
                                <tr>
                                    <td>Email</td>
                                    <td>{{ auth()->user()->email }}</td>
                                    <td class="text-end">
                                        <button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" >
                                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                                    <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td>******</td>
                                    <td class="text-end">
                                        <button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" data-bs-toggle="modal" data-bs-target="#kt_modal_update_password">
                                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                                    <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Table wrapper-->

                </div>
                <!--end::Card body-->
            </div>

            <div class="shadow-lg tab-pane fade show card mb-5 mb-xl-10" id="tab_delete" role="tabpanel">
                <!--begin::Card header-->
                <div class="card-header cursor-pointer">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Delete Student</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Card body-->
                <div class="card-body p-9">
                    
                    <div class="notice d-flex bg-light-danger rounded border-primary border border-dashed rounded-3 p-6">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack flex-grow-1">
                            <!--begin::Content-->
                            <div class="fw-bold">
                                <h4 class="text-gray-900 fw-bolder">This is a very important notice!</h4>
                                <div class="fs-6 text-gray-700">Deleting Dealer can cause System Malfunction, So Think Twice Before You do anything.</div>
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
    
                    <div class="row mt-10 ">
    
                        <div class="col-md-9">
                            <div class="form-floating mb-7">
                                <input type="email" class="form-control" onkeyup="confirmDelete(this)" />
                                <label for="delete_dealer">Please Type "Confirm Delete"</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('admin.student.delete',['id' => $student->id]) }}" id="delete_button" class="btn btn-lg btn-danger btn-block w-100 disabled">Delete</a>
                        </div>
    
                    </div>

                </div>
                <!--end::Card body-->
            </div>

        </div>
        <!--end::details View-->
        <!--begin::Modal - Update email-->
        <div class="modal fade" id="kt_modal_update_email" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bolder">Update Email Address</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                        <!--begin::Form-->
                        <form id="kt_modal_update_email_form" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{ route('admin.student.update.email') }}">
                            @csrf
                            <input type="hidden" name="user" value="{{ $student->id }}">
                            <!--begin::Notice-->
                            <!--begin::Notice-->
                            <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                                <!--begin::Icon-->
                                <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                                <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"></rect>
                                        <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor"></rect>
                                        <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor"></rect>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <!--end::Icon-->
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-stack flex-grow-1">
                                    <!--begin::Content-->
                                    <div class="fw-bold">
                                        <div class="fs-6 text-gray-700">Please note that a valid email address is required to complete the email verification.</div>
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Notice-->
                            <!--end::Notice-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold form-label mb-2">
                                    <span class="required">Email Address</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input class="form-control form-control-solid" placeholder="" name="email" value="{{ $student->email }}">
                                <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="text-center pt-15">
                                <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Discard</button>
                                <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                    <span class="indicator-label">Update</span>
                                    <span class="indicator-progress">Please wait... 
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <!--end::Actions-->
                        <div></div></form>
                        <!--end::Form-->
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
        <!--end::Modal - Update email-->

        <!--begin::Modal - Update email-->
        <div class="modal fade" id="kt_modal_update_username" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bolder">Update User Name</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                        <!--begin::Form-->
                        <form id="kt_modal_update_email_form" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{ route('admin.student.update.name') }}">
                            @csrf
                            <input type="hidden" name="user" value="{{ $student->id }}">                            
                            <!--begin::Input group-->
                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold form-label mb-2">
                                    <span class="required">User Name
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input class="form-control form-control-solid" name="name" value="{{ $student->name }}">
                                <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="text-center pt-15">
                                <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Discard</button>
                                <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                    <span class="indicator-label">Update</span>
                                    <span class="indicator-progress">Please wait... 
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <!--end::Actions-->
                        <div></div></form>
                        <!--end::Form-->
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
        <!--end::Modal - Update email-->
    </div>
    <!--end::Container-->
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function () {

        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
        }); // focus on search input in select 2 -------------------------------------------------------------

        $('#country').on("select2:select", function (e) {
            var country = this.value;
            $("#state").html('');
            $("#city").html('');
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
        }); //country select listener --------------------------------------------------------------------------

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
                    console.log(result);
                    $('#city').html('<option value="">Select State</option>');
                    $.each(result.cities, function (key, value) {
                        $("#city").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    $('#city').select2('open');
                }
            });
        }); //state select listener -----------------------------------------------------------------------------

    });

    function confirmDelete(e) {
            let confirmation = e.value;
            if (confirmation == 'Confirm Delete') {
                document.getElementById('delete_button').classList.remove('disabled');
            } else {
                document.getElementById('delete_button').classList.add('disabled');
            }
        } // Confirm Delete for dealer -------------------------------------------------------------------------
</script>
@endpush