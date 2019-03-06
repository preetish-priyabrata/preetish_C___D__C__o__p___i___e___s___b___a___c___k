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
       Add New Water Sub Type
        <small>Here It store Water Sub-Type </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="#">General Setting</a></li>
        <li><a href="#">Agriculture Water Details</a></li>
        <li class="active">Add New Agriculture Water Details</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    	<div class="row">
		    <?php $msg->display(); ?>
	    </div>
      <form action="admin_new_water_detail_save.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Water details</h3>
          </div>
          <div class="box-body">
            <div class="form-group">
              <label for="land_id" class="col-sm-2 control-label">Land Type</label>

              <div class="col-sm-8">
                <select class="form-control" name="land_id" required="">
                <option value="">--Select Land Type--</option>
                 <?php 
                    $GET_TYPE="SELECT * FROM `ilab_water_land_type` WHERE `status`='1'";
                    $SQL_GET=mysqli_query($conn,$GET_TYPE);
                    while ($get_fetch_type=mysqli_fetch_assoc($SQL_GET)) {?>
                      <option value="<?=$get_fetch_type['land_id']?>"><?=strtoupper($get_fetch_type['land_type_name'])?></option>

               <?php  }?>
               </select>
              </div>
            </div>
            <div class="form-group">
              <label for="sub_menu_agri" class="col-sm-2 control-label">Water Type</label>

              <div class="col-sm-8">
                <input class="form-control" id="sub_menu_water" name="sub_menu_water" placeholder="Agriculture WaterMenu" type="text" required="">
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
