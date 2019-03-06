<?php
error_reporting(4);
session_start();
ob_start();

if($_SESSION['user_principal']){
include '../config.php';
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();

if(isset($_POST['submit']))
{
   $from_point=$_POST['top_points'];
   $to_point=$_POST['below_point'];
   $grade=$_POST['grade'];
   $date=date('y-m-d');
   $time=date('h:i:s');

 	 echo $insert_query="INSERT INTO `master_grade_type_1_to_90`(`from_point`,`to_point`,`grade`,`date`,`time`)VALUES('$from_point','$to_point','$grade','$date','$time')";

 	$sql_exe=mysqli_query($conn,$insert_query);

 	echo mysqli_error($conn);

		 if($sql_exe){
						$msg->success('Success-Full Add Grade Category');
 						header("location:admin_grade_1_to_90.php");
						exit;
		    		}else{
						$msg->error('Server Error Occured Please Contact Mantaince Person');
 						header("location:admin_grade_1_to_90.php");
						exit;
		   			}	
}

else
{
	header("location:logout.php");
	exit;
}
}

?>
