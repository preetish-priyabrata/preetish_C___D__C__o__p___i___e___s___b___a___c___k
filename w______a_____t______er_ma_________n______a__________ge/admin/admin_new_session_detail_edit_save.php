<?php
session_start();
// print_r($_POST);
// exit;
// Array ( [session_name] => session [Save] => Submit Query ) 
if($_SESSION['email_id']){
	
	include 'webconfig/config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	$crop_id=$_POST['crop_id'];
	$session=strtolower(trim($_POST['session_name']));
	$Date= date("Y-m-d");
	$Time=date('H:i:s');
	$session_sl_num=$_POST['session_sl_num'];
    //$session_id=$_POST['session_id'];
	$main_id=1;
	
	
			$check_query= "SELECT * FROM `ilab_water_session` WHERE`seasion_name`='$session' and `crop_id`='$crop_id'";


			$check_sql_exe=mysqli_query($conn,$check_query);

			$num_check=mysqli_num_rows($check_sql_exe);
 			if ($num_check==0){

				$update_query="UPDATE `ilab_water_session` SET `seasion_name`='$session',`seasion_crop_id`='$crop_id' where `session_sl_num`='$session_sl_num'";
 				$update_exe=mysqli_query($conn,$update_query);

 				if($update_exe){
 					$msg->success("SuccessFully Sub-menu Update To Season " .$session);
 					header("Location:admin_new_session_detail.php");
 					exit;
 				}else{
 					$msg->error("Some thing went worng please try again");
 					header("Location:admin_new_session_detail.php");
 					exit;
 				}

 	}else if ($num_check==1){

 		$fetch_details=mysqli_fetch_assoc($check_sql_exe);

 		if($session_sl_num==$fetch_details['session_sl_num']){
 			$update_query="UPDATE `ilab_water_session` SET `seasion_name`='$session',`seasion_crop_id`='$crop_id' where `session_sl_num`='$session_sl_num'";
 				$update_exe=mysqli_query($conn,$update_query);

 				if($update_exe){
 					$msg->success("SuccessFully Sub-menu Update To Season " .$session);
 					header("Location:admin_new_session_detail.php");
 					exit;
 				}else{
 					$msg->error("Some thing went worng please try again");
 					header("Location:admin_new_session_detail.php");
 					exit;
 				}
 		}else{
 			$msg->error("this record is already present our table");
       		header("Location:admin_new_session_detail.php");
       		exit;
 		}

 	}else{
       $msg->error("this record is already present our table");
       header("Location:admin_new_session_detail.php");
       exit;
 	}

 }else{
 	header('Location:logout_time_out.php');
	exit;
 }
