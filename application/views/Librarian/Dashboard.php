<div class="main-content">
	<div class="card">
        <div class="card-body">
            <div class="row">

                <div class="col-md-3 col-lg-3 col-xlg-3">
                    <div class="card">
                        <div class="small-box bg-info text-center">
                            <h1 class="text-thin text-white"><?php echo $totalBooks; ?></h1>
                            <h6 class="text-white text-uppercase text-bold mb-0">Total Books</h6>
                            <span class="text-white text-thin text-uppercase text-sm">&nbsp;</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-lg-3 col-xlg-3">
                    <div class="card">
                        <div class="small-box bg-danger text-center">
                            <h1 class="text-thin text-white"><?php echo $totalBookCirculations; ?></h1>
                            <h6 class="text-white text-uppercase text-bold mb-0">Book Circulation</h6>
                            <span class="text-white text-thin text-uppercase text-sm">&nbsp;</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-lg-3 col-xlg-3">
                    <div class="card">
                        <div class="small-box bg-success text-center">
                            <h1 class="text-thin text-white"><?php echo $totalPatrons; ?></h1>
                            <h6 class="text-white text-uppercase text-bold mb-0">Patrons</h6>
                            <span class="text-white text-thin text-uppercase text-sm">&nbsp;</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-lg-3 col-xlg-3">
                    <div class="card">
                        <div class="small-box bg-warning text-center">
                            <h1 class="text-thin text-white"><?php echo $totalOutsideResearchers; ?></h1>
                            <h6 class="text-white text-uppercase text-bold mb-0">Outside Researchers</h6>
                            <span class="text-white text-thin text-uppercase text-sm">&nbsp;</span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="table-responsive">                            
                </table><table class="table table-striped table-bordered display nowrap" style="width:100%; overflow-x:auto;" cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("Book/GenerateTableComplete") ?>">
					<thead>
						<tr class="bg-info">
							<th>Accession Number</th>
							<th>Call Number</th>
							<th>ISBN</th>
							<th>Title</th>
							<th>Author</th>			
							<th>Genre</th>
							<th>Publisher</th>
							<th>Series</th>
							<th>Edition</th>
							<th>Subject</th>
							<th>Course</th>
							<th>College</th>
							<th>Date Acquired</th>
							<th>Acquired From</th>							
						</tr>
					</thead>
				</table>          
                <text>Current Workforce: 359 Max. Workforce:1396</text>
                <small style="line-height:10px">*The data shown here reflects current Employee status and not historical active manpower data</small>
            </div>
        </div>
	</div>
</div>