
  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="template/pic.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$_SESSION['user_name']?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>General Setting</span>
            <span class="pull-right-container">
              <span class="fa fa-angle-left pull-right"></span>
            </span>
          </a>
          <!-- admin_new_sub_menu.php -->
          <ul class="treeview-menu">
            <li><a href="main_menu.php"><i class="fa fa-circle-o"></i>Main Menu</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i>Agriculture Crop Type 
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="admin_new_sub_menu.php"><i class="fa fa-circle-o"></i> <small>Add New Agriculture Crop Type</small></a></li>
                 <li><a href="admin_new_sub_menu_view.php"><i class="fa fa-circle-o"></i><small>View Agriculture Crop Type</small></a></li>
              </ul>
            </li>
             <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i>Agriculture Crop 
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="admin_new_crop_type.php"><i class="fa fa-circle-o"></i> <small>Add New Agriculture Crop </small></a></li>
                 <li><a href="admin_new_crop_type_view.php"><i class="fa fa-circle-o"></i><small>View Agriculture Crop </small></a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i>Agriculture Seasion Detail
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="admin_new_session_detail.php"><i class="fa fa-circle-o"></i> <small>Add New Seasion Detail</small></a></li>
                 <li><a href="admin_new_session_detail_view.php"><i class="fa fa-circle-o"></i><small>View Seasion Detail</small></a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i>Agriculture Method Cultivation
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="admin_new_method_cultivation_detail.php"><i class="fa fa-circle-o"></i> <small>Add New Agriculture Method</small></a></li>
                 <li><a href="admin_new_method_cultivation_detail_view.php"><i class="fa fa-circle-o"></i><small>View Agriculture Method</small></a></li>
              </ul>
            </li>
          
             
              <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i>Agriculture Land Detail
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="admin_new_land_detail.php"><i class="fa fa-circle-o"></i> <small>Add New Agriculture Land Detail</small></a></li>
                 <li><a href="admin_new_land_detail_view.php"><i class="fa fa-circle-o"></i><small>View Land Detail</small></a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i>Agriculture Water Detail
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="admin_new_water_detail.php"><i class="fa fa-circle-o"></i> <small>Add New Agriculture Water Detail</small></a></li>
                 <li><a href="admin_new_water_detail_view.php"><i class="fa fa-circle-o"></i><small>View Agriculture Water Detail</small></a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Agriculture Info In Brief
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="detail.php"><i class="fa fa-circle-o"></i> <small>Add New Details</small></a></li>
                 <li><a href="detail_save_view.php"><i class="fa fa-circle-o"></i><small>View Detail</small></a></li>
               
              </ul>
            </li>
           
            </li>
          </ul>
        </li>
        
    </section>
    <!-- /.sidebar -->
  </aside>


