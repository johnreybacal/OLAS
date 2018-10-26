<header class="header header-inverse bg-ui-general"> 
	<div class="container">
		<div class="header-info">
		<div class="left">
			<br>
			<h2 class="header-title"><strong>Reservation</strong> <small class="subtitle">List of all Reserved Books are available in this page.</small></h2>
		</div>
		</div>

		<!-- <div class="header-action">
		<div class="buttons">
			<a class="btn btn-float btn-lg btn-info float-md-right text-white" onclick="Patron_Modal.new();"
		data-toggle="modal" data-target="#modal-Patron" data-provide="tooltip" data-original-title="Add Patron">
			<i class="ti-plus"></i>
			</a>
		</div>
		</div> -->
	</div>
</header>
<div class="main-content">
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<table id = "reservation-table" class="table table-striped table-bordered display nowrap" style="width:100%; overflow-x:auto;" cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("Reservation/GenerateTable") ?>">
					<thead>
						<tr class="bg-info">
							<th>Borrower</th>	
							<th>ISBN</th>									
							<th>Book Reserved</th>									
							<th>Date Reserved</th>	
							<th>Action</th>						
						</tr>
					</thead>
				</table>            			
			</div>
		</div>
	</div>
</div>

<script>
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