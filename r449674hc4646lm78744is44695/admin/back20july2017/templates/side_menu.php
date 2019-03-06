

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
            <i class="fa fa-users"></i>
            <span>User Creation</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
           
          </a>
          <ul class="treeview-menu">
            <li><a href="admin_user_creation.php"><i class="fa fa-circle-o"></i>Add New User </a></li>
            <li><a href="admin_user_list.php"><i class="fa fa-circle-o"></i>View User List</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cubes"></i>
            <span>Forecasting Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
           
          </a>
          <ul class="treeview-menu">
            <li class="treeview">
                <a href="#"><i class="fa fa-circle-o"></i> District
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>

                <ul class="treeview-menu" > 
                  <li><a href="admin_district_forcasting.php"><i class="fa fa-circle-o"></i>District Forecasting</a></li>
                  <li><a href="admin_view_district_forcasting.php"><i class="fa fa-circle-o"></i>View District Forecasting</a></li>              
                 
                </ul>
                
              </li>
               <li class="treeview">
                <a href="#"><i class="fa fa-circle-o"></i> Block
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>

                <ul class="treeview-menu" > 
                   <li><a href="admin_block_forcasting.php"><i class="fa fa-circle-o"></i>Block Forecasting </a></li>
                   <li><a href="admin_view_block_forcasting.php"><i class="fa fa-circle-o"></i>View Block Forecasting</a></li>              
                 
                </ul>
                
              </li>
              <li class="treeview">
                <a href="#"><i class="fa fa-circle-o"></i> District Hospital (DH)
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>

                <ul class="treeview-menu" > 
                   <li><a href="admin_distict_hospital_forcasting.php"><i class="fa fa-circle-o"></i>DH Forecasting </a></li>
                   <li><a href="admin_view_distict_hospital_forcasting.php"><i class="fa fa-circle-o"></i>View DH Forecasting</a></li>              
                 
                </ul>
                
              </li>
              <li class="treeview">
                <a href="#"><i class="fa fa-circle-o"></i> UPHC 
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>

                <ul class="treeview-menu" > 
                   <li><a href="admin_uphc_forcasting.php"><i class="fa fa-circle-o"></i>UPHC Forecasting </a></li>
                   <li><a href="admin_view_uphc_forcasting.php"><i class="fa fa-circle-o"></i>View UPHC Forecasting</a></li>              
                 
                </ul>
                
              </li>
              <li class="treeview">
                <a href="#"><i class="fa fa-circle-o"></i> PHC 
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>

                <ul class="treeview-menu" > 
                   <li><a href="admin_phc_forcasting.php"><i class="fa fa-circle-o"></i>PHC Forecasting </a></li>
                   <li><a href="admin_view_phc_forcasting.php"><i class="fa fa-circle-o"></i>View PHC Forecasting</a></li>              
                 
                </ul>
                
              </li>
              <li class="treeview">
                <a href="#"><i class="fa fa-circle-o"></i> APHC 
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>

                <ul class="treeview-menu" > 
                   <li><a href="admin_aphc_forcasting.php"><i class="fa fa-circle-o"></i>APHC Forecasting </a></li>
                   <li><a href="admin_view_aphc_forcasting.php"><i class="fa fa-circle-o"></i>View APHC Forecasting</a></li>              
                 
                </ul>
                
              </li>
              <li class="treeview">
                <a href="#"><i class="fa fa-circle-o"></i> PHC -HSC 
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>

                <ul class="treeview-menu" > 
                   <li><a href="admin_phc_sub1_forcasting.php"><i class="fa fa-circle-o"></i>HSC Forecasting </a></li>
                   <li><a href="admin_view_phc_sub1_forcasting.php"><i class="fa fa-circle-o"></i>View HSC Forecasting</a></li>              
                 
                </ul>
                
              </li>
            
           
            <!-- <li><a href="admin_asign_class_teacher.php"><i class="fa fa-circle-o"></i>Assign Teacher</a></li> -->
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cubes"></i>
            <span>Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
           
          </a>
          <ul class="treeview-menu">
            
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
                    <!-- <li><a href="admin_report_indent_annually_issue_item.php"><i class="fa fa-circle-o"></i><small>Annually Issue vs receive</small></a></li> -->


                  </ul>
                </li>
                <li><a href="admin_report_indent_not_indent_item.php"><i class="fa fa-circle-o"></i><small>Commodity not indent</small></a></li>
                <li><a href="admin_report_indent_forecast_vs_indent_item.php"><i class="fa fa-circle-o"></i><small>Forecast Vs Indent</small></a></li>
                <li><a href="admin_report_indent_item_type.php"><i class="fa fa-circle-o"></i><small>Indent Type wise </small></a></li>
                <li><a href="admin_report_indent_most_item.php"><i class="fa fa-circle-o"></i><small>Most indented Commodity</small></a></li>
                <li><a href="admin_report_indent_Least_item.php"><i class="fa fa-circle-o"></i><small>Least indented Commodity</small></a></li>
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

            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Issue
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" style="display: none;">
                <li><a href="admin_report_issue.php"><i class="fa fa-circle-o"></i>Quarterly Issue</a></li>           
                <li><a href="admin_report_issue_no_days.php"><i class="fa fa-circle-o"></i><small>No of Days Taken Isssue</small></a></li>
                <li><a href="admin_report_issue_indent_vs_issued_item.php"><i class="fa fa-circle-o"></i><small>Indented Vs Issued</small></a></li>
                <li><a href="admin_report_issue_month_wise.php"><i class="fa fa-circle-o"></i><small>Month wise issued</small></a></li>
                <li><a href="admin_report_issue_not_issued_date.php"><i class="fa fa-circle-o"></i><small>   Not issued </small></a></li>
                
                
              </ul>

            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Stock
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" style="display: none;">
                <li><a href="admin_report_stock.php"><i class="fa fa-circle-o"></i>Availaibility Stock</a></li>        
                <li><a href="admin_report_stock_short_expire.php"><i class="fa fa-circle-o"></i><small>Short Expiry</small></a></li>
                <li><a href="admin_report_stock_indent_vs_received_item.php"><i class="fa fa-circle-o"></i><small>Indented Vs Received</small></a></li>
                <li><a href="admin_report_stock_indent_vs_Distributed_item.php"><i class="fa fa-circle-o"></i><small>Indented vs Distributed</small></a></li>
                
              </ul>

            </li>
            <!-- <li><a href="admin_report_indent.php"><i class="fa fa-circle-o"></i>Indent</a></li> -->
            
             <li><a href="admin_report_receive.php"><i class="fa fa-circle-o"></i>Receive</a></li>
             <li><a href="admin_report_transit.php"><i class="fa fa-circle-o"></i>Stock in transit</a></li> 
             
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
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Indent
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" style="display: none;">                
                
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i>  Item wise frequency
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu" style="display: none;">
                    <li><a href="admin_graph_report_indent_item.php"><i class="fa fa-circle-o"></i>  Annually</a></li>
                    <li><a href="admin_graph_report_indent_quarterly_item.php"><i class="fa fa-circle-o"></i> Quarterly</a></li>
                    <li><a href="admin_graph_report_indent_date_wise_item.php"><i class="fa fa-circle-o"></i> Date Wise</a></li>
                    <!-- <li><a href="admin_report_indent_annually_issue_item.php"><i class="fa fa-circle-o"></i><small>Annually Issue vs receive</small></a></li> -->


                  </ul>
                </li>
                <li><a href="admin_graph_report_indent_not_indent_item.php"><i class="fa fa-circle-o"></i><small>Commodity not indent</small></a></li>
                <li><a href="admin_graph_report_indent_forecast_vs_indent_item.php"><i class="fa fa-circle-o"></i><small>Forecast Vs Indent</small></a></li>
                <li><a href="admin_graph_report_indent_item_type.php"><i class="fa fa-circle-o"></i><small>Indent Type wise </small></a></li>
                <li><a href="admin_graph_report_indent_most_item.php"><i class="fa fa-circle-o"></i><small>Most indented Commodity</small></a></li>
                <li><a href="admin_graph_report_indent_Least_item.php"><i class="fa fa-circle-o"></i><small>Least indented Commodity</small></a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Indent vs Issue vs Receive
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu" style="display: none;">
                     
                  <li><a href="admin_graph_report_indent_annually_issue_item.php"><i class="fa fa-circle-o"></i><small>Annually</small></a></li>
                  <li><a href="admin_graph_report_indent_quarterly_issue_item.php"><i class="fa fa-circle-o"></i><small>Quarterly </small></a></li>
                  <li><a href="admin_graph_report_indent_date_wise_issue_item.php"><i class="fa fa-circle-o"></i><small>Date Wise </small></a></li>              
                


                  </ul>
                </li>
              </ul>

              
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Issue
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" style="display: none;">
                <li><a href="admin_graph_report_issue_no_days.php"><i class="fa fa-circle-o"></i><small>No of Days Taken Isssue</small></a></li>
                <li><a href="admin_graph_report_issue_indent_vs_issued_item.php"><i class="fa fa-circle-o"></i><small>Indented Vs Issued</small></a></li>
                <li><a href="admin_graph_report_issue_month_wise.php"><i class="fa fa-circle-o"></i><small>Month wise issued</small></a></li>
                <li><a href="admin_graph_report_issue_not_issued_date.php"><i class="fa fa-circle-o"></i><small>   Not issued </small></a></li>
                
                
              </ul>

            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Stock
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" style="display: none;">
                <li><a href="admin_graph_report_stock_level.php"><i class="fa fa-circle-o"></i>Availaibility Stock</a></li>              
                <li><a href="admin_graph_report_stock_indent_vs_received_item.php"><i class="fa fa-circle-o"></i><small>Indented Vs Received</small></a></li>
                <li><a href="admin_graph_report_stock.php"><i class="fa fa-circle-o"></i>Minimum Stock Analysis</a></li>
                 <li><a href="admin_graph_report_supply.php"><i class="fa fa-circle-o"></i>Supply Analysis</a></li>
                 <!-- <li><a href="admin_graph_report_supply.php"><i class="fa fa-circle-o"></i>Indented vs Distributed</a></li> -->
              </ul>

            </li>
            <li><a href="admin_graph_report_annual.php"><i class="fa fa-circle-o"></i>Annual Requirement</a></li>
             <li><a href="admin_graph_report_indent.php"><i class="fa fa-circle-o"></i>Indent Analysis</a></li>
            
              
             <!-- <li><a href="admin_report_stock.php"><i class="fa fa-circle-o"></i>Current Stock</a></li> -->
            
          </ul>
        </li>
         

        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
