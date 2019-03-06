<?php 
session_start();
$HASHING_METHOD = 'sha512'; // md5,sha1

// This response.php used to receive and validate response.
if(!isset($_SESSION['SECRET_KEY']) || empty($_SESSION['SECRET_KEY']))
$_SESSION['SECRET_KEY'] = '387b8cefe0c688faaba81104b9d1088f'; //set your secretkey here
	
$hashData = $_SESSION['SECRET_KEY'];
ksort($_POST);
foreach ($_POST as $key => $value){
	if (strlen($value) > 0 && $key != 'SecureHash') {
		$hashData .= '|'.$value;
	}
}
if (strlen($hashData) > 0) {
	$secureHash = strtoupper(hash($HASHING_METHOD , $hashData));
	
	if($secureHash == $_POST['SecureHash']){
		// print_r($_POST);
		// 	exit;
		include './conf.php';
		if($_POST['ResponseCode'] == 0){
			// update response and the order's payment status as SUCCESS in to database
			// echo "SUCCESS<br>";
			// print_r($_POST);
			// exit;
			
			$Amount=$_POST['Amount'];
			$BillingEmail=$_POST['BillingEmail'];
			$BillingName=$_POST['BillingName'];
			$BillingPhone=$_POST['BillingPhone'];
			$DateCreated=$_POST['DateCreated'];
			$Description=$_POST['Description'];
			$IsFlagged=$_POST['IsFlagged'];
			$MerchantRefNo=$_POST['MerchantRefNo'];
			$Mode=$_POST['Mode'];
			$PaymentID=$_POST['PaymentID'];
			$PaymentMethod=$_POST['PaymentMethod'];
			$RequestID=$_POST['RequestID'];
			$ResponseCode=$_POST['ResponseCode'];
			$ResponseMessage=$_POST['ResponseMessage'];
			$TransactionID=$_POST['TransactionID'];
			$date=date('Y-m-d');
			$time=date('H:i:s');
			$P_system_date=date('Y-m-d',strtotime($DateCreated));
			$P_system_time=date('H:i:s',strtotime($DateCreated));
			// insert to database
			$query_insert="INSERT INTO `tbl_payment_details`(`P_slno`, `P_Amount`, `P_BillingEmail`, `P_BillingName`, `P_BillingPhone`, `P_DateCreated`, `P_course_name`, `P_IsFlagged`, `P_MerchantRefNo`, `P_Mode`, `P_PaymentID`, `P_PaymentMethod`, `P_RequestID`, `P_ResponseCode`, `P_ResponseMessage`, `P_TransactionID`, `date`, `time`, `P_system_date`, `P_system_time`) VALUES (NUll,'$Amount','$BillingEmail','$BillingName','$BillingPhone','$DateCreated','$Description','$IsFlagged','$MerchantRefNo','$Mode','$PaymentID','$PaymentMethod','$RequestID','$ResponseCode','$ResponseMessage','$TransactionID','$date','$time','$P_system_date','$P_system_time')";
			$sql_exe_insert=mysqli_query($con,$query_insert);
			 // mysqli_error($con);
			 $last=mysqli_insert_id($con);
			// getting information of student
			 $get_enroll="SELECT * FROM `tbl_enrollment` WHERE `reference_id`='$MerchantRefNo' and `payment_status`='0'";
			
			$sql_enroll=mysqli_query($con,$get_enroll);
			 $num_rows=mysqli_num_rows($sql_enroll);
				
			// checking row affected
			if($num_rows=='1'){
				$fetch_enroll=mysqli_fetch_assoc($sql_enroll);

				$stud_course=$fetch_enroll['student_course'];
				$batch_id=$fetch_enroll['course_batch_id'];
				$enrol=$fetch_enroll['enrollment_id'];
				if($enrol!=""){
					$update_pay="UPDATE `tbl_payment_details` SET `P_enroll_id`='$enrol' WHERE `P_slno`='$last'";
					$sql_exe_update_pay=mysqli_query($con,$update_pay);

					$update_enroll="UPDATE `tbl_enrollment` SET `payment_status`='1',`enrollment_status`='1' WHERE `enrollment_id`='$enrol'";
					$sql_exe_update_enroll=mysqli_query($con,$update_enroll);

				}
				//changed status of seats 
				$check_seat="SELECT * FROM `tbl_batch` WHERE `course_id`='$stud_course' and `sl_no`='$batch_id' and `seat_status`='0' and `status`='1'";
		        $check_seat_sql=mysqli_query($con,$check_seat);
		        $num_seat=mysqli_num_rows($check_seat_sql);
		        if($num_seat=='1'){
		            $res_seat=mysqli_fetch_assoc($check_seat_sql);
		            $seat_remain=$res_seat['remain_seat'];
		            if($seat_remain!=0){
		                $remain_seat=$seat_remain-1;

		            }
		            if($remain_seat=="0"){
		                $update_student="UPDATE `tbl_batch` SET `remain_seat`='0', `seat_status`='1' WHERE `sl_no`='$batch_id' and `course_id`='$stud_course'";

		            }else{
		                $update_student="UPDATE `tbl_batch` SET `remain_seat`='$remain_seat' WHERE `sl_no`='$batch_id' and `course_id`='$stud_course'";
		            }	            
		             $res1 = mysqli_query($con, $update_student);


		            $subject = "This is an auto generated mail. Do not reply. Success Transaction";
                    $to = $BillingEmail;

                    // $from = "info@innovadorslab.co.in";

                    //data
                    $message1  = "Dear "  .$BillingName    .",<br>\n";
                    $message1 .= "Your payment of Rs. "  .$Amount    ." is successful. Thanks for enrolling with us..<br>\n";
                    $message1 .= "Below are the Transaction details for your reference.<br><br>\n";
                    $message1 .= "Student Name : "  .$BillingName   ."<br>\n"; 
                    $message1 .= "Course Name : "  .$Description  ."<br>\n";
                    $message1 .= "Amount Paid : "  .$Amount  ."<br>\n";
                    $message1 .= "Transaction ID : "  .$MerchantRefNo  ."<br>\n";
                    $message1 .= "Transaction Date: "  .$DateCreated   ."<br>\n"; 
                    $message1 .= "Transaction Status : "  .$ResponseMessage  ."<br>\n";
                   
                    

                    //Headers
                    
                    $headers  = "From:Kiit_cat2@innovadorslab.com \r\n";
                    $headers .= "Bcc:ppriyabrata8888@gmail.com \r\n";
                    $headers .= "MIME-Version: 1.0\r\n";
                    $headers .= "Content-type: text/html\r\n";

                    if(mail($to, $subject, $message1, $headers)){
                        echo "success";

                    }else{
                         echo "success2";
                    }
                    session_destroy();
                    header('Location:success_message.php?s=1&id='.encryptIt_webs($last));
               		exit;
		        }else{
		        	session_destroy();
		        	// if seat is not avaliable will bel allow but admin haow to take pain reasigin of seats
		        	header('Location:success_message.php?s=2');
               		exit;
		        }
		    }else{
		    	session_destroy();
		     // if it is not found 
		    	header('Location:success_message.php?s=3');
               	exit;
		    }

			
			exit;
			
			
		} else {
			

// Array ( [Amount] => 5000.00 [BillingAddress] => kkit [BillingCity] => bhubaneswar [BillingCountry] => IND [BillingEmail] => ppriyabrata8888@gmail.com [BillingName] => student 1 [BillingPhone] => 9776069881 [BillingPostalCode] => 751021 [BillingState] => odisha [DateCreated] => 2017-09-22 13:11:25 [DeliveryAddress] => [DeliveryCity] => [DeliveryCountry] => [DeliveryName] => [DeliveryPhone] => [DeliveryPostalCode] => [DeliveryState] => [Description] => c++ [IsFlagged] => NO [MerchantRefNo] => kiit/1/2017-09-22/1 [Mode] => LIVE [PaymentID] => 83692303 [PaymentMethod] => 1354 [RequestID] => 44682784 [ResponseCode] => 2 [ResponseMessage] => Transaction Failed - FSS0001-Authentication Not Available [SecureHash] => DB8BB8846D9D06EB146E32E7413FEB7A8BA559341069EA3B160E957CA4508BFCF70E77CF6B1E7D9B48044E5A732FB6A849406AB8191E5D63215332CB69619CB8 [TransactionID] => 238772374 ) 
			// update response and the order's payment status as FAILED in to database
			$Amount=$_POST['Amount'];
			$BillingEmail=$_POST['BillingEmail'];
			$BillingName=$_POST['BillingName'];
			$BillingPhone=$_POST['BillingPhone'];
			$DateCreated=$_POST['DateCreated'];
			$Description=$_POST['Description'];
			$IsFlagged=$_POST['IsFlagged'];
			$MerchantRefNo=$_POST['MerchantRefNo'];
			$Mode=$_POST['Mode'];
			$PaymentID=$_POST['PaymentID'];
			$PaymentMethod=$_POST['PaymentMethod'];
			$RequestID=$_POST['RequestID'];
			$ResponseCode=$_POST['ResponseCode'];
			$ResponseMessage=$_POST['ResponseMessage'];
			$TransactionID=$_POST['TransactionID'];
			$date=date('Y-m-d');
			$time=date('H:i:s');
			$P_system_date=date('Y-m-d',strtotime($DateCreated));
			$P_system_time=date('H:i:s',strtotime($DateCreated));
			// insert to database
			$query_insert="INSERT INTO `tbl_payment_details`(`P_slno`, `P_Amount`, `P_BillingEmail`, `P_BillingName`, `P_BillingPhone`, `P_DateCreated`, `P_course_name`, `P_IsFlagged`, `P_MerchantRefNo`, `P_Mode`, `P_PaymentID`, `P_PaymentMethod`, `P_RequestID`, `P_ResponseCode`, `P_ResponseMessage`, `P_TransactionID`, `date`, `time`, `P_system_date`, `P_system_time`) VALUES (NUll,'$Amount','$BillingEmail','$BillingName','$BillingPhone','$DateCreated','$Description','$IsFlagged','$MerchantRefNo','$Mode','$PaymentID','$PaymentMethod','$RequestID','$ResponseCode','$ResponseMessage','$TransactionID','$date','$time','$P_system_date','$P_system_time')";
			$sql_exe_insert=mysqli_query($con,$query_insert);
			$last=mysqli_insert_id($con);
			// getting information of student
			$get_enroll="SELECT * FROM `tbl_enrollment` WHERE `reference_id`='$MerchantRefNo' and `payment_status`='0'";
			$sql_enroll=mysqli_query($con,$get_enroll);
			$num_rows=mysqli_num_rows($sql_enroll);
			// checking row affected
			if($num_rows=='1'){
				$fetch_enroll=mysqli_fetch_assoc($sql_enroll);

				$stud_course=$fetch_enroll['student_course'];
				$batch_id=$fetch_enroll['course_batch_id'];
				$enrol=$fetch_enroll['enrollment_id'];
				if($enrol!=""){
					$update_pay="UPDATE `tbl_payment_details` SET `P_enroll_id`='$enrol' WHERE `P_slno`='$last'";
					$sql_exe_update_pay=mysqli_query($con,$update_pay);

					$update_enroll="UPDATE `tbl_enrollment` SET `payment_status`='2',`enrollment_status`='0' WHERE `enrollment_id`='$enrol'";
					$sql_exe_update_enroll=mysqli_query($con,$update_enroll);

				}			
		       		$subject = "This is an auto generated mail. Do not reply. Failure Transaction";
                    $to = $BillingEmail;

                    // $from = "info@innovadorslab.co.in";

                    //data
                    $message1  = "Dear "  .$BillingName    .",<br>\n";
                    $message1 .= "Your transaction could not be processed. <br>\n";
                    $message1 .= "Below are the Transaction details for your reference.<br><br>\n";
                    $message1 .= "Reason  : "  .$ResponseMessage   ."<br>\n";                     
                    $message1 .= "Transaction ID : "  .$MerchantRefNo  ."(Note this error code for future communication)<br>\n";
                    $message1 .= "Transaction Date: "  .$DateCreated   ."<br>\n"; 
                 
                   
                    

                    //Headers
                    
                    $headers  = "From:Kiit_cat2@innovadorslab.com \r\n";
                    $headers .= "Bcc:ppriyabrata8888@gmail.com \r\n";
                    $headers .= "MIME-Version: 1.0\r\n";
                    $headers .= "Content-type: text/html\r\n";

                    if(mail($to, $subject, $message1, $headers)){
                        echo "success";

                    }else{
                         echo "success2";
                    }
                    session_destroy();
                    header('Location:success_message.php?s=11&id='.encryptIt_webs($last));
               		exit;
		    }else{
		    	session_destroy();
		    	header('Location:success_message.php?s=3');
               	exit;
		    }

			exit;
			
		}
		

	} else {
		header('Location:success_message.php?s=3');
               	exit;
		// echo '<h1>Error!</h1>';
		// echo '<p>Hash validation failed</p>';
	}
} else {
	header('Location:success_message.php?s=3');
               	exit;
	// echo '<h1>Error!</h1>';
	// echo '<p>Invalid response</p>';
}
?>