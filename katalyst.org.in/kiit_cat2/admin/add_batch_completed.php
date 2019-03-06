<?php

session_start();
ob_start();
// print_r($_SESSION);
if (($_SESSION['userId']!="")) {
	require 'config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
//  	print_r($_GET);
//  	 $programDelete = str_replace(" ", "+", $_GET['program_batch']);
//     $programId = decryptIt_webs($programDelete);
// exit;
if (isset($_GET['program_batch'])) {
    $programDelete = str_replace(" ", "+", $_GET['program_batch']);
    $programId = decryptIt_webs($programDelete);
    $status_id=decryptIt_webs(str_replace(" ", "+",$_GET['status']));
    if($status_id==3){
    	$queryUpdateProgram = "UPDATE `tbl_batch` SET `status` = '3' WHERE `sl_no` = '$programId'";
		    $resUpdateProgram = mysqli_query($conn, $queryUpdateProgram);
		    if ($resUpdateProgram) {
			    $msg->success('Successfull Program Is  Batch Is Started ');
				header('Location:add_batch_view.php');
				exit;
			}else{
				header('Location:logout.php');
				exit;
			}
    }else if($status_id==2){
			$queryUpdateProgram = "UPDATE `tbl_batch` SET `status` = '2' WHERE `sl_no` = '$programId'";
		    $resUpdateProgram = mysqli_query($conn, $queryUpdateProgram);
		    if ($resUpdateProgram) {
			    $msg->success('Successfull Program Is  Batch Is Completed');
				header('Location:add_batch_view_ongoing.php');
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


 }else{
 	header('Location:logout.php');
	exit;
 }
 ?>