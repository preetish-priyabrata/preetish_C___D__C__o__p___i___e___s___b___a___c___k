<?php

session_start();

if (($_SESSION['userId']!="")) {
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
include 'config.php';
// Array ( [program] => 16 [moduleName] => Array ( [0] => happy [1] => happy [2] => happy ) [moduleDescription] => Array ( [0] => merra [1] => usha [2] => sipra ) ) 
 	$program = $_POST['program'];
    $moduleName = $_POST['moduleName'];
    $moduleDescription = $_POST['moduleDescription'];
    $loop = count($moduleName);
    if(!empty($program)){
	    for ($i = 0; $i < $loop; $i++) {
	        $queryModule = "INSERT INTO `tbl_program_module`(`module_id`, `program_id`, `module_name`, `module_description`) VALUES (NULL,'$program','$moduleName[$i]','$moduleDescription[$i]')";
	        $resModule = mysqli_query($conn, $queryModule);
	        $x=$i+1;
	        $msg->success('Module ['.$x.'] Success Stored ');
	    }
	    header('Location:addTraining.php');
    	exit;
	}else{
		header('Location:logout.php');
		exit;
	}
}else{
	header('Location:logout.php');
	exit;
}
