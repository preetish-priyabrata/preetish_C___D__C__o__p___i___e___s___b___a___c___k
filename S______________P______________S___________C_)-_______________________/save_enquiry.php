<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
if($_SESSION['cand_user'])
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
	$enq_hdng= test_input($_REQUEST['enq_hdng']);
	$enq_text= test_input($_REQUEST['enq_text']);
	
	
	
	//insert into "candidate_declaration" table
	$qry="INSERT INTO `enquiry_table`(`slno`, `username`, `enq_hdng`, `enquiry_text`, `date`, `time`) VALUES (NULL, '$_SESSION[cand_user]', '$enq_hdng', '$enq_text', '$curr_date', '$curr_time')";
	
	$res= mysqli_query($conn, $qry);
	if($res)
	{
	 $_SESSION['enqi_success'] = 1;
    session_write_close();
    header("Location:enquiry.php");
    exit;
	}
	else
	{
		$_SESSION['enqi_error'] = 1;
		session_write_close();
    header("Location:enquiry.php");
    exit;
	}

}
ob_clean();
?>
