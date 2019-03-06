<?php
session_start();
if($_SESSION['admin_emails']){
	require 'FlashMessages.php';
	require 'config.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
// print_r($_REQUEST);
// exit;
// Array ( [challan_no] => 1234 [slno] => 1 [stock] => 50 ) 
$challan_no=$_REQUEST['challan_no'];
$slno=$_REQUEST['slno'];
$batch_quantity=$_REQUEST['stock'];
	// here getting item type 
	 $query_item_detail="SELECT * FROM `rhc_master_state_stock_level` WHERE `slno`='$slno' and `challan_no`='$challan_no'";
	
	$sql_exe=mysqli_query($conn,$query_item_detail);

	$num_rows=mysqli_num_rows($sql_exe);
	if($num_rows!=0){ // here it check  before any edit is made 
		$fetch=mysqli_fetch_assoc($sql_exe);
		$item_code=$fetch['item_code'];
		$item_type=$fetch['item_type'];
		// total information in batch information
		$query_stock_manuplation="SELECT * FROM `rhc_master_state_stock_level_chall_item_wise` WHERE `challan_no`='$challan_no' and `item_code`='$item_code' and `item_type`='$item_type'";
		$sql_exe_stock_manu=mysqli_query($conn,$query_stock_manuplation);
		$num_row_stock_item=mysqli_num_rows($sql_exe_stock_manu);
		if($num_row_stock_item!=0){
			$fetch_item_stock=mysqli_fetch_assoc($sql_exe_stock_manu);
			$quantity=$fetch_item_stock['quantity'];
			$total_quantitys=$quantity-$batch_quantity;
			// stock update 
			$update_stock_item="UPDATE `rhc_master_state_stock_level_chall_item_wise` SET `quantity`='$total_quantitys',`total_quantity`='$total_quantitys' WHERE`challan_no`='$challan_no' and `item_code`='$item_code' and `item_type`='$item_type'";

				$sql_exe_update_item=mysqli_query($conn,$update_stock_item);
				$delete_stock_batch="DELETE FROM `rhc_master_state_stock_level` WHERE `slno`='$slno'";
				$sql_exe_delete_item_batch=mysqli_query($conn,$delete_stock_batch);
				$msg->success('Successfully deleted batch information '.$challan_no);
				header('Location:admin_view_not_conform_information.php?challan_no='.$challan_no);
	  			exit;
		}else{
			$msg->error('Something went wrong1');
			header('Location:admin_view_not_conform_information.php?challan_no='.$challan_no);
	  		exit;
		}
	}else{
			$msg->error('Something went wrong');
			header('Location:admin_view_not_conform_information.php?challan_no='.$challan_no);
	  		exit;
	}
}else{
	header('Location:logout.php');
  	exit;
}