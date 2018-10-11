<div class="modal modal-center fade" id="modal-college" tabindex="-1">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add College</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 col-sm-12">
                    <form id="modal-college-form" action="#" class="form-group mt-2">
                        <input type="hidden" id="CollegeId"/>                                                
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label>College Name</label>
                            </div>
                            <div class="col-md-8">
                                <input id="Name" name="Name" type="text" class="form-control" placeholder="College Name" />
                            </div>
                        </div>                    
                      
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <!--  <button-- class="btn btn-label btn-primary"><label><i class="fa fa-edit"></i></label> Save Changes</button-->
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-info" onclick="College_Modal.save()">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    var College_Modal = {
        data: function () {
            return {
                CollegeId: $('#CollegeId').val(),
                Name: $('#Name').val(),                
            }
        },

        init: function () {
            $('#rowActive').addClass('invisible');
            $('#modal-college').modal('show');
            $('#modal-college-form')[0].reset();
            $('input').removeClass('is-invalid').addClass('');
            $('.invalid-feedback').remove();
        },

        new: function () {
            $('#CollegeId').val('0');
            $('.modal-title').text('Add College');    
            College_Modal.init();
        },

        edit: function (id) {
            $('.modal-title').text('Edit College');            
            College_Modal.init();
            $.ajax({
                url: "<?php echo base_url('College/Get/'); ?>" + id,
                success: function(i){
                    i = JSON.parse(i);
                    $('#CollegeId').val(i.CollegeId);
                    $('#Name').val(i.Name);
                }
            })
        },

        save: function () {
            $.post('<?php echo base_url('College/Save'); ?>',{
				college: College_Modal.data()
				}, function(i){				
					$('#modal-college').modal('hide');
				}
			);
        }
    }


</script>