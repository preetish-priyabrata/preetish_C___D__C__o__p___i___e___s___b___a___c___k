<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
if($_SESSION['preexam_user'])
{
$exam=$_REQUEST["exam"];
$center=$_REQUEST["center"];

$qry_exam_info="SELECT * FROM `exam_master_data` WHERE `examname`='$exam'";
$sql_exam_info=mysqli_query($conn, $qry_exam_info);
$res_exam_info=mysqli_fetch_array($sql_exam_info);

$qry="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$exam_name' AND `application_submitted`='yes' AND `exam_centre`='$centre'";
$sql=mysqli_query($conn, $qry);
while($res=mysqli_fetch_array($sql))
{
	$qry_check="SELECT * FROM `candidate_admit_card` WHERE `roll_no`='$res[roll_no]'";
	$sql_check=mysqli_query($conn, $$qry_check);
	$num_rows=mysqli_num_rows($sql_check);
	if($num_rows==0)
	{
$qry_cand_info="SELECT * FROM `candidate_personal_details` WHERE `application_no`='$res[application_no]'";
$sql_cand_info=mysqli_query($conn, $qry_cand_info);
$res_cand_info=mysqli_fetch_array($sql_cand_info);

$qry_insert="INSERT INTO `candidate_admit_card`(`slno`, `application_no`, `roll_no`, `candidate_name`, `candidate_photo`, `exam_name`, `exam_center`, `exam_date`) VALUES (NULL, '$res[application_no]', '$res[roll_no]', '$res_cand_info[candidate_name]', '$res_cand_info[candidate_photo]', '$res[exam_name]', '$res[exam_centre]', '$res_exam_info[exam_date]')";
$sql_insert=mysqli_query($conn, $qry_insert);
	}
}
}
ob_clean();
?>