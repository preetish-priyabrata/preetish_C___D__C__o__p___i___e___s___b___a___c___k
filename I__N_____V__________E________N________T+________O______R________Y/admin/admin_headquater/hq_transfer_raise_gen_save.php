<?php 
session_start();
if($_SESSION['admin_hq']){
	include  '../config.php';
	require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();


	$slno_transfer_id=$_POST['slno_transfer_id'];
	$request_id=web_decryptIt(str_replace(" ", "+", $_POST['request_id']));
	$primary_id=$_POST['primary_id'];
	$quantity=$_POST['quantity'];
	$sites=$_POST['sites'];
	$date=date('Y-m-d');
	$time=date('H:i:s');
	if(!empty($sites)){
		for ($i=0; $i <count($sites) ; $i++) { 
			$single_sites=$sites[$i];
			$insert_sites="INSERT INTO `lt_master_hq_request_site`(`slno`, `requested_id`, `requested_slno`, `primary`, `quantity`, `site_id`, `status`, `date`, `time`) VALUES (Null,'$request_id','$slno_transfer_id','$primary_id','$quantity','$single_sites','1','$date','$time')";
			$sql_insert_site=mysqli_query($conn,$insert_sites);
		}
			$update_reuest="UPDATE `lt_master_hq_transfer_mr_zonal` SET `request_status`='1',`request_date`='$date',`request_time`='$time' WHERE`slno_transfer_id`='$slno_transfer_id'";
				$sql_update_reuest=mysqli_query($conn,$update_reuest);
				$msg->success('Transfer Request Has Been Sent Sucessfully');
		 		header('Location:index.php');
				exit;
			}else{
				$msg->error('Something went wrong Please Try again!!!');
		 		header('Location:index.php');
				exit;
			}

}else{
	header('Location:logout.php');
	exit;
}