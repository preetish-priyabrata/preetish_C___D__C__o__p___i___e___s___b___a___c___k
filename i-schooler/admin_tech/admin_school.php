<?php
session_start();
ob_start();
if($_SESSION['admin_tech']){
require 'FlashMessages.php';
include '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>
<style type="text/css">
  div.demo{
    position: relative;
    /*width: 100%;*/
    min-height: auto;
    overflow-y: hidden;
    background: url("../assert/img/124.png"), #7b4397;
    /* fallback for old browsers */
    background: url("../assert/img/124.png"), -webkit-linear-gradient(to left, #8000ff, #ffbf00);
    /* Chrome 10-25, Safari 5.1-6 */
    background: url("../assert/img/124.png"), linear-gradient(to left, #8000ff, #ffbf00);
    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    color: white;
    opacity: 0.8;
    background-size: contain;
    /*width: auto;*/
    /*height: 1024px;*/
  }
  div.school{
    /*background-color: lightblue;*/
    width: auto;
}
</style>
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Manage School Details
        <small>Here School Information Is stored and Managed </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Setting</a></li>
        <li class="active"><b>Manage School Details</b></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <!-- success or error message alert -->
    	<div class="text-center">
			  <?php 
          $msg->display(); 
          $sql_school_detail="SELECT * FROM `manage_school_details`";
          $sql_query_detail=mysqli_query($conn,$sql_school_detail);
          $num_rows=mysqli_num_rows($sql_query_detail);
        ?>
		  </div>
    <!-- end success or errot message alert  -->
    <div class="box">
      <?php 
          if($num_rows==0){
            ?>
            <div class="box-header">
              <a href="admin_add_school.php" class="btn btn-info" role="button">Add School Detail</a>
            </div>
      <?php 
      }else if($num_rows==1){
        $fetch_detail=mysqli_fetch_assoc($sql_query_detail);
      ?>


            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
               <tr>
               <td>status</td><td><a href="#" class="btn btn-xs btn-success" role="button">Active</a></td>
               </tr>
              </table>
            </div>
            <!-- /.box-body -->
            
            <div class="panel panel-default">
              
                <div class="panel-body">
                
                  <div class="container">
                   <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                     <img  width="150" src="../assert/upload/school_logo/<?=$fetch_detail['school_logo']?>" class="img-responsive" style="background-color: white"  height="150" id="photopreview" name="photopreview">
                    </div>
                    <div class="col-sm-4"></div>
                  </div>
                
               
                   <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                      <div class="school text-left">
                          <h1><?=ucwords($fetch_detail['school_name'])?></h1>
                           <p>Address  : <?=ucwords($fetch_detail['school_address'])?></p>
                          <h6>Landline No :<small><?=ucwords($fetch_detail['school_contact'])?></small></h6>
                          <h6>Email Id : <?=ucwords($fetch_detail['contact_email'])?></h6>
                          <h6>website : <?=ucwords($fetch_detail['school_website'])?></h6>
                      </div>
                    </div>
                    <div class="col-sm-4"></div>
                  </div>
                
                </div>
                </div>

            </div>
              
      <?php } ?>

        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php

}else{
	header('Location:logout.php');
	exit;
}
$contents = ob_get_contents();
ob_clean();
include 'templates/template.php';

?>
<?php
session_start();
ob_start();
if($_SESSION['admin_tech']){
require 'FlashMessages.php';
include '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>
<style type="text/css">
  div.demo{
    position: relative;
    /*width: 100%;*/
    min-height: auto;
    overflow-y: hidden;
    background: url("../assert/img/124.png"), #7b4397;
    /* fallback for old browsers */
    background: url("../assert/img/124.png"), -webkit-linear-gradient(to left, #8000ff, #ffbf00);
    /* Chrome 10-25, Safari 5.1-6 */
    background: url("../assert/img/124.png"), linear-gradient(to left, #8000ff, #ffbf00);
    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    color: white;
    opacity: 0.8;
    background-size: contain;
    /*width: auto;*/
    /*height: 1024px;*/
  }
  div.school{
    /*background-color: lightblue;*/
    width: auto;
}
</style>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Manage School Details
        <small>Here School Information Is stored and Managed </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Setting</a></li>
        <li class="active"><b>Manage School Details</b></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <!-- success or error message alert -->
      <div class="text-center">
        <?php 
          $msg->display(); 
          $sql_school_detail="SELECT * FROM `manage_school_details`";
          $sql_query_detail=mysqli_query($conn,$sql_school_detail);
          $num_rows=mysqli_num_rows($sql_query_detail);
        ?>
      </div>
    <!-- end success or errot message alert  -->
    <div class="box">
      <?php 
          if($num_rows==0){
            ?>
            <div class="box-header">
              <a href="admin_add_school.php" class="btn btn-info" role="button">Add School Detail</a>
            </div>
      <?php 
      }else if($num_rows==1){
        $fetch_detail=mysqli_fetch_assoc($sql_query_detail);
      ?>


            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
               <tr>
               <td>status</td><td><a href="#" class="btn btn-xs btn-success" role="button">Active</a></td>
               </tr>
              </table>
            </div>
            <!-- /.box-body -->
            
            <div class="panel panel-default">
              
                <div class="panel-body">
                
                  <div class="container">
                   <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                     <img  width="150" src="../assert/upload/school_logo/<?=$fetch_detail['school_logo']?>" class="img-responsive" style="background-color: white"  height="150" id="photopreview" name="photopreview">
                    </div>
                    <div class="col-sm-4"></div>
                  </div>
                
               
                   <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                      <div class="school text-left">
                          <h1><?=ucwords($fetch_detail['school_name'])?></h1>
                           <p>Address  : <?=ucwords($fetch_detail['school_address'])?></p>
                          <h6>Landline No :<small><?=ucwords($fetch_detail['school_contact'])?></small></h6>
                          <h6>Email Id : <?=ucwords($fetch_detail['contact_email'])?></h6>
                          <h6>website : <?=ucwords($fetch_detail['school_website'])?></h6>
                      </div>
                    </div>
                    <div class="col-sm-4"></div>
                  </div>
                
                </div>
                </div>

            </div>
              
      <?php } ?>

        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php

}else{
  header('Location:logout.php');
  exit;
}
$contents = ob_get_contents();
ob_clean();
include 'templates/template.php';

?>
