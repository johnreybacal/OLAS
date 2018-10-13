<div class="modal modal-center fade" id="modal-author" tabindex="-1">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Author</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 col-sm-12">
                    <form id="modal-author-form" action="#" class="form-group mt-2">
                        <input type="hidden" id="AuthorId"/>          
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label>Author Name</label>
                            </div>
                            <div class="col-md-8">
                                <input id="Name" name="Name" type="text" class="form-control" placeholder="Author Name" />
                            </div>
                        </div>                          
                
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <!--  <button-- class="btn btn-label btn-primary"><label><i class="fa fa-edit"></i></label> Save Changes</button-->
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-info" onclick="Author_Modal.save()">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    var Author_Modal = {
        data: function () {
            return {
                AuthorId: $('#AuthorId').val(),                
                Name: $('#Name').val(),                
            }
        },

        init: function () {            
            $('#modal-author-form')[0].reset();
            $('input').removeClass('is-invalid').addClass('');
            $('.invalid-feedback').remove();
            // $('#rowActive').addClass('invisible'); nukaya yon ni-hide yung toggle button
            $('#modal-author').modal('show');
        },

        new: function () {
            $('#AuthorId').val('0');
            $('.modal-title').text('Add Author');            
            $('#rowActive').addClass('invisible');
            Author_Modal.init();
        },

        edit: function (id) {            
            $('.modal-title').text('Edit Author');  
            $('#rowActive').removeClass('invisible');          
            Author_Modal.init();
            $.ajax({
                url: "<?php echo base_url('Author/Get/'); ?>" + id,
                success: function(i){
                    i = JSON.parse(i);
                    $('#AuthorId').val(i.AuthorId);
                    $('#Name').val(i.Name);
                }
            });           
        },

        save: function () {
            var message;
                console.log(Author_Modal.data());
                if ($('#AuthorId').val() == 0) {
                    message = "Great Job! New Author has been created";
                } else {
                    message = "Nice! Author has been updated";
                }

                swal({
                    title: 'Confirm Submission',
                    text: 'Save changes for Author',
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'No! Cancel',
                    cancelButtonClass: 'btn btn-default',
                    confirmButtonText: 'Yes! Go for it',
                    confirmButtonClass: 'btn btn-info'
                }).then((result) => {
                    if (result.value) {
                        $.post('<?php echo base_url('Author/Save'); ?>',{
                        author: Author_Modal.data()
                        }, function(i){
                            swal('Good Job!', message, 'success');
        					$('#modal-author').modal('hide');
                            console.log(i);
                        });	
                    }
                })
        }
    }


</script>