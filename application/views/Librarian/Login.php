<div class="min-h-fullscreen bg-img center-vh p-20" style="background-image: url(<?php echo base_url("assetsOLAS/img/login-bg.jpg"); ?>);" data-overlay="7">

	<div class="card card-round card-shadowed px-50 py-30 w-400px mb-0" style="max-width: 100%">
		<h5 class="text-uppercase">Sign in</h5>

		<form class="form-type-line" action = "#">
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" class="form-control" id="Username">
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

				<a class="text-muted hover-primary fs-13 mt-2 mt-md-0" href="<?php echo base_url(); ?>">Back to home page</a>
			</div>

			<div class="form-group">
				<button class="btn btn-bold btn-block btn-primary"  onclick = "login.validate()" type="submit">Login</button>
			</div>
		</form>
	</div>
</div>
<p id = "message"></p>
<script>	
	$(document).keypress(function(e){
		if(e.which == 13){			
			login.validate();
		}
	});
	
	var login = {
		data: function(){
			return {
				"Username": $('#Username').val(),
				"Password": $('#Password').val(),				
			}
		},

		validate: function(){			
			if($('#Username').val() == '' && $('#Password').val() == ''){
				$('#message').html("<p class = 'text-danger'>Username and password is required</p>");
			} else if($('#Password').val() == ''){
				$('#message').html("<p class = 'text-danger'>Password is required</p>");			
			} else if($('#Username').val() == ''){
				$('#message').html("<p class = 'text-danger'>Username is required</p>");			
			} else {
				login.authenticate();
			}
		},

		authenticate: function(){			
			$.post('<?php echo base_url('Librarian/Authenticate'); ?>',{
				login: login.data()
				}, function(i){
					var message = "<p class = 'text-danger'>Invalid username or password</p>";
					if(i != 0){
						message = "<p class = 'text-success'>Login Successful</p>";
						window.location.href = "<?php echo base_url('Librarian/Dashboard'); ?>";
					}
					$('#message').html(message);
				}
			);			
		}
	};
</script>
</main>
<!-- END Main container -->

<!-- Global quickview -->
<div id="qv-global" class="quickview" data-url="../assets/data/quickview-global.html">
    <div class="spinner-linear">
    <div class="line"></div>
    </div>
</div>
<!-- END Global quickview -->



</body>
</html>