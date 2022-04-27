@if( $errors->any())
<div class="alert alert-dismissible bg-danger d-flex flex-column flex-sm-row p-5 mb-10"> 
    <!--begin::Content-->
    <div class="d-flex flex-column text-light pe-0 pe-sm-10">
        <h4 class="mb-2 text-light"><i class="fas fa-exclamation-triangle text-white me-3"></i> Form Validation Error</h4>
        <div class="d-flex flex-column">
            @foreach ($errors->all() as $error)
            <li class="d-flex align-items-center py-2">
                <span class="bullet bg-white me-3"></span> {{ $error }}
            </li>
            @endforeach
        </div>
    </div>
    <!--end::Content-->
    <!--begin::Close-->
    <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
        <i class="fa fa-times text-white fs-2x"></i>
    </button>
    <!--end::Close-->
</div>
@endif