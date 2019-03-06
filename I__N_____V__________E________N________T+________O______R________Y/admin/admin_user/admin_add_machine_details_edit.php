<?php
session_start();
ob_start();
if($_SESSION['admin']){
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
include 'config.php';
$slno=$_GET['slno'];
 $title="Edit New Machine Details";
?>
  <!--Page Header-->
  <div class="header">
    <div class="header-content">
      <div class="page-title"><i class="icon-display4"></i>Edit New Machine Details</div>
      <ul class="breadcrumb">
        <li><a href="admin_dashboard.php"></a></li>
        <li><a href="#"></a>Machine Information</li>
        <li class="active">Edit New Machine Details</li>
      </ul>
    </div>
  </div>
  <!-- /Page Header-->
  <div class="container-fluid page-content">
    <div class="row">
     <div class="text-center">
      <?php $msg->display(); ?>
       </div>
        <div class="col-md-12 col-sm-12">
         <!-- Basic inputs -->
          <div class="panel panel-default">
           <div class="panel-heading">
            <div class="panel-title">Edit Machine Details </div>
             </div>
              <div class="panel-body">
                <form name="myFunction" class="form-horizontal" action="admin_add_machine_details_edit_save.php" method="POST">

                 <?php
                 $query ="SELECT * FROM `lt_master_machine_detail` where `m_slno`='$slno'";   
                 $query_exe = mysqli_query($conn,$query);
                 if(mysqli_num_rows($query_exe)){          
                 while($rec = mysqli_fetch_array($query_exe)){
                 ?>
                 <?php $msg->display(); ?>
                 
                 <input type="hidden" value="<?php echo $rec['m_slno']; ?>" name="slno">
                 <?php  if($rec['edit_status']=="0"){
                  ?>
                  <input type="hidden" name="edit_type" value="ALL">
                  <?php 
                 }else if($rec['edit_status']=="1"){
                  ?>
                  <input type="hidden" name="edit_type" value="Few">
                  <?php 

                 }else{

                  }?>

              <div class="form-group">
                <label class="control-label col-lg-4 text-right">Machine Unique Id</label>
                 <div class="col-lg-8">
               <?php echo strtoupper($rec['machine_unique_id']); ?><input type="hidden" value="<?php echo $rec['machine_unique_id']; ?>" name="machine_unique_id">
               </div>
             </div>

              <div class="form-group">
                <label class="control-label col-lg-4 text-right">Machine Name</label>
                 <div class="col-lg-8">
                  <input type="text" class="form-control" name="machine_name" value="<?php echo strtoupper($rec['machine_name']);?>" >
                </div>
             </div>
              <!--  <div class="form-group">
                 <label class="control-label col-lg-4 text-right">Client Name</label>
                 <div class="col-lg-8">
                  <input type="text" class="form-control" name="client_name" value="<?php echo $rec['client_name'];?>" >
                </div>
             </div> -->
             <div class="form-group">
                <label class="control-label col-lg-4 text-right">Machine Commissioning Date</label>
                 <div class="col-lg-8">
                   <input type="text" class="form-control" name="machine_commissioning" value="<?php echo strtoupper($rec['machine_commissioning']);?>">
               </div>
             </div>

            <div class="form-group">
              <label class="control-label col-lg-4 text-right">Machine Model No</label>
                <div class="col-lg-8">
                  <select class="form-control" name="model_no" id="demo" type="dropdown"  required="">
                  <?php
                    $iD_model=$rec['m_model_no'];
                    $query_view = "SELECT  * FROM `lt_master_machine_model_no` where `status`='1' ";
                    $exe_vieew = mysqli_query($conn,$query_view);
                    while($rec = mysqli_fetch_assoc($exe_vieew)){
                  ?>
                    <option value="<?php echo $rec['model_id'];?>" <?php if($iD_model==$rec['model_id']){ echo "selected";} ?>><?=strtoupper($rec['model_no']);?></option>
                   <?php }?>
                 </select>
               </div>
            </div>

              <?php } }?> 

              <a href="admin_add_machine_details_view.php" class="btn btn-warning"> Back</a>
              <div class="form-group pull-right">
              <input type="submit" class="btn btn-info" name="submit"  value="Save" onclick="myFunction()">
              </div>
            </form>
          </div>
        </div>            
      </div>
    </div>
  </div>


<?php
}else{
  header('Location:logout.php');
  exit;
}
$contents = ob_get_contents();
ob_clean();
include 'templete/header.php';

?>
