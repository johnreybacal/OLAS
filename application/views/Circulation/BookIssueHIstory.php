<header class="header header-inverse bg-ui-general"> 
	<!-- <div class="container"> -->
		<div class="header-info">
			<!-- <div class="left"> -->
				<h2 class="header-title"><strong>Book Issue History</strong> <small class="subtitle">List of all the patrons who borrowed the selected book.</small></h2>
			<!-- </div> -->
		</div>	
	<!-- </div> -->
</header> 
<div class="main-content">
	<div class="card">
        <div class="card-body">
            <label class="fs-18 fw-500">Report date range</label>
            <div class="form-row">  
                <div class="form-group col-md-4 col-sm-12" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                    <label>From</label>
                    <input class="form-control" type="text" id="range-dashboard-from" name="range-dashboard-from" placeholder="">
                </div>

                <div class="form-group col-md-4 col-sm-12" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                    <label>To</label>
                    <input class="form-control" type="text" id="range-dashboard-to" name="range-dashboard-to" placeholder="">
                </div>

                <div class="col-md-2 col-sm-12 dash-filter" style="margin-bottom: 30px;">
                    <label>&nbsp;</label>
                    <button class="btn btn-block btn-info" id="dashboard-filter" onclick="Dashboard.filter()">Filter</button>
                </div>

                <div class="col-md-2 col-sm-12" style="margin-bottom: 30px;">
                    <label>&nbsp;</label>
                    <button class="btn btn-block btn-info" onclick="ExportExcel('book-issue-history-table')">Export</button>
                </div>
            </div>            
            <div class="row">
                <div class="col-4">
                    <label>Title</label>
                    <select id="ISBN" name="ISBN" data-provide="selectpicker" title="Choose Book" data-live-search="true" class="form-control show-tick"></select>
                </div>
                <div class="col-4">
                    <label>Accession Number</label>
                    <select id="AccessionNumber" name="Accession Number" data-provide="selectpicker" title="Choose an Accession Number" data-live-search="true" class="form-control show-tick"></select>
                </div>
                <div class="col-4">
                    <label>Filter by patron type</label>
                    <select id="PatronTypeId" name="Patron type" data-provide="selectpicker" title="Choose Patron type" data-live-search="true" class="form-control show-tick"></select>
                </div>
            </div>
            <div id="book-issue-history-table-container" class="table-responsive">                
            </div>
        </div>
	</div>
</div>

<script>
    $(document).ready(function(){
        Dashboard.init();
    });

    var Dashboard = {
        init: function(){            
            $.ajax({
                url: "<?php echo base_url("Book/GetAll"); ?>",
                success: function(i){
                    i = JSON.parse(i);                                        
                    $('#ISBN').empty();
                    $.each(i, function(index, data){                        
                        $('#ISBN').append('<option value = "' + data.ISBN + '">' + data.ISBN + ' | ' + data.Title + '</option>');
                    })
                    $('#ISBN').selectpicker('refresh');
                }
            })
            $('#ISBN').change(function(){
                $.ajax({
                    url: "<?php echo base_url('Book/GetCatalogueByISBN/'); ?>" + $(this).selectpicker('val'),
                    success: function(i){
                        i = JSON.parse(i);                                        
                        $('#AccessionNumber').empty();
                        $.each(i, function(index, data){                        
                            $('#AccessionNumber').append('<option value = "' + data.AccessionNumber + '">' + data.AccessionNumber + '</option>');
                        })
                        $('#AccessionNumber').selectpicker('refresh');
                    }
                });
            });
            $('#AccessionNumber').change(function(){
                Dashboard.bookIssueHistory();
            });
            $.ajax({
                url: "<?php echo base_url("PatronType/GetAll"); ?>",
                success: function(i){
                    i = JSON.parse(i);                                        
                    $('#PatronTypeId').empty();
                    $.each(i, function(index, data){                        
                        $('#PatronTypeId').append('<option value = "' + data.PatronTypeId + '">' + data.Name + '</option>');
                    })
                    $('#PatronTypeId').selectpicker('refresh');
                }
            })
            $('#PatronTypeId').change(function(){
                Dashboard.bookIssueHistory();
            });            
        },

        filter: function(){          
            Dashboard.bookIssueHistory();            
        },   

        bookIssueHistory: function(){
            var accessionNumber = $('#AccessionNumber').selectpicker('val');
            var patronTypeId = 0;
            if($('#PatronTypeId').selectpicker('val') >= 1){
                patronTypeId = $('#PatronTypeId').selectpicker('val');
            }
            var url = "<?php echo base_url("Report/GenerateTableBookIssueHistory/") ?>" + accessionNumber + '/' + patronTypeId;
            var text = '';
            if($('#range-dashboard-from').val() != '' && $('#range-dashboard-to').val() != ''){
                text = '<h4>Patrons who borrowed this book in the time period</h4>';
                url = "<?php echo base_url("Report/GenerateTableBookIssueHistory/") ?>" + accessionNumber + '/' + patronTypeId + '/' + $('#range-dashboard-from').val() + '/' + $('#range-dashboard-to').val();
            }
            $('#book-issue-history-table-container').html(
                text + 
                '<div class="table-responsive">' + 
                    '<table id="book-issue-history-table" class="table table-responsive table-striped table-bordered display nowrap" style="width:100%; overflow-x:auto;" cellspacing="0" data-provide = "datatables" data-ajax = "' + url + '">' + 
                        '<thead>' +
                            '<tr class="bg-info">' + 
                                '<th>Patron Name</th>' + 
                                '<th>Patron Type</th>' +
                                '<th>Date Borrowed</th>' +
                                '<th>Date Due</th>' +
                                '<th>Date Returned</th>' +
                                '<th>Penalty</th>'	+						
                                '<th>Status</th>'	+						
                            '</tr>' +
                        '</thead>' + 
                    '</table>' +              
                '</div>'
            );
        }

    };
</script>