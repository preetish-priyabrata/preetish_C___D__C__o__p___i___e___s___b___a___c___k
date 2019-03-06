<?php
 header('Location:logout');
    exit;
 session_start();
// print_r($_POST);
include 'config.php';
session_destroy();
// session_unset();
// Array ( [Mobile] => 9040777073 [otp] => 93 )
$Mobile=mysqli_real_escape_string($conn,trim($_POST['Mobile']));
$otp=mysqli_real_escape_string($conn,trim($_POST['otp']));
$update="UPDATE `ilab_registration` SET `status`='1' WHERE `mobile_no`='$Mobile' and `otp_no`='$otp'";
$res = mysqli_query($conn, $update);
// echo mysqli_error($conn);
// exit;
$date=date('Y-m-d');
$time=date('h:i:s');
if(!empty($Mobile)){
$insert="INSERT INTO `ilab_login` (`slno_L`, `mobile_no_L`, `date`, `time`, `status`) VALUES (Null,'$Mobile','$date','$time','1')";
$res = mysqli_query($conn, $insert);
// echo mysqli_error($conn);
// exit;
	session_start();
	$_SESSION['last_login_timestamp'] = time(); 
	$_SESSION['active_basic_status']=0;
	$_SESSION['complete_application']=0;
 	$_SESSION['user_no']=$Mobile;    
 	header('Location:basic_registration');
 	exit;
 }else{
 	header('Location:index');
 	exit;
 }


?>