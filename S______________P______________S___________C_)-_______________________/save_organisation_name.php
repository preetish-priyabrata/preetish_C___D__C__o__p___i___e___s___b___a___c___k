<?php
error_reporting(0);
session_start();
include "config.php";
if($_SESSION['user']=="admin@gmail.com")
{
	$org_name = $_REQUEST['org'];
	
	$qry_org_name="UPDATE `template_info` SET `header_name`='$org_name' WHERE `organisation`='spsc'";
	$res_org_name=mysqli_query($conn, $qry_org_name);
	if($res_org_name)
	{
		header("location:change_organisation_name.php");
	}
}
?>