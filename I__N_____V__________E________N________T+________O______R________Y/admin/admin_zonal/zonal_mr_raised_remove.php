<?php 
session_start();
if($_SESSION['admin_zonal']){
	require 'FlashMessages.php';
	include  '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();
	$title="Zonal User Raise Material Requsition form ";
	$zonal_place=$_SESSION['zonal_place'];
	$slno=web_decryptIt(str_replace(" ", "+", $_GET['slno']));
	$list=web_decryptIt(str_replace(" ", "+", $_GET['list']));
	$zmrd_slno=web_decryptIt(str_replace(" ", "+", $_GET['zmrd_slno']));
	$slno_en= $_GET['slno'];
	$list_en= $_GET['list'];
	$re=$_GET['re'];
	$query_check="SELECT * FROM `lt_master_zonal_material_requsition_details` WHERE `zmr_unqiue_mr_id_item`='$list'";
	$sql_item_exe=mysqli_query($conn,$query_check);
	echo $num=mysqli_num_rows($sql_item_exe);
	if($num==1){

		$msg->error("Atleast One Componet Is require For SMR");
		if($re==1){
		 		header('Location:zonal_mr_raised_detail.php?slno='.$slno_en.'&list='.$list_en);
		}else{
			header('Location:zonal_mr_raised_detail_edit.php?slno='.$slno_en.'&list='.$list_en);
		}
				exit;
	}else{
		$del="DELETE FROM `lt_master_zonal_material_requsition_details` WHERE `zmrd_slno`='$zmrd_slno'";
		$sql_item_exe=mysqli_query($conn,$del);
		$msg->success('Successfull Item Is delete From SMR');
		if($re==1){
		 	header('Location:zonal_mr_raised_detail.php?slno='.$slno_en.'&list='.$list_en);
		}else{
			header('Location:zonal_mr_raised_detail_edit.php?slno='.$slno_en.'&list='.$list_en);
		}
				exit;
	}
}else{
	header('Location:logout.php');
	exit;
}

// Array ( [slno] => TVGhMhqJNCoOSLGbQDiJe2LsbLRlyK eZ6vABEMsEZg= [list] => xB7wG 9bRl6DZba Tcz4UQjg2SpFo9rGX9Fy6DmQMLU= [zmrd_slno] => TVGhMhqJNCoOSLGbQDiJe2LsbLRlyK eZ6vABEMsEZg= ) 