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

<!-- Global quickview -->
<div id="qv-global" class="quickview" data-url="../assets/data/quickview-global.html">
    <div class="spinner-linear">
    <div class="line"></div>
    </div>
</div>
<!-- END Global quickview -->


<!-- Scripts -->
<script>
    $(document).ready(function(){
        $('form').submit(function(form){
            form.preventDefault();
        });
    });

</script>
<script src = "<?php echo base_url('assets/js/core.min.js'); ?>"></script>
<script src = "<?php echo base_url('assets/js/app.min.js'); ?>"></script>
<script src = "<?php echo base_url('assets/js/script.min.js'); ?>"></script>

</body>
</html>
