<?php
session_start();
// print_r($_POST);
// exit;

if($_SESSION['email_id']){
	
	include 'webconfig/config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	
	$cultivation_name=strtolower(trim($_POST['cultivation_name']));
	$Date= date("Y-m-d");
	$Time=date('H:i:s');
    $crop_id=$_POST['crop_id'];
	$main_id=1;
	
	
			$check_query= "SELECT * FROM `ilab_water_method_cultivation` WHERE`cultivation_name`='$cultivation_name' and `cultivation_crop_id`='crop_id'";


			$check_sql_exe=mysqli_query($conn,$check_query);

			$num_check=mysqli_num_rows($check_sql_exe);
 			if ($num_check==0){

				 $insert="INSERT INTO `ilab_water_method_cultivation`(`cultivation_name`, `date`,`time`, `main_id`,`cultivation_crop_id`) VALUES ('$cultivation_name','$Date','$Time','$main_id','$crop_id')";
 				$insert_exe=mysqli_query($conn,$insert);

 				$sl_num=$last_id=mysqli_insert_id($conn);

 				$method_cultivation_id="culti001".$last_id;

 				$update_query="UPDATE `ilab_water_method_cultivation` SET `method_cultivation_id`='$method_cultivation_id' where `sl_num`='$sl_num'";
 				$update_exe=mysqli_query($conn,$update_query);

 				if($insert_exe){
 					$msg->success("SuccessFully Sub-menu Added To Agriculture " .$cultivation_name);
 					header("Location:admin_new_method_cultivation_detail.php");
 					exit;
 				}else{
 					$msg->error("Some thing went worng please try again");
 					header("Location:admin_new_method_cultivation_detail.php");
 					exit;
 				}

 	}else{
       $msg->error("this record is already present our table");
       header("Location:admin_new_method_cultivation_detail.php");
       exit;
 	}

 }else{
 	header('Location:logout_time_out.php');
	exit;
 }
