<aside class="sidebar sidebar-icons-right sidebar-icons-boxed sidebar-expand-lg">
    <header class="sidebar-header">        
        <a class="logo">
            <img src="<?php echo base_url('assets/img/logo-light.png'); ?>"  alt="logo">    
        </a>
        <span class="sidebar-toggle-fold"></span>
    </header>

    <nav class="sidebar-navigation">
        <ul class="menu">            

            <li class="menu-item">
                <a class="menu-link" href="<?php echo base_url('Librarian/Dashboard'); ?>">
                    <span class="icon ti ti-home"></span>
                    <span class="title">Dashboard</span>
                </a>
            </li>        
            
            <?php if(in_array("Library", $this->session->userdata('access'))): ?>

            <li class="menu-category">Library</li>

            <li class="menu-item">
                <a class="menu-link" href="#">
                    <span class="icon ti-book"></span>
                    <span class="title">Book</span>
                    <span class="arrow"></span>
                </a>

                <ul class="menu-submenu">
                    <li class="menu-item">
                        <a class="menu-link" href="<?php echo base_url('Book/'); ?>">
                            <span class="dot"></span>
                            <span class="title">Books</span>
                        </a>
                    </li>                                                                               

                    <li class="menu-item">
                        <a class="menu-link" href="<?php echo base_url('Author/'); ?>">
                            <span class="dot"></span>
                            <span class="title">Authors</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a class="menu-link" href="<?php echo base_url('Section'); ?>">
                            <span class="dot"></span>
                            <span class="title">Sections</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a class="menu-link" href="<?php echo base_url('Publisher/'); ?>">
                            <span class="dot"></span>
                            <span class="title">Publishers</span>
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
                    <span class="icon ti-book"></span>
                    <span class="title">Catalogue</span>
                    <span class="arrow"></span>
                </a>

                <ul class="menu-submenu">    

                    <li class="menu-item">
                        <a class="menu-link" href="<?php echo base_url('Book/Add'); ?>">
                            <span class="dot"></span>
                            <span class="title">Add Book</span>
                        </a>
                    </li>   

                    <li class="menu-item">
                        <a class="menu-link" href="<?php echo base_url('Book/MarcImport'); ?>">
                            <span class="dot"></span>
                            <span class="title">Import from MARC</span>
                        </a>
                    </li>          

                    <li class="menu-item">
                        <a class="menu-link" href="<?php echo base_url('Book/Uncatalogued'); ?>">
                            <span class="dot"></span>
                            <span class="title">For Processing</span>
                        </a>
                    </li>   

                    <li class="menu-item">
                        <a class="menu-link" href="<?php echo base_url('Book/PrintQR'); ?>">
                            <span class="dot"></span>
                            <span class="title">Print QR</span>
                        </a>
                    </li>   

                </ul>
            </li>

            <?php endif; ?>
            
            <?php if(in_array("Circulation", $this->session->userdata('access'))): ?>

            <li class="menu-item">
                <a class="menu-link" href="#">
                    <span class="icon ti ti-loop"></span>
                    <span class="title">Circulation</span>
                    <span class="arrow"></span>
                </a>

                <ul class="menu-submenu">
                    <li class="menu-item">
                        <a class="menu-link" href="<?php echo base_url('Circulation/Issued'); ?>">
                            <span class="dot"></span>
                            <span class="title">Issued books</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a class="menu-link" href="<?php echo base_url('Circulation/History'); ?>">
                            <span class="dot"></span>
                            <span class="title">Circulation History</span>
                        </a>
                    </li>
                    
                    <li class="menu-item">
                        <a class="menu-link" href="<?php echo base_url('Circulation/BookIssueHistory'); ?>">
                            <span class="dot"></span>
                            <span class="title">Book Issue History</span>
                        </a>
                    </li>
                    
                    <li class="menu-item">
                        <a class="menu-link" href="<?php echo base_url('Circulation/PatronIssueHistory'); ?>">
                            <span class="dot"></span>
                            <span class="title">Patron Issue History</span>
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

            <?php endif; ?>
            <?php if(in_array("Patron Management", $this->session->userdata('access'))): ?>

            <li class="menu-item">
                <a class="menu-link" href="#">
                    <span class="icon fa fa-users"></span>
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

            <?php endif; ?>
            <?php if(in_array("Outside Researcher", $this->session->userdata('access'))): ?>

            <li class="menu-item">
                <a class="menu-link" href="<?php echo base_url('OutsideResearcher/'); ?>">
                    <span class="icon ti ti-user"></span>
                    <span class="title">Outside Researcher</span>
                </a>
            </li>        

            <?php endif; ?>
            <?php if(in_array("University", $this->session->userdata('access'))): ?>

            <li class="menu-item">
                <a class="menu-link" href="#">
                    <span class="icon fa fa-university"></span>
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

            <?php endif; ?>
            <?php if(in_array("Staff Management", $this->session->userdata('access'))): ?>

            <li class="menu-item">
                <a class="menu-link" href="<?php echo base_url('Librarian/Manage'); ?>">
                    <span class="icon fa fa-user"></span>
                    <span class="title">Staff Management</span>                    
                </a>
            </li>

            <?php endif; ?>            

        </ul>
    </nav>

</aside>
<script>
    // console.log(window.location.href);
    $(document).ready(function(){
        $.each($('.menu-item'), function(){
            if($(this).children('.menu-link').attr('href') == window.location.href){
                $(this).addClass('active');
                $(this).parent().parent().addClass('active open');
            }
        });
    });
</script>