<?php
session_start();
ob_start();
if($_SESSION['email_id']){
	include 'webconfig/config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	$title="Welcome To Dashboard Of Admin";
?>
<style type="text/css">
  input[type="file"] {
    /*display: block;*/
    padding: 0px 0px;
  }
</style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Add New Agriculture Sub Type
        <small>Here It store Agriculture Sub-Type </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="#">General Setting</a></li>
        <li><a href="#">Agriculture Sub Menu</a></li>
        <li class="active">Add New Agriculture Sub Type</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    	<div class="row">
		    <?php $msg->display(); ?>
	    </div>
      <form action="admin_new_sub_menu_save.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Add New Agriculture Sub Type</h3>
          </div>
          <div class="box-body">
            <div class="form-group">
              <label for="sub_menu_agri" class="col-sm-2 control-label">Name</label>

              <div class="col-sm-8">
                <input class="form-control" id="sub_menu_agri" name="sub_menu_agri" placeholder="Agriculture Sub-Menu" type="text" required="">
              </div>
            </div>
            <div class="form-group">
              <label for="file_ing_sub" class="col-sm-2 control-label">File Image</label>

              <div class="col-sm-8">
                <input class="form-control" id="file_ing_sub" name="file_ing_sub"  type="file" required="">
              </div>
            </div>
          </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-xs-12">
                  <a href="admin_dashboard.php" class="btn btn-success btn-xs pull-left">Back</a>
                  <input type="submit"  class="btn btn-info btn-xs pull-right" name="Save">
                </div>
              </div>
            </div>
        </div>
      </form>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php
}else{
	header('Location:logout_time_out.php');
	exit;
}
$contents = ob_get_contents();
ob_clean();
include 'template/header.php';

?>
