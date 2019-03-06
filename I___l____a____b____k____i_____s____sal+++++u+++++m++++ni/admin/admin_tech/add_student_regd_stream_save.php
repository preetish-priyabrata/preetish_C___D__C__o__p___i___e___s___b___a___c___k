<?php
error_reporting(0);
session_start();
ob_start();
// print_r($_POST);
//exit;
if(isset($_SESSION['alumni_tech'])){
	include '../config.php';
	require 'FlashMessages.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();



if(isset($_POST['submit']))
{ 

$stream=strtolower($_POST['stream']);
$date=date('y-m-d');
$time=date('H:i:s');
}

//insert personal profile
 $insert_query="INSERT INTO `admin_add_student_stream`(`stream`,`date`,`time`) values ('$stream','$date','$time')";
//echo $insert_query;

$sql_exe=mysqli_query($conn,$insert_query);
//echo mysqli_error($conn);

		if($sql_exe)
		{
			 $msg->success('Stream Add SuccessFull');
			 header("location:admin_dashboard.php");
			 exit;
		}
		else
		{
			echo "not inserted";

        }
}
else{
			header('Location:logout.php');
			exit;
	}
?> 