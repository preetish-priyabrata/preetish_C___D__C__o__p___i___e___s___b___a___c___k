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
            <li><a href="<?=base_url()?>view-user-list"><i class="fa fa-users" style="color: DodgerBlue ;" ></i> <span>View Users</span></a></li>
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
                <i class="fa fa-hdd-o" style="color: blue;"></i> <span>Manage Category</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              
              <ul class="treeview-menu">
                <li><a href="<?=base_url()?>Add-category-form"><i class="fa fa-plus-square" style="color: DodgerBlue ;" ></i> <span>Add Category</span></a></li>
                <li><a href="<?=base_url()?>view-category"><i class="fa fa-tags text-green"></i>View Category</a></li>
              </ul>
             
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-object-group" style="color: blue;"></i> <span>POST(File & Questions)</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              
              <ul class="treeview-menu">
                <li><a href="<?=base_url()?>Add-file-posting-form"><i class="fa fa-plus-square" style="color: DodgerBlue ;" ></i> <span>Add Files & Questions</span></a></li>
                 <li><a href="<?=base_url()?>view-Question-post"><i class="fa fa-question-circle text-green"></i>View Questions</a></li>
                  <li><a href="<?=base_url()?>view-Files-post"><i class="fa fa-file-word-o text-blue"></i>View Files</a></li>
              </ul>
             
            </li>  
             <li class="treeview">
              <a href="#">
                <i class="fa fa-rss-square" style="color: blue;"></i> <span>Admin Blog Section</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              
              <ul class="treeview-menu">
                <li><a href="<?=base_url()?>blog-form-page"><i class="fa fa-plus-square" style="color: DodgerBlue ;" ></i> <span>Add Blog(Content & Urls)</span></a></li>
                 <li><a href="<?=base_url()?>view-blog-content"><i class="fa fa-rss text-green"></i>View Content</a></li>
                 <!--  <li><a href="<?=base_url()?>view-blog-url"><i class="fa fa-share-alt-square text-green"></i>View Urls</a></li> -->
              </ul>
             
            </li>  
              </ul>
            </li>            
        </section>
        <!-- /.sidebar -->
      </aside>
