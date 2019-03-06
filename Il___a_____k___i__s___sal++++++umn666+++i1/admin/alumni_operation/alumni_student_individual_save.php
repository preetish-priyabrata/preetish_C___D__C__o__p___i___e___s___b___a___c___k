<?php 
session_start();
if($_SESSION['alumni_tech']){
	require 'FlashMessages.php';
	include '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();

	$serial=$_POST['serial'];
	$alumni_student=$_POST['alumni_student'];
	$date=date('Y-m-d');
	$time=date('H:i:s');
	if(!empty($alumni_student)){
		for ($i=0; $i <count($alumni_student) ; $i++){ 
			$user_id=$alumni_student[$i];
			$query="INSERT INTO `master_user_post_admin`(`slno`, `user_id`, `post_id`, `date`, `time`) VALUES (NULL,'$user_id','$serial','$date','$time')";
			$sql_exe=mysqli_query($conn,$query);
		}
		$update_assign="UPDATE `admin_admin_post_temp` SET `assign_completed`='1' where `slno`='$serial'";
		$sql_exe_update=mysqli_query($conn,$update_assign);
		$msg->success('Success-Fully Send Message Is Posted ');
		header('Location:alumni_dashboard.php');
		exit;
	}else{
		$msg->success('Please Select a Student Want send message');
		header('Location:alumni_student_individual.php?serial='.$serial);
		exit();
	}
}else{
	header('Location:logout.php');
  	exit;
}

