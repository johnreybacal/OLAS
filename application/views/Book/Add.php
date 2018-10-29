<div class="main-content">
	<form id="book-form">
		<div class="row">
			<div class="col-lg-12">
				<div class="card card-shadowed">
					<!-- <div class="card-title">
						<div class="row">
						<div class="col-md-6">
							<h4><strong>Book</strong> Information</h4>
						</div>
						</div>
					</div> -->
					<header class="card-header">
		                <h4 class="card-title">Book <strong>Information</strong></h4>
		                <ul class="card-controls">
                  			<li>
								<label class="switch switch-lg switch-info">
									<input type="checkbox" id="IsRoomUseOnly" name="IsRoomUseOnly" checked />
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
									<div class="form-group col-md-6">
										<label>ISBN</label>
										<input  id="ISBN" class="form-control" type="text" name="" placeholder="ISBN">
									</div>
									<div class="form-group col-md-6">
										<label>Call Number</label>
										<input id="CallNumber" class="form-control" type="text" name="" placeholder="Call Number">
									</div>	
									<div class="form-group col-md-6">
										<label>Title</label>
										<input id="Title" class="form-control" type="text" name="" placeholder="Title">
									</div>					
									<div class="form-group col-md-6">
										<label>Author</label>
										<select id="AuthorId" name="Author" data-provide="selectpicker" multiple title="Choose Authors" data-live-search="true" class="form-control show-tick" data-actions-box="true"></select>
									</div>
									<div class="form-group col-md-6">
										<label>Genre</label>
										<select id="GenreId" name="Genre" data-provide="selectpicker" multiple title="Choose Genres" data-live-search="true" class="form-control form-type-combine show-tick"></select>
									</div>
									<div class="form-group col-md-6">
										<label>Subject</label>
										<select id="SubjectId" name="Subject" data-provide="selectpicker" multiple title="Choose Subjects" data-live-search="true" class="form-control form-type-combine show-tick"></select>				
									</div>
									<div class="form-group col-md-6">
										<label>Publisher</label>
										<select id="PublisherId" name="Publisher" data-provide="selectpicker" title="Choose Publisher" data-live-search="true" class="form-control form-type-combine show-tick"></select>
									</div>
									<div class="form-group col-md-6">
										<label>Series</label>
										<select id="SeriesId" name="Series" data-provide="selectpicker" title="Choose Series" data-live-search="true" class="form-control form-type-combine show-tick"></select>
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
										<input  id="DateAcquired" class="form-control" type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" name="" placeholder="Date Acquired">
									</div>
									<div class="form-group col-md-6">
										<label>Acquired from</label>
										<input  id="AcquiredFrom" class="form-control" type="text" name="" placeholder="Supplier name">
									</div>													
									<div class="form-group col-md-6">
										<label>Price</label>
										<input  id="Price" class="form-control" type="number" name="" placeholder="Price">
									</div>				
									<!-- <div class="form-group col-md-6">
										<label class="switch switch-lg switch-info">
											<input type="checkbox" id="IsRoomUseOnly" name="IsRoomUseOnly" checked />
											<span class="switch-indicator"></span>
											<label>Room Use Only</label>
										</label>
									</div>	 -->			
								</div> <!-- form-row gap-1 -->
							</div> <!-- col-md-12 -->
						</div> <!-- row -->
					</div> <!-- card-body -->
					<div class="card-footer text-right">
						<button type="button" class="btn btn-info" onclick="Book.validate()">Save</button>
					</div>
				</div> <!-- card -->
			</div> <!-- col-lg-12 -->
		</div> <!-- row -->
	</form> <!-- form -->
</div>

<script>	
	$(document).ready(function(){
		initializeSelectpicker();
		Book.init();
		$('#DateAcquired').val(new Date().toISOString().slice(0, 10));
	});

	var Book = {

		reset: function(val){
			$('#book-form')[0].reset();
			$('select').selectpicker('val', []);
			$('#DateAcquired').val(new Date().toISOString().slice(0, 10));
			$('#ISBN').val(val);
		},

		init: function(){			
			$('#ISBN').bind('input', function(){				
				var val = $(this).val()
				if(val != ''){
					$.ajax({
						url: "<?php echo base_url('Book/Get/'); ?>" + val,
						success: function(i){
							if(i == 0){
								Book.reset(val);
							}else{
								i = JSON.parse(i);
								$('#Title').val(i.book.Title);
								$('#PublisherId').selectpicker('val', i.book.PublisherId);
								if(i.book.SeriesId != null){
									$('#SeriesId').selectpicker('val', i.book.SeriesId);
								}
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

								$.ajax({
									url: "<?php echo base_url('Book/LastAcquired/'); ?>" + val,
									success: function(j){
										j = JSON.parse(j);
										$('#AcquiredFrom').val(j.AcquiredFrom);
										$('#Price').val(j.Price);
									}
								})
							}
						}
					})
				}
				else{
					Book.reset(val);
				}
			})
		},

		data: function(){
			return {
				ISBN: $('#ISBN').val(),				
				Title: $('#Title').val(),

				AuthorId: $('#AuthorId').selectpicker('val'),
				GenreId: $('#GenreId').selectpicker('val'),
				SubjectId: $('#SubjectId').selectpicker('val'),

				PublisherId: $('#PublisherId').selectpicker('val'),
				SeriesId : $('#SeriesId').selectpicker('val'),

				Edition: $('#Edition').val(),
				DatePublished: $('#DatePublished').val(),

				AccessionNumber: 0,
				CallNumber: $('#CallNumber').val(),
				DateAcquired: $('#DateAcquired').val(),
				AcquiredFrom: $('#AcquiredFrom').val(), 
				Price: $('#Price').val(),
				IsRoomUseOnly: ($('#IsRoomUseOnly').prop("checked") ? 1 : 0),
				IsAvailable: 1,
				IsActive: 1,
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
							swal({
								title: 'Book saved succesfully',
								text: 'Would you like to add another book?',
								type: 'success',
								showCancelButton: true,
								cancelButtonText: 'No',
								cancelButtonClass: 'btn btn-default',
								confirmButtonText: 'Yes',
								confirmButtonClass: 'btn btn-info'
							}).then((result) => {
								if (result.value) {
									Book.reset();
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
	

</script>
