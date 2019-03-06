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
	$sl_num=$_POST['sl_num'];
	
	
			$check_query= "SELECT * FROM `ilab_water_method_cultivation` WHERE`cultivation_name`='$cultivation_name' and `cultivation_crop_id`='crop_id'";


			$check_sql_exe=mysqli_query($conn,$check_query);

			$num_check=mysqli_num_rows($check_sql_exe);
 			if ($num_check==0){

 				$update_query="UPDATE `ilab_water_method_cultivation` SET `cultivation_name`='$cultivation_name',`cultivation_crop_id`='$crop_id' where `sl_num`='$sl_num'";
 				$update_exe=mysqli_query($conn,$update_query);

 				if($update_exe){
 					$msg->success("SuccessFully Sub-menu Added To Agriculture " .$cultivation_name);
 					header("Location:admin_new_method_cultivation_detail_view.php");
 					exit;
 				}else{
 					$msg->error("Some thing went worng please try again");
 					header("Location:admin_new_method_cultivation_detail_view.php");
 					exit;
 				}
 	}else if ($num_check==1){
 		$fetch_cultivation=mysqli_fetch_assoc($check_sql_exe);
 			if ($sl_num==$fetch_cultivation['sl_num']) {

 				$update_query="UPDATE `ilab_water_method_cultivation` SET `cultivation_name`='$cultivation_name',`cultivation_crop_id`='$crop_id' where `sl_num`='$sl_num'";
 				$update_exe=mysqli_query($conn,$update_query);

 				if($update_exe){
 					$msg->success("SuccessFully Sub-menu Added To Agriculture " .$cultivation_name);
 					header("Location:admin_new_method_cultivation_detail_view.php");
 					exit;
 				}else{
 					$msg->error("Some thing went worng please try again");
 					header("Location:admin_new_method_cultivation_detail_view.php");
 					exit;
 				}
 			}else{
 				$msg->error("this record is already present our table");
		       header("Location:admin_new_method_cultivation_detail_view.php");
		       exit;
 			}
 	}else{
       $msg->error("this record is already present our table");
       header("Location:admin_new_method_cultivation_detail_view.php");
       exit;
 	}

 }else{
 	header('Location:logout_time_out.php');
	exit;
 }
