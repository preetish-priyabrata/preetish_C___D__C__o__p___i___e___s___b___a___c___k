<?php
// print_r($_POST);
// exit;
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if($_SESSION['admin_hq']){
	require 'FlashMessages.php';
	include '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();
	
	//Array ( [hqcg_zonal_location_id] => #zonal001 [hqcg_date] => #2017-11-30 [hqcg_site_mr_id] => site_00_5 [hqcg_slno] => 2 [hqcg_challan_no] => HQ17-11-30/2 [hqcg_time] => 18:19:28 [example77_length] => 10 [zmrd_slno] => Array ( [0] => 14 ) [hqzis_slno] => Array ( [0] => 2 ) [hqzis_primary_id] => Array ( [0] => 12356 ) [hq_slno] => Array ( [0] => 1 ) [hq_qnty] => Array ( [0] => 40 ) [hqzis_issue_qnt] => Array ( [0] => 5 ) [submit] => Submit ) 
		$hqt_location_id=$hq_location=$_SESSION['hq_store_id'];
		$date=date('Y-m-d');
		$time=date('H:i:s');
		$hqzis_approve_qnt=$_POST['hqzis_approve_qnt'];// approved qnty
		$hqcg_zonal_location_id=$_POST['hqcg_zonal_location_id'];// zonal loaction
		$hqcg_date=$_POST['hqcg_date'];// date of issue
		$hqcg_site_mr_id=$_POST['hqcg_site_mr_id']; // requrtion id
		$hqcg_slno=$_POST['hqcg_slno'];//challan serial no 
		$hqcg_challan_no=$_POST['hqcg_challan_no'];// challan no
		$hqcg_time=$_POST['hqcg_time'];// time of issue
		$zmrd_slno=$_POST['zmrd_slno'];// deatil of mr serial no
		$hqzis_slno=$_POST['hqzis_slno'];// temp serial 
		$hqzis_primary_id=$_POST['hqzis_primary_id'];// primary information
		$hq_slno=$_POST['hq_slno'];// hq_stock Serial
		$hq_qnty=$_POST['hq_qnty'];// avalable qnty
		$hqzis_issue_qnt=$_POST['hqzis_issue_qnt'];//issue qnty

		for ($i=0; $i <count($hqzis_slno) ; $i++) {
			$hqzis_slno_single=$hqzis_slno[$i];
			$hq_slno_single=$hq_slno[$i];
			$hqt_opening_balance=$hq_qnty_single=$hq_qnty[$i];
			$hqzis_issue_qnt_single=$hqzis_issue_qnt[$i];
			$hqzis_approve_qnt_single=$hqzis_approve_qnt[$i];
			$zmrd_slno_single=$zmrd_slno[$i];


			if($hq_qnty_single == 0){
				$remain=0;
				$hqzis_issue_qnt_single=0;
			}else{
				if($hqzis_issue_qnt_single < $hq_qnty_single){
					$remain1=$hq_qnty_single-$hqzis_issue_qnt_single;

				}else if($hqzis_issue_qnt_single == $hq_qnty_single){
					$remain1=$hq_qnty_single-$hqzis_issue_qnt_single;
				}else if($hqzis_issue_qnt_single > $hq_qnty_single){
					$remain1=$hq_qnty_single-$hqzis_issue_qnt_single;

				}

				if($remain1<0){
					$remain=$hqzis_issue_qnt_single-$hq_qnty_single;
					$hqzis_issue_qnt_single=$hqzis_issue_qnt_single-$remain;
				}else{
					$remain=$hq_qnty_single-$hqzis_issue_qnt_single;
				}
			}

			
#################################################################################################################
			$update="UPDATE `lt_master_hq_issue_zonal_info_temp` SET `hqzis_hq_present_stock`='$hq_qnty_single',`hqzis_issue_qnt`='$hqzis_issue_qnt_single',`hqzis_after_issued_stock`='$remain',`hqzis_item_slno_id`='$hq_slno_single',`hqzis_issued_status`='1' WHERE`hqzis_slno`='$hqzis_slno_single'";
			$sql_update=mysqli_query($conn,$update);
#################################################################################################################
			$update_stock="UPDATE `lt_master_hq_stock_info` SET `hq_qnty`='$remain' WHERE`hq_slno`='$hq_slno_single'";
			$sql_update_stock=mysqli_query($conn,$update_stock);
##################################################################################################################
			$get_details="SELECT * FROM `lt_master_hq_stock_info` WHERE `hq_slno`='$hq_slno_single'";
			$sql_get_details=mysqli_query($conn,$get_details);
			$fetch_details=mysqli_fetch_assoc($sql_get_details);

			$hqt_primary_code=$fetch_details['hq_primary_code'];
			$hqt_secondary_code=$fetch_details['hq_secondary_code'];
			$hqt_component_name=$fetch_details['hq_component_name'];
			$hqt_component_id=$fetch_details['hq_component_id'];
			$hqt_category_name=$fetch_details['hq_category_name'];
			$hqt_category_id=$fetch_details['hq_category_id'];
			$hqt_unit=$fetch_details['hq_unit'];
			$hqt_closing_balance=$fetch_details['hq_qnty'];
			$hqt_qnty=$hqzis_issue_qnt_single;
			$hqt_transfer_location=$hqcg_zonal_location_id;
##################################################################################################################
			$insert_issue_transfer="INSERT INTO `lt_master_hq_stock_transfer_info`(`hqt_slno`, `hqt_primary_code`, `hqt_secondary_code`, `hqt_component_name`, `hqt_component_id`, `hqt_category_name`, `hqt_category_id`, `hqt_unit`, `hqt_qnty`, `hqt_date`, `hqt_time`, `hqt_location_id`, `hqt_transfer_location`, `hqt_transfer_type`, `hqt_opening_balance`, `hqt_closing_balance`) VALUES (Null, '$hqt_primary_code', '$hqt_secondary_code', '$hqt_component_name', '$hqt_component_id', '$hqt_category_name', '$hqt_category_id', '$hqt_unit', '$hqt_qnty', '$date', '$time', '$hqt_location_id', '$hqt_transfer_location', '2', '$hqt_opening_balance', '$hqt_closing_balance')";
			$sql_insert_issue_transfer=mysqli_query($conn,$insert_issue_transfer);
##################################################################################################################

			$get_info_copy="INSERT INTO `lt_master_hq_issue_zonal_info`(`temp_slno`, `zmrd_slno`, `hqzis_challan_id`, `hqzis_zonal_mr_id`, `hqzis_primary_id`, `hqzis_secondary_id`, `hqzis_machine_id`, `hqzis_item_name`, `hqzis_item_slno_id`, `hqzis_item_category_name`, `hqzis_item_category_id`, `hqzis_request_qnt`, `hqzis_approve_qnt`, `hqzis_hq_present_stock`, `hqzis_issue_qnt`, `hqzis_after_issued_stock`, `hqzis_unit`, `hqzis_date`, `hqzis_time`, `hqzis_issued_status`, `hqzis_zonal_location_id`, `hqzis_hq_location`) SELECT * FROM `lt_master_hq_issue_zonal_info_temp` WHERE `lt_master_hq_issue_zonal_info_temp`.`hqzis_slno`= '$hqzis_slno_single'";
			$sql_get_info_copy=mysqli_query($conn,$get_info_copy);
##############################################################################################################
			$status_update="UPDATE `lt_master_zonal_material_requsition_details` SET `zmrd_issue_status`='1',`zmrd_issue_time`='$time',`zmrd_issue_date`='$date',`zmrd_issue_qnt`='$hqzis_issue_qnt_single' WHERE `zmrd_slno`='$zmrd_slno_single'";
			$sql_status_update=mysqli_query($conn,$status_update);
##############################################################################################################

		}

		$update_challan_Ready="UPDATE `lt_master_hq_challan_generate` SET  `hqcg_status`='1' where `hqcg_slno`='$hqcg_slno'";
		$sql_update_challan_Ready=mysqli_query($conn,$update_challan_Ready);

##############################################################################################################
		$check_challan="SELECT * FROM `lt_master_hq_challan_generate` WHERE `hqcg_slno`='$hqcg_slno'";
		$sql_check_challan=mysqli_query($conn,$check_challan);
		$fetch_sql_check_challan=mysqli_fetch_assoc($sql_check_challan);
		$hqcg_site_mr_id=$fetch_sql_check_challan['hqcg_site_mr_id'];
#############################################################################################################
		$challan_detail="SELECT * FROM `lt_master_zonal_material_requsition` WHERE `zmr_unqiue_mr_id`='$hqcg_site_mr_id'";
		$sql_challan_detail=mysqli_query($conn,$challan_detail);
		$fetch_sql_challan_detail=mysqli_fetch_assoc($sql_challan_detail);

		$no_items_z=$fetch_sql_challan_detail['no_items_z'];
		$no_item_issued_z=$fetch_sql_challan_detail['no_item_issued_z'];
		$no_item_transfered_z=$fetch_sql_challan_detail['no_item_transfered_z'];
		$total_no_item_issued=$fetch_sql_challan_detail['total_no_item_issued'];
		$item=count($hqzis_primary_id);
		$update_no_item_issued_z=$no_item_issued_z+$item;

		$new_total_no_item_issued=$update_no_item_issued_z;
##############################################################################################################
		if($new_total_no_item_issued==$no_items_z){
			$get_update="UPDATE `lt_master_zonal_material_requsition` SET `status`='2',`no_item_issued_z`='$update_no_item_issued_z',`total_no_item_issued`='$new_total_no_item_issued',`issuer_date`='$date',`issuer_time`='$time' where `zmr_unqiue_mr_id`='$hqcg_site_mr_id'";
		}else{
			$get_update="UPDATE `lt_master_zonal_material_requsition` SET `no_item_issued_z`='$update_no_item_issued_z',`total_no_item_issued`='$new_total_no_item_issued',`issuer_date`='$date',`issuer_time`='$time' where `zmr_unqiue_mr_id`='$hqcg_site_mr_id'";
		}
##################################################################################################################
		$lid=web_encryptIt($hqcg_slno);
		$site_list=web_encryptIt($hqcg_challan_no);
		$get_update_sql=mysqli_query($conn,$get_update);

			$msg->success('SuccessFully challan Issue to Zonal ');
			header('Location:hq_received_challan_prints.php?token_name='.$lid.'&Token_id='.$site_list.'&access='.web_encryptIt('3'));
			exit;
}else{
	header('Location:logout.php');
	exit;
}