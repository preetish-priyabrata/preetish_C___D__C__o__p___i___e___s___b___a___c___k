<?php

error_reporting(0);
session_start();
if($_SESSION['admin_field']){
	
	include  '../config.php';
	if(!empty($_POST['type'])){
		$type = $_POST['type'];
		$name = $_POST['name_startsWith'];
		$location_type = $_POST['location_type'];
		if($type=='productName'){
			$query = "SELECT * FROM `lt_master_field_stock_info` WHERE `field_location_id`='$location_type' and`field_component_name` LIKE '%".strtolower($name)."%'";
			$result = mysqli_query($conn, $query);
			$data = array();
			while ($row = mysqli_fetch_assoc($result)) {
				$slno=$row['item_category_id'];
				$query2="SELECT * FROM `lt_master_item_category` WHERE `slno`='$slno'";
				$result2 = mysqli_query($conn, $query2);
				$row2 = mysqli_fetch_assoc($result2);
				
				$name = $row['field_slno'].'|'.$row['field_primary_code'].'|'.$row['field_secondary_code'].'|'.($row['field_component_name']).'|'.$row['field_component_id'].'|'.$row['field_category_name'].'|'.$row['field_category_id'].'|'.$row['field_unit'].'|'.$row['field_qnty'];
				array_push($data, $name);
			}	
			echo json_encode($data);exit;
		}else{
			$query = "SELECT * FROM `lt_master_field_stock_info` WHERE `field_location_id`='$location_type' and`field_secondary_code` LIKE '%".strtolower($name)."%'";
			$result = mysqli_query($conn, $query);
			$data = array();
			while ($row = mysqli_fetch_assoc($result)) {
				$slno=$row['item_category_id'];
				$query2="SELECT * FROM `lt_master_item_category` WHERE `slno`='$slno'";
				$result2 = mysqli_query($conn, $query2);
				$row2 = mysqli_fetch_assoc($result2);
				
				$name = $row['field_slno'].'|'.$row['field_primary_code'].'|'.$row['field_secondary_code'].'|'.($row['field_component_name']).'|'.$row['field_component_id'].'|'.$row['field_category_name'].'|'.$row['field_category_id'].'|'.$row['field_unit'].'|'.$row['field_qnty'];
				array_push($data, $name);
			}	
			echo json_encode($data);exit;
		}
	}
}