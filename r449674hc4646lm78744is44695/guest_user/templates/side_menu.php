
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
            <span>Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
           
          </a>
          <ul class="treeview-menu">
             <!-- <li >
                  <a href="#"><i class="fa fa-circle-o"></i> Indent 
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu " style="display: none;">                           
                    <li><a href="admin_report_indent.php"><i class="fa fa-circle-o"></i> Indent Annually</a></li>
                    <li><a href="admin_report_indent_quarterly.php"><i class="fa fa-circle-o"></i>Indent Quarterly</a></li>

                  </ul>

                </li> -->
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Indent
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" style="display: none;">                
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Raised report
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu" style="display: none;">
                    <li><a href="admin_report_indent.php"><i class="fa fa-circle-o"></i> Annually</a></li>
                    <li><a href="admin_report_indent_quarterly.php"><i class="fa fa-circle-o"></i>Quarterly</a></li>
                    <li><a href="admin_report_indent_date_wise.php"><i class="fa fa-circle-o"></i>Date Wise</a></li>
                    
                  </ul>
                </li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i>  Item wise frequency
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu" style="display: none;">
                    <li><a href="admin_report_indent_item.php"><i class="fa fa-circle-o"></i>  Annually</a></li>
                    <li><a href="admin_report_indent_quarterly_item.php"><i class="fa fa-circle-o"></i> Quarterly</a></li>
                    <li><a href="admin_report_indent_date_wise_item.php"><i class="fa fa-circle-o"></i> Date Wise</a></li>
                    <li><a href="admin_report_indent_annually_issue_item.php"><i class="fa fa-circle-o"></i><small>Annually Issue vs receive</small></a></li>


                  </ul>
                </li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Indent vs Issue vs Receive
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu" style="display: none;">
                     
                  <li><a href="admin_report_indent_annually_issue_item.php"><i class="fa fa-circle-o"></i><small>Annually</small></a></li>
                  <li><a href="admin_report_indent_quarterly_issue_item.php"><i class="fa fa-circle-o"></i><small>Quarterly </small></a></li>
                  <li><a href="admin_report_indent_date_wise_issue_item.php"><i class="fa fa-circle-o"></i><small>Date Wise </small></a></li>              
                


                  </ul>
                </li>
              </ul>
              <!-- <ul class="treeview-menu" style="display: none;">                
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Indent Item Type Report
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu" style="display: none;">
                    <li><a href="admin_report_indent.php"><i class="fa fa-circle-o"></i> Indent Annually</a></li>
                    <li><a href="admin_report_indent_quarterly.php"><i class="fa fa-circle-o"></i>Indent Quarterly</a>
                    <li><a href="admin_report_indent_date_wise.php"><i class="fa fa-circle-o"></i>Indent Date Wise</a>

                  </ul>
                </li>
              </ul> -->
            </li>
            
            <!-- <li><a href="admin_report_indent.php"><i class="fa fa-circle-o"></i>Indent</a></li> -->
             <li><a href="admin_report_issue.php"><i class="fa fa-circle-o"></i>Issue</a></li>
             <li><a href="admin_report_receive.php"><i class="fa fa-circle-o"></i>Receive</a></li>
             <li><a href="admin_report_transit.php"><i class="fa fa-circle-o"></i>Stock in transit</a></li> 
             <li><a href="admin_report_stock.php"><i class="fa fa-circle-o"></i>Current Stock</a></li>
             <li><a href="admin_report_short_supply.php"><i class="fa fa-circle-o"></i>Short Supply Stock</a></li>
            
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-cubes"></i>
            <span>Graphical Analysis</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
           
          </a>
          <ul class="treeview-menu">
            <li><a href="admin_graph_report_annual.php"><i class="fa fa-circle-o"></i>Annual Requirement</a></li>
             <li><a href="admin_graph_report_indent.php"><i class="fa fa-circle-o"></i>Indent Analysis</a></li>
             <li><a href="admin_graph_report_supply.php"><i class="fa fa-circle-o"></i>Supply Analysis</a></li>
             <li><a href="admin_graph_report_stock.php"><i class="fa fa-circle-o"></i>Minimum Stock Level Analysis</a></li> 
             <!-- <li><a href="admin_report_stock.php"><i class="fa fa-circle-o"></i>Current Stock</a></li> -->
            
          </ul>
        </li>
         <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-cubes"></i>
            <span>Master Student</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
           
          </a>
          <ul class="treeview-menu">
            <li><a href="admin_student_user.php"><i class="fa fa-circle-o"></i>Add Student And view</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>Assign Teacher</a></li>
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-cubes"></i>
            <span>Master Grade</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
           
          </a>
          <ul class="treeview-menu">
            <li><a href="admin_grade_1 to 10.php"><i class="fa fa-circle-o"></i>Add Grading Details And view</a></li>
            <li><a href="admin_subject_name.php"><i class="fa fa-circle-o"></i>Add Subject Name</a></li>
          </ul>
            <ul class="treeview-menu">
            <li><a href="admin_grade_1_to_90.php"><i class="fa fa-circle-o"></i>Highest Point</a></li>
            <li><a href="admin_subject_name.php"><i class="fa fa-circle-o"></i>Add Subject Name</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-cog"></i> <span>Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="admin_school.php"><i class="fa fa-circle-o"></i>Manage School Details</a></li>
           
          </ul> -->
       <!--  </li> -->

        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
