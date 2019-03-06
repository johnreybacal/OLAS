<div class="modal modal-center fade" id="modal-subject" tabindex="-1">
    <div class="modal-dialog modal-md ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Subject</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form-type-line">
                <div class="col-md-12 col-sm-12">
                    <form id="modal-subject-form" action="#" class="form-group mt-2">
                        <input type="hidden" id="SubjectId"/>  

                        <div class="row mb-2">
                            <div class="col-12">
                                <label>Name</label>
                                <input id="SubjectName" name="SubjectName" type="text" class="form-control" placeholder="Subject Name" autofocus/>
                            </div>
                            <div class="col-12">
                                <label>Courses associated with subject</label>
                                <select id="CourseId" name="CourseId" data-provide="selectpicker" multiple title="Choose Course" data-live-search="true" class="form-control show-tick" ></select>
                            </div>
                        </div>    

                        <div class="row" id="SubjectRowActive">
                            <div class="col-sm-12 col-md-12">
                                <label>Status:</label>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="switch switch-lg switch-info">
                                        <input type="checkbox" id="SubjectIsActive" name="SubjectIsActive" checked />
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
                <button type="button" class="btn btn-info" onclick="Subject_Modal.validate()">Save</button>
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
                Name: $('#SubjectName').val(),                
                IsActive: ($('#SubjectIsActive').prop("checked") ? 1 : 0)
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
            // $('#SubjectRowActive').addClass('invisible'); nukaya yon ni-hide yung toggle button
            $('#modal-subject').modal('show');
        },

        new: function () {
            $('#SubjectId').val('0');
            $('#SubjectRowActive').addClass('invisible'); // nukayayon 
            $('.modal-title').text('Add Subject');            
            Subject_Modal.init();
        },

        edit: function (id) {            
            $('.modal-title').text('Edit Subject');  
            $('#SubjectRowActive').removeClass('invisible');          
            Subject_Modal.init();
            $.ajax({
                url: "<?php echo base_url('Subject/Get/'); ?>" + id,
                success: function(i){
                    i = JSON.parse(i);
                    console.log(i);
                    $('#SubjectId').val(i.SubjectId);
                    $('#SubjectName').val(i.Name);
                    $('#SubjectIsActive').prop("checked", (i.IsActive == 1));
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

        validate: function(){
            $.ajax({
                url:'<?php echo base_url('Subject/Validate'); ?>',
                type: "POST",
                data: {"subject": Subject_Modal.data()},
                success: function(i){
                    $('.invalid-feedback').remove();
                    $('.is-invalid').removeClass('is-invalid');
                    i = JSON.parse(i);                    
                    if(i.status == 1){
                        Subject_Modal.save();
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
                        $.ajax({
                            url:'<?php echo base_url('Subject/Save'); ?>',
                            type: "POST",
                            data: {"subject": Subject_Modal.data()},
                            success: function(i){
                                swal('Good Job!', message, 'success');
                                $('#modal-subject').modal('hide');
                                console.log(i);
                                if(typeof Add !== 'undefined'){
                                    Add.refreshSubject(i);
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