<header class="header header-inverse bg-ui-general"> <!--header-inverse para madilim bg-ui-general-->
<div class="container">
	<div class="header-info">
	<div class="left">
		<br>
		<h2 class="header-title"><strong>Librarian Role</strong> <small class="subtitle">List of all Librarian Role are available in this page.</small></h2>
	</div>
	</div>

	<div class="header-action">
	<div class="buttons">
		<!-- <a class="btn btn-primary btn-float" href="#" title="Create new book" data-provide="tooltip"><i class="ti-plus"></i></a> -->
		<a class="btn btn-float btn-lg btn-info float-md-right text-white" onclick="LibrarianRole_Modal.new();"
	data-toggle="modal" data-target="#modal-librarianrole" data-provide="tooltip" data-original-title="Add Librarian Role">
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
				<table id="librarianrole-table" class="table table-striped table-bordered display nowrap" style="width:100%; overflow-x:auto;" cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("LibrarianRole/GenerateTable") ?>">
					<thead>
						<tr class="bg-info">
							<th>LibrarianRole ID</th>
							<th>Name</th>
							<th>Status</th>
							<th></th>
						</tr>
					</thead>
				</table>            			
			</div>
		</div>
	</div>
</div>

<?php include("_LibrarianRole_Modal.php"); ?>

<script>
    $(document).ready(function () {
        LibrarianRole.init();
    });

    var LibrarianRole = {
        init: function () {
            $('.modal').on('hidden.bs.modal', function () {
                LibrarianRole.reset();
            });

            LibrarianRole.reset();
        },

        reset: function () {
            $('#librarianrole-table').DataTable().ajax.reload();
        }
    }
</script>