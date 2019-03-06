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
    $query = "UPDATE `gen_press_release` SET `status` = '2' WHERE `sl_no` = '$sl_no'";
    $res = mysqli_query($conn, $query);
    $msg->success('Successfull Press Release  Is Achived');
	header('Location:press_release_view.php');
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