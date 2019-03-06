<?php
// print_r($_REQUEST);
include 'config.php';
$Category_names =strtolower(trim($_REQUEST['Category_names']));
$opt =strtolower(trim($_REQUEST['otp']));

	$query="SELECT * FROM `ilab_registration` where `status`='2' and `mobile_no`='$Category_names' and `otp_no`='$opt' ";
	$result=mysqli_query($conn,$query);
  	$num_rows=mysqli_num_rows($result);
  	if($num_rows==1){
  		
  		echo "1";
  		exit;
  	}else{
  		echo "2";
  		exit;
  	}