@extends('user.layouts.main',['title' => 'Dashboard'])

@section('breadcrumbs')
<li class="breadcrumb-item pe-3"><a class="pe-3"><i class="fa text-primary fa-home"></i></a></li>
<li class="breadcrumb-item px-3 text-muted">Dashboard</li>
@endsection

@section('action')
<a class="btn btn-sm btn-light-primary btn-hover-scale ">Create</a>
@endsection

@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        
        Content Goes Here ...
        
    </div>
    <!--end::Container-->
</div>
@endsection