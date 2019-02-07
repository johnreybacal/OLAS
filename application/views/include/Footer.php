<footer class="site-footer">
    <div class="row">
        <div class="col-md-6">
            <p class="text-center text-md-left">Copyright © 2018 <a href="#">OLAS</a>. All rights reserved.</p>
        </div>

        <div class="col-md-6">
            <ul class="nav nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('About'); ?>">About OLAS</a>
                </li>            
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('Developers'); ?>">About the developers</a>
                </li>
            </ul>
        </div>
    </div>
</footer>
    <!-- END Footer -->

</main>
<!-- END Main container -->


<!-- Scripts -->
<script>    
    $(document).ready(function(){               
        $('form').submit(function(form){
            form.preventDefault();
        });
        $('select').attr(
            // 'data-selected-text-format':'count > 3',
            'data-size','10'
        );
        var $window = $(window);
        $window.resize(function resize() {
            if ($window.width() > 768) {
                $('table').removeClass('table-responsive');
            }
            else{
                $('table').addClass('table-responsive');  
            }
            //$html.addClass('mobile');
            //$html.removeClass('mobile');
        }).trigger('resize');
    });

    function ExportExcel(id){
        var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
        var textRange; var j=0;
        tab = document.getElementById(id); // id of table

        for(j = 0 ; j < tab.rows.length ; j++) 
        {     
            tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
            //tab_text=tab_text+"</tr>";
        }

        tab_text=tab_text+"</table>";
        // tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
        // tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
        // tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

        var ua = window.navigator.userAgent;
        var msie = ua.indexOf("MSIE "); 

        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
        {
            txtArea1.document.open("txt/html","replace");
            txtArea1.document.write(tab_text);
            txtArea1.document.close();
            txtArea1.focus(); 
            sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
        }  
        else                 //other browser not tested on IE 11
            sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

        return (sa);
    }

</script>
<script src = "<?php echo base_url('assets/js/core.min.js'); ?>"></script>
<script src = "<?php echo base_url('assets/js/app.min.js'); ?>"></script>
<script src = "<?php echo base_url('assets/js/script.min.js'); ?>"></script>
<script src = "<?php echo base_url('assets/vendor/moment/moment.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/script/plugins/qr-scanner.min.js'); ?>" type="module" ></script>
<script src="<?php echo base_url('assets/js/script/plugins/qr-scanner-worker.min.js'); ?>"></script>
<!-- <script src = "<?php echo base_url('assets/vendor/datatables/js/jquery.dataTables.min.js'); ?>"></script>   -->
<script src = "<?php echo base_url('assets/vendor/bootstrap-select/js/bootstrap-select.min.js'); ?>"></script>  

</body>
</html>
