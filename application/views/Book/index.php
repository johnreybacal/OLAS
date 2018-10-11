
<header class="header header-inverse bg-ui-general"> <!--header-inverse para madilim bg-ui-general-->
<div class="container">
	<div class="header-info">
	<div class="left">
		<br>
		<h2 class="header-title"><strong>Books</strong> <small class="subtitle">List of all books are available in this page.</small></h2>
	</div>
	</div>

	<div class="header-action">
	<div class="buttons">
		<!-- <a class="btn btn-primary btn-float" href="#" title="Create new book" data-provide="tooltip"><i class="ti-plus"></i></a> -->
		<a href = "<?php echo base_url('Book/Add') ?>" class="btn btn-float btn-lg btn-info float-md-right text-white" data-provide="tooltip" data-original-title="Add Book">
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
				<table class="table table-responsive table-striped table-bordered display nowrap" style="width:100%; overflow-x:auto;" cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("Book/GenerateTableComplete") ?>">
					<thead>
						<tr>
							<th>Accession Number</th>
							<th>Call Number</th>
							<th>ISBN</th>
							<th>Title</th>
							<th>Author</th>			
							<th>Genre</th>
							<th>Publisher</th>
							<th>Series</th>
							<th>Edition</th>
							<th>Subject</th>
							<th>Course</th>
							<th>College</th>
							<th>Date Acquired</th>
							<th>Acquired From</th>
						</tr>
					</thead>
				</table>            			
			</div>
		</div>
	</div>
</div>