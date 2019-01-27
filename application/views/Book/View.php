<div class="col-md-12" style="margin-top: 6%;">
    <div class="card card-inverse bg-img text-center py-90" style="background-image: url(<?php echo base_url("assetsOLAS/img/book/dear_universe.jpg"); ?>);" data-overlay="7">
    	<div class="card-body">
	        <h3>Title</h3>
	        <span class="bb-1 opacity-80 pb-2">Author Name</span>
	        <br><br>
	        <br><br>
	        <a class="btn btn-outline btn-bold no-radius btn-light" href="#">Add to Bookbag</a>
	    </div>
    </div>
    <div class="card">
	    <div class="card-body">
            <h4><a class="hover-primary" href="#">Short Intro</a></h4>
            <p><time>Author Optional</time></p>

            <p style="min-height: 100px; max-height: 300px;">Women growing older contend with ageism, misogyny, and loss. Yet as Mary Pipher shows, most older women are deeply happy and filled with gratitude for the gifts of life. Their struggles help them grow into the authentic, empathetic, and wise people they have always wanted to be.
            </p><p>
			In Women Rowing North, Pipher offers a timely examination of the cultural and developmental issues women face as they age. Drawing on her own experience as daughter, sister, mother, grandmother, caregiver, clinical psychologist, and cultural anthropologist, she explores ways women can cultivate resilient responses to the challenges they face. "If we can keep our wits about us, think clearly, and manage our emotions skillfully," Pipher writes, "we will experience a joyous time of our lives. If we have planned carefully and packed properly, if we have good maps and guides, the journey can be transcendent."</p>

            <!-- <div class="flexbox align-items-center mt-3">
                  <a class="btn btn-round btn-bold btn-primary" href="#">Read more</a>

                <div class="gap-items-4">
                    <a class="text-muted" href="#">
                      <i class="fa fa-heart mr-1"></i> 12
                    </a>
                    <a class="text-muted" href="#">
                      <i class="fa fa-comment mr-1"></i> 3
                    </a>
                </div>
        	</div> -->
  	    </div>
  	</div>
</div>
<!-- <div class="main-content" style="margin-top: 5%;">
	<form id="book-form">
		<div class="row">
			<div class="col-lg-12">
				<div class="card card-shadowed">

					<header class="card-header">
						<h4 class="card-title">Book <strong>Information</strong></h4>
		                <ul class="card-controls">
                  			<li>										
								<label class="switch switch-lg switch-info">
									<input readonly type="checkbox" id="IsRoomUseOnly" name="IsRoomUseOnly" <?php echo ($book->IsRoomUseOnly == 1) ? "Checked" : ""; ?> />
									<span class="switch-indicator"></span>
									<label>Room Use Only</label>
								</label>
							</li>
						</ul>
					</header>	
					<div class="card-body form-type-line">
						<div class="row">
							<div class="col-md-12">
								<div class="form-row gap-1">
									<div class="form-group col-md-12 col-sm-12">
										<label>Accession Number</label>
										<input readonly  id="AccessionNumber" value = "<?php echo $book->AccessionNumber; ?>" class="form-control" type="text" name="" placeholder="Accession Number">
									</div>
									<div class="form-group col-md-6">
										<label>ISBN</label>
										<input readonly  id="ISBN" value = "<?php echo $book->ISBN; ?>" class="form-control" type="text" name="" placeholder="ISBN">
									</div>
									<div class="form-group col-md-6">
										<label>Call Number</label>
										<input readonly id="CallNumber" value = "<?php echo $book->CallNumber; ?>" class="form-control" type="text" name="" placeholder="Call Number">
									</div>	
									<div class="form-group col-md-6">
										<label>Title</label>
										<input readonly id="Title" class="form-control" type="text" name="" placeholder="Title">
									</div>					
									<div class="form-group col-md-6">
										<label>Author</label>
										<select readonly id="AuthorId" name="Author" data-provide="selectpicker" multiple title="Choose Authors" data-live-search="true" class="form-control show-tick"Profile></select>
									</div>
									<div class="form-group col-md-6">
										<label>Genre</label>
										<select readonly id="GenreId" name="Genre" data-provide="selectpicker" multiple title="Choose Genres" data-live-search="true" class="form-control form-type-combine show-tick"></select>
									</div>
									<div class="form-group col-md-6">
										<label>Subject</label>
										<select readonly id="SubjectId" name="Subject" data-provide="selectpicker" multiple title="Choose Subjects" data-live-search="true" class="form-control form-type-combine show-tick"></select>				
									</div>
									<div class="form-group col-md-6">
										<label>Publisher</label>
										<select readonly id="PublisherId" name="Publisher" data-provide="selectpicker" title="Choose Publisher" data-live-search="true" class="form-control form-type-combine show-tick"></select>
									</div>
									<div class="form-group col-md-6">
										<label>Series</label>
										<select readonly id="SeriesId" name="Series" data-provide="selectpicker" title="Choose Series" data-live-search="true" class="form-control form-type-combine show-tick"></select>
									</div>
									<div class="form-group col-md-6">
										<label>Edition</label>
										<input readonly readonly  id="Edition" class="form-control" type="text" name="" placeholder="">
									</div>	
									<div class="form-group col-md-6">
										<label>Date Published</label>
										<input readonly  id="DatePublished" class="form-control" type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" name="" placeholder="">
									</div>				
									<div class="form-group col-md-6">
										<label>Date Acquired</label>
										<input readonly  id="DateAcquired" value = "<?php echo $book->DateAcquired; ?>" class="form-control" type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" name="" placeholder="">
									</div>
									<div class="form-group col-md-6">
										<label>Acquired from</label>
										<input readonly  id="AcquiredFrom" value = "<?php echo $book->AcquiredFrom; ?>" class="form-control" type="text" name="" placeholder="">
									</div>					
									<div class="form-group col-md-6">
										<label>Price</label>
										<input readonly id="Price" value = "<?php echo $book->Price; ?>" class="form-control" type="number" name="" placeholder="Price">
									</div>				
								</div>
							</div> 
						</div>
					</div> 					
				</div>
			</div> 
		</div> 
	</form> 
</div> -->
<script>	
	$(document).ready(function(){
		initializeSelectpicker();
		Book.init();
	});

	function initializeSelectpicker(){
		$.ajax({
			url: "<?php echo base_url('Author/GetAll'); ?>",
			async: false,
			success: function(i){
				i = JSON.parse(i);                    
				$('#AuthorId').empty();
				$.each(i, function(index, data){                        
					$('#AuthorId').append('<option value = "' + data.AuthorId + '">' + data.Name + '</option>');
				})
				$('#AuthorId').selectpicker('refresh');
			}
		});
		$.ajax({
			url: "<?php echo base_url('Genre/GetAll'); ?>",
			async: false,
			success: function(i){
				i = JSON.parse(i);                    
				$('#GenreId').empty();
				$.each(i, function(index, data){                        
					$('#GenreId').append('<option value = "' + data.GenreId + '">' + data.Name + '</option>');
				})
				$('#GenreId').selectpicker('refresh');
			}
		});
		$.ajax({
			url: "<?php echo base_url('Subject/GetAll'); ?>",
			async: false,
			success: function(i){
				i = JSON.parse(i);                    
				$('#SubjectId').empty();
				$.each(i, function(index, data){                        
					$('#SubjectId').append('<option value = "' + data.SubjectId + '">' + data.Name + '</option>');
				})
				$('#SubjectId').selectpicker('refresh');
			}
		});
		$.ajax({
			url: "<?php echo base_url('Publisher/GetAll'); ?>",
			async: false,
			success: function(i){
				i = JSON.parse(i);                    
				$('#PublisherId').empty();
				$.each(i, function(index, data){                        
					$('#PublisherId').append('<option value = "' + data.PublisherId + '">' + data.Name + '</option>');
				})
				$('#PublisherId').selectpicker('refresh');
			}
		});
		$.ajax({
			url: "<?php echo base_url('Series/GetAll'); ?>",
			async: false,
			success: function(i){
				i = JSON.parse(i);                    
				$('#SeriesId').empty();
				$.each(i, function(index, data){                        
					$('#SeriesId').append('<option value = "' + data.SeriesId + '">' + data.Name + '</option>');
				})
				$('#SeriesId').selectpicker('refresh');
			}
		});

	}

	var Book = {
        
		init: function(){
			Book.get($('#ISBN').val());			
		},

		get: function(val){
			$.ajax({
				url: "<?php echo base_url('Book/Get/'); ?>" + val,
				success: function(i){
					if(i == 0){
						Book.reset(val);
					}else{
						i = JSON.parse(i);
						$('#Title').val(i.book.Title);
						$('#PublisherId').selectpicker('val', i.book.PublisherId);
						$('#SeriesId').selectpicker('val', i.book.SeriesId);
						$('#Edition').val(i.book.Edition);
						$('#DatePublished').val(i.book.DatePublished);
						var author = [];
						$.each(i.author, function(index, data){
							author.push(data.AuthorId);
						});
						$('#AuthorId').selectpicker('val', author);
						var genre = [];
						$.each(i.genre, function(index, data){
							genre.push(data.GenreId);
						});
						$('#GenreId').selectpicker('val', genre);
						var subject = [];
						$.each(i.subject, function(index, data){
							subject.push(data.SubjectId);
						});
						$('#SubjectId').selectpicker('val', subject);
					}
				}
			});
		}
    }
</script>
