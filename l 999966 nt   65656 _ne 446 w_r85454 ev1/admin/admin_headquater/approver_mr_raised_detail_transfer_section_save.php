<?php
session_start();
if($_SESSION['admin_hq']){
	require 'FlashMessages.php';
	include '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();
		$mr_id=$hqcg_site_mr_id=$list_id=$_POST['list_id']; //zmr_unqiue_mr_id
		$mr_slno=$slno_id=$_POST['slno_id']; // zmr_slno
	 	$userid=$_SESSION['admin_hq']; // user id hq
		$slno_item=$_POST['slno_item']; // zmrd_slno
        $location_to=$hq_store_id=$_POST['hq_store_id']; // hq id
		$primarycode=$_POST['zmrd_primary_code']; //zmrd_primary_code
		$action=$_POST['action'];
		$entry_date=$date=date('y-m-d');
		$entry_time=$time=date('H:i:s');
		$location_from=$zonal_code=$_POST['zonal_code'];
		$zmrd_approved_qnt=$_POST['zmrd_approved_qnt'];
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
				$zmrd_approved_qnt_array[]=$zmrd_approved_qnt[$i];
			}
        }
        $no_item_issued_z=count($zmrd_approved_qnt_array);
        if(!empty($array_transfer_slno)){
	        for ($i=0; $i <count($array_transfer_slno) ; $i++) { 
	        	$primary_id=$array_transfer_primary[$i];
	        	$slno_mr_id=$array_transfer_slno[$i];
	        	$quantity=$zmrd_approved_qnt_array[$i];
	        	$status=1;
	        	$insert="INSERT INTO `lt_master_hq_transfer_mr_zonal`(`slno_transfer_id`,`slno_mr_id`, `primary_id`, `quantity`, `mr_id`, `mr_slno`, `location_from`, `location_to`, `status`, `entry_date`, `entry_time`) VALUES (Null,'$slno_mr_id','$primary_id','$quantity','$mr_id','$mr_slno','$location_from','$location_to','$status','$entry_date','$entry_time')";
	        	$sql_insert=mysqli_query($conn,$insert);
	        	//echo mysqli_error($conn);
	 	 		$last_id=mysqli_insert_id($conn);

	 	 		$challan=date('y-m-d').'-'."hq-trasfer/".$last_id;
	 	 		$update_trasfer="UPDATE `lt_master_hq_transfer_mr_zonal` SET `request_id`='$challan' where `slno_transfer_id`='$last_id'";

	 	 		$sql_update_trasfer=mysqli_query($conn,$update_trasfer);

	 	 		$update_mr_detail="UPDATE `lt_master_zonal_material_requsition_details` SET `transfer_status`='1' where `zmrd_slno`='$slno_mr_id' and `zmr_unqiue_mr_id_iteam`='$mr_id'";
	 	 		$sql_update_mr_detail=mysqli_query($conn,$update_mr_detail);

	        }

	        $challan_detail="SELECT * FROM `lt_master_zonal_material_requsition` WHERE `zmr_unqiue_mr_id`='$hqcg_site_mr_id'";
			$sql_challan_detail=mysqli_query($conn,$challan_detail);
			$fetch_sql_challan_detail=mysqli_fetch_assoc($sql_challan_detail);
			$no_item_transfered_z=$fetch_sql_challan_detail['no_item_transfered_z'];
			$update_no_item_transfered_z=$no_item_issued_z+$no_item_transfered_z;
			$get_update_mr="UPDATE `lt_master_zonal_material_requsition` SET `no_item_transfered_z`='$update_no_item_transfered_z'  where `zmr_unqiue_mr_id`='$hqcg_site_mr_id'";
			$sql_get_update_mr=mysqli_query($conn,$get_update_mr);

			// exit;
			if(($sql_get_update_mr=="1")){
				$msg->success('Transfer Request Has Been Raised Succesfully.');
		 		header('Location:index.php');
				exit;
			}else{
				$msg->error('Something went wrong Please Try again!!!');
		 		header('Location:index.php');
				exit;
			}
		}else{
			$lid=web_encryptIt($slno_id);
			$site_list=web_encryptIt($hqcg_site_mr_id);
			$msg->error('Please Select For Transfer Of Commponet !!!');
			header('Location:approver_mr_raised_detail_transfer.php?slno='.$lid.'&list='.$site_list);
			exit;
		}


}else{
	header('Location:logout.php');
	exit;	
}
