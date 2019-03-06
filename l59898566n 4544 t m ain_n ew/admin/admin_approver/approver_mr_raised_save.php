<?php
// print_r($_POST);
// Array ( [form_type] => DkBS0LPWYZMLLibq9v/vZz37HQQg+soiBGzJQzaOB8s= [user_location] => zonal001 [date_info] => 2017-10-12 [list_id] => site_00_1 [slno_id] => 1 [approver_id] => user_003 [Time_info] => 15:51:11 [example77_length] => 10 [slno_item] => Array ( [0] => 1 [1] => 2 [2] => 3 ) [quantity_req] => Array ( [0] => 20 [1] => 15 [2] => 30 ) ) 
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if($_SESSION['admin_approver']){
	require 'FlashMessages.php';
	include '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();
	//print_r($_POST);
	
	$form_type=web_decryptIt(str_replace(" ", "+", $_POST['form_type']));
	if($form_type=="approver_edited"){

	 	$user_location=$_POST['user_location'];
		$date_info=$_POST['date_info'];
		$list_id=$_POST['list_id'];
		$slno_id=$_POST['slno_id'];
		$approver_id=$_POST['approver_id'];
		$Time_info=$_POST['Time_info'];
		$slno_item=$_POST['slno_item'];
		$quantity_req=$_POST['quantity_req'];

		for ($i=0; $i < count($slno_item) ; $i++) { 

			$slno_item_single=$slno_item[$i];
			$quantity_req_single=$quantity_req[$i];

			$UPDATE="UPDATE `lt_master_zonal_material_requsition_details` SET `zmrd_approved_qnt`='$quantity_req_single',`zmrd_approve_status`='1',`zmrd_approver_date`='$date_info',`zmrd_approver_time`='$Time_info',`remark_id`='$remarks_detail_single' WHERE`zmrd_slno`='$slno_item_single'";
			$sql_update_exe=mysqli_query($conn,$UPDATE);
           }
			
			$update_mr_list="UPDATE `lt_master_zonal_material_requsition` SET `forward_status`='1',`approver_date`='$date_info',`approver_time`='$Time_info' where `zmr_slno`='$slno_id'and`zmr_unqiue_mr_id`='$list_id'";
			$sql_update_mr_list=mysqli_query($conn,$update_mr_list);

		if(($sql_update_mr_list=="1") && ($sql_update_exe=="1")){
			$msg->success('Requsition Approved SuccessFully');
	 		header('Location:approver_dashboard.php');
			exit;
		}else{
			$lid=web_encryptIt($last_id);
			$site_list=web_encryptIt($site_code);
			$msg->error('Something went wrong Please Try again!!!');
	 		header('Location:approver_dashboard.php');
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