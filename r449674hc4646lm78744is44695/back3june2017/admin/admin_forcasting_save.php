<?php
// echo "<pre>";
// print_r($_POST);
// exit;
// Array ( [place_status] => 2  [state_id] => BR   [district_id] => Pat    [item_code] => ocp    [item_type] => p/     [Quantity] => 22    [add_palce] => Submit )
session_start();
ob_start();
date_default_timezone_set("Asia/Kolkata");
if($_SESSION['admin_emails']){
require 'FlashMessages.php';
require 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
	$place_status=$_POST['place_status'];
	// $state_id=$_POST['state_id'];
	$date=date('Y-m-d');
	$time=date('H:i:s');
	$item_code=$_POST['item_code'];
	$item_type=$_POST['item_type'];
	$Quantity=$_POST['Quantity'];
	$add_palce=$_POST['add_palce'];
	if($add_palce=='Submit'){
		switch ($place_status) {
			
			case '2': //District 
				$place_id=$_POST['district_id'];
				$query_check_forcast="SELECT * FROM `rhc_master_forcasting_indent` WHERE `place_id`='$place_id' AND `item_code`='$item_code' AND `item_type`='$item_type' AND `place_status`='$place_status'";
				$sql_exe_check_forcast=mysqli_query($conn,$query_check_forcast);
				$num_check_forcast=mysqli_num_rows($sql_exe_check_forcast);
				if($num_check_forcast==0){
					$query_insert="INSERT INTO `rhc_master_forcasting_indent`(`slno`, `place_id`, `item_code`, `item_type`, `quantity`, `place_status`, `date_creation`, `time_creation`) VALUES (NULL,'$place_id','$item_code','$item_type','$Quantity','$place_status','$date','$time')";
				}else{
					$query_insert="UPDATE `rhc_master_forcasting_indent` SET `quantity`='$Quantity',`date_creation`='$date',`time_creation`='$time' WHERE `place_id`='$place_id' AND `item_code`='$item_code' AND `item_type`='$item_type' And `place_status`='$place_status'";
				}
				$sql_exe_insert=mysqli_query($conn,$query_insert);
				if($sql_exe_insert){
					$query_check_stock_id="SELECT * FROM `rhc_master_stock_district_items` WHERE `item_codes`='$item_code' and `item_types`='$item_type' and `distrct_place_id`='$place_id'";
					$sql_exe_check_stock_id=mysqli_query($conn,$query_check_stock_id);
					$num_check_check_stock_id=mysqli_num_rows($sql_exe_check_stock_id);
					if($num_check_check_stock_id==0){
						$query_insert_stock="INSERT INTO `rhc_master_stock_district_items`(`slno`,`item_codes`, `item_types`, `item_quantity`, `date_creation`, `time_creation`, `status`, `distrct_place_id`) VALUES (NULL,'$item_code','$item_type','0','$date','$time','2','$place_id')";
						
						
						$sql_exe_insert_stock=mysqli_query($conn,$query_insert_stock);
						$last_id = mysqli_insert_id($conn);
						$get_id="stock".$place_id.$last_id;
			 			$query_update_stock="UPDATE `rhc_master_stock_district_items` SET `district_stock_batch_id`='$get_id' WHERE `slno`='$last_id'";
						$sql_exe_Update=mysqli_query($conn,$query_update_stock);
						if($sql_exe_Update){
							$msg->success('Success-Fully');
 							header("location:admin_dashboard.php");
							exit;
						}else{
							$msg->error('Something Went Wrong Please Try It Again');
 							header("location:admin_dashboard.php");
							exit;
						}
					}else{
						$msg->success('Success-Fully');
 						header("location:admin_dashboard.php");
						exit;
					}
				}else{
					$msg->error('Something Went Wrong Please Try It Again');
 					header("location:admin_dashboard.php");
					exit;
				}

				break;
			case '3': //block 
				$place_id=$_POST['block_id'];
				$query_check_forcast="SELECT * FROM `rhc_master_forcasting_indent` WHERE `place_id`='$place_id' AND `item_code`='$item_code' AND `item_type`='$item_type' AND `place_status`='$place_status'";
				$sql_exe_check_forcast=mysqli_query($conn,$query_check_forcast);
				$num_check_forcast=mysqli_num_rows($sql_exe_check_forcast);
				if($num_check_forcast==0){
					$query_insert="INSERT INTO `rhc_master_forcasting_indent`(`slno`, `place_id`, `item_code`, `item_type`, `quantity`, `place_status`, `date_creation`, `time_creation`) VALUES (NULL,'$place_id','$item_code','$item_type','$Quantity','$place_status','$date','$time')";
				}else{
					$query_insert="UPDATE `rhc_master_forcasting_indent` SET `quantity`='$Quantity',`date_creation`='$date',`time_creation`='$time' WHERE `place_id`='$place_id' AND `item_code`='$item_code' AND `item_type`='$item_type' And `place_status`='$place_status'";
				}
				$sql_exe_insert=mysqli_query($conn,$query_insert);
				if($sql_exe_insert){

					$query_check_stock_id="SELECT * FROM `rhc_master_stock_block_items` WHERE `item_codes`='$item_code' and `item_types`='$item_type' and `block_place_id`='$place_id'";
					$sql_exe_check_stock_id=mysqli_query($conn,$query_check_stock_id);
					$num_check_check_stock_id=mysqli_num_rows($sql_exe_check_stock_id);
					if($num_check_check_stock_id==0){
						$query_insert_stock="INSERT INTO `rhc_master_stock_block_items`(`slno`,`item_codes`, `item_types`, `item_quantity`, `date_creation`, `time_creation`, `status`, `block_place_id`) VALUES (NULL,'$item_code','$item_type','0','$date','$time','2','$place_id')";

						$sql_exe_insert_stock=mysqli_query($conn,$query_insert_stock);
						$last_id = mysqli_insert_id($conn);
						$get_id="stock".$place_id.$last_id;
			 			$query_update_stock="UPDATE `rhc_master_stock_block_items` SET `block_stock_batch_id`='$get_id' WHERE `slno`='$last_id'";
						$sql_exe_Update=mysqli_query($conn,$query_update_stock);
						if($sql_exe_Update){
							$msg->success('Success-Fully');
 							header("location:admin_dashboard.php");
							exit;
						}else{
							$msg->error('Something Went Wrong Please Try It Again');
 							header("location:admin_dashboard.php");
							exit;
						}
					}else{
						$msg->success('Success-Fully');
 						header("location:admin_dashboard.php");
						exit;
					}
				}else{
					$msg->error('Something Went Wrong Please Try It Again');
 					header("location:admin_dashboard.php");
					exit;
				}

				break;
			case '4': //district Hospital 
				$place_id=$_POST['district_hospital_id'];
				$query_check_forcast="SELECT * FROM `rhc_master_forcasting_indent` WHERE `place_id`='$place_id' AND `item_code`='$item_code' AND `item_type`='$item_type' AND `place_status`='$place_status'";
				$sql_exe_check_forcast=mysqli_query($conn,$query_check_forcast);
				$num_check_forcast=mysqli_num_rows($sql_exe_check_forcast);
				if($num_check_forcast==0){
					$query_insert="INSERT INTO `rhc_master_forcasting_indent`(`slno`, `place_id`, `item_code`, `item_type`, `quantity`, `place_status`, `date_creation`, `time_creation`) VALUES (NULL,'$place_id','$item_code','$item_type','$Quantity','$place_status','$date','$time')";
				}else{
					$query_insert="UPDATE `rhc_master_forcasting_indent` SET `quantity`='$Quantity',`date_creation`='$date',`time_creation`='$time' WHERE `place_id`='$place_id' AND `item_code`='$item_code' AND `item_type`='$item_type' And `place_status`='$place_status'";
				}
				$sql_exe_insert=mysqli_query($conn,$query_insert);
				if($sql_exe_insert){

					$query_check_stock_id="SELECT * FROM `rhc_master_stock_district_hospital_items` WHERE `item_codes`='$item_code' and `item_types`='$item_type' and `dh_place_id`='$place_id'";
					$sql_exe_check_stock_id=mysqli_query($conn,$query_check_stock_id);
					$num_check_check_stock_id=mysqli_num_rows($sql_exe_check_stock_id);
					if($num_check_check_stock_id==0){
						$query_insert_stock="INSERT INTO `rhc_master_stock_district_hospital_items`(`slno`,`item_codes`, `item_types`, `item_quantity`, `date_creation`, `time_creation`, `status`, `dh_place_id`) VALUES (NULL,'$item_code','$item_type','0','$date','$time','2','$place_id')";

						$sql_exe_insert_stock=mysqli_query($conn,$query_insert_stock);
						$last_id = mysqli_insert_id($conn);
						$get_id="stock".$place_id.$last_id;
			 			$query_update_stock="UPDATE `rhc_master_stock_district_hospital_items` SET `dh_stock_batch_id`='$get_id' WHERE `slno`='$last_id'";
						$sql_exe_Update=mysqli_query($conn,$query_update_stock);
						if($sql_exe_Update){
							$msg->success('Success-Fully');
 							header("location:admin_dashboard.php");
							exit;
						}else{
							$msg->error('Something Went Wrong Please Try It Again');
 							header("location:admin_dashboard.php");
							exit;
						}
					}else{
						$msg->success('Success-Fully');
 						header("location:admin_dashboard.php");
						exit;
					}
				}else{
					$msg->error('Something Went Wrong Please Try It Again');
 					header("location:admin_dashboard.php");
					exit;
				}

				break;
			case '5': //PHC 
				$place_id=$_POST['phc_id'];
				$query_check_forcast="SELECT * FROM `rhc_master_forcasting_indent` WHERE `place_id`='$place_id' AND `item_code`='$item_code' AND `item_type`='$item_type' AND `place_status`='$place_status'";
				$sql_exe_check_forcast=mysqli_query($conn,$query_check_forcast);
				$num_check_forcast=mysqli_num_rows($sql_exe_check_forcast);
				if($num_check_forcast==0){
					$query_insert="INSERT INTO `rhc_master_forcasting_indent`(`slno`, `place_id`, `item_code`, `item_type`, `quantity`, `place_status`, `date_creation`, `time_creation`) VALUES (NULL,'$place_id','$item_code','$item_type','$Quantity','$place_status','$date','$time')";
				}else{
					$query_insert="UPDATE `rhc_master_forcasting_indent` SET `quantity`='$Quantity',`date_creation`='$date',`time_creation`='$time' WHERE `place_id`='$place_id' AND `item_code`='$item_code' AND `item_type`='$item_type' And `place_status`='$place_status'";
				}
				$sql_exe_insert=mysqli_query($conn,$query_insert);
				if($sql_exe_insert){

					$query_check_stock_id="SELECT * FROM `rhc_master_stock_phc_items` WHERE `item_codes`='$item_code' and `item_types`='$item_type' and `phc_place_id`='$place_id'";
					$sql_exe_check_stock_id=mysqli_query($conn,$query_check_stock_id);
					$num_check_check_stock_id=mysqli_num_rows($sql_exe_check_stock_id);
					if($num_check_check_stock_id==0){
						$query_insert_stock="INSERT INTO `rhc_master_stock_phc_items`(`slno`,`item_codes`, `item_types`, `item_quantity`, `date_creation`, `time_creation`, `status`, `phc_place_id`) VALUES (NULL,'$item_code','$item_type','0','$date','$time','2','$place_id')";

						$sql_exe_insert_stock=mysqli_query($conn,$query_insert_stock);
$last_id = mysqli_insert_id($conn);
						$get_id="stock".$place_id.$last_id;
			 			$query_update_stock="UPDATE `rhc_master_stock_phc_items` SET `phc_stock_batch_id`='$get_id' WHERE `slno`='$last_id'";
						$sql_exe_Update=mysqli_query($conn,$query_update_stock);
						if($sql_exe_Update){
							$msg->success('Success-Fully');
 							header("location:admin_dashboard.php");
							exit;
						}else{
							$msg->error('Something Went Wrong Please Try It Again');
 							header("location:admin_dashboard.php");
							exit;
						}
					}else{
						$msg->success('Success-Fully');
 						header("location:admin_dashboard.php");
						exit;
					}
				}else{
					$msg->error('Something Went Wrong Please Try It Again');
 					header("location:admin_dashboard.php");
					exit;
				}

				break;

			case '6': //APHC 
				$place_id=$_POST['aphc_id'];
				$query_check_forcast="SELECT * FROM `rhc_master_forcasting_indent` WHERE `place_id`='$place_id' AND `item_code`='$item_code' AND `item_type`='$item_type' AND `place_status`='$place_status'";
				$sql_exe_check_forcast=mysqli_query($conn,$query_check_forcast);
				$num_check_forcast=mysqli_num_rows($sql_exe_check_forcast);
				if($num_check_forcast==0){
					$query_insert="INSERT INTO `rhc_master_forcasting_indent`(`slno`, `place_id`, `item_code`, `item_type`, `quantity`, `place_status`, `date_creation`, `time_creation`) VALUES (NULL,'$place_id','$item_code','$item_type','$Quantity','$place_status','$date','$time')";
				}else{
					$query_insert="UPDATE `rhc_master_forcasting_indent` SET `quantity`='$Quantity',`date_creation`='$date',`time_creation`='$time' WHERE `place_id`='$place_id' AND `item_code`='$item_code' AND `item_type`='$item_type' And `place_status`='$place_status'";
				}
				$sql_exe_insert=mysqli_query($conn,$query_insert);
				if($sql_exe_insert){

					$query_check_stock_id="SELECT * FROM `rhc_master_stock_aphc_items` WHERE `item_codes`='$item_code' and `item_types`='$item_type' and `aphc_place_id`='$place_id'";
					$sql_exe_check_stock_id=mysqli_query($conn,$query_check_stock_id);
					$num_check_check_stock_id=mysqli_num_rows($sql_exe_check_stock_id);
					if($num_check_check_stock_id==0){
						$query_insert_stock="INSERT INTO `rhc_master_stock_aphc_items`(`slno`,`item_codes`, `item_types`, `item_quantity`, `date_creation`, `time_creation`, `status`, `aphc_place_id`) VALUES (NULL,'$item_code','$item_type','0','$date','$time','2','$place_id')";

						$sql_exe_insert_stock=mysqli_query($conn,$query_insert_stock);
$last_id = mysqli_insert_id($conn);
						$get_id="stock".$place_id.$last_id;
			 			$query_update_stock="UPDATE `rhc_master_stock_aphc_items` SET `aphc_stock_batch_id`='$get_id' WHERE `slno`='$last_id'";
						$sql_exe_Update=mysqli_query($conn,$query_update_stock);
						if($sql_exe_Update){
							$msg->success('Success-Fully');
 							header("location:admin_dashboard.php");
							exit;
						}else{
							$msg->error('Something Went Wrong Please Try It Again');
 							header("location:admin_dashboard.php");
							exit;
						}
					}else{
						$msg->success('Success-Fully');
 						header("location:admin_dashboard.php");
						exit;
					}
				}else{
					$msg->error('Something Went Wrong Please Try It Again');
 					header("location:admin_dashboard.php");
					exit;
				}

				break;
			case '7': //PHC subcenter 
				$place_id=$_POST['sub1'];
				$query_check_forcast="SELECT * FROM `rhc_master_forcasting_indent` WHERE `place_id`='$place_id' AND `item_code`='$item_code' AND `item_type`='$item_type' AND `place_status`='$place_status'";
				$sql_exe_check_forcast=mysqli_query($conn,$query_check_forcast);
				$num_check_forcast=mysqli_num_rows($sql_exe_check_forcast);
				if($num_check_forcast==0){
					$query_insert="INSERT INTO `rhc_master_forcasting_indent`(`slno`, `place_id`, `item_code`, `item_type`, `quantity`, `place_status`, `date_creation`, `time_creation`) VALUES (NULL,'$place_id','$item_code','$item_type','$Quantity','$place_status','$date','$time')";
				}else{
					$query_insert="UPDATE `rhc_master_forcasting_indent` SET `quantity`='$Quantity',`date_creation`='$date',`time_creation`='$time' WHERE `place_id`='$place_id' AND `item_code`='$item_code' AND `item_type`='$item_type' And `place_status`='$place_status'";
				}
				$sql_exe_insert=mysqli_query($conn,$query_insert);
				if($sql_exe_insert){

					$query_check_stock_id="SELECT * FROM `rhc_master_stock_phc_subcenter_items` WHERE `item_codes`='$item_code' and `item_types`='$item_type' and `phc_sub_place_id`='$place_id'";
					$sql_exe_check_stock_id=mysqli_query($conn,$query_check_stock_id);
					$num_check_check_stock_id=mysqli_num_rows($sql_exe_check_stock_id);
					if($num_check_check_stock_id==0){
						$query_insert_stock="INSERT INTO `rhc_master_stock_phc_subcenter_items`(`slno`,`item_codes`, `item_types`, `item_quantity`, `date_creation`, `time_creation`, `status`, `phc_sub_place_id`) VALUES (NULL,'$item_code','$item_type','0','$date','$time','2','$place_id')";

						$sql_exe_insert_stock=mysqli_query($conn,$query_insert_stock);
$last_id = mysqli_insert_id($conn);
						$get_id="stock".$place_id.$last_id;
			 			$query_update_stock="UPDATE `rhc_master_stock_phc_subcenter_items` SET `phc_sub_stock_batch_id`='$get_id' WHERE `slno`='$last_id'";
						$sql_exe_Update=mysqli_query($conn,$query_update_stock);
						if($sql_exe_Update){
							$msg->success('Success-Fully');
 							header("location:admin_dashboard.php");
							exit;
						}else{
							$msg->error('Something Went Wrong Please Try It Again');
 							header("location:admin_dashboard.php");
							exit;
						}
					}else{
						$msg->success('Success-Fully');
 						header("location:admin_dashboard.php");
						exit;
					}
				}else{
					$msg->error('Something Went Wrong Please Try It Again');
 					header("location:admin_dashboard.php");
					exit;
				}

				break;

			case '8': //PHC subcenter 
				$place_id=$_POST['sub2'];
				$query_check_forcast="SELECT * FROM `rhc_master_forcasting_indent` WHERE `place_id`='$place_id' AND `item_code`='$item_code' AND `item_type`='$item_type' AND `place_status`='$place_status'";
				$sql_exe_check_forcast=mysqli_query($conn,$query_check_forcast);
				$num_check_forcast=mysqli_num_rows($sql_exe_check_forcast);
				if($num_check_forcast==0){
					$query_insert="INSERT INTO `rhc_master_forcasting_indent`(`slno`, `place_id`, `item_code`, `item_type`, `quantity`, `place_status`, `date_creation`, `time_creation`) VALUES (NULL,'$place_id','$item_code','$item_type','$Quantity','$place_status','$date','$time')";
				}else{
					$query_insert="UPDATE `rhc_master_forcasting_indent` SET `quantity`='$Quantity',`date_creation`='$date',`time_creation`='$time' WHERE `place_id`='$place_id' AND `item_code`='$item_code' AND `item_type`='$item_type' And `place_status`='$place_status'";
				}
				$sql_exe_insert=mysqli_query($conn,$query_insert);
				if($sql_exe_insert){

					$query_check_stock_id="SELECT * FROM `rhc_master_stock_aphc_subcenter_items` WHERE `item_codes`='$item_code' and `item_types`='$item_type' and `aphc_sub_place_id`='$place_id'";
					$sql_exe_check_stock_id=mysqli_query($conn,$query_check_stock_id);
					$num_check_check_stock_id=mysqli_num_rows($sql_exe_check_stock_id);
					if($num_check_check_stock_id==0){
						$query_insert_stock="INSERT INTO `rhc_master_stock_aphc_subcenter_items`(`slno`,`item_codes`, `item_types`, `item_quantity`, `date_creation`, `time_creation`, `status`, `aphc_sub_place_id`) VALUES (NULL,'$item_code','$item_type','0','$date','$time','2','$place_id')";

						$sql_exe_insert_stock=mysqli_query($conn,$query_insert_stock);
$last_id = mysqli_insert_id($conn);
						$get_id="stock".$place_id.$last_id;
			 			$query_update_stock="UPDATE `rhc_master_stock_aphc_subcenter_items` SET `aphc_sub_stock_batch_id`='$get_id' WHERE `slno`='$last_id'";
						$sql_exe_Update=mysqli_query($conn,$query_update_stock);
						if($sql_exe_Update){
							$msg->success('Success-Fully');
 							header("location:admin_dashboard.php");
							exit;
						}else{
							$msg->error('Something Went Wrong Please Try It Again');
 							header("location:admin_dashboard.php");
							exit;
						}
					}else{
						$msg->success('Success-Fully');
 						header("location:admin_dashboard.php");
						exit;
					}
				}else{
					$msg->error('Something Went Wrong Please Try It Again');
 					header("location:admin_dashboard.php");
					exit;
				}

				break;
			case '11': //UPHC  
				$place_id=$_POST['uphc_id'];
				$query_check_forcast="SELECT * FROM `rhc_master_forcasting_indent` WHERE `place_id`='$place_id' AND `item_code`='$item_code' AND `item_type`='$item_type' AND `place_status`='$place_status'";
				$sql_exe_check_forcast=mysqli_query($conn,$query_check_forcast);
				$num_check_forcast=mysqli_num_rows($sql_exe_check_forcast);
				if($num_check_forcast==0){
					$query_insert="INSERT INTO `rhc_master_forcasting_indent`(`slno`, `place_id`, `item_code`, `item_type`, `quantity`, `place_status`, `date_creation`, `time_creation`) VALUES (NULL,'$place_id','$item_code','$item_type','$Quantity','$place_status','$date','$time')";
				}else{
					$query_insert="UPDATE `rhc_master_forcasting_indent` SET `quantity`='$Quantity',`date_creation`='$date',`time_creation`='$time' WHERE `place_id`='$place_id' AND `item_code`='$item_code' AND `item_type`='$item_type' And `place_status`='$place_status'";
				}
				$sql_exe_insert=mysqli_query($conn,$query_insert);
				if($sql_exe_insert){

					$query_check_stock_id="SELECT * FROM `rhc_master_stock_uphc_items` WHERE `item_codes`='$item_code' and `item_types`='$item_type' and `uphc_place_id`='$place_id'";
					$sql_exe_check_stock_id=mysqli_query($conn,$query_check_stock_id);
					$num_check_check_stock_id=mysqli_num_rows($sql_exe_check_stock_id);
					if($num_check_check_stock_id==0){
						$query_insert_stock="INSERT INTO `rhc_master_stock_uphc_items`(`slno`,`item_codes`, `item_types`, `item_quantity`, `date_creation`, `time_creation`, `status`, `uphc_place_id`) VALUES (NULL,'$item_code','$item_type','0','$date','$time','2','$place_id')";

						$sql_exe_insert_stock=mysqli_query($conn,$query_insert_stock);
						$last_id = mysqli_insert_id($conn);
						$get_id="stock".$place_id.$last_id;
			 			$query_update_stock="UPDATE `rhc_master_stock_uphc_items` SET `uphc_stock_batch_id`='$get_id' WHERE `slno`='$last_id'";
						$sql_exe_Update=mysqli_query($conn,$query_update_stock);
						if($sql_exe_Update){
							$msg->success('Success-Fully');
 							header("location:admin_uphc_forcasting.php");
							exit;
						}else{
							$msg->error('Something Went Wrong Please Try It Again');
 							header("location:admin_dashboard.php");
							exit;
						}
					}else{
						$msg->success('Success-Fully');
 						header("location:admin_dashboard.php");
						exit;
					}
				}else{
					$msg->error('Something Went Wrong Please Try It Again');
 					header("location:admin_dashboard.php");
					exit;
				}

				break;
			default:
				header('Location:logout.php');
				exit;
				break;
		}
	}else{
		header('Location:logout.php');
		exit;
	}



}else{
	header('Location:logout.php');
	exit;
}