<div class="modal modal-center fade" id="modal-publisher" tabindex="-1">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Publisher</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 col-sm-12">
                    <form id="modal-publisher-form" action="#" class="form-group mt-2">
                        <input type="hidden" id="PublisherId"/>          
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label>Publisher Name</label>
                            </div>
                            <div class="col-md-8">
                                <input id="Name" name="Name" type="text" class="form-control" placeholder="Publisher Name" />
                            </div>
                        </div>                          
                
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <!--  <button-- class="btn btn-label btn-primary"><label><i class="fa fa-edit"></i></label> Save Changes</button-->
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-info" onclick="Publisher_Modal.save()">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    var Publisher_Modal = {
        data: function () {
            return {
                PublisherId: $('#PublisherId').val(),                
                Name: $('#Name').val(),                
            }
        },

        init: function () {            
            $('#modal-publisher-form')[0].reset();
            $('input').removeClass('is-invalid').addClass('');
            $('.invalid-feedback').remove();
            $('#rowActive').addClass('invisible');
            $('#modal-publisher').modal('show');
        },

        new: function () {
            $('#PublisherId').val('0');
            $('.modal-title').text('Add Publisher');            
            Publisher_Modal.init();
        },

        edit: function (id) {            
            $('.modal-title').text('Edit Publisher');            
            Publisher_Modal.init();
            $.ajax({
                url: "<?php echo base_url('Publisher/Get/'); ?>" + id,
                success: function(i){
                    i = JSON.parse(i);
                    $('#PublisherId').val(i.PublisherId);
                    $('#Name').val(i.Name);
                }
            });           
        },

        save: function () {
            var message;
                console.log(Publisher_Modal.data());
                if ($('#PublisherId').val() == 0) {
                    message = "Great Job! New Publisher has been created";
                } else {
                    message = "Nice! Publisher has been updated";
                }

                swal({
                    title: 'Confirm Submission',
                    text: 'Save changes for Publisher',
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'No! Cancel',
                    cancelButtonClass: 'btn btn-default',
                    confirmButtonText: 'Yes! Go for it',
                    confirmButtonClass: 'btn btn-info'
                }).then((result) => {
                    if (result.value) {
                        $.post('<?php echo base_url('Publisher/Save'); ?>',{
                        publisher: Publisher_Modal.data()
                        }, function(i){
                            swal('Good Job!', message, 'success');
        					$('#modal-publisher').modal('hide');
                            console.log(i);
                        });	
                    }
                })
        }
    }


</script>