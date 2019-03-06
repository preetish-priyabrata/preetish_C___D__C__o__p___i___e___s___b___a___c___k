<?php

// Array ( [token_name] => TVGhMhqJNCoOSLGbQDiJe2LsbLRlyK eZ6vABEMsEZg= [token_id] => YBJGwYwpQbZIEM LHmucN/I/ELApltX0ozKGKvlEfbw= [status] => w4LEXdqXcNdWDkqJ/nitm0SoLa5ummDOSd5H56Kb0Ok= ) 
// print_r($_GET);
//  exit;
session_start();
ob_start();
if($_SESSION['admin_hq']){
require 'FlashMessages.php';
include  '../config.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
$title="Headquater Updated Details Transfer ";
$hq_store_id=$_SESSION['hq_store_id'];

 $slno=web_decryptIt(str_replace(" ", "+", $_GET['token_name']));
 $challan=web_decryptIt(str_replace(" ", "+", $_GET['token_id'])); 
 $status=web_decryptIt(str_replace(" ", "+", $_GET['status']));

 $slno_transfer_id=$slno;
 $date=date('Y-m-d');
 $time=date('H:i:s');

   $Updated1="UPDATE `lt_master_hq_transfer_mr_zonal` SET `issue_status`='1',`issue_date`='$date',`issue_time`='$time' WHERE `slno_transfer_id`='$slno_transfer_id'";
   $update_exe1=mysqli_query($conn,$Updated1);

   if ($update_exe1) {
  
   		$msg->success('Transfer Updated Success-Fully');
	 		   header('Location:index.php');
	 		   exit;
	  }

  else{

  	   $msg->error('Error in connection');
	        header('Location:index.php');
	 	    exit;
	  }

}

else{
	header('Location:logout.php');
	exit;
}
$contents = ob_get_contents();
ob_clean();
include 'templete/header.php';


?>