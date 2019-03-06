<?php
session_start();
ob_start();
if(isset($_SESSION['admin_user'])){
require 'FlashMessages.php';
include '../config.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
// Array ( [reply] => hello dear /.... [slno] => 1 )
 // 
// print_r($_POST);
$Query=trim($_POST['reply']);
$user_id=$_POST['cate_name'];

$date=date('Y-m-d');
$time=date('H:i:s');
$slno=$_POST['slno'];
//$last_id=mysqli_insert_id($conn);
 //$sl_no=$rec1['assign_admin_id'];
 //
$query_reply="UPDATE `master_queries_student` SET  `reply_details`='$Query',`status_answer`='1',`date_reply`='$date',`time_reply`='$time' WHERE `slno`='$slno'";
$sql_exe=mysqli_query($conn,$query_reply);
// echo mysqli_error($conn);
// exit;
$msg->success('Query Reply Successfull');
header("location:admin_user_Received_Query.php");
}else{
  header('Location:logout.php');
  exit;
}
