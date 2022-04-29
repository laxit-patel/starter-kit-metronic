@extends('admin.layouts.main',['title' => 'Dashboard'])

@section('breadcrumb')
<li class="breadcrumb-item pe-3"><a href="{{ route('admin.admin') }}" class="pe-3"><i class="fa fa-home text-hover-primary"></i></a></li>
<li class="breadcrumb-item px-3 text-primary">Dashboard</li>
@endsection

@section('content')
Content goes here ...
@endsection