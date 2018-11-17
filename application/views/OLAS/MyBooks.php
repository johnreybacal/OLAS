<header class="header bg-ui-general"> <!--header-inverse para madilim bg-ui-general-->
<div class="container">
	<div class="header-info">
	<div class="left">
		<br>
		<h2 class="header-title"><strong>My Books</strong> <small class="subtitle">List of all books that you issued are available in this page.</small></h2>
	</div>
	</div>

	<div class="header-action">
	<div class="buttons">
		<!-- <a class="btn btn-primary btn-float" href="#" title="Create new book" data-provide="tooltip"><i class="ti-plus"></i></a> -->
		<!-- <a href = "<?php echo base_url('Book/Add') ?>" class="btn btn-float btn-lg btn-info float-md-right text-white" data-provide="tooltip" data-original-title="Add Book">
		<i class="ti-plus"></i>
		</a> -->
	</div>
	</div>
</div>
</header><!--/.header -->

<div class="main-content" style="margin: 30px 90px 0px 90px;">
	<div class="card">
		<div class="card-body">                        
			<h4>Current books issued</h4>
			<div class="table-responsive" style="border:0 !important">
				<table id = "my-reservations-table" cellspacing="0" cellpadding="0" class="table table-striped table-bordered display nowrap" style="width:100%; overflow-x:auto;"  data-provide = "datatables" data-ajax = "<?php echo base_url("GenerateTableMyBooks/1") ?>">
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
			<hr />
			<h4>My Issuance History</h4>
			<div class="table-responsive" style="border:0 !important">
				<table id = "my-reservations-table" cellspacing="0" cellpadding="0" class="table table-striped table-bordered display nowrap" style="width:100%; overflow-x:auto;"  data-provide = "datatables" data-ajax = "<?php echo base_url("GenerateTableMyBooks/0") ?>">
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
				</table>            			
			</div>        
		</div>
	</div>
</div>
