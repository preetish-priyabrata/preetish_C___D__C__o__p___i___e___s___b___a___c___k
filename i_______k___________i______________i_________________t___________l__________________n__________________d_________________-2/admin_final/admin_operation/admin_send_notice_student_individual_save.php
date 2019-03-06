<?php 
session_start();
if($_SESSION['alumni_tech']){
	require 'FlashMessages.php';
	include '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();
	$serial=$_POST['notice_id'];
	$alumni_student=$_POST['alumni_student'];
	$notice=$_POST['notice'];
	$date=date('Y-m-d');
	$time=date('H:i:s');
	if(!empty($alumni_student)){
		for ($i=0; $i <count($alumni_student) ; $i++){ 
			$student_id=$alumni_student[$i];
			$query="INSERT INTO `kiit_student_notice_board`(`sl_no`, `student_id`,`notice_id`, `notice`, `date`, `time`) VALUES (NULL,'$student_id','$serial','$notice','$date','$time')";
			$sql_exe=mysqli_query($conn,$query);
		}
		$update_assign="UPDATE `kitt_admin_send_individual_notice` SET `status`='1' WHERE `sl_no`='$serial'";
		$sql_exe_update=mysqli_query($conn,$update_assign);
		$msg->success('Success-Fully Send Message Is Posted ');
		header('Location:admin_dashboard.php');
		exit;
	}else{
		$msg->success('Please Select a Student Want send message');
		header('Location:admin_send_notice_student_individual.php?notice_id='.$serial);
		exit();
	}
}else{
	header('Location:logout.php');
  	exit;
}

