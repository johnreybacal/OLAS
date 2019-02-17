<div class="main-content">
	<form id="book-form" enctype="multipart/form-data">
		<div class="row">
			<div class="col-lg-12">
				<div class="card card-shadowed">				
					<header class="card-header">
		                <h4 class="card-title">Patron <strong>Information</strong></h4>
	              	</header>
					<div class="card-body form-type-line">
						<div class="row">					
							<input id="PatronId" hidden value="<?php echo $patron->PatronId; ?>"/>		
							<div class="form-group col-md-6">
								<label>Patron Type</label>
                                <select id="PatronTypeId" name="PatronTypeId" data-provide="selectpicker" title="Choose Patron Type" data-live-search="true" class="form-control show-tick"></select>
							</div>
							<div class="form-group col-md-6">
								<label>First Name</label>
                                <input  id="FirstName" class="form-control" type="text" name="FirstName" placeholder="First Name" value="<?php echo $patron->FirstName; ?>">
							</div>
							<div class="form-group col-md-6">
								<label>Middle Name</label>
                                <input  id="MiddleName" class="form-control" type="text" name="MiddleName" placeholder="Middle Name" value="<?php echo $patron->MiddleName; ?>">
							</div>
							<div class="form-group col-md-6">
								<label>Last Name</label>
                                <input  id="LastName" class="form-control" type="text" name="Lastname" placeholder="Last Name" value="<?php echo $patron->LastName; ?>">
							</div>
							<div class="form-group col-md-6">
								<label>Extension Name</label>
                                <input  id="ExtensionName" class="form-control" type="text" name="ExtensionName" placeholder="Extension Name" value="<?php echo $patron->ExtensionName; ?>">
							</div>
							<div class="form-group col-md-6">
								<label>Email</label>
                                <input  id="Email" class="form-control" type="email" name="Email" placeholder="email@email.com" value="<?php echo $patron->Email; ?>">
							</div>
							<div class="form-group col-md-6">
								<label>Contact Number</label>
                                <input data-format="+63 9{{99}}-{{999}}-{{9999}}" id="ContactNumber" class="form-control" type="text" name="ContactNumber" data-format="+63 9{{99}}-{{999}}-{{9999}}" placeholder="+63 999-999-9999" value="<?php echo $patron->ContactNumber; ?>">
							</div>
							<div class="form-group col-md-6">
								<label>ID Number</label>
                                <input  id="IdNumber" class="form-control" type="text" name="Id Number"data-format="{{99}}-{{999}}-{{999}}" data-minlength="3" placeholder="18-xxx-xxx" value="<?php echo $patron->IdNumber; ?>">
							</div>
							<div class="form-group col-md-6">
								<label>RFID Number</label>
                                <input  id="RFIDNo" class="form-control" type="text" name="RFIDNo" value="<?php echo $patron->RFIDNo; ?>">
							</div>
							<div class="form-group col-md-6">
								<label>Password</label>
                                <input  id="Password" class="form-control" type="password" name="Password" placeholder="Password" value="<?php echo $patron->Password; ?>">
							</div>
						</div> <!-- row -->
					</div> <!-- card-body -->
					<div class="card-footer text-right">
						<button type="button" class="btn btn-info" onclick="Patron.validate()">Save</button>
					</div>
				</div> <!-- card -->
			</div> <!-- col-lg-12 -->
		</div> <!-- row -->
	</form> <!-- form -->
</div>

<script>
	$(document).ready(function(){
		Patron.init();
		$('#PatronTypeId').selectpicker('val', '<?php echo $patron->PatronTypeId?>');
	});

    var Patron = {
        data: function () {
            return {
                PatronId: $('#PatronId').val(),
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
    };


</script>