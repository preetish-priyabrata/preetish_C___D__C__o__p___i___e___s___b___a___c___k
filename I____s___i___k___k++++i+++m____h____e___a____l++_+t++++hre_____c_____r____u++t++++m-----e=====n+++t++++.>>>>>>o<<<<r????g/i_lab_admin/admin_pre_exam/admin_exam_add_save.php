<?php
session_start();
if($_SESSION['admin_preexam']){
	require 'FlashMessages.php';
	require '../config.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
$exam_name=trim($_POST['class_name']);
$total_seat=trim($_POST['total_seat']);
$Center_Address=trim($_POST['Center_Address']);
$Contact_name=trim($_POST['Contact_name']);
$Contact_no=trim($_POST['Contact_no']);
$date=date('Y-m-d');
$time=date('h:i:s');
$Preference=$_POST['Preference'];

$insert="INSERT INTO `ilab_exam_center`(`slno_exam`, `total_seat`, `exam_name`, `Center_Address`, `Contact_name`, `Contact_no`, `date`, `time`, `status_exam`,`Preference`) VALUES (Null, '$total_seat', '$exam_name', '$Center_Address', '$Contact_name', '$Contact_no', '$date', '$time', '1','$Preference')";
$sql_insert=mysqli_query($conn,$insert);
// echo mysqli_error($conn);
// exit;
$msg->success('Exam Name Sucessfully stored');
	 	header('Location:index');
		exit;

}else{
	header('Location:logout');
	exit;
}
