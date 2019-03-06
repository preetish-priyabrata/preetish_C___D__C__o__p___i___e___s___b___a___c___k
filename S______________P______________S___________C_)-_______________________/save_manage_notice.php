<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
if($_SESSION['user']=="admintech@gmail.com")
{
	
	
	
	//GET DATA
	function test_input($data)
	{
		 $data = trim($data);
		 $data = stripslashes($data);
		 $data = htmlspecialchars($data);
		 return $data;
	}
	
	$nothd= test_input($_REQUEST['nothd']);
	$notcont= test_input($_REQUEST['notcont']);
	$ncupld= test_input($_REQUEST['ncupld']);
	$notice_dt= test_input($_REQUEST['notice_dt']);
	$notice_time= test_input($_REQUEST['notice_time']);
	
	$path_notice = "uploads/notices/";
	$notice = time().$_FILES['ncupld']['name'];
	$tmp_notice = $_FILES['ncupld']['tmp_name'];
	$move_notice = move_uploaded_file($tmp_notice,$path_notice.$notice);
	
	//insert into "notice_master_data" table
	$qry="INSERT INTO `notice_master_data`(`slno`,`heading`,`notice_txt`,`notice_attachment`,`date`,`time`) VALUES (NULL,'$nothd', '$notcont', '$notice',  '$notice_dt', '$notice_time')";
	
	$res= mysqli_query($conn, $qry);
	
	if($res){		
		$_SESSION['ni_success'] = 1;
    	session_write_close();
   		header("Location:manage_notice.php");
    	exit;
	}else{		
		$_SESSION['ni_error'] = 1;
		session_write_close();
    	header("Location:manage_notice.php");
    	exit;
	}

}
ob_clean();
?>
