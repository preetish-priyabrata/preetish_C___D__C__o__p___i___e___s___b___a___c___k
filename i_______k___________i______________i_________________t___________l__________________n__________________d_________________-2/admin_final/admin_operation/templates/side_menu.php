

<link rel="stylesheet" href="https://use.fontawesome.com/6667a26d4c.css">

  <header class="main-header">
    <!-- Logo -->
    <a href="admin_dashboard.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>I</b>-LAB</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin </b> Profile</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
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
              <img src="../assert/dist/img/avatar2.png" class="user-image" alt="User Image">
              <!-- 160X160 -->
              <span class="hidden-xs"><?=$_SESSION['user_name']?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../assert/dist/img/avatar2.png" class="img-circle" alt="User Image">

                <p>
                  
                  <small><?=ucwords($_SESSION['user_name'])?></small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <!-- <a href="#" class="btn btn-default btn-flat">Profile</a> -->
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>

  <!-- ================================================================================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../assert/dist/img/avatar2.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=ucwords($_SESSION['user_name'])?></p>
          <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
        </div>
      </div>
 
      <ul class="sidebar-menu">
        <li class="header"><center> Menu</center></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-braille"></i>
            <span title="It manages any new registration by any alumni.">Academy</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!--  <li><a href="alumni_personal_profile.php"><i class="fa fa-square"></i>Alumni Form</a></li> -->
         
             <li><a href="admin_accademy_add.php"><i class="fa fa-square"></i>Add Academy </a></li>
            <li><a href="admin_accademy_view.php"><i class="fa fa-square"></i>View Academy</a></li> 
          </ul> 
         
        </li>
      <li class="treeview">
          <a href="#">
            <i class="fa fa-braille"></i>
            <span title="It manages any new registration by any alumni.">Branch</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!--  <li><a href="alumni_personal_profile.php"><i class="fa fa-square"></i>Alumni Form</a></li> -->
         
             <li><a href="admin_branch_add.php"><i class="fa fa-square"></i>Add Branch </a></li>
            <li><a href="admin_branch_view.php"><i class="fa fa-square"></i>View Branch</a></li> 
          </ul> 
         
        </li>
           <li class="treeview">
          <a href="#">
            <i class="fa fa-braille"></i>
            <span title="It manages any new registration by any alumni.">Query Management</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!--  <li><a href="alumni_personal_profile.php"><i class="fa fa-square"></i>Alumni Form</a></li> -->
         
             <li><a href="admin_received_queries.php"><i class="fa fa-square"></i>Reply New Queries <span style="color:red">New</span> </a></li>
            <li><a href="alumni_replyed_Query.php"><i class="fa fa-square"></i>Query Status</a></li> 
          </ul> 
         
        </li>

          <li class="treeview">
          <a href="#">
            <i class="fa fa-braille"></i>
            <span title="It manages any new registration by any alumni.">Notice Board</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!--  <li><a href="alumni_personal_profile.php"><i class="fa fa-square"></i>Alumni Form</a></li> -->
         
             <li><a href="admin_post_notice_to_student.php"><i class="fa fa-square"></i>Post Notice <span style="color:red">New</span> </a></li>
            <li><a href="admin_post_individual_notice_to_student_view.php"><i class="fa fa-square"></i>View Individual Notice</a></li> 
             <li><a href="admin_post_group_notice_to_student_view.php"><i class="fa fa-square"></i>View Group Notice</a></li> 
          </ul> 
         
        </li>
     


  
    </section>
    <!-- /.sidebar -->
  </aside>
