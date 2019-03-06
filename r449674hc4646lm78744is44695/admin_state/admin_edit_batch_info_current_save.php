<?php
session_start();
if($_SESSION['admin_emails']){
	require 'FlashMessages.php';
	require 'config.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
//print_r($_REQUEST);
// Array ( [challan_no] => 1234 [slno] => 2 [batch_store_id] => stockBR3 [batch_no] => b2 [total_item] => 1600 [total] => 500 [quanity] => 400 [quanity_OLD] => 500 ) 
// 
// 
$challan_no=$_POST['challan_no'];
$slno=$_POST['slno'];
$batch_store_id=$_POST['batch_store_id'];
$batch_no=$_POST['batch_no'];
$total=$_POST['total'];
$quanity=$_POST['quanity'];
$quanity_OLD=$_POST['quanity_OLD'];
$total_item=$_POST['total_item'];
$remark=$_POST['remark'];

$total_batch=$total-$quanity_OLD+$quanity;
$total_cal_item=$total_item-$total+$total_batch;
	// stock item in current item
	if($total_cal_item==0){
		$state_update="UPDATE `rhc_master_stock_state_items` SET `item_quantity`='$total_cal_item',`status`='0' WHERE`state_stock_batch_id`='$batch_store_id'";
		$sql_exe=mysqli_query($conn,$state_update);
	}else{
		if($total_cal_item>0){
			$state_update="UPDATE `rhc_master_stock_state_items` SET `item_quantity`='$total_cal_item',`status`='1' WHERE`state_stock_batch_id`='$batch_store_id'";
			$sql_exe=mysqli_query($conn,$state_update);
		}else{
			$msg->error('Negative value can not be updated in current item');
		}
	}
	// stock item batch no in current batch
	if($total_batch==0){
		$state_batch="UPDATE `rhc_master_stock_state_batch_details` SET `total_quantity`='$total_batch',`remaining_quantity`='$quanity',`status`='0',`remark`='$remark' WHERE`state_stock_batch_id`='$batch_store_id' and `slno`='$slno'";
		$sql_exe_batch=mysqli_query($conn,$state_batch);
	}else{
		if($total_batch>0){
			$state_batch="UPDATE `rhc_master_stock_state_batch_details` SET `total_quantity`='$total_batch',`remaining_quantity`='$quanity',`status`='1',`remark`='$remark' WHERE`state_stock_batch_id`='$batch_store_id' and `slno`='$slno'";
			$sql_exe_batch=mysqli_query($conn,$state_batch);
		}else{
			$msg->error('Negative value can not be updated in current batch');		
		}
	}
	if($sql_exe_batch && $sql_exe){
		$msg->success('Stock update in Current Stock');
		header('Location:admin_avaliable_stock_view.php');
		exit;
	}else{
		header('Location:admin_dashboard.php');
		exit;
	}
}else{
	header('Location:logout.php');
  	exit;
}