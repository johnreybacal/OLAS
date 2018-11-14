<style>

 /*ME\\----------------MEDIA QUERIES ********** RESPONSIVENESS*/
 @media screen and (min-width: 1px) and (max-width: 320px){
    .isactive{
        margin-left: 74%;
    }
 }
 @media screen and (min-width: 321px) and (max-width: 375px){
    .isactive{
        margin-left: 78%;
    }
 }
 @media screen and (min-width: 376px) and (max-width: 425px){
    .isactive{
        margin-left: 81%;
    }
 }
 /*@media screen and (max-width: 768px){
    div.isactive{
        margin-left: 84%;
    }
 }
 @media screen and (max-width: 1024px){
    div.isactive{
        margin-left: 84%;
    }
 }*/
 @media screen and (min-width: 426px) and (max-width: 1024px){
    div.isactive{
        margin-left: 84%;
    }
} 
@media screen and (min-width: 1025px) and (max-width: 1440px){
    div.isactive{
        margin-left: 83%;
    }
}
@media screen and (min-width: 1440px){
    div.isactive{
        margin-left: 83%;
    }
}
 

</style>
<div class="modal modal-center fade" id="modal-author" tabindex="-1">
    <div class="modal-dialog modal-md ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Author</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form-type-line">
                <div class="row isactive" id="AuthorRowActive">
                    <div class="form-group">
                        <label class="switch switch-lg switch-info">
                            <input type="checkbox" id="AuthorIsActive" name="AuthorIsActive" checked />
                            <span class="switch-indicator"></span>
                            <label>Active</label>
                        </label>
                    </div>
                </div> 
                <div class="col-md-12 col-sm-12">
                    <form id="modal-author-form" action="#" class="form-group mt-2">
                        <input type="hidden" id="AuthorId"/>          
                        
                        <div class="row mb-2">
                            <div class="col-12">
                                <label>Author Name</label>
                                <input id="AuthorName" name="AuthorName" type="text" class="form-control" placeholder="Author Name" />
                            </div>
                        </div>                          
                        <!-- <div class="row" id="AuthorRowActive">
                            <div class="col-sm-12 col-md-12">
                                <label>Status:</label>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="switch switch-lg switch-info">
                                        <input type="checkbox" id="IsActive" name="IsActive" checked />
                                        <span class="switch-indicator"></span>
                                        <label>Active</label>
                                    </label>
                                </div>
                            </div>
                        </div>  -->

                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
                <button id="Save" type="button" class="btn btn-info" onclick="Author_Modal.validate()">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    var Author_Modal = {
        data: function () {
            return {
                AuthorId: $('#AuthorId').val(),                
                Name: $('#AuthorName').val(),        
                IsActive: ($('#AuthorIsActive').prop("checked") ? 1 : 0)        
            }
        },

        init: function () {            
            $('#modal-author-form')[0].reset();
            $('input').removeClass('is-invalid').addClass('');
            $('.invalid-feedback').remove();
            $('#modal-author').modal('show');
        },

        new: function () {
            $('#AuthorId').val('0');            
            $('.modal-title').text('Add Author');    
            // $('#AuthorRowActive').addClass('invisible');        
            $('#AuthorRowActive').attr('hidden', 'true');
            $('#Save').html('Save');   
            Author_Modal.init();
        },

        edit: function (id) {            
            $('.modal-title').text('Edit Author');  
            // $('#AuthorRowActive').removeClass('invisible');        
            $('#AuthorRowActive').removeAttr('hidden');   
            $('#Save').html('Save Changes');   
            Author_Modal.init();
            $.ajax({
                url: "<?php echo base_url('Author/Get/'); ?>" + id,
                success: function(i){
                    i = JSON.parse(i);
                    $('#AuthorId').val(i.AuthorId);
                    $('#AuthorName').val(i.Name);
                    $('#AuthorIsActive').prop("checked", (i.IsActive == 1));
                }
            });           
        },

        validate: function(){
            $.ajax({
                url:'<?php echo base_url('Author/Validate'); ?>',
                type: "POST",
                data: {"author": Author_Modal.data()},
                success: function(i){
                    $('.invalid-feedback').remove();
                    $('.is-invalid').removeClass('is-invalid');
                    i = JSON.parse(i);                    
                    if(i.status == 1){
                        Author_Modal.save();
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
                    $.ajax({
                        url:'<?php echo base_url('Author/Save'); ?>',
                        type: "POST",
                        data: {"author": Author_Modal.data()},
                        success: function(i){
                            swal('Good Job!', message, 'success');
                            $('#modal-author').modal('hide');
                            console.log(i);
                            if(typeof Add !== 'undefined'){
                                Add.refreshAuthor(i);
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