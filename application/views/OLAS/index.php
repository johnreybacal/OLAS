<div class="container" style="margin-top: 10px;">
    <div class="row book-list">
        <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Latest Books</h2>
                    </div>
                </div>
                    <?php foreach($books as $book): ?>              
                <div class="col-lg-6 col-md-6">
                    <div class="row book">

                        <div class="book-cover col-lg-3 col-3">

                            <!-- <div class="btn btn-danger" style="max-width: 1px; max-height: 20px;"> sdasds</div> -->
                            <a href="<?php echo base_url('Book/View/'.$book[0]->AccessionNumber); ?>"><img src="<?php echo base_url("assetsOLAS/img/book/").$book['book']->Image; ?>" onError="this.onerror=null;this.src='assetsOLAS/img/book/comingsoon.png';" class="img-fluid"></a>

                        </div>
                            <div class="btn btn-bold btn-danger book-availability" style="">Unavailable</div>
                        <div class="book-info col-lg-9 col-9">
                            <div class="book-settings" style="float: right;">
                                <a href="#"><i class="fa fa-ellipsis-v"></i></a>
                            </div>
                            <div class="book-title">
                                <a class="book-title" href="<?php echo base_url('Book/View/'.$book[0]->AccessionNumber); ?>"> <?php echo $book['book']->Title; ?></a>
                            </div>

                            <div class="book-attr">
                                <!-- <span style="font-size: 1em">by</span> -->
                                <div class="book-author">by
                                    <?php foreach($book['author'] as $author): ?>
                                        <?php echo $author->Name; ?>
                                    <?php endforeach; ?> 
                                </div>
                                <!-- <div class="book-year">2011</div> -->
                                <!-- <span class="book-year">2011 </span>  -->
                            </div>

                            <div class="book-rating">
                                <div class="book-rating-box">
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

                                                    <span class="badge badge-warning" style="text-transform: uppercase;">BookBagged</span>
                                                                                        
                                                    <!-- <a class="media-action hover-primary" href="#" data-provide="tooltip"   title="You have already reserved this book"><i class="fa fa-home fa-2x" style="color:#48b0f7"></i></a> -->

                                                <?php else: ?>
                                                    <span class="badge badge-daner" style="text-transform: uppercase;">Unavailable</span>
                                                    <!-- <a class="media-action hover-primary" href="#" data-provide="tooltip"   title="This book is already reserved by someone else"><i class="fa fa-homae fa-2x" style="color:#48b0f7">Unavailable</i></a> -->
                                                <?php endif; ?>
                                            
                                            <?php else: ?>
                                                <!-- Add to bookbag -->
                                                <!-- <a class="media- -primary" data-provide="tooltip" onclick="Bookbag.add('<?php echo $book[0]->AccessionNumber; ?>','<?php echo $book[0]->ISBN; ?>');" title="Add to Bookbag"><i class="fa fa-eye fa-2x" style="color:;"></i></a> -->
                                                <span class="badge badge-primary">Available</span>

                                            <?php endif; ?>
                                        <?php else: ?>
                                        <span class="badge badge-danger" style="text-transform: uppercase;">Unavailable</span>
                                        <?php endif; ?>

                                    <?php else: ?>
                                        <!-- IsRoomUseOnly -->
                                        <span class="badge badge-info" style="text-transform: upp">Room Use Only</span>
                                    <?php endif; ?>

                                <?php endif; ?>
                                        <!-- <div class="rating" style="width:0%;"></div> -->
                                </div>
                            </div>

                            <div class="book-short-description"> This work has been designed for undergraduate and postgraduate and post-experience students pursuing management and business qualifications that contain a dissertation component. It combines an extensive review of basic research methods and techniques with equally detailed guidelines on the management of the dissertation writing process, including selection of topics, and the preparation, structuring and presentation of a dissertation. The integration of both elements should aid and reassure students new to the dissertation researching and writing process while those with prior experience of this process should find the text a valuable statement of current practice. For Tutors, the book addresses many of the questions directed to them by students engaged in preparing a dissertation.
                            </div>
                            <!-- 
                            <div class="book-settings" style="float: right;">
                                <a href="#"><i class="fa fa-ellipsis-v"></i></a>
                            </div> -->
                            <div class="book-settings" style="float: right; margin-top: 10px;">
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

                                                <a class="media- -primary" data-provide="tooltip" title="Book already reserved"><i class="fa fa-plus fa-2x" style="color:;"></i></a>                                      
                                                <!-- <a class="media-action hover-primary" href="#" data-provide="tooltip"   title="You have already reserved this book"><i class="fa fa-home fa-2x" style="color:#48b0f7"></i></a> -->

                                            <?php else: ?>
                                                <a class="media-action hover-primary" href="#" data-provide="tooltip"   title="This book is already reserved by someone else"><i class="fa fa-homae fa-2x" style="color:#48b0f7">Unavailable</i></a>
                                        <!-- di ko pa naadjust tong part nato 2 -->
                                            <?php endif; ?>
                                        
                                        <?php else: ?>
                                            <!-- Add to bookbag -->
                                            <a class="media- -primary" data-provide="tooltip" onclick="Bookbag.add('<?php echo $book[0]->AccessionNumber; ?>','<?php echo $book[0]->ISBN; ?>');" title="Add to Bookbag"><i class="fa fa-eye fa-2x" style="color:;"></i></a>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <a class="media-action hover-primary" href="#" data-provide="tooltip" title="Book is not present at the library at the moment"><i class="fa fa-disable fa-2x" style="color:#48b0f7"></i></a>
                                        <!-- di ko pa naadjust tong part nato 1 -->
                                    <?php endif; ?>

                                <?php else: ?>
                                    <!-- IsRoomUseOnly -->
                                    <a class="media- -primary" data-provide="tooltip" href="#" title="Room Use Only"><i class="fa fa-home fa-2x" style="margin: 0 10px;"></i></a> 
                                <?php endif; ?>

                            <?php endif; ?>
                               <!--  <a class="media- -primary" data-provide="tooltip" href="#" title="Room Use Only"><i class="fa fa-home fa-2x" style="margin: 0 10px;"></i></a>

                                <a class="media- -primary" data-provide="tooltip" title="More information about this book"><i class="fa fa-eye fa-2x" style="color:;"></i></a> -->
                                <!-- <a href="#"><i class="fa fa-ellipsis-v"></i></a> -->
                            </div>
                        </div>
                    </div>

                </div>
                    <?php endforeach; ?>

                <!-- <div class="col-lg-6 col-md-6">
                    <div class="row book">
                        <div class="book-cover col-lg-3 col-3">

                            // <div class="btn btn-danger" style="max-width: 1px; max-height: 20px;"> sdasds</div>
                            <a href="/book/1557"><img src="<?php echo base_url("assetsOLAS/img/book/tfios.jpg"); ?>" alt="La Divina Commedia (The Divine Comedy) : Inferno" class="img-fluid"></a>//

                        </div>
                            <div class="btn btn-bold btn-danger book-availability" style=""> Unavailable</div>
                        <div class="book-info col-lg-9 col-9">
                            <div class="book-settings" style="float: right;">
                                <a href="#"><i class="fa fa-ellipsis-v"></i></a>
                            </div>
                            <div class="book-title">
                                <a class="book-title" href="/book/1557">La Divina Commedia (The Divine Comedy) : Inferno</a>
                            </div>

                            <div class="book-attr">
                                //<span style="font-size: 1em">by</span>
                                <div class="book-author">by Paul S. Bruckman,Paul S. Bruckman,Paul S. Bruckman,</div>
                                //<div class="book-year">2011</div>
                                //<span class="book-year">2011 </span> 
                            </div>

                            <div class="book-rating">
                                <div class="book-rating-box">
                                    <div class="rating" style="width:0%;"></div>
                                </div>
                            </div>

                            <div class="book-short-description"> This work has been designed for undergraduate and postgraduate and post-experience students pursuing management and business qualifications that contain a dissertation component. It combines an extensive review of basic research methods and techniques with equally detailed guidelines on the management of the dissertation writing process, including selection of topics, and the preparation, structuring and presentation of a dissertation. The integration of both elements should aid and reassure students new to the dissertation researching and writing process while those with prior experience of this process should find the text a valuable statement of current practice. For Tutors, the book addresses many of the questions directed to them by students engaged in preparing a dissertation.
                            </div>
                            
                           // <div class="book-settings" style="float: right;">
                                <a href="#"><i class="fa fa-ellipsis-v"></i></a>
                            </div>//
                            <div class="book-settings" style="float: right; margin-top: 10px;">
                                <a class="media- -primary" data-provide="tooltip" title="Room Use Only"><i class="fa fa-home fa-2x" style="margin: 0 10px;"></i></a>

                                <a class="media- -primary" data-provide="tooltip" title="More information about this book"><i class="fa fa-eye fa-2x" style="color:;"></i></a>
                               // <a href="#"><i class="fa fa-ellipsis-v"></i></a>//
                            </div>
                        </div>
                    </div>
                </div> -->

           </div>
       </div>
                <div class="col-lg-3">
                    <!-- <div class="col-lg-4 col-md-4 col-sm-12"> -->
                <div class="section-title">
                    <h2>Popular Authors</h2>
                </div>
            <div class="card-pale-secondary">
                <!-- <h4 class="card-title">Popular Authors</h4> -->
                <div class="media-list media-list-divided media-list-hover">
                <?php foreach($authors as $author): ?>
                    <div class="media media-single">
                        <img class="avatar avatar-sm" src="<?php echo base_url("assets/img/avatar/1.jpg"); ?>" alt="...">
                        <span><?php echo $author->Name; ?></span>
                    </div>          
                <?php endforeach; ?>
                </div>
            </div>
            <!-- </div> -->
                    <!-- <div class="row mini-list-authors">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h2>Popular Authors</h2>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 author">
                            <div class="author-photo">
                                <a href="/author/597/books" class="text-center"><img src="<?php echo base_url("assets/img/avatar/1.jpg"); ?>" alt="J.K. Rowling " class="rounded-circle"></a>
                            </div>
                            <div class="author-info">
                                <div class="author-name">
                                    <a href="/author/597/books"> J.K. Rowling</a>
                                </div>
                                <div class="author-books">1 books</div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 author">
                            <div class="author-photo">
                                <a href="/author/602/books" class="text-center"><img src="<?php echo base_url("assetsOLAS/img/book/comingsoon.png"); ?>" alt="Шерих Дмитрий" class="rounded-circle"></a>
                            </div>
                            <div class="author-info">
                                <div class="author-name">
                                    <a href="/author/602/books">Дмитрий Шерих</a>
                                </div>
                                <div class="author-books">1 books</div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 author">
                            <div class="author-photo">
                                <a href="/author/609/books" class="text-center"><img src="<?php echo base_url("assetsOLAS/img/book/comingsoon.png"); ?>" class="rounded-circle"></a>
                            </div>
                            <div class="author-info">
                                <div class="author-name">
                                    <a href="/author/609/books"> Стивен Кови</a>
                                </div>
                                <div class="author-books">1 books</div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 author">
                            <div class="author-photo">
                                <a href="/author/615/books" class="text-center"><img src="/resources/images/noavatar.png" alt="Behrouz A. Forouzan " class="rounded-circle"></a>
                            </div>
                            <div class="author-info">
                                <div class="author-name">
                                    <a href="/author/615/books"> Behrouz A. Forouzan</a>
                                </div>
                                <div class="author-books">1 books</div>
                            </div>
                        </div>
                    </div> -->
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