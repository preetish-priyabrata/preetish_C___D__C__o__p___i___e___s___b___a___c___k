<?php 
session_start();
ob_start();
if(isset($_SESSION['alumni_tech'])){
	require 'FlashMessages.php';
	include '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();
	// Array ( [slno] => 1 [status] => 1 ) admin_profile_approved.php
	//
	$slno=$_REQUEST['slno'];
	$status=$_REQUEST['status'];
	if($status=="1"){
		 $update="UPDATE `master_user_registration` SET `status`='2' where `sl_no`='$slno'";
	}else{
		$update="UPDATE `master_user_registration` SET `status`='1' where `sl_no`='$slno'";
	}
	$sql_update=mysqli_query($conn,$update);
	// echo mysqli_error($conn);
	// exit;
	$msg->success('Successfull Alumni Status Is Updated');
	header('Location:admin_profile_approved.php');
	exit;
}else{
	header('Location:logout.php');
    exit;
}