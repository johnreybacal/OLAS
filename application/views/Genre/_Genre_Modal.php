<div class="modal modal-center fade" id="modal-genre" tabindex="-1">
    <div class="modal-dialog modal-md ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Genre</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form-type-line">
                <div class="col-md-12 col-sm-12">
                    <form id="modal-genre-form" action="#" class="form-group mt-2">
                        <input type="hidden" id="GenreId"/>          
                        
                        <div class="row mb-2">
                            <div class="col-12">
                                <label>Genre Name</label>
                                <input id="Name" name="Name" type="text" class="form-control" placeholder="Genre Name" />
                            </div>
                        </div>   

                        <div class="row" id="rowActive">
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
                        </div>                       
                
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-info" onclick="Genre_Modal.validate()">Save</button>
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
                IsActive: ($('#IsActive').prop("checked") ? 1 : 0),
            }
        },

        init: function () {            
            $('#modal-genre-form')[0].reset();
            $('input').removeClass('is-invalid').addClass('');
            $('.invalid-feedback').remove();
            // $('#rowActive').addClass('invisible'); nukaya yon ni-hide yung toggle button
            $('#modal-genre').modal('show');
        },

        new: function () {
            $('#GenreId').val('0');
            $('.modal-title').text('Add Genre');            
            $('#rowActive').addClass('invisible');
            Genre_Modal.init();
        },

        edit: function (id) {            
            $('.modal-title').text('Edit Genre');            
            $('#rowActive').removeClass('invisible');          
            Genre_Modal.init();
            $.ajax({
                url: "<?php echo base_url('Genre/Get/'); ?>" + id,
                success: function(i){
                    i = JSON.parse(i);
                    $('#GenreId').val(i.GenreId);
                    $('#Name').val(i.Name);
                    $('#IsActive').prop("checked", (i.IsActive == 1));
                }
            });           
        },

        validate: function(){
            $.ajax({
                url:'<?php echo base_url('Genre/Validate'); ?>',
                type: "POST",
                data: {"genre": Genre_Modal.data()},
                success: function(i){
                    $('.invalid-feedback').remove();
                    $('.is-invalid').removeClass('is-invalid');
                    i = JSON.parse(i);                    
                    if(i.status == 1){
                        Genre_Modal.save();
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
                    $.ajax({
                        url:'<?php echo base_url('Genre/Save'); ?>',
                        type: "POST",
                        data: {"genre": Genre_Modal.data()},
                        success: function(i){
                            swal('Good Job!', message, 'success');
                            $('#modal-genre').modal('hide');
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