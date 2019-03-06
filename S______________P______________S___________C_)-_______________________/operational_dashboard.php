<?php
error_reporting(0);
ob_start();
session_start();
require 'FlashMessages.php';
include "config.php";
	if($_SESSION['admin_operational_exam']){


	}else{
  		header('location:logout.php');
	}

	$contents = ob_get_contents();
	ob_clean();
	include_once 'template_data_table.php';
?>