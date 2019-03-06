<?php

include 'config.php';
$Category_names =strtolower(trim($_REQUEST['Category_names']));
	$query="SELECT * FROM `ilab_login` where `status`='1' and `mobile_no_L`='$Category_names' ";
	$result=mysqli_query($conn,$query);
  	$num_rows=mysqli_num_rows($result);
  	if($num_rows==0){
  		$otp=rand(100000,10000000);
  		$date=date('Y-m-d');
  		$time=date('H:i:s');
  		$inesert="INSERT INTO `ilab_registration`(`slno_R`, `mobile_no`, `otp_no`, `date`, `time`, `status`) VALUES (NULL,'$Category_names','$otp','$date','$time','2')";
  		$result1=mysqli_query($conn,$inesert);
  		$new_message1='Your registration OTP is '.$otp;
      
      $user="Innolab";
      $key="a1da054ec1XX";
      $api_params = 'user='.$user.'&key='.$key.'&mobile=91'.$Category_names.'&message='.$new_message1.'&senderid=SKHAFW&accusage=1';
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

       $sms_query="INSERT INTO `ilab_mobile_message_info`(`slno`, `mobile_no`, `message_info`, `respond_info`, `date`, `time`, `type_sending`,`server_message`,`message_id`) VALUES (Null,'$Category_names','$new_message1','$server_output','$date','$time','Registation OTP','$smsgatewaydata','2' )";
        $result1=mysqli_query($conn,$sms_query);

  		echo "1";

  		exit;
  	}else{
  		echo "2";
  		exit;
  	}