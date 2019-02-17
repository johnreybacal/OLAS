<style>
	canvas {
        display: none;
    }
    input[type="file"] {
        display: block;
        margin-bottom: 16px;
    }
    video {
        width: 200px;
        height: 200px;
        object-fit: cover;
        object-position: center;
    }
    .camera {
        width: 200px;
        height: 200px;
        overflow: hidden;
        margin: 0 auto;
    }
</style>

<!-- Fab Button -->
<div class="fab fab-fixed">
    <button onclick="QR_Scan.show()" class="btn btn-float btn-primary" title="Scan QR" data-provide="tooltip" data-placement="left" style="background-color:#33cabb;
    border-color:#33cabb;"><i class="fa fa-qrcode"></i></button>
</div>

<!-- QR Modal -->
<div class="modal modal-center moda-lg fade" id="modal-qr-scan" tabindex="-1">
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
                    <!-- QR -->
                    <div class="camera" >
                        <video muted autoplay playsinline id="qr-video"></video>
                        <canvas id="debug-canvas"></canvas>
                    </div>
                    <img src="">
                    <b>Detected QR code: </b>
                    <a href="" id="cam-qr-result">None</a>
                    <hr>                    
                    <!-- End of QR -->
                    <form id="modal-qr-form" action="#" class="form-group mt-2">
                        <input type="hidden" id="qrLoanId" style="display: none;" />          
                        <input type="hidden" id="qrPatronId" style="display: none;" />          
                        <input type="hidden" id="qrIsRecalled"/>
                        <div class="row mb-2">
                            <div id="patronIssue" class="col-12">
                                <label>Patron</label>
                                <select id="qrPatronId2" name="PatronId" data-provide="selectpicker" title="Choose Patron" data-live-search="true" class="form-control show-tick"></select>
                            </div>
                            <div id="patronReturn" class="col-12">
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
                        <div id="qrRowReturn">
                            <div class="row mb-2">
                                <div class="col-6">
                                    <label>Date Borrowed</label>
                                    <input readonly id="qrDateBorrowed" class="form-control" type="text" name="" placeholder="Date Borrowed">
                                </div>
                                <div class="col-6">
                                    <label>Date Due</label>
                                    <input readonly readonly id="qrDateDue" class="form-control" type="text" name="" placeholder="Date Due">
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
                                <div class="col-6">
                                    <label>Amount Payed</label>
                                    <input id="qrAmountPayed" name="AmountPayed" type="number" class="form-control" placeholder="Penalty" />
                                </div>
                                <div class="col-6">
                                    <label>Notes</label>
                                    <textarea id="qrNotes" name="Notes" type="text" class="form-control" placeholder="Notes"></textarea>
                                </div>
                            </div>   
                        </div>
                    </form>     
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn close-modal btn-secondary " data-dismiss="modal">Close</button>
                <button id="check-in" type="button" class="btn btn-info" onclick="QR_Scan.validate()">Check in</button>
            </div>
        </div>
    </div>
</div>

<script>

    var qr;
    $('#cam-qr-result').bind("DOMSubtreeModified", function(){
        qr = document.getElementById('cam-qr-result');  //Bacs, itong yung id na galing sa qr. 
        console.log(qr.text);  
        QR_Scan.get(qr.text);                                  //Hindi ko alam kung pano ilalagay hehe.
    })

    $(document).ready(function(){
        QR_Scan.init();
    });

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
    var qrnotes;
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
            $.ajax({
                url: "<?php echo base_url("Patron/GetAll"); ?>",
                success: function(i){
                    i = JSON.parse(i);                                        
                    $('#qrPatronId2').empty();
                    $.each(i, function(index, data){                        
                        $('#qrPatronId2').append('<option value = "' + data.PatronId + '">' + data.LastName + ', ' + data.FirstName + '</option>');
                    })
                    $('#qrPatronId2').selectpicker('refresh');
                }
            })           
            $('#qrPatronId2').change(function(){
                $('#qrPatronId').val($(this).val());
            })
            $('#qrBookStatusId').change(function(){
                if($(this).selectpicker('val') == 3 || $(this).selectpicker('val') == 4){
                    $.ajax({
                        url: "<?php echo base_url('Book/GetCatalogue/'); ?>" + $('#qrAccessionNumber').val(),
                        success: function(i){
                            i = JSON.parse(i);
                            $('#qrAmountPayed').val(i.Price);
                        }
                    })
                    if($(this).selectpicker('val') == 3){                        
                        $('#qrNotes').val(notes + " This book is damaged by " + $('#qrPatronName').val() + ", returned on " + now());
                    }
                    if($(this).selectpicker('val') == 4){                        
                        $('#qrNotes').val(notes + "This book is lost by " + $('#qrPatronName').val());
                    }
                }
            });
        },

        data: function () {
            var bs;
            if($('#qrLoanId').val() == 0){
                bs = 1;
            }else{
                bs = $('#qrBookStatusId').selectpicker('val');
            }
            return {
                LoanId: $('#qrLoanId').val(),
                PatronId: $('#qrPatronId').val(),
                AccessionNumber: $('#qrAccessionNumber').val(),
                DateBorrowed: $('#qrDateBorrowed').val(),
                DateDue: $('#qrDateDue').val(),
                DateReturned: $('#qrDateReturned').val(),
                BookStatusId: bs,
                AmountPayed: $('#qrAmountPayed').val(),       
                IsRecalled: $('#qrIsRecalled').val(),    
                Notes: $('#qrNotes').val(),                        
            }
        },

        show: function(){
            $('.modal-title').text('Scan QR');
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
            $('#modal-qr-form')[0].reset();                        
            $.ajax({
                url: "<?php echo base_url('Circulation/CheckIssueExist/'); ?>" + id,                
                success: function(j){
                    console.log("does this exist? " + j);
                    if(j == 1){
                        QR_Scan.showForm();
                        $('#qrRowReturn').show();
                        $('#patronIssue').hide();
                        $('#patronReturn').show();
                        $('.modal-title').html('Return Issued Book');
                        $('#check-in').html('Check in');
                        $.ajax({
                            url: "<?php echo base_url('Circulation/ScanQR/'); ?>" + id,                
                            success: function(i){
                                i = JSON.parse(i);
                                console.log(i);
                                $('#qrLoanId').val(i.LoanId);
                                $('#qrPatronId').val(i.PatronId);
                                $('#qrAccessionNumber').val(i.AccessionNumber);
                                $('#qrDateBorrowed').val(i.DateBorrowed);
                                $('#qrDateDue').val(i.DateDue);
                                $('#qrIsRecalled').val(i.IsRecalled);                    
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
                                $.ajax({
                                    url: "<?php echo base_url('Book/GetCatalogue/'); ?>" + i.AccessionNumber,
                                    success: function(j){
                                        j = JSON.parse(j);
                                        $('#qrNotes').val(j.Notes);
                                        qrnotes = j.Notes;
                                    }
                                })
                                if(i.DateReturned == '0000-00-00 00:00:00' || i.DateReturned == ''){
                                    $('#qrDateReturned').val(now());
                                    var start = moment($('#qrDateDue').val());
                                    var end = moment($('#qrDateReturned').val());
                                    var diff = end.diff(start, "days");
                                    var penalty = 0;
                                    if(diff > 0){
                                        penalty = 20 * diff;
                                        $('#qrAmountPayed').val(penalty);
                                    }
                                    console.log(diff);                        
                                    console.log(penalty);                        
                                }
                            }
                        });   

                    }
                    else{                        
                        $.ajax({
                            url: "<?php echo base_url('Book/CheckRoomUseOnly/'); ?>" + id,
                            success: function(roomUseOnly){
                                if(roomUseOnly == 0){
                                    QR_Scan.showForm();
                                    $('#qrRowReturn').hide();
                                    $('#patronIssue').show();
                                    $('#patronReturn').hide();
                                    $('#qrAccessionNumber').val(id);
                                    $('#qrDateBorrowed').val(now());
                                    $('#qrBookStatusId').selectpicker('val', 1);
                                    $('#qrLoanId').val(0);
                                    $('#check-in').html('Save Issue');
                                    $('.modal-title').html('Create a new Issue');
                                    $.ajax({
                                        url: "<?php echo base_url('Book/GetByAccessionNumber/'); ?>" + id,
                                        success: function(k){
                                            k = JSON.parse(k);
                                            $('#qrTitle').val(k.Title);
                                        }
                                    });
                                }else{
                                    swal('This book is for room use only', "This book cannot be circulated. Please kindly return the book to its respective shelf", 'warning');
                                }
                            }
                        })
                    }
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
                                if($('.modal-title').html() == 'Create a new Issue'){
                                    $('.invalid-feedback').remove();
                                    $('.is-invalid').removeClass('is-invalid');
                                    $('#qr' + element + '2').addClass('is-invalid').parent().append(message);
                                }
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
                            $('#modal-qr-scan').modal('hide');
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

    $('.close-modal').on("click", function(){
        console.log(stream.getTracks());
        if (stream!= null) {
            stream.getTracks().map(function (val) {
                val.stop();
            });
        }
    })

    $(document).ready(function() {
        // set unique id to videoplayer for the Webflow video element
        var src = $('#qr-video').children('iframe').attr('src');

        // when object with class open-popup is clicked...
        $('.modal show').click(function(e) {
            // change the src value of the video
            $('#qr-video').children('iframe').attr('src', src);
            $('.popup-bg').fadeIn();
            console.log('in');
        });

        // when object with class close-popup is clicked...
        $('#modal-qr-scan').click(function(e) {
            $('#qr-video').children('iframe').attr('src', '');
            $('.popup-bg').fadeOut();
            console.log('out');
        });
    });

    

</script>