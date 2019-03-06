<div class="modal modal-center fade" id="modal-section" tabindex="-1">
    <div class="modal-dialog modal-md ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Section</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form-type-line">
                <div class="col-md-12 col-sm-12">
                    <form id="modal-section-form" action="#" class="form-group mt-2">
                        <input type="hidden" id="SectionId"/>          
                        
                        <div class="row mb-2">
                            <div class="col-12">
                                <label>Name</label>
                                <input id="SectionName" name="SectionName" type="text" class="form-control" placeholder="Name" autofocus/>
                            </div>
                        </div>   

                        <div class="row" id="SectionRowActive">
                            <div class="col-sm-12 col-md-12">
                                <label>Status:</label>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="switch switch-lg switch-info">
                                        <input type="checkbox" id="SectionIsActive" name="SectionIsActive" checked />
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
                <button type="button" class="btn btn-info" onclick="Section_Modal.validate()">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    var Section_Modal = {
        data: function () {
            return {
                SectionId: $('#SectionId').val(),                
                Name: $('#SectionName').val(),                
                IsActive: ($('#SectionIsActive').prop("checked") ? 1 : 0),
            }
        },

        init: function () {            
            $('#modal-section-form')[0].reset();
            $('input').removeClass('is-invalid').addClass('');
            $('.invalid-feedback').remove();
            // $('#SectionRowActive').addClass('invisible'); nukaya yon ni-hide yung toggle button
            $('#modal-section').modal('show');
        },

        new: function () {
            $('#SectionId').val('0');
            $('.modal-title').text('Add Section');            
            $('#SectionRowActive').addClass('invisible');
            Section_Modal.init();
        },

        edit: function (id) {            
            $('.modal-title').text('Edit Section');            
            $('#SectionRowActive').removeClass('invisible');          
            Section_Modal.init();
            $.ajax({
                url: "<?php echo base_url('Section/Get/'); ?>" + id,
                success: function(i){
                    i = JSON.parse(i);
                    $('#SectionId').val(i.SectionId);
                    $('#SectionName').val(i.Name);
                    $('#SectionIsActive').prop("checked", (i.IsActive == 1));
                }
            });           
        },

        validate: function(){
            $.ajax({
                url:'<?php echo base_url('Section/Validate'); ?>',
                type: "POST",
                data: {"section": Section_Modal.data()},
                success: function(i){
                    $('.invalid-feedback').remove();
                    $('.is-invalid').removeClass('is-invalid');
                    i = JSON.parse(i);                    
                    if(i.status == 1){
                        Section_Modal.save();
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
            console.log(Section_Modal.data());
            if ($('#SectionId').val() == 0) {
                message = "Great Job! New Section has been created";
            } else {
                message = "Nice! Section has been updated";
            }

            swal({
                title: 'Confirm Submission',
                text: 'Save changes for Section',
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: 'No! Cancel',
                cancelButtonClass: 'btn btn-default',
                confirmButtonText: 'Yes! Go for it',
                confirmButtonClass: 'btn btn-info'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url:'<?php echo base_url('Section/Save'); ?>',
                        type: "POST",
                        data: {"section": Section_Modal.data()},
                        success: function(i){
                            swal('Good Job!', message, 'success');
                            $('#modal-section').modal('hide');
                            console.log(i);
                            if(typeof Add !== 'undefined'){
                                Add.refreshSection(i);
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