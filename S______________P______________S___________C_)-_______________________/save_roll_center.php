<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
if($_SESSION['preexam_user']){
	
	
	$qry_centre="SELECT * FROM `center_master_data` where `slno`='$_POST[center]' ";
	$sql_centre=mysqli_query($conn, $qry_centre);
	
	$res_center=mysqli_fetch_assoc($sql_centre);
	
	
	$limit=$res_center['sitting_capacity'];
	$center_name=$res_center['examcenter'];
	$start_roll=$_POST['from_roll'];
	
	$exam=$_SESSION['exam_selected'];
      	
	$qry_application_roll="SELECT  * FROM `pre_exam_candidate` where `exam_name`='$exam' AND center_name IS NULL LIMIT $limit ";
	
	
	$sql_application_roll=mysqli_query($conn, $qry_application_roll);
	echo $num_application_roll=mysqli_num_rows($sql_application_roll);
	
	while($res_roll_center=mysqli_fetch_array($sql_application_roll)){
		
		$end_roll=$res_roll_center['roll_no'];
		$qry_roll_assign="INSERT INTO `pre_exam_roll_center`(`slno`, `application_no`, `exam_name`, `roll_no`,`center_name`) VALUES (NULL,'$res_roll_center[application_no]','$exam','$res_roll_center[roll_no]','$center_name')";
		
		
		$sql_roll_assign=mysqli_query($conn, $qry_roll_assign);
		$qry_roll_up_center="UPDATE `pre_exam_candidate` SET `center_name`='$center_name' WHERE `application_no`='$res_roll_center[application_no]'";
		
		$sql_gen_rolls=mysqli_query($conn, $qry_roll_up_center);

	}
	$qry_statuss="INSERT INTO `assign_exam_center`(`slno`, `exam_name`, `center_name`, `start_roll`,`end_roll`) VALUES (NULL, '$exam', '$center_name', '$start_roll','$end_roll')";

			$sql_status=mysqli_query($conn, $qry_statuss);
	
	if($sql_status){
				$msg->success('Success-Fully Center '.$center_name.' Is Assign Roll From :- '.$start_roll.' To Roll No :- '.$end_roll);
				header("location:pe_assign_roll_to_center.php");
				exit;
			}else{
				$msg->warning('Unable To Assign Center Try Again !!!');	
				header("location:pe_assign_roll_to_center.php");
				exit;
			}


}else{
	header("location:logout.php");
	exit;
}

ob_clean();
?>