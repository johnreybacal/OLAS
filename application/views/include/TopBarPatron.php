<!-- Topbar -->
<header class="topbar topbar-expand-xl">  
    <div class="topbar-left">
        <span class="topbar-btn topbar-menu-toggler"><i>&#9776;</i></span>
        <span class="logo"><img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="logo-icon"></span>
        <div class="topbar-divider d-none d-md-block"></div>
        <nav class="topbar-navigation">
            <ul class="menu">
                <li class="menu-item">
                    <a class="menu-link" href="<?php echo base_url(); ?>">
                        <span class="icon fa fa-home"></span>
                        <span class="title">Home</span>
                    </a>
                </li>            

                <li class="menu-item">
                    <a class="menu-link" href="<?php echo base_url('Bookbag'); ?>">
                        <span class="icon fa fa-briefcase"></span>
                        <span class="title">Bookbag</span>
                    </a>
                </li>    
            </ul>
        </nav>        
    </div>

    <div class="topbar-right">


    <!-- <div class="topbar-divider d-none d-md-block"></div> -->

    <ul class="topbar-btns">
        <li class="dropdown">
        <span class="topbar-btn" data-toggle="dropdown"><img class="avatar" src="<?php echo base_url('assets/img/avatar/1'); ?>" alt="..."></span>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="#"><i class="ti-user"></i> Profile</a>            
            <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
            <a class="dropdown-item" href="#"><i class="ti-help"></i> Help</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo base_url('Patron/Logout'); ?>"><i class="ti-power-off"></i> Logout</a>
        </div>
        </li>

        <!-- Notifications -->
        <li class=" d-md-block">
        <span class="topbar-btn has-new" data-toggle="quickview" data-target="#qv-bookbag"><i class="ti-briefcase"></i></span>
        <span onclick="Message.refresh()" class="topbar-btn has-new" data-toggle="quickview" data-target="#qv-messages"><i class="ti-email"></i></span>
        </li>
        <!-- END Notifications -->
    </ul>

    <form class="lookup lookup-circle lookup-lg lookup-right" target="index.html">
        <input type="text" name="s">
    </form>
    </div>
</header>
<!-- END Topbar -->
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!-- Quickviews -->



<!-- Notifications -->
<div id="qv-bookbag" class="quickview backdrop-dark" style="border-left: 1px solid #48b0f7;">
    <header class="quickview-header bg-info">
    <p class="quickview-title">Bookbag</p>
    <span class="close"><i class="ti-close" style="color:white"></i></span>
    </header>

    <div class="quickview-body">
    <div id="bookbag" class="media-list media-list-hover media-list-divided media-sm">
           
    </div>
    </div>

    <footer class="quickview-footer flexbox">
    <div>
        <a class="btn btn-outline btn-info" href="<?php echo base_url('Bookbag/'); ?>">View Detailed Bookbag</a>
    </div>
    <div>
        <button class="btn btn-outline btn-danger" onclick="Bookbag.removeAll()" data-provide="tooltip" title="Remove all"><i class="fa fa-2x fa-trash"></i></>        
    </div>
    </footer>
</div>



<!-- Messages -->
<div id="qv-messages" class="quickview backdrop-dark" style="border-left: 1px solid #48b0f7;">
    <header class="quickview-header bg-info">
    <p class="quickview-title">Messages</p>
    <span class="close"><i class="ti-close" style="color:white"></i></span>
    </header>

    <div class="quickview-body">
    <div id="message" class="media-list media-list-divided media-list-hover">

    </div>
    </div>

    <footer class="quickview-footer flexbox">
    <div>
        <a href="#">Go to inbox</a>
    </div>
    <div>
        <a href="#" data-provide="tooltip" title="Mark all as read"><i class="fa fa-circle-o"></i></a>
        <a href="#" data-provide="tooltip" title="Update"><i class="fa fa-repeat"></i></a>
        <a href="#" data-provide="tooltip" title="Settings"><i class="fa fa-gear"></i></a>
    </div>
    </footer>
</div>



<!-- END Quickviews -->
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<script>
    $(document).ready(function(){
        Bookbag.refresh();
        Message.refresh();
    });
    
    var Message = {
        
        refresh: function(){
            $.ajax({
                url: "<?php echo base_url('Message/Get'); ?>",
                success: function(i){
                    $('#message').empty();
                    if(i != 'No data'){
                        i = JSON.parse(i);
                        $.each(i, function(index, data){                            
                            $('#message').append(
                                '<a class="media media-new" href="#">'
                                    + '<div class="media-body">'
                                        + '<p>' + data.Title + '</p>'                                        
                                        + '<p>' + data.Message + '</p>'                                        
                                        + '<p>' + data.DateTime + '</p>'                                        
                                    + '</div>'                                        
                                + '</a>'
                            );
                        });
                    }   
                }
            });
                
        }

    }

    var Bookbag = {
        add: function(id, isbn){
            $.ajax({
                url: "<?php echo base_url('Bookbag/Add'); ?>/" + id + '/' + isbn,
                success: function(i){
                    if(i == 1){
                        swal('Bookbagged!', "Book has been added to bookbag", 'success');
                        Bookbag.refresh();
                    }else{
                        swal('Bookbagged! Again?', "Book is aleady in your bookbag", 'warning');
                    }
                },
                error: function(){
                    swal('Oops!', "Something went wrong", 'error');
                }
            })
        },

        remove: function(id){
            $.ajax({
                url: "<?php echo base_url('Bookbag/Remove'); ?>/" + id,
                success: function(i){
                    $('#' + id).fadeOut({
                        complete: function(){
                            $(this).remove();
                        }
                    })
                    $('#bookbag-table').DataTable().ajax.reload();
                    // swal('Unbookbagged!', "Book removed from bookbag", 'success');
                },
                error: function(){
                    // swal('Oops!', "Something went wrong", 'error');
                }
            })
        },       

        removeAll: function(){
            swal({
                title: 'Empty bookbag',
                text: 'Are you sure?',
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: 'No! Cancel',
                cancelButtonClass: 'btn btn-default',
                confirmButtonText: 'Yes! Go for it',
                confirmButtonClass: 'btn btn-info'
            }).then((result) => {
                if (result.value) {                    
                    Bookbag.removeAllAjax();
                }
            })
        },          

        removeAllAjax: function(){
            $.ajax({
                url: "<?php echo base_url('Bookbag/RemoveAll'); ?>",
                success: function(i){
                    Bookbag.refresh();                
                }
            });
        }, 

        refresh: function(){
            $.ajax({
                url: "<?php echo base_url('Bookbag/Get'); ?>",
                success: function(i){
                    $('#bookbag').children().fadeOut({
                        complete: function(){
                            $(this).remove();
                        }
                    });
                    if(i != 'No data'){
                        i = JSON.parse(i);
                        $.each(i, function(index, data){
                            console.log(data);
                            $.ajax({
                                url: "<?php echo base_url('Book/Get'); ?>/" + data.ISBN,
                                success: function(j){
                                    j = JSON.parse(j);
                                    $('#bookbag').append(
                                        '<a id="' + data.rowid + '"class="media media-new" href="#">'
                                        + '<span class="avatar bg-success"><i class="ti-user"></i></span>'
                                        + '<div class="media-body">'
                                            + '<p>' + j.book.Title + '</p>'                                        
                                        + '</div>'
                                        + '<span onclick="Bookbag.remove(\'' + data.rowid + '\')"><i class="ti-close"></i></span>'
                                        + '</a>'
                                    );
                                }
                            });
                        })
                    }else{
                        $('#bookbag').append('<p class="media">Bookbag is empty<br />Books in bookbag will be displayed here</p>')
                    }
                }
            });
        },

        reserve: function(){
            swal({
                title: 'Reserve books in bookbag?',
                text: 'You must pick up the books at the library before 3 days or else your reservation will be discarded',
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: 'No! Cancel',
                cancelButtonClass: 'btn btn-default',
                confirmButtonText: 'Yes! Go for it',
                confirmButtonClass: 'btn btn-info'
            }).then((result) => {
                if (result.value) {                                        
                    $.ajax({
                        url: "<?php echo base_url('Reservation/Save'); ?>",
                        success: function(i){                        
                            Bookbag.removeAllAjax();
                            $('#bookbag-table').DataTable().ajax.reload();
                            swal('Reservation complete', "Please pick up your books before your reservation is discarded", 'success');                            
                        },
                        error: function(i){
                            swal('Oops!', "Something went wrong", 'error');                            
                            console.log(i);
                        }
                    });
                }
            })            
        }

    };
</script>