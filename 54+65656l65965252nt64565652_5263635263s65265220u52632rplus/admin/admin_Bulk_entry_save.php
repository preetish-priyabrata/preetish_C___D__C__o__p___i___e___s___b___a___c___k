<?php 

 error_reporting(4);
 session_start();
 ob_start();
if($_SESSION['email_id']){
	$email_id=$_SESSION['email_id'];
	include 'webconfig/config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();  $msg = new \Preetish\FlashMessages\	FlashMessages(); 
 		$targetDir="upload";
 		$upload_file = date('Y-m-d')."_".date('his')."_".$_FILES['csv_id']['name']	;
		$upload_file_tmp = $_FILES['csv_id']['tmp_name']	;		
		$mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv','application/csv','text/comma-separated-values');
		$row=0;
		$Upload_name=$_POST['Upload_name'];
		$date_entry=date('Y-m-d');
		$time_enrty=date('H:i:s');
	if(in_array($_FILES['csv_id']['type'],$mimes)){
		if(move_uploaded_file($upload_file_tmp,"$targetDir/".$upload_file)){

			$data_file="INSERT INTO `ilab_upload_master`(`slno_lab`, `name_file`, `uploade_name`, `uploader_id`, `date`) VALUES (NUll,'$upload_file','$Upload_name','$email_id','$date_entry')";
			$data_sql=mysqli_query($conn,$data_file);


			$filename=$upload_certificate_tmp;
			if($_FILES["csv_id"]["size"] > 0){
				if (($handle = fopen("$targetDir/".$upload_file, "r")) !== FALSE) {
	 				echo "<table>";
	 				echo "<tr><th>Surplus Job Code</th><th>	Job Description </th><th>	Material Code	Material Description</th><th>	UOM </th><th>	Surplus Quantity Available as on date</th><th>	Surplus Declared On	Unit Rate </th><th>	Amount </th><th>	Product Group </th><th>	Person Responsible</th><th> Status</th></tr>";
					while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
	 
						if($row == 0){ 
							$row++; 
						} else {
	 					//
	 					//Surplus Job Code	Job Description 	Material Code	Material Description	UOM 	Surplus Quantity Available as on date	Surplus Declared On	Unit Rate	Amount	Product Group	Person Responsible
						//LE150871	MCL - Surface Miner KSM 303	7723615ABC	Gear Box 	No	6	15/05/2018	215000	1290000	KSM	Sandep

						// LE150871 0
						// MCL Surface Miner KSM 303 1
						// 7723615ABC 2
						//Gear Box 3
						// No 4
						// 6  5- 15/05/2018  6- 215000  7 - 1290000 10 - KSM 11 - Sandep 12
						// $data[0] = first name; $data[1] = last name; $data[2] = email; $data[3] = phone
						/*********************************************************************************************************************/						
							$surplus_job_code=$data[0]; //Surplus Job Code
							$job_description=$data[1]; //Job Description
							$material_code=$data[2]; //Material Code
							$material_description=$data[3]; //Material Description
							$uom=$data[4]; //UOM
							$quantity_available_surplus=$data[5];//Surplus Quantity Available as on date
							$surplus_declared_date=$data[6]; //Surplus Declared On
							$unit_rate=$data[7]; //Unit Rate
							$amount=$data[8]; //Amount
							$product_group=$data[9]; //Product Group
							$person_responsible=$data[10]; //Person Responsible
							$Internal_Remarks=$data[11];

							$entry_item="INSERT INTO `ilab_master_field_surplus_material`(`slno_surplus`, `surplus_job_code`, `job_description`, `material_code`, `material_description`, `quantity_available_surplus`, `surplus_declared_date`, `unit_rate`, `amount`, `uom`, `product_group`, `person_responsible`, `total_qnty`, `status`, `entry_id`, `update_status`,`date_entry`,`Internal_Remarks`) VALUES (Null,'$surplus_job_code','$job_description','$material_code','$material_description','$quantity_available_surplus','$surplus_declared_date','$unit_rate','$amount','$uom','$product_group','$person_responsible','$quantity_available_surplus','1','$email_id','0','$date_entry','$Internal_Remarks')";

	 						$entry_item_sql=mysqli_query($conn,$entry_item);
	 						echo '<tr><td>'.$data[0].' </td><td>'.$data[1].' </td> '.$data[2].' </td><td> '.$data[3].' </td><td>'.$data[4].' </td><td>'.$data[5].' </td> '.$data[6].' </td><td> '.$data[7].' </td> <td>'.$data[8].' </td><td>'.$data[9].' </td> '.$data[10].' </td><td>Successfull Stored</td></tr>';
						}
	 
					}
					echo "</table>";
					$msg->success('Successfull Bulk Entry Surplus Material Master');
					header('Location:admin_dashboard.php');
					exit;
	 
				} else {
	 
					
					$msg->error('File could not be opened.');
					header('Location:admin_dashboard.php');
					exit;
				}	
	 
				fclose($handle);

			}else{ // file value is less 0
				
					$msg->error('File could not be less than 1kb.');
					header('Location:admin_dashboard.php');
					exit;
			}
		}else{
			$msg->error('Error File Loading');
			header('Location:admin_dashboard.php');
			exit;
			
		}





	}else{ //in_array($_FILES['upload_certificate']['type'],$mimes
		$msg->error('File Is Not CSV');
			header('Location:admin_dashboard.php');
			exit;
			
	}



 	


 }else{
 	header('Location:logout_time_out.php');
	exit;
			
 }