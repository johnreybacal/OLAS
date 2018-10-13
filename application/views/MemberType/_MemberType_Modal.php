<div class="modal modal-center fade" id="modal-membertype" tabindex="-1">
    <div class="modal-dialog modal-md ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add MemberType</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form-type-line">
                <div class="col-md-12 col-sm-12">
                    <form id="modal-membertype-form" action="#" class="form-group mt-2">
                        <input type="hidden" id="MemberTypeId"/>
                        
                          
                            <div class="row mb-2">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input id="Name" name="Name" type="text" class="form-control" placeholder="Name" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Number of Books</label>
                                        <input id="NumberOfBooks" name="NumberOfBooks" type="text" class="form-control" placeholder="Number of Books" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Number of Days</label>
                                        <input id="NumberOfDays" name="NumberOfDays" type="text" class="form-control" placeholder="Number of Days" />
                                    </div>
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
                <button type="button" class="btn btn-info" onclick="MemberType_Modal.save()">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    var MemberType_Modal = {
        data: function () {
            return {
                MemberTypeId: $('#MemberTypeId').val(),
                Name: $('#Name').val(),
                NumberOfBooks: $('#NumberOfBooks').val(),
                NumberOfDays: $('#NumberOfDays').val(),
                //s: $('#s').find(":selected").text(),
                IsActive: ($('#IsActive').prop("checked") ? 1 : 0)
            }
        },

        init: function () {
            $('#modal-membertype-form')[0].reset();
            $('input').removeClass('is-invalid').addClass('');
            $('.invalid-feedback').remove();
            $('#modal-membertype').modal('show');
        },

        new: function () {
            $('#MemberTypeId').val('0');
            $('.modal-title').text('Add Member Type');
            $('#rowActive').addClass('invisible');
            MemberType_Modal.init();
        },

        edit: function (id) {
            $('.modal-title').text('Edit MemberType');   
            $('#rowActive').removeClass('invisible');
            MemberType_Modal.init();
            $.ajax({
                url: "<?php echo base_url('MemberType/Get/'); ?>" + id,
                success: function(i){
                    i = JSON.parse(i);
                    console.log(i);
                    $('#MemberTypeId').val(i.MemberTypeId);
                    $('#Name').val(i.Name);
                    $('#NumberOfBooks').val(i.NumberOfBooks);
                    $('#NumberOfDays').val(i.NumberOfDays);
                    $('#IsActive').prop("checked", i.IsActive == 1);
                }
            })
        },

        validate: function () {
            $('input').removeClass('is-invalid').addClass('');
            $('.invalid-feedback').remove();

            $.ajax({
                url: $('#siteUrl').val() + "membertype/validate",
                type: "POST",
                contentType: "application/json",
                data: JSON.stringify({ "membertype": MemberType_Modal.data() }),
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
                        MemberType_Modal.save();
                    }
                }
            });
        },

        save: function () {
            var message;
                console.log(MemberType_Modal.data());
                if ($('#MemberTypeId').val() == 0) {
                    message = "Great Job! New MemberType has been created";
                } else {
                    message = "Nice! MemberType has been updated";
                }

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
                        $.post('<?php echo base_url('MemberType/Save'); ?>',{
                        membertype: MemberType_Modal.data()
                        }, function(i){
                            swal('Good Job!', message, 'success');
                            $('#modal-membertype').modal('hide');
                                console.log(i);
                                //$('table').DataTable().ajax.reload();
                            }
                        );	
                    }
                })
            
        }
    };


</script>