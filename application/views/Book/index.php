<header class="header header-inverse bg-ui-general">
	<!-- <div class="container"> -->
		<div class="header-info">
			<div class="left">
				<h2 class="header-title"><strong>Books</strong> <small class="subtitle">List of all books are available in this page.</small></h2>
			</div>
		</div>

		<div class="header-action">
			<div class="buttons">
				<a href = "<?php echo base_url('Book/Add') ?>" class="btn btn-float btn-lg btn-info float-md-right text-white" data-provide="tooltip" data-original-title="Add Book">
				<i class="ti-plus"></i>
				</a>
			</div>
		</div>
	<!-- </div> -->
</header>

<div class="main-content">
	<div class="card">
		<div class="card-body">
			<label class="fs-18 fw-500">Filter by date acquired</label>
            <div class="form-row">  
                <div class="form-group col-md-4 col-sm-12" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                    <label>From</label>
                    <input class="form-control" type="text" id="range-book-from" name="range-book-from" placeholder="">
                </div>

                <div class="form-group col-md-4 col-sm-12" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                    <label>To</label>
                    <input class="form-control" type="text" id="range-book-to" name="range-book-to" placeholder="">
                </div>

                <div class="col-md-2 col-sm-12 dash-filter" style="margin-bottom: 30px;">
                    <label>&nbsp;</label>
                    <button class="btn btn-block btn-info" id="filter" onclick="Book.filter()">Filter</button>
                </div>
				<div class="col-md-2 col-sm-12" style="margin-bottom: 30px;">
                    <label>&nbsp;</label>
                    <button class="btn btn-block btn-info" onclick="ExportExcel('book-table')">Export</button>
                </div>
            </div>            
			<div id="table-container" class="table-responsive">
				<table id="book-table" class="table table-striped table-bordered display nowrap r1 r4" style="width:100%; overflow-x:auto;" cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("Book/GenerateTable") ?>">
					<thead>
						<tr class="center bg-info">
							<th>Accession Number</th>
							<th>Title</th>
							<th>Author</th>
							<th>Call Number</th>
							<th>Date Acquired</th>							
							<th>Status</th>
							<th></th>
						</tr>
					</thead>
				</table>            			
			</div>
		</div>
	</div>
</div>

<script>
	var Book = {
		filter: function(){          
            var url = "<?php echo base_url("Book/GenerateTable/") ?>";            
            if($('#range-book-from').val() != '' && $('#range-book-to').val() != ''){                
                url = "<?php echo base_url("Book/GenerateTable/") ?>" + $('#range-book-from').val() + '/' + $('#range-book-to').val();
				console.log('nani?');
            }
			console.log(url);
            $('#table-container').empty().html(                
                '<div class="table-responsive">' + 
                    '<table id="book-table" class="table table-striped table-bordered display nowrap" style="width:100%; overflow-x:auto;" cellspacing="0" data-provide = "datatables" data-ajax = "' + url + '">' + 
                        '<thead>' +
                            '<tr class="bg-info">' + 
								"<th>Accession Number</th>" +
								"<th>Title</th>" +
								"<th>Author</th>" +
								"<th>Call Number</th>" +
								"<th>Date Acquired</th>" +
								"<th>Status</th>" +
								"<th></th>" +
                            '</tr>' +
                        '</thead>' + 
                    '</table>' +              
                '</div>'
            );
        },  
	}
</script>