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
            Content goes here . . .
            <!--end::Card-->
        </div>

        <!--end::Container-->
    </div>
    <!--end::Post-->
    <!--end::Container-->
</div>
<!--end::Post-->

@endsection
