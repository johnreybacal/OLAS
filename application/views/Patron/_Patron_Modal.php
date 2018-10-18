<div class="modal modal-center fade" id="modal-patron-edit" tabindex="-1">
    <div class="modal-dialog modal-sm ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Patron</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form-type-line">
                <div class="col-md-12 col-sm-12">
                    <form id="modal-patron-edit-form">
                        <input id="PatronId" hidden/>
                        
                        <div class="row mb-2">
                            <div class="form-group col-lg-12 col-md-12 col-sm-12" style="margin: auto;">
                                <label>Patron Type</label>
                                <select id="PatronTypeId" name="PatronTypeId" data-provide="selectpicker" title="Choose Patron Type" data-live-search="true" class="form-control show-tick"></select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                <label>First Name</label>
                                <input  id="FirstName" class="form-control" type="text" name="FirstName" placeholder="First Name">
                            </div>
                            <!-- <div class="form-group col-12">
                                <label>Middle Name</label>
                                <input  id="MiddleName" class="form-control" type="text" name="MiddleName" placeholder="Middle Name">
                            </div> -->
                            <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                <label>Last Name</label>
                                <input  id="LastName" class="form-control" type="text" name="Lastname" placeholder="Last Name">
                            </div>
                            <!-- <div class="form-group col-12">
                                    <label>Sex</label>
                                    <select class="form-control" title="Sex" data-provide="selectpicker" tabindex="-98" name="Gender" id="Gender">
                                            <option value="FEMALE">Female</option>
                                            <option value="MALE">Male</option>
                                    </select>
                            </div> -->
                            <div class="form-group col-lg-12 col-md-12 col-sm-12"> <!-- has-form-text" -->
                                <label>Email</label>
                                <input  id="Email" class="form-control" type="email" name="Email" placeholder="Email">
                                <!-- <small class="form-text">We'll never share your email with anyone else.</small> -->
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-122">
                                <label>Contact Number</label>
                                <input  id="ContactNumber" class="form-control" type="number" name="ContactNumber" placeholder="Contact Number">
                            </div>
                            <!-- <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                <label>Email</label>
                                <input  id="Email" class="form-control" type="text" name="Email" placeholder="Email">
                            </div> -->
                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                <label>Password</label>
                                <input  id="Password" class="form-control" type="password" name="Password" placeholder="Password">
                            </div>
                            <!-- <div class="form-group col-12">
                                <label>Confirm Password</label>
                                <input  id="ConfirmPassword" class="form-control" type="password" name="ConfirmPassword" placeholder="Confirm Password">
                            </div> -->
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-info" onclick="Patron_Modal.save()">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    var Patron_Modal = {
        data: function () {
            return {
                PatronId: $('#PatronId').val(),
                PatronTypeId: $('#PatronTypeId').selectpicker('val'),
                FirstName: $('#FirstName').val(),
                LastName: $('#LastName').val(),
                Email: $('#Email').val(),
                Password: $('#Password').val(),
                ContactNumber: $('#ContactNumber').val(),
                // Email: $('#Email').val(),
                //s: $('#s').find(":selected").text(),
                //Active: $('#IsActive').prop("checked")
            }
            console.log(Patron_Modal.data.val());
        },

        init: function () {
            $.ajax({
                url: "<?php echo base_url('PatronType/GetAll'); ?>",
                async: false,
                success: function(i){
                    i = JSON.parse(i);          
                    $('#PatronTypeId').empty();          
                    $.each(i, function(index, data){                        
                        $('#PatronTypeId').append('<option value = "' + data.PatronTypeId + '">' + data.Name + '</option>');
                    })
                    $('#PatronTypeId').selectpicker('refresh');
                }
            })

            $('#modal-patron-edit-form')[0].reset();
            $('input').removeClass('is-invalid').addClass('');
            $('.invalid-feedback').remove();
            $('#modal-patron-edit').modal('show');
        },

        new: function () {
            $('#PatronId').val('0');
            $('.modal-title').text('Add Patron');
            $('#rowActive').addClass('invisible');
            Patron_Modal.init();
        },

        edit: function (id) {
            $('.modal-title').text('Edit Patron');            
            Patron_Modal.init();
            $.ajax({
                url: "<?php echo base_url('Patron/Get/'); ?>" + id,
                success: function(i){
                    i = JSON.parse(i);
                    console.log("edit");
                    console.log(i);
                    $('#PatronId').val(i.PatronId),

                    $('#FirstName').val(i.FirstName);
                    $('#PatronTypeId').selectpicker('val', i.PatronTypeId);
                    $('#LastName').val(i.LastName);
                    $('#Email').val(i.Email);
                    $('#Password').val(i.Password);
                    $('#ContactNumber').val(i.ContactNumber);
                    // $('#Email').val(i.Email);
                }
            })
        },

        validate: function () {
            $('input').removeClass('is-invalid').addClass('');
            $('.invalid-feedback').remove();

            $.ajax({
                url: $('#siteUrl').val() + "patron/validate",
                type: "POST",
                contentType: "application/json",
                data: JSON.stringify({ "patron": Patron_Modal.data() }),
                success: function (i) {
                    if (i.status == false) {
                        $.each(i.data, function (key, value) {
                            var element = $('#' + value.key);

                            element.closest('.form-control')
                            .removeClass('.is-invalid')
                            .addClass(value.message.length > 0 ? 'is-invalid' : '')

                            element.closest('form-group')
                            .find('invalid-feedback')
                            .remove();

                            element.after(value.message);
                        });
                    } else {
                        Patron_Modal.save();
                    }
                }
            });
        },

        sad: function(){

        },

        save: function () {
            var message;
                console.log(Patron_Modal.data());
                console.log($('#PatronId').val());
                if ($('#PatronId').val() == 0) {
                    message = "Great Job! New Patron has been created";
                } else {
                    message = "Nice! Patron has been updated";
                }
                console.log($('#PatronId').val());

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
                        $.post('<?php echo base_url('Patron/Save'); ?>',{
                        patron: Patron_Modal.data()
                        }, function(i){
                            swal('Good Job!', message, 'success');
                            $('#modal-patron-edit').modal('hide');

                                console.log(i);
                                //$('table').DataTable().ajax.reload();
                            }
                        );	
                    }
                })
            
        }
    };


</script>