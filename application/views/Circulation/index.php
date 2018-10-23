<div class="main-content">
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<table id = "college-table" class="table table-striped table-bordered display nowrap" style="width:100%; overflow-x:auto;" cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("Circulation/GenerateTable") ?>">
					<thead>
						<tr>
							<th>Borrower</th>	
							<th>ISBN</th>									
							<th>Book Issued</th>									
							<th>Date Issued</th>
							<th>Date Due</th>
							<th>Date Returned</th>
							<th>Amount Payed</th>
							<th>Status</th>
							<th></th>
						</tr>
					</thead>
				</table>            			
			</div>
		</div>
	</div>
</div>