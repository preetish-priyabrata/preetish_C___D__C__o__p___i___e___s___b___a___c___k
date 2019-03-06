<?php 
print_r($_POST);
// exit;
session_start();

if($_SESSION['admin_hq']){
	include  '../config.php';
	require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
	$hqcg_hq_location_id=$location=$hq_id=$_SESSION['hq_store_id'];
// print_r($_POST);
// Array ( [example77_length] => 10 [slno_transfer_id] => 1 [request_id] => FEDq3VVapiPxKPI9icnbSCMb5MU59pZ4pDZ144815Ks= [primary_id] => 12356 [quantity] => 12 [site_slno] => 17 ) 
	
	$slno_transfer_id=$_POST['slno_transfer_id'];
	$request_id=web_decryptIt(str_replace(" ", "+",$_POST['request_id']));
	$primary_id=$_POST['primary_id'];
	$quantity=$_POST['quantity'];
	$site_slno=$_POST['site_slno'];

	$zonal_date=$DATE=date('Y-m-d');
	$zonal_time=$time=date('H:s:s');

	 $get_item="SELECT * FROM `lt_master_hq_request_site` WHERE `slno`='$site_slno'";
	$sql_get_item=mysqli_query($conn,$get_item);
	$fetch_get_item=mysqli_fetch_assoc($sql_get_item);

	// `primary`, `quantity`, `site_id`, `approve_status`, `allow_days`, `allow_quantity`, `allowed_status`
	$allow_quantity=$fetch_get_item['allow_quantity'];
	 $zonal_location_id=$hqt_transfer_location=$site_id=$fetch_get_item['site_id'];

	 $get_information_stock="SELECT * FROM `lt_master_zonal_stock_info` WHERE `zonal_primary_code`='$primary_id' and `zonal_location_id`='$site_id'";
	$sql_get_information_stock=mysqli_query($conn,$get_information_stock);
	$fetch_get_information_stock=mysqli_fetch_assoc($sql_get_information_stock);
	// `zonal_primary_code`, `zonal_secondary_code`, `zonal_component_name`, `zonal_component_id`, `zonal_category_name`, `zonal_category_id`, `zonal_unit`, `zonal_qnty`, `zonal_location_id`
	$zonal_primary_code=$fetch_get_information_stock['zonal_primary_code'];
	$zonal_secondary_code=$fetch_get_information_stock['zonal_secondary_code'];
	$zonal_component_name=$fetch_get_information_stock['zonal_component_name'];
	$zonal_component_id=$fetch_get_information_stock['zonal_component_id'];
	$zonal_category_name=$fetch_get_information_stock['zonal_category_name'];
	$zonal_category_id=$fetch_get_information_stock['zonal_category_id'];
	$zonal_unit=$fetch_get_information_stock['zonal_unit'];
	 $zonal_qnty_data =$zonal_qnty=$fetch_get_information_stock['zonal_qnty'];
	$zonal_location_id=$fetch_get_information_stock['zonal_location_id'];
	$zonal_slno=$fetch_get_information_stock['zonal_slno'];
	
	if($zonal_qnty!=0){
		$new=$zonal_qnty-$allow_quantity;


				// if($allow_quantity < $zonal_qnty){
				// 	$remain1=$zonal_qnty-$hqzis_issue_qnt_single;

				// }else if($allow_quantity == $zonal_qnty){
				// 	$remain1=$zonal_qnty-$allow_quantity;
				// }else if($allow_quantity > $zonal_qnty){
				// 	$remain1=$zonal_qnty-$allow_quantity;

				// }

				if($new<0){
					$remain=$allow_quantity-$zonal_qnty;
					$allow_quantity1=$allow_quantity-$remain;
					$remain1=$zonal_qnty-$allow_quantity1;
				}else{
					$remain1=$zonal_qnty-$allow_quantity;
					$allow_quantity1=$allow_quantity;
				}
				$zonal_qnty_close=$remain1;
				$received_single=$single_qnty=$allow_quantity1;

	######################################################################################################
	
		$get_hq_stock="SELECT * FROM `lt_master_hq_stock_info` WHERE `hq_primary_code`='$primary_id' and `hq_location_id`='$hq_id'";
		$sql_get_hq_stock=mysqli_query($conn,$get_hq_stock);
		$fetch_sql_get_hq_stock=mysqli_fetch_assoc($sql_get_hq_stock);
		// `hq_primary_code`, `hq_secondary_code`, `hq_component_name`, `hq_component_id`, `hq_category_name`, `hq_category_id`, `hq_unit`, `hq_qnty`, `hq_date`, `hq_time`, `hq_location_id`
		$single_primary=$fetch_sql_get_hq_stock['hq_primary_code'];
		$single_secondary=$fetch_sql_get_hq_stock['hq_secondary_code'];
		$single_itemname=$fetch_sql_get_hq_stock['hq_component_name'];
		$single_slno=$fetch_sql_get_hq_stock['hq_component_id'];
		$single_catergory=$fetch_sql_get_hq_stock['hq_category_name'];
		$single_catergoryNO=$fetch_sql_get_hq_stock['hq_category_id'];
		$single_unit=$fetch_sql_get_hq_stock['hq_unit'];
		$present_stock=$fetch_sql_get_hq_stock['hq_qnty'];
		$hq_location_id=$fetch_sql_get_hq_stock['hq_location_id'];
		$hq_slno=$fetch_sql_get_hq_stock['hq_slno'];
		$current_stock=$allow_quantity1+$hq_qnty;
########################################################################################################
		$transfer_type1="INSERT INTO `lt_master_hq_stock_transfer_info`(`hqt_slno`, `hqt_primary_code`, `hqt_secondary_code`, `hqt_component_name`, `hqt_component_id`, `hqt_category_name`, `hqt_category_id`, `hqt_unit`, `hqt_qnty`, `hqt_date`, `hqt_time`, `hqt_location_id`, `hqt_transfer_type`, `hqt_remark`,`hqt_opening_balance`,`hqt_closing_balance`,`hqt_transfer_location`) VALUES (Null,'$single_primary','$single_secondary','$single_itemname','$single_slno','$single_catergory','$single_catergoryNO','$single_unit','$single_qnty','$DATE','$time','$location','6','Internal site Transfer id $request_id','$present_stock','$current_stock','$hqt_transfer_location')";
			$sql_transfer_item1=mysqli_query($conn,$transfer_type1);

########################################################################################################
		$get_zonal_stock_log="INSERT INTO `lt_master_zonal_stock_transfer_info`(`zqt_slno`, `zqt_primary_code`, `zqt_secondary_code`, `zqt_component_name`, `zqt_component_id`, `zqt_category_name`, `zqt_category_id`, `zqt_unit`, `zqt_qnty` ,`damage_loss`, `damage_loss_status`, `zqt_date`, `zqt_time`, `zqt_location_id`, `zqt_transfer_location`, `zqt_transfer_type`, `zqt_remark`, `zqt_opening_balance`, `zqt_closing_balance`) VALUES (Null,'$zonal_primary_code', '$zonal_secondary_code', '$zonal_component_name', '$zonal_component_id', '$zonal_category_name', '$zonal_category_id', '$zonal_unit', '$received_single', '0', '0', '$zonal_date', '$zonal_time', '$zonal_location_id','$hqcg_hq_location_id',6,'Internal site to HeadQuater Transfer id $request_id','$zonal_qnty_data','$zonal_qnty_close')";
		$sql_get_zonal_stock_log=mysqli_query($conn,$get_zonal_stock_log);	
##########################################################################################################
		$update="UPDATE `lt_master_zonal_stock_info` SET `zonal_qnty`='$zonal_qnty_close' WHERE`zonal_slno`='$zonal_slno'";
		$sqlupdate_zonal=mysqli_query($conn,$update);	
#######################################################################################################
		$UPDATE_stock="UPDATE `lt_master_hq_stock_info` SET `hq_qnty`='$current_stock' WHERE `hq_slno`='$hq_slno'";
		$sqlupdate_zonal=mysqli_query($conn,$UPDATE_stock);	
########################################################################################################		
		$site_id="UPDATE `lt_master_hq_request_site` SET `allowed_status`='1' WHERE`slno`='$site_slno'";
		$sql_site_id=mysqli_query($conn,$site_id);	
########################################################################################################		
		$upde_tranfer="UPDATE `lt_master_hq_transfer_mr_zonal` SET `issue_status`='1' WHERE `slno_transfer_id`='$slno_transfer_id'";
		$sql_upde_tranfer=mysqli_query($conn,$upde_tranfer);	

####################################################################################################
		$msg->success('Success-full Stock Is been Received By HeadQuater From Zonal Is ready to Transfer ');
		 		header('Location:index.php');
				exit;
	}else{
		$lid=web_encryptIt($slno_transfer_id);
		$site_list=web_encryptIt($request_id);
		$msg->error('Stock From Zonal Is Be used Please Use Another Zonal For Receiving Stock To Account !!!');
		header('Location:hq_transfer_raise_t_gen_view_issue.php?token_name='.$lid.'&token_id='.$site_list.'&status='.web_encryptIt('3'));
		exit;
		
	}
#####################################################################################################
}else{
	header('Location:logout.php');
	exit;
}