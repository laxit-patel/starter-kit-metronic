<div class="modal fade" tabindex="-1" id="assign_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('admin.question.assign.to.test') }}">
                @csrf
                <input type="hidden" name="question" id="assign_question">
                <div class="modal-header">
                    <h5 class="modal-title">Assign Modal</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" ddata-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x">
                            <i class="fa fa-times"></i>
                        </span>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body" id="assign_modal_body">
                        
                    <div class="form-controller">
                        <select class="form-select form-select-lg form-select-solid" id="select_test"  name="test" data-control="select2" data-placeholder="Select Test" data-allow-clear="true" required>
                            <option></option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Assign</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('js/swal.js') }}"></script>
<script>
    var target = document.querySelector("#kt_post");

    var blockUI = new KTBlockUI(target, {
        message: '<div class="blockui-message"><span class="spinner-border text-primary"></span> Fetching Tests ...</div>',
    });


    function assign(e){

        let question = e.getAttribute('data-question');
        let lesson = e.getAttribute('data-lesson');

        blockUI.block();
        $("#select_test").html('');

        $.ajax({
            url: "{{ route('admin.question.fetch.test') }}",
            type: "GET",
            data: {
                'lesson': lesson
            },
            success: function(data){

                $("#assign_question").val(question);

                let tests = JSON.parse(data);

                $('#select_test').html('<option selected disabled>Select Tests</option>');

                $.each(tests, function (key, value) {
                    $("#select_test").append('<option value="' + value
                        .id + '">' + value.name + '</option>');
                });

                blockUI.release();
                $("#assign_modal").modal('show');
                
            },
            error: function(res,err){
                blockUI.release();
                    Toast.fire({
                    icon: 'error',
                    title: 'Error',
                    text: err
                }); //display error toast
            }
        })
    }

</script>
@endpush
