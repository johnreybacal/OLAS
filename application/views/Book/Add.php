<div class="main-content">
	<form id="book-form" enctype="multipart/form-data">
		<div class="row">
			<div class="col-lg-12">
				<div class="card card-shadowed">				
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
							<!-- <li>
								<div class="btn-group">
									<button class="btn btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">new</button>
									<div class="dropdown-menu">
										<a onclick="Add.author()"class="dropdown-item" href="#">Add Author</a>
										<a onclick="Add.section()"class="dropdown-item" href="#">Add Section</a>
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
                					<input id="image" name="image" type="file" data-provide="dropify" data-show-remove="false" data-default-file="<?php echo base_url("assetsOLAS/img/book/default.png"); ?>" style="border: solid black 1px;">
          					</div>
							<div class="form-row gap-1 col-md-9 mt-3">									
								<div class="form-group col-md-6">
									<label>ISBN</label>
									<input  id="ISBN" class="form-control" type="text" name="ISBN" placeholder="ISBN">
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
									<select id="SelectAuthorId" name="Author" data-provide="selectpicker" multiple title="Choose Authors" data-live-search="true" class="form-control show-tick"Profile></select>
								</div>
								<div class="form-group col-md-6">
									<label>Section</label>
									<select id="SelectSectionId" name="Section" data-provide="selectpicker" title="Choose Section" data-live-search="true" class="form-control form-type-combine show-tick"></select>
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
									<label>Place of Publication</label>
									<input  id="PlacePublished" value = "" class="form-control" type="text" name="" placeholder="Place of Publication">
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
								<div class="form-group col-md-6">
									<label>Notes</label>
									<input  id="Notes" value = "" class="form-control" type="text" name="" placeholder="Notes">
								</div>					
								<div class="form-group col-md-6">
									<label>Summary</label>
									<input  id="Summary" value = "" class="form-control" type="text" name="" placeholder="Summary">
								</div>					
								<div class="form-group col-md-6">
									<label>Extent</label>
									<input  id="Extent" value = "" class="form-control" type="text" name="" placeholder="Extent">
								</div>					
								<div class="form-group col-md-6">
									<label>Other Details</label>
									<input  id="OtherDetails" value = "" class="form-control" type="text" name="" placeholder="Details">
								</div>					
								<div class="form-group col-md-6">
									<label>Size</label>
									<input  id="Size" value = "" class="form-control" type="text" name="" placeholder="Size">
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
	</form> 
</div>
<div class="fab fab-fixed fab-dir-left fab-320">
  	<button class="btn btn-float btn-info" data-toggle="button">
	    <i class="fab-icon-default ti-plus"></i>
	    <i class="fab-icon-active ti-close"></i>
  	</button>

  	<ul class="fab-buttons">
	    <li><a class="btn btn-float btn-sm btn-info" onclick="Add.author()" href="#" title="Add new Author" data-provide="tooltip" data-placement="top"><i class="fa fa-calendar"></i></a></li>
	    <li><a class="btn btn-float btn-sm btn-info" onclick="Add.section()" href="#" title="Add new Section" data-provide="tooltip" data-placement="top"><i class="fa fa-calendar"></i></a></li>
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
		<?php if(is_object($this->session->flashdata('uncatalogued'))): ?>		
		$('#ISBN').val('<?php echo $this->session->flashdata('uncatalogued')->ISBN ?>');
		Book.get($('#ISBN').val());
		if($('#Title').val() == ''){
			$('#Title').val('<?php echo $this->session->flashdata('uncatalogued')->Title ?>');
		}
		<?php endif;?>
		$('#DateAcquired').val(new Date().toISOString().slice(0, 10));
	});

	var Book = {

		reset: function(val){			
			$('#Title').val('');			
			$('#Edition').val('');
			$('#DatePublished').val('');
			$('#PlacePublished').val('');
			$('#CallNumber').val('');
			$('#DateAcquired').val('');
			$('#AcquiredFrom').val(''); 
			$('#Price').val('');	
			$('#Notes').val('');	
			$('#Summary').val('');	
			$('#Extent').val('');	
			$('#OtherDetails').val('');	
			$('#Size').val('');	
			$('select').selectpicker('val', []);
			$('#DateAcquired').val(new Date().toISOString().slice(0, 10));			
			imageChanged = false;
		},

		init: function(){			
			$('#ISBN').bind('input', function(){				
				var val = $(this).val()
				if(val != '' && val.length > 9){
					Book.get(val);
				}				
			})
		},		

		get: function(val){
			$.ajax({
				url: "<?php echo base_url('Book/Get/'); ?>" + val,
				success: function(i){
					console.log(i);
					if(i == 0){
						Book.reset(val);
						<?php if(is_object($this->session->flashdata('uncatalogued'))): ?>						
							if($('#Title').val() == ''){
								$('#Title').val('<?php echo $this->session->flashdata('uncatalogued')->Title ?>');
							}
						<?php endif;?>
					}else{
						i = JSON.parse(i);
						$('#CallNumber').val(i.book.CallNumber);		
						$('#Title').val(i.book.Title);		
						$('#Edition').val(i.book.Edition);
						$('#DatePublished').val(i.book.DatePublished);
						$('#PlacePublished').val(i.book.PlacePublished);
						$('#Summary').val(i.book.Summary);
						$('#Extent').val(i.book.Extent);
						$('#OtherDetails').val(i.book.OtherDetails);
						$('#Size').val(i.book.Size);						

						$('#SelectPublisherId').selectpicker('val', i.book.PublisherId);

						$('#SelectSectionId').selectpicker('val', i.book.SectionId);
						if(i.book.SeriesId != null){
							$('#SelectSeriesId').selectpicker('val', i.book.SeriesId);
						}

						var author = [];
						$.each(i.author, function(index, data){
							author.push(data.AuthorId);
						});
						$('#SelectAuthorId').selectpicker('val', author);		

						var subject = [];
						$.each(i.subject, function(index, data){
							subject.push(data.SubjectId);
						});
						$('#SelectSubjectId').selectpicker('val', subject);

						$.ajax({
							url: "<?php echo base_url('Book/LastAcquired/'); ?>" + val,
							success: function(j){
								j = JSON.parse(j);
								$('#AcquiredFrom').val(j.AcquiredFrom);
								$('#Price').val(j.Price);
							}
						});

						$('#image').parent().find('.dropify-preview .dropify-render img').attr('src', "<?php echo base_url('assetsOLAS/img/book/'); ?>" + i.book.Image);
						imageChanged = false;
					}
				}
			})
		},

		data: function(){			
			return {
				ISBN: $('#ISBN').val(),				
				Title: $('#Title').val(),
				Summary: $('#Summary').val(),

				AuthorId: $('#SelectAuthorId').selectpicker('val'),
				SubjectId: $('#SelectSubjectId').selectpicker('val'),

				PublisherId: $('#SelectPublisherId').selectpicker('val'),
				SectionId: $('#SelectSectionId').selectpicker('val'),
				SeriesId : $('#SelectSeriesId').selectpicker('val'),

				Edition: $('#Edition').val(),
				DatePublished: $('#DatePublished').val(),
				PlacePublished: $('#PlacePublished').val(),

				Extent: $('#Extent').val(),
				OtherDetails: $('#OtherDetails').val(),
				Size: $('#Size').val(),
				
				AccessionNumber: 0,
				CallNumber: $('#CallNumber').val(),
				DateAcquired: $('#DateAcquired').val(),
				AcquiredFrom: $('#AcquiredFrom').val(), 
				Price: $('#Price').val(),
				Notes: $('#Notes').val(),
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

		section: function(){
			Section_Modal.new();
		},

		refreshSection: function(id){			
			Select.section();
			$('#SelectSectionId').selectpicker('val', id);
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
			Select.section();
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

		section: function(){
			$.ajax({
				url: "<?php echo base_url('Section/GetAll'); ?>",
				async: false,
				success: function(i){
					i = JSON.parse(i);                    
					$('#SelectSectionId').empty();
					$.each(i, function(index, data){                        
						$('#SelectSectionId').append('<option value = "' + data.SectionId + '">' + data.Name + '</option>');
					})
					$('#SelectSectionId').selectpicker('refresh');
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
