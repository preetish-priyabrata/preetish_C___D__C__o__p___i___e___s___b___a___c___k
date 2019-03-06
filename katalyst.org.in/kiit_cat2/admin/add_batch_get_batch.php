<?php 
session_start();
if (($_SESSION['userId']!="")) {
	
	include 'config.php';
	$batch=strtolower($_POST['batchs']);
	$check="SELECT * FROM `tbl_batch` WHERE `batch_name`='$batch'";
	$sql_check=mysqli_query($conn,$check);
	$num=mysqli_num_rows($sql_check);
	if($num=='0'){
		echo '1';
		exit;
	}else{
		echo '0';
		exit;
	}
}else{
	header('Location:logout.php');
    exit;
}