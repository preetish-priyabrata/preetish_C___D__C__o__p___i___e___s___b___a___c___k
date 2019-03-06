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
	$land_id=$_POST['land_id'];
    $main_id=1;
    $sl_num=$_POST['sl_num'];

			$check_query= "SELECT * FROM `ilab_water_water_details` WHERE`water_name`='$water_name' and `water_land_id`='$land_id'";


			$check_sql_exe=mysqli_query($conn,$check_query);

			$num_check=mysqli_num_rows($check_sql_exe);
 			if ($num_check==0){


 				 $update_query="UPDATE `ilab_water_water_details` SET `water_name`='$water_name',`water_land_id`='$land_id' where `sl_num`='$sl_num'";
 				
 				$update_exe=mysqli_query($conn,$update_query);

 				if($update_exe){
 					$msg->success("SuccessFully water_name Update To Agriculture Water " .$water_name);
 					header("Location:admin_new_water_detail_view.php");
 					exit;
 				}else{
 					$msg->error("Some thing went worng please try again");
 					header("Location:admin_new_water_detail_view.php");
 					exit;
 				}

 	}else if ($num_check==1){
 		$fetch_water=mysqli_fetch_assoc($check_sql_exe);
 			if($sl_num==$fetch_water['sl_num']){

 				 $update_query="UPDATE `ilab_water_water_details` SET `water_name`='$water_name',`water_land_id`='$land_id' where `sl_num`='$sl_num'";
 				
 				$update_exe=mysqli_query($conn,$update_query);

 				if($update_exe){
 					$msg->success("SuccessFully water_name Update To Agriculture Water " .$water_name);
 					header("Location:admin_new_water_detail_view.php");
 					exit;
 				}else{
 					$msg->error("Some thing went worng please try again");
 					header("Location:admin_new_water_detail_view.php");
 					exit;
 				}
 			}else{
 				$msg->error("this record is already present our table");
       			header("Location:admin_new_water_detail_view.php");
       			exit;
 			}
 	}else{
       $msg->error("this record is already present our table");
       header("Location:admin_new_water_detail_view.php");
       exit;
 	}

 }else{
 	header('Location:logout_time_out.php');
	exit;
 }
