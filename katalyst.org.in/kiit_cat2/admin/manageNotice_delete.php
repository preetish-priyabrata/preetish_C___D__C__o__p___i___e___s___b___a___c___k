<?php
// print_r($_GET);
// exit;
session_start();
ob_start();
// print_r($_SESSION);
if (($_SESSION['userId']!="")) {
	require 'config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
if (isset($_GET['noticeDelete'])) {
    $noticeDelete = str_replace(" ", "+", $_GET['noticeDelete']);
    $noticeId = decryptIt_webs($noticeDelete);
    //    Update Notice Details
    $queryUpdateNotice = "UPDATE `tbl_notice` SET `notice_status` = 'Archived' WHERE `notice_id` = '$noticeId'";
    $resUpdateNotice = mysqli_query($conn, $queryUpdateNotice);
    if ($resUpdateNotice) {
	    $msg->success('Successfull Notice Is Deleted');
		header('Location:manageNotice.php');
		exit;
	}else{
		header('Location:logout.php');
		exit;
	}
}else{
	header('Location:logout.php');
	exit;
}


 }else{
 	header('Location:logout.php');
	exit;
 }
 ?>