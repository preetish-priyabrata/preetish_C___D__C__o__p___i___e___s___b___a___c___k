
<?php 
session_start();
print_r($_POST);
if($_SESSION['admin_field']){
	require 'FlashMessages.php';
	include '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();

	$field_slno=$_POST['field_slno'];
	$field_primary_code=$_POST['field_primary_code'];
	$field_secondary_code=$_POST['field_secondary_code'];
	$field_component_name=$_POST['field_component_name'];
	$field_component_id=$_POST['field_component_id'];
	$field_category_name=$_POST['field_category_name'];
	$field_category_id=$_POST['field_category_id'];
	$field_unit=$_POST['field_unit'];
	$field_qnty=$_POST['field_qnty'];
	$damage_loss=$_POST['damage_loss'];
	$damage_loss_status=$_POST['damage_loss_status'];
	$fqt_transfer_location=$field_location_id=$_POST['field_location_id'];
	$damage_qnty=$_POST['damage_qnty'];
	$date=date('Y-m-d');
	$time=date('H:i:s');
	$damage_loss_s=$damage_loss+$damage_qnty;
	$closed=$field_qnty-$damage_qnty;

	 $insert="INSERT INTO `lt_master_field_stock_transfer_info`(`fqt_slno`, `fqt_primary_code`, `fqt_secondary_code`, `fqt_component_name`, `fqt_component_id`, `fqt_category_name`, `fqt_category_id`, `fqt_unit`, `fqt_qnty`, `fqt_date`, `fqt_time`, `fqt_location_id`, `fqt_transfer_location`, `fqt_transfer_type`, `fqt_remark`, `fqt_opening_balance`, `fqt_closing_balance`, `damage_loss`, `damage_loss_status`) VALUES (Null,'$field_primary_code','$field_secondary_code','$field_component_name','$field_component_id','$field_category_name','$field_category_id','$field_unit','$damage_qnty','$date','$time','$field_location_id','$fqt_transfer_location','5','damage was found please in stock','$field_qnty','$closed','$damage_qnty','1')";

	$sql_insert=mysqli_query($conn,$insert);

	// echo mysqli_error($conn);

	// exit;

	$update="UPDATE `lt_master_field_stock_info` SET `damage_loss`='$damage_loss_s',`field_qnty`='$closed',`damage_loss_status`='1' WHERE  `field_slno`='$field_slno'";

	$sql_update=mysqli_query($conn,$update);

	if(($sql_insert) && ($sql_update)){
		$msg->success('Successfully Transfer For Field For Damage Use');
		header('Location:index.php');
		exit;	
	}else{
		$msg->error('Something went Worng');
		header('Location:index.php');
		exit;	
	}

}else{
	header('Location:logout.php');
	exit;
}
?>