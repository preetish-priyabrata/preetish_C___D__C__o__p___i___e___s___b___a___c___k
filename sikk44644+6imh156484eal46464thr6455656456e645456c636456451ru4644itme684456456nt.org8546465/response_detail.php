<?php
include 'config.php';
session_start();
	 require 'FlashMessages.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();	
	$responde_receiced=$_POST['msg'];
	$_SESSION['responde_receiced']=$responde_receiced;
	$file = fopen("responde_receiced.txt", "a+");
	fwrite($file, "---" . $responde_receiced . "---");
	$array_id=explode("|",$responde_receiced);	
	$Check_status   = "0300";
	$_SESSION['responde_receiced']=$responde_receiced;
	$_SESSION['active_basic_status']=1;
  	$_SESSION['complete_application']=1;

	$CustomerID_id=$array_id[1];
	if( strpos( $responde_receiced, $Check_status ) !== false ) {
	    // echo "Yes";
	    // echo "<pre>";
	    $array=explode("|",$responde_receiced);
	    $MerchantID=$array[0];
		$CustomerID=$array[1];
		$TxnReferenceNo=$array[2];
		$BankReferenceNo=$array[3];
		$TxnAmount=$array[4];
		$TxnDate=$array[13];
		$user_no_mobile=$array[17];
		$ErrorDescription=$array[24];
		$payment_date=date('Y-m-d',strtotime(trim($TxnDate)));
		$payment_time=date('H:i:s',strtotime(trim($TxnDate)));
		$CheckSum=$array[25];
		$AuthStatus=$array[14];
		$check_sum=$array_id[25];
		$Check_sum_bar="|".$array_id[25];
		// checking AuthStatus 
		if($AuthStatus=="0300"){
			// check sucess message
			$str=str_replace($Check_sum_bar,"",$responde_receiced);
			$checksum = hash_hmac('sha256',$str,'XD90y0NHmiI7', false); 
			$checksums = strtoupper($checksum);
			if($checksums==$check_sum){
				// customer id or reference no
				
				
						$check_query="SELECT * FROM `ilab_payment_info` WHERE `payment_reference_no`='$CustomerID'and `mobile_no`='$user_no_mobile'  ";
						$sql_check_query=mysqli_query($conn,$check_query);
						$numrow=mysqli_num_rows($sql_check_query);
						if($numrow==1){
							
							$fetch_detail=mysqli_fetch_assoc($sql_check_query);
							$mobile_no=$user_no=$fetch_detail['mobile_no'];
							$application_no=$fetch_detail['application_no'];
							$slno_group_pay=$fetch_detail['slno_group_pay'];
							$group_id_slno=$group_id=$fetch_detail['group_id_slno'];
							$_SESSION['user_no']=$mobile_no;
							$_SESSION['application_no']=$application_no;
							$_SESSION['candidate_name']=$fetch_detail['candidate_name'];
							$_SESSION['CustomerID']=web_encryptIt($CustomerID);
							$_SESSION['secure_ids']=web_encryptIt($slno_group_pay);
							$s2s_respose=$fetch_detail['s2s_respose'];
							if($s2s_respose==0){
								$get_cgeck="SELECT * FROM `ilab_group_candidate_info` WHERE `candidate_mobile`='$user_no' and `paid_status`='0' and `group_id_slno`='$group_id'";
								$sql_check_get_cgeck=mysqli_query($conn,$get_cgeck);
								$numrow_get_cgeck=mysqli_num_rows($sql_check_get_cgeck);
								if($numrow_get_cgeck==1){
									 $update ="UPDATE `ilab_payment_info` SET `payment_date`='$payment_date', `payment_time`='$payment_time', `TxnReferenceNo`='$TxnReferenceNo', `ErrorDescription`='$ErrorDescription', `BankReferenceNo`='$BankReferenceNo',`AuthStatus`='$AuthStatus',`responde_receiced`='$responde_receiced',`payment_status`='1',`s2s_respose`='2' WHERE`slno_group_pay`='$slno_group_pay'";
									
									$applied_id="SK_".date('Y-m-d')."_".$slno_group_pay;
									$update1 ="UPDATE `ilab_group_candidate_info` SET `candidate_application_id`='$application_no',`candidate_applied`='$applied_id',`paid_status`='1',`paid_id_slno`='$slno_group_pay' WHERE `group_id_slno`='$group_id'  AND `candidate_mobile`='$user_no'";
								
									mysqli_query($conn,$update);
									mysqli_query($conn,$update1);

									$message="Dear applicant, we have received an amount of INR ".$TxnAmount." towards application fee submitted against applied id no  ".$applied_id.".  Your application submission is successful.";
									  
							  		$user="Innolab";
		      						$key="a1da054ec1XX";
							      	$api_params = 'user='.$user.'&key='.$key.'&mobile=91'.$user_no.',9439967153,9776069881&message='.$message.'&senderid=SKHAFW&accusage=1';
							            // $smsGatewayUrl = "http://sms.gpileportal.co.in/submitsms.jsp?";  
							        $smsGatewayUrl = "http://sms.sikkimhealthrecruitment.org/submitsms.jsp?";     
							    	$smsgatewaydata = $smsGatewayUrl.$api_params;
							    	$url = $smsgatewaydata;
							    	$ch = curl_init();
										curl_setopt($ch, CURLOPT_URL,$smsGatewayUrl);
							  			curl_setopt($ch, CURLOPT_POST, 1);
							  			curl_setopt($ch, CURLOPT_POSTFIELDS,$api_params);  
										  // receive server response ...
										  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

							    		$server_output = curl_exec ($ch);

							  			curl_close ($ch);
							  			$sms_query="INSERT INTO `ilab_mobile_message_info`(`slno`, `mobile_no`, `message_info`, `respond_info`, `date`, `time`, `type_sending`,`server_message`,`message_id`) VALUES (Null,'$user_no','$message','$server_output','$date','$time','payment_user','$smsgatewaydata','3' )";
		            					$result1=mysqli_query($conn,$sms_query);
							  			$msg->success("Congratulations! Application with Ref ID ".$CustomerID." has been successfully submitted against applied posts.");
									 header('Location:receipt?CustomerID='.$CustomerID);
						             exit;
						         }else{
						         	$msg->success("Congratulations! Application with Ref ID ".$CustomerID." has been successfully submitted against applied posts.");
							 		header('Location:receipt?CustomerID='.$CustomerID);
				             		exit;
						         }

					  		}else{
					  			$msg->success("Congratulations! Application with Ref ID ".$CustomerID." has been successfully submitted against applied posts.");
							 header('Location:receipt?CustomerID='.$CustomerID);
				             exit;
					  		}

					  		$msg->success("Congratulations! Application with Ref ID ".$CustomerID." has been successfully submitted against applied posts.");
							 header('Location:receipt?CustomerID='.$CustomerID);
				             exit;

						}else{
							$msg->error('Something Went Worng1');
							 header('Location:user_dashboard');
				             exit;
						}

				

			}else{
				$msg->error('Something Went Worng3');
			 header('Location:user_dashboard');
             exit;
			}
			
		}else{
			$msg->error('Something Went Worng4');
			 header('Location:user_dashboard');
             exit;
		}
	    // print_r (explode("|",$responde_receiced));
	}else{
		$TxnDate=$array_id[13];
		$ErrorDescription=$array_id[24];
		$payment_date=date('Y-m-d',strtotime(trim($TxnDate)));
		$payment_time=date('H:i:s',strtotime(trim($TxnDate)));
		$AuthStatus=$array_id[14];
		$CustomerID=$array_id[1];
		$AuthStatus=$array_id[14];
		$TxnReferenceNo=$array_id[2];
		$BankReferenceNo=$array_id[3];
		$user_no_mobile=$array_id[17];

		$check_query="SELECT * FROM `ilab_payment_info` WHERE `payment_reference_no`='$CustomerID' and `mobile_no`='$user_no_mobile'";
		
		$sql_check_query=mysqli_query($conn,$check_query);
		 $numrow=mysqli_num_rows($sql_check_query);
		
		if($numrow==1){			
			$fetch_detail=mysqli_fetch_assoc($sql_check_query);
			
			$mobile_no=$user_no=$fetch_detail['mobile_no'];
			$application_no=$fetch_detail['application_no'];
			$slno_group_pay=$fetch_detail['slno_group_pay'];
			$group_id_slno=$group_id=$fetch_detail['group_id_slno'];
			$_SESSION['user_no']=$mobile_no;
			$_SESSION['application_no']=$application_no;
			$_SESSION['candidate_name']=$fetch_detail['candidate_name'];
			$s2s_respose=$fetch_detail['s2s_respose'];		
			$slno_group_pay=$fetch_detail['slno_group_pay'];

			if($s2s_respose==0){
				if($AuthStatus=="0399"){

					$update="UPDATE `ilab_payment_info` SET `payment_date`='$payment_date', `payment_time`='$payment_time', `TxnReferenceNo`='$TxnReferenceNo', `ErrorDescription`='$ErrorDescription', `BankReferenceNo`='$BankReferenceNo',`AuthStatus`='$AuthStatus',`responde_receiced`='$responde_receiced',`payment_status`='2',`s2s_respose`='2' WHERE`slno_group_pay`='$slno_group_pay'";

				}else if($AuthStatus=="0001"){
					
					$update="UPDATE `ilab_payment_info` SET `payment_date`='$payment_date', `payment_time`='$payment_time', `TxnReferenceNo`='$TxnReferenceNo', `ErrorDescription`='$ErrorDescription', `BankReferenceNo`='$BankReferenceNo',`AuthStatus`='$AuthStatus',`responde_receiced`='$responde_receiced',`payment_status`='2',`s2s_respose`='2' WHERE`slno_group_pay`='$slno_group_pay'";

				}else if($AuthStatus=="0002"){

					$update="UPDATE `ilab_payment_info` SET `payment_date`='$payment_date', `payment_time`='$payment_time', `TxnReferenceNo`='$TxnReferenceNo', `ErrorDescription`='$ErrorDescription', `BankReferenceNo`='$BankReferenceNo',`AuthStatus`='$AuthStatus',`responde_receiced`='$responde_receiced',`payment_status`='2',`s2s_respose`='2' WHERE`slno_group_pay`='$slno_group_pay'";

				}else{

					$update="UPDATE `ilab_payment_info` SET `payment_date`='$payment_date', `payment_time`='$payment_time', `TxnReferenceNo`='$TxnReferenceNo', `ErrorDescription`='$ErrorDescription', `BankReferenceNo`='$BankReferenceNo',`AuthStatus`='$AuthStatus',`responde_receiced`='$responde_receiced',`payment_status`='2',`s2s_respose`='2' WHERE`slno_group_pay`='$slno_group_pay'";

				}
				$sql_check_query=mysqli_query($conn,$update);
			}
			// echo "1";
			// exit;
			
			 $msg->error('Payment Failed. Kindly try again');
			 header('Location:user_dashboard');
             exit;
		}else{
			// echo "2";
			// exit;
			 $msg->error('Something Went Worng5');
			 header('Location:user_dashboard');
             exit;
		}
		// echo "3";
		// 	exit;
		$msg->error('Something Went Worng6');
		header('Location:user_dashboard');
        exit;
		
		
	}
// }else{
// 	exit;
// header('Location:logout');
//         exit;
// }
