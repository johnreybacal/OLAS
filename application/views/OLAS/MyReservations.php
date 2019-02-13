<header class="header header-inverse bg-ui-general" style="margin-top:5%;"> 
	<!-- <div class="container"> -->
		<div class="header-info">
			<!-- <div class="left"> -->
				<h2 class="header-title"><strong>My Reservations</strong> <small class="subtitle">List of all books reserved are available in this page.</small></h2>
			<!-- </div> -->
		</div>
	<!-- </div> -->
</header>
		<!-- will remove this inline css in the future-->
<div class="main-content" style="margin: 30px 90px 0px 90px;">
	<div class="card">
		<div class="card-body">                        
			<div class="table-responsive" style="border:0 !important">
				<table id = "my-reservations-table" cellspacing="0" cellpadding="0" class="table table-striped table-bordered display nowrap" style="width:100%; overflow-x:auto;"  data-provide = "datatables" data-ajax = "<?php echo base_url("GenerateTableMyReservations") ?>">
					<thead>
						<tr>										
							<th>Title</th>
							<th>Author</th>			
							<th>Section</th>							
							<th>Series</th>
							<th>Edition</th>
							<th>Subject</th>							
							<th>Call Number</th>
							<th></th>
						</tr>
					</thead>
				</table>            			
			</div>        
		</div>
	</div>
</div>

<script>

	var MyReservations = {

		discard: function(id){
			swal({
                title: 'Discard reservation?',
                text: 'This cannot be undone',
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: 'No! Cancel',
                cancelButtonClass: 'btn btn-default',
                confirmButtonText: 'Yes! Go for it',
                confirmButtonClass: 'btn btn-info'
            }).then((result) => {
                if (result.value) {
					$.ajax({
						url: "<?php echo base_url("Reservation/Discard/"); ?>" + id,
						success: function(){
							swal('Success!', 'Reservation discarded successfully', 'success');
							$('#my-reservations-table').DataTable().ajax.reload();
						},
						error: function(){
                            swal('Oops!', "Something went wrong", 'error');
						}
					})
				}
			});
		}

	}

</script>