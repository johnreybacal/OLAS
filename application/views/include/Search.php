<?php if(!$this->session->has_userdata('isLibrarian')): ?>
<!-- <div id="search-container" class="main-content" style="margin: 5% 8% 0px 8%;">
    <div class="lookup d-none d-md-block ">
        <form class="lookup-placeholder">
            <input id="search" class="form-control" type="text" placeholder="Search" value="">
            <button onclick="Search.search();" class="form-control">Search</button>
        </form>
    </div>	    
</div> -->
<?php endif; ?>
<?php if(!$this->session->has_userdata('isPatron')): ?>
<div id="search-result-container" class="card col-md-10 bg-secondary" style="flex: 0!important; margin:10px auto 0;" style="border: solid 1px blue ;">
    <?php else: ?>
<div id="search-result-container" class="card col-md-10 bg-secondary" style="flex: 0!important; margin:80px auto 0;" style="border: solid 1px blue ;">
<?php endif; ?>
    <div class="card-stitle" style="border: solid 1px purple;">
        <button onclick="SearchResult.close()" style="float: right;"><i class="fa fa-close fa-2x"></i></button>
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
        <!-- <div class="tab-content col-md-12" style="border:red solid 1px;"> -->
            <div data-search="book" id="search-book-result-container" class="tab-pane fade active show">        
                <div class="form-group">
                    <div class="row">
                        <div class="col-4">
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
                        <div class="col-8">
                            <label>Published date range</label>
                            <div class="input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">From</span>
                                </div>
                                <input id="range-from" type="text" class="form-control date-range">
                                <div class="input-group-prepend input-group-append">
                                    <span class="input-group-text">To</span>
                                </div>
                                <input id="range-to" type="text" class="form-control date-range">
                            </div>		
                        </div>
                    </div>  
                </div>    
                <div class="media-list media-list-divided media-list-hover" id="search-book-result">
                </div>
            </div>
            <div data-search="author" class="tab-pane fade media-list media-list-divided media-list-hover" id="search-author-result">        
            </div>    
            <?php if($this->session->has_userdata('isLibrarian')): ?>
            <div data-search="patron" class="tab-pane fade media-list media-list-divided media-list-hover" id="search-patron-result">
            </div>    
            <?php endif; ?>
        <!-- </div>     -->
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
        $('.date-range').change(function(){
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
        },

        display: function(){
            $('#search-result-container').siblings().hide();
            $('#search-result-container').show();
            $('#search-container').show();
            $('script').hide();
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
                            // author += '<h5 class="fs-18 fw-300">' + y.Name + '</h5>';
                            author += '<div class="book-author">by' + y.Name + '</div>';
                        })
                        var hover = '';
                        if("<?php echo $this->session->has_userdata('patronId'); ?>" == 1){    
                            if(data.catalogue.IsRoomUseOnly == 0){
                                if(data.catalogue.IsAvailable == 1){
                                    if(data.reservation.IsReserved == 1){
                                        if(data.reservation.PatronId == "<?php echo $this->session->userdata('patronId'); ?>"){
                                            //reserved by current patron
                                            hover += '<a class="media-action hover-primary" href="#" data-provide="tooltip" 	title="You have already reserved this book"><i class="fa fa-home fa-2x" style="color:#48b0f7"></i></a>';
                                        }else{
                                            //reserved by another patron
                                            hover += '<a class="media-action hover-primary" href="#" data-provide="tooltip" 	title="This book is already reserved by someone else"><i class="fa fa-home fa-2x" style="color:#48b0f7"></i></a>';
                                        }
                                    }else{
                                        //book available for reservation
                                        hover += '<a class="media-action hover-primary" onclick = "Bookbag.add(' + data.catalogue.AccessionNumber + ',' + data.catalogue.ISBN + ');" href="#" data-provide="tooltip" title="Add to Book Bag"><i class="fa fa-plus fa-2x" style="color:#48b0f7"></i></a>';
                                    }
                                }else{
                                    //book unavailable
                                    hover += '<a class="media-action hover-primary" href="#" data-provide="tooltip" title="Book is not present at the library at the moment"><i class="fa fa-disable fa-2x" style="color:#48b0f7"></i></a>';
                                }
                            }else{
                                //book is room use only
                                hover += '<a class="media-action hover-primary" href="#" data-provide="tooltip" title="This book is for room use only"><i class="fa fa-home fa-2x" style="color:#48b0f7"></i></a>';
                            }                                                      
                        }else if("<?php echo $this->session->has_userdata('librarianId'); ?>" == 1){
                            hover += '<a class="media-action hover-primary" href="<?php echo base_url('Book/Edit/'); ?>' + data.catalogue.AccessionNumber + '" data-provide="tooltip" title="Edit this book"><i class="fa fa-edit fa-2x" style="color:#48b0f7"></i></a>';    
                        }
                        hover += '<a class="media-action hover-primary" href="<?php echo base_url('Book/View/'); ?>' + data.catalogue.AccessionNumber + '" data-provide="tooltip" title="More information about this book"><i class="fa fa-eye fa-2x" style="color:#48b0f7"></i></a>';
                        var authorHTML = '<span class=\"book-author\">by </span>';
                        $.each(data.author, function(authorIndex, author){
                            authorHTML += "<span class=\"book-author\">"+ author.Name + "&nbsp;</span>"
                            // if(authorIndex).last
                            
                        });
                        var element = "<div class='media'><div class='media-body'>" +
                            "<h3 class=\"fs-24 fw-500\">" + data.book.Title + "</h3>" +
                            authorHTML + 
                            "<h3 class=\"fs-24 fw-500\">Date Published: " + data.book.DatePublished + "</h3>" + 
                            hover +
                        "</div></div>";                        
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
                        $('#search-patron-result').append(element);
                    });
                }
            });
        }

    };
</script>
