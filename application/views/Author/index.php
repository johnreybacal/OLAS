<header class="header header-inverse bg-ui-general"> 
	<div class="container">
		<div class="header-info">
			<div class="left">
				<h2 class="header-title"><strong>Author</strong> <small class="subtitle">List of all Authors are available in this page.</small></h2>
			</div>
		</div>

		<div class="header-action">
			<div class="buttons">
				<a class="btn btn-float btn-lg btn-info float-md-right text-white" onclick="Author_Modal.new();"
			data-toggle="modal" data-target="#modal-author" data-provide="tooltip" data-original-title="Add Author">
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
				<table id = "author-table" class="table table-striped table-bordered display nowrap" style="width:100%; overflow-x:auto;" cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("Author/GenerateTable") ?>">
					<thead>
						<tr class="bg-info">
							<th>Name</th>			
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>            			
			</div>
		</div>
	</div>
</div>
<?php include("_Author_Modal.php"); ?>
<script>
	$(document).ready(function () {
		Author.init();
	});

	var Author = {
		init: function () {
			$('.modal').on('hidden.bs.modal', function () {
				Author.reset();
			});

			Author.reset();
		},

		reset: function () {
			$('#author-table').DataTable().ajax.reload();
		}
	}
</script>