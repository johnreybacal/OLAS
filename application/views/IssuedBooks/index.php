

<header class="header header-inverse bg-ui-general"> <!--header-inverse para madilim bg-ui-general-->
<div class="container">
	<div class="header-info">
	<div class="left">
		<br>
		<h2 class="header-title"><strong>Publisher</strong> <small class="subtitle">List of all Authors are available in this page.</small></h2>
	</div>
	</div>

	<div class="header-action">
	<div class="buttons">
		<!-- <a class="btn btn-primary btn-float" href="#" title="Create new book" data-provide="tooltip"><i class="ti-plus"></i></a> -->
		<a class="btn btn-float btn-lg btn-info float-md-right text-white" onclick="Utilities_PANType_Modal.new();"
	data-toggle="modal" data-target="#modal-utilities-pantype" data-provide="tooltip" data-original-title="Add Book">
		<i class="ti-plus"></i>
		</a>
	</div>
	</div>
</div>
</header><!--/.header -->

<div class="main-content">
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered display nowrap" style="width:100%; overflow-x:auto;" cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("Loan/GenerateTable") ?>">
					<thead>
						<tr>
						<th>Author ID</th>			
						<th>Author ID</th>			
						<th>Author ID</th>			
						<th>Author ID</th>			
						<th>Author ID</th>			
						<th>Data</th>
						</tr>
					</thead>
				</table>            			
			</div>
		</div>
	</div>
</div>