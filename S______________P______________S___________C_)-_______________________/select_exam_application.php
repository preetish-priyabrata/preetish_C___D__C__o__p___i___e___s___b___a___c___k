<?php
error_reporting(0);
ob_start();
session_start();

include "config.php";
if($_POST['exam_type'] && $_POST['exam_type']!="" ){
	
	$_SESSION['exam_selected']=$_POST['exam_type'];
	
	
	echo "1";
	return;

}else{
	echo "0";
	return;
}


?>