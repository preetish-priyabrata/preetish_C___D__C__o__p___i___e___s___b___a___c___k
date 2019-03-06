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
	$roll=$_REQUEST['roll'];
	$app=$_REQUEST['app'];
	for ($i=0; $i <count($roll) ; $i++) { 
		
	
		$qry="SELECT * FROM `candidate_admit_card` WHERE `exam_name`='$exam' AND `attendance_status`='0' AND `exam_center`='$center' And `roll_no`='$roll[$i]' And `application_no`='$app[$i]'";
		
		$sql=mysqli_query($conn, $qry);
		$res=mysqli_fetch_array($sql);
		$qry_insert="INSERT INTO `post_exam_attendance_candidate`(`slno`, `application_no`, `roll_no`, `exam_name`, `center_name`) VALUES (NULL,'$res[application_no]','$res[roll_no]','$res[exam_name]', '$res[exam_center]')";
		$sql=mysqli_query($conn, $qry_insert);
		$qry_status_update="UPDATE `candidate_admit_card` SET `attendance_status`='1' WHERE `exam_name`='$exam' AND `exam_center`='$center' And `roll_no`='$roll[$i]' And `application_no`='$app[$i]'";
			$sql_status_up=mysqli_query($conn, $qry_status_update); 



	}
	$attend=$_REQUEST['attend'];
	for ($j=0; $j <count($attend) ; $j++) {
		$qry_status="UPDATE `post_exam_attendance_candidate` SET `attendance_status`='1' WHERE `exam_name`='$exam' AND `center_name`='$center' And `roll_no`='$attend[$j]'";
			$sql_status=mysqli_query($conn, $qry_status); 
		

	}
	$qry_status_updates="UPDATE `assign_exam_center` SET `update_attendance_exam`='1' WHERE `exam_name`='$exam' AND `center_name`='$center'";
			$sql_status_updated=mysqli_query($conn, $qry_status_updates); 
			if($sql_status_updated){
				$msg->success('Success-Fully Update Attendance Sheet For The  Exam '.$exam .' For Center '.$center);
				header("location:postexam_update_attendance.php");
				exit;
			}else{
				$msg->warning('Unable To Update Attendance Sheet For The Exam '.$exam .' For Center '.$center.' Try Again !!!');
				header("location:postexam_update_attendance.php");
				exit;
			}
	

}else{
	header("location:logout.php");
	exit;
}
?>