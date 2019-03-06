<?php

session_start();

session_destroy();
include 'config.php';
require 'FlashMessages.php';
  	$msg = new \Preetish\FlashMessages\FlashMessages();
  	$Mobile=mysqli_real_escape_string($conn,$_POST['Mobile']);
	$user_paswword=mysqli_real_escape_string($conn,$_POST['user_paswword']);
	$form_type=web_decryptIt(str_replace(" ", "+",($_REQUEST['form_type'])));
// print_r($_POST);


 if($form_type=="registered"){
 	if(empty($Mobile)){
    		$msg->error('Mobile No is Blank');
		    header('Location:sign_in');
		    exit;
	}else if(empty($user_paswword)){
				$msg->error('Password Is Blank');
		    	header('Location:sign_in');
		    	exit;

	}else{
		 $check_login="SELECT * FROM `ilab_login_paid` WHERE `mobile_no_L`='$Mobile'";
		$result=mysqli_query($conn,$check_login);
      	 $num_rows=mysqli_num_rows($result);
      	// 1Array ( [slno_L] => 2 [slno_L_ID] => 53 [mobile_no_L] => 9647976312 [date] => 2018-02-16 [time] => 08:17:40 [status] => 1 [basic_status] => 1 [complete_status] => 1 [paid_status_check] => 1 [password] => 5324635 [paid_application] => 1 [group_id_driver] => 2 [group_id_d] => 1 [group_id_status] => 1 [group_both_id] => 1 [generate_roll_d] => 1 [generate_roll_driver] => 0 ) 
      	if($num_rows=='1'){
      		$result=mysqli_fetch_assoc($result);
      		// print_r($result);
      		 $password_id=$result['password'];
      		if($password_id==$user_paswword){
      			$application_form_query="SELECT * from `application_form_paid` where `candidate_mobile`='$Mobile'";
				        $sql_application_form=mysqli_query($conn,$application_form_query);
				         $num_application_form=mysqli_num_rows($sql_application_form);
				         if($num_application_form==1){
				         	$qry_check_appno="SELECT * FROM `candidate_application_info` WHERE `candidate_mobile`='$Mobile'";
				  			   $sql_check_appno=mysqli_query($conn, $qry_check_appno);
				  			   $res_check_appno=mysqli_fetch_array($sql_check_appno);
				  			   $appno= $res_check_appno["application_no"];
				           	session_start();
				           	$_SESSION['last_login_timestamp'] = time(); 
				    		$_SESSION['active_basic_status']=1;
				    		$_SESSION['complete_application']=1;
				  			$_SESSION['application_no']=$appno;
				  			$_SESSION['user_no']=$Mobile; 
				            $msg->success('Successfully Login ');
				  			   header('Location:user_dashboard');
				  		 	   exit;
				         }else{
				         	$msg->error('Invaild User');
		    				header('Location:sign_in');
		    				exit;
				         }
      		}else{
      			$msg->error('Invaild User');
		    	header('Location:sign_in');
		    	exit;
      		}
      	}else{
      		$msg->error('Invaild User');
		    header('Location:sign_in');
		    exit;
      	}
	}
 }else{
 	session_start();
 	$msg->error('Be Human Login Is valid');
	header('Location:sign_in');
	exit;
 }
// Array ( [form_type] => 7Ue/NdwCke80OZG2sf5I5GhU4xTlRrdZ8e77TCNihBg= [Mobile] => 9647976312 [user_paswword] => 5324635 ) 