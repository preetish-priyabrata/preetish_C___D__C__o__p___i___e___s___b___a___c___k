<?php 
error_reporting(0);
ob_start();
session_start();
include "config.php";

require 'FlashMessages.php';

$msg = new \Preetish\FlashMessages\FlashMessages();
if($_SESSION['postexam_user']){
	$exam=$_REQUEST["exam"];
	$category_names=$_REQUEST['category_names'];
	$category_name=$_REQUEST['category_name'];
	$roll_no=$_REQUEST['roll_no'];
	$application_no=$_REQUEST['application_no'];
	$candidate_name=$_REQUEST['candidate_name'];
	$marks=$_REQUEST['marks'];
	for ($i=0; $i <count($category_names) ; $i++) {
		for ($j=0; $j <count($category_name) ; $j++) { 
			if($category_names[$i]==$category_name[$j]){
				$qry="SELECT * FROM `postexam_publish_result` WHERE `exam_name`='$exam' AND `category_name`='$category_name[$j]' AND `roll_no`='$roll_no[$j]' AND `application_no`='$application_no[$j]' ";
				
				$sql=mysqli_query($conn, $qry);
				$num_rows=mysqli_num_rows($sql);

				if($num_rows==0){
					$qry_insert="INSERT INTO `postexam_publish_result`(`slno`, `category_name`, `roll_no`, `exam_name`, `application_no`,`mark`,`candidate_name`) VALUES (NULL,'$category_name[$j]','$roll_no[$j]','$exam', '$application_no[$j]','$marks[$j]','$candidate_name[$j]')";
					$sql=mysqli_query($conn, $qry_insert);
				}
			}
		}
	}
	$qry_status_updates="INSERT INTO `post_exam_publish`(`slno`, `exam_name`) VALUES (NULL,'$exam')";
			$sql_status_updated=mysqli_query($conn, $qry_status_updates); 
			if($sql_status_updated){
				$msg->success('Success-Fully Updated Published Exam Results  '.$exam );
				header("location:postexam_generate_publish.php");
				exit;
			}else{
				$msg->warning('Unable Published Exam Results '.$exam );
				header("location:postexam_result_entry.php");
				exit;
			}
	

}else{
	header("location:logout.php");
	exit;
}



