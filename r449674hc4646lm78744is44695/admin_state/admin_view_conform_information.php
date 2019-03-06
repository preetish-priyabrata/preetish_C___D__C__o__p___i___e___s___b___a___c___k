<?php 
session_start();
ob_start();
if($_SESSION['admin_emails']){
require 'FlashMessages.php';
require 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
  $challan_no=$_REQUEST['challan_no'];

 $query_challan="SELECT * FROM `rhc_master_chall_state` WHERE `status`='2'";
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
                  	<th>Batch Entered</th>
                  	<th>Current Batch </th>                  
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
                 	<td>
		                <table class="table" border="1">
		                   <tr>
		                    	<th>Batch No</th>
		                   		<th>Batch Quantity</th>
		                    	<th>Expire</th>		                    
		                   </tr>
		                   <?php 
		                   		$get_batch="SELECT * FROM `rhc_master_state_stock_level` WHERE `challan_no`='$challan_no' and `item_code`='$item_code' and `item_type`='$item_type'";
		                   		$sql_exe_batch=mysqli_query($conn,$get_batch);
		                   		while ($res_batch=mysqli_fetch_assoc($sql_exe_batch)) {?>
		                    
		                   	<tr>
		                     	<td><?=$res_batch['batch_no']?></td>
		                    	<td><?=$res_batch['batch_quantity']?></td>
		                    	<td><?=$res_batch['expire']?></td>		                    
		                   	</tr>
		                    <?php }?>
		                </table>
                 	</td>
                   	<td>
	                 	<table class="table" border="1">
	                   		<tr>
	                    		<th>Batch No</th>
	                    		<th>Batch Quantity</th>
	                    		<th>Quantity Remaining</th>
	                    		<th>Expire</th>	                    
	                   		</tr>
			                <?php 
			                	 $get_batch_id="SELECT * FROM `rhc_master_stock_state_items` WHERE `item_codes`='$item_code' and `item_types`='$item_type' and `state_place_id`='BR'";
			                	$sql_exe_items=mysqli_query($conn,$get_batch_id);	
			                	$fetch_id_batch=mysqli_fetch_assoc($sql_exe_items);
			                	
			                	$batch_state_ids=$fetch_id_batch['state_stock_batch_id'];
			                	$get_batch_state="SELECT * FROM `rhc_master_stock_state_batch_details` WHERE `challan_received_id`='$challan_no' and `state_stock_batch_id`='$batch_state_ids' ";
			                   	$sql_exe_batch_state=mysqli_query($conn,$get_batch_state);
			                   	while ($res_batch_state=mysqli_fetch_assoc($sql_exe_batch_state)) {?>	                    
	                   		<tr>
	                     		<td><?=$res_batch_state['batch_nos']?></td>
	                    		<td><?=$res_batch_state['total_quantity']?></td>
	                    		<td><?=$res_batch_state['remaining_quantity']?></td>
	                    		<td><?=$res_batch_state['date_exp']?></td>	                    
	                   		</tr>
	                   		<?php }?>
	                 	</table>
                 	</td>
                  
                </tr>
                  
                <?php }?>
              </table>
    
            <div class="row">
            <div class="col-sm-12">

             <span class="text-left">
               <a href="admin_stock_entry_new_view1.php"  class="btn btn-default">Back</a>             
            </span>
            <span class="text-center" id="error" style="color: red;"></span>
          
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

