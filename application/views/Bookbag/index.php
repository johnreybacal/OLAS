<header class="header header-inverse bg-ui-general"> <!--header-inverse para madilim bg-ui-general-->
<div class="container">
	<div class="header-info">
	<div class="left">
		<br>
		<h2 class="header-title"><strong>Books</strong> <small class="subtitle">List of all books are available in this page.</small></h2>
	</div>
	</div>

	<div class="header-action">
	<div class="buttons">
		<!-- <a class="btn btn-primary btn-float" href="#" title="Create new book" data-provide="tooltip"><i class="ti-plus"></i></a> -->
		<a href = "<?php echo base_url('Book/Add') ?>" class="btn btn-float btn-lg btn-info float-md-right text-white" data-provide="tooltip" data-original-title="Add Book">
		<i class="ti-plus"></i>
		</a>
	</div>
	</div>
</div>
</header><!--/.header -->

<div class="main-content">
	<div class="card">
		<div class="card-body">
            <h4>OPAC</h4>
			<div class="table-responsive">
				<table class="table table-responsive table-striped table-bordered display nowrap" style="width:100%; overflow-x:auto;" cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("Book/GenerateOPAC") ?>">
					<thead>
						<tr>														
							<th>Title</th>
							<th>Author</th>			
							<th>Genre</th>							
							<th>Series</th>
							<th>Edition</th>
							<th>Subject</th>							
							<th>Call Number</th>
							<th></th>
						</tr>
					</thead>
				</table>            			
			</div>
            <h4>Bookbag</h4>
			<div class="table-responsive">
				<table id = "bookbag-table" class="table table-responsive table-striped table-bordered display nowrap" style="width:100%; overflow-x:auto;" cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("Bookbag/GenerateTable") ?>">
					<thead>
						<tr>														
							<th>Title</th>
							<th>Author</th>			
							<th>Genre</th>							
							<th>Series</th>
							<th>Edition</th>
							<th>Subject</th>							
							<th>Call Number</th>
							<th></th>
						</tr>
					</thead>
				</table>            			
			</div>
            <button onclick="Bookbag.reserve()">Reserve</button>
		</div>
	</div>
</div>

<script>
    var Bookbag = {        

        add: function(id){
            $.ajax({
                url: "<?php echo base_url('Bookbag/Add'); ?>/" + id,
                success: function(i){
                    if(i == 1){
                        swal('Bookbagged!', "Book has been added to bookbag", 'success');
                        Bookbag.reset();
                    }else{
                        swal('Bookbagged! Again?', "Book is aleady in your bookbag", 'warning');
                    }
                },
                error: function(){
                    swal('Oops!', "Something went wrong", 'error');
                }
            })
        },

        remove: function(id){
            $.ajax({
                url: "<?php echo base_url('Bookbag/Remove'); ?>/" + id,
                success: function(i){
                    swal('Unbookbagged!', "Book removed from bookbag", 'success');
                    Bookbag.reset();
                },
                error: function(){
                    swal('Oops!', "Something went wrong", 'error');
                }
            })
        },

        reset: function(){
            $('#bookbag-table').DataTable().ajax.reload();
        },        

        reserve: function(){
            $.ajax({
                url: "<?php echo base_url('Bookbag/Get'); ?>",
                success: function(i){
                    i = JSON.parse(i);
                    var ok = true;
                    $.each(i, function(index, data){
                        $.ajax({
                            url: "<?php echo base_url('Reservation/Save'); ?>",
                            type: "POST",
                            data: {"reservation": {
                                ReservationId: 0,
                                MemberId: 1,
                                AccessionNumber: data.id
                            }},
                            error: function(){
                                ok = false
                            }
                        })
                    });
                    if(ok){
                        $.ajax({
                            url: "<?php echo base_url('Bookbag/RemoveAll'); ?>",
                            success: function(i){
                                Bookbag.reset();
                            }
                        });
                    }else{
                        swal('Oops!', "Something went wrong", 'error');
                    }
                }
            });
        }

    }
</script>