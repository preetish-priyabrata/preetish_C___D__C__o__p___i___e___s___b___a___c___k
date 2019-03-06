<?php

 error_reporting(0);
 session_start();
if($_SESSION['admin']){
  require 'FlashMessages.php';
  require 'config.php';
  $msg = new \Preetish\FlashMessages\FlashMessages();


$last_id=$slno=$_POST['slno'];
$unq_id=$_POST['unq_id'];
$unique_id_machine=$_POST['unique_id_machine'];
$check="SELECT * FROM `lt_master_machine_detail` WHERE `machine_unique_id`='$unique_id_machine' and `assign_status`='1'";
$sql_check=mysqli_query($conn,$check);
$num=mysqli_num_rows($sql_check);
	if($num==1){
		$targetDir = "../uploads/machine_file";
		if(is_array($_FILES)) {
			$total = count($_FILES['fileToUpload']['name']);
			// Loop through each file
			for($i=0; $i<$total; $i++) {
				$tmpFilePath = $_FILES['fileToUpload']['tmp_name'][$i];
					//Make sure we have a filepath
		  		if ($tmpFilePath != ""){
		    		//Setup our new file path
					$uploads=mt_getrandmax()."-".date('y-m-d')."-".$_FILES['fileToUpload']['name'][$i];
					if(is_uploaded_file($_FILES['fileToUpload']['tmp_name'][$i])) {
						if(move_uploaded_file($tmpFilePath,"$targetDir/".$uploads)) {
						$file_insert="INSERT INTO `lt_master_machine__transfer_information_attachment`(`slno_attach_id`, `slno_machine_attach`, `file_name`, `date_entered`, `status`, `type_attach`) VALUES (NULL,'$last_id','$uploads','$date','1','1')";
						$sql_insert=mysqli_query($conn,$file_insert);
						}
					}
				}
			}
			
			$msg->success('Machine Files Successfull Attached');
			header('Location:index.php');
			exit;
		}else{
			$msg->error('Please Attach Files');
			header('Location:index.php');
			exit;
		}
	}else{
		$msg->error('Something went wrong');
			header('Location:index.php');
			exit;
	}

}else{
	header('Location:logout.php');
	exit;
}