<div class="fab fab-fixed">
    <button onclick="QR_Scan.show()" class="btn btn-float btn-primary" title="Scan QR" data-provide="tooltip" data-placement="left"><i class="ti-plus"></i></button>
</div>

<div class="modal modal-center modal-xlg fade" id="modal-qr-scan" tabindex="-1">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Scan QR</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form-type-line">
                <div class="col-md-12 col-sm-12">
                    //QR Scanner               
                    <form id="modal-qr-form" action="#" class="form-group mt-2">
                        <input type="hidden" id="qrLoanId"/>          
                        <input type="hidden" id="qrPatronId"/>          
                        
                        <div class="row mb-2">
                            <div class="col-12">
                                <label>Patron</label>
                                <input readonly id="qrPatronName" name="Patron" type="text" class="form-control" placeholder="Patron" />
                            </div>
                        </div>      
                        <div class="row mb-2">
                            <div class="col-6">
                                <label>Accession Number</label>
                                <input readonly id="qrAccessionNumber" name="AccessionNumber" type="text" class="form-control" placeholder="Accession Number" />
                            </div>
                            <div class="col-6">
                                <label>Book Title</label>
                                <input readonly id="qrTitle" name="Title" type="text" class="form-control" placeholder="Title" />
                            </div>
                        </div>                        
                        <div class="row mb-2">
                            <div class="col-6">
                                <label>Date Borrowed</label>
                                <input readonly id="qrDateBorrowed" class="form-control" type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" name="" placeholder="Date Borrowed">
                            </div>
                            <div class="col-6">
                                <label>Date Due</label>
                                <input readonly id="qrDateDue" class="form-control" type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" name="" placeholder="Date Due">
                            </div>
                        </div>                        
                        <div class="row mb-2">
                            <div class="col-6">
                                <label>Date Returned</label>
                                <input id="qrDateReturned" class="hide-in-return form-control" type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" name="" placeholder="Date Returned">
                            </div>
                            <div class="col-6">
                                <label>Book status</label>
                                <select id="qrBookStatusId" name="BookStatusId" data-provide="selectpicker" title="Select book status" data-live-search="true" class="form-control show-tick"></select>
                            </div>
                        </div>                        
                        <div class="row mb-2">
                            <div class="col-12">
                                <label>Amount Payed</label>
                                <input id="qrAmountPayed" name="AmountPayed" type="number" class="form-control" placeholder="Penalty" />
                            </div>
                        </div>   

                    </form>     
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
                <button id="check-in" type="button" class="btn btn-info" onclick="QR_Scan.checkIn()">Check in</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        QR_Scan.init();
    });

    var QR_Scan = {

        init: function(){
            $('#modal-qr-form')[0].reset();            
            $('input').removeClass('is-invalid').addClass('');
            $('.invalid-feedback').remove();
            $.ajax({
                url: "<?php echo base_url("Circulation/BookStatusList"); ?>",
                async: false,
                success: function(i){
                    i = JSON.parse(i);                    
                    $('#qrBookStatusId').empty();
                    $.each(i, function(index, data){ 
                        if(data.BookStatusId != 1){
                            $('#qrBookStatusId').append('<option value = "' + data.BookStatusId + '">' + data.Name + '</option>');
                        }                       
                    })
                    $('#qrBookStatusId').selectpicker('refresh');
                }
            })       
            $('#qrBookStatusId').change(function(){
                if($(this).selectpicker('val') == 3 || $(this).selectpicker('val') == 4)
                $.ajax({
                    url: "<?php echo base_url('Book/GetCatalogue/'); ?>" + $('#AccessionNumber').val(),
                    success: function(i){
                        i = JSON.parse(i);
                        $('#qrAmountPayed').val(i.Price);
                    }
                })
            });
        },

        data: function () {
            return {
                LoanId: $('#qrLoanId').val(),
                PatronId: $('#qrPatronId').val(),
                AccessionNumber: $('#qrAccessionNumber').val(),
                DateBorrowed: $('#qrDateBorrowed').val(),
                DateDue: $('#qrDateDue').val(),
                DateReturned: $('#qrDateReturned').val(),
                BookStatusId: $('#qrBookStatusId').selectpicker('val'),
                AmountPayed: $('#qrAmountPayed').val(),                
            }
        },

        show: function(){
            $('#modal-qr-scan').modal('show');
            $('#modal-qr-form').hide();
            $('#check-in').hide();
        },
        
        showForm: function(){
            $('#modal-qr-form').show();
            $('#check-in').show();
        },

        hideForm: function(){
            $('#modal-qr-form').hide();
        },

        //sena dito mo isend ung accession number ng qr na iniscan
        get: function(id){
            QR_Scan.showForm();
            $.ajax({
                url: "<?php echo base_url('Circulation/ScanQR/'); ?>" + id,                
                success: function(i){
                    i = JSON.parse(i);
                    $('#qrLoanId').val(i.LoanId);
                    $('#qrPatronId').val(i.PatronId);
                    $('#qrAccessionNumber').val(i.AccessionNumber);
                    $('#qrDateBorrowed').val(i.DateBorrowed);
                    $('#qrDateDue').val(i.DateDue);
                    if(i.DateReturned == ''){
                        var dateTime = new Date();
                        dateTime = moment(dateTime).format("YYYY-MM-DD HH:mm:ss");
                        $('#qrDateReturned').val(dateTime);
                    }else{
                        $('#qrDateReturned').val(i.DateReturned);
                    }
                    if(i.BookStatusId == 1){
                        $('#qrBookStatusId').selectpicker('val', 2);
                    }
                    $('#qrAmountPayed').val(i.AmountPayed);                    
                    $.ajax({
                        url: "<?php echo base_url('Patron/Get/'); ?>" + i.PatronId,
                        success: function(j){
                            j = JSON.parse(j);
                            $('#qrPatronName').val(j.LastName + ", " + j.FirstName);
                        }
                    })
                    $.ajax({
                        url: "<?php echo base_url('Book/GetByAccessionNumber/'); ?>" + i.AccessionNumber,
                        success: function(j){
                            j = JSON.parse(j);
                            $('#qrTitle').val(j.Title);
                        }
                    })
                }
            });   
        },

        validate: function(){
            $.ajax({
                url:'<?php echo base_url('Circulation/Validate'); ?>',
                type: "POST",
                data: {"loan": QR_Scan.data()},
                success: function(i){
                    $('.invalid-feedback').remove();
                    $('.is-invalid').removeClass('is-invalid');
                    i = JSON.parse(i);                    
                    if(i.status == 1){
                        QR_Scan.save();
                    }else{
                        $.each(i, function(element, message){
                            if(element != 'status'){
                                $('#qr' + element).addClass('is-invalid').parent().append(message);
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
                        data: {"loan": QR_Scan.data()},
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