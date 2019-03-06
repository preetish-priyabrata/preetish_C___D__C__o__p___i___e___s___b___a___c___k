<?php 
session_start();
if($_SESSION['admin_Pre_tech_s']){
	require 'FlashMessages.php';
	require '../config.php';
	$date=date('Y-m-d');
	$time=date('H:i:s');
	 $msg = new \Preetish\FlashMessages\FlashMessages();
	echo $query="SELECT * FROM `ilab_login_paid` WHERE `status`='0' AND `send_status`='0' ";
	$sql_exe=mysqli_query($conn,$query);
	// echo mysqli_error($conn);
	// exit;
	while($res=mysqli_fetch_assoc($sql_exe)){
		$Category_names=$res['mobile_no_L'];

	$message="Dear Applicant admit card for application ref no has been uploaded at www.sikkimhealthrecruitment.org. To download and print, kindly login with following login credentials. User id: Your registered mobile no. Password is ".$res['password']." . Download between 16th April to 30th April.";
	 $user="Innolab";
      $key="a1da054ec1XX";
			$api_params = 'user='.$user.'&key='.$key.'&mobile=91'.$Category_names.'&message='.$message.'&senderid=SKHAFW&accusage=1';
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
              // print_r($server_output);
			  		curl_close ($ch);
            $sms_query="INSERT INTO `ilab_mobile_message_info`(`slno`, `mobile_no`, `message_info`, `respond_info`, `date`, `time`, `type_sending`,`server_message`,`message_id`) VALUES (Null,'$Category_names','$message','$server_output','$date','$time','Intimation','$smsgatewaydata','10' )";
            $result1=mysqli_query($conn,$sms_query);
            $update="UPDATE `ilab_login_paid` SET `send_status`='1' WHERE `slno_L`='$res[slno_L]'";
             mysqli_query($conn,$update);
             $msg->success('Successfull Send '.$Category_names);	

	}
	// $msg->success('Successfull Send ');	
			header("location:index");
			exit;

		}else{
			header("location:index");
			exit;	
		}