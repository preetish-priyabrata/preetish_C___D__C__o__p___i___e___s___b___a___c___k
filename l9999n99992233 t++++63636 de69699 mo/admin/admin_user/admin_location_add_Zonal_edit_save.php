<?php
session_start();
if($_SESSION['admin']){
  require 'FlashMessages.php';
  require 'config.php';
  $msg = new \Preetish\FlashMessages\FlashMessages();
 // print_r($_POST);
 // exit;

  $slno=$_POST['slno'];
  $zonal_name=$_POST['zonal_name'];
  $address1=$_POST['address1'];
  $address2=$_POST['address2'];
  $address3=$_POST['address3'];
  $address4=$_POST['address4'];
  $address5=$_POST['address5'];
  $address6=$_POST['address6'];
  $address7=$_POST['address7'];
  $address8=$_POST['address8'];

  // check unique no
  $check="SELECT * from `lt_master_zonal_place` where `zonal_name`='$zonal_name' ";
  $sql_check=mysqli_query($conn,$check);
  $num=mysqli_num_rows($sql_check); // check it number rows is affected 

     
   
    if($num==0){
            $query ="UPDATE `lt_master_zonal_place` SET `zonal_name`='$zonal_name',`address_1`='$address1',`address_2`='$address2',`address_3`='$address3',`address_4`='$address4',`address_5`='$address5',`address_6`='$address6',`address_7`='$address7',`address_8`='$address8' WHERE `slno`='$slno'";

            $query_exe = mysqli_query($conn,$query);
               
            $msg->success('Successfull Zonal Information Is Edited In our record');
            header('Location:admin_location_add_Zonal_view.php');
            exit;
    }else{
            $msg->error('Zonal Name already is stored In our record');
            header('location:admin_dashboard.php');
            exit;
         }

   

}else{
  header('Location:logout.php');
  exit;
}