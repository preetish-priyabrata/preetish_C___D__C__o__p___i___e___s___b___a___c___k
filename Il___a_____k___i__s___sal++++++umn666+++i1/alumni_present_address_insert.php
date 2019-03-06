
<?php
error_reporting(E_ALL);
session_start();
ob_start();
// echo "<pre>";
 //print_r($_POST);

//print_r($_FILES);

//exit();


	include 'config.php';
	require 'FlashMessages.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();



if(isset($_POST['submit']))
{ 

$at=$_POST['at'];
$post=$_POST['post'];
$via=$_POST['via'];
$PS=$_POST['PS'];
$city=$_POST['city'];

$District=$_POST['District'];
$pin=$_POST['pin'];
$State=$_POST['State'];

$zone=$_POST['zone'];
$country=$_POST['country'];
$Landline=$_POST['Landline'];
$date=date('y-m-d');
$time=date('H:i:s');
$user_id=$_SESSION['email'];
 // else
 //  {
 //   ('$at','$post','$via','$PS','$city','$District','$pin','$State','$zone','$country','$Landline','$date','$time')
 //    echo "string";
 //  }
$reg_no=$_SESSION['reg_no'];
//insert personal profile
//
 $insert_query="UPDATE `master_present_address_profile` SET `at`='$at',`post`='$post',`via`='$via',`ps`='$PS',`city`='$city',`district`='$District',`pin`='$pin',`state`='$State',`zone`='$zone',`country`='$country',`land_ph_no`='$Landline',`date`='$date',`time`='$time' WHERE `user_id`='$user_id'";
//echo $insert_query;

$sql_exe=mysqli_query($conn,$insert_query);
echo mysqli_error($conn);
		if($sql_exe)
		{

             $flag="UPDATE `profile_table_flag` SET `present_address`='1' WHERE `user_id`='$user_id'";
			 $sql_exe_flag=mysqli_query($conn,$flag);
			 $update="UPDATE `master_user_registration` SET `update_profile`='3' WHERE `reg_no`='$reg_no'";
			 $sql_exe_update=mysqli_query($conn,$update);

             $msg->success('Your Present Address SuccessFull Submitted');
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
			echo "not inserted";

        }
}
else{
			header('Location:logout.php');
			exit;
	}
?>