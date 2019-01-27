<script src = "<?php echo base_url('assets/js/script/plugins/qrcode.min.js'); ?>"></script>
<script src = "<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>	

<div class="main-content">
	<div class="card">
		<div class="card-body">
            <div><h4><?php echo $book->AccessionNumber; ?></h2></div>
            <div id="qrcode"></div>
            <br />
            <div id="text" type="text" value="<?php echo $book->AccessionNumber; ?>" style="width:80%"></div>
            <br />
            
            <a href="" class="btn btn-info btn-md" onclick="print();" class="myButton">Print QR</a>
            <br/>
        </div>
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
        qrcode.makeCode(link);

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