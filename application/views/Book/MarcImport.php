<div class="main-content">
	<div class="card">
		<div class="card-body">
            <input type = "file" id = "marc-input" class="form-control" />
            <button onclick="MarcImport.upload()" class="btn btn-primary">Upload</button>
            <button onclick="MarcImport.import()" id="import-button" class="btn btn-primary">Import</button>
            <div id="table-responsive">
                <table id="marc-table" class="table table-striped table-bordered display nowrap" style="width:100%; overflow-x:auto;" cellspacing="0" data-provide = "datatables">
                    <thead>
                        <tr>
                            <td>ISBN</td>
                            <td>Title</td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>    
    var MarcImport = {
        
        init: function(){
            $('#import-button').hide();
        },

        upload: function(){           
            var fileToLoad = document.getElementById("marc-input").files[0];

            var fileReader = new FileReader();
            fileReader.onload = function(fileLoadedEvent){
                var text = fileLoadedEvent.target.result;			    
                marc.read(text);
            };
            fileReader.readAsText(fileToLoad, "UTF-8");			            
        },

        success: function(){
            $('#marc-table tbody').empty();
            for(var i = 0; i < isbn.length; i++){
                $('#marc-table tbody').append('<tr><td>' + isbn[i] + '</td><td>' + title[i] + '</td></tr>')
            }
            $('#import-button').show();
        }, 

        import: function(){
            $.ajax({
                url: "<?php echo base_url('Book/ImportMarc'); ?>",
                type: "POST",
                data: {
                    "marc":{
                        "isbn": isbn,
                        "title": title
                    }
                },
                success: function(i){
                    console.log(i);
                }
            });
        }

    };

    MarcImport.init();
</script>