<div class="modal modal-center fade" id="modal-college" tabindex="-1">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add College</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 col-sm-12">
                    <form id="modal-college-form" action="#" class="form-group mt-2">
                        <input type="hidden" id="CollegeId"/>


                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label>College Name</label>
                            </div>
                            <div class="col-md-8">
                                <input id="Name" name="Name" type="text" class="form-control" placeholder="College Name" />
                            </div>
                        </div>   

                        <div class="row" id="rowActive">
                            <div class="col-sm-2 col-md-2">
                                <label>Status:</label>
                            </div>
                            <div class="col-sm-8 col-md-8">
                                <div class="form-group">
                                    <label class="switch switch-info">
                                        <input type="checkbox" id="IsActive" name="IsActive" checked />
                                        <span class="switch-indicator"></span>
                                        <label>Active</label>
                                    </label>
                                </div>
                            </div>
                        </div>                 
                      
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <!--  <button-- class="btn btn-label btn-primary"><label><i class="fa fa-edit"></i></label> Save Changes</button-->
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-info" onclick="College_Modal.save()">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    var College_Modal = {
        data: function () {
            return {
                CollegeId: $('#CollegeId').val(),
                Name: $('#Name').val(),                 
                IsActive: $('#IsActive').prop("checked")
            }
        },

        init: function () {
            // $('#rowActive').addClass('invisible'); nukaya yon ni-hide yung toggle button
            $('#modal-college').modal('show');
            $('#modal-college-form')[0].reset();
            $('input').removeClass('is-invalid').addClass('');
            $('.invalid-feedback').remove();
        },

        new: function () {
            $('#CollegeId').val('0');
            $('.modal-title').text('Add College');    
            $('#rowActive').addClass('invisible');
            College_Modal.init();
        },

        edit: function (id) {
            $('.modal-title').text('Edit College');            
            $('#rowActive').removeClass('invisible');          
            College_Modal.init();
            $.ajax({
                url: "<?php echo base_url('College/Get/'); ?>" + id,
                success: function(i){
                    i = JSON.parse(i);
                    $('#CollegeId').val(i.CollegeId);
                    $('#Name').val(i.Name);
                    $('#IsActive').prop("checked", i.IsActive);
                }
            })
        },

        save: function () {

            var message;
                console.log(College_Modal.data());
                if ($('#CollegeId').val() == 0) {
                    message = "Great Job! New College has been created";
                } else {
                    message = "Nice! College has been updated";
                }

                swal({
                    title: 'Confirm Submission',
                    text: 'Save changes for College',
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'No! Cancel',
                    cancelButtonClass: 'btn btn-default',
                    confirmButtonText: 'Yes! Go for it',
                    confirmButtonClass: 'btn btn-info'
                }).then((result) => {
                    if (result.value) {
                        $.post('<?php echo base_url('College/Save'); ?>',{
				            college: College_Modal.data()
				            }, function(i){				
                            swal('Good Job!', message, 'success');
					        $('#modal-college').modal('hide');
                            console.log(i);
                            }
                        );	
                    }
                })
           
        }
    }


</script>