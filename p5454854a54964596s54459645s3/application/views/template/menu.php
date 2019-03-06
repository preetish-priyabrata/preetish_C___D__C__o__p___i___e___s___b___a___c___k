 <?php 
 if (isset($this->session->userdata['session'])) {
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
     <aside class="main-sidebar" id ="printbtn">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
             <?php if (!empty($image_name)) {?>
              <img src="<?=base_url('uploads/admin') . '/' . $image_name;?>" alt="User Image" class="img-circle">
               <?php } else {?>
              <img src="<?=base_url()?>admin_assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
           <?php }
                    ?>
            </div>
            <div class="pull-left info">
              <span><name><?=$name?></name></span>
              <div></div>
               </div>
          </div>
          <!-- search form -->
       <!--    <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form> -->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <!-- <li><a href="<?=base_url()?>view-user-list"><i class="fa fa-users" style="color: DodgerBlue ;" ></i> <span>View Users</span></a></li> -->
            <!-- <li><a href="<?=base_url()?>view-subscriber-list"><i class="fa fa-rss-square text-purple"></i> <span>View Subscribe</span></a></li> -->
            
          <!--  <li class="treeview">
             <li class="treeview">
              <a href="#">
                <i class="fa fa-paw " style="color: purple ;"></i> <span>Menu</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-check-circle" style="color:LightSalmon;" ></i> <span></span>View User</a></li>
              </ul>
             
            </li>           -->  
           <!--  <li class="treeview">
              <a href="#">
                <i class="fa fa-cog fa-pulse"></i> <span>Admin Setting</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
                </li> -->

                 <li class="treeview">
              <a href="#">
                <i class="fa fa-hdd-o" style="color: blue;"></i> <span>Manage Location</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              
              <ul class="treeview-menu">
                <li><a href="<?=base_url()?>Add-visiting_location-form"><i class="fa fa-plus-square" style="color: DodgerBlue ;" ></i> <span>View & Add Visiting Location</span></a></li>
                <li><a href="<?=base_url()?>Add-visiting-gate-location-form"><i class="fa fa-plus-square text-green"></i>View & Add Gate To Location</a></li>
              </ul>
             
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-object-group" style="color: blue;"></i> <span>Application For Pass</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              
              <ul class="treeview-menu">
                <li><a href="<?=base_url()?>View-payment-pending-Application"><i class="fa fa-circle-o" style="color: red ;" ></i> <span> Pending App. </span></a></li>
                <li><a href="<?=base_url()?>View-received-Application"><i class="fa fa-circle-o text-green"></i> Received App.</a></li>
                <li><a href="<?=base_url()?>View-received-approved-personal-Application"><i class="fa fa-circle-o text-green"></i> 1st Level Approved .</a></li>
                  <li><a href="<?=base_url()?>genereate-Pass-list"><i class="fa fa-circle-o text-blue"></i>Generate Pass </a></li>
              </ul>
             
            </li>  
            <!--  <li class="treeview">
              <a href="#">
                <i class="fa fa-rss-square" style="color: blue;"></i> <span>Admin Blog Section</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              
              <ul class="treeview-menu">
                <li><a href="<?=base_url()?>blog-form-page"><i class="fa fa-plus-square" style="color: DodgerBlue ;" ></i> <span>Add Blog(Content & Urls)</span></a></li>
                 <li><a href="<?=base_url()?>view-blog-content"><i class="fa fa-rss text-green"></i>View Content</a></li>
                  <li><a href="<?=base_url()?>view-blog-url"><i class="fa fa-share-alt-square text-green"></i>View Urls</a></li>
              </ul>
             
            </li>   -->
              </ul>
            </li>            
        </section>
        <!-- /.sidebar -->
      </aside>
