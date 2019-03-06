<?php
// print_r($_POST);
// exit;
session_start();
ob_start();
if(isset($_SESSION['alumni_tech'])){
require 'FlashMessages.php';
include '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();

 $slno=$_GET['slno'];
    //    Update Notice Details
 $stream_delete = "UPDATE `admin_add_student_stream` SET `status` = '2' WHERE `slno` = '$slno'";
 $stream_delete_exe = mysqli_query($conn, $stream_delete);

    if ($stream_delete_exe) {
	    $msg->success('Successfull Stream Is Deleted');
		header('Location:add_student_redg_stream_view.php');
		exit;
	}else{
		$msg->success('UnSuccessfull');
		header('Location:add_student_redg_stream_view.php');
		
		exit;
	}
}else{
	header('Location:logout.php');
	exit;
}

 ?>

 
