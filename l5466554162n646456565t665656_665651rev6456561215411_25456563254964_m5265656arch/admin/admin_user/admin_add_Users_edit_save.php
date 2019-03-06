<?php
session_start();
if($_SESSION['admin']){
  require 'FlashMessages.php';
  require 'config.php';
  $msg = new \Preetish\FlashMessages\FlashMessages();
 // print_r($_POST);
 // exit;

  $u_slno=$_POST['u_slno'];
  $user_name=$_POST['user_name'];
  $user_designation=$_POST['user_designation'];
  $dob=date('Y-m-d',strtotime(trim($_POST['dob'])));;
  $mobile_no=$_POST['user_mobile'];
  $user_role=$_POST['user_role'];
  $headquarter=$_POST['headquarter'];

// Array ( [u_slno] => 2 [user_name] => sipra1 [user_designation] => head Director [dob] => 1988-06-19 [user_mobile] => 2345211290 [user_role] => 4 [headquarter] => hq2 [site_store_name] => zonal003 [site_field_name] => field006 ) 

    switch ($user_role) {
      case '1': // FOR HEADQUATER 

        $sql_update ="UPDATE `lt_master_user_system` SET `user_name`='$user_name',`user_designation`='$user_designation',`user_dob`='$dob',`user_mobile`='$mobile_no',`user_level`='$user_role',`hq_store_id`='$headquarter' where `u_slno`='$u_slno'";
       break;
      case '2': // FOR APPROVER USER

        $sql_update ="UPDATE `lt_master_user_system` SET `user_name`='$user_name',`user_designation`='$user_designation',`user_dob`='$dob',`user_mobile`='$mobile_no',`user_level`='$user_role',`hq_store_id`='$headquarter' where `u_slno`='$u_slno'";
        break;
      case '3': // FOR SITE STORE KEEPER  
        $site_store_name=$_POST['site_store_name'];
        $sql_update ="UPDATE `lt_master_user_system` SET `user_name`='$user_name',`user_designation`='$user_designation',`user_dob`='$dob',`user_mobile`='$mobile_no',`user_level`='$user_role',`hq_store_id`='$headquarter',`sub_site_store_id`='$site_store_name' where `u_slno`='$u_slno'";
        break;
      case '4': // FOR FIELD STORE KEEPER
        $site_store_name=$_POST['site_store_name'];
        $site_field_name=$_POST['site_field_name'];
        $sql_update ="UPDATE `lt_master_user_system` SET `user_name`='$user_name',`user_designation`='$user_designation',`user_dob`='$dob',`user_mobile`='$mobile_no',`user_level`='$user_role',`hq_store_id`='$headquarter',`sub_site_store_id`='$site_store_name', `sub_field_store_id`='$site_field_name' where `u_slno`='$u_slno'";
        break;
      
      default:
        header('Location:logout.php');
        exit;
        break;
    }
    
    $sql_exe_update=mysqli_query($conn,$sql_update);
    // execute query


    $msg->success('Successfull Edit In our Record');
    header('Location:admin_add_Users_view.php');
    exit;

}else{
  header('Location:logout.php');
  exit;
}
