<?php
// print_r($_POST);
// exit;
session_start();

// print_r($_POST);
if($_SESSION['admin_field']){
	require 'FlashMessages.php';
	include  '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();
	$date=date('Y-m-d');
	$time=date('H:i:s');
	$form_type=web_decryptIt(str_replace(" ", "+", $_POST['form_type']));

	if($form_type=="field_mr1"){
		$machine_no=$_POST['machine_no'];
		if(isset($_POST['secondary_details'])){
			$user_location=$_POST['user_location'];
			$date_info=$_POST['date_info'];
			$Time_info=$_POST['Time_info'];
			
			$model_id=$_POST['model_id'];
			$secondary_details=$_POST['secondary_details'];
			$primary_details=$_POST['primary_details'];
			$item_name=$_POST['item_name'];
			$unit_details=$_POST['unit_details'];
			$category_name=$_POST['category_name'];
			$category_name_id=$_POST['category_name_id'];
			$maintenance_id=$_POST['maintenance_id'];
			$machine_no_filter=array_filter($maintenance_id);
			$no_items_f=count($machine_no_filter);
			$fmr_site_to_location_id=$_SESSION['zonal_place'];
			$fmr_site_from_location_id=$_SESSION['field_place'];
			$fmr_user_id=$_SESSION['admin_field'];
			
			if(!empty($machine_no_filter)){

				$insert="INSERT INTO `lt_master_field_material_requsition`(`fmr_slno`, `fmr_site_to_location_id`, `fmr_site_from_location_id`, `fmr_user_id`, `no_items_f`, `date`, `time`,`machine_no`,`model_id`) VALUES (Null,'$fmr_site_to_location_id','$fmr_site_from_location_id','$fmr_user_id','$no_items_f','$date','$time','$machine_no','$model_id')";
				$sql_insert=mysqli_query($conn,$insert);
				 		// execute query
				 		// echo mysqli_error($conn);
				 		// exit;
				 		
			 	$last_id=mysqli_insert_id($conn);
			 			// findind last inserted query
			 	$site_code=$fmr_site_from_location_id."_field_00_".$last_id;

			 	$query_update="UPDATE `lt_master_field_material_requsition` SET `fmr_unqiue_mr_id`='$site_code' WHERE `fmr_slno`='$last_id'";
			 	$sql_update=mysqli_query($conn,$query_update);

				for ($i=0; $i <count($maintenance_id); $i++) { 
					$maintenance_id_single=$maintenance_id[$i];
					
					if(in_array($maintenance_id_single,$machine_no_filter)){
							$fmrd_primary_code=$primary_details[$i];
							$fmrd_second_code=$secondary_details[$i];
							$fmrd_name_item=$item_name[$i];
							$fmrd_category_name=$category_name[$i];
							$fmrd_category_id=$category_name_id[$i];
							$fmrd_units_required=$unit_details[$i];
							$fmrd_machine_no=$machine_no;

							$stock_entry="INSERT INTO `lt_master_field_material_requsition_details`(`fmrd_slno`, `fmrd_slno_id`, `fmr_unqiue_mr_id_iteam`, `fmrd_site_location_id`, `fmrd_primary_code`, `fmrd_second_code`, `fmrd_name_item`, `fmrd_category_name`, `fmrd_category_id`, `fmrd_units_required`, `fmrd_machine_no`,`maintenance_id`,`model_id`,`fmrd_date_entry`,`fmrd_time_entry`) VALUES (Null,'$last_id','$site_code','$fmr_site_from_location_id','$fmrd_primary_code','$fmrd_second_code','$fmrd_name_item','$fmrd_category_name','$fmrd_category_id','$fmrd_units_required','$fmrd_machine_no','$maintenance_id_single','$model_id','$date','$time')";
							$sql_inserted=mysqli_query($conn,$stock_entry);
							
					}
				}

				$lid=web_encryptIt($last_id);
					$site_list=web_encryptIt($site_code);
					unset($_POST);

					$msg->success('Please Enter Quantity');
			 		header('Location:field_mr_raised_detail.php?slno='.$lid.'&token_list='.$site_list.'&machine_no='.$machine_no);
					exit;
				

				
			}else{
				
				$msg->error('Please Select Any maintenance For Componet For This machine no '.$machine_no);
				header('Location:field_mr_raised_machine.php?machine_no='.$machine_no);
				exit;
			}
		}else{
			$msg->error('Please Select Any component For This machine no '.$machine_no);
				header('Location:field_mr_raised_machine.php?machine_no='.$machine_no);
				exit;
		}
	}else if($form_type=='field_mr2'){
			// print_r($_POST);
			// exit;
			// Array ( [form_type] => Tu/U+mz/1mRW5MM9IxQng4FlAgRT5zrp9MJictz7D+E= [user_location] => field001 [date_info] => 2017-11-29 [list_id] => field001_field_00_2 [slno_id] => 2 [machine_no] => mud698 [model_id] => md2 [Time_info] => 12:53:13 [example77_length] => 10 [slno_item] => Array ( [0] => 5 [1] => 6 [2] => 7 [3] => 8 ) [quantity_aval] => Array ( [0] => 0 [1] => 0 [2] => 0 [3] => 0 ) [quantity_req] => Array ( [0] => 22 [1] => 2 [2] => 2 [3] => 2 ) [remarks_detail] => Array ( [0] => 22 [1] => 22 [2] => 2 [3] => 2 ) ) 
			$machine_no=$_POST['machine_no'];
			$user_location=$_POST['user_location'];
			$date_info=$_POST['date_info'];
			$site_code=$list_id=$_POST['list_id']; //mr id
			$last_id=$slno_id=$_POST['slno_id']; // date
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

				$UPDATE="UPDATE `lt_master_field_material_requsition_details` SET `fmrd_avaliable_qnt`='$quantity_aval_single',`fmrd_request_qnt`='$quantity_req_single',`fmrd_date_entry`='$date_info',`fmrd_time_entry`='$Time_info',`remark_id`='$remarks_detail_single' WHERE`fmrd_slno`='$slno_item_single'";
				$sql_update_exe=mysqli_query($conn,$UPDATE);
				

			}
			
			 $update_mr_list="UPDATE `lt_master_field_material_requsition` SET `status`='1',`date`='$date',`time`='$time' where `fmr_slno`='$last_id'and`fmr_unqiue_mr_id`='$site_code'";
			$sql_update_mr_list=mysqli_query($conn,$update_mr_list);
			
			if(($sql_update_mr_list=="1") && ($sql_update_exe=="1")){
				;
				$msg->success('Requsition Raised SuccessFully');
		 		header('Location:field_mr_raised.php');
				exit;
			}else{
				$lid=web_encryptIt($last_id);
				$site_list=web_encryptIt($site_code);
				
				$msg->error('Something went wrong Please Try again!!!');
		 		header('Location:field_mr_raised_detail.php?slno='.$lid.'&token_list='.$site_list.'&machine_no='.$machine_no);
				exit;
			}	
		}else{
			
			header('Location:logout.php');
			exit;
		}

}else{
	header('Location:logout.php');
	exit;
}