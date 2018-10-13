<div class="modal modal-center fade" id="modal-subject" tabindex="-1">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Subject</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 col-sm-12">
                    <form id="modal-subject-form" action="#" class="form-group mt-2">
                        <input type="hidden" id="SubjectId"/>                                    
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label>Courses associated with subject</label>
                            </div>
                            <div class="col-md-8">
                                <select id="CourseId" data-provide="selectpicker" multiple></select>
                            </div>
                        </div>  
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label>Subject Name</label>
                            </div>
                            <div class="col-md-8">
                                <input id="Name" name="Name" type="text" class="form-control" placeholder="Subject Name" />
                            </div>
                        </div>    

                        <div class="row" id="rowActive">
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
                        </div>                      
                
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <!--  <button-- class="btn btn-label btn-primary"><label><i class="fa fa-edit"></i></label> Save Changes</button-->
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-info" onclick="Subject_Modal.save()">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    var Subject_Modal = {
        data: function () {
            return {
                SubjectId: $('#SubjectId').val(),
                CourseId: $('#CourseId').val(),
                Name: $('#Name').val(),                
                IsActive: $('#IsActive').prop("checked")
            }
        },

        init: function () {
            $.ajax({
                url: "<?php echo base_url('Course/GetAll'); ?>",
                async: false,
                success: function(i){
                    i = JSON.parse(i);                    
                    $('#CourseId').empty();
                    $.each(i, function(index, data){                        
                        $('#CourseId').append('<option value = "' + data.CourseId + '">' + data.Name + '</option>');
                    })
                    $('#CourseId').selectpicker('refresh');
                }
            })
            $('#modal-subject-form')[0].reset();
            $('input').removeClass('is-invalid').addClass('');
            $('.invalid-feedback').remove();
            // $('#rowActive').addClass('invisible'); nukaya yon ni-hide yung toggle button
            $('#modal-subject').modal('show');
        },

        new: function () {
            $('#SubjectId').val('0');
            $('#rowActive').addClass('invisible'); // nukayayon 
            $('.modal-title').text('Add Subject');            
            Subject_Modal.init();
        },

        edit: function (id) {            
            $('.modal-title').text('Edit Subject');  
            $('#rowActive').removeClass('invisible');          
            Subject_Modal.init();
            $.ajax({
                url: "<?php echo base_url('Subject/Get/'); ?>" + id,
                success: function(i){
                    i = JSON.parse(i);
                    console.log(i);
                    $('#SubjectId').val(i.SubjectId);
                    $('#Name').val(i.Name);
                    $('#IsActive').prop("checked", i.Name);
                }
            });
            $.ajax({
                url: "<?php echo base_url('Subject/GetCourses/'); ?>" + id,
                success: function(i){
                    i = JSON.parse(i);
                    $('#CourseId').selectpicker('val', i);                    
                }
            })
        },

        save: function () {
            var message;
                console.log(Subject_Modal.data());
                if ($('#SubjectId').val() == 0) {
                    message = "Great Job! New Subject has been created";
                } else {
                    message = "Nice! Subject has been updated";
                }

                swal({
                    title: 'Confirm Submission',
                    text: 'Save changes for Subject',
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'No! Cancel',
                    cancelButtonClass: 'btn btn-default',
                    confirmButtonText: 'Yes! Go for it',
                    confirmButtonClass: 'btn btn-info'
                }).then((result) => {
                    if (result.value) {
                        $.post('<?php echo base_url('Subject/Save'); ?>',{
                        subject: Subject_Modal.data()
                        }, function(i){
                            swal('Good Job!', message, 'success');
        					$('#modal-subject').modal('hide');
                            console.log(i);
                            }
                        );	
                    }
                })
        }
    }


</script>