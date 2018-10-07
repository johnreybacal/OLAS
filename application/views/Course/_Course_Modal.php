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
                                    <div class="col-md-2">
                                        <label>Course Data</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input id="Data" name="Data" type="text" class="form-control" placeholder="Course Data" />
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
                <button type="button" class="btn btn-info" onclick="Course_Modal.validate()">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    var Course_Modal = {
        data: function () {
            return {
                CourseId: $('#CourseId').val(),
                Data: $('#Data').val(),
                //s: $('#s').find(":selected").text(),
                //Active: $('#IsActive').prop("checked")
            }
        },

        init: function () {
            $('#modal-course-form')[0].reset();
            $('input').removeClass('is-invalid').addClass('');
            $('.invalid-feedback').remove();
        },

        new: function () {
            $('#CourseId').val('0');
            $('.modal-title').text('Update');
            $('#rowActive').addClass('invisible');
            $('#modal-course').modal('show');
            Course_Modal.init();
        },

        validate: function () {
            
        }
    }


</script>