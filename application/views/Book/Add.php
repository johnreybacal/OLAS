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
	<form id="book-addbook-form">
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
						<label>Title T</label>
						<input  id="Title" class="form-control" type="text" name="" placeholder="">
					</div>
					<div class="form-group col-md-6">
						<label>Accession Number N</label>
						<input  id="AccessionNumber" class="form-control" type="number" name="" placeholder="">
					</div>
					<div class="form-group col-md-6">
						<label>Call Number T</label>
						<input  id="CallNumber" class="form-control" type="text" name="" placeholder="">
					</div>
					<div class="form-group col-md-6">
						<label>ISBN N</label>
						<input  id="ISBN" class="form-control" type="number" name="" placeholder="">
					</div>
					<div class="form-group col-md-6" style="margin: auto;">
						<label>Publisher</label>
						<select id="Publisher" name="Publisher" data-provide="selectpicker" title="Choose Publisher" data-live-search="true" class="form-control form-type-combine show-tick"></select>
					</div>
					<div class="form-group col-md-6" style="margin: auto;">
						<label>Series</label>
						<select id="Series" name="Series" data-provide="selectpicker" title="Choose Series" data-live-search="true" class="form-control form-type-combine show-tick"></select>
					</div>
					<div class="form-group col-md-6">
						<label>Author</label>
						<input id="Author" type="text" class="form-control" data-role="tagsinput" data-provide="tagsinput" >
						<!-- <input  id="sampletypeahead" class="form-control" type="text" name="" placeholder=""> -->
					</div>
					<div class="form-group col-md-6">
						<label>Genre</label>
						<input id="Genre" type="text"  class="form-control" data-role="tagsinput" >
						<!-- <input  id="" class="form-control" type="text" name="" placeholder=""> -->
					</div>
					<div class="form-group col-md-6">
						<label>Edition</label>
						<input  id="Edition" class="form-control" type="text" name="" placeholder="">
					</div>					
					<div class="form-group col-md-6">
						<label>Subject</label>
						<select id="SubjectId" class="form-control" data-provide="selectpicker" multiple></select>						
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
	var Book_Add = {
		data: function(){
			return {
				"Title": $('#Title').val(),
				"Author": $('#Author').val(a),
				"Genre": $('#Genre').val(),
				"Publisher": $('#Publisher').val(),
				"Series" : $('#Series').val(),
				"Edition": $('#Edition').val(),
				"Subject": $('#Subject').val(),
				"Course": $('#Course').val(),
				"College": $('#College').val(),
				"Description": $('#Description').val(),

				"AccessionNumber": 0,
				"ISBN": $('#ISBN').val(),				
				"DateAcquired": $('#DateAcquired').val(),
				"Status": "In",
				"AcquiredFrom": $('#AcquiredFrom').val(), 
			}
		},

		save: function(){			
			$.post('<?php echo base_url('Book/Save'); ?>',{
				book: Book_Add.data()
				}, function(i){
				
					if(i == 0){
						//error
						swal('Something went wrong!', 'If problem persist contact administrator', 'error');
					}
					console.log(i);
					//$('table').DataTable().ajax.reload();
				}
			);			
		}
	};
</script>
