
<?php
error_reporting(4);
session_start();
ob_start();
// print_r($_POST);
//exit;
if(isset($_SESSION['alumni_tech'])){
	include '../config.php';
	require 'FlashMessages.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();



if(isset($_POST['submit']))
{ 

$father_name=$_POST['father_name'];
$father_occupation=$_POST['father_occupation'];
$father_designation=$_POST['father_designation'];

$father_mob_no=$_POST['father_mob_no'];
$father_land_ph_no=$_POST['father_land_ph_no'];
$father_email=$_POST['father_email'];
$mother_name=$_POST['mother_name'];
$mother_occupation=$_POST['mother_occupation'];
$mother_designation=$_POST['mother_designation'];

$mother_mob_no=$_POST['mother_mob_no'];
$mother_land_ph_no=$_POST['mother_land_ph_no'];
$mother_email=$_POST['mother_email'];
$date=date('y-m-d');
$time=date('H:i:s');
}
 // else
 //  {
 //    echo "string";
 //  }

//insert personal profile
 $insert_query="INSERT INTO `master_family_Profile`(`fateher_name`,`father_occupation`,`father_designation`,`father_mob_no`,`father_land_ph_no`,`father_email`,`mother_name`,`mother_occupation`,`mother_designation`,`mother_mob_no`,`mother_land_ph_no`,`mother_email`,`date`,`time`) values ('$father_name','$father_occupation','$father_designation','$father_mob_no','$father_land_ph_no','$father_email','$mother_name','$mother_occupation','$mother_designation','$mother_mob_no','$mother_land_ph_no','$mother_email','$date','
$time')";
//echo $insert_query;

$sql_exe=mysqli_query($conn,$insert_query);
echo mysqli_error($conn);
		if($sql_exe)
		{
			 $msg->success('Your Family Profile SuccessFull Submitted');
			 header("location:alumni_present_address.php");
			 exit;
		}
		else
		{
			echo "not inserted";

        }
}
else{
			header('Location:logout.php');
			exit;
	}
?>