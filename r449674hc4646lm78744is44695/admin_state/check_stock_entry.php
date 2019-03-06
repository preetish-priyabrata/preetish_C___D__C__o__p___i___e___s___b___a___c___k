<?php 
error_reporting(E_ALL);
session_start();
include "config.php";
date_default_timezone_set("Asia/Kolkata");
// print_r($_REQUEST);

$date=date('Y-m-d');

// print_r($_POST);
// 
// Array
// (
//     [item_code] => ocp
//     [item_type] => f
//     [bill] => 111
//     [batch_no] => 22
// )
// 
$item_code=$_POST['item_code'];
$item_type=$_POST['item_type'];
$bill=$_POST['bill'];
$batch_no=$_POST['batch_no'];
if($item_code!="" && $item_type!="" && $bill!="" && $batch_no!=""){
$query="SELECT * FROM `rhc_master_state_stock_level` WHERE `item_code`='$item_code' and `challan_no`='$bill' and `item_type`='$item_type' and `batch_no`='$batch_no' and `status_qc`='0'";
$sql_exe=mysqli_query($conn,$query);
$num=mysqli_num_rows($sql_exe);
if($num==0){
echo "1";
exit;
}else{
echo "2";
exit;
}
}else{
	echo "0";
	exit;
}
