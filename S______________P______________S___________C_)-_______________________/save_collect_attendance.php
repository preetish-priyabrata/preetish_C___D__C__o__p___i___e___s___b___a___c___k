<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
if($_SESSION['postexam_user'])
{
	$examname=$_REQUEST["examname"];
	$centername=$_REQUEST["centername"];
	$total_sheet=$_REQUEST["total_sheet"];
	$total_cand=$_REQUEST["total_cand"];
	$present=$_REQUEST["present"];
	$absent=$_REQUEST["absent"];
	$mp=$_REQUEST["mp"];
	$sub_by=$_REQUEST["sub_by"];
	
	$qry_chk="SELECT * FROM `postexam_attendance_status` WHERE `exam_name`='$examname' AND `exam_center`='$centername' AND `collect_attendance_status`='collected'";
$sql_chk=mysqli_query($conn,$qry_chk);
$num_chk=mysqli_num_rows($sql_chk);

if($num_chk==0)
{
	$qry="INSERT INTO `candidate_collect_attendance`(`slno`, `exam_name`, `exam_center`, `total_attendance_sheet`, `total_candidate`, `total_present`, `total_absent`, `total_mp`, `submited_by`) VALUES (NULL, '$examname', '$centername', '$total_sheet', '$total_cand', '$present', '$absent', '$mp', '$sub_by')";
	$sql=mysqli_query($conn, $qry);
	if($sql)
	{
		$qry_check="SELECT * FROM `postexam_attendance_status` WHERE `exam_name`='$examname' AND `exam_center`='$centername'";
		$sql_check=mysqli_query($conn,$qry_check);
		$num_check=mysqli_num_rows($sql_check);
		if($num_check==0)
		{
		$qry_updtattnd="INSERT INTO `postexam_attendance_status`(`slno`, `exam_name`, `exam_center`, `collect_attendance_status`) VALUES (NULL, '$examname', '$centername', 'collected')";
		}
		else
		{
		$qry_updtattnd="UPDATE `postexam_attendance_status` SET `collect_attendance_status`='collected' WHERE `exam_name`='$examname' AND `exam_center`='$centername'";
		}
		$sql_updtattnd=mysqli_query($conn, $qry_updtattnd);
		if($sql_updtattnd)
		{
			header("location:postexm_collect_attendance.php");
		}
	}
}
else
{
	?>
	<h4 style="color:#F00">Attendance already collected.</h4>
    <?php
}
}
ob_clean();
?>