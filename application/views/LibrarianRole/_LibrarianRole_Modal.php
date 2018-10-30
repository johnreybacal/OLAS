<div class="modal modal-center fade" id="modal-librarianrole" tabindex="-1">
    <div class="modal-dialog modal-md ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add LibrarianRole</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form-type-line">
                <div class="col-12">
                    <form id="modal-librarianrole-form" action="#" class="form-group mt-2">
                        <input type="hidden" id="LibrarianRoleId"/>
                        
                            <div class="row mb-2">
                                <div class="col-12">
                                    <label>Name</label>
                                    <input id="Name" name="Name" type="text" class="form-control" placeholder="Name" />
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
                <button type="button" class="btn btn-info" onclick="LibrarianRole_Modal.validate()">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    var LibrarianRole_Modal = {
        data: function () {
            return {
                LibrarianRoleId: $('#LibrarianRoleId').val(),
                Name: $('#Name').val(),
                //s: $('#s').find(":selected").text(),
                IsActive: ($('#IsActive').prop("checked") ? 1 : 0)
            }
        },

        init: function () {
            $('#modal-librarianrole-form')[0].reset();
            $('input').removeClass('is-invalid').addClass('');
            $('.invalid-feedback').remove();
            $('#modal-librarianrole').modal('show');
        },

        new: function () {
            $('#LibrarianRoleId').val('0');
            $('.modal-title').text('Add Librarian Role');
            $('#rowActive').addClass('invisible');
            LibrarianRole_Modal.init();
        },

        edit: function (id) {
            $('.modal-title').text('Edit Librarian Role');            
            $('#rowActive').removeClass('invisible');
            LibrarianRole_Modal.init();
            $.ajax({
                url: "<?php echo base_url('LibrarianRole/Get/'); ?>" + id,
                success: function(i){
                    i = JSON.parse(i);
                    $('#LibrarianRoleId').val(i.LibrarianRoleId);
                    $('#Name').val(i.Name);
                    $('#IsActive').prop("checked", i.IsActive == 1);
                }
            })
        },

       validate: function(){
            $.ajax({
                url:'<?php echo base_url('LibrarianRole/Validate'); ?>',
                type: "POST",
                data: {"librarianRole": LibrarianRole_Modal.data()},
                success: function(i){
                    $('.invalid-feedback').remove();
                    $('.is-invalid').removeClass('is-invalid');
                    i = JSON.parse(i);                    
                    if(i.status == 1){
                        LibrarianRole_Modal.save();
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
                console.log(LibrarianRole_Modal.data());
                console.log($('#LibrarianRoleId').val());
                if ($('#LibrarianRoleId').val() == 0) {
                    message = "Great Job! New Librarian Role has been created";
                } else {
                    message = "Nice! Librarian Role has been updated";
                }
                console.log($('#LibrarianRoleId').val());

                swal({
                    title: 'Confirm Submission',
                    text: 'Save changes for Librarian Role',
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'No! Cancel',
                    cancelButtonClass: 'btn btn-default',
                    confirmButtonText: 'Yes! Go for it',
                    confirmButtonClass: 'btn btn-info'
                }).then((result) => {
                    if (result.value) {
                        $.post('<?php echo base_url('LibrarianRole/Save'); ?>',{
                        librarianRole: LibrarianRole_Modal.data()
                        }, function(i){
                            swal('Good Job!', message, 'success');
                            $('#modal-librarianrole').modal('hide');

                            // if(i == 0){
                            //         //error
                            //     swal('Something went wrong!', 'If problem persist contact administrator', 'error');
                            //     }
                                console.log(i);
                                //$('table').DataTable().ajax.reload();
                            }
                        );			
                        //

                        // $.ajax({
                        //     url: $('#siteUrl').val() + "librarianrole/save",
                        //     type: "POST",
                        //     contentType: "application/json",
                        //     data: JSON.stringify({ "librarianrole": LibrarianRole_Modal.data() }),
                        //     success: function (i) {
                        //         swal('Good Job!', message, 'success');
                        //         $('#modal-librarianrole').modal('hide');
                        //     },
                        //     error: function (i) {
                        //         swal('Something went wrong!', 'If symptomps persist consult your doctor', 'error');
                        //     }
                        // });
                        //
                    }
                })
            //
            //     $.post('<?php echo base_url('Book/Save'); ?>',{
			// 	book: Book_Add.data()
			// 	}, function(i){
				
			// 		if(i == 0){
			// 			//error
			// 			swal('Something went wrong!', 'If problem persist contact administrator', 'error');
			// 		}
			// 		console.log(i);
			// 		//$('table').DataTable().ajax.reload();
			// 	}
			// );			
            //
        }
    }

</script>