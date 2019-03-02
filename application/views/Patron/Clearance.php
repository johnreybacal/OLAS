<header class="header header-inverse bg-ui-general"> 
		<div class="header-info">
				<h2 class="header-title"><strong>Clearance</strong> <small class="subtitle">List of all Patrons that needs clearance.</small></h2>
		</div>
</header>
<div class="main-content">
	<div class="card">
		<div class="card-body">
			<div class="col-md-2 col-sm-12" style="margin-bottom: 30px; float: right;">
				<label>&nbsp;</label>
				<button class="btn btn-block btn-info" onclick="ExportExcel('patron-clearance-table')">Export</button>
			</div>
			<div class="table-responsive">
				<table id="patron-clearance-table" class="table table-striped table-bordered display nowrap r3" style="width:100%; overflow-x:auto;" cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("Patron/GenerateTableClearance") ?>">
					<thead>
						<tr class="bg-info">							
							<th>Name</th>							
							<th>Book</th>
							<th>Amount to pay</th>							
							<th></th>
						</tr>
					</thead>
				</table>            			
			</div>
		</div>
	</div>
</div>

<script>
	// var $window = $(window);

 //                $window.resize(function resize() {
 //                    if ($window.width() > 768) {
 //                        $('#book-table').removeClass('table-responsive');
 //                    }
 //                    else{
 //                        $('#book-table').addClass('table-responsive');  
 //                    }

 //                    //$html.addClass('mobile');
 //                    //$html.removeClass('mobile');
 //                }).trigger('resize');
    var Clearance = {
        clear: function(penaltyId){
            $.ajax({
                url: "<?php echo base_url('Patron/Clear/'); ?>" + penaltyId,
                success: function(){
                    swal("Cleared!", "This penalty is cleared", "success");
                    $('#patron-clearance-table').DataTable().ajax.reload();
                }, 
                error: function(){
                    swal("Oops!", "something went wrong", "error");
                }
            });          
        }
    }
</script>