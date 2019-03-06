<?php
session_start();
include 'config.php';
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
$profile_status=$_SESSION['update_profile'];
switch ($profile_status) {
	case '0':
		 header("location:alumni_personal_profile.php");
		break;
	case '1':
		 header("location:alumni_family_profile.php");
		break;
	case '2':
		 header("location:alumni_present_address.php");
		break;
	case '3':
		 header("location:alumni_permanent_address.php");
		break;
	case '4':
		 header("location:admin/user_student/alumni_dashboard.php");
		break;
	case '5' :
		$user_id=$_SESSION['email'];
		$reg_no=$_SESSION['reg_no'];
		$flag="UPDATE `profile_table_flag` SET `status`='1' WHERE `user_id`='$user_id'";
		$sql_exe_flag=mysqli_query($conn,$flag);
		$update="UPDATE `master_user_registration` SET `update_profile`='4' WHERE `reg_no`='$reg_no'";
		$sql_exe_update=mysqli_query($conn,$update);
		$msg->success('Thank For Filling Form Welcome Kiss Alumni User Dashboard');
		header("location:admin/user_student/alumni_dashboard.php");
		exit;
		break;
	case '6' : 
		// $msg->success('Thank For Filling Form Welcome Kiss Alumni User Dashboard');
		header("location:admin/user_student/alumni_dashboard.php");
		exit;
	break;
	case '7':
		$user_id=$_SESSION['email'];
		$reg_no=$_SESSION['reg_no'];
		$sql_flag="SELECT * FROM `profile_table_flag` WHERE `user_id`='$user_id'";
		$sql_flag_exe=mysqli_query($conn,$sql_flag);
		$fetch=mysqli_fetch_assoc($sql_flag_exe);
		if($fetch['status']!="0"){
			 	 header("location:admin/user_student/alumni_dashboard.php");
				 exit;
			 }else if($fetch['personal_profile']=="1" && $fetch['family_profile']=="1" && $fetch['present_address']=="1" && $fetch['permanent_address']=="1"){
			 	$flag="UPDATE `profile_table_flag` SET `status`='1' WHERE `user_id`='$user_id'";
				$sql_exe_flag=mysqli_query($conn,$flag);
				$update="UPDATE `master_user_registration` SET `update_profile`='4' WHERE `reg_no`='$reg_no'";
				$sql_exe_update=mysqli_query($conn,$update);
				$msg->success('Thank For Filling Form Welcome Kiss Alumni User Dashboard');
				header("location:admin/user_student/alumni_dashboard.php");
			 }else{
				$total=$fetch['personal_profile']+$fetch['family_profile']+$fetch['present_address']+$fetch['permanent_address']+$fetch['Status'];
				switch ($total) {
					case '1':
						$msg->success('Profile Is Incomplete');
						break;
					case '2':
						$msg->success('Profile Is Incomplete');
						break;
					case '3':
						$msg->success('Profile Is Incomplete');
						break;
					case '4':
						$msg->success('Profile Is Incomplete');
						break;
					case '5':
						$msg->success('Thank You For Completation Of Profile');
						break;
					default:
						header("location:logout.php");
						break;
						break;
				}
				header("location:admin/user_student/alumni_dashboard.php");
				exit;
			}
		break;
	default:
		 header("location:logout.php");
		break;
}
?>