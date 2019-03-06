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
	
	$exam1= test_input($_REQUEST['exam1']);
	$mnth1= test_input($_REQUEST['mnth1']);
	$year1= test_input($_REQUEST['year1']);
	$ur= test_input($_REQUEST['ur']);
	$bl= test_input($_REQUEST['bl']);
	$bl_w= test_input($_REQUEST['bl_w']);
	$bl_bpl= test_input($_REQUEST['bl_bpl']);
	$obc_cl= test_input($_REQUEST['obc_cl']);
	$obc_cl_w= test_input($_REQUEST['obc_cl_w']);
	$obc_cl_bpl= test_input($_REQUEST['obc_cl_bpl']);
	$obc_sl= test_input($_REQUEST['obc_sl']);
	$obc_sl_w= test_input($_REQUEST['obc_sl_w']);
	$obc_sl_bpl= test_input($_REQUEST['obc_sl_bpl']);
	$st= test_input($_REQUEST['st']);
	$st_w= test_input($_REQUEST['st_w']);
	$st_bpl= test_input($_REQUEST['st_bpl']);
	$sc= test_input($_REQUEST['sc']);
	$sc_w= test_input($_REQUEST['sc_w']);
	$sc_bpl= test_input($_REQUEST['sc_bpl']);
	$pt= test_input($_REQUEST['pt']);
	$pt_w= test_input($_REQUEST['pt_w']);
	$total= test_input($_REQUEST['total']);
	
	
	
	//insert into "exam_master_data" table
	$qry="INSERT INTO `reserved_seats_for_categories`(`slno`, `exam_name`, `unreserved`, `bl`, `bl(w)`, `bl(bpl)`, `obc(cl)`, `obc(cl)(w)`, `obc(cl)(bpl)`, `obc(sl)`, `obc(sl)(w)`, `obc(sl)(bpl)`, `st`, `st(w)`, `st(bpl)`, `sc`, `sc(w)`, `sc(bpl)`, `pt`, `pt(w)`, `total_seat_reserved`) VALUES (NULL, '$exam1', '$ur', '$bl', '$bl_w', '$bl_bpl', '$obc_cl', '$obc_cl_w', '$obc_cl_bpl', '$obc_sl', '$obc_sl_w', '$obc_sl_bpl', '$st', '$st_w', '$st_bpl', '$sc', '$sc_w', '$sc_bpl', '$pt', '$pt_w', '$total')";
	
	$res= mysqli_query($conn, $qry);
	if($res)
	{
	 $_SESSION['mri_success'] = 1;
    session_write_close();
    header("Location:manage_reservation.php");
    exit;
	}
	else
	{
		$_SESSION['mri_error'] = 1;
		session_write_close();
    header("Location:manage_reservation.php");
    exit;
	}

}
ob_clean();
?>
