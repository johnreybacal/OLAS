<div class="modal modal-center fade" id="modal-patrontype" tabindex="-1">
    <div class="modal-dialog modal-md ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Patron Type</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form-type-line">
                <div class="col-md-12 col-sm-12">
                    <form id="modal-patrontype-form" class="form-group mt-2">
                        <input id="PatronTypeId" hidden/>
                        
                        <div class="row mb-2">
                            <div class="form-group col-12">
                                <label>Name</label>
                                <input  id="Name" class="form-control" type="text" name="Name" placeholder="Name">
                            </div>

                            <div class="form-group col-12">
                                <label>Number of Books</label>
                                <input  id="NumberOfBooks" class="form-control" type="text" name="NumberOfBooks" placeholder="Number of books" data-format="{{9999}}" >
                            </div>
                            
                            <div class="form-group col-12">
                                <label>Number of Days</label>
                                <input  id="NumberOfDays" class="form-control" type="text" name="NumberOfDays" placeholder="Number of days" data-format="{{9999}}">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-info" onclick="PatronType_Modal.validate()">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    var PatronType_Modal = {
        data: function () {
            return {
                PatronTypeId: $('#PatronTypeId').val(),
                Name: $('#Name').val(),
                NumberOfBooks: $('#NumberOfBooks').val(),
                NumberOfDays: $('#NumberOfDays').val(),
                //s: $('#s').find(":selected").text(),
                IsActive: ($('#IsActive').prop("checked") ? 1 : 0)
            }
        },

        init: function () {
            $('#modal-patrontype-form')[0].reset();
            $('input').removeClass('is-invalid').addClass('');
            $('.invalid-feedback').remove();
            $('#modal-patrontype').modal('show');
        },

        new: function () {
            $('#PatronTypeId').val('0');
            $('.modal-title').text('Add Patron Type');
            $('#rowActive').addClass('invisible');
            PatronType_Modal.init();
        },

        edit: function (id) {
            $('.modal-title').text('Edit PatronType');   
            $('#rowActive').removeClass('invisible');
            PatronType_Modal.init();
            $.ajax({
                url: "<?php echo base_url('PatronType/Get/'); ?>" + id,
                success: function(i){
                    i = JSON.parse(i);
                    console.log(i);
                    $('#PatronTypeId').val(i.PatronTypeId);
                    $('#Name').val(i.Name);
                    $('#NumberOfBooks').val(i.NumberOfBooks);
                    $('#NumberOfDays').val(i.NumberOfDays);
                    $('#IsActive').prop("checked", i.IsActive == 1);
                }
            })
        },

        validate: function(){
            $.ajax({
                url:'<?php echo base_url('PatronType/Validate'); ?>',
                type: "POST",
                data: {"patrontype": PatronType_Modal.data()},
                success: function(i){
                    $('.invalid-feedback').remove();
                    $('.is-invalid').removeClass('is-invalid');
                    i = JSON.parse(i);                    
                    if(i.status == 1){
                        PatronType_Modal.save();
                    }else{
                        $.each(i, function(element, message){
                            if(element != 'status'){
                                $('#' + element).addClass('is-invalid').parent().append(message);
                            }
                        });
                    }
                    // Patron_Modal.save();
                }, 
                error: function(i){
                    swal('Oops!', "Something went wrong", 'error');
                }
            })      
        },

        save: function () {
            var message;
                console.log(PatronType_Modal.data());
                if ($('#PatronTypeId').val() == 0) {
                    message = "Great Job! New PatronType has been created";
                } else {
                    message = "Nice! PatronType has been updated";
                }

                swal({
                    title: 'Confirm Submission',
                    text: 'Save changes for Patron Type',
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'No! Cancel',
                    cancelButtonClass: 'btn btn-default',
                    confirmButtonText: 'Yes! Go for it',
                    confirmButtonClass: 'btn btn-info'
                }).then((result) => {
                    if (result.value) {
                        $.post('<?php echo base_url('PatronType/Save'); ?>',{
                        patrontype: PatronType_Modal.data()
                        }, function(i){
                            swal('Good Job!', message, 'success');
                            $('#modal-patrontype').modal('hide');
                                console.log(i);
                                //$('table').DataTable().ajax.reload();
                            }
                        );	
                    }
                })
            
        }
    };


</script>