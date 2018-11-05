<div id="search-result-div" class="main-content" style="margin: 5% 8% 0px 8%;">
	<button onclick="SearchResult.close()">close</button>
	<div id="search-result">

    </div>

</div>

<script>

    $(document).ready(function(){
        $('#search-result-div').hide();
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
                data: {"search": $('#search').val() },
                success: function(i){
                    console.log(JSON.parse(i));
                    $('#search-result').html(i);
                }
            })
        }

    };
</script>

