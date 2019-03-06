<?php 
print_r($_POST);
exit;
session_start();
if($_SESSION['admin_field']){
	require 'FlashMessages.php';
	include '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();
	// Array ( [zqcg_hq_location_id] => zonal001 [zqcg_date] => 2018-03-06 [date_receive] => 2018-03-07 [zqcg_site_mr_id] => field001_field_00_1 [zqcg_slno] => 1 [zqcg_challan_no] => 18-03-06/1 [zqcg_time] => 18:34:14 [time_receive] => 17:31:10 [machine_no] => 89400 [fmrd_slno] => Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 ) [zqzis_slno] => Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 ) [zqzis_primary_id] => Array ( [0] => 644545 [1] => 9897 [2] => 87673 [3] => 73658743 ) [zqzis_secondary_id] => Array ( [0] => 867546 [1] => 6564 [2] => 65454 [3] => 56476875 ) [fmrd_name_item] => Array ( [0] => Device [1] => system [2] => mobile [3] => laptop ) [maintenance_id] => Array ( [0] => scheduled [1] => immediate [2] => predictive [3] => immediate ) [fmrd_request_qnt] => Array ( [0] => 677 [1] => 4567 [2] => 344 [3] => 546 ) [zqzis_issue_qnt] => Array ( [0] => 45 [1] => 55 [2] => 65 [3] => 75 ) [price_rate] => Array ( [0] => 43 [1] => 445 [2] => 432 [3] => 33 ) [price_total] => Array ( [0] => 1935 [1] => 24475 [2] => 28080 [3] => 2475 ) [received] => Array ( [0] => 42 [1] => 55 [2] => 60 [3] => 70 ) [Damage] => Array ( [0] => 0 [1] => 0 [2] => 5 [3] => 2 ) [transit] => Array ( [0] => 3 [1] => 0 [2] => 0 [3] => 3 ) [remark] => Array ( [0] => ok [1] => ok [2] => ok [3] => ok ) [total] => 4 [submit] => Submit ) 
 
$user_id=$_SESSION['admin_field'];
$zonal_location_id=$zonal_place=$_SESSION['field_place'];
$hqcg_hq_location_id=$_POST['zqcg_hq_location_id'];// head quater loaction
$hqcg_date=$_POST['zqcg_date'];// date of hq send
$date_receive=$_POST['date_receive'];// date of receive
$hqcg_site_mr_id=$_POST['zqcg_site_mr_id'];// mr from zonal
$hqcg_slno=$_POST['zqcg_slno'];// challan generate slno
$hqcg_challan_no=$_POST['zqcg_challan_no'];// challan  no
$hqcg_time=$_POST['zqcg_time'];// challan generate time
$time_receive=$_POST['time_receive'];// challan receive time
$zmrd_slno=$_POST['fmrd_slno']; //requation serila no for doing changes
$hqzis_slno=$_POST['zqzis_slno']; // issue info table for update
$hqzis_primary_id=$_POST['zqzis_primary_id']; // primary serial no
$hqzis_secondary_id=$_POST['zqzis_secondary_id'];// secondary no
$zmrd_name_item=$_POST['fmrd_name_item'];// item name 
$zmrd_machine_no=$_POST['maintenance_id'];// machine no 
$zmrd_request_qnt=$_POST['fmrd_request_qnt'];// quantity is requested for
$hqzis_issue_qnt=$_POST['zqzis_issue_qnt'];// issued quantity
$received=$_POST['received'];// receive 
$Damage=$_POST['Damage'];// damage from stock
$remark=$_POST['remark'];// remark
$price_rate=$_POST['price_rate'];
$price_total=$_POST['price_total'];
$transit=$_POST['transit'];
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
	$check_information="SELECT * FROM `lt_master_field_stock_info` WHERE `field_primary_code`='$hqzis_primary_id_single'";
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
		$insert_zonal="INSERT INTO `lt_master_field_stock_info`(`field_slno`, `field_primary_code`, `field_secondary_code`, `field_component_name`, `field_component_id`, `field_category_name`, `field_category_id`, `field_unit`, `field_qnty`, `damage_loss`, `damage_loss_status`, `field_date`, `field_time`, `field_location_id`) VALUES (Null,'$zonal_primary_code', '$zonal_secondary_code', '$zonal_component_name', '$zonal_component_id', '$zonal_category_name', '$zonal_category_id', '$zonal_unit', '$zonal_qnty', '$damage_loss', '$damage_loss_status', '$zonal_date', '$zonal_time', '$zonal_location_id')";
		$sql_insert_zonal=mysqli_query($conn,$insert_zonal);
##################################################################################################################
		$get_zonal_stock_log="INSERT INTO `lt_master_field_stock_transfer_info`(`fqt_slno`, `fqt_primary_code`, `fqt_secondary_code`, `fqt_component_name`, `fqt_component_id`, `fqt_category_name`, `fqt_category_id`, `fqt_unit`, `fqt_qnty`, `damage_loss`, `damage_loss_status`, `fqt_date`, `fqt_time`, `fqt_location_id`, `fqt_transfer_location`, `fqt_transfer_type`, `fqt_remark`, `fqt_opening_balance`, `fqt_closing_balance`) VALUES (Null,'$zonal_primary_code', '$zonal_secondary_code', '$zonal_component_name', '$zonal_component_id', '$zonal_category_name', '$zonal_category_id', '$zonal_unit', '$received_single', '$damage_loss', '$damage_loss_status', '$zonal_date', '$zonal_time', '$zonal_location_id','$hqcg_hq_location_id',1,'$remark_single','$opening','$zonal_qnty')";
		$sql_get_zonal_stock_log=mysqli_query($conn,$get_zonal_stock_log);
###################################################################################################################
		$update_reqution="UPDATE `lt_master_field_material_requsition_details` SET `receive_qnty`='$received_single', `receive_qnty_status`='1', `damage_loss`='$Damage_single', `tranisit_loss`='$total_transtion_loss', `tranist_status`='$tranist_status', `damage_loss_status`='$damage_loss_status' WHERE`fmrd_slno`='$zmrd_slno_single'";
		$sql_update_reqution=mysqli_query($conn,$update_reqution);
##################################################################################################################
		$update_challan_information_detail="UPDATE `lt_master_zonal_issue_field_info` SET `zqzis_receive_status`='1', `zqzis_transit_loss`='$total_transtion_loss', `zqzis_date_receive`='$date', `zqzis_time_receive`='$time', `zqzis_received_qnty`='$received_single', `damage_loss`='$Damage_single' ,`receive_qnty`='$stock_receive' where `zqzis_slno`='$hqzis_slno_single'";
		$sql_update_challan_information_detail=mysqli_query($conn,$update_challan_information_detail);
##################################################################################################################
	}else{
##################################################################################################################
		$fetch_sql_check_information=mysqli_fetch_assoc($sql_check_information);
		$zonal_qnty_data=$fetch_sql_check_information['field_qnty'];
		$damage_loss_data=$fetch_sql_check_information['damage_loss'];
		$damage_loss_status_data=$fetch_sql_check_information['damage_loss_status'];
		$zonal_slno=$fetch_sql_check_information['field_slno'];
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
		$get_zonal_stock_log="INSERT INTO `lt_master_field_stock_transfer_info`(`fqt_slno`, `fqt_primary_code`, `fqt_secondary_code`, `fqt_component_name`, `fqt_component_id`, `fqt_category_name`, `fqt_category_id`, `fqt_unit`, `fqt_qnty`, `damage_loss`, `damage_loss_status`, `fqt_date`, `fqt_time`, `fqt_location_id`, `fqt_transfer_location`, `fqt_transfer_type`, `fqt_remark`, `fqt_opening_balance`, `fqt_closing_balance`) VALUES (Null,'$zonal_primary_code', '$zonal_secondary_code', '$zonal_component_name', '$zonal_component_id', '$zonal_category_name', '$zonal_category_id', '$zonal_unit', '$received_single', '$damage_loss', '$damage_loss_status', '$zonal_date', '$zonal_time', '$zonal_location_id','$hqcg_hq_location_id',1,'$remark_single','$zonal_qnty_data','$zonal_qnty')";
		$sql_get_zonal_stock_log=mysqli_query($conn,$get_zonal_stock_log);
##################################################################################################################
		 $updae_queantity="UPDATE `lt_master_field_stock_info` SET `field_qnty`='$zonal_qnty',`damage_loss`='$new_damage_loss_data',`damage_loss_status`='$new_damage_loss_status',`field_date`='$date',`field_time`='$time' WHERE`field_slno`='$zonal_slno'";
		$sql_updae_queantity=mysqli_query($conn,$updae_queantity);
		// echo mysqli_error($conn);
###################################################################################################################
		$update_reqution="UPDATE `lt_master_field_material_requsition_details` SET `receive_qnty`='$received_single', `receive_qnty_status`='1', `damage_loss`='$Damage_single', `tranisit_loss`='$total_transtion_loss', `tranist_status`='$tranist_status', `damage_loss_status`='$damage_loss_status' WHERE`fmrd_slno`='$zmrd_slno_single'";
		$sql_update_reqution=mysqli_query($conn,$update_reqution);
###################################################################################################################
		$update_challan_information_detail="UPDATE `lt_master_zonal_issue_field_info` SET `zqzis_receive_status`='1', `zqzis_transit_loss`='$total_transtion_loss', `zqzis_date_receive`='$date', `zqzis_time_receive`='$time', `zqzis_received_qnty`='$received_single', `damage_loss`='$Damage_single',`receive_qnty`='$stock_receive' where `zqzis_slno`='$hqzis_slno_single'";
		$sql_update_challan_information_detail=mysqli_query($conn,$update_challan_information_detail);
###################################################################################################################
	}	
##################################################################################################################
}
##################################################################################################################
	$update_challan="UPDATE `lt_master_zonal_challan_generate` SET `zqcg_receiver_id`='$user_id', `zqcg_receive_date`='$date', `zqcg_receive_time`='$time', `zqcg_receive_status`='1' WHERE`zqcg_slno`='$hqcg_slno'";
	$sql_update_challan=mysqli_query($conn,$update_challan);

##################################################################################################################

	$msg->success('Success-Fully Receive Of Challan And Update Of Stock Of Field');
	 		header('Location:index.php');
			exit;
}else{
	header('Location:logout.php');
	exit;
}