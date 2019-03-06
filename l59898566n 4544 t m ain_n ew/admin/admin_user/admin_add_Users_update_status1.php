<?php

session_start();
if($_SESSION['admin']){
	require 'FlashMessages.php';
	require 'config.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
		// Array ( [slno] => 1 [unq_id] => hq1 [status] => 1 ) 
		$u_slno=$_REQUEST['u_slno'];
		$unq_id=$_REQUEST['unq_id'];
		$u_status=$_REQUEST['u_status'];
		if($u_status!="0"){
			if($u_status=="2"){
				$query="UPDATE `lt_master_user_system` SET `u_status`='1' where `u_slno`='$u_slno' AND `user_id`='$unq_id'";
			}else {
				$query="UPDATE `lt_master_user_system` SET `u_status`='2' where `u_slno`='$u_slno' AND `user_id`='$unq_id'";
			}
			$sql_update=mysqli_query($conn,$query);
			$msg->success('Successfull User Status Is Updated');
			header('Location:admin_add_Users_view.php');
			exit;
		}else{
			$query="UPDATE `lt_master_user_system` SET `u_status`='0' where `u_slno`='$u_slno' AND `user_id`='$unq_id' ";
			$sql_update=mysqli_query($conn,$query);
			$msg->success('Successfull User Is Deleted From System');
			header('Location:admin_add_Users_view.php');
			exit;
		}
}else{
	header('Location:logout.php');
	exit;
}