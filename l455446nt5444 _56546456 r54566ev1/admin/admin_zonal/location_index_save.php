<?php
session_start();
// print_r($_POST);
// Array ( [zonal_code] => zonal001 )
if($_SESSION['admin_zonal']){
	include  '../config.php';
require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
	$zonal_code=$_POST['zonal_code'];
	$query="SELECT * FROM `lt_master_zonal_place` WHERE `status`='1' and `zonal_code`='$zonal_code'";
	$sql_exe=mysqli_query($conn,$query);

	$res=mysqli_fetch_assoc($sql_exe);

	$_SESSION['zonal_place']=$res['zonal_code'];
    $_SESSION['top_place']=$res['hq_code']; 


	$msg->success('Welcome Site Store DashBoard');
    header('Location:zonal_dashboard.php');

    exit;

}else{
	header('Location:logout.php');
	exit;
}