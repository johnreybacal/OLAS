<div class="main-content" style="margin: 5% 8% 0px 8%;">
    <div class="lookup d-none d-md-block ">
        <form class="lookup-placeholder">
            <input id="search" class="form-control" type="text" placeholder="Search" value="">
            <button onclick="Search.search();" class="btn">Search</button>
        </form>
    </div>	
    <div class="form-group col-md-6">
        <label>Filter by</label>
        <select id="filter" name="filter" data-provide="selectpicker" multiple title="Choose Subjects" data-live-search="true" class="form-control form-type-combine show-tick">
            <option value="Title" selected="true">Title (or ISBN)</option>
            <option value="Author" selected="true">Author</option>
            <option value="Subject" selected="true">Subject</option>
            <option value="Genre" selected="true">Genre</option>
            <option value="Series" selected="true">Series</option>
            <option value="Publisher" selected="true">Publisher</option>
        </select>				
    </div>    
</div>
<script>    
    var Search = {

        search: function(){
            $.ajax({
                url: "<?php echo base_url('Search'); ?>",
                type: "POST",
                data: {"search": {
                    "search": $('#search').val(),
                    "filter": $('#filter').selectpicker('val')
                }},
                success: function(i){
                    // $('#search-result').empty();
                    // i = JSON.parse(i);
                    // console.log(i);
                    // $.each(i, function(index, data){
                    // var element = "<div class='media'>"
                    // + data.book.Title +
                    // "</div>"

                    // $('#search-result').append(element);
                    // });
                }
            })
        }

    };
</script>
<!-- <div id="search-result-div" class="main-content" style="margin: 5% 8% 0px 8%;">
	<button onclick="SearchResult.close()">close</button>
    <div class="form-group col-md-6">
        <label>Filter by</label>
        <select id="filter" name="Subject" data-provide="selectpicker" multiple title="Choose Subjects" data-live-search="true" class="form-control form-type-combine show-tick">
            <option value="Title" selected="true">Title</option>
            <option value="Author" selected="true">Author</option>
            <option value="Subject" selected="true">Subject</option>
            <option value="Genre" selected="true">Genre</option>
            <option value="Series" selected="true">Series</option>
            <option value="Publisher" selected="true">Publisher</option>
        </select>				
    </div>    
	<div id="search-result" class="media-list media-list-divided media-list-hover">

    </div>

</div>

<script>

    $(document).ready(function(){
        $('#search-result-div').hide();
        $('#filter').change(function(){
            Search.search();
        });
    });

    var SearchResult = {

        close: function(){
            $('#search-result-div').hide();
            $('#search-result-div').siblings().show();
            $('script').hide();
        },

        display: function(){
            $('#search-result-div').siblings().hide();
            $('#search-result-div').show();
            $('script').hide();
        }
    };

    
    var Search = {

        search: function(){
            $.ajax({
                url: "<?php echo base_url('Search'); ?>",
                type: "POST",
                data: {"search": {
                    "search": $('#search').val(),
                    "filter": $('#filter').selectpicker('val')
                }},
                success: function(i){
                    $('#search-result').empty();
                    i = JSON.parse(i);
                    console.log(i);
                    $.each(i, function(index, data){
                    var element = "<div class='media'>"
                    + data.book.Title +
                    "</div>"

                    $('#search-result').append(element);
                    });
                }
            })
        }

    };
</script>
 -->
