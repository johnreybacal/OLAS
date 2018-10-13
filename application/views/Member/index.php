<header class="header header-inverse bg-ui-general"> <!--header-inverse para madilim bg-ui-general-->
<div class="container">
	<div class="header-info">
	<div class="left">
		<br>
		<h2 class="header-title"><strong>Author</strong> <small class="subtitle">List of all Authors are available in this page.</small></h2>
	</div>
	</div>

	<div class="header-action">
	<div class="buttons">
		<!-- <a class="btn btn-primary btn-float" href="#" title="Create new book" data-provide="tooltip"><i class="ti-plus"></i></a> -->
		<a class="btn btn-float btn-lg btn-info float-md-right text-white" onclick="Member_Modal.new();"
	data-toggle="modal" data-target="#modal-member" data-provide="tooltip" data-original-title="Add Member">
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
				<table class="table table-striped table-bordered display nowrap" style="width:100%; overflow-x:auto;" cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("Member/GenerateTable") ?>">
					<thead>
						<tr>
							<th>Member ID</th>
							<th>Name</th>
							<th>Contact Number</th>
							<th>Username</th>
							<th>Member Type ID</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>            			
			</div>
		</div>
	</div>
</div>

<?php //include('/Member/Edit'); ?>

<?php include("_Member_Modal.php"); ?>

<script>
    $(document).ready(function () {
        Member.init();
    });

    var Member = {
        init: function () {
            $('.modal').on('hidden.bs.modal', function () {
                Member.reset();
            });

            Member.reset();
        },

        reset: function () {
            //$('#utilities-pantype-table').DataTable().ajax.reload();
        }
    }
</script>