<?php
//print_r($_POST);
// print_r($_GET);Array ( [token_name] => TVGhMhqJNCoOSLGbQDiJe2LsbLRlyK eZ6vABEMsEZg= [token_id] => N9/smQ7QI1YOU/XHTR xbtAod6PgzXJWWdEgMymSElo= ) 
session_start();
if($_SESSION['admin_zonal']){
	include  '../config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
	$title="Welcome To Dashboard Of HeadQuarter Officer";
	$zonal_slno=web_decryptIt(str_replace(" ", "+", $_GET['token_name'])); //zmr_slno
	$field_damage_challan=$zonal_secondary_code=web_decryptIt(str_replace(" ", "+", $_GET['token_id']));
	$zonal_place=$_SESSION['zonal_place'];
    $date=date('y-m-d');
    $time=date('H:i:s');
	$Requsition_query="SELECT * FROM `lt_master_field_internal_damage_info` WHERE `fsindi_challan_no`='$field_damage_challan'";
	$user_receiver_id=$_SESSION['admin_zonal'];
	$sql_Requsition_exe=mysqli_query($conn,$Requsition_query);
	while ($result=mysqli_fetch_assoc($sql_Requsition_exe)) {

		$fsindi_secondary_code=$result['fsindi_secondary_code'];
		$fsindi_qnt=$result['fsindi_qnt'];

		$sql_query="SELECT * FROM `lt_master_zonal_stock_info` WHERE `zonal_secondary_code`='$fsindi_secondary_code' and `zonal_location_id`='$zonal_place'";
		$sql_Requsition_exe1=mysqli_query($conn,$sql_query);
		$results=mysqli_fetch_assoc($sql_Requsition_exe1);

		$zonal_slno=$results['zonal_slno'];
		$zonal_qnty=$results['zonal_qnty'];
		$rate_price_unit=$results['rate_price_unit'];
		$total_price=$results['total_price'];
		$new_tem_total=$rate_price_unit*$zonal_qnty;
		$new_total=$new_tem_total+$total_price;
		$new_damage_loss=$zonal_qnty+$fsindi_qnt;

		 $update="UPDATE `lt_master_zonal_stock_info` SET `zonal_qnty`='$new_damage_loss',`total_price`='$new_total' WHERE`zonal_slno`='$zonal_slno'";
		$sql_update=mysqli_query($conn,$update);
	}
	$update_challan="UPDATE `lt_master_field_challan_damage` SET `receive_status`='1',`date_receive`='$date',`time_receive`='$time',`user_receiver_id`='$user_receiver_id' where `field_damage_challan`='$field_damage_challan'";
	$sql_update_challan=mysqli_query($conn,$update_challan);
	
	if($sql_update_challan){
		$msg->success('Successfully Receive Of Return Challan');
		header('Location:index.php');
		exit;	
	}else{
		$msg->error('Something went Worng');
		header('Location:index.php');
		exit;	
	}

}else{
	header('Location:logout.php');
	exit;
}