
<?php

session_start();
ob_start();

//exit;
if(isset($_SESSION['alumni_tech'])){
	include '../config.php';
	require 'FlashMessages.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();



if(isset($_POST['submit']))
{ 

$pass_year=$_POST['pass_year'];
$alumni_name=$_POST['alumni_name'];
$occupation=$_POST['occupation'];
$designation=$_POST['designation'];
$employer=$_POST['employer'];
$tribe=$_POST['tribe'];
$ph_no=$_POST['ph_no'];
$Landline=$_POST['Landline'];
$email=$_POST['email'];
$ofc_email=$_POST['ofc_email'];

$sports=$_POST['sports'];
$Co_curricular=$_POST['Co-curricular'];
$awards=$_POST['awards'];
$date=date('y-m-d');
$time=date('H:i:s');
}
 // else
 //  {
 //    echo "string";
 //  }

//insert personal profile
 $insert_query="INSERT INTO `master_personal_profile`(`passing_year`,`name`,`current_occupation`,`designation`,`employer_name`,`tribe`,`mobile_no`,`land_Ph_no`,`email_id`,`official_email_id`,`sports_participate`,`co_curricular_activity`,`awards`,`date`,`time`) values ('$pass_year','$alumni_name','$occupation','$designation','$employer','$tribe','$ph_no','$Landline','$email','$ofc_email','$sports','$Co_curricular','$awards','$date','
$time')";
//echo $insert_query;

$sql_exe=mysqli_query($conn,$insert_query);
echo mysqli_error($conn);

		if($sql_exe)
		{
			 $msg->success('Your Personal Profile SuccessFull Submitted');
			 header("location:alumni_family_profile.php");
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