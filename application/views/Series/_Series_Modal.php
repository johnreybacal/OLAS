<div class="modal modal-center fade" id="modal-series" tabindex="-1">
    <div class="modal-dialog modal-md ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Series</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form-type-line">
                <div class="col-md-12 col-sm-12">
                    <form id="modal-series-form" action="#" class="form-group mt-2">
                        <input type="hidden" id="SeriesId"/> 

                        <div class="row mb-2">
                            <div class="col-12">
                                <label>Series Name</label>
                                <input id="SeriesName" name="SeriesName" type="text" class="form-control" placeholder="Series Name" />
                            </div>
                        </div>

                        <div class="row" id="SeriesRowActive">
                            <div class="col-sm-12 col-md-12">
                                <label>Status:</label>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="switch switch-lg switch-info">
                                        <input type="checkbox" id="SeriesIsActive" name="SeriesIsActive" checked />
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
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-info" onclick="Series_Modal.validate()">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    var Series_Modal = {
        data: function () {
            return {
                SeriesId: $('#SeriesId').val(),                
                Name: $('#SeriesName').val(),                
                IsActive: ($('#SeriesIsActive').prop("checked") ? 1 : 0)
            }
        },

        init: function () {            
            $('#modal-series-form')[0].reset();
            $('input').removeClass('is-invalid').addClass('');
            $('.invalid-feedback').remove();            
            $('#modal-series').modal('show');
        },

        new: function () {
            $('#SeriesId').val('0');
            $('.modal-title').text('Add Series');            
            $('#SeriesRowActive').addClass('invisible');
            Series_Modal.init();
        },

        edit: function (id) {            
            $('.modal-title').text('Edit Series');            
            $('#SeriesRowActive').removeClass('invisible');          
            Series_Modal.init();
            $.ajax({
                url: "<?php echo base_url('Series/Get/'); ?>" + id,
                success: function(i){
                    i = JSON.parse(i);
                    $('#SeriesId').val(i.SeriesId);
                    $('#SeriesName').val(i.Name);
                    $('#SeriesIsActive').prop("checked", (i.IsActive == 1));
                }
            });           
        },

        validate: function(){
            $.ajax({
                url:'<?php echo base_url('Series/Validate'); ?>',
                type: "POST",
                data: {"series": Series_Modal.data()},
                success: function(i){
                    $('.invalid-feedback').remove();
                    $('.is-invalid').removeClass('is-invalid');
                    i = JSON.parse(i);                    
                    if(i.status == 1){
                        Series_Modal.save();
                    }else{
                        $.each(i, function(element, message){
                            if(element != 'status'){
                                $('#' + element).addClass('is-invalid').parent().append(message);
                            }
                        });
                    }
                }, 
                error: function(i){
                    swal('Oops!', "Something went wrong", 'error');
                }
            })      
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
                    $.ajax({
                        url:'<?php echo base_url('Series/Save'); ?>',
                        type: "POST",
                        data: {"series": Series_Modal.data()},
                        success: function(i){
                            swal('Good Job!', message, 'success');
                            $('#modal-series').modal('hide');
                            console.log(i);
                            if(typeof Add !== 'undefined'){
                                Add.refreshSeries(i);
                            }
                        }, 
                        error: function(i){
                            swal('Oops!', "Something went wrong", 'error');
                        }
                    })    
                }
            })
        }
    }


</script>