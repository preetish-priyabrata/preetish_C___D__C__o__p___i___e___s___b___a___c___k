<?php 
print_r($_POST);
exit;
session_start();
if($_SESSION['admin_zonal']){
	require 'FlashMessages.php';
	include '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();// 
	//Array ( [hqcg_hq_location_id] => [hqcg_date] => #2018-02-28 [hqcg_site_mr_id] => site_00_1 [hqcg_slno] => 1 [hqcg_challan_no] => HQ18-02-28/1 [hqcg_time] => 17:07:35 [dc_no] => 12345 [date_enter] => 03/01/2018 [Indent_no] => 45565 [Vehicle_no] => od-05-7695 [LR_no] => 235 [LR_date] => 03/01/2018 [Project_No] => 05 [zmrd_slno] => Array ( [0] => 3 ) [hqzis_slno] => Array ( [0] => 1 ) [hqzis_primary_id] => Array ( [0] => 73658743 ) [hqzis_secondary_id] => Array ( [0] => 56476875 ) [hqzis_item_name] => Array ( [0] => laptop ) [hqzis_request_qnt] => Array ( [0] => 1000 ) [hqzis_issue_qnt] => Array ( [0] => 35 ) [price_rate] => Array ( [0] => 43.5 ) [price_total] => Array ( [0] => 1522.5 ) [receive] => 30 [damage] => 2 [transit] => 3 [total] => 1 [submit] => Submit ) 
// $
$user_id=$_SESSION['admin_zonal'];
$zonal_location_id=$zonal_place=$_SESSION['zonal_place'];
$hqcg_hq_location_id=$_POST['hqcg_hq_location_id'];// head quater loaction
$hqcg_date=$_POST['hqcg_date'];// date of hq send
$date_receive=$_POST['date_receive'];// date of receive
$hqcg_site_mr_id=$_POST['hqcg_site_mr_id'];// mr from zonal
$hqcg_slno=$_POST['hqcg_slno'];// challan generate slno
$hqcg_challan_no=$_POST['hqcg_challan_no'];// challan  no
$hqcg_time=$_POST['hqcg_time'];// challan generate time
$time_receive=$_POST['time_receive'];// challan receive time
$zmrd_slno=$_POST['zmrd_slno']; //requation serila no for doing changes
$hqzis_slno=$_POST['hqzis_slno']; // issue info table for update
$hqzis_primary_id=$_POST['hqzis_primary_id']; // primary serial no
$hqzis_secondary_id=$_POST['hqzis_secondary_id'];// secondary no
$zmrd_name_item=$_POST['zmrd_name_item'];// item name 
$zmrd_machine_no=$_POST['zmrd_machine_no'];// machine no 
$zmrd_request_qnt=$_POST['zmrd_request_qnt'];// quantity is requested for
$hqzis_issue_qnt=$_POST['hqzis_issue_qnt'];// issued quantity
$received=$_POST['received'];// receive 
$Damage=$_POST['Damage'];// damage from stock
$remark=$_POST['remark'];// remark
$zonal_date=$date=date('Y-m-d');
$zonal_time=$time=date('H:i:s');

for ($i=0; $i < count($hqzis_issue_qnt); $i++) { 
	$hqzis_issue_qnt_single=$hqzis_issue_qnt[$i];
	$received_single=$received[$i];
	$Damage_single=$Damage[$i];
	$zmrd_slno_single=$zmrd_slno[$i];
	$hqzis_slno_single=$hqzis_slno[$i];
	if($Damage_single==0){
		$damage_loss_status=0;
	}else{
		$damage_loss_status=1;
	}
	$remark_single=$remark[$i];
	$new_received_single=$hqzis_issue_qnt_single-$received_single;
	if($new_received_single==0){
		$total_receive=$received_single;
		$total_transtion_loss=0;
		$stock_receive=$total_receive-$Damage_single;
		// $damage_loss_status=0;
		$damage_loss=$Damage_single;
		$tranist_status=0;
	}else{
		$total_receive=$received_single;
		$total_transtion_loss=$new_received_single;
		$stock_receive=$total_receive-$Damage_single;
		// $damage_loss_status=1;
		$damage_loss=$Damage_single;
		$tranist_status=1;
	}
	$hqzis_primary_id_single=$hqzis_primary_id[$i];
	$hqzis_secondary_id_single=$hqzis_secondary_id[$i];
##################################################################################################################
	$check_information="SELECT * FROM `lt_master_zonal_stock_info` WHERE `zonal_primary_code`='$hqzis_primary_id_single'";
	$sql_check_information=mysqli_query($conn,$check_information);
	$num_check_information=mysqli_num_rows($sql_check_information);
###################################################################################################################
	if($num_check_information==0){
###################################################################################################################
		$opening=0;
###################################################################################################################
		$get_information="SELECT * FROM `lt_master_item_detail` WHERE `item_primary_code`='$hqzis_primary_id_single'";
		$sql_get_information=mysqli_query($conn,$get_information);
		$fetch_get_information=mysqli_fetch_assoc($sql_get_information);

		$zonal_component_id=$fetch_get_information['slno'];
		$zonal_component_name=$fetch_get_information['item_name'];
		$zonal_unit=$fetch_get_information['it_de_unit_m'];
		$zonal_primary_code=$fetch_get_information['item_primary_code'];
		$zonal_secondary_code=$fetch_get_information['item_second_code'];
		$zonal_category_id=$fetch_get_information['item_category_id'];
###################################################################################################################
		$category="SELECT * FROM `lt_master_item_category` WHERE `slno`='$zonal_category_id'";
		$sql_category=mysqli_query($conn,$category);
		$fetch_category=mysqli_fetch_assoc($sql_category);
		$zonal_category_name=$fetch_category['category_name'];
		$zonal_qnty=$stock_receive;
###################################################################################################################
		$insert_zonal="INSERT INTO `lt_master_zonal_stock_info`(`zonal_slno`, `zonal_primary_code`, `zonal_secondary_code`, `zonal_component_name`, `zonal_component_id`, `zonal_category_name`, `zonal_category_id`, `zonal_unit`, `zonal_qnty`, `damage_loss`, `damage_loss_status`, `zonal_date`, `zonal_time`, `zonal_location_id`) VALUES (Null,'$zonal_primary_code', '$zonal_secondary_code', '$zonal_component_name', '$zonal_component_id', '$zonal_category_name', '$zonal_category_id', '$zonal_unit', '$zonal_qnty', '$damage_loss', '$damage_loss_status', '$zonal_date', '$zonal_time', '$zonal_location_id')";
		$sql_insert_zonal=mysqli_query($conn,$insert_zonal);
##################################################################################################################
		$get_zonal_stock_log="INSERT INTO `lt_master_zonal_stock_transfer_info`(`zqt_slno`, `zqt_primary_code`, `zqt_secondary_code`, `zqt_component_name`, `zqt_component_id`, `zqt_category_name`, `zqt_category_id`, `zqt_unit`, `zqt_qnty` ,`damage_loss`, `damage_loss_status`, `zqt_date`, `zqt_time`, `zqt_location_id`, `zqt_transfer_location`, `zqt_transfer_type`, `zqt_remark`, `zqt_opening_balance`, `zqt_closing_balance`) VALUES (Null,'$zonal_primary_code', '$zonal_secondary_code', '$zonal_component_name', '$zonal_component_id', '$zonal_category_name', '$zonal_category_id', '$zonal_unit', '$received_single', '$damage_loss', '$damage_loss_status', '$zonal_date', '$zonal_time', '$zonal_location_id','$hqcg_hq_location_id',1,'$remark_single','$opening','$zonal_qnty')";
		$sql_get_zonal_stock_log=mysqli_query($conn,$get_zonal_stock_log);
###################################################################################################################
		$update_reqution="UPDATE `lt_master_zonal_material_requsition_details` SET `receive_qnty`='$received_single', `receive_qnty_status`='1', `damage_loss`='$Damage_single', `tranisit_loss`='$total_transtion_loss', `tranist_status`='$tranist_status', `damage_loss_status`='$damage_loss_status' WHERE`zmrd_slno`='$zmrd_slno_single'";
		$sql_update_reqution=mysqli_query($conn,$update_reqution);
##################################################################################################################
		$update_challan_information_detail="UPDATE `lt_master_hq_issue_zonal_info` SET `hqzis_receive_status`='1', `hqzis_transit_loss`='$total_transtion_loss', `hqzis_date_receive`='$date', `hqzis_time_receive`='$time', `hqzis_received_qnty`='$received_single', `damage_loss`='$Damage_single' ,`receive_qnty`='$stock_receive' where `hqzis_slno`='$hqzis_slno_single'";
		$sql_update_challan_information_detail=mysqli_query($conn,$update_challan_information_detail);
##################################################################################################################
	}else{
##################################################################################################################
		$fetch_sql_check_information=mysqli_fetch_assoc($sql_check_information);
		$zonal_qnty_data=$fetch_sql_check_information['zonal_qnty'];
		$damage_loss_data=$fetch_sql_check_information['damage_loss'];
		$damage_loss_status_data=$fetch_sql_check_information['damage_loss_status'];
		$zonal_slno=$fetch_sql_check_information['zonal_slno'];
	##############################################################################################################
		if($damage_loss_status_data==1){
			$new_damage_loss_data=$damage_loss_data+$damage_loss;
			$new_damage_loss_status=1;
		}else{
			if($damage_loss_status==1){
				$new_damage_loss_status=$damage_loss_status;
				$new_damage_loss_data=$damage_loss;
			}else{
				$new_damage_loss_status=$damage_loss_status;
				$new_damage_loss_data=$damage_loss;
			}
		}
###################################################################################################################
		$get_information="SELECT * FROM `lt_master_item_detail` WHERE `item_primary_code`='$hqzis_primary_id_single'";
		$sql_get_information=mysqli_query($conn,$get_information);
		$fetch_get_information=mysqli_fetch_assoc($sql_get_information);

		$zonal_component_id=$fetch_get_information['slno'];
		$zonal_component_name=$fetch_get_information['item_name'];
		$zonal_unit=$fetch_get_information['it_de_unit_m'];
		$zonal_primary_code=$fetch_get_information['item_primary_code'];
		$zonal_secondary_code=$fetch_get_information['item_second_code'];
		$zonal_category_id=$fetch_get_information['item_category_id'];
###################################################################################################################
		$category="SELECT * FROM `lt_master_item_category` WHERE `slno`='$zonal_category_id'";
		$sql_category=mysqli_query($conn,$category);
		$fetch_category=mysqli_fetch_assoc($sql_category);
		$zonal_category_name=$fetch_category['category_name'];
		$zonal_qnty=$zonal_qnty_data+$stock_receive;
###################################################################################################################
		$get_zonal_stock_log="INSERT INTO `lt_master_zonal_stock_transfer_info`(`zqt_slno`, `zqt_primary_code`, `zqt_secondary_code`, `zqt_component_name`, `zqt_component_id`, `zqt_category_name`, `zqt_category_id`, `zqt_unit`, `zqt_qnty` ,`damage_loss`, `damage_loss_status`, `zqt_date`, `zqt_time`, `zqt_location_id`, `zqt_transfer_location`, `zqt_transfer_type`, `zqt_remark`, `zqt_opening_balance`, `zqt_closing_balance`) VALUES (Null,'$zonal_primary_code', '$zonal_secondary_code', '$zonal_component_name', '$zonal_component_id', '$zonal_category_name', '$zonal_category_id', '$zonal_unit', '$received_single', '$damage_loss', '$damage_loss_status', '$zonal_date', '$zonal_time', '$zonal_location_id','$hqcg_hq_location_id',1,'$remark_single','$zonal_qnty_data','$zonal_qnty')";
		$sql_get_zonal_stock_log=mysqli_query($conn,$get_zonal_stock_log);
##################################################################################################################
		 $updae_queantity="UPDATE `lt_master_zonal_stock_info` SET `zonal_qnty`='$zonal_qnty',`damage_loss`='$new_damage_loss_data',`damage_loss_status`='$new_damage_loss_status',`zonal_date`='$date',`zonal_time`='$time' WHERE`zonal_slno`='$zonal_slno'";
		$sql_updae_queantity=mysqli_query($conn,$updae_queantity);
		// echo mysqli_error($conn);
###################################################################################################################
		$update_reqution="UPDATE `lt_master_zonal_material_requsition_details` SET `receive_qnty`='$received_single', `receive_qnty_status`='1', `damage_loss`='$Damage_single', `tranisit_loss`='$total_transtion_loss', `tranist_status`='$tranist_status', `damage_loss_status`='$damage_loss_status' WHERE`zmrd_slno`='$zmrd_slno_single'";
		$sql_update_reqution=mysqli_query($conn,$update_reqution);
###################################################################################################################
		$update_challan_information_detail="UPDATE `lt_master_hq_issue_zonal_info` SET `hqzis_receive_status`='1', `hqzis_transit_loss`='$total_transtion_loss', `hqzis_date_receive`='$date', `hqzis_time_receive`='$time', `hqzis_received_qnty`='$received_single', `damage_loss`='$Damage_single',`receive_qnty`='$stock_receive' where `hqzis_slno`='$hqzis_slno_single'";
		$sql_update_challan_information_detail=mysqli_query($conn,$update_challan_information_detail);
###################################################################################################################
	}	
##################################################################################################################
}
##################################################################################################################
	$update_challan="UPDATE `lt_master_hq_challan_generate` SET `hqcg_receiver_id`='$user_id', `hqcg_receive_date`='$date', `hqcg_receive_time`='$time', `hqcg_receive_status`='1' WHERE`hqcg_slno`='$hqcg_slno'";
	$sql_update_challan=mysqli_query($conn,$update_challan);

###################################################################################################################
// exit;
	$msg->success('Success-Fully Receive Of Challan And Update Of Stock Of Zonal');
	 		header('Location:index.php');
			exit;
}else{
	header('Location:logout.php');
	exit;
}