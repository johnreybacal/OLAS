<header class="header header-inverse bg-ui-general"> 
	<div class="container">
		<div class="header-info">
			<div class="left">
				<h2 class="header-title"><strong>Course</strong> <small class="subtitle">List of all Course are available in this page.</small></h2>
			</div>
		</div>

		<div class="header-action">
			<div class="buttons">
				<a class="btn btn-float btn-lg btn-info float-md-right text-white" onclick="Course_Modal.new();"
			data-toggle="modal" data-target="#modal-course" data-provide="tooltip" data-original-title="Add Course">
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
				<table id = "course-table" class="table table-striped table-bordered display nowrap" style="width:100%; overflow-x:auto;" cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("Course/GenerateTable") ?>">
					<thead>
						<tr class="bg-info">
							<th>College</th>			
							<th>Course</th>
							<th>Status</th>
							<th></th>
						</tr>
					</thead>
				</table>            			
			</div>
		</div>
	</div>
</div>

<?php include("_Course_Modal.php"); ?>

<script>
    $(document).ready(function () {
        Course.init();
    });

    var Course = {
        init: function () {
            $('.modal').on('hidden.bs.modal', function () {
                Course.reset();
            });

            Course.reset();
        },

        reset: function () {
            $('#course-table').DataTable().ajax.reload();
        }
    }
</script>