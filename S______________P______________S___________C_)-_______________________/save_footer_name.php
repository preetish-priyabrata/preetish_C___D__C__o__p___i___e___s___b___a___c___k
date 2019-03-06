<?php
error_reporting(0);
session_start();
include "config.php";
if($_SESSION['user']=="admin@gmail.com")
{
	$footer_name = $_REQUEST['ftr'];
	
	$qry_footer_name="UPDATE `template_info` SET `footer_name`='$footer_name' WHERE `organisation`='spsc'";
	$res_footer_name=mysqli_query($conn, $qry_footer_name);
	if($res_footer_name)
	{
		header("location:change_footer.php");
	}
}
?>