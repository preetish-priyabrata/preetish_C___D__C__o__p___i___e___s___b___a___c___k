<?php
session_start();
// print_r($_POST);
if($_SESSION['email_id']){
// Array ( [sub_menu_water] => salty water [Save] => Submit Query ) 

	include 'webconfig/config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	
	// $sub_menu_name=strtolower($_POST['sub_menu_agri']);
	$water_name=strtolower(trim($_POST['sub_menu_water']));
	$Date= date("Y-m-d");
	$Time=date('H:i:s');
	// $water_id=$_POST['water_id'];
    $main_id=1;
	// $main_id=1;
	
			$check_query= "SELECT * FROM `ilab_water_water_details` WHERE`water_name`='$water_name'";


			$check_sql_exe=mysqli_query($conn,$check_query);

			$num_check=mysqli_num_rows($check_sql_exe);
 			if ($num_check==0){

				 $insert="INSERT INTO `ilab_water_water_details`(`water_name`, `date`, `time`,`main_id`) VALUES ('$water_name','$Date','$Time','$main_id')";
				 
				 // INSERT INTO `ilab_water_water_details`(`water_name`, `date`, `time`, `main_id`) VALUES ('salty water','2018-05-10','13:07:00',1')
 				$insert_exe=mysqli_query($conn,$insert);

 				$sl_num=$last_id=mysqli_insert_id($conn);

 				$water_id="water001".$last_id;

 				 $update_query="UPDATE `ilab_water_water_details` SET `water_id`='$water_id' where `sl_num`='$sl_num'";
 				;
 				$update_exe=mysqli_query($conn,$update_query);

 				if($insert_exe){
 					$msg->success("SuccessFully water_name Added To Agriculture Water " .$water_name);
 					header("Location:admin_new_water_detail.php");
 					exit;
 				}else{
 					$msg->error("Some thing went worng please try again");
 					header("Location:admin_new_water_detail.php");
 					exit;
 				}

 	}else{
       $msg->error("this record is already present our table");
       header("Location:admin_new_water_detail.php");
       exit;
 	}

 }else{
 	header('Location:logout_time_out.php');
	exit;
 }

			$check_query= "SELECT * FROM `ilab_water_water_details` WHERE`water_name`='$water_name'";


			$check_sql_exe=mysqli_query($conn,$check_query);

			$num_check=mysqli_num_rows($check_sql_exe);
 			if ($num_check==0){

				  $insert="INSERT INTO `ilab_water_water_details`(`water_name`, `date`, `time`,  `main_id`) VALUES ('$water_name','$Date','$Time','$main_id')";
				 
				 // INSERT INTO `ilab_water_water_details`(`water_name`, `date`, `time`, `main_id`) VALUES ('salty water','2018-05-10','13:07:00',1')
 				$insert_exe=mysqli_query($conn,$insert);

 				$sl_num=$last_id=mysqli_insert_id($conn);

 				$water_id="water001".$last_id;

 				 $update_query="UPDATE `ilab_water_water_details` SET `water_id`='$water_id' where `sl_num`='$sl_num'";
 				;
 				$update_exe=mysqli_query($conn,$update_query);

 				if($insert_exe){
 					$msg->success("SuccessFully water_name Added To Agriculture Water " .$water_name);
 					header("Location:admin_new_water_detail.php");
 					exit;
 				}else{
 					$msg->error("Some thing went worng please try again");
 					header("Location:admin_new_water_detail.php");
 					exit;
 				}

 	}else{
       $msg->error("this record is already present our table");
       header("Location:admin_new_water_detail.php");
       exit;
 	}

 }else{
 	header('Location:logout_time_out.php');
	exit;
 }
