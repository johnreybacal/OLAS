<header class="header header-inverse bg-ui-general">
	<div class="container">
		<div class="header-info">
			<!-- <div class="left"> -->
				<h2 class="header-title"><strong>My Books</strong> <small class="subtitle">List of all books that you issued are available in this page.</small></h2>
			<!-- </div> -->
		</div>
	</div>
</header>

<div class="main-content">
	<div class="card">
		<div class="card-body">                        
			<h4 class="card-title">Current Books Issued</h4>
			<div class="table-responsive" style="border:0 !important">
				<table id = "my-reservations-table" cellspacing="0" cellpadding="0" class="table table-striped table-bordered display nowrap r2" style="width:100%; overflow-x:auto;"  data-provide = "datatables" data-ajax = "<?php echo base_url("GenerateTableMyBooks/1") ?>">
					<thead>
						<tr>										
							<th>Title</th>
							<th>Call Number</th>
							<th>Date Borrowed</th>
							<th>Date Due</th>
						</tr>
					</thead>
				</table>            			
			</div>        

			<h4 class="card-title">My Issuance History</h4>
			<div class="table-responsive" style="float: right!important;">
				<table id = "my-reservations-table" cellspacing="0" cellpadding="0" class="table table-striped table-bordered display nowrap r2 r6" style="width:100%; overflow-x:auto;"  data-provide = "datatables" data-ajax = "<?php echo base_url("GenerateTableMyBooks/0") ?>">
					<thead>
						<tr>										
							<th>Title</th>
							<th>Call Number</th>
							<th>Date Borrowed</th>
							<th>Date Due</th>
							<th>Date Returned</th>
							<th>Penalty</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td></td>
							<td style="text-align: right!important;"></td>
							<td></td>
							<td></td>
							<td></td>
							<td style="text-align: right!important;"></td>
						</tr>
					</tbody>
				</table>            			
			</div>        
		</div>
	</div>
</div>