<?php
error_reporting(0);
session_start();
include "config.php";
if($_SESSION['user']=="admin@gmail.com")
{
	
	$path_logo = "uploads/organisation_logo/";
	$logo = time().$_FILES['logo']['name'];
	$tmp_logo = $_FILES['logo']['tmp_name'];
	$move_logo = move_uploaded_file($tmp_logo,$path_logo.$logo);
	
	$qry_logo="UPDATE `template_info` SET `header_logo`='$logo' WHERE `organisation`='spsc'";
	$res_logo=mysqli_query($conn, $qry_logo);
	if($res_logo)
	{
		header("location:change_logo.php");
	}
}
?>