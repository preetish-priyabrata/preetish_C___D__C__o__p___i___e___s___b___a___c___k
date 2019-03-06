<?php

session_start();
ob_start();
// print_r($_SESSION);
if (($_SESSION['userId']!="")) {
require 'FlashMessages.php';
include 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 // Array ( [program] => 15 [programName] => Tech Mahindra IT Infrastructure Managament Services Training [programDate] => 2015-07-15 [eligibility] => BE/BTech/MCA/BCA/BSc/Diploma 60% Through out Academics maximum 1 year gap [moduleId] => Array ( [0] => 43 [1] => 44 [2] => 45 ) [moduleName] => Array ( [0] => FOUNDATION COURSE [1] => ESSENTIAL COURSE - 1 (End User IT Management) [2] => ESSENTIAL COURSE - 2 (Enterprise Network Management) ) [moduleDescription] => Array ( [0] => Topic Covers (Hardware, Storage, Networking,Windows, Linux, DBA, Network Services, Application, Security, Cloud) [1] => Topic Covers (Microsoft Office-2007 and Windows - 7) [2] => Topic Covers (Cisco Switching and Routing) ) ) 
	$programId = $_POST['program'];
    $programName = $_POST['programName'];
    $programDate = $_POST['programDate'];
    $eligibility = $_POST['eligibility'];
//    Array type
    $moduleId = $_POST['moduleId'];
    $moduleName = $_POST['moduleName'];
    $moduleDescription = $_POST['moduleDescription'];
    $loop = count($moduleId);
    if($programId!=""){
	//    Update active program
	    $queryProgramUpdate = "UPDATE `tbl_program` SET `program_name` = '$programName',`commence_date` = '$programDate',`eligibility` = '$eligibility' WHERE `program_id` = '$programId'";
	    $resProgramUpdate = mysqli_query($conn, $queryProgramUpdate);
	    if($resProgramUpdate){
	//    Update program modules
		    for ($i = 0; $i < $loop; $i++) {
		        $queryModuleUpdate = "UPDATE `tbl_program_module` SET `module_name` = '$moduleName[$i]', `module_description` = '$moduleDescription[$i]'  WHERE `module_id` = '$moduleId[$i]'";
		        $resModuleUpdate = mysqli_query($con, $queryModuleUpdate);
		    }
		    $msg->success('Successfull Program Is Edited');
			header('Location:manageProgram.php');
			exit;
		}else{
			header('Location:logout.php');
			exit;
		}
    
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