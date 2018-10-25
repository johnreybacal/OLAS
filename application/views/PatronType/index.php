

<header class="header header-inverse bg-ui-general"> <!--header-inverse para madilim bg-ui-general-->
<div class="container">
	<div class="header-info">
	<div class="left">
		<br>
		<h2 class="header-title"><strong>Patron Type</strong> <small class="subtitle">List of all Patron Type are available in this page.</small></h2>
	</div>
	</div>

	<div class="header-action">
	<div class="buttons">
		<!-- <a class="btn btn-primary btn-float" href="#" title="Create new book" data-provide="tooltip"><i class="ti-plus"></i></a> -->
		<a class="btn btn-float btn-lg btn-info float-md-right text-white" onclick="PatronType_Modal.new();"
	data-toggle="modal" data-target="#modal-patrontype" data-provide="tooltip" data-original-title="Add Patron Type">
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
				<table id="patrontype-table" class="table table-striped table-bordered display nowrap" style="width:100%; overflow-x:auto;" cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("PatronType/GenerateTable") ?>">
					<thead>
						<tr class="bg-info">
						<th>PatronType ID</th>			
						<th>Name</th>
						<th>Number of Books</th>
						<th>Number of Days</th>
						<th>Status</th>
						<th>Reload Reload Action Action</th>
						</tr>
					</thead>
				</table>            			
			</div>
		</div>
	</div>
</div>

<?php include("_PatronType_Modal.php"); ?>

<script>
    $(document).ready(function () {
        PatronType.init();
    });

    var PatronType = {
        init: function () {
            $('.modal').on('hidden.bs.modal', function () {
                PatronType.reset();
            });

            PatronType.reset();
        },

        reset: function () {
            $('#patrontype-table').DataTable().ajax.reload();
        }
    }
</script>