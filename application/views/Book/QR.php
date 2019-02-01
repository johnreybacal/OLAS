<script src = "<?php echo base_url('assets/js/script/plugins/qrcode.min.js'); ?>"></script>
<script src = "<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>	

<div class="col-md-6" style="margin:auto;">
	<div class="card">
        <div class="card-title">
            <h4>Accession Number: <?php echo $book->AccessionNumber; ?></h4>
        </div>
        <div class="card-body">
            <div id="qrcode"></div>
            <br />
            <div id="text" type="text" value="<?php echo $book->AccessionNumber; ?>" style="width:80%"></div>
            <!-- <br /> -->
        </div>
        <div class="card-footer">
            <a href="" class="btn btn-info btn-md" onclick="print();" class="myButton">Print QR</a>
        </div>
            <!-- <br/> -->
    </div>
</div>

<script>
    setTimeout(getqrUrl, 1000);
    setTimeout(loadqrurl, 1000);
    var qrcode = new QRCode("qrcode");
    var urlqr;

    function makeCode () {      
        var elText = "<?php echo $book->AccessionNumber; ?>";
        var link = "<?php echo base_url('Book/View/');?>" + elText;
        qrcode.makeCode(elText);

    }
    makeCode();

    function getqrUrl(urlqr) {
        return urlqr = $("#qrcode img").attr("src");
    }

    function loadqrurl() {
        return "<html><head><script>function step1(){\n" +
				"setTimeout('step2()', 10);}\n" +
				"function step2(){window.print();window.close()}\n" +
				"</scri" + "pt></head><body onload='step1()'>\n" +
				"<img src='" + getqrUrl(urlqr) + "' /></body></html>";
    }

   function print() {
     console.log(getqrUrl(urlqr));
     const printWin = window.open('', '', 'width=' + screen.availWidth + ',height=' + screen.availHeight);
     printWin.document.open();
     printWin.document.write(loadqrurl()); 
     printWin.focus();
     printWin.print();
     printWin.document.close();
     printWin.close();
   }

</script>