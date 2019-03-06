<?php
// print_r($_REQUEST);
// exit;
error_reporting(E_ALL);
session_start();
if($_SESSION['admin_emails']){

require 'FlashMessages.php';
include 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
date_default_timezone_set("Asia/Kolkata");
 $msg = new \Preetish\FlashMessages\FlashMessages();
// Array ( [bill] => 1234 [place_id] => BR [item_code] => ocp [item_type] => f [batch_no] => b123 [quanity] => 1000 [expire] => 07/29/2017 )
$date=date('Y-m-d');
$time=date('H:i:s');
$bill=$_POST['bill'];
$place_id=$_POST['place_id'];
$item_code=$_POST['item_code'];
$item_type=$_POST['item_type'];
$batch_no=$_POST['batch_no'];
$quanity=$_REQUEST['quanity'];
$expire=date('Y-m-d',strtotime(trim($_POST['expire'])));

$check_qc="SELECT * FROM `rhc_master_chall_state` where `challan_no`='$bill'";
$sql_exe_check_qc=mysqli_query($conn,$check_qc);
$num_rows=mysqli_num_rows($sql_exe_check_qc);
if($num_rows==0){
$insert_bill="INSERT INTO `rhc_master_chall_state`(`slno`, `challan_no`, `status`, `date`, `time`) VALUES (NULL,'$bill','0','$date','$time')";
$sql_exe_check_qc=mysqli_query($conn,$insert_bill);
}
$check_qc1="SELECT * FROM `rhc_master_chall_state` where `challan_no`='$bill'";
$sql_exe_check_qc1=mysqli_query($conn,$check_qc1);
$result_qc=mysqli_fetch_assoc($sql_exe_check_qc1);
$status=$result_qc['status'];
if($status==0){
	$query_batch="SELECT * FROM `rhc_master_state_stock_level` WHERE `item_code`='$item_code' and `challan_no`='$bill' and `item_type`='$item_type' and `batch_no`='$batch_no' and `status_qc`='0'";
$sql_exe_batch=mysqli_query($conn,$query_batch);
$num_batch=mysqli_num_rows($sql_exe_batch);
if($num_batch==0){
	$insert_batch="INSERT INTO `rhc_master_state_stock_level`(`slno`, `challan_no`, `item_code`, `item_type`, `batch_no`, `batch_quantity`, `expire`, `date`, `time`) VALUES (NULL,'$bill','$item_code','$item_type','$batch_no','$quanity','$expire','$date','$time')";
	$sql_exe_batch=mysqli_query($conn,$insert_batch);
	$check_qc_quantity="SELECT * FROM `rhc_master_state_stock_level_chall_item_wise` WHERE `challan_no`='$bill' and `item_code`='$item_code' and `item_type`='$item_type'";
	$sql_exe_quantity=mysqli_query($conn,$check_qc_quantity);
	 $num_quantity=mysqli_num_rows($sql_exe_quantity);
	
	if($num_quantity==0){
		$insert_quantity="INSERT INTO `rhc_master_state_stock_level_chall_item_wise`(`slno`, `challan_no`, `item_code`, `item_type`, `quantity`, `date`, `time`) VALUES (NULL,'$bill','$item_code','$item_type','$quanity','$date','$time')";
		
		$sql_exe_quantity=mysqli_query($conn,$insert_quantity);
		$msg->success('Stock Inseted To Stock oF Bihar');
      	header('Location:admin_stock_entry.php');
      	exit;
	}else{
		$check_qc_quantity1="SELECT * FROM `rhc_master_state_stock_level_chall_item_wise` WHERE `challan_no`='$bill' and `item_code`='$item_code' and `item_type`='$item_type'";
	$sql_exe_quantity1=mysqli_query($conn,$check_qc_quantity1);
	$quantity_result=mysqli_fetch_assoc($sql_exe_quantity1);
	 $num_row_check_quantity=mysqli_num_rows($sql_exe_quantity1);
	
	if($num_row_check_quantity==0){
		$quantity_db="0";
	}else{
		$quantity_db=$quantity_result['quantity'];
	}
	
	$slno=$quantity_result['slno'];
	 $total=$quantity_db+$quanity;
	$upDATE="UPDATE `rhc_master_state_stock_level_chall_item_wise` SET `quantity`='$total' WHERE `slno`='$slno'";
	
	$sql_exe_quantity1=mysqli_query($conn,$upDATE);
	$msg->success('Stock Inseted To Stock oF Bihar');
      header('Location:admin_stock_entry.php');
      exit;
	}

}else{
	$msg->error('Stock Batch No Is prent on our record oF Bihar');
      header('Location:admin_stock_entry.php');
      exit;
}

}else{
	if($status==1){
		$msg->error('QC Challan No is been issued Lab No More Item can be add To current Qc Challan = '.$bill);
      header('Location:admin_stock_entry.php');
      exit;
	}else{
		$msg->error('QC Challan No is been issued Lab No More Item can be add To current Qc Challan = '.$bill);
      header('Location:admin_stock_entry.php');
      exit;
	}
}




}else{
	header('Location:logout.php');
  	exit;
}
?>