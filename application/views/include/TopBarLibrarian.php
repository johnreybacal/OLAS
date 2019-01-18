<header class="topbar">
    <div class="topbar-left">
    <span class="topbar-btn sidebar-toggler"><i>&#9776;</i></span>

    <a class="topbar-btn d-none d-md-block" href="#" data-provide="fullscreen tooltip" title="Fullscreen">
        <i class="material-icons fullscreen-default">fullscreen</i>
        <i class="material-icons fullscreen-active">fullscreen_exit</i>
    </a>    

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
    </ul>

        
    </div>
</header>
