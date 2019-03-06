<?php
session_start();
ob_start();
// check session
if($_SESSION['user_principal'])
{
	include'../config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();

	if(isset($_POST['Add']))
	{
		$subject_cat=$_POST['sub_category'];
		$date=date('y-m-d');
		$time=date('H:i:s');
			// checking subject catagory is empty or not
	  if(!empty($subject_cat))
		{
			//checking subject catagory is present or not (num row is 0 then insert otherwise will not insert)
      		$query = "SELECT * FROM `master_subject_catagory` WHERE `subject_cat`='$subject_cat'";
      		$sql_exe=mysqli_query($conn,$query);
      		$num =mysqli_num_rows($sql_exe);
      		// num ==0 checking of subject
      	 if($num ==0)
      	{
      			// insert into mastter subject_catagory 
		$sql_query="INSERT into `master_subject_catagory`(`subject_cat`,`date`,`time`) values('$subject_cat','$date','$time')";
		$sql_exe=mysqli_query($conn,$sql_query);
			if($sql_exe)
			{
			$msg->success('Success-Full Add Subject Category');
 			header("location:admin_subject_catagory.php");
			exit;
		    }
		    else
		    {
			$msg->error('Server Error Occured Please Contact Mantaince Person');
 			header("location:admin_subject_catagory.php");
			exit;
		    }
		}else
		{
      			$msg->error('Subject Catagory Is Already Present');
 				header("location:admin_subject_catagory.php");
				exit;
		}
	  }
	else
	{
	
		header("location:logout.php");
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
