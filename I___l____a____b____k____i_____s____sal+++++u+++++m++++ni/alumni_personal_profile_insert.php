
<?php
error_reporting(E_ALL);
session_start();
ob_start();

print_r($_POST);

print_r($_FILES);
//exit;


	include 'config.php';
	require 'FlashMessages.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();


if(isset($_POST['submit']))
{ 

$pass_year=$_POST['pass_year'];
$alumni_name=$_POST['alumni_name'];
$occupation=$_POST['occupation'];
$designation=$_POST['designation'];
$employer=$_POST['employer'];
$gender=$_POST['gen'];
$ph_no=$_POST['ph_no'];
$alter_mob=$_POST['alter'];
$email=$_POST['email_id'];
$ofc_email=$_POST['ofc_email'];
$Landline=$_POST['Landline'];
$Co_curricular=$_POST['Co-curricular'];
$awards=$_POST['awards'];
$marry_status=$_POST['marry'];
$mrg_aniv=$_POST['mrg_anni'];
$tribe=$_POST['tribe'];
$sports=$_POST['sports'];
$DOB=$_POST['dob'];

$date=date('y-m-d');
$time=date('H:i:s');
$user_id=$_SESSION['email'];



 $reg_no=$_SESSION['reg_no'];
//insert personal profile
   echo $insert_query="UPDATE `master_personal_profile` SET `passing_year`='$pass_year',`name`='$alumni_name',`current_occupation`='$occupation',`designation`='$designation',`employer_name`='$employer',`gender`='$gender',`mobile_no`='$ph_no',`alter_mob`='$alter_mob',`email_id`='$email',`official_email_id`='$ofc_email',`land_Ph_no`='$Landline',`co_curricular_activity`='$Co_curricular',`awards`='$awards',`marry_status`='$marry_status',`mrg_aniv`='$mrg_aniv',`tribe`='$tribe',`sports_participate`='$sports',`DOB`='$DOB',`date`='$date',`time`='$time' WHERE `user_id`='$user_id'";


 $sql_exe=mysqli_query($conn,$insert_query);

 echo mysqli_error($conn);


		if($sql_exe){
			 $flag="UPDATE `profile_table_flag` SET `personal_profile`='1' WHERE `user_id`='$user_id'";
			 $sql_exe_flag=mysqli_query($conn,$flag);
			 $update="UPDATE `master_user_registration` SET `update_profile`='1' WHERE `reg_no`='$reg_no'";
			 $sql_exe_update=mysqli_query($conn,$update);

			 $msg->success('Your Personal Profile SuccessFull Submitted');
			 
			 $sql_flag="SELECT * FROM `profile_table_flag` WHERE `user_id`='$user_id'";
			 $sql_flag_exe=mysqli_query($conn,$sql_flag);
			 $fetch=mysqli_fetch_assoc($sql_flag_exe);
		     // $msg->success('Your Present Address SuccessFull Submitted');
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
		{    echo exit;
			header('Location:logout.php');
 			exit;

        }

 }else{
 			header('Location:logout.php');
 			exit;
 	}
?>