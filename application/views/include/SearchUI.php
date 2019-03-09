                    <div class="row book">

                        <div class="book-cover col-lg-3 col-3">

                            <!-- <div class="btn btn-danger" style="max-width: 1px; max-height: 20px;"> sdasds</div> -->
                            <a href="<?php echo base_url('Book/View/'.$book[0]->AccessionNumber); ?>"><img src="<?php echo base_url("assetsOLAS/img/book/").$book['book']->Image; ?>" all="image" onError="this.onerror=null;this.src='assetsOLAS/img/book/comingsoon.png';" class="img-fluid"></a>

                        </div>
                            <!-- <div class="btn btn-bold btn-danger book-availability" style="">Unavailable</div> -->
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

                                                    <span class="badge badge-warning" style="text-transform: uppercase;">Out</span>
                                                                                        
                                                    <!-- <a class="media-action hover-primary" href="#" data-provide="tooltip"   title="You have already reserved this book"><i class="fa fa-home fa-2x" style="color:#48b0f7"></i></a> -->

                                                <?php else: ?>
                                                    <span class="badge badge-daner" style="text-transform: uppercase;">Out</span>
                                                    <!-- <a class="media-action hover-primary" href="#" data-provide="tooltip"   title="This book is already reserved by someone else"><i class="fa fa-homae fa-2x" style="color:#48b0f7">Unavailable</i></a> -->
                                                <?php endif; ?>
                                            
                                            <?php else: ?>
                                                <!-- Add to bookbag -->
                                                <!-- <a class="media- -primary" data-provide="tooltip" onclick="Bookbag.add('<?php echo $book[0]->AccessionNumber; ?>','<?php echo $book[0]->ISBN; ?>');" title="Add to Bookbag"><i class="fa fa-eye fa-2x" style="color:;"></i></a> -->
                                                <span class="badge badge-success">In</span>

                                            <?php endif; ?>
                                        <?php else: ?>
                                        <span class="badge badge-danger" style="text-transform: uppercase;">Unavailable</span>
                                        <?php endif; ?>

                                    <?php else: ?>
                                        <!-- IsRoomUseOnly -->
                                        <span class="badge badge-success" style="text-transform: upp">In</span>
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
                                    <a class="media- -primary" data-provide="tooltip" href="#" title="In"><i class="fa fa-home fa-2x" style="margin: 0 10px;"></i></a> 
                                <?php endif; ?>

                            <?php endif; ?>
                               <!--  <a class="media- -primary" data-provide="tooltip" href="#" title="Room Use Only"><i class="fa fa-home fa-2x" style="margin: 0 10px;"></i></a>

                                <a class="media- -primary" data-provide="tooltip" title="More information about this book"><i class="fa fa-eye fa-2x" style="color:;"></i></a> -->
                                <!-- <a href="#"><i class="fa fa-ellipsis-v"></i></a> -->
                            </div>
                        </div>
                    </div>
