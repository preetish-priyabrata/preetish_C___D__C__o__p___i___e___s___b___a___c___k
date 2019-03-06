
<?php
error_reporting(4);
session_start();
ob_start();
print_r($_POST);
//exit;
if($_SESSION['alumni_tech']){
	include '../config.php';
	require 'FlashMessages.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();



if(isset($_POST['submit']))
{ 

$at=$_POST['at'];
$post=$_POST['post'];
$via=$_POST['via'];
$PS=$_POST['PS'];
$city=$_POST['city'];

$District=$_POST['District'];
$pin=$_POST['pin'];
$State=$_POST['State'];

$zone=$_POST['zone'];
$country=$_POST['country'];
$Landline=$_POST['Landline'];
$date=date('y-m-d');
$time=date('H:i:s');
}
 // else
 //  {
 //    echo "string";
 //  }

//insert personal profile
 $insert_query="INSERT INTO `master_permanent_address_profile`(`at`,`post`,`via`,`ps`,`city`,`district`,`pin`,`state`,`zone`,`country`,`land_ph_no`,`date`,`time`) values ('$at','$post','$via','$PS','$city','$District','$pin','$State','$zone','$country','$Landline','$date','$time')";
//echo $insert_query;

$sql_exe=mysqli_query($conn,$insert_query);
echo mysqli_error($conn);
		if($sql_exe)
		{
			 $msg->success('Your Permanent Address Profile SuccessFull Submitted');
			 header("location:alumni_remarks_profile.php");
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