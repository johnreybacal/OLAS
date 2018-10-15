<div class="modal modal-center fade" id="modal-course" tabindex="-1">
    <div class="modal-dialog modal-md ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Coursey</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form-type-line">
                <div class="col-md-12 col-sm-12">
                    <form id="modal-course-form" action="#" class="form-group mt-2">
                        <input type="hidden" id="CourseId"/>       
                        
                        <div class="row mb-2">
                            <div class="col-12">
                                <label>Select College</label>
                                <select id="CollegeId" name="CollegeId" data-provide="selectpicker" title="Choose College" data-live-search="true" class="form-control show-tick"></select>
                            </div>
                            <div class="col-12">
                                <label>Course Name</label>
                                <input id="Name" name="Name" type="text" class="form-control" placeholder="Course Name" />
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
                <button type="button" class="btn btn-info" onclick="Course_Modal.save()">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    var Course_Modal = {
        data: function () {
            return {
                CourseId: $('#CourseId').val(),
                CollegeId: $('#CollegeId').selectpicker('val'),
                Name: $('#Name').val(),                
                IsActive: ($('#IsActive').prop("checked") ? 1 : 0)
            }
        },

        init: function () {
            $.ajax({
                url: "<?php echo base_url('College/GetAll'); ?>",
                async: false,
                success: function(i){
                    i = JSON.parse(i);   
                    $('#CollegeId').empty();                 
                    $.each(i, function(index, data){                        
                        $('#CollegeId').append('<option value = "' + data.CollegeId + '">' + data.Name + '</option>');
                    })
                    $('#CollegeId').selectpicker('refresh');
                }
            })
            // $('#rowActive').addClass('invisible'); nukaya yon ni-hide yung toggle button
            $('#modal-course').modal('show');
            $('#modal-course-form')[0].reset();
            $('input').removeClass('is-invalid').addClass('');
            $('.invalid-feedback').remove();
        },

        new: function () {
            $('#CourseId').val('0');
            $('.modal-title').text('Add Course');            
            $('#rowActive').addClass('invisible');
            Course_Modal.init();
        },

        edit: function (id) {
            $('.modal-title').text('Edit Course');            
            $('#rowActive').removeClass('invisible');          
            Course_Modal.init();
            $.ajax({
                url: "<?php echo base_url('Course/Get/'); ?>" + id,
                success: function(i){
                    i = JSON.parse(i);
                    $('#CourseId').val(i.CourseId);
                    $('#CollegeId').selectpicker('val', i.CollegeId);
                    $('#Name').val(i.Name);
                    $('#IsActive').prop("checked", (i.IsActive == 1));
                }
            })
        },

        save: function () {

            var message;
                console.log(Course_Modal.data());
                if ($('#CourseId').val() == 0) {
                    message = "Great Job! New Course has been created";
                } else {
                    message = "Nice! Course has been updated";
                }

                swal({
                    title: 'Confirm Submission',
                    text: 'Save changes for Course',
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'No! Cancel',
                    cancelButtonClass: 'btn btn-default',
                    confirmButtonText: 'Yes! Go for it',
                    confirmButtonClass: 'btn btn-info'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url:'<?php echo base_url('Course/Save'); ?>',
                            type: "POST",
                            data: {"course": Course_Modal.data()},
                            success: function(i){
                                swal('Good Job!', message, 'success');
                                $('#modal-course').modal('hide');
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