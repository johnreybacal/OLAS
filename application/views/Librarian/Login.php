<div class="min-h-fullscreen bg-img center-vh p-20" style="background-image: url(../assetsOlas/img/login-bg.jpg);" data-overlay="7">

    <div class="card card-round card-shadowed px-50 py-30 w-400px mb-0" style="max-width: 100%">
      <h5 class="text-uppercase">Sign in</h5>

      <form class="form-type-line">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="Username">
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="Password">
        </div>

        <div class="form-group flexbox flex-column flex-md-row">
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" checked>
            <label class="custom-control-label">Remember me</label>
          </div>

          <a class="text-muted hover-primary fs-13 mt-2 mt-md-0" href="#">Forgot password?</a>
        </div>

        <div class="form-group">
          <button class="btn btn-bold btn-block btn-primary"  onclick = "login.authenticate()" type="submit">Login</button>
        </div>
      </form>
    </div>
</div>
<p id = "message"></p>
<script>	
	var login = {
		data: function(){
			return {
				"Username": $('#Username').val(),
				"Password": $('#Password').val(),				
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