<div id="search-container" class="main-content" style="margin: 5% 8% 0px 8%;">
    <div class="lookup d-none d-md-block ">
        <form class="lookup-placeholder">
            <input id="search" class="form-control" type="text" placeholder="Search" value="">
            <button onclick="Search.search();" class="btn">Search</button>
        </form>
    </div>	
    <div class="form-group col-md-6">
        <label>Filter by</label>
        <select id="filter" name="filter" data-min-option="1" data-provide="selectpicker" multiple title="Filter search result" data-live-search="true" class="form-control form-type-combine show-tick">
            <option value="Title" selected="true">Book (Title or ISBN)</option>
            <option value="Author" selected="true">Author</option>
            <option value="Subject" selected="true">Subject</option>
            <option value="Genre" selected="true">Genre</option>
            <option value="Series" selected="true">Series</option>
            <option value="Publisher" selected="true">Publisher</option>
        </select>		
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

<div id="search-result-container" class="main-content">
    <button onclick="SearchResult.close()">close</button>
    <div id="search-result" class="media-list media-list-divided media-list-hover">

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
        $('#search').bind('input', function(){
            if($(this).val() != ""){
                Search.search();
            }
        });
        $('.date-range').change(function(){
            if($('#search').val() != ""){
                Search.search();
            }
        });

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

        search: function(){
            SearchResult.display();            
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
                    $('#search-result').empty();
                    i = JSON.parse(i);
                    console.log(i);
                    $.each(i, function(index, data){
                        var author = '';
                        $.each(data.author, function(x, y){
                            author += '<h5 class="fs-18 fw-300">' + y.Name + '</h5>';
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
                        
                        var element = "<div class='media'><div class='media-body'>" +
                            "<h3 class=\"fs-24 fw-500\">" + data.book.Title + "</h3>" +
                            "<h3 class=\"fs-24 fw-500\">" + author + "</h3>" + 
                            "<h3 class=\"fs-24 fw-500\">Date Published: " + data.book.DatePublished + "</h3>" + 
                            hover +
                        "</div></div>";                        
                        $('#search-result').append(element);
                    });
                }
            })
        }

    };
</script>
