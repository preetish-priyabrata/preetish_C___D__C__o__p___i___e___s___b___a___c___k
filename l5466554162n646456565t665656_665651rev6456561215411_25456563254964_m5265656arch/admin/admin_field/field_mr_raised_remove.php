<?php 
session_start();
if($_SESSION['admin_field']){
	require 'FlashMessages.php';
	include  '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();
	$title="Field User Raise Material Requsition form ";
	$field_place=$_SESSION['field_place'];
	$slno=web_decryptIt(str_replace(" ", "+", $_GET['slno']));
	$list=web_decryptIt(str_replace(" ", "+", $_GET['token_list']));
	$fmrd_slno=web_decryptIt(str_replace(" ", "+", $_GET['fmrd_slno']));
	$slno_en= $_GET['slno'];
	$list_en= $_GET['list'];
	$re=$_GET['re'];
	$query_check="SELECT * FROM `lt_master_field_material_requsition_details` WHERE `fmr_unqiue_mr_id_iteam`='$list'";
	$sql_item_exe=mysqli_query($conn,$query_check);
	echo $num=mysqli_num_rows($sql_item_exe);
	if($num==1){

		$msg->error("Atleast One Componet Is require For SMR");
		if($re==1){
		 		header('Location:field_mr_raised_detail.php?slno='.$slno_en.'&list='.$list_en);
		}else{
			header('Location:field_mr_raised_detail_edit.php?slno='.$slno_en.'&list='.$list_en);
		}
				exit;
	}else{
		$del="DELETE FROM `lt_master_field_material_requsition_details` WHERE `fmrd_slno`='$fmrd_slno'";
		$sql_item_exe=mysqli_query($conn,$del);
		$msg->success('Successfull Item Is delete From SMR');
		if($re==1){
		 	header('Location:field_mr_raised_detail.php?slno='.$slno_en.'&list='.$list_en);
		}else{
			header('Location:field_mr_raised_detail_edit.php?slno='.$slno_en.'&list='.$list_en);
		}
				exit;
	}
}else{
	header('Location:logout.php');
	exit;
}

// Array ( [slno] => TVGhMhqJNCoOSLGbQDiJe2LsbLRlyK eZ6vABEMsEZg= [list] => xB7wG 9bRl6DZba Tcz4UQjg2SpFo9rGX9Fy6DmQMLU= [zmrd_slno] => TVGhMhqJNCoOSLGbQDiJe2LsbLRlyK eZ6vABEMsEZg= ) 