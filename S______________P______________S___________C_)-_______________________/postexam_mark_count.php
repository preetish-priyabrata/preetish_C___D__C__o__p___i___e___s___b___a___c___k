<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
if($_POST['cut_off']!="" && $_POST['cut_off']){
	
$qry_no_app="SELECT * FROM `pre_exam_candidate` INNER JOIN `post_exam_center_mark_roll` on post_exam_center_mark_roll.application_no = pre_exam_candidate.application_no AND post_exam_center_mark_roll.roll_no=pre_exam_candidate.roll_no and post_exam_center_mark_roll.marks>='$_POST[cut_off]'  WHERE pre_exam_candidate.exam_name='$_POST[exam]' AND pre_exam_candidate.category='$_POST[category_name]' ";
	
	$sql_no_app=mysqli_query($conn, $qry_no_app);
	$num_no_app=mysqli_num_rows($sql_no_app);
	echo $num_no_app;
	return;
}else{
	echo "0";
	return;
}