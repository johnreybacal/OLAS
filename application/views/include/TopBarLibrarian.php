<header class="topbar">
    <div class="topbar-left">
        <span class="topbar-btn sidebar-toggler"><i>&#9776;</i></span>

        <div class="d-none d-md-block ">
            <form class="lookup lookup-circle lookup-left lookup-sm" target="index.html">
                <input id="search" class="form-control" type="text" placeholder="Search" value="">
                <button onclick="Search.search();" class="btn">Search</button>
            </form>
        </div>
    
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
