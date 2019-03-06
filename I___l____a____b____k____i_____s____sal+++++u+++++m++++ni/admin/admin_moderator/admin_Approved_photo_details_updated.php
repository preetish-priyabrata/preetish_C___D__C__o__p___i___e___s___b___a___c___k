<?php
session_start();
if(isset($_SESSION['admin_moderator'])){
require 'FlashMessages.php';
include '../config.php';
//$sl_no=$_GET['sl_no'];
 $msg = new \Preetish\FlashMessages\FlashMessages();
$title=$_REQUEST['title'];
$sl_no=$_REQUEST['slno'];
	$query="UPDATE `user_gallery_upload` SET `title`='$title',`moderator_status`='1' WHERE`sl_no`='$sl_no'";
 $query_exe = mysqli_query($conn,$query);

	             $msg->success('Forword To Approver User');
	             header("location:admin_moderator_unapproved_photo.php");

}else{
  header('Location:logout.php');
  exit;
}	
