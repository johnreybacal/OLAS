<header class="topbar">
    <div class="topbar-left">
        <span class="topbar-btn sidebar-toggler"><i>&#9776;</i></span>

        <div class="d-none d-md-block ">
            <!-- <form class="lookup lookup-circle lookup-left lookup-sm" target="index.html">
                <input id="search" class="form-control" type="text" placeholder="Search" value="">
                <button onclick="Search.search();" class="btn">Search</button>
            </form> -->
            <!-- <form class="lookup lookum no-icon">
              <input class="no-radius" type="text" placeholder="Keyword">
              <select class="d-none d-sm-block" data-provide="selectpicker" multiple>
                <option selected>Any type</option>
                <option>Website</option>
                <option>Image</option>
                <option>Video</option>
                <option>Map</option>
              </select>
              <select class="d-none d-sm-block" data-provide="selectpicker">
                <option selected>Any time</option>
                <option>Last year</option>
                <option>Last month</option>
                <option>Last week</option>
                <option>Last 24 hours</option>
              </select>
              <button class="btn btn-primary btn-bold no-radius fs-14">Search</button>
            </form> -->
        </div>
    </div>
    <div class="topbar-center d-md-block">
        <div id="search-div">
            <form class="lookup lookup-lg lookup-lib no-icon">
                <input class="no-radius" id="search" type="text" placeholder="Search">
                <select class="d-block librarian-search ds-none" data-provide="selectpicker" multiple>
                    <option selected>Book</option>
                    <option selected>Author</option>
                    <option selected>Subject</option>
                    <option selected>Section</option>
                    <option selected>Series</option>
                    <option selected>Publisher</option>
                </select>
                <button class="btn btn-info btn-bold no-radius fs-12" onclick="Search.search();" style="padding-top: 4px!important;" data-provide="tooltip" title="Search"><i class="fa fa-search fa-2x"></i></button>
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
