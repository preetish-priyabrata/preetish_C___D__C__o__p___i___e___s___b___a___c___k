<?php

print_r($_POST);
// Array ( [land_sl_num] => 1 [sub_menu_land] => uplands [Save] => update ) 

?>
<?php
session_start();
// print_r($_POST);
// Array ( [sub_menu_land] => dessrot [Save] => Submit Query )  

if($_SESSION['email_id']){
	
	include 'webconfig/config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	

	$land_type_name=strtolower($_POST['sub_menu_land']);
	$land_sl_num=$_POST['land_sl_num'];
	
	$Date= date("Y-m-d");
	// $land_id=$_POST['land_id'];
	$main_id=1;
	
 $check_query= "SELECT * FROM `ilab_water_land_type` WHERE `land_type_name`='$sub_menu_land'";


			$check_sql_exe=mysqli_query($conn,$check_query);

			$num_check=mysqli_num_rows($check_sql_exe);
 			if ($num_check==0){
   

 				$update_query="UPDATE `ilab_water_land_type` SET `land_type_name`='$land_type_name' where `land_sl_num`='$land_sl_num'";
 				$update_exe=mysqli_query($conn,$update_query);

 				if($update_exe){
 					$msg->success("SuccessFully Land update To Agriculture"
 						.$land_type_name);
 					header("Location:admin_new_land_detail_view.php");
 					exit;
 				}else{
 					$msg->error("Some thing went worng please try again");
 					header("Location:admin_new_land_detail_view.php");
 					exit;
 				}

 	}else if ($num_check==0){
   		$fetch_land=mysqli_fetch_assoc($check_sql_exe);
   			if($land_sl_num==$fetch_land['land_sl_num']){

 				$update_query="UPDATE `ilab_water_land_type` SET `land_type_name`='$land_type_name' where `land_sl_num`='$land_sl_num'";
 				$update_exe=mysqli_query($conn,$update_query);

 				if($update_exe){
 					$msg->success("SuccessFully Land update To Agriculture"
 						.$land_type_name);
 					header("Location:admin_new_land_detail_view.php");
 					exit;
 				}else{
 					$msg->error("Some thing went worng please try again");
 					header("Location:admin_new_land_detail_view.php");
 					exit;
 				}
 			}else{
 				 $msg->error("this record is already present our table");
       			header("Location:admin_new_land_detail_view.php");
       			exit;
 			}

 	}else{
       $msg->error("this record is already present our table");
       header("Location:admin_new_land_detail_view.php");
       exit;
 	}

 }else{
 	header('Location:logout_time_out.php');
	exit;
 }
