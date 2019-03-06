<?php
session_start();
ob_start();
// print_r($_SESSION);
if (($_SESSION['userId']!="")) {
	require 'config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
if (isset($_GET['sl_no'])) {
    $sl_no = str_replace(" ", "+", $_GET['sl_no']);
    $sl_no = decryptIt_webs($sl_no);
    $query = "UPDATE `gen_banner` SET `status` = '0' WHERE `sl_no` = '$sl_no'";
    $res = mysqli_query($conn, $query);
    $msg->success('Successfull Banner  Is Achived');
	header('Location:banner_view.php');
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