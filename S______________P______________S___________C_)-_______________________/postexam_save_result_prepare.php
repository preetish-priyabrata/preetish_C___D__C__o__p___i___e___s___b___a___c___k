<?php 
error_reporting(0);
ob_start();
session_start();
include "config.php";

require 'FlashMessages.php';

$msg = new \Preetish\FlashMessages\FlashMessages();
if($_SESSION['postexam_user']){
	$exam=$_REQUEST["exam"];
	$category_name=$_REQUEST["category_name"];
	$num_no_app=$_REQUEST['num_no_app'];
	$cut_off=$_REQUEST['cut_off'];
	$tq_ur=$_REQUEST['tq_ur'];
	for ($i=0; $i <count($category_name) ; $i++) {
		$qry="SELECT * FROM `postexam_cut_off_mark_exam_category` WHERE `exam_name`='$exam' AND `category_name`='$category_name[$i]'";
		
		$sql=mysqli_query($conn, $qry);
		$num_rows=mysqli_num_rows($sql);

		if($num_rows==0){
			$qry_insert="INSERT INTO `postexam_cut_off_mark_exam_category`(`slno`, `category_name`, `total_app`, `exam_name`, `total_qualfi`,`cut_off`) VALUES (NULL,'$category_name[$i]','$num_no_app[$i]','$exam', '$tq_ur[$i]','$cut_off[$i]')";
			$sql=mysqli_query($conn, $qry_insert);
		}
	}
	$qry_status_updates="INSERT INTO `post_exam_preparation`(`slno`, `exam_name`) VALUES (NULL,'$exam')";
			$sql_status_updated=mysqli_query($conn, $qry_status_updates); 
			if($sql_status_updated){
				$msg->success('Success-Fully Preparation Of Result For The  Exam '.$exam );
				header("location:postexam_result_entry.php");
				exit;
			}else{
				$msg->warning('Unable Preparation Of Result For The  Exam '.$exam );
				header("location:postexam_result_entry.php");
				exit;
			}
	

}else{
	header("location:logout.php");
	exit;
}



