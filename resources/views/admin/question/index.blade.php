@extends('admin.layouts.main',['title' => 'Question'])

@push('stylesheet')
<link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('breadcrumb')
<li class="breadcrumb-item pe-3"><a href="{{ route('admin.admin') }}" class="pe-3"><i class="fa fa-home text-hover-primary"></i></a></li>
<li class="breadcrumb-item px-3 text-primary">Question</li>
@endsection

@section('content')
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            @include('layouts.alerts.error')

            <!--begin::Card-->
            <div class="card card-stretch shadow-lg card-scroll">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="fa fa-search position-absolute ms-6"></i>
                            <input type="text" id="search" data-kt-docs-table-filter="search"
                                class="form-control form-control-solid w-250px ps-14" placeholder="Search Course" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                            <!--begin::Add user-->
                            <a href="{{ route('admin.question.create') }}" class="btn btn- btn-success">
                                <i class="fa fa-plus"></i> Add Question</a>
                            <!--end::Add user-->
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="progress m-5 progre" id="progress_placeholder">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                </div>
                <div class="card-body pt-0" id="datatable-card" style="display: none">
                    <!--begin::Table-->
                    <table id="datatable" class="table table-row-bordered">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th>Question</th>
                                <th>Marks</th>
                                <th>Type</th>
                                <th>Created</th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>

        <!--end::Container-->
    </div>
    <!--end::Post-->
    
<!--begin::Modal - Show Option-->
<div class="modal fade " id="option_modal" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-75">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Options</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <button type="button" class="btn btn-light-danger btn-hover-scale me-2" data-bs-dismiss="modal">
                    <i class="fa fa-times"></i> Close
                </button>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y" id="option_body">
                <div class="table-responsive" style="page-break-inside: avoid!important">
                    <table class="table table-rounded border gs-5" id="option_table"></table>
                </div>
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal-->

@endsection

@push('scripts')

<script src="{{ asset("plugins/custom/datatables/datatables.bundle.js") }}"></script>
{{-- <script src="{{ url('/assets') }}/js/delete.js"></script> --}}
<script src="{{ asset('js/swal.js') }}"></script>

<script>
    const datatable = $("#datatable").DataTable({
        searchDelay: 500,
        processing: true,
        serverSide: true,
        stateSave: true,
        "scrollY": "50vh",
        "scrollX": true,
        "sScrollXInner": "100%",
        ajax: {
            url: "{{ route('admin.question') }}",
            error: function (request, err) {
                Toast.fire({
                    icon: 'error',
                    title: 'Speed Limit ✋',
                    text: "Go slow, You're stressing the server"
                }); //display error toast
            }
        },
        columns: [{
                data: 'question'
            },
            {
                data: 'marks'
            },
            {
                data: 'type'
            },
            {
                data: 'created'
            },
            {
                data: null
            },
        ],
        columnDefs: [{
                targets: -1,
                data: null,
                orderable: false,
                className: 'text-end',
                render: function (data, type, row) {
                    return `

                            <a class="btn btn-icon btn-hover-scale btn-active-success me-2"
                            onclick="fetch_items('${ data.id }')"
                            ><span class="svg-icon svg-icon-1"><i class="fa fa-eye"></i></span></a>

                            <a  class="btn btn-sm btn-icon btn-hover-scale btn-active-danger me-2"
                            onclick="deleteItem(this)" 
                            data-route="admin/dealer/delete/${data.cid}"
                            ><span class="svg-icon svg-icon-1"><i class="fa fa-trash"></i></span></a>

                            `;
                },
            },
            {
                "targets": '_all',
                "createdCell": function (td, cellData, rowData, row, col) {
                    $(td).css('padding-bottom', '0px')
                }
            }
        ],
        'scrollCollapse': true,
        "fnInitComplete": function () {
            $('#progress_placeholder').slideUp();
            $('#datatable-card').slideDown();
            datatable.columns.adjust();
        }
    });

    $('#search').keyup(function(){
        datatable.search($(this).val()).draw() ;
    }) // Search datatable --------------------------------------------------------------------------------------------------------------

    var target = document.querySelector("#datatable");

    var blockUI = new KTBlockUI(target, {
        message: '<div class="blockui-message"><span class="spinner-border text-primary"></span> Fetching Options ...</div>',
    });

    function fetch_items(question)
    {
        blockUI.block();

        $.ajax({
            url: "{{ route('admin.option.fetch') }}",
            type: "GET",
            data: {
                'question':question
            },
            success: function(data){
                
                $('#option_table').empty(); 

                $.each( data, function( key, value ) {

                    let row = document.createElement('tr');

                    if(value['correct']){
                        row.classList.add('bg-light-success');
                    }else{
                        row.classList.add('bg-light-danger');
                    }

                    let option = document.createElement('th');

                    option.innerText = value['option'];

                    row.appendChild(option);

                    $('#option_table').append(row);                                                                                                                                          
                });

                blockUI.release();
                //show modal
                $("#option_modal").modal('show');
            },
            error : function(request,err)
            {
                blockUI.release();
                Toast.fire({
                icon: 'error',
                title: 'Line Item Error',
                text: "Couldnt Fetch the Line item 😓"
                }); //display error toast
            }
        });
    }
</script>
@endpush