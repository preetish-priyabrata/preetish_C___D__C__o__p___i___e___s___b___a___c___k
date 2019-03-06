<?php
 header('Location:logout');
    exit;
session_start();
include 'config.php';
session_destroy();
  require 'FlashMessages.php';
  $msg = new \Preetish\FlashMessages\FlashMessages();
	$Mobile=mysqli_real_escape_string($conn,$_POST['Mobile']);
  if(empty($Mobile)){
      header('Location:logout');
      exit;
   }else{
      $otp=mysqli_real_escape_string($conn,$_POST['otp']);
      $query="SELECT * FROM `ilab_otp_table` where `status`='2' and `mobile_no`='$Mobile' and `otp_no`='$otp' ";
      $result=mysqli_query($conn,$query);
      $num_rows=mysqli_num_rows($result);
  	if($num_rows!=0){
  		$fetch_otp=mysqli_fetch_assoc($result);
  		$slno_L=$fetch_otp['slno_L'];
  		$slno_otp=$fetch_otp['slno_otp'];
  		$update="UPDATE `ilab_otp_table` SET `status`='1' WHERE `slno_otp`='$slno_otp'";
  		$resultupdate=mysqli_query($conn,$update);
  		 $query_login="SELECT * FROM `ilab_login` WHERE `mobile_no_L`='$Mobile' and `slno_L`='$slno_L' ";
  		$result_login=mysqli_query($conn,$query_login);
  		$fetch_result_login=mysqli_fetch_assoc($result_login);
  		// print_r($fetch_result_login);
  		if(($fetch_result_login['basic_status']==1) && ($fetch_result_login['complete_status']==1)){
        $application_form_query="SELECT * from `application_form` where `candidate_mobile`='$Mobile'";
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
          $del_query="DELETE FROM `candidate_application_info` WHERE `candidate_mobile`='$Mobile'";
          $sql_del=mysqli_query($conn,$del_query);
          $update_moble="UPDATE `ilab_login` SET `complete_status`='0',`basic_status`='0' WHERE `mobile_no_L`='$Mobile'";

            $insert_sql=mysqli_query($conn, $update_moble);
            session_start();
           $_SESSION['last_login_timestamp'] = time(); 
            $_SESSION['active_basic_status']=0;
            $_SESSION['complete_application']=0;
            $_SESSION['user_no']=$Mobile; 
            $msg->success("Please Fill Detail Correct Don't Open Multiple Tab Of Browser ");
            header('Location:basic_registration');
            exit;
        }

  		}else if(($fetch_result_login['basic_status']==1) && ($fetch_result_login['complete_status']==0)){
        $application_form_query="SELECT * from `application_form` where `candidate_mobile`='$Mobile'";
        $sql_application_form=mysqli_query($conn,$application_form_query);
        $num_application_form=mysqli_num_rows($sql_application_form);
        if($num_application_form==1){
    			$qry_check_appno="SELECT * FROM `candidate_application_info` WHERE `candidate_mobile`='$Mobile'";
    			$sql_check_appno=mysqli_query($conn, $qry_check_appno);
    			$res_check_appno=mysqli_fetch_array($sql_check_appno);
    			$appno= $res_check_appno["application_no"];
          session_start();session_start();
           $_SESSION['last_login_timestamp'] = time(); 
      			$_SESSION['active_basic_status']=1;
      			$_SESSION['complete_application']=0;
    			$_SESSION['application_no']=$appno;
    			$_SESSION['user_no']=$Mobile; 
          $msg->success('Successfully Login please fill form Of Basic Information ');
    			header('Location:detail_application');
    		 	exit;
        }else{
          $del_query="DELETE FROM `candidate_application_info` WHERE `candidate_mobile`='$Mobile'";
          $sql_del=mysqli_query($conn,$del_query);
          $update_moble="UPDATE `ilab_login` SET `complete_status`='0',`basic_status`='0' WHERE `mobile_no_L`='$Mobile'";
          $insert_sql=mysqli_query($conn, $update_moble);
          session_start();
           $_SESSION['last_login_timestamp'] = time(); 
          $_SESSION['active_basic_status']=0;
          $_SESSION['complete_application']=0;
          $_SESSION['user_no']=$Mobile; 
          $msg->success("Please Fill Detail Correct Don't Open Multiple Tab Of Browser ");
          header('Location:basic_registration');
          exit;
        }
  		}elseif(($fetch_result_login['basic_status']==0) && ($fetch_result_login['complete_status']==0)){
  			// echo 1;
        
        session_start();
           $_SESSION['last_login_timestamp'] = time(); 
  			$_SESSION['active_basic_status']=0;
			$_SESSION['complete_application']=0;
		 	$_SESSION['user_no']=$Mobile;    
      $msg->success('Successfully Login please fill details of Sikkim  Subject Certificate Id ');
		 	header('Location:basic_registration');
  		}else{
  			exit;
  			header('Location:logout');
 			exit;
  		}
  		exit;
  	}else{
  		header('Location:logout');
 		exit;


  	}
      header('Location:logout');
    exit;
  }
    header('Location:logout');
    exit;