<div class="modal modal-center fade" id="modal-librarianrole" tabindex="-1">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add LibrarianRole</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 col-sm-12">
                    <form id="modal-librarianrole-form" action="#" class="form-group mt-2">
                        <input type="hidden" id="LibrarianRoleId"/>
                        
                          
                                <div class="row mb-2">
                                    <div class="col-md-2">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input id="Name" name="Name" type="text" class="form-control" placeholder="LibrarianRole Data" />
                                    </div>
                                </div>
                           
                            <!-- <div class="row" id="rowActive">
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
                            </div> -->
                      
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <!--  <button-- class="btn btn-label btn-primary"><label><i class="fa fa-edit"></i></label> Save Changes</button-->
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-info" onclick="LibrarianRole_Modal.save()">Save</button>
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
                //Active: $('#IsActive').prop("checked")
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
            $('.modal-title').text('Update');
            $('#rowActive').addClass('invisible');
            LibrarianRole_Modal.init();
        },

        edit: function (id) {
            $('.modal-title').text('Edit Librarian Role');            
            LibrarianRole_Modal.init();
            $.ajax({
                url: "<?php echo base_url('LibrarianRole/Get/'); ?>" + id,
                success: function(i){
                    i = JSON.parse(i);
                    $('#LibrarianRoleId').val(i.LibrarianRoleId);
                    $('#Name').val(i.Name);
                }
            })
        },

        validate: function () {
            
        },

        save: function () {
            var message;
                console.log(LibrarianRole_Modal.data());
                console.log($('#LibrarianRoleId').val());
                if ($('#LibrarianRoleId').val() == 0) {
                    message = "Great Job! New LibrarianRole has been created";
                } else {
                    message = "Nice! LibrarianRole has been updated";
                }
                console.log($('#LibrarianRoleId').val());

                swal({
                    title: 'Confirm Submission',
                    text: 'Save changes for Member Type',
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'No! Cancel',
                    cancelButtonClass: 'btn btn-default',
                    confirmButtonText: 'Yes! Go for it',
                    confirmButtonClass: 'btn btn-info'
                }).then((result) => {
                    if (result.value) {
                        $.post('<?php echo base_url('LibrarianRole/Save'); ?>',{
                        librarianrole: LibrarianRole_Modal.data()
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