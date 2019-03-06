<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
if($_POST['center'] && $_POST['center']!="" ){
	$qry_centre="SELECT * FROM `center_master_data` where `examcenter`='$_POST[center]'";
		$sql_centre=mysqli_query($conn, $qry_centre);
		$res_centre=mysqli_fetch_array($sql_centre);
	
	echo $res_centre["sitting_capacity"];
	return;

}