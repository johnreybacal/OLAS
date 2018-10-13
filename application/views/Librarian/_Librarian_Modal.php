<div class="modal modal-center fade" id="modal-librarian" tabindex="-1">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Librarian</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 col-sm-12">
                    <form id="modal-librarian-form" action="#" class="form-group mt-2">
                        <input type="hidden" id="LibrarianId"/>
                        
                        <div class="row mb-2">
                            <div class="col-md-2 col-sm-2">
                                <label>Librarian Role</label>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <select id="LibrarianRoleId" name="LibrarianRoleId" data-provide="selectpicker" title="Choose Librarian Role" data-live-search="true" class="form-control form-type-combine show-tick"></select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2">
                                <label>Librarian FirstName</label>
                            </div>
                            <div class="col-md-9">
                                <input id="FirstName" name="Name" type="text" class="form-control" placeholder="Name" />
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2">
                                <label>Librarian LastName</label>
                            </div>
                            <div class="col-md-9">
                                <input id="LastName" name="Name" type="text" class="form-control" placeholder="Name" />
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2">
                                <label>Username</label>
                            </div>
                            <div class="col-md-9">
                                <input id="Username" name="Username" type="text" class="form-control" placeholder="Username" />
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2">
                                <label>Password</label>
                            </div>
                            <div class="col-md-9">
                                <input id="Password" name="Password" type="password" class="form-control" placeholder="Password" />
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
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-info" onclick="Librarian_Modal.save()">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    var Librarian_Modal = {
        data: function () {
            return {
                LibrarianId: $('#LibrarianId').val(),
                // LibraryRoleId: $('#LibraryRoleId').find(":selected").text(),
                LibrarianRoleId: $('#LibrarianRoleId').selectpicker('val'),
                FirstName: $('#FirstName').val(),
                LastName: $('#LastName').val(),
                Username: $('#Username').val(),
                Password: $('#Password').val(),
                // Active: $('#IsActive').prop("checked")
            }
        },

        init: function () {
            $.ajax({
                url: "<?php echo base_url('LibrarianRole/GetAll'); ?>",
                async: false,
                success: function(i){
                    i = JSON.parse(i);                    
                    $.each(i, function(index, data){                        
                        $('#LibrarianRoleId').append('<option value = "' + data.LibrarianRoleId + '">' + data.Name + '</option>');
                    })
                    $('#LibrarianRoleId').selectpicker('refresh');
                }
            })

            $('#modal-librarian-form')[0].reset();
            $('input').removeClass('is-invalid').addClass('');
            $('.invalid-feedback').remove();
            $('#modal-librarian').modal('show');
        },

        new: function () {
            $('#LibrarianId').val('0');
            $('.modal-title').text('Update');
            $('#rowActive').addClass('invisible');
            Librarian_Modal.init();
        },

        validate: function () {
            
        },

        edit: function (id) {
            $('.modal-title').text('Edit Librarian');            
            Librarian_Modal.init();
            $.ajax({
                url: "<?php echo base_url('Librarian/Get/'); ?>" + id,
                success: function(i){
                    i = JSON.parse(i);
                    console.log("edit");
                    console.log(i);
                    $('#LibrarianId').val(i.LibrarianId),

                    $('#LibrarianRoleId').selectpicker('val', i.LibrarianRoleId);
                    $('#FirstName').val(i.FirstName);
                    $('#LastName').val(i.LastName);
                    $('#Username').val(i.Username);
                    $('#Password').val(i.Password);
                        //optional 
                    // $('#ContactNumber').val(i.ContactNumber);
                    // $('#Email').val(i.Email); 
                }
            })
        },

        save: function() {
            var message;
                console.log(Librarian_Modal.data());
                console.log($('#LibrarianId').val());
                if ($('#LibrarianId').val() == 0) {
                    message = "Great Job! New Librarian has been created";
                } else {
                    message = "Nice! Librarian has been updated";
                }
                console.log($('#LibrarianId').val());

                swal({
                    title: 'Confirm Submission',
                    text: 'Save changes for Librarian',
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'No! Cancel',
                    cancelButtonClass: 'btn btn-default',
                    confirmButtonText: 'Yes! Go for it',
                    confirmButtonClass: 'btn btn-info'
                }).then((result) => {
                    if (result.value) {
                        $.post('<?php echo base_url('Librarian/Save'); ?>',{
                        librarian: Librarian_Modal.data()
                        }, function(i){
                            swal('Good Job!', message, 'success');
                            $('#modal-librarian').modal('hide');

                                console.log(i);
                                //$('table').DataTable().ajax.reload();
                            }
                        );	
                    }
                })
            
        }
    };
</script>