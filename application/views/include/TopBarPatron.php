<!-- Topbar -->
<header class="topbar topbar-expand-xl">  
    <div class="topbar-left">
        <span class="topbar-btn topbar-menu-toggler"><i>&#9776;</i></span>
        <a href="<?php echo base_url('') ?>" class="logo"><img src="<?php echo base_url('assetsOLAS/img/icons/favicon-32x32.png'); ?>" alt="logo-icon" style="display: nonea;"></a>
        <nav class="topbar-navigation">
            <ul class="menu">

                <li class="menu-item">
                    <a class="menu-link" href="<?php echo base_url('Bookbag'); ?>">
                        <span class="icon fa fa-briefcase"></span>
                        <span class="title">Bookbag</span>
                    </a>
                </li>    
                
                <li class="menu-item">
                    <a class="menu-link" href="<?php echo base_url('MyReservations'); ?>">
                        <span class="icon fa fa-briefcase"></span>
                        <span class="title">My Reservations</span>
                    </a>
                </li>    
                
                <li class="menu-item">
                    <a class="menu-link" href="<?php echo base_url('MyBooks'); ?>">
                        <span class="icon fa fa-briefcase"></span>
                        <span class="title">My Books</span>
                    </a>
                </li> 

                <!-- <li class="menu-item">
                    <a class="menu-link" href="#">
                        <span class="icon fa fa-briefcase" data-toggle="quickview" data-target="#qv-bookbag"></span>
                        <span class="title">Bookbag</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link" href="#">
                        <span class="icon fa fa-briefcase" onclick="Message.refresh()"data-toggle="quickview" data-target="#qv-messages"></span>
                        <span class="title">Message</span>
                    </a>
                </li>    -->
            </ul>
        </nav>  
    </div>
    <div class="topbar-center d-none d-md-block">
        <form class="lookup lookup-lg no-icon">
            <input class="no-radius" id="search" type="text" placeholder="Search">
            <select class="d-none d-block librarian-search" data-provide="selectpicker" multiple>
                <option selected>Book</option>
                <option selected>Author</option>
                <option selected>Subject</option>
                <option selected>Section</option>
                <option selected>Series</option>
                <option selected>Publisher</option>
            </select>
            <button class="btn btn-info btn-bold no-radius fs-12" onclick="Search.search();" style="padding-top: 4px!important;"><i class="fa fa-search fa-2x"></i></button>
        </form>      
    </div>
    
    <div class="topbar-right">

        <ul class="topbar-btns">
        <!-- Profile Dropdown -->
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
        <!-- Bookbag Quick View -->
            <li class="d-none d-md-block">
                <span class="topbar-btn has-newa" style="color: #aaa" data-toggle="quickview" data-target="#qv-bookbag"><i class="ti-briefcase"></i></span>
            </li>
        <!-- Message Quick View -->
            <li class="d-md-block">
                <span onclick="Message.refresh()" class="topbar-btn has-newa" style="color: #aaa;" data-toggle="quickview" data-target="#qv-messages"><i class="ti-email"></i></span>
            </li>
        </ul>

        <!-- Search Form -->
        <!-- <form class="lookup lookup-circle lookup-right lookup-sm" target="index.html">
              <input type="text" name="s">
        </form> -->

    </div>
</header>
<!-- END Topbar -->

                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<!-- Quickviews -->

<!-- Bookbag -->
<div id="qv-bookbag" class="quickview backdrop-dark" style="border-left: 1px solid #48b0f7;">
    <header class="quickview-header bg-info">
        <p class="quickview-title lead form-title-message">Bookbag</p>
        <span class="close"><i class="ti-close" style="color:white"></i></span>
    </header>

    <div class="quickview-body">
        <div id="bookbag" class="media-list media-list-hover media-list-divided media-sm"></div>
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
        <p class="quickview-title form-title-message">Messages</p>
        <span class="close"><i class="ti-close" style="color:white"></i></span>
    </header>

    <div class="quickview-body">
        <div id="message" class="media-list media-list-divided media-list-hover"></div>
    </div>

    <footer class="quickview-footer flexbox">
        <div style="float: right;">
            <a href="#" data-provide="tooltip" class="close form-title" style="float: right;">Close</a>
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
                    if(i != '{}'){
                        i = JSON.parse(i);
                        $.each(i, function(index, data){                            
                            $('#message').append(
                                '<a class="media media-new" href="#">'
                                    + '<div class="media-body">'
                                        + '<p style="font-weight:bold;">' + data.Title + '</p>'                                        
                                        + '<p class="message-text">' + data.Message + '</p>'                                        
                                        + '<p><time class="float-right" datetime="2019-01-30 20:00">' + data.DateTime + '</p>'                                        
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
                    if(i != '{}'){
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