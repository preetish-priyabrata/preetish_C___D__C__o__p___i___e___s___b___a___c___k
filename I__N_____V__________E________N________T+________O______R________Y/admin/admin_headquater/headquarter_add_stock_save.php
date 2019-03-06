<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
session_start();
if($_SESSION['admin_hq']){
	require 'FlashMessages.php';
	include '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();
	//print_r($_POST);
// Array ( [form_type] => SKaJhVPOVtV+U+N8R0rmvuRTsObw1Oi3JQ+DWwoXhVM= [slno] => Array ( [0] => 1 [1] => 2 [2] => 14 ) [primary] => Array ( [0] => 12356 [1] => 23456 [2] => 34567 ) [secondary] => Array ( [0] => 1234567 [1] => 3456 [2] => 56789 ) [itemname] => Array ( [0] => brezer [1] => WINE [2] => Tablet ) [catergoryNO] => Array ( [0] => 2 [1] => 2 [2] => 3 ) [catergory] => Array ( [0] => Consumable [1] => Consumable [2] => Insurance ) [unit] => Array ( [0] => kg [1] => kg [2] => kg ) [qnty] => Array ( [0] => 48 [1] => 78 [2] => 42 ) [notes] => To develop and deliver codes for the work assigned in accordance with time| quality and cost standards. Documentation work To develop the codes for the project as per work assignation. To work upon the new requests raised by the client and develop those features. To maintain the existing project and resolving the issues occurring in the existing project. lectrical engineering job description, electrical engineering jobs, electrical engineering jobs entry level, entry level electrical engineering jobs, entry level mechanical engineering jobs, fresher jobs in usa tell me about yourself sample answer for freshers, how to start a private investment company, job search, job search engines, job search ) 
// 
$form_type=web_decryptIt(str_replace(" ", "+", $_POST['form_type']));
	if($form_type=="hq stock entry details"){
		$slno=($_POST['slno']);
		$primary=($_POST['primary']);
		$secondary=($_POST['secondary']);
		$itemname=($_POST['itemname']);
		$catergoryNO=($_POST['catergoryNO']);
		$catergory=($_POST['catergory']);
		$unit=($_POST['unit']);
		$qnty=($_POST['qnty']);
		$notes=mysqli_real_escape_string($conn,$_POST['notes']);
		$location=$_SESSION['hq_store_id'];
		$DATE=date('Y-m-d');
		$time=date('H:i:s');

		if(!empty($slno)){
			for ($i=0; $i <count($slno) ; $i++) {
				$single_slno=$slno[$i];
				$check_master_item="SELECT * FROM `lt_master_item_detail` WHERE `slno`='$single_slno'";
				$sql_master_item=mysqli_query($conn,$check_master_item);
				$num=mysqli_num_rows($sql_master_item);

				$single_primary=$primary[$i];
				$single_secondary=$secondary[$i];
				$single_itemname=$itemname[$i];
				$single_catergoryNO=$catergoryNO[$i];
				$single_catergory=$catergory[$i];
				$single_unit=$unit[$i];
				$single_qnty=$qnty[$i];

				if($num=='1'){
					$check_hq_item="SELECT * FROM `lt_master_hq_stock_info` WHERE `hq_component_id`='$single_slno' and `hq_location_id`='$location'";
					$sql_hq_item=mysqli_query($conn,$check_hq_item);
					$num_hq_item=mysqli_num_rows($sql_hq_item);

					if($num_hq_item=='0'){
						$opening=0;
						$transfer_type="INSERT INTO `lt_master_hq_stock_transfer_info`(`hqt_slno`, `hqt_primary_code`, `hqt_secondary_code`, `hqt_component_name`, `hqt_component_id`, `hqt_category_name`, `hqt_category_id`, `hqt_unit`, `hqt_qnty`, `hqt_date`, `hqt_time`, `hqt_location_id`, `hqt_transfer_type`, `hqt_remark`,`hqt_opening_balance`,`hqt_closing_balance`) VALUES (Null,'$single_primary','$single_secondary','$single_itemname','$single_slno','$single_catergory','$single_catergoryNO','$single_unit','$single_qnty','$DATE','$time','$location','1','$notes','$opening','$single_qnty')";
						$sql_transfer_item=mysqli_query($conn,$transfer_type);

						$insert_to_hq="INSERT INTO `lt_master_hq_stock_info`(`hq_slno`, `hq_primary_code`, `hq_secondary_code`, `hq_component_name`, `hq_component_id`, `hq_category_name`, `hq_category_id`, `hq_unit`, `hq_qnty`, `hq_date`, `hq_time`, `hq_location_id`) VALUES (Null,'$single_primary','$single_secondary','$single_itemname','$single_slno','$single_catergory','$single_catergoryNO','$single_unit','$single_qnty','$DATE','$time','$location')";
						$sql_insert_to_hq=mysqli_query($conn,$insert_to_hq);


					}else if($num_hq_item=='1'){
							$fetch_hq_item=mysqli_fetch_assoc($sql_hq_item);
						
						$present_stock=$fetch_hq_item['hq_qnty'];

						$hq_slno=$fetch_hq_item['hq_slno'];

						$current_stock=$present_stock+$single_qnty;

						$transfer_type1="INSERT INTO `lt_master_hq_stock_transfer_info`(`hqt_slno`, `hqt_primary_code`, `hqt_secondary_code`, `hqt_component_name`, `hqt_component_id`, `hqt_category_name`, `hqt_category_id`, `hqt_unit`, `hqt_qnty`, `hqt_date`, `hqt_time`, `hqt_location_id`, `hqt_transfer_type`, `hqt_remark`,`hqt_opening_balance`,`hqt_closing_balance`) VALUES (Null,'$single_primary','$single_secondary','$single_itemname','$single_slno','$single_catergory','$single_catergoryNO','$single_unit','$single_qnty','$DATE','$time','$location','1','$notes','$present_stock','$current_stock')";
						$sql_transfer_item1=mysqli_query($conn,$transfer_type1);

					

						$update_to_hq="UPDATE `lt_master_hq_stock_info` SET `hq_qnty`='$current_stock',`hq_date`='$DATE',`hq_time`='$time' where `hq_slno`='$hq_slno' ";
						$sql_update_to_hq=mysqli_query($conn,$update_to_hq);						


					}else{ //here one item will present in 
						$single_primary=$primary[$i];
						$msg->warning('Please Enter primary value  '.$single_primary.'   which is not present in our Head Quater master record');
					}

				}else{
					$single_primary=$primary[$i];
					$msg->warning('Please Enter primary value  '.$single_primary.'   which is not present in our master record');
				}
			}
			$msg->success('Stock Is Updated Successfully');
			header('Location:headquarter_dashboard.php');
			exit;

		}else{ // if slno is empty 
			$msg->warning('Please Enter primary value which is not present in our master record');
	 		header('Location:headquarter_dashboard.php');
			exit;
		}


	}else{// formtype is match
		header('Location:logout.php');
		exit;
	}


}else{
	header('Location:logout.php');
	exit;
}
