<?php

session_start();
if($_SESSION['admin']){
	require 'FlashMessages.php';
	require 'config.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
		// Array ( [slno] => 1 [unq_id] => hq1 [status] => 1 ) 
		
		$slno=$_REQUEST['m_slno'];
		$unq_id=$_REQUEST['machine_unique_id'];
		$m_status=$_REQUEST['m_status'];

		if($m_status=="1"){
			$query="UPDATE `lt_master_machine_detail` SET `m_status`='2' where `m_slno`='$slno' AND `machine_unique_id`='$unq_id'";
		}else{
			$query="UPDATE `lt_master_machine_detail` SET `m_status`='1' where `m_slno`='$slno' AND `machine_unique_id`='$unq_id'";
		}

		$sql_update=mysqli_query($conn,$query);
		$msg->success('Successfull Machine Unique Id Status Is Updated');
		header('Location:admin_add_machine_details_view.php');
		exit;
		

}else{
	header('Location:logout.php');
	exit;
}

<?php
// print_r($_REQUEST);
// exit;
session_start();
if($_SESSION['admin']){
	require 'FlashMessages.php';
	require 'config.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
	// Array ( [slno] => 1 [unq_id] => ui90 [m_status] => 1 ) 
		$slno=$_REQUEST['m_slno'];
		$unq_id=$_REQUEST['machine_unique_id'];
		$status=$_REQUEST['m_status'];
		if($status=="1"){
			$query="UPDATE `lt_master_machine_detail` SET `m_status`='2' where `m_slno`='$slno' AND `machine_unique_id`='$unq_id'";
		}else{
			$query="UPDATE `lt_master_machine_detail` SET `m_status`='1' where `m_slno`='$slno' AND`machine_unique_id`='$unq_id'";
		}
		$sql_update=mysqli_query($conn,$query);
		echo mysqli_error($conn);

		$msg->success('Successfull Model No Status Is Updated');
		header('Location:admin_add_machine_details_view.php');
		exit;
}else{
	header('Location:logout.php');
	exit;
}