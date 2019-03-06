
<?php
session_start();
ob_start();
if($_SESSION['admin_zonal']){
require 'FlashMessages.php';
require '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
	//print_r($_POST);
	//$form_type=web_decryptIt(str_replace(" ", "+", $_POST['form_type']));
   // [list_id] => site_00_1 [slno_id] => 1 [approver_id] => user_003/
		$zqcg_site_mr_id=$list_id=$_POST['list_id']; //zmr_unqiue_mr_id
		$slno_id=$_POST['slno_id']; // zmr_slno
	 	$userid=$_SESSION['admin_zonal']; // user id zonal
		$slno_item=$_POST['slno_item']; // zmrd_slno
		$zonal_place-$_POST['zonal_place'];
        $hq_store_id=$_POST['hq_store_id']; // hq id
		$primarycode=$_POST['fmrd_primary_code']; //zmrd_primary_code
		$action=$_POST['action'];
		$date=date('y-m-d');
		$time=date('H:i:s');
		$array_transfer_primary=$array_transfer_slno=$array_issue_primary=$array_issue_slno=array();

		for ($i=0; $i <count($slno_item) ; $i++) { 

			if ($action[$i]==1){
				$array_issue_slno[]=$slno_item[$i];
				$array_issue_primary[]=$primarycode[$i];
			}
			if ($action[$i]==2) //transfer
			{
				$array_transfer_slno[]=$slno_item[$i];
				$array_transfer_primary[]=$primarycode[$i];
			}
        }
        // echo "<pre>";
        // print_r($action);
        // print_r($slno_item);
        // print_r($array_issue_slno);
        // print_r($primarycode);
        // print_r($array_issue_primary);
        // exit();

        if(!empty($array_issue_primary)){
        	 $zqcg_item_issued=count($array_issue_primary);
 	 		 $challan_insert=" INSERT INTO `lt_master_zonal_challan_generate`(`zqcg_slno`, `zqcg_site_mr_id`, `zqcg_item_issued`, `zqcg_date`, `zqcg_time`,`zqcg_issuer_id`) VALUES (NULL,'$zqcg_site_mr_id','$zqcg_item_issued','$date','$time','$userid')";

 	 		 $update_challan=mysqli_query($conn,$challan_insert);

 	 		 $last_id=mysqli_insert_id($conn);

 	 		 $challan="HQ".date('y-m-d')."/".$last_id;

 	  	   	 $update_challan_list="UPDATE `lt_master_zonal_challan_generate` SET `zqcg_challan_no`='$challan' where `zqcg_slno`='$last_id'";
	 		 $update_challan_list_exe=mysqli_query($conn,$update_challan_list);

	 		 for($i=0; $i <count($array_issue_slno) ; $i++){
	 		 	$array_issue_slno_single=$array_issue_slno[$i];
             	$array_issue_primary_single=$array_issue_primary[$i];

             $check="SELECT * FROM `lt_master_field_material_requsition_details` WHERE `fmrd_slno`='$array_issue_slno_single'and `fmrd_issue_status`='0' and `fmrd_primary_code`='$array_issue_primary_single'";
	 		 $check_exe=mysqli_query($conn,$check);
	 		 $num_rows=mysqli_num_rows($check_exe);
	 		 if($num_rows==1){
	 		 $fetch_detail=mysqli_fetch_assoc($check_exe);

	 		 $zqzis_zonal_mr_id=$fetch_detail['fmr_unqiue_mr_id_iteam'];
             $zqzis_secondary_id=$fetch_detail['fmrd_second_code'];
             $zqzis_machine_id=$fetch_detail['fmrd_machine_no'];
             $zqzis_item_name=$fetch_detail['fmrd_name_item'];
             $zqzis_item_category_name=$fetch_detail['fmrd_category_name'];
             $zqzis_item_category_id=$fetch_detail['fmrd_category_id'];
             $zqzis_request_qnt=$fetch_detail['fmrd_request_qnt'];
             $zqzis_approve_qnt=$fetch_detail['fmrd_avaliable_qnt'];
             //$hqzis_item_slno_id=$fetch_detail['hqzis_item_slno_id'];
             //$hqzis_hq_present_stock=$fetch_detail['hqzis_hq_present_stock'];
             //$hqzis_issue_qnt=$fetch_detail['zmrd_issue_qnt'];
             //$hqzis_after_issued_stock=$fetch_detail['hqzis_after_issued_stock'];
             $zqzis_unit=$fetch_detail['fmrd_units_required'];    
             $zqzis_field_location_id=$fetch_detail['fmrd_site_location_id'];
             $zqzis_zonal_location=$_SESSION['zonal_place'];
       
             $insert_query="INSERT INTO `lt_master_zonal_issue_field_info_temp`(`zqzis_slno`,`fmrd_slno`, `zqzis_challan_id`, `zqzis_zonal_mr_id`, `zqzis_primary_id`, `zqzis_secondary_id`, `zqzis_machine_id`, `zqzis_item_name`, `zqzis_item_category_name`, `zqzis_item_category_id`, `zqzis_request_qnt`, `zqzis_approve_qnt`, `zqzis_unit`, `zqzis_date`, `zqzis_time`, `zqzis_issued_status`, `zqzis_field_location_id`, `zqzis_zonal_location`) VALUES (NULL,'$array_issue_slno_single','$challan','$zqzis_zonal_mr_id','$array_issue_primary_single','$zqzis_secondary_id','$zqzis_machine_id','$zqzis_item_name','$zqzis_item_category_name','$zqzis_item_category_id','$zqzis_request_qnt','$zqzis_request_qnt','$zqzis_unit','$date','$time','0','$zqzis_field_location_id','$zqzis_zonal_location')";

 			$query_exe=mysqli_query($conn,$insert_query);

 			// echo mysqli_error($conn);
 			// exit;
 			}
 	
           }
           $update3_laoction="UPDATE `lt_master_zonal_challan_generate` SET `zqcg_hq_location_id`='$zqzis_zonal_location',`zqcg_zonal_location_id`='$zqzis_field_location_id'WHERE`zqcg_slno`='$last_id'";

           $query_exe1=mysqli_query($conn,$update3_laoction);
			if(($update_challan=="1") && ($update_challan_list_exe=="1")){
				$msg->success('Please enter quantity to be issued');
		 		header('Location:zonal_mr_field_new_issue_quantity.php?challan='.$challan);
				exit;
			}else{
				$msg->error('Something went wrong Please Try again!!!');
		 		header('Location:zonal_mr_field_new_issue_quantity.php');
				exit;
			}
		}else{
			$lid=web_encryptIt($slno_id);
			$site_list=web_encryptIt($list_id);
			$msg->error('Please Select Any Requisition Item To Initiate Issue Process!!!');
			header('Location:zonal_mr_field_new_issue.php?token_name='.$lid.'&Token_id='.$site_list);
			exit;
		}

	}else{
		header('Location:logout.php');
		exit;	
	}

// }else{
// 	header('Location:logout.php');
// 	exit;
// }



