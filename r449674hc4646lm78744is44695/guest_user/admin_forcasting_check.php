<?php
// print_r($_POST);
// Array
// (
//     [place_id] => Ara
//     [item_code] => ocp
//     [item_type] => f
//     [Quantity] => 22
//     [status_places] => 2
// )
session_start();
if($_SESSION['admin_emails']){
require 'config.php';
	if($_POST['place_id']!="" && $_POST['item_code']!="" && $_POST['item_type']!="" && $_POST['Quantity']!="" && $_POST['status_places']!=""){
		$place_id=$_POST['place_id'];
		$item_code=$_POST['item_code'];
		$item_type=$_POST['item_type'];
		$Quantity=$_POST['Quantity'];
		$status_places=$_POST['status_places'];
		$query_check="SELECT * FROM `rhc_master_forcasting_indent` WHERE `place_id`='$place_id' And `item_code`='$item_code' And `item_type`='$item_type' AND `place_status`='$status_places'";
		$sql_exe_check=mysqli_query($conn,$query_check);
		$num=mysqli_num_rows($sql_exe_check);
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

}else{
	header('Location:logout.php');
	exit;
}