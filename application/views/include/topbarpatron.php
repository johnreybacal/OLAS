<header class="topbar">
	      <div class="topbar-left">
        <!-- <span class="topbar-btn sidebar-toggler"><i>&#9776;</i></span> -->
        <a class="topbar-btn d-none d-md-block" href="#" data-provide="fullscreen tooltip" title="Fullscreen">
          <i class="material-icons fullscreen-default">fullscreen</i>
          <i class="material-icons fullscreen-active">fullscreen_exit</i>
        </a>

        <div class="dropdown d-none d-md-block">
          <span class="topbar-btn" data-toggle="dropdown"><i class="ti-layout-grid3-alt"></i></span>
          <div class="dropdown-menu dropdown-grid">
            <a class="dropdown-item" href="Dashboard.html">
              <span data-i8-icon="home"></span>
              <span class="title">Dashboard</span>
            </a>
            <a class="dropdown-item" href="../page/gallery.html">
              <span data-i8-icon="stack_of_photos"></span>
              <span class="title">Gallery</span>
            </a>
            <a class="dropdown-item" href="../page/search.html">
              <span data-i8-icon="search"></span>
              <span class="title">Search</span>
            </a>
            <a class="dropdown-item" href="../page-app/calendar.html">
              <span data-i8-icon="calendar"></span>
              <span class="title">Calendar</span>
            </a>
            <a class="dropdown-item" href="../page-app/chat.html">
              <span data-i8-icon="sms"></span>
              <span class="title">Chat</span>
            </a>
            <a class="dropdown-item" href="../page-app/mailbox.html">
              <span data-i8-icon="invite"></span>
              <span class="title">Emails</span>
            </a>
            <a class="dropdown-item" href="../page-app/users.html">
              <span data-i8-icon="contacts"></span>
              <span class="title">Contacts</span>
            </a>
            <a class="dropdown-item" href="../widget/chart.html">
              <span data-i8-icon="bar_chart"></span>
              <span class="title">Charts</span>
            </a>
            <a class="dropdown-item" href="../page/profile.html">
              <span data-i8-icon="businessman"></span>
              <span class="title">Profile</span>
            </a>
          </div>
        </div>

        <div class="topbar-divider d-none d-md-block"></div>

        <div class="lookup d-none d-md-block topbar-search" id="theadmin-search">
          <input class="form-control w-300px" type="text">
          <div class="lookup-placeholder">
            <i class="ti-search"></i>
            <span><strong>Try</strong> button, slider, modal, etc.</span>
          </div>
        </div>
      </div>

      <div class="topbar-right">
        <div>
        <!-- <a class="topbar-btn" href="#qv-global" data-toggle="quickview"><i class="ti-align-right"></i></a> -->
        <a class="btn btn-sm btn-primary border-light hover-shadow-2" style="color: white;" href="#qv-form-center" data-toggle="quickview">Login</a>
        <a class="btn btn-sm btn-outline btn-primary border-light hover-shadow-2 " href="#qv-form" data-toggle="quickview">Register</a>
        </div>
      </div>
<div id="qv-form" class="quickview">
      <header class="quickview-header">
        <p class="quickview-title lead">Create your account</p>
        <span class="close"><i class="ti-close"></i></span>
      </header>

      <div class="quickview-body">
        <form class="quickview-block form-type-line">

          <br>
          <div class="form-group">
            <input class="form-control" type="text" placeholder="Name">
          </div>

          <div class="form-group">
            <input class="form-control" type="text" placeholder="Username">
          </div>

          <div class="form-group">
            <input class="form-control" type="text" placeholder="Email">
          </div>

          <div class="form-group">
            <input class="form-control" type="password" placeholder="Password">
          </div>

          <div class="form-group">
            <input class="form-control" type="password" placeholder="Confirm Password ">
          </div>
          <br>

          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input">
            <label class="custom-control-label">I agree to <a class="text-primary" href="#"><strong>PikABook</strong> terms and conditions</a>.</label> 
          </div>

        </form>
      </div>

      <footer class="quickview-footer flex-row-reverse">
        <a class="btn btn-primary" href="Dashboard.html" >Register</a>
        <button class="btn btn-secondary" type="button">Cancel</button>
      </footer>
    </div>

    <!-- Form center -->
    <div id="qv-form-center" class="quickview">
      <header class="quickview-header">
        <p class="quickview-title lead">Log in to PikABook</p>
        <span class="close"><i class="ti-close"></i></span>
      </header>

      <div class="quickview-body center-v">
        <form class="quickview-block form-type-line">
          <h5 class="mb-20">Sign in</h5>

          <div class="form-group">
            <input type="text" class="form-control" placeholder="Username">
          </div>

          <div class="form-group">
            <input type="password" class="form-control" placeholder="Password">
          </div>

          <a class="btn btn-primary" href="Dashboard.html"> Login</a>
          <a class="btn btn-primary" href="Dashboard.html"> Login as Librarian</a>
        </form>
      </div>
    </div>

</header>


