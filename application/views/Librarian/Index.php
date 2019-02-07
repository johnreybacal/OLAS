<header class="header header-inverse bg-ui-general"> 
	<div class="container">
		<div class="header-info">
			<!-- <div class="left"> -->
				<h2 class="header-title"><strong>Librarian</strong> <small class="subtitle">List of all Librarian are available in this page.</small></h2>
			<!-- </div> -->
		</div>

		<div class="header-action">
			<div class="buttons">
				<a class="btn btn-float btn-lg btn-info float-md-right text-white" onclick="Librarian_Modal.new();"
			data-toggle="modal" data-target="#modal-librarian" data-provide="tooltip" data-original-title="Add Librarian">
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
				<table id="librarian-table" class="table table-striped table-bordered display nowrap" style="width:100%; overflow-x:auto;" cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("Librarian/GenerateTable") ?>">
					<thead>
						<tr class="bg-info">		
							<th>Name</th>
							<th>Username</th>
							<th>Librarian Role</th>
							<th></th>
						</tr>
					</thead>
				</table>            			
			</div>
		</div>
	</div>
</div>

<?php include("_Librarian_Modal.php");?>
<script>
	$(document).ready(function () {
        Librarian.init();
    });

    var Librarian = {
        init: function () {
            $('.modal').on('hidden.bs.modal', function () {
                Librarian.reset();
            });

            Librarian.reset();
        },

        reset: function () {
            $('#librarian-table').DataTable().ajax.reload();
        }
    }
</script>