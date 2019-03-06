<?php if (isset($this->session->userdata['session'])) {
  if ($this->session->userdata['session']['username']) {
    $id = $this->session->userdata['session']['admin_id'];
    $name = $this->session->userdata['session']['username'];
    $image_name = $this->session->userdata['session']['image'];
  } else {
    redirect('logout');
  }
} else {
  redirect('logout');
}
?>
<header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
        <span class="logo-mini"><b>E</b>P</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Easy</b> Post</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                 <!--  <img src="<?=base_url()?>admin_assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
                  <span class="hidden-xs" style="font-size:20px; font-weight: bold; padding-right: 20px;"><?=$name?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                  <?php if (!empty($image_name)) {?>
                        <img src="<?=base_url('uploads/admin') . '/' . $image_name;?>" alt="avatar" class="img-circle" >
                    <?php } else {?>
                    <img src="<?=base_url()?>admin_assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                  <?php }
                    ?>
                 <h1> <span class="hidden-xs" style="font-size:20px; font-weight: bold; color: white;"><name><?=$name?></name></span></h1>
                  </li>
                  <!-- Menu Body -->
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?=base_url()?>update-admin" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?=base_url()?>logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
            <!--   <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li> -->
            </ul>
          </div>
        </nav>
      </header>

      <!-- =============================================== -->