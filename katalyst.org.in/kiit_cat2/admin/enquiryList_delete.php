<?php
session_start();
ob_start();
// print_r($_SESSION);
if (($_SESSION['userId']!="")) {
	require 'config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
if (isset($_GET['enquiry'])) {
    $enquiry = str_replace(" ", "+", $_GET['enquiry']);
    $enquiry = decryptIt_webs($enquiry);
    $query = "UPDATE `tbl_enquiry` SET `enquiry_status` = '0'  WHERE `enquiry_id` = '$enquiry' ";
    $res = mysqli_query($conn, $query);
    $msg->success('Successfull Enquiry Is Deleted');
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