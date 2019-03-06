<?php

// print_r($_POST);
// Array ( [email] => admin@rhclmisbr.com [password] => 123456 [user_form] => login_allowed )  
error_reporting(4);
session_start();

require 'config.php';
require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();

   $userid=mysqli_real_escape_string($conn,trim($_POST['email']));
   $pass=mysqli_real_escape_string($conn,trim($_POST['password']));
   if($_POST['user_form']=="login_allowed"){
   		$query_login="SELECT * FROM `rhc_master_admin_user` where `admin_email`='$userid' and `status`='1'";
    	$sql_login=mysqli_query($conn,$query_login);   
     	$login_num_row=mysqli_num_rows($sql_login);
      
      $query_login1="SELECT * FROM `rhc_master_login_user` where `user_email`='$userid' and `status_login`='1'";
      $sql_login1=mysqli_query($conn,$query_login1);   
      $login_num_row1=mysqli_num_rows($sql_login1);
    	
    	if(($login_num_row==1) && ($login_num_row1==0)){

    		$res=mysqli_fetch_assoc($sql_login);
    		if($res['admin_email']==$userid && $res['password']==$pass){
    			$_SESSION['title']="RHCLMIS ADMIN DASHBOARD";
	    		$_SESSION['admin_emails']=$userid;
	    		$_SESSION['admin_type']="Master";
	            $_SESSION['admin_name']=$res['admin_name'];                      
	            $msg->success('Welcome Admin  ');
	            header('Location:admin/admin_dashboard.php');
	            exit;
	        }else{
	        	$msg->error('Invalid User');
    			header('Location:index.php');
    			exit;	
	        }

    	}else if(($login_num_row==0) && ($login_num_row1==1)){

        $res=mysqli_fetch_assoc($sql_login1);
        if($res['user_email']==$userid && $res['password']==$pass){
          $desgination=$res['user_designation'];
          switch ($desgination) {
            case '1':
                $_SESSION['designation']=$desgination;
                $_SESSION['place_id']=$res['place_state_id'];
                $_SESSION['title']="RHCLMIS User DASHBOARD";
                $_SESSION['admin_emails']=$userid;
                $_SESSION['admin_type']="User";
                $_SESSION['admin_name']=$res['user_name'];                      
                $msg->success('Welcome User  ');
                header('Location:admin_state/admin_dashboard.php');
                exit;
              break;
            case '2':
            // here district
                $_SESSION['designation']=$desgination;
                $_SESSION['place_id']=$res['place_district_id'];
                $_SESSION['title']="RHCLMIS User DASHBOARD";
                $_SESSION['admin_emails']=$userid;
                $_SESSION['admin_type']="User";
                $_SESSION['admin_name']=$res['user_name'];                      
                $msg->success('Welcome '.$res['user_name'].' User  ');
                header('Location:admin_district/admin_dashboard.php');
                exit;
              break;
            case '3':
            // Here Block
                $_SESSION['designation']=$desgination;
                $_SESSION['place_id']=$res['place_block_dh_id'];
                $_SESSION['place_status']=$res['place_block_dh_status'];
                $_SESSION['title']="RHCLMIS User DASHBOARD";
                $_SESSION['admin_emails']=$userid;
                $_SESSION['admin_type']="User";
                $_SESSION['admin_name']=$res['user_name'];                      
                $msg->success('Welcome '.$res['user_name'].' User');
                header('Location:admin_block/admin_dashboard.php');
                exit;
              break;
            case '4':
            // district hospital
                $_SESSION['designation']=$desgination;
                $_SESSION['place_id']=$res['place_block_dh_id'];
                $_SESSION['place_status']=$res['place_block_dh_status'];
                $_SESSION['title']="RHCLMIS User DASHBOARD";
                $_SESSION['admin_emails']=$userid;
                $_SESSION['admin_type']="User";
                $_SESSION['admin_name']=$res['user_name'];                      
                $msg->success('Welcome '.$res['user_name'].' User');
                header('Location:admin_dh/admin_dashboard.php');
                exit;
                
              break;
            case '5':
                $_SESSION['designation']=$desgination;
                $_SESSION['place_id']=$res['place_phc_aphc_id'];
                $_SESSION['place_status']=$res['place_block_dh_status'];
                $_SESSION['title']="RHCLMIS User DASHBOARD";
                $_SESSION['admin_emails']=$userid;
                $_SESSION['admin_type']="User";
                $_SESSION['admin_name']=$res['user_name'];                      
                $msg->success('Welcome '.$res['user_name'].' User');
                header('Location:admin_phc/admin_dashboard.php');
                exit;
                
               
              break;
            case '6':
                $_SESSION['designation']=$desgination;
                $_SESSION['place_id']=$res['place_phc_aphc_id'];
                $_SESSION['place_status']=$res['place_block_dh_status'];
                $_SESSION['title']="RHCLMIS User DASHBOARD";
                $_SESSION['admin_emails']=$userid;
                $_SESSION['admin_type']="User";
                $_SESSION['admin_name']=$res['user_name'];                      
                $msg->success('Welcome '.$res['user_name'].' User');
                header('Location:admin_aphc/admin_dashboard.php');
                exit;
                
              break;
              case '11':
            // district hospital
                $_SESSION['designation']=$desgination;
                $_SESSION['place_id']=$res['place_block_dh_id'];
                $_SESSION['place_status']=$res['place_block_dh_status'];
                $_SESSION['title']="RHCLMIS User DASHBOARD";
                $_SESSION['admin_emails']=$userid;
                $_SESSION['admin_type']="User";
                $_SESSION['admin_name']=$res['user_name'];                      
                $msg->success('Welcome '.$res['user_name'].' User');
                header('Location:admin_uphc/admin_dashboard.php');
                exit;
                
              break;
            case '7':
                $_SESSION['designation']=$desgination;
                $_SESSION['place_id']=$res['sub_center_id'];
                $_SESSION['place_status']=$res['place_block_dh_status'];
                $_SESSION['title']="RHCLMIS User DASHBOARD";
                $_SESSION['admin_emails']=$userid;
                $_SESSION['admin_type']="User";
                $_SESSION['admin_name']=$res['user_name'];                      
                $msg->success('Welcome '.$res['user_name'].' User');
                header('Location:admin_hsc/admin_dashboard.php');
                exit;
                   
              break;
            case '8':
                      $msg->error('Invalid User');
                      header('Location:index.php');
                      exit; 
              break;           
            default:
                $msg->error('Invalid User');
                header('Location:index.php');
                exit; 
              break;
          }
      
          
          }else{
            $msg->error('Invalid User');
          header('Location:index.php');
          exit; 
          }

    	}else{
    		$msg->error('Invalid User');
    		header('Location:index.php');
    		exit;
    	}


   }else{
   	$msg->error('Some Field Left Blank');
    header('Location:index.php');
    exit;
   }
                                        