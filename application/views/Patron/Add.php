<div class="main-content">
	<form id="patron-form" enctype="multipart/form-data">
		<div class="row">
			<div class="col-lg-12">
				<div class="card card-shadowed">				
					<header class="card-header">
		                <h4 class="card-title">Patron <strong>Information</strong></h4>
	              	</header>
                    <div class="card-body form-type-line">
                    <div class="row">
                        <div class="col-6 ">
                            <div class="row">    
                                <div class="col-12">
                                    <h6 class="text-uppercase">Personal Information</h6>
                                    <hr class="hr-sm mb-2 border-success">
                                </div>                         
                                <div class="form-group col-md-10">
                                    <label>Patron Type</label>
                                    <select id="PatronTypeId" name="PatronTypeId" data-provide="selectpicker" title="Choose Patron Type" data-live-search="true" class="form-control show-tick"></select>
                                </div>
                                <div class="form-group col-md-8">
                                    <label>ID Number</label>
                                    <small class="sidetitle">15-999-999</small>
                                    <input  id="IdNumber" class="form-control" type="text" name="Id Number"data-format="{{99}}-{{999}}-{{999}}" data-minlength="3" placeholder="18-xxx-xxx">
                                </div>
                                <div class="form-group col-md-8">
                                    <label>Last Name</label>
                                    <input  id="LastName" class="form-control" type="text" name="Lastname" placeholder="Last Name">
                                </div>
                            <div class="divider divider-vertical border-warning"></div>
                                <div class="form-group col-md-8">
                                    <label>First Name</label>
                                    <input  id="FirstName" class="form-control" type="text" name="FirstName" placeholder="First Name">
                                </div>
                                <div class="form-group col-md-8">
                                    <label>Extension Name</label>
                                    <small class="sidetitle">optional</small>
                                    <input  id="ExtensionName" class="form-control" type="text" name="ExtensionName" placeholder="Extension Name">
                                </div>
                                <div class="form-group col-md-8">
                                    <label>Middle Name</label>
                                    <input  id="MiddleName" class="form-control" type="text" name="MiddleName" placeholder="Middle Name">
                                </div>
                            </div> <!-- row -->
                        </div> <!-- card-body -->

                        <div class="col-6">
                                <div class="col-12">
                                    <h6 class="text-uppercase">Contact Details</h6>
                                    <hr class="hr-sm mb-2 border-success">
                                </div>  
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label>Email</label>
                                    <small class="sidetitle">olas@email.com</small>
                                    <input  id="Email" class="form-control" type="email" name="Email" placeholder="email@email.com">
                                </div>
                                <div class="form-group col-md-8">
                                    <label>Contact Number</label>
                                    <small class="sidetitle">+63-999-999-9999</small>
                                    <input data-format="+63 9{{99}}-{{999}}-{{9999}}" id="ContactNumber" class="form-control" type="text" name="ContactNumber" data-format="+63 9{{99}}-{{999}}-{{9999}}" placeholder="+63 999-999-9999">
                                </div>
                                <div class="form-group col-md-8">
                                    <label>RFID Number</label>
                                    <input  id="RFIDNo" class="form-control" type="text" name="RFIDNo">
                                </div>
                                <div class="form-group col-md-8">
                                    <label>Password</label>
                                    <input  id="Password" class="form-control" type="password" name="Password" placeholder="Password">
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="card-footer text-right">
                            <button type="button" class="btn btn-info" onclick="Patron.validate()">Save</button>
                        </div>
                    </div>
				</div> <!-- card -->
			</div> <!-- col-lg-12 -->
		</div> <!-- row -->
	</form> <!-- form -->
</div>

<script>
	$(document).ready(function(){
		Patron.init();
	});

    var Patron = {
        data: function () {
            return {
                PatronId: 0,
                PatronTypeId: $('#PatronTypeId').selectpicker('val'),
                FirstName: $('#FirstName').val(),
                MiddleName: $('#MiddleName').val(),
                LastName: $('#LastName').val(),
                ExtensionName: $('#ExtensionName').val(),
                Email: $('#Email').val(),
                Password: $('#Password').val(),
                ContactNumber: $('#ContactNumber').val().split('-').join('').replace(' ',''),                
                IdNumber: $('#IdNumber').val(),
                RFIDNo: $('#RFIDNo').val(),                
            }
            console.log(Patron.data.val());
        },

        init: function () {
            $.ajax({
                url: "<?php echo base_url('PatronType/GetAll'); ?>",
                async: false,
                success: function(i){
                    i = JSON.parse(i);          
                    $('#PatronTypeId').empty();          
                    $.each(i, function(index, data){                        
                        $('#PatronTypeId').append('<option value = "' + data.PatronTypeId + '">' + data.Name + '</option>');
                    })
                    $('#PatronTypeId').selectpicker('refresh');
                }
            });
        },

        validate: function(){
            $.ajax({
                url:'<?php echo base_url('Patron/Validate'); ?>',
                type: "POST",
                data: {"patron": Patron.data()},
                success: function(i){
                    $('.invalid-feedback').remove();
                    $('.is-invalid').removeClass('is-invalid');
                    i = JSON.parse(i);                    
                    if(i.status == 1){
                        Patron.save();
                    }else{
                        $.each(i, function(element, message){
                            if(element != 'status'){
                                $('#' + element).addClass('is-invalid').parent().append(message);
                            }
                        });
                    }
                    // Patron.save();
                }, 
                error: function(i){
                    swal('Oops!', "Something went wrong", 'error');
                }
            })      
        },

        save: function () {
            var message;
                console.log(Patron.data());
                console.log($('#PatronId').val());
                if ($('#PatronId').val() == 0) {
                    message = "Great Job! New Patron has been created";
                } else {
                    message = "Nice! Patron has been updated";
                }
                console.log($('#PatronId').val());

                swal({
                    title: 'Confirm Submission',
                    text: 'Save changes for Patron',
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'No! Cancel',
                    cancelButtonClass: 'btn btn-default',
                    confirmButtonText: 'Yes! Go for it',
                    confirmButtonClass: 'btn btn-info'
                }).then((result) => {
                    if (result.value) {
                        $.post('<?php echo base_url('Patron/Save'); ?>',{
                        patron: Patron.data()
                        }, function(i){
                            swal('Good Job!', message, 'success');
                            $('#modal-patron-edit').modal('hide');

                                console.log(i);
                                //$('table').DataTable().ajax.reload();
                            }
                        );	
                    }
                })
            
        }
    };


</script>