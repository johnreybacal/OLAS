<div class="modal modal-center fade" id="modal-series" tabindex="-1">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Series</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 col-sm-12">
                    <form id="modal-series-form" action="#" class="form-group mt-2">
                        <input type="hidden" id="SeriesId"/>          
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label>Series Name</label>
                            </div>
                            <div class="col-md-8">
                                <input id="Name" name="Name" type="text" class="form-control" placeholder="Series Name" />
                            </div>
                        </div>                          
                
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <!--  <button-- class="btn btn-label btn-primary"><label><i class="fa fa-edit"></i></label> Save Changes</button-->
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-info" onclick="Series_Modal.save()">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    var Series_Modal = {
        data: function () {
            return {
                SeriesId: $('#SeriesId').val(),                
                Name: $('#Name').val(),                
            }
        },

        init: function () {            
            $('#modal-series-form')[0].reset();
            $('input').removeClass('is-invalid').addClass('');
            $('.invalid-feedback').remove();
            $('#rowActive').addClass('invisible');
            $('#modal-series').modal('show');
        },

        new: function () {
            $('#SeriesId').val('0');
            $('.modal-title').text('Add Series');            
            Series_Modal.init();
        },

        edit: function (id) {            
            $('.modal-title').text('Edit Series');            
            Series_Modal.init();
            $.ajax({
                url: "<?php echo base_url('Series/Get/'); ?>" + id,
                success: function(i){
                    i = JSON.parse(i);
                    $('#SeriesId').val(i.SeriesId);
                    $('#Name').val(i.Name);
                }
            });           
        },

        save: function () {
            var message;
                console.log(Series_Modal.data());
                if ($('#SeriesId').val() == 0) {
                    message = "Great Job! New Series has been created";
                } else {
                    message = "Nice! Series has been updated";
                }

                swal({
                    title: 'Confirm Submission',
                    text: 'Save changes for Series',
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'No! Cancel',
                    cancelButtonClass: 'btn btn-default',
                    confirmButtonText: 'Yes! Go for it',
                    confirmButtonClass: 'btn btn-info'
                }).then((result) => {
                    if (result.value) {
                        $.post('<?php echo base_url('Series/Save'); ?>',{
                        series: Series_Modal.data()
                        }, function(i){
                            swal('Good Job!', message, 'success');
        					$('#modal-series').modal('hide');
                            console.log(i);
                        });	
                    }
                })
        }
    }


</script>