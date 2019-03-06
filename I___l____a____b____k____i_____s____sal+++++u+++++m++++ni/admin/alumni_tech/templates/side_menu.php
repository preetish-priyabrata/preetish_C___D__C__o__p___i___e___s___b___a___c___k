

<link rel="stylesheet" href="https://use.fontawesome.com/6667a26d4c.css">

  <header class="main-header">
    <!-- Logo -->
    <a href="admin_dashboard.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>I</b>-LAB</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b> Profile</span>
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
        <li class="header">Alumni Tech Menu</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-braille"></i>
            <span>Alumni Profile</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!--  <li><a href="alumni_personal_profile.php"><i class="fa fa-circle-o"></i>Alumni Form</a></li> -->
         
             <li><a href="admin_new_alumni_profile.php" title="List of alumni registration forms details not screened by an approver."><i class="fa fa-circle-o"></i>View Unapproved Registration</a></li>
            <li><a href="admin_profile_approved.php" title="List of alumni registration forms details  screened by an approver."><i class="fa fa-circle-o"></i>View Approved Registration</a></li> 
          </ul> 
         
        </li>



        <li class="treeview">
          <a href="#">
            <i class="fa fa-braille"></i>
            <span title="Creation of authorized user login details to facilitate the process.">Create User</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="create_admin_user.php" title="   Users who would help administrator or approver to attend queries of registered alumni."><i class="fa fa-circle-o"></i>Create Expert User  <small style="color:green">New</small></a></li>
         
             <li><a href="create_admin_user_view.php" title="List of Expert users who would help administrator or approver to attend queries of registered alumni."><i class="fa fa-circle-o"></i>Expert User List</a></li>

            </ul> 
            </li>

         <li class="treeview">
          <a href="#">
            <i class="fa fa-braille"></i>
            <span>Query</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="alumni_Received_Query.php" title="Queries Received from the registered alumni users."><i class="fa fa-circle-o"></i>Received Queries <small style="color:green">New</small></a></li>
         
             <li><a href="alumni_replyed_Query.php" title="Queries has been replied or not, queries has been assigned to experts or not, if replied or assigned to whom it is assigned etc."><i class="fa fa-circle-o"></i>Queries  Assignment Status </a></li>
             <!--  <li><a href="view_replied_details_faculty.php"><i class="fa fa-circle-o"></i>View replied details</a></li> 
              <li><a href="alumni_assigned_query.php"><i class="fa fa-circle-o"></i>View Assigned details</a></li> -->
        </ul> 
         
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-braille"></i>
            <span>Sharing Details</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">


             <li><a href="admin_UnApproved_sharing_details.php" title="List of Sharings(text/documents/links/photos) not approved by an approver."><i class="fa fa-circle-o"></i>UnApproved Sharings</a></li>

             <li><a href="admin_Approved_sharing_details.php" title="List of Sharings(text/documents/links/photos) approved by an approver"><i class="fa fa-circle-o"></i>Approved Sharings <small style="color:green">New</small></a></li>
         
            <!--  <li><a href="alumni_replyed_Query.php"><i class="fa fa-circle-o"></i>Assigned Queries</a></li> -->
             <!--  <li><a href="view_replied_details_faculty.php"><i class="fa fa-circle-o"></i>View replied details</a></li> 
              <li><a href="alumni_assigned_query.php"><i class="fa fa-circle-o"></i>View Assigned details</a></li> -->

              
          </ul> 
         
        </li>

          <li class="treeview">
          <a href="#">
            <i class="fa fa-braille"></i>
            <span>Photo Gallery</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="admin_upload_photo_gallery.php"><i class="fa fa-circle-o"></i>Upload Photos</a></li>
              <li><a href="admin_upload_photo_gallery_view.php"><i class="fa fa-circle-o"></i>View Photos</a></li>
              
          </ul> 
         
        </li>
       
  
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
