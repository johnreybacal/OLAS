<div class="modal modal-center fade" id="modal-course" tabindex="-1">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Coursey</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 col-sm-12">
                    <form id="modal-course-form" action="#" class="form-group mt-2">
                        <input type="hidden" id="CourseId"/>       
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label>Select College</label>
                            </div>
                            <div class="col-md-8">
                                <select id="CollegeId" data-provide="selectpicker"></select>
                            </div>
                        </div>                                        
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label>Course Name</label>
                            </div>
                            <div class="col-md-8">
                                <input id="Name" name="Name" type="text" class="form-control" placeholder="Course Name" />
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
                IsActive: $('#IsActive').prop("checked"),                
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
                    $('#IsActive').prop("checked", i.IsActive);
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
                        $.post('<?php echo base_url('Course/Save'); ?>',{
				            course: Course_Modal.data()
		            		}, function(i){				
                            swal('Good Job!', message, 'success');
        					$('#modal-course').modal('hide');		
                            console.log(i);
                            }
                        );	
                    }
                })
        }

    }


</script>