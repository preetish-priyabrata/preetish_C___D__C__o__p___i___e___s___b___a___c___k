<?php
session_start();
// print_r($_POST);
// Array ( [sub_menu_land] => dessrot [Save] => Submit Query )  

if($_SESSION['email_id']){
	
	include 'webconfig/config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	

	$land_type_name=strtolower($_POST['sub_menu_land']);
	
	$Date= date("Y-m-d");
	// $land_id=$_POST['land_id'];
	$main_id=1;
	
 $check_query= "SELECT * FROM `ilab_water_land_type` WHERE `land_type_name`='$sub_menu_land'";


			$check_sql_exe=mysqli_query($conn,$check_query);

			$num_check=mysqli_num_rows($check_sql_exe);
 			if ($num_check==0){
   
	 $insert="INSERT INTO `ilab_water_land_type`(`land_type_name`,`Date`) VALUES ('$land_type_name','$Date')";
    

 				$insert_exe=mysqli_query($conn,$insert);
            
 				$sl_num=$last_id=mysqli_insert_id($conn);

 				$land_id="land001".$last_id;

 				$update_query="UPDATE `ilab_water_land_type` SET `land_id`='$land_id' where `land_sl_num`='$sl_num'";
 				$update_exe=mysqli_query($conn,$update_query);

 				if($insert_exe){
 					$msg->success("SuccessFully Land Added To Agriculture"
 						.$land_type_name);
 					header("Location:admin_new_land_detail.php");
 					exit;
 				}else{
 					$msg->error("Some thing went worng please try again");
 					header("Location:admin_new_land_detail.php");
 					exit;
 				}

 	}else{
       $msg->error("this record is already present our table");
       header("Location:admin_new_land_detail.php");
       exit;
 	}

 }else{
 	header('Location:logout_time_out.php');
	exit;
 }
