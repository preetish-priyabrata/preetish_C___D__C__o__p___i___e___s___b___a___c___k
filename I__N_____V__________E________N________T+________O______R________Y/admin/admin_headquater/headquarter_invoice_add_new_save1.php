<?php 
// print_r($_POST);
session_start();
if($_SESSION['admin_hq']){
	require 'FlashMessages.php';
	include '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();
	$date=date('Y-m-d');
	$time=date('H:i:s');
	$targetDir = "../uploads/invoice";
	$tmpFilePath = $_FILES['Attachment']['tmp_name'];
	if ($tmpFilePath != ""){
		 $uploads=mt_getrandmax()."-".date('y-m-d')."-".$_FILES['Attachment']['name'];
		if(is_uploaded_file($_FILES['Attachment']['tmp_name'])) {
			if(move_uploaded_file($tmpFilePath,"$targetDir/".$uploads)) {
				$attach_file=$uploads;
				$unit_no=$_POST['unit'];
				$month=$_POST['month'];
				$period_from=date('Y-m-d',strtotime(trim($_POST['Period_from'])));
				$period_to=date('Y-m-d',strtotime(trim($_POST['Period_to'])));
				$invoice_no=$_POST['Invoice'];
				$location_area=$_POST['area'];
				$basic_no=$_POST['Basic'];
				$tax_no=$_POST['tax_per'];
				$total=$_POST['Total'];
				$payment_receive=$_POST['Receive_amt'];
				$payment_date=date('Y-m-d',strtotime(trim($_POST['Receive_dt'])));
				$balance_output=$_POST['Balance_os'];
				$it_ded=$_POST['it_ded'];
				$wt_ded=$_POST['Wct_ded'];
				$excess_ded=$_POST['Excess_ded'];

				$insert="INSERT INTO `lt_master_invoices_amount`(`slno_invoice`, `unit_no`, `month`, `period_to`, `period_from`, `invoice_no`, `location_area`, `basic_no`, `tax_no`, `total`, `payment_receive`, `payment_date`, `balance_output`, `it_ded`, `excess_ded`, `wt_ded`, `attach_file`, `date`, `time`, `status`) VALUES (NULL,'$unit_no','$month','$period_to','$period_from','$invoice_no','$location_area','$basic_no','$tax_no','$total','$payment_receive','$payment_date','$balance_output','$it_ded','$excess_ded','$wt_ded','$attach_file','$date','$time','1')";
				$sql_insert=mysqli_query($conn,$insert);
				// echo mysqli_error($conn);
				 $challan_number=$last_id=mysqli_insert_id($conn);

				$Vendor=$_POST['Vendor'];
				$Period_from_vendor=$_POST['Period_from_vendor'];
				$Period_to_vendor=$_POST['Period_to_vendor'];
				$Invoice_vendor=$_POST['Invoice_vendor'];
				$Invoice_date_vendor=$_POST['Invoice_date_vendor'];
				$Basic_vendors=$_POST['Basic_vendors'];
				$GST_amt_vendors=$_POST['GST_amt_vendors'];
				$Total_vendors=$_POST['Total_vendors'];
				for ($i=0; $i <count($Period_from_vendor) ; $i++) { 
					 $vendor_name=$Vendor[$i];
					$v_period_from=date('Y-m-d',strtotime(trim($Period_from_vendor[$i])));
					$v_period_to=date('Y-m-d',strtotime(trim($Period_to_vendor[$i])));
					$v_invoice_no=$Invoice_vendor[$i];
					$v_invoice_date=date('Y-m-d',strtotime(trim($Invoice_date_vendor[$i])));
					$v_basic=$Basic_vendors[$i];
					$v_gst=$GST_amt_vendors[$i];
					$v_total=$Total_vendors[$i];

					$insert_vendors="INSERT INTO `lt_master_vendors_details`(`slno`, `challan_number`, `vendor_name`, `period_from`, `period_to`, `invoice_no`, `invoice_date`, `basic`, `gst`, `total`, `status`, `date`, `time`) VALUES (NULL,'$challan_number','$vendor_name','$v_period_from','$v_period_to','$v_invoice_no','$v_invoice_date','$v_basic','$v_gst','$v_total','1','$date','$time')";
					$sql_insert_vendors=mysqli_query($conn,$insert_vendors);
				}
				// echo mysqli_error($conn);
				if(($sql_insert=="1") && ($sql_insert_vendors=="1")){
				$msg->success('Success-fully Invoice Is Stored');
		 		header('Location:index.php');
				exit;
				}else{
					$msg->error('Something went wrong Please Try again!!!');
			 		header('Location:index.php');
					exit;
				}
			}else{
				$msg->error('Unable Save Files!!!');
			 	header('Location:index.php');
				exit;
			}

		}else{
			$msg->error('Unable Find Uploaded Files!!!');
			header('Location:index.php');
			exit;
		}
	}else{
		$msg->error('File Miss Matches!!!');
			header('Location:index.php');
			exit;
	}
}else{
	header('Location:logout.php');
	exit;
}
// admin/uploads/invoice