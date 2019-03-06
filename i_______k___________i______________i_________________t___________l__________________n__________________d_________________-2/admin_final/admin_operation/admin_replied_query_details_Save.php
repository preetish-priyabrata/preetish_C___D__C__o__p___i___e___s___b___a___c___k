<?php
// print_r($_POST);
// exit;
session_start();
ob_start();
if(isset($_SESSION['alumni_tech'])){
require 'FlashMessages.php';
include '../config.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
// Array ( [reply] => hello dear /.... [slno] => 1 )
 // 
// print_r($_POST);
// exit;
$Query=trim($_POST['reply']);
//$user_id=$_POST['cate_name'];

$date=date('Y-m-d');
$time=date('H:i:s');
$slno=$_POST['sl_no'];

$query_reply="UPDATE `kiit_stud_queries` SET  `reply_details`='$Query',`status_answer`='2',`date_reply`='$date',`time_reply`='$time' WHERE `sl_no`='$slno'";

$sql_exe=mysqli_query($conn,$query_reply);
// echo mysqli_error($conn);
// exit;
$msg->success('Query Reply Successfull');
header("location:admin_received_queries.php");
}else{
  header('Location:logout.php');
  exit;
}
