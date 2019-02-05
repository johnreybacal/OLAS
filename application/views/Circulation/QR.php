<script src = "<?php echo base_url('assets/js/script/plugins/qrcode.min.js'); ?>"></script>

<header class="header header-inverse bg-ui-general"> 
	<div class="container">
		<div class="header-info">
			<div class="left">
				<h2 class="header-title"><strong></strong> <small class="subtitle">Generate QR Code</small></h2>
			</div>
		</div>	
	</div>
</header> 
<div class="main-content">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Call Number</th>
                                <th style="width: 50px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select id="ISBN" name="ISBN" data-provide="selectpicker" title="Choose Book" data-live-search="true" class="form-control show-tick"></select>
                                </td>
                                <td>
                                    <select id="CallNumber" name="Call Number" data-provide="selectpicker" title="Choose Call Number" data-live-search="true" class="form-control show-tick"></select>
                                </td>
                                <td style="width: 50px">
                                    <a href="#" class="btn btn-outline-success" id="add-book" data-container="body" data-toggle="tooltip" title="" data-original-title="Add Book">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <form id="books" class="validate-books" novalidate="novalidate">
                        <table id="selectedBook" class="table" >
                            <thead>
                                <tr>
                                    <th>Book</th>
                                    <th style="width: 160px;">Quantity</th>
                                    <th style="width: 65px"></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <button class="btn btn-primary pull-right" id="generate">
                            <span class="btn-icon"><i class="icon-magic-wand"></i></span> Generate
                        </button>
                        <button type="button" class="btn btn-primary pull-left" id="print">
                            <span class="btn-icon"><i class="icon-printer"></i></span> Print
                        </button>
                    </form>
                </div>
            </div>
        </div>
</div>
<!-- <div id="qrcode"></div>; -->
<div class="container-fluid" style="height: ">
    <div class="pages" id="printpage">
    </div>
</div>
<br/>>

<script>
    $(document).ready(function(){
        Dashboard.init();
    });    

    var Dashboard = {
        init: function(){            
            $.ajax({
                url: "<?php echo base_url("Book/GetAll"); ?>",
                success: function(i){
                    i = JSON.parse(i);                                        
                    $('#ISBN').empty();
                    $.each(i, function(index, data){                        
                        $('#ISBN').append('<option value = "' + data.ISBN + '">' + data.ISBN + ' | ' + data.Title + '</option>');
                    })
                    $('#ISBN').selectpicker('refresh');
                }
            })
            $('#ISBN').change(function(){
                $.ajax({
                    url: "<?php echo base_url('Book/GetCatalogueByISBN/'); ?>" + $(this).selectpicker('val'),
                    success: function(i){
                        i = JSON.parse(i);                                        
                        $('#CallNumber').empty();
                        $.each(i, function(index, data){                        
                            $('#CallNumber').append('<option value = "' + data.AccessionNumber + '">' + data.CallNumber + '</option>');
                        })
                        $('#CallNumber').selectpicker('refresh');
                    }
                });
            });           
        }
    };

    $('#add-book').on('click', function(){
        var title = $('#ISBN').children("option:selected").text();
        var callnumber = $('#CallNumber').children("option:selected").text();
        var isbn = $('#ISBN').children("option:selected").val();
        var accession = $('#CallNumber').children("option:selected").val();
        var deleteButton = '<a href="#" class="btn btn-outline-danger border deleteBook" title="Delete Book"><i class="fa fa-times"></i></a>';
        $('#selectedBook tbody').append('<tr data-isbn=\"'+isbn+'\" data-accession=\"'+accession+'\" data-callnumber=\"'+callnumber+'\"><td class=\"isbn\">'+title+'</td><td class = \"accession\">'+callnumber+'</td><td>'+deleteButton+'</td></tr>');
        
        $('.deleteBook').click(function(){
            console.log($(this));
            $(this).parent().parent().remove();
        });
    });

    $('#generate').on('click', function(){
        var mainPage = "<div class='a4-page' id='a4-page' style='padding-top: 10.5mm;padding-bottom: 4.5mm; padding-left: 7.75mm; padding-right: 7.75mm'></div>";
        $('.a4-page').remove();
        $('.pages').append(mainPage);
       
        $.each($('#selectedBook tbody').children(), function(index, data){
            // console.log(index);
            // console.log(data);
            // console.log("isbn: " + $(data).data('isbn'));
            // // console.log("isbn: " + $(data).children().each('isbn').text());
            // console.log("accession: " + $(data).data('accession'));
            // console.log("call number: " + $(data).data('callnumber'));
            
            var qrOnPage = '<div class="barcode-card" style="width: 63.5mm;height: 64.87mm; border-radius: 1.5mm;margin-bottom: mm;margin-left: 0.33333333333333mm; margin-right: 0.33333333333333mm;">';
                qrOnPage += '<div class="row">';
                qrOnPage += '<div class="col-sm-12">';
                qrOnPage +=     '<h4 class="book-title" style="font-size: 1em;">'+$(data).data('isbn')+'</h4>';
                qrOnPage += '</div>';
                qrOnPage += '<div class="col-sm-12 text-center" id="qrcode'+index+'"></div>';
                qrOnPage += '<div class="col-sm-12" style="font-size: 0.75em;">';
                qrOnPage +=     '<div class="book-meta custom-text">OLAS</div>';
                qrOnPage += '</div>';
                qrOnPage += '</div>';
                qrOnPage += '</div>';
            $('.pages').children().append(qrOnPage);

            var qrcode = new QRCode("qrcode"+index);
            var codetoQR = '' + ($(data).data('accession'));
            function makeCode () {   
                qrcode.makeCode(codetoQR);
            }
            makeCode();
            $("#qrcode"+index+" > img").css({"margin":"auto", "height":"170px", "width":"170px"});

        });
    });

    $(document).on('click', '#print', function (e) {
        var restorepage = document.body.innerHTML;
        var toPrint = document.getElementById('printpage').innerHTML;
        document.body.innerHTML = toPrint;
        window.print();
        document.body.innerHTML = restorepage;
    });
    
</script>