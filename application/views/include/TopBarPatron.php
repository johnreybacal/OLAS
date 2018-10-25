<!-- Topbar -->
<header class="topbar topbar-expand-xl">
    <div class="topbar-left">
    <span class="topbar-btn topbar-menu-toggler"><i>&#9776;</i></span>
    <span class="logo"><img src="<?php echo base_url('assets/img/logo'); ?>" alt="logo-icon"></span>

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
                    <span class="icon fa fa-home"></span>
                    <span class="title">Bookbag</span>
                </a>
            </li>    

        </ul>
    </nav>

    </div>

    <div class="topbar-right">


    <div class="topbar-divider d-none d-md-block"></div>

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
        <li class="d-none d-md-block">
        <span class="topbar-btn has-new" data-toggle="quickview" data-target="#qv-bookbag"><i class="ti-bell"></i></span>
        </li>
        <!-- END Notifications -->

        <!-- Messages -->
        <li class="d-none d-md-block">
        <span class="topbar-btn" data-toggle="quickview" data-target="#qv-messages"><i class="ti-email"></i></span>
        </li>
        <!-- END Messages -->
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
<div id="qv-bookbag" class="quickview">
    <header class="quickview-header ">
    <p class="quickview-title">Bookbag</p>
    <span class="close"><i class="ti-close"></i></span>
    </header>

    <div class="quickview-body">
    <div id="bookbag" class="media-list media-list-hover media-list-divided media-sm">
           
    </div>
    </div>

    <footer class="quickview-footer flexbox">
    <div>
        <a href="<?php echo base_url('Bookbag/'); ?>">View Detailed Bookbag</a>
    </div>
    <div>
        <button class="btn-pure" onclick="Bookbag.removeAll()" data-provide="tooltip" title="Remove all"><i class="fa fa-trash"></i></>        
    </div>
    </footer>
</div>



<!-- Messages -->
<div id="qv-messages" class="quickview">
    <header class="quickview-header">
    <p class="quickview-title">Messages</p>
    <span class="close"><i class="ti-close"></i></span>
    </header>

    <div class="quickview-body">
    <div class="media-list media-list-divided media-list-hover">
        <a class="media media-new" href="#">
        <span class="avatar status-success">
            <img src="<?php echo base_url('assets/img/avatar/1'); ?>" alt="...">
        </span>

        <div class="media-body">
            <p><strong>Maryam Amiri</strong> <time class="float-right" datetime="2018-07-14 20:00">23 min ago</time></p>
            <p>Authoritatively exploit resource maximizing technologies before technically.</p>
        </div>
        </a>        
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
    });
    
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
                    $.ajax({
                        url: "<?php echo base_url('Bookbag/RemoveAll'); ?>",
                        success: function(i){
                            Bookbag.refresh();
                            // swal('Unbookbagged!', "All book removed from bookbag", 'success');
                        }
                    });
                }
            })
        },   

        reserve: function(){
            $.ajax({
                url: "<?php echo base_url('Bookbag/Get'); ?>",
                success: function(i){
                    i = JSON.parse(i);
                    var ok = true;
                    $.each(i, function(index, data){
                        $.ajax({
                            url: "<?php echo base_url('Reservation/Save'); ?>",
                            type: "POST",
                            data: {"reservation": {
                                ReservationId: 0,
                                MemberId: 1,
                                AccessionNumber: data.id
                            }},
                            error: function(){
                                ok = false
                            }
                        })
                    });
                    if(ok){
                        Bookbag.removeAll();
                    }else{
                        swal('Oops!', "Something went wrong", 'error');
                    }
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
        }
    };
</script>