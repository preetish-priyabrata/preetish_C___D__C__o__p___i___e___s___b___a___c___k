<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);
session_start();
if($_SESSION['admin_zonal']){
	require 'FlashMessages.php';
	include '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();
	//print_r($_POST);
	
	 $form_type=web_decryptIt(str_replace(" ", "+", $_POST['form_type']));
	
	if($form_type=="site_mr1"){
		if(isset($_POST['secondary_details'])){
			$zonal_place=$_SESSION['zonal_place'];	
			$top_place=$_SESSION['top_place'];

			$user_location=$_POST['user_location'];

			$date_info=$_POST['date_info'];
			$approver_id=$_POST['approver_id'];
			$Time_info=$_POST['Time_info'];
			$secondary_details=$_POST['secondary_details'];
			$primary_details=$_POST['primary_details'];
			$item_name=$_POST['item_name'];
			$category_name=$_POST['category_name'];
			$machine_no_filter=array_filter($_POST['machine_no']); // filter part only
			$machine_no=($_POST['machine_no']);
			$unit_details=$_POST['unit_details'];
			$date=date('Y-m-d');
			$time=date('H:i:s');
			$category_name_id=$_POST['category_name_id'];
			$user_id=$_SESSION['admin_zonal'];
			
			$count_item=count($machine_no_filter);

			
			if(!empty($machine_no_filter)){
				 $insert_query_info="INSERT INTO `lt_master_zonal_material_requsition`(`zmr_slno`, `zmr_site_to_location_id`, `zmr_site_from_location_id`, `zmr_user_id`,  `zmr_forward_id`,  `no_items_z`,  `date`, `time`) VALUES (Null,'$top_place','$user_location','$user_id','$approver_id','$count_item','$date','$time')";
					$sql_insert=mysqli_query($conn,$insert_query_info);
			 		// execute query
			 		
		 			 $last_id=mysqli_insert_id($conn);
		 			// findind last inserted query
		 			 $site_code="site_00_".$last_id;
		 	
		 			//here combination of our short code designed 

		 			// updated query insert in headquarter 
		 			$query_update="UPDATE `lt_master_zonal_material_requsition` SET `zmr_unqiue_mr_id`='$site_code' WHERE `zmr_slno`='$last_id'";
		 			$sql_update=mysqli_query($conn,$query_update);

				for ($i=0; $i <count($machine_no) ; $i++) { 
					 $machine=$machine_no[$i];
					if(in_array($machine,$machine_no_filter)){
						$zmrd_primary_code=$primary_details[$i];
						$zmrd_second_code=$secondary_details[$i];
						$zmrd_name_item=$item_name[$i];
						$zmrd_category_name=$category_name[$i];
						$zmrd_category_id=$category_name_id[$i];
						$zmrd_units_required=$unit_details[$i];
						$zmrd_machine_no=$machine_no[$i];

						$insert_query="INSERT INTO `lt_master_zonal_material_requsition_details`(`zmrd_slno`, `zmrd_slno_id`, `zmr_unqiue_mr_id_iteam`, `zmrd_site_location_id`, `zmrd_primary_code`, `zmrd_second_code`, `zmrd_name_item`, `zmrd_category_name`, `zmrd_category_id`, `zmrd_units_required`,`zmrd_date_entry`,`zmrd_time_entry`,`zmrd_machine_no`) VALUES (Null,'$last_id','$site_code','$user_location','$zmrd_primary_code','$zmrd_second_code','$zmrd_name_item','$zmrd_category_name','$zmrd_category_id','$zmrd_units_required','$date','$time','$zmrd_machine_no')";
						$sql_inserted=mysqli_query($conn,$insert_query);

					}
				}
				$lid=web_encryptIt($last_id);
				$site_list=web_encryptIt($site_code);
				unset($_POST);

				$msg->success('Please Enter Quantity');
		 		header('Location:zonal_mr_raised_detail.php?slno='.$lid.'&list='.$site_list);
				exit;
			

			}else{
				$msg->error('Please Select machine No Before');
		 		header('Location:index.php');
				exit;
			}
		}else{
			$msg->error('Please Select Any Component Before Saving ');
		 	header('Location:index.php');
			exit;
		}
	}else if($form_type=="site_mr2"){ // insert second form while submiting if form is intrupt due some factors
		// Array ( [form_type] => DkBS0LPWYZMLLibq9v/vZz37HQQg+soiBGzJQzaOB8s= [user_location] => zonal001 [date_info] => 2017-10-11 [list_id] => site_00_1 [slno_id] => 1 [approver_id] => user_003 [Time_info] => 16:21:47 [example77_length] => 10 [slno_item] => Array ( [0] => 1 [1] => 2 [2] => 3 ) [quantity_req] => Array ( [0] => 10 [1] => 20 [2] => 30 ) [remarks_detail] => Array ( [0] => google [1] => yahoo [2] => best ) ) 
		$user_location=$_POST['user_location'];
		$date_info=$_POST['date_info'];
		$list_id=$_POST['list_id'];
		$slno_id=$_POST['slno_id'];
		$approver_id=$_POST['approver_id'];
		$Time_info=$_POST['Time_info'];
		$slno_item=$_POST['slno_item'];
		$quantity_req=$_POST['quantity_req'];
		$remarks_detail=$_POST['remarks_detail'];
		$quantity_aval=$_POST['quantity_aval'];
		for ($i=0; $i <count($slno_item) ; $i++) { 

			$quantity_aval_single=$quantity_aval[$i];
			$slno_item_single=$slno_item[$i];
			$quantity_req_single=$quantity_req[$i];
			$remarks_detail_single=$remarks_detail[$i];

			$UPDATE="UPDATE `lt_master_zonal_material_requsition_details` SET `zmrd_avaliable_qnt`='$quantity_aval_single',`zmrd_request_qnt`='$quantity_req_single',`zmrd_date_entry`='$date_info',`zmrd_time_entry`='$Time_info',`remark_id`='$remarks_detail_single' WHERE`zmrd_slno`='$slno_item_single'";
			$sql_update_exe=mysqli_query($conn,$UPDATE);

		}
			
		$update_mr_list="UPDATE `lt_master_zonal_material_requsition` SET `status`='1',`date`='$date_info',`time`='$Time_info' where `zmr_slno`='$slno_id'and`zmr_unqiue_mr_id`='$list_id'";
		$sql_update_mr_list=mysqli_query($conn,$update_mr_list);

		

		if(($sql_update_mr_list=="1") && ($sql_update_exe=="1")){
			$msg->success('Requisition Raised SuccessFully');
	 		header('Location:zonal_mr_raised.php');
			exit;
		}else{
			$lid=web_encryptIt($last_id);
			$site_list=web_encryptIt($site_code);
			$msg->error('Something went wrong Please Try again!!!');
	 		header('Location:zonal_mr_raised_detail.php?slno='.$lid.'&list='.$site_list);
			exit;
		}	
			
	}else{
		exit;
		header('Location:logout.php');
		exit;
	}
}else{
	header('Location:logout.php');
	exit;
}


?>
