<header class="header header-inverse bg-ui-general"> 
	<div class="container">
		<div class="header-info">
		<div class="left">
			<br>
			<h2 class="header-title"><strong>Circulation</strong> <small class="subtitle">List of all Books that are currently issued are available in this page.</small></h2>
		</div>
		</div>	
		<div class="header-action">
		<div class="buttons">
			<a class="btn btn-float btn-lg btn-info float-md-right text-white" onclick="Circulation_Modal.new();"
		data-toggle="modal" data-target="#modal-Patron" data-provide="tooltip" data-original-title="Manually Issue an unreserved book">
			<i class="ti-plus"></i>
			</a>
		</div>
		</div>
	</div>
</header> 
<div class="main-content">
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<table id = "circulation-issued-table" class="table table-responsive table-striped table-bordered display nowrap" style="width:100%; overflow-x:auto;" cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("Circulation/GenerateTableIssued") ?>">
					<thead>
						<tr class="bg-info">
							<th>Issue no.</th>	
							<th>Borrower</th>	
							<th>Accession Number</th>
							<th>ISBN</th>									
							<th>Book Issued</th>									
							<th>Date Issued</th>
							<th>Date Due</th>							
							<th></th>
							<th></th>
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
			$('#circulation-issued-table').DataTable().ajax.reload();
		}
	}
</script>