<?php 
error_reporting(0);
ob_start();
session_start();
include "config.php";
require 'FlashMessages.php';

$msg = new \Preetish\FlashMessages\FlashMessages();
if($_SESSION['postexam_user']){
	$exam=$_REQUEST["exam"];
	$center=$_REQUEST["center_assign"];
	$roll_no=$_REQUEST['roll_no'];
	$application_no=$_REQUEST['application_no'];
	$marks=$_REQUEST['marks'];
	for ($i=0; $i <count($roll_no) ; $i++) {
		$qry="SELECT * FROM `post_exam_center_mark_roll` WHERE `exam_name`='$exam' AND `center_name`='$center' And `roll_no`='$roll_no[$i]' And `application_no`='$application_no[$i]'";
		
		$sql=mysqli_query($conn, $qry);
		$num_rows=mysqli_num_rows($sql);

		if($num_rows==0){
			$qry_insert="INSERT INTO `post_exam_center_mark_roll`(`slno`, `application_no`, `roll_no`, `exam_name`, `center_name`,`marks`) VALUES (NULL,'$application_no[$i]','$roll_no[$i]','$exam', '$center','$marks[$i]')";
			$sql=mysqli_query($conn, $qry_insert);
		}
	}
	$qry_status_updates="UPDATE `assign_exam_center` SET `mark_entry_status`='1' WHERE `exam_name`='$exam' AND `center_name`='$center'";
			$sql_status_updated=mysqli_query($conn, $qry_status_updates); 
			if($sql_status_updated){
				$msg->success('Success-Fully Marks Entered For The  Exam '.$exam .' For Center '.$center);
				header("location:postexam_mark_attendance.php");
				exit;
			}else{
				$msg->warning('Unable To Marks Entered For The Exam '.$exam .' For Center '.$center.' Try Again !!!');
				header("location:postexam_mark_attendance.php");
				exit;
			}
	

}else{
	header("location:logout.php");
	exit;
}

?>