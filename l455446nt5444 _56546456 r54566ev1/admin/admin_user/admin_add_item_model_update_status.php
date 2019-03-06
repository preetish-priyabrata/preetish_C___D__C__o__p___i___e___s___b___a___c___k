<?php
session_start();
if($_SESSION['admin']){
	require 'FlashMessages.php';
	require 'config.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
		// Array ( [slno] => 1 [unq_id] => hq1 [status] => 1 ) 
		
		$i_slno=$_REQUEST['i_slno'];
		// $unq_id=$_REQUEST['machine_unique_id'];
		$status=$_REQUEST['status'];

		if($status=="1"){
			$query="UPDATE `lt_master_model_item_detail` SET `status`='2' WHERE `i_slno`='$i_slno'";
		}else{
			$query="UPDATE `lt_master_model_item_detail` SET `status`='1' WHERE `i_slno`='$i_slno'";
		}

		$sql_update=mysqli_query($conn,$query);
		$msg->success('Successfull Item Model Status Is Updated');
		header('Location:admin_add_item_model_view.php');
		exit;
		

}else{
	header('Location:logout.php');
	exit;
}

