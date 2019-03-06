<?php

include 'config.php';
$Category_names =strtolower(trim($_REQUEST['Category_names']));
	$query="SELECT * FROM `ilab_login` where `status`='1' and `mobile_no_L`='$Category_names' ";
	$result=mysqli_query($conn,$query);
  	$num_rows=mysqli_num_rows($result);
  	if($num_rows==1){
  		$otp = rand(100000,999999);
  		$date=date('Y-m-d');
  		$time=date('H:i:s');
      $fetch=mysqli_fetch_assoc($result);
      $slno_L=$fetch['slno_L'];
  		$inesert="INSERT INTO `ilab_otp_table`(`slno_otp`, `otp_no`, `mobile_no`, `slno_L`, `status`, `date`, `time`) VALUES (Null,'$otp','$Category_names','$slno_L','2','$date','$time')";
  		$result1=mysqli_query($conn,$inesert);
      // sms.gpileportal.co.in/submitsms.jsp?user=SKHFW1&key=d671ff35a1XX&mobile=+919776069881&message=test sms&senderid=SKHAFW&accusage=1
  		 $new_message1='Your Otp for login is '.$otp;
       // http://103.233.79.246//submitsms.jsp?user=SACHIN&key=96f84f2a28XX&mobile=919776069881&message=test sms&senderid=SKHAFW&accusage=1
      $user="Innolab";
      $key="a1da054ec1XX";
			$api_params = 'user='.$user.'&key='.$key.'&mobile=91'.$Category_names.'&message='.$new_message1.'&senderid=SKHAFW&accusage=1';
			    	// $smsGatewayUrl = "http://sms.gpileportal.co.in/submitsms.jsp?";  
			    	 $smsGatewayUrl = "http://sms.sikkimhealthrecruitment.org/submitsms.jsp1?";   
            $smsgatewaydata = $smsGatewayUrl.$api_params;
			    	$url = $smsgatewaydata;
			    	$ch = curl_init();
				    curl_setopt($ch, CURLOPT_URL,$smsGatewayUrl);
			  		curl_setopt($ch, CURLOPT_POST, 1);
			  		curl_setopt($ch, CURLOPT_POSTFIELDS,$api_params);  
						  // receive server response ...
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			    	$server_output = curl_exec ($ch);
              // print_r($server_output);
			  		curl_close ($ch);
            $sms_query="INSERT INTO `ilab_mobile_message_info`(`slno`, `mobile_no`, `message_info`, `respond_info`, `date`, `time`, `type_sending`,`server_message`,`message_id`) VALUES (Null,'$Category_names','$new_message1','$server_output','$date','$time','Login OTP','$smsgatewaydata','1' )";
            $result1=mysqli_query($conn,$sms_query);
  		echo "1";
  		exit;
  	}else{
  		echo "2";
  		exit;
  	}