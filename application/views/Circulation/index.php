<header class="header header-inverse bg-ui-general"> 
	<div class="container">
		<div class="header-info">
		<div class="left">
			<br>
			<h2 class="header-title"><strong>Circulation</strong> <small class="subtitle">List of all Borrowed Books are available in this page.</small></h2>
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
				<table id = "college-table" class="table table-striped table-bordered display nowrap" style="width:100%; overflow-x:auto;" cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("Circulation/GenerateTable") ?>">
					<thead>
						<tr class="bg-info">
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