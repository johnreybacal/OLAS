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

            <li class="menu-category">Preview</li>

            <li class="menu-item active">
                <a class="menu-link" href="<?php echo base_url('Librarian/Dashboard'); ?>">
                    <span class="icon fa fa-home"></span>
                    <span class="title">Dashboard</span>
                </a>
            </li>

            <li class="menu-category">Framework</li>


            <li class="menu-item">
                <a class="menu-link" href="#">
                    <span class="icon ti-layout"></span>
                    <span class="title">Book</span>
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
                        <a class="menu-link" href="<?php echo base_url('Book/Add'); ?>">
                            <span class="dot"></span>
                            <span class="title">Add Book</span>
                        </a>
                    </li>
            
                    <li class="menu-item">
                        <a class="menu-link" href="<?php echo base_url('Subject'); ?>">
                            <span class="dot"></span>
                            <span class="title">Subject</span>
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

                    <li class="menu-item">
                        <a class="menu-link" href="<?php echo base_url('Subject/'); ?>">
                            <span class="dot"></span>
                            <span class="title">Subject</span>
                        </a>
                    </li>


                </ul>
            </li>


            <li class="menu-item">
                <a class="menu-link" href="#">
                    <span class="icon fa fa-plus-circle"></span>
                    <span class="title">Author</span>
                    <span class="arrow"></span>
                </a>

                <ul class="menu-submenu">
                    <li class="menu-item">
                        <a class="menu-link" href="<?php echo base_url('Author'); ?>">
                            <span class="dot"></span>
                            <span class="title">Author</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a class="menu-link" href="<?php echo base_url('Author/Add'); ?>">
                            <span class="dot"></span>
                            <span class="title">Add Author</span>
                        </a>
                    </li>

                </ul>
            </li>
            
            <li class="menu-item">
                <a class="menu-link" href="#">
                    <span class="icon fa fa-pie-chart"></span>
                    <span class="title">Member</span>
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
                <a class="menu-link" href="<?php echo base_url('Loan'); ?>">
                    <span class="icon fa fa-home"></span>
                    <span class="title">Issued Books</span>
                </a>
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