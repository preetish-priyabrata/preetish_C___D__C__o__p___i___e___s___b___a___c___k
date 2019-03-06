<?php
error_reporting(0);
session_start();
if($_SESSION['admin_hq'])
{
	// print_r($_POST);
	// exit;
	include  '../config.php';
	if(!empty($_POST['type'])){
	$type = $_POST['type'];
	$name = $_POST['name_startsWith'];
	$query = "SELECT * FROM `lt_master_item_detail` WHERE `status`='1' and`item_primary_code` LIKE '%".strtolower($name)."%'";
	$result = mysqli_query($conn, $query);
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$slno=$row['item_category_id'];
		$query2="SELECT * FROM `lt_master_item_category` WHERE `slno`='$slno'";
		$result2 = mysqli_query($conn, $query2);
		$row2 = mysqli_fetch_assoc($result2);
		
		$name = $row['slno'].'|'.$row['item_primary_code'].'|'.$row['item_second_code'].'|'.($row['item_name']).'|'.$row2['category_name'].'|'.$row['item_category_id'].'|'.$row['it_de_unit_m'];
		array_push($data, $name);
	}	
	echo json_encode($data);exit;
}
}