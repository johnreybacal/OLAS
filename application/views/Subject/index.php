<header class="header header-inverse bg-ui-general">
	<!-- <div class="container"> -->
		<div class="header-info">
			<!-- <div class="left"> -->
				<h2 class="header-title"><strong>Subject</strong> <small class="subtitle">List of all Subject are available in this page.</small></h2>
			<!-- </div> -->
		</div>

		<div class="header-action">
			<div class="buttons">
				<a class="btn btn-float btn-lg btn-info float-md-right text-white" onclick="Subject_Modal.new();"
			data-toggle="modal" data-target="#modal-subject" data-provide="tooltip" data-original-title="Add Subject">
				<i class="ti-plus"></i>
				</a>
			</div>
		</div>
	<!-- </div> -->
</header>

<div class="main-content">
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<table id = "subject-table" class="table table-striped table-bordered display nowrap" style="width:100%; overflow-x:auto;" cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("Subject/GenerateTable") ?>">
					<thead>
						<tr class="bg-info">
							<th>Subject</th>
							<th>Course</th>
							<th>College</th>
							<th>Status</th>
							<th></th>
						</tr>
					</thead>
				</table>            			
			</div>
		</div>
	</div>
</div>

<?php include("_Subject_Modal.php"); ?>

<script>
    $(document).ready(function () {
        Subject.init();
    });

    var Subject = {
        init: function () {
            $('.modal').on('hidden.bs.modal', function () {
                Subject.reset();
            });

            Subject.reset();
        },

        reset: function () {
            $('#subject-table').DataTable().ajax.reload();
        }
    }
</script>