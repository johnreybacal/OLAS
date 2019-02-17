<div class="main-content">
	<div class="card">
		<div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <h6 class="mb-1">Marc File</h6>
                    <input type="file" id="marc-input" data-provide="dropify" data-show-remove="false">
                </div>
                <!-- <input type = "file" id = "marc-input" class="form-control" /> -->
                <div class="col-md-3" style="margin: auto;">
                    <h6>&nbsp;</h6>
                    <button class="btn btn-w-lg btn-multiline btn-info" onclick="MarcImport.upload()"><i class="ti-upload fs-20"></i><br>Upload</button>
                    <button class="btn btn-w-lg btn-multiline btn-info" onclick="MarcImport.import()" id="import-button" style="margin-top: 5px;"><i class="ti-import fs-20"></i><br>Import</button>
                </div>
            </div>
            <!-- <button onclick="MarcImport.upload()" class="btn btn-primary">Upload</button> -->
            <!-- <button onclick="MarcImport.import()" id="import-button" class="btn btn-primary">Import</button> -->
            <div id="table-responsive" class="table-responsive">
                <table id="marc-table" class="table tab;e-responsive table-striped table-bordered display nowrap" style="width:100%; overflow-x:auto;" cellspacing="0" data-provide = "datatables">
                    <thead>
                        <tr class="bg-info">
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