<?php
// print_r($_GET);
// exit;
session_start();
ob_start();
if($_SESSION['admin_field']){
require 'FlashMessages.php';
include  '../config.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
$title="Zonal Updated Detail challan ";
$field_place=$_SESSION['field_place'];
// Array ( [token_name] => TVGhMhqJNCoOSLGbQDiJe2LsbLRlyK eZ6vABEMsEZg= [Token_id] => yuqnd6F 1LRqEgd2a2uN5vvVeohaPM2FYOJpg5ExDRI= [access] => w4LEXdqXcNdWDkqJ/nitm0SoLa5ummDOSd5H56Kb0Ok= ) 

 $slno=web_decryptIt(str_replace(" ", "+", $_GET['token_name']));
 $challan=web_decryptIt(str_replace(" ", "+", $_GET['Token_id'])); 
 $status=web_decryptIt(str_replace(" ", "+", $_GET['access']));
 $date=date('Y-m-d');
 $time=date('H:i:s');
 $get_details="SELECT * FROM `lt_master_field_maintenance_job_detail` WHERE `fmgd_job_id`='$challan'";
 $get_details_exe=mysqli_query($conn,$get_details);
 
 while ($fetch_item=mysqli_fetch_assoc($get_details_exe)){
  //print_r($fetch_item);
  		$fmgd_slno=$fetch_item['fmgd_slno'];

  		$fmgd_issue_quantity_id=$fetch_item['fmgd_issue_quantity_id'];
  		$fmgd_return_quantity=$fetch_item['fmgd_return_quantity'];
  		$fmgd_damage_quantity=$fetch_item['fmgd_damage_quantity'];

 	   	$used_quantity=$fmgd_issue_quantity_id-$fmgd_damage_quantity-$fmgd_return_quantity;
        $total_issued=$used_quantity;
         $Updated="UPDATE `lt_master_field_maintenance_job_detail` SET `date`='$date',`time`='$time',`total_issued`='$used_quantity' WHERE `fmgd_slno`='$fmgd_slno'";
        $update_exe=mysqli_query($conn,$Updated);
}

 		$Updated1="UPDATE `lt_master_field_maintenance_job` SET `fmg_status`='1' WHERE `fmg_slno`='$slno'and `fmg_job_id`='$challan'";
		$update_exe1=mysqli_query($conn,$Updated1);

 		$msg->success('Job Completed Success-Fully');
	 		   header('Location:index.php');
			   exit;
}else{
	header('Location:logout.php');
	exit;
}


?>