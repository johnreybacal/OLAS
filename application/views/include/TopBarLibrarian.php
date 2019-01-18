<header class="topbar">
    <div class="topbar-left">
    <span class="topbar-btn sidebar-toggler"><i>&#9776;</i></span>

    <!-- <a class="topbar-btn d-none d-md-block" href="#" data-provide="fullscreen tooltip" title="Fullscreen">
        <i class="material-icons fullscreen-default">fullscreen</i>
        <i class="material-icons fullscreen-active">fullscreen_exit</i>
    </a> -->    

    <div class="topbar-divider d-none d-md-block"></div>
    <div class="lookup d-none d-md-block ">
        <form class="lookup">
            <input id="search" class="form-control" type="text" placeholder="Search" value="">
            <button onclick="Search.search();" class="btn">Search</button>
        </form>
    </div>
    <!-- <div class="lookup d-none d-md-block topbar-search" id="theadmin-search">
        <input class="form-control w-300px" type="text">
        <div class="lookup-placeholder">
        <i class="ti-search"></i>
        <span><strong>Search</strong> for a book</span>
        </div>
    </div> -->
    </div>

    <div class="topbar-right">
    <a class="topbar-btn" href="#qv-global" data-toggle="quickview" hidden> <i class="ti-align-right"></i></a>

    <ul class="topbar-btns">
        <li class="dropdown">
        <span class="topbar-btn" data-toggle="dropdown"><img class="avatar avatar-sm" src="<?php echo base_url('assets/img/avatar/1.jpg'); ?>" alt="..."></span>
        <div class="dropdown-menu dropdown-menu-right">            
            <a class="dropdown-item" href="<?php echo base_url('Librarian/Profile/'.$this->session->userdata('librarianId')); ?>"><i class="ti-user"></i> <?php echo $this->session->userdata('username'); ?></a>
            <a class="dropdown-item" href="<?php echo base_url('Librarian/Setting'); ?>"><i class="ti-settings"></i> Settings</a>            
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo base_url('Librarian/LogOut'); ?>"><i class="ti-power-off"></i> Logout</a>
        </div>
        </li>

        <!-- Notifications -->
        <li class="dropdown">
        <span class="topbar-btn has-new" data-toggle="dropdown"><i class="ti-bell"></i></span>
        <div class="dropdown-menu dropdown-menu-right">

            <div class="media-list media-list-hover media-list-divided media-sm">
            <a class="media media-new" href="#">
                <span class="avatar bg-success"><i class="ti-user"></i></span>
                <div class="media-body">
                <p>New user registered</p>
                <time datetime="2018-07-14 20:00">Just now</time>
                </div>
            </a>

            <a class="media" href="#">
                <span class="avatar bg-info"><i class="ti-shopping-cart"></i></span>
                <div class="media-body">
                <p>New order received</p>
                <time datetime="2018-07-14 20:00">2 min ago</time>
                </div>
            </a>

            <a class="media" href="#">
                <span class="avatar bg-warning"><i class="ti-face-sad"></i></span>
                <div class="media-body">
                <p>Refund request from <b>Ashlyn Culotta</b></p>
                <time datetime="2018-07-14 20:00">24 min ago</time>
                </div>
            </a>

            <a class="media" href="#">
                <span class="avatar bg-primary"><i class="ti-money"></i></span>
                <div class="media-body">
                <p>New payment has made through PayPal</p>
                <time datetime="2018-07-14 20:00">53 min ago</time>
                </div>
            </a>
            </div>

            <div class="dropdown-footer">
            <div class="left">
                <a href="#">Read all notifications</a>
            </div>

            <div class="right">
                <a href="#" data-provide="tooltip" title="Mark all as read"><i class="fa fa-circle-o"></i></a>
                <a href="#" data-provide="tooltip" title="Update"><i class="fa fa-repeat"></i></a>
                <a href="#" data-provide="tooltip" title="Settings"><i class="fa fa-gear"></i></a>
            </div>
            </div>

        </div>
        </li>
        <!-- END Notifications -->

        <!-- Messages -->
        <li class="dropdown">
        <span class="topbar-btn" data-toggle="dropdown"><i class="ti-email"></i></span>
        <div class="dropdown-menu dropdown-menu-right">

            <div class="media-list media-list-divided media-list-hover scrollable" style="height: 280px">
            <a class="media media-new" href="#">
                <span class="avatar status-success">
                <img <?php echo base_url('../assets/img/avatar/1.jpg'); ?> alt="...">
                </span>

                <div class="media-body">
                <p><strong>Maryam Amiri</strong> <time class="float-right" datetime="2018-07-14 20:00">23 min ago</time></p>
                <p>Authoritatively exploit resource maximizing technologies before technically.</p>
                </div>
            </a>

            <a class="media media-new" href="#">
                <span class="avatar status-warning">
                <img <?php echo base_url('../assets/img/avatar/2.jpg'); ?> alt="...">
                </span>

                <div class="media-body">
                <p><strong>Hossein Shams</strong> <time class="float-right" datetime="2018-07-14 20:00">48 min ago</time></p>
                <p>Continually plagiarize efficient interfaces after bricks-and-clicks niches.</p>
                </div>
            </a>

            <a class="media" href="#">
                <span class="avatar status-dark">
                <img <?php echo base_url('../assets/img/avatar/3.jpg'); ?> alt="...">
                </span>

                <div class="media-body">
                <p><strong>Helen Bennett</strong> <time class="float-right" datetime="2018-07-14 20:00">3 hours ago</time></p>
                <p>Objectively underwhelm cross-unit web-readiness before sticky outsourcing.</p>
                </div>
            </a>

            <a class="media" href="#">
                <span class="avatar status-success bg-purple">FT</span>

                <div class="media-body">
                <p><strong>Fidel Tonn</strong> <time class="float-right" datetime="2018-07-14 20:00">21 hours ago</time></p>
                <p>Interactively innovate transparent relationships with holistic infrastructures.</p>
                </div>
            </a>

            <a class="media" href="#">
                <span class="avatar status-danger">
                <img <?php echo base_url('../assets/img/avatar/4.jpg'); ?> alt="...">
                </span>

                <div class="media-body">
                <p><strong>Freddie Arends</strong> <time class="float-right" datetime="2018-07-14 20:00">Yesterday</time></p>
                <p>Collaboratively visualize corporate initiatives for web-enabled value.</p>
                </div>
            </a>
            </div>

            <div class="dropdown-footer">
            <div class="left">
                <a href="#">Read all messages</a>
            </div>

            <div class="right">
                <a href="#" data-provide="tooltip" title="Mark all as read"><i class="fa fa-circle-o"></i></a>
                <a href="#" data-provide="tooltip" title="Settings"><i class="fa fa-gear"></i></a>
            </div>
            </div>

        </div>
        </li>
        <!-- END Messages -->
    </ul>

        
    </div>
</header>
