<?php
// print_r($_REQUEST);
// exit;
error_reporting(4);
session_start();
ob_start();
if($_SESSION['admin_tech']){
	require 'FlashMessages.php';
	include '../config.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();

//Array ( [Class_name] => 1 [class_id] => Array ( [0] => A [1] => B [2] => C [3] => D ) ) 

$date=date('Y-m-d');
	if(!empty($_REQUEST['class_id'])){
		$class_name=trim($_REQUEST['Class_name']);
	 	$class=$_REQUEST['class_id'];
	 	$counts=count($class);
	 	for ($i=0; $i < $counts; $i++) {
	 		$class_name_section=strtoupper(trim($class[$i]));
	 		 $sql_class_detail="SELECT * FROM `master_class` WHERE `slno_class`='$class_name'";
	 		 $sql_query_detail=mysqli_query($conn,$sql_class_detail);
	 		 $fetch=mysqli_fetch_assoc($sql_query_detail);
	 		$check_query="SELECT * FROM `master_class_section` WHERE `class`='$class_name' AND `section`='$class_name_section'";

	 		$check_query_exe=mysqli_query($conn,$check_query);
	 		$check_query_nos=mysqli_num_rows($check_query_exe);
	 		if($check_query_nos==0){
	 			$class_insert="INSERT INTO `master_class_section`(`Slno`, `class`, `section`, `date`) VALUES (NULL,'$class_name','$class_name_section','$date')";
	 			$class_insert_exe=mysqli_query($conn,$class_insert);
	 			$msg->success('Section '.$class_name_section.'  Is Added To Class '.$fetch['class_name'].' Successfully ');
	 		}else{
	 			$msg->error('Section '.$class_name_section.' Is Already In our Class '.$fetch['class_name'].' Record ');
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
		$msg->error('Please Enter Section Name With Class');
	 		header("location:admin_class_section.php");
			exit; 
	}
}else{
	header('Location:logout.php');
	exit;
}
?>