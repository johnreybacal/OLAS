<header class="header header-inverse bg-ui-general"> 
	<!-- <div class="container"> -->
		<div class="header-info">
			<!-- <div class="left"> -->
				<h2 class="header-title"><strong>Circulation History</strong> <small class="subtitle">List of all Book issuance that are complete are available in this page.</small></h2>
			<!-- </div> -->
		</div>	
	<!-- </div> -->
</header> 
<div class="main-content">
	<div class="card">
		<div class="card-body">
			<label class="fs-18 fw-500">Filter by date issued</label>
            <div class="form-row">  
                <div class="form-group col-md-5 col-sm-12" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                    <label>From</label>
                    <input class="form-control" type="text" id="range-issue-from" name="range-issue-from" placeholder="">
                </div>

                <div class="form-group col-md-5 col-sm-12" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                    <label>To</label>
                    <input class="form-control" type="text" id="range-issue-to" name="range-issue-to" placeholder="">
                </div>

                <div class="col-md-2 col-sm-12 dash-filter" style="margin-bottom: 30px;">
                    <label>&nbsp;</label>
                    <button class="btn btn-block btn-info" id="filter" onclick="Circulation.filter()">Filter</button>
                </div>
            </div>
			<div id="table-container" class="table-responsive">
				<table id = "circulation-history-table" class="table table-responsive table-striped table-bordered display nowrap r1 r3 r4 r9" style="width:100%; overflow-x:auto;" cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("Circulation/GenerateTableHistory") ?>">
					<thead>
						<tr class="bg-info">
							<th>Issue no.</th>	
							<th>Borrower</th>	
							<th>Accession Number</th>
							<th>Title</th>									
							<th>Authors</th>									
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
<?php include("_Circulation_Modal.php"); ?>
<script>
	$(document).ready(function () {
		Circulation.init();
	});

	var Circulation = {

		recall: function(id){
			$.ajax({
				url: "<?php echo base_url('Circulation/Recall/'); ?>" + id,
				success: function(){
					swal("Book has been recalled", "The patron will be notified", "success");
					Circulation.reset();
				},
				error: function(){
					swal("Oops!", "Something went wrong", "error");
				}
			});
		},

		unrecall: function(id){
			$.ajax({
				url: "<?php echo base_url('Circulation/Unrecall/'); ?>" + id,
				success: function(){
					swal("Book has been unrecalled", "The patron will be notified", "success");
					Circulation.reset();
				},
				error: function(){
					swal("Oops!", "Something went wrong", "error");
				}
			});
		},


		init: function () {
			$('.modal').on('hidden.bs.modal', function () {
				Circulation.reset();
			});

			Circulation.reset();
		},

		reset: function () {
			$('#circulation-history-table').DataTable().ajax.reload();
		},

		filter: function(){
			var url = "<?php echo base_url("Circulation/GenerateTableHistory/") ?>";            
            if($('#range-issue-from').val() != '' && $('#range-issue-to').val() != ''){                
                url = "<?php echo base_url("Circulation/GenerateTableHistory/") ?>" + $('#range-issue-from').val() + '/' + $('#range-issue-to').val();				
            }			
            $('#table-container').empty().html(                
                '<div class="table-responsive">' + 
                    '<table id="circulation-history-table" class="table table-responsive table-striped table-bordered display nowrap" style="width:100%; overflow-x:auto;" cellspacing="0" data-provide = "datatables" data-ajax = "' + url + '">' + 
                        '<thead>' +
                            '<tr class="bg-info">' + 
								"<th>Issue no.</th>" +
								"<th>Borrower</th>" +
								"<th>Accession Number</th>" +
								"<th>Title</th>" +
								"<th>Authors</th>" +
								"<th>Date Issued</th>" +
								"<th>Date Due</th>" +
								"<th>Date Returned</th>" +
								"<th>Amount Payed</th>" +
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