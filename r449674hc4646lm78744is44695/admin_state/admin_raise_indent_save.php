<?php 
// print_r($_REQUEST);
// exit;
// Array ( [place_id] => Pat [place_status] => 2 [raise_place_id] => Pat [top_place_id] => BR [item_code] => Array ( [0] => ocp [1] => ocp ) [item_type] => Array ( [0] => f [1] => p ) [item_quantity] => Array ( [0] => 10 [1] => 20 ) [txtOccupation] => Array ( [0] => 5000 [1] => 5000 ) ) 
error_reporting(E_ALL);
session_start();
date_default_timezone_set("Asia/Kolkata");
if($_SESSION['admin_emails']){
  require 'FlashMessages.php';
  include "config.php";
   $msg = new \Preetish\FlashMessages\FlashMessages();
// print_r($_REQUEST);
  $place_id=trim($_REQUEST['place_id']);
  $place_status=trim($_REQUEST['place_status']);
  $top_place_id=trim($_REQUEST['top_place_id']);
  $raise_place_id=trim($_REQUEST['raise_place_id']);
  $item_code=($_REQUEST['item_code']);
  $user=$_SESSION['admin_emails'];
  // print_r($item_code);
  $item_type=($_REQUEST['item_type']);
  $item_quantity=($_REQUEST['item_quantity']);
  $txtOccupation=($_REQUEST['txtOccupation']);
   $count_value=count($item_code);
  $date=date('Y-m-d');
  $time= date('H:i:s');
  $da=date('md');
   $query_intent_details="INSERT INTO `rhc_master_district_indent`(`slno`, `indent_place_raised_to`, `indent_place_raised_by`, `date_creation`, `time_creation`,`inserted_by_id`) VALUES (NULL,'$top_place_id','$raise_place_id' ,'$date','$time','$user')";
  $sql_exe_insert=mysqli_query($conn,$query_intent_details);
  if($sql_exe_insert){
    $last_id = mysqli_insert_id($conn);
    $get_id="dis00".$da.$last_id;
     $query_update_indent="UPDATE `rhc_master_indent` SET `indent_id`='$get_id' WHERE `slno`='$last_id'";
    $sql_exe_Update=mysqli_query($conn,$query_update_indent);
    if($sql_exe_Update){

      for ($i=0; $i <$count_value ; $i++) { 
        // print_r($item_code);
        $item_codes=$item_code[$i];
        $item_types=$item_type[$i];
         $item_quantitys=$item_quantity[$i];
        $item_quantitys1=$txtOccupation[$i];
        if($item_quantitys1>=$item_quantitys){
          // echo "hi";
           $check_indent="SELECT * FROM `rhc_master_district_indent_id_details` WHERE `indent_id`='$get_id' and `item_code`='$item_codes' and `Item_type`='$item_types'";
          $sql_check=mysqli_query($conn,$check_indent);
           $num_check=mysqli_num_rows($sql_check);
          if($num_check==0){
            $query_item_insert="INSERT INTO `rhc_master_district_indent_id_details`(`slno`, `indent_id`, `item_code`, `Item_type`, `item_quantity`, `date_creation`, `time_creation`) VALUES (NULL, '$get_id','$item_codes','$item_types','$item_quantitys','$date','$time')";
            $sql_insert_item=mysqli_query($conn,$query_item_insert);
          }else{
            $msg->warning('Item Code '.$item_codes .' Is Already Indent In this list ');
            
          }

        }else{
          $msg->warning('Item Code '.$item_codes .' Is Execced The Forcating Quantity ');
          
        }
      }

        
        //$msg->success('Indent Rasied Success-fully');
        header('Location:admin_raise_indent_save_send.php?indent_id='.$get_id."&top_place_id=".$top_place_id."&raise_place_id=".$raise_place_id);
        exit;
      
    }else{
      $msg->error('There Is Some Error Please Contact System Admin');
      header('Location:admin_dashboard.php');
      exit;
    }
  


  }else{
    $msg->error('There Is Some Error Please Contact System Admin');
    header('Location:admin_dashboard.php');
    exit;
  }


}else{
  header('Location:logout.php');
  exit;
}
?>