<input type = "hidden" id = "AccessionNumber" value = "0" />
<input type = "text" id = "ISBN" />
<input type = "text" id = "CallNumber" />
<input type = "date" id = "DateAcquired" />
<input type = "text" id = "AcquiredFrom" />
<button onclick = "book.save()">Save</button>
<script>	
	var book = {
		data: function(){
			return {
				"AccessionNumber": $('#AccessionNumber').val(),
				"ISBN": $('#ISBN').val(),
				"CallNumber": $('#CallNumber').val(),
				"DateAcquired": $('#DateAcquired').val(),
				"Status": "In",
				"AcquiredFrom": $('#AcquiredFrom').val(), 
			}
		},

		save: function(){			
			$.post('<?php echo base_url('Book/Save'); ?>',{
				book: book.data()
				}, function(i){
					console.log(i);
					$('table').DataTable().ajax.reload();
				}
			);			
		}
	};
</script>