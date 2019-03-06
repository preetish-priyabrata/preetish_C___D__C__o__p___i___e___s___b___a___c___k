<?php 
 //print_r($_POST);
  //exit;
error_reporting(E_ALL);
session_start();
if($_SESSION['admin_emails']){
// print_r($_POST);
require 'FlashMessages.php';
include 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
date_default_timezone_set("Asia/Kolkata");
 $msg = new \Preetish\FlashMessages\FlashMessages();
$qc_challan=$_POST['qc_challan'];
$item_code1=$_POST['item_code1'];
$item_type1=$_POST['item_type1'];
$item_quantity=$_POST['item_quantity'];
$item_serial=$_POST['item_serial'];
$issue_item=$_POST['issue_item'];


$item_code=$_POST['item_code'];
$item_type=$_POST['item_type'];

$batch_no=$_POST['batch_no'];
$batch_quantity=$_POST['batch_quantity'];
$expire=$_POST['expire'];
$batch_serial=$_POST['batch_serial'];
$batch_test_issue_quantity=$_POST['batch_test_issue_quantity'];
$issue_quantity=$_POST['issue_quantity'];
$submit=$_POST['submit'];
	if($submit=="Return"){
		for ($i=0; $i <count($item_code1) ; $i++) {
		$total_issue =0;
			for ($j=0; $j <count($item_code) ; $j++) { 
				  $check_i=$item_code1[$i].$item_type1[$i];
				 $check_j=$item_code[$j].$item_type[$j];
				if($check_i==$check_j){
					// / "string";
					$total_issue=$total_issue+$issue_quantity[$j];
					$total_quantity=$batch_quantity[$j]+$issue_quantity[$j]-$batch_test_issue_quantity[$j];
					$issue=$issue_quantity[$j];
					$slno=$batch_serial[$j];
					 $query_update_batch="UPDATE `rhc_master_state_stock_level` SET`test_received_quantity`='$issue',`status_qc`='1' ,`quantity_total`='$total_quantity' , `status_qc_return` ='1' , `status_approve`='1' WHERE`slno`='$slno'";
					$query_update=mysqli_query($conn,$query_update_batch);
				}
				
			}
			// echo $total_issue;
			$serials=$item_serial[$i];
			$item_codes=$item_code1[$i];
			$item_types=$item_type1[$i];
				 $issueed[] = array('item_codes' =>$item_codes ,'item_types' =>$item_types, 'issued'=> $total_issue,'slno'=>$serials);
				 // print_r($issueed);
		}
		for ($i=0; $i < count($issueed); $i++) { 

			$slnos=$issueed[$i]['slno'];
			$issued=$issueed[$i]['issued'];
			$total_item_quantity=$item_quantity[$i]-$issue_item[$i]+$issued;
			$update_item="UPDATE `rhc_master_state_stock_level_chall_item_wise` SET `return_quantity`='$issued',`total_quantity`='$total_item_quantity' WHERE `slno`='$slnos'";
			$query_update=mysqli_query($conn,$update_item);
		}

		$update_qc="UPDATE `rhc_master_chall_state` SET `status`='2' WHERE `challan_no`='$qc_challan'";
		$sql_exe_qc=mysqli_query($conn,$update_qc);

		// here stock value of item is 1st update 
		for ($i=0; $i <count($item_code1) ; $i++) { 
			$slnos=$issueed[$i]['slno'];
			$issued=$issueed[$i]['issued'];
			$total_item_quantity=$item_quantity[$i]-$issue_item[$i]+$issued;
			$item_codes=$item_code1[$i];
			$item_types=$item_type1[$i];

			$get_available_state="SELECT * FROM `rhc_master_stock_state_items` WHERE `item_codes`='$item_codes' and `item_types`='$item_types'";
			$sql_exe_get_state=mysqli_query($conn,$get_available_state);
			$fetch_state=mysqli_fetch_assoc($sql_exe_get_state);
			$state_quanity=$fetch_state['item_quantity'];
			$item_quantity_state=$state_quanity+$total_item_quantity;
			$update_state="UPDATE `rhc_master_stock_state_items` SET `item_quantity`='$item_quantity_state',`status`='1' WHERE  `item_codes`='$item_codes' and `item_types`='$item_types'";
			$sql_exe_get_state=mysqli_query($conn,$update_state);

		}
		$date=date('Y-m-d');
		$time=date('H:i:s');
		for ($j=0; $j <count($item_code) ; $j++) { 
			$item_codes=$item_code1[$j];
			$item_types=$item_type1[$j];

			$get_available_state="SELECT * FROM `rhc_master_stock_state_items` WHERE `item_codes`='$item_codes' and `item_types`='$item_types'";
			$sql_exe_get_state=mysqli_query($conn,$get_available_state);
			$fetch_state=mysqli_fetch_assoc($sql_exe_get_state);
			$state_batch_id=$fetch_state['state_stock_batch_id'];
			$total_quantity=$batch_quantity[$j]+$issue_quantity[$j]-$batch_test_issue_quantity[$j];
			$batch_nos=$batch_no[$j];
			// $batch_quantitys=$batch_quantity[$j];
			$expires=$expire[$j];
			echo $insert="INSERT INTO `rhc_master_stock_state_batch_details`(`slno`, `state_stock_batch_id`, `batch_nos`, `date_exp`, `total_quantity`, `remaining_quantity`, `status`, `date_creation`, `time_creation`, `state_place_id`) VALUES (NULL,'$state_batch_id','$batch_nos','$expires','$total_quantity','$total_quantity','1','$date','$time','BR')";
$sql_exe_get_state=mysqli_query($conn,$insert);
		}
	


		$msg->success('QC Challan No is'.$qc_challan.' Is been Approve and Status Is Updated');
		header('Location:admin_dashboard.php');
	  	exit;
	}else{
		$msg->error('Some Field Is missing');
		header('Location:admin_dashboard.php');
	  	exit;
	}
}else{
$msg->error('Some Field Is missing');
		header('Location:logout.php');
	  	exit;
}
