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
if(!empty($_POST['state_id']) && !empty($_POST['district_id'])  && !empty($_POST['block_dh_uphc'])  ){
	$state_id=trim($_POST['state_id']);
	$district_id=trim($_POST['district_id']);
	$block_dh_uphc=trim($_POST['block_dh_uphc']);
	
	$query_phc="SELECT * FROM `rhc_master_place_phc` WHERE `place_state_id`='$state_id' AND `place_district_id`='$district_id' AND `place_block_id`='$block_dh_uphc'";
	$sql_exe_phc=mysqli_query($conn,$query_phc);
	$num_phc=mysqli_num_rows($sql_exe_phc);        	

	$query_aphc="SELECT * FROM `rhc_master_place_aphc` WHERE `place_state_id`='$state_id' AND `place_district_id`='$district_id' AND `place_block_id`='$block_dh_uphc'";
	$sql_exe_aphc=mysqli_query($conn,$query_aphc);
	$num_aphc=mysqli_num_rows($sql_exe_aphc);
		        	
	// $query_block="SELECT * FROM `rhc_master_place_block` WHERE `place_state_id`='$state_id' AND `place_district_id`='$district_id' ORDER BY `rhc_master_place_block`.`block_name` ASC ";
	// $sql_exe_block=mysqli_query($conn,$query_block);
	// $num_block=mysqli_num_rows($sql_exe_block);
	$process="0";
	if($num_phc!=0){
		$NUM1="1";
	}
	if($num_aphc!=0){
		$NUM2="1";
	}
	
	$process=$NUM2.$NUM1;

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
	
   