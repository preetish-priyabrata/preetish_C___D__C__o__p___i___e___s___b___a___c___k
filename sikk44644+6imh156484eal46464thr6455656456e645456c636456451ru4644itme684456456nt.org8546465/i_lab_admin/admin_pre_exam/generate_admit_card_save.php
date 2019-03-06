<?php
session_start();
if($_SESSION['admin_preexam']){
	require 'FlashMessages.php';
	require '../config.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
	$exam=trim($_POST['exam']);
	$get_candidate="SELECT * FROM `ilab_pre_exam_roll_no_exam_center` WHERE `group_exam_slno`='$exam' and `generate_attendance`='1' AND `generate_admit`='0'";
	$sql_get_candidate=mysqli_query($conn,$get_candidate);
	while ($res=mysqli_fetch_assoc($sql_get_candidate)){

		$mobile_NO=$res['candidate_moblie'];
		$slno_roll_id=$res['slno_roll_id'];
		$get_update="UPDATE `ilab_pre_exam_roll_no_exam_center` SET  `generate_admit`='1' WHERE `slno_roll_id`='$slno_roll_id'";
		mysqli_query($conn,$get_update);
		$message1="Dear Applicant admit card for application ref no has been uploaded at www.sikkimhealthrecruitment.org. To download and print, kindly login with your registered mobile no.";
		$user="Innolab";
      	$key="a1da054ec1XX";
      	$api_params = 'user='.$user.'&key='.$key.'&mobile=91'.$mobile_NO.'&message='.$message1.'&senderid=SKHAFW&accusage=1';
            // $smsGatewayUrl = "http://sms.gpileportal.co.in/submitsms.jsp?";  
					        $smsGatewayUrl = "http://sms.sikkimhealthrecruitment.org/submitsms.jsp?"; 
            // $smsGatewayUrl = "http://103.233.79.246//submitsms.jsp?"; 
		// $api_params = 'user=SKHFW1&key=d671ff35a1XX&mobile=91'.$mobile_NO.'&message='.$message1.'&senderid=SKHAFW&accusage=1';
		// $smsGatewayUrl = "http://sms.gpileportal.co.in/submitsms.jsp?";  
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


	}	
	// $arr = array('Hello','World!','Beautiful','Day!');
	// $mobile_array=implode(",",$mobile_NO);
	
			  			
  		// echo "1";
	$update="UPDATE `ilab_exam_group` SET `admit_status`='1' WHERE `slno_group`='$exam'";
	$update_exe=mysqli_query($conn,$update);

	if ($update_exe) {
		$msg->success('Sucessfully Admit Card Generated');
		 	header('Location:index');
			exit;
	}else{
		$msg->error('Unsuccessfull, Admit Card Generated');
		 	header('Location:index');
			exit;
	}


}else{
	header('Location:logout');
	exit;
}