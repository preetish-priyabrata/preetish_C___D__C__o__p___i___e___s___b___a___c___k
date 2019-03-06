<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
if($_SESSION['user']=="adminexam@gmail.com")
{
	
	
	//GET DATA
	function test_input($data)
	{
		 $data = trim($data);
		 $data = stripslashes($data);
		 $data = htmlspecialchars($data);
		 return $data;
	}
	
	$curr_date= test_input($_REQUEST['curr_date']);
	$curr_time= test_input($_REQUEST['curr_time']);
	$resp_hdng= test_input($_REQUEST['resp_hdng']);
	$resp_msg= test_input($_REQUEST['resp_msg']);
	$rcvr_name= test_input($_REQUEST['rcvr_name']);
	
	
	
	//insert into "candidate_declaration" table
	$qry="INSERT INTO `enquiry_response_table`(`slno`, `rcvr_username`, `response_hdng`, `response_text`, `date`, `time`) VALUES (NULL, '$rcvr_name', '$resp_hdng', '$resp_msg', '$curr_date', '$curr_time')";
	
	$res= mysqli_query($conn, $qry);
	if($res)
	{
	 $_SESSION['respi_success'] = 1;
    session_write_close();
    header("Location:admin_query_response.php");
    exit;
	}
	else
	{
		$_SESSION['respi_error'] = 1;
		session_write_close();
    header("Location:admin_query_response.php");
    exit;
	}

}
ob_clean();
?>
