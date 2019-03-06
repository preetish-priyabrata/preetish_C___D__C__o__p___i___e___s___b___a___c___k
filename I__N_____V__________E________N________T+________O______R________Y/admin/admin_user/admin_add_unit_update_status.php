<?php

session_start();
if($_SESSION['admin']){
	require 'FlashMessages.php';
	require 'config.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
		// Array ( [slno] => 1 [unq_id] => hq1 [status] => 1 ) 
		// 

		$u_slno=$_REQUEST['u_slno'];
		$unq_id=$_REQUEST['unq_id'];
		$status=$_REQUEST['status'];
		if($status=="1"){
			$query="UPDATE `lt_master_unit_system` SET `status`='2' where `u_slno`='$u_slno' AND`u_code_unit`='$unq_id'";
		}else{
			$query="UPDATE `lt_master_unit_system` SET `status`='1' where `u_slno`='$u_slno' AND`u_code_unit`='$unq_id'";
		}
		$sql_update=mysqli_query($conn,$query);
		$msg->success('Successfull Unit System Status Is Updated');
		header('Location:admin_add_unit_view.php');
		exit;
}else{
	header('Location:logout.php');
	exit;
}