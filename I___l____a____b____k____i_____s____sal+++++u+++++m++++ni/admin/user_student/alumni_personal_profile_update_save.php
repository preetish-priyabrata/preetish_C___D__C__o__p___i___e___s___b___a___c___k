<?php
    error_reporting(4);
    session_start();
    ob_start();
    // print_r($_POST);
    // print_r($_FILES);
    

    if($_SESSION['email']){
       require 'FlashMessages.php';
       include '../config.php';
       $msg = new \Preetish\FlashMessages\FlashMessages();
       $user_id=$_SESSION['email'];

    
       $current_occupation = $_POST['current_occupation'];
       $designation = $_POST['designation'];
       $employer_name =$_POST['employer_name'];
       $tribe = $_POST['tribe'];
       $mobile_no = $_POST['mobile_no'];
       $land_Ph_no =$_POST['land_Ph_no'];
       $official_email_id = $_POST['official_email_id'];
       $sports_participate = $_POST['sports_participate'];
       $co_curricular_activity = $_POST['co_curricular_activity'];
       $awards =$_POST['awards'];
       $DOB=$_POST['dob'];
       $gen=$_POST['gen'];
       $alter=$_POST['alter'];
      
      
  $query = "UPDATE `master_personal_profile` SET `current_occupation`='$current_occupation',`designation`='$designation',`employer_name`='$employer_name',`tribe`='$tribe',`mobile_no`='$mobile_no',`land_Ph_no`='$land_Ph_no',`official_email_id`='$official_email_id',`sports_participate`='$sports_participate',`co_curricular_activity`='$co_curricular_activity',`awards`='$awards',`DOB`='$DOB',`gender`='$gen',`alter_mob`='$alter' where `user_id`='$user_id'";
          // echo $query;
        
          $query_exe = mysqli_query($conn,$query);
           
          if($query_exe){
            $msg->success('Personal Profile Updated Success-full');
            header("location:profile.php");
            exit;
      }else{
           $msg->error('Please Contact Maintance Support Team');
            header("location:alumni_dashboard.php");
            exit;
          }
          // move over
    }else{
  header('Location:logout.php');
  exit;
}
  
  
            
              
?>
