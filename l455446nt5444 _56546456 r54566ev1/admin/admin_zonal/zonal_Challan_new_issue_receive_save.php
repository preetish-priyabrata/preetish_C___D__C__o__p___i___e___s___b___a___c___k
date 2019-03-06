<?php 
// print_r($_POST);
// exit;
session_start();
if($_SESSION['admin_zonal']){
	require 'FlashMessages.php';
	include '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();// 


	$user_id=$_SESSION['admin_zonal'];
	$zonal_location_id=$zonal_place=$_SESSION['zonal_place'];

	$hqcg_hq_location_id=$_POST['hqcg_hq_location_id'];		// head quater loaction
	$hqcg_date=$_POST['hqcg_date'];							// date of hq send

	// $date_receive=$_POST['date_receive'];				// date of receive

	$hqcg_site_mr_id=$_POST['hqcg_site_mr_id'];				// mr from zonal
	$hqcg_slno=$_POST['hqcg_slno'];							// challan generate slno
	$hqcg_challan_no=$_POST['hqcg_challan_no'];				// challan  no
	$hqcg_time=$_POST['hqcg_time'];							// challan generate time

	$Vehicle_no=$_POST['Vehicle_no'];

	// $time_receive=$_POST['time_receive'];				// challan receive time

	$zmrd_slno=$_POST['zmrd_slno']; 						//requation serial no for doing changes

	$hqzis_hsn_id=$_POST['hqzis_hsn_id'];					// hqzis_hsn_id

	$hqzis_slno=$_POST['hqzis_slno']; 						// issue generated table info table for update

	$hqzis_primary_id=$_POST['hqzis_primary_id']; 			// primary serial no

	$hqzis_secondary_id=$_POST['hqzis_secondary_id'];		// secondary no

	$zmrd_name_item=$_POST['hqzis_item_name'];				// item name 

	// $zmrd_machine_no=$_POST['zmrd_machine_no'];			// machine no 

	$zmrd_request_qnt=$_POST['hqzis_request_qnt'];			// quantity is requested for

	$hqzis_issue_qnt=$_POST['hqzis_issue_qnt'];				// issued quantity

	$price_rate=$_POST['price_rate']; 						// rate per unit

	$price_total=$_POST['price_total']; 					// total price in item


	$received=$_POST['receive'];							// receive 

	$Damage=$_POST['damage'];								// damage from stock

	$transit=$_POST['transit']; 							// transit Loss

	$remark=$_POST['remark'];								// remark

	$date_receive=$zonal_date=$date=date('Y-m-d');

	$time_receive=$zonal_time=$time=date('H:i:s');

	for ($i=0; $i < count($hqzis_issue_qnt); $i++) {   // for loop is start  here
################################# Gettin single values i database ####################################
		$hqzis_issue_qnt_single=$hqzis_issue_qnt[$i]; 	  // issued quantity single
		$received_single=$received[$i]; 				  // zonal single iteam
		$Damage_single=$Damage[$i];   					  // damage received

		$remark_single=$remark[$i];

		$price_total_single=$price_total[$i];
		
		$zmrd_slno_single=$zmrd_slno[$i];				  // requation serial no
		$hqzis_slno_single=$hqzis_slno[$i];				  // lt_master_hq_issue_zonal_info slno

		$transit_loss=$transit[$i];
		$price_rate_single=$price_rate[$i];

		$total_new=$price_rate_single*$received_single;    //total price update

		$hqzis_primary_id_single=$hqzis_primary_id[$i];      //primary item information s 
		$hqzis_secondary_id_single=$hqzis_secondary_id[$i];	 // secondary item information	
		$total_transtion_loss=$transit[$i]; 

		if($total_transtion_loss==0){
			$tranist_status=0;
		}else{
			$tranist_status=1;
		}
#################################### end of declareing of single value ###########################
################################## Checking in zonal stock Table #################################
		 $check_information="SELECT * FROM `lt_master_zonal_stock_info` WHERE `zonal_primary_code`='$hqzis_primary_id_single' and `zonal_location_id`='$zonal_place'";
			$sql_check_information=mysqli_query($conn,$check_information);
			 $num_check_information=mysqli_num_rows($sql_check_information);

####################################################################################################
		if($num_check_information==0){ // checking in site stock information about previous present
############################# Here information Of Stock #################################
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
################## Insert Zonal Stock where item stores in price and damage along   ####################

			$insert_zonal="INSERT INTO `lt_master_zonal_stock_info`(`zonal_slno`, `zonal_primary_code`, `zonal_secondary_code`, `zonal_component_name`, `zonal_component_id`, `zonal_category_name`, `zonal_category_id`, `zonal_unit`, `zonal_qnty`, `damage_loss`, `damage_loss_status`, `zonal_date`, `zonal_time`, `zonal_location_id`,`zonal_hsn_code`,`rate_price_unit`,`total_price`,`date_price`,`price_charge_unit`) VALUES (Null,'$zonal_primary_code', '$zonal_secondary_code', '$zonal_component_name', '$zonal_component_id', '$zonal_category_name', '$zonal_category_id', '$zonal_unit', '$received_single', '$Damage_single', '$damage_loss_status', '$zonal_date', '$zonal_time', '$zonal_location_id','$zonal_hsn_code','$price_rate_single','$total_new','$zonal_date','$price_rate_single')";
			$sql_insert_zonal=mysqli_query($conn,$insert_zonal);
##################### end Zonal Stock where item stores in price and damage along   ####################

########################  Zonal log book when received or issued to field ##########################

			$get_zonal_stock_log="INSERT INTO `lt_master_zonal_stock_transfer_info`(`zqt_slno`, `zqt_primary_code`, `zqt_secondary_code`, `zqt_component_name`, `zqt_component_id`, `zqt_category_name`, `zqt_category_id`, `zqt_unit`, `zqt_qnty` ,`damage_loss`, `damage_loss_status`, `zqt_date`, `zqt_time`, `zqt_location_id`, `zqt_transfer_location`, `zqt_transfer_type`, `zqt_remark`, `zqt_opening_balance`, `zqt_closing_balance`,`total_item_issue`, `price_issue_rate`, `total_price_item`, `total_receive_price`, `transit_loss_no`,`zqt_hsn_code`) VALUES (Null,'$zonal_primary_code', '$zonal_secondary_code', '$zonal_component_name', '$zonal_component_id', '$zonal_category_name', '$zonal_category_id', '$zonal_unit', '$received_single', '$Damage_single', '$damage_loss_status', '$zonal_date', '$zonal_time', '$zonal_location_id','$hqcg_hq_location_id',1,'$remark_single','$opening','$received_single','$hqzis_issue_qnt_single','$price_rate_single','$price_total_single','$total_new','$transit_loss','$zonal_hsn_code')";
			$sql_get_zonal_stock_log=mysqli_query($conn,$get_zonal_stock_log);
########################  end Zonal log book when received or issued to field ##########################

########################       here Price Record in zonal event         ################################
			$price_record_query="INSERT INTO `lt_master_zonal_stock_price_item`(`slno_id`, `item_primary_code`,`item_secondary_code`, `price_rate`, `location_name`, `status`, `date`, `time`) VALUES (Null,'$zonal_primary_code','$zonal_secondary_code','$price_rate_single','$zonal_place','1','$zonal_date','$zonal_time')";
			$sql_price_record_query=mysqli_query($conn,$price_record_query);
######################## end here Price Record in zonal event #########################################

######################## here transitional lost is record for furture event ##########################
			$insert_transit="INSERT INTO `lt_master_zonal_hq_issued_transit_received_info`(`slno`, `challan_id`, `item_primary`, `item_secondary`, `item_hsn`, `item_name`, `item_category`, `item_unit`, `item_quantity`, `item_rate`, `date`, `time`, `status`, `vehicle_no`) VALUES (Null,'$hqcg_challan_no','$zonal_primary_code','$zonal_secondary_code','$zonal_hsn_code','$zonal_component_name','$zonal_category_id','$zonal_unit','$total_transtion_loss','$price_rate_single', '$zonal_date', '$zonal_time','$tranist_status','$Vehicle_no' )";
			$sql_insert_transit=mysqli_query($conn,$insert_transit);
####################  End here transitional lost is record for furture event ##########################
		}else{  // if present  in zonal stock
#######################################################################################################
			$fetch_sql_check_information=mysqli_fetch_assoc($sql_check_information);
			$insert_query=json_encode($fetch_sql_check_information);
			

													// fatching information form zonal database 
			
			$opening=$zonal_qnty_data=$fetch_sql_check_information['zonal_qnty'];     

													// qantity in stock database

			$damage_loss_data=$fetch_sql_check_information['damage_loss'];

													// damage stock present in database

			$damage_loss_status_data=$fetch_sql_check_information['damage_loss_status'];

													// damage status in database 

			$zonal_slno=$fetch_sql_check_information['zonal_slno'];

			$rate_price_unit=$fetch_sql_check_information['rate_price_unit'];

													//price rate per system

			$total_price=$fetch_sql_check_information['total_price']; // price in database

			$closing_balance=$received_single+$opening; // closing balance after received

			$total_damage=$Damage_single+$damage_loss_data;  

														//damage in store receivedfrom down as well as in receiving item from headquater
			
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
				

#########################                  Price Stored           #####################################
			
			if($rate_price_unit!=$price_rate_single){

				$update_price="UPDATE `lt_master_zonal_stock_price_item` SET `status`='2' WHERE `item_primary_code`='$hqzis_primary_id_single' AND `location_name`='$zonal_place' and `status`='1'";
				$sql_update=mysqli_query($conn,$update_price);

				$price_record_query="INSERT INTO `lt_master_zonal_stock_price_item`(`slno_id`, `item_primary_code`,`item_secondary_code`, `price_rate`, `location_name`, `status`, `date`, `time`) VALUES (Null,'$zonal_primary_code','$zonal_secondary_code','$price_rate_single','$zonal_place','1','$zonal_date','$zonal_time')";
				$sql_price_record_query=mysqli_query($conn,$price_record_query);
				
			}
			
########################  Zonal log book when received or issued to field ##########################

			$get_zonal_stock_log="INSERT INTO `lt_master_zonal_stock_transfer_info`(`zqt_slno`, `zqt_primary_code`, `zqt_secondary_code`, `zqt_component_name`, `zqt_component_id`, `zqt_category_name`, `zqt_category_id`, `zqt_unit`, `zqt_qnty` ,`damage_loss`, `damage_loss_status`, `zqt_date`, `zqt_time`, `zqt_location_id`, `zqt_transfer_location`, `zqt_transfer_type`, `zqt_remark`, `zqt_opening_balance`, `zqt_closing_balance`,`total_item_issue`, `price_issue_rate`, `total_price_item`, `total_receive_price`, `transit_loss_no`,`zqt_hsn_code`) VALUES (Null,'$zonal_primary_code', '$zonal_secondary_code', '$zonal_component_name', '$zonal_component_id', '$zonal_category_name', '$zonal_category_id', '$zonal_unit', '$received_single', '$Damage_single', '$damage_loss_status', '$zonal_date', '$zonal_time', '$zonal_location_id','$hqcg_hq_location_id',1,'$remark_single','$opening','$received_single','$hqzis_issue_qnt_single','$price_rate_single','$average_rate','$total_new','$transit_loss','$zonal_hsn_code')";

			$sql_get_zonal_stock_log=mysqli_query($conn,$get_zonal_stock_log);
			


########################  end Zonal log book when received or issued to field ##########################
################## Update Zonal Stock where item stores in price and damage along   ####################

			$updae_quantity="UPDATE `lt_master_zonal_stock_info` SET `zonal_qnty`='$closing_balance',`damage_loss`='$total_damage',`damage_loss_status`='$damage_loss_status_total',`zonal_date`='$date',`zonal_time`='$time',`rate_price_unit`='$price_rate_single', `price_charge_unit`='$average_rate', `total_price`='$total_new_challan_price', `date_price`='$zonal_date' WHERE`zonal_slno`='$zonal_slno'";
			$sql_updae_queantity=mysqli_query($conn,$updae_quantity);
		
################## End Update Zonal Stock where item stores in price and damage along   ################

######################## here transitional lost is record for furture event ##########################

			$insert_transit="INSERT INTO `lt_master_zonal_hq_issued_transit_received_info`(`slno`, `challan_id`, `item_primary`, `item_secondary`, `item_hsn`, `item_name`, `item_category`, `item_unit`, `item_quantity`, `item_rate`, `date`, `time`, `status`, `vehicle_no`) VALUES (Null,'$hqcg_challan_no','$zonal_primary_code','$zonal_secondary_code','$zonal_hsn_code','$zonal_component_name','$zonal_category_id','$zonal_unit','$total_transtion_loss','$price_rate_single', '$zonal_date', '$zonal_time','$tranist_status','$Vehicle_no' )";
			$sql_insert_transit=mysqli_query($conn,$insert_transit);
			
####################  End here transitional lost is record for furture event ##########################
####################################################################################################### 

		}
		if($Damage_single==0){
				$damage_loss_status_req=0;
			}else{
				$damage_loss_status_req=1;
			}
########################################################################################################
		$update_reqution="UPDATE `lt_master_zonal_material_requsition_details` SET `receive_qnty`='$received_single', `receive_qnty_status`='1', `damage_loss`='$Damage_single', `tranisit_loss`='$total_transtion_loss', `tranist_status`='$tranist_status', `damage_loss_status`='$damage_loss_status_req' WHERE`zmrd_slno`='$zmrd_slno_single'";
		$sql_update_reqution=mysqli_query($conn,$update_reqution);
########################################################################################################
		 $update_challan_information_detail="UPDATE `lt_master_hq_issue_zonal_info` SET `hqzis_receive_status`='1', `hqzis_transit_loss`='$total_transtion_loss', `hqzis_date_receive`='$date', `hqzis_time_receive`='$time', `hqzis_received_qnty`='$received_single', `damage_loss`='$Damage_single',`receive_qnty`='$received_single' where `hqzis_slno`='$hqzis_slno_single'";
		 $sql_update_challan_information_detail=mysqli_query($conn,$update_challan_information_detail);
		 // mysqli_error($conn);
		 // $file = fopen("test4.txt", "a+");
			// fwrite($file, "---" . $update_reqution . "---".$sql_update_reqution."---");
			// $file = fopen("test5.txt", "a+");
			// fwrite($file, "---" . $update_challan_information_detail . "---".$sql_update_challan_information_detail."---");
		

	} // for loop is end here
$update_challan="UPDATE `lt_master_hq_challan_generate` SET `hqcg_receiver_id`='$user_id', `hqcg_receive_date`='$date', `hqcg_receive_time`='$time', `hqcg_receive_status`='1' WHERE`hqcg_slno`='$hqcg_slno'";
	$sql_update_challan=mysqli_query($conn,$update_challan);


// $file = fopen("test6.txt", "a+");
// 			fwrite($file, "---" . $update_challan . "---".$sql_update_challan."---");
	

	$msg->success('Success-Fully Receive Of Challan And Update Of Stock Of Zonal');
	 		header('Location:index.php');
			exit;

}else{
	header('Location:logout.php');
	exit;
}