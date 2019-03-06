<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
if($_SESSION['postexam_user'])
{
$examname=$_REQUEST["examname"];
$centername=$_REQUEST["centername"];

$qry_chk="SELECT * FROM `postexam_attendance_status` WHERE `exam_name`='$examname' AND `exam_center`='$centername' AND `update_attendance_status`='updated'";
$sql_chk=mysqli_query($conn,$qry_chk);
$num_chk=mysqli_num_rows($sql_chk);

if($num_chk==0)
{
$qry="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$examname' AND `application_submitted`='yes' AND `exam_centre`='$centername'";
$sql=mysqli_query($conn, $qry);
while($res=mysqli_fetch_array($sql))
{
	$roll=$res["roll_no"];
	if($_REQUEST[$roll]==true)
	{
		$qry_updt="UPDATE `candidate_application_info` SET `attendance_status`='P' WHERE `roll_no`='$roll'";
	}
	else
	{
		$qry_updt="UPDATE `candidate_application_info` SET `attendance_status`='A' WHERE `roll_no`='$roll'";
	}
	$sql_updt=mysqli_query($conn, $qry_updt);
	
}
$qry_check="SELECT * FROM `postexam_attendance_status` WHERE `exam_name`='$examname' AND `exam_center`='$centername'";
$sql_check=mysqli_query($conn,$qry_check);
$num_check=mysqli_num_rows($sql_check);
if($num_check==0)
{
$qry_updtattnd="INSERT INTO `postexam_attendance_status`(`slno`, `exam_name`, `exam_center`, `update_attendance_status`) VALUES (NULL, '$examname', '$centername', 'updated')";
}
else
{
$qry_updtattnd="UPDATE `postexam_attendance_status` SET `update_attendance_status`='updated' WHERE `exam_name`='$examname' AND `exam_center`='$centername'";
}
$sql_updtattnd=mysqli_query($conn, $qry_updtattnd);
if($sql_updtattnd)
{
header("location:postexm_update_attendance.php");
}
}
else
{
	?>
	<h4 style="color:#F00">Attendance already updated.</h4>
    <?php
}
}
ob_clean();
?>