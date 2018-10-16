<div class="main-content">
	<div class="card">
        <div class="card-body">
            <h1>Welcome to OLAS!</h1>
            <a href = "<?php echo base_url('Librarian'); ?>">Librarian</a>
            <div id = "book-container"></div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        var book = JSON.parse('<?php echo $book; ?>');
        $.each(book, function(index, data){
            $('#book-container').append('Catalogue: ').append(JSON.stringify(data)).append('<br />');
            $.ajax({
                url: "<?php echo base_url('Book/Get/'); ?>" + data.ISBN,
                async: false,
                success: function(i){                                        
                    $('#book-container').append('Book data: ').append(i).append('<hr />');                    
                }            
            });
        });
    });
</script>