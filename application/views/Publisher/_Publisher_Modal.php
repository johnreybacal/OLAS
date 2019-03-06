<div class="modal modal-center fade" id="modal-publisher" tabindex="-1">
    <div class="modal-dialog modal-md ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Publisher</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form-type-line">
                <div class="col-md-12 col-sm-12">
                    <form id="modal-publisher-form" action="#" class="form-group mt-2">
                        <input type="hidden" id="PublisherId"/>          
                        
                        <div class="row mb-2">
                            <div class="col-12">
                                <label>Name</label>
                                <input id="PublisherName" name="PublisherName" type="text" class="form-control" placeholder="Name" autofocus/>
                            </div>
                        </div>    

                        <div class="row" id="PublisherRowActive">
                            <div class="col-sm-12 col-md-12">
                                <label>Status:</label>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="switch switch-lg switch-info">
                                        <input type="checkbox" id="PublisherIsActive" name="PublisherIsActive" checked />
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
                <button type="button" class="btn btn-info" onclick="Publisher_Modal.validate()">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#PublisherName').bind("enterKey",function(e){
                Publisher_Modal.validate();
            });
        $('#PublisherName').keyup(function(e){
            if(e.keyCode == 13)
            {
              $(this).trigger("enterKey");
            }
        });
    });

    var Publisher_Modal = {
        data: function () {
            return {
                PublisherId: $('#PublisherId').val(),                
                Name: $('#PublisherName').val(),    
                IsActive: ($('#PublisherIsActive').prop("checked") ? 1 : 0)
            }
        },

        init: function () {            
            $('#modal-publisher-form')[0].reset();
            $('input').removeClass('is-invalid').addClass('');
            $('.invalid-feedback').remove();
            // $('#PublisherRowActive').addClass('invisible'); nukaya yon ni-hide yung toggle button
            $('#modal-publisher').modal('show');
        },

        new: function () {
            $('#PublisherId').val('0');
            $('.modal-title').text('Add Publisher');            
            $('#PublisherRowActive').addClass('invisible');
            Publisher_Modal.init();
        },

        edit: function (id) {            
            $('.modal-title').text('Edit Publisher');            
            $('#PublisherRowActive').removeClass('invisible');          
            Publisher_Modal.init();
            $.ajax({
                url: "<?php echo base_url('Publisher/Get/'); ?>" + id,
                success: function(i){
                    i = JSON.parse(i);
                    $('#PublisherId').val(i.PublisherId);
                    $('#PublisherName').val(i.Name);
                    $('#PublisherIsActive').prop('checked', (i.IsActive == 1));
                }
            });           
        },

        validate: function(){
            $.ajax({
                url:'<?php echo base_url('Publisher/Validate'); ?>',
                type: "POST",
                data: {"publisher": Publisher_Modal.data()},
                success: function(i){
                    $('.invalid-feedback').remove();
                    $('.is-invalid').removeClass('is-invalid');
                    i = JSON.parse(i);                    
                    if(i.status == 1){
                        Publisher_Modal.save();
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
                    $.ajax({
                        url:'<?php echo base_url('Publisher/Save'); ?>',
                        type: "POST",
                        data: {"publisher": Publisher_Modal.data()},
                        success: function(i){
                            // swal('Good Job!', message, 'success');
                            $('#modal-publisher').modal('hide');
                            console.log(i);
                            if(typeof Add !== 'undefined'){
                                Add.refreshPublisher(i);
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