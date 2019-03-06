<?php
session_start();
if($_SESSION['admin_field']){
	require 'FlashMessages.php';
	include  '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages(); 
	$form_type=web_decryptIt(str_replace(" ", "+",$_POST['form_type']));
	$date=date('Y-m-d');
	$time=date('H:i:s');
	if($form_type=='field_job1'){
		$user_location=$_POST['user_location'];
		$date_info=$_POST['date_info'];
		$maintenance_id=$_POST['maintenance_id'];
		$Time_info=$_POST['Time_info'];
		$machine_no=$_POST['machine_no'];
		$model_id=$_POST['model_id'];
		$slno=$_POST['slno'];
		$secondary=$_POST['secondary'];
		$primary=$_POST['primary'];
		$itemname=$_POST['itemname'];
		$itemname_id=$_POST['itemname_id'];
		$catergory=$_POST['catergory'];
		$catergoryNO=$_POST['catergoryNO'];
		$unit=$_POST['unit'];
		$qnty_av=$_POST['qnty_av'];
		$qnty=$_POST['qnty'];
		$notes=$_POST['notes'];
		
		$fmg_no_item=count($secondary);
		$insert="INSERT INTO `lt_master_field_maintenance_job`(`fmg_slno`, `fmg_machine_id`, `fmg_model_id`, `fmg_field_location`, `fmg_status`, `fmg_no_item`, `fmg_date_entry`, `fmg_time_entry`,`maintenace_type`) VALUES (Null,'$machine_no','$model_id','$user_location','0','$fmg_no_item','$date','$time','$maintenance_id')";
		$sql_insert=mysqli_query($conn,$insert);
		 $last_id=mysqli_insert_id($conn);
	 			// findind last inserted query
	 	$fmg_job_id=$user_location."-".date('Y-m-d')."-mjob-00/".$last_id;

	 	$update_job="UPDATE `lt_master_field_maintenance_job` SET `fmg_job_id`='$fmg_job_id' WHERE `fmg_slno`='$last_id'";
	 	$sql_update=mysqli_query($conn,$update_job);
	 	for ($i=0; $i <count($slno) ; $i++) {
	 		$fmgd_slno_field_stock=$slno[$i];
	 		$fmgd_secondary_id=$secondary[$i];
	 		$fmgd_primary_id=$primary[$i];
	 		$fmgd_item_name=$itemname[$i];
	 		$fmgd_item_id=$itemname_id[$i];
	 		$fmgd_category_name=$catergory[$i];
	 		$fmgd_category_id=$catergoryNO[$i];
	 		$fmgd_unit_id=$unit[$i];
	 		$fmgd_available_id=$qnty_av[$i];
	 		$fmgd_quantity_id=$qnty[$i];

	 		$insert_detail="INSERT INTO `lt_master_field_maintenance_job_detail`(`fmgd_slno`, `fmgd_job_id`, `fmgd_machine_no`, `fmgd_model_id`, `fmgd_field_id`, `fmgd_slno_field_stock`, `fmgd_primary_id`, `fmgd_secondary_id`, `fmgd_item_name`, `fmgd_item_id`, `fmgd_category_name`, `fmgd_category_id`, `fmgd_unit_id`, `fmgd_available_id`, `fmgd_quantity_id`, `fmgd_issue_quantity_id`, `fmgd_return_quantity`, `fmgd_damage_quantity`, `fmgd_issue_status`, `fmgd_return_status`, `fmgd_damage_status`,`maintenance_id`) VALUES (Null,'$fmg_job_id','$machine_no','$model_id','$user_location','$fmgd_slno_field_stock','$fmgd_primary_id','$fmgd_secondary_id','$fmgd_item_name','$fmgd_item_id','$fmgd_category_name','$fmgd_category_id','$fmgd_unit_id','$fmgd_available_id','$fmgd_quantity_id','0','0','0','0','0','0','$maintenance_id')";
	 		$insert_detail_exe=mysqli_query($conn,$insert_detail);
	 		

	 	}

	 	$msg->success('Success-Fully maintenance job created for machine no:-'.$machine_no ."  job id is :- ".$fmg_job_id);
	 		header('Location:index.php');
			exit;
	}else{
		header('Location:logout.php');
		exit;
	}
}