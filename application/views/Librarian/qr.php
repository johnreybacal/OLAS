<script src = "<?php echo base_url('assets/js/script/plugins/qrcode.min.js'); ?>"></script>
<script src = "<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>	

<body>    
    <input id="text" type="text" value="boo" style="width:80%" /><br />
    <div id="qrcode"></div>
</body>

<script>
    var qrcode = new QRCode("qrcode");

    function makeCode () {      
        var elText = document.getElementById("text");
        
        if (!elText.value) {
            alert("Input a text");
            elText.focus();
            return;
        }
        
        qrcode.makeCode(elText.value);
    }

    makeCode();

    $("#text").
        on("blur", function () {
            makeCode();
        }).
        on("keydown", function (e) {
            if (e.keyCode == 13) {
                makeCode();
            }
    });
</script>