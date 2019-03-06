<?php

session_start();
if($_SESSION['alumni_tech']){
require 'FlashMessages.php';
include '../config.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
// Array ( [serial] => [Message] => hello users [optradio] => 1 ) 
// 
	$serial=$_SESSION['alumni_tech'];	
	$optradio=$_POST['optradio'];
	$Message=$_POST['Message'];
	$date=date('Y-m-d');
	$time=date('H:i:s');
	$dest="../uploads/admin_public_post/";
	if($optradio==1){
		if(!empty($_FILES['file_upload']['name'])){
			 $file_name=date('y-m-d').date('H:i:s').$_FILES['file_upload']['name'];
			 

			if(move_uploaded_file($_FILES['file_upload']['tmp_name'],"$dest".$file_name)){
				if(!empty($Message)){
					$query_user="INSERT INTO `admin_admin_post`(`slno`, `text_message`, `attach_file`, `date`, `time`, `user_slno`) VALUES (Null,'$Message','$file_name','$date','$time','$serial')";
					$sql_exe=mysqli_query($conn,$query_user);
					
					$msg->success('Success-Fully Send Message Is Posted ');
					header('Location:alumni_dashboard.php');
					exit();


				}else{
					$msg->error('Sorry Something went wrong');
					header('Location:alumni_dashboard.php');
					exit();
				}
			}else{
				// echo "<br>";
				// echo $_FILES['file_upload']['error'];
				// echo "<br>2";
				// exit;
				$msg->error('Sorry Something went wrong');
				header('Location:alumni_dashboard.php');
				exit();
			}
		}else{
			if(!empty($Message)){
				$query_user="INSERT INTO `admin_admin_post`(`slno`, `text_message`, `date`, `time`, `user_slno`) VALUES (Null,'$Message','$date','$time','$serial')";
				$sql_exe=mysqli_query($conn,$query_user);

				$msg->success('Success-Fully Send Message Is Posted ');
				header('Location:alumni_dashboard.php');
				exit();

			}else{
				$msg->error('Sorry Something went wrong');
				header('Location:alumni_dashboard.php');
				exit();
			}

		}
	}else{
		if(!empty($_FILES['file_upload']['name'])){
			 $file_name=date('y-m-d').date('H:i:s').$_FILES['file_upload']['name'];
			 

			if(move_uploaded_file($_FILES['file_upload']['tmp_name'],"$dest".$file_name)){
				if(!empty($Message)){
					$query_user="INSERT INTO `admin_admin_post_temp`(`slno`, `text_message`, `attach_file`, `date`, `time`, `user_slno`) VALUES (Null,'$Message','$file_name','$date','$time','$serial')";
					$sql_exe=mysqli_query($conn,$query_user);
					$last_id=mysqli_insert_id($conn);
 	
					$msg->success('Please Select Student Want send message');
					header('Location:alumni_student_individual.php?serial='.$last_id);
					exit();


				}else{
					$msg->error('Sorry Something went wrong');
					header('Location:alumni_dashboard.php');
					exit();
				}
			}else{
				// echo "<br>";
				// echo $_FILES['file_upload']['error'];
				// echo "<br>2";
				// exit;
				$msg->error('Sorry Something went wrong');
				header('Location:alumni_dashboard.php');
				exit();
			}
		}else{
			if(!empty($Message)){
				$query_user="INSERT INTO `admin_admin_post_temp`(`slno`, `text_message`, `date`, `time`, `user_slno`) VALUES (Null,'$Message','$date','$time','$serial')";
				$sql_exe=mysqli_query($conn,$query_user);
				$last_id=mysqli_insert_id($conn);
 	
				$msg->success('Please Select Student Want send message');
				header('Location:alumni_student_individual.php?serial='.$last_id);
				exit();

			}else{
				$msg->error('Sorry Something went wrong');
				header('Location:alumni_dashboard.php');
				exit();
			}
		}


	}
}else{
	header('Location:logout.php');
  	exit;
}