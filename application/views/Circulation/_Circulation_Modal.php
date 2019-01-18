<div class="modal modal-center modal-xlg fade" id="modal-circulation" tabindex="-1">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Circulation</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form-type-line">
                <div class="col-md-12 col-sm-12">
                    <form id="modal-circulation-form" action="#" class="form-group mt-2">
                        <input type="hidden" id="LoanId"/>          
                        
                        <div class="row mb-2">
                            <div class="col-12">
                                <label>Patron</label>
                                <select id="PatronId" name="PatronId" data-provide="selectpicker" title="Choose Patron" data-live-search="true" class="form-control show-tick"></select>
                            </div>
                        </div>      
                        <div class="row mb-2">
                            <div class="col-6">
                                <label>Accession Number</label>
                                <input id="AccessionNumber" name="AccessionNumber" type="text" class="form-control" placeholder="Accession Number" />
                            </div>
                            <div class="col-6">
                                <label>Book Title</label>
                                <input readonly id="Title" name="Title" type="text" class="form-control" placeholder="Title" />
                            </div>
                        </div>                        
                        <div class="row mb-2">
                            <div class="col-6">
                                <label>Date Borrowed</label>
                                <input id="DateBorrowed" class="form-control" type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" name="" placeholder="Date Borrowed">
                            </div>
                            <div class="col-6">
                                <label>Date Due</label>
                                <input id="DateDue" class="form-control" type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" name="" placeholder="Date Due">
                            </div>
                        </div>                        
                        <div class="row mb-2">
                            <div class="col-6">
                                <label>Date Returned</label>
                                <input id="DateReturned" class="hide-in-return form-control" type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" name="" placeholder="Date Returned">
                            </div>
                            <div class="col-6">
                                <label>Book status</label>
                                <select id="BookStatusId" name="BookStatusId" data-provide="selectpicker" title="Select book status" data-live-search="true" class="form-control show-tick"></select>
                            </div>
                        </div>                        
                        <div class="row mb-2">
                            <div class="col-12">
                                <label>Amount Payed</label>
                                <input id="AmountPayed" name="AmountPayed" type="number" class="form-control" placeholder="Penalty" />
                            </div>
                        </div>   

                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-info" onclick="Circulation_Modal.validate()">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    var Circulation_Modal = {
        data: function () {
            return {
                LoanId: $('#LoanId').val(),
                PatronId: $('#PatronId').selectpicker('val'),
                AccessionNumber: $('#AccessionNumber').val(),
                DateBorrowed: $('#DateBorrowed').val(),
                DateDue: $('#DateDue').val(),
                DateReturned: $('#DateReturned').val(),
                BookStatusId: $('#BookStatusId').selectpicker('val'),
                AmountPayed: $('#AmountPayed').val(),                
            }
        },

        init: function () {
            $('#modal-circulation-form')[0].reset();            
            $('input').removeClass('is-invalid').addClass('');
            $('.invalid-feedback').remove();
            $.ajax({
                url: "<?php echo base_url("Circulation/BookStatusList"); ?>",
                success: function(i){
                    i = JSON.parse(i);                    
                    $('#BookStatusId').empty();
                    $.each(i, function(index, data){                        
                        $('#BookStatusId').append('<option value = "' + data.BookStatusId + '">' + data.Name + '</option>');
                    })
                    $('#BookStatusId').selectpicker('refresh');
                }
            })       
            $.ajax({
                url: "<?php echo base_url("Patron/GetAll"); ?>",
                success: function(i){
                    i = JSON.parse(i);                                        
                    $('#PatronId').empty();
                    $.each(i, function(index, data){                        
                        $('#PatronId').append('<option value = "' + data.PatronId + '">' + data.LastName + ', ' + data.FirstName + '</option>');
                    })
                    $('#PatronId').selectpicker('refresh');
                }
            })
            $('#AccessionNumber').bind('input', function(){
                if($(this).val != ''){
                    $.ajax({
                        url: "<?php echo base_url('Book/GetByAccessionNumber/'); ?>" + $(this).val(),
                        success: function(j){
                            j = JSON.parse(j);
                            $('#Title').val(j.Title);
                        }
                    })
                }
            });
            $('#BookStatusId').change(function(){
                if($(this).selectpicker('val') == 3 || $(this).selectpicker('val') == 4)
                $.ajax({
                    url: "<?php echo base_url('Book/GetCatalogue/'); ?>" + $('#AccessionNumber').val(),
                    success: function(i){
                        i = JSON.parse(i);
                        $('#AmountPayed').val(i.Price);
                    }
                })
            });
            $('#modal-circulation').modal('show');
        },

        new: function () {
            $('#LoanId').val('0');            
            $('.modal-title').text('Issue an unreserved book');
            $('#rowActive').addClass('invisible');
            Circulation_Modal.init();
        },

        edit: function (id) {            
            $('.modal-title').text('Edit book issue');                   
            Circulation_Modal.init();
            Circulation_Modal.get(id);
        },

        return: function(id){
            $('.modal-title').text('Return issued book');              
            $.ajax({
                url: "<?php echo base_url("Circulation/BookStatusList"); ?>",
                success: function(i){
                    i = JSON.parse(i);                    
                    $('#BookStatusId').empty();
                    $.each(i, function(index, data){
                        if(data.BookStatusId != 1){
                            $('#BookStatusId').append('<option value = "' + data.BookStatusId + '">' + data.Name + '</option>');
                        }
                    })
                    $('#BookStatusId').selectpicker('refresh');
                }
            })
            Circulation_Modal.init();            
            Circulation_Modal.get(id);   
            $('#DateReturned').val(new Date().toISOString().slice(0, 10));
        },

        get: function(id){
            $.ajax({
                url: "<?php echo base_url('Circulation/Get/'); ?>" + id,                
                success: function(i){
                    i = JSON.parse(i);
                    $('#LoanId').val(i.LoanId);
                    $('#PatronId').selectpicker('val', i.PatronId);
                    $('#AccessionNumber').val(i.AccessionNumber);
                    $('#DateBorrowed').val(i.DateBorrowed);
                    $('#DateDue').val(i.DateDue);
                    $('#DateReturned').val(i.DateReturned);
                    $('#BookStatusId').selectpicker('val', i.BookStatusId);
                    $('#AmountPayed').val(i.AmountPayed);                    
                    $.ajax({
                        url: "<?php echo base_url('Book/GetByAccessionNumber/'); ?>" + i.AccessionNumber,
                        success: function(j){
                            j = JSON.parse(j);
                            $('#Title').val(j.Title);
                        }
                    })
                }
            });   
        },
        
        validate: function(){
            $.ajax({
                url:'<?php echo base_url('Circulation/Validate'); ?>',
                type: "POST",
                data: {"loan": Circulation_Modal.data()},
                success: function(i){
                    $('.invalid-feedback').remove();
                    $('.is-invalid').removeClass('is-invalid');
                    i = JSON.parse(i);                    
                    if(i.status == 1){
                        Circulation_Modal.save();
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
            if ($('#LoanId').val() == 0) {
                message = "Great Job! New Issue has been created";
            } else {
                message = "Nice! Issue has been updated";
            }

            swal({
                title: 'Confirm Submission',
                text: 'Save changes for Circulation',
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: 'No! Cancel',
                cancelButtonClass: 'btn btn-default',
                confirmButtonText: 'Yes! Go for it',
                confirmButtonClass: 'btn btn-info'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url:'<?php echo base_url('Circulation/Save'); ?>',
                        type: "POST",
                        data: {"loan": Circulation_Modal.data()},
                        success: function(i){
                            swal('Good Job!', message, 'success');
                            $('#modal-circulation').modal('hide');
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