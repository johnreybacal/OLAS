<header class="topbar">
	      <div class="topbar-left">
        <!-- <span class="topbar-btn sidebar-toggler"><i>&#9776;</i></span> -->        

        
		<h4>OLAS</h4>
        <div class="topbar-divider d-none d-md-block"></div>

        <div class="lookup d-none d-md-block topbar-search">
          <input class="form-control w-300px" type="text">
          <div class="lookup-placeholder">
            <i class="ti-search"></i>
            <span><strong>Search</strong> books, authors, genres, etc.</span>
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
        </form>
      </div>
    </div>

</header>


