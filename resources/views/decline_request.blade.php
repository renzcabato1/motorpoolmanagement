
<div class="modal" id="declined_request" tabindex="-1" role="dialog"  >
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class='col-md-10'>
                    <h5 class="modal-title" id="exampleModalLabel">Decline Request</h5>
                </div>
                <div class='col-md-2'>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <form onsubmit='declined();return false;'  enctype="multipart/form-data" >
                <div class="modal-body">
                    {{-- {{ csrf_field() }} --}}
                    <input type='hidden' value='' id='id_row' required>
                    <div class='col-md-12'>
                        Remarks :
                        <textarea class='form-control' name='remarks' id='remarks' idrequired></textarea>
                     </div>
                 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type='submit'  class="btn btn-primary" >Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>

    function declined()
    {   
        var id = document.getElementById('id_row').value;
        var remarks = document.getElementById('remarks').value;
        // alert(id);
        var remarks = "remarks";
        $.ajax({
            dataType: 'json',
            type:'POST',
            url:  'decline-request',
            data:{id:id,remarks:remarks},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        }).done(function(data){
            $("#row"+id).remove();
            console.log(data);
            swal("Succefully!", "Request has been declined.", "success");
        });
        $("#row"+id).remove();
        $('#approved_request').modal('toggle'); 
        swal("Succefully!", "Request has been declined.", "success");
    }
</script>
