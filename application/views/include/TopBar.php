<header class="topbar">
	<div class="topbar-left">
		<!-- <span class="topbar-btn sidebar-toggler"><i>&#9776;</i></span> -->        		
		<span class="logo"><img src="<?php echo base_url('assets/img/logo'); ?>" alt="logo-icon"></span>
		<div class="topbar-divider d-none d-md-block"></div>
		<div class="lookup d-none d-md-block ">
        	<form class="lookup-placeholder">
        		<input class="form-control" type="text" placeholder="Search books, authors, genres, etc." style="min-width: 200%;">
    		</form>
    	</div>		
	</div>

	<div class="topbar-right">
		<div>		
			<a class="btn btn-sm border-light hover-shadow-2 hover-info" href="#qv-form-center" data-toggle="quickview">Login as patron</a>        
		</div>
		<div class="topbar-divider d-none d-md-block"></div>
		<div>
			<a href = "<?php echo base_url('Librarian'); ?>" class="btn btn-sm border-light hover-shadow-2  hover-info">Librarian portal</a>
		</div>
	</div>
	<!-- Form center -->
	<div id="qv-form-center" class="quickview">
		<header class="quickview-header">
			<p class="quickview-title lead">Log in</p>
			<span class="close"><i class="ti-close"></i></span>
		</header>

		<div class="quickview-body center-v">
			<form class="quickview-block form-type-line" action = "#">
				<div class="form-group">
					<label for="username">ID number</label>
					<input type="text" class="form-control" id="IdNumber">
				</div>

				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="Password">
				</div>

				<div id = "message"></div>

				<div class="form-group flexbox flex-column flex-md-row">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" checked>
						<label class="custom-control-label">Remember me</label>
					</div>
				</div>

				<div class="form-group">
					<button class="btn btn-bold btn-block btn-primary"  onclick = "login.validate()" type="submit">Login</button>
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
