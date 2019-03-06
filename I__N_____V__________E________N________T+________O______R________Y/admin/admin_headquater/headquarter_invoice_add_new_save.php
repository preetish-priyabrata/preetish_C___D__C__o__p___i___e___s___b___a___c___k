<?php
// print_r($_POST);
// print_r($_FILES);
// exit;
session_start();
if($_SESSION['admin_hq']){
	require 'FlashMessages.php';
	include '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();
	
	$form_type=$_POST['form_type'];
	$form_type_transulate=web_decryptIt(str_replace(" ", "+", $form_type));
	if($form_type_transulate=="basic_details"){
		$unit_no=$_POST['unit'];
		$month=$_POST['month'];
		$period_from=date('Y-m-d',strtotime(trim($_POST['txtFrom'])));
		$period_to=date('Y-m-d',strtotime(trim($_POST['txtTo'])));
		$date=date('Y-m-d');
		$time=date('H:i:s');
		$insert="INSERT INTO `lt_master_invoices_amount`(`slno_invoice`, `unit_no`, `month`, `period_to`, `period_from`, `basic_status`,`date`, `time`, `status`) VALUES(Null,'$unit_no','$month','$period_to','$period_from','1','$date','$time','1')";
		$sql_insert=mysqli_query($conn,$insert);
		if($sql_insert){
			$msg->success('Basic information of Invoice has been stored success-fully');
		 	header('Location:index.php');
			exit;
		}else{
			$msg->error('Something went worng!! Try Again ');
		 	header('Location:index.php');
			exit;
		}

	}else if($form_type_transulate=="Invoice_details"){
		$token_name=$_POST['token_name'];
		$slno_invoice=web_decryptIt(str_replace(" ", "+", $token_name));
		$Invoice=$_POST['Invoice'];
		$area=$_POST['area'];
		$tax_per=$_POST['tax_per'];
		$Total=$_POST['Total'];
		$Basic=$_POST['Basic'];
		$txtFrom1=date('Y-m-d',strtotime(trim($_POST['txtFrom1'])));
		$date=date('Y-m-d');
		// $invoice_Attachment=$_POST['invoice_Attachment'];
		$targetDir = "../uploads/invoice";
		
		$count=0;
		if(count($_FILES["invoice_Attachment"]['name'])>0){
			for($j=0; $j < count($_FILES["invoice_Attachment"]['name']); $j++){
				$uploads=mt_getrandmax()."-".date('y-m-d')."-".$_FILES['invoice_Attachment']['name'][$j];
				if(is_uploaded_file($_FILES['invoice_Attachment']['tmp_name'][$j])) {
					$count++;
					$tmpFilePath = $_FILES['invoice_Attachment']['tmp_name'][$j];
					if(move_uploaded_file($tmpFilePath,"$targetDir/".$uploads)){
						$file_insert="INSERT INTO `lt_invoice_attachment`(`slno_attach_id`, `slno_invoice_id`, `file_name`, `date_entered`, `status`,`type_attach`) VALUES (Null,'$slno_invoice','$uploads','$date','1','1')";
						mysqli_query($conn,$file_insert);
					}
				}
			}
		}
		if($count==0){
			$invoice_attach_status='0';
		}else{
			$invoice_attach_status='1';
		}
		$update="UPDATE `lt_master_invoices_amount` SET `invoice_no`='$Invoice', `location_area`='$area', `basic_no`='$Basic', `tax_no`='$tax_per', `total`='$Total', `invoice_Attachment`='$count', `invoice_attach_status`='$invoice_attach_status', `status_invoice_status`='1',`date_invoice_info`='$txtFrom1' WHERE`slno_invoice`='$slno_invoice'";
		//mysqli_query($conn,$update);
		if(mysqli_query($conn,$update)){
			$msg->success('Basic information of Invoice has been stored success-fully');
		 	header('Location:index.php');
			exit;
		}else{
			$msg->error('Something went worng!! Try Again ');
		 	header('Location:index.php');
			exit;
		}
		
	}else if($form_type_transulate=="Payment_Received_details"){
		
		$token_name=$_POST['token_name'];
		$slno_invoice=web_decryptIt(str_replace(" ", "+", $token_name));
		$Receive_amt=$_POST['Receive_amt'];
		$Receive_dt=date('Y-m-d',strtotime(trim($_POST['Receive_dt'])));
		$Balance_os=$_POST['Balance_os'];

		$update="UPDATE `lt_master_invoices_amount` SET `payment_receive`='$Receive_amt', `payment_date`='$Receive_dt', `balance_output`='$Balance_os', `payment_receive_status`='1' WHERE`slno_invoice`='$slno_invoice'";
		//mysqli_query($conn,$update);
		if(mysqli_query($conn,$update)){
			$msg->success('Payment received information has been success-fully Stored');
		 	header('Location:index.php');
			exit;
		}else{
			$msg->error('Something went worng!! Try Again ');
		 	header('Location:index.php');
			exit;
		}

	}else if($form_type_transulate=="Deduction_details"){
		
		$token_name=$_POST['token_name'];
		$slno_invoice=web_decryptIt(str_replace(" ", "+", $token_name));

		$it_ded=$_POST['it_ded'];
		$Wct_ded=$_POST['Wct_ded'];
		$Excess_ded=$_POST['Excess_ded'];

		$targetDir = "../uploads/invoice_deduction";
		
		$count=0;
		if(count($_FILES["Attachment"]['name'])>0){
			for($j=0; $j < count($_FILES["Attachment"]['name']); $j++){
				$uploads=mt_getrandmax()."-".date('y-m-d')."-".$_FILES['Attachment']['name'][$j];
				if(is_uploaded_file($_FILES['Attachment']['tmp_name'][$j])) {
					$count++;
					$tmpFilePath = $_FILES['Attachment']['tmp_name'][$j];
					if(move_uploaded_file($tmpFilePath,"$targetDir/".$uploads)){
						$file_insert="INSERT INTO `lt_invoice_attachment`(`slno_attach_id`, `slno_invoice_id`, `file_name`, `date_entered`, `status`,`type_attach`) VALUES (Null,'$slno_invoice','$uploads','$date','1','2')";
						mysqli_query($conn,$file_insert);
					}
				}
			}
		}
		if($count==0){
			$deduction_file_status='0';
		}else{
			$deduction_file_status='1';
		}

		$update="UPDATE `lt_master_invoices_amount` SET `it_ded`='$it_ded', `excess_ded`='$Excess_ded', `wt_ded`='$Wct_ded', `attach_file`='$count', `deduction_file_status`='$deduction_file_status', `deduction_status`='1' WHERE`slno_invoice`='$slno_invoice'";
		//mysqli_query($conn,$update);
		if(mysqli_query($conn,$update)){
			$msg->success('Deduction information has been Stored success-fully');
		 	header('Location:index.php');
			exit;
		}else{
			$msg->error('Something went worng!! Try Again ');
		 	header('Location:index.php');
			exit;
		}
	}else if($form_type_transulate=="vendors_details_info"){
		// echo "<pre>";
		// print_r($_POST);
		// print_r($_FILES);
		// exit;
		$count_id=0;
		$token_name=$_POST['token_name'];
		$slno_invoice=web_decryptIt(str_replace(" ", "+", $token_name));
		
		$Vendor=$_POST['Vendor'];
		$Period_from_vendor=($_POST['Period_from_vendor']);
		$Period_to_vendor=($_POST['Period_to_vendor']);
		$Invoice_vendor=$_POST['Invoice_vendor'];
		$Invoice_date_vendor=$_POST['Invoice_date_vendor'];
		$Basic_vendors=$_POST['Basic_vendors'];
		$GST_amt_vendors=$_POST['GST_amt_vendors'];
		$Total_vendors=$_POST['Total_vendors'];
		$date=date('Y-m-d');
		$time=date('H:i:s');

		for ($i=0; $i <count($Vendor) ; $i++) { 
			$Vendor_single=$Vendor[$i];
			$Period_from_vendor_single=date('Y-m-d',strtotime(trim($Period_from_vendor[$i])));
			$Period_to_vendor_single=date('Y-m-d',strtotime(trim($Period_to_vendor[$i])));
			$Invoice_vendor_single=$Invoice_vendor[$i];
			$Invoice_date_vendor_single=date('Y-m-d',strtotime(trim($Invoice_date_vendor[$i])));
			$Basic_vendors_single=$Basic_vendors[$i];
			$GST_amt_vendors_single=$GST_amt_vendors[$i];
			$Total_vendors_single=$Total_vendors[$i];

			$insert="INSERT INTO `lt_master_vendors_details`(`slno`, `challan_number`, `vendor_name`,  `period_from`, `period_to`, `invoice_no`, `invoice_date`, `basic`, `gst`, `total`, `status`, `date`, `time`) VALUES (Null,'$slno_invoice','$Vendor_single','$Period_from_vendor_single','$Period_to_vendor_single','$Invoice_vendor_single','$Invoice_date_vendor_single','$Basic_vendors_single','$GST_amt_vendors_single','$Total_vendors_single','1','$date','$time')";
			if(mysqli_query($conn,$insert)){
			$last_id = mysqli_insert_id($conn);
			$ID=$i+1;
			$count_id++;
			$targetDir = "../uploads/vendors_Attachment";
				$count=0;
				if(count($_FILES["vendors_Attachment"]['name'][$ID])>0){
					for($j=0; $j < count($_FILES["vendors_Attachment"]['name'][$ID]); $j++){
						$uploads=mt_getrandmax()."-".date('y-m-d')."-".$_FILES['vendors_Attachment']['name'][$ID][$j];
						if(is_uploaded_file($_FILES['vendors_Attachment']['tmp_name'][$ID][$j])) {
							$count++;
							$tmpFilePath = $_FILES['vendors_Attachment']['tmp_name'][$ID][$j];
							if(move_uploaded_file($tmpFilePath,"$targetDir/".$uploads)){
								$file_insert="INSERT INTO `lt_vendor_attachment`(`slno_attach_id`, `slno_invoice_id`, `file_name`, `date_entered`, `status`,`type_attach`,`slno_vendor_id`) VALUES (Null,'$slno_invoice','$uploads','$date','1','1','$last_id')";
								mysqli_query($conn,$file_insert);

								
							}
						}
					}
				}

				 //`vendors_Attachment`, `vendor_attach_status`,
				if($count==0){
					$vendor_attach_status='0';
				}else{
					$vendor_attach_status='1';
				}
				$UPDATE="UPDATE `lt_master_vendors_details` SET `vendors_Attachment`='$count', `vendor_attach_status`='$vendor_attach_status' where `slno`='$last_id'";
				mysqli_query($conn,$UPDATE);

			}

		}
		if($count_id!=0){
			$update_invoice="UPDATE `lt_master_invoices_amount` SET `vender_details_status`='1' where `slno_invoice`='$slno_invoice'";
			// //mysqli_query($conn,$UPDATE);
			if(mysqli_query($conn,$update_invoice)){
				$msg->success('Success-fully Vendor Details Is Stored');
			 	header('Location:index.php');
				exit;
			}else{
				$msg->error('Something went worng!! Try Again ');
			 	header('Location:index.php');
				exit;
			}
		}else{
			$msg->error('Something went worng!! Try Again ');
			 	header('Location:index.php');
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
// admin/uploads/invoice