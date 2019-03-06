<?php
error_reporting(E_ALL);
session_start();
if($_SESSION['admin_emails']){

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

$item_code=$_POST['item_code'];
$item_type=$_POST['item_type'];
$batch_no=$_POST['batch_no'];
$batch_quantity=$_POST['batch_quantity'];
$expire=$_POST['expire'];
$batch_serial=$_POST['batch_serial'];

$issue_quantity=$_POST['issue_quantity'];
$submit=$_POST['submit'];
	if($submit=="issue"){
		for ($i=0; $i <count($item_code1) ; $i++) {
		$total_issue =0;
			for ($j=0; $j <count($item_code) ; $j++) { 
				 $check_i=$item_code1[$i].$item_type1[$i];
				 $check_j=$item_code[$j].$item_type[$j];
				if($check_i==$check_j){
					 $total_issue=$total_issue+$issue_quantity[$j];
					$issue=$issue_quantity[$j];
					$slno=$batch_serial[$j];
					$query_update_batch="UPDATE `rhc_master_state_stock_level` SET`test_issue_quantity`='$issue',`status_qc`='1'WHERE`slno`='$slno'";
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
			$update_item="UPDATE `rhc_master_state_stock_level_chall_item_wise` SET `issue_quantity`='$issued' WHERE `slno`='$slnos'";
			$query_update=mysqli_query($conn,$update_item);
		}

		$update_qc="UPDATE `rhc_master_chall_state` SET `status`='1' WHERE `challan_no`='$qc_challan'";
		$sql_exe_qc=mysqli_query($conn,$update_qc);
		$msg->success('QC Challan No is'.$qc_challan.' been issued for test');
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
