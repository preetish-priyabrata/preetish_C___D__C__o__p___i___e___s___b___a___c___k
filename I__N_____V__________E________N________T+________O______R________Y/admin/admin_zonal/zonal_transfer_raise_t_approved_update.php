<?php
//  print_r($_POST);
// exit;
// Array ( [example77_length] => 10 [slno] => 17 [click] => Approved [submit] => Submit ) 

session_start();
if($_SESSION['admin_zonal']){
  include  '../config.php';
  require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Welcome To Dashboard Of HeadQuarter Officer";
 
// Array ( [example77_length] => 10 [slno_transfer_id] => 2 [request_id] => LfvIa2W1yZwhwgbwXT4j1K+1b6wGVpbncQcRXNk7pyk= [primary_id] => 34567 [quantity] => 32 [slno] => 2 [click] => Approved [submit] => Submit ) UPDATE `lt_master_hq_request_site` SET `approve_status`='3',`date`='2017-12-11',`time`='2017-12-11' WHERE `slno`='2'

 $zonal_place=$_SESSION['zonal_place'];
 $slno=$_POST['slno'];
 $date=date('Y-m-d');
 $time=date('H:i:s');

      if ($_POST['click']=='Approved') {
              $query ="UPDATE `lt_master_hq_request_site` SET `approve_status`='3',`date`='$date',`time`='$time' WHERE `slno`='$slno'";
 
             $query_exe = mysqli_query($conn,$query);
              
             $msg->success('Approved Successfull');
             header("location:index.php");
            
          }
      else{
          echo   $query ="UPDATE `lt_master_hq_request_site` SET `approve_status`='2',`date`='$date',`time`='$date' WHERE `slno`='$slno'";

             $query_exe = mysqli_query($conn,$query);
             
             $msg->success('Rejected');
             header("location:index.php");
             exit;

          }

}else{
  header('Location:logout.php');
  exit;
}

?>
