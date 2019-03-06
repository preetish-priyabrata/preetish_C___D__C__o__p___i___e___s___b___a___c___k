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

    
       $at = $_POST['at'];
       $post = $_POST['post'];
       $via =$_POST['via'];
       $ps = $_POST['ps'];
       $city = $_POST['city'];
       $district =$_POST['district'];
       $pin = $_POST['pin'];
       $state = $_POST['state'];
       $zone=$_POST['zone'];
       $country =$_POST['country'];
       $land_ph_no = $_POST['land_ph_no'];
       
      
  

          $query = "UPDATE `master_present_address_profile` SET `at`='$at',`post`='$post',`via`='$via',`ps`='$ps',`city`='$city',`district`='$district',`pin`='$pin',`state`='$state',`zone`='$zone',`country`='$country',`land_ph_no`='land_ph_no' where `user_id`='$user_id'";
          // echo $query;
        
          $query_exe = mysqli_query($conn,$query);
           
          if($query_exe){
            $msg->success('Present Address Updated Success-full');
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
