<header class="header bg-img" style="background-image: url(<?php echo base_url("assetsOLAS/img/book/8.jpg"); ?>)">
    <div class="header-info h-250px mb-0">
        <div class="media align-items-end">
            <img class="avatar avatar-xl avatar-bordered" src="<?php echo base_url("assetsOLAS/img/book/lee_3grd.png"); ?>" alt="...">
            <div class="media-body">
              <p class="text-white opacity-90"><strong>Rock Lee</strong></p>
              <small class="text-white opacity-60">Sorye Ge Ton</small>
            </div>
        </div>
    </div>

    <div class="header-action bg-white">
        <nav class="nav">
            <a class="nav-link active" href="#">Profile</a>
            <a class="nav-link" href="#">Logs</a>
        </nav>
    </div>
</header>

<div class="main-content">
	<div class="card">
		<div class="card-body form-type-line">
			<form id="modal-librarian-form" action="#" class="form-group mt-2">
                        <input type="hidden" id="LibrarianId"/>
                        
                        <div class="row mb-2">
                        	<div class="col-md-3">
								<!-- <div id="imgDisplay"> -->
                					<input id="image" type="file" data-provide="dropify" data-show-remove="false" data-default-file="<?php echo base_url("assetsOLAS/img/book/bookdefault.jpg"); ?>" style="border: solid black 1px;">
                				<!-- </div> -->
          					</div>
          					<div class="col-md-9">
          						<div class="row">
		                            <div class="col-12 mb-2">
		                                <label>Role</label>
		                                <select multiple id="LibrarianRoleId" name="LibrarianRoleId" data-provide="selectpicker" title="Choose Role" data-live-search="true" class="form-control form-type-combine show-tick"></select>
		                            </div>
		                            <div class="col-md-6 col-sm-12 mb-2">
		                                <label>First Name</label>
		                                <input id="FirstName" name="Name" type="text" class="form-control" placeholder="First Name" />
		                            </div>
		                            <div class="col-md-6 col-sm-12 mb-2">
		                                <label>Last Name</label>
		                                <input id="LastName" name="Name" type="text" class="form-control" placeholder="Last Name" />
		                            </div>
		                       
		                            <div class="col-md-6 col-sm-12 mb-2">
		                                <label>Username</label>
		                                <input id="Username" name="Username" type="text" class="form-control" placeholder="Username" />
		                            </div>
		                            <div class="col-md-6 col-sm-12 mb-2">
		                                <label>New Password</label>
		                                <input id="NewPassword" name="Password" type="password" class="form-control" placeholder="Password" />
		                            </div>
		                            <!-- <div class="col-md-6 col-sm-12 mb-2">
		                                <label>Confirm Password</label>
		                                <input id="ConfirmPassword" name="Password" type="password" class="form-control" placeholder="Password" />
		                            </div> -->
		                        </div>
	                        </div>
                        </div>

                        <!-- <div class="row" id="rowActive">
                            <div class="col-sm-2 col-md-2">
                                <label>Status:</label>
                            </div>
                            <div class="col-sm-8 col-md-8">
                                <div class="form-group">
                                    <label class="switch switch-info">
                                        <input type="checkbox" id="IsActive" name="IsActive" checked />
                                        <span class="switch-indicator"></span>
                                        <label>Active</label>
                                    </label>
                                </div>
                            </div>
                        </div> -->
                      
                    </form>
            <?php print_r($librarian); ?>
        </div>
        <footer class="card-footer text-right">
                <!-- <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button> -->
                <button type="button" class="btn btn-info" onclick="Profile.validate()">Save</button>
            </footer>
    </div>
</div>
<script>
	$(document).ready(function(){
		Profile.init();
	});

	
	var Profile = {
        
        init: function () {
            
        },

        data: function () {
           
        },

        new: function () {
            
        },

        edit: function (id) {
            
        },
        
        validate: function(){
            
        },

        save: function() {
            var message;
                console.log(Profile.data());
                console.log($('#LibrarianId').val());
                if ($('#LibrarianId').val() == 0) {
                    message = "Great Job! New Librarian has been created";
                } else {
                    message = "Nice! Librarian has been updated";
                }
                console.log($('#LibrarianId').val());

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
                    if (result.value) {
                        $.post('<?php echo base_url('Librarian/Save'); ?>',{
                        librarian: Profile.data()
                        }, function(i){
                            swal('Good Job!', message, 'success');
                            $('#modal-librarian').modal('hide');

                                console.log(i);
                                //$('table').DataTable().ajax.reload();
                            }
                        );	
                    }
                })
            
        }
    };
</script>