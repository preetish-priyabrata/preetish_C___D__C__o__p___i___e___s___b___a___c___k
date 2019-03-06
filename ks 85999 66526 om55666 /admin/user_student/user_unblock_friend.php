<?php
session_start();
ob_start();
if($_SESSION['email']){
require 'FlashMessages.php';
include '../config.php';
$msg = new \Preetish\FlashMessages\FlashMessages();

// Array ( [sl_no_one] => 2 [status] => 1 [sl_no_two] => 6 ) 
// 
// 
	$status=$_REQUEST['status'];
	if($status==1){
		$sl_no_send=$_REQUEST['sl_no_one'];
		$sl_no_receiver=$_REQUEST['sl_no_two'];
		$receiver_email=$_REQUEST['email_user'];
		$send_email=$_SESSION['email'];
		$date=date('Y-m-d');
		$time=date('H:i:s');	

		$query_friend="INSERT INTO `master_friend_request`(`sl_no`, `friend_id_send`, `friend_id_receive`, `friend_email_send`, `friend_email_receive`,`status` ,`date_request`, `time_request`, `date_change`, `time_change`) VALUES (Null,'$sl_no_send','$sl_no_receiver','$send_email','$receiver_email','5','$date','$time','$date','$time')";
		$sql_exe_friend=mysqli_query($conn,$query_friend);
		
	 	$msg->success('Success-Fully Block Friend');
		header('Location:search_friends.php');
		exit();
	}else{
		$serial=$_REQUEST['serial'];
		$query_friend="DELETE FROM `master_friend_request` WHERE `sl_no`='$serial'";
		$sql_exe_friend=mysqli_query($conn,$query_friend);
		$msg->success('Success-Fully Unblock Friend ');
		header('Location:search_friends.php');
		exit();
	}

}else{

}