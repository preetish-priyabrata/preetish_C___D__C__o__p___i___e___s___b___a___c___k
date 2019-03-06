<?php
session_start();
if($_SESSION['admin_zonal']){
  include  '../config.php';
  require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Welcome To Dashboard Of HeadQuarter Officer";
	// Array ( [example77_length] => 10 [slno_transfer_id] => 93Z/d1ygfbtPCPZ0WGuQwDDYiDCFkSlW29n6UYHfRrg= [requested_id] => LfvIa2W1yZwhwgbwXT4j1K+1b6wGVpbncQcRXNk7pyk= [slno] => 2 [primary_id] => 34567 [quantity] => 32 [no_days] => 70 [quantity_isssued] => 30 [submit] => Submit ) 
	$slno=$_POST['slno'];
	$primary_id=$_POST['primary_id'];
	$no_days=$_POST['no_days'];
	$quantity_isssued=$_POST['quantity_isssued'];
	$update_id="UPDATE `lt_master_hq_request_site` SET `approve_status`='1',`allow_days`='$no_days',`allow_quantity`='$quantity_isssued' where `slno`='$slno'";
	$sql_exe=mysqli_query($conn,$update_id);
	$msg->success('Tranfer Quantity Is Been Send To HeadQuarter');
    header("location:index.php");

}else{
header('Location:logout.php');
  exit;
}