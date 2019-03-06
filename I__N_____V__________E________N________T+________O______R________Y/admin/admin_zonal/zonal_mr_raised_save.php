<?php
// print_r($_POST);
// exit;
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
session_start();
if($_SESSION['admin_zonal']){
	require 'FlashMessages.php';
	include '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();
	// Array ( [form_type] => KCpzvsPmYgJD/rn6kb7S9AMsa2LK5q/SPHmHybEpHdc= [approver_id] => user_003 [example77_length] => 10 [user_location] => zonal001 [date_info] => 2018-03-03 [Time_info] => 18:11:47 [example771_length] => 10 [secondary_details] => Array ( [0] => 867546 [1] => 65454 [2] => 645342 [3] => 765426 [4] => 56476875 [5] => 7554 [6] => 6564 [7] => 9232 [8] => 5476 ) [primary_details] => Array ( [0] => 644545 [1] => 87673 [2] => 7856456 [3] => 87654 [4] => 73658743 [5] => 6756 [6] => 9897 [7] => 5978 [8] => 5455 ) [item_name] => Array ( [0] => Device [1] => mobile [2] => fan [3] => cylinder [4] => laptop [5] => cold drinks [6] => system [7] => sugar [8] => tab ) [unit_details] => Array ( [0] => centimeter [1] => piece [2] => piece [3] => liter [4] => piece [5] => liter [6] => piece [7] => gram [8] => piece ) [category_name] => Array ( [0] => lubricant [1] => consumable [2] => consumable [3] => insurance [4] => lubricant [5] => insurance [6] => lubricant [7] => consumable [8] => insurance ) [category_name_id] => Array ( [0] => [1] => 2 [2] => 2 [3] => 3 [4] => [5] => 3 [6] => [7] => 2 [8] => 3 ) [hsn_code] => Array ( [0] => dell9898 [1] => asus45 [2] => usha67 [3] => india456 [4] => appolo45 [5] => pepsi867 [6] => hcl765 [7] => bru564 [8] => tab67 ) ) 
	// print_r($_POST);
	// exit;
	
	 $form_type=web_decryptIt(str_replace(" ", "+", $_POST['form_type']));
	
	if($form_type=="site_mr1"){
		// print_r($_POST);
		// exit;
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
			$hsn_code=$_POST['hsn_code'];
			$count_item=count($machine_no_filter);

			
			// if(!empty($machine_no_filter)){
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

				for ($i=0; $i <count($primary_details) ; $i++) { 
					 // $machine=$machine_no[$i];
					// if(in_array($machine,$machine_no_filter)){
						$zmrd_primary_code=$primary_details[$i];
						$zmrd_second_code=$secondary_details[$i];
						$zmrd_name_item=$item_name[$i];
						$zmrd_category_name=$category_name[$i];
						$zmrd_category_id=$category_name_id[$i];
						$zmrd_units_required=$unit_details[$i];
						$zmrd_machine_no="Null";
						$zmrd_hsn_code=$hsn_code[$i];
						 $insert_query="INSERT INTO `lt_master_zonal_material_requsition_details`(`zmrd_slno`, `zmrd_slno_id`, `zmr_unqiue_mr_id_item`, `zmrd_site_location_id`, `zmrd_primary_code`, `zmrd_second_code`, `zmrd_name_item`, `zmrd_category_name`, `zmrd_category_id`, `zmrd_units_required`,`zmrd_date_entry`,`zmrd_time_entry`,`zmrd_machine_no`,`zmrd_hsn_code`) VALUES (Null,'$last_id','$site_code','$user_location','$zmrd_primary_code','$zmrd_second_code','$zmrd_name_item','$zmrd_category_name','$zmrd_category_id','$zmrd_units_required','$date','$time','$zmrd_machine_no','$zmrd_hsn_code')";
						
						$sql_inserted=mysqli_query($conn,$insert_query);

						// $file = fopen("test1.txt", "a+");
						// fwrite($file, "---" . $insert_query . "---".$sql_inserted."---");
					// }
				}
				$lid=web_encryptIt($last_id);
				$site_list=web_encryptIt($site_code);
				unset($_POST);

				$msg->success('Please Enter Quantity');
		 		header('Location:zonal_mr_raised_detail.php?slno='.$lid.'&list='.$site_list);
				exit;
			

			// }else{
			// 	$msg->error('Please Select machine No Before');
		 // 		header('Location:index.php');
			// 	exit;
			// }
		}else{
			$msg->error('Please Select Any Component Before Saving ');
		 	header('Location:index.php');
			exit;
		}
	}else if($form_type=="site_mr2"){ // insert second form while submiting if form is intrupt due some 
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
			$no_items_z=count($slno_item);
			$quantity_aval_single=$quantity_aval[$i];
			$slno_item_single=$slno_item[$i];
			$quantity_req_single=$quantity_req[$i];
			$remarks_detail_single=$remarks_detail[$i];

			$UPDATE="UPDATE `lt_master_zonal_material_requsition_details` SET `zmrd_avaliable_qnt`='$quantity_aval_single',`zmrd_request_qnt`='$quantity_req_single',`zmrd_date_entry`='$date_info',`zmrd_time_entry`='$Time_info',`remark_id`='$remarks_detail_single' WHERE`zmrd_slno`='$slno_item_single'";
			$sql_update_exe=mysqli_query($conn,$UPDATE);

		}
			
		$update_mr_list="UPDATE `lt_master_zonal_material_requsition` SET `status`='1',`date`='$date_info',`time`='$Time_info',`no_items_z`='$no_items_z' where `zmr_slno`='$slno_id'and`zmr_unqiue_mr_id`='$list_id'";
		$sql_update_mr_list=mysqli_query($conn,$update_mr_list);

		

		if($sql_update_mr_list=="1"){
			$msg->success('Requisition Saved SuccessFully');
	 		header('Location:zonal_mr_raised.php');
			exit;
		}else{
			$lid=web_encryptIt($slno_id);
			$site_list=web_encryptIt($list_id);
			$msg->error('Something went wrong Please Try again!!!');
	 		header('Location:zonal_mr_raised_detail.php?slno='.$lid.'&list='.$site_list);
			exit;
		}	
	}else if($form_type=="site_mr3"){ // insert second form while submiting if form is intrupt due some 
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
			$no_items_z=count($slno_item);
			$quantity_aval_single=$quantity_aval[$i];
			$slno_item_single=$slno_item[$i];
			$quantity_req_single=$quantity_req[$i];
			$remarks_detail_single=$remarks_detail[$i];

			$UPDATE="UPDATE `lt_master_zonal_material_requsition_details` SET `zmrd_avaliable_qnt`='$quantity_aval_single',`zmrd_request_qnt`='$quantity_req_single',`zmrd_date_entry`='$date_info',`zmrd_time_entry`='$Time_info',`remark_id`='$remarks_detail_single' WHERE`zmrd_slno`='$slno_item_single'";
			$sql_update_exe=mysqli_query($conn,$UPDATE);

		}
			
		$update_mr_list="UPDATE `lt_master_zonal_material_requsition` SET `status`='1',`date`='$date_info',`time`='$Time_info',`no_items_z`='$no_items_z',`sent_status`='1' where `zmr_slno`='$slno_id'and`zmr_unqiue_mr_id`='$list_id'";
		$sql_update_mr_list=mysqli_query($conn,$update_mr_list);

		

		if($sql_update_mr_list=="1"){
			$msg->success('Requisition Raised SuccessFully To Approver');
	 		header('Location:zonal_mr_raised.php');
			exit;
		}else{
			$lid=web_encryptIt($slno_id);
			$site_list=web_encryptIt($list_id);
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
