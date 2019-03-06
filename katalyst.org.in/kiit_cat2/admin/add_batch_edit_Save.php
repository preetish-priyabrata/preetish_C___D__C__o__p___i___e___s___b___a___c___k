<?php

 error_reporting(4);
 session_start();
 ob_start();
 //print_r($_POST);
 //exit;
if(($_SESSION['userId']!="")){
  require 'FlashMessages.php';
  require 'config.php';
  $msg = new \Preetish\FlashMessages\FlashMessages(); 
  // Array ( [sl_no] => 4 [batch_name] => b9 [stud_course] => 6 [no_of_sheet] => 11 [remain_seat] => 11 [start_time] => 04:00:00 [end_time] => 06:00:00 [venue] => Kathajodi Campus 15 [days] => Array ( [0] => Monday [1] => Tuesday [2] => Wednesday [3] => Friday [4] => Saturday [5] => Sunday ) ) 
  // here information is received 
  $batch_name=$_POST['sl_no'];
  $course_id=$_POST['stud_course'];
  // $start_time=$_POST['start_time'];
  // $end_time=$_POST['end_time'];
  $start_time=date('H:i:s',strtotime(trim($_POST['start_time'])));
  $end_time=date('H:i:s',strtotime(trim($_POST['end_time'])));
  $venue=$_POST['venue'];
  $days=serialize($_POST['days']);
 
  // $check="SELECT * from `tbl_batch` where `sl_no`='$batch_name' ";
  // $sql_check=mysqli_query($conn,$check);
  // $num=mysqli_num_rows($sql_check); // check it number rows is affected 


             $query ="UPDATE `tbl_batch` SET `course_id`='$course_id',`start_time`='$start_time',`end_time`='$end_time',`venue`='$venue',`days`='$days' where `sl_no`='$batch_name'";
              $query_exe = mysqli_query($conn,$query);
  if($query_exe){
              $msg->success('Successfull Batch Details Are Edited In our record');
              header('Location:add_batch_view.php');
              exit;
  }else{
              $msg->error('Batch Details Edited Not Successfull');
              header("location:admin_dashboard.php");
              exit;
      }
   
    
  
}else{
  header('Location:logout.php');
  exit;
}


?>