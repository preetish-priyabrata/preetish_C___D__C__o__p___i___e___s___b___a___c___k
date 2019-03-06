<?php

session_start();
if($_SESSION['admin_tech']){
  require 'FlashMessages.php';
  require '../config.php';
  $msg = new \Preetish\FlashMessages\FlashMessages();

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
          // $candidate_unmaried_certificate_no_status=mysqli_real_escape_string($conn,trim($_POST['candidate_unmaried_certificate_no_status']));
          $candidate_unmaried_certificate_no=mysqli_real_escape_string($conn,trim($_POST['candidate_unmaried_certificate_no']));
          $candidate_husbands_SSC_status=mysqli_real_escape_string($conn,trim($_POST['candidate_husbands_SSC_status']));
          $candidate_husbands_SSC=mysqli_real_escape_string($conn,trim($_POST['candidate_husbands_SSC']));
          // $candidate_divorce_certificate_status=mysqli_real_escape_string($conn,trim($_POST['candidate_divorce_certificate_status']));
          // $candidate_divorce_certificate=mysqli_real_escape_string($conn,trim($_POST['candidate_divorce_certificate']));
          $Employment_status=mysqli_real_escape_string($conn,trim($_POST['Employment_status']));
          $Employment_no=mysqli_real_escape_string($conn,trim($_POST['Employment_no']));
          $candidate_present_address=mysqli_real_escape_string($conn,trim($_POST['candidate_present_address']));
          $billingtoo=mysqli_real_escape_string($conn,trim($_POST['billingtoo']));
          $candidate_permanent_address=mysqli_real_escape_string($conn,trim($_POST['candidate_permanent_address']));
          $c_age=mysqli_real_escape_string($conn,trim($_POST['c_age']));
          $diploma_status=mysqli_real_escape_string($conn,$_POST['diploma_status']);
          $spae_status=mysqli_real_escape_string($conn,$_POST['spae_status']);
          $spae_no=mysqli_real_escape_string($conn,$_POST['spae_no']);
$date=date('Y-m-d');
$time=date('h:i:s');
 $slno= $_POST['slno'];

// Array ( [class_name] => test 111 [total_seat] => 33111 [Center_Address] => Address: Nandankanan Rd, Near Tech Mahindra, Chandrasekharpur, Bhubaneswar, Odisha 751023 Phone: 0674 230 327611 [Contact_name] => Kumar singh [Contact_no] => 943707212811 ) UPDATE `ilab_exam_center` SET `total_seat`='33111',`exam_name`='test 111',`Center_Address`='Address: Nandankanan Rd, Near Tech Mahindra, Chandrasekharpur, Bhubaneswar, Odisha 751023 Phone: 0674 230 327611',`Contact_name`='Kumar singh',`Contact_no`='943707212811',`date`='2018-02-01',`time`='04:13:13' WHERE `slno_exam`='1'
 $update="UPDATE `application_form` SET `candidate_name`='$candidate_name',`candidate_father_name`='$candidate_father_name',`candidate_marital_status`='$marred_status',`candidate_husband_name`='$candidate_husband_name',`candidate_dob`='$candidate_dob',`candidate_present_address`='$candidate_present_address',`candidate_permanent_address`='$candidate_permanent_address',`candidate_qualification`='$candidate_qualification',`candidate_driving_licence_no_status`='$candidate_driving_licence_no_status',`candidate_driving_licence_no`='$candidate_driving_licence_no',`candidate_belongs_cat`='$candidate_belongs_cat',`candidate_gender`='$gender',`candidate_category`='$applying_status',`candidate_bpl_card_no`='$BPL_No',`pwd_card_no`='$pwd_card_no',`pwd_name_id`='$pwd_name_id',`candidate_unmaried_certificate_no`='$candidate_unmaried_certificate_no',`candidate_husbands_SSC`='$candidate_husbands_SSC',`candidate_certificate_cat`='$candidate_certificate_cat',`Employment_status`='$Employment_status',`employment_card_no`='$Employment_no',`date`='$date',`time`='$time',`status`='1',`c_age`='$c_age',`diploma_status`='$diploma_status', `spae_status`='$spae_status', `spae_no`='$spae_no' WHERE `slno`='$slno'";

$sql_insert=mysqli_query($conn,$update);

$msg->success('Candidate Application Form Edit Sucessfully');
    header('Location:index');
    exit;

}else{
  header('Location:logout');
  exit;
}

