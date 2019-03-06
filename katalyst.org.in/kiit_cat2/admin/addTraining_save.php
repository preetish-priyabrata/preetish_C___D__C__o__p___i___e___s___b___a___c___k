<?php
// print_r($_POST);
session_start();
ob_start();
if (($_SESSION['userId']!="")) {
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
include 'config.php';
// Array ( [programName] => PHP Developer [programDate] => 09/23/2017 [eligibility] => Before you continue you should have a basic understanding of the following: HTML CSS JavaScript [moduleNumber] => 3 ) 
	$programName = $_POST['programName'];
    $programDate = date('Y-m-d',strtotime(trim($_POST['programDate'])));
    $eligibility = $_POST['eligibility'];
    $moduleNumber = $_POST['moduleNumber'];
    $no_of_session=$_POST['no_of_session'];
    $date=date("Y-m-d H:i:s");
     
    if(!empty($programName)){
    	$insert="INSERT INTO `tbl_program`(`program_id`, `program_name`, `commence_date`, `eligibility`, `no_of_module`,`no_of_session`, `upload_date`, `program_status`) VALUES (NULL,'$programName','$programDate','$eligibility','$moduleNumber','$no_of_session','$date','1')";
    	
    	$resProgram = mysqli_query($conn, $insert);

    	$last_id = mysqli_insert_id($conn);
    	$msg->success('Successfull Training Detail Is Filled');
    	header('Location:addTraining_module.php?sl='.encryptIt_webs($last_id).'&moduleNumber='.encryptIt_webs($moduleNumber));
    	exit;
    }else{
    	header('Location:logout.php');
		exit;
    }


}else{
	header('Location:logout.php');
	exit;
}
$contents = ob_get_contents();
ob_clean();
include '../template/header.php';
?>
