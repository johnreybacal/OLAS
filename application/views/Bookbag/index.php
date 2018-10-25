<header class="header header-inverse bg-ui-general"> <!--header-inverse para madilim bg-ui-general-->
<div class="container">
	<div class="header-info">
	<div class="left">
		<br>
		<h2 class="header-title"><strong>Books</strong> <small class="subtitle">List of all books on BookBag are available in this page.</small></h2>
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

<div class="main-content">
	<div class="card">
		<div class="card-body">            
            <h4>Bookbag</h4>
			<div class="table-responsive" style="border:0 !important">
				<table id = "bookbag-table" cellspacing="0" cellpadding="0" class="table table-striped table-bordered display nowrap" style="width:100%; overflow-x:auto;"  data-provide = "datatables" data-ajax = "<?php echo base_url("Bookbag/GenerateTable") ?>">
					<thead>
						<tr>										
							<th>Title</th>
							<th>Author</th>			
							<th>Genre</th>							
							<th>Series</th>
							<th>Edition</th>
							<th>Subject</th>							
							<th>Call Number</th>
							<th></th>
						</tr>
					</thead>
				</table>            			
			</div>
        <button class="btn btn-info float-md-right m-2 mt-4" onclick="Bookbag.reserve()">Reserve</button>
		</div>
	</div>
</div>
