<?php
// print_r($_GET);
// exit;
session_start();
if($_SESSION['admin_zonal']){
	include '../config.php';
	$location_id=$_REQUEST['location_id'];
	$field_code=$_REQUEST['field_code'];
	$query12="SELECT * FROM `lt_master_zonal_stock_info` WHERE `zonal_location_id`='$location_id' and `zonal_primary_code`='$field_code'";
	$sql_query_exe1=mysqli_query($conn,$query12);

	$num=mysqli_num_rows($sql_query_exe1);
	$fetch_item=mysqli_fetch_assoc($sql_query_exe1);
	 
	if($num==0){
     echo 2;
			exit;
	}else{
		$zonal_qnty=$fetch_item['zonal_qnty'];
    	if($zonal_qnty>0){
             echo 1;
             exit;
		}else{
			echo 2;
			exit;
		}
	}

		//  echo mysqli_error($conn);
		exit;
		// header('Location:approver_mr_raised_detail_issue.php');
		// exit;
}else{
	header('Location:logout.php');
	exit;
}
?>