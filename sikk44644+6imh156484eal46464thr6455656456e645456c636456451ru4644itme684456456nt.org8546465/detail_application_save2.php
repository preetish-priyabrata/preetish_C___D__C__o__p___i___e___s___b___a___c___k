<?php 
include 'config.php';
session_start();
if($_SESSION['user_no']){
    require 'FlashMessages.php';
    $msg = new \Preetish\FlashMessages\FlashMessages();
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      if($_FILES['candidate_photo']['name']!=""){
        // if($_FILES['signature']['name']!=""){
          $candidate_name=mysqli_real_escape_string($conn,trim($_POST['candidate_name']));
          $candidate_dob=mysqli_real_escape_string($conn,trim($_POST['candidate_dob']));
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
            // $signature_FILE =$_SESSION['user_no'].$_FILES['signature']['name'];
            // $signature_size =$_FILES['signature']['size'];
            // $signature_tmp =$_FILES['signature']['tmp_name'];
            // $signature_type=$_FILES['signature']['type'];
            // $signature_ext=strtolower(end(explode('.',$_FILES['signature']['name'])));
            
            $expensions= array("jpeg","jpg","png");
            
            if(in_array($candidate_photo_ext,$expensions)=== false){
               $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }
            
            if($candidate_photo_size > 100000){
               $errors[]='File size must be excately 100KB';
            }
            // if(in_array($signature_ext,$expensions)=== false){
            //    $errors_sign[]="extension not allowed, please choose a JPEG or PNG file.";
            // }
            
            // if($signature_size > 100000){
            //    $errors_sign[]='File size must be excately 100KB';
            // }
            
            if(empty($errors)==true){
              // if(empty($errors_sign)==true){
                if(move_uploaded_file($candidate_photo_tmp,"images/photo/".$candidate_photo_FILE)){
                  // if(move_uploaded_file($signature_tmp,"images/sign/".$signature_FILE)){
                    $application_no= $_SESSION['application_no'];
                    $date=date('Y-m-d');
                    $time=date("H:i:s");
                    $update="UPDATE `application_form` SET `candidate_name`='$candidate_name',`candidate_photo`='$candidate_photo_FILE',`candidate_father_name`='$candidate_father_name',`candidate_marital_status`='$marred_status',`candidate_husband_name`='$candidate_husband_name',`candidate_dob`='$candidate_dob',`candidate_present_address`='$candidate_present_address',`candidate_permanent_address`='$candidate_permanent_address',`candidate_qualification`='$candidate_qualification',`candidate_driving_licence_no_status`='$candidate_driving_licence_no_status',`candidate_driving_licence_no`='$candidate_driving_licence_no',`candidate_belongs_cat`='$candidate_belongs_cat',`candidate_gender`='$gender',`candidate_category`='$applying_status',`candidate_bpl_card_no`='$BPL_No',`pwd_card_no`='$pwd_card_no',`pwd_name_id`='$pwd_name_id',`candidate_unmaried_certificate_no_status`='$candidate_unmaried_certificate_no_status',`candidate_unmaried_certificate_no`='$candidate_unmaried_certificate_no',`candidate_marital_status_SSC`='$candidate_husbands_SSC_status',`candidate_husbands_SSC`='$candidate_husbands_SSC',`candidate_divorce_certificate_status`='$candidate_divorce_certificate_status',`candidate_divorce_certificate`='$candidate_divorce_certificate',`candidate_certificate_cat`='$candidate_certificate_cat',`Employment_status`='$Employment_status',`employment_card_no`='$Employment_no',`date`='$date',`time`='$time',`status`='1',`signature_FILE`='$signature_FILE',`c_age`='$c_age',`diploma_status`='$diploma_status', `spae_status`='$spae_status', `spae_no`='$spae_no' WHERE `application_no`='$application_no'";

                    $insert_sql=mysqli_query($conn, $update);
                    $update_moble="UPDATE `ilab_login` SET `complete_status`='1' WHERE `mobile_no_L`='$_SESSION[user_no]'";
                    $insert_sql=mysqli_query($conn, $update_moble);
                      $msg->success('Basic Information Is Stored success');
                    $_SESSION['complete_application']=1;
                    header('Location:user_dashboard');
                    exit;

                   // }else{
                   //  $msg->error('Your Signature Unable to save ');
                   //  header('Location:detail_application');
                   //  exit;
                   // }
                }else{
                   $msg->error('Your Photo Unable to Save');
                   header('Location:detail_application');
                   exit;
                 }
              // }else{
              //   $msg_error=$errors_sign[0]." ".$errors_sign[1];
              //   $msg->error('Error '.$msg_error);
              //   header('Location:detail_application');
              //   exit;
              // }
            }else{
              $msg_error=$errors[0]." ".$errors[1];
              $msg->error('Error '.$msg_error);
              header('Location:detail_application');
              exit;
            }
        // }else{
        //    $msg->error('Please Upload Your Signature');
        //    header('Location:detail_application');
        //   exit;
        // }
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
  header('Location:logout');
  exit;
}