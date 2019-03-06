<?php 

 error_reporting(4);
 session_start();
 ob_start();
if($_SESSION['email_id']){
	$email_id=$_SESSION['email_id'];
	include 'webconfig/config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();  $msg = new \Preetish\FlashMessages\	FlashMessages(); 
 		$targetDir="upload_transfer";
 		$upload_file = date('Y-m-d')."_".date('his')."_".$_FILES['csv_id']['name']	;
		$upload_file_tmp = $_FILES['csv_id']['tmp_name']	;		
		$mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv','application/csv','text/comma-separated-values');
		$row=0;
		$Upload_name=$_POST['Upload_name'];
		$date_entry=date('Y-m-d');
		$time_enrty=date('H:i:s');
	if(in_array($_FILES['csv_id']['type'],$mimes)){
		if(move_uploaded_file($upload_file_tmp,"$targetDir/".$upload_file)){

			$data_file="INSERT INTO `ilab_upload_reserved_master`(`slno_lab`, `name_file`, `uploade_name`, `uploader_id`, `date`) VALUES (NUll,'$upload_file','$Upload_name','$email_id','$date_entry')";
			$data_sql=mysqli_query($conn,$data_file);


			$filename=$upload_certificate_tmp;
			if($_FILES["csv_id"]["size"] > 0){
				if (($handle = fopen("$targetDir/".$upload_file, "r")) !== FALSE) {	 				
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
							$Material_Code=$data[0]; //Material Code
							$Tranferred_to_Job_Code=$data[1]; //Tranferred to Job Code
							$Stock_Transfer_EMR_No=$data[2]; //Stock Transfer EMR No
							$Transfer_Document_Number=$data[3]; //Transfer Document Number
							$Qty_Transferred=$data[4]; //Qty Transferred
							$Reserved_Id=(str_split($data[5],12));
							// $data[5];//Reserved Id
							$slno=$Reserved_Id[1];
							
							$get_checked="SELECT * FROM `ilab_reservation_master` WHERE `slno`='$slno' and`Material_code`='$Material_Code' and`Reserved_Job_Code`='$Tranferred_to_Job_Code'";
							$sql_exe=mysqli_query($conn,$get_checked);
							$num_rows=mysqli_num_rows($sql_exe);
							if($num_rows==1){
								$update="UPDATE `ilab_reservation_master` SET `qnty_transfer`='$Qty_Transferred', `stock_transfer_emr_no`='$Stock_Transfer_EMR_No', `transfer_doc_no`='$Transfer_Document_Number', `transfer_status`='1',`transfered_date`='$date_entry' WHERE`slno`='$slno'";
								mysqli_query($conn,$update);
							}

							
						}
	 
					}
					
					$msg->success('Successfull Bulk Transfer Material');
					header('Location:admin_View_transfer_Quantity_Details.php?file='.$upload_file);
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