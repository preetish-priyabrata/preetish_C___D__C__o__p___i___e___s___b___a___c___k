<?php
error_reporting(E_ALL);
session_start();
if($_SESSION['admin_emails']){

	require 'FlashMessages.php';
	include 'config.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
	date_default_timezone_set("Asia/Kolkata");

// Array ( [place_id] => BR [bill] => 1234 [total_qnt] => 1500 [item_code] => Array ( [0] => cc [1] => cc [2] => cc [3] => cc ) [item_type] => Array ( [0] => f [1] => f [2] => f [3] => f ) [batch_no] => Array ( [0] => B1 [1] => b2 [2] => N3 [3] => b6 ) [quanity] => Array ( [0] => 500 [1] => 500 [2] => 500 [3] => 100 ) [expire] => Array ( [0] => 2018-01-01 [1] => 2017-10-01 [2] => 2018-02-01 [3] => 2017-11-01 ) ) 
// 
// 
	$date=date('Y-m-d');
	$time=date('H:i:s');
	$place_id=$_REQUEST['place_id'];
	$bill=$_REQUEST['bill'];
	$total_qnt=$_REQUEST['total_qnt'];
	$item_code=$_REQUEST['item_code'];
	$item_type=$_REQUEST['item_type'];
	$batch_no=$_REQUEST['batch_no'];
	$quanity=$_REQUEST['quanity'];
	$expire=$_REQUEST['expire'];

	// ALL DETAIL IS UPDATE WITH CURRENT STOCK
	for ($i=0; $i <count($batch_no); $i++) { 

		if(!empty($batch_no[$i]) && !empty($quanity[$i]) && !empty($expire[$i])){ // IT SOME BATCH HAVING EMPTY VALUE WILL NOT BEEN INSERT
			$batch_id=$batch_no[$i];
			$batch_qnty=$quanity[$i];
			$batch_exp=date('Y-m-d',strtotime($expire[$i]));
			$item_codes=$item_code[$i];
			$item_types=$item_type[$i];
			// here we check stock state int o item table
			$check_item="SELECT * FROM `rhc_master_stock_state_items` WHERE `state_place_id`='$place_id' and `item_codes`='$item_codes' and `item_types`='$item_types'";
			$sql_item_state=mysqli_query($conn,$check_item);
			$num_rows_item=mysqli_num_rows($sql_item_state);
			if($num_rows_item!=0){ // checking batch infomation is present current stock table

				$fetch_item=mysqli_fetch_assoc($sql_item_state);
				$batch_id_state=$fetch_item['state_stock_batch_id'];
				$item_quantity=$fetch_item['item_quantity'];
				$total_quantity_used=$batch_qnty+$item_quantity;

				 $query_update_state_item="UPDATE `rhc_master_stock_state_items` SET `item_quantity`='$total_quantity_used',`date_creation`='$date',`time_creation`='$time',`status`='1' WHERE `item_codes`='$item_codes' and `item_types`='$item_types' and `state_place_id`='$place_id'";
				$sql_item_state_update=mysqli_query($conn,$query_update_state_item);

				// insert process
				
				$query_insert_batch="INSERT INTO `rhc_master_stock_state_batch_details`(`slno`, `state_stock_batch_id`, `challan_received_id`, `batch_nos`, `date_exp`, `total_quantity`, `remaining_quantity`, `status`, `date_creation`, `time_creation`, `state_place_id`) VALUES (NULL,'$batch_id_state','$bill','$batch_id','$batch_exp','$batch_qnty','$batch_qnty','1','$date','$time','$place_id')";
				$sql_item_insert_batch=mysqli_query($conn,$query_insert_batch);
				// HERE STOCK OF ALL LEVEL IS MADE CLEAR BECAUSE THIS FACLITY IS NO BE PROVIDE T
				$query_stock_batch_temp="UPDATE `rhc_master_state_stock_level` SET `status_released`='1',`status_qc_return`='1',`status_approve`='1',`status_qc`='1' where `challan_no`='$bill' and `item_code`='$item_codes' and `item_type`='$item_types' and `batch_no`='$batch_id'";
				$sql_item_stock_batch_tem=mysqli_query($conn,$query_stock_batch_temp);

			}else{
				$msg->error('Please Call service Provider');
     			header('Location:admin_dashboard.php');
      			exit;
			}

		}else{
			$msg->error('Please Call service Provider');
     		header('Location:admin_dashboard.php');
      		exit;
		}

	}
	// exit;
	// FOR LOOP END HERE 
	//WILL UPDATE CHALLAN NO
	$query_update_chall="UPDATE `rhc_master_chall_state` SET `status`='2' WHERE `challan_no`='$bill'";
	$sql_item_update_chall=mysqli_query($conn,$query_update_chall);
	$msg->success('Successfull add to current stock of bihar');
    header('Location:admin_stock_entry_new_view1.php');
    exit;

}else{
	header('Location:logout.php');
  	exit;
}