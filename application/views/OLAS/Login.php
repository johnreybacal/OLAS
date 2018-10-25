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
			$.post('<?php echo base_url('Patron/Authenticate'); ?>',{
				login: login.data()
				}, function(i){
					$('#message').html((i == 1) ? "Login successful" : "Invalid username or password");
				}
			);			
		}
	};
</script>