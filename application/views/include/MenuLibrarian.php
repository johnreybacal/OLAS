<aside class="sidebar sidebar-icons-right sidebar-icons-boxed sidebar-expand-lg">
    <header class="sidebar-header">        
        <span class="logo">
            <img src="<?php echo base_url('assets/img/logo-light.png'); ?>" alt="logo">
        </span>
        <span class="sidebar-toggle-fold"></span>
    </header>

    <nav class="sidebar-navigation">
        <ul class="menu">            

            <li class="menu-item">
                <a class="menu-link" href="<?php echo base_url('Librarian/Dashboard'); ?>">
                    <span class="icon fa fa-home"></span>
                    <span class="title">Dashboard</span>
                </a>
            </li>        
            
            <li class="menu-item">
                <a class="menu-link" href="#">
                    <span class="icon ti-layout"></span>
                    <span class="title">Library</span>
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
                        <a class="menu-link" href="<?php echo base_url('Reservation'); ?>">
                            <span class="dot"></span>
                            <span class="title">Reservations</span>
                        </a>
                    </li>                                  
                </ul>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="#">
                    <span class="icon fa fa-pie-chart"></span>
                    <span class="title">Patron Management</span>
                    <span class="arrow"></span>
                </a>

                <ul class="menu-submenu">
                    <li class="menu-item">
                        <a class="menu-link" href="<?php echo base_url('Patron'); ?>">
                            <span class="dot"></span>
                            <span class="title">Patron</span>
                        </a>
                    </li>
                    
                    <li class="menu-item">
                        <a class="menu-link" href="<?php echo base_url('PatronType'); ?>">
                            <span class="dot"></span>
                            <span class="title">Patron Type</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="<?php echo base_url('OutsideResearcher/'); ?>">
                    <span class="icon fa fa-home"></span>
                    <span class="title">Outside Researcher</span>
                </a>
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

            <li class="menu-item">
                <a class="menu-link" href="#">
                    <span class="icon fa fa-pie-chart"></span>
                    <span class="title">Staff Management</span>
                    <span class="arrow"></span>
                </a>

                <ul class="menu-submenu">                   
                    <li class="menu-item">
                        <a class="menu-link" href="<?php echo base_url('Librarian/Manage'); ?>">
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
<script>
    // console.log(window.location.href);
    $(document).ready(function(){
        $.each($('.menu-item'), function(){
            if($(this).children('.menu-link').attr('href') == window.location.href){
                $(this).addClass('active');
                $(this).parent().parent().addClass('active');
            }
        });
    });
</script>