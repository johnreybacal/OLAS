<?php  echo $id ?>
<header class="header header-inverse bg-ui-general"> <!--header-inverse para madilim bg-ui-general-->
<div class="container">
	<div class="header-info">
	<div class="left">
		<br>
		<h2 class="header-title"><strong>Author</strong> <small class="subtitle">List of all Authors are available in this page.</small></h2>
	</div>
	</div>

	<div class="header-action">
	<div class="buttons">
		<!-- <a class="btn btn-primary btn-float" href="#" title="Create new book" data-provide="tooltip"><i class="ti-plus"></i></a> -->
		<a class="btn btn-float btn-lg btn-info float-md-right text-white" onclick="Utilities_PANType_Modal.new();"
	data-toggle="modal" data-target="#modal-utilities-pantype" data-provide="tooltip" data-original-title="Add Book">
		<i class="ti-plus"></i>
		</a>
	</div>
	</div>
</div>
</header><!--/.header -->

<div class="main-content">
	<form id="member-add-form">
		<input id="MemberId" hidden/>
		<div class="row">
			<div class="col-lg-12">
				<div class="card card-shadowed">
					<div class="card-title">
						<div class="row">
							<div class="col-md-6">
								<h4><strong>Book</strong> Information</h4>
							</div>
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-row gap-1">
									<div class="form-group col-md-6" style="margin: auto;">
											<label>Member Type</label>
											<select id="EditMemberTypeId" name="MemberTypeId" data-provide="selectpicker" title="Choose Member Type" data-live-search="true" class="form-control form-type-combine show-tick"></select>
									</div>
								</div>
								<div class="form-row gap-1">
									<div class="form-group col-md-4">
										<label>First Name</label>
										<input  id="EditFirstName" class="form-control" type="text" name="FirstName" placeholder="First Name">
									</div>
									<div class="form-group col-md-4">
										<label>Middle Name</label>
										<input  id="EditMiddleName" class="form-control" type="text" name="MiddleName" placeholder="Middle Name">
									</div>
									<div class="form-group col-md-4">
										<label>Last Name</label>
										<input  id="EditLastName" class="form-control" type="text" name="Lastname" placeholder="Last Name">
									</div>
									 <div class="form-group col-md-4">
											<label>Sex</label>
											<select class="form-control" title="Sex" data-provide="selectpicker" tabindex="-98" name="Gender" id="Gender">
													<option value="FEMALE">Female</option>
													<option value="MALE">Male</option>
											</select>
									</div>
									<div class="form-group col-md-4">
										<label>Email</label>
										<input  id="EditEmail" class="form-control" type="email" name="Email" placeholder="Email">
									</div>
									<div class="form-group col-md-4">
										<label>Contact Number</label>
										<input  id="EditContactNumber" class="form-control" type="number" name="ContactNumber" placeholder="Contact Number">
									</div>
									<div class="form-group col-md-4">
										<label>Username</label>
										<input  id="EditUsername" class="form-control" type="text" name="Username" placeholder="Username">
									</div>
									<div class="form-group col-md-4">
										<label>Password</label>
										<input  id="EditPassword" class="form-control" type="password" name="Password" placeholder="Password">
									</div>
									<div class="form-group col-md-4">
										<label>Confirm Password</label>
										<input  id="EditConfirmPassword" class="form-control" type="password" name="ConfirmPassword" placeholder="Confirm Password">
									</div>
								</div>
							</div>
						</div> <!-- row -->
					</div> <!-- card-body -->
					<div class="card-footer text-right">
							<button type="button" class="btn btn-info" onclick="Member_Add.save()">Save</button>
					</div>
					<input id="member" >
				</div> <!-- card -->
			</div> <!-- col-lg-12 -->
		</div> <!-- row -->
	</form> <!-- row -->
</div>

<script>
console.log($('#MemberId').val());
	$(document).ready(function(){
		$(function (id) {
			 $.ajax({
        url: "<?php echo base_url('Member/Edit?id='); ?>" + id,
                success: function(i){
                    i = JSON.parse(i);
                    $('#EditFirstName').val(i.Firstname);
                    // $('#Name').val(i.Name);
                    console.log(i);
                }
            });     
		Member_View.init;
	})
    });			
    // $(document).ready(function() {
    //     $.ajax({
    //             url: "<?php echo base_url('Member/Edit?id='); ?>" + id,
    //             success: function(i){
    //                 i = JSON.parse(i);
    //                 $('#EditFirstName').val(i.Firstname);
    //                 // $('#Name').val(i.Name);
    //                 console.log(i);
    //             }
    //         });     
    // });     											    
	var Member_View = {

        new: function (id) {
            $('#MemberId').val(id);
            console.log($('#MemberId').val(id));
            Member_View.data(id);
        },

		dataa: function () {
			return {
				MemberId: $('#MemberId').val(),

				MemberTypeId: $('#EditMemberTypeId').val(),
				FirstName: $('#EditFirstName').val(),
	  			LastName: $('#EditLastName').val(),
				Username: $('#EditUsername').val(),
				Password: $('#EditPassword').val(),
				ContactNumber: $('#EditContactNumber').val(),
				Email: $('#EditEmail').val(),
			}
            console.log($('#EditEmail').val());
		},

		init: function () {
            $.ajax({
                url: "<?php echo base_url('MemberType/GetAll'); ?>",
                async: false,
                success: function(i){
                    i = JSON.parse(i);                    
                    $('#MemberTypeId').empty();
                    $.each(i, function(index, data){                        
                        $('#MemberTypeId').append('<option value = "' + data.MemberTypeId + '">' + data.Name + '</option>');
                    })
                    $('#MemberTypeId').selectpicker('refresh');
                }
            })
            $('#member-add-form')[0].reset();
            $('input').removeClass('is-invalid').addClass('');
            $('.invalid-feedback').remove();
            //$('#rowActive').addClass('invisible');
            //$('#modal-subject').modal('show');
            Member_View.data();
        },
        
        data: function(id) {
            $.ajax({
                url: "<?php echo base_url('Member/Get/'); ?>" + id,
                success: function(i){
                    i = JSON.parse(i);
                    $('#EditFirstName').val(i.Firstname);
                    // $('#Name').val(i.Name);
                    console.log(i);
                }
            })
        }
		// save: function () {
		// 	var message;
		// 		console.log(Member_Add.data());
		// 		if ($('#MemberId').val() == 0) {
        //             message = "Great Job! New Subject has been created";
        //         } else {
        //             message = "Nice! Subject has been updated";
        //         }

		//     swal({
		// 		title: 'Confirm Submission',
		// 		text: 'Save changes for Member',
		// 		type: 'warning',
		// 		showCancelButton: true,
		// 		cancelButtonText: 'No! Cancel',
		// 		cancelButtonClass: 'btn btn-default',
		// 		confirmButtonText: 'Yes! Go for it',
		// 		confirmButtonClass: 'btn btn-info'
		//     }).then((result) => {
		// 		console.log(Member_Add.data());
		// 		if (result.value) {

		// 			$.post('<?php echo base_url('Member/Save'); ?>',{
		// 			member: Member_Add.data()
		// 			}, function(i){
		// 				swal('Good Job!', message, 'success');
		// 				}
		// 			);
		// 		} 
		//     })
		// }
	}

</script>
							 
							 
							 
							 
							 
							 
