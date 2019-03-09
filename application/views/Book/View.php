<!-- <div class="col-md-12" style="margin-top: 6%;">
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

  	    </div>
  	</div>
</div> -->
<div class="main-content" style="margin-top: 5%;">
	<form id="book-form" disabled="true" class="auto">
		<div class="row">
			<div class="col-lg-12">
				<div class="card card-shadowed view">

					<header class="card-header">
						<h4 class="card-title">Book <strong>Details</strong></h4>
		                <ul class="card-controls view-book">
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
							<div class="col-md-3">
								<!-- img id="image" class="img-fluid img-hov-stretchout" src="<?php echo base_url("assetsOLAS/img/book/bookdefault.jpg"); ?>" /> -->
            					<input readonly id="image" class="img-fluid img-hov-stretchout" name="image" type="file" data-provide="dropify" data-show-remove="false" data-default-file="<?php echo base_url("assetsOLAS/img/book/bookdefault.jpg"); ?>" style="border: solid black 1px; pointer-events: none; cursor: pointer;">
          					</div>
          					<!--  -->

          					<!--  -->
          					<div class="col-md-3">
	              				<div class="form-row">
									<div class="col-12">
										<h6 class="text-uppercase">Basic Information</h6>
				                		<hr class="hr-sm mb-2 border-success">
			                		</div>
									<div class="form-group col-md-12 col-sm-12">
										<label>Accession Number</label>
										<input readonly  id="AccessionNumber" value = "<?php echo $book->AccessionNumber; ?>" class="form-control" type="text" name="" placeholder="No Accession Number" style="border:none!important;">
									</div>
									<div class="form-group col-md-12">
										<label>ISBN</label>
										<input readonly  id="ISBN" value = "<?php echo $book->ISBN; ?>" class="form-control" type="text" name="" placeholder="No ISBN">
									</div>
									<div class="form-group col-md-12">
										<label>Title</label>
										<input readonly id="Title" class="form-control" type="text" name="" placeholder="No Title">
									</div>					
									<div class="form-group col-md-12">
										<label>Call Number</label>
										<!-- value = "<?php echo $book->CallNumber; ?>"  -->
										<input readonly id="CallNumber" 
										class="form-control" type="text" name="" placeholder="No Call Number">
									</div>	
									<div class="form-group col-md-12">
										<label>Author</label>
										<select readonly id="AuthorId" name="Author" data-provide="selectpicker" multiple title="No Authors" data-live-search="true" class="form-control show-tick"Profile></select>
									</div>
									<div class="form-group col-md-12">
										<label>Section</label>
										<select readonly id="SectionId" name="Section" data-provide="selectpicker" multiple title="No Sections" data-live-search="true" class="form-control form-type-combine show-tick"></select>
									</div>
									<div class="form-group col-md-12">
										<label>Subject</label>
										<select readonly id="SubjectId" name="Subject" data-provide="selectpicker" multiple title="No Subjects" data-live-search="true" class="form-control form-type-combine show-tick pe-none"></select>				
									</div>
									<div class="form-group col-md-12">
										<label>Series</label>
										<select readonly id="SeriesId" name="Series" data-provide="selectpicker" title="No Series" data-live-search="true" class="form-control form-type-combine show-tick"></select>
									</div>
									<div class="form-group col-md-12">
										<label>Edition</label>
										<input readonly readonly  id="Edition" class="form-control" type="text" name="" placeholder="No Edition">
									</div>
								</div>
							</div>	
							<div class="divider divider-vertical"></div>
							<div class="col-md-5">
								<div class="row">
									<div class="col-12">
										<h6 class="text-uppercase">Publication Information</h6>
				                		<hr class="hr-sm mb-2 border-success">
			                		</div>	
									<div class="form-group col-md-8">
										<label>Place of Publication</label>
										<input readonly id="PlacePublished" value = "" class="form-control" type="text" name="" placeholder="No Place of Publication">
									</div>			
									<div class="form-group col-md-6">
										<label>Publisher</label>
										<select readonly id="PublisherId" name="Publisher" data-provide="selectpicker" title="No Publisher" data-live-search="true" class="form-control form-type-combine show-tick" disabled="true" class="auto"></select>
									</div>
									<div class="form-group col-md-6">
										<label>Date Published</label>
										<input readonly  id="DatePublished" class="form-control" type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" name="" placeholder="No Date Acquired">
									</div>	
									<div class="col-12">
										<h6 class="text-uppercase">Acquisition Information</h6>
				                		<hr class="hr-sm mb-2 border-success">
			                		</div>	
									<div class="form-group col-md-4">
										<label>Date Acquired</label>
										<input readonly  id="DateAcquired" value = "<?php echo $book->DateAcquired; ?>" class="form-control" type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" name="" placeholder="No Date Published">
									</div>
									<div class="form-group col-md-4">
										<label>Acquired from</label>
										<input readonly  id="AcquiredFrom" value = "<?php echo $book->AcquiredFrom; ?>" class="form-control" type="text" name="" placeholder="No Acquired from">
									</div>					
									<div class="form-group col-md-4">
										<label>Price</label>
										<input readonly id="Price" value = "<?php echo $book->Price; ?>" class="form-control" type="number" name="" placeholder="No Price">
									</div>
									<div class="col-12">
										<h6 class="text-uppercase">Physical Description</h6>
				                		<hr class="hr-sm mb-2 border-success">
			                		</div>			
									<div class="form-group col-md-4">
										<label>Extent</label>
										<input  readonly id="Extent" value = "" class="form-control" type="text" name="" placeholder="No Extent">
									</div>					
									<div class="form-group col-md-4">
										<label>Other Details</label>
										<input  readonly id="OtherDetails" value = "" class="form-control" type="text" name="" placeholder="No Details">
									</div>					
									<div class="form-group col-md-4">
										<label>Size</label>
										<input  readonly id="Size" value = "" class="form-control" type="text" name="" placeholder="No Size">
									</div>														
									<div class="form-group col-md-12">
										<label>Notes</label>
										<textarea readonly id="Notes" value = "<?php echo $book->Notes; ?>" rows="3" class="form-control" type="text" name="" placeholder="No Notes" style="resize:none;"></textarea>
									</div>					
									<div class="form-group col-md-12">
										<label>Summary</label>
										<textarea readonly id="Summary" value = "" rows="3" class="form-control" type="text" name="" placeholder="No Summary" style="resize:none;"></textarea>
									</div>
								</div>				
							</div>
						</div>
					</div> 					
				</div>
			</div> 
		</div> 
	</form> 
</div>
<script>	
	$(document).ready(function(){
		$("#image").change(function(event){						
			var tgt = event.target || window.event.srcElement, files = tgt.files;		
			var fr = new FileReader();
			fr.onload = function(){
				$("#imgDisplay").children('img').attr('src', fr.result);
				imageChanged = true;
			}
			fr.readAsDataURL(files[0]);
		});

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
			url: "<?php echo base_url('Section/GetAll'); ?>",
			async: false,
			success: function(i){
				i = JSON.parse(i);                    
				$('#SectionId').empty();
				$.each(i, function(index, data){                        
					$('#SectionId').append('<option value = "' + data.SectionId + '">' + data.Name + '</option>');
				})
				$('#SectionId').selectpicker('refresh');
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
						$('#CallNumber').val(i.book.CallNumber);
						$('#Title').val(i.book.Title);
						$('#PublisherId').selectpicker('val', i.book.PublisherId);
						$('#PlacePublished').val(i.book.PlacePublished);
						$('#SeriesId').selectpicker('val', i.book.SeriesId);
						$('#Edition').val(i.book.Edition);
						$('#DatePublished').val(i.book.DatePublished);
						$('#Summary').val(i.book.Summary);
						$('#Notes').val(i.book.Notes);
						$('#Extent').val(i.book.Extent);
						$('#OtherDetails').val(i.book.OtherDetails);
						$('#Size').val(i.book.Size);
						var author = [];
						$.each(i.author, function(index, data){
							author.push(data.AuthorId);
						});
						$('#AuthorId').selectpicker('val', author);
						var section = [];
						$.each(i.section, function(index, data){
							section.push(data.SectionId);
						});
						$('#SectionId').selectpicker('val', section);
						var subject = [];
						$.each(i.subject, function(index, data){
							subject.push(data.SubjectId);
						});
						$('#SubjectId').selectpicker('val', subject);

						$('#image').parent().find('.dropify-preview .dropify-render img').attr('src', "<?php echo base_url('assetsOLAS/img/book/'); ?>" + i.book.Image);
					}
				}
			});
		}
    }
</script>
