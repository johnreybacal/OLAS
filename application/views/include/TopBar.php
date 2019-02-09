<header class="topbar">
	<div class="topbar-left">
		<!-- <span class="topbar-btn sidebar-toggler"><i>&#9776;</i></span> -->        		
		<a href="<?php echo base_url(); ?>"><span class="logo"><img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="logo-icon"></span></a>
		<div class="topbar-divider d-none d-md-block"></div>
		<div class="d-snone d-md-block ">
            <form class="lookup lookup-lg lookup-user no-icon">
                <input class="no-radius" id="search" type="text" placeholder="Search">
                <select class="ds-none d-block librarian-search" data-provide="selectpicker" multiple>
                    <option selected>Book</option>
                    <option selected>Author</option>
                    <option selected>Subject</option>
                    <option selected>Section</option>
                    <option selected>Series</option>
                    <option selected>Publisher</option>
                </select>
                <button class="btn btn-info btn-bold no-radius fs-12" onclick="Search.search();" style="padding-top: 4px!important;"><i class="fa fa-search fa-2x"></i></button>
            </form>
        </div>		
	</div>

	<div class="topbar-right">
		<ul class="topbar-btns">
			<li class="dropdown">
			<a class="btn btn-sm btn-outline btn-info hover-shadow-2 ml-1" href="#qv-form-center" data-toggle="quickview">Patron</a>   
			</li>     
		<div class="topbar-divider d-none d-md-block"></div>
		<li class="dropdown">
			<a class="btn btn-sm btn-outline btn-info hover-shadow-2 mr-1" href = "<?php echo base_url('Librarian'); ?>" >Librarian</a>
		</li>
	</ul>
	</div>
	<!-- Form center -->
	<div id="qv-form-center" class="quickview backdrop-dark">
		<header class="quickview-header">
			<p class="quickview-title lead form-title" >Log in</p>
			<span class="close"><i class="ti-close"></i></span>
		</header>

		<div class="quickview-body center-v user-login">
			<form class="quickview-block form-type-line" action = "#">
				<div class="form-group">
					<label for="username" class="form-input">ID number</label>
					<input type="text" class="form-control" id="IdNumber">
				</div>

				<div class="form-group">
					<label for="password" class="form-input" >Password</label>
					<input type="password" class="form-control" id="Password">
				</div>

				<div id = "message"></div>

				<div class="form-group flexbox flex-column flex-md-row">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" style="color: #48b0f7 ">
						<label class="custom-control-label">Remember me</label>
					</div>
				</div>

				<div class="form-group">
					<button class="btn btn-bold btn-block btn-info"  onclick = "login.validate()" type="submit">Login</button>
				</div>
			</form>			
		</div>
	</div>

</header>

<script>
	$(document).keypress(function(e){
		if(e.which == 13){			
			login.validate();
		}
	});
	
	var login = {
		data: function(){
			return {
				"IdNumber": $('#IdNumber').val(),
				"Password": $('#Password').val(),				
			}
		},

		validate: function(){			
			if($('#IdNumber').val() == '' && $('#Password').val() == ''){
				$('#message').html("<p class = 'text-danger'>ID Number and password is required</p>");
			} else if($('#Password').val() == ''){
				$('#message').html("<p class = 'text-danger'>Password is required</p>");			
			} else if($('#IdNumber').val() == ''){
				$('#message').html("<p class = 'text-danger'>ID Number is required</p>");			
			} else {
				login.authenticate();
			}
		},

		authenticate: function(){			
			$.post('<?php echo base_url('Patron/Authenticate'); ?>',{
				login: login.data()
				}, function(i){
					var message = "<p class = 'text-danger'>Invalid ID number or password</p>";
					if(i != 0){
						message = "<p class = 'text-success'>Login Successful</p>";
						window.location.href = "<?php echo base_url(uri_string()); ?>";
					}
					$('#message').html(message);
				}
			);			
		}
	};
</script>
