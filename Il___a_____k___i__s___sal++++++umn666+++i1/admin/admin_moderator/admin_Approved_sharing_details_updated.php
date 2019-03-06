<?php
session_start();
if(isset($_SESSION['admin_moderator'])){
require 'FlashMessages.php';
include '../config.php';
//$sl_no=$_GET['sl_no'];
 $msg = new \Preetish\FlashMessages\FlashMessages();
// print_r($_REQUEST);
// Array ( [sl_no] => 1 ) 
 // [title][text_id][text] [slno] 
$title=$_REQUEST['title'];
$text_id=$_REQUEST['text_id'];
$text=$_REQUEST['text'];
$sl_no=$_REQUEST['slno'];
	if($text_id==2){
	 $query ="UPDATE `user_sharing_info_details` set `title`='$title',`text`='$text' where `sl_no`='$sl_no'";
	 

	             $query_exe = mysqli_query($conn,$query);
	              $query_info ="UPDATE `user_sharing_Info` set `title`='$title', `admin_status`='3' where `sl_no`='$sl_no'";           
	               $query_exe = mysqli_query($conn,$query_info);

	             $msg->success('Forword To Approver User');
	             header("location:admin_dashboard.php");
	}else{
		$query ="UPDATE `user_sharing_info_details` set `title`='$title' where `sl_no`='$sl_no'";
	 

	             $query_exe = mysqli_query($conn,$query);
	             $query_info ="UPDATE `user_sharing_Info` set `title`='$title',`admin_status`='3'  where `sl_no`='$sl_no'";           
	               $query_exe = mysqli_query($conn,$query_info);

	             $msg->success('Forword To Approver User');
	             header("location:admin_dashboard.php");
	}
}else{
	header('Location:logout.php');
    exit;
}