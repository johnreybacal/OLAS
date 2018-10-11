<aside class="sidebar sidebar-icons-right sidebar-icons-boxed sidebar-expand-lg">
    <header class="sidebar-header">
        <a class="logo-icon" href="../index.html"><img <?php echo base_url('../assets/img/logo-icon-light.png'); ?> alt="logo icon"></a>
        <span class="logo">
            <a href="../index.html"><img <?php echo base_url('../assets/img/logo-light.png'); ?> alt="logo"></a>
        </span>
        <span class="sidebar-toggle-fold"></span>
    </header>

    <nav class="sidebar-navigation">
        <ul class="menu">            

            <li class="menu-item active">
                <a class="menu-link" href="<?php echo base_url('Librarian/Dashboard'); ?>">
                    <span class="icon fa fa-home"></span>
                    <span class="title">Dashboard</span>
                </a>
            </li>        
                
            <li class="menu-category">Librarian</li>

            <li class="menu-item">
                <a class="menu-link" href="#">
                    <span class="icon fa fa-plus-circle"></span>
                    <span class="title">Acquisition</span>
                    <span class="arrow"></span>
                </a>

                <ul class="menu-submenu">
                    <li class="menu-item">
                        <a class="menu-link" href="<?php echo base_url('Book/Acquire'); ?>">
                            <span class="dot"></span>
                            <span class="title">Add Book</span>
                        </a>
                    </li>                    
                </ul>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="#">
                    <span class="icon fa fa-plus-circle"></span>
                    <span class="title">Cataloguing</span>
                    <span class="arrow"></span>
                </a>

                <ul class="menu-submenu">
                    <li class="menu-item">
                        <a class="menu-link" href="<?php echo base_url('Book/Catalogue'); ?>">
                            <span class="dot"></span>
                            <span class="title">Catalogue Book</span>
                        </a>
                    </li>                    
                </ul>
            </li>
            
            <li class="menu-item">
                <a class="menu-link" href="#">
                    <span class="icon fa fa-pie-chart"></span>
                    <span class="title">Circulation</span>
                    <span class="arrow"></span>
                </a>

                <ul class="menu-submenu">
                    <li class="menu-item">
                        <a class="menu-link" href="<?php echo base_url('Circulation'); ?>">
                            <span class="dot"></span>
                            <span class="title">Book Circulations</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a class="menu-link" href="<?php echo base_url(''); ?>">
                            <span class="dot"></span>
                            <span class="title">Issued books</span>
                        </a>
                    </li>  

                    <li class="menu-item">
                        <a class="menu-link" href="<?php echo base_url(''); ?>">
                            <span class="dot"></span>
                            <span class="title">Reservations</span>
                        </a>
                    </li>                                  
                </ul>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="#">
                    <span class="icon fa fa-pie-chart"></span>
                    <span class="title">Users</span>
                    <span class="arrow"></span>
                </a>

                <ul class="menu-submenu">
                    <li class="menu-item">
                        <a class="menu-link" href="<?php echo base_url('Member'); ?>">
                            <span class="dot"></span>
                            <span class="title">Member</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a class="menu-link" href="<?php echo base_url('Member/Add'); ?>">
                            <span class="dot"></span>
                            <span class="title">Add Member</span>
                        </a>
                    </li>
                    
                    <li class="menu-item">
                        <a class="menu-link" href="<?php echo base_url('MemberType'); ?>">
                            <span class="dot"></span>
                            <span class="title">Member Type</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a class="menu-link" href="<?php echo base_url('Librarian'); ?>">
                            <span class="dot"></span>
                            <span class="title">Librarian</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a class="menu-link" href="<?php echo base_url('LibrarianRole'); ?>">
                            <span class="dot"></span>
                            <span class="title">Librarian Role</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="Settings.html">
                    <span class="icon fa fa-home"></span>
                    <span class="title">Admission</span>
                </a>
            </li>

            <li class="menu-category">Admin</li>

            <li class="menu-item">
                <a class="menu-link" href="#">
                    <span class="icon ti-layout"></span>
                    <span class="title">Library Content</span>
                    <span class="arrow"></span>
                </a>

                <ul class="menu-submenu">
                    <li class="menu-item">
                        <a class="menu-link" href="<?php echo base_url('Book/'); ?>">
                            <span class="dot"></span>
                            <span class="title">Book</span>
                        </a>
                    </li>                            

                    <li class="menu-item">
                        <a class="menu-link" href="<?php echo base_url('Author/'); ?>">
                            <span class="dot"></span>
                            <span class="title">Author</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a class="menu-link" href="<?php echo base_url('Genre'); ?>">
                            <span class="dot"></span>
                            <span class="title">Genre</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a class="menu-link" href="<?php echo base_url('Publisher/'); ?>">
                            <span class="dot"></span>
                            <span class="title">Publisher</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a class="menu-link" href="<?php echo base_url('Series/'); ?>">
                            <span class="dot"></span>
                            <span class="title">Series</span>
                        </a>
                    </li>                    

                </ul>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="#">
                    <span class="icon fa fa-plus-circle"></span>
                    <span class="title">University</span>
                    <span class="arrow"></span>
                </a>

                <ul class="menu-submenu">
                    <li class="menu-item">
                        <a class="menu-link" href="<?php echo base_url('Subject/'); ?>">
                            <span class="dot"></span>
                            <span class="title">Subject</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a class="menu-link" href="<?php echo base_url('Course/'); ?>">
                            <span class="dot"></span>
                            <span class="title">Course</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a class="menu-link" href="<?php echo base_url('College/'); ?>">
                            <span class="dot"></span>
                            <span class="title">College</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="menu-category">Settings</li>

            <li class="menu-item">
                <a class="menu-link" href="Settings.html">
                    <span class="icon fa fa-home"></span>
                    <span class="title">Settings</span>
                </a>
            </li>

        </ul>
    </nav>

</aside>