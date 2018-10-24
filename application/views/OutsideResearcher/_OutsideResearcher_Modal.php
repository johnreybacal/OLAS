<div class="modal modal-center fade" id="modal-outsideResearcher" tabindex="-1">
    <div class="modal-dialog modal-md ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Outside Researcher</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form-type-line">
                <div class="col-md-12 col-sm-12">
                    <form id="modal-outsideResearcher-form" action="#" class="form-group mt-2">
                        <input type="hidden" id="OutsideResearcherId"/>          
                        
                        <div class="row mb-2">
                            <div class="col-12">
                                <label>OutsideResearcher Name</label>
                                <input id="Name" name="Name" type="text" class="form-control" placeholder="Outside Researcher Name" />
                            </div>
                        </div>           
                        <div class="row mb-2">
                            <div class="col-12">
                                <label>Subject to research</label>
                                <select id="SubjectId" name="Subject" data-provide="selectpicker" multiple title="Choose Subjects" data-live-search="true" class="form-control form-type-combine show-tick"></select>			
                            </div>                                       
                        </div>    
                        <div class="row mb-2">
                            <div class="col-12">
                                <label>Date of admission</label>
                                <input  id="DateTime" class="form-control" type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" name="" placeholder="Date of admission">
                            </div>                                       
                        </div>        
                        <div class="row mb-2">
                            <div class="col-12">
                                <label>Amount Payed</label>
                                <input  id="AmountPayed" class="form-control" type="number" name="" placeholder="Price" value = "100">
                            </div>                                       
                        </div>                                                        
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-info" onclick="OutsideResearcher_Modal.validate()">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    var OutsideResearcher_Modal = {
        data: function () {
            return {
                OutsideResearcherId: $('#OutsideResearcherId').val(),             
                Name: $('#Name').val(),
                SubjectId: $('#SubjectId').selectpicker('val'),   
                DateTime: $('#DateTime').val(),
                AmountPayed: $('#AmountPayed').val(),
            }
        },

        init: function () {  
            $.ajax({
                url: "<?php echo base_url('Subject/GetAll'); ?>",
                async: false,
                success: function(i){
                    i = JSON.parse(i);                    
                    $('#SubjectId').empty();
                    $.each(i, function(index, data){                        
                        $('#SubjectId').append('<option value = "' + data.SubjectId + '">' + data.Name + '</option>');
                    })
                    $('#SubjectId').selectpicker('refresh');
                }
            });          
            $('#modal-outsideResearcher-form')[0].reset();
            $('input').removeClass('is-invalid').addClass('');
            $('.invalid-feedback').remove();
            $('#modal-outsideResearcher').modal('show');
        },

        new: function () {
            $('#OutsideResearcherId').val('0');            
            $('.modal-title').text('Add OutsideResearcher');            
            $('#rowActive').addClass('invisible');
            OutsideResearcher_Modal.init();
        },

        edit: function (id) {            
            $('.modal-title').text('Edit OutsideResearcher');  
            $('#rowActive').removeClass('invisible');          
            OutsideResearcher_Modal.init();
            $.ajax({
                url: "<?php echo base_url('OutsideResearcher/Get/'); ?>" + id,
                success: function(i){
                    i = JSON.parse(i);                    
                    $('#OutsideResearcherId').val(i.OutsideResearcher.OutsideResearcherId);
                    $('#Name').val(i.OutsideResearcher.Name);                    
                    $('#DateTime').val(i.OutsideResearcher.DateTime);                    
                    $('#AmountPayed').val(i.OutsideResearcher.AmountPayed);
                    var subject = [];
                    $.each(i.subject, function(index, data){
                        subject.push(data.SubjectId);
                    });
                    $('#SubjectId').selectpicker('val', subject);
                }
            });           
        },

        validate: function(){
            $.ajax({
                url:'<?php echo base_url('OutsideResearcher/Validate'); ?>',
                type: "POST",
                data: {"outsideResearcher": OutsideResearcher_Modal.data()},
                success: function(i){
                    $('.invalid-feedback').remove();
                    $('.is-invalid').removeClass('is-invalid');
                    i = JSON.parse(i);                    
                    if(i.status == 1){
                        OutsideResearcher_Modal.save();
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
            if ($('#OutsideResearcherId').val() == 0) {
                message = "Great Job! New OutsideResearcher has been created";
            } else {
                message = "Nice! OutsideResearcher has been updated";
            }

            swal({
                title: 'Confirm Submission',
                text: 'Save changes for OutsideResearcher',
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: 'No! Cancel',
                cancelButtonClass: 'btn btn-default',
                confirmButtonText: 'Yes! Go for it',
                confirmButtonClass: 'btn btn-info'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url:'<?php echo base_url('OutsideResearcher/Save'); ?>',
                        type: "POST",
                        data: {"outsideResearcher": OutsideResearcher_Modal.data()},
                        success: function(i){
                            swal('Good Job!', message, 'success');
                            $('#modal-outsideResearcher').modal('hide');
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