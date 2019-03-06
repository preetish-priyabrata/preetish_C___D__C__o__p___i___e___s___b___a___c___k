<?php
session_start();
ob_start();
if($_SESSION['email']){
require 'FlashMessages.php';
include '../config.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
// rray ( [id] => 2 [sl_no_receiver] => 1 [email] => royusharani@gmail.com [submit] => Friend Request Sent ) 
// 
// 
$send_email=$_SESSION['email'];
$receiver_email=$_POST['email'];
$sl_no_receiver=$_POST['sl_no_receiver'];
$sl_no_send=$_SESSION['sl_no'];
$date=date('Y-m-d');
$time=date('H:i:s');

$query_friend="INSERT INTO `master_friend_request`(`sl_no`, `friend_id_send`, `friend_id_receive`, `friend_email_send`, `friend_email_receive`, `date_request`, `time_request`, `date_change`, `time_change`) VALUES (Null,'$sl_no_send','$sl_no_receiver','$send_email','$receiver_email','$date','$time','$date','$time')";
$sql_exe_friend=mysqli_query($conn,$query_friend);

 $msg->success('Success-Fully Send FriendRequest');
header('Location:alumni_dashboard.php');
exit();


}else{
	header('Location:logout.php');
  	exit;
}