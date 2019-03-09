<div class="modal modal-center modal-xlg fade" id="modal-circulation" tabindex="-1">
    <div class="modal-dialog modal-lg" style="width:30%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reservation</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form-type-line">
                <div class="col-md-12 col-sm-12">
                    <form id="modal-circulation-form" action="#" class="form-group mt-2">
                        <input type="hidden" id="ReservationId"/>    
                        <div id="rowIssue"> 
                            <div class="row mb-2">
                                <div class="col-12">
                                    <label>Expiration</label>
                                    <input id="Expiration" class="form-control" type="text" name="" placeholder="Expiration">
                                </div>
                            </div>  
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-info" onclick="Reservation_Modal.validate()">Save</button>
            </div>
        </div>
    </div>
</div>

<script>

    var Reservation_Modal = {
        data: function () {
            return {
                ReservationId: $('#ReservationId').val(),
                Expiration: $('#Expiration').val(),              
            }
        },

        init: function () {
            //$('#modal-circulation-form')[0].reset();   
            $('#modal-circulation').modal('show');
        },

        edit: function (id) {            
                $('.modal-title').text('Edit Expiration');
                $('#rowReturn').show();
                $('#rowIssue').show();
                Reservation_Modal.init();
                Reservation_Modal.get(id);            
        },

        get: function(id){            
                $.ajax({
                    url: "<?php echo base_url('Reservation/Get/'); ?>" + id, 
                    success: function(i){
                        i = JSON.parse(i);
                        $('#ReservationId').val(i.ReservationId);
                        $('#Expiration').val(i.Expiration);
                        
                    }
                })
        },

        validate: function(){
            $.ajax({
                url:'<?php echo base_url('Reservation/Validate'); ?>',
                type: "POST",
                data: {"reservation": Reservation_Modal.data()},
                success: function(i){
                    $('.invalid-feedback').remove();
                    $('.is-invalid').removeClass('is-invalid');
                    i = JSON.parse(i);                    
                    if(i.status == 1){
                        Reservation_Modal.save();
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
            var message = "Nice! Issue has been updated.";
                swal({
                    title: 'Confirm Submission',
                    text: 'Save changes for Reservation',
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'No! Cancel',
                    cancelButtonClass: 'btn btn-default',
                    confirmButtonText: 'Yes! Go for it',
                    confirmButtonClass: 'btn btn-info'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url:'<?php echo base_url('Reservation/UpdateExpiry'); ?>',
                            type: "POST",
                            data: {"reservation": Reservation_Modal.data()},
                            success: function(i){
                                swal('Good Job!', message, 'success');
                                $('#modal-circulation').modal('hide');
                                console.log(i);
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