<?php 
session_start();
include  'config.php';
$id=session_id();
$GET_CHECK="SELECT * FROM `care_master_login_history` WHERE `session_id`='$id' and `status_entry`='1'";
$sqli_exe=mysqli_query($conn,$GET_CHECK);
 $num_rows=mysqli_num_rows($sqli_exe);
if($num_rows==1){
	$fetch=mysqli_fetch_assoc($sqli_exe);
	$slno=$fetch['slno'];
	$time=date('H:i:s');
	$date_out=date('Y-m-d');
	$update="UPDATE `care_master_login_history` SET `status_entry`='2', `time_out`='$time',`date_out`='$date_out' WHERE`slno`='$slno'";
	$sqli_exe_update=mysqli_query($conn,$update);
	if($sqli_exe_update){
		session_destroy();
		session_regenerate_id();
		session_start();
		session_regenerate_id();
		require 'FlashMessages.php';
		 $msg = new \Preetish\FlashMessages\FlashMessages();
		 $msg->success('Success-Fully Logged Out');
		header('Location:../index.php');
		exit;
	}else{
		session_destroy();
		session_regenerate_id();
		session_start();
		session_regenerate_id();
		require 'FlashMessages.php';
		 $msg = new \Preetish\FlashMessages\FlashMessages();
		 $msg->error('some thing went worng');
		header('Location:../index.php');
		exit;
	}
}else{



	session_destroy();
	session_regenerate_id();
	session_start();
	session_regenerate_id();
	require 'FlashMessages.php';
	 $msg = new \Preetish\FlashMessages\FlashMessages();
	 $msg->Error('Invalid Access To System Of Care');
	header('Location:../index.php');
	exit;
}