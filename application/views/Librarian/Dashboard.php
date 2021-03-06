<!-- <?php 
    if(strToLower(uri_string()) != 'librarian/login'){
        include(base_url('application/views/include/Breadcrumbs.php'));
    }
?> -->
<div class="main-content">
	<div class="card">
        <div class="card-body">
            <!-- <label class="fs-18 fw-500">Reports</label> -->
            <!-- <label class="fs-18 fw-500">Report Date Range</label> -->
            <div class="form-row">
    <!-- Start of Date Picker 1 -->
            <!-- <label>Report date range</label> -->
                <!-- <div data-provide="datepicker" data-date-format="yyyy-mm-dd"> -->
                    <!-- <div class="form-group col-md-5 col-sm-12" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                        <label>From</label>
                        <input class="form-control" type="text" id="range-dashboard-from" name="range-dashboard-from" placeholder="">
                    </div>
                    <div class="form-group col-md-5 col-sm-12" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                        <label>To</label>
                        <input class="form-control" type="text" id="range-dashboard-to" name="range-dashboard-to" placeholder="">
                    </div>
                    <div class="col-md-2 col-sm-12" style="margin-bottom: 30px;">
                        <label>&nbsp;</label>
                        <button class="btn btn-block btn-info" onclick="Dashboard.filter()">Filter</button>
                    </div> -->
                <!-- </div> -->
    <!-- End of Date Picker 1 -->
    <!-- Start of Date Picker 2 -->
                 <!-- <div class="form-group col-md-5 col-sm-12" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                    <label>From</label>
                    <input class="form-control" type="text" id="range-dashboard-from" name="range-dashboard-from" placeholder="">
                </div>

                <div class="form-group col-md-5 col-sm-12" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                    <label>To</label>
                    <input class="form-control" type="text" id="range-dashboard-to" name="range-dashboard-to" placeholder="">
                </div>

                <div class="col-md-2 col-sm-12 dash-filter" style="margin-bottom: 30px;">
                    <label>&nbsp;</label>
                    <button class="btn btn-block btn-info" id="dashboard-filter" onclick="Dashboard.filter()">Filter</button>
                </div> -->
            </div>
    <!-- End of Date Picker 2 -->
    <!-- Start of Date Picker 3 -->
           <!-- GROUP-APPEND TYPE DATE PICKER DO NOT DELETE -->
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-">
                        <label class="fs-18 fw-500">Report Date Range</label>
                        <div class="form-row mb-3">
                            <div class="input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">From</span>
                                </div>
                                <input id="range-dashboard-from" type="text" class="form-control date-dashboard-range date-range">
                                <div class="input-group-prepend input-group-append">
                                    <span class="input-group-text">To</span>
                                </div>
                                <input id="range-dashboard-to" type="text" class="form-control date-dashboard-range date-range">
                                <button class="btn btn-info filter" id="dashboard-filter" onclick="Dashboard.filter()">Filter</button>                
                            </div>      
                        </div>
                    </div>
                </div>
            </div>
    <!-- End of Date Picker 3 -->
            <div class="row">
          <!-- 1 -->
            <div class="col-md-6 col-xl-4">
                <div class="card card-body bg-yellow">
                    <div class="flexbox">
                        <span class="fa fa-book fs-40"></span>
                        <span id="total-books" class="fs-40 fw-100"><?php echo $totalBooks; ?></span>
                    </div>
                    <div class="text-right text-uppercase">Total Books</div>
                </div>
            </div>
          <!-- 2 -->
            <div class="col-md-6 col-xl-4">
                <div class="card card-body bg-primary">
                    <div class="flexbox">
                        <span class="fa fa-book fs-40"></span>
                        <span id="total-books-acquired" class="fs-40 fw-100"><?php echo $totalBooksAcquired; ?></span>
                    </div>
                    <div class="text-right text-uppercase">Total Books Acquired</div>
                </div>
            </div>
          <!-- 3 -->
            <div class="col-md-6 col-xl-4">
                <div class="card card-body bg-danger">
                    <div class="flexbox">
                        <span class="fa fa-book fs-40"></span>
                        <span id="total-book-circulations" class="fs-40 fw-100"><?php echo $totalBookCirculations; ?></span>
                    </div>
                    <div class="text-right text-uppercase">Book Circulation</div>
                </div>
            </div>
          <!-- 4 -->
            <div class="col-md-6 col-xl-4">
                <div class="card card-body bg-success">
                    <div class="flexbox">
                        <span class="pe-7s-users fs-40"></span>
                        <span id="total-patrons" class="fs-40 fw-100"><?php echo $totalPatrons; ?></span>
                    </div>
                    <div class="text-right text-uppercase">Patrons</div>
                </div>
            </div>
          <!-- 5 -->
            <div class="col-md-6 col-xl-4">
                <div class="card card-body bg-purple">
                    <div class="flexbox">
                        <span class="pe-7s-users fs-40"></span>
                        <span id="total-patrons-registered" class="fs-40 fw-100"><?php echo $totalPatrons; ?></span>
                    </div>
                    <div class="text-right text-uppercase">Patrons Registered</div>
                </div>
            </div>
          <!-- 6 -->
            <div class="col-md-6 col-xl-4">
                <div class="card card-body bg-warning">
                    <div class="flexbox">
                        <span class="pe-7s-users fs-40"></span>
                        <span id="total-outside-researchers" class="fs-40 fw-100"><?php echo $totalOutsideResearchers; ?></span>
                    </div>
                    <div class="text-right text-uppercase">Outside Researcher</div>
                </div>
            </div>
                <!-- <div class="col-md-4 col-lg-4 col-xlg-4">
                    <div class="card">
                        <div class="small-box bg-yellow text-center">
                            <h1 id="total-books" class="text-thin text-white"><?php echo $totalBooks; ?></h1>
                            <h6 class="text-white text-uppercase text-bold mb-0">Total Books</h6>
                            <span class="text-white text-thin text-uppercase text-sm">&nbsp;</span>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 col-lg-4 col-xlg-4">
                    <div class="card">
                        <div class="small-box bg-info text-center">
                            <h1 id="total-books-acquired" class="text-thin text-white"><?php echo $totalBooksAcquired; ?></h1>
                            <h6 class="text-white text-uppercase text-bold mb-0">Total Books Acquired</h6>
                            <span class="text-white text-thin text-uppercase text-sm">&nbsp;</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-4 col-xlg-4">
                    <div class="card">
                        <div class="small-box bg-danger text-center">
                            <h1 id="total-book-circulations" class="text-thin text-white"><?php echo $totalBookCirculations; ?></h1>
                            <h6 class="text-white text-uppercase text-bold mb-0">Book Circulation</h6>
                            <span class="text-white text-thin text-uppercase text-sm">&nbsp;</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-4 col-xlg-4">
                    <div class="card">
                        <div class="small-box bg-success text-center">
                            <h1 id="total-patrons" class="text-thin text-white"><?php echo $totalPatrons; ?></h1>
                            <h6 class="text-white text-uppercase text-bold mb-0">Patrons</h6>
                            <span class="text-white text-thin text-uppercase text-sm">&nbsp;</span>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 col-lg-4 col-xlg-4">
                    <div class="card">
                        <div class="small-box bg-purple text-center">
                            <h1 id="total-patrons-registered" class="text-thin text-white"><?php echo $totalPatrons; ?></h1>
                            <h6 class="text-white text-uppercase text-bold mb-0">Patrons Registered</h6>
                            <span class="text-white text-thin text-uppercase text-sm">&nbsp;</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-4 col-xlg-4">
                    <div class="card">
                        <div class="small-box bg-warning text-center">
                            <h1 id="total-outside-researchers" class="text-thin text-white"><?php echo $totalOutsideResearchers; ?></h1>
                            <h6 class="text-white text-uppercase text-bold mb-0">Outside Researchers</h6>
                            <span class="text-white text-thin text-uppercase text-sm">&nbsp;</span>
                        </div>
                    </div>
                </div> -->

            </div>
            <div id="book-table-container" class="table-responsive">                            
                <table id="book-table" class="table table-striped table-bordered display nowrap r1 r2 r3" style="width:100%; overflow-x:auto;" cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("Report/GenerateTable") ?>">
					<thead>
						<tr class="bg-info">
							<th>Accession Number</th>
							<th>Call Number</th>
							<th>ISBN</th>
							<th>Title</th>							
							<th>Date Acquired</th>
							<th>Acquired From</th>							
						</tr>
					</thead>
				</table>                          
            </div>            
        </div>
	</div>
</div>
<script>
    $(document).ready(function(){
        $(function () {
            //disables filter button
            $('#dashboard-filter').prop('disabled', 'disabled').attr('title','Select Date').css('cursor','auto');
        });

        $('#range-dashboard-from').change(function () {
            //enables filter button
            $('#dashboard-filter').prop('disabled', !$(this).val()).attr('title','').css('cursor','pointer');
        });
    });
    

    var Dashboard = {        

        filter: function(){
            if($('#range-dashboard-from').val() != null && $('#range-dashboard-to').val() != null){                
                $.ajax({
                    url: "<?php echo base_url('Report/Filter'); ?>",
                    type: "POST",
                    data: {
                        "filter":{
                            "DateFrom": $('#range-dashboard-from').val(),
                            "DateTo": $('#range-dashboard-to').val()
                        }
                    },
                    success: function(i){
                        i = JSON.parse(i);  
                        $('#total-books').html(i.totalBooks);
                        $('#total-books-acquired').html(i.totalBooksAcquired);
                        $('#total-book-circulations').html(i.totalBookCirculations);
                        $('#total-patrons').html(i.totalPatrons);
                        $('#total-patrons-registered').html(i.patronsRegistered);
                        $('#total-outside-researchers').html(i.totalOutsideResearchers);
                        Dashboard.resetTable(true);
                    }
                })
            }
        },

        resetTable: function(filtered){
            var url = "<?php echo base_url("Report/GenerateTable") ?>";
            var text = '';
            if(filtered){
                text = '<h4>Books acquired in the time period</h4>';
                url = "<?php echo base_url("Report/GenerateTableFiltered") ?>/" + $('#range-dashboard-from').val() + '/' + $('#range-dashboard-to').val();
            }
            $('#book-table-container').html(
                text + 
                '<div class="table-responsive">' + 
                    '<table id="book-table" class="table table-responsive table-striped table-bordered display nowrap" style="width:100%; overflow-x:auto;" cellspacing="0" data-provide = "datatables" data-ajax = "' + url + '">' + 
                        '<thead>' +
                            '<tr class="bg-info">' + 
                                '<th>Accession Number</th>' + 
                                '<th>Call Number</th>' +
                                '<th>ISBN</th>' +
                                '<th>Title</th>' +						
                                '<th>Date Acquired</th>' +
                                '<th>Acquired From</th>'	+						
                            '</tr>' +
                        '</thead>' + 
                    '</table>' +              
                '</div>'
            )
            //need i call sa lahat ng table
            var $window = $(window);

                $window.resize(function resize() {
                    if ($window.width() > 768) {
                        $('#book-table').removeClass('table-responsive');
                    }
                    else{
                        $('#book-table').addClass('table-responsive');  
                    }

                    //$html.addClass('mobile');
                    //$html.removeClass('mobile');
                }).trigger('resize');
        },       
      
    };
</script>