<?php
session_start();
if($_SESSION['admin']){
	require 'FlashMessages.php';
	require 'config.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
		// Array ( [slno] => 1 [unq_id] => hq1 [status] => 1 ) 
		
		$slno=$_REQUEST['slno'];
		// $unq_id=$_REQUEST['machine_unique_id'];
		$status=$_REQUEST['status'];

		if($status=="1"){
			$query="UPDATE `lt_master_item_detail` SET `status`='2' WHERE `slno`='$slno' ";
		}else{
			$query="UPDATE `lt_master_item_detail` SET `status`='1' WHERE `slno`='$slno'";
		}

		$sql_update=mysqli_query($conn,$query);
		$msg->success('Successfull Item Status Is Updated');
		header('Location:admin_add_item_view.php');
		exit;
		

}else{
	header('Location:logout.php');
	exit;
}

