<?php
session_start();
ob_start();
if($_SESSION['admin_emails']){
require 'FlashMessages.php';
require 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $place_id_dh=$_SESSION['place_id']?>

                <?php
                 
                $get_dh="SELECT * FROM `rhc_master_place_uphc` WHERE `place_uphc_id`='$place_id_dh'";
                $sql_exec_dh=mysqli_query($conn,$get_dh);
                $dh_fetch_detail=mysqli_fetch_assoc($sql_exec_dh);
               ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Stock Of <?php  echo strtoupper($dh_fetch_detail['uphc_name']).'['.$dh_fetch_detail['place_uphc_id'].']';?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Stock Entry</a></li>
        <li class="active"><a href="#">Stock View Details</a></li>
        <!-- <li class="active">Blank page</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="text-center">
      <?php $msg->display(); ?>
    </div>
     <div class="row">
    <div class="col-sm-12">
    <div class="box box-info">
      <!-- end message displayed -->
      <div class="panel panel-default">
        <div class="panel-heading text-center" style="background-color: lightpink;"><strong> Stock View Detail</strong></div>
        <div class="demo">
          <div class="panel-body">
               

              <table d="example1" class="table table-bordered table-striped table-hover" border="2">
                <tr>
                 <th>Item Code</th>
                  <th>Item Type</th>
                  <th>Total Quantity</th>
                  <th>Batch Information</th>
                  
                  
                </tr>
              <tr>
               
               <?php 
               $date=date('Y-m-d');
                  $get_list="SELECT * FROM `rhc_master_stock_uphc_items` WHERE `uphc_place_id`='$place_id_dh' ";
                  $sql_exe_list=mysqli_query($conn,$get_list);
                  while ($res=mysqli_fetch_assoc($sql_exe_list)) {
                  ?>
                  <tr>
                 <td><?=$item_code=$res['item_codes']?></td>
                  <td><?=$item_type=$res['item_types']?></th>
                  <td><?=$item_quantity=$res['item_quantity']?></td>
                 <td>
                <?php if($res['status']==0){
                    echo "<p class='text-center' style='color:red'>No Stock Avaliable</p>";
                  }else{?>
                 <table class="table" border="1">
                   <tr>
                     <th>Batch No</th>
                    <th>Batch Quantity</th>
                    <th>Expire</th>
                    <th>Action</th>
                   </tr>
                   <?php 
                    $batch_id=$res['uphc_stock_batch_id'];
                    $get_batch="SELECT * FROM `rhc_master_stock_uphc_batch_details` WHERE `uphc_stock_batch_id`='$batch_id' and `status`='1' and `date_exp`>'$date' ORDER BY YEAR(`date_exp`) ASC, MONTH(`date_exp`) ASC, DAY(`date_exp`) ASC";
                   $sql_exe_batch=mysqli_query($conn,$get_batch);
                   $num=mysqli_num_rows($sql_exe_batch);
                   if($num==0){?>
                    <tr>
                    <td colspan="4"><p class='text-center' style='color:red'>No Stock Avaliable</p></td>
                    </tr>
                <?php   }else{
                     while ($res_batch=mysqli_fetch_assoc($sql_exe_batch)) {?>
                     
                     <tr>
                       <td><?=$res_batch['batch_nos']?></td>
                      <td><?=$res_batch['remaining_quantity']?></td>
                      <td><?=$res_batch['date_exp']?></td>
                      <!-- `slno``state_stock_batch_id``challan_received_id``batch_nos` -->
                       <td><a href="admin_edit_batch_info_current.php?slno=<?=$res_batch['slno']?>&batch_store_id=<?=$res_batch['uphc_stock_batch_id']?>&batch_no=<?=$res_batch['batch_nos']?>"><b style="color:green">Edit</b></a> </td>
                     </tr>
                     <?php }
                 }
                   ?>
                 </table>
                 <?php }?>
                 </td>
                  
                  
                </tr>
                  
                <?php }?>
              </table>
    
             
             

              
            <span class="text-left">
               <a href="admin_dashboard.php"  class="btn btn-default">Back</a>             
            </spam>
        </div>
      </div>
      </div>
      </div>
      </div>
      
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
