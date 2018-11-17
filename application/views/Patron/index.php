	<!--header-inverse para madilim bg-ui-general-->
<header class="header header-inverse bg-ui-general"> 
<div class="container">
	<div class="header-info">
	<div class="left">
		<br>
		<h2 class="header-title"><strong>Patron</strong> <small class="subtitle">List of all Patrons are available in this page.</small></h2>
	</div>
	</div>

	<div class="header-action">
	<div class="buttons">
		<a class="btn btn-float btn-lg btn-info float-md-right text-white" onclick="Patron_Modal.new();"
	data-toggle="modal" data-target="#modal-Patron" data-provide="tooltip" data-original-title="Add Patron">
		<i class="ti-plus"></i>
		</a>
	</div>
	</div>
</div>
</header>
<!--/.header -->
<div class="main-content">
	<div class="card">
		<!-- <div class="card-title bl-3 border-info"> -->
		<div class="card-title">
			<!-- <h4>Patron</h4> -->
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table id="patron-table" class="table table-striped table-bordered display nowrap" style="width:100%; overflow-x:auto;" cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("Patron/GenerateTable") ?>">
					<thead>
						<tr class="bg-info">							
							<th>Name</th>
							<th>Patron Type </th>
							<th>Contact Number</th>
							<th>Email</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>            			
			</div>
		</div>
	</div>
</div>

<!-- <div class="fab fab-fixed">
    <button class="btn btn-float btn-lg btn-info float-md-right" id="fab-button" 
            onclick="Patron_Modal.new();" data-toggle="modal" 
            data-target="#modal-" data-provide="tooltip" data-original-title="Add Patron">
    <i class="ti-plus"></i>
    </button>
</div> -->

<?php //include('/Patron/Edit'); ?>

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