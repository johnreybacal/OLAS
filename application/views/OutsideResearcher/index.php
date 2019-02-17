<header class="header header-inverse bg-ui-general"> 
	<!-- <div class="container"> -->
		<div class="header-info">
			<!-- <div class="left"> -->
				<h2 class="header-title"><strong>Outside Researcher</strong> <small class="subtitle">List of all Outside Researchers are available in this page.</small></h2>
			<!-- </div> -->
		</div>

		<div class="header-action">
			<div class="buttons">
				<a class="btn btn-float btn-lg btn-info float-md-right text-white" onclick="OutsideResearcher_Modal.new();"
			data-toggle="modal" data-target="#modal-outsideResearcher" data-provide="tooltip" data-original-title="Add Outside Researcher">
				<i class="ti-plus"></i>
				</a>
			</div>
		</div>
	<!-- </div> -->
</header>

<div class="main-content">
	<div class="card">
		<div class="card-body">
			<div class="col-md-2 col-sm-12" style="margin-bottom: 30px;float: right;">
				<label>&nbsp;</label>
				<button class="btn btn-block btn-info" onclick="ExportExcel('outsideResearcher-table')">Export</button>
			</div>
			<div class="table-responsive">
				<table id = "outsideResearcher-table" class="table table-striped table-bordered display nowrap r4" style="width:100%; overflow-x:auto;" cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("OutsideResearcher/GenerateTable") ?>">
					<thead>
						<tr class="bg-info">
							<th>Name</th>
							<th>Subject to Research</th>
							<th>Date of admission</th>
							<th>Amout Payed</th>
							<th></th>
						</tr>
					</thead>
				</table>            			
			</div>
		</div>
	</div>
</div>
<?php include("_OutsideResearcher_Modal.php"); ?>
<script>
	$(document).ready(function () {
		OutsideResearcher.init();
	});

	var OutsideResearcher = {
		init: function () {
			$('.modal').on('hidden.bs.modal', function () {
				OutsideResearcher.reset();
			});

			OutsideResearcher.reset();
		},

		reset: function () {
			$('#outsideResearcher-table').DataTable().ajax.reload();
		}
	}
</script>