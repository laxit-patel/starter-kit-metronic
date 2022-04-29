@extends('admin.layouts.main',['title' => 'Role'])

@section('breadcrumb')
<li class="breadcrumb-item pe-3"><a href="{{ route('admin.admin') }}" class="pe-3"><i class="fa fa-home text-hover-primary"></i></a></li>
<li class="breadcrumb-item px-3 text-primary">Role</li>
@endsection

@section('content')
<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        @include('layouts.alerts.alert')
        <!--begin::Row-->
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
            <!--begin::Col-->
            @foreach ($roles as $role)
                <div class="col-md-4">
                    <!--begin::Card-->
                    <div class="card card-flush shadow-lg h-md-100">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>{{ $role->name }}</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-1">
                            <!--begin::Users-->
                            <div class="fw-bolder text-gray-600 mb-5">Total users with this role: <span class="badge badge-lg badge-primary">{{ \App\Models\User::role($role->name)->count() }}</span></div>
                            {{-- //TODO make it work 👆 --}}
                            <!--end::Users-->
                            <!--begin::Permissions-->
                            <div class="d-flex flex-column text-gray-600">
                                <?php $overflow = 0 ?>
                                @foreach ($role->permissions as $count => $permission)
                                @if($count <= 3)
                                <div class="d-flex align-items-center py-2">
                                <span class="bullet bg-primary me-3"></span>{{ $permission->name }}</div>
                                @else
                                    <?php $overflow++; ?>
                                @endif
                                @endforeach

                                @if($overflow > 4)
                                <div class="d-flex align-items-center py-2">
                                <span class="bullet bg-primary me-3"></span><a href={{ route('admin.role.view',['id' => $role->id]) }}>{{ $overflow }} More ... </a></div>
                                @endif

                            </div>
                            <!--end::Permissions-->
                        </div>
                        <!--end::Card body-->
                        <!--begin::Card footer-->
                        <div class="card-footer flex-wrap pt-0">
                            <a href="{{ route('admin.role.view',['id' => $role->id]) }}" class="btn btn-light btn-active-primary my-1 me-2">View</a>
                            <a href="{{ route('admin.role.edit',['id'=>$role->id]) }}" class="btn float-end btn-light btn-active-primary my-1 me-2">Edit Role</a>
                        </div>
                        <!--end::Card footer-->
                    </div>
                    <!--end::Card-->
                </div>
            @endforeach
            <!--end::Col-->

            <!--begin::Add new card-->
            <div class="ol-md-4">
                <!--begin::Card-->
                <div class="card h-md-100 bg-light-success shadow-lg">
                    <!--begin::Card body-->
                    <div class="card-body d-flex flex-center">
                        <!--begin::Button-->
                        <a href="{{ route('admin.role.create') }}" class="btn btn-clear d-flex flex-column flex-center">
                            <!--begin::Illustration-->
                            <img src="{{ asset('media/illustrations/sigma-1/4.png') }}" alt="" class="mw-100 mh-150px mb-7" />
                            <!--end::Illustration-->
                            <!--begin::Label-->
                            <div class="fw-bolder fs-3 text-gray-600 text-hover-primary">Add New Role</div>
                            <!--end::Label-->
                        </a>
                        <!--begin::Button-->
                    </div>
                    <!--begin::Card body-->
                </div>
                <!--begin::Card-->
            </div>
            <!--begin::Add new card-->
        </div>
        <!--end::Row-->
  
    </div>
    <!--end::Container-->
</div>
<!--end::Post-->
@endsection