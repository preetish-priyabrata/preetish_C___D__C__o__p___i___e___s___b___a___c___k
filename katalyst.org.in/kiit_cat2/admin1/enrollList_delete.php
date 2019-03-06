<?php
session_start();
ob_start();
// print_r($_SESSION);
if (($_SESSION['userId']!="")) {
	require 'config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
if (isset($_GET['enroll'])) {
    $enroll = str_replace(" ", "+", $_GET['enroll']);
    $enroll = decryptIt_webs($enroll);
    $query = "UPDATE `tbl_enrollment` SET `enrollment_status` = 'Closed' WHERE `enrollment_id` = '$enroll'";
    $res = mysqli_query($conn, $query);
    $msg->success('Successfull Enrollment  Is Deleted');
	header('Location:enquiryList.php');
	exit;
}else{
	header('Location:logout.php');
	exit;
}


 }else{
 	header('Location:logout.php');
	exit;
 }
 ?>