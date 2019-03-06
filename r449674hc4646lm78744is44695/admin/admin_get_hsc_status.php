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
if(!empty($_POST['state_id']) && !empty($_POST['district_id'])  && !empty($_POST['block_dh_uphc']) && !empty($_POST['phc_ids'])  ){
	$state_id=trim($_POST['state_id']);
	$district_id=trim($_POST['district_id']);
	$block_dh_uphc=trim($_POST['block_dh_uphc']);
  $phc_ids=trim($_POST['phc_ids']);

	
		$query_hsc="SELECT * FROM `rhc_master_place_phc_sub_center` WHERE `place_state_id`='$state_id' AND `place_district_id`='$district_id' AND `place_block_id`='$block_dh_uphc' and `place_phc_id`='$phc_ids'";  	


	$sql_exe_hsc=mysqli_query($conn,$query_hsc);
	$num_hsc=mysqli_num_rows($sql_exe_hsc);
		        	
	// $query_block="SELECT * FROM `rhc_master_place_block` WHERE `place_state_id`='$state_id' AND `place_district_id`='$district_id' ORDER BY `rhc_master_place_block`.`block_name` ASC ";
	// $sql_exe_block=mysqli_query($conn,$query_block);
	// $num_block=mysqli_num_rows($sql_exe_block);
	
	
	if($num_hsc!=0){
		$num=1;
	}else{
		$num=0;
	}

	switch ($num) {		
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
	
   