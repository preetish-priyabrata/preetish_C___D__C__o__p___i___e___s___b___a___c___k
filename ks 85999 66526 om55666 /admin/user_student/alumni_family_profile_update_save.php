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

    
       $father_name = $_POST['father_name'];
       $father_occupation = $_POST['father_occupation'];
       $father_designation =$_POST['father_designation'];
       $father_mob_no = $_POST['father_mob_no'];
       $father_land_ph_no = $_POST['father_land_ph_no'];
       $father_email =$_POST['father_email'];
       $mother_name = $_POST['mother_name'];
       $mother_occupation = $_POST['mother_occupation'];
       $mother_designation = $_POST['mother_designation'];
       $mother_mob_no =$_POST['mother_mob_no'];
       $mother_land_ph_no = $_POST['mother_land_ph_no'];
       $mother_email = $_POST['mother_email'];
       
  

          $query = "UPDATE `master_family_Profile` SET `father_name`='$father_name',`father_occupation`='$father_occupation',`father_designation`='$father_designation',`father_mob_no`='$father_mob_no',`father_land_ph_no`='$father_land_ph_no',`father_email`='$father_email',`mother_name`='$mother_name',`mother_occupation`='$mother_occupation',`mother_designation`='$mother_designation',`mother_mob_no`='$mother_mob_no',`mother_land_ph_no`='$mother_land_ph_no',`mother_email`='$mother_email'where `user_id`='$user_id'";
          // echo $query;
        
          $query_exe = mysqli_query($conn,$query);
           
          if($query_exe){
            $msg->success('Family Profile Updated Success-full');
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
