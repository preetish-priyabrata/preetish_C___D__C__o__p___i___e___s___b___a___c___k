<?php
session_start();
if(isset($_SESSION['alumni_tech'])){
require 'FlashMessages.php';
include '../config.php';
$sl_no=$_GET['sl_no'];
 $msg = new \Preetish\FlashMessages\FlashMessages();
// print_r($_REQUEST);
// Array ( [sl_no] => 1 ) 
$sl_no=$_GET['sl_no'];
	$query="UPDATE `user_gallery_upload` SET `operation_status`='1' WHERE `sl_no`='$sl_no'";
	$sql_exe=mysqli_query($conn,$query);
	 $msg->success('Forword To Moderator Photo Gallery');
     header("location:admin_upload_photo_gallery.php");
}else{
	header('Location:logout.php');
    exit;
}