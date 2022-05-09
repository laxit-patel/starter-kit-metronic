@extends('admin.layouts.main',['title' => 'Question'])

@section('breadcrumb')
<li class="breadcrumb-item pe-3"><a href="{{ route('admin.admin') }}" class="pe-3"><i class="fa fa-home text-hover-primary"></i></a></li>
<li class="breadcrumb-item px-3 text-primary">Question</li>
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
            @foreach ($questions as $key => $question)
            <div class="card card-flush my-5 shadow-sm">
                <div class="card-header">
                    <h3 class="card-title">{{ $question->question }}</h3>
                </div>
                <div class="card-body py-5">
                    {{ $question->question }}
                </div>
                <div class="card-footer">
                    <span class="badge badge-sm mt-5 badge-primary">
                        {{ $question->getType->type }}
                    </span>
                    <a href="" class="btn btn-sm float-end btn-light-primary btn-hover-scale">
                        Add
                    </a>
                </div>
            </div>
            @endforeach
            <!--end::Card-->

            <nav class="mt-5">
                {{$questions->links("pagination::bootstrap-5")}}
            </nav>

        </div>

        <!--end::Container-->
    </div>
    <!--end::Post-->
    <!--end::Container-->
</div>
<!--end::Post-->



@endsection
