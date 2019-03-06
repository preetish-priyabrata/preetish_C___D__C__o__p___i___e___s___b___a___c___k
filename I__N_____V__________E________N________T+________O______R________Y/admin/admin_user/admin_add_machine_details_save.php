<?php

session_start();
if($_SESSION['admin']){
	require 'FlashMessages.php';
	require 'config.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
   // print_r($_POST);

 	// here information is received 
 	$model_no=$_POST['model_no'];
 	$machine_unique_id=strtolower($_POST['Unique_id']);
 	$machine_name=$_POST['machine_name'];
 	$client_name=$_POST['client_name'];
    $machine_mfg_date=date('Y-m-d',strtotime(trim($_POST['machine_Mfg'])));
    $machine_commissioning=date('Y-m-d',strtotime(trim($_POST['machine_commission'])));
 	$date=date('Y-m-d'); // default time in online server
 	$time=date('H:i:s');// default time in online server
 	
 	// check unique no
 	$check="SELECT * from `lt_master_machine_detail` where `machine_unique_id`='$machine_unique_id' ";
    $sql_check=mysqli_query($conn,$check);
    $num=mysqli_num_rows($sql_check); // check it number rows is affected 

  if ($num==0){
 	    $query_insert="INSERT INTO `lt_master_machine_detail`(`m_slno`,`m_model_no`, `machine_unique_id`,`machine_name`,`client_name`,`machine_mfg_date`,`machine_commissioning`,`date_entry`,`time_entry`) VALUES (Null,'$model_no','$machine_unique_id','$machine_name','$client_name','$machine_mfg_date','$machine_commissioning','$date','$time')";
 	
	 	// execute query
	 	$sql_insert=mysqli_query($conn,$query_insert);
	 	$msg->success('Successfull Machine Details Are stored In our record');
	 	header('Location:admin_dashboard.php');
		exit;

   }else{

        $msg->error('Machine Unique Id already is stored In our record');
 	    header('Location:admin_dashboard.php');
	    exit; 
 }

   // insert query 
    

}else{
	header('Location:logout.php');
	exit;
}


?>

