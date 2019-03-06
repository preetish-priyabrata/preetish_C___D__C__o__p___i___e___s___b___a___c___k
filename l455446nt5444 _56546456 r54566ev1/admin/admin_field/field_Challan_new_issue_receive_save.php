<?php 
// print_r($_POST);
// exit;
session_start();
if($_SESSION['admin_field']){
	require 'FlashMessages.php';
	include '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();	
	
######################################### Received Decelaration  #####################################
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
	$Vehicle_no='0';

########################################################################################################
	for ($i=0; $i < count($hqzis_issue_qnt); $i++) {  //loop start here
		$hqzis_issue_qnt_single=$hqzis_issue_qnt[$i];   // Single iteam has been issued 
		$closing_balance=$received_single=$received[$i];					// single receive 
		$damage_loss=$Damage_single=$Damage[$i];	 					// single damage 
		$zqzis_transit_loss=$transit_single=$transit[$i];					// single transit 

		$zmrd_slno_single=$zmrd_slno[$i];				// single requation serila no for doing changes
		$hqzis_slno_single=$hqzis_slno[$i];				// single issue info table for update

		$price_rate_single=$price_rate[$i];
		$price_total_single=$price_total[$i];

		$new_update_price=$received_single*$price_rate_single; // new total price of single
		$total_new=$price_rate_single*$received_single;
		if($transit_single==0){
			$tranist_status=0;
		}else{
			$tranist_status=1;
		}
		$hqzis_primary_id_single=$hqzis_primary_id[$i];
		$hqzis_secondary_id_single=$hqzis_secondary_id[$i];

		$check_information="SELECT * FROM `lt_master_field_stock_info` WHERE `field_primary_code`='$hqzis_primary_id_single' and `field_location_id`='$zonal_place'";
		$sql_check_information=mysqli_query($conn,$check_information);
		$num_check_information=mysqli_num_rows($sql_check_information);
		if($num_check_information==0){
			$opening=0;
			if($Damage_single==0){
				$damage_loss_status=0;
			}else{
				$damage_loss_status=1;
			}
			$opening=0;
			$get_information="SELECT * FROM `lt_master_item_detail` WHERE `item_primary_code`='$hqzis_primary_id_single'";
			$sql_get_information=mysqli_query($conn,$get_information);
			$fetch_get_information=mysqli_fetch_assoc($sql_get_information);

			$zonal_component_id=$fetch_get_information['slno'];
			$zonal_component_name=$fetch_get_information['item_name'];
			$zonal_unit=$fetch_get_information['it_de_unit_m'];
			$zonal_primary_code=$fetch_get_information['item_primary_code'];
			$zonal_secondary_code=$fetch_get_information['item_second_code'];
			$zonal_category_id=$fetch_get_information['item_category_id'];
			$zonal_hsn_code=$fetch_get_information['hsn_code'];
			$category="SELECT * FROM `lt_master_item_category` WHERE `category_name`='$zonal_category_id'";
			$sql_category=mysqli_query($conn,$category);
			$fetch_category=mysqli_fetch_assoc($sql_category);
			$zonal_category_name=$fetch_category['slno'];
			// $zonal_qnty=$stock_receive;
			$closing_balance=$received_single+$opening;
			
			$insert_zonal="INSERT INTO `lt_master_field_stock_info`(`field_slno`, `field_primary_code`, `field_secondary_code`, `field_component_name`, `field_component_id`, `field_category_name`, `field_category_id`, `field_unit`, `field_qnty`, `damage_loss`, `damage_loss_status`, `field_date`, `field_time`, `field_location_id`,`rate_price_unit`, `price_charge_unit`, `total_price`, `date_price`,`field_hsn_code` ) VALUES (Null,'$zonal_primary_code', '$zonal_secondary_code', '$zonal_component_name', '$zonal_component_id', '$zonal_category_id', '$zonal_category_name', '$zonal_unit', '$closing_balance', '$Damage_single', '$damage_loss_status', '$zonal_date', '$zonal_time', '$zonal_location_id','$price_rate_single','$price_rate_single','$new_update_price','$zonal_date','$zonal_hsn_code')";
			$sql_insert_zonal=mysqli_query($conn,$insert_zonal);
			

			 $get_zonal_stock_log="INSERT INTO `lt_master_field_stock_transfer_info`(`fqt_slno`, `fqt_primary_code`, `fqt_secondary_code`, `fqt_component_name`, `fqt_component_id`, `fqt_category_name`, `fqt_category_id`, `fqt_unit`, `fqt_qnty`, `damage_loss`, `damage_loss_status`, `fqt_date`, `fqt_time`, `fqt_location_id`, `fqt_transfer_location`, `fqt_transfer_type`, `fqt_remark`, `fqt_opening_balance`, `fqt_closing_balance`,`fqt_hsn_code`, `total_item_issue`, `price_issue_rate`, `total_price_item`, `total_receive_price`, `transit_loss_no`) VALUES (Null,'$zonal_primary_code', '$zonal_secondary_code', '$zonal_component_name', '$zonal_component_id', '$zonal_category_name', '$zonal_category_id', '$zonal_unit', '$received_single', '$damage_loss', '$damage_loss_status', '$zonal_date', '$zonal_time', '$zonal_location_id','$hqcg_hq_location_id',1,'$remark_single','$opening','$closing_balance','$zonal_hsn_code','$hqzis_issue_qnt_single','$price_rate_single','$price_total_single','$new_update_price','$transit_single')";
			$sql_get_zonal_stock_log=mysqli_query($conn,$get_zonal_stock_log);
			
########################       here Price Record in zonal event         ################################
			$price_record_query="INSERT INTO `lt_master_field_stock_price_item`(`slno_id`, `item_primary_code`,`item_secondary_code`, `price_rate`, `location_name`, `status`, `date`, `time`) VALUES (Null,'$zonal_primary_code','$zonal_secondary_code','$price_rate_single','$zonal_place','1','$zonal_date','$zonal_time')";
			$sql_price_record_query=mysqli_query($conn,$price_record_query);
######################## end here Price Record in zonal event #########################################

######################## here transitional lost is record for furture event ##########################
			$insert_transit="INSERT INTO `lt_master_field_zonal_issued_transit_received_info`(`slno`, `challan_id`, `item_primary`, `item_secondary`, `item_hsn`, `item_name`, `item_category`, `item_unit`, `item_quantity`, `item_rate`, `date`, `time`, `status`, `vehicle_no`) VALUES (Null,'$hqcg_challan_no','$zonal_primary_code','$zonal_secondary_code','$zonal_hsn_code','$zonal_component_name','$zonal_category_id','$zonal_unit','$transit_single','$price_rate_single', '$zonal_date', '$zonal_time','$tranist_status','$Vehicle_no' )";
			$sql_insert_transit=mysqli_query($conn,$insert_transit);
####################  End here transitional lost is record for furture event ##########################


		}else{
			$fetch_sql_check_information=mysqli_fetch_assoc($sql_check_information);
			$opening=$zonal_qnty_data=$fetch_sql_check_information['field_qnty'];
			$damage_loss_data=$fetch_sql_check_information['damage_loss'];
			$damage_loss_status_data=$fetch_sql_check_information['damage_loss_status'];
			$zonal_slno=$fetch_sql_check_information['field_slno'];
			$price_charge_unit=$fetch_sql_check_information['price_charge_unit'];
			$rate_price_unit=$fetch_sql_check_information['rate_price_unit'];
			$total_price=$fetch_sql_check_information['total_price'];
				
			$closing_balance=$received_single+$opening;

			$total_damage=$Damage_single+$damage_loss_data;

			$total_new_challan_price=$total_price+$total_new;

			$average_rate=($total_new_challan_price/$closing_balance);

			if($Damage_single==0){
				$damage_loss_status=0;
			}else{
				$damage_loss_status=1;
			}

			if($total_damage==0){
				$damage_loss_status_total=0;
			}else{
				$damage_loss_status_total=1;
			}
			$get_information="SELECT * FROM `lt_master_item_detail` WHERE `item_primary_code`='$hqzis_primary_id_single'";
			$sql_get_information=mysqli_query($conn,$get_information);
			$fetch_get_information=mysqli_fetch_assoc($sql_get_information);

			$zonal_component_id=$fetch_get_information['slno'];
			$zonal_component_name=$fetch_get_information['item_name'];
			$zonal_unit=$fetch_get_information['it_de_unit_m'];
			$zonal_primary_code=$fetch_get_information['item_primary_code'];
			$zonal_secondary_code=$fetch_get_information['item_second_code'];
			$zonal_category_id=$fetch_get_information['item_category_id'];
			$zonal_hsn_code=$fetch_get_information['hsn_code'];
			$category="SELECT * FROM `lt_master_item_category` WHERE `category_name`='$zonal_category_id'";
			$sql_category=mysqli_query($conn,$category);
			$fetch_category=mysqli_fetch_assoc($sql_category);
			$zonal_category_name=$fetch_category['slno'];

			 $get_zonal_stock_log="INSERT INTO `lt_master_field_stock_transfer_info`(`fqt_slno`, `fqt_primary_code`, `fqt_secondary_code`, `fqt_component_name`, `fqt_component_id`, `fqt_category_name`, `fqt_category_id`, `fqt_unit`, `fqt_qnty`, `damage_loss`, `damage_loss_status`, `fqt_date`, `fqt_time`, `fqt_location_id`, `fqt_transfer_location`, `fqt_transfer_type`, `fqt_remark`, `fqt_opening_balance`, `fqt_closing_balance`,`fqt_hsn_code`, `total_item_issue`, `price_issue_rate`, `total_price_item`, `total_receive_price`, `transit_loss_no`) VALUES (Null,'$zonal_primary_code', '$zonal_secondary_code', '$zonal_component_name', '$zonal_component_id', '$zonal_category_name', '$zonal_category_id', '$zonal_unit', '$received_single', '$damage_loss', '$damage_loss_status', '$zonal_date', '$zonal_time', '$zonal_location_id','$hqcg_hq_location_id',1,'$remark_single','$opening','$closing_balance','$zonal_hsn_code','$hqzis_issue_qnt_single','$price_rate_single','$price_total_single','$new_update_price','$transit_single')";
			$sql_get_zonal_stock_log=mysqli_query($conn,$get_zonal_stock_log);
			
			if($rate_price_unit!=$price_rate_single){

				 $update_price="UPDATE `lt_master_field_stock_price_item` SET `status`='2' WHERE `item_primary_code`='$hqzis_primary_id_single' AND `location_name`='$zonal_place' and `status`='1'";
				$sql_update=mysqli_query($conn,$update_price);
				//echo mysqli_error($conn);
				$price_record_query="INSERT INTO `lt_master_field_stock_price_item`(`slno_id`, `item_primary_code`,`item_secondary_code`, `price_rate`, `location_name`, `status`, `date`, `time`) VALUES (Null,'$zonal_primary_code','$zonal_secondary_code','$price_rate_single','$zonal_place','1','$zonal_date','$zonal_time')";
				$sql_price_record_query=mysqli_query($conn,$price_record_query);
				// echo mysqli_error($conn);
			}

			 $updae_quantity="UPDATE `lt_master_field_stock_info` SET `field_qnty`='$closing_balance',`damage_loss`='$total_damage',`damage_loss_status`='$damage_loss_status_total',`field_date`='$date',`field_time`='$time',`rate_price_unit`='$price_rate_single', `price_charge_unit`='$average_rate', `total_price`='$total_new_challan_price', `date_price`='$zonal_date' WHERE`field_slno`='$zonal_slno'";
			$sql_updae_queantity=mysqli_query($conn,$updae_quantity);
			
#################### here transitional lost is record for furture event ##########################
			 $insert_transit="INSERT INTO `lt_master_field_zonal_issued_transit_received_info`(`slno`, `challan_id`, `item_primary`, `item_secondary`, `item_hsn`, `item_name`, `item_category`, `item_unit`, `item_quantity`, `item_rate`, `date`, `time`, `status`, `vehicle_no`) VALUES (Null,'$hqcg_challan_no','$zonal_primary_code','$zonal_secondary_code','$zonal_hsn_code','$zonal_component_name','$zonal_category_id','$zonal_unit','$transit_single','$price_rate_single', '$zonal_date', '$zonal_time','$tranist_status','$Vehicle_no' )";
			$sql_insert_transit=mysqli_query($conn,$insert_transit);
			 

		}
		if($Damage_single==0){
				$damage_loss_status=0;
			}else{
				$damage_loss_status=1;
			}
#######################################################################################################
		 $update_reqution="UPDATE `lt_master_field_material_requsition_details` SET `receive_qnty`='$received_single', `receive_qnty_status`='1', `damage_loss`='$Damage_single', `tranisit_loss`='$transit_single', `tranist_status`='$tranist_status', `damage_loss_status`='$damage_loss_status' WHERE`fmrd_slno`='$zmrd_slno_single'";
		$sql_update_reqution=mysqli_query($conn,$update_reqution);
		
##################################################################################################################
// echo $closing_balance;
		 echo  $update_challan_information_detail="UPDATE `lt_master_zonal_issue_field_info` SET `zqzis_receive_status`='1', `zqzis_transit_loss`='$zqzis_transit_loss', `zqzis_date_receive`='$date', `zqzis_time_receive`='$time', `zqzis_received_qnty`='$received_single', `damage_loss`='$Damage_single' ,`receive_qnty`='$closing_balance' where `zqzis_slno`='$hqzis_slno_single'";
		$sql_update_challan_information_detail=mysqli_query($conn,$update_challan_information_detail);
		echo mysqli_error($conn);
	} // loop end here
	$update_challan="UPDATE `lt_master_zonal_challan_generate` SET `zqcg_receiver_id`='$user_id', `zqcg_receive_date`='$date', `zqcg_receive_time`='$time', `zqcg_receive_status`='1' WHERE `zqcg_slno`='$hqcg_slno'";

	$sql_update_challan=mysqli_query($conn,$update_challan);
	$msg->success('Success-Fully Receive Of Challan And Update Of Stock Of Zonal');
	 		header('Location:index.php');
			exit;

}else{
	header('Location:logout.php');
	exit;
}