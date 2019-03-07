<header class="header header-inverse bg-ui-general"> 
	<!-- <div class="container"> -->
		<div class="header-info">
			<!-- <div class="left"> -->
				<h2 class="header-title"><strong>Reservation</strong> <small class="subtitle">List of all Reserved Books are available in this page.</small></h2>
			<!-- </div> -->
		</div>
	<!-- </div> -->
</header>
<div class="main-content">
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<table id = "reservation-table" class="table table-striped table-bordered display nowrap r2" style="width:100%; overflow-x:auto;" cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("Reservation/GenerateTable") ?>">
					<thead>
						<tr class="bg-info">
							<th>Borrower</th>	
							<th>ISBN</th>									
							<th>Book Reserved</th>									
							<th>Date Reserved</th>	
							<th>Expiration</th>
							<th>Action</th>						
						</tr>
					</thead>
				</table>            			
			</div>
		</div>
	</div>
</div>
<?php include("_Reservation_Modal.php"); ?>
<script>
	$(document).ready(function(){
		setInterval(ld, 1000);
	})

	function ld(){
		$('#reservation-table').DataTable().ajax.reload();
	}

	var Reservation = {

		refresh: function(){
			$('#reservation-table').DataTable().ajax.reload();
		},

		issue: function(id){
			$.ajax({
				url: "<?php echo base_url('Reservation/Issue'); ?>/" + id,
				success: function(){
					Reservation.refresh();
					swal("Book issued", "Data moved to circulation", "success");
				}
			});
		},
		
		discard: function(id){
			$.ajax({
				url: "<?php echo base_url('Reservation/Discard'); ?>/" + id,
				success: function(){
					Reservation.refresh();
					swal("Reservation discarded", "The system will notify the patron", "success");
				}
			});
		}

	};
	
</script>