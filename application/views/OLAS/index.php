<div class="main-content" style="margin-top: 30px;">
	<div class="card">
        <div class="card-body">
            <h1 id = "welcome">Welcome to OAS!</h1>
            <a href = "<?php echo base_url('Librarian'); ?>">Librarian</a>
            <div id = "book-container"></div>
        </div>
	</div>
	<?php if($this->session->has_userdata('isPatron')): ?>
		<div class="card">
			<div class="card-body">
				<h4>OPAC</h4>
				<div class="table-responsive">
					<table class="table table-striped table-bordered display nowrap" style="width:100%; overflow-x:auto;" cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("Book/GenerateOPAC") ?>">
						<thead>
							<tr class="bg-info">													
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
			</div>
		</div>
	<?php endif; ?>
    <div class="row">
        <div class="col-8">
            <div class="card">
                <h4 class="card-title">Recent Books</h4>
                <div class="media-list media-list-divided media-list-hover">
					<?php foreach($books as $book): ?>								
						<div class="media">						
							<img class="w-80px h-80px" src="<?php echo base_url("assetsOLAS/img/login-bg.jpg"); ?>" alt="...">						
							<div class="media-body">
								<p class="fs-14 semibold">
									Title: <strong><?php echo $book['book']->Title; ?></strong>
								</p>
								<?php foreach($book['author'] as $author): ?>
									<p class="fs-14 semibold">Author: <?php echo $author->Name; ?></p>
								<?php endforeach; ?>							
								<?php foreach($book['genre'] as $genre): ?>
									<p class="fs-14 semibold">Genre: <?php echo $genre->Name; ?></p>
								<?php endforeach; ?>
								<?php foreach($book['subject'] as $subject): ?>
									<p class="fs-14 semibold">Subject: <?php echo $subject->Name; ?></p>
								<?php endforeach; ?>
							</div>
							<a class="media-action hover-primary" href="#" data-provide="tooltip" title="Edit"><i class="ti-pencil"></i></a>
							<a class="media-action hover-danger" href="#" data-provide="tooltip" title="Delete"><i class="ti-close"></i></a>
						</div>	
					<?php endforeach; ?>
				</div>				
            </div>
        </div>
		<div class="col-4">
			<div class="card">
				<h4 class="card-title">Popular Authors</h4>
				<div class="media-list media-list-divided media-list-hover">
				<?php foreach($authors as $author): ?>
					<div class="media media-single">
						<img class="avatar avatar-sm" src="<?php echo base_url("assets/img/avatar/1.jpg"); ?>" alt="...">
						<span><?php echo $author->Name; ?></span>
					</div>			
				<?php endforeach; ?>
				</div>
			</div>
			</div>
		</div>
    </div>	
</div>
<script>
	$(document).ready(function(){
		$('#welcome').fadeOut({			
			complete: function(){
				$(this).html("Welcome to OLAS!").fadeIn("slow");
			}
		});
	});
</script>