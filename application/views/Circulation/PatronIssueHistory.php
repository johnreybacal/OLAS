<header class="header header-inverse bg-ui-general"> 
	<!-- <div class="container"> -->
		<div class="header-info">
			<!-- <div class="left"> -->
				<h2 class="header-title"><strong>Patron Issue History</strong> <small class="subtitle">List of all the books the selected patron have borrowed.</small></h2>
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
                    <button class="btn btn-block btn-info" onclick="ExportExcel('patron-issue-history-table')">Export</button>
                </div>
            </div>            
            <div class="col-12">
                <label>Patron</label>
                <select id="PatronId" name="PatronId" data-provide="selectpicker" title="Choose Patron" data-live-search="true" class="form-control show-tick"></select>
            </div>
            <div id="patron-issue-history-table-container" class="table-responsive">                
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
                url: "<?php echo base_url("Patron/GetAll"); ?>",
                success: function(i){
                    i = JSON.parse(i);                                        
                    $('#PatronId').empty();
                    $.each(i, function(index, data){                        
                        $('#PatronId').append('<option value = "' + data.PatronId + '">' + data.LastName + ', ' + data.FirstName + '</option>');
                    })
                    $('#PatronId').selectpicker('refresh');
                }
            })
            $('#PatronId').change(function(){
                Dashboard.patronIssueHistory();
            });
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
        },

        filter: function(){          
            Dashboard.patronIssueHistory();            
        },   

        patronIssueHistory: function(){
            var patronId = $('#PatronId').selectpicker('val');
            var url = "<?php echo base_url("Report/GenerateTablePatronIssueHistory/") ?>" + patronId;
            var text = '';
            if($('#range-dashboard-from').val() != '' && $('#range-dashboard-to').val() != ''){
                text = '<h4>Books the patron borrowed in the time period</h4>';
                url = "<?php echo base_url("Report/GenerateTablePatronIssueHistory/") ?>" + patronId + '/' + $('#range-dashboard-from').val() + '/' + $('#range-dashboard-to').val();
            }
            $('#patron-issue-history-table-container').html(
                text + 
                '<div class="table-responsive">' + 
                    '<table id="patron-issue-history-table" class="table table-responsive table-striped table-bordered display nowrap" style="width:100%; overflow-x:auto;" cellspacing="0" data-provide = "datatables" data-ajax = "' + url + '">' + 
                        '<thead>' +
                            '<tr class="bg-info">' + 
                                '<th>Accession Number</th>' + 
                                '<th>Title</th>' +						                                
                                '<th>Authors</th>' +
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