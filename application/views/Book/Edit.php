<div class="main-content edit">
	<form id="book-form" enctype="multipart/form-data">
		<div class="row">
			<div class="col-12">
				<div class="card card-shadowed">				
					<header class="card-header">
						<h4 class="card-title fs-18 fw-500">Book <strong>Information</strong></h4>
		                <ul class="card-controls">
                  			<li>										
								<label class="switch switch-lg switch-info">
									<input type="checkbox" id="IsRoomUseOnly" name="IsRoomUseOnly" <?php echo ($book->IsRoomUseOnly == 1) ? "Checked" : ""; ?> />
									<span class="switch-indicator"></span>
									<label>Room Use Only</label>
								</label>
							</li>
							<!-- <li>
								<div class="btn-group">
									<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Add new data</button>
									<div class="dropdown-menu">
										<a onclick="Add.author()"class="dropdown-item" href="#">Add Author</a>
										<a onclick="Add.genre()"class="dropdown-item" href="#">Add Genre</a>
										<a onclick="Add.subject()"class="dropdown-item" href="#">Add Subject</a>			
										<a onclick="Add.publisher()"class="dropdown-item" href="#">Add Publisher</a>
										<a onclick="Add.series()"class="dropdown-item" href="#">Add Series</a>
									</div>
								</div>
							</li> -->
						</ul>
					</header>	
					<div class="card-body form-type-line">
						<div class="row">
								<div class="col-md-3">
									<!-- <div id="imgDisplay">
	                				</div> -->
	                					<input id="image" name="image" type="file" data-provide="dropify" data-show-remove="true" data-default-file="<?php echo base_url("assetsOLAS/img/book/default.png"); ?>" style="border: solid black 1px;">
              					</div>
								<div class="form-row gap-1 col-md-9 mt-3">
									<div class="form-group col-md-6 col-sm-12">
										<label>Accession Number</label>
										<input  id="AccessionNumber" value = "<?php echo $book->AccessionNumber; ?>" readonly class="form-control" type="text" name="" placeholder="Accession Number">
									</div>
									<!-- <div class="form-group col-md-6">		
										<div id="imgDisplay" style="border:solid thin black; height:150px; width: 150px;"><img src='' alt="pick an image" style="width: 100%; height: 100%" /></div>				
										<label>Select image</label>
										<input id="image" name="image" type="file" accept="image/*" />
									</div> -->
									<div class="form-group col-md-6">
										<label>ISBN</label>
										<input  id="ISBN" value = "<?php echo $book->ISBN; ?>" class="form-control" type="text" name="ISBN" placeholder="ISBN">
									</div>
									<div class="form-group col-md-6">
										<label>Call Number</label>
										<input id="CallNumber" value = "<?php echo $book->CallNumber; ?>" class="form-control" type="text" name="" placeholder="Call Number">
									</div>	
									<div class="form-group col-md-6">
										<label>Title</label>
										<input id="Title" class="form-control" type="text" name="" placeholder="Title">
									</div>					
									<div class="form-group col-md-6">
										<label>Author</label>
										<select id="SelectAuthorId" name="Author" data-provide="selectpicker" multiple title="Choose Authors" data-live-search="true" class="form-control show-tick"></select>
									</div>
									<div class="form-group col-md-6">
										<label>Genre</label>
										<select id="SelectGenreId" name="Genre" data-provide="selectpicker" multiple title="Choose Genres" data-live-search="true" class="form-control form-type-combine show-tick"></select>
									</div>
									<div class="form-group col-md-6">
										<label>Subject</label>
										<select id="SelectSubjectId" name="Subject" data-provide="selectpicker" multiple title="Choose Subjects" data-live-search="true" class="form-control form-type-combine show-tick"></select>				
									</div>
									<div class="form-group col-md-6">
										<label>Publisher</label>
										<select id="SelectPublisherId" name="Publisher" data-provide="selectpicker" title="Choose Publisher" data-live-search="true" class="form-control form-type-combine show-tick"></select>
									</div>
									<div class="form-group col-md-6">
										<label>Series</label>
										<select id="SelectSeriesId" name="Series" data-provide="selectpicker" title="Choose Series" data-live-search="true" class="form-control form-type-combine show-tick"></select>
									</div>
									<div class="form-group col-md-6">
										<label>Edition</label>
										<input  id="Edition" class="form-control" type="text" name="" placeholder="Edition">
									</div>	
									<div class="form-group col-md-6">
										<label>Date Published</label>
										<input  id="DatePublished" class="form-control" type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" name="" placeholder="Date Published">
									</div>				
									<div class="form-group col-md-6">
										<label>Date Acquired</label>
										<input  id="DateAcquired" value = "<?php echo $book->DateAcquired; ?>" class="form-control" type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" name="" placeholder="Date Acquired">
									</div>
									<div class="form-group col-md-6">
										<label>Acquired from</label>
										<input  id="AcquiredFrom" value = "<?php echo $book->AcquiredFrom; ?>" class="form-control" type="text" name="" placeholder="Supplier name">
									</div>			
									<div class="form-group col-md-6">
										<label>Price</label>
										<input  id="Price" value = "<?php echo $book->Price; ?>" class="form-control" type="number" name="" placeholder="Price">
									</div>				
																		
								</div> 
						</div> 
					</div> 
					<div class="card-footer text-right">
						<button type="button" class="btn btn-info" onclick="Book.validate()">Save</button>
					</div>
				</div> 
			</div> 
		</div> 
	</form> <
</div>
<div class="fab fab-fixed fab-dir-left fab-320">
  	<button class="btn btn-float btn-info" data-toggle="button">
	    <i class="fab-icon-default ti-plus"></i>
	    <i class="fab-icon-active ti-close"></i>
  	</button>

  	<ul class="fab-buttons">
	    <li><a class="btn btn-float btn-sm btn-info" onclick="Add.author()" href="#" title="Add new Author" data-provide="tooltip" data-placement="top"><i class="fa fa-calendar"></i></a></li>
	    <li><a class="btn btn-float btn-sm btn-info" onclick="Add.genre()" href="#" title="Add new Genre" data-provide="tooltip" data-placement="top"><i class="fa fa-calendar"></i></a></li>
	    <li><a class="btn btn-float btn-sm btn-info" onclick="Add.subject()" href="#" title="Add new Subject" data-provide="tooltip" data-placement="top"><i class="fa fa-calendar"></i></a></li>
	    <li><a class="btn btn-float btn-sm btn-info" onclick="Add.publisher()" href="#" title="Add new Publisher" data-provide="tooltip" data-placement="top"><i class="fa fa-music"></i></a></li>
	    <li><a class="btn btn-float btn-sm btn-info" onclick="Add.series()" href="#" title="Add new Series" data-provide="tooltip" data-placement="top"><i class="fa fa-video-camera"></i></a></li>
  	</ul>
</div>

<script>	

	var imageChanged = false;

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
		Select.init();
		Book.init();
		console.log("price: <?php echo $book->Price; ?>");
		console.log("room: <?php echo $book->IsRoomUseOnly; ?>");
	});

	var Book = {

		reset: function(val){
			$('#book-form')[0].reset();
			$('select').selectpicker('val', []);
			$('#ISBN').val(val);
		},

		init: function(){
			Book.get($('#ISBN').val());
			$('#ISBN').bind('input', function(){				
				var val = $(this).val()
				if(val != ''){
					Book.get(val);
				}
				else{
					Book.reset(val);
				}
			})			
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
						$('#SelectPublisherId').selectpicker('val', i.book.PublisherId);
						if(i.book.SeriesId != null){
							$('#SelectSeriesId').selectpicker('val', i.book.SeriesId);
						}
						$('#Edition').val(i.book.Edition);
						$('#DatePublished').val(i.book.DatePublished);

						var author = [];
						$.each(i.author, function(index, data){
							author.push(data.AuthorId);
						});
						$('#SelectAuthorId').selectpicker('val', author);
						var genre = [];
						$.each(i.genre, function(index, data){
							genre.push(data.GenreId);
						});
						$('#SelectGenreId').selectpicker('val', genre);
						var subject = [];
						$.each(i.subject, function(index, data){
							subject.push(data.SubjectId);
						});
						$('#SelectSubjectId').selectpicker('val', subject);

						$('#image').parent().find('.dropify-preview .dropify-render img').attr('src', "<?php echo base_url('assetsOLAS/img/book/'); ?>" + i.book.Image);
						imageChanged = false;
					}
				}
			});
		},

		data: function(){
			return {
				ISBN: $('#ISBN').val(),				
				Title: $('#Title').val(),

				AuthorId: $('#SelectAuthorId').selectpicker('val'),
				GenreId: $('#SelectGenreId').selectpicker('val'),
				SubjectId: $('#SelectSubjectId').selectpicker('val'),

				PublisherId: $('#SelectPublisherId').selectpicker('val'),
				SeriesId : $('#SelectSeriesId').selectpicker('val'),

				Edition: $('#Edition').val(),
				DatePublished: $('#DatePublished').val(),

				AccessionNumber: $('#AccessionNumber').val(),
				CallNumber: $('#CallNumber').val(),
				DateAcquired: $('#DateAcquired').val(),				
				AcquiredFrom: $('#AcquiredFrom').val(),
				Price: $('#Price').val(),
				IsRoomUseOnly: ($('#IsRoomUseOnly').prop("checked") ? 1 : 0),
				IsAvailable: <?php echo $book->IsAvailable; ?>,
				IsActive: <?php echo $book->IsActive; ?>, 
			}
		},

		validate: function(){
			$.ajax({
				url:'<?php echo base_url('Book/Validate'); ?>',
				type: "POST",
				data: {"book": Book.data()},
				success: function(i){
					$('.invalid-feedback').remove();
					$('.is-invalid').removeClass('is-invalid');
					i = JSON.parse(i);                    
					if(i.status == 1){
						Book.save();
					}else{
						$.each(i, function(element, message){
							if(element != 'status'){
								$('#' + element).addClass('is-invalid').parent().append(message);
							}
						});
					}
				}, 
				error: function(i){
					swal('Oops!', "Something went wrong", 'error');
				}
			})      
		},

		upload: function(){			
			var formData = new FormData($('#book-form')[0]);			
			$.ajax({
				url: "<?php echo base_url("Book/UploadImage"); ?>",
				type: "POST",
				data: formData,
				processData: false,
				contentType: false,
				success: function(data){
					console.log('upload: ' + data);					
				},
				error: function(data){
					console.log('upload: ' + data);
				}
			});
		},

		save: function(){			
			swal({
				title: 'Confirm Submission',
				text: 'Save changes for Book',
				type: 'warning',
				showCancelButton: true,
				cancelButtonText: 'No! Cancel',
				cancelButtonClass: 'btn btn-default',
				confirmButtonText: 'Yes! Go for it',
				confirmButtonClass: 'btn btn-info'
			}).then((result) => {
				if (result.value) {  
					$.ajax({
						url:'<?php echo base_url('Book/Save'); ?>',
						type: "POST",
						data: {"book": Book.data()},
						success: function(i){
							if(imageChanged){								
								Book.upload();
							}
							swal({
								title: 'Book saved succesfully',
								text: 'Would you like to make some more changes?',
								type: 'success',
								showCancelButton: true,
								cancelButtonText: 'No',
								cancelButtonClass: 'btn btn-default',
								confirmButtonText: 'Yes',
								confirmButtonClass: 'btn btn-info'
							}).then((result) => {
								if (result.value) {									
								}else{
									window.location.href = "<?php echo base_url('Book'); ?>"
								}
							})
						}, 
						error: function(i){
							swal('Oops!', "Something went wrong", 'error');
						}
					})                      						
				}
			})		
		}
	};

	var Add = {
		
		author: function(){
			Author_Modal.new();
		},

		refreshAuthor: function(id){
			var sel = $('#SelectAuthorId').selectpicker('val');
			sel.push(id);
			Select.author();
			$('#SelectAuthorId').selectpicker('val', sel);
		},

		genre: function(){
			Genre_Modal.new();
		},

		refreshGenre: function(id){
			var sel = $('#SelectGenreId').selectpicker('val');
			sel.push(id);
			Select.genre();
			$('#SelectGenreId').selectpicker('val', sel);
		},

		subject: function(){
			Subject_Modal.new();
		},

		refreshSubject: function(id){
			var sel = $('#SelectSubjectId').selectpicker('val');
			sel.push(id);
			Select.subject();
			$('#SelectSubjectId').selectpicker('val', sel);
		},

		publisher: function(){
			Publisher_Modal.new();
		},

		refreshPublisher: function(id){			
			Select.publisher();
			$('#SelectPublisherId').selectpicker('val', id);
		},

		series: function(){
			Series_Modal.new();
		},

		refreshSeries: function(id){			
			Select.series();
			$('#SelectSeriesId').selectpicker('val', id);
		}

	};

	var Select = {

		init: function(){
			Select.author();
			Select.genre();
			Select.subject();
			Select.publisher();
			Select.series();
		},

		author: function(){
			$.ajax({
				url: "<?php echo base_url('Author/GetAll'); ?>",
				async: false,
				success: function(i){
					i = JSON.parse(i);                    
					$('#SelectAuthorId').empty();
					$.each(i, function(index, data){                        
						$('#SelectAuthorId').append('<option value = "' + data.AuthorId + '">' + data.Name + '</option>');
					})
					$('#SelectAuthorId').selectpicker('refresh');
				}
			});			
		},

		genre: function(){
			$.ajax({
				url: "<?php echo base_url('Genre/GetAll'); ?>",
				async: false,
				success: function(i){
					i = JSON.parse(i);                    
					$('#SelectGenreId').empty();
					$.each(i, function(index, data){                        
						$('#SelectGenreId').append('<option value = "' + data.GenreId + '">' + data.Name + '</option>');
					})
					$('#SelectGenreId').selectpicker('refresh');
				}
			});
		},

		subject: function(){
			$.ajax({
				url: "<?php echo base_url('Subject/GetAll'); ?>",
				async: false,
				success: function(i){
					i = JSON.parse(i);                    
					$('#SelectSubjectId').empty();
					$.each(i, function(index, data){                        
						$('#SelectSubjectId').append('<option value = "' + data.SubjectId + '">' + data.Name + '</option>');
					})
					$('#SelectSubjectId').selectpicker('refresh');
				}
			});
		},

		publisher: function(){
			$.ajax({
				url: "<?php echo base_url('Publisher/GetAll'); ?>",
				async: false,
				success: function(i){
					i = JSON.parse(i);                    
					$('#SelectPublisherId').empty();
					$.each(i, function(index, data){                        
						$('#SelectPublisherId').append('<option value = "' + data.PublisherId + '">' + data.Name + '</option>');
					})
					$('#SelectPublisherId').selectpicker('refresh');
				}
			});
		},

		series: function(){
			$.ajax({
				url: "<?php echo base_url('Series/GetAll'); ?>",
				async: false,
				success: function(i){
					i = JSON.parse(i);                    
					$('#SelectSeriesId').empty();
					$.each(i, function(index, data){                        
						$('#SelectSeriesId').append('<option value = "' + data.SeriesId + '">' + data.Name + '</option>');
					})
					$('#SelectSeriesId').selectpicker('refresh');
				}
			});
		}

	};

	
</script>
