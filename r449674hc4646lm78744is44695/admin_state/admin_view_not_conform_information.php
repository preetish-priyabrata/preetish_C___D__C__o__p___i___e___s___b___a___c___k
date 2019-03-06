<?php
// print_r($_REQUEST);
// Array ( [challan_no] => 1234 ) 

session_start();
ob_start();
if($_SESSION['admin_emails']){
require 'FlashMessages.php';
require 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $challan_no=$_REQUEST['challan_no'];

 $query_challan="SELECT * FROM `rhc_master_chall_state` WHERE `status`='0'";
 $sql_challan=mysqli_query($conn,$query_challan);
 $num_rows=mysqli_num_rows($sql_challan);
 if($num_rows!=0){

 }
 $result_fetch_challan=mysqli_fetch_assoc($sql_challan);

?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Stock Detail view
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Stock</a></li>
        <li class="active"><a href="#">view Stock </a></li>
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
        <div class="panel-heading text-center" style="background-color: lightpink;"><strong>Stock Information</strong></div>
        <div class="demo">
          <div class="panel-body">
            <form class="form-inline" id="indent" action="admin_state_stock_confirm.php" method="POST">
              <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="email">Date :</label>
                  <?=$result_fetch_challan['date']?>
                 
                </div>
                </div>
                 <div class="col-sm-6">
                <div class="form-group ">
                  <label for="pwd">Time :</label>
                 
                  <?=$result_fetch_challan['time']?>
                </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-sm-6">       
                <div class="form-group">
                  <label for="email">Location :</label>
                  <input type="hidden" name="place_id" id="place_id" value="<?=$_SESSION['place_id']?>">
                  BIHAR[BR]
                  <!-- <input type="email" class="form-control" id="email" value="Maner" readonly=""> -->
                </div>
                </div> 
                <div class="col-sm-6">
                <div class="form-group ">
                  <label for="pwd">Challan No</label>
                  <input type="hidden" autocomplete="off" class="form-control" name="bill" id="bill" value="<?=$challan_no?>">
                  <?=$challan_no?>
                  
                </div>
                </div>
              </div>
              <br>
            	 <div class="row">
              <div class="col-sm-6">       
                <div class="form-group">
                  <label for="email">Total Quantity :</label>
                   <input type="hidden" autocomplete="off"  class="form-control" id='total_qnt' name="total_qnt" required="" value="<?=$result_fetch_challan['total_qnt']?>"><?=$result_fetch_challan['total_qnt']?>
                      
                </div>
                </div>
              </div>
              <br>
              <table class="table " border="2">
                <tr>
                 <th>Item Code</th>
                  <th>Item Type</th>
                  <th>Total Quantity</th>
                  <th>Batch Information</th>
                  
                  
                </tr>
              <tr>
               
               <?php 
                  $get_list="SELECT * FROM `rhc_master_state_stock_level_chall_item_wise` WHERE `challan_no`='$challan_no' ";
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
                    <th>Action</th>
                   </tr>
                   <?php 
                   $get_batch="SELECT * FROM `rhc_master_state_stock_level` WHERE `challan_no`='$challan_no' and `item_code`='$item_code' and `item_type`='$item_type'";
                   $sql_exe_batch=mysqli_query($conn,$get_batch);
                   while ($res_batch=mysqli_fetch_assoc($sql_exe_batch)) {?>
                    <input type="hidden" autocomplete="off" class="form-control"  name="item_code[]" id="item_code" value="<?=$item_code?>" >
                     <input type="hidden" autocomplete="off" class="form-control"  name="item_type[]" id="item_type" value="<?=$item_type?>" >
                   <tr>
                     <td>
                     <input type="hidden" autocomplete="off" class="form-control"  name="batch_no[]" id="batch_no" value="<?=$res_batch['batch_no']?>" ><?=$res_batch['batch_no']?></td>
                    <td><input type="hidden" autocomplete="off" class="form-control" name="quanity[]" value="<?=$res_batch['batch_quantity']?>" ><?=$res_batch['batch_quantity']?></td>
                    <td><input type="hidden" autocomplete="off" class="form-control" name="expire[]" id="expire" value="<?=$res_batch['expire']?>">
                    <?=$res_batch['expire']?></td>
                    <td><a href="admin_edit_batch_info.php?challan_no=<?=$challan_no?>&slno=<?=$res_batch['slno']?>"><b style="color:green">Edit</b></a> || <a href="admin_delete_batch_info.php?challan_no=<?=$challan_no?>&slno=<?=$res_batch['slno']?>&stock=<?=$res_batch['batch_quantity']?>">Delete</a></td>
                   </tr>
                   <?php }?>
                 </table></td>
                  
                  
                </tr>
                  
                <?php }?>
              </table>
    
            <div class="row">
            <div class="col-sm-12">

             <span class="text-left">
               <a href="admin_stock_entry_new_view1.php"  class="btn btn-default">Back</a>             
            </span>
            <span class="text-center" id="error" style="color: red;"></span>
          <span class="pull-right">
          
           <button type="submit" onclick="return confirm('Do you want to update current stock with this information?');"  class="btn btn-default">Submit</button>
           </span>
           </div>
        </div>
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
