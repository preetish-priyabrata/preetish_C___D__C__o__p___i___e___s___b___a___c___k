<?php
include 'config.php';
session_start();
if($_SESSION['user_no']){
    require 'FlashMessages.php';
    $msg = new \Preetish\FlashMessages\FlashMessages();
    $sql="SELECT * from `ilab_login` where `mobile_no_L`='$_SESSION[user_no]' and `complete_status`='0' and `basic_status`='1'";
    $sql_query_check=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($sql_query_check);
    if($num==1){
      $sql_application_form_query="SELECT * from `application_form` where `candidate_mobile`='$_SESSION[user_no]'";
        $sql_application_form=mysqli_query($conn,$sql_application_form_query);
        $num_application_form_query=mysqli_num_rows($sql_application_form);
        if($num_application_form_query==1){
          if($_SERVER["REQUEST_METHOD"] == "POST"){
            if($_FILES['candidate_photo']['name']!=""){
              $candidate_name=preg_replace("/[^a-zA-Z]/", " ",mysqli_real_escape_string($conn,trim($_POST['candidate_name'])));
                $iti_certificate_no=mysqli_real_escape_string($conn,trim($_POST['iti_certificate_no']));
                $candidate_father_name=mysqli_real_escape_string($conn,trim($_POST['candidate_father_name']));
                $gender=mysqli_real_escape_string($conn,trim($_POST['gender']));
                $marred_status=mysqli_real_escape_string($conn,trim($_POST['marred_status']));
                $candidate_husband_name=mysqli_real_escape_string($conn,trim($_POST['candidate_husband_name']));
                $candidate_qualification=mysqli_real_escape_string($conn,trim($_POST['candidate_qualification']));
                $candidate_belongs_cat=mysqli_real_escape_string($conn,trim($_POST['candidate_belongs_cat']));
                $candidate_certificate_cat=mysqli_real_escape_string($conn,trim($_POST['candidate_certificate_cat']));
                $applying_status=mysqli_real_escape_string($conn,trim($_POST['applying_status']));
                $BPL_No=mysqli_real_escape_string($conn,trim($_POST['BPL_No']));
                $pwd_card_no=mysqli_real_escape_string($conn,trim($_POST['pwd_card_no']));
                $pwd_name_id=mysqli_real_escape_string($conn,trim($_POST['pwd_name_id']));
                $candidate_driving_licence_no_status=mysqli_real_escape_string($conn,trim($_POST['candidate_driving_licence_no_status']));
                $candidate_driving_licence_no=mysqli_real_escape_string($conn,trim($_POST['candidate_driving_licence_no']));
                $candidate_unmaried_certificate_no_status=mysqli_real_escape_string($conn,trim($_POST['candidate_unmaried_certificate_no_status']));
                $candidate_unmaried_certificate_no=mysqli_real_escape_string($conn,trim($_POST['candidate_unmaried_certificate_no']));
                $candidate_husbands_SSC_status=mysqli_real_escape_string($conn,trim($_POST['candidate_husbands_SSC_status']));
                $candidate_husbands_SSC=mysqli_real_escape_string($conn,trim($_POST['candidate_husbands_SSC']));
                $candidate_divorce_certificate_status=mysqli_real_escape_string($conn,trim($_POST['candidate_divorce_certificate_status']));
                $candidate_divorce_certificate=mysqli_real_escape_string($conn,trim($_POST['candidate_divorce_certificate']));
                $Employment_status=mysqli_real_escape_string($conn,trim($_POST['Employment_status']));
                $Employment_no=mysqli_real_escape_string($conn,trim($_POST['Employment_no']));
                $candidate_present_address=mysqli_real_escape_string($conn,trim($_POST['candidate_present_address']));
                $billingtoo=mysqli_real_escape_string($conn,trim($_POST['billingtoo']));
                $candidate_permanent_address=mysqli_real_escape_string($conn,trim($_POST['candidate_permanent_address']));
                $c_age=mysqli_real_escape_string($conn,trim($_POST['c_age']));
                $diploma_status=mysqli_real_escape_string($conn,$_POST['diploma_status']);
                $spae_status=mysqli_real_escape_string($conn,$_POST['spae_status']);
                $spae_no=mysqli_real_escape_string($conn,$_POST['spae_no']);

                $errors= array();
                $errors_sign= array();
                $candidate_photo_FILE =$_SESSION['user_no'].$_FILES['candidate_photo']['name'];
                $candidate_photo_size =$_FILES['candidate_photo']['size'];
                $candidate_photo_tmp =$_FILES['candidate_photo']['tmp_name'];
                $candidate_photo_type=$_FILES['candidate_photo']['type'];
                $candidate_photo_ext=strtolower(end(explode('.',$_FILES['candidate_photo']['name'])));
                $signature_FILE="no";
                $expensions= array("jpeg","jpg","png");
                if(in_array($candidate_photo_ext,$expensions)=== false){
                    $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                }
                if($candidate_photo_size > 400000){
                    $errors[]='File size must be excately 100KB';
                }
                if(empty($errors)==true){
                            if(move_uploaded_file($candidate_photo_tmp,"images/photo/".$candidate_photo_FILE)){
                
                        $application_no= $_SESSION['application_no'];
                        $user_no=$_SESSION['user_no'];
                      $date=date('Y-m-d');
                      $time=date("H:i:s");
                      
                      $update="UPDATE `application_form` SET `candidate_name`='$candidate_name',`candidate_photo`='$candidate_photo_FILE',`candidate_father_name`='$candidate_father_name',`candidate_marital_status`='$marred_status',`candidate_husband_name`='$candidate_husband_name',`candidate_present_address`='$candidate_present_address',`candidate_permanent_address`='$candidate_permanent_address',`candidate_qualification`='$candidate_qualification',`candidate_driving_licence_no_status`='$candidate_driving_licence_no_status',`candidate_driving_licence_no`='$candidate_driving_licence_no',`candidate_belongs_cat`='$candidate_belongs_cat',`candidate_gender`='$gender',`candidate_category`='$applying_status',`candidate_bpl_card_no`='$BPL_No',`pwd_card_no`='$pwd_card_no',`pwd_name_id`='$pwd_name_id',`candidate_unmaried_certificate_no_status`='$candidate_unmaried_certificate_no_status',`candidate_unmaried_certificate_no`='$candidate_unmaried_certificate_no',`candidate_marital_status_SSC`='$candidate_husbands_SSC_status',`candidate_husbands_SSC`='$candidate_husbands_SSC',`candidate_divorce_certificate_status`='$candidate_divorce_certificate_status',`candidate_divorce_certificate`='$candidate_divorce_certificate',`candidate_certificate_cat`='$candidate_certificate_cat',`Employment_status`='$Employment_status',`employment_card_no`='$Employment_no',`date`='$date',`time`='$time',`status`='1',`signature_FILE`='$signature_FILE',`diploma_status`='$diploma_status', `spae_status`='$spae_status', `spae_no`='$spae_no',`iti_certificate_no`='$iti_certificate_no' WHERE `application_no`='$application_no' and `candidate_mobile`='$user_no'";

                      $insert_sql=mysqli_query($conn, $update);
                      $update_moble="UPDATE `ilab_login` SET `complete_status`='1' WHERE `mobile_no_L`='$_SESSION[user_no]'";
                      $insert_sql=mysqli_query($conn, $update_moble);
                      $msg->success('Basic Information has been Stored successfully');
                      $_SESSION['complete_application']=1;
                      header('Location:user_dashboard');
                      exit;                  
                          
                    }else{
                        $msg_error=$errors[0]." ".$errors[1];
                        $msg->error('Error '.$msg_error);
                        $msg->error('Your Photo Unable to Save');
                        header('Location:detail_application');
                        exit;
                    }
                      
                }else{
                    $msg_error=$errors[0]." ".$errors[1];
                    $msg->error('Error '.$msg_error);
                    header('Location:detail_application');
                    exit;
                }
            }else{
              $msg->error('Please Upload Your Photo');
                header('Location:detail_application');
                exit;
            }
          }else{
            header('Location:logout');
            exit;
          }
        }else{
          $Mobile=$_SESSION['user_no'];
          $query_login="SELECT * FROM `ilab_login` WHERE `mobile_no_L`='$_SESSION[user_no]' and `status`='1'";
          $result_login=mysqli_query($conn,$query_login);
          $fetch_result_login=mysqli_fetch_assoc($result_login);
          if(($fetch_result_login['basic_status']==1) && ($fetch_result_login['complete_status']==1)){
            $application_form_query="SELECT * from `application_form` where `candidate_mobile`='$Mobile'";
            $sql_application_form=mysqli_query($conn,$application_form_query);
            $num_application_form=mysqli_num_rows($sql_application_form);
            if($num_application_form==1){
              $qry_check_appno="SELECT * FROM `candidate_application_info` WHERE `candidate_mobile`='$Mobile'";
            $sql_check_appno=mysqli_query($conn, $qry_check_appno);
            $res_check_appno=mysqli_fetch_array($sql_check_appno);
            $appno= $res_check_appno["application_no"];
            // session_destroy();
                session_start();
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
              $_SESSION['active_basic_status']=0;
              $_SESSION['complete_application']=0;
            $_SESSION['user_no']=$Mobile; 
            $msg->error("Please Fill Detail Correct Don't Open Multiple Tab Of Browser ");
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
            // session_destroy();
                session_start();
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
              $_SESSION['active_basic_status']=0;
              $_SESSION['complete_application']=0;
            $_SESSION['user_no']=$Mobile; 
            $msg->success("Please Fill Detail Correct Don't Open Multiple Tab Of Browser ");
            header('Location:basic_registration');
            exit; 
          }
          }elseif(($fetch_result_login['basic_status']==0) && ($fetch_result_login['complete_status']==0)){
            $del_query="DELETE FROM `candidate_application_info` WHERE `candidate_mobile`='$Mobile'";
          $sql_del=mysqli_query($conn,$del_query);
          $update_moble="UPDATE `ilab_login` SET `complete_status`='0',`basic_status`='0' WHERE `mobile_no_L`='$Mobile'";
          $insert_sql=mysqli_query($conn, $update_moble);
              session_start();
            $_SESSION['active_basic_status']=0;
          $_SESSION['complete_application']=0;
          $_SESSION['user_no']=$Mobile;    
          $msg->error("Please Fill Detail Correct Don't Open Multiple Tab Of Browser ");
          header('Location:basic_registration');
          exit;
          }else{
            header('Location:logout');
          exit;
          }
        }
    }else{
        $Mobile=$_SESSION['user_no'];
    $query_login="SELECT * FROM `ilab_login` WHERE `mobile_no_L`='$Mobile' and `status`='1'";
    $result_login=mysqli_query($conn,$query_login);
    $fetch_result_login=mysqli_fetch_assoc($result_login);
    if(($fetch_result_login['basic_status']==1) && ($fetch_result_login['complete_status']==1)){
      $application_form_query="SELECT * from `application_form` where `candidate_mobile`='$Mobile'";
        $sql_application_form=mysqli_query($conn,$application_form_query);
        $num_application_form=mysqli_num_rows($sql_application_form);
        if($num_application_form==1){
          $qry_check_appno="SELECT * FROM `candidate_application_info` WHERE `candidate_mobile`='$Mobile'";
        $sql_check_appno=mysqli_query($conn, $qry_check_appno);
        $res_check_appno=mysqli_fetch_array($sql_check_appno);
        $appno= $res_check_appno["application_no"];
      // session_destroy();
            session_start();
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
          $_SESSION['active_basic_status']=0;
          $_SESSION['complete_application']=0;
          $_SESSION['user_no']=$Mobile;    
        $msg->error("Please Fill Detail Correct Don't Open Multiple Tab Of Browser ");
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
            // session_destroy();
            session_start();
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
          $_SESSION['active_basic_status']=0;
          $_SESSION['complete_application']=0;
          $_SESSION['user_no']=$Mobile;    
        $msg->error("Please Fill Detail Correct Don't Open Multiple Tab Of Browser ");
        header('Location:basic_registration');
        exit; 
      }
      }elseif(($fetch_result_login['basic_status']==0) && ($fetch_result_login['complete_status']==0)){
        $del_query="DELETE FROM `candidate_application_info` WHERE `candidate_mobile`='$Mobile'";
      $sql_del=mysqli_query($conn,$del_query);
      $update_moble="UPDATE `ilab_login` SET `complete_status`='0',`basic_status`='0' WHERE `mobile_no_L`='$Mobile'";
      $insert_sql=mysqli_query($conn, $update_moble);
        session_start();
      $_SESSION['active_basic_status']=0;
      $_SESSION['complete_application']=0;
      $_SESSION['user_no']=$Mobile;    
       $msg->success("Please Fill Detail Correct Don't Open Multiple Tab Of Browser ");
      header('Location:basic_registration');
      exit;
      }else{
        header('Location:logout');
      exit;
      }
    }

}else{ // sesson out
  header('Location:logout');
  exit;
}