<?php
session_start();
ob_start();
if($_SESSION['email_id']){
  include 'webconfig/config.php';
  require 'FlashMessages.php';
  $msg = new \Preetish\FlashMessages\FlashMessages();
  $title="Welcome To Dashboard Of Admin";
  $slno=web_decryptIt(str_replace(" ", "+", $_GET['slno']));
  $get_submenu="SELECT * FROM `ilab_water_crops` WHERE `crops_sl_num`='$slno'";
  $sql_exe_submenu=mysqli_query($conn,$get_submenu);
  $fetch_details=mysqli_fetch_assoc($sql_exe_submenu);
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
       Edit Crop Details
     </br>
        <!-- <small>Here It store crop details </small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin_dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="#">General Setting</a></li>
        <li><a href="#">Agriculture crop </a></li>
        <li><a href="admin_new_crop_type_view.php">View Agriculture Crop List</a></li>
        <li class="active">Edit crop Information</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <?php $msg->display(); ?>
      </div>
      <form action="admin_new_crop_type_edit_save.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
        <input type="hidden" name="crops_sl_num" value="<?=$slno?>">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Crop Information</h3>
          </div>
          <div class="box-body">
            <div class="form-group">
              <label for="sub_menu_crop" class="col-sm-2 control-label">Type Crop</label>

              <div class="col-sm-8">
               <select class="form-control" name="sub_menu_id" required="">
                <option value="">--Select Crop Type--</option>
                 <?php 
                    $GET_TYPE="SELECT * FROM `ilab_water_sub_menu` WHERE `status`='1'";
                    $SQL_GET=mysqli_query($conn,$GET_TYPE);
                    while ($get_fetch_type=mysqli_fetch_assoc($SQL_GET)) {?>
                      <option value="<?=$get_fetch_type['sub_menu_id']?>" <?php if($fetch_details['sub_menu_id']==$get_fetch_type['sub_menu_id']){ echo "Selected"; } ?> ><?=strtoupper($get_fetch_type['sub_menu_name'])?></option>
                    <?php  }?>
               </select>
              </div>
            </div>
            <div class="form-group">
              <label for="sub_menu_crop" class="col-sm-2 control-label">Crop Name</label>

              <div class="col-sm-8">
                <input class="form-control" id="crop_name" value="<?=strtoupper($fetch_details['crop_name'])?>" name="crop_name" placeholder="Crop Name" type="text" required="">
              </div>
            </div>
            <div class="form-group">
              <label for="file_ing_sub" class="col-sm-2 control-label">Crop Image</label>

              <div class="col-sm-8">
                <?php 
                        if(file_exists("../upload/crop/".$fetch_details['image_file_name'])){
                          ?>
                        <img src="../upload/crop/<?=$fetch_details['image_file_name']?>" width="50%">
                        <?php }else{
                          echo "<b style='color:red'>Unable find Picture</b>";
                        }?>
                <input class="form-control" id="file_ing_sub" name="file_ing_sub"  type="file" >
              </div>
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-xs-12">
                  <a href="admin_dashboard.php" class="btn btn-success btn-xs pull-left">Back</a>
                  <input type="submit" class="btn btn-info btn-xs pull-right" name="Save" value="Save">
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
