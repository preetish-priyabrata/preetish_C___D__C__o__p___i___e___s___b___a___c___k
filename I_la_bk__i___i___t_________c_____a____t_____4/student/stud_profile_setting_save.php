<?php

 error_reporting(4);
 session_start();
 ob_start();
if(($_SESSION['L_student_roll']!="")){
  require 'FlashMessages.php';
  require 'config.php';
  $msg = new \Preetish\FlashMessages\FlashMessages(); 
  // here information is received 
  $L_slno=$_POST['L_slno'];
  // $student_name=$_POST['L_student_name'];
  // $student_roll=$_POST['L_student_roll'];
  $student_phone=$_POST['L_student_phone'];
  // $student_branch=$_POST['L_student_branch'];
 

    $query ="UPDATE `tbl_login_student` SET `L_student_phone`='$student_phone' where `L_slno`='$L_slno'";
     $query_exe = mysqli_query($conn,$query);
   
         if($query_exe){
              $msg->success('Successfull Student Profile Details Are Updated In our record');
              header('Location:stud_profile_setting.php');
              exit;
         }else{
              $msg->error('Phone No Is Already Stored In Our Record');
              header("location:student_dashboard.php");
              exit;
         }

   
    
  
}else{
  header('Location:logout.php');
  exit;
}


?>


  
  
            
          