<?php 

// print_r($_POST);
// Array ( [state_id] => BR [district_id] => Gop [search_table] => 1 ) 
// <?php
// print_r($_POST);
error_reporting(E_ALL);
session_start();
include "config.php";
if($_SESSION['admin_emails']){
// Array ( [state_id] => BR ) 
if(!empty($_POST['state_id']) && !empty($_POST['district_id']) ){
	$state_id=trim($_POST['state_id']);
	$district_id=trim($_POST['district_id']);
	$search_table=trim($_POST['search_table']);
	
	$query_district_host1="SELECT * FROM `rhc_master_place_uphc` WHERE `place_state_id`='$state_id' AND `place_district_id`='$district_id'";
	$sql_exe_district_host1=mysqli_query($conn,$query_district_host1);
	$num_hos1=mysqli_num_rows($sql_exe_district_host1);	        	

	$query_district_host="SELECT * FROM `rhc_master_place_dh` WHERE `place_state_id`='$state_id' AND `place_district_id`='$district_id'";
	$sql_exe_district_host=mysqli_query($conn,$query_district_host);
	$num_hos=mysqli_num_rows($sql_exe_district_host);
		        	
	$query_block="SELECT * FROM `rhc_master_place_block` WHERE `place_state_id`='$state_id' AND `place_district_id`='$district_id' ORDER BY `rhc_master_place_block`.`block_name` ASC ";
	$sql_exe_block=mysqli_query($conn,$query_block);
	$num_block=mysqli_num_rows($sql_exe_block);
	$process="0";
	if($num_hos1!=0){
		$NUM1="1";
	}
	if($num_hos!=0){
		$NUM2="1";
	}
	if($num_block!=0){
		$NUM3="1";
	}
	$process=$NUM3.$NUM2.$NUM1;

	switch ($process) {
		case '111':
			echo "1";
			break;
		case '11':
			echo "1";
			break;
		case '1':
			echo "1";
			break;
			
		default:
			echo "0";
			break;
	}
		        	
}

}else{ 
		header('Location:logout.php');
		exit;
	}
	?>
	
   