<?php

session_start();
if($_SESSION['alumni_tech']){
	require 'FlashMessages.php';
	require '../config.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
		// Array ( [slno] => 1 [unq_id] => hq1 [status] => 1 ) 
		$A_slno=$_REQUEST['A_slno'];
		$A_name=$_REQUEST['A_name'];
		$A_Status=$_REQUEST['A_Status'];
		if($A_Status=="1"){
			$query="UPDATE `kiit_accademy` SET `A_Status`='2' where `A_slno`='$A_slno' AND`A_name`='$A_name'";
		}else{
			$query="UPDATE `kiit_accademy` SET `A_Status`='1' where `A_slno`='$A_slno' AND`A_name`='$A_name'";
		}
		$sql_update=mysqli_query($conn,$query);
		$msg->success('Successfull Academy Status Is Updated');
		header('Location:admin_accademy_view.php');
		exit;
}else{
	header('Location:logout.php');
	exit;
}