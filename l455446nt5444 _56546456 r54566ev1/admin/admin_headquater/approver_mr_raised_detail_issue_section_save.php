<?php
// print_r($_POST);
// exit;
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
session_start();
if($_SESSION['admin_hq']){
	require 'FlashMessages.php';
	include '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();
	
		$form_types=$_POST['form_types'];

		switch ($form_types) {
			case 'insert':
				
				$hqcg_site_mr_id=$list_id=$_POST['list_id']; //zmr_unqiue_mr_id
				$slno_id=$_POST['slno_id']; // zmr_slno
			 	$userid=$_SESSION['admin_hq']; // user id hq
				$slno_item=$_POST['slno_item']; // zmrd_slno
			    $hq_store_id=$_POST['hq_store_id']; // hq id
				$primarycode=$_POST['zmrd_primary_code']; //zmrd_primary_code
				$zmrd_second_code=$_POST['zmrd_second_code']; //zmrd_second_code
				$zmrd_units_required=$_POST['zmrd_units_required']; //zmrd_units_required
				$issue_qnty=$_POST['issue_qnty'];
				$price=$_POST['price'];
				$totalprice=$_POST['totalprice'];
				$action=$_POST['action'];
				$date=date('y-m-d');
				$time=date('H:i:s');
				$array_transfer_primary=$array_transfer_slno=$array_issue_primary=$array_issue_slno=array();
				$dc_no=$_POST['dc_no'];
				$date_enter=$_POST['date_enter'];
				$Indent_no=$_POST['Indent_no'];
				$Vehicle_no=$_POST['Vehicle_no'];
				$LR_no=$_POST['LR_no'];
				$LR_date=$_POST['LR_date'];
				$Project_No=$_POST['Project_No'];
				$zmrd_hsn_code=$_POST['zmrd_hsn_code'];
				$zonal_code=$_POST['zonal_code'];
				for ($i=0; $i <count($slno_item) ; $i++) { 

						if ($action[$i]==1){
							$array_issue_slno[]=$slno_item[$i];
							$array_issue_primary[]=$primarycode[$i];
							$array_issue_qnty[]=$issue_qnty[$i];

							$array_price[]=$price[$i];
							$array_totalprice[]=$totalprice[$i];
						}
						if ($action[$i]==2) //transfer
						{
							$array_transfer_slno[]=$slno_item[$i];
							$array_transfer_primary[]=$primarycode[$i];
						}
			        }
			    if(!empty($array_issue_primary)){
			    	$location=$_SESSION['hq_store_id'];
			    	
			        	 $hqcg_item_issued=count($array_issue_primary);
			 	 		 $challan_insert=" INSERT INTO `lt_master_hq_challan_generate`(`hqcg_slno`, `hqcg_site_mr_id`, `hqcg_item_issued`, `hqcg_date`, `hqcg_time`,`hqcg_issuer_id`) VALUES (NULL,'$hqcg_site_mr_id','$hqcg_item_issued','$date','$time','$userid')";

			 	 		  $update_challan=mysqli_query($conn,$challan_insert);

			 	 		  $last_id=mysqli_insert_id($conn);
			 	 		 $challan="HQ".date('y-m-d')."/".$last_id;
			 	  	   	 echo $update_challan_list="UPDATE `lt_master_hq_challan_generate` SET `hqcg_challan_no`='$challan' ,`dc_no`='$dc_no', `date_enter`='$date_enter', `Indent_no`='$Indent_no', `Vehicle_no`='$Vehicle_no', `LR_no`='$LR_no', `LR_date`='$LR_date', `Project_No`='$Project_No',`hqcg_hq_location_id`='$location',`hqcg_zonal_location_id`='$zonal_code' where `hqcg_slno`='$last_id'";
				 		 $update_challan_list_exe=mysqli_query($conn,$update_challan_list);
				 		 // echo mysqli_error($conn);
				 		 // exit;
				 		 for($i=0; $i <count($array_issue_slno) ; $i++){
				 		 	$array_issue_slno_single=$array_issue_slno[$i];
			             	$array_issue_primary_single=$array_issue_primary[$i];

				            $check="SELECT * FROM `lt_master_zonal_material_requsition_details` WHERE `zmrd_slno`='$array_issue_slno_single'and `zmrd_issue_status`='0' and `zmrd_primary_code`='$array_issue_primary_single'";
					 		 $check_exe=mysqli_query($conn,$check);
					 		 $num_rows=mysqli_num_rows($check_exe);
						 		 if($num_rows==1){
						 		 $fetch_detail=mysqli_fetch_assoc($check_exe);

				    
				    			$hqzis_hsn_id=$fetch_detail['zmrd_hsn_code'];
						 		$hqzis_zonal_mr_id=$fetch_detail['zmr_unqiue_mr_id_item'];
					            $hqzis_secondary_id=$fetch_detail['zmrd_second_code'];
					            $hqzis_machine_id=$fetch_detail['zmrd_machine_no'];
					            $hqzis_item_name=$fetch_detail['zmrd_name_item'];
					            $hqzis_item_category_name=$fetch_detail['zmrd_category_name'];
					            $hqzis_item_category_id=$fetch_detail['zmrd_category_id'];
					            $hqzis_request_qnt=$fetch_detail['zmrd_request_qnt'];
					            $hqzis_approve_qnt=$fetch_detail['zmrd_approved_qnt'];	             
					            $hqzis_unit=$fetch_detail['zmrd_units_required'];    
					            $hqzis_zonal_location_id=$fetch_detail['zmrd_site_location_id'];
					            $hqzis_hq_location=$_SESSION['hq_store_id'];
					             $zmrd_slno=$fetch_detail['zmrd_slno'];
					             $hqzis_primary_id=$array_issue_primary_single;
					             $hqzis_issue_qnt=$array_issue_qnty[$i];
					            $price_rate=$array_price[$i];
								$price_total=$array_totalprice[$i];
								$hqzis_date=date('y-m-d');
								$hqzis_time=date("H:i:s");
					            // zmrd_slno
					            // zmrd_issue_qnt
					            $query_item="SELECT * FROM `lt_master_item_detail` WHERE `item_primary_code`='$hqzis_primary_id'";
					           	$sql_query_item=mysqli_query($conn,$query_item);
					           	$fetch_query_item=mysqli_fetch_assoc($sql_query_item);
					           	$hqzis_item_slno_id=$fetch_query_item['slno'];

					           	$check_storing="SELECT * FROM `lt_master_hq_issue_zonal_info` WHERE `zmrd_slno`='zmrd_slno' and `hqzis_primary_id`='$hqzis_primary_id' and `hqzis_zonal_mr_id`='$hqzis_zonal_mr_id' ";
					           	$sql_check_storing=mysqli_query($conn,$check_storing);
					           	$num_check_storing=mysqli_num_rows($sql_check_storing);
					           	if($num_check_storing==0){
					     //       		if($i==0){
									   
							 	 		 

							 		// }

						             $insert_query="INSERT INTO `lt_master_hq_issue_zonal_info`(`hqzis_slno`, `temp_slno`, `zmrd_slno`, `hqzis_challan_id`, `hqzis_zonal_mr_id`, `hqzis_hsn_id`, `hqzis_primary_id`, `hqzis_secondary_id`, `hqzis_machine_id`, `hqzis_item_name`, `hqzis_item_slno_id`, `hqzis_item_category_name`, `hqzis_item_category_id`, `hqzis_request_qnt`, `hqzis_approve_qnt`, `hqzis_hq_present_stock`, `hqzis_issue_qnt`, `price_rate`, `price_total`, `hqzis_after_issued_stock`, `hqzis_unit`, `hqzis_date`, `hqzis_time`, `hqzis_issued_status`, `hqzis_zonal_location_id`, `hqzis_hq_location`) VALUES (Null,'1','$zmrd_slno','$challan','$hqzis_zonal_mr_id','$hqzis_hsn_id','$hqzis_primary_id','$hqzis_secondary_id','$hqzis_machine_id','$hqzis_item_name','$hqzis_item_slno_id','$hqzis_item_category_name','$hqzis_item_category_id','$hqzis_request_qnt','$hqzis_approve_qnt','0','$hqzis_issue_qnt','$price_rate','$price_total','0','$hqzis_unit','$hqzis_date','$hqzis_time','2','$hqzis_zonal_location_id','$hqzis_hq_location')";

						 			$query_exe=mysqli_query($conn,$insert_query);
						 			// echo "<br>";
						 			 $update_query="UPDATE `lt_master_zonal_material_requsition_details` SET `zmrd_issue_qnt`='$hqzis_issue_qnt', `zmr_price_rate`='$price_rate', `zmr_total_price`='$price_total',`zmrd_issue_status`='1' where  `zmrd_slno`='$zmrd_slno'";
						 				$sql_update_exe=mysqli_query($conn,$update_query);
						 				// echo mysqli_error($conn);
						 				// exit;


						 		}else{
						 			$msg->error('Item Amd SMR is Already Challan Is generated Kindly Check Issued History');
						 			header('Location:index.php');
									exit;	
						 		}
					 			// echo mysqli_error($conn);
					 			// exit;
				 			}

				 		}

				 		$msg->success('Successfully Challan Is Generated');
			 			header('Location:index.php');
						exit;


				}else{
						$lid=web_encryptIt($slno_id);
						$site_list=web_encryptIt($hqcg_site_mr_id);
						$msg->error('Please Select Minimum 1 Item To Initiate Process Of Issue!!!');
						header('Location:approver_mr_raised_detail_issue.php?slno='.$lid.'&list='.$site_list);
						exit;
				}
   
				break;
			case 'edit':
			// print_r($_POST);
			// exit;
			// Array ( [form_types] => edit [challan_slno] => 1 [challan_id] => HQ18-02-28/1 [zmr_unqiue_mr_id] => site_00_1 [approver_id] => user_003 [dc_no] => 1234 [date_enter] => 02/28/2018 [Indent_no] => 45566 [Vehicle_no] => od-05-7692 [LR_no] => 233 [LR_date] => 02/24/2018 [Project_No] => 02 [hqzis_slno] => Array ( [0] => 1 ) [zmrd_slno] => Array ( [0] => 3 ) [issue_qnty] => Array ( [0] => 34 ) [price] => Array ( [0] => 34 ) [totalprice] => Array ( [0] => 1156 ) [total_item] => 1 [hq_store_id] => hq1 [Next] => Save ) 


			$challan_slno=$_POST['challan_slno'];
			$challan_id=$_POST['challan_id'];
			$zmr_unqiue_mr_id=$_POST['zmr_unqiue_mr_id'];
			$approver_id=$_POST['approver_id'];
			$dc_no=$_POST['dc_no'];
			$date_enter=$_POST['date_enter'];
			$Indent_no=$_POST['Indent_no'];
			$Vehicle_no=$_POST['Vehicle_no'];
			$LR_no=$_POST['LR_no'];
			$LR_date=$_POST['LR_date'];
			$Project_No=$_POST['Project_No'];

			$hqzis_slno=$_POST['hqzis_slno'];
			$zmrd_slno=$_POST['zmrd_slno'];
			$issue_qnty=$_POST['issue_qnty'];
			$totalprice=$_POST['totalprice'];
			$price=$_POST['price'];

			$update_query1="UPDATE `lt_master_hq_challan_generate` SET `dc_no`='$dc_no',`date_enter`='$date_enter',`Indent_no`='$Indent_no',`Vehicle_no`='$Vehicle_no',`LR_no`='$LR_no',`LR_date`='$LR_date',`Project_No`='$Project_No' WHERE `hqcg_slno`='$challan_slno'";

			$update_query_exe1=mysqli_query($conn,$update_query1);

			for ($i=0; $i <count($hqzis_slno) ; $i++) {
				$challan=$hqzis_slno[$i];
				$zmrd_slno_id=$zmrd_slno[$i];
				$hqzis_issue_qnt=$issue_qnty[$i];
				$price_total=$totalprice[$i];
				$price_rate=$price[$i];

				$update_query2="UPDATE `lt_master_hq_issue_zonal_info` SET `hqzis_issue_qnt`='$hqzis_issue_qnt',`price_rate`='$price_rate',`price_total`='$price_total' WHERE `hqzis_slno`='$challan'";
				$update_query_exe2=mysqli_query($conn,$update_query2);

				$update_query3="UPDATE `lt_master_zonal_material_requsition_details` SET `zmrd_issue_qnt`='$hqzis_issue_qnt',`zmr_price_rate`='$price_rate',`zmr_total_price`='$price_total' WHERE `zmrd_slno`='$zmrd_slno_id'";
				$update_query_exe3=mysqli_query($conn,$update_query3);
			}
			$msg->success('Successfully Challan Is Updated');
			 			header('Location:index.php');
						exit;
				break;
			case 'send':
			// print_r($_POST);
			// exit;
			// Array ( [form_types] => edit [challan_slno] => 1 [challan_id] => HQ18-02-28/1 [zmr_unqiue_mr_id] => site_00_1 [approver_id] => user_003 [dc_no] => 1234 [date_enter] => 02/28/2018 [Indent_no] => 45566 [Vehicle_no] => od-05-7692 [LR_no] => 233 [LR_date] => 02/24/2018 [Project_No] => 02 [hqzis_slno] => Array ( [0] => 1 ) [zmrd_slno] => Array ( [0] => 3 ) [issue_qnty] => Array ( [0] => 34 ) [price] => Array ( [0] => 34 ) [totalprice] => Array ( [0] => 1156 ) [total_item] => 1 [hq_store_id] => hq1 [Next] => Save ) 

			$date=date('Y-m-d');
			$time-date('H:i:s');
			$challan_slno=$_POST['challan_slno'];
			$challan_id=$_POST['challan_id'];
			$zmr_unqiue_mr_id=$_POST['zmr_unqiue_mr_id'];
			$approver_id=$_POST['approver_id'];
			$dc_no=$_POST['dc_no'];
			$date_enter=$_POST['date_enter'];
			$Indent_no=$_POST['Indent_no'];
			$Vehicle_no=$_POST['Vehicle_no'];
			$LR_no=$_POST['LR_no'];
			$LR_date=$_POST['LR_date'];
			$Project_No=$_POST['Project_No'];

			$hqzis_slno=$_POST['hqzis_slno'];
			$zmrd_slno=$_POST['zmrd_slno'];
			$issue_qnty=$_POST['issue_qnty'];
			$totalprice=$_POST['totalprice'];
			$price=$_POST['price'];
			$place_to=$_POST['place_to'];
			$indent_date=$_POST['Indent_dated'];
			$update_query1="UPDATE `lt_master_hq_challan_generate` SET `dc_no`='$dc_no',`date_enter`='$date_enter',`Indent_no`='$Indent_no',`Vehicle_no`='$Vehicle_no',`LR_no`='$LR_no',`LR_date`='$LR_date',`Project_No`='$Project_No',`send_status`='1',`hqcg_status`='1',`Indent_dated`='$indent_date',`place_to`='$place_to' WHERE `hqcg_slno`='$challan_slno'";

			$update_query_exe1=mysqli_query($conn,$update_query1);

			for ($i=0; $i <count($hqzis_slno) ; $i++) {
				$challan=$hqzis_slno[$i];
				$zmrd_slno_id=$zmrd_slno[$i];
				$hqzis_issue_qnt=$issue_qnty[$i];
				$price_total=$totalprice[$i];
				$price_rate=$price[$i];

				$update_query2="UPDATE `lt_master_hq_issue_zonal_info` SET `hqzis_issue_qnt`='$hqzis_issue_qnt',`price_rate`='$price_rate',`price_total`='$price_total',`hqzis_issued_status`='1' WHERE `hqzis_slno`='$challan'";
				$update_query_exe2=mysqli_query($conn,$update_query2);

				$update_query3="UPDATE `lt_master_zonal_material_requsition_details` SET `zmrd_issue_qnt`='$hqzis_issue_qnt',`zmr_price_rate`='$price_rate',`zmr_total_price`='$price_total',`zmrd_issue_date`='$date',`zmrd_issue_time`='$time' WHERE `zmrd_slno`='$zmrd_slno_id'";
				$update_query_exe3=mysqli_query($conn,$update_query3);
			}

			$challan_detail="SELECT * FROM `lt_master_zonal_material_requsition` WHERE `zmr_unqiue_mr_id`='$zmr_unqiue_mr_id'";
			$sql_challan_detail=mysqli_query($conn,$challan_detail);
			$fetch_sql_challan_detail=mysqli_fetch_assoc($sql_challan_detail);

			$no_items_z=$fetch_sql_challan_detail['no_items_z'];
			$no_item_issued_z=$fetch_sql_challan_detail['no_item_issued_z'];
			$no_item_transfered_z=$fetch_sql_challan_detail['no_item_transfered_z'];
			$total_no_item_issued=$fetch_sql_challan_detail['total_no_item_issued'];
			$item=count($hqzis_slno);
			$update_no_item_issued_z=$no_item_issued_z+$item;

			$new_total_no_item_issued=$update_no_item_issued_z;
	##############################################################################################################
			if($new_total_no_item_issued==$no_items_z){
				$get_update="UPDATE `lt_master_zonal_material_requsition` SET `status`='2',`no_item_issued_z`='$update_no_item_issued_z',`total_no_item_issued`='$new_total_no_item_issued',`issuer_date`='$date',`issuer_time`='$time' where `zmr_unqiue_mr_id`='$zmr_unqiue_mr_id'";
			}else{
				$get_update="UPDATE `lt_master_zonal_material_requsition` SET `no_item_issued_z`='$update_no_item_issued_z',`total_no_item_issued`='$new_total_no_item_issued',`issuer_date`='$date',`issuer_time`='$time' where `zmr_unqiue_mr_id`='$zmr_unqiue_mr_id'";
			}

			$get_update_sql=mysqli_query($conn,$get_update);
			$lid=web_encryptIt($challan_slno);
			$site_list=web_encryptIt($challan_id);
			$msg->success('SuccessFully challan Issue to Zonal ');
			header('Location:hq_received_challan_prints.php?token_name='.$lid.'&Token_id='.$site_list.'&access='.web_encryptIt('3'));
						exit;
				break;
			
			default:
				# code...
				break;
		}

}else{
	header('Location:logout.php');
	exit;	
}