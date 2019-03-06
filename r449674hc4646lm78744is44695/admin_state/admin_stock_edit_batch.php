<?php
// print_r($_REQUEST);
session_start();
if($_SESSION['admin_emails']){
	require 'FlashMessages.php';
	require 'config.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	$batch_no=$_POST['batch_no'];
	$quanity=$_POST['quanity'];
	$quanity_OLD=$_POST['quanity_OLD'];
	$expire=date('Y-m-d',strtotime(trim($_REQUEST['expire'])));
	$detail_stock=$_POST['detail_stock'];
	$challan_no=$_POST['challan_no'];
	$slno=$_POST['slno'];

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
			// $total_quantity=$fetch_item_stock['total_quantity'];

			if($detail_stock==1){ // deduction

				$total_quantitys=$quantity-$quanity_OLD+$quanity;

				$update_stock_item="UPDATE `rhc_master_state_stock_level_chall_item_wise` SET `quantity`='$total_quantitys',`total_quantity`='$total_quantitys' WHERE`challan_no`='$challan_no' and `item_code`='$item_code' and `item_type`='$item_type'";

				$sql_exe_update_item=mysqli_query($conn,$update_stock_item);

				$query_stock_id="UPDATE `rhc_master_state_stock_level` SET `batch_no`='$batch_no',`batch_quantity`='$quanity',`quantity_total`='$quanity',`expire`='$expire' WHERE`slno`='$slno'";
				$sql_exe_update_stock_id=mysqli_query($conn,$query_stock_id);
				$msg->success('Successfully update batch information '.$challan_no);
				header('Location:admin_view_not_conform_information.php?challan_no='.$challan_no);
	  			exit;

			}else if($detail_stock==2){ // addtion of stock

				$total_quantitys=$quantity-$quanity_OLD+$quanity;
				// item wise stock updated challan 
				$update_stock_item="UPDATE `rhc_master_state_stock_level_chall_item_wise` SET `quantity`='$total_quantitys',`total_quantity`='$total_quantitys' WHERE`challan_no`='$challan_no' and `item_code`='$item_code' and `item_type`='$item_type'";
				
				$sql_exe_update_item=mysqli_query($conn,$update_stock_item);
				// batch wise stock update challan wise
				$query_stock_id="UPDATE `rhc_master_state_stock_level` SET `batch_no`='$batch_no',`batch_quantity`='$quanity',`quantity_total`='$quanity',`expire`='$expire' WHERE`slno`='$slno'";
				$sql_exe_update_stock_id=mysqli_query($conn,$query_stock_id);
				$msg->success('Successfully update batch information '.$challan_no);
				header('Location:admin_view_not_conform_information.php?challan_no='.$challan_no);
	  			exit;
				
			}else{ // other wise logout
				header('Location:logout.php');
		  		exit;
			}
		}else{
			header('Location:logout.php');
		  		exit;
		}
	}else{
		header('Location:logout.php');
	  	exit;
	}


 }else{
 	header('Location:logout.php');
  	exit;
 }
// Array ( [batch_no] => b3 [quanity] => 200 [quanity_OLD] => 500 [expire] => 2021-07-15 [detail_stock] => 1 [challan_no] => 1234 ) 