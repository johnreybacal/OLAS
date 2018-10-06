<ul>
    <li>
        <a href = "<?php echo base_url('/'); ?>">OLAS index</a>
    </li>
    <li>
        <a href = "<?php echo base_url('Login'); ?>">Login</a>
    </li>
    <li>Admin
        <ul>
            <li>
                <a href = "<?php echo base_url('Admin/'); ?>">Admin index</a>
            </li>
        </ul>
    </li>
    <li>Book
        <ul>
            <li>
                <a href = "<?php echo base_url('Book/'); ?>">Book index</a>
            </li>
            <li>
                <a href = "<?php echo base_url('Book/Add'); ?>">Book Add</a>
            </li>
            <li>Author
                <ul>
                    <li>
                        <a href = "<?php echo base_url('Author/'); ?>">Author index</a>
                    </li>                
                </ul>
            </li>
        </ul>
    </li>
    <li>Member
        <ul>
            <li>
                <a href = "<?php echo base_url('Member/'); ?>">Member index</a>
            </li>            
        </ul>
    </li>
</ul>