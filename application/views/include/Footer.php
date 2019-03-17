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
        var val = $.fn.val;
        $.fn.val = function(value){
            if(typeof value == 'undefined'){
                console.log(this);                
                var x = val.call(this) + ""; 
                if(this[0].localName == 'input'){                    
                    return x.replace(/"/g, "\\\"").replace(/'/g, "\\\'");
                }
                else{
                    return val.call(this);
                }
            }
            else{
                return val.call(this, value);
            }
        };
        // val = $.fn.val;             
        $('form').submit(function(form){
            form.preventDefault();
        });
        $('.bootstrap-select').attr(
        // $('div.btn-group.bootstrap-select').attr({
            // 'data-selected-text-format':'count > 3',
            'data-size','10'
        );
        // Autofocus on first input in every form.class akala ko nagana pota
        $("form.form input:text:visible:first").focus();
        console.log($("form.form input:text:visible:first").val());
        // Autofocus on modal sapa to
        $('.modal').on('shown.bs.modal', function() {
            $(this).find('[autofocus]').focus();
        });
        
        // gumagana pero minsan bug nadidisplay parin lahat
        // $("#DatePublished").datepicker({
        //     format: " yyyy",
        //     viewMode: "years", 
        //     minViewMode: "years"
        // });

        var $window = $(window);
        $window.resize(function resize() {
            if ($window.width() >= 768) {
                $('table').removeClass('table-responsive');
            }
            else{
                $('table').addClass('table-responsive');  
            }
            //$html.addClass('mobile');
            //$html.removeClass('mobile');
        }).trigger('resize');

        // var $window = $(window);
        // console.log("una");
        // $window.resize(function resize() {
        //     if ($window.width() > 768) {
        //         $('table').addClass('table-responsive');
        //         $('table').closest('div')removeClass('table-responsive');
        //         console.log(">768");
        //     }
        //     else{
        //         $('table').removeClass('table-responsive');  
        //         $('table').closest('div').addClass('table-responsive');  
        //         console.log("else");
        //     }
        // }).trigger('resize');
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
<!-- <script src = "<?php echo base_url('assetsOLAS/js/custom1.js'); ?>"></script>   -->

</body>
</html>
