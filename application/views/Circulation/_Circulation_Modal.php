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
                        <input type="hidden" id="IsRecalled"/>
                        <div class="row mb-2">
                            <div class="col-12">
                                <label>Patron</label>
                                <select id="PatronId" name="PatronId" data-provide="selectpicker" title="Choose Patron" data-live-search="true" class="form-control show-tick"></select>
                            </div>
                        </div>      
                        <div class="row mb-2">
                            <div class="col-6">
                                <label>Title</label>
                                <select id="ISBN" name="ISBN" data-provide="selectpicker" title="Choose Book" data-live-search="true" class="form-control show-tick"></select>
                            </div>
                            <div class="col-6">
                                <label>Accession Number</label>
                                <select id="AccessionNumber" name="Accession Number" data-provide="selectpicker" title="Choose an Accession Number" data-live-search="true" class="form-control show-tick"></select>
                            </div>
                        </div>                       
                        <div id="rowIssue"> 
                            <div class="row mb-2">
                                <div class="col-6">
                                    <label>Date Borrowed</label>
                                    <input readonly id="DateBorrowed" class="form-control" type="text" name="" placeholder="Date Borrowed">
                                </div>
                                <div class="col-6">
                                    <label>Date Due</label>
                                    <input id="DateDue" class="form-control" type="text" name="" placeholder="Date Due">
                                </div>
                            </div>  
                        </div>
                        <div id="rowReturn">
                            <div class="row mb-2">
                                <div class="col-6">
                                    <label>Date Returned</label>
                                    <input readonly id="DateReturned" class="hide-in-return form-control" type="text" name="" placeholder="Date Returned">
                                </div>
                                <div class="col-6">
                                    <label>Book status</label>
                                    <select id="BookStatusId" name="BookStatusId" data-provide="selectpicker" title="Select book status" data-live-search="true" class="form-control show-tick"></select>
                                </div>
                            </div>                        
                            <div class="row mb-2">
                                <div class="col-6">
                                    <label>Amount Payed</label>
                                    <input id="AmountPayed" name="AmountPayed" type="number" class="form-control" placeholder="Penalty" />
                                </div>
                                <div class="col-6">
                                    <label>Notes</label>
                                    <textarea id="Notes" name="Notes" type="text" class="form-control" placeholder="Notes"></textarea>
                                </div>
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
    function now(){
        var date = new Date();
        var aaaa = date.getFullYear();
        var gg = date.getDate();
        var mm = (date.getMonth() + 1);

        if (gg < 10)
            gg = "0" + gg;

        if (mm < 10)
            mm = "0" + mm;

        var cur_day = aaaa + "-" + mm + "-" + gg;

        var hours = date.getHours()
        var minutes = date.getMinutes()
        var seconds = date.getSeconds();

        if (hours < 10)
            hours = "0" + hours;

        if (minutes < 10)
            minutes = "0" + minutes;

        if (seconds < 10)
            seconds = "0" + seconds;

        return cur_day + " " + hours + ":" + minutes + ":" + seconds;
    }
    var notes = '';
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
                IsRecalled: $('#IsRecalled').val(),                
                Notes: $('#Notes').val(),                
            }
        },

        init: function () {
            $('#modal-circulation-form')[0].reset();            
            $('input').removeClass('is-invalid').addClass('');
            $('.invalid-feedback').remove();
            $('#ISBN').selectpicker('val', []);
            $('#AccessionNumber').selectpicker('val', []);
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
            $('#BookStatusId').change(function(){
                if($(this).selectpicker('val') == 3 || $(this).selectpicker('val') == 4){
                    $.ajax({
                        url: "<?php echo base_url('Book/GetCatalogue/'); ?>" + $('#AccessionNumber').val(),
                        success: function(i){
                            i = JSON.parse(i);
                            $('#AmountPayed').val(i.Price);
                        }
                    })
                    if($(this).selectpicker('val') == 3){                        
                        $('#Notes').val(notes + " This book is damaged by " + $('#PatronId option:selected').text() + ", returned on " + now());
                    }
                    if($(this).selectpicker('val') == 4){                        
                        $('#Notes').val(notes + "This book is lost by " + $('#PatronId option:selected').text());
                    }
                }
            });
            $.ajax({
                url: "<?php echo base_url("Book/GetAll"); ?>",
                success: function(i){
                    i = JSON.parse(i);                                        
                    $('#ISBN').empty();
                    $.each(i, function(index, data){                        
                        $('#ISBN').append('<option value = "' + data.ISBN + '">' + data.ISBN + ' | ' + data.Title + '</option>');
                    })
                    $('#ISBN').selectpicker('refresh');
                }
            })
            $('#ISBN').change(function(){
                $.ajax({
                    url: "<?php echo base_url('Book/GetCatalogueByISBNAvailable/'); ?>" + $(this).selectpicker('val'),
                    async: false,
                    success: function(i){
                        i = JSON.parse(i);                                        
                        $('#AccessionNumber').empty();
                        $.each(i, function(index, data){                        
                            $('#AccessionNumber').append('<option value = "' + data.AccessionNumber + '">' + data.AccessionNumber + '</option>');
                        })
                        $('#AccessionNumber').selectpicker('refresh');
                    }
                });
            });
            $('#modal-circulation').modal('show');
        },

        new: function () {
            $('#LoanId').val('0');            
            $('.modal-title').text('Create a new issue');
            $('#rowReturn').hide();
            $('#rowIssue').hide();
            $('#BookStatusId').selectpicker('val', 1)
            Circulation_Modal.init();      
            $('#DateBorrowed').val(now());
        },

        edit: function (id) {            
            $('.modal-title').text('Edit book issue');
            $('#rowReturn').show();
            $('#rowIssue').show();
            Circulation_Modal.init();
            Circulation_Modal.get(id);            
        },

        return: function(id){
            $('.modal-title').text('Return issued book');              
            $('#rowReturn').show();
            $('#rowIssue').show();
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
            $("#DateReturned").prop("readonly", true);
        },

        get: function(id){            
            $.ajax({
                url: "<?php echo base_url('Circulation/Get/'); ?>" + id,                
                success: function(i){
                    i = JSON.parse(i);
                    $('#LoanId').val(i.LoanId);
                    $('#PatronId').selectpicker('val', i.PatronId);
                    $('#DateBorrowed').val(i.DateBorrowed);
                    $('#DateDue').val(i.DateDue);
                    $('#DateReturned').val(i.DateReturned);
                    $('#BookStatusId').selectpicker('val', i.BookStatusId);
                    $('#AmountPayed').val(i.AmountPayed);
                    $('#IsRecalled').val(i.IsRecalled);
                    $.ajax({
                        url: "<?php echo base_url('Book/GetByAccessionNumber/'); ?>" + i.AccessionNumber,
                        success: function(j){
                            j = JSON.parse(j);
                            $('#ISBN').selectpicker('val', j.ISBN).trigger('change');
                            $('#AccessionNumber').append('<option value = "' + i.AccessionNumber + '">' + i.AccessionNumber + '</option>').selectpicker('refresh');
                            $('#AccessionNumber').selectpicker('val', i.AccessionNumber);
                        }
                    })
                    $.ajax({
                        url: "<?php echo base_url('Book/GetCatalogue/'); ?>" + i.AccessionNumber,
                        success: function(j){
                            j = JSON.parse(j);
                            $('#Notes').val(j.Notes);
                            notes = j.Notes;
                        }
                    })
                    if(i.DateReturned == '0000-00-00 00:00:00' || i.DateReturned == ''){
                        $('#DateReturned').val(now());
                        var start = moment($('#DateDue').val());
                        var end = moment($('#DateReturned').val());
                        var diff = end.diff(start, "days");
                        var penalty = 0;
                        if(diff > 0){
                            penalty = 20 * diff;
                            $('#AmountPayed').val(penalty);
                        }
                        console.log(diff);                        
                        console.log(penalty);                        
                    }
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