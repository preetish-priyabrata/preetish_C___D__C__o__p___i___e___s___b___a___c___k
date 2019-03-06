<?php
error_reporting(E_ALL);
session_start();
if($_SESSION['admin_emails']){

require 'FlashMessages.php';
include 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
date_default_timezone_set("Asia/Kolkata");

// Array ( [place_id] => BR [bill] => xyz [item_code] => cc [item_type] => f [total_qnt] => 1000 [batch_no] => Array ( [0] => b1 [1] => b2 [2] => [3] => ) [quanity] => Array ( [0] => 500 [1] => 500 [2] => [3] => ) [expire] => Array ( [0] => 11/28/2019 [1] => 12/26/2020 [2] => [3] => ) )
// 
$date=date('Y-m-d');
$time=date('H:i:s');
$bill=$_POST['bill'];
$place_id=$_POST['place_id'];
$item_code=$_POST['item_code'];
$item_type=$_POST['item_type'];
$total_qnt=$_POST['total_qnt'];
$batch_no=$_POST['batch_no'];
$quanity=$_REQUEST['quanity'];
$expire=$_REQUEST['expire'];

	$check_item="SELECT * FROM `rhc_master_stock_state_items` WHERE `state_place_id`='$place_id' and `item_codes`='$item_code' and `item_types`='$item_type'";
	$sql_item_state=mysqli_query($conn,$check_item);
	$num_rows_item=mysqli_num_rows($sql_item_state);
	if($num_rows_item!=0){
		$fetch_item=mysqli_fetch_assoc($sql_item_state);

		// here challan no of received from center is stored
		$check_qc="SELECT * FROM `rhc_master_chall_state` where `challan_no`='$bill'";
		$sql_exe_check_qc=mysqli_query($conn,$check_qc);
		$num_rows=mysqli_num_rows($sql_exe_check_qc);
		if($num_rows==0){
			$insert_bill="INSERT INTO `rhc_master_chall_state`(`slno`, `challan_no`, `total_qnt`, `status`, `date`, `time`) VALUES (NULL,'$bill','$total_qnt','0','$date','$time')";
			$sql_exe_bill=mysqli_query($conn,$insert_bill);
		}
		// $batch_id_state=$fetch_item['state_stock_batch_id'];
		$total_quantity_used=0;
		//here batch wise data is stored
		for ($i=0; $i <count($batch_no); $i++) { 
			if(!empty($batch_no[$i]) && !empty($quanity[$i]) && !empty($expire[$i])){
				$batch_id=$batch_no[$i];
				$batch_qnty=$quanity[$i];
				$total_quantity_used=$batch_qnty+$total_quantity_used;
				
				 $batch_exp=date('Y-m-d',strtotime($expire[$i]));
				 $query_state_level="INSERT INTO `rhc_master_state_stock_level`(`slno`, `challan_no`, `item_code`, `item_type`, `batch_no`, `batch_quantity`, `test_issue_quantity`, `test_received_quantity`, `quantity_total`, `expire`, `status_approve`, `status_qc`, `status_qc_return`, `status_released`, `date`, `time`) VALUES (NULL,'$bill','$item_code','$item_type','$batch_id','$batch_qnty','0','0','$batch_qnty','$batch_exp','0','0','0','0','$date','$time')";
					  $sql_exe_state_level=mysqli_query($conn,$query_state_level);

				// $query_state_batch_infomation="INSERT INTO `rhc_master_stock_state_batch_details`(`slno`, `state_stock_batch_id`, `challan_received_id`, `batch_nos`, `date_exp`, `total_quantity`, `remaining_quantity`, `status`, `date_creation`, `time_creation`, `state_place_id`) VALUES (NULL,'$batch_id_state','$bill','$batch_id','$batch_exp','$batch_qnty','$batch_qnty','1','$date','$time','$place_id')";
				// $sql_exe_state_batch_infomation=mysqli_query($conn,$query_state_batch_infomation);
			}


		}
		// $total_current_stock=$fetch_item['item_quantity']+$total_quantity_used;
		$query_stock_manuplation="SELECT * FROM `rhc_master_state_stock_level_chall_item_wise` WHERE `challan_no`='$bill' and `item_code`='$item_code' and `item_type`='$item_type'";
		$sql_exe_stock_manu=mysqli_query($conn,$query_stock_manuplation);
		 $num_row_stock_item=mysqli_num_rows($sql_exe_stock_manu);
		
		if($num_row_stock_item==0){
			$query_state_level_test="INSERT INTO `rhc_master_state_stock_level_chall_item_wise`(`slno`, `challan_no`, `item_code`, `item_type`, `quantity`, `issue_quantity`, `return_quantity`, `total_quantity`, `date`, `time`) VALUES (NULL,'$bill','$item_code','$item_type','$total_quantity_used','0','0','$total_quantity_used','$date','$time')";
			 $sql_exe_state_level_test=mysqli_query($conn,$query_state_level_test);
		}else{
			$fetch_item_stock=mysqli_fetch_assoc($sql_exe_stock_manu);
			//print_r($fetch_item_stock);
			
			 $quantity_up=$fetch_item_stock['quantity'];
			// $total_quantity=$fetch_item_stock['total_quantity'];
			 $total_quantity_used_ids=$total_quantity_used+$quantity_up;
			
			$update_stock_item="UPDATE `rhc_master_state_stock_level_chall_item_wise` SET `quantity`='$total_quantity_used_ids',`total_quantity`='$total_quantity_used_ids' WHERE`challan_no`='$bill' and `item_code`='$item_code' and `item_type`='$item_type'";
			 $sql_exe_state_level_test=mysqli_query($conn,$update_stock_item);
		}
		
		if($sql_exe_state_level_test){
			$msg->success('All batch detail is save in challan '.$bill);
     		header('Location:admin_dashboard.php');
      		exit;
		}else{
			$msg->error('Please Call service Provider');
     		header('Location:admin_dashboard.php');
      		exit;
		}
		
	//   
	}else{
		$msg->error('Item Is Missing In State WareHouse');
     	header('Location:admin_dashboard.php');
      	exit;
	}
}else{
	header('Location:logout.php');
  	exit;
} 