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
 	
if (isset($_GET['programDelete'])) {
    $programDelete = str_replace(" ", "+", $_GET['programDelete']);
    $programId = decryptIt_webs($programDelete);
    $queryUpdateProgram = "UPDATE `tbl_program` SET `program_status` = '0' WHERE `program_id` = '$programId'";
    $resUpdateProgram = mysqli_query($conn, $queryUpdateProgram);
    if ($resUpdateProgram) {
	    $msg->success('Successfull Program Is Deleted');
		header('Location:manageProgram.php');
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