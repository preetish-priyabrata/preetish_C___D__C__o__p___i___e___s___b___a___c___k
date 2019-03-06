<?php
// print_r($_POST);
// exit;
session_start();
ob_start();
if($_SESSION['admin_zonal']){
require 'FlashMessages.php';
require '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
	//Array ( [hqcg_zonal_location_id] => #zonal001 [hqcg_date] => #2017-11-30 [hqcg_site_mr_id] => site_00_5 [hqcg_slno] => 2 [hqcg_challan_no] => HQ17-11-30/2 [hqcg_time] => 18:19:28 [example77_length] => 10 [zmrd_slno] => Array ( [0] => 14 ) [hqzis_slno] => Array ( [0] => 2 ) [hqzis_primary_id] => Array ( [0] => 12356 ) [hq_slno] => Array ( [0] => 1 ) [hq_qnty] => Array ( [0] => 40 ) [hqzis_issue_qnt] => Array ( [0] => 5 ) [submit] => Submit ) 
		$zqt_location_id=$hq_location=$_SESSION['zonal_place'];
		$date=date('Y-m-d');
		$time=date('H:i:s');
		$zqzis_approve_qnt=$_POST['zqzis_approve_qnt'];// approved qnty
		$zqcg_zonal_location_id=$_POST['hqcg_zonal_location_id'];// field loaction
		$zqcg_date=$_POST['zqcg_date'];// date of issue
		$zqcg_site_mr_id=$_POST['zqcg_site_mr_id']; // requrtion id
		$zqcg_slno=$_POST['zqcg_slno'];//challan serial no 
		$zqcg_challan_no=$_POST['zqcg_challan_no'];// challan no
		$zqcg_time=$_POST['zqcg_time'];// time of issue
		$fmrd_slno=$_POST['fmrd_slno'];// deatil of mr serial no
		$zqzis_slno=$_POST['zqzis_slno'];// temp serial 
		$zqzis_primary_id=$_POST['zqzis_primary_id'];// primary information
		$zonal_slno=$_POST['zonal_slno'];// hq_stock Serial
		$zonal_qnty=$_POST['zonal_qnty'];// avalable qnty
		$zqzis_issue_qnt=$_POST['zqzis_issue_qnt'];//issue qnty

		for ($i=0; $i <count($zqzis_slno) ; $i++) {
			$hqzis_slno_single=$zqzis_slno[$i];
			$hq_slno_single=$zonal_slno[$i];
			$zqt_opening_balance=$hq_qnty_single=$zonal_qnty[$i];
			$hqzis_issue_qnt_single=$zqzis_issue_qnt[$i];
			$hqzis_approve_qnt_single=$zqzis_approve_qnt[$i];
			$zmrd_slno_single=$fmrd_slno[$i];


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
			$update="UPDATE `lt_master_zonal_issue_field_info_temp` SET `zqzis_hq_present_stock`='$hq_qnty_single',`zqzis_issue_qnt`='$hqzis_issue_qnt_single',`zqzis_after_issued_stock`='$remain',`zqzis_item_slno_id`='$hq_slno_single',`zqzis_issued_status`='1' WHERE`zqzis_slno`='$hqzis_slno_single'";
			$sql_update=mysqli_query($conn,$update);
#################################################################################################################
			$update_stock="UPDATE `lt_master_zonal_stock_info` SET `zonal_qnty`='$remain' WHERE`zonal_slno`='$hq_slno_single'";
			$sql_update_stock=mysqli_query($conn,$update_stock);
##################################################################################################################
			$get_details="SELECT * FROM `lt_master_zonal_stock_info` WHERE `zonal_slno`='$hq_slno_single'";
			$sql_get_details=mysqli_query($conn,$get_details);
			$fetch_details=mysqli_fetch_assoc($sql_get_details);

			$zqt_primary_code=$fetch_details['zonal_primary_code'];
			$zqt_secondary_code=$fetch_details['zonal_secondary_code'];
			$zqt_component_name=$fetch_details['zonal_component_name'];
			$zqt_component_id=$fetch_details['zonal_component_id'];
			$zqt_category_name=$fetch_details['zonal_category_name'];
			$zqt_category_id=$fetch_details['zonal_category_id'];
			$zqt_qnty=$fetch_details['zonal_qnty'];
			$zqt_closing_balance=$remain;
			$zqt_unit=$fetch_details['zonal_unit'];
			$zqt_transfer_location=$zqcg_zonal_location_id;
##################################################################################################################
			$insert_issue_transfer="INSERT INTO `lt_master_zonal_stock_transfer_info`(`zqt_slno`, `zqt_primary_code`, `zqt_secondary_code`, `zqt_component_name`, `zqt_component_id`, `zqt_category_name`, `zqt_category_id`, `zqt_qnty`, `zqt_unit`, `zqt_date`, `zqt_time`, `zqt_location_id`, `zqt_transfer_location`, `zqt_transfer_type`, `zqt_opening_balance`, `zqt_closing_balance`) VALUES (Null, '$zqt_primary_code', '$zqt_secondary_code', '$zqt_component_name', '$zqt_component_id', '$zqt_category_name', '$zqt_category_id', '$zqt_qnty', '$zqt_unit', '$date', '$time', '$zqt_location_id', '$zqt_transfer_location', 2, '$zqt_opening_balance', '$zqt_closing_balance')";
			$sql_insert_issue_transfer=mysqli_query($conn,$insert_issue_transfer);
			echo mysqli_error($conn);
##################################################################################################################

			$get_info_copy="INSERT INTO `lt_master_zonal_issue_field_info`(`temp_slno`, `fmrd_slno`, `zqzis_challan_id`, `zqzis_zonal_mr_id`, `zqzis_primary_id`, `zqzis_secondary_id`, `zqzis_machine_id`, `zqzis_item_name`, `zqzis_item_slno_id`, `zqzis_item_category_name`, `zqzis_item_category_id`, `zqzis_request_qnt`, `zqzis_approve_qnt`, `zqzis_hq_present_stock`, `zqzis_issue_qnt`, `zqzis_after_issued_stock`, `zqzis_unit`, `zqzis_date`, `zqzis_time`, `zqzis_issued_status`, `zqzis_zonal_location_id`, `zqzis_hq_location`) SELECT * FROM `lt_master_zonal_issue_field_info_temp` WHERE `lt_master_zonal_issue_field_info_temp`.`zqzis_slno`= '$hqzis_slno_single'";
			$sql_get_info_copy=mysqli_query($conn,$get_info_copy);
##############################################################################################################
			$status_update="UPDATE `lt_master_field_material_requsition_details` SET `fmrd_issue_status`='1',`fmrd_issue_time`='$time',`fmrd_issue_date`='$date',`fmrd_issue_qnt`='$hqzis_issue_qnt_single' WHERE `fmrd_slno`='$zmrd_slno_single'";
			$sql_status_update=mysqli_query($conn,$status_update);
##############################################################################################################

		}

		$update_challan_Ready="UPDATE `lt_master_zonal_challan_generate` SET  `zqcg_status`='1' where `zqcg_slno`='$zqcg_slno'";
		$sql_update_challan_Ready=mysqli_query($conn,$update_challan_Ready);

##############################################################################################################
		$check_challan="SELECT * FROM `lt_master_zonal_challan_generate` WHERE `zqcg_slno`='$zqcg_slno'";
		$sql_check_challan=mysqli_query($conn,$check_challan);
		$fetch_sql_check_challan=mysqli_fetch_assoc($sql_check_challan);
		$zqcg_site_mr_id=$fetch_sql_check_challan['zqcg_site_mr_id'];
#############################################################################################################
		$challan_detail="SELECT * FROM `lt_master_field_material_requsition` WHERE `fmr_unqiue_mr_id`='$zqcg_site_mr_id'";
		$sql_challan_detail=mysqli_query($conn,$challan_detail);
		$fetch_sql_challan_detail=mysqli_fetch_assoc($sql_challan_detail);

		$no_items_f=$fetch_sql_challan_detail['no_items_f'];
		$no_item_issued_f=$fetch_sql_challan_detail['no_item_issued_f'];
		$no_item_transfered_f=$fetch_sql_challan_detail['no_item_transfered_f'];
		$total_no_item_issued=$fetch_sql_challan_detail['total_no_item_issued'];
		$item=count($hqzis_primary_id);
		$update_no_item_issued_f=$no_item_issued_f+$item;

		$new_total_no_item_issued=$no_item_transfered_f+$update_no_item_issued_f;
##############################################################################################################
		if($new_total_no_item_issued==$no_items_f){
			$get_update="UPDATE `lt_master_field_material_requsition` SET `status`='2',`no_item_issued_f`='$update_no_item_issued_f',`total_no_item_issued`='$new_total_no_item_issued',`issuer_date`='$date',`issuer_time`='$time' where `fmr_unqiue_mr_id`='$zqcg_site_mr_id'";
		}else{
			$get_update="UPDATE `lt_master_field_material_requsition` SET `no_item_issued_f`='$update_no_item_issued_f',`total_no_item_issued`='$new_total_no_item_issued',`issuer_date`='$date',`issuer_time`='$time' where `fmr_unqiue_mr_id`='$zqcg_site_mr_id'";
		}
##################################################################################################################
#
		$get_update_sql=mysqli_query($conn,$get_update);
// exit;
		$lid=web_encryptIt($zqcg_slno);
		$site_list=web_encryptIt($zqcg_challan_no);
			$msg->success('SuccessFully challan Issue to Zonal ');
			header('Location:zonal_received_challan_prints.php?token_name='.$lid.'&Token_id='.$site_list.'&access='. web_encryptIt('3'));
			exit;
}else{
	header('Location:logout.php');
	exit;
}