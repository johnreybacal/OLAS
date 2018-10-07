Login
<input type = "username" id = "Username" />
<input type = "password" id = "Password" />
<button onclick = "login.authenticate()">Save</button>
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