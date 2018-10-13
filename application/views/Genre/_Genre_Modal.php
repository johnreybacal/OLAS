<div class="modal modal-center fade" id="modal-genre" tabindex="-1">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Genre</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 col-sm-12">
                    <form id="modal-genre-form" action="#" class="form-group mt-2">
                        <input type="hidden" id="GenreId"/>          
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label>Genre Name</label>
                            </div>
                            <div class="col-md-8">
                                <input id="Name" name="Name" type="text" class="form-control" placeholder="Genre Name" />
                            </div>
                        </div>                          
                
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <!--  <button-- class="btn btn-label btn-primary"><label><i class="fa fa-edit"></i></label> Save Changes</button-->
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-info" onclick="Genre_Modal.save()">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    var Genre_Modal = {
        data: function () {
            return {
                GenreId: $('#GenreId').val(),                
                Name: $('#Name').val(),                
            }
        },

        init: function () {            
            $('#modal-genre-form')[0].reset();
            $('input').removeClass('is-invalid').addClass('');
            $('.invalid-feedback').remove();
            $('#rowActive').addClass('invisible');
            $('#modal-genre').modal('show');
        },

        new: function () {
            $('#GenreId').val('0');
            $('.modal-title').text('Add Genre');            
            Genre_Modal.init();
        },

        edit: function (id) {            
            $('.modal-title').text('Edit Genre');            
            Genre_Modal.init();
            $.ajax({
                url: "<?php echo base_url('Genre/Get/'); ?>" + id,
                success: function(i){
                    i = JSON.parse(i);
                    $('#GenreId').val(i.GenreId);
                    $('#Name').val(i.Name);
                }
            });           
        },

        save: function () {
            var message;
                console.log(Genre_Modal.data());
                if ($('#GenreId').val() == 0) {
                    message = "Great Job! New Genre has been created";
                } else {
                    message = "Nice! Genre has been updated";
                }

                swal({
                    title: 'Confirm Submission',
                    text: 'Save changes for Genre',
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'No! Cancel',
                    cancelButtonClass: 'btn btn-default',
                    confirmButtonText: 'Yes! Go for it',
                    confirmButtonClass: 'btn btn-info'
                }).then((result) => {
                    if (result.value) {
                        $.post('<?php echo base_url('Genre/Save'); ?>',{
                        genre: Genre_Modal.data()
                        }, function(i){
                            swal('Good Job!', message, 'success');
        					$('#modal-genre').modal('hide');
                            console.log(i);
                        });	
                    }
                })
        }
    }


</script>