<?php
// print_r($_POST);
// Array ( [email_id] => admin@ilab.com [pass_word] => 1234 ) <?php
error_reporting(4);
session_start();

require 'config.php';
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();

	$userid=mysqli_real_escape_string($conn,trim($_POST['email_id']));
    $pass=mysqli_real_escape_string($conn,trim($_POST['pass_word']));

    // master admin check present or not
    
   	$query_login="SELECT * FROM `lt_master_admin_login` where `user_email`='$userid' and `status`='1'";
    $sql_login=mysqli_query($conn,$query_login);   
     $login_num_row=mysqli_num_rows($sql_login);

    // next table where user viewer table information is stored
     $query_login1="SELECT * FROM `lt_master_user_system` WHERE `user_email`='$userid' and `u_status`='1'";
    $sql_login1=mysqli_query($conn,$query_login1);   
     $login_num_row1=mysqli_num_rows($sql_login1);
    
    // $login_num_row1=0;

    if(($login_num_row==1) && ($login_num_row1==0)){
    	$res=mysqli_fetch_assoc($sql_login);
    	if($res['user_email']==$userid && $res['user_pass']==$pass){
    		$_SESSION['title']="ADMIN Tech DASHBOARD";
	    	$_SESSION['admin']=$userid;
	    	$_SESSION['admin_type']="Master user";
	        $_SESSION['user_name']=$res['user_name'];
            $_SESSION['slno']=$res['slno'];
            
	                        
	        $msg->success('Welcome Admin');
	        header('Location:admin/admin_user/admin_dashboard.php');
	        exit;
    	}else{
    		$msg->error('Invalid User');
    		header('Location:index.php');
    		exit;	
    	}

    }else if(($login_num_row==0) && ($login_num_row1==1)){
        $res=mysqli_fetch_assoc($sql_login1);
            $res_pass=$res['user_pass'];      
            $oldpassword_hash = md5($pass);      
        

        if($res['user_email']==$userid && $res_pass==$oldpassword_hash){
            $user_level=$res['user_level'];
            switch ($user_level) {
                case '1':
                    
                    $_SESSION['admin_hq']=$userid;
                    $_SESSION['admin_type']="HeadQuarter Store User";
                    $_SESSION['user_name']=$res['user_name'];
                    $_SESSION['u_slno']=$res['u_slno'];
                    $_SESSION['User_level']=$res['user_level'];
                    $_SESSION['hq_store_id']=$res['hq_store_id'];
                                    
                    $msg->success('Welcome HeadQuater Officer DashBoard');
                    header('Location:admin/admin_headquater/headquarter_dashboard.php');
                    exit;
                    break;
                case '2':
                    $_SESSION['admin_approver']=$userid;
                    $_SESSION['admin_type']="Approver User";
                    $_SESSION['user_name']=$res['user_name'];
                    $_SESSION['u_slno']=$res['u_slno'];
                    $_SESSION['User_level']=$res['user_level'];
                    $_SESSION['user_id']=$res['user_id'];
                                    
                    $msg->success('Welcome Approver DashBoard');
                    header('Location:admin/admin_approver/approver_dashboard.php');
                    exit;

                    break;
                case '3':
                    $_SESSION['admin_zonal']=$userid;
                    $_SESSION['admin_type']="Site Store User";
                    $_SESSION['user_name']=$res['user_name'];
                    $_SESSION['u_slno']=$res['u_slno'];
                    $_SESSION['User_level']=$res['user_level'];
                    $_SESSION['zonal_place']=$res['sub_site_store_id'];
                    $_SESSION['top_place']=$res['hq_store_id']; 
                         
                    $msg->success('Welcome Site Store DashBoard');
                    header('Location:admin/admin_zonal/zonal_dashboard.php');

                    exit;
                    break;
                case '4':
                    $_SESSION['admin_field']=$userid;
                    $_SESSION['admin_type']="Field Store User";
                    $_SESSION['user_name']=$res['user_name'];
                    $_SESSION['u_slno']=$res['u_slno'];
                    $_SESSION['User_level']=$res['user_level'];
                    $_SESSION['hq_store_id']=$res['hq_store_id'];
                    $_SESSION['zonal_place']=$res['sub_site_store_id'];
                    $_SESSION['field_place']=$res['sub_field_store_id'];
                    // sub_field_store_id
                                    
                    $msg->success('Welcome Field Store DashBoard');
                    header('Location:admin/admin_field/index.php');
                    exit;

                    break;
                
                default:
                    # code...
                    break;
            }

        }else{
           
            $msg->error('Invalid User');
            header('Location:index.php');
            exit;   
        }

    	// $msg->error('Invalid User');
    	// header('Location:index.php');
        // 
    	// exit;	
    }else{
       
    	$msg->error('Invalid User');
    	header('Location:index.php');
    	exit;	
    }