
<?php
error_reporting(E_ALL);
session_start();
ob_start();
echo "<pre>";
 //print_r($_POST);

//print_r($_FILES);

//exit();

include 'config.php';
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();


if(isset($_POST['submit']))
{ 

$father_name=$_POST['father_name'];
$father_occupation=$_POST['father_occupation'];
$father_designation=$_POST['father_designation'];
$father_mob_no=$_POST['father_mob_no'];
$father_land_ph_no=$_POST['father_land_ph_no'];
$father_email=$_POST['father_email'];
$mother_name=$_POST['mother_name'];
$mother_occupation=$_POST['mother_occupation'];
$mother_designation=$_POST['mother_designation'];
$mother_mob_no=$_POST['mother_mob_no'];
$mother_land_ph_no=$_POST['mother_land_ph_no'];
$mother_email=$_POST['mother_email'];
$date=date('y-m-d');
$time=date('H:i:s');
$user_id=$_SESSION['email'];

$reg_no=$_SESSION['reg_no'];
//insert personal profile
$insert_query="UPDATE `master_family_Profile` SET `father_name`='$father_name',`father_occupation`='$father_occupation',`father_designation`='$father_designation',`father_mob_no`='$father_mob_no',`father_land_ph_no`='$father_land_ph_no',`father_email`='$father_email',`mother_name`='$mother_name',`mother_occupation`='$mother_occupation',`mother_designation`='$mother_designation',`mother_mob_no`='$mother_mob_no',`mother_land_ph_no`='$mother_land_ph_no',`mother_email`='$mother_email',`date`='$date',`time`='$time' WHERE `user_id`='$user_id' ";
//echo $insert_query;

$sql_exe=mysqli_query($conn,$insert_query);
//echo mysqli_error($conn);
		if($sql_exe)
		{

			$flag="UPDATE `profile_table_flag` SET `family_profile`='1' WHERE `user_id`='$user_id'";
			$sql_exe_flag=mysqli_query($conn,$flag);
			$update="UPDATE `master_user_registration` SET `update_profile`='2' WHERE `reg_no`='$reg_no'";
			$sql_exe_update=mysqli_query($conn,$update);

			
			 $msg->success('Your Family Profile SuccessFull Submitted');
			 $sql_flag="SELECT * FROM `profile_table_flag` WHERE `user_id`='$user_id'";
			 $sql_flag_exe=mysqli_query($conn,$sql_flag);
			 $fetch=mysqli_fetch_assoc($sql_flag_exe);
			 //$msg->success('Your Present Address SuccessFull Submitted');
			 // `personal_profile``family_profile``present_address``permanent_address`
			 if($fetch['status']!="0"){
			 	 header("location:alumni_final/user_student/alumni_dashboard.php");
				 exit;
			 }else if($fetch['personal_profile']!="1"){
			 	$_SESSION['update_profile']='0';
			 	$msg->success('Please Fill Form First Personal Profile');
			 	header("location:alumni_personal_profile.php");
			 	exit;
			 }else  if($fetch['family_profile']!="1"){
			 	$_SESSION['update_profile']='1';
			 	$msg->success('Please Fill Form First Family Detail Information');
				header("location:update_details.php");			 
			 	exit;
			 }else  if($fetch['present_address']!="1"){
			 	$_SESSION['update_profile']='2';
			 	$msg->success('Please Fill Form First Presert Address Information');
				header("location:update_details.php");			 
			 	exit;
			 }else  if($fetch['permanent_address']!="1"){
			 	$_SESSION['update_profile']='3';
			 	$msg->success('Please Fill Form First Permanet Address Information');
				header("location:update_details.php");			 
			 	exit;
			 }else  if($fetch['personal_profile']=="1" && $fetch['family_profile']=="1" && $fetch['present_address']=="1" && $fetch['permanent_address']=="1"){
			 	$flag="UPDATE `profile_table_flag` SET `status`='1' WHERE `user_id`='$user_id'";
			 	$sql_exe_flag=mysqli_query($conn,$flag);
			 	$update="UPDATE `master_user_registration` SET `update_profile`='5' WHERE `reg_no`='$reg_no'";
			 	$sql_exe_update=mysqli_query($conn,$update);
			  	header("location:alumni_final/user_student/alumni_dashboard.php");
				exit;
			 }else{
			 	$_SESSION['update_profile']='13';
				header("location:update_details.php");			 
			 	exit;
			 }
		}
		
		else
		{
			$msg->error('Your Family Profile Unable Save');
			 header("location:logout.php");			 
			 exit;
        }
    }
        else{
 			header('Location:logout.php');
 			exit;
 	      }
?>