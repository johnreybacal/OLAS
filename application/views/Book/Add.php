<header class="header header-inverse bg-ui-general"> <!--header-inverse para madilim bg-ui-general-->
	<div class="container">
		<div class="header-info">
			<div class="left">
				<br>
				<h2 class="header-title"><strong>Books</strong> <small class="subtitle">List of all books are available in this page.</small></h2>
			</div>
		</div>

<!-- 	<div class="header-action">
			<div class="buttons">
				<!-- <a class="btn btn-primary btn-float" href="#" title="Create new book" data-provide="tooltip"><i class="ti-plus"></i></a>
				<a class="btn btn-float btn-lg btn-info float-md-right text-white" onclick="Utilities_PANType_Modal.new();"
			data-toggle="modal" data-target="#modal-utilities-pantype" data-provide="tooltip" data-original-title="Add Book">
				<i class="ti-plus"></i>
				</a>
			</div>
		</div> -->
	</div>
</header><!--/.header -->

<div class="main-content">
	<form id="book-form">
		<div class="row">
			<div class="col-lg-12">
				<div class="card card-shadowed">
					<div class="card-title">
						<div class="row">
						<div class="col-md-6">
							<h4><strong>Book</strong> Information</h4>
						</div>
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-row gap-1">					
									<div class="form-group col-md-6">
										<label>ISBN</label>
										<input  id="ISBN" class="form-control" type="text" name="" placeholder="">
									</div>
									<div class="form-group col-md-6">
										<label>Title</label>
										<input id="Title" class="form-control" type="text" name="" placeholder="">
									</div>					
									<div class="form-group col-md-6">
										<label>Author</label>
										<select id="AuthorId" name="Author" data-provide="selectpicker" multiple title="Choose Authors" data-live-search="true" class="form-control form-type-combine show-tick"></select>
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
										<input  id="Edition" class="form-control" type="text" name="" placeholder="">
									</div>	
									<div class="form-group col-md-6">
										<label>Date Published</label>
										<input  id="DatePublished" class="form-control" type="text" data-provide="datepicker" name="" placeholder="">
									</div>				
									<div class="form-group col-md-6">
										<label>Date Acquired</label>
										<input  id="DateAcquired" class="form-control" type="text" data-provide="datepicker" name="" placeholder="">
									</div>
									<div class="form-group col-md-6">
										<label>Acquired from</label>
										<input  id="AcquiredFrom" class="form-control" type="text" name="" placeholder="">
									</div>													
								</div> <!-- form-row gap-1 -->
							</div> <!-- col-md-12 -->
						</div> <!-- row -->
					</div> <!-- card-body -->
					<div class="card-footer text-right">
						<button type="button" class="btn btn-info" onclick="Book.save()">Save</button>
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

		reset: function(val){
			$('#book-form')[0].reset();
			$('select').selectpicker('val', []);
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
					})
				}
				else{
					Book.reset(val);
				}
			})
		},

		data: function(){
			return {
				"ISBN": $('#ISBN').val(),				
				"Title": $('#Title').val(),

				"AuthorId": $('#AuthorId').selectpicker('val'),
				"GenreId": $('#GenreId').selectpicker('val'),
				"SubjectId": $('#SubjectId').selectpicker('val'),

				"PublisherId": $('#PublisherId').selectpicker('val'),
				"SeriesId" : $('#SeriesId').selectpicker('val'),

				"Edition": $('#Edition').val(),
				"DatePublished": $('#DatePublished').val(),

				"AccessionNumber": 0,
				"CallNumber": "",
				"DateAcquired": $('#DateAcquired').val(),
				"Status": "In",
				"AcquiredFrom": $('#AcquiredFrom').val(), 
			}
		},

		save: function(){			
			$.post('<?php echo base_url('Book/Save'); ?>',{
				book: Book.data()
				}, function(i){				
					console.log(i);					
				}
			);			
		}
	};
</script>
