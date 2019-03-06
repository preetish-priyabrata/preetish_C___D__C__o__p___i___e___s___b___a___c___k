<?php
 // print_r($_POST);
// exit;
session_start();
if($_SESSION['admin_preexam']){
	require 'FlashMessages.php';
	require '../config.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();

$exam=trim($_POST['exam']);
$exam_date=trim($_POST['exam_date']);
$first_session_start=trim($_POST['first_session_start']);
$first_session_end=trim($_POST['first_session_end']);
$second_session_start=trim($_POST['second_session_start']);
$second_session_end=trim($_POST['second_session_end']);
$date=date('Y-m-d');
$time=date('h:i:s');


 $insert="INSERT INTO `ilab_assign_date_time`(`slno`, `exam_slno`, `exam_date`, `first_session_start`, `first_session_end`, `second_session_start`, `second_session_end`, `date`, `time`) VALUES (NULL,'$exam','$exam_date','$first_session_start','$first_session_end','$second_session_start','$second_session_end','$date','$time')";
$sql_insert=mysqli_query($conn,$insert);

$update="UPDATE `ilab_exam_group` SET `assign_date_status`='1' where `slno_group`='$exam'";
$update_exe=mysqli_query($conn,$update);

if ($update_exe) {
	$msg->success('Exam Date And Time Sucessfully Assigned');
	 	header('Location:index');
		exit;
}else{
	$msg->error('Unsuccessfull, Exam Date And Time Assigned');
	 	header('Location:index');
		exit;
}


}else{
	header('Location:logout');
	exit;
}
