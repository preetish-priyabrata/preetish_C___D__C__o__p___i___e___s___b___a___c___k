<?php

session_start();
ob_start();
if (($_SESSION['userId']!="")) {
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
include 'config.php';
// Array ( [program] => 16 [moduleName] => Array ( [0] => happy [1] => happy [2] => happy ) [moduleDescription] => Array ( [0] => merra [1] => usha [2] => sipra ) ) 
 	$Course = $_POST['Course'];
    $moduleName = $_POST['moduleName'];
    $moduleDescription = $_POST['editor'];
    $session_event=$_POST['session_event'];
    $loop = count($moduleName);
    if(!empty($Course)){
	    for ($i = 0; $i < $loop; $i++) {
	         $queryModule = "INSERT INTO `tbl_course_module`(`module_id`, `course_id`, `module_name`, `module_description`,`no_session_module`) VALUES (NULL,'$Course','$moduleName[$i]','$moduleDescription[$i]','$session_event[$i]')";
	        $resModule = mysqli_query($conn, $queryModule);
	        $x=$i+1;
	        $msg->success('Module ['.$x.'] Success Stored ');
	    }
	    $update_program="UPDATE `tbl_course` SET `status`='1' WHERE`sl_no`='$Course'";
	    $res_update = mysqli_query($conn, $update_program);
	    
	     $msg->success('Successfull Program  module Is Saved');
	    header('Location:course_details.php');
    	exit;
	}else{
		header('Location:logout.php');
		exit;
	}
}else{
	header('Location:logout.php');
	exit;
}
