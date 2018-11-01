<div class="main-content" style="margin: 5% 8% 0px 8%;">
	<div class="card">
        <div class="card-body">
            <h1 id = "welcome">Welcome to OLAS!</h1>            
        </div>
	</div>
	<!-- <?php if($this->session->has_userdata('isPatron')): ?>
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
	<?php endif; ?> -->
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="card">
                <h4 class="card-title">Recent Books</h4>
                <div class="media-list media-list-divided media-list-hover">
					<?php foreach($books as $book): ?>				
						<!-- <?php print_r($book); ?>				 -->
						<div class="media">
							<img class="w-80px h-80px" src="<?php echo base_url("assetsOLAS/img/login-bg.jpg"); ?>" alt="...">						
							<div class="media-body">
								<h3 class="fs-24 fw-500">
									<?php echo $book['book']->Title; ?>
								</h3>
								<?php foreach($book['author'] as $author): ?>
									<h4 class="fs-18 fw-300">Author: <?php echo $author->Name; ?></h4>
								<?php endforeach; ?>							
								<!-- <?php foreach($book['genre'] as $genre): ?>
									<p class="fs-14 fw-100">Genre: <?php echo $genre->Name; ?></p>
								<?php endforeach; ?>
								<?php foreach($book['subject'] as $subject): ?>
									<p class="fs-14 fw-100">Subject: <?php echo $subject->Name; ?></p>
								<?php endforeach; ?> -->
							</div>							
							<?php if($this->session->has_userdata('isPatron')): ?>		

								<!-- Check if room use only -->
								<?php if($book[0]->IsRoomUseOnly == 0): ?>

									<!-- Check availabillity of the book -->
									<?php if($book[0]->IsAvailable == 1): ?>

										<!-- Check if book is reserved -->
										<?php if($book['reservation']['IsReserved'] == 1): ?>
											<!-- <?php print_r($book['reservation']); ?>
											<?php echo $this->session->userdata('patronId'); ?> -->
											<!-- Check if book is reserved by patron currently logged -->
											<?php if($book['reservation']['PatronId'] == $this->session->userdata('patronId')): ?>											
												<a class="media-action hover-primary" href="#" data-provide="tooltip" 	title="You have already reserved this book"><i class="fa fa-home fa-2x" style="color:#48b0f7"></i></a>
											<?php else: ?>
												<a class="media-action hover-primary" href="#" data-provide="tooltip" 	title="This book is already reserved by someone else"><i class="fa fa-home fa-2x" style="color:#48b0f7"></i></a>
											<?php endif; ?>
										
										<?php else: ?>
											<!-- Add to bookbag -->
											<a class="media-action hover-primary" onclick = "Bookbag.add('<?php echo $book[0]->AccessionNumber; ?>','<?php echo $book[0]->ISBN; ?>');" href="#" data-provide="tooltip" title="Add to Book Bag"><i class="fa fa-plus fa-2x" style="color:#48b0f7"></i></a>
										<?php endif; ?>
									<?php else: ?>
										<a class="media-action hover-primary" href="#" data-provide="tooltip" title="Book is not present at the library at the moment"><i class="fa fa-disable fa-2x" style="color:#48b0f7"></i></a>
									<?php endif; ?>

								<?php else: ?>
									<!-- IsRoomUseOnly -->
									<a class="media-action hover-primary" href="#" data-provide="tooltip" title="This book is for room use only"><i class="fa fa-home fa-2x" style="color:#48b0f7"></i></a>									
								<?php endif; ?>

							<?php endif; ?>
							<a class="media-action hover-primary" href="<?php echo base_url('Book/View/'.$book[0]->AccessionNumber); ?>" data-provide="tooltip" title="More information about this book"><i class="fa fa-eye fa-2x" style="color:#48b0f7"></i></a>
						</div>	
					<?php endforeach; ?>
				</div>				
            </div>
        </div>
		<div class="col-lg-4 col-md-4 col-sm-12">
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
				$(this).html("Welcome to <text style='color:#ff4e4e; font-family: Century Gothic; letter-spacing: 5px;'>O<text style='color:#000000; font-weight: bold;'>L</text>AS</text>!").fadeIn("slow");
			}
		});
	});
</script>