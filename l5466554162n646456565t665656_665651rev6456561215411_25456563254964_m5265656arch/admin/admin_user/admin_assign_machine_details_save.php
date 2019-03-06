<?php 

 error_reporting(4);
 session_start();
 ob_start();
if($_SESSION['admin']){
  require 'FlashMessages.php';
  require 'config.php';
  $msg = new \Preetish\FlashMessages\FlashMessages(); 

	// Array ( [attach] => Array ( [name] => 7-Great-Apps-for-Parent-Teacher-Communication.png [type] => image/png [tmp_name] => /tmp/phppwkujR [error] => 0 [size] => 67045 ) [attach_files] => Array ( [name] => Array ( [0] => 1 MAP.pdf [1] => [2] => 2017-07-21_drnt_zb28_EN.pdf [3] => ) [type] => Array ( [0] => [1] => [2] => application/pdf [3] => ) [tmp_name] => Array ( [0] => [1] => [2] => /tmp/phpagbTId [3] => ) [error] => Array ( [0] => 1 [1] => 4 [2] => 0 [3] => 4 ) [size] => Array ( [0] => 0 [1] => 0 [2] => 156596 [3] => 0 ) ) ) 
	// files
	// Array ( [M_model_no] => md2 [site_location_id] => zonal001 [example21_length] => 10 [machine_unique_id] => Array ( [0] => mud657 [1] => mud65789 [2] => mud698 [3] => mud12389 ) [field_loaction_ids] => Array ( [0] => field002 [1] => 0 [2] => field007 [3] => 0 ) [remark] => Array ( [0] => please [1] => [2] => test [3] => ) [Insert] => Save ) 
	// send data

	$targetDir = "../uploads/machine_file";
	$file_array=array();
	if(is_array($_FILES)) {
		// Count # of uploaded files in array
		$total = count($_FILES['attach_files']['name']);
		// Loop through each file
		for($i=0; $i<$total; $i++) {
			$tmpFilePath = $_FILES['attach_files']['tmp_name'][$i];
				//Make sure we have a filepath
	  		if ($tmpFilePath != ""){
	    		//Setup our new file path
				$uploads=mt_getrandmax()."-".date('y-m-d')."-".$_FILES['attach_files']['name'][$i];
				if(is_uploaded_file($_FILES['attach_files']['tmp_name'][$i])) {
					if(move_uploaded_file($tmpFilePath,"$targetDir/".$uploads)) {
						$file_array[]=$uploads;
					}else{
						$file_array[]=0;
					}
				}else{
					$file_array[]=0;
				}
			}else{ //
				$file_array[]=0;
			}
		}
	}else{   // here if file is not found  
		header('Location:logout.php');
		exit;
	}

	$M_model_no=$_POST['M_model_no']; // machine model no 
	$site_location_id=$_POST['site_location_id']; //store location 
	$machine_unique_id=$_POST['machine_unique_id']; // array of machine no
	$field_loaction_ids=$_POST['field_loaction_ids']; // array of location 
	$remark=$_POST['remark']; // array of remark
	$date=date('Y-m-d');
	$time=date('H:i:s');
	$admin=$_SESSION['admin'];

	for($i=0; $i < count($machine_unique_id) ; $i++){ 
		$machine_unique_id_single=$machine_unique_id[$i];
		$field_loaction_ids_single=$field_loaction_ids[$i];
		$file_array_single=$file_array[$i];
		$remark_single=$remark[$i];
		$check_status="SELECT * FROM `lt_master_machine_detail` WHERE `machine_unique_id`='$machine_unique_id_single'";
		$sql_status=mysqli_query($conn,$check_status);

		if($field_loaction_ids_single!="0"){
			$insert="INSERT INTO `lt_master_machine__transfer_information`(`slno`, `model_id`, `t_unique_id_machine`, `t_store_site_location`, `t_field_location_id`, `remark`, `attach_file`, `date_creation`, `time_creation`,`user_id`) VALUES (Null, '$M_model_no','$machine_unique_id_single','$site_location_id','$field_loaction_ids_single','$remark_single','$file_array_single','$date','$time','$admin')";
			$sql_insert=mysqli_query($conn,$insert);
			$res=mysqli_fetch_assoc($sql_status);
			$count=$res['m_count'];
			$update_count=$count+1;
			if($res['edit_status']=="0"){
				$update_machine="UPDATE `lt_master_machine_detail` SET `m_count`='$update_count',`assign_status`='1',`edit_status`='1' , `date_assigned`='$date',`time_assign`='$time',`date_status_change`='$date',`time_status_change`='$time' WHERE `machine_unique_id`='$machine_unique_id_single'";
				$sql_update=mysqli_query($conn,$update_machine);
			}else{
				$update_machine="UPDATE `lt_master_machine_detail` SET `m_count`='$update_count',`assign_status`='1' , `date_assigned`='$date',`time_assign`='$time' WHERE `machine_unique_id`='$machine_unique_id_single'";
				$sql_update=mysqli_query($conn,$update_machine);
			}
		}
		
	}
	$msg->success('Successfull Assign Machine to Location');
	header('Location:admin_dashboard.php');
	exit;
}else{
	header('Location:logout.php');
	exit;
}
