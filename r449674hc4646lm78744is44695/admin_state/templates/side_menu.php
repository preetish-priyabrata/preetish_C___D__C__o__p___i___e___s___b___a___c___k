

<link rel="stylesheet" href="https://use.fontawesome.com/6667a26d4c.css">

  <header class="main-header">
    <!-- Logo -->
    <a href="admin_dashboard.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>B</b>R</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>RHC</b>LMIS</span>
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
              <span class="hidden-xs"><?=$_SESSION['admin_name']?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../assert/dist/img/avatar2.png" class="img-circle" alt="User Image">

                <p>
                  
                  <small><?=ucwords($_SESSION['admin_name'])?></small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
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

  <!-- =============================================== -->

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
          <p><?=ucwords($_SESSION['admin_name'])?></p>
          <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header"><?=ucwords($_SESSION['admin_type'])?> Menu</li>
         
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cubes"></i>
            <span>Stock</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
           
          </a>
          <ul class="treeview-menu">
            <li><a href="admin_stock_entry_new1.php"><i class="fa fa-circle-o"></i>Stock Entry</a></li>
            <li><a href="admin_stock_entry_new_view1.php"><i class="fa fa-circle-o"></i>Stock View List</a></li>
            <li><a href="admin_avaliable_stock_view.php"><i class="fa fa-circle-o"></i>Stock In Bihar</a></li>
            
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-braille"></i>
            <span>Indent</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
           
          </a>
          <ul class="treeview-menu">
  
          <?php if($_SESSION['designation']!='1'){?>
            <li><a href="admin_raise_indent.php"><i class="fa fa-circle-o"></i>Raise Indent</a></li>
            <?php }?>
            <!-- <li><a href="admin_exam_name.php"><i class="fa fa-circle-o"></i>Indent History</a></li> -->
            <li >
                  <a href="#"><i class="fa fa-circle-o"></i> Indent History
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu " style="display: none;">
                            <?php if($_SESSION['designation']!='1'){?>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Indent Raised</a></li>
                    <?php }?>
                    <li><a href="admin_receive_indent_history.php"><i class="fa fa-circle-o"></i>Indent Received</a></li>
                  </ul>
                </li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cubes"></i>
            <span>Issue</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
           
          </a>
          <ul class="treeview-menu">
            <li><a href="admin_receive_indent.php"><i class="fa fa-circle-o"></i>Indent Received</a></li>
            <li><a href="admin_receive_indent_issue_history.php"><i class="fa fa-circle-o"></i>Issued History</a></li>
             <!-- <li><a href="admin_receive_issue_cancel.php"><i class="fa fa-circle-o"></i>Cancel History</a></li> -->
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-cubes"></i>
            <span>Receive</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
           
          </a>
          <ul class="treeview-menu">
           <?php if($_SESSION['designation']!='1'){?>
            <li><a href="admin_received_issue.php"><i class="fa fa-circle-o"></i>Received Issue</a></li>
            <?php }?>
            <li><a href="admin_received_confirmation.php"><i class="fa fa-circle-o"></i>Receive Confirmation History</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cubes"></i>
            <span>Update</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
           
          </a>
          <ul class="treeview-menu">
           
            <li><a href="admin_update_history.php"><i class="fa fa-circle-o"></i>Update History</a></li>
          </ul>
        </li>
       
        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
