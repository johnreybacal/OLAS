<!-- <div id="search-result-container" class="card"> -->
    <?php if($this->session->has_userdata('isLibrarian') == 1): ?>
    <div id="search-result-container" class="card col-md-10" style="flex: 0!important; margin:10px auto 0;">
        <?php else: ?>
    <div id="search-result-container" class="card col-md-10" style="flex: 0!important; margin:80px auto 0;">
    <?php endif; ?>    
    <div class="card-titlse">
        <button onclick="SearchResult.close()" class="btn btn-md btn-flat" style="float: right;" data-provide="tooltip" title="Close"><i class="fa fa-close fa-2x"></i></button>
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs">
            <li data-search="book" class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#search-book-result-container">Book</a>
            </li>
            <li data-search="author" class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#search-author-result">Author</a>
            </li>     
            <?php if($this->session->has_userdata('isLibrarian')): ?>       
            <li data-search="patron" class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#search-patron-result">Patron</a>
            </li>            
            <?php endif; ?>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content col-md-12">
            <div data-search="book" id="search-book-result-container" class="tab-pane fade active show">        
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 mb-2">
                            <label>Filter by</label>
                            <select id="filter" name="filter" data-min-option="1" data-provide="selectpicker" multiple title="Filter search result" data-live-search="true" class="form-control show-tick">
                                <option value="Title" selected="true">Book (Title or ISBN)</option>
                                <option value="Author" selected="true">Author</option>
                                <option value="Subject" selected="true">Subject</option>
                                <option value="Section" selected="true">Section</option>
                                <option value="Series" selected="true">Series</option>
                                <option value="Publisher" selected="true">Publisher</option>
                            </select>	
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <label>Published date range</label>
                            <div class="input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">From</span>
                                </div>
                                <input id="range-from" type="text" class="form-control date-search-range date-range">
                                <div class="input-group-prepend input-group-append">
                                    <span class="input-group-text">To</span>
                                </div>
                                <input id="range-to" type="text" class="form-control date-search-range date-range">
                            </div>		
                        </div>
                    </div>  
                </div>    
                <div id="search-book-result">
                </div>
            </div>
            <div data-search="author" class="tab-pane fade" id="search-author-result">        
            </div>    
            <?php if($this->session->has_userdata('isLibrarian')): ?>
            <div data-search="patron" class="tab-pane fade" id="search-patron-result">
            </div>    
            <?php endif; ?>
        </div>    
    </div>
</div>
<script>    

    $(document).ready(function(){
        $('#search-result-container').hide();
        $('#filter').change(function(){
            if($('#search').val() != ""){
                Search.search();
            }
        });        
		$("#search").keypress(function(event) {
			if(event.which == 13 && $('#search').val() != "") {
                Search.search();
			}
		});
        $('.date-search-range').change(function(){
            if($('#search').val() != ""){
                Search.search();
            }
        });
        $('.nav-tabs .nav-item').click(function(){
            Search.search($(this).data('search'));
        })

    });

    var SearchResult = {

        close: function(){
            $('#search-result-container').hide();
            $('#search-result-container').siblings().show();
            $('script').hide();
            $('style').hide();
        },

        display: function(){
            $('#search-result-container').siblings().hide();
            $('#search-result-container').show();
            $('#search-container').show();
            $('script').hide();
            $('style').hide();
        }
    };
    var Search = {

        search: function(f){
            SearchResult.display();            
            if(f == 'book'){                
                Search.searchBook();
            }
            else if(f == 'author'){                
                Search.searchAuthor();
            }
            <?php if($this->session->has_userdata('isLibrarian')): ?>
				else if(f == 'patron'){                
					Search.searchPatron();
				}
            <?php endif; ?>
            else{
                var result = $('.tab-pane.active').data('search');
                if(result == 'book'){                
                    Search.searchBook();
                }
                if(result == 'author'){                
                    Search.searchAuthor();
                }
                <?php if($this->session->has_userdata('isLibrarian')): ?>
                if(result == 'patron'){                
                    Search.searchPatron();
                }
			<?php endif; ?>
            }
        },

        searchBook: function(){
            $.ajax({
                url: "<?php echo base_url('Search'); ?>",
                type: "POST",
                data: {"search": {
                    "search": $('#search').val(),
                    "filter": $('#filter').selectpicker('val'),
                    "filterByDatePublished": ($('#range-from').val() != ""),
                    "rangeFrom": $('#range-from').val(),
                    "rangeTo": $('#range-to').val(),
                }},
                success: function(i){
                    $('#search-book-result').empty();
                    i = JSON.parse(i);
                    console.log(i);
                    $.each(i, function(index, data){
                        var author = '';
                        $.each(data.author, function(x, y){                            
                            author += '<span class=\"badge badge-secondary\">' + y.Name + '</span>';
                        })
                        var status = '';
                        var action ='';
                        // '<a class="hover-primary" href="<?php echo base_url('Book/View/'); ?>' + data.catalogue.AccessionNumber + '" data-provide="tooltip" title="More information about this book"><i class="fa fa-eye fa-2x" style="color:#48b0f7"></i></a>';
                        if(data.catalogue.IsRoomUseOnly == 0){//check if book is room use only
                            if(data.catalogue.IsAvailable == 1){//check if book is available
                                if("<?php echo $this->session->has_userdata('patronId'); ?>" == "1"){//check if patron is logged in
                                    if(data.reservation.IsReserved == 1){//check if book is reserved
                                        if(data.reservation.PatronId == '<?php echo $this->session->userdata('patronId'); ?>'){//reserved by current patron
                                            status += '<span class="badge badge-warning" style="text-transform: uppercase;">You have already reserved this book</span>';
                                        }else{//reserved by another patron
                                            status += '<span class="badge badge-danger" style="text-transform: uppercase;">This book is already reserved</span>';
                                        }
                                    }else{
                                        //book available for reservation                                        
                                        status += '<span class="badge badge-success" style="text-transform: uppercase;">In</span>';                                        
                                        action += '<a class="hover-primary" data-provide="tooltip" href="#" title="Add to bookbag" onclick = "Bookbag.add(' + data.catalogue.AccessionNumber + ',' + data.catalogue.ISBN + ');"><i class="fa fa-plus fa-2x"></i></a> '
                                    }
                                }else{
                                    status += '<span class="badge badge-danger" style="text-transform: uppercase;">In</span>';
                                }
                            }else{
                                //book unavailable
                                status += '<span class="badge badge-danger" style="text-transform: uppercase;">Out</span>';
                            }
                        }else{
                            //book is room use only
                            status += '<span class=\"badge badge-success\" style=\"text-transform: uppercase">In</span>';
                            status += '<span class=\"badge badge-primary ml-2\" style=\"text-transform: uppercase">Room Use Only</span>';                            
                        }                                                      
                        if("<?php echo $this->session->has_userdata('librarianId'); ?>" == 1){
                            action += '<a class="hover-primary" href="<?php echo base_url('Book/Edit/'); ?>' + data.catalogue.AccessionNumber + '" data-provide="tooltip" title="Edit this book"><i class="fa fa-edit fa-2x" style="color:#48b0f7; margin-top:4px;"></i></a>';    
                        }                        
                      
                        var element = 
                        '<div class="col-lg-8 col-md-8 col-sm-12">' +
                            '<div class="row book">' +
                                '<div class="book-cover-search col-lg-3 col-3">' +                                
                                    '<a href="<?php echo base_url('Book/View/'); ?>' + data.catalogue.AccessionNumber + '"><img src="<?php echo base_url("assetsOLAS/img/book/"); ?>' + data.book.Image + '" onError="<?php echo base_url('assetsOLAS/img/book/comingsoon.png'); ?>" class="img-fluid"></a>' + 
                                '</div>' +
                                '<div class="book-info-search col-lg-9 col-9">' +
                                    '<div class="book-title">' +
                                        '<a class="book-title" href="<?php echo base_url('Book/View/'); ?>' + data.catalogue.AccessionNumber + '">' + data.book.Title + '</a>' +
                                    '</div>' + 
                                    '<div>' +
                                        'Call Number: ' + data.book.CallNumber +
                                    '</div>' +
                                    '<div class="book-attr">' +
                                        '<div class="book-author">by: ' +
                                            author + 
                                        '</div>' +
                                    '</div>' +
                                    '<div class="book-rating">' +
                                        '<div class="book-rating-box" >' +
                                            status +
                                        '</div>' +
                                    '</div>' +
                                    '<div class="book-short-description">' +
                                        data.book.Summary +
                                    '</div>' +
                                    '<div class="book-settings">' +
                                        action +
                                    '</div>' +
                                '</div>' +
                            '</div>' +
                        '</div>';                                
                        $('#search-book-result').append(element);
                    });
                }
            })
        },

        searchAuthor: function(){
            $.ajax({
                url: "<?php echo base_url('SearchAuthor'); ?>",
                type: "POST",
                data: {"search": {
                    "search": $('#search').val()                    
                }},
                success: function(i){
                    $('#search-author-result').empty();
                    i = JSON.parse(i);
                    console.log(i);
                    $.each(i, function(index, data){                        
                        var element = '<div class="media media-single">' +
                            '<img class="avatar avatar-sm" src="<?php echo base_url("assets/img/avatar/1.jpg"); ?>" alt="...">' +
                            '<span>' + data.Name + '</span>' +
                        '</div>'
                        // $('#search-book-result-container').addClass('none');
                        // $('#search-author-result').show();
                        // $('#search-author-result').siblings().hide();
                        $('#search-author-result').append(element);
                    });
                }
            });
        },

        searchPatron: function(){
            $.ajax({
                url: "<?php echo base_url('SearchPatron'); ?>",
                type: "POST",
                data: {"search": {
                    "search": $('#search').val()                    
                }},
                success: function(i){
                    $('#search-patron-result').empty();
                    i = JSON.parse(i);
                    console.log(i);
                    $.each(i, function(index, data){                        
                        var element = '<div class="media media-single">' +
                            '<img class="avatar avatar-sm" src="<?php echo base_url("assets/img/avatar/1.jpg"); ?>" alt="...">' +
                            '<span>' + data.IdNumber + '</span>' +
                            '<span>' + data.LastName + ', ' + data.FirstName + '</span>' +
                        '</div>'
                        // $('#search-patron-result').show();
                        // $('#search-patron-result').siblings().hide();
                        // $('#search-book-result-container').addClass('none');
                        // $('#search-author-result').addClass('none');
                        $('#search-patron-result').append(element);
                    });
                }
            });
        }

    };
</script>
