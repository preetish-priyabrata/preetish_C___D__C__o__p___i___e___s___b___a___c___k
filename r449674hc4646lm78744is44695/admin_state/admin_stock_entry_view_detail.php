<?php
session_start();
ob_start();
if($_SESSION['admin_emails']){
require 'FlashMessages.php';
require 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Stock Detail
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Stock Entry</a></li>
        <li class="active"><a href="#"> View Stock Detail</a></li>
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
        <div class="panel-heading text-center" style="background-color: lightpink;"><strong> View Stock Detail</strong></div>
        <div class="demo">
          <div class="panel-body">
                <?php 
                  $qc_challan=$_REQUEST['qc_challan'];
                ?>

              <table class="table " border="2">
                <tr>
                 <th>Item Code</th>
                  <th>Item Type</th>
                  <th>Total Quantity</th>
                  <th>Batch Information</th>
                  
                  
                </tr>
              <tr>
               
               <?php 
                  $get_list="SELECT * FROM `rhc_master_state_stock_level_chall_item_wise` WHERE `challan_no`='$qc_challan' ";
                  $sql_exe_list=mysqli_query($conn,$get_list);
                  while ($res=mysqli_fetch_assoc($sql_exe_list)) {
                  ?>
                  <tr>
                 <td><?=$item_code=$res['item_code']?></td>
                  <td><?=$item_type=$res['item_type']?></th>
                  <td><?=$item_quantity=$res['quantity']?></td>
                 <td><table class="table" border="1">
                   <tr>
                     <th>Batch No</th>
                    <th>Batch Quantity</th>
                    <th>Expire</th>
                   </tr>
                   <?php 
                   $get_batch="SELECT * FROM `rhc_master_state_stock_level` WHERE `challan_no`='$qc_challan' and `item_code`='$item_code' and `item_type`='$item_type'";
                   $sql_exe_batch=mysqli_query($conn,$get_batch);
                   while ($res_batch=mysqli_fetch_assoc($sql_exe_batch)) {?>
                   
                   <tr>
                     <td><?=$res_batch['batch_no']?></td>
                    <td><?=$res_batch['batch_quantity']?></td>
                    <td><?=$res_batch['expire']?></td>
                   </tr>
                   <?php }?>
                 </table></td>
                  
                  
                </tr>
                  
                <?php }?>
              </table>
    
             
             

              
            <span class="text-left">
               <a href="admin_stock_entry_view.php"  class="btn btn-default">Back</a>             
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
