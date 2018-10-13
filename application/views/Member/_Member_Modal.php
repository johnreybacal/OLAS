<div class="modal modal-center fade" id="modal-member-edit" tabindex="-1">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Member</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 col-sm-12">
                    <form id="modal-member-edit-form">
                        <input id="MemberId" hidden/>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-shadowed">
                                    <div class="card-title">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4><strong>Book</strong> Information</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-row gap-1">
                                                    <div class="form-group col-md-6" style="margin: auto;">
                                                            <label>Member Type</label>
                                                            <select id="MemberTypeId" name="MemberTypeId" data-provide="selectpicker" title="Choose Member Type" data-live-search="true" class="form-control form-type-combine show-tick"></select>
                                                    </div>
                                                </div>
                                                <div class="form-row gap-1">
                                                    <div class="form-group col-md-4">
                                                        <label>First Name</label>
                                                        <input  id="FirstName" class="form-control" type="text" name="FirstName" placeholder="First Name">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Middle Name</label>
                                                        <input  id="MiddleName" class="form-control" type="text" name="MiddleName" placeholder="Middle Name">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Last Name</label>
                                                        <input  id="LastName" class="form-control" type="text" name="Lastname" placeholder="Last Name">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                            <label>Sex</label>
                                                            <select class="form-control" title="Sex" data-provide="selectpicker" tabindex="-98" name="Gender" id="Gender">
                                                                    <option value="FEMALE">Female</option>
                                                                    <option value="MALE">Male</option>
                                                            </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Email</label>
                                                        <input  id="Email" class="form-control" type="email" name="Email" placeholder="Email">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Contact Number</label>
                                                        <input  id="ContactNumber" class="form-control" type="number" name="ContactNumber" placeholder="Contact Number">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Username</label>
                                                        <input  id="Username" class="form-control" type="text" name="Username" placeholder="Username">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Password</label>
                                                        <input  id="Password" class="form-control" type="password" name="Password" placeholder="Password">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Confirm Password</label>
                                                        <input  id="ConfirmPassword" class="form-control" type="password" name="ConfirmPassword" placeholder="Confirm Password">
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- row -->
                                    </div> <!-- card-body -->
                                </div> <!-- card -->
                            </div> <!-- col-lg-12 -->
                        </div> <!-- row -->
                    </form> <!-- row -->
                </div>
            </div>
            <div class="modal-footer">
                <!--  <button-- class="btn btn-label btn-primary"><label><i class="fa fa-edit"></i></label> Save Changes</button-->
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-info" onclick="Member_Modal.save()">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    var Member_Modal = {
        data: function () {
            return {
                MemberId: $('#MemberId').val(),
                MemberTypeId: $('#MemberTypeId').selectpicker('val'),
                FirstName: $('#FirstName').val(),
                LastName: $('#LastName').val(),
                Username: $('#Username').val(),
                Password: $('#Password').val(),
                ContactNumber: $('#ContactNumber').val(),
                Email: $('#Email').val(),
                //s: $('#s').find(":selected").text(),
                //Active: $('#IsActive').prop("checked")
            }
            console.log(Member_Modal.data.val());
        },

        init: function () {
            $.ajax({
                url: "<?php echo base_url('MemberType/GetAll'); ?>",
                async: false,
                success: function(i){
                    i = JSON.parse(i);                    
                    $.each(i, function(index, data){                        
                        $('#MemberTypeId').append('<option value = "' + data.MemberTypeId + '">' + data.Name + '</option>');
                    })
                    $('#MemberTypeId').selectpicker('refresh');
                }
            })

            $('#modal-member-edit-form')[0].reset();
            $('input').removeClass('is-invalid').addClass('');
            $('.invalid-feedback').remove();
            $('#modal-member-edit').modal('show');
        },

        new: function () {
            $('#MemberId').val('0');
            $('.modal-title').text('Update');
            $('#rowActive').addClass('invisible');
            Member_Modal.init();
        },

        edit: function (id) {
            $('.modal-title').text('Edit Member');            
            Member_Modal.init();
            $.ajax({
                url: "<?php echo base_url('Member/Get/'); ?>" + id,
                success: function(i){
                    i = JSON.parse(i);
                    console.log("edit");
                    console.log(i);
                    $('#MemberId').val(i.MemberId),

                    $('#FirstName').val(i.FirstName);
                    $('#MemberTypeId').selectpicker('val', i.MemberTypeId);
                    $('#LastName').val(i.LastName);
                    $('#Username').val(i.Username);
                    $('#Password').val(i.Password);
                    $('#ContactNumber').val(i.ContactNumber);
                    $('#Email').val(i.Email);
                }
            })
        },

        validate: function () {
            $('input').removeClass('is-invalid').addClass('');
            $('.invalid-feedback').remove();

            $.ajax({
                url: $('#siteUrl').val() + "member/validate",
                type: "POST",
                contentType: "application/json",
                data: JSON.stringify({ "member": Member_Modal.data() }),
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
                        Member_Modal.save();
                    }
                }
            });
        },

        sad: function(){

        },

        save: function () {
            var message;
                console.log(Member_Modal.data());
                console.log($('#MemberId').val());
                if ($('#MemberId').val() == 0) {
                    message = "Great Job! New Member has been created";
                } else {
                    message = "Nice! Member has been updated";
                }
                console.log($('#MemberId').val());

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
                        $.post('<?php echo base_url('Member/Save'); ?>',{
                        member: Member_Modal.data()
                        }, function(i){
                            swal('Good Job!', message, 'success');
                            $('#modal-member-edit').modal('hide');

                                console.log(i);
                                //$('table').DataTable().ajax.reload();
                            }
                        );	
                    }
                })
            
        }
    };


</script>