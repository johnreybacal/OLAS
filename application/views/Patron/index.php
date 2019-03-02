<header class="header header-inverse bg-ui-general"> 
	<!-- <div class="container"> -->
		<div class="header-info">
			<!-- <div class="left"> -->
				<h2 class="header-title"><strong>Patron</strong> <small class="subtitle">List of all Patrons are available in this page.</small></h2>
			<!-- </div> -->
		</div>

		<div class="header-action">
			<div class="buttons">
				<a class="btn btn-float btn-lg btn-info float-md-right text-white" href="<?php echo base_url('Patron/Add') ?>">
				<i class="ti-plus"></i>
				</a>
			</div>
		</div>
	<!-- </div> -->
</header>
<div class="main-content">
	<div class="card">
		<!-- <div class="card-title"> -->
		<!-- </div> -->
		<div class="card-body">
			<div class="col-md-2 col-sm-12" style="margin-bottom: 30px; float: right;">
				<label>&nbsp;</label>
				<button class="btn btn-block btn-info" onclick="ExportExcel('patron-table')">Export</button>
			</div>
			<div class="table-responsive">
				<table id="patron-table" class="table table-striped table-bordered display nowrap r3" style="width:100%; overflow-x:auto;" cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("Patron/GenerateTable") ?>">
					<thead>
						<tr class="bg-info">							
							<th>Name</th>
							<th>Patron Type </th>
							<th>Contact Number</th>
							<th>Email</th>
							<th>Clearance</th>
							<th></th>
						</tr>
					</thead>
				</table>            			
			</div>
		</div>
	</div>
</div>

<?php include("_Patron_Modal.php"); ?>

<script>
    $(document).ready(function () {
        Patron.init();
    });

    var Patron = {
        init: function () {
            $('.modal').on('hidden.bs.modal', function () {
                Patron.reset();
            });

            Patron.reset();
        },

        reset: function () {
            $('#patron-table').DataTable().ajax.reload();
        }
    }
</script>