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
        Qc Stock Test Issue
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Stock Entry</a></li>
        <li class="active"><a href="#">Qc Stock View List</a></li>
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
        <div class="panel-heading text-center" style="background-color: lightpink;"><strong>Qc Stock Issue Detail</strong></div>
        <div class="demo">
          <div class="panel-body">
          <form action="admin_stock_entry_issue.php" method="POST">
                <?php 
                  $qc_challan=$_REQUEST['qc_challan'];
                   $get_list="SELECT * FROM `rhc_master_chall_state` WHERE `challan_no`='$qc_challan' ";
                  $sql_exe_list=mysqli_query($conn,$get_list);
                  $res_status=mysqli_fetch_assoc($sql_exe_list);
                ?>

              <table class="table " border="2">
                <tr>
                 <th>Item Code</th>
                  <th>Item Type</th>
                  <th>Quantity</th>
                  <?php if($res_status['status']==1 || $res_status['status']==2){?>
                  <th>Issued Qty</th>
                  <th>Total Remaining</th>
                  <?php }?>
                  <th>Batch Information</th>
                  
                  
                </tr>
              <tr>
                <input type="hidden" name="qc_challan" value="<?=$qc_challan?>" required="">
               <?php 

                  $get_list="SELECT * FROM `rhc_master_state_stock_level_chall_item_wise` WHERE `challan_no`='$qc_challan' ";
                  $sql_exe_list=mysqli_query($conn,$get_list);
                  while ($res=mysqli_fetch_assoc($sql_exe_list)) {
                  ?>
                  <tr>
                 <td><?=$item_code=$res['item_code']?></td>
                  <td><?=$item_type=$res['item_type']?></th>
                  <td><?=$item_qty=$item_quantity=$res['quantity']?></td>
                  <?php if($res_status['status']==1 || $res_status['status']==2){?>
                  <td><?=$issue_item=$res['issue_quantity']?></th>
                  <td><?=$item_qty-$issue_item?></td>

                  <?php }?>
                  <input type="hidden" name="item_code1[]" value="<?=$item_code?>" required="">
                     <input type="hidden" name="item_type1[]" value="<?=$item_type?>" required="">
                       <input type="hidden" name="item_quantity[]" value="<?=$item_quantity?>" required="">
                       <input type="hidden" name="item_serial[]" value="<?=$res['slno']?>" required="">
                 <td><table class="table" border="1">
                   <tr>
                     <th>Batch No</th>
                    <th>Batch Quantity</th>
                    <th>Expire</th>
                    
                    <th>Issue</th>
                    <?php if($res_status['status']==1 || $res_status['status']==2){?>
                    <th>Total Remain</th>
                    <?php }?>
                   </tr>
                   <?php 
                   $get_batch="SELECT * FROM `rhc_master_state_stock_level` WHERE `challan_no`='$qc_challan' and `item_code`='$item_code' and `item_type`='$item_type'";
                   $sql_exe_batch=mysqli_query($conn,$get_batch);
                   while ($res_batch=mysqli_fetch_assoc($sql_exe_batch)) {?>
                   
                   <tr>
                   <input type="hidden" name="item_code[]" value="<?=$item_code?>" required="">
                     <input type="hidden" name="item_type[]" value="<?=$item_type?>" required="">
                     <td><input type="hidden" name="batch_no[]" value="<?=$res_batch['batch_no']?>" required=""><?=$res_batch['batch_no']?></td>
                    <td><input type="hidden" name="batch_quantity[]" value="<?=$res_batch['batch_quantity']?>" required=""><?=$batch_qty=$res_batch['batch_quantity']?></td>
                    <td><input type="hidden" name="expire[]" value="<?=$res_batch['expire']?>" required=""><?=$res_batch['expire']?></td>
                    <input type="hidden" name="batch_serial[]" value="<?=$res_batch['slno']?>" required="">
                    <td>
                       <?php if($res_status['status']==0){?>
                    <input type="text" name="issue_quantity[]" required="">
                    <?php }else{?>
                    <?=$issued=$res_batch['test_issue_quantity']?>
                    <?php }?>
                    </td>
                     <?php if($res_status['status']==1 || $res_status['status']==2){?>
                     <td><?=$batch_qty-$issued?></td>
                     <?php }?>
                    
                   </tr>
                   <?php }?>
                 </table></td>
                  
                  
                </tr>
                  
                <?php }?>
              </table>
    
             
             

              
            <span class="text-left">
               <a href="admin_stock_entry_view.php"  class="btn btn-default">Back</a>             
            </spam>
            <?php if($res_status['status']==0 ){?>
            <span class="pull-right">
              <input type="submit" name="submit" value="issue">         
            </spam>
            <?php }?>
          </form>
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
<script type="text/javascript">
  $(document).on("keypress", "form", function(event) { 
    return event.keyCode != 13;
});
</script> 