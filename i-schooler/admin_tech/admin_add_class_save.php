<?php
error_reporting(4);
session_start();
ob_start();
if($_SESSION['admin_tech']){
	require 'FlashMessages.php';
	include '../config.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();


// Array ( [class_id] => Array ( [0] => Ii [1] => III [2] => IV [3] => V ) ) 
$date=date('Y-m-d');
 	$class=$_REQUEST['class_id'];
 	$counts=count($class);
 	for ($i=0; $i < $counts; $i++) {
 		$class_name=strtoupper(trim($class[$i]));
 		$check_query="SELECT * FROM `master_class` WHERE `class_name`='$class_name'";
 		$check_query_exe=mysqli_query($conn,$check_query);
 		$check_query_nos=mysqli_num_rows($check_query_exe);
 		if($check_query_nos==0){
 			$class_insert="INSERT INTO `master_class`(`slno_class`, `class_name`, `date`) VALUES (NULL, '$class_name','$date')";
 			$class_insert_exe=mysqli_query($conn,$class_insert);
 			$msg->success('Class Name '.$class_name.' Is Successfully Insert To Record');
 		}else{
 			$msg->error('Class Name '.$class_name.' Is Present In our Records ');
 		}
 	}
 	if($class_name){
		header("location:admin_class.php");
		exit;
 	}else{
 		$msg->error('Server Error Occured Please Contact Mantaince Person');
 		header("location:admin_class.php");
		exit;  						
 	}
}else{
	header('Location:logout.php');
	exit;
}
?>