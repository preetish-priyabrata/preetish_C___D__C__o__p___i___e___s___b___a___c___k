
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

$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['Phone'];
$designation=$_POST['designation'];
$password=$_POST['pwd'];
$cn_password=$_POST['cn_pwd'];
$date=date('y-m-d');
$time=date('H:i:s');
}
 // else
 //  {
 //    echo "string";
 //  }

//insert personal profile
 $insert_query="INSERT INTO `admin_user_table`(`name`,`email`,`phone`,`designation`,`password`,`cn_password`,`date`,`time`) values ('$name','$email','$phone','$designation','$password','$cn_password','$date','$time')";
//echo $insert_query;

$sql_exe=mysqli_query($conn,$insert_query);
echo mysqli_error($conn);

		if($sql_exe)
		{
			 $msg->success('User Profile SuccessFull Submitted');
			 header("location:create_admin_user.php");
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