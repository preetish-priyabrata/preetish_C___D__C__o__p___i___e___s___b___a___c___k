<?php

session_start();
if($_SESSION['admin']){
	require 'FlashMessages.php';
	require 'config.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
		// Array ( [slno] => 1 [unq_id] => hq1 [status] => 1 ) 
		// 

		$slno=$_REQUEST['slno'];
		$unq_id=$_REQUEST['unq_id'];
		$status=$_REQUEST['status'];
		if($status=="1"){
			$query="UPDATE `lt_master_machine_category` SET `status`='2' where `slno`='$slno' AND`machine_cat_id`='$unq_id'";
		}else{
			$query="UPDATE `lt_master_machine_category` SET `status`='1' where `slno`='$slno' AND`machine_cat_id`='$unq_id'";
		}
		$sql_update=mysqli_query($conn,$query);
		$msg->success('Successfull Machine Category Status Is Updated');
		header('Location:admin_add_machine_category_view.php');
		exit;
}else{
	header('Location:logout.php');
	exit;
}