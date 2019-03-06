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
	//print_r($_POST);
	//$form_type=web_decryptIt(str_replace(" ", "+", $_POST['form_type']));
   // [list_id] => site_00_1 [slno_id] => 1 [approver_id] => user_003/
		$hqcg_site_mr_id=$list_id=$_POST['list_id']; //zmr_unqiue_mr_id
		$slno_id=$_POST['slno_id']; // zmr_slno
	 	$userid=$_SESSION['admin_hq']; // user id hq
		$slno_item=$_POST['slno_item']; // zmrd_slno
        $hq_store_id=$_POST['hq_store_id']; // hq id
		$primarycode=$_POST['zmrd_primary_code']; //zmrd_primary_code
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
        	 $hqcg_item_issued=count($array_issue_primary);
 	 		 $challan_insert=" INSERT INTO `lt_master_hq_challan_generate`(`hqcg_slno`, `hqcg_site_mr_id`, `hqcg_item_issued`, `hqcg_date`, `hqcg_time`,`hqcg_issuer_id`) VALUES (NULL,'$hqcg_site_mr_id','$hqcg_item_issued','$date','$time','$userid')";

 	 		 $update_challan=mysqli_query($conn,$challan_insert);

 	 		 $last_id=mysqli_insert_id($conn);

 	 		 $challan="HQ".date('y-m-d')."/".$last_id;

 	  	   	 $update_challan_list="UPDATE `lt_master_hq_challan_generate` SET `hqcg_challan_no`='$challan' where `hqcg_slno`='$last_id'";
	 		 $update_challan_list_exe=mysqli_query($conn,$update_challan_list);

	 		 for($i=0; $i <count($array_issue_slno) ; $i++){
	 		 	$array_issue_slno_single=$array_issue_slno[$i];
             	$array_issue_primary_single=$array_issue_primary[$i];

             $check="SELECT * FROM `lt_master_zonal_material_requsition_details` WHERE `zmrd_slno`='$array_issue_slno_single'and `zmrd_issue_status`='0' and `zmrd_primary_code`='$array_issue_primary_single'";
	 		 $check_exe=mysqli_query($conn,$check);
	 		 $num_rows=mysqli_num_rows($check_exe);
	 		 if($num_rows==1){
	 		 $fetch_detail=mysqli_fetch_assoc($check_exe);

	 		 $hqzis_zonal_mr_id=$fetch_detail['zmr_unqiue_mr_id_iteam'];
             $hqzis_secondary_id=$fetch_detail['zmrd_second_code'];
             $hqzis_machine_id=$fetch_detail['zmrd_machine_no'];
             $hqzis_item_name=$fetch_detail['zmrd_name_item'];
             $hqzis_item_category_name=$fetch_detail['zmrd_category_name'];
             $hqzis_item_category_id=$fetch_detail['zmrd_category_id'];
             $hqzis_request_qnt=$fetch_detail['zmrd_request_qnt'];
             $hqzis_approve_qnt=$fetch_detail['zmrd_approved_qnt'];
             //$hqzis_item_slno_id=$fetch_detail['hqzis_item_slno_id'];
             //$hqzis_hq_present_stock=$fetch_detail['hqzis_hq_present_stock'];
             //$hqzis_issue_qnt=$fetch_detail['zmrd_issue_qnt'];
             //$hqzis_after_issued_stock=$fetch_detail['hqzis_after_issued_stock'];
             $hqzis_unit=$fetch_detail['zmrd_units_required'];    
             $hqzis_zonal_location_id=$fetch_detail['zmrd_site_location_id'];
             $hqzis_hq_location=$_SESSION['hq_store_id'];

             $insert_query="INSERT INTO `lt_master_hq_issue_zonal_info_temp`(`hqzis_slno`,`zmrd_slno`, `hqzis_challan_id`, `hqzis_zonal_mr_id`, `hqzis_primary_id`, `hqzis_secondary_id`, `hqzis_machine_id`, `hqzis_item_name`, `hqzis_item_category_name`, `hqzis_item_category_id`, `hqzis_request_qnt`, `hqzis_approve_qnt`, `hqzis_unit`, `hqzis_date`, `hqzis_time`, `hqzis_issued_status`, `hqzis_zonal_location_id`, `hqzis_hq_location`) VALUES (NULL,'$array_issue_slno_single','$challan','$hqzis_zonal_mr_id','$array_issue_primary_single','$hqzis_secondary_id','$hqzis_machine_id','$hqzis_item_name','$hqzis_item_category_name','$hqzis_item_category_id','$hqzis_request_qnt','$hqzis_approve_qnt','$hqzis_unit','$date','$time','0','$hqzis_zonal_location_id','$hqzis_hq_location')";

 			$query_exe=mysqli_query($conn,$insert_query);
 			// echo mysqli_error($conn);
 			// exit;
 			}
 	
           }
           $update3_laoction="UPDATE `lt_master_hq_challan_generate` SET `hqcg_hq_location_id`='$hqzis_hq_location',`hqcg_zonal_location_id`='$hqzis_zonal_location_id'WHERE`hqcg_slno`='$last_id'";

           $query_exe1=mysqli_query($conn,$update3_laoction);
			if(($update_challan=="1") && ($update_challan_list_exe=="1")){
				$msg->success('Please enter quantity to be issued');
		 		header('Location:approver_mr_raised_detail_issued_quantity.php?challan='.$challan);
				exit;
			}else{
				$msg->error('Something went wrong Please Try again!!!');
		 		header('Location:approver_mr_raised_detail_issued_quantity.php');
				exit;
			}
		}else{
			$lid=web_encryptIt($slno_id);
			$site_list=web_encryptIt($hqcg_site_mr_id);
			$msg->error('Please Select Minimum 1 Item To Initiate Process Of Issue!!!');
			header('Location:approver_mr_raised_detail_issue.php?slno='.$lid.'&list='.$site_list);
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



