<?php
session_start();
ob_start();
if($_SESSION['admin_user']){
require 'FlashMessages.php';
include '../config.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
// Array ( [Query] => hello there please check??? ) 
// print_r($_POST);
$Query=trim($_POST['Query']);
$admin_user=$_SESSION['admin_user'];
$date=date('Y-m-d');
$time=date('H:i:s');
$query_student="INSERT INTO `kiit_stud_queries`(`sl_no`, `s_user_id`, `msg_query_details`, `date_query`, `time_query`) VALUES (NULL,'$admin_user','$Query','$date','$time')";
$sql_exe=mysqli_query($conn,$query_student);
// echo mysqli_error($conn);
// exit;
$msg->success('Query Send Successfull');
header("location:student_sent_query.php");
}else{
	header('Location:logout.php');
	exit;
}