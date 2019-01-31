<div class="main-content">
	<div class="card">
		<div class="card-body">        
            <div id="table-responsive" class="table-responsive">
                <table id="uncatalogued-table" class="table table-striped table-bordered display nowrap r1" style="width:100%; overflow-x:auto;" cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("Book/GenerateTableUncatalogued") ?>">
                    <thead>
                        <tr class="bg-info">
                            <td>ISBN</td>
                            <td>Title</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    var Uncatalogued = {

        add: function(id){
            $.ajax({
                url: "<?php echo base_url('Book/SetFlashdata'); ?>",
                type: "POST",
                data: {MarcImportId: id},
                success: function(i){
                    window.location.href = "<?php echo base_url('Book/Add'); ?>";
                    // console.log(i);
                }
            });
        },

        discard: function(id){
            $.ajax({
                url: "<?php echo base_url('Book/DiscardUncatalogued'); ?>",
                type: "POST",
                data: {MarcImportId: id},
                success: function(){
                    $('#uncatalogued-table').DataTable().ajax.reload();
                }
            });
        }

    };
</script>