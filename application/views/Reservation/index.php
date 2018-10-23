<div class="main-content">
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<table id = "reservation-table" class="table table-striped table-bordered display nowrap" style="width:100%; overflow-x:auto;" cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("Reservation/GenerateTable") ?>">
					<thead>
						<tr>
							<th>Borrower</th>	
							<th>ISBN</th>									
							<th>Book Reserved</th>									
							<th>Date Reserved</th>							
						</tr>
					</thead>
				</table>            			
			</div>
		</div>
	</div>
</div>