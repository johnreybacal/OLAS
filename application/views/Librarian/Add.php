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
  <form id="librarian-add-form">
    <input id="LibrarianId" hidden />
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
                      <label>Librarian Role</label>
                      <select id="LibrarianRoleId" name="LibrarianRoleId" data-provide="selectpicker" title="Choose Librarian Role" data-live-search="true" class="form-control form-type-combine show-tick"></select>
                  </div>
                </div>
                <div class="form-row gap-1">
                  <div class="form-group col-md-4">
                    <label>First Name</label>
                    <input  id="FirstName" class="form-control" type="text" name="FirstName" placeholder="First Name">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Middle Name</label>
                    <input  id="MiddleName" class="form-control" type="text" name="MiddleName" placeholder="Middle Name">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Last Name</label>
                    <input  id="LastName" class="form-control" type="text" name="Lastname" placeholder="Last Name">
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
                    <input  id="Email" class="form-control" type="email" name="Email" placeholder="Email">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Contact Number</label>
                    <input  id="ContactNumber" class="form-control" type="number" name="ContactNumber" placeholder="Contact Number">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Username</label>
                    <input  id="Username" class="form-control" type="text" name="Username" placeholder="Username">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Password</label>
                    <input  id="Password" class="form-control" type="password" name="Password" placeholder="Password">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Confirm Password</label>
                    <input  id="ConfirmPassword" class="form-control" type="password" name="ConfirmPassword" placeholder="Confirm Password">
                  </div>
                </div>
              </div>
            </div> <!-- row -->
          </div> <!-- card-body -->
          <div class="card-footer text-right">
              <button type="button" class="btn btn-info" onclick="Librarian_Add.save()">Save</button>
          </div>
        </div> <!-- card -->
      </div> <!-- col-lg-12 -->
    </div> <!-- row -->
  </form> <!-- row -->
</div>

<script>
  $(document).ready(function(){
		$(function () {
			$.ajax({
					url: "<?php echo base_url('LibrarianRole/GetAll'); ?>",
					async: false,
					success: function(i){
						i = JSON.parse(i);                    
						$('#LibrarianRoleId').empty();
						$.each(i, function(index, data){                        
							$('#LibrarianRoleId').append('<option value = "' + data.LibrarianRoleId + '">' + data.Name + '</option>');
						})
						//$('#LibrarianRoleId').selectpicker('refresh');
					}
				})
				$('#librarian-add-form')[0].reset();
				$('input').removeClass('is-invalid').addClass('');
				$('.invalid-feedback').remove();
		});
		Librarian_Add.init;
	})				

	var Librarian_Add = {

      init: function () {
              $.ajax({
                  url: "<?php echo base_url('LibrarianRole/GetAll'); ?>",
                  async: false,
                  success: function(i){
                      i = JSON.parse(i);                    
                      $('#LibrarianRoleId').empty();
                      $.each(i, function(index, data){                        
                          $('#LibrarianRoleId').append('<option value = "' + data.LibrarianRoleId + '">' + data.Name + '</option>');
                      })
                      $('#LibrarianRoleId').selectpicker('refresh');
                  }
              })
              $('#librarian-add-form')[0].reset();
              $('input').removeClass('is-invalid').addClass('');
              $('.invalid-feedback').remove();
              //$('#rowActive').addClass('invisible');
              //$('#modal-Librarian').modal('show');
          },

      data: function () {
        return {
          LibrarianId: $('#LibrarianId').val(),
          LibrarianRoleId: $('#LibrarianRoleId').selectpicker('val'),
          FirstName: $('#FirstName').val(),
          LastName: $('#LastName').val(),
          Username: $('#Username').val(),
          Password: $('#Password').val(),
        }
      },
		
      save: function () {
        var message;
          console.log(Librarian_Add.data());
          if ($('#LibrarianId').val() == 0) {
                      message = "Great Job! New Librarian has been created";
                  } else {
                      message = "Nice! Librarian has been updated";
                  }

          swal({
            title: 'Confirm Submission',
            text: 'Save changes for Librarian',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'No! Cancel',
            cancelButtonClass: 'btn btn-default',
            confirmButtonText: 'Yes! Go for it',
            confirmButtonClass: 'btn btn-info'
          }).then((result) => {
            console.log(Librarian_Add.data());
            if (result.value) {

              $.post('<?php echo base_url('Librarian/Save'); ?>',{
              librarian: Librarian_Add.data()
              }, function(i){
                swal('Good Job!', message, 'success');
              // if(i == 0){
              // 	//error
              // 	swal('Something went wrong!', 'If problem persist contact administrator', 'error');
              // }
                }
              );
            } 
            // else {
            //   }
          })
      }
  
  }

</script>






