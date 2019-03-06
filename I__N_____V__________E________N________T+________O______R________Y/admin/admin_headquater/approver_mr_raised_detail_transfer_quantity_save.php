<?php
print_r($_POST);
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if($_SESSION['admin_hq']){
	require 'FlashMessages.php';
	include '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();
	//print_r($_POST);
	
	//$form_type=web_decryptIt(str_replace(" ", "+", $_POST['form_type']));

		$hqcg_site_mr_id=$_POST['list_id']; //zmr_unqiue_mr_id
		$slno_id=$_POST['slno_id']; // zmr_slno
	 	$userid=$_SESSION['admin_hq']; // user id hq
		$slno_item=$_POST['slno_item']; // zmrd_slno
        //$hq_store_id=$_POST['hq_store_id']; // hq id
        //$hqcg_item_issued=$_POST['hqcg_item_issued'];
        //$hqcg_challan_no=$_POST['hqcg_challan_no'];
		$primarycode=$_POST['hq_primary_code']; //hq_primary_code
		//$action=$_POST['action'];
		$date=date('y-m-d');
		$time=date('H:i:s');
		$hqzis_request_qnt=$_POST['hqzis_request_qnt'];
		$hqzis_approve_qnt=$_POST['hqzis_approve_qnt'];
		$hqzis_issue_qnt=$_POST['hqzis_issue_qnt'];
		//$hqzis_unit=$_POST['hqzis_unit'];

		for ($i=1; $i < count($slno_item) ; $i++) { 

			$array_issue_slno_single=$slno_item[$i];
            $array_issue_primary_single=$primarycode[$i];

			$last_id=mysqli_insert_id($conn);

 	 		$challan="HQ".date('y-m-d')."/".$last_id;

	echo $update_issue="UPDATE `lt_master_hq_issue_zonal_info_temp` SET `zmrd_slno`='$array_issue_slno_single',`hqzis_primary_id`='$array_issue_primary_single',`hqzis_request_qnt`=$hqzis_request_qnt,`hqzis_approve_qnt`='$hqzis_approve_qnt',`hqzis_issue_qnt`='$hqzis_issue_qnt',`hqzis_date`='$date',`hqzis_time`='$time',`hqzis_issued_status`='1' WHERE `hqzis_challan_id`='$challan',`hqzis_slno`='$slno_item'";
			$sql_update_exe=mysqli_query($conn,$update_issue);
			 echo mysqli_error($conn,$sql_update_exe);
			 exit;

			$update_stock_list="UPDATE `lt_master_hq_stock_info` SET `hq_primary_code`='$primarycode',`hq_qnty`='$hqzis_issue_qnt',`hq_date`='$date',`hq_time`='$time' WHERE `hq_slno`='$slno_item'";
			$sql_update_stock_list=mysqli_query($conn,$update_stock_list);

           }

		if(($sql_update_stock_list=="1") && ($sql_update_exe=="1")){
			$msg->success('Issued SuccessFully');
	 		header('Location:headquarter_dashboard.php');
			exit;
		}else{
			$lid=web_encryptIt($result['slno_id']);
			$site_list=web_encryptIt($result['list_id']);
			$msg->error('Something went wrong Please Try again!!!');
	 		header('Location:headquarter_dashboard.php');
			exit;
		}	

}else{
	header('Location:logout.php');
	exit;
}