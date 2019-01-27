<header class="header bg-ui-general">
	<div class="container">
		<div class="header-info">
			<div class="left">
				<h2 class="header-title"><strong>Book Bag</strong> <small class="subtitle">List of all books on BookBag are available in this page.</small></h2>
			</div>
		</div>
	</div>
</header>
	<!-- remove inline css in the future -->
<div class="main-content" style="margin: 30px 90px 0px 90px;">
	<div class="card">
		<div class="card-body">            
            <h4>Bookbag</h4>
			<div class="table-responsive" style="border:0 !important">
				<table id = "bookbag-table" cellspacing="0" cellpadding="0" class="table table-striped table-bordered display nowrap r7" style="width:100%; overflow-x:auto;"  data-provide = "datatables" data-ajax = "<?php echo base_url("Bookbag/GenerateTable") ?>">
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
