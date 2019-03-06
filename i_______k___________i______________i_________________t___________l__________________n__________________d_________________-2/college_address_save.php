<?php
ob_start();
session_start();
error_reporting(E_ALL);
// print_r($_POST);
// exit;
include'../config.php';
// if($_SESSION['admin_emails']){
   require 'FlashMessages.php';
   $msg = new \Preetish\FlashMessages\FlashMessages();
// clg_name=E&short_name=E&clg_head_name=E&head_Designation=E&clg_address=E&phone_no=E&email_id=E&wedsite_name=E&cntact_person_name=E&person_Designation=E&contact_person_deatils=E&submit=Submit

if (isset($_POST['submit'])) {
$clg_name=$_POST['clg_name'];
$short_name=$_POST['short_name'];
$clg_head_name=$_POST['clg_head_name'];
$head_Designation=$_POST['head_Designation'];
$clg_address=$_POST['clg_address'];
$phone_no=$_POST['phone_no'];
$email_id=$_POST['email_id'];
$wedsite_name=$_POST['wedsite_name'];
$cntact_person_name=$_POST['cntact_person_name'];
$person_Designation=$_POST['person_Designation'];
$contact_person_deatils=$_POST['contact_person_deatils'];
//date/time
$date=date('y-m-d');
$time=date('H:i:s');

$insert_query_address="INSERT INTO `kiit_college_address`(`sl_no`,`college_name`,`clg_short_name`,`clg_head_name`,`head_designation`,`college_address`,`phone_no`,`email_id`,`website_name`,`contact_person_name`,`person_designation`,`contact_person_details`,`date`,`time`) VALUES (NULL,'$clg_name','$short_name','$clg_head_name','$head_Designation','$clg_address','$phone_no','$email_id','$wedsite_name','$cntact_person_name','$person_Designation','$contact_person_deatils','$date','$time')";
$sql_exe_address=mysqli_query($conn,$insert_query_address);
echo mysqli_error($conn);

    if($sql_exe_address){
		$msg->success('College Address Successfully Stored');
		header('Location:index.php');
		exit;
	}else{
		$msg->error('Some Error Occured Please Contact System Incharge for it');
		header('Location:index.php');
		exit;
	}
 }else{
 	header('Location:logout.php');
	exit;
 }	
 ?>
 
